@extends('layouts.adminlayout')


@section('content')

<div class="page-title-box">
    <h4 class="page-title">Create Category</h4>
      
    <ol class="breadcrumb">
      <li>
        <a href="">Dashboard</a>
      </li>

      <li>
        <a href="">Category</a>
      </li>

      <li class="active">
        New Category 
      </li>
    </ol>

    <div class="clearfix"></div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-12">
        <div class="white-box">

          <form action="{{ route('admin.categories.store') }}" method="post" enctype="multipart/form-data">
            
            {{ csrf_field() }}

            <div class="form-group">
              <label for="department">Store</label>
              <select name="department_id" class="form-control input-lg" required>
                <option value="">Select Store</option>
                @foreach($departments as $department)
                <option value="{{ $department->department_id }}">
                {{ $department->department_name }}
                </option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="category_name">Category Name</label>
              <input type="text" name="category_name" class="form-control input-lg {{ $errors->has('category_name') ? ' is-invalid' : '' }}" 
              placeholder="Category Name" value="{{ old('category_name') }}" required /> 
              @if($errors->has('category_name'))
                <span class="invalid-feedback red">
                  <strong>{{ $errors->first('category_name') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="cover_image">Cover Image</label>
              <input type="file" name="cover_image" class="form-control input-lg {{ $errors->has('cover_image') ? ' is-invalid' : '' }}" />
              @if($errors->has('cover_image'))
                <span class="invalid-feedback red">
                  <strong>{{ $errors->first('cover_image') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="cover_image_caption">Cover Image Caption</label>
              <input type="text" name="cover_image_caption" class="form-control input-lg {{ $errors->has('cover_image_caption') ? ' is-invalid' : '' }}" 
              placeholder="Category Name" value="{{ old('cover_image_caption') }}" /> 
              @if($errors->has('cover_image_caption'))
                <span class="invalid-feedback red">
                  <strong>{{ $errors->first('cover_image_caption') }}</strong>
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