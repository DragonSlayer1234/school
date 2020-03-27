<!DOCTYPE html>
<html lang="en">
<head>
	<title>Jambyl School</title>
	<meta charset="UTF-8">
	<meta name="description" content="Unica University Template">
	<meta name="keywords" content="event, unica, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://kit.fontawesome.com/0ad84e0e4b.js" crossorigin="anonymous"></script>
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
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- header section -->
	<header class="header-section">
		<div class="container">
			<!-- logo -->
			<a href="index.html" class="site-logo"><img src="img/logo2.png" alt=""></a>
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
	<!-- header section end-->


	<!-- Header section  -->
	<nav class="nav-section">
		<div class="container">
			<ul class="main-menu">
				<li class="active"><a href="index.html">Главная</a></li>
				<li><a href="about.html">О нас</a></li>
				<li><a href="blog.html">Новости</a></li>
				<li><a href="contact.html">Контакты</a></li>
				<li><a href="olympiadlist.html">Олимпиады</a></li>
				<li class="login-button-margin">

						<button type="button" class="btn login-button btn-round text-right" data-toggle="modal" data-target="#loginModal">
						  <i class="fas fa-sign-in-alt"></i>  Login
						</button>

						<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" id="loginModal">
						  <div class="modal-dialog modal-sm" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title">Welcome To Jambyl School</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
						        <h5 class="mb-3 text-center">Login as</h5>
						        <a href="{{ route('teacher.login') }}" class="btn btn-primary form-control mb-2">Teacher</a>
						        <a href="{{ route('student.login') }}" class="btn btn-primary form-control">Student</a>
						      </div>
						    </div>
						  </div>
						</div>
					</li>
			</ul>
		</div>
	</nav>
	<!-- Header section end -->


	<!-- Hero section -->
    <main class="container-fluid main-container p-5">
        <div class="row justify-content-center">
          <div class="col-3">
            <div class="row">
              <div class="col-11">
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 90%">Участник</th>
                      <th>Результат</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Mark Thornton</td>
                      <td class="text-center">5</td>
                    </tr>
                    <tr>
                      <td>Jacob Thornton</td>
                      <td class="text-center">4</td>
                    </tr>
                    <tr>
                      <td>Larry Thornton</td>
                      <td class="text-center">3</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-5 main-olympiad">
                <h5 class="mb-3">Примите участвие в олимпиаде Olympiad For Pidors</h5>
                <p class="mb-5"><i class="far fa-calendar-alt"></i> Дата проведения: 30 - 31 марта 2019 г.</p>
                <h5>ОБ ОЛИМПИАДЕ</h5>
                <hr>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam, facere necessitatibus repudiandae tenetur molestias amet.</p>

                <hr>

                <p><i class="far fa-clock"></i> Начало в 09:00</p>
                <p><i class="far fa-hourglass"></i> Длительность - 3 часа</p>
                <p><i class="far fa-bookmark"></i> Предмет: Математика </p>
                <p><i class="fas fa-tenge"></i> Цена за участие: 1000 тг</p>

                <hr>
                <h5>Как проходит олимпиада</h5>
                <p>Участники собираются в Астане накануне открытия, 25 апреля. Далее в течение трёх дней они решают задачи по экономике, финансовой грамотности и анализируют бизнес-кейсы.</p>

                <hr>
                <h5>
                  Как принять участие
                </h5>
                <p>
                  Олимпиада проводится для школьников 9–11‑го классов. Желающие принять участие должны направить заявку в Организационный комитет. Для вас экономическая олимпиада — это шанс проверить свои знания и получить новые. Для организаторов — возможность найти талантливых подростков, которые интересуются экономикой, бизнесом и финансами.
                </p>
          </div>

          <div class="col-3">
            <div class="row">
              <div class="col-11">
                <p class="mb-0"><b>Начало:</b> 14 марта в 09:00</p>
                <p class="mb-0"><b>Окончание:</b> 16 марта в 12:00</p>
                <p><b>Длительность:</b> 3 часа</p>
                Задание к олимпиаде
                    <p class="file">
                      <i class="far fa-file-pdf fa-lg"></i> pidor.pdf
                      <a href="#" class="float-right"> <i class="fas fa-download"></i></a>
                    </p>

                Ответ к олимпиаде
                    <p class="file">
                      <i class="far fa-file-pdf fa-lg"></i> Прикрепите ответ
                      <a href="#" class="float-right"><i class="fas fa-paperclip"></i></a>
                    </p>




                    <div class="alert alert-custom" role="alert">
                      <i class="fas fa-exclamation-triangle warning-icon"></i> Данная олимпиада является платной. Для участия вы должны заплатить 1000 тг
                    </div>

                    <a href="#" class="btn btn-custom float-right"><i class="fas fa-tenge"></i> Перейти к оплате</a>
              </div>
            </div>
          </div>
        </div>
    </main>





	<!-- Footer section -->
	<footer class="footer-section">
		<div class="container footer-top">
			<div class="row">
				<!-- widget -->
				<div class="col-sm-6 col-lg-3 footer-widget">
					<div class="about-widget">
						<img src="img/logo-light.png" alt="">
						<p>orem ipsum dolor sit amet, consecter adipiscing elite. Donec minos varius, viverra justo ut, aliquet nisl.</p>
						<div class="social pt-1">
							<a href=""><i class="fa fa-twitter-square"></i></a>
							<a href=""><i class="fa fa-facebook-square"></i></a>
							<a href=""><i class="fa fa-google-plus-square"></i></a>
						</div>
					</div>
				</div>
				<!-- widget -->
				<div class="col-sm-6 col-lg-3 footer-widget">
					<h6 class="fw-title">USEFUL LINK</h6>
					<div class="dobule-link">
						<ul>
							<li><a href="">Home</a></li>
							<li><a href="">About us</a></li>
							<li><a href="">News</a></li>
							<li><a href="">Olympiads</a></li>
						</ul>
					</div>
				</div>

				<div class="col-sm-6 col-lg-3 footer-widget">
					<h6 class="fw-title">CONTACT</h6>
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
 <script>document.write(new Date().getFullYear());</script>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
			</div>
		</div>
	</footer>
	<!-- Footer section end-->



	<!--====== Javascripts & Jquery ======-->
    <script src="{{ asset('js/app.js') }}" ></script>
    <script src="{{ asset('js/masonry.pkgd.min.js') }}" ></script>
    <script src="{{ asset('js/main.js') }}" ></script>

</body>
</html>
