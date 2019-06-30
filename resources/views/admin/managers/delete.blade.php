@extends('layouts.adminlayout')


@section('content')

<div class="page-title-box">
    <h4 class="page-title">Admin Edit Users</h4>
      
    <ol class="breadcrumb">
      <li>
        <a href="">Dashboard</a>
      </li>

      <li class="active">
        Admin Users
      </li>
    </ol>

    <div class="clearfix"></div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-12">
        
        <div class="white-box">
          
          <form action="{{ route('admin.managers.destroy') }}" method="post" enctype="multipart/form-data">
            
            {{ csrf_field() }}

            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name" class="form-control input-lg {{ $errors->has('name') ? ' is-invalid' : '' }}" 
              placeholder="Name" value="{{ $admin->name }}"  required > 
              @if($errors->has('name'))
                <span class="invalid-feedback red">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" name="email" class="form-control input-lg {{ $errors->has('email') ? ' is-invalid' : '' }}" 
              placeholder="Email" value="{{ $admin->email }}"  required > 
              @if($errors->has('email'))
                <span class="invalid-feedback red">
                  <strong>{{ $errors->first('email') }}</strong>
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