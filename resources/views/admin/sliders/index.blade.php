<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
?>

@extends('layouts.adminlayout')


@section('content')

<div class="page-title-box">
    <h4 class="page-title">Sliders</h4>
      
    <ol class="breadcrumb">
      <li>
        <a href="">Dashboard</a>
      </li>

      <li class="active">
        Sliders
      </li>
    </ol>

    <div class="clearfix"></div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-12">
        <div class="white-box">
            <div class="row">
                <div class="col-md-10"></div>

                <div class="col-md-2">
                    <div class="btn-wrap">
                        <div class="top-btn">
                            <a href="{{ route('admin.sliders.add') }}" class="btn btn-primary">Add Sliders</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="white-box">
          
          <div class="table-responsive">
            
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th width="40%">Image</th>
                    <th width="50%">URL</th>
                    <th width="10%" class="text-center">Actions</th>
                  </tr>
                </thead>
                
                <tbody>
                  @foreach($sliders as $slider)
                    <tr>
                      
                      <td>
                          <img src="{{ $slider->image }}" />
                      </td>

                      <td>
                          {{ $slider->url }}
                      </td>

                      <td class="text-center">             
                        <div class="edit-btn-wrap">
                          
                            <div class="edit-btn">
                              <a href="{{ route('admin.sliders.edit', ['id' => $slider->id]) }}" title="edit">
                                <img src="{{ asset('admin_assets/images/edit_icon.png') }}"/> 
                              </a>
                            </div>
                            
                            <div class="edit-btn">
                              <a href="{{ route('admin.sliders.delete', ['id' => $slider->id]) }}" title="delete">
                                <img src="{{ asset('admin_assets/images/delete_icon.png') }}"/>
                              </a>
                            </div>

                        </div>
                      </td>

                    </tr> 
                    @endforeach
                 
                  </tbody>
            </table>
                      
          </div>
             
        </div>
      </div> <!--/.col-md-7-->
    </div> 
  </div>  
</div>


@stop