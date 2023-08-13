<?php

namespace App\Http\Controllers\User\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    public function index()
    {
        if( session()->has('user_id') )
        {
            $user_id = session()->get('user_id');
        }
        $orders = Order::where('user_id',$user_id)->orderBy('created_at','desc')->paginate(10);
        return view('user_layout.collection.orders.index',compact('orders'));
    }

    public function show($order_id)
    {
        $order = Order::where('id',$order_id)->first();
       return view('user_layout.collection.orders.view',compact('order'));
    }
}
