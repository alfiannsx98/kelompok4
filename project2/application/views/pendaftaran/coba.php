<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><?= $title; ?></h1>
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
					<div class="card-header">
						<h3 class="card-title"><?= $title ?> Table</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<div class="form-group">
							<select name="" id="" class="form-control select2" style="width: 100%">
								<option value="" selected disabled>Pilih Mahasiswa</option>
								<?php foreach($mahasiswa as $mhs) : ?>
								<option value="<?= $mhs['ID_M']; ?>">
									<?= $mhs['NIM']; ?></option><?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<button type="submit" name="simpan" class="btn btn-success btn-xs add">Tambahkan</button>
						</div>


						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>NIM</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1; ?>
								<?php foreach ($mahasiswa as $m) :
                        $id = $m['ID_M'];
                    ?>
								<tr>
									<td><?= $i; ?></td>
									<td><?= $m['NIM']; ?></td>
									<td class="text-right">
										<button class="btn btn-info btn-xs btn-danger" data-toggle="modal"
											data-target="#modal_edit<?= $id; ?>">Hapus</button>
									</td>
								</tr>
								<?php $i++; ?>
								<?php endforeach; ?>
							</tbody>
							<tfoot>
								<tr>
									<th>#</th>
									<th>NIM</th>
									<th>Actions</th>
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
