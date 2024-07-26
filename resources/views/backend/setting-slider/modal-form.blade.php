<div class="row">
	<div class="col-md-12">
		<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-fullscreen" role="document">
				<div class="modal-content">
					<div class="modal-body p-0">
						<div class="card card-plain">
							<div class="card-header pb-0 text-left">
								<h3 id="modal-title" class="font-weight-bolder text-success text-gradient">Tambah Baru</h3>
							</div>
							<div class="card-body">
								<form action="" method="" id="form" enctype="multipart/form-data">
									@csrf

									<input type="text" id="id" hidden name="id">

									<label>Headline</label>
									<div class="input-group mb-3">
										<textarea id="headline" name="headline" class="form-control" placeholder="Masukkan headline disini..." aria-label="Headline" aria-describedby="headline-addon" required></textarea>
									</div>

									<label>Konten</label>
									<div class="input-group mb-3">
										<textarea id="body" name="body" class="form-control" placeholder="Masukkan Konten disini..." aria-label="body" aria-describedby="body-addon" required></textarea>
									</div>

									<label>Tautan Hubungi Kami</label>
									<div class="input-group mb-3">
										<input type="text" id="text-left-cta" name="text-left-cta" class="form-control" placeholder="Masukkan Teks Hubungi Kami disini..." aria-label="Teks Hubungi Kami" aria-describedby="text-left-cta-addon">
									</div>

									<label>Teks Hubungi Kami</label>
									<div class="input-group mb-3">
										<input type="text" id="text-left-cta" name="text-left-cta" class="form-control" placeholder="Masukkan Teks Hubungi Kami disini..." aria-label="Teks Hubungi Kami" aria-describedby="text-left-cta-addon">
									</div>

									<label>Tautan Hubungi Kami</label>
									<div class="input-group mb-3">
										<input type="text" id="url-left-cta" name="url-left-cta" class="form-control" placeholder="Masukkan Tautan Hubungi Kami disini..." aria-label="Tautan Hubungi Kami" aria-describedby="url-left-cta-addon">
									</div>

									<label>Teks Layanan Kami</label>
									<div class="input-group mb-3">
										<input type="text" id="text-right-cta" name="text-right-cta" class="form-control" placeholder="Masukkan Teks Layanan Kami disini..." aria-label="Teks Layanan Kami" aria-describedby="text-right-cta-addon">
									</div>

									<label>Tautan Layanan Kami</label>
									<div class="input-group mb-3">
										<input type="text" id="url-right-cta" name="url-right-cta" class="form-control" placeholder="Masukkan Tautan Layanan Kami disini..." aria-label="Tautan Layanan Kami" aria-describedby="url-right-cta-addon">
									</div>

									<label>Urutan Slider</label>
									<div class="input-group mb-3">
										<input type="number" id="position" name="position" class="form-control" placeholder="Masukkan Urutan Slider disini..." aria-label="Urutan Slider" aria-describedby="position-addon">
									</div>

									<label for="image">Gambar</label>
									<div class="input-group mb-3 p-2 file-upload-wrapper">
										<input type="file" id="fileInput" name="image" accept="image/*" aria-label="Gambar" aria-describedby="image-addon">
										<button class="file-upload-button" onclick="document.getElementById('fileInput').click();">Choose File</button>
									</div>
									<div class="file-upload-label" id="fileLabel">No file chosen</div>

									<div class="text-center">
										<button type="submit" class="btn bg-gradient-success mt-4 mb-0">Simpan</button>
										<button type="button" class="btn bg-gradient-secondary mt-4 mb-0" data-bs-dismiss="modal">Batal</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@push('scripts-after')
<script>

$('#fileInput').on('change', (event) => {
	if (event.target.files.length > 0) {
		$('#fileLabel').text(event.target.files[0].name);
		$('.file-upload-button').text('Ganti');
	} else {
		$('#fileLabel').text('No file chosen');
		$('.file-upload-button').text('Pilih gambar');
	}
});

function modalCreate(url) {
	$('#modal-title').text('Tambah Data').removeClass('text-info').addClass('text-success');
	$('button[type=submit]').removeClass('bg-gradient-info').addClass('bg-gradient-success');
	$('#form').attr('action', url).attr('method', 'POST')[0].reset();
	$('#image-preview').remove();
	$('#fileLabel').text('No file chosen');
	$('.file-upload-button').text('Pilih gambar');
}

function modalEdit(url) {
	$('#modal-title').text('Edit Data').removeClass('text-success').addClass('text-info');
	$('#form').attr('action', `{{ route('setting-slider.xxx') }}`);
	$('#form').attr('method', 'POST');
	$('button[type=submit]').removeClass('bg-gradient-success').addClass('bg-gradient-info');
	$.ajax({
		url: url,
		type: 'GET',
		success: (response) => {
			for (const key in response) {
				if (response.hasOwnProperty(key) && key !== 'image') {
					$('#form').find(`[name=${key}]`).val(response[key]);
				} else if (response[key] !== null && key === 'image') {
					const imageHtml = `
						<a href="{{ asset('images') }}/${response[key]}" target="_blank" class="d-flex" id="image-preview">
							<div class="author align-items-center">
								<img src="{{ asset('images') }}/${response[key]}" alt="..." class="avatar shadow">
								<div class="name ps-3">
									<span>Mathew Glock</span>
									<div class="stats">
										<small>Posted on 28 February</small>
									</div>
								</div>
							</div>
						</a>
					`;
					if ($('#image-preview').length > 0) {
						$('#image-preview').replaceWith(imageHtml);
					} else {
						$('.file-upload-wrapper').before(imageHtml);
					}
					$('.file-upload-button').text('Ganti');
					$('#fileLabel').text('No file chosen');
				} else {
					$('#image-preview').remove();
					$('.file-upload-button').text('Pilih gambar');
					$('#fileLabel').text('No file chosen');
				}
			}
		},
		error: () => {
			alert('Tidak dapat menampilkan data');
		}
	});
}
</script>
@endpush

<style>
.file-upload-wrapper {
	position: relative;
	display: inline-block;
	cursor: pointer;
}
.file-upload-wrapper input[type="file"] {
	position: absolute;
	left: 0;
	top: 0;
	width: 100%;
	height: 100%;
	opacity: 0;
	cursor: pointer;
}
.file-upload-button {
	display: inline-block;
	padding: 10px 20px;
	font-size: 16px;
	color: #fff;
	background-color: #007bff;
	border: none;
	border-radius: 4px;
	cursor: pointer;
}
.file-upload-button:hover {
	background-color: #0056b3;
}
.file-upload-label {
	margin-top: 10px;
	font-size: 16px;
	color: #333;
}
</style>