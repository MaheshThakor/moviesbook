<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('admin/assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('admin/assets/img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        {{config('app.name')}}
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="{{asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/assets/css/now-ui-dashboard.css?v=1.5.0')}}" rel="stylesheet" />
</head>

<body class="">
<div class="wrapper ">
    <div>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar  bg-info  navbar-absolute">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <a class="navbar-brand" href="{{route('MainPage')}}">MoviesBook.com</a>
                </div>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    <form action="/search" method="post">
                        @csrf
                        <div class="input-group no-border">
                            <input type="text" value="" class="form-control" placeholder="Search..." name="searchbar">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                                </div>
                            </div>
                        </div>
                    </form>
                        @if (Route::has('login'))
                        <ul class="navbar-nav">
                                @auth
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/') }}">
                                        <p>
                                            Home
                                        </p>
                                    </a>
                                </li>
                                @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">
                                        <p>
                                            Login
                                        </p>
                                    </a>
                                </li>

                                    @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">
                                            <p>
                                                Register
                                            </p>
                                        </a>
                                    </li>
                                    @endif
                                @endauth
                        </ul>
                        @endif
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="content">
            <div class="row bg-dark pt-5">
{{--                <div id="app">--}}
{{--                    <search-bar></search-bar>--}}
{{--                </div>--}}
                @yield('content')
            </div>
        </div>
        <footer class="footer">
            <div class=" container-fluid ">
                <nav>
                    <ul>
                        <li>
                            <a href="#">
                                {{config('app.name')}}
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                About Us
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright" id="copyright">
                    &copy; <script>
                        document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                    </script>, Developed by <a href="#" target="_blank">Arsenaltech</a>.
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="{{asset('admin/assets/js/core/jquery.min.js')}}"></script>
<script src="{{asset('admin/assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('admin/assets/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('admin/assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{asset('admin/assets/js/plugins/chartjs.min.js')}}"></script>
<script src="{{asset('admin/assets/js/plugins/bootstrap-notify.js')}}"></script>
<script>
    $(document).ready(function() {
        demo.initDashboardPageCharts();
    });
</script>
{{--<script src="{{asset('js/app.js')}}"></script>--}}
</body>
</html>
