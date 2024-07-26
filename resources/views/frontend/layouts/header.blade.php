<!-- Header Area -->
<header class="header" >
	<!-- Topbar -->
	<div class="topbar">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-5 col-12">
					<!-- Contact -->
					<ul class="top-link">
						<li><a href="#">Distribution Operation Partner PT. XL Axiata, Tbk</a></li>
						<li><a href="#">Tema Hotel</a></li>
					</ul>
					<!-- End Contact -->
				</div>
				<div class="col-lg-6 col-md-7 col-12">
					<!-- Top Contact -->
					<ul class="top-contact">
						<li><i class="fa fa-phone"></i>+62 878 5068 6888</li>
						<li><i class="fa fa-envelope"></i><a href="mailto:hrd@tema.co.id">hrd@tema.co.id</a></li>
					</ul>
					<!-- End Top Contact -->
				</div>
			</div>
		</div>
	</div>
	<!-- End Topbar -->
	<!-- Header Inner -->
	<div class="header-inner">
		<div class="container">
			<div class="inner">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-12">
						<!-- Start Logo -->
						<div class="logo">
							<a href="{{ route('frontend.home') }}"><img src="/frontend/img/logotema.png" alt="#"></a>
						</div>
						<!-- End Logo -->
						<!-- Mobile Nav -->
						<div class="mobile-nav"></div>
						<!-- End Mobile Nav -->
					</div>
					<div class="col-lg-7 col-md-12 col-16">
						<!-- Main Menu -->
						<div class="main-menu">
							<nav class="navigation">
								<?php
									function renderMenu($menuTree) {
										foreach ($menuTree as $item) {
											echo '<li><a href="' . $item['data']->url . '">' . $item['data']->menu . '</a>';
											if (!empty($item['children'])) {
												echo '<ul class="dropdown">';
												renderMenu($item['children']);
												echo '</ul>';
											}
											echo '</li>';
										}
									}
								?>

								<?php
									echo '<ul class="nav menu">';
									renderMenu($menuTree);
									echo '</ul>';
								?>
							</nav>
						</div>
						<!--/ End Main Menu -->
					</div>
					<!--
					<div class="col-lg-2 col-6">
						<div class="get-quote">
							<a href="appointment.html" class="btn">Hubungi Kami</a>
						</div>
					</div>
					-->
				</div>
			</div>
		</div>
	</div>
	<!--/ End Header Inner -->
</header>
<!-- End Header Area -->