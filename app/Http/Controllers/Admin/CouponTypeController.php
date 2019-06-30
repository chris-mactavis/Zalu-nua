<?php

namespace App\Http\Controllers\Admin;

use App\CouponType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CouponTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupon_types = CouponType::orderBy('type')->get();

        return view('admin.coupon_types.index', compact('coupon_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return CouponType::create($request->all(['type']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CouponType  $couponType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CouponType $couponType)
    {
        $couponType->update(['type' => $request->type]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CouponType  $couponType
     * @return \Illuminate\Http\Response
     */
    public function destroy(CouponType $couponType)
    {
        $couponType->delete();
    }
}
