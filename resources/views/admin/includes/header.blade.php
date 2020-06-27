<?php 
$loggedInUser = Auth::user();
if(empty(Auth::user())){ ?>
	
<script>
setTimeout(function() {
  window.location.href = "<?php echo url('admin/index'); ?>";
}, 20); 
</script>
<?php die; }  ?>

<!doctype html>
<html lang="en">


<!-- Mirrored from puffintheme.com/demo/oculux/html/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Apr 2019 07:35:00 GMT -->
<head>
<title>Cricket Panel</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="icon" href="{{ URL::to('admin/images/db_icon.ico') }}" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="{{ URL::to('admin/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ URL::to('admin/assets/vendor/font-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ URL::to('admin/assets/vendor/animate-css/vivify.min.css') }}">

<link rel="stylesheet" href="{{ URL::to('admin/assets/vendor/c3/c3.min.css') }}"/>
<link rel="stylesheet" href="{{ URL::to('admin/assets/vendor/chartist/css/chartist.css') }}">
<link rel="stylesheet" href="{{ URL::to('admin/assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css') }}">
<link rel="stylesheet" href="{{ URL::to('admin/assets/vendor/toastr/toastr.min.css') }}">

<!-- MAIN CSS -->
<link rel="stylesheet" href="{{ URL::to('admin/html/assets/css/site.min.css') }}">
<style type="text/css">
	div#main-content {
   /* background-color: #FFE9E9;*/
}
.alert {
    padding: 0.5vw 0.2vw;
    text-align: center;
}
.alert p{
    margin: 0 !important;
}
.toast-bottom-right{
	display: none;
}
a.theme_btn {
    padding: 16px 0px 16px 0px;
}
.cstm_sub {
    position: fixed;
    right: 1vw;
    bottom: 1vw;
    background-color: #C82333;
    padding: 1vw;
    border-radius: 0.5vw;
}
.themesetting{
    display: none;
}
.table tr td, .table tr th{
    white-space: normal;
}
</style>
</head>
<body class="theme-cyan font-krub">

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

<!-- Theme Setting -->
<div class="themesetting">
    <a href="javascript:void(0);" class="theme_btn"><i class="icon-magic-wand"></i></a>

</div>



<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<div id="wrapper">

    <nav class="navbar top-navbar">
        <div class="container-fluid">

            <div class="navbar-left">
                <div class="navbar-btn">
                    <a href="{{ URL::to('admin/dashboard') }}"><img src="{{ URL::to('admin/images/unnamed.png') }}" alt="Bhaskar Logo" class="img-fluid logo"></a>
                    <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
                </div>
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                            <i class="icon-envelope"></i>
                            <span class="notification-dot bg-green">4</span>
                        </a>
                    </li>
                
                    <li><a href="javascript:void(0);" class="megamenu_toggle icon-menu" title="Mega Menu">Mega</a></li>
                    <li class="p_social"><a href="#" class="social icon-menu" title="News">Social</a></li>
                    <li class="p_news"><a href="#" class="news icon-menu" title="News">News</a></li>
                    <li class="p_blog"><a href="#" class="blog icon-menu" title="Blog">Blog</a></li>
                </ul>
            </div>
            
            <div class="navbar-right">
                <div id="navbar-menu">
                    <ul class="nav navbar-nav">
                        <li><a href="javascript:void(0);" class="search_toggle icon-menu" title="Search Result"><i class="icon-magnifier"></i></a></li>                        
                        <li><a href="javascript:void(0);" class="right_toggle icon-menu" title="Right Menu"><i class="icon-bubbles"></i><span class="notification-dot bg-pink">2</span></a></li>
                        <li><a href="{{URL::to('/admin/logout')}}" class="icon-menu"><i class="icon-power"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="progress-container"><div class="progress-bar" id="myBar"></div></div>
    </nav>


    <div id="left-sidebar" class="sidebar">
        <div class="navbar-brand">
            <a href="{{URL::to('/admin/dashboard')}}"><img src="{{ URL::to('admin/images/unnamed.png') }}" alt="OculuxBhaskar Logo" class="img-fluid logo"><span>CRICKET PANEL</span></a>
            <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="lnr lnr-menu icon-close"></i></button>
        </div>
        <div class="sidebar-scroll">
            <div class="user-account">
                <div class="user_div">
                    <img src="{{ URL::to('admin/assets/images/user.png') }}" class="user-photo" alt="User Profile Picture">
                </div>
                <div class="dropdown">
                    <span>Welcome,</span>
                    <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>{{Auth::user()->name}}</strong></a>
                    <ul class="dropdown-menu dropdown-menu-right account vivify flipInY">
                        <li><a href=""><i class="icon-user"></i>My Profile</a></li>
                        <li><a href=""><i class="icon-envelope-open"></i>Messages</a></li>
                        <li><a href=""><i class="icon-settings"></i>Settings</a></li>
                        <li class="divider"></li>
                        <li><a href="{{URL::to('/admin/logout')}}"><i class="icon-power"></i>Logout</a></li>
                    </ul>
                </div>                
            </div>  
            <nav id="left-sidebar-nav" class="sidebar-nav">
                <ul id="main-menu" class="metismenu">
                    <li class="header">Main</li>

                    <li class="active open"><a href="{{URL::to('/admin/dashboard')}}"><i class="icon-home"></i><span>Dashboard</span></a></li>

                    <li>
                        <a href="#myPage" class="has-arrow"><i class="fa fa-puzzle-piece" style="font-size: 20px;"></i><span>Teams</span></a>
                        <ul>
                            <li><a href="{{URL::to('/admin/list-team')}}">List Teams</a></li>
                            <li><a href="{{URL::to('/admin/add-team')}}">Add Team</a></li>
                        </ul>
                    </li>


                     <li>
                        <a href="#myPage" class="has-arrow"><i class="icon-user"></i><span>Users</span></a>
                        <ul>
                            <li><a href="{{URL::to('/admin/users-list')}}">List Users</a></li>
                           <!--  <li><a href="{{URL::to('/admin/add-user')}}">Add Admin User</a></li> -->
                        </ul>
                    </li>
                  	
                </ul>
            </nav>     
        </div>
    </div>