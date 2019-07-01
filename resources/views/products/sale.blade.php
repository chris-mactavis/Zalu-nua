<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
?>

@extends('layouts.mainlayout')

@section('content')

<div class="container">

	<section id="page_top">
		<div class="row">
			<div class="col-md-7">
				<h2 class="page_title">The Discount Store</h2>
			</div>

			<div class="col-md-5">
				<div class="sort">
					<span class="title">Sort by:</span>
					<a href="#" class="item">New in</a>

					<a href="#" class="item">Price high to low</a>

					<a href="#" class="item">Price low to high</a>
				</div>
			</div>
		</div>
	</section>

	<section id="page_content">
		<div class="row">
			
			<div class="col-md-3 col-sm-4 col-xs-12">
				<div class="sidebar">
					<div class="product_cat_title">
						<ul>
							@foreach($departments as $department)
							<li>
								<a href="{{ route('products.department', ['department_url'=>$department->department_url]) }}">
									{{ $department->department_name }}
								</a>
							</li>
							@endforeach
						</ul>
					</div>

				</div>
			</div><!-- Sidebar -->


			<div class="col-md-9 col-sm-8 col-xs-12">
				
				<div class="content_area row">
					@foreach($products as $product)
					
					<div class="col-md-4">
						<div class="prdt_itm">
							<div class="prdt_itm_img">
								<a href="{{ route('products.view', ['slug'=>$product->slug]) }}">
									<img src="{{ $product->product_image }}">
								</a>
							</div>
							<div class="prdt_itm_txt">
								<p class="name">{{ $product->product_name }}</p>
								<p class="price discount">&#8358;{{ number_format($product->discount_price, 2) }}</p>
								<p class="price">&#8358;{{ number_format($product->product_price, 2) }}</p>
							</div>
						</div>
					</div>
					
					@endforeach
				</div>
			</div>
		</div>
	</section>

</div>

@stop