<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Data pendaftaran</h1>
				</div>
				<!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">DataTables</li>
            </ol>
            </div> -->
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<section class="content">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>Ketua</th>
									<th>Tempat PKL</th>
									<th>Dosen Pembimbing</th>
									<th>Status</th>
									<th class="text-right">Actions</th>
								</tr>
							</thead>
							<?php $nmr=1;?>
							<?php foreach($pendaftaran as $pnd){ ?>
							<tbody>
								<tr>
									<td class="text-center"><?= $nmr++; ?></td>
									<td><?= $pnd->NAMA_M; ?></td>
									<td><?= $pnd->NAMA_PR; ?></td>
									<td><?= $pnd->NAMA_DS; ?></td>
									<td align="right"><?= $pnd->ST_PENDAFTARAN; ?>
										<button type="button" id="detail-btn" class="btn btn-info btn-xs btn-round"
											data-toggle="modal"
											data-target="#modal_edit<?= $pnd->ID_PND; ?>">Ubah</button>
										<!-- <a href="javascript:;" 
											data-id="<?= $pnd->ID_PND; ?>"
											data-toggle="modal" data-target="#modal_edit">
											<button id="detail-btn" data-toggle="modal" data-target="#modal_edit"
												class="btn btn-info">Ubah</button>
										</a> -->
										<!-- <button type="button" id="detail-btn" class="btn btn-info btn-xs btn-round " data-toggle="modal" data-target="#modal_edit">Ubah</button> -->
									</td>
									<td class="text-right">
										<?= anchor('pendaftaran/tampil_detail/'.$pnd->ID_PND,
									'<button type="button" class="btn btn-info btn-sm">detail</button>'); ?>
										<button class="btn btn-success btn-sm">ubah</button>
										<button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
											data-target="#myModal">hapus</button>

									</td>
								</tr>
							</tbody>
							<?php } ?>
							<tfoot>
								<tr>
									<th>#</th>
									<th>Ketua</th>
									<th>Tempat PKL</th>
									<th>Dosen Pembimbing</th>
									<th>Status</th>
									<th class="text-right">Actions</th>
								</tr>
							</tfoot>
						</table>



					</div>
					<!-- /.row -->
				</div>

				<!-- /.card-body -->
			</div>
			<!-- /.card -->
		</div>
		<!-- /.col -->
</div>
<!-- /.row -->
</section>

<?php foreach ($pendaftaran as $pnd) {
	// $ID_PND = $pnd['ID_PND'];
	// $ST_PENDAFTARAN = $pnd['ST_PENDAFTARAN'];
	$ID_PND = $pnd->ID_PND;
	$ST_PENDAFTARAN = $pnd->ST_PENDAFTARAN;
?>

<div class="modal fade" id="modal_edit<?= $ID_PND; ?>" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title title-1" id="myModalLabel">Ubah Status</h4>
			</div>
			<form method="post" action="<?= base_url('pendaftaran/pr_ubah_st_pendaftaran'); ?>">
				<div class="modal-body">
					<div class="form-group">
						<input type="hidden" name="ID_PND" value="<?= $ID_PND; ?>" class="form-control">
						<select name="ST_PENDAFTARAN" id="ST_PENDAFTARAN" class="form-control">
							<option disabled selected value="<?= $ST_PENDAFTARAN; ?>"><?= $ST_PENDAFTARAN; ?></option>
							<option value="Belum Disetujui">Belum Disetujui</option>
							<option value="Disetujui">Disetujui</option>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" id="save-btn" class="btn btn-success">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php } ?>
<!-- Modal Ubah -->
<!-- <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
				<h4 class="modal-title">Ubah Data</h4>
			</div>
			<form class="form-horizontal" action="<?php echo base_url('admin/ubah')?>" method="post"
				enctype="multipart/form-data" role="form">
				<div class="modal-body">
					<div class="form-group">
						<label class="col-lg-2 col-sm-2 control-label">Nama</label>
						<div class="col-lg-10">
							<input type="hidden" id="id" name="id">
							<input type="text" class="form-control" id="nama" name="nama" placeholder="Tuliskan Nama">
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-2 col-sm-2 control-label">Alamat</label>
						<div class="col-lg-10">
							<textarea class="form-control" id="alamat" name="alamat"
								placeholder="Tuliskan Alamat"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-2 col-sm-2 control-label">Pekerjaan</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="pekerjaan" name="pekerjaan"
								placeholder="Tuliskan Pekerjaan">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
					<button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
				</div>
			</form>
		</div>
	</div>
</div>
</div> -->

<!-- modal ubah status -->
<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="modal-title">Ubah status</h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
			</div>
			<form class="form-horizontal" method="post" action="<?= base_url('pendaftaran/pr_ubah_st_pendaftaran');?>"
				enctype="multipart/form-data" role="form">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" name="ID_PND" id="ID_PND">
						<select class="form-control" name="ST_PENDAFTARAN" id="ST_PENDAFTARAN">
							<option value="Belum disetujui">Belum disetujui</option>
							<option value="Disetujui">Disetujui</option>
							<option value=""></option>
						</select>
					</div>
				</div>
			</form>
			<div class="modal-footer">

				<a type="button" class="btn btn-primary" href="<?= base_url("pendaftaran/pr_tmbh_pnd2"); ?>">Simpan</a>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function () {
		// Untuk sunting
		$('#modal_edit').on('show.bs.modal', function (event) {
			var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
			var modal = $(this)

			// Isi nilai pada field
			modal.find('#ID_PND').attr("value", div.data('ID_PND'));
			modal.find('#ST_PENDAFTARAN').attr("value", div.data('ST_PENDAFTARAN'));
		});
	});

</script>

<!-- modal hapus data -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Anda yakin ingin menghapus data?</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
						aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
				<button type="button" class="btn btn-primary">Ya</button>
			</div>
		</div>
	</div>
</div>
