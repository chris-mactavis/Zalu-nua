@extends('layouts.adminlayout')


@section('content')

<div class="page-title-box">
    <h4 class="page-title">Edit Store</h4>
      
    <ol class="breadcrumb">
      <li>
        <a href="">Dashboard</a>
      </li>

      <li>
        <a href="">Store</a>
      </li>

      <li class="active">
        Edit Store 
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
                
                <div class="col-md-4">
                    <div class="cover"><img src="{{ $department->department_banner }}" /></div>
                </div>
            </div>   
        </div>

        <div class="white-box">

          <form action="{{ route('admin.departments.update', ['id'=>$department->department_id]) }}" method="post" enctype="multipart/form-data">
            
            {{ csrf_field() }}

            <div class="form-group">
              <label for="department_name">Store Name</label>
              <input type="text" name="department_name" class="form-control input-lg {{ $errors->has('department_name') ? ' is-invalid' : '' }}" 
              placeholder="Department Name" value="{{ $department->department_name }}" /> 
              @if($errors->has('department_name'))
                <span class="invalid-feedback red">
                  <strong>{{ $errors->first('department_name') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="department_banner">Store Banner</label>
              <input type="file" name="department_banner" class="form-control input-lg {{ $errors->has('department_banner') ? ' is-invalid' : '' }}" />
              @if($errors->has('department_banner'))
                <span class="invalid-feedback red">
                  <strong>{{ $errors->first('department_banner') }}</strong>
                </span>
              @endif
            </div>

            <!--
            <div class="form-group">
              <label for="home_banner_url">Content</label>
              <textarea name="content" id="summernote" class="form-control" row="8">{{ $department->content }}</textarea> 
              @if($errors->has('content'))
                <span class="invalid-feedback red">
                  <strong>{{ $errors->first('content') }}</strong>
                </span>
              @endif
            </div>-->

            <div class="btn_wrap">
              <a href="{{route('admin.departments.index')}}" class="btn btn-info btn-lg">Back to Departments</a>
              <button type="submit" class="btn btn-primary btn-lg"> Edit Department </button>
            </div>

          </form>

        </div>
      </div> <!--/.col-md-7-->
    </div> 
  </div>  
</div>


@stop