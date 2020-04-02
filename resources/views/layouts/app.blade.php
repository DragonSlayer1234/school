<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Favicon -->
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
    			<a href="index.html" class="site-logo"><img src="" alt=""></a>
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
    				<li><a href="about.html">О нас</a></li>
    				<li><a href="blog.html">Новости</a></li>
    				<li><a href="contact.html">Контакты</a></li>
    				<li><a href="{{ route('olympiad.index') }}">Олимпиады</a></li>

                    @include('layouts.auth')
    			</ul>
    		</div>
    	</nav>


        @yield('content')



        <!-- Footer section -->
        <footer class="footer-section">
            <div class="container footer-top">
                <div class="row">
                    <!-- widget -->
                    <div class="col-sm-6 col-lg-3 footer-widget">
                        <div class="about-widget">
                            <img src="https://tvoi-setevichok.ru/wp-content/uploads/2019/03/post_5c9378b661db6.jpg" class="footer-image" alt="">
                            <div class="social pt-1">
                                <a href=""><i class="fab fa-twitter fa-lg"></i></a>
                                <a href=""><i class="fab fa-facebook fa-lg"></i></a>
                                <a href=""><i class="fab fa-google-plus-g fa-lg"></i></a>
                                <a href=""><i class="fab fa-instagram fa-lg"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- widget -->
                    <div class="col-6 footer-widget">
                        <h6 class="fw-title">Про школу</h6>
                        <div class="dobule-link">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
							Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
							Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
							Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						</p>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3 footer-widget">
                        <h6 class="fw-title">Контакты</h6>
                        <ul class="contact">
                            <li><p><i class="fa fa-map-marker"></i> 123</p></li>
                            <li><p><i class="fa fa-phone"></i> 123</p></li>
                            <li><p><i class="fa fa-envelope"></i> 123</p></li>
                            <li><p><i class="fa fa-clock-o"></i> 123</p></li>
                        </ul>
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
            </footer>
            <!-- Footer section end-->
        </div>



        <!--====== Javascripts & Jquery ======-->
        <script src="{{ asset('js/app.js') }}" ></script>
        <script src="{{ asset('js/masonry.pkgd.min.js') }}" ></script>
        <script src="{{ asset('js/main.js') }}" ></script>

    </body>
    </html>
