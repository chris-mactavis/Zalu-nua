<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	
	<meta name="viewport" content="width=device-width,initial-scale=1">
	
	<meta name="author" content="MariePhilip Consulting Limited">
	
	<meta name="description" content="description here">
	
	<meta name="keywords" content="keywords,here">

	<title>Unity Bank Admin</title>
	
	<link rel="shortcut icon" href="">

	<link href="{{ asset('css/adminstyles.css') }}" rel="stylesheet" type="text/css">
  	
  	<link href="{{ asset('admin_assets/css/icons.css') }}" rel="stylesheet">
  	
  	<link href="{{ asset('admin_assets/css/toastr.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('admin_assets/css/style.css') }}" rel="stylesheet" type="text/css" />
  	
  	<link href="{{ asset('admin_assets/css/additional.css') }}" rel="stylesheet" type="text/css" />
  	
  	<link href="{{ asset('admin_assets/css/responsive.css') }}" rel="stylesheet" type="text/css" />

    <!-- Include Editor style. -->
    

</head>

<body class="fixed-top">

<div id="wrapper">

    <div class="wrapper">
        <div class="content-main container">
            <div class="login_wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            
                            <div class="panel panel-default">
                                <div class="panel-heading text-center" style="padding: 10px 20px"><h3>Login</h3></div>

                                <div class="panel-body">
                                    <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.login') }}">
                                        {{ csrf_field() }}

                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label for="password" class="col-md-4 control-label">Password</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control" name="password" required>

                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <div class="checkbox no_indent">
                                                    <label>
                                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-8 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">Login</button>
                                                <a class="btn btn-link" href="{{ route('admin.password.request') }}">
                                                    Forgot Your Password?
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="login_extra">
                                <p class="text-center">Do not have an account? <a href="{{route('register')}}">Sign up</a></p>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div> <!--End content-main-->

        <footer class="footer-main"> <?php echo date('Y') ?> &copy; Unity Bank Admin</footer>	
            
    </div>
    
</div>

