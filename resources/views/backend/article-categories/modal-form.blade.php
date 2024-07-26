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

									<label>Kategori</label>
									<div class="input-group mb-3">
										<input type="text" name="name" class="form-control" placeholder="Kategori" aria-label="Kategori" aria-describedby="category-addon">
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