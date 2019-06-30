@extends('layouts.adminlayout')


@section('content')

<div class="page-title-box">
    <h4 class="page-title">Manage Shipping Zones</h4>
      
    <ol class="breadcrumb">
      <li>
        <a href="/admin">Dashboard</a>
      </li>

      <li class="active">
        Manage Shipping Zones
      </li>
    </ol>

    <div class="clearfix"></div>

</div>

<shipping-zones :states="{{$states}}" :zones="{{$zones}}"></shipping-zones>

<shipping-zones- :states="{{$states}}" :zones="{{$zones}}"></shipping-zones->

@stop