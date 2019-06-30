@extends('layouts.adminlayout')


@section('content')

<div class="page-title-box">
    <h4 class="page-title">Articles</h4>
      
    <ol class="breadcrumb">
      <li>
        <a href="">Dashboard</a>
      </li>

      <li class="active">
        Articles 
      </li>
    </ol>

    <div class="clearfix"></div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="white-box">
      <div class="row">
        <div class="col-md-12">
          
          <div class="banner_wrap">
            <div class="row">
              <div class="col-md-9">
                <div class="banner"><img src="{{ $article->banner }}" /></div>
              </div>

            </div>   
          </div>

          <div class="table-responsive">
            
              <h2>{{$article->title}}</h2>

              <div class="">
                {!! ($article->content) !!}  
              </div>

          </div>

        </div>
      </div> <!--/.col-md-7-->
    </div> 
  </div>  
</div>


@stop