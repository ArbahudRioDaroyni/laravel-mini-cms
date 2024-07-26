@extends('backend.layouts.app')
@section('title', 'Slider')

@section('content')
	<div class="row">
		<div class="col-12">
			@include('backend.components.alert', ['success' => 'Data berhasil disimpan!'])

			<div class="card mb-4">
				<div class="card-header pb-0">
					<h6>Daftar Slider</h6>
				</div>
				<div class="card-body p-4 pt-2">
					<button onclick="modalCreate(`{{ route('setting-slider.store') }}`)" type="button" class="btn bg-gradient-success mb-3" data-bs-toggle="modal" data-bs-target="#modal-form">Tambah baru</button>
					<div class="table-responsive p-0">
						<table class="table align-items-center mb-0 display" id="table">
							<thead>
								<tr>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-8 p-1"></th>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-8">Headline</th>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-8">Konten</th>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-8">Tombol Kiri</th>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-8">Gambar</th>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-8">Urutan</th>
									<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-8 p-1">Status</th>
									<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-8">Aksi</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	@includeIf('backend.setting-slider.modal-form')
@endsection

@push('scripts')
<script>
	let table = new DataTable('#table', {
		ajax: '{{ route('setting-slider.api') }}',
		stateSave: true,
		processing: true,
		autoWidth: false,
		serverSide: true,
		columns: [
			{
				data: 'DT_RowIndex',
				className: 'text-center no-print',
				searchable: false,
				sortable: false
			},
			{
				data: 'headline',
				render: function(data, type, row) {
					var words = data.split(' ');
					var firstEightWords = words.slice(0, 3).join(' ');
					if (words.length > 3) {
							firstEightWords += '...';
					}
					return firstEightWords;
				}
			},
			{ 
				data: 'body',
				render: function(data, type, row) {
					var words = data.split(' ');
					var firstEightWords = words.slice(0, 3).join(' ');
					if (words.length > 3) {
							firstEightWords += '...';
					}
					return firstEightWords;
				}
			},
			{
				data: null,
				render: function (data, type, row) {
					var textLeftCta = row['text-left-cta'];
					var urlLeftCta = row['url-left-cta'];
					
					if (urlLeftCta) {
						return '<a class="link-info" href="' + urlLeftCta + '" target="_blank">' + textLeftCta + '</a>';
					} else {
						return textLeftCta;
					}
				}
			},
			{
				data: 'image',
				className: 'text-center',
				render: function(data, type, row) {
					return `<a class="link-info d-flex gap-2 align-items-center" href="{{ asset('images') }}` + '/' + data +`" target="_blank">Lihat <i class="fa fa-external-link text-xs" aria-hidden="true"></i></a>`;
				}
			},
			{ data: 'position' },
			{
				data: 'status',
				className: 'text-center',
				render: function(data, type, row) {
					return data == 1
						? '<span class="badge bg-gradient-success">Active</span>'
						: '<span class="badge bg-gradient-secondary">Disable</span>';
				}
			},
			{
				data: 'actions',
				className: 'text-center no-print',
				searchable: false,
				sortable: false,
				render: function(data, type, row) {
					return `
						<div class="btn-group">
							<button class="btn btn-xs mb-0 btn-primary btn-flat dt-control" title="Info">
								<i class="fa fa-info-circle"></i>
							</button>
							<button onclick="modalEdit('${data[0]}')" class="btn btn-xs mb-0 btn-info btn-flat" data-bs-toggle="modal" data-bs-target="#modal-form" title="Ubah">
								<i class="fa fa-pencil-square-o"></i>
							</button>
							<button onclick="softDelete('${data[1]}')" class="btn btn-xs mb-0 btn-danger btn-flat" title="Sembunyikan">
								<i class="fa fa-ban"></i>
							</button>
						</div>
					`;
				},
				searchable: false,
				sortable: false
			}
		],
		layout: {
			topStart: {
				buttons: [
					{
						extend: 'copy',
						text: '<span class="d-flex align-items-center gap-1"><i class="fa fa-clipboard" aria-hidden="true"></i> Salin</span>',
						className: 'btn btn-sm btn-outline-primary px-3 mb-0'
					},
					{
						extend: 'print',
						text: '<span class="d-flex align-items-center gap-1"><i class="fa fa-print" aria-hidden="true"></i> Cetak</span>',
						className: 'btn btn-sm btn-outline-info px-3 mb-0',
						exportOptions: {
							columns: ':not(.no-print)'
						},
            customize: function (win) {
							$(win.document.body).find('table').addClass('display').css('font-size', '9px');
							$(win.document.body).find('tr:nth-child(odd) td').each(function(index){
									$(this).css('background-color','#D0D0D0');
							});
							$(win.document.body).find('h1').css('text-align','center');
            }
					},
					{
						extend: 'csv',
						text: '<span class="d-flex align-items-center gap-1"><i class="fa fa-table" aria-hidden="true"></i> CSV</span>',
						className: 'btn btn-sm btn-outline-success px-3 mb-0'
					},
					{
						extend: 'excel',
						text: '<span class="d-flex align-items-center gap-1"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Excel</span>',
						className: 'btn btn-sm btn-outline-danger px-3 mb-0'
					},
					{
						extend: 'pdf',
						text: '<span class="d-flex align-items-center gap-1"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF</span>',
						className: 'btn btn-sm btn-outline-warning px-3 mb-0'
					}
				]
			}
		}
	});

	table.on('click', 'button.dt-control', (e) => {
		let tr = e.target.closest('tr');
		let row = table.row(tr);
		
		if (row.child.isShown()) {
			row.child.hide();
		}
		else {
			row.child(additionalInformation(row.data())).show();
		}
	});

	$('#form').on('submit', (e) => {
		e.preventDefault();
		var formData = new FormData($('#form')[0]);

		$.ajax({
			url: $('#form').attr('action'),
			type: $('#form').attr('method'),
			data: formData,
			cache: false,
			contentType: false,
			processData: false,
			success: () => {
				table.ajax.reload();
				$('#form')[0].reset();
				$('#modal-form').modal('hide');
				$('#alert-success').removeClass('d-none').addClass('d-flex show');
			},
			error: (xhr) => {
				alert('Tidak dapat menyimpan data');
				// console.log(xhr.responseText);
			}
		});
	});
</script>
@endpush