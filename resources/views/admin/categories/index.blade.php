@extends('layouts.adminlayout')


@section('content')

<div class="page-title-box">
    <h4 class="page-title">Categories</h4>
      
    <ol class="breadcrumb">
      <li>
        <a href="">Dashboard</a>
      </li>

      <li class="active">
        Categories
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
                            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Add Category</a>
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
                    <th width="10%">Cover Image</th>
                    <th width="15%">Category Name</th>
                    <th width="20%">Category URL</th>
                    <th width="20%">Department</th>
                    <th width="10%" class="text-center">Actions</th>
                  </tr>
                </thead>
                
                <tbody>
                  @foreach($categories as $category)
                    <tr>
                      
                      <td>
                          <img src="{{ $category->cover_image }}" />
                      </td>

                      <td>
                          {{ $category->category_name }}
                      </td>

                      <td>
                          {{ $category->category_url }}
                      </td>

                      <td>
                        <?php 
                        $department_id = $category->department_id;
                        $department = DB::table('departments')->where('department_id', '=', $department_id)->get()->first();
                        //dd($department);
                        if(!empty($department)) {
                          echo $department->department_name;
                        }
                        
                        ?>
                      </td>
                      
                      <td class="text-center">             
                        <div class="edit-btn-wrap">
                          
                            <div class="edit-btn">
                              <a href="{{ route('admin.categories.edit', ['id' => $category->category_id]) }}" title="edit">
                                <img src="{{ asset('admin_assets/images/edit_icon.png') }}"/> 
                              </a>
                            </div>
                            
                            <div class="edit-btn">
                              <a href="{{ route('admin.categories.delete', ['id' => $category->category_id]) }}" title="delete">
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