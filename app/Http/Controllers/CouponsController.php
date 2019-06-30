<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;

class CouponsController extends Controller
{
    public function verify(Request $request)
    {
        return Coupon::whereCode($request->couponCode)->first();
    }
}
