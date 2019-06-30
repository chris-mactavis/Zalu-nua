@extends('layouts.adminlayout')


@section('content')

<div class="page-title-box">
    <h4 class="page-title">Edit Article</h4>
      
  	<ol class="breadcrumb">
	    <li>
	      <a href="">Dashboard</a>
	    </li>

      <li>
        <a href="">Article</a>
      </li>

	    <li class="active">
	      Edit Article
	    </li>
  	</ol>

  	<div class="clearfix"></div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-12">
        <div class="white-box">
          
          <div class="banner_wrap">
            <div class="row">
              <div class="col-md-9">
                <div class="banner"><img src="{{ $articles->banner }}" /></div>
              </div>

            </div>   
          </div>

          <form action="{{ route('admin.articles.update', ['id' => $article->id]) }}" method="post" enctype="multipart/form-data">
            
            {{ csrf_field() }}

            <div class="form-group">
              <label for="url">Title</label>
              <input type="text" name="title" class="form-control input-lg {{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="Title" 
              value="{{ $article->title }}" /> 
              @if($errors->has('title'))
                <span class="invalid-feedback red">
                  <strong>{{ $errors->first('title') }}</strong>
                </span>
              @endif
            </div>


            <div class="form-group">
              <label for="content">Content</label>
              <textarea name="content" id="summernote" class="form-control" row="8">{{ $article->content }}</textarea> 
              @if($errors->has('content'))
                <span class="invalid-feedback red">
                  <strong>{{ $errors->first('content') }}</strong>
                </span>
              @endif
            </div>

            <div class="btn_wrap">
              <button type="submit" class="btn btn-success btn-lg pull-right"> Update </button>
              <a href="{{ route('admin.articles.index') }}" class="btn btn-primary  btn-lg pull-left">Go Back</a>
            </div>

          </form>

        </div>
      </div> <!--/.col-md-7-->
    </div> 
  </div>  
</div>


@stop