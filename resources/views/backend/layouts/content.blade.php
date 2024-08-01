<div class="container-fluid py-4">
	@yield('content')

	
	<footer class="footer pt-3  ">
		<div class="container-fluid">
			<div class="row align-items-center justify-content-lg-between">
				<div class="col-lg-6 mb-lg-0 mb-4">
					<div class="copyright text-center text-sm text-muted text-lg-start">
						© <script>
							document.write(new Date().getFullYear())
						</script>,
						made with <i class="fa fa-heart"></i> by
						<a href="https://nusaindotech.com/" class="font-weight-bold" target="_blank">Nusa Indo Technology</a> | Konsultan IT Surabaya-Indonesia.
					</div>
				</div>
				<div class="col-lg-6">
					<ul class="nav nav-footer justify-content-center justify-content-lg-end">
						<li class="nav-item">
							<a href="https://tema.co.id/" class="nav-link text-muted" target="_blank">Blog</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
</div>

@push('scripts')
<script>
	function modalCreate(url) {
		$('#modal-title').text('Tambah Data').removeClass('text-info').addClass('text-success');
		$('button[type=submit]').removeClass('bg-gradient-info').addClass('bg-gradient-success');
		$('#form').attr('action', url).attr('method', 'POST')[0].reset();
	}

	function modalEdit(url) {
		$('#modal-title').text('Edit Data').removeClass('text-success').addClass('text-info');
		$('button[type=submit]').removeClass('bg-gradient-success').addClass('bg-gradient-info');
		$('#form').attr('action', url).attr('method', 'PUT');
		$.ajax({
			url: url,
			type: 'GET',
			success: (response) => {
				for (const key in response) {
					if (response.hasOwnProperty(key) && key !== 'image') {
						$('#form').find(`[name=${key}]`).val(response[key]);
					}
				}
			},
			error: () => {
				alert('Tidak dapat menampilkan data');
			}
		});
	}

	function softDelete(url) {
		if (confirm('Yakin ingin menghapus data terpilih?')) {
			$.ajax({
				url: url,
				type: 'POST',
				data: {
					'_token': $('[name=_token]').val(),
					'_method': 'DELETE'
				},
				success: () => {
					table.ajax.reload();
					alert('Berhasil menghapus data');
				},
				error: () => {
					alert('Tidak dapat menghapus data');
				}
			});
		}
	}

	const completeFormatDate = (date) => {
		return new Date(date).toLocaleString('id-ID', {
			weekday: 'long',
			year: 'numeric',
			month: 'long',
			day: 'numeric',
			hour: '2-digit',
			minute: '2-digit',
			second: '2-digit',
			timeZoneName: 'long'
		});
	};

	const additionalInformation = (data) => {
		let html = '<dl>';
		
		html += `<dt>Dibuat oleh:</dt><dd>${data.created_by ? data.created_by.name : '-'}</dd>`;
		html += `<dt>Pada:</dt><dd>pada : ${completeFormatDate(data.created_at)}</dd>`;
		
		if (data.updated_by) {
			html += `<hr />`;
			html += `<dt>Diubah oleh:</dt><dd>${data.updated_by ? data.updated_by.name : '-'}</dd>`;
			html += `<dt>Pada:</dt><dd>pada : ${completeFormatDate(data.updated_at)}</dd>`;
		}
		
		if (data.deleted_by) {
			html += `<hr />`;
			html += `<dt>Dihapus oleh:</dt><dd>${data.deleted_by.name}</dd>`;
			html += `<dt>Pada:</dt><dd>pada : ${completeFormatDate(data.deleted_at)}</dd>`;
		}
		
		html += '</dl>';
		
		return html;
	};

	function hideAlert() {
		$('#alert-success').addClass('d-none').removeClass('d-flex show');
	}

	$('#alert-close').on('click', () => {
		hideAlert()
	});
	</script>
@endpush