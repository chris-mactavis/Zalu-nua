<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
?>

@extends('layouts.main-layout')

@section('content')

<div class="container">
		
	<section id="grid_box" class="pt20">
		<div class="row">
			<div class="col-md-8 col-sm-6 col-xs-12">
				
				<div class="big_box">
					<div class="banner">
			            <div class="slider-wrapper theme-default">
			                <div id="homeslider" class="nivoSlider">
			                    
			                    <img src="{{ asset('images/banner01.jpg') }}" />
			                    
			                </div>
			            </div>
					</div>
				</div>


				<div class="article_section">
					<h5 class="caps light spaced_text">Latest Articles</h5>

					<div class="row">
						@foreach($articles as $article)
						<div class="col-md-6">
							<div class="articles">
								<div class="article_img"><img src="{{ $article->banner }}" alt="" /></div>
								<h4>{{ $article->title }}</h4>
								<div class="excert">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidid 
								</div>
								<div class="btn_wrap">
									<a href="#" class="">Read more</a>
								</div>
							</div>
						</div>

						@endforeach

					</div>
				</div>
			</div>

			<div class="col-md-4 col-sm-6 col-xs-12">
				<div class="product_category">
					<h3 class="caps mb20 light">Hot jewelry to buy now</h3>

					<div class="prdt_cat">
						
						@foreach($categories as $category)
						<div class="prdt_cat_itm">
							<div class="prdt_cat_itm_img">
								<img src="uploads/neck-pieces02.jpg" />
							</div>
							<h4 class="light">Unique neck pieces for special ocassions</h4>
							<div class="btn_wrap">
								<a href="#" class="">See them all</a>
							</div>
						</div>
						@endforeach
						<!--
						<div class="prdt_cat_itm">
							<div class="prdt_cat_itm_img">
								<img src="uploads/earings02.jpg" />
							</div>
							<h4 class="light">Classy earings</h4>
							<div class="btn_wrap">
								<a href="#" class="">See them all</a>
							</div>
						</div>

						<div class="prdt_cat_itm">
							<div class="prdt_cat_itm_img">
								<img src="uploads/bracelets01.jpg" />
							</div>
							<h4 class="light">Bracelets</h4>
							<div class="btn_wrap">
								<a href="#" class="">See them all</a>
							</div>
						</div>

						<div class="prdt_cat_itm">
							<div class="prdt_cat_itm_img">
								<img src="uploads/rings02.jpg" />
							</div>
							<h4 class="light">Rings for that special someone</h4>
							<div class="btn_wrap">
								<a href="#" class="">See them all</a>
							</div>
						</div>-->
					</div>
				</div>
			</div>
		</div>
	</section>


	<section id="index_products" class="p50">
		<h5 class="caps light spaced_text">Our Featured Products</h5>

		<div class="index_product_wrap">
			<div id="product_slider" class="owl-carousel">
				
				<div class="prdt_itm">
					<div class="prdt_itm_img">
						<img src="{{ asset('uploads/product01.jpg') }}">
					</div>
					<p class="name">Veronica Beads</p>
					<p class="price">N25,000</p>
				</div>
			
				<div class="prdt_itm">
					<div class="prdt_itm_img">
						<img src="{{ asset('uploads/product02.jpg') }}">
					</div>
					<p class="name">Veronica Beads</p>
					<p class="price">N25,000</p>
				</div>
			
				<div class="prdt_itm">
					<div class="prdt_itm_img">
						<img src="{{ asset('uploads/product04.jpg') }}">
					</div>
					<p class="name">Veronica Beads</p>
					<p class="price">N25,000</p>
				</div>
			
				<div class="prdt_itm">
					<div class="prdt_itm_img">
						<img src="{{ asset('uploads/product05.jpg') }}">
					</div>
					<p class="name">Veronica Beads</p>
					<p class="price">N25,000</p>
				</div>

			</div>
		</div>
	</section>

</div>

@stop