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
						<div class="row">
							<?php foreach($pendaftaran as $pnd) { ?>
							<label class="col-sm-2 label-on-left">Tempat PKL</label>
							<div class="col-sm-10">
								<div class="form-group">
									<p class="form-control-static"><?= $pnd->NAMA_PR; ?></p>
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-sm-2 label-on-left"> Alamat </label>
							<div class="col-sm-10">
								<div class="form-group">
									<p class="form-control-static"><?= $pnd->ALAMAT_PR; ?></p>
								</div>
							</div>
						</div>
						<div class="row">
							<label class="col-sm-2 label-on-left">Dosen Pembimbing</label>
							<div class="col-sm-10">
								<div class="form-group">
									<p class="form-control-static"><?= $pnd->NAMA_DS; ?></p>
								</div>
							</div>
						</div>
						<?php } ?>
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
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>NIM</th>
									<th>Nama</th>
									<th class="text-right">Actions</th>
								</tr>
							</thead>
							<?php $nmr=1; ?>
							<?php foreach($pendaftaran_klp as $klp) {?>
							<tbody>
								<tr>
									<td class="text-center"><?= $nmr++; ?></td>
									<td><?= $klp->NIM; ?></td>
									<td><?= $klp->NAMA_M; ?></td>
									<td class="text-right">aksi</td>
								</tr>
							</tbody>
							<?php } ?>
							<tfoot>
								<tr>
									<th>#</th>
									<th>NIM</th>
									<th>Nama</th>
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
	</section>
</div>
<!-- /.row -->

