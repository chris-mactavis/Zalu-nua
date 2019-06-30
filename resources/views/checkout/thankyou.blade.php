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
                <h3 class="page_title">Transaction Successful</h3>
            </div>
        </div>
    </div>

    <div class="content_section p30">
        <div class="cart_wrap">
            <div class="row">   
                
                <div class="col-md-12">
                    <div class="">
                        

                        <div class="checkout_form_btm">
                            @if (isset($_GET['transaction_id']))
                            
                            <h5>Transaction id: {{ $_GET['transaction_id'] }}</h5>
                            
                            <?php
                            $transaction_id = $_GET['transaction_id'];
                            $orders = DB::table('orders')->where('transaction_id', '=', $transaction_id)->get();
                            $total = $orders->first()->order_total;
                            $display_total = number_format($total, 2);
                            ?>
                            
                            @endif
                            <p>
                                Thank you for purchase. The items you ordered are being packaged for shipping to your address. 
                            </p>
                            <p>
                                You will receive a confirmation email or SMS or our Customer Service might contact you shortly to verify your order. 
                            </p>
                            <br>
                        </div>

                        
                    </div>
                </div>
                
            </div>    
            
        </div>


    </div>

        
</div>

@stop