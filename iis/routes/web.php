<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Event;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/events', function(){
    return view('events',[
        'heading' => 'All events',
        'events' => Event::all_events()
    ]);
});

Route::get('/basket/{user_id}', function($user_id){
    //dd($user_id);
    return response('This will be basket of user with id ' . $user_id);
})->where('user_id', '[0-9]+');

Route::get('/events/{event_id}', function($event_id) {
    return view('event', [
        'event' => Event::find($event_id)
    ]);
});

Route::get('/profile/{user_id}', function($user_id){
    //dd($user_id);
    return response('This will be profile of user with id ' . $user_id);
})->where('user_id', '^[0-9]+$');

Route::get('/search',function(Request $request) {
    // search?name=Brad&city=Boston
    return $request->name . ' ' . $request->city;
});
