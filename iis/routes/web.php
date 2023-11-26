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

Route::get('/',[\App\Http\Controllers\EventController::class, 'index']);



Route::get('/basket/{user}', function($user){
    //dd($user_id);
    return response('This will be basket of user with id ' . $user);
})->name('basket');



Route::get('/profile/{user}', function($user){
    //dd($user_id);
    return response('This will be profile of user with id ' . $user);
})->where('user_id', '^[0-9]+$');

//Route::get('/registration',[\App\Http\Controllers\UserController::class, 'registration_show'])->name('registration_show');
Route::post('/registration',[\App\Http\Controllers\UserController::class, 'registration'])->name('registration');
//Route::get('/login',[\App\Http\Controllers\UserController::class, 'login_show'])->name('login_show');

//Route::get('/events/create',[\App\Http\Controllers\EventController::class, 'create'])->name('eventsCreation');
Route::post('/events/add',[\App\Http\Controllers\EventController::class, 'add'])->name('add_event');
Route::post('/',[\App\Http\Controllers\UserController::class, 'login'])->name('login');
Route::get('/events/{event}', [\App\Http\Controllers\EventController::class, 'show'])->name('event_detail');
Route::post('/edit_event',[\App\Http\Controllers\EventController::class, 'edit'])->name('edit_event');
Route::get('/logout', [\App\Http\Controllers\UserController::class, 'logout'])->name('logout');
//Route::get('/edit_user', [\App\Http\Controllers\UserController::class, 'edit_show'])->name('edit_show');
//Route::get('/edit_password', [\App\Http\Controllers\UserController::class, 'edit_password_show'])->name('edit_password_show');
Route::post('/edit_user',[\App\Http\Controllers\UserController::class, 'edit'])->name('edit_user');
Route::post('/edit_password',[\App\Http\Controllers\UserController::class, 'edit_password'])->name('edit_password');
Route::post('/edit_password_admin',[\App\Http\Controllers\UserController::class, 'edit_password_admin'])->name('edit_password_admin');
Route::get('/users',[\App\Http\Controllers\UserController::class, 'index'])->name('all_users');

Route::post('/ratings', [\App\Http\Controllers\RatingController::class, 'store'])->name('ratings.store');