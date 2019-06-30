@extends('layouts.adminlayout')


@section('content')

<div class="page-title-box">
    <h4 class="page-title">Admin Users</h4>
      
    <ol class="breadcrumb">
      <li>
        <a href="">Dashboard</a>
      </li>

      <li class="active">
        Admin Users
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
                            <a href="{{ route('admin.managers.create') }}" class="btn btn-primary">Create Admin</a>
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
                    <th width="15%">Name</th>
                    <th width="15%">Email</th>
                    <th width="25%">Permission</th>
                    
                    <th width="10%" class="text-right">Actions</th>
                  </tr>
                </thead>
                
                <tbody>
                  @foreach($admins as $admin)
                    <tr>
                      
                      <td>
                          {{ $admin->name }}
                      </td>

                      <td>
                          {{ $admin->email }}
                      </td>

                      <td>
                          {{ $admin->permission }}
                      </td>
                      
                      <td class="text-center">             
                        <div class="edit-btn-wrap">
                          
                            <div class="edit-btn">
                              <a href="{{ route('admin.managers.edit', ['id' => $admin->id]) }}" title="Permission">
                                <img src="{{ asset('admin_assets/images/edit_icon.png') }}"/> 
                              </a>
                            </div>
                            
                            <div class="edit-btn">
                              <a href="{{ route('admin.managers.delete', ['id' => $admin->id]) }}" title="Delete">
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