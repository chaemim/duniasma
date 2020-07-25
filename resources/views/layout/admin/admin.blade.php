<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
      <link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="{{asset('css/sweetalert2.min.css')}}">


    {!! Charts::assets() !!}

    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('css/style.blue.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">

    <!-- Favicon-->
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">
    <!-- Font Awesome CDN-->
    <!-- you can replace it by local Font Awesome-->
    <script src="https://use.fontawesome.com/99347ac47f.js"></script>
    <!-- Font Icons CSS-->
    <link rel="stylesheet" href="https://file.myfontastic.com/da58YPMQ7U5HY8Rb6UxkNf/icons.css">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
        <script src="{{asset('tinymce/tinymce.min.js')}}"></script>

  </head>
  <body>
    <div class="page home-page">
      <!-- Main Navbar-->
      <header class="header">
        <nav class="navbar">
          <!-- Search Box-->
          <div class="search-box">
            <button class="dismiss"><i class="icon-close"></i></button>
            <form id="searchForm" action="#" role="search">
              <input type="search" placeholder="What are you looking for..." class="form-control">
            </form>
          </div>
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <!-- Navbar Header-->
              <div class="navbar-header">
                <!-- Navbar Brand --><a href="{{asset('/')}}" class="navbar-brand">
                  <div class="brand-text brand-big hidden-lg-down"><span>Dunia </span><strong>SMA</strong></div>
                  <div class="brand-text brand-small"><strong>DS</strong></div></a>
                <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
              </div>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Search-->
                <li class="nav-item d-flex align-items-center">{{Auth::user()->name}}</li>
                <li class="nav-item"><a href="{{route('logout')}}" class="nav-link logout">Logout<i class="fa fa-sign-out"></i></a></li>

                <li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-bell-o"></i><span class="badge bg-red">{{Auth::user()->notification->where('seen' , 0)->count()}}</span></a>
                  <ul aria-labelledby="notifications" class="dropdown-menu">

                    @foreach  (Auth::user()->notification->where('seen' , 0) as $notif)
                      <li><a rel="nofollow" href="#" class="dropdown-item">
                          <div class="notification">
                            <div class="notification-content"><i class="fa fa-envelope bg-green"></i>{!! \Illuminate\Support\Str::words($notif->subject, 5,'...') !!}</div>
                            <div class="notification-time"><small>{{$notif->artikel->title}}</small></div>
                          </div></a></li>
                    @endforeach

                    <li><a rel="nofollow" href="{{asset('notifikasi')}}" class="dropdown-item all-notifications text-center"> <strong>view all notifications</strong></a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <div class="page-content d-flex align-items-stretch">
        <!-- Side Navbar -->
        <nav class="side-navbar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center">
            <div class="avatar"><img src="{{asset('img/chaemim.JPG')}}" alt="..." class="img-fluid rounded-circle"></div>
            <div class="title">
              <h1 class="h4">{{Auth::user()->name}}</h1>
              <p>Web Programmer</p>
            </div>
          </div>
          <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
          <ul class="list-unstyled">
            <li  class="@if(url(asset('/admin/dashboard')) == request()->url()) active @endif" >
              <a href="{{asset('admin/dashboard')}}"><i class="fa fa-home"></i>Home</a></li>


              <li class="@if(url(asset('/admin/video')) == request()->url()) active @endif">
                <a href="{{asset('admin/video')}}"> <i class="fa fa-video-camera"></i>Video</a></li>

                <li class="@if(url(asset('/admin/artikel')) == request()->url()) active @endif">
                  <a href="{{asset('admin/artikel')}}"> <i class="fa fa-edit"></i>Artikel</a></li>

                <li class="@if(url(asset('/admin/user')) == request()->url()) active @endif">
                  <a href="{{asset('admin/user')}}"> <i class="fa fa-edit"></i>User</a></li>
          

        </nav>
        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">@yield('header')</h2>
            </div>
          </header>

          <ul class="breadcrumb">
            <div class="container-fluid">
              <li class="breadcrumb-item"><a href="{{asset('/admin/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">@yield('breadcrumb')</li>
            </div>
          </ul>

          @yield('content')

          <!-- Page Footer-->
          <footer class="main-footer" id="adminfooter">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6">
                  <p>Dunia SMA &copy; 2017</p>
                </div>
                {{-- <div class="col-sm-6 text-right">
                  <p>Design by Bootstrapious</p>
                </div> --}}
              </div>
            </div>
          </footer>
        </div>
      </div>
    </div>
    <!-- Javascript files-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="{{asset('js/tether.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.cookie.js')}}"> </script>
    <script src="{{asset('js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('js/sweetalert2.min.js')}}"></script>
    @include('sweet::alert')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="{{asset('js/charts-home.js')}}"></script>
    <script src="{{asset('js/front.js')}}"></script>
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID.-->
    <!---->

    <script>
      (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
      function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
      e=o.createElement(i);r=o.getElementsByTagName(i)[0];
      e.src='//www.google-analytics.com/analytics.js';
      r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
      ga('create','UA-XXXXX-X');ga('send','pageview');
    </script>
  </body>
</html>
