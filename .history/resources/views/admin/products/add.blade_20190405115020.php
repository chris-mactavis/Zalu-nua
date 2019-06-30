@extends('layouts.adminlayout')


@section('content')

<div class="page-title-box">
    <h4 class="page-title">Create Product</h4>
      
    <ol class="breadcrumb">
      <li>
        <a href="">Dashboard</a>
      </li>

      <li>
        <a href="">Product</a>
      </li>

      <li class="active">
        New Product 
      </li>
    </ol>

    <div class="clearfix"></div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-12">
        <div class="white-box">

          <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
            
            {{ csrf_field() }}

            <div class="form-group">
              <label for="department">Store</label>
              <select name="department_id" class="form-control input-lg" id="department_id" required>
                <option value="">Select Store</option>
                @foreach($departments as $department)
                <option value="{{ $department->department_id }}">
                {{ $department->department_name }}
                </option>
                @endforeach
              </select>
            </div>


            <div class="form-group">
              <label for="category">Category</label>
              <select name="category_id" class="form-control input-lg" id="category_id" required >
                <option value="">Select Category</option>
                @foreach($categories as $category)
                <option value="{{ $category->category_id }}">
                {{ $category->category_name }}
                </option>
                @endforeach
              </select>
            </div>


            <div class="form-group">
              <label for="product_name">Product Name</label>
              <input type="text" name="product_name" class="form-control input-lg {{ $errors->has('product_name') ? ' is-invalid' : '' }}" 
              placeholder="Product Name" value="{{ old('product_name') }}" required /> 
              @if($errors->has('product_name'))
                <span class="invalid-feedback red">
                  <strong>{{ $errors->first('product_name') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="product_image">Product Image</label>
              <input type="file" name="product_image" class="form-control input-lg {{ $errors->has('product_image') ? ' is-invalid' : '' }}" required />
              @if($errors->has('product_image'))
                <span class="invalid-feedback red">
                  <strong>{{ $errors->first('product_image') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="product_code">Product Code</label>
              <input type="text" name="product_code" class="form-control input-lg {{ $errors->has('product_code') ? ' is-invalid' : '' }}" 
              placeholder="Product Code" value="{{ old('product_code') }}" /> 
              @if($errors->has('product_code'))
                <span class="invalid-feedback red">
                  <strong>{{ $errors->first('product_code') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="featured">Make Featured</label>
              <select name="featured" class="form-control input-lg" required>
                <option value="">Select </option>
                <option value="yes">yes</option>
                <option value="no">no</option>
              </select>
            </div>

            <div class="form-group">
              <label for="product_price">Product Price</label>
              <input type="text" name="product_price" class="form-control input-lg {{ $errors->has('product_price') ? ' is-invalid' : '' }}" 
              placeholder="Product Price" value="{{ old('product_price') }}" required /> 
              @if($errors->has('product_price'))
                <span class="invalid-feedback red">
                  <strong>{{ $errors->first('product_price') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="quantity">Quantity</label>
              <select name="quantity_available" class="form-control input-lg" required>
                <option value="">Select Quantity</option>
                <?php 
                for ($x = 1; $x <= 20; $x++) {
                  ?>
                  <option value="{{ $x }}">{{ $x }}</option>
                  <?php
                } 
                ?>
                
              </select>
            </div>

            <div class="form-group">
              <label for="sale">Is Product on Sale</label>
              <select name="sale" class="form-control input-lg" required>
                <option value="">Select </option>
                <option value="yes">yes</option>
                <option value="no">no</option>
              </select>
            </div>

            <div class="form-group">
              <label for="discount_price">Discount Price</label>
              <input type="text" name="discount_price" class="form-control input-lg {{ $errors->has('discount_price') ? ' is-invalid' : '' }}" 
              placeholder="Product Price" value="{{ old('discount_price') }}" required /> 
              @if($errors->has('discount_price'))
                <span class="invalid-feedback red">
                  <strong>{{ $errors->first('discount_price') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="product_type">Product Type</label>
              <select name="product_type" class="form-control input-lg" required>
                <option value="">Select Product Type </option>
                <option value="simple">Simple product</option>
                <option value="variable">Variable product</option>
              </select>
            </div>

           <div>
              <label>1.</label>
              <div class="form-group">
                <label for="product_attributes">Product Attributes</label>
               
                <select name="product_attributes" multiple class="form-control input-lg">
                  @foreach ($product_options as $option)
                      <option value="{{$option->id}}">{{$option->option}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
              <label for="product_image">Image</label>
              <input type="file" name="product_image" class="form-control input-lg {{ $errors->has('product_image') ? ' is-invalid' : '' }}" required />
              @if($errors->has('product_image'))
                <span class="invalid-feedback red">
                  <strong>{{ $errors->first('product_image') }}</strong>
                </span>
              @endif
            </div>
           </div>

            <div class="form-group">
              <label for="description">Description</label>
              <textarea name="description" id="summernote" class="form-control" row="8">{{ old('description') }}</textarea> 
              @if($errors->has('description'))
                <span class="invalid-feedback red">
                  <strong>{{ $errors->first('description') }}</strong>
                </span>
              @endif
            </div>

            <div class="btn_wrap">
              <button type="submit" class="btn btn-primary btn-lg"> Create </button>
            </div>

          </form>

        </div>
      </div> <!--/.col-md-7-->
    </div> 
  </div>  
</div>


@stop