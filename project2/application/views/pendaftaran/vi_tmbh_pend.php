<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Form pendaftaran</h1>
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
								<input type="text" name="ID_PND" id="ID_PND"
									value="<?php echo "PND".sprintf("%04s", $ID_PND); ?>">
								<div class="row">
									<label class="col-sm-2 label-on-left" for="ID_PR">Tempat PKL</label>
									<div class="col-lg-5 col-md-6 col-sm-3">
										<select name="ID_PR" class="form-control" data-style="btn btn-primary btn-round"
											title="Single Select" data-size="7">
											<option selected disabled>Pilih Tempat PKL</option>
											<?php foreach($comboPR as $pr){?>
											<option type="text" name="ID_PR" value="<?= $pr->ID_PR; ?>">
												<?=$pr->NAMA_PR;?>
												<?php }?>
										</select>
									</div>
								</div>
								<br>
								<div class="row">
									<label class="col-sm-2 label-on-left" for="ID_DS">Dosen Pembimbing</label>
									<div class="col-lg-5 col-md-6 col-sm-3">
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
								<button class="btn btn-fill btn-rose">Tambah Data</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<label class="col-sm-2 label-on-left">Masukkan NIM</label>
							<!-- <form method="post" class="form-group" action="<?= base_url().'pendaftaran/tmbh_anggota';?>"> -->
							<div class="col-sm-2">
								<input type="text" class="form-control" name="NIM" id="NIM" value="" placeholder="NIM">
							</div>
							<div class="form-group">
								<button type="submit" name="tambah" class="btn btn-primary add">Tambah</button>
							</div>
							<!-- </form> -->
						</div>
						<div class="row">
							<table id="tabel" name="tabel" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>#</th>
										<th>NIM</th>
										<th>Nama</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<!-- <td class="text-right">
											<button class="btn btn-info btn-xs btn-danger"
												data-target="#modal_edit">Hapus</button>
										</td> -->
									</tr>
								</tbody>
								<tfoot>
									<tr>
										<th>#</th>
										<th>NIM</th>
										<th>Nama</th>
										<th>Actions</th>
									</tr>
								</tfoot>
							</table>
						</div>

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
