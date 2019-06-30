
@extends('layouts.adminlayout')
@section('content')

<div class="page-title-box">
    <h4 class="page-title">Coupons</h4>
      
    <ol class="breadcrumb">
      <li>
        <a href="/admin">Dashboard</a>
      </li>

      <li class="active">
        Coupons
      </li>
    </ol>

    <div class="clearfix"></div>
</div>

<div class="row">
  <coupons-component data="{{$coupons}}" data-coupon-types="{{$coupon_types}}"></coupons-component>  
</div>


@stop