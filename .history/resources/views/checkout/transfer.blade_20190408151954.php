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