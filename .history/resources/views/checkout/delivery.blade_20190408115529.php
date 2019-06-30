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
                <h3 class="page_title">Delivery Information</h3>
            </div>
        </div>
    </div>

    <div class="content_section p30">
        <div class="cart_wrap">
            <div class="row">   
                <?php
                $state_id = $userinfo->state_id;
                ?>
                <div class="col-md-6">
                    <div class="checkout_sidebar">
                        <h4 class="light">Hello, {{ Auth::user()->name }}</h4>
                        <p>
                            To complete your transaction please confirm that you want your order delivered to the address below or select send to another address, enter the address and click continue
                        </p>

                        <form action="{{ route('checkout.docheckout') }}" method="post">
                            {{ csrf_field() }}
                            <div class="checkout_form_itm">
                                <p class="form_label">
                                    <input type="radio" id="primary-address" name="delivery_address" value="default" onclick="show1();">
                                    <label for="primary-address">Primary Delivery Address</label>
                                </p>
                                <div class="form_ins">
                                    <p>{{ $userinfo->address }}</p>
                                    <p>{{ $userinfo->city }}</p>
                                    <p>
                                        <?php
                                        $state_id = $userinfo->state_id;
                                        $state = DB::table('states')->where('id', '=', $state_id)->get()->first();
                                        echo $state->state_name;
                                        ?> 
                                    </p>
                                </div>
                            </div>

                            <div class="">
                                <p class="form_label">
                                    <input type="radio" name="delivery_address" id="new-address" value="new" onclick="show2();">
                                    <label for="new-address">A New Address</label>
                                </p>
                            </div>
                            <div class="hidden_form" id="hidden_form">
                                <div class="form-group">
                                    <label for="new_address" class="label">Address</label>
                                    <input id="new_address" type="text" class="form-control" name="new_address" >
                                </div>

                                <div class="form-group" id="country-group">
                                    <label for="country_id" class="label">Country</label>
                                    <select name="country_id" class="form-control">
                                        <option value="">Select Country</option>

                                        <?php
                                        $ng_country = DB::table('countries')->whereCountryName('Nigeria')->first();
                                        ?>

                                        <option value="{{$ng_country->id}}">{{$ng_country->country_name}}</option>
                                        @foreach($countries as $country)
                                        <option value="{{ $country->country->id }}">{{ $country->country->country_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group" id="state-group">
                                    <label for="state" class="label">State</label>
                                    <select name="state" class="form-control">
                                        <option value="">Select State</option>
                                        @foreach($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->state_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="city" class="label">City</label>
                                    <input id="city" type="text" class="form-control" name="city" >
                                </div>

                                <div class="form-group" id="lga-group">
                                    <label for="lga" class="label">LGA</label>
                                    <select name="lga" class="form-control">
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="phone" class="label">Phone</label>
                                    <input id="phone" type="text" class="form-control" name="phone" >
                                </div>

                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-info">
                                    Continue to Checkout
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-6">
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
                                    <td colspan="2"><h6>Shipping Fee</h6></td>
                                    <td id="shipping-fee"><h6>₦0</h6></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><h5>Total</h5></td>
                                    <td>
                                        <?php
                                            $total = Cart::subtotal();
                                            $display_total = number_format($total, 2);
                                        ?>
                                        <input type="hidden" value="{{$total}}" id="display-total">
                                        <h5>&#8358;{{ $display_total }}</h5>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                    
            </div>    
            
        </div>


    </div>

        
</div>

@stop