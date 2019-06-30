<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
?>

@extends('layouts.mainlayout')

@section('content')

<section id="product_detail">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="detail_img">
					
					<!-- Product image gallery goes here -->
					<div class="ubislider-image-container left" data-ubislider="#slider" id="imageSlider"></div>
					<div id="slider" class="ubislider left">
						<a class="arrow prev"></a>
						<a class="arrow next"></a>
						<ul id="gal1" class="ubislider-inner">
							
							<?php
							$product_id = $product->id;
							$product_galleries = DB::table('product_galleries')->where('product_id','=', $product_id)->get();
							?>
							<li> 
								<a> 
									<img class="product-v-img" src="{{ asset($product->product_image) }}"> 
								</a> 
							</li>
							@foreach($product_galleries as $product_gall)
							<li> 
								<a> 
									<img class="product-v-img" src="{{ asset($product_gall->product_image) }}"> 
								</a> 
							</li>
							@endforeach
						</ul>
					</div>
					<br class="clearall" >
				</div>
			</div>
			
			<div class="col-md-6">
				<div class="detail_content">
					<h2 class="product_name">{{ $product->product_name }}</h2>
					
					<p class="short_desc">
						{!! ($product->description) !!}
					</p>
					
					<p class="product_price">
						&#8358;{{ number_format($product->product_price,2) }}
					</p>
					
					<p class="product_code">
						Product code: {{ $product->product_code }}
					</p>
					
					<form action="{{ route('cart.add') }}" method="post" style="width:100%" class="add-to-cart-form">
						@if($product_variants)
						<p>
							<h6>Product Variants</h6>
							<p>please choose product variants</p>
							@foreach ($product_variants as $variant)
							<div class="form-group col-12">
								<label for="">{{$variant['variant_name']}}:</label>
								@foreach ($variant['variant_option'] as $item)

								@php
								$opt = App\ProductAttributeOption::find($item);
								var_dump($item);
								@endphp

								@if($opt)
								<input type="radio" name="variant_{{$variant['variant_name']}}" class="product-attribute-option-input" id="v-{{$item}}" value="{{$opt->option}}" required>
								<label for="v-{{$item}}" class="product-attribute-option">
									{{$opt->option}}
								</label>
								@endif
								@endforeach
							</div>
							@endforeach
							
						</p>
						@endif
						{{-- <p>
							<div class="form-group">
								<select name="product_attribute" id="" class="form-control">
									<option value="">Select product variant</option>
								</select>
							</div>
						</p> --}}
						<div class="product_btns">
							<div class="product_btn_itm">
								{{ csrf_field() }}
								
								<input type="hidden" name="product_id" value="{{ $product->id }}" >
								<input type="hidden" name="product_qty" value="1">
								{{-- <input type="hidden" name="product_variant" id="product_variant" value="{{$product->product_attributes[0]->id}}"> --}}
								<button type="submit" class="add_to_cart">Add to Cart</button>
							</div>
							<div class="product_btn_itm">
								<a href="" class="add_to_wishlist">Add to Wishlist</a>
							</div>
							
						</div>
					</form>
					
					<div class="product_long_desc">
						<h4></h4>
						<p>
							
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<section id="additional" class="pt50 pd50">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section_title"><h3>Related Products</h3></div>
			</div>
		</div>
		
		<div class="product_wrap row">
			
			@foreach($related_products as $prdt)
			<div class="col-md-3">
				<div class="prdt_itm">
					<div class="prdt_itm_img">
						<a href="{{ route('products.view', ['slug'=>$prdt->slug]) }}">
							<img src="{{ $prdt->product_image }}">
						</a>
					</div>
					<div class="prdt_itm_txt">
						<p class="name">{{ $prdt->product_name }}</p>
						<p class="price">&#8358;{{ number_format($prdt->product_price,2) }}</p>
					</div>
				</div>
			</div>
			@endforeach
			
		</div>
	</div>
</section>

@stop