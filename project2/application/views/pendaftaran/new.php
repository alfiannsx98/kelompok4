<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Form Pendaftaran Peserta PKL</h1>
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
						<form method="post" action="<?= base_url(). 'pendaftaran/pr_tmbh_pnd';?>">
							<input type="text" name="ID_PND" id="ID_PND"
								value="<?= "PND-".$user['identity']; ?>">
								<!-- echo "PND".sprintf("%04s", $ID_PND); -->
							<br>
							<label for="ID_PR">Tempat PKL</label>
							<select name="ID_PR" id="ID_PR" title="Single Select" data-size="7">
								<option selected disabled>Pilih Tempat PKL</option>
								<?php foreach($comboPR as $pr){?>
								<option type="text" name="ID_PR" value="<?= $pr->ID_PR; ?>">
									<?=$pr->NAMA_PR;?>
									<?php }?>
							</select>
							<br>
							<label for="ID_DS">Dosen Pembimbing</label>
							<select name="ID_DS" id="ID_DS" title="Single Select" data-size="7">
								<option selected disabled>Pilih Dosen Pembimbing</option>
								<?php foreach($comboDS as $ds){?>
								<option type="text" name="ID_DS" value="<?= $ds->ID_DS; ?>">
									<?=$ds->NAMA_DS;?>
									<?php }?>
							</select>
							<br>
							<label for="waktu">Waktu</label>
							<label for="bulan">Bulan :</label>
							<select name="bulan">
								<option name="bulan" value="Januari">Januari</option>
								<option name="bulan" value="Februari">Februari</option>
								<option name="bulan" value="Maret">Maret</option>
								<option name="bulan" value="April">April</option>
								<option name="bulan" value="Mei">Mei</option>
								<option name="bulan" value="Juni">Juni</option>
								<option name="bulan" value="Juli">Juli</option>
								<option name="bulan" value="Agustus">Agustus</option>
								<option name="bulan" value="September">September</option>
								<option name="bulan" value="Oktober">Oktober</option>
								<option name="bulan" value="November">November</option>
								<option name="bulan" value="Desember">Desember</option>
							</select>
							<label for="tahun">Tahun :</label>
							<select name="tahun">
							<?php
							$y = date('Y');
							?>
								<option name="tahun" selected="selected" value="<?= $y;?>"><?= $y;?></option>
								<option name="tahun" value="<?= $y+1;?>"><?= $y+1; ?></option>
							</select>
							<button>Simpan</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

</div>
<!-- /.row -->
