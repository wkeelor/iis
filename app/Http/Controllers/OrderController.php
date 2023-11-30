<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Order;
use App\Models\PriceType;
use App\Models\User;
use Cassandra\Date;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function add(Request $request){
        $data = $request->validate([
            'event_id' => 'integer',
            'price_type' => 'integer',
            'amount' => 'required',
            'price' => 'integer'
        ]);

        $event = Event::where('id', $data['event_id'])->first();
        if(empty($data['price']) && $event->price_category_id == 1){
            $priceType = PriceType::where('id', $data['price_type'])->first();
            $data['price'] = $priceType->price * $data['amount'];
        }
        else{
            $data['price'] = 0;
        }

        if($data['price'] == 0){
            $data['paid'] = 1;
        }
        $data['enabled'] = 1;
        $data['user_id'] = Auth::user()->getAuthIdentifier();
        $order = new Order($data);
        $order->save();
        $event->capacity -= $data['amount'];
        return redirect()->back()->with('message', 'Účasť na udalosť bola úspešne zaregistrovaná');
    }

    public function show(){
        $userId = Auth::user()->getAuthIdentifier();
        $nowDate = date('Y-m-d H:i:s');
        $ordersWaiting = DB::table('orders')
            ->select('orders.id', 'orders.price', 'orders.amount','events.name AS event_name','categories.name AS category_name','venues.name AS venue_name', 'events.start_time', 'events.end_time', 'orders.paid', 'events.price_category_id')
            ->leftJoin('events', 'orders.event_id', '=', 'events.id')
            ->leftJoin('categories', 'events.category_id', '=', 'categories.id')
            ->leftJoin('venues', 'events.venue_id', '=', 'venues.id')
            ->where('user_id', $userId)
            ->where('orders.enabled', 1)
            ->whereDate('events.end_time', '>',  $nowDate)
            ->get();

        $ordersEnded = DB::table('orders')
            ->select('orders.id', 'orders.price', 'orders.amount','events.name AS event_name','categories.name AS category_name','venues.name AS venue_name', 'events.start_time', 'events.end_time', 'orders.paid', 'events.price_category_id')
            ->leftJoin('events', 'orders.event_id', '=', 'events.id')
            ->leftJoin('categories', 'events.category_id', '=', 'categories.id')
            ->leftJoin('venues', 'events.venue_id', '=', 'venues.id')
            ->where('user_id', $userId)
            ->where('orders.enabled', 1)
            ->whereDate('orders.paid', 1)
            ->whereDate('events.end_time', '<',  $nowDate)
            ->get();

        return view('orders.orders', [
            'ordersWaiting' => $ordersWaiting,
            'ordersEnded' => $ordersEnded,
        ]);
    }

    public function pay($orderId){
        $order = Order::where('id', $orderId)->first();
        $order->paid = 1;
        $order->save();
        return redirect()->back()->with('message', 'Lístky boli úspešne zplatené');
    }

    public function delete($orderId){
        $order = Order::where('id', $orderId)->first();
        $order->enabled = 0;
        $order->save();
        return redirect()->back()->with('message', 'Udalosť bola úspešne odregistrovaná');
    }

}
