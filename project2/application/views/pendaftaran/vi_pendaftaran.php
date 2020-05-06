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
										<?php echo anchor('pendaftaran/tampil_detail/'.$pnd->ID_PND,
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
