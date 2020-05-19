@extends('layouts.app')

@section('content')
  <section class="blog-page-section spad pt-0">
  		<div class="container">
  			<div class="row">
  				<div class="col-md-8">
  					<div class="post-item post-details">
  						<img src="img/blog/1.jpg" class="post-thumb-full" alt="">
  						<div class="post-content">
  							<h3><a href="single-blog.html">{{ $news->title }}</a></h3>
  							<div class="post-meta">
  								<span><i class="fa fa-calendar-o"></i> {{$news->created_at->isoFormat('D MMM YYYY')}}</span>
  							</div>

                {!! $news->text !!}

  						</div>
  					</div>
  				</div>
  				<!-- sidebar -->
  				<div class="col-sm-8 col-md-5 col-lg-4 col-xl-3 offset-xl-1 offset-0 pl-xl-0 sidebar mt-5">
  					<!-- widget -->
  					<div class="widget">
  						<form class="search-widget">
  							<input type="text" placeholder="Search...">
  							<button><i class="fas fa-search fa-lg"></i></button>
  						</form>
  					</div>
  					<!-- widget -->
  					<div class="widget">
  						<h5 class="widget-title">Recent News</h5>
  						<div class="recent-post-widget">
  							<!-- recent post -->

              @foreach ($posts as $post)
                <div class="rp-item">
                  <div class="rp-thumb set-bg" data-setbg="{{ $post->image }}"></div>
                  <div class="rp-content">
                    <h6><a href="{{ route('news.show', $post) }}">{{ $post->title }}</a></h6>
                    <p><i class="fa fa-clock-o"></i> {{$news->created_at->isoFormat('D MMM YYYY')}}</p>
                  </div>
                </div>
              @endforeach

  						</div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</section>
@endsection
