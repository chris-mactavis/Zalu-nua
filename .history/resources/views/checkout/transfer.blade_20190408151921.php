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