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
        return view('events.event', [
            'event' => $event
        ]);
    }

    public function create(){
        return view('events.create');
    }

    public function add(Request $request){

        $form_fields = $request->validate([
            'name' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            //'venue_id' => 'required',
            'website' => ['nullable','regex:/^(https?:\/\/)([\da-z.-]+)\.([a-z.]{2,6})([\/\w .-]*)*\/?$/i'],
            'capacity',
            'description'
        ]);

        Event::create($form_fields);
        return redirect('/');
    }
}
