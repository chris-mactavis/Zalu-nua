<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
?>

@extends('layouts.adminlayout')


@section('content')

<div class="page-title-box">
    <h4 class="page-title">Orders</h4>
      
    <ol class="breadcrumb">
      <li>
        <a href="">Dashboard</a>
      </li>

      <li class="active">
        Orders
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
                    <th width="15%">Customer</th>
                    <th width="10%">Cart Total</th>
                    <th width="10%">Discount</th>
                    <th width="10%">Order Total</th>
                    <th width="10%">Shipping</th>
                    <th width="15%">Pyt Method</th>
                    <th width="10%">Status</th>
                    <th width="10%">Date</th>
                    <th width="10%" class="text-center">Actions</th>
                  </tr>
                </thead>
                
                <tbody>
                  @foreach($orders as $order)
                    <tr>
                      
                      <td>
                          <a href="{{ route('admin.orders.view', ['id' => $order->order_id]) }}">
                            {{ $order->transaction_id }}
                          </a>
                      </td>

                      <td>
                          <a href="{{ route('admin.customers.view', ['id' => $order->customer_id]) }}">
                            {{ $order->name }}
                          </a>
                      </td>

                      <td>
                          {{ $order->cart_total }}
                      </td>

                      <td>
                          {{ $order->discount }}
                      </td>

                      <td>
                          {{ $order->order_total }}
                      </td>

                      <td>
                          {{ $order->shipping_fee }}
                      </td>

                      <td>
                          {{ $order->payment_method }}
                      </td>

                      <td>
                          {{ $order->order_status }}
                      </td>
                      
                      <td>
                          {{ $order->order_status }}
                      </td>

                      <td class="text-center">             
                        <div class="edit-btn-wrap">
                          
                            <div class="edit-btn">
                              <a href="{{ route('admin.orders.view', ['id' => $order->order_id]) }}" title="Detail">
                                <img src="{{ asset('admin_assets/images/details_icon.png') }}"/> 
                              </a>
                            </div>

                            
                            <div class="edit-btn">
                              <a href="{{ route('admin.orders.edit', ['id' => $order->order_id]) }}" title="edit">
                                <img src="{{ asset('admin_assets/images/edit_icon.png') }}"/> 
                              </a>
                            </div>
                            
                        </div>
                      </td>

                    </tr> 
                    @endforeach
                 
                  </tbody>
            </table>
                      
          </div>
            <div class="pagination_wrap">
                {{ $orders->links() }}
            </div> 
        </div>
      </div> <!--/.col-md-7-->
    </div> 
  </div>  
</div>


@stop