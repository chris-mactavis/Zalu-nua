@extends('layouts.adminlayout')


@section('content')

<div class="page-title-box">
    <h4 class="page-title">Edit Slider</h4>
      
    <ol class="breadcrumb">
      <li>
        <a href="">Dashboard</a>
      </li>

      <li>
        <a href="">Slider</a>
      </li>

      <li class="active">
        Edit Slider 
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
                
                <div class="col-md-8">
                    <div class="cover"><img src="{{ $slider->image }}" /></div>
                </div>
            </div>   
        </div>
        <div class="white-box">

          <form action="{{ route('admin.categories.update', ['id'=>$slider->id]) }}" method="post" enctype="multipart/form-data">
            
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
              placeholder="slider Name" value="{{ $slider->url }}" /> 
              @if($errors->has('url'))
                <span class="invalid-feedback red">
                  <strong>{{ $errors->first('url') }}</strong>
                </span>
              @endif
            </div>


            <div class="btn_wrap">
              <button type="submit" class="btn btn-primary btn-lg"> Edit Slider </button>
            </div>

          </form>

        </div>
      </div> <!--/.col-md-7-->
    </div> 
  </div>  
</div>


@stop