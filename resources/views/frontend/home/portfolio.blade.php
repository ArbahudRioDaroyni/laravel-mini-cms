<!-- Start portfolio -->
<section class="portfolio section" >
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="section-title">
					<h2>Pengumuman</h2>
					<img src="{{ asset('frontend') }}/img/section-img.png" alt="#">
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 col-12">
				<div class="owl-carousel portfolio-slider">
					@foreach($announcement as $article)
						<div class="single-pf">
							<img src="{{ asset('images/' . $article->image) }}" alt="{{ $article->title }}">
							<a href="{{ $article->url }}" class="btn">Lebih Lanjut</a>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ End portfolio -->