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
                      <td>&#8358;{{ number_format($order->first()->cart_total, 2) }}</td>
                    </tr>
                    
                    <tr>
                      <td>Discount</td>
                      <td>&#8358;{{ number_format($order->first()->discount, 2) }}</td>
                    </tr>
                    
                    <tr>
                      <td>Shipping</td>
                      <td>&#8358;{{ number_format($order->first()->shipping_fee, 2) }}</td>
                    </tr>
                    
                    <tr>
                      <td>Order Total</td>
                      <td>&#8358;{{ number_format($order->first()->order_total, 2) }}</td>
                    </tr>
                    
                    <tr>
                      <td>Payment method</td>
                      <td>{{ ucfirst($order->first()->payment_method) }}</td>
                    </tr>
                    
                    <tr>
                      <td>Status</td>
                      <td>{{ ucfirst($order->first()->order_status) }}</td>
                    </tr>
                    
                    <tr>
                      <td>Currency</td>
                      <td>{{ ucfirst($order->first()->currency) }}</td>
                    </tr>
                    
                    {{-- <tr>
                      <td>Fees</td>
                      <td>&#8358;{{ $order->first()->fees }}</td>
                    </tr> --}}
                    
                    <tr>
                      @php
                      $userinfo = App\UserInfo::whereId($order->first()->userinfo_id)->latest()->first();
                      // var_dump($userinfo); exit;
                      @endphp
                      <td>Address</td>
                      <td>{{$userinfo->address}},
                        {{App\City::find($userinfo->lga) ? App\City::find($userinfo->lga)->city : ($userinfo->city != '' ? $userinfo->city: $userinfo->city_alt)}}, {{$userinfo->country}}
                        
                      </td>
                    </tr>

                    <tr>
                      <td>Order Note</td>
                      <td>
                        {{$order->first()->note}}
                      </td>
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
                ->select('order_details.*', 'products.product_image', 'products.product_name', 'products.product_price', 'products.discount_price', 'products.sale')
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
                    
                    <div class="col-md-8">
                      <div class="ordered_itm_txt">
                        <h4><a href="">{{ $product->product_name }}</a></h4>
                        <p>Price: &#8358;{{ number_format($product->sale == 'yes' ? $product->discount_price : $product->product_price, 2) }}</p>
                        <p>Quantity: {{ $product->quantity }}</p>
                        <p><b>Variants: </b> 
                          @if($product->variants)
                          <?php $var = unserialize($product->variants);?>
                          @foreach($var as $key => $val)
                          <span><b>{{$key}}:</b></span> {{ucfirst($val)}} &nbsp;
                          @endforeach
                          @endif
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