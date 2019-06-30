@extends('layouts.adminlayout')


@section('content')

<div class="page-title-box">
    <h4 class="page-title">Articles</h4>

    <div class="btn-wrap">
      <div class="top-btn">
        <a href="{{ route('admin.articles.create') }}" class="btn btn-primary">Add Article</a>
      </div>
    </div>
      
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
    <div class="row">
      <div class="col-md-12">
        <div class="white-box">
          
          <div class="table-responsive">
            
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th width="30%">Banner</th>
                    <th width="30%">Title</th>
                    <th width="60%">Content</th>
                    <th width="10%" class="text-center">Actions</th>
                  </tr>
                </thead>
                
                <tbody>
                  @foreach($articles as $article)
                    <tr>
                      
                      <td><img src="{{ $article->banner }}"></td>

                      <td>{{ $article->title }}</td>

                      <td>{{ str_limit($article->content, 200) }}</td>

                      
                      <td class="text-center">
                        
                        <div class="edit-btn-wrap">
                            <div class="edit-btn">
                              <a href="{{ route('admin.articles.detail', ['id' => $article->id]) }}" title="view detail">
                                <img src="{{ asset('admin_assets/images/details_icon.png') }}"/>
                              </a>
                            </div>

                            <div class="edit-btn">
                              <a href="{{ route('admin.articles.edit', ['id' => $article->id]) }}" title="edit press">
                                <img src="{{ asset('admin_assets/images/edit_icon.png') }}"/>
                              </a>
                            </div>
                            
                            <div class="edit-btn">
                              <a href="{{ route('admin.articles.delete', ['id' => $article->id]) }}" title="delete">
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