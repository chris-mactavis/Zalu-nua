@extends('layouts.adminlayout')


@section('content')

<div class="page-title-box">
    <h4 class="page-title">Add Article</h4>
      
    <ol class="breadcrumb">
      <li>
        <a href="">Dashboard</a>
      </li>

      <li>
        <a href="">Articles</a>
      </li>

      <li class="active">
        Edit Articles 
      </li>
    </ol>

    <div class="clearfix"></div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-12">
        <div class="white-box">

          <form action="{{ route('admin.articles.store') }}" method="post" enctype="multipart/form-data">
            
            {{ csrf_field() }}
            

            <div class="form-group">
              <label for="url">Title</label>
              <input type="text" name="title" class="form-control input-lg {{ $errors->has('title') ? ' is-invalid' : '' }}" 
              placeholder="Title" value="{{ old('title') }}" /> 
              @if($errors->has('title'))
                <span class="invalid-feedback red">
                  <strong>{{ $errors->first('title') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="banner">Banner</label>
              <input type="file" name="banner" class="form-control input-lg {{ $errors->has('banner') ? ' is-invalid' : '' }}" />
              @if($errors->has('banner'))
                <span class="invalid-feedback red">
                  <strong>{{ $errors->first('banner') }}</strong>
                </span>
              @endif
            </div>


            <div class="form-group">
              <label for="content">Content</label>
              <textarea name="content" id="summernote" class="form-control" row="8">{{ old('content') }}</textarea> 
              @if($errors->has('content'))
                <span class="invalid-feedback red">
                  <strong>{{ $errors->first('content') }}</strong>
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