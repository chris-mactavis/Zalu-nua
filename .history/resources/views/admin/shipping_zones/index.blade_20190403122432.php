@extends('layouts.adminlayout')

@section('content')


<div class="page-title-box">
    <h4 class="page-title">Delivery Rates</h4>
      
    <ol class="breadcrumb">
      <li>
        <a href="">Dashboard</a>
      </li>

      <li class="active">
        Delivery Rates
      </li>
    </ol>

    <div class="clearfix"></div>
</div>

<div class="row">
  
    <div class="col-md-12">
      <div class="white-box">
          <div class="row">
              <div class="col-md-10"></div>

              <div class="col-md-2">
                  <div class="btn-wrap">
                      <div class="top-btn">
                          <a href="{{ route('admin.delivery_rates.create') }}" class="btn btn-primary">Add New</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
</div>

@stop