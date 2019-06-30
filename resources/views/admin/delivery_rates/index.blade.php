<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
?>

@extends('layouts.adminlayout')


@section('content')

<div class="page-title-box">
    <h4 class="page-title">Delivery Rates</h4>
      
    <ol class="breadcrumb">
      <li>
        <a href="">Dashboard</a>
      </li>

      <li class="active">
        Delivery Rates
      </li>
    </ol>

    <div class="clearfix"></div>
</div>

<div class="row">
  
    <div class="col-md-12">
      <div class="white-box">
          <div class="row">
              <div class="col-md-10"></div>

              <div class="col-md-2">
                  <div class="btn-wrap">
                      <div class="top-btn">
                          <a href="{{ route('admin.delivery_rates.create') }}" class="btn btn-primary">Add New</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>


      <div class="white-box">
        
        <div class="row">
          <div class="col-md-8">
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th width="30%">State</th>

                    <th width="40%">Rate (Naira)(</th>
                    
                    <th width="30%" class="text-right">Actions</th>
                  </tr>
                </thead>
                
                <tbody>
                  @foreach($delivery_rates as $delivery_rate)
                    <tr>
                      
                      <td>
                          <?php
                            $state_id = $delivery_rate->state_id;
                            $state = DB::table('states')->where('id', '=', $state_id)->get()->first();
                            echo $state->state_name;
                          ?>
                      </td>

                      <td>
                          {{ $delivery_rate->rate }}
                      </td>

                      <td class="text-center">             
                        <div class="edit-btn-wrap">
                          
                            <div class="edit-btn">
                              <a href="{{ route('admin.delivery_rates.edit', ['id' => $delivery_rate->delivery_rate_id]) }}" title="edit">
                                <img src="{{ asset('admin_assets/images/edit_icon.png') }}"/> 
                              </a>
                            </div>

                            <div class="edit-btn">
                              <a href="{{ route('admin.delivery_rates.delete', ['id' => $delivery_rate->delivery_rate_id]) }}" title="delete">
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
        </div>
          
      </div>
    </div> <!--/.col-md-7-->
     
</div>


@stop