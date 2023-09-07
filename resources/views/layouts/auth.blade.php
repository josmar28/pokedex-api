<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('public/img/doh.png') }}">
    <title>Pokedex API</title>
    <!-- Custom CSS -->
    <link href="{{ asset('public/dist/css/jquery.toast.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/dist/css/styledoh12.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/dist/customstyle.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/bubbles.css') }}" rel="stylesheet">
</head>

<body>
    <div class="main-wrapper">
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative">
            @yield('content')
        </div>
    </div>
    <script src="{{ asset('public/assets/libs/jquery/dist/jquery.min.js') }} "></script>
    <script src="{{ asset('public/assets/libs/popper.js/dist/umd/popper.min.js') }} "></script>
    <script src="{{ asset('public/assets/libs/bootstrap/dist/js/bootstrap.min.js') }} "></script>
    <script src="{{ asset('public/dist/js/jquery.toast.min.js') }}"></script>
    <script>
      @if(Session::get('login_status'))
           $.toast({
                heading: 'Error',
                text: "<?php echo Session::get('login_status')?>",
                showHideTransition: 'fade',
                position: 'top-center',
                icon: 'error',
                hideAfter: false
            })
          <?php
              Session::put("login_status",false);
              Session::put("myusername",false);
          ?>
      @endif
      $(".preloader ").fadeOut();
    </script>
</body>

</html>