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

Route::get('/events',[\App\Http\Controllers\EventController::class, 'index']);



Route::get('/basket/{user}', function($user){
    //dd($user_id);
    return response('This will be basket of user with id ' . $user);
})->name('basket');



Route::get('/profile/{user}', function($user){
    //dd($user_id);
    return response('This will be profile of user with id ' . $user);
})->where('user_id', '^[0-9]+$');

Route::get('/search',function(Request $request) {
    // search?name=Brad&city=Boston
    return $request->name . ' ' . $request->city;
});
Route::get('/registration',[\App\Http\Controllers\UserController::class, 'registration_show'])->name('registration_show');
Route::post('/registration',[\App\Http\Controllers\UserController::class, 'registration'])->name('registration');
Route::get('/login',[\App\Http\Controllers\UserController::class, 'login_show'])->name('login_show');
Route::post('/login',[\App\Http\Controllers\UserController::class, 'login'])->name('login');
Route::get('/events/create',[\App\Http\Controllers\EventController::class, 'create'])->name('eventsCreation');
Route::post('/events',[\App\Http\Controllers\EventController::class, 'add']);
Route::get('/events/{event}', [\App\Http\Controllers\EventController::class, 'show']);
Route::get('/logout', [\App\Http\Controllers\UserController::class, 'logout'])->name('logout');

