<?php

namespace App\Http\Controllers;

use App\Order;

use App\OrderDetail;

use App\User;

use App\Userinfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller 
{

    public function index() {
        $user = Auth::user();
        $id = Auth::id();
        $userinfo = Userinfo::where('user_id',$id)->first();
        return view('account.index')
        ->with('user', $user)
        ->with('userinfo', $userinfo);
    }
    
    public function edit() {

    }


    public function orders() {
        $orders = Order::whereCustomerId(Auth::id())->latest()->get();

        $order_details = [];
        foreach ($orders as $order) {
            $details = OrderDetail::with('products')->where('order_id', $order->order_id)->get();

            foreach ($details as $det) {
                $det->status = $order->order_status;
                $order_details[] = $det;
            }
        }
        
        return view('account.orders', compact('orders', 'order_details'));
    }


    public function wishlist() {
    	
    }

}