<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('public/img/pokedex-icon.png') }}">
    <title>Pokedex API</title>
    <!-- This page plugin CSS -->
    <link href="{{ asset('public/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('public/dist/css/jquery.toast.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/dist/css/styledoh12.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/dist/customstyle.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/libs/morris.js/morris.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <link href="{{ asset('public/css/daterangepicker.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/extra-libs/prism/prism.css')}}">
    @yield('css')

</head>

<body onload="initClock()">
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6"data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-lg">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <div class="navbar-brand text-center">
                        <a href="{{ asset('public/home')}}">
                            <h3 class="mt-3">
                                P<small>okedex</small> API
                            </h3>
                        </a>
                    </div>
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav float-left">
                        <i id="toggle-menu" class="ti-close ti-menu text-primary" style="padding: 18px"></i>        
                        <b class="logo-icon">
                            <img src="{{ asset('public/img/pokedex-icon.png') }}" alt="homepage" style="width: 45%;" onclick="openNav()" />
                        </b>
                    </ul>
                    <div id="timedate">
                        <a id="mon">Jan</a>
                        <a id="d">1</a>,
                        <a id="y">0</a><br />
                        <a id="h">12</a> :
                        <a id="m">00</a>:
                        <a id="s">00</a>
                    </div>,
                    <ul class="navbar-nav float-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                @if(Auth::user()->mypds && Auth::user()->mypds->picture_link)
                                <img src="{{ asset('public/storage/app/public') }}/{{Auth::user()->mypds->picture_link}}" class="rounded-circle" width="40" />
                                @else
                                <img src="{{ asset('public/img/profile.png') }}" alt="user" class="rounded-circle" width="40">
                                @endif
                                <span class="ml-2 d-none d-lg-inline-block"> <span
                                        class="text-dark">@if(Auth::user()->mypds){{Auth::user()->mypds->nick_name}}@endif</span> <i data-feather="chevron-down"
                                        class="svg-icon"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fas fa-toggle-off"></i>
                                    Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside id="sidebarnavIgation" class="left-sidebar" data-sidebarbg="skin6">
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ asset('admin')}}"
                                aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                                    class="hide-menu">Dashboard</span></a></li>
                        <li class="list-divider"></li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{asset('pokemon')}}"
                                aria-expanded="false"><i class="fas fa-play-circle"></i><span
                                    class="hide-menu">Pokemon</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{asset('pokemon/types')}}"
                                aria-expanded="false"><i class="fas fa-sitemap"></i><span
                                    class="hide-menu">Types</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{asset('/pokemon/moves')}}"
                                aria-expanded="false"><i class="fab fa-superpowers"></i><span
                                    class="hide-menu">Moves</span></a></li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div id="main-content" class="page-wrapper">
            <div class="main-view">
                <div class="loading"></div>
                @yield('content')
        </div>
        <footer class="footer text-left text-muted">
            <p class="pull-right">All Rights Reserved {{ date("Y") }} | Version 1.0</p>
        </footer>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
    <script src="{{ asset('public/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="crossorigin="anonymous"></script>
    <script src="https://malsup.github.io/jquery.form.js"></script> 
    <script src="{{ asset('public/assets/libs/jquery/dist/jquery-validate.js') }}"></script>
    <script src="{{ asset('public/assets/libs/jquery/dist/printThis.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('public/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('public/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- apps -->
    <script src="{{ asset('public/dist/js/jquery.toast.min.js') }}"></script>
    <script src="{{ asset('public/dist/js/app-style-switcher.js')}}"></script>
    <script src="{{ asset('public/dist/js/feather.min.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
    <script type="text/javascript" src="{{ asset('public/js/daterangepicker.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('public/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{ asset('public/assets/extra-libs/sparkline/sparkline.js')}}"></script>
    <!--Wave Effects -->
    <!-- themejs -->
    <!--Menu sidebar -->
    <script src="{{ asset('public/dist/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('public/dist/js/custom.min.js')}}"></script>
    <!--This page plugins -->
    <script src="{{ asset('public/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('public/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
    <script src="{{ asset('public/assets/extra-libs/c3/d3.min.js') }}"></script>
    <script src="{{ asset('public/assets/extra-libs/c3/c3.min.js') }}"></script>
    <script src="{{ asset('public/assets/libs/chartist/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('public/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ asset('public/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('public/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('public/assets/extra-libs/prism/prism.js')}}"></script>
    <script src="{{ asset('public/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('public/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
    @include('scripts.layout')
    @yield('js')
</body>

</html>
