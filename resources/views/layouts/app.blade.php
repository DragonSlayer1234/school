<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Favicon -->
     <script src="https://kit.fontawesome.com/0ad84e0e4b.js" crossorigin="anonymous"></script>
    <link href="img/favicon.ico" rel="shortcut icon"/>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i" rel="stylesheet">

    <!-- Stylesheets -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">


    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

    <!-- Page Preloder -->
    <div id="app">

        <header class="header-section">
    		<div class="container">
    			<!-- logo -->
    			<a href="index.html" class="site-logo"><img src="images/U1lWpn3DIIA.jpg" alt=""></a>
    			<div class="nav-switch">
    				<i class="fa fa-bars"></i>
    			</div>
    			<div class="header-info">
    				<div class="hf-item">
    					<i class="fa fa-clock-o"></i>
    					<p><span>Мы работаем:</span>Понедельник - Суббота: 08:00 - 18:00</p>
    				</div>
    				<div class="hf-item">
    					<i class="fas fa-phone"></i>
    					<p><span>Свяжитесь с нами:</span>8 (7212) 11-11-11</p>
    				</div>
    				<div class="hf-item">
    					<i class="fa fa-map-marker"></i>
    					<p><span>Мы находимся:</span>Жердин бир жери</p>
    				</div>
    			</div>
    		</div>
    	</header>

    	<nav class="nav-section">
    		<div class="container">
    			<ul class="main-menu">
    				<li class="active"><a href="{{ route('home') }}">Главная</a></li>
    				<li><a href="{{ route('about') }}">О нас</a></li>
    				<li><a href="{{ route('news.index') }}">Новости</a></li>
            <li><a href="{{ route('show-document') }}">Документация</a></li>
    				<li><a href="contact.html">Контакты</a></li>
    				<li><a href="{{ route('olympiad.index') }}">Олимпиады</a></li>

                    @include('layouts.auth')
    			</ul>
    		</div>
    	</nav>


        @yield('content')



        <!-- Footer section -->
        <footer class="footer-section">

          <div class=" footer-top">
            <div class="row align-items-center">

          <div class="col-3 footer-widget">
            <div class="about-widget">
              <div class="social">
              <h6 class="fw-title">Social media</h6>
              </div>
              <div class="social">
                <a href=""><i class="fab fa-twitter fa-lg"></i></a>
                <a href=""><i class="fab fa-facebook-f fa-lg"></i></a>
                <a href=""><i class="fab fa-google-plus-g fa-lg"></i></a>
                <a href=""><i class="fab fa-instagram fa-lg"></i></a>
              </div>
            </div>
          </div>

          <div class="col-6  footer-widget">
            <h5 class="fw-title">Cпециализированная школа-интернат имени Жамбыла </h5>
          </div>

          <div class="col-3 footer-widget">
            <div class="about-widget">
              <div class="text-align-center" style="color:white">
                <i class="fa fa-map-marker fa-lg"></i> 17-53-25 |
                <i class="fa fa-phone fa-lg"></i> 8(7212)-46-32-48 |
              </div>
              <div class="text-align-center" style="color:white">
                <i class="fa fa-envelope fa-lg"></i> chetotam@gmail.com |
                <i class="fa fa-clock-o fa-lg"></i> 9:00 - 18:00
              </div>
            </div>
          </div>
    </div>
  </div>
            <!-- copyright -->
            <div class="copyright">
                <div class="container">
                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
                <hr>
            </footer>
            <!-- Footer section end-->
        </div>



        <!--====== Javascripts & Jquery ======-->
        <script src="{{ asset('js/app.js') }}" ></script>
        <script src="{{ asset('js/masonry.pkgd.min.js') }}" ></script>
        <script src="{{ asset('js/main.js') }}" ></script>

    </body>
    </html>
