<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Country;
use App\Http\Controllers\Controller;
use App\ShippingZone;
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
        $zones = Zone::leftJoin('shipping_zones as sz', 'sz.zone_id', 'zones.id')
            ->leftJoin('states as s', 's.id', 'sz.state_id')
            ->leftJoin('countries as c', 'c.id', 'sz.country_id')
            ->select('zones.*', 's.state_name', 'c.country_name')
            ->orderBy('zones.zone')
            ->get();

        $zones = $zones->groupBy('zone');

        return view('admin.shipping_zones.index', compact('zones'));
    }

    public function store(Request $request)
    {
        Zone::create($request->all() + [
            'created_by' => Auth::guard('admin')->id()
        ]);

        $zones = Zone::leftJoin('shipping_zones as sz', 'sz.zone_id', 'zones.id')
            ->leftJoin('states as s', 's.id', 'sz.state_id')
            ->select('zones.*', 's.state_name')
            ->orderBy('zones.zone')
            ->get();

        return $zones->groupBy('zone');
    }

    public function update(Request $request, Zone $zone)
    {
        $zone->update([
            'zone' => $request->zone,
            'rate' => $request->rate
        ]);
    }

    public function destroy(Zone $zone)
    {
        ShippingZone::whereZoneId($zone->id)->delete();
        $zone->delete();
    }

    public function manage()
    {
        $states = State::with('zone.zone')->get();
        $cities = City::orderBy('city')->get();
        $inc = 0;
        $zones = Zone::orderBy('zone')->get();

        $countries = Country::with('zone.zone')->where('country_name', '!=', 'Nigeria')->get();

        return view('admin.shipping_zones.manage', compact('states', 'inc', 'zones', 'countries', 'cities'));
    }

    public function addCities(Request $request)
    {
        $city = [];
        foreach ($request->states as $state) {
            $city[] = State::whereStateName($state)->first()->id;
        }

        foreach ($city as $state_id) {
            $query = ShippingZone::whereStateId($state_id);
            if ($query->exists()) {
                $query->update([
                    'zone_id' => $request->zone,
                    'state_id' => $state_id,
                ]);
            } else {
                ShippingZone::create([
                    'zone_id' => $request->zone,
                    'state_id' => $state_id,
                    'created_by' => Auth::guard('admin')->id()
                ]);
            }
        }
        return State::with('zone.zone')->get();
    }

    public function addStates(Request $request)
    {
        $state_ids = [];
        foreach ($request->states as $state) {
            $state_ids[] = State::whereStateName($state)->first()->id;
        }

        foreach ($state_ids as $state_id) {
            $query = ShippingZone::whereStateId($state_id);
            if ($query->exists()) {
                $query->update([
                    'zone_id' => $request->zone,
                    'state_id' => $state_id,
                ]);
            } else {
                ShippingZone::create([
                    'zone_id' => $request->zone,
                    'state_id' => $state_id,
                    'created_by' => Auth::guard('admin')->id()
                ]);
            }
        }
        return State::with('zone.zone')->get();
    }

    public function addCountries(Request $request)
    {
        $country_ids = [];
        foreach ($request->countries as $country) {
            $country_ids[] = Country::whereCountryName($country)->first()->id;
        }

        foreach ($country_ids as $country_id) {
            $query = ShippingZone::whereCountryId($country_id);
            if ($query->exists()) {
                $query->update([
                    'zone_id' => $request->zone,
                    'country_id' => $country_id,
                ]);
            } else {
                ShippingZone::create([
                    'zone_id' => $request->zone,
                    'country_id' => $country_id,
                    'created_by' => Auth::guard('admin')->id()
                ]);
            }
        }
        return Country::with('zone.zone')->get();
    }
}
