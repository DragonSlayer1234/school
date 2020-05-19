@extends('layouts.app')

@section('content')
  <section class="blog-page-section spad pt-0 mt-5">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 post-list">

					@foreach ($news as $post)
            <div class="post-item">
  						<div class="post-thumb set-bg" data-setbg="{{ $post->image }}"></div>
  						<div class="post-content">
  							<h3><a {{ route('news.show', $post) }}>{{ $post->title }}</a></h3>
  							<div class="post-meta">
  								<span><i class="fa fa-calendar-o"></i> {{$post->created_at->isoFormat('D MMM YYYY')}}</span>
  							</div>
  							<p>{{ $post->description }}</p>
  						</div>
  					</div>
          @endforeach

          {{ $news->links() }}

					<ul class="site-pageination">
						<li><a href="#" class="active">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
					</ul>
				</div>
				<!-- sidebar -->
				<div class="col-sm-8 col-md-5 col-lg-4 col-xl-3 offset-xl-1 offset-0 pl-xl-0 sidebar">
					<!-- widget -->
					<div class="widget">
						<form class="search-widget">
							<input type="text" placeholder="Search...">
							<button><i class="ti-search"></i></button>
						</form>
					</div>
					<!-- widget -->
					<div class="widget">
						<h5 class="widget-title">Recent News</h5>
						<div class="recent-post-widget">
							<!-- recent post -->
							@foreach ($recentNews as $recent)
                <div class="rp-item">
                  <div class="rp-thumb set-bg" data-setbg="{{ $recent->image }}"></div>
                  <div class="rp-content">
                    <h6><a href="{{ route('news.show', $recent) }}">{{ $recent->title }}</a></h6>
                    <p><i class="fa fa-clock-o"></i> {{$recent->created_at->isoFormat('D MMM YYYY')}}</p>
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
