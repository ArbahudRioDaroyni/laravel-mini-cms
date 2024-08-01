<!-- Start Appointment -->
<section class="appointment">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="section-title">
					<h2>Hubungi Kami</h2>
					<img src="{{ asset('frontend') }}/img/section-img.png" alt="#">
					<p>Segera Bergabung bersama kami dengan mengisi form atau link dibawah ini :</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-12 col-12">
				<form class="form" action="#">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-12">
							<div class="form-group">
								<input name="name" type="text" placeholder="Name">
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-12">
							<div class="form-group">
								<input name="email" type="email" placeholder="Email">
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-12">
							<div class="form-group">
								<input name="phone" type="text" placeholder="Phone">
							</div>
						</div>
						<div class="col-lg-12 col-md-12 col-12">
							<div class="form-group">
								<textarea name="message" placeholder="Tulis Pesan Anda Disini....."></textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-5 col-md-4 col-12">
							<div class="form-group">
								<div class="button">
									<button type="submit" class="btn">Kirim Pesan</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="col-lg-6 col-md-12 ">
				<div class="appointment-image">
					<img src="{{ asset('frontend') }}/img/contact-img.png" alt="#">
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End Appointment -->