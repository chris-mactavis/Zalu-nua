@extends('layouts.adminlayout')
@section('content')

<div class="page-title-box">
    <h4 class="page-title">Coupon Types</h4>
      
    <ol class="breadcrumb">
      <li>
        <a href="/admin">Dashboard</a>
      </li>

      <li class="active">
        Coupon Types
      </li>
    </ol>

    <div class="clearfix"></div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="row">
        <coupon-types data="{{$coupon_types}}"></coupon-types>
    </div> 
  </div>  
</div>
    

@stop