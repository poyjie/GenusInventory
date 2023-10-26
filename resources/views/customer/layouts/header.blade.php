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

</head>
@include('customer.layouts.spinner')
<body>
    <div class="site-wrap">
        <header class="site-navbar" role="banner">
          <div class="site-navbar-top">
            <div class="container">
              <div class="row align-items-center">

                <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
                  <form action="" class="site-block-top-search">
                    <span class="icon icon-search2"></span>
                    <input type="text" class="form-control border-0" placeholder="Search">
                  </form>
                </div>

                <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
                  <div class="site-logo">
                    <a href="index.html" class="js-logo-clone">Genus</a>
                  </div>
                </div>

                <div class="col-6 col-md-4 order-3 order-md-3 text-right">
                  <div class="site-top-icons">
                    <ul>
                      <li><a href="#"><span class="icon icon-person"></span></a></li>
                      <li><a href="#"><span class="icon icon-heart-o"></span></a></li>
                      <li>
                        <a href="cart.html" class="site-cart">
                          <span class="icon icon-shopping_cart"></span>
                          <span class="count">2</span>
                        </a>
                      </li>
                      <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                    </ul>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <nav class="site-navigation text-right text-md-center" role="navigation">
            <div class="container">
              <ul class="site-menu js-clone-nav d-none d-md-block">
                <li><a href="/">Home</a></li>
                <li><a href="/shop">Shop</a></li>
                @if (session()->has('user'))
                    <li><a href="{{ route('signout') }}">Signout</a></li>
                @else
                    <li><a href="/login">Login</a></li>
                @endif
                <li><a href="contact.html">Contact</a></li>
              </ul>
            </div>
          </nav>
        </header>
