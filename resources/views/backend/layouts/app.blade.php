<!DOCTYPE html>
<html lang="id">
	<head>
		<title>@yield('title') - PT. Tema - Trijaya Excel Madura</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		
		<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('dashboard/argon-dashboard/img/apple-icon.png') }}" />
		<link rel="icon" type="image/png" href="{{ asset('dashboard/argon-dashboard/img/favicon.png') }}" />
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
		<!-- font awesome -->
		<script src="{{ asset('dashboard/fontawesome/kit.fontawesome.com/42d5adcbca.js') }}"></script>
		<!-- dataTables -->
		<link href="{{ asset('dashboard/dataTables/2.0.8/css/dataTables.dataTables.min.css') }}" rel="stylesheet" />
		<!-- argon dashboard -->
		<link id="pagestyle" href="{{ asset('dashboard/argon-dashboard/css/argon-dashboard.css?v=2.0.4') }}" rel="stylesheet" />
	</head>
	<body class="g-sidenav-show bg-gray-100">
		<div class="min-height-300 bg-primary position-absolute w-100"></div>
		
		@include('backend.layouts.sidebar')
		
		<main class="main-content position-relative border-radius-lg ">
			@include('backend.layouts.navbar')
			
			@include('backend.layouts.content')
		</main>

		@include('backend.layouts.plugin')

		<!-- Dashboard -->
		<script type="text/javascript" src="{{ asset('dashboard/argon-dashboard/js/core/popper.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('dashboard/argon-dashboard/js/core/bootstrap.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('dashboard/argon-dashboard/js/plugins/perfect-scrollbar.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('dashboard/argon-dashboard/js/plugins/smooth-scrollbar.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('dashboard/argon-dashboard/js/plugins/chartjs.min.js') }}"></script>
		<!-- jQuery -->
		<script type="text/javascript" src="{{ asset('dashboard/jquery/jquery-3.7.1.min.js') }}"></script>
		<!-- dataTables -->
		<script type="text/javascript" type="text/javascript" src="{{ asset('dashboard/dataTables/2.0.8/js/dataTables.js') }}"></script>
		<!-- Include Export Button JS -->
    <script type="text/javascript" src="{{ asset('dashboard/dataTables/buttons/3.0.2/js/dataTables.buttons.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dashboard/dataTables/buttons/3.0.2/js/buttons.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dashboard/dataTables/plugins/ajax/libs/jszip/3.10.1/jszip.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dashboard/dataTables/plugins/ajax/libs/pdfmake/0.2.7/pdfmake.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dashboard/dataTables/plugins/ajax/libs/pdfmake/0.2.7/vfs_fonts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dashboard/dataTables/buttons/3.0.2/js/buttons.html5.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dashboard/dataTables/buttons/3.0.2/js/buttons.print.min.js') }}"></script>
		@stack('scripts')
		@stack('scripts-after')
		<!-- Dashboard argon -->
		<script src="{{ asset('dashboard/argon-dashboard/js/argon-dashboard.min.js?v=2.0.4') }}"></script>
	</body>
</html>
