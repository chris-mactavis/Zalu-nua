<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\URL;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\User;

use App\UserInfo;

use App\Order;

class AdminCustomersController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin.auth:admin');
    }

    public function index()
    {
        $users = DB::table('users')
            ->select('users.id', 'users.name', 'users.email', 'userinfos.phone', 'userinfos.address', 'userinfos.city', 'userinfos.state_id')
            ->join('userinfos', 'userinfos.user_id', '=', 'users.id')
            ->paginate(30);
            
        return view('admin.customers.index')->with('customers', $users);
    }

    public function view($id)
    {
        $user = DB::table('users')
            ->select('users.id', 'users.name', 'users.email', 'userinfos.phone', 'userinfos.address', 'userinfos.city', 'userinfos.state_id')
            ->join('userinfos', 'userinfos.user_id', '=', 'users.id')
            ->where('users.id', '=', $id)
            ->first();
        $orders = Order::where('customer_id', $id)->get();
        return view('admin.customers.view')->with('user', $user)->with('orders', $orders);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }





    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
