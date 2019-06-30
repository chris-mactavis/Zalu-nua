<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
?>

@extends('layouts.adminlayout')


@section('content')

<div class="page-title-box">
    <h4 class="page-title">Orders from {{ $curr_dept->department_name }}</h4>
      
    <ol class="breadcrumb">
      <li>
        <a href="">Dashboard</a>
      </li>

      <li class="active">
        Orders from {{ $curr_dept->department_name }}
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
                
                <div class="col-md-4">
                    <div class="top_search">
                      
                    </div>
                </div>

                <div class="col-md-8">
                  <div class="top_btns">
                    <a href="{{ route('admin.orders') }}" class="btn btn-info">All Orders</a>
                    
                    @foreach($departments as $department)
                    <a href="{{ route('admin.orders.department', ['department_id' => $department->department_id])}}" class="btn btn-primary">
                      {{ $department->department_name }}
                    </a>
                    @endforeach
                  </div>
                </div>

            </div>
        </div>

        <div class="white-box">
          
          <div class="table-responsive">
            
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th width="10%">Trans ID</th>
                    <th width="15%">Product Name</th>
                    <th width="10%">Price</th>
                    <th width="10%">Quantity</th>
                    <th width="10%">Sub Total</th>
                    <th width="10%">Status</th>
                    <th width="10%">Date</th>
                  </tr>
                </thead>
                
                <tbody>
                  @foreach($department_orders as $order)
                    <tr>
                      
                      <td>
                          <a href="{{ route('admin.orders.view', ['id' => $order->order_id]) }}">
                            {{ $order->transaction_id }}
                          </a>
                      </td>

                      <td>
                          {{ $order->product_name }}
                      </td>

                      <td>
                          {{ $order->price }}
                      </td>

                      <td>
                          {{ $order->quantity }}
                      </td>

                      <td>
                          {{ $order->price * $order->quantity }}
                      </td>

                      <td>
                          {{ $order->order_status }}
                      </td>

                      <td>
                          {{ date('d-m-Y', strtotime($order->created_at)) }}
                          
                      </td>

                    </tr> 
                    @endforeach
                 
                  </tbody>
            </table>
                      
          </div>
            <div class="pagination_wrap">
                {{ $department_orders->links() }}
            </div> 
        </div>
      </div> <!--/.col-md-7-->
    </div> 
  </div>  
</div>


@stop