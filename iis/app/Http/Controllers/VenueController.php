<?php

namespace App\Http\Controllers;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class VenueController extends Controller
{
    public function edit_venue(Request $request){
        $venue = Venue::find($request->id);
        $form_fields = $request->validate([
            'name' => 'required',
            'description' => [],
            'street' => [],
            'street_number' => [],
            'zip_code' => [],
            'province' => [],
            'country' => [],
        ]);

        $venue->name = $request['name'];
        $venue->description = $request['description'];
        $venue->street = $request['street'];
        $venue->street_number = $request['street_number'];
        $venue->zip_code = $request['zip_code'];
        $venue->province = $request['province'];
        $venue->country = $request['country'];
        $venue->save();
        $user = Auth::user();
        if($user->role_id >= 2){
            return redirect('/venues/moderate');
        }else{
            return redirect('/venues');
        }

    }

    public function add(Request $request){
        //dd($request->logo);
        $form_fields = $request->validate([
            'name' => 'required',
            'description' => [],
            'street' => [],
            'street_number' => [],
            'zip_code' => [],
            'province' => [],
            'country' => [],
        ]);

        $venue = Venue::create($form_fields);
        $venue->save();
        return redirect()->back();
    }

    public function approve(Venue $venue){
        $venue->approved = true;
        $venue->save();
        return redirect()->back()->with('message','Approved');
    }
    public function decline(Venue $venue){
        $venue->approved = false;
        $venue->save();
        return redirect()->back()->with('message','Declined');
    }

    public function index(){
        return view('venues.venues', [
            'venues' => Venue::where('approved', true)->get()
        ]);
    }

    public function show(Venue $venue){
        $images = DB::table('venue_img')->where('venue_id',$venue->id)->get();
        return view('venues.detail', [
            'venue' => $venue,
            'images' => $images
        ]);
    }

    public function edit_show(Venue $venue){
        return view('venues.edit', [
            'venue' => $venue
        ]);
    }

    public function show_moderator(){
        $declined =  Venue::where('approved', false)->get();
        $awaiting =  Venue::where('approved', null)->get();
        $approved =  Venue::where('approved', true)->get();

        // Eager load the 'Venue' relationship
        $jsons = [$approved, $awaiting, $declined];
        Venue::whereIn('id', collect($jsons)->flatten()->pluck('id'))->get();

        return view('venues.moderator_venues', [
            'jsons' => $jsons,
        ]);
    }

}
