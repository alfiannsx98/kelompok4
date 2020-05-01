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
									<td><?php echo $pnd->NAMA_PR; ?></td>
									<td><?php echo $pnd->NAMA_DS; ?></td>
									<td>status</td>
									<td class="text-right">
										<button class="btn btn-info btn-sm">detail</button>
										<button class="btn btn-success btn-sm">ubah</button>
										<button class="btn btn-danger btn-sm">hapus</button>
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
