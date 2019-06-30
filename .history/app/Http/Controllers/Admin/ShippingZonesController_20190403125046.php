<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\State;

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

    public function manage()
    {
        $states = State::all();

        return view('admin.shipping_zones.manage', compact('states'));
    }
}
