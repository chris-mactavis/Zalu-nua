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
				<h2 class="page_title">{{ $department->department_name }}</h2>
			</div>

			<div class="col-md-5">
				<div class="sort">
					<span class="title">Sort by:</span>
                    <a class="item" href="{{ route('products.department', 
                        ['department_url'=>$department->department_url, 'sort' => 'newest']) }}">
                        New in
                    </a>

					<a class="item" href="{{ route('products.department', 
                        ['department_url'=>$department->department_url, 'sort' => 'high-to-low']) }}">
                        Price high to low
                    </a>

					<a class="item" href="{{ route('products.department', 
                        ['department_url'=>$department->department_url, 'sort' => 'low-to-high']) }}">
                        Price low to high</a>
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
							@if(isset($categories) && $categories->count() > 0)
								@foreach($categories as $cat)
								<li>
									<a href="{{ route('products.category', 
									['department_url'=>$department->department_url, 'category_url'=>$cat->category_url, 'category_id' => $cat->category_id]) }}{{isset($_GET['sale']) ? '?sale' : ''}}">
										{{ $cat->category_name }}
									</a>
								</li>
								@endforeach
							@endif

						</ul>
					</div>

				</div>
			</div>

			<div class="col-md-9 col-sm-8 col-xs-12">
				
				<div class="content_area row">
					@if($products->count() > 0)
					<div class="content_area_ins">
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
									<p class="price">&#8358;{{ number_format($product->product_price,2) }}</p>
								</div>
							</div>
						</div>
						
						@endforeach
						<br class="clearall">
					</div>
					<div class="pagination_wrap">
						{{ $products->links() }}
					</div> 
					@else
					<div class="col-md-12">
						<p>There are currently no products in the {{ $department->department_name }} store</p>
					</div>
					@endif

				</div>
			</div>
		</div>
	</section>

</div>

@stop