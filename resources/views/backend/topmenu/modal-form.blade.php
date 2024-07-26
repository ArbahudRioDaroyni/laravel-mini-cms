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

									<label>Menu</label>
									<div class="input-group mb-3">
										<input type="text" name="menu" class="form-control" placeholder="Menu" aria-label="Menu" aria-describedby="menu-addon">
									</div>
									
									<label>Induk</label>
									<select name="menu_parent" class="form-select mb-3" aria-label="Induk" aria-describedby="menu-parent-addon">
										<option value="">Pilih menu induk</option>
										@foreach ($menu as $key => $item)
										<option value="{{ $key }}">{{ $item }}</option>
										@endforeach
									</select>

									<label>Tautan</label>
									<div class="input-group mb-3">
										<input type="url" name="url" class="form-control" placeholder="Tautan" aria-label="Tautan" aria-describedby="url-addon">
									</div>

									<label>Posisi</label>
									<div class="input-group mb-3">
										<input type="number" name="position" class="form-control" placeholder="Posisi" aria-label="Posisi" aria-describedby="position-addon">
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