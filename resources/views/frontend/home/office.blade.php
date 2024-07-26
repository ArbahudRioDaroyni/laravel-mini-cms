@extends('frontend.layouts.app')

@section('title', 'Home')

@section('content')
<div class="breadcrumbs overlay">
	<div class="container">
		<div class="bread-inner">
			<div class="row">
				<div class="col-12">
					<h2>{{ $office->title }}</h2>
					<ul class="bread-list">
						<li><a href="{{ route('frontend.showOffice', $office->slug) }}">{{ $office->subtitle }}</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<section class="contact-us section">
	<div class="container">
		<div class="inner">
			<div class="row"> 
				<div class="col-lg-6">
					<div class="contact-us-left">
						<div class="google-map">
						<?php
							$mapEmbedCode = $office->address_maps_embed;
							// Tambahkan atribut style
							$styledMapEmbedCode = str_replace('<iframe', '<iframe style="height:600px;width:600px;"', $mapEmbedCode);
						?>
						{!! $styledMapEmbedCode !!}
					</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="contact-us-form">
						<h2>{{ $office->title }}</h2>
						<p>Hubungi Kami</p>
						<!-- Form -->
						<form class="form" method="post" action="mail/mail.php">
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<input type="text" name="name" placeholder="Nama" required="">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<input type="email" name="email" placeholder="Email" required="">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<input type="text" name="phone" placeholder="Telepon" required="">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<input type="text" name="subject" placeholder="Subyek" required="">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<textarea name="message" placeholder="Isi Pesan Anda Disini" required=""></textarea>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group login-btn">
										<button class="btn" type="submit">Kirim</button>
									</div>
								</div>
							</div>
						</form>
						<!--/ End Form -->
					</div>
				</div>
			</div>
		</div>
		<div class="contact-info">
			<div class="row">
				<!-- single-info -->
				<div class="col-lg-4 col-12 ">
					<div class="single-info">
						<i class="icofont icofont-ui-email"></i>
						<div class="content">
							<h3>Email</h3>
							<p>{{ $office->email }}</p>
						</div>
					</div>
				</div>
				<!--/End single-info -->
				<!-- single-info -->
				<div class="col-lg-4 col-12 ">
					<div class="single-info">
						<i class="icofont-google-map"></i>
						<div class="content">
							<h3>Branch Office</h3>
							<p>
								<a target="_blank" href="https://www.google.com/maps/place/6%C2%B050'17.3%22S+107%C2%B055'39.2%22E/@-6.838125,107.9249712,17z/data=!3m1!4b1!4m4!3m3!8m2!3d-6.838125!4d107.9275461?hl=id&amp;entry=ttu">
									{{ $office->address }}
								</a>
							</p>
						</div>
					</div>
				</div>
				<!--/End single-info -->
				<!-- single-info -->
				<div class="col-lg-4 col-12 ">
					<div class="single-info">
						<i class="icofont icofont-wall-clock"></i>
						<div class="content">
							<h3>{{ $office->open_date }}</h3>
							<p>{{ $office->close_date }} Closed</p>
						</div>
					</div>
				</div>
				<!--/End single-info -->
			</div>
		</div>
	</div>
</section>
@endsection
