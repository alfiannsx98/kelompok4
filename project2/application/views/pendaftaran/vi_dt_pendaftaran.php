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

	<?php foreach($pendaftaran as $pnd) { 
	$ID_PND = $pnd->ID_PND;
	$ID_PR = $pnd->ID_PR;
	$NAMA_PR = $pnd->NAMA_PR;
	$ALAMAT_PR = $pnd->ALAMAT_PR;
	$ID_DS = $pnd->ID_DS;
	$NAMA_DS = $pnd->NAMA_DS;
	$WAKTU = $pnd->WAKTU;
	?>
	<section class="content">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<label class="col-sm-2 label-on-left">Tempat PKL</label>
							<div class="col-sm-10">
								<div class="form-group">
									<p class="form-control-static"><?= $NAMA_PR; ?></p>
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-sm-2 label-on-left"> Alamat </label>
							<div class="col-sm-10">
								<div class="form-group">
									<p class="form-control-static"><?= $ALAMAT_PR; ?></p>
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-sm-2 label-on-left">Dosen Pembimbing</label>
							<div class="col-sm-10">
								<div class="form-group">
									<p class="form-control-static"><?= $NAMA_DS; ?></p>
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-sm-2 label-on-left">Waktu Pelaksanaan</label>
							<div class="col-sm-10">
								<div class="form-group">
									<p class="form-control-static"><?= $WAKTU; ?></p>
								</div>
							</div>
						</div>
						<div class="form-group">
							<button type="button" id="edit_pnd" class="btn btn-primary btn-round" data-toggle="modal"
								data-target="#modal_edit_pnd<?= $ID_PND; ?>">Ubah</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- modal ubah pnd -->
	<div class="modal fade" id="modal_edit_pnd<?= $ID_PND; ?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title title-1" id="myModalLabel">Ubah Data</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="post" action="<?= base_url('pendaftaran/pr_ubah_pnd'); ?>">
					<div class="modal-body">
						<div class="form-group">
							<input type="hidden" name="ID_PND" value="<?= $ID_PND; ?>" class="form-control">
						</div>
						<div class="form-group">
							<label for="ID_PR">Tempat PKL</label>
							<select name="ID_PR" id="ID_PR" class="form-control">
								<option value="<?= $ID_PR; ?>" selected><?= $NAMA_PR;?></option>
								<?php foreach ($jumlah_pr as $pr){?>
								<option value="<?= $pr->ID_PR; ?>"><?= $pr->NAMA_PR; ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label for="ID_DS">Dosen Pembimbing</label>
							<select name="ID_DS" id="ID_DS" class="form-control">
								<option value="<?= $ID_DS; ?>"><?= $NAMA_DS; ?></option>
								<?php foreach ($comboDS as $ds) { ?>
								<option value="<?= $ds->ID_DS; ?>"><?= $ds->NAMA_DS; ?></option>
								<?php } ?>
							</select>
						</div>
						<label class="col-form-label">Waktu Pelaksanaan</label>
						<div class="form-group row">
							<label for="bulan" class="col-sm-2 col-form-label">Bulan : </label>
							<div class=".col-xs-3">
								<select name="bulan" id="bulan" class="form-control" required>
									<option selected disabled>Pilih Bulan</option>
									<?php foreach($bulan as $bl){ ?>
									<option type="text" name="bulan" value="<?= $bl->BL; ?>">
										<?= $bl->BL; ?>
										<?php } ?>
								</select>
							</div>
							<div class="col-md-1"></div>
							<label for="tahun" class="col-sm-2 col-form-label">Tahun : </label>
							<div class=".col-xs-3">
								<select class="form-control" name="tahun" required>
									<?php $y = date('Y'); ?>
									<option name="tahun" selected="selected" value="<?= $y;?>"><?= $y;?>
									</option>
									<option name="tahun" value="<?= $y+1;?>"><?= $y+1; ?></option>
								</select>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" id="save-btn" class="btn btn-success">Simpan</button>
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
									<th>Action</th>
								</tr>
							</thead>
							<?php $nmr=1; ?>
							<?php foreach($pendaftaran_klp as $klpp) {?>
							<tbody>
								<tr>
									<td class="col-md-1 text-center"><?= $nmr++; ?></td>
									<td class="col-md-2"><?= $klpp->NIM; ?></td>
									<td><?= $klpp->NAMA_M; ?></td>
									<td><button type="button" id="detail" class="btn btn-danger btn-sm btn-round"
											data-toggle="modal" data-target="#modal_hapus<?= $klpp->ID_M; ?>">Hapus</button>
									</td>
								</tr>
							</tbody>
							<?php } ?>
						</table>
						<form method="post" action="<?= base_url("pendaftaran/pr_dt_tmbh_anggota"); ?>">
							<div class="form-group">
								<input type="text" class="form-control" name="ID_PND" value="<?= $ID_PND; ?>">
								<label for="NIM">Masukkan NIM </label>
								<input type="text" class="form-control" name="NIM">
								<button type="button" class="btn btn-primary">Tambah</button>
							</div>
						</form>
					</div>
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
<?php foreach($pendaftaran_klp as $klpp){
	$ID_M = $klpp->ID_M;
	
	?>

<!-- modal hapus data anggota -->
<div class="modal fade" id="modal_hapus<?= $ID_M; ?>" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel">Hapus Data</h3>
			</div>
			<form action="<?= base_url('pendaftaran/hapus_data_anggota'); ?>" method="post" class="form-horizontal">
				<div class="modal-body">
					<p>Apakah Anda yakin ingin menghapus data ini?</p>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="ID_M" value="<?= $ID_M; ?>">
					<button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Batal</button>
					<button class="btn btn-danger">Hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php }}?>
