<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
?>

@extends('layouts.adminlayout')


@section('content')

<style>

</style>

<div class="page-title-box">
    <h4 class="page-title">View Product Gallery</h4>
      
    <ol class="breadcrumb">
      <li>
        <a href="">Dashboard</a>
      </li>

      <li class="active">
        View Product Gallery
      </li>
    </ol>

    <div class="clearfix"></div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-12">
        
        <div class="white-box">
            <div class="row">
                <div class="col-md-12">
                    <h3>{{ $product->product_name }}</h3> 
                    <div class="product_gallery well">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="product_gallery">
                                    <img src="{{ $product->product_image }}">
                                </div>
                            </div>
                            @foreach($product_galleries as $gallery)
                            <div class="col-md-3">
                                <div class="product_gallery">
                                    <img src="{{ $gallery->product_image }}">
                                    <div class="del_btn">
                                        <a href="{{ route('admin.products.remove_gallery', 
                                        ['product_id'=>$product->id, 'id'=>$gallery->id]) }}">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    
                    <div class="form">
                        <form action="{{ route('admin.products.add_gallery', ['product_id'=>$product->id]) }}" method="post" enctype="multipart/form-data">
            
                            {{ csrf_field() }}

                            
                            <div class="form-group">
                              <label for="product_image">Add Product Image</label>
                              <div class="row">
                                <div class="col-md-7">
                                <input type="file" name="product_image" class="form-control input-lg {{ $errors->has('product_image') ? ' is-invalid' : '' }}" />
                                @if($errors->has('product_image'))
                                  <span class="invalid-feedback red">
                                    <strong>{{ $errors->first('product_image') }}</strong>
                                  </span>
                                @endif
                                </div>
                                <div class="col-md-5"><button type="submit" class="btn btn-primary btn-lg" style="display:inline-block;"> Add Image </button></div>
                              </div>
                            </div>

                            <div class="btn_wrap">
                              <a href="{{route('admin.products.index')}}" class="btn btn-info btn-lg">Back to Products</a>
                              
                            </div>

                          </form>
                    </div>

                </div>

                
            </div>
        </div>
      </div> <!--/.col-md-7-->
    </div> 
  </div>  
</div>


@stop