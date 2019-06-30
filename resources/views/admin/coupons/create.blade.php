@extends('layouts.adminlayout')


@section('content')

<div class="page-title-box">
    <h4 class="page-title">Create Coupon</h4>
      
    <ol class="breadcrumb">
      <li>
        <a href="">Dashboard</a>
      </li>

      <li>
        <a href="">Coupon</a>
      </li>

      <li class="active">
        New Coupon 
      </li>
    </ol>

    <div class="clearfix"></div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-12">
        <div class="white-box">

          <form action="{{ route('admin.coupons.store') }}" method="post" enctype="multipart/form-data">
            
            {{ csrf_field() }}

            <div class="form-group">
              <label for="coupon_code">Coupon Code</label>
              <input type="text" name="coupon_code" class="form-control input-lg {{ $errors->has('coupon_code') ? ' is-invalid' : '' }}" 
              placeholder="Coupon Code" value="{{ old('coupon_code') }}" /> 
              @if($errors->has('coupon_code'))
                <span class="invalid-feedback red">
                  <strong>{{ $errors->first('coupon_code') }}</strong>
                </span>
              @endif
            </div>


            <div class="form-group">
              <label for="coupon_type">Coupon Type</label>
              <select name="coupon_type" class="form-control input-lg">
                <option value="">Select Type</option>
                <option value="percentage">Percentage</option>
                <option value="price">Price</option>
              </select>
              @if($errors->has('coupon_type'))
                <span class="invalid-feedback red">
                  <strong>{{ $errors->first('coupon_type') }}</strong>
                </span>
              @endif
            </div>


            <div class="form-group">
              <label for="discount_value">Discount Value</label>
              <input type="text" name="discount_value" class="form-control input-lg {{ $errors->has('discount_value') ? ' is-invalid' : '' }}" 
              placeholder="Discount Value" value="{{ old('discount_value') }}" /> 
              @if($errors->has('discount_value'))
                <span class="invalid-feedback red">
                  <strong>{{ $errors->first('discount_value') }}</strong>
                </span>
              @endif
            </div>


            <div class="form-group">
              <label for="expiration">Expiration</label>
              <input type="date" name="expiration" class="form-control input-lg {{ $errors->has('expiration') ? ' is-invalid' : '' }}" 
              placeholder="Expiration" value="{{ old('expiration') }}" /> 
              @if($errors->has('expiration'))
                <span class="invalid-feedback red">
                  <strong>{{ $errors->first('expiration') }}</strong>
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