<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
?>

@extends('layouts.mainlayout')

@section('content')

<div class="container">

	<section id="page_top">
		<div class="row">
			<div class="col-md-12">
				<h2 class="page_title">{{ $page->page_title }}</h2>
			</div>
		</div>
	</section>

	<section id="page_content" class="pd30">
		<div class="row">

			<div class="col-md-9">
				{!! $page->content !!}
			</div>
			
		</div>
	</section>

</div>

@stop