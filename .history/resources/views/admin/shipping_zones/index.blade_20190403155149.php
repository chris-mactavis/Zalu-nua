@extends('layouts.adminlayout')

@section('content')


<div class="page-title-box">
    <h4 class="page-title">Shipping Zones</h4>
      
    <ol class="breadcrumb">
      <li>
        <a href="/admin">Dashboard</a>
      </li>

      <li class="active">
        Shipping Zones
      </li>
    </ol>

    <div class="clearfix"></div>
</div>

<zones-component all-zones=""></zones-component>

@stop