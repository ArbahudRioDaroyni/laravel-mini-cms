<div class="row">
	<div class="col-md-8">
		<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-md" role="document">
				<div class="modal-content">
					<div class="modal-body p-0">
						<div class="card card-plain">
							<div class="card-header pb-0 text-left">
								<h3 id="modal-title" class="font-weight-bolder text-success text-gradient">Tambah Baru</h3>
							</div>
							<div class="card-body">
								<form action="" method="" id="form">
									@csrf

									<input type="text" name="id" hidden>
									<label>Judul</label>
									<div class="input-group mb-3">
										<input type="text" name="title" class="form-control" placeholder="Judul" aria-label="Judul" aria-describedby="title-addon">
									</div>

									<label>Sub Judul</label>
									<div class="input-group mb-3">
										<input type="text" name="subtitle" class="form-control" placeholder="Sub Judul" aria-label="Sub Judul" aria-describedby="subtitle-addon">
									</div>

									<label>Alamat</label>
									<div class="input-group mb-3">
										<input type="text" name="address" class="form-control" placeholder="Alamat" aria-label="Alamat" aria-describedby="address-addon">
									</div>

									<label>Google Maps Embed</label>
									<div class="input-group mb-3">
										<input type="text" name="address_maps_embed" class="form-control" placeholder="Google Maps Embed" aria-label="Google Maps Embed" aria-describedby="address_maps_embed-addon">
									</div>

									<label>Tanggal Buka</label>
									<div class="input-group mb-3">
										<input type="text" name="open_date" class="form-control" placeholder="Tanggal Buka" aria-label="Tanggal Buka" aria-describedby="open_date-addon">
									</div>

									<label>Tanggal Tutup</label>
									<div class="input-group mb-3">
										<input type="text" name="close_date" class="form-control" placeholder="Tanggal Tutup" aria-label="Tanggal Tutup" aria-describedby="close_date-addon">
									</div>

									<label>Email kantor</label>
									<div class="input-group mb-3">
										<input type="email" name="email" class="form-control" placeholder="Email kantor" aria-label="Email kantor" aria-describedby="email-addon">
									</div>

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