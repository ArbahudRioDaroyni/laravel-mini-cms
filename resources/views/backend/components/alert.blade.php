@if(isset($success))
<div class="alert alert-success fade d-none align-items-center justify-content-between" role="alert" id="alert-success">
	<div>
		<span class="alert-icon text-white"><i class="fa fa-check"></i></span>
		<span class="alert-text text-white">
			{{ $success }}
		</span>
	</div>
	<button type="button" class="btn-close" id="alert-close" aria-label="Close" />
</div>
@endif