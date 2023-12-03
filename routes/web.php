<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Event;
use App\Models\User;
use App\Models\Category;
use App\Http\Contorllers;

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
Route::post('/filter',[\App\Http\Controllers\EventController::class, 'indexWithFilters'])->name('filter_events');
Route::get('/home',[\App\Http\Controllers\EventController::class, 'index'])->name('all_events');
Route::get('/my/events',[\App\Http\Controllers\EventController::class, 'all_my'])->name('all_my_events');


Route::post('/order/add', [\App\Http\Controllers\OrderController::class, 'add'])-> name('basket_add');
Route::get('/order/{user}', [\App\Http\Controllers\OrderController::class, 'show'])-> name('basket');

Route::get('/profile/{user}', function($user){
    //dd($user_id);
    return response('This will be profile of user with id ' . $user);
})->where('user_id', '^[0-9]+$');

Route::post('/registration',[\App\Http\Controllers\UserController::class, 'registration'])->name('registration');
Route::post('/events/add',[\App\Http\Controllers\EventController::class, 'add'])->name('add_event');
Route::get('/events/moderate',[\App\Http\Controllers\EventController::class, 'show_moderator'])->name('event_moderate');
Route::post('/',[\App\Http\Controllers\UserController::class, 'login'])->name('login');
Route::get('/events/{event}', [\App\Http\Controllers\EventController::class, 'show'])->name('event_detail');
Route::post('/edit_event',[\App\Http\Controllers\EventController::class, 'edit'])->name('edit_event');
Route::get('/edit_event/{event}',[\App\Http\Controllers\EventController::class, 'edit_show'])->name('edit_event_show');
Route::get('/logout', [\App\Http\Controllers\UserController::class, 'logout'])->name('logout');
//Route::get('/edit_user', [\App\Http\Controllers\UserController::class, 'edit_show'])->name('edit_show');
Route::get('/user/password/{user}', [\App\Http\Controllers\UserController::class, 'edit_password_show'])->name('edit_password_show');
Route::post('/edit_user',[\App\Http\Controllers\UserController::class, 'edit'])->name('edit_user');
Route::post('/edit_password',[\App\Http\Controllers\UserController::class, 'edit_password'])->name('edit_password');
Route::post('/user/password',[\App\Http\Controllers\UserController::class, 'edit_password_admin'])->name('edit_password_admin');
Route::get('/user/role/{user}',[\App\Http\Controllers\UserController::class, 'edit_role_show'])->name('edit_role_show');
Route::post('/user/role',[\App\Http\Controllers\UserController::class, 'edit_role_admin'])->name('edit_role');
Route::get('/user_delete/{user}',[\App\Http\Controllers\UserController::class, 'user_soft_delete'])->name('user_soft_delete');
Route::get('/user_restore/{user}',[\App\Http\Controllers\UserController::class, 'user_restore'])->name('user_restore');
Route::get('/users',[\App\Http\Controllers\UserController::class, 'index'])->name('all_users');
Route::post('/category/edit',[\App\Http\Controllers\CategoryController::class, 'edit_category'])->name('edit_category');
Route::get('/categ_app/{categ}',[\App\Http\Controllers\CategoryController::class, 'approve'])->name('categ_approve');
Route::get('/categ_dec/{categ}',[\App\Http\Controllers\CategoryController::class, 'decline'])->name('categ_decline');
Route::get('/categories/new', [\App\Http\Controllers\CategoryController::class, 'new'])->name('show_create_category');
Route::get('/categories',[\App\Http\Controllers\CategoryController::class, 'index'])->name('all_categories');
Route::get('/categories/{categ}', [\App\Http\Controllers\CategoryController::class, 'allExceptSelf'])->name('select_categories');

Route::post('/categories/create',[\App\Http\Controllers\CategoryController::class, 'add'])->name('add_category');
Route::get('/events/approve/{event}',[\App\Http\Controllers\EventController::class, 'approve'])->name('event_approve');
Route::get('/events/decline/{event}',[\App\Http\Controllers\EventController::class, 'decline'])->name('event_decline');
Route::get('/events/request/{event}',[\App\Http\Controllers\EventController::class, 'request'])->name('event_request');
Route::delete('/events/type/{type}',[\App\Http\Controllers\PriceTypeController::class, 'delete'])->name('delete_price_type');
Route::post('/events/type',[\App\Http\Controllers\PriceTypeController::class, 'create_type'])->name('add_price_type');


Route::get('/venues/create/form',[\App\Http\Controllers\VenueController::class, 'add_show'])->name('add_venue_show');
Route::post('/venues/create',[\App\Http\Controllers\VenueController::class, 'add'])->name('add_venue');
Route::post('/venues/edit',[\App\Http\Controllers\VenueController::class, 'edit_venue'])->name('edit_venues');
Route::get('/venues/image/{venue}',[\App\Http\Controllers\VenueController::class, 'add_image_show'])->name('add_image_show');
Route::post('/venues/image',[\App\Http\Controllers\VenueController::class, 'storeImage'])->name('add_image');
Route::get('/venues/edit/{venue}',[\App\Http\Controllers\VenueController::class, 'edit_show'])->name('edit_venues_show');
Route::get('/venues/approve/{venue}',[\App\Http\Controllers\VenueController::class, 'approve'])->name('venue_approve');
Route::get('/venues/decline/{venue}',[\App\Http\Controllers\VenueController::class, 'decline'])->name('venue_decline');
Route::get('/venues/moderate',[\App\Http\Controllers\VenueController::class, 'show_moderator'])->name('venues_moderate');
Route::get('/venues',[\App\Http\Controllers\VenueController::class, 'index'])->name('all_venues');
Route::get('/venues/{venue}',[\App\Http\Controllers\VenueController::class, 'show'])->name('venue_detail');

/*Route::get('/event/ratings/{rating}',[\App\Http\Controllers\RatingController::class, 'event_ratings'])->name('event_ratings');*/
Route::delete('/ratings/delete/{rating}', [\App\Http\Controllers\RatingController::class, 'delete'])->name('delete_rating');
Route::get('/ratings/{rating}',[\App\Http\Controllers\RatingController::class, 'edit_show'])->name('edit_rating_show');
Route::post('/ratings/edit',[\App\Http\Controllers\RatingController::class, 'edit'])->name('edit_rating');
Route::post('/ratings', [\App\Http\Controllers\RatingController::class, 'store'])->name('ratings.store');

Route::get('/orders', [\App\Http\Controllers\OrderController::class, 'show'])->name('show_orders');
Route::get('/order_pay/{order_id}', [\App\Http\Controllers\OrderController::class, 'pay'])->name('order_pay');
Route::get('/order_delete/{order_id}', [\App\Http\Controllers\OrderController::class, 'delete'])->name('order_delete');
