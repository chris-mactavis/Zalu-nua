@extends('layouts.adminlayout')


@section('content')

<div class="page-title-box">
    <h4 class="page-title">Edit Page</h4>
      
  	<ol class="breadcrumb">
	    <li>
	      <a href="">Dashboard</a>
	    </li>

      <li>
        <a href="">Page</a>
      </li>

	    <li class="active">
	      Edit Page
	    </li>
  	</ol>

  	<div class="clearfix"></div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-12">
        <div class="white-box">
          <?php 
            if(isset($page->banner) && $page->banner == '') {
            ?>
            <div class="banner_wrap">
              <div class="row">
                <div class="col-md-9">
                  <div class="banner"><img src="{{ $pages->banner }}" /></div>
                </div>

              </div>   
            </div>
            <?php 
            }
          ?>

          <form action="{{ route('admin.pages.update', ['id' => $page->id]) }}" method="post" enctype="multipart/form-data">
            
            {{ csrf_field() }}
            
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
              <label for="page_title">Title</label>
              <input type="text" name="page_title" class="form-control input-lg {{ $errors->has('page_title') ? ' is-invalid' : '' }}" placeholder="Page Title" 
              value="{{ $page->page_title }}" /> 
              @if($errors->has('page_title'))
                <span class="invalid-feedback red">
                  <strong>{{ $errors->first('page_title') }}</strong>
                </span>
              @endif
            </div>


            <div class="form-group">
              <label for="content">Content</label>
              <textarea name="content" id="summernote" class="form-control" row="8">{{ $page->content }}</textarea> 
              @if($errors->has('content'))
                <span class="invalid-feedback red">
                  <strong>{{ $errors->first('content') }}</strong>
                </span>
              @endif
            </div>

            <div class="btn_wrap">

              <a href="{{ route('admin.pages.index') }}" class="btn btn-primary  btn-lg pull-left">Go Back</a>
              
              <button type="submit" class="btn btn-success btn-lg pull-right"> Update Page </button>
              
            </div>

          </form>

        </div>
      </div> <!--/.col-md-7-->
    </div> 
  </div>  
</div>


@stop