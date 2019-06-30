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
				<h2 class="page_title">Contact us</h2>
			</div>

			<div class="col-md-5">
				
			</div>
		</div>
	</section>

	<section id="page_content" class="pt30 pd50">
		<div class="row">
			<div class="col-md-4">
				<div class="contact_info">
					<!--<div class="info_itm">
						<div class="info_itm_icon"><span class="lnr lnr-home"></span></div>
						<div class="info_itm_txt">14 Keffi street, off Awolowo road, Ikoyi, Lagos</div>
					</div>-->

					<div class="info_itm">
						<div class="info_itm_icon"><span class="lnr lnr-envelope"></span></div>
						<div class="info_itm_txt">info@zalu-nua.com</div>
					</div>
					
					<div class="info_itm">
						<div class="info_itm_icon"><span class="lnr lnr-phone"></span></div>
						<div class="info_itm_txt">
							<a href="tel:+2349065615669" class="contact">+234 906 561 5669</a>, <a href="tel:+2349068530816" class="contact">+234 906 853 0816</a>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-7 col-md-offset-1">
				<div class="contact_form">
					<form action="/submitform" method="post">
						{{csrf_field()}}
						<div class="form-group">
						    <input type="text" name="full_name" class="form-control input-lg" id="name" aria-describedby="Name" 
						    placeholder="Full Name" required>
						</div>

						<div class="form-group">
						    <input type="email" name="email" class="form-control input-lg" id="email" aria-describedby="Email" 
						    placeholder="Email" required>
						</div>

						<div class="form-group">
						    <input type="text" name="phone" class="form-control input-lg" id="phone" aria-describedby="Phone" 
						    placeholder="Phone" required>
						</div>

						<div class="form-group">
						    <input type="text" name="subject" class="form-control input-lg" id="subject" aria-describedby="Subject" 
						    placeholder="Subject" required>
						</div>

						<div class="form-group">
							<textarea name="comment" class="form-control" rows="8" placeholder="Comment..."></textarea>
						</div>

						<p>
							<input type="submit" name="submit" class="btn btn-success" value="Submit">
						</p>
					</form>
				</div>
			</div>
		</div>
	</section>

</div>

@stop