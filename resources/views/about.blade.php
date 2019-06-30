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
				<h2 class="page_title">About Zalu-Nua</h2>
			</div>

			<div class="col-md-5">
				
			</div>
		</div>
	</section>

	<section id="page_content">
		<div class="row">

			<div class="col-md-5 pull-right">
				<div class="about_img">
					<img src="{{ asset('images/zn_about.jpg') }}" />
				</div>
			</div>

			<div class="col-md-7 pull-left">
				<div class="about_txt">
					<h4>About Zalu-Nua</h4>
					
					<p>
						"When a piece of jewellery is displayed in a shop, surrounded by hundreds of other designs all dazzling you at the same time. It can be hard to pick out the right thing. Take that process online and you are presented with a well chosen selection of pieces tailored to your budget and style preferences -  all in a few clicks." <br>
						Culled from Independent.co.uk.
					</p>
					<p>
						Zalu-Nua aims to bring jewellery to your doorstep via their  online shop. International collaborations ensures we get the best from  all over the world. 
					</p>


					<h4>Z-N Jewellery</h4>
					<p>
						High Street favourite  pieces that won't break the bank. Paired down jewellery aesthetic. These pieces are not made with precious metals or gem stones but are unique and you will stand out wearing our pieces.
					</p>

					<h4>Zalu-Nua Silver</h4>
					<p>
						Focuses on clean lines and well made  jewellery from good quality materials. No compromise on the quality of stones used to make these lovely pieces. Covering everything from necklaces to bracelets to rings.  These are own-brand products.
					</p>


					<h4>The Collection</h4>
					<p>
						Demi-fine contemporary jewellery designed for everyday use and for special occasions. These pieces are  playfully refined for a unique look. They are sourced from different locations.
					</p>
					<br><br>

				</div>
			</div>

		</div>
	</section>

</div>

@stop