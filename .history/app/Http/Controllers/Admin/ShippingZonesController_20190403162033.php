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
        $zones = Zone::orderBy('zone')->get();

        return view('admin.shipping_zones.index', compact('zones'));
    }

    public function store(Request $request)
    {
        return Zone::create($request->all() + [
            'created_by' => Auth::guard('admin')->id()
        ]);
    }

    public function update(Request $request, Zone $zone)
    {
        return $zone->update($request->)
    }

    public function destroy(Zone $zone)
    {
        $zone->delete();
    }

    public function manage()
    {
        $states = State::all();
        $inc = 0;

        return view('admin.shipping_zones.manage', compact('states', 'inc'));
    }
}
