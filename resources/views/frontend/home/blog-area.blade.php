<!-- Start Blog Area -->
<section class="blog section" id="berita">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="section-title">
					<h2>Berita Terkini</h2>
					<img src="{{ asset('frontend') }}/img/section-img.png" alt="#">
				</div>
			</div>
		</div>
		<div class="row">
			@foreach($news as $article)
				<div class="col-lg-4 col-md-6 col-12">
					<!-- Single Blog -->
					<div class="single-news">
						<div class="news-head">
							<img src="{{ asset('images/' . $article->image) }}" alt="{{ $article->title }}">
						</div>
						<div class="news-body">
							<div class="news-content">
								<div class="date">{{ $article->subtitle }}</div>
								<h2><a href="https://bit.ly/TEMAXLRecruitment">{{ $article->title }}</a></h2>
								<p class="text">{{ $article->body }}<br>
								<a href="{{ $article->url }}">{{ $article->url }}</a>
								</p>
							</div>
						</div>
					</div>
					<!-- End Single Blog -->
				</div>
			@endforeach
		</div>
	</div>
</section>
<!-- End Blog Area -->