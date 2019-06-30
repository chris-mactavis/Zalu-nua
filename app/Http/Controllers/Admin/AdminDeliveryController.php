<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\URL;

use Session;

use App\DeliveryRate;

class AdminDeliveryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth:admin');
    }
    
    
    public function index()
    {
        $delivery_rates = DeliveryRate::paginate(30);
        return view('admin.delivery_rates.index')->with('delivery_rates', $delivery_rates);
    }

    
    public function create()
    {
        $states = DB::table('states')->get();
        return view('admin.delivery_rates.create')->with('states', $states);
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'state_id' => 'required',
            'rate' => 'required'
        ]);

        $delivery_rate = DeliveryRate::create([
            'state_id' => $request->state_id,
            'rate' => $request->rate,
        ]);

        //$products->save();

        Session::flash('success', 'You have successfully added a delivery location rate');

        return redirect()->route('admin.delivery_rates.index');
    }

    
    public function edit($id)
    {
        $delivery_rate = DeliveryRate::find($id);
        return view('admin.delivery_rates.edit')->with('delivery_rate', $delivery_rate);
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'state_id' => 'required',
            'rate' => 'required',
        ]);

        $delivery_rate = DeliveryRate::find($id);

        $delivery_rate->state_id = $request->state_id;
        $delivery_rate->rate = $request->rate;
        
        $delivery_rate->save();
        Session::flash('success', 'You have successfully edited the delivery rate');
        return redirect()->route('admin.delivery_rates.index');
    }

    public function delete($id)
    {
        $delivery_rate = DeliveryRate::find($id);
        $delivery_rate->delete();
        Session::flash('success', 'You have successfully deleted the delivery rate');
        return redirect()->route('admin.delivery_rates.index');
    }
}
