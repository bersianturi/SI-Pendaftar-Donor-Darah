<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pendonor Darah</title>

	<link rel="stylesheet" href="<?= base_url("assets") ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url("assets") ?>/css/global.css">
	<link rel="stylesheet" href="<?= base_url("assets") ?>/css/dataTables.dataTables.css">
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="py-4">
				<div class="col-12">
					<h1 class="text-center">Pendonor Darah</h1>
				</div>
			</div>
		</div>
		<div class="row">
			<?php if ($this->session->flashdata('pesan')) : ?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>Berhasil!</strong> <?= $this->session->flashdata('pesan'); ?>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			<?php endif; ?>
			<div class="card py-4 px-4 mb-4">
				<div class="col-12">
					<div class="float-end">
						<a href="<?= base_url('pendonor/tambah') ?>" class="btn btn-primary">+ Tambah Pendonor</a>
					</div>
				</div>
				<table class="table table-striped" id="table">
					<thead>
						<th width="20%">Nama</th>
						<th width="30%">Alamat</th>
						<th class="text-center" width="10%">Usia</th>
						<th class="text-center">Tempat/Tanggal Lahir</th>
						<th class="text-center">Golongan Darah</th>
						<th class="text-center" width="30%">No. Hp</th>
						<th></th>
					</thead>
					<tbody>
						<?php foreach ($pendonor as $row) : ?>
							<tr>
								<td><?= $row->nama ?></td>
								<td><?= $row->alamat ?></td>
								<td class="text-center"><?php $usia = date_diff(date_create($row->tanggal_lahir), date_create('now'))->y;
														echo $usia . ' Tahun' ?></td>
								<td><?= $row->tempat_lahir . ', ' . $row->tanggal_lahir ?></td>
								<td class="text-center"><?= $row->golongan_darah ?></td>
								<td class="text-center"><?= '+62' . $row->nomor_hp ?></td>
								<td class="text-center">
									<div class="btn-group btn-group-sm" role="group">
										<a href="<?= base_url("pendonor/ubah/" . $row->id) ?>" class="btn btn-primary">Ubah</a>
										<button type="button" class="btn btn-danger btn-delete" data-bs-toggle="modal" data-bs-target="#modalHapus" data-id="<?= $row->id ?>" data-name="<?= $row->nama ?>">Hapus</button>
									</div>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">Hapus <span id="pendonorName"></span></h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					Apakah anda yakin akan menghapus data pendonor ini?
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
					<a href="#" id="delete" class="btn btn-danger">Hapus</a>
				</div>
			</div>
		</div>
	</div>

	<script src="<?= base_url("assets") ?>/js/bootstrap.min.js"></script>
	<script src="<?= base_url("assets") ?>/js/jquery-3.7.1.js"></script>
	<script src="<?= base_url("assets") ?>/js/dataTables.js"></script>
	<script>
		$(document).ready(function() {
			// Inisialisasi DataTable
			var table = $('#table').DataTable({
				columnDefs: [{
					searchable: false,
					orderable: false,
					targets: [1, 2, 3, 5, 6]
				}]
			});

			$(document).on('click', '.btn-delete', function() {
				var id = $(this).data('id');
				var name = $(this).data('name');

				$('#pendonorName').text(name);
				$('#delete').attr('href', '<?= base_url('pendonor/hapus/') ?>' + id);
			});
		});
	</script>
</body>

</html>