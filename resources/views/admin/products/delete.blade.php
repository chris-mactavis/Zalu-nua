@extends('layouts.adminlayout')


@section('content')

<div class="page-title-box">
    <h4 class="page-title">Delete Product</h4>
      
    <ol class="breadcrumb">
      <li>
        <a href="">Dashboard</a>
      </li>

      <li>
        <a href="">Product</a>
      </li>

      <li class="active">
        Delete Product 
      </li>
    </ol>

    <div class="clearfix"></div>
</div>

<div class="row">
  <div class="col-md-12">
    
    <div class="row">
      <div class="col-md-12">
        <div class="banner_wrap">
            <div class="row">
                
                <div class="col-md-4">
                    <div class="cover"><img src="{{ $product->product_image }}" /></div>
                </div>
            </div>   
        </div>
        <div class="white-box">

          <form action="{{ route('admin.products.destroy', ['id'=>$product->id]) }}" method="post" enctype="multipart/form-data">
            
            {{ csrf_field() }}
            
            <div class="form-group">
              <label for="product_name">Product Name</label>
              <input type="text" name="product_name" class="form-control input-lg {{ $errors->has('product_name') ? ' is-invalid' : '' }}" 
              placeholder="product Name" value="{{ $product->product_name }}" /> 
              @if($errors->has('product_name'))
                <span class="invalid-feedback red">
                  <strong>{{ $errors->first('product_name') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="product_code">Product Code</label>
              <input type="text" name="product_code" class="form-control input-lg {{ $errors->has('product_code') ? ' is-invalid' : '' }}" 
              placeholder="product Name" value="{{ $product->product_code }}" /> 
              @if($errors->has('product_code'))
                <span class="invalid-feedback red">
                  <strong>{{ $errors->first('product_code') }}</strong>
                </span>
              @endif
            </div>


            <div class="btn_wrap">
              <button type="submit" class="btn btn-primary btn-lg"> Delete Product </button>
            </div>

          </form>

        </div>
      </div> <!--/.col-md-7-->
    </div> 
  </div>  
</div>


@stop