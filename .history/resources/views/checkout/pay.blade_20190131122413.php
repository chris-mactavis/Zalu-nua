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
                <h3 class="page_title">Make Payment</h3>
            </div>
        </div>
    </div>

    <div class="content_section p30">
        <div class="cart_wrap">
            <div class="row">   
                
                <div class="col-md-6">
                    <div class="">
                        
                        <?php
                            $userinfo_id = $userinfo->id;
                            $shipping_fee = $delivery_rate;
                            $total = (Cart::subtotal()) + $shipping_fee;
                            $display_total = number_format($total, 2);
                        ?>
                        <div class="checkout_form_btm">
                            <h4>Hello, {{ Auth::user()->name }}</h4>
                            <p>
                                You have chosen to complete your transaction using the paystack payment gateway. Please click on the button below and provide your card details to complete the transaction.
                            </p>
                            <div class="cart_btns">
                                <form action="{{ route('checkout.makepayment') }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="email" value="{{ Auth::user()->email }}"> 
                                    <input type="hidden" name="orderID" value="{{ $transaction_id }}">
                                    <?php
                                        $checkout_amount = $total * 100;
                                    ?>
                                    <input type="hidden" name="amount" value="{{ $checkout_amount }}">
                                    @if (!Auth::guest())
                                    <input type="hidden" name="metadata" 
                                    value="{{ json_encode($array = [
                                        'user_id' => Auth::user()->id,
                                        'transaction_id' => $transaction_id, 
                                        'cart_total' => Cart::subtotal(), 
                                        'shipping_fee' => $shipping_fee,
                                        'gt' => $checkout_amount,
                                        'userinfo_id' => $userinfo->id,
                                    ]) }}" >
                                    @endif
                                    <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> 
                                    <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}">

                                    <p>
                                      <button class="btn btn-success btn-lg" type="submit" value="Pay Now!">
                                      <i class="fa fa-plus-circle fa-lg"></i> Proceed to Payment
                                      </button>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
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
                                        <td>&#8358;{{ Cart::subtotal() }}</td>
                                    </tr>

                                    <tr>
                                        <td colspan="2">Shipping</td>
                                        <td>&#8358;{{number_format($shipping_fee,2)}}</td>
                                    </tr>

                                    <tr>
                                        <td colspan="2"><h5>Total</h5></td>
                                        <td>
                                            <h5>&#8358;{{ $display_total }}</h5>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="checkout_form_itm">
                                <h4>Delivery Address</h4>
                                <p>{{ $userinfo->address }}</p>
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

        
</div>

@stop