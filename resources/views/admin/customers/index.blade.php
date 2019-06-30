<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
?>

@extends('layouts.adminlayout')


@section('content')

<div class="page-title-box">
    <h4 class="page-title">Customers</h4>
      
    <ol class="breadcrumb">
      <li>
        <a href="">Dashboard</a>
      </li>

      <li class="active">
        Customers
      </li>
    </ol>

    <div class="clearfix"></div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-12">
        
        <!--<div class="white-box">
            <div class="row">
                <div class="col-md-10"></div>

                <div class="col-md-2">
                    <div class="btn-wrap">
                        <div class="top-btn">
                            <a href="#" class="btn btn-primary">Add Product</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->

        <div class="white-box">
          
          <div class="table-responsive">
            
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th width="15%">Name</th>
                    <th width="15%">Email</th>
                    <th width="10%">Phone</th>
                    <th width="20%">Address</th>
                    <th width="10%">City</th>
                    {{-- <th width="10%">State</th> --}}
                    <th width="10%" class="text-center">Actions</th>
                  </tr>
                </thead>
                
                <tbody>
                  @foreach($customers as $customer)
                    <tr>
                      
                      <td>
                          {{ $customer->name }}
                      </td>

                      <td>
                          {{ $customer->email }}
                      </td>

                      <td>
                          {{ $customer->phone }}
                      </td>

                      <td>
                          {{ $customer->address }}
                      </td>

                      <td>
                          {{ $customer->city }}
                      </td>


                      <td class="text-center">             
                        <div class="edit-btn-wrap">
                          
                            <div class="edit-btn">
                              <a href="{{ route('admin.customers.view', ['id' => $customer->id]) }}" title="Detail">
                                <img src="{{ asset('admin_assets/images/details_icon.png') }}"/> 
                              </a>
                            </div>

                            
                            {{-- <div class="edit-btn">
                              <a href="{{ route('admin.customers.edit', ['id' => $customer->id]) }}" title="edit">
                                <img src="{{ asset('admin_assets/images/edit_icon.png') }}"/> 
                              </a>
                            </div>
                             --}}
                            {{-- <div class="edit-btn">
                              <a href="{{ route('admin.customers.delete', ['id' => $customer->id]) }}" title="delete">
                                <img src="{{ asset('admin_assets/images/delete_icon.png') }}"/>
                              </a>
                            </div> --}}

                        </div>
                      </td>

                    </tr> 
                    @endforeach
                 
                  </tbody>
            </table>
                      
          </div>
            <div class="pagination_wrap">
                {{ $customers->links() }}
            </div> 
        </div>
      </div> <!--/.col-md-7-->
    </div> 
  </div>  
</div>


@stop