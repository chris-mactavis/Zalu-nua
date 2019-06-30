@extends('layouts.adminlayout')


@section('content')

<div class="page-title-box">
    <h4 class="page-title">Edit Website Settings</h4>
      
    <ol class="breadcrumb">
      <li>
        <a href="">Dashboard</a>
      </li>

      <li>
        <a href="">Website Settings</a>
      </li>

      <li class="active">
        Edit Website Settings 
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
                
                <div class="col-md-2">
                    <div class="cover">
                        <img src="{{ $settings->logo }}" />
                    </div>
                </div>
            </div>   
        </div>
        <div class="white-box">

          <form action="{{ route('admin.settings.update', ['id'=>$settings->id]) }}" method="post" enctype="multipart/form-data">
            
            {{ csrf_field() }}

            <div class="form-group">
              <label for="logo">Logo</label>
              <input type="file" name="logo" class="form-control input-lg {{ $errors->has('logo') ? ' is-invalid' : '' }}" />
              @if($errors->has('logo'))
                <span class="invalid-feedback red">
                  <strong>{{ $errors->first('logo') }}</strong>
                </span>
              @endif
            </div>
            
            <div class="form-group">
              <label for="name">Website Name</label>
              <input type="text" name="name" class="form-control input-lg {{ $errors->has('name') ? ' is-invalid' : '' }}" 
              placeholder="Website Name" value="{{ $settings->name }}" /> 
              @if($errors->has('name'))
                <span class="invalid-feedback red">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" name="email" class="form-control input-lg {{ $errors->has('email') ? ' is-invalid' : '' }}" 
              placeholder="Email" value="{{ $settings->email }}" /> 
              @if($errors->has('email'))
                <span class="invalid-feedback red">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="phone">Phone</label>
              <input type="text" name="phone" class="form-control input-lg {{ $errors->has('phone') ? ' is-invalid' : '' }}" 
              placeholder="Phone" value="{{ $settings->phone }}" /> 
              @if($errors->has('phone'))
                <span class="invalid-feedback red">
                  <strong>{{ $errors->first('phone') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="phone">Address</label>
              <textarea name="address" class="form-control input-lg {{ $errors->has('address') ? ' is-invalid' : '' }}" 
                  placeholder>{{ $settings->address }}</textarea>
              @if($errors->has('phone'))
                <span class="invalid-feedback red">
                  <strong>{{ $errors->first('phone') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="facebook">Facebook URL</label>
              <input type="text" name="facebook" class="form-control input-lg {{ $errors->has('facebook') ? ' is-invalid' : '' }}" 
              placeholder="Website Name" value="{{ $settings->facebook }}" /> 
              @if($errors->has('facebook'))
                <span class="invalid-feedback red">
                  <strong>{{ $errors->first('facebook') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="twitter">Twitter</label>
              <input type="text" name="twitter" class="form-control input-lg {{ $errors->has('twitter') ? ' is-invalid' : '' }}" 
              placeholder="Website Name" value="{{ $settings->twitter }}" /> 
              @if($errors->has('twitter'))
                <span class="invalid-feedback red">
                  <strong>{{ $errors->first('twitter') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="instagram">Instagram</label>
              <input type="text" name="instagram" class="form-control input-lg {{ $errors->has('instagram') ? ' is-invalid' : '' }}" 
              placeholder="Website Name" value="{{ $settings->instagram }}" /> 
              @if($errors->has('instagram'))
                <span class="invalid-feedback red">
                  <strong>{{ $errors->first('instagram') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="linkedin">Linkedin</label>
              <input type="text" name="linkedin" class="form-control input-lg {{ $errors->has('linkedin') ? ' is-invalid' : '' }}" 
              placeholder="Website Name" value="{{ $settings->linkedin }}" /> 
              @if($errors->has('linkedin'))
                <span class="invalid-feedback red">
                  <strong>{{ $errors->first('linkedin') }}</strong>
                </span>
              @endif
            </div>

            <div class="btn_wrap">
              <button type="submit" class="btn btn-primary btn-lg"> Update Site Settings </button>
            </div>

          </form>

        </div>
      </div> <!--/.col-md-7-->
    </div> 
  </div>  
</div>


@stop