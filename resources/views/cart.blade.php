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
                <h3 class="page_title">Your Shopping Cart</h3>
            </div>
        </div>
    </div>

    <div class="content_section p30">
        <div class="cart_wrap">
            <div class="row">
            <?php
                if(Cart::content()->count() > 0) {
                ?>
                
                    <div class="col-md-8">
                        <div class="cart_content">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width="50%">Item</th>
                                        <th width="15%">Price</th>
                                        <th width="15%">Quantity</th>
                                        <th width="15%">Total</th>
                                        <th width="5%"></th>
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
                                            <p>{{$prdt->name}}</p>
                                        </td>
                                        <td>
                                            <p>&#8358;{{ number_format($prdt->price,2) }}<p>
                                        </td>
                                        <td>
                                            <div class="cart_qty">
	                                            <a href="{{ route('cart.decr', ['id'=>$prdt->rowId, 'qty'=>$prdt->qty])}}" 
	                                            	class="cart_qty_minus">-</a>
	                                            
	                                            <input type="number" name="quantity" class="cart_qty_input" value="{{ $prdt->qty }}" >
	                                            
	                                            <a href="{{ route('cart.incr', ['id'=>$prdt->rowId, 'qty'=>$prdt->qty]) }}" 
	                                            	class="cart_qty_plus">+</a>
	                                        </div>
                                        </td>

                                        <td>
                                            <p>&#8358;{{ number_format($prdt->total,2) }}</p>
                                        </td>
                                        <td>
                                            <div class="cart_del">
                                                <a href="{{ route('cart.delete', ['id'=>$prdt->rowId]) }}">&times;</a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="cart_sidebar">
                            <h4>Cart Summary</h4>
                            <p class="sub_total"> 
                                Sub-Total (
                                    {{Cart::content()->count()}} 
                                    @if (Cart::content()->count() > 1)
                                    items
                                    @else
                                    item
                                    @endif
                                    )
                            </p>
                            <p class="sub_total_fig">&#8358;{{ number_format(Cart::subtotal(), 2) }}</p>

                            <div class="cart_btns">
                                <a href="{{route('products.index')}}" class="btn btn-custom btn-continue">Continue Shopping</a>

                                <a href="{{route('checkout.index')}}" class="btn btn-custom btn-checkout">Checkout</a>
                            </div>
                        </div>
                    </div>
                
                <?php
                }
                else {
                ?>
                <div class="col-md-12">
                    <div class="cart_content">
                        <p>There are no items in your shopping cart. Please click <a href="{{ route('home') }}">
                            here to go back to the home page</a></p>
                    </div>
                </div>
                <?php
                }
            ?>
            </div>
        </div>


    </div>

        
</div>

@stop