@extends('layouts.mainlayout')

@section('content')

<div class="container">

    <section id="page_top">
        <div class="row">
            <div class="col-md-7">
                <h2 class="page_title">My Orders</h2>
            </div>

            <div class="col-md-5"></div>
        </div>
    </section>

    <section id="page_content" class="pt30 pd50">
        
        <div class="row">
            
            <div class="col-md-8">
                <div class="section_content">
                    @foreach($order_details as $detail)
                    <div class="panel panel-success">
                        <div class="panel-body">
                            <div class="order">
                                <div class="order__image"><img src="{{$detail->products->product_image}}" alt=""></div>
                                <div class="order__details">
                                    <span class="h6 order__header">{{$detail->products->product_name}} ({{$detail->products->product_code}})</span>
                                    <span class="order__date">Placed On {{date('d-m-Y', strtotime($detail->created_at))}}</span>
                                    @if($detail->status == 'new')
                                    <span class="order__status text-default">{{ucfirst($detail->status)}}</span>
                                    @elseif($detail->status == 'paid')
                                    <span class="order__status text-success">{{ucfirst($detail->status)}}</span>
                                    @elseif($detail->status == 'delivered')
                                    <span class="order__status text-success">{{ucfirst($detail->status)}}</span>
                                    @else
                                    <span class="order__status text-danger">{{ucfirst($detail->status)}}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>


            <div class="col-md-3 col-md-offset-1">
                <div class="sidebar">
                    @include('includes.user_account_sidebar')
                </div>
            </div>

        </div>

    </div>
</main>

@stop