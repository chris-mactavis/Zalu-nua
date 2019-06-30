@extends('layouts.adminlayout')


@section('content')

<div class="page-title-box">
  <h4 class="page-title">Edit Product</h4>
  
  <ol class="breadcrumb">
    <li>
      <a href="">Dashboard</a>
    </li>
    
    <li>
      <a href="">Product</a>
    </li>
    
    <li class="active">
      Edit Product 
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
          
          <form action="{{ route('admin.products.update', ['id'=>$product->id]) }}" method="post" enctype="multipart/form-data">
            
            {{ csrf_field() }}
            
            <div class="form-group">
              <label for="product_image">Product Image</label>
              <input type="file" name="product_image" class="form-control input-lg {{ $errors->has('product_image') ? ' is-invalid' : '' }}" />
              @if($errors->has('product_image'))
              <span class="invalid-feedback red">
                <strong>{{ $errors->first('product_image') }}</strong>
              </span>
              @endif
            </div>
            
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
            
            <div class="form-group">
              <label for="featured">Make Featured</label>
              <select name="featured" class="form-control input-lg">
                <option value="">Select </option>
                <option value="yes" <?php if($product->featured == 'yes') { echo 'selected'; } ?>>yes</option>
                <option value="no" <?php if($product->featured == 'no') { echo 'selected'; } ?>>no</option>
              </select>
            </div>
            
            <div class="form-group">
              <label for="product_price">Product Price</label>
              <input type="text" name="product_price" class="form-control input-lg {{ $errors->has('product_price') ? ' is-invalid' : '' }}" 
              placeholder="product Name" value="{{ $product->product_price }}" /> 
              @if($errors->has('product_price'))
              <span class="invalid-feedback red">
                <strong>{{ $errors->first('product_price') }}</strong>
              </span>
              @endif
            </div>
            
            <div class="form-group">
              <label for="quantity">Quantity</label>
              <select name="quantity_available" class="form-control input-lg">
                <?php 
                for ($x = 1; $x <= 10; $x++) {
                  ?>
                  <option value="{{ $x }}" <?php if($product->quantity_available == $x) { echo 'selected'; } ?>>{{ $x }}</option>
                  <?php
                } 
                ?>
                
              </select>
            </div>
            
            <div class="form-group">
              <label for="sale">Is Product on Sale</label>
              <select name="sale" class="form-control input-lg">
                <option value="">Select </option>
                <option value="yes" <?php if($product->sale == 'yes') { echo 'selected'; } ?>>yes</option>
                <option value="no" <?php if($product->sale == 'no') { echo 'selected'; } ?>>no</option>
              </select>
            </div>
            
            <div class="form-group">
              <label for="discount_price">Discount Price</label>
              <input type="text" name="discount_price" class="form-control input-lg {{ $errors->has('discount_price') ? ' is-invalid' : '' }}" 
              placeholder="product Name" value="{{ $product->discount_price }}" /> 
              @if($errors->has('discount_price'))
              <span class="invalid-feedback red">
                <strong>{{ $errors->first('discount_price') }}</strong>
              </span>
              @endif
            </div>
            
            <div class="form-group">
              <label for="department">Store</label>
              <select name="department_id" class="form-control input-lg" id="department_id">
                <option value="">Select Store</option>
                @foreach($departments as $department)
                <option value="{{ $department->department_id }}" <?php if($product->department_id == $department->department_id) { echo 'selected'; } ?>>
                  {{ $department->department_name }}
                </option>
                @endforeach
              </select>
            </div>
            
            <div class="form-group">
              <label for="category">Category</label>
              <select name="category_id" class="form-control input-lg">
                @foreach($categories as $category)
                <option value="{{ $category->category_id }}" <?php if($product->category_id == $category->category_id) { echo 'selected'; } ?>>
                  {{ $category->category_name }}
                </option>
                @endforeach
              </select>
            </div>
            
            
            <div class="form-group">
              <label for="description">Description</label>
              <textarea name="description" id="summernote" class="form-control" row="8">{{ $product->description }}</textarea> 
              @if($errors->has('description'))
              <span class="invalid-feedback red">
                <strong>{{ $errors->first('description') }}</strong>
              </span>
              @endif
            </div>
            
            <div class="form-group" id="prod-attributes">
              <h6>Attributes</h6>
              @foreach ($product_variants as $variant)
              {{-- @php
              $var = $variants[$variant->attribute];
              
              if($var) {
                $options = $var[0]['variant_option'];
              }
              @endphp --}}
              <label for="">Select {{$variant->attribute}}</label>
              <select name="variant_{{$variant->attribute}}[]" class="form-control select2" multiple style="margin-bottom: 5px;">
                @foreach ($variant->options as $option)
                
                <option value="{{$option->id}}" {{$sel}}>{{$option->option}}</option>
                @endforeach
              </select>
              @endforeach
            </div>
            
            <div class="btn_wrap">
              <button type="submit" class="btn btn-primary btn-lg"> Edit </button>
            </div>
            
          </form>
          
        </div>
      </div> <!--/.col-md-7-->
    </div> 
  </div>  
</div>


@stop