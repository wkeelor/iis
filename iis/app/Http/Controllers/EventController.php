<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\PriceType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class EventController extends Controller
{
    //show all
    public function index(){
        $events =  Event::where('approved', true)->get()->map(function ($event) {
            $averageRating = $event->ratings()->avg('rating'); // Assuming 'rating' is the column name in your ratings table
            $event->averageRating = $averageRating; // Add averageRating as a custom attribute
            return $event;
        });
        return view('events.events',[
            'events' => $events
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
            'website' => ['nullable','regex:/^(https?:\/\/)([\da-z.-]+)\.([a-z.]{2,6})([\/\w .-]*)*\/?$/i'],
            'capacity' => [],
            'description' => []
        ]);
        $event->name = $request['name'];
        $event->start_time = $request['start_time'];
        $event->end_time = $request['end_time'];
        $event->website = $request['website'];
        $event->capacity = $request['capacity'];
        $event->description = $request['description'];
        $event->save();
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
            //'venue_id' => 'required',
            'website' => ['nullable','regex:/^(https?:\/\/)([\da-z.-]+)\.([a-z.]{2,6})([\/\w .-]*)*\/?$/i'],
            'capacity' => [],
            'description' => [],
            'price_category_id' => 'required'
        ]);
        $event = Event::create($form_fields);
        $event->venue_id = 1;
        $event-> Auth::user()->id;
        $event->host_id = 1;
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
        return redirect()->back();
    }


}
