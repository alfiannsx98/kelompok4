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
									<td align="right"><?= $pnd->NAMA_ST; ?>
										<button type="button" id="edit_status" class="btn btn-info btn-xs btn-round"
											data-toggle="modal"
											data-target="#modal_edit_status<?= $pnd->ID_PND; ?>">Ubah</button>
									</td>
									<td class="text-right">
										

										<?= anchor('pendaftaran/tampil_detail/'.$pnd->ID_PND,
									'<button type="button" id="detail" class="btn btn-info btn-sm btn-round">Detail</button>'); ?>
										<button type="button" id="detail" class="btn btn-success btn-sm btn-round"
											data-toggle="modal"
											data-target="#modal_edit<?= $pnd->ID_PND; ?>">Ubah</button>
										<!-- <button class="btn btn-success btn-sm">ubah</button> -->
										<button type="button" id="detail" class="btn btn-danger btn-sm btn-round"
											data-toggle="modal"
											data-target="#modal_hapus<?= $pnd->ID_PND; ?>">Hapus</button>
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
	$ID_PND = $pnd->ID_PND;
	$ID_ST = $pnd->ID_ST;
	$NAMA_ST = $pnd->NAMA_ST;
?>
<!-- Modal ubah status -->
<div class="modal fade" id="modal_edit_status<?= $ID_PND; ?>" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title title-1" id="myModalLabel">Ubah Status</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="<?= base_url('pendaftaran/pr_ubah_st_pendaftaran'); ?>">
				<div class="modal-body">
					<div class="form-group">
						<input type="hidden" name="ID_PND" value="<?= $ID_PND; ?>" class="form-control">
						<select name="ID_ST" id="ID_ST" class="form-control">
							<option disabled selected value="<?= $ID_ST; ?>"><?= $NAMA_ST; ?></option>
							<?php foreach ($status as $sts){?>
							<option value="<?= $sts->ID_ST; ?>"><?= $sts->NAMA_ST; ?></option>
							<?php } ?>
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

<!-- modal hapus data pendaftaran -->
<div class="modal fade" id="modal_hapus<?= $ID_PND; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Hapus Data</h3>
            </div>
            <form action="<?= base_url('pendaftaran/hapus_data'); ?>" method="post" class="form-horizontal">
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus data ini?</p>
                </div>
                <div class="modal-footer">
                    <input type="text" name="ID_PND" value="<?= $ID_PND; ?>">
                    <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Batal</button>
                    <button class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php } ?>
