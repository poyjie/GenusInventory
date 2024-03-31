<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Genus Inventory System</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <meta name="csrf-token" content="{{ Session::token() }}"> 
  <!-- Google Fonts -->


  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
  <link rel="stylesheet" href="{{asset('assets/customer/fonts/icomoon/style.css')}}">

  <link rel="stylesheet" href="{{asset('assets/customer/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/customer/css/magnific-popup.css')}}">
  <link rel="stylesheet" href="{{asset('assets/customer/css/jquery-ui.css')}}">
  <link rel="stylesheet" href="{{asset('assets/customer/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/customer/css/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/customer/css/aos.css')}}">
  <link rel="stylesheet" href="{{asset('assets/customer/css/style.css')}}">
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>
@include('customer.layouts.spinner')
<body>
    <div class="site-wrap">
        <header class="site-navbar" role="banner">
          <div class="site-navbar-top">
            <div class="container">
              <div class="row align-items-center">


                <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
                  <div class="site-logo">
                    <a href="index.html" class="js-logo-clone">Genus</a>
                  </div>
                </div>
                @if (session()->has('user'))
                    <div class="col-6 col-md-4 order-3 order-md-3 text-right">
                        <div class="site-top-icons">
                        <ul>
                            {{-- <li><a href="#"><span class="icon icon-person"></span></a></li>
                            <li><a href="#"><span class="icon icon-heart-o"></span></a></li> --}}
                         
                            <li><span class="icon icon-envelope-alt"></span> : {{ session()->get('user')[0]->email }}</li>
                            <li><span class="icon icon-phone-sign"></span>: {{ session()->get('user')[0]->cpnumber }}</li>
                           <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                        </ul>
                        </div>
                    </div>
                @endif


              </div>
            </div>
            
          </div>
          <nav class="site-navigation text-right text-md-center" role="navigation">
            <div class="container">
              <ul class="site-menu js-clone-nav d-none d-md-block">
                <li><a href="/home">Home</a></li>
                <li><a href="/shop">Shop</a></li>
                <li><a href="#">Contact</a></li>
                @if (session()->has('user'))
                    <li><a href="#"><span class="icon icon-truck"></span> Orders</a></li>
                    <li>
                      <a href="/mycart" class="site-cart">
                          <span class="icon icon-shopping_cart"></span>
                          Cart
 
                      </a>
                      </li>
                    <li>   <br><a href="{{ route('signout') }}">Signout</a></li>
                @else
                    <li><a href="/login">Login</a></li>
                @endif
              </ul>
            </div>
          </nav>
        </header>
