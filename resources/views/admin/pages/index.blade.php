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
    <div class="row">
      <div class="col-md-12">
        
        <div class="white-box">
            <div class="row">
                <div class="col-md-10"></div>

                <div class="col-md-2">
                    <div class="btn-wrap">
                        <div class="top-btn">
                            <a href="{{ route('admin.pages.create') }}" class="btn btn-primary">Create Page</a>
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
                    <th width="20%">Title</th>
                    <th width="65%">Content</th>
                    <th width="15%" class="text-center">Actions</th>
                  </tr>
                </thead>
                
                <tbody>
                  @foreach($pages as $page)
                    <tr>
                      
                      <td>{{ $page->page_title }}</td>

                      <td>{{ str_limit($page->content, 200) }}</td>

                      
                      <td class="text-center">
                        
                        <div class="edit-btn-wrap">
                            <div class="edit-btn">
                              <a href="{{ route('admin.pages.detail', ['id' => $page->id]) }}" title="view detail">
                                <img src="{{ asset('admin_assets/images/details_icon.png') }}"/>
                              </a>
                            </div>

                            <div class="edit-btn">
                              <a href="{{ route('admin.pages.edit', ['id' => $page->id]) }}" title="edit press">
                                <img src="{{ asset('admin_assets/images/edit_icon.png') }}"/>
                              </a>
                            </div>
                            
                            <div class="edit-btn">
                              <a href="{{ route('admin.pages.delete', ['id' => $page->id]) }}" title="delete">
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