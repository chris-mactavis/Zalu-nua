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
                <h3 class="page_title">Confirm Checkout</h3>
            </div>
        </div>
    </div>

    <div class="content_section p30">
        <div class="cart_wrap">
            <div class="row">   
                
                <div class="col-md-12">
                    <div class="cart_content">
                        <h4 class="light">Hello, {{ Auth::user()->name }}</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th width="15%"></th>
                                    <th width="45%">Product</th>
                                    <th width="20%">Quantity</th>
                                    <th width="20%">Total</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach(Cart::content() as $prdt)
                                <tr>
                                    <td>
                                        <a href="{{ route('products.view', ['slug' => $prdt->model->slug]) }}">
                                            <div class="cart_img">
                                                <img src="{{ $prdt->model->product_image }}">
                                            </div>
                                        </a>
                                    </td>

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
                                    <td></td>
                                    <td colspan="2"><h5>Total</h5></td>
                                    <td>
                                        <?php
                                            $total = Cart::subtotal();
                                            $display_total = number_format($total, 2);
                                        ?>
                                        <h5>&#8358;{{ $display_total }}</h5>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="cart_btns">
                        <a href="{{route('cart')}}" class="btn btn-custom btn-continue">Back to Cart</a>

                        <a href="{{route('checkout.delivery')}}" class="btn btn-custom btn-checkout">Continue to Checkout</a>
                    </div>
                </div>
          
            </div>    
            
        </div>


    </div>

        
</div>

@stop