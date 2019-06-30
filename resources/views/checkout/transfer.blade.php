<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
?>

@extends('layouts.mainlayout')

@section('content')

<div class="container">
    <div class="breadcrumbs"></div>

    
    <?php

    if($orders !== null) {
        $total = $orders->order_total;
        $display_total = number_format($total, 2);
        $userinfo_id = $orders->userinfo_id;
        $shipping_fee = $orders->shipping_fee;
        $discount = $orders->discount;
        $transaction_id = $orders->transaction_id;
    ?>
    <div class="top_section">
        <div class="row">
            <div class="col-md-5 col-sm-4 col-xs-12">
                <h3 class="page_title">Make Payment</h3>
            </div>
        </div>
    </div>

    <div class="content_section p30">
        <div class="cart_wrap">
            <div class="row">   
                
                <div class="col-md-6">
                    <div class="">
                        <h4>Hello, {{ Auth::user()->name }}</h4>
                        <h5>Your Transaction id is {{ $transaction_id }}</h5>
                        
                        <div class="checkout_form_btm">

                            <p>
                                You have chosen to complete your transaction by making a bank transfer. <br>
                                To complete the order please transfer the sum of &#8358;{{ $display_total }} to our bank account details displayed below:
                            </p>
                            <br>
                        </div>

                        <div class="cart_content well">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td width="30%">Bank Name</td>
                                        <td width="70%">GTBANK Plc.</td>
                                    </tr>

                                    <tr>
                                        <td>Account Name</td>
                                        <td>Zalu-Nua Enterprises</td>
                                    </tr>

                                    <tr>
                                        <td>Account Number</td>
                                        <td>0324038621</td>
                                    </tr>
 
                                </tbody>
                            </table>
                        </div>

                        <br>
                        <div class="checkout_form_btm">
                            <p>
                                After making the transfer, please an send email to info@zalu-nua.com with the following information:
                            </p>

                            <ul>
                                <li>Customer Name</li>
                                <li>Transaction id</li>
                                <li>Date of transfer</li>
                            </ul>
                        </div>
                    </div>
                    <a href="/products" class="btn btn-danger" style="margin-top: 15px">Continue Shopping</a>
                </div>
                
                <div class="col-md-5 col-md-offset-1">
                    <div class="checkout_sidebar">
                        <div class="cart_content">
                            <h4>Order Details</h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width="50%">Product</th>
                                        <th width="20%">Quantity</th>
                                        <th width="30%">Total</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $order_id = $orders->order_id;
                                    
                                    ?>
                                    @foreach($order_details as $prdt)
                                    <tr>
                                        <td>
                                            <p>{{ $prdt->products->product_name }}</p>
                                        </td>
                                        
                                        <td>
                                            <p>{{$prdt->quantity}}</p>
                                        </td>

                                        <td>
                                            <p>&#8358;{{ number_format($prdt->price,2) }}</p>
                                        </td>
                                        
                                    </tr>
                                    @endforeach

                                    <tr>
                                        <td colspan="2">SubTotal</td>
                                        
                                        <td>&#8358;{{ number_format($orders->cart_total,2) }}</td>
                                    </tr>

                                    <tr>
                                        <td colspan="2">Shipping</td>
                                        
                                        <td>&#8358;{{number_format($shipping_fee,2)}}</td>
                                    </tr>

                                    <tr>
                                        <td colspan="2">Discount</td>
                                        
                                        <td>&#8358;{{number_format($discount,2)}}</td>
                                    </tr>

                                    <tr>
                                        <td colspan="2"><h5>Total</h5></td>
                                        <td>
                                            <h5>&#8358;{{ number_format($orders->amount_paid, 2) }}</h5>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="checkout_form_itm">
                                <h4>Delivery Address</h4>
                                <?php 
                                $userinfo = DB::table('userinfos')->where('id', '=', $userinfo_id)->get()->first();
                                ?>
                                <p>{{ $userinfo->address }}</p>
                                <p>{{$userinfo->city != '' ? $userinfo->city : $userinfo->city_alt}}</p>
                                <p>
                                    <?php
                                    if($userinfo->country == 'Nigeria') {
                                        $state_id = $userinfo->state_id;
                                    
                                        echo ($userinfo->state_id . ', ' . $userinfo->country);
                                        // if($state_id !== null) {
                                        //     $state = DB::table('states')->where('id', '=', $state_id)->get()->first();
                                        //     echo ($state->state_name . ' ' . $userinfo->country);
                                        // }

                                    } else {
                                        echo ($userinfo->state_alt . ', ' . $userinfo->country);
                                    }
                                    ?> 
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
                
            </div>    
            
        </div>
    </div>

    <?php
    }
    else {
    ?>
    <div class="top_section">
        <div class="row">
            <div class="col-md-5 col-sm-4 col-xs-12">
                <h3 class="page_title">Error 404</h3>
            </div>
        </div>
    </div>

    <div class="content_section p30">
        <div class="cart_wrap">
            <div class="row">
                <div class="col-md-12">
                    <h4>Oops! Something must have gone wrong</h4>
                    <p><a href="{{ route('home') }}">Please click here to go back to he home page</a></p>
                </div>
            </div>
        </div>
    </div>

    <?php    
    }
    ?>
    

    

        
</div>

@stop