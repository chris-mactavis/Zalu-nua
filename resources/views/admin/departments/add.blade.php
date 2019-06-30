@extends('layouts.adminlayout')


@section('content')

<div class="page-title-box">
    <h4 class="page-title">Create Store</h4>
      
    <ol class="breadcrumb">
      <li>
        <a href="">Dashboard</a>
      </li>

      <li>
        <a href="">Store</a>
      </li>

      <li class="active">
        New Store 
      </li>
    </ol>

    <div class="clearfix"></div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-12">
        <div class="white-box">

          <form action="{{ route('admin.departments.store') }}" method="post" enctype="multipart/form-data">
            
            {{ csrf_field() }}

            <div class="form-group">
              <label for="department_name">Store Name</label>
              <input type="text" name="department_name" class="form-control input-lg {{ $errors->has('department_name') ? ' is-invalid' : '' }}" 
              placeholder="Department Name" value="{{ old('department_name') }}" /> 
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