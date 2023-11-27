<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\PriceType;
use App\Models\Rating;
use App\Models\Venue;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class EventController extends Controller
{
    //show all
    public function index(){
        $nowDate = date('Y-m-d H:i:s');
        $venues = Venue::where('approved', true)->get();
        $categories = Category::where('approved', true)->get();
        $events =  Event::where('approved', true)
            ->whereDate('end_time', '>',  $nowDate)
            ->whereDate('start_time', '>',  $nowDate)
            ->get()
            ->map(function ($event) {
            $averageRating = $event->ratings()->avg('rating'); // Assuming 'rating' is the column name in your ratings table
            $event->averageRating = $averageRating; // Add averageRating as a custom attribute
            return $event;
        });
        return view('events.events',[
            'events' => $events,
            'venues' => $venues,
            'categories' => $categories
        ]);
    }

    public function indexWithFilters(Request $request){
        $data = $request->all();
        $categories = [];
        $venues = [];
        foreach ($data as $key => $item){
            if(str_contains($key, "category"))
                $categories[] = $item;
            if(str_contains($key, "venue"))
                $venues[] = $item;
            if($item && (str_contains($key, "start-") || str_contains($key, "end-"))){
                $dateTime = DateTime::createFromFormat('m/d/Y', $item);
                $data[$key] = $dateTime->format('Y-m-d H:i:s');
            }
        }

        $nowDate = date('Y-m-d H:i:s');
        $eventsQuery = Event::where('approved', true);
        if(!empty($categories))
            $eventsQuery->whereIn('category_id', $categories);
        if(!empty($venues))
            $eventsQuery->whereIn('venue_id', $venues);

        if(!empty($data['min_range']))
            $eventsQuery->where('base_price', '>=', $data['min_range']);

        if(!empty($data['max_range']))
            $eventsQuery->where('base_price', '<=', $data['max_range']);

        if (!empty($data['start-start']))
            $eventsQuery->whereDate('start_time', '>=',  $data['start-start']);
        else
            $eventsQuery->whereDate('start_time', '>=',  $nowDate);

        if (!empty($data['end-start']))
            $eventsQuery->whereDate('start_time', '<=',  $data['end-start']);

        if (!empty($data['start-end']))
            $eventsQuery->whereDate('end_time', '>=',  $data['start-end']);

        if (!empty($data['end-end']))
            $eventsQuery->whereDate('end_time', '<=',  $data['end-end']);

        $venues = Venue::where('approved', true)->get();
        $categories = Category::where('approved', true)->get();
        $events = $eventsQuery->get()
            ->map(function ($event) {
                $averageRating = $event->ratings()->avg('rating'); // Assuming 'rating' is the column name in your ratings table
                $event->averageRating = $averageRating; // Add averageRating as a custom attribute
                return $event;
            });
        return view('events.events',[
            'events' => $events,
            'venues' => $venues,
            'categories' => $categories
        ]);
    }

    public function all_my(){
        $events =  Event::where('host_id', Auth::user()->id)->get()->map(function ($event) {
            $averageRating = $event->ratings()->avg('rating'); // Assuming 'rating' is the column name in your ratings table
            $event->averageRating = $averageRating; // Add averageRating as a custom attribute
            return $event;
        });
        return view('events.events',[
            'events' => $events
        ]);
    }

    public function request(Event $event){
        $event->requested_approval = true;
        $event->save();
        return redirect()->back()->with('message','Request sent');
    }

    public function show_moderator(){
        $declined =  Event::where('approved', false)->get();
        $awaiting =  Event::where('approved', null)->where('requested_approval',true)->get();
        $approved =  Event::where('approved', true)->get();

        // Eager load the 'category' relationship
        $jsons = [$approved, $awaiting, $declined];
        Event::whereIn('id', collect($jsons)->flatten()->pluck('id'))->with('category')->get();

        return view('events.moderator_events', [
            'jsons' => $jsons,
        ]);
    }

    //show single
    public function show(Event $event){
        $averageRating = $event->ratings->avg('rating');
        $countRating = $event->ratings->count();
        $ratings = $event->ratings;
        $event->averageRating = $averageRating;
        $priceTypes = DB::table('price_types')->select('*')->where([
            ['event_id', $event->id]
        ])->get();
        return view('events.event', [
            'event' => $event,
            'averageRating' => $averageRating,
            'priceTypes' => $priceTypes,
            'countRating' => $countRating,
            'ratings' => $ratings
        ]);
    }

    public function edit_show(Event $event){
        //dd($event);
        return view('events.edit', [
            'event' => $event
        ]);
    }

    public function approve(Event $event){
        $event->approved = true;
        $event->save();
        return redirect()->back();
    }

    public function decline(Event $event){
        $event->approved = false;
        $event->save();
        return redirect()->back();
    }

    public function edit(Request $request){
        // Edit Event
        $event =new Event();
        $event = Event::find($request->id);
        $request->validate([
            'name' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'venue_id' => 'required',
            'website' => ['nullable','regex:/^(https?:\/\/)([\da-z.-]+)\.([a-z.]{2,6})([\/\w .-]*)*\/?$/i'],
            'capacity' => [],
            'description' => [],
            'price_category_id' => 'required',
            'category_id' => []
        ]);
        $event->name = $request['name'];
        $event->start_time = $request['start_time'];
        $event->end_time = $request['end_time'];
        $event->website = $request['website'];
        $event->capacity = $request['capacity'];
        $event->description = $request['description'];
        $event->venue_id = $request['venue_id'];
        $event->price_category_id = $request['price_category_id'];
        $event->category_id = $request['category_id'];
        $event->save();
        if($request->logo){
            $this->storeLogo($request,$event);
        }
        return redirect('/')->with('message','Event Updated');
    }
    public function storeLogo(Request $request,Event $event)
    {
        $image = $request->file('logo');
        $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);

        // Save the image path in the database
        $event->logo = 'images/' . $imageName;
        $event->save();

        // Return a success response or redirect to a success page
        //return response('Image uploaded successfully!');
    }

    public function add(Request $request){
        $form_fields = $request->validate([
            'name' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'venue_id' => 'required',
            'website' => ['nullable','regex:/^(https?:\/\/)([\da-z.-]+)\.([a-z.]{2,6})([\/\w .-]*)*\/?$/i'],
            'capacity' => [],
            'description' => [],
            'price_category_id' => 'required',
            'category_id' => []
        ]);
        $form_fields['base_price'] = $request->price;
        $event = Event::create($form_fields);
        $event->venue_id = 1;
        $event->host_id = Auth::user()->id;
        $priceTypeForm = [
            'event_id' => $event->id,
            'default' => 1
        ];
        switch ($event->price_category_id){
            case 2:
                $priceTypeForm['name'] = "Dobrovolné";
                $priceTypeForm['price'] = 0;
                break;
            case 3:
                $priceTypeForm['name'] = "Dobrovolné";

                break;
            default:
                $priceTypeForm['name'] = "Základné";
                $priceTypeForm['price'] = $request->price;
                break;
        }

        $priceType = PriceType::create($priceTypeForm);
        $event->save();
        $priceType->save();
        if($request->logo){
            $this->storeLogo($request,$event);
        }
        return redirect()->route('event_detail', ['event' => $event->id]);
    }




}
