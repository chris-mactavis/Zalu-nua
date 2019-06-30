<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
?>

@extends('layouts.adminlayout')


@section('content')

<div class="page-title-box">
    <h4 class="page-title">Website Settings</h4>
      
    <ol class="breadcrumb">
      <li>
        <a href="">Dashboard</a>
      </li>

      <li class="active">
        View Website Settings
      </li>
    </ol>

    <div class="clearfix"></div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-12">
        @if(isset($settings) && $settings->count() > 0)
            @foreach($settings as $setting)
            <div class="white-box">
                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="product_info">
                            <div class="info_itm">
                                <div class="row">
                                    <div class="col-md-3">Website Name</div>
                                    <div class="col-md-9">{{$setting->name}}</div>
                                </div>
                            </div>

                            <div class="info_itm">
                                <div class="row">
                                    <div class="col-md-3">Default Email Address</div>
                                    <div class="col-md-9">{{$setting->email}}</div>
                                </div>
                            </div>

                            <div class="info_itm">
                                <div class="row">
                                    <div class="col-md-3">Phone Number</div>
                                    <div class="col-md-9">{{$setting->phone}}</div>
                                </div>
                            </div>

                            <div class="info_itm">
                                <div class="row">
                                    <div class="col-md-3">Address</div>
                                    <div class="col-md-9">{{$setting->address}}</div>
                                </div>
                            </div>

                            <div class="info_itm">
                                <div class="row">
                                    <div class="col-md-3">Facebook</div>
                                    <div class="col-md-9">{{$setting->facebook}}</div>
                                </div>
                            </div>

                            <div class="info_itm">
                                <div class="row">
                                    <div class="col-md-3">Twitter</div>
                                    <div class="col-md-9">{{$setting->twitter}}</div>
                                </div>
                            </div>

                            <div class="info_itm">
                                <div class="row">
                                    <div class="col-md-3">Instagram</div>
                                    <div class="col-md-9">{{$setting->twitter}}</div>
                                </div>
                            </div>

                            <div class="info_itm">
                                <div class="row">
                                    <div class="col-md-3">Linkedin</div>
                                    <div class="col-md-9">{{$setting->linkedin}}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="col-md-12">
                        <div class="bottom_button_wrap">    
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{route('admin.home')}}" class="btn btn-info">Back to Dashboard</a>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="{{route('admin.settings.edit', ['id'=>$setting->id])}}" class="btn btn-success">Edit Settings</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @else
        <div class="white-box">
            <div class="row">
                <div class="col-md-12">
                    <p>Your website settings have not been setup</p>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="bottom_button_wrap">    
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{route('admin.home')}}" class="btn btn-info">Back to Dashboard</a>
                    </div>
                    
                    <div class="col-md-6 text-right">
                        <a href="{{route('admin.settings.setup')}}" class="btn btn-success">Setup</a>
                    </div>
                </div>
            </div>
        </div>
        @endif
      </div> <!--/.col-md-7-->
    </div> 
  </div>  
</div>


@stop