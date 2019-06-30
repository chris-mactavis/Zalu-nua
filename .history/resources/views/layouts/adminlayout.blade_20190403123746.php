<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  
  <meta name="viewport" content="width=device-width,initial-scale=1">
  
  <meta name="author" content="MariePhilip Consulting Limited">
  
  <meta name="description" content="description here">
  
  <meta name="keywords" content="keywords,here">

  <title>Zalu-Nua Admin</title>
  
  <link rel="shortcut icon" href="">

  <link href="{{ asset('css/adminstyles.css') }}" rel="stylesheet">

    <link href="{{ asset('admin_assets/css/metisMenu.min.css') }}" rel="stylesheet" />
    
    <link href="{{ asset('admin_assets/css/nanoscroller.css') }}" rel="stylesheet" />
    
    <link href="{{ asset('admin_assets/css/icons.css') }}" rel="stylesheet">
    
    <link href="{{ asset('admin_assets/css/toastr.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('admin_assets/css/style.css') }}" rel="stylesheet" />
    
    <link href="{{ asset('admin_assets/css/additional.css') }}" rel="stylesheet" />
    
    <link href="{{ asset('admin_assets/css/responsive.css') }}" rel="stylesheet" />

    <!-- Include Editor style. -->

    <link href="{{ asset('css/summernote.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="app.css">

</head>

<body class="fixed-top">
      
<!--Start Page loader -->
<!--<div id="pageloader">   
  <div class="loader">
    <img src="{{ asset('admin_assets/images/progress.gif') }}" alt='loader' />
  </div>
</div>-->
<!--End Page loader -->
      
<div id="wrapper">
    
    <div class="page-header navbar navbar-fixed-top">
      <div class="page-header-main">

        <div class="logo">
          <a href="#">
            <h3 style="color: #fff">Zalu-Nua</h3>
          </a>
        </div> <!--/.logo-->


        <div class="sidebar-main-toggle">
            <a href="javascript:;" class="navbar-small pull-left ">
              <i class="fa fa-bars"></i>
            </a>
        </div> <!--/.menu-toggler-->


        <!--Start Search-->
        <div class="search-top">
          <form>
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search...">
            </div>
          </form>
        </div>
        <!--End Search-->


        <!--Start Right Menu-->
        <div class="right-menu">
            <ul class="nav navbar-nav navbar-right">

              <!--<li class="dropdown dropdown-messages">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge">5</span>
                </a>
                
                <ul class="dropdown-menu">
                   <li class="dropdown-header">You Have New Messages</li>
                   
                   <li class="notification-list scroll list-group">
                      
                      <a href="javascript:void(0);" class="notification list-group-item">
                        <div class="message-icon pull-left">
                          <img src="assets/images/users/avatar-1.jpg"  alt=""/>
                        </div>
                        <div class="message-info-main">
                          <span class="message-name">John Doe</span>
                          <span class="message-text">Payment Confirmation for new sell</span>
                          <span class="message-time">9:30 AM</span>
                        </div>
                      </a>

                      <a href="javascript:void(0);" class="notification list-group-item">
                        <div class="message-icon pull-left">
                          <img src="assets/images/users/avatar-2.jpg"  alt=""/>
                        </div>
                        <div class="message-info-main">
                          <span class="message-name">Johnson </span>
                          <span class="message-text">New item approved</span>
                          <span class="message-time">9:35 AM</span>
                        </div>
                      </a>

                   </li>

                   <li class="dropdown-footer"><a href="#">View All</a></li>
                </ul>
              </li> -->

              <li class="dropdown dropdown-usermenu">
                <a href="index.html#" class=" dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                  
                  <span class="hidden-sm hidden-xs">Hello {{ Auth::guard('admin')->user()->name }}</span>
                  <span class="caret hidden-sm hidden-xs"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                  <li>
                    <a href="#">
                      <i class="fa fa-wrench"></i>  User Settings
                    </a>
                  </li>
                  
                  <li>
                    <a href="">
                      <i class="fa fa-user"></i>  Profile
                    </a>
                  </li>
                  
                  <li class="divider"></li>
                  
                </ul>
              </li>                       
            </ul>
        </div>
        <!--End Right Menu-->

      </div>
    </div>
    <!--End page-header-->


    <div class="clearfix"> </div>


    <div class="main-container">
        
        <!-- Start Sidebar Main-->
        <div class="sidebar-main">
          <nav class="sidebar-nav">
            <ul class="metismenu" id="side-menu">
              
              <li>
                <a href="{{ route('admin.home') }}">
                  <i class="ti-dashboard"></i>  <span class="menu-label">Dashboard </span>
                </a>
              </li>

              <li>
                <a href="{{ route('admin.settings') }}">
                  <i class="fa fa-gears"></i>  <span class="menu-label">Site Settings </span>
                </a>
              </li>

              
              <li>
                <a href="{{ route('admin.sliders.index') }}">
                  <i class="fa fa-image"></i>  <span class="menu-label">Home Banners </span>
                </a>
              </li>

              <li>
                <a href="{{ route('admin.departments.index') }}">
                  <i class="fa fa-building"></i>  <span class="menu-label">Stores </span>
                </a>
              </li>

              <li>
                <a href="javascript:void(0)">
                  <i class="fa fa-briefcase"></i> <span class="menu-label">Product Catalogue</span><span class="fa arrow"></span>
                </a>
                <ul class="nav nav-sub nav-second-level collapse">
                  
                  <!--<li><a href="{{ route('admin.departments.index') }}">Departments</a></li>-->

                  <li><a href="{{ route('admin.categories.index') }}">Categories</a></li>
                  
                  <li><a href="{{ route('admin.products.index') }}">Product</a></li>                  
                </ul>
              </li>


              <li>
                <a href="{{ route('admin.orders') }}">
                  <i class="fa fa-shopping-cart"></i>  <span class="menu-label">Orders </span>
                </a>
              </li>

              <li>
                <a href="{{ route('admin.customers') }}">
                  <i class="fa fa-users"></i>  <span class="menu-label">Customers </span>
                </a>
              </li>

              <li>
                <a href="javascript:void(0)">
                  <i class="ti-email"></i>  <span class="menu-label">Notifications </span><span class="fa arrow"></span>
                </a>
                <ul class="nav nav-sub nav-second-level collapse">
                  <li><a href="">View Messages </a></li>
                  <li><a href="">New Message</a></li>
                </ul>
              </li>


              <li>
                <a href="{{ route('admin.pages.index') }}">
                  <i class="fa fa-book"></i>  <span class="menu-label">Pages </span>
                </a>
              </li>

              <!--<li>
                <a href="#">
                  <i class="fa fa-book"></i>  <span class="menu-label">Blog Articles </span>
                </a>
              </li>-->

              <li>
                <a href="{{ route('admin.delivery_rates.index') }}">
                  <i class="fa fa-truck"></i>  <span class="menu-label">Delivery Rates</span>
                </a>
              </li>

              <li>
                <a href="/admin/shipping-zones">
                  <i class="fa fa-truck"></i>  <span class="menu-label">Shipping Zones</span> <span class="badge badge-success badge-sm">new</span>
                </a>
              </li>


              <li>
                <a href="javascript:void(0)">
                  <i class="fa fa-user"></i>  <span class="menu-label">Admins </span><span class="fa arrow"></span>
                </a>
                <ul class="nav nav-sub nav-second-level collapse">
                  <li><a href="{{ route('admin.managers.index')}}">View Admins </a></li>
                  <li><a href="{{ route('admin.managers.create') }}">Create Admin</a></li>
                </ul>
              </li>


              <li>
                <a href="#">
                  <i class="fa fa-key"></i>  <span class="menu-label">Change Password </span>
                </a>
              </li>

              <li>
                <a href="{{ route('admin.logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-power-off"></i>  <span class="menu-label">Logout</span>
                </a>

                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
              </li>

            </ul>
          </nav>
        </div>
        <!-- End Sidebar Main-->


        <!--Start wrapperr-->
        <div class="wrapper">
          <div class="content-main container">

            @yield('content')
          
          </div> <!--End content-main-->

          <footer class="footer-main"> <?php echo date('Y') ?> &copy; Zalu-Nua Admin</footer>  
            
        </div>

    </div> <!--/.Main page-container-->

</div>
<!--End wrapper-->

<!--JQUERY SCRIPTS-->
<script src="{{ asset('admin_assets/js/jquery.min.js') }}"></script>

<script src="{{ asset('admin_assets/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('admin_assets/js/metisMenu.min.js') }}"></script>

<script src="{{ asset('admin_assets/js/jquery.nicescroll.min.js') }}"></script>

<script src="{{ asset('admin_assets/js/jquery.slimscroll.js') }}"></script>

<script src="{{ asset('admin_assets/js/toastr.min.js') }}"></script>

<script src="{{ asset('js/summernote.js') }}"></script>

<!--<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>-->


<script src="{{ asset('admin_assets/js/custom.js') }}"></script>

<script type="text/javascript">

    $(document).ready(function() {
        
        $('.edit-btn-trigger').on('click', function(e) {        
             $(e.target).closest('.edit-btn-wrap').find('.edit-btn-cont').toggle('show');
        });

        $('#summernote').summernote();

    });
</script>

<script type="text/javascript">
  $('#department_id').on('change', function(e) {
    //console.log(e);

    var department_id = e.target.value;
    $.get('/admin/json-categories?department_id='+department_id, function(data){
      //console.log(data);
      $('#category_id').empty();
      $('#category_id').append('<option value="">Select Category</option>');
      $.each(data, function(index, categoriesObj) {
        $('#category_id').append('<option value="'+categoriesObj.category_id+'">'+categoriesObj.category_name+'</option>');
      })
    })
  });


</script>

<script type="text/javascript">
  @if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}");
  @endif
</script>
