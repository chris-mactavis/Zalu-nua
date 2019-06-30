<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\State;
use App\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShippingZonesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth:admin');
    }

    public function index()
    {
        return view('admin.shipping_zones.index');
    }

    public function store(Request $request)
    {
        return Zone::create($request->all() + [
            'created_by' => Auth::guard('admin')->id()
        ]);
    }

    public function manage()
    {
        $states = State::all();
        $inc = 0;

        return view('admin.shipping_zones.manage', compact('states', 'inc'));
    }
}
