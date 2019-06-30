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
              <label for="product_type">Product Type</label>
              <select name="product_type" id="product_type" class="form-control" required>
                <option value="simple">Simple product</option>
                <option value="variable">Variable product</option>
              </select>
            </div>
            
            
            <input type="hidden" name="iterate" value="1" id="iterate">
            <input type="hidden" name="variables" value="{{$product_options}}" id="variabless">
            
            <div id="insert-here">
              <div id="single-attribute">
                <span class="product-attribute-count">1</span>.
                <hr>
                <div class="form-group">
                  <label for="product_attributes">Product Attributes</label>
                  
                  <select name="product_attributes_1[]" multiple required class="form-control input-lg" id="attribute-select">
                    @foreach ($product_options as $option)
                    <option value="{{$option->id}}">{{$option->option}}</option>
                    @endforeach
                  </select>
                </div>
    
                <div class="form-group">
                  <label for="var_image">Image</label>
                  <input type="file" name="var_image_1[1[]]" class="form-control input-lg" required />
                </div>
              </div>
            </div>

            <button type="button" class="button btn btn-sm btn-default" data-toggle="modal" data-target="#add-attribute-modal" id="add-attribute-btn">Add Attribute</button>


            
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