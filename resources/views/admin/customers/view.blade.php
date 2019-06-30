<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
?>

@extends('layouts.adminlayout')


@section('content')

<div class="page-title-box">
    <h4 class="page-title">Customers</h4>
      
    <ol class="breadcrumb">
      <li>
        <a href="">Dashboard</a>
      </li>

      <li class="active">
        Customers
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
              <div class="col-md-5">
                  <h4>Customer Details</h4><br>
                  <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th width="30%">Name</th>
                            <th>{{ $user->name }}</th>
                          </tr>
                        </thead>

                        <tbody>
                          <tr>
                            <td>Email</td>
                            <td>{{ $user->email }}</td>
                          </tr>

                          <tr>
                            <td>Phone</td>
                            <td>{{ $user->phone }}</td>
                          </tr>

                          <tr>
                            <td>Address</td>
                            <td>{{ $user->address }}</td>
                          </tr>

                          <tr>
                            <td>City</td>
                            <td>{{ $user->city }}</td>
                          </tr>

                          <tr>
                            <td>State</td>
                            <td>
                              <?php
                              if(!empty($user->state_id)) {
                                $state_id = $user->state_id;
                                $state = DB::table('states')->where('id', '=', $state_id)->get()->first();
                                echo $state->state_name;
                              }
                              ?>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                  </div>
              </div>

              <div class="col-md-7">
                  <h4>Customer Orders</h4><br>
                  <div class="table-responsive">
                      @if($orders->count() > 0)
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th width="20%">Trans Id</th>
                            <th width="">Order Total</th>
                            <th width="">Payment Method</th>
                            <th width="">Status</th>
                            <th width="">Date</th>
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
                            <td>{{ $order->order_total }}</td>
                            <td>{{ $order->payment_method }}</td>
                            <td>{{ $order->order_status }}</td>
                            <td>{{ $order->created_at }}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      @else
                      <p>There are no orders from this customer</p>
                      @endif
                      
                  </div>
              </div>
          </div> 

          <div class="row">
            <div class="col-md-12">
                <div class="bottom_button_wrap">    
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{route('admin.customers')}}" class="btn btn-info">Back to Customers</a>
                        </div>
                        
                    </div>
                </div>
            </div>
          </div>
          
        </div>
      </div> <!--/.col-md-7-->
    </div> 
  </div>  
</div>


@stop