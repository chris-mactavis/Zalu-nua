@extends('layouts.adminlayout')


@section('content')

<div class="page-title-box">
    <h4 class="page-title">Edit Category</h4>
      
    <ol class="breadcrumb">
      <li>
        <a href="">Dashboard</a>
      </li>

      <li>
        <a href="">Category</a>
      </li>

      <li class="active">
        Edit Category 
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
                    <div class="cover"><img src="{{ $category->cover_image }}" /></div>
                </div>
            </div>   
        </div>
        <div class="white-box">

          <form action="{{ route('admin.categories.update', ['id'=>$category->category_id]) }}" method="post" enctype="multipart/form-data">
            
            {{ csrf_field() }}

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
              <label for="department">Store</label>
              <select name="department_id" class="form-control input-lg" id="department_id">
                <option value="">Select Store</option>
                @foreach($departments as $department)
                <option value="{{ $department->department_id }}" <?php if($category->department_id == $department->department_id) { echo 'selected'; } ?>>
                {{ $department->department_name }}
                </option>
                @endforeach
              </select>
            </div>
            
            <div class="form-group">
              <label for="category_name">Category Name</label>
              <input type="text" name="category_name" class="form-control input-lg {{ $errors->has('category_name') ? ' is-invalid' : '' }}" 
              placeholder="category Name" value="{{ $category->category_name }}" /> 
              @if($errors->has('category_name'))
                <span class="invalid-feedback red">
                  <strong>{{ $errors->first('category_name') }}</strong>
                </span>
              @endif
            </div>


            <div class="form-group">
              <label for="cover_image_caption">Cover Image Caption</label>
              <input type="text" name="cover_image_caption" class="form-control input-lg {{ $errors->has('cover_image_caption') ? ' is-invalid' : '' }}" 
              placeholder="category Name" value="{{ $category->cover_image_caption }}" /> 
              @if($errors->has('cover_image_caption'))
                <span class="invalid-feedback red">
                  <strong>{{ $errors->first('cover_image_caption') }}</strong>
                </span>
              @endif
            </div>

            <div class="btn_wrap">
              <a href="{{route('admin.categories.index')}}" class="btn btn-info btn-lg">Back to Categories</a>
              <button type="submit" class="btn btn-primary btn-lg"> Edit </button>
            </div>

          </form>

        </div>
      </div> <!--/.col-md-7-->
    </div> 
  </div>  
</div>


@stop