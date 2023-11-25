<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    //show all
    public function index(){
        return view('events.events',[
            'events' => Event::all()
        ]);
    }

    //show single
    public function show(Event $event){
        //dd($event);
        return view('events.event', [
            'event' => $event
        ]);
    }

    public function edit(Request $request){
        // Edit Event
        $event =new Event();
        $event = $event->load_by_id($request->id);
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
        return redirect()->back()->with('message','Event Updated');
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
        //dd($request->logo);
        $form_fields = $request->validate([
            'name' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            //'venue_id' => 'required',
            'website' => ['nullable','regex:/^(https?:\/\/)([\da-z.-]+)\.([a-z.]{2,6})([\/\w .-]*)*\/?$/i'],
            'capacity' => [],
            'description' => []
        ]);

        $event = Event::create($form_fields);
        $event->venue_id = 1;
        $event->host_id = 1;
        $event->save();
        if($request->logo){
            $this->storeLogo($request,$event);
        }
        return redirect('/');
    }


}
