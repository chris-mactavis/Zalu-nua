<?php

namespace App\Http\Controllers\Admin;

use Session;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Order;

use App\Department;

class AdminOrdersController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('admin.auth:admin');
    }
    
    public function index()
    {
        $departments = Department::all();
        $orders = DB::table('orders')
            ->join('users', 'orders.customer_id', '=', 'users.id')
            ->select('orders.*', 'users.*')
            ->orderBy('orders.created_at', 'desc')
            ->paginate(20);
        
        return view('admin.orders.index')->with('orders', $orders)->with('departments', $departments);
    }

    
    
    
    public function view($id)
    {
        $order = DB::table('orders')
            ->join('order_details', 'orders.order_id', '=', 'order_details.order_id')
            ->join('users', 'orders.customer_id', '=', 'users.id')
            ->select('orders.*', 'order_details.*', 'users.name')
            ->where('orders.order_id', '=', $id)
            ->get();

        return view('admin.orders.detail')
        ->with('order', $order);
    }

    
    public function edit($id)
    {
        $order = Order::find($id);
        return view('admin.orders.edit')->with('order', $order);
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'order_status' => 'required',
        ]);

        $order = Order::find($id);  
        $order->order_status = $request->order_status;
        $order->save();

        Session::flash('success', 'You have successfully updated the order');
        return redirect()->route('admin.orders');  
    }


    public function department($department_id)
    {
        $curr_dept = Department::where('department_id', $department_id)->first();
        $departments = Department::all();
        $department_orders = DB::table('orders')
            ->join('order_details', 'orders.order_id', '=', 'order_details.order_id')
            ->join('products', 'order_details.product_id', '=', 'products.id')
            ->join('departments', 'products.department_id', '=', 'departments.department_id')
            ->select('orders.*', 'order_details.price', 'order_details.quantity', 'departments.department_name', 'products.product_name')
            ->where('departments.department_id', '=', $department_id)
            ->paginate(20);
        return view('admin.orders.department')
        ->with('department_orders', $department_orders)
        ->with('departments', $departments)
        ->with('curr_dept', $curr_dept);
    }


    public function create()
    {
        
    }

    
    public function store(Request $request)
    {
        
    }

    
    public function destroy($id)
    {
        
    }
}
