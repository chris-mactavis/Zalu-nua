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
				<h2 class="page_title">New Collection</h2>
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
							@foreach($categories as $category)
							<li>
								<a href="{{ route('products.category', ['category_url'=>$category->category_url]) }}">
									{{ $category->category_name }}
								</a>
							</li>
							@endforeach
						</ul>
					</div>

					<div class="filter">
						<h4>Colour</h4>
						<ul>
							<li><label><input type="checkbox"> Black</label></li>

							<li><label><input type="checkbox"> Blue</label></li>

							<li><label><input type="checkbox"> Red</label></li>

							<li><label><input type="checkbox"> Orange</label></li>

							<li><label><input type="checkbox"> Gold</label></li>

							<li><label><input type="checkbox"> Rose gold</label></li>

							<li><label><input type="checkbox"> Silver</label></li>

							<li><label><input type="checkbox"> Brown</label></li>
						</ul>
					</div>
				</div>
			</div>

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
								<p class="price">N{{ $product->product_price }}</p>
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