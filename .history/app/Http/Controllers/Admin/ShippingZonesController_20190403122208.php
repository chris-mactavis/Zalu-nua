<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShippingZonesController extends Controller
{
    public function index()
    {
    public function __construct()
    {
        $this->middleware('admin.auth:admin');
    }
    }
}
