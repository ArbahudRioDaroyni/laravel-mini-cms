<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main" style="z-index: 999;">
	<div class="sidenav-header">
		<i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
		<a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html " target="_blank">
			<img src="./assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
			<span class="ms-1 font-weight-bold">Argon Dashboard 2</span>
		</a>
	</div>
	<hr class="horizontal dark mt-0">
	<div class="collapse navbar-collapse  w-auto" id="sidenav-collapse-main" style="height: auto;">
		<ul class="navbar-nav">
			<li class="nav-item p-2">
				<a class="nav-link gap-3 active" href="{{ route('backend.dashboard') }}">
					<div class="w-15 d-flex align-items-center justify-content-center">
						<i class="fa fa-home text-primary opacity-10"></i>
					</div>
					<span class="nav-link-text ms-1">Dashboard</span>
				</a>
			</li>
			<li class="nav-item mt-3">
				<h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Konten</h6>
			</li>
			<li class="nav-item p-2">
				<a class="nav-link gap-3" href="{{ route('articles.index') }}">
					<div class="w-15 d-flex align-items-center justify-content-center">
						<i class="fa fa-sticky-note-o text-info opacity-10"></i>
					</div>
					<span class="nav-link-text ms-1">Artikel</span>
				</a>
			</li>
			<li class="nav-item p-2">
				<a class="nav-link gap-3" href="{{ route('article-categories.index') }}">
					<div class="w-15 d-flex align-items-center justify-content-center">
						<i class="fa fa-bookmark-o text-info opacity-10"></i>
					</div>
					<span class="nav-link-text ms-1">Kategori</span>
				</a>
			</li>
			<li class="nav-item p-2">
				<a class="nav-link gap-3" href="{{ route('office-address.index') }}">
					<div class="w-15 d-flex align-items-center justify-content-center">
						<i class="fa fa-bookmark-o text-info opacity-10"></i>
					</div>
					<span class="nav-link-text ms-1">Office</span>
				</a>
			</li>
			<li class="nav-item mt-3">
				<h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Pengaturan</h6>
			</li>
			<li class="nav-item p-2">
				<a class="nav-link gap-3" href="{{ route('topmenu.index') }}">
					<div class="w-15 d-flex align-items-center justify-content-center">
						<i class="fa fa-bars text-warning opacity-10"></i>
					</div>
					<span class="nav-link-text ms-1">Menu</span>
				</a>
			</li>
			<li class="nav-item p-2">
				<a class="nav-link gap-3" href="{{ route('setting-slider.index') }}">
					<div class="w-15 d-flex align-items-center justify-content-center">
						<i class="fa fa-sliders text-danger opacity-10"></i>
					</div>
					<span class="nav-link-text ms-1">Slider</span>
				</a>
			</li>
		</ul>
	</div>
</aside>