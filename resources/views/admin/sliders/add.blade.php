@extends('layouts.adminlayout')


@section('content')

<div class="page-title-box">
    <h4 class="page-title">Create Slider</h4>
      
    <ol class="breadcrumb">
      <li>
        <a href="">Dashboard</a>
      </li>

      <li>
        <a href="">Slider</a>
      </li>

      <li class="active">
        New Slider 
      </li>
    </ol>

    <div class="clearfix"></div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-12">
        <div class="white-box">

          <form action="{{ route('admin.sliders.store') }}" method="post" enctype="multipart/form-data">
            
            {{ csrf_field() }}

            
            <div class="form-group">
              <label for="image">Image</label>
              <input type="file" name="image" class="form-control input-lg {{ $errors->has('image') ? ' is-invalid' : '' }}" />
              @if($errors->has('image'))
                <span class="invalid-feedback red">
                  <strong>{{ $errors->first('image') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="url">URL</label>
              <input type="text" name="url" class="form-control input-lg {{ $errors->has('url') ? ' is-invalid' : '' }}" 
              placeholder="URL" value="{{ old('url') }}" /> 
              @if($errors->has('url'))
                <span class="invalid-feedback red">
                  <strong>{{ $errors->first('url') }}</strong>
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