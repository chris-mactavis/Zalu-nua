<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
?>

@extends('layouts.adminlayout')


@section('content')

<style>
  .ordered_itm {
    width: 100%;
    height: auto;
    padding: 20px;
    border: solid 1px #ccc;
    margin-bottom: 30px;
  }
  
  .ordered_itm_img {
    width: 100%;
  }
  
  .ordered_itm_txt {
    
  }
</style>

<div class="page-title-box">
  <h4 class="page-title">Order Detail</h4>
  
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
            <div class="col-md-6">
              <h4>Order Summary</h4><br>
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th width="30%">Customer</th>
                      <th>{{ $order->first()->name }}</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    <tr>
                      <td width="30%">Transaction Id</td>
                      <td>{{ $order->first()->transaction_id }}</td>
                    </tr>
                    
                    <tr>
                      <td>Cart Total</td>
                      <td>&#8358;{{ $order->first()->cart_total }}</td>
                    </tr>
                    
                    <tr>
                      <td>Discount</td>
                      <td>&#8358;{{ $order->first()->discount }}</td>
                    </tr>
                    
                    <tr>
                      <td>Shipping</td>
                      <td>&#8358;{{ $order->first()->shipping_fee }}</td>
                    </tr>
                    
                    <tr>
                      <td>Order Total</td>
                      <td>&#8358;{{ $order->first()->order_total }}</td>
                    </tr>
                    
                    <tr>
                      <td>Payment method</td>
                      <td>{{ $order->first()->payment_method }}</td>
                    </tr>
                    
                    <tr>
                      <td>Status</td>
                      <td>{{ $order->first()->order_status }}</td>
                    </tr>
                    
                    <tr>
                      <td>Currency</td>
                      <td>{{ $order->first()->currency }}</td>
                    </tr>
                    
                    {{-- <tr>
                      <td>Fees</td>
                      <td>&#8358;{{ $order->first()->fees }}</td>
                    </tr> --}}
                    
                    <tr>
                      @php
                      $userinfo = App\UserInfo::find($order->first()->userinfo_id);
                      @endphp
                      <td>Address</td>
                      <td>{{$userinfo->address}},
                        <br> {{$userinfo->lgas->city}}, {{$userinfo->country}}
                      </td>
                    </tr>

                    <tr>
                      <td>Order Note</td>
                    </tr>
                    
                  </tbody>
                </table>
              </div>
            </div>
            
            <div class="col-md-6">
              <h4>Items Ordered</h4><br>
              <div class="table-responsive">
                
                <?php 
                $order_id = $order->first()->order_id;
                $products = DB::table('order_details')
                ->join('products', 'order_details.product_id', '=', 'products.id')
                ->where('order_details.order_id', '=', $order_id)
                ->select('order_details.*', 'products.product_image', 'products.product_name', 'products.product_price')
                ->get();
                
                ?>
                @foreach($products as $product)
                
                <div class="ordered_itm">
                  <div class="row">
                    
                    <div class="col-md-4">
                      <div class="ordered_itm_img">
                        <img src="{{ asset($product->product_image) }}">
                      </div>
                    </div>
                    <?php $var = unserialize($product->variants);
                    ?>
                    <div class="col-md-8">
                      <div class="ordered_itm_txt">
                        <h4><a href="">{{ $product->product_name }}</a></h4>
                        <p>Price: &#8358;{{ number_format($product->product_price, 2) }}</p>
                        <p>Quantity: {{ $product->quantity }}</p>
                        <p><b>Variants: </b> 
                          
                          @foreach($var as $key => $val)
                          <span><b>{{$key}}:</b></span> {{$val}} &nbsp;
                          @endforeach
                        </p>
                        <p><b>Total: &#8358;{{ number_format(($product->price * $product->quantity), 2) }}</b></p>
                      </div>
                    </div>
                    
                  </div>
                </div>
                
                @endforeach
              </div>
            </div>
          </div> 
          
          <div class="row">
            <div class="col-md-12">
              <div class="bottom_button_wrap">    
                <div class="row">
                  <div class="col-md-6">
                    <a href="{{route('admin.orders')}}" class="btn btn-info">Back to Orders</a>
                  </div>
                  
                  <div class="col-md-6 text-right">
                    <a href="{{route('admin.orders.edit', ['id'=>$order->first()->order_id])}}" class="btn btn-success">Update Order</a>
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