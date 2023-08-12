<?php

namespace App\Http\Controllers;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(){
        $this->authorize('Customer');
        $order = Order::where('user_id',auth()->user()->id)->paginate(10);
        return view('orders.index',compact('order'));
    }
    public function show($code){
        $this->authorize('Customer');
        $order = Order::where('code',$code)->first();
        return view('orders.show',compact('order'));
    }
}
