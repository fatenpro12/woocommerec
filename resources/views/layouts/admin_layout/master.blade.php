<!--
=========================================================
Material Dashboard - v2.1.2
=========================================================

Product Page: https://www.creative-tim.com/product/material-dashboard
Copyright 2020 Creative Tim (https://www.creative-tim.com)
Coded by Creative Tim

=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
       Woocommerece Dashboard
    </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--     Fonts and icons     -->
   @include('layouts.admin_layout.includes.top')
</head>

<body class="">
<div class="">
    @include('layouts.admin_layout.includes.sidebar')
    <div class="main-panel">
        <!-- Navbar -->
    @include('layouts.admin_layout.includes.nav')
        <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
           @yield('content')
            </div>
        </div>
        @include('layouts.admin_layout.includes.footer')

    </div>
    @include('layouts.admin_layout.includes.bottom')
</div>
</body>

</html>
