<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Form pendaftaran PKL</h1>
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
						<form method="post" action="<?= base_url(). 'pendaftaran/pr_tmbh_pnd';?>"
							class="form-horizontal">
							<div class="card-content">
							<label class="col-sm label-on-left" for="ID_PR">Isian kelompok : </label>
								<?php $nim = $user['identity']; ?>
								<input type="hidden" name="nim" id="nim" value="<?= $nim; ?>">
								<input type="text" name="ID_PND" id="ID_PND" value="<?= "PND-".$nim; ?>">
								<div class="row">
									<label class="col-sm label-on-left" for="ID_PR">Tempat PKL</label>
									<div class="col-lg col-md col-sm">
										<select name="ID_PR" class="form-control" data-style="btn btn-primary btn-round"
											title="Single Select" data-size="7">
											<option selected disabled>Pilih Tempat PKL</option>
											<?php foreach($jumlah_pr as $pr){
												if ($pr->JMLH_PR < 2 ){
													echo '<option type="text" name="ID_PR"  value="'.$pr->ID_PR.'">'.$pr->NAMA_PR; 
													echo '<br>';
													echo  '<label name="ID_PR" > Alamat : '.$pr->ALAMAT_PR.'</label>';
												}
												// } else {
												// 	echo '<option type="text" name="ID_PR" value="'.$pr->ID_PR.'">'.$pr->NAMA_PR;
												// }
												?>
											<?php }?>
										</select>
									</div>
								</div>
								<br>
								<div class="row">
									<label class="col-sm label-on-left" for="ID_DS">Dosen Pembimbing</label>
									<div class="col-lg col-md col-sm">
										<select name="ID_DS" class="form-control" data-style="btn btn-primary btn-round"
											title="Single Select" data-size="7">
											<option selected disabled>Pilih Dosen Pembimbing</option>
											<?php foreach($comboDS as $ds){ ?>
											<option type="text" name="ID_DS" value="<?= $ds->ID_DS; ?>">
												<?= $ds->NAMA_DS; ?>
												<?php } ?>
										</select>
									</div>
								</div>
								<br>
								<div class="row">
									<label class="col-sm-2">Waktu</label>
									<label class="col-sm-2" for="bulan">Bulan :</label>
									<select name="bulan" id="bulan" class="col-sm-2 form-control	"
										data-style="btn btn-primary btn-round" required>
										<option selected disabled>Pilih Bulan</option>
										<?php foreach($bulan as $bl){ ?>
										<option type="text" name="bulan" value="<?= $bl->BL; ?>">
											<?= $bl->BL; ?>
											<?php } ?>
									</select>
									<label class="col-sm-2" for="tahun">Tahun :</label>
									<select class="col-sm-2 form-control" name="tahun" required>
										<?php $y = date('Y'); ?>
										<option name="tahun" selected="selected" value="<?= $y;?>"><?= $y;?></option>
										<option name="tahun" value="<?= $y+1;?>"><?= $y+1; ?></option>
									</select>
								</div>
								<br>
								<div class="row">
									<label class="col-sm label-on-left" for="PROPOSAL">Upload Proposal</label>
									<input type="file" id="PROPOSAL" name="PROPOSAL" class="col-sm-6 form-control"
										required>
								</div>
								<br>
								<div class="row">
									<button class="btn btn-success">Simpan Form</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div> <!-- col 12 -->
		</div>
	</section>

	
</div>
<!-- /.row -->
