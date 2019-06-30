<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
?>

@extends('layouts.mainlayout')

@section('content')

<div class="container">
		
	<section id="grid_box" class="pt20">
		<div class="row">
			<div class="col-md-8 col-sm-6 col-xs-12">
				
				<div class="big_box">
					<div class="banner">
			            <div class="slider-wrapper theme-default">
			                <div id="homeslider" class="nivoSlider">
			                    @foreach($sliders as $slider)
			                    <img src="{{ $slider->image }}" />
			                    @endforeach
			                </div>
			            </div>
					</div>
				</div>


				<div class="article_section">
					
					<div class="row">
						
						@foreach($index_stores as $dept)
						
						<div class="col-md-6">
							<div class="articles">
								<div class="article_img">
									<img src="{{ $dept->department_banner }}" alt="" />
								</div>
								<h4>{{ $dept->department_name }}</h4>
								<div class="btn_wrap">
									<a href="{{ route('products.department', ['department_url'=> $dept->department_url]) }}">
										Enter Store
									</a>
								</div>
							</div>
						</div>

						@endforeach

					</div>
				</div>
			</div>

			<div class="col-md-4 col-sm-6 col-xs-12">
				<div class="product_category">
					<h3 class="caps mb20 light">Hot jewellery to buy now</h3>

					<div class="prdt_cat">
						
						@foreach($categories as $category)
						<?php 
						$cat_department_id = $category->department_id;
						$depart = DB::table('departments')->where('department_id', '=', $cat_department_id)->get()->first();
						?>
						<div class="prdt_cat_itm">
							<div class="prdt_cat_itm_img">
								<a href="{{ route('products.category', [
									'department_url' => $depart->department_url, 
									'category_url' => $category->category_url,
									'category_id' => $category->category_id
									]) }}">
									<img src="{{ $category->cover_image }}" />
								</a>
							</div>
							<h4 class="light">{{ $category->category_name }} from {{ $depart->department_name }}</h4>
							<div class="btn_wrap">
								<a href="{{ route('products.category', [
									'department_url' => $depart->department_url, 
									'category_url' => $category->category_url,
									'category_id' => $category->category_id
									]) }}">
								See them all
								</a>
							</div>
						</div>
						@endforeach
						
					</div>
				</div>
			</div>
		</div>
	</section>


	<section id="index_products" class="p50">
		<h5 class="caps light spaced_text">Our Featured Products</h5>

		<div class="index_product_wrap">
			<div id="product_slider" class="owl-carousel">
				@foreach($feat_products as $product)
				<div class="prdt_itm">
					<div class="prdt_itm_img">
						<a href="{{ route('products.view', ['slug'=>$product->slug]) }}">
							<img src="{{ $product->product_image }}">
						</a>
					</div>
					<div class="prdt_itm_txt">
						<p class="name">{{ $product->product_name }}</p>
						<p class="price">&#8358;{{ number_format($product->product_price,2) }}</p>
					</div>
				</div>
				@endforeach

			</div>
		</div>
	</section>

</div>

@stop