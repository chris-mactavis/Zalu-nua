@extends('layouts.adminlayout')


@section('content')

<div class="page-title-box">
    <h4 class="page-title">Delete Sliders</h4>
      
  	<ol class="breadcrumb">
	    <li>
	      <a href="">Dashboard</a>
	    </li>

      <li>
        <a href="">Sliders</a>
      </li>

	    <li class="active">
	      Delete Sliders 
	    </li>
  	</ol>

  	<div class="clearfix"></div>
</div>


<div class="row">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-8">
        <div class="white-box">
          <h5>You are about to delete the Slider below. Do you wish to continue with your action</h5><br />

          <div class="image_wrap">
              <div class="row">
                <div class="col-md-8"><img src="{{ $slider->image }}" /></div>
              </div>
          </div>

          <div class="content_info">
            <h4>{{ $slider->url }}</h4>
          </div> 

          <form action="{{ route('admin.sliders.destroy', ['id' => $slider->id]) }}" method="post" >
            
            {{ csrf_field() }}

            <input type="hidden" name="id" value="{{ $slider->id }}" />

            <div class="btn_wrap">
              <button type="submit" class="btn btn-danger btn-lg">Delete</button>
              <a href="{{ route('admin.sliders.index') }}" class="btn btn-primary btn-lg pull-right">Cancel</a>
            </div>

          </form>

        </div>
      </div> <!--/.col-md-7-->
    </div> 
  </div>  
</div>


@stop