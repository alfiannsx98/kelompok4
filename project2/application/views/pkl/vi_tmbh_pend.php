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

	<section class="content">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<form method="post" enctype="multipart/form-data" action="<?= base_url(). 'pkl/pr_tmbh_pnd';?>"
							class="form-horizontal">
							<div class="card-content">
								<div class="row">
									<label class="label-on-left" for="ID_PR">Isian Kelompok : </label>
								</div>
								<input type="hidden" name="ID_PND" id="ID_PND" value="<?= $ID_PND; ?>">
								<input type="hidden" name="NIM" value="<?= $NIM; ?>">
								<input type="hidden" name="ID_M" value="<?= $ID_M; ?>">
								<br>
								<div class="form-group">
									<label for="ID_PR"> Tempat PKL</label>
									<select name="ID_PR" id="ID_PR" class="form-control col-sm-5"
										data-style="btn btn-primary btn-round" data-size="7" autofocus required>
										<option selected disabled>Pilih Tempat PKL</option>
										<?php foreach($jumlah_pr as $pr){
											if ($pr->JMLH_PR < 2){
												echo '<option type="text" name="ID_PR"  value="'.$pr->ID_PR.'">'.$pr->NAMA_PR; 
												echo '	||	';
												echo  '<label name="ID_PR" >Alamat : '.$pr->ALAMAT_PR.'</label>';
											}
											// } else {
											// 	echo '<option type="text" name="ID_PR" value="'.$pr->ID_PR.'">'.$pr->NAMA_PR;
											// }
											?>
										<?php }?>
									</select>
								</div>

								<div class="form-group">
									<label class="" for="ID_DS">Dosen Pembimbing</label>
									<select name="ID_DS" class="form-control col-sm-5"
										data-style="btn btn-primary btn-round" data-size="7" required>
										<option selected disabled>Pilih Dosen Pembimbing</option>
										<?php foreach($comboDS as $ds) {?>
										<option type="text" name="ID_DS" value="<?= $ds->ID_DS?>">
											<?= $ds->NAMA_DS; ?></option>
											<?php } ?>
									</select>
								</div>

								<label class="col-form-label">Waktu Pelaksanaan</label>
								<div class="form-group row">
									<label for="bulan" class="col-sm-1 col-form-label">Bulan : </label>
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
									<label for="tahun" class="col-sm-1 col-form-label">Tahun : </label>
									<div class=".col-xs-3">
										<select class="form-control" name="tahun" required>
											<?php $y = date('Y'); ?>
											<option name="tahun" selected="selected" value="<?= $y;?>"><?= $y;?>
											</option>
											<option name="tahun" value="<?= $y+1;?>"><?= $y+1; ?></option>
										</select>
									</div>
								</div>
								
								<div class="form-group">
									<label class="" for="PROPOSAL">Upload Proposal</label>
									<input type="file" id="PROPOSAL" name="PROPOSAL" class="col-md-5 form-control" required>
								</div>
								<div class="form-group" hidden>
									<label for="ST_PENDAFTARAN">Status</label>
									<input type="text" name="ST_PENDAFTARAN" value="1">
								</div>
								<div class="form-group" hidden>
									<label for="ID_ST">Status pendaftaran</label>
									<input type="text" name="ID_ST" value="ST0001">
								</div>
								<div class="form-group">
									<button class="btn btn-success">Tambah Isian Kelompok</button>
								</div>
								<label font="10">Lanjut ke isian individu</label>
							</div>
						</form>
					</div>
				</div>
			</div> <!-- col 12 -->
		</div>
	</section>
</div>
<!-- /.row -->
