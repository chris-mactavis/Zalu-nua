<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
?>

@extends('layouts.adminlayout')


@section('content')

<div class="page-title-box">
    <h4 class="page-title">Products</h4>
      
    <ol class="breadcrumb">
      <li>
        <a href="">Dashboard</a>
      </li>

      <li class="active">
        View Product
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
                
                <div class="col-md-9">
                    <div class="product_info">
                        <h4>{{ $product->product_name }}</h4>
                        
                        <p>Product Code: {{$product->product_code}}</p>
                        
                        <p>Product Price: {{$product->product_price}}</p>
                        
                        <p>On Sale: {{$product->sale}}</p>
                        
                        <p>Discount Price: {{$product->discount_price}}</p>
                        <?php
                            if(isset($product->brand_id) && !empty($product->brand_id)) {
                                $brand_id = $product->brand_id;
                                $brand = DB::table('brands')->where('id', '=', $brand_id)->get();
                                echo '<p>Brand: '. $brand->first()->brand_name.'</p>';
                            }
                            
                            if(isset($product->department_id) && !empty($product->department_id)) {
                                $department_id = $product->department_id;
                                $department = DB::table('departments')->where('department_id', '=', $department_id)->get();
                                echo '<p>Department: '.$department->first()->department_name.'</p>';
                            }

                            if(isset($product->category_id) && !empty($product->category_id)) {
                                $category_id = $product->category_id;
                                $category = DB::table('categories')->where('category_id', '=', $category_id)->get();
                                echo '<p>Category: '.$category->first()->category_name.'</p>';
                            }

                            if(isset($product->sub_category_id) && !empty($product->sub_category_id)) {
                                $sub_category_id = $product->sub_category_id;
                                $sub_category = DB::table('sub_categories')->where('id', '=', $sub_category_id)->get();
                                echo '<p>SubCategory: '.$sub_category->first()->sub_category_name.'</p>';
                            }
                        ?>
                            
                        <div class="prdt_description">
                            <label>Product Description</label>
                            {!! ($product->description) !!}
                        </div>

                        <div class="variants">
                            @foreach ($product->product_attributes as $product_attribute)
                            <span class="badge badge-primary"></span>
                                
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="product_gallery well">
                        <div class="prod_gall_img">
                            @if (isset($product->product_image) && !empty($product->product_image))
                            <img src="{{ $product->product_image }}">
                            @else
                            <img src="{{ asset('uploads/no_image.png') }}">
                            @endif
                        </div>
                        <?php
                        $product_id = $product->id;
                        $product_galleries = DB::table('product_galleries')->where('product_id', '=', $product_id)->get();
                        if(isset($product_images) && !empty($product_images)) {
                            ?>
                            @foreach ($product_galleries as $product_gall)
                            <div class="prod_gall_img">
                                <img src="{{ asset('uploads/product_gallery/'. $product_gall->product_image) }}">
                            </div>
                            @endforeach
                            <?php
                        }
                        ?>

                    </div>
                </div>

                <div class="col-md-12">
                    <div class="bottom_button_wrap">    
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{route('admin.products.index')}}" class="btn btn-info">Back to Products</a>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{route('admin.products.edit', ['id'=>$product->id])}}" class="btn btn-success">Edit Product</a>
                                <a href="{{route('admin.products.delete', ['id'=>$product->id])}}" class="btn btn-danger">Remove Product</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div> <!--/.col-md-7-->
    </div> 
  </div>  
</div>


@stop