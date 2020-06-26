<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Pendaftaran Peserta PKL</h1>
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

	<?php foreach($pendaftaran as $pnd) { 
	$ID_PND = $pnd->ID_PND;
	$ID_PR = $pnd->ID_PR;
	$NAMA_PR = $pnd->NAMA_PR;
	$ALAMAT_PR = $pnd->ALAMAT_PR;
	$ID_DS = $pnd->ID_DS;
	$NAMA_DS = $pnd->NAMA_DS;
	$WAKTU = $pnd->WAKTU;
	$NAMA_ST = $pnd->NAMA_ST;
	$KET_MHS = $pnd->KET_MHS;
	?>
	<section class="content">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div class="form-row">
							<label for="NAMA_PR" class="col-sm-2 col-form-label">Tempat PKL</label>
							<input type="text" id="NAMA_PR" class="form-control col-sm-10" value="<?= $NAMA_PR; ?>"
								readonly>
						</div>
						<br>
						<div class="form-row">
							<label for="ALAMAT_PR" class="col-sm-2 col-form-label">Alamat</label>
							<input type="text" id="ALAMAT_PR" class="form-control col-sm-10" value="<?= $ALAMAT_PR; ?>"
								readonly>
						</div>
						<br>
						<div class="form-row">
							<label for="NAMA_DS" class="col-sm-2 col-form-label">Dosen Pembimbing</label>
							<input type="text" id="NAMA_DS" class="form-control col-sm-10" value="<?= $NAMA_DS; ?>"
								readonly>
						</div>
						<br>
						<div class="form-row">
							<label for="WAKTU" class="col-sm-2 col-form-label">Waktu Pelaksanaan</label>
							<input type="text" id="WAKTU" class="form-control col-sm-2" value="<?= $WAKTU; ?>" readonly>
						</div>
						<br>
						<div class="form-row">
							<label for="NAMA_ST" class="col-sm-2 col-form-label">Status Persetujuan</label>
							<input type="text" id="NAMA_ST" class="form-control col-sm-4" style="font-weight:bold"
								value="<?= $NAMA_ST; ?>" readonly>
							<br>
							<label class="col-sm-6" name="NAMA_ST"><?= $KET_MHS; ?></label>
						</div>
						<br>
						<?php
						$status = $ST_KETUA;
						if ($status == 1 && $NAMA_ST == 'BELUM DISETUJUI'){
							echo '<div class="form-row">
							<label class="col-sm-5 col-form-label">Apakah pengajuan PKL telah diterima oleh Tempat
								PKL?</label>
							<button type="button" id="diterima" class="btn btn-primary btn-round mr-2" data-toggle="modal"
								data-target="#modal_diterima'. $ID_PND.'">Ya</button>
							<button type="button" id="ditolak" class="btn btn-danger btn-round ml-2" data-toggle="modal"
								data-target="#modal_ditolak'. $ID_PND.'">Tidak</button>
						</div>';
						} elseif($status == 1 && $NAMA_ST == 'DISETUJUI'){
							echo '<div class="form-row">
							<label class="col-sm-5 col-form-label">Apakah pengajuan PKL telah diterima oleh Tempat
								PKL?</label>
							<button type="button" id="diterima" class="btn btn-primary btn-round mr-2" data-toggle="modal"
								data-target="#modal_diterima'. $ID_PND.'">Ya</button>
							<button type="button" id="ditolak" class="btn btn-danger btn-round ml-2" data-toggle="modal"
								data-target="#modal_ditolak'. $ID_PND.'">Tidak</button>
						</div>';
						} elseif($NAMA_ST == 'DITERIMA') {
							echo '';
						} else {
							echo '';
						}
						
						?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- modal diterima -->
	<div class="modal fade" id="modal_diterima<?= $ID_PND; ?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title title-1" id="myModalLabel">Kirim bukti penerimaan PKL oleh Tempat PKL</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="post" enctype="multipart/form-data" action="<?= base_url('pendaftaran/bukti_diterima'); ?>">
					<div class="modal-body">
						<div class="form-group">
							<input type="hidden" name="ID_PND" value="<?= $ID_PND; ?>" class="form-control">
							<h6>Bukti penerimaan PKL dapat berupa screenshoot chat,
								surat balasan elektronik, atau yang lainnya. Kirim format gambar(jpg, jpeg, png).</h6>
							<br>
							<input type="file" name="BUKTI" required>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" id="save-btn" class="btn btn-success">Kirim</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- modal ditolak -->
	<div class="modal fade" id="modal_ditolak<?= $ID_PND; ?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title title-1" id="myModalLabel">Kirim bukti penolakan PKL oleh Tempat PKL</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="post" enctype="multipart/form-data" action="<?= base_url('pendaftaran/bukti_ditolak'); ?>">
					<div class="modal-body">
						<div class="form-group">
							<input type="hidden" name="ID_PND" value="<?= $ID_PND; ?>" class="form-control">
							<h6>Bukti penolakan PKL dapat berupa screenshoot chat,
								surat balasan elektronik, atau yang lainnya. Kirim format gambar(jpg, jpeg, png).</h6>
							<br>
							<input type="file" name="BUKTI" required>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" id="save-btn" class="btn btn-success">Kirim</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<section class="content">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th class="col-md-1">#</th>
									<th class="col-md-2">NIM</th>
									<th>Nama</th>
								</tr>
							</thead>
							<?php $nmr=1; ?>
							<?php foreach($pendaftaran_klp as $klpp) {?>
							<tbody>
								<tr>
									<td class="col-md-1 text-center"><?= $nmr++; ?></td>
									<td class="col-md-2"><?= $klpp->NIM; ?></td>
									<td><?= $klpp->NAMA_M; ?></td>
								</tr>
							</tbody>
							<?php } ?>
						</table>
						<!-- /.row -->
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
			<!-- /.col -->
	</section>
</div>
<!-- /.row -->

<?php } ?>
