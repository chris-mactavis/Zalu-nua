@extends('layouts.adminlayout')


@section('content')

<div class="page-title-box">
    <h4 class="page-title">Product attributes</h4>
      
    <ol class="breadcrumb">
      <li>
        <a href="/admin">Dashboard</a>
      </li>

      <li class="active">
        Product Attributes
      </li>
    </ol>

    <div class="clearfix"></div>

</div>

<product-attributes :product-attributes=""></product-attributes>

@stop