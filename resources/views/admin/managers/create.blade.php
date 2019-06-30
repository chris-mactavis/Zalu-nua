@extends('layouts.adminlayout')


@section('content')

<div class="page-title-box">
    <h4 class="page-title">Admin Users</h4>
      
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
          
          <form action="{{ route('admin.managers.store') }}" method="post" enctype="multipart/form-data">
            
            {{ csrf_field() }}

            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name" class="form-control input-lg {{ $errors->has('name') ? ' is-invalid' : '' }}" 
              placeholder="Name" value="{{ old('name') }}"  required > 
              @if($errors->has('name'))
                <span class="invalid-feedback red">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" name="email" class="form-control input-lg {{ $errors->has('email') ? ' is-invalid' : '' }}" 
              placeholder="Email" value="{{ old('email') }}"  required > 
              @if($errors->has('email'))
                <span class="invalid-feedback red">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control input-lg {{ $errors->has('password') ? ' is-invalid' : '' }}" 
              placeholder="Password" value="{{ old('password') }}"  required > 
              @if($errors->has('password'))
                <span class="invalid-feedback red">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="password-confirm">Confirm Password</label>
              <input type="password" name="password_confirmation" class="form-control input-lg" 
              placeholder="Confirm Password" required > 
            </div>

            <div class="form-group">
              <label for="permission">Permission</label>
              <select name="permission" class="form-control input-lg">
                <option value="editor">Editor </option>
                <option value="admin">Admin</option>
              </select>
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