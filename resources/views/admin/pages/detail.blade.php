@extends('layouts.adminlayout')


@section('content')

<div class="page-title-box">
    <h4 class="page-title">Pages</h4>
      
    <ol class="breadcrumb">
      <li>
        <a href="">Dashboard</a>
      </li>

      <li class="active">
        Pages 
      </li>
    </ol>

    <div class="clearfix"></div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="white-box">
      <div class="row">
        <div class="col-md-11">
          <?php 
            if(isset($page->banner) && is_null($page->banner)) {
            ?>
            <div class="banner_wrap">
              <div class="row">
                <div class="col-md-4">
                  <div class="banner"><img src="{{ $page->banner }}" /></div>
                </div>
              </div>   
            </div>
            <?php 
            }
          ?>

          <div class="table-responsive">
            
              <h2>{{ $page->page_title }}</h2>

              <div class="">
                {!! ($page->content) !!}  
              </div>
              
          </div>

          <div class="btn_wrap">

              <a href="{{ route('admin.pages.index') }}" class="btn btn-primary  btn-lg pull-left">Go Back</a>
              
          </div>

        </div>
      </div> <!--/.col-md-7-->
    </div> 
  </div>  
</div>


@stop