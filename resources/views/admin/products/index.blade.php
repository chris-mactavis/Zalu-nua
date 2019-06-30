<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
?>

@extends('layouts.adminlayout')


@section('content')

<div class="page-title-box">
    <h4 class="page-title">Products</h4>
      
    <ol class="breadcrumb">
      <li>
        <a href="">Dashboard</a>
      </li>

      <li class="active">
        Products
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
                            <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Add Product</a>
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
                    <th width="10%">Image</th>
                    <th width="18%">Name</th>
                    <th width="10%">Code</th>
                    <th width="10%">Price</th>
                    <th width="10%">Quantity</th>
                    <th width="10%">Category</th>
                    <th width="10%">Store</th>
                    <th width="12%" class="text-center">Actions</th>
                  </tr>
                </thead>
                
                <tbody>
                  @foreach($products as $product)
                    <tr>
                      
                      <td>
                          <img src="{{ $product->product_image }}" />
                      </td>

                      <td>
                          {{ $product->product_name }}
                      </td>

                      <td>
                          {{ $product->product_code }}
                      </td>

                      <td>
                          {{ $product->product_price }}
                      </td>

                      <td>
                          {{ $product->quantity_available }}
                      </td>

                      <td>
                          <?php
                            if(isset($product->category_id) && !empty($product->category_id)) {
                                $category_id = $product->category_id;
                                $category = DB::table('categories')->where('category_id', '=', $category_id)->get();
                                echo count($category) > 0 ? $category->first()->category_name : '';
                            }
                          ?>
                      </td>

                      <td>
                          <?php
                            if(isset($product->department_id) && !empty($product->department_id)) {
                                $department_id = $product->department_id;
                                $department = DB::table('departments')->where('department_id', '=', $department_id)->get();
                                echo $department->first()->department_name;
                            }
                          ?>
                      </td>

                      <td class="text-center">             
                        <div class="edit-btn-wrap">
                          
                            <div class="edit-btn">
                              <a href="{{ route('admin.products.view', ['id' => $product->id]) }}" title="Detail">
                                <img src="{{ asset('admin_assets/images/details_icon.png') }}"/> 
                              </a>
                            </div>

                            <div class="edit-btn">
                              <a href="{{ route('admin.products.view_gallery', ['id' => $product->id]) }}" title="Image">
                                <img src="{{ asset('admin_assets/images/image_icon.png') }}"/> 
                              </a>
                            </div>

                            <div class="edit-btn">
                              <a href="{{ route('admin.products.edit', ['id' => $product->id]) }}" title="edit">
                                <img src="{{ asset('admin_assets/images/edit_icon.png') }}"/> 
                              </a>
                            </div>
                            
                            <div class="edit-btn">
                              <a href="{{ route('admin.products.delete', ['id' => $product->id]) }}" title="delete">
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
            <div class="pagination_wrap">
                {{ $products->links() }}
            </div> 
        </div>
      </div> <!--/.col-md-7-->
    </div> 
  </div>  
</div>


@stop