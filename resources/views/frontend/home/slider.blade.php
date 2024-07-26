<!-- Slider Area -->
<section class="slider">
	<div class="hero-slider">
		@foreach($slider as $item)
			<div class="single-slider" style="background-image:url('{{ asset('images/' . $item->image) }}')">
				<div class="container">
						<div class="row">
							<div class="col-lg-7">
									<div class="text">
										<h1>{!! $item->headline !!}</h1>
										<p>{{ $item->body }}</p>
										<div class="button">
											<a href="{{ $item->{'url-left-cta'} }}" class="btn">{{ $item->{"text-left-cta"} }}</a>
											<a href="{{ $item->{'url-right-cta'} }}" class="btn primary">{{ $item->{"text-right-cta"} }}</a>
										</div>
									</div>
							</div>
						</div>
				</div>
			</div>
		@endforeach
	</div>
</section>
<!--/ End Slider Area -->