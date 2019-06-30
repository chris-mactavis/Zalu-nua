@extends('layouts.adminlayout')


@section('content')

<div class="page-title-box">
    <h4 class="page-title">Dashboard</h4>
      
    <ol class="breadcrumb">
      <li>
        <a href="">Dashboard</a>
      </li>

      <li class="active">
        Dashboard 
      </li>
    </ol>

    <div class="clearfix"></div>
</div>


<div class="row">
  <div class="col-md-12">
    <div class="row">
       <div class="col-md-3 col-sm-6">
         <div class="tiles-style1 circle-icon white-box">
           <div class="tiles-icon bg-success"> <i class="icon-layers"></i>  </div>
           <div class="tiles-text text-right">
             <h4>Orders</h4>
           </div>
         </div>
       </div>

       <div class="col-md-3 col-sm-6">
          <div class="tiles-style1 circle-icon white-box">
            <div class="tiles-icon bg-success"> <i class="icon-grid"></i>  </div>
            <div class="tiles-text text-right">
             <h4>Products</h4>
            </div>
          </div>
       </div>

       <div class="col-md-3 col-sm-6">
         <div class="tiles-style1 circle-icon white-box">
            <div class="tiles-icon  bg-success "> <i class="icon-cloud-upload"></i>  </div>
            <div class="tiles-text text-right">
              <h4>Today's Sales</h4>
            </div>
         </div>
       </div>

       
       <div class="col-md-3 col-sm-6">
         <div class="tiles-style1 circle-icon white-box">
           <div class="tiles-icon bg-success"> <i class="icon-people"></i>  </div>
           <div class="tiles-text text-right">
             <h4>Customers</h4>
           </div>
         </div>
       </div>

       <div class="col-md-3 col-sm-6">
          <div class="tiles-style1 circle-icon white-box">
             <div class="tiles-icon bg-success"> <i class="icon-picture"></i>  </div>
             <div class="tiles-text text-right">
               <h4>Home Banners</h4>
             </div>
          </div>
       </div>

       <div class="col-md-3 col-sm-6">
          <div class="tiles-style1 circle-icon white-box">
             <div class="tiles-icon bg-success"> <i class="icon-exclamation"></i>  </div>
             <div class="tiles-text text-right">
               <h4>Coupons</h4>
             </div>
          </div>
       </div>

       <div class="col-md-3 col-sm-6">
         <div class="tiles-style1 circle-icon white-box">
            <div class="tiles-icon  bg-success "> <i class="icon-picture"></i>  </div>
            <div class="tiles-text text-right">
              <h4>Notifications</h4>
            </div>
         </div>
       </div>

       <div class="col-md-3 col-sm-6">
          <div class="tiles-style1 circle-icon white-box">
            <div class="tiles-icon bg-success"> <i class="icon-film"></i>  </div>
            <div class="tiles-text text-right">
             <h4>Settings</h4>
            </div>
          </div>
       </div><!-- /.col-md-3-->
    </div>

    <div class="row">
        
    </div>
  </div>  
</div>


@stop