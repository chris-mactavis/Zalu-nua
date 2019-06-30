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

<div class="row">
    <div class="col-md-12">
      <div class="white-box">
          <div class="row">
              <div class="col-md-10">
                  <div class="btn-wrap">
                      <div class="top-btn">
                          
                      </div>
                  </div>
              </div>

              <div class="col-md-6">
                  <div class="btn-wrap">
                      <div class="top-btn">
                          <a href="#" data-target="#add-zone" data-toggle="modal" class="btn btn-primary">Add Zone</a>
                          <a href="/admin/shipping-zones/manage" class="btn btn-primary">Manage Zones</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
</div>

@stop