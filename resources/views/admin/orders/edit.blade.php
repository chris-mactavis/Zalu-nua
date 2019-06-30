<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
?>

@extends('layouts.adminlayout')


@section('content')

<div class="page-title-box">
    <h4 class="page-title">Update Order Status</h4>
      
    <ol class="breadcrumb">
      <li>
        <a href="">Dashboard</a>
      </li>

      <li class="active">
        order detail
      </li>
    </ol>

    <div class="clearfix"></div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-12">
        
        <div class="white-box">
          
          <div class="row">
              <div class="col-md-8">
                  <h4>Transaction id: {{ $order->transaction_id }}</h4>
                  <form action="{{ route('admin.orders.update', ['id'=>$order->order_id]) }}" method="post" enctype="multipart/form-data">
            
                    {{ csrf_field() }}

                    <div class="form-group">
                      <label for="featured">Select Order Status</label>
                      <select name="order_status" class="form-control input-lg">
                        <option value="new" <?php if($order->order_staus == 'new') { echo 'selected'; } ?>>new</option>
                        <option value="paid" <?php if($order->order_staus == 'paid') { echo 'selected'; } ?>>paid</option>
                        <option value="delivered" <?php if($order->order_staus == 'delivered') { echo 'selected'; } ?>>delivered</option>
                        <option value="cancelled" <?php if($order->order_staus == 'cancelled') { echo 'selected'; } ?>>cancelled</option>
                      </select>
                    </div>

                    <div class="btn_wrap">
                      <button type="submit" class="btn btn-primary btn-lg"> Update Status </button>
                    </div>
                  </form>
              </div>

              <div class="col-md-4">
                
              </div>
          </div> 

        </div>
      </div> <!--/.col-md-7-->
    </div> 
  </div>  
</div>


@stop