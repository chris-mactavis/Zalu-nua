@extends('layouts.adminlayout')

@section('content')


<div class="page-title-box">
    <h4 class="page-title">Shipping Zones</h4>
      
    <ol class="breadcrumb">
      <li>
        <a href="/admin">Dashboard</a>
      </li>

      <li class="active">
        Shipping Zones
      </li>
    </ol>

    <div class="clearfix"></div>
</div>

<div class="row">
    <div class="col-md-12">
      <div class="white-box">
          <div class="row">
              <div class="col-md-6">
              </div>

              <div class="col-md-6">
                  <div class="btn-wrap">
                      <div class="top-btn">
                          <button data-target="#add-zone" data-toggle="modal" class="btn btn-primary">Add Zone</button>
                          <a href="/admin/shipping-zones/manage" class="btn btn-primary">Manage Zones</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
</div>


    <div class="modal fade" id="add-zone" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">Add Shipping Zone</h4>
          </div>
          <form>
              <div class="modal-body">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

@stop