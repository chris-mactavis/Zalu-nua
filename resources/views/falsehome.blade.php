<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
?>

@extends('layouts.altlayout')

@section('content')

<div class="container">
		
	<section id="grid_box" class="pt20">
		<div class="row">
			<div class="col-md-12">
				<div class="false_home_content">
					<div class="false_logo">
						<img src="{{ asset('images/zalu-nua-logo.png') }}" alt="">
					</div>
					<h2>Website Is Being Updated</h2>
					<p>We are currently updating our website. We will be back shortly</p>
				</div>
			</div>
		</div>
	</section>

</div>

@stop