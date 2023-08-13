<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="keywords"content="@yield('meta_keyword')">
		<meta name="description"content="@yield('meta_description')">
		<meta name=""content="">

		<title>@yield('title')</title>

		
		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="{{ url('user_frontend/css/bootstrap.min.css') }}"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="{{ url('user_frontend/css/slick.css') }}"/>
		<link type="text/css" rel="stylesheet" href="{{ url('user_frontend/css/slick-theme.css') }}"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="{{ url('user_frontend/css/nouislider.min.css') }}"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="{{  url('user_frontend/css/font-awesome.min.css')}}">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="{{  url('user_frontend/css/style.css')}}"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		@livewireStyles
    </head>
	<body>
		
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> {{ $app_setting->phone1 ?? "+021-95-51-84" }}</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i>{{ $app_setting->email ?? "email@email.com" }} </a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i>{{ $app_setting->address ??"1734 Stonecoal Road" }} </a></li>
					</ul>
					<ul class="header-links pull-right">
						@if(session()->has('user_name'))
						<li><a href="#"><i class="fa fa-user"></i> {{ session('user_name') }}</a></li>
						
						@else
						<li><a href="#"><i class="fa fa-user"></i> GUEST</a></li>
						@endif
						@if(session()->has('user_id'))
							<li><a class="text-warning" href="{{ url('logout') }}"><i class="fa fa-user-o "></i> Logout</a></li>
						@else
							<li><a href="{{ route('login') }}"><i class="fa fa-user-o"></i> Login</a></li>
						@endif
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-2">
							<div class="header-logo">
								<a href="#" class="logo">
									{{-- <img src="./img/logo.png" alt=""> --}}
									{{-- <h3 class="text-light">{{ $app_setting->website_name }}</h3> --}}
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form action="{{ url('user/search') }}" method="GET">
									{{-- <select class="input-select">
										<option value="0">All Categories</option>
										<option value="1">Category 01</option>
										<option value="1">Category 02</option>
									</select> --}}
									{{-- <input class="input" placeholder="Search here"> --}}
									<div class="row">
										<div class="col-lg-10">
											<input placeholder="Search Here" type="text" name="search" class="form-control" value="{{ Request::get('search') }}">
										</div>
										<div class="col-lg-2">
											<button type="submit" class="btn btn-warning">Search</button>
										</div>
									</div>
									</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-4 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								<div>
									<a href="#">
										<i class="fa fa-heart-o"></i>
										<span>Your Wishlist</span>
										<div class="qty">2</div>
									</a>
								</div>
								<!-- /Wishlist -->
								{{-- MY_ORDER --}}
								<div>
									<a href="{{ url('user/orders') }}">
										<i class="fas fa-list"></i>
										<span>My Orders</span>
									</a>
								</div>
								{{-- /MY_ORDER --}}
								<!-- Cart -->
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Your Cart</span>
										<div class="qty"><livewire:user.cart.cart-count/></div>
									</a>
									<div class="cart-dropdown">
										<div class="cart-list">
											<div class="product-widget">
												<div class="product-img">
													<img src="./img/product01.png" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">product name goes here</a></h3>
													<h4 class="product-price"><span class="qty">1x</span>$980.00</h4>
												</div>
												<button class="delete"><i class="fa fa-close"></i></button>
											</div>

											<div class="product-widget">
												<div class="product-img">
													<img src="./img/product02.png" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">product name goes here</a></h3>
													<h4 class="product-price"><span class="qty">3x</span>$980.00</h4>
												</div>
												<button class="delete"><i class="fa fa-close"></i></button>
											</div>
										</div>
										<div class="cart-summary">
											<small>3 Item(s) selected</small>
											<h5>SUBTOTAL: $2940.00</h5>
										</div>
										<div class="cart-btns">
											<a href="{{ url('user/cart') }}">View Cart</a>
											<a href="{{ url('user/checkout') }}">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
								</div>
								<!-- /Cart -->
								
								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->
