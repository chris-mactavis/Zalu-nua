@extends('layouts.adminlayout')


@section('content')

<div class="page-title-box">
    <h4 class="page-title">Store</h4>
      
    <ol class="breadcrumb">
      <li>
        <a href="">Dashboard</a>
      </li>

      <li class="active">
        Store
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
                            <a href="{{ route('admin.departments.create') }}" class="btn btn-primary">Add Store</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="white-box">
          
          <div class="table-responsive">
              <!--
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th width="15%">Name</th>
                    <th width="10%">Home Banner</th>
                    <th width="5%" class="text-center">Actions</th>
                  </tr>
                </thead>
                
                <tbody>
                  @foreach($departments as $department)
                    <tr>
                      <td>
                          {{ $department->department_name }}
                      </td>

                      <td>
                          <img src="{{ $department->department_banner }}" />
                      </td>

                      <td class="text-center">             
                        <div class="edit-btn-wrap">
                          
                            <div class="edit-btn">
                              <a href="{{ route('admin.departments.edit', ['id' => $department->id]) }}" title="edit">
                                <img src="{{ asset('admin_assets/images/edit_icon.png') }}"/> 
                              </a>
                            </div>
                            
                            <div class="edit-btn">
                              <a href="{{ route('admin.departments.delete', ['id' => $department->id]) }}" title="delete">
                                <img src="{{ asset('admin_assets/images/delete_icon.png') }}"/>
                              </a>
                            </div>

                        </div>
                      </td>

                    </tr> 
                  @endforeach
                 
                </tbody>
              </table>
              -->
              
              <div class="row">
                
                @foreach($departments as $department)
                <div class="col-md-3">
                  <div class="dept_wrap">
                    <div class="dept_img">
                      <img src="{{ $department->department_banner }}">
                    </div>
                    <h4>{{ $department->department_name }}</h4>
                    <div class="dept_btns">
                      <a href="{{ route('admin.departments.edit', ['id' => $department->department_id]) }}" title="edit" class="btn btn-primary">
                        Edit
                      </a>
                      
                      <a href="{{ route('admin.departments.delete', ['id' => $department->department_id]) }}" title="delete" class="btn btn-danger">
                        Delete
                      </a>
                    </div>
                  </div>
                </div>
                @endforeach
                
              </div>        
          </div>

        </div>
      </div> <!--/.col-md-7-->
    </div>  
  </div>  
</div>


@stop