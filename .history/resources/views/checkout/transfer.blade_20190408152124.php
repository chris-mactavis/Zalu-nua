<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
?>

@extends('layouts.mainlayout')

@section('content')

<div class="container">
    <div class="breadcrumbs">
        
    </div>

    
    @if (isset($_GET['transaction_id']))                    
                            
    <?php
    $transaction_id = $_GET['transaction_id'];
    $orders = DB::table('orders')->where('transaction_id', '=', $transaction_id)->get()->first();

    if($orders !== null) {
        $total = $orders->order_total;
        $display_total = number_format($total, 2);
        $userinfo_id = $orders->userinfo_id;
        $shipping_fee = $orders->shipping_fee;
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
                        <h5>Your Transaction id is {{ $_GET['transaction_id'] }}</h5>
                        
                        <div class="checkout_form_btm">

                            <p>
                                You have chosen to complete your transaction by making a bank transfer. <br>
                                To complete the order please transfer the sum of {{ $display_total }} to our bank account details displayed below:
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
                                After making the transfer, please an send email to sales@zalu-nua.com with the following information:
                            </p>

                            <ul>
                                <li>Customer Name</li>
                                <li>Transaction id</li>
                                <li>Date of transfer</li>
                            </ul>
                        </div>
                    </div>
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
                                    
                                    $order_id = $orders->first()->order_id;
                                    
                                    $order_details = DB::table('order_details')
                                    ->join('products', 'order_details.product_id', '=', 'products.id')
                                    ->where('order_details.order_id', '=', $order_id)->get();

                                    
                                    ?>
                                    @foreach($order_details as $prdt)
                                    <tr>
                                        <td>
                                            <p>{{ $prdt->product_name }}</p>
                                            <p>&#8358;{{ number_format($prdt->price,2) }}<p>
                                        </td>
                                        
                                        <td>
                                            <p>{{$prdt->quantity}}</p>
                                        </td>

                                        <td>
                                            <?php 
                                                $product_total = $prdt->price * $prdt->quantity
                                            ?>
                                            <p>&#8358;{{ number_format($product_total,2) }}</p>
                                        </td>
                                        
                                    </tr>
                                    @endforeach

                                    <tr>
                                        <td colspan="2">SubTotal</td>
                                        <?php
                                        $sub_total = '';
                                        $sub_total = $product_total + (float)$sub_total;
                                        ?>
                                        <td>&#8358;{{ number_format($sub_total,2) }}</td>
                                    </tr>

                                    <tr>
                                        <td colspan="2">Shipping</td>
                                        
                                        <td>&#8358;{{number_format($shipping_fee,2)}}</td>
                                    </tr>

                                    <tr>
                                        <td colspan="2"><h5>Total</h5></td>
                                        <?php
                                        $cart_total = $sub_total + $shipping_fee;
                                        $display_total = number_format($cart_total, 2);
                                        ?>
                                        <td>
                                            <h5>&#8358;{{ $display_total }}</h5>
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
                                <p>{{ $userinfo->city }}</p>
                                <p>
                                    <?php
                                    $state_id = $userinfo->state_id;
                                    if($state_id !== null) {
                                        $state = DB::table('states')->where('id', '=', $state_id)->get()->first();
                                        echo $state->state_name;
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
    
    @endif

    

        
</div>

@stop