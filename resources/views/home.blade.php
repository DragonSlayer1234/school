@extends('layouts.app')

@section('content')



    <!-- Hero section -->
    <section class="hero-section">
        <div class="hero-slider owl-carousel">
            <div class="hs-item set-bg" data-setbg="img/Yo/kVzTnXayqfA.jpg">
                <div class="hs-text">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="hs-subtitle">Krasavci</div>
                                <h2 class="hs-title">Lorem Ipsum is simply dummy text</h2>
                                <p class="hs-des">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                <div class="site-btn">Go to news</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hs-item set-bg" data-setbg="img/Yo/UZ0WoxplYOQ.jpg">
                <div class="hs-text">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="hs-subtitle">Molodci</div>
                                <h2 class="hs-title">Lorem Ipsum is simply dummy text</h2>
                                <p class="hs-des">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                <div class="site-btn">Go to news</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero section end -->
    <div class="custom-container mt-5">
      <div class="row">
        <div class="col-3">
          <div class="card">
  					<div class="card-header">
  				    <i class="fab fa-hotjar"></i> Актуальные олимпиады
  				  </div>
  						<ul class="list-group list-group-flush">
  					   @foreach ($olympiads as $olympiad)
                 <li class="list-group-item">
                   <div class="row">
                     <div class="col-2 subject-img p-0 text-right">
                       <img src="{{ $olympiad->subject->image }}" class="rounded-circle">
                     </div>
                     <div class="col">
                       <p class="mb-0 olympiad-date text-muted">
                       {{ $olympiad->getStartDate()->format('d.m.Y') }}
                       -
                       {{ $olympiad->getEndDate()->format('d.m.Y') }}</p>
                       <p class="mb-0"><a href="{{ route('olympiad.show', $olympiad) }}" class="olympiad-link">{{ $olympiad->name }}</a></p>
                     </div>
                   </div>
                 </li>
               @endforeach
  					  </ul>
          </div>
        </div>
        <div class="col-9">
          <div class="row">
            @foreach ($news as $post)
              <div class="col-4 mb-4">
                <div class="card">
    							<img class="card-img-top img-fluid" src="{{ $post->preview_image }}" alt="Card image cap">
                  <div class="card-body">
    								<p class="news-date"><i class="fas fa-calendar-alt"></i> {{$post->created_at->isoFormat('D MMM YYYY')}}</p>
    								<h5 class="news-header"><a href="{{ route('news.show', $post) }}" class="olympiad-link">{{$post->title}}</a></h5>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>

    <section class="team-section spad-team">
    		<div class="container">
    			<div class="section-title text-center">
    				<h3>Школьная администрация</h3>
    				<p>The professional standards and expectations</p>
    			</div>
    			<div class="row mt-4">
    				<div class="col-md-6 col-lg-3">
    					<div class="member">
    						<div class="member-pic set-bg" data-setbg="img/member/1.jpg">
    							<div class="member-social">
    								<a href=""><i class="fa fa-facebook"></i></a>
    								<a href=""><i class="fa fa-twitter"></i></a>
    								<a href=""><i class="fa fa-pinterest"></i></a>
    							</div>
    						</div>
    						<h5>Sasha Johnson</h5>
    						<p>Literature Teacher</p>
    					</div>
    				</div>
    				<div class="col-md-6 col-lg-3">
    					<div class="member">
    						<div class="member-pic set-bg" data-setbg="img/member/2.jpg">
    							<div class="member-social">
    								<a href=""><i class="fa fa-facebook"></i></a>
    								<a href=""><i class="fa fa-twitter"></i></a>
    								<a href=""><i class="fa fa-pinterest"></i></a>
    							</div>
    						</div>
    						<h5>Darmian Shaw</h5>
    						<p>Physics Teacher</p>
    					</div>
    				</div>
    				<div class="col-md-6 col-lg-3">
    					<div class="member">
    						<div class="member-pic set-bg" data-setbg="img/member/3.jpg">
    							<div class="member-social">
    								<a href=""><i class="fa fa-facebook"></i></a>
    								<a href=""><i class="fa fa-twitter"></i></a>
    								<a href=""><i class="fa fa-pinterest"></i></a>
    							</div>
    						</div>
    						<h5>Joshua Matt</h5>
    						<p>Matt Teacher</p>
    					</div>
    				</div>
    				<div class="col-md-6 col-lg-3">
    					<div class="member">
    						<div class="member-pic set-bg" data-setbg="img/member/4.jpg">
    							<div class="member-social">
    								<a href=""><i class="fa fa-facebook"></i></a>
    								<a href=""><i class="fa fa-twitter"></i></a>
    								<a href=""><i class="fa fa-pinterest"></i></a>
    							</div>
    						</div>
    						<h5>Taylor Launer</h5>
    						<p>Music Teacher</p>
    					</div>
    				</div>
    			</div>
    		</div>
    	</section>


    <!-- Gallery section -->
    <div class="gallery-section">
        <div class="gallery">
            <div class="grid-sizer"></div>
            <div class="gallery-item gi-big set-bg" data-setbg="img/Yo/1.jpg">
                <a class="img-popup" href="img/Yo/1.jpg"><i class="ti-plus"></i></a>
            </div>
            <div class="gallery-item set-bg" data-setbg="img/Yo/2.jpg">
                <a class="img-popup" href="img/Yo/2.jpg"><i class="ti-plus"></i></a>
            </div>
            <div class="gallery-item set-bg" data-setbg="img/Yo/3.jpg">
                <a class="img-popup" href="img/Yo/3.jpg"><i class="ti-plus"></i></a>
            </div>
            <div class="gallery-item gi-long set-bg" data-setbg="img/Yo/5.jpg">
                <a class="img-popup" href="img/Yo/5.jpg"><i class="ti-plus"></i></a>
            </div>
            <div class="gallery-item gi-big set-bg" data-setbg="img/Yo/8.jpg">
                <a class="img-popup" href="img/Yo/8.jpg"><i class="ti-plus"></i></a>
            </div>
            <div class="gallery-item gi-long set-bg" data-setbg="img/Yo/4.jpg">
                <a class="img-popup" href="img/Yo/4.jpg"><i class="ti-plus"></i></a>
            </div>
            <div class="gallery-item set-bg" data-setbg="img/Yo/6.jpg">
                <a class="img-popup" href="img/Yo/6.jpg"><i class="ti-plus"></i></a>
            </div>
            <div class="gallery-item set-bg" data-setbg="img/Yo/7.jpg">
                <a class="img-popup" href="img/Yo/7.jpg"><i class="ti-plus"></i></a>
            </div>
        </div>
    </div>

@endsection
