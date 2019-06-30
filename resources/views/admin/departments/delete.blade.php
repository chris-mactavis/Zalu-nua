@extends('layouts.adminlayout')


@section('content')

<div class="page-title-box">
    <h4 class="page-title">Delete Departments</h4>
      
    <ol class="breadcrumb">
      <li>
        <a href="">Dashboard</a>
      </li>

      <li>
        <a href="">Departments</a>
      </li>

      <li class="active">
        Delete Departments 
      </li>
    </ol>

    <div class="clearfix"></div>
</div>

<div class="row">
  <div class="col-md-12">
    
    <div class="row">
      <div class="col-md-12">
        
        <div class="white-box">

          <form action="{{ route('admin.departments.destroy', ['id'=>$department->department_id]) }}" method="post" enctype="multipart/form-data">
            
            {{ csrf_field() }}
            
            <div class="form-group">
              <label for="department_name">department Name</label>
              <input type="text" name="department_name" class="form-control input-lg {{ $errors->has('department_name') ? ' is-invalid' : '' }}" 
              placeholder="Department Name" value="{{ $department->department_name }}" disabled /> 
            </div>


            <div class="btn_wrap">
              <a href="{{route('admin.departments.index')}}" class="btn btn-info btn-lg">Back to Departments</a>
              <button type="submit" class="btn btn-danger btn-lg"> Delete Department </button>
            </div>

          </form>

        </div>
      </div> <!--/.col-md-7-->
    </div> 
  </div>  
</div>


@stop