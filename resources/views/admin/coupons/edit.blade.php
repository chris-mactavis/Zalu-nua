@extends('layouts.adminlayout')


@section('content')

<div class="page-title-box">
    <h4 class="page-title">Edit Coupon</h4>
      
    <ol class="breadcrumb">
      <li>
        <a href="">Dashboard</a>
      </li>

      <li>
        <a href="">Coupon</a>
      </li>

      <li class="active">
        Edit Coupon 
      </li>
    </ol>

    <div class="clearfix"></div>
</div>

<div class="row">
  <div class="col-md-12">
    
    <div class="row">
      <div class="col-md-12">
        
        <div class="white-box">

          <form action="{{ route('admin.coupons.update', ['id'=>$coupon->id]) }}" method="post" enctype="multipart/form-data">
            
            {{ csrf_field() }}

            
            <div class="form-group">
              <label for="coupon_code">Coupon Code</label>
              <input type="text" name="coupon_code" class="form-control input-lg {{ $errors->has('coupon_code') ? ' is-invalid' : '' }}" 
              placeholder="coupon Name" value="{{ $coupon->coupon_code }}" /> 
              @if($errors->has('coupon_code'))
                <span class="invalid-feedback red">
                  <strong>{{ $errors->first('coupon_code') }}</strong>
                </span>
              @endif
            </div>


            <div class="form-group">
              <label for="coupon_type">Coupon Type</label>
              <select name="coupon_type" class="form-control input-lg">
                
                <option value="{{ $coupon->coupon_type }}" <?php if($coupon->coupon_type == 'percentage') { echo 'selected'; } ?>>
                percentage
                </option>
                <option value="{{ $coupon->coupon_type }}" <?php if($coupon->coupon_type == 'price') { echo 'selected'; } ?>>
                price
                </option>
                
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
              placeholder="coupon Name" value="{{ $coupon->discount_value }}" /> 
              @if($errors->has('discount_value'))
                <span class="invalid-feedback red">
                  <strong>{{ $errors->first('discount_value') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="status">Status</label>
              <select name="status" class="form-control input-lg">
                
                <option value="{{ $coupon->status }}" <?php if($coupon->status == 'active') { echo 'selected'; } ?>>
                active
                </option>
                <option value="{{ $coupon->status }}" <?php if($coupon->status == 'inactive') { echo 'selected'; } ?>>
                inactive
                </option>
                
              </select>
              @if($errors->has('status'))
                <span class="invalid-feedback red">
                  <strong>{{ $errors->first('status') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group">
             <label for="expiration">Expiration</label>
              <input type="date" name="expiration" class="form-control input-lg {{ $errors->has('expiration') ? ' is-invalid' : '' }}" 
              placeholder="coupon Name" value="{{ $coupon->expiration }}" /> 
              @if($errors->has('expiration'))
                <span class="invalid-feedback red">
                  <strong>{{ $errors->first('expiration') }}</strong>
                </span>
              @endif
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