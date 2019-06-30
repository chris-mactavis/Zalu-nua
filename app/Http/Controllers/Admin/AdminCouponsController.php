<?php

namespace App\Http\Controllers\Admin;

use App\Coupon;

use App\CouponType;

use App\Http\Controllers\Controller;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Session;

class AdminCouponsController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin.auth:admin');
    }

    public function index()
    {
        $coupons = Coupon::with('type')->latest()->get();
        $coupon_types = CouponType::orderBy('type')->get();

        return view('admin.coupons.index', compact('coupons', 'coupon_types'));
    }


    public function create()
    {
        return view('admin.coupons.create');
    }


    public function store(Request $request)
    {
        if (Coupon::whereCode($request->code)->exists()) {
            return Response::json('Coupon Code exists!', 401);
        }
        $start_date_array = explode('-', $request->start_date);
        $end_date_array = explode('-', $request->end_date);
        $start_date = Carbon::create($start_date_array[0], $start_date_array[1], $start_date_array[2], 0, 0, 0);
        $end_date = Carbon::create($end_date_array[0], $end_date_array[1], $start_date_array[2], 23, 59, 0);

        $coupon = Coupon::create([
            'code' => $request->code,
            'coupon_type_id' => $request->coupon_type_id,
            'percent_discount' => $request->percent_discount,
            'amount_discount' => $request->amount_discount,
            'min_amount' => $request->min_amount,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'status' => 1
        ]);

        return Coupon::whereId($coupon->id)->get()->map(function ($x) {
            $x->type = CouponType::find($x->coupon_type_id);
            return $x;
        })[0];
    }


    public function edit($id)
    {
        $coupon = Coupon::find($id);
        return view('admin.coupons.edit')->with('coupon', $coupon);
    }


    public function update(Request $request, $id)
    {
        $coupon = Coupon::find($id);

        $start_date_array = explode('-', $request->start_date);
        $end_date_array = explode('-', $request->end_date);
        $start_date = Carbon::create($start_date_array[0], $start_date_array[1], $start_date_array[2], 0, 0, 0);
        $end_date = Carbon::create($end_date_array[0], $end_date_array[1], $start_date_array[2], 23, 59, 0);

        $coupon->code = $request->code;
        $coupon->coupon_type_id = $request->coupon_type_id;
        $coupon->percent_discount = $request->percent_discount;
        $coupon->amount_discount = $request->amount_discount;
        $coupon->min_amount = $request->min_amount;
        $coupon->start_date = $start_date;
        $coupon->end_date = $end_date;
        $coupon->save();

        return Coupon::whereId($id)->get()->map(function ($x) {
            $x->type = CouponType::find($x->coupon_type_id);
            return $x;
        })[0];
        // Session::flash('success', 'You have successfully edited the coupon');
        // return redirect()->route('admin.coupons.index');
    }

    public function destroy($id)
    {
        $coupon = Coupon::find($id);
        $coupon->delete();
    }
}
