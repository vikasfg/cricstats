<!doctype html>
<html lang="en">
<?php 
$loggedInUser = Auth::user();
if($loggedInUser){ ?>
<script>
setTimeout(function() {
  window.location.href = "<?php echo url('admin/dashboard'); ?>";
}, 5); 
</script>
 <?php } ?>

<head>
<title>Cricket</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="icon" href="{{ URL::to('admin/images/db_icon.png') }}" type="image/x-icon">
<!-- VENDOR CSS -->

<link rel="stylesheet" href="{{ URL::to('admin/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ URL::to('admin/assets/vendor/animate-css/vivify.min.css') }}">

<!-- MAIN CSS -->
<link rel="stylesheet" href="{{ URL::to('admin/html/assets/css/site.min.css') }}">
<style type="text/css">
.alert {
    padding: 0.5vw 0.2vw;
        text-align: center;
}
.alert p{
    margin: 0 !important;
}
</style>
</head>
<body class="theme-cyan font-montserrat">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
        <div class="bar4"></div>
        <div class="bar5"></div>
    </div>
</div>

<div class="pattern">
    <span class="red"></span>
    <span class="indigo"></span>
    <span class="blue"></span>
    <span class="green"></span>
    <span class="orange"></span>
</div>

<div class="auth-main particles_js">
    <div class="auth_div vivify popIn">
        <div class="auth_brand">
            <a class="navbar-brand" href="javascript:void(0);"><img src="{{ URL::to('admin/images/unnamed.png') }}" width="30" height="30" class="d-inline-block align-top mr-2" alt="">ADMIN PANEL</a>
        </div>
        <div class="card">
            <div class="body">
                <p class="lead">Login to your account</p>
               			 
			<?php if(count($errors) > 0){echo "visible";} ?>
				{{ Form::open(array('url' => '/admin/login', 'method' => 'post',
					'id' => 'form-login', 'class' => 'form-auth-small m-t-20')) }} 

					@if (session('confirm'))
						<div class="alert alert-success" role="alert"><p class="text-success">{{ session('confirm') }}</p></div>
					@endif

					@if (session('error'))
					<div class="alert alert-danger" role="alert"><p class="text-danger">{{ session('error')}}</p></div>
					@endif

					@if (session('message'))
					<div class="alert alert-warning" role="alert"><p class="text-warning">{{ session('message')}}</p></div>
					@endif
							
                <form class="form-auth-small m-t-20" action="#"> 
                    <div class="form-group">
                        <label for="signin-email" class="control-label sr-only">Email</label>
                        <input type="email" name="login-email" class="form-control round" id="signin-email" required="" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="signin-password" class="control-label sr-only">Password</label>
                        <input type="password" name="login-password" class="form-control round" id="signin-password" required="" placeholder="Password">
                    </div>
                    <div class="form-group clearfix">
                        <label class="fancy-checkbox element-left">
                            <input type="checkbox">
                            <span>Remember me</span>
                        </label>								
                    </div>
                    <button type="submit" class="btn btn-primary btn-round btn-block">LOGIN</button>
                    <div class="bottom">
                        <span class="helper-text m-b-10"><i class="fa fa-lock"></i> <a href="#">Forgot password?</a></span>
                        <span>Don't have an account? <a href="#">Register</a></span>
                    </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
    <div id="particles-js"></div>
</div>
<!-- END WRAPPER -->
    
<script src="{{ URL::to('admin/html/assets/bundles/libscripts.bundle.js') }}"></script>    
<script src="{{ URL::to('admin/html/assets/bundles/vendorscripts.bundle.js') }}"></script>
<script src="{{ URL::to('admin/html/assets/bundles/mainscripts.bundle.js') }}"></script>
</body>

</html>
