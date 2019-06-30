<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
?>

@extends('layouts.mainlayout')

@section('content')

<div class="container">
    <div class="breadcrumbs">
        
    </div>

    <div class="top_section">
        <div class="row">
            <div class="col-md-5 col-sm-4 col-xs-12">
                <h3 class="page_title">Checkout</h3>
            </div>
        </div>
    </div>

    <div class="content_section p30">
        <div class="cart_wrap">
            <div class="row">   
                <?php
                $state_id = $userinfo->state_id;
                $shipping_fee = $delivery_rate;
                ?>
                <div class="col-md-8">
                    <div class="cart_content">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th width="50%">Product</th>
                                    <th width="20%">Quantity</th>
                                    <th width="30%">Total</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach(Cart::content() as $prdt)
                                <tr>
                                    <td>
                                        <p>{{$prdt->name}}</p>
                                        <p>&#8358;{{ number_format($prdt->price,2) }}<p>
                                    </td>
                                    
                                    <td>
                                        <p>{{$prdt->qty}}</p>
                                    </td>

                                    <td>
                                        <p>&#8358;{{ number_format($prdt->total,2) }}</p>
                                    </td>
                                    
                                </tr>
                                @endforeach

                                <tr>
                                    <td colspan="2">SubTotal</td>
                                    <td>&#8358;{{ number_format(Cart::subtotal(),2) }}</td>
                                </tr>

                                <tr>
                                    <td colspan="2">Shipping Fees</td>
                                    <td>&#8358;{{number_format($shipping_fee,2)}}</td>
                                </tr>

                                <tr>
                                    <td colspan="2">Discount</td>
                                    <td>&#8358;{{number_format($discount,2)}}</td>
                                </tr>

                                <tr>
                                    <td colspan="2"><h5>Total</h5></td>
                                    <td>
                                        <?php
                                            $total = (Cart::subtotal()) + $shipping_fee - $discount;
                                            $display_total = number_format($total, 2);
                                        ?>
                                        <h5>&#8358;{{ $display_total }}</h5>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

              
                <div class="col-md-4">
                    <div class="checkout_sidebar">
                        <h4 class="light">{{ Auth::user()->name }}</h4>

                        <div class="checkout_form_itm">
                            <p>Delivery Address</p>
                            <p>{{ $userinfo->address }}</p>
                            <p>
                            <?php
                                echo $userinfo->state_id != '' ? $userinfo->state_id : $userinfo->state_alt;
                                $userinfo_id = $userinfo->id;
                            ?>
                            </p>
                            <p>{{$userinfo->country}}</p>
                        </div>

                        

                        <div class="checkout_form_btm">
                            <p>Select Payment Method</p>

                            <div class="payment_option">
                                <a href="{{ route('checkout.pay', ['userinfo_id'=>$userinfo_id]) }}" class="rave_btn">
                                    Pay with Rave
                                </a>
                            </div>

                            <div class="payment_option">
                                <form action="{{ route('checkout.dotransfer') }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="userinfo_id" value="{{ $userinfo_id }}">

                                    <input type="hidden" name="cart_total" value="{{ Cart::subtotal() }}">

                                    <input type="hidden" name="discount" value="0">

                                    <input type="hidden" name="order_total" value="{{ $total }}">

                                    <input type="hidden" name="shipping_fee" value="{{ $shipping_fee }}">

                                    <input type="hidden" name="discount" value="{{ $discount }}">

                                    <p>
                                      <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">
                                       Bank Transfer
                                      </button>
                                    </p>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            
            
            </div>    
            
        </div>


    </div>

        
</div>

@stop