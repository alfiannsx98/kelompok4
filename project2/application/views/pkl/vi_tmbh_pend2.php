<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Form Pendaftaran PKL</h1>
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

	<!-- percob -->
	<!-- <section class="content">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<form method="post" action="<?php echo base_url("pendaftaran/pr_tmbh_pnd2"); ?>">
							<button type="button" id="btn-tambah-form">Tambah Data Form</button>
							<button type="button" id="btn-reset-form">Reset Form</button>
							<br><br>
							<b>Data ke 1 :</b>
							<br>

							<label for="">ID_PND</label>
							<input type="text" name="ID_PND[]" required>

							<br>

							<label for="">ID_M</label>
							<input type="text" name="ID_M[]" required>

							<br><br>

							<div id="insert-form"></div>

							<hr> <input type="submit" value="Simpan">
						</form>
						Kita buat textbox untuk menampung jumlah data form
						<input type="hidden" id="jumlah-form" value="1">
						<script>
							$(document).ready(
								function () { // Ketika halaman sudah diload dan siap    
									$("#btn-tambah-form").click(function () { // Ketika tombol Tambah Data Form di klik      
										var jumlah = parseInt($("#jumlah-form")
											.val()); // Ambil jumlah data form pada textbox jumlah-form      
										var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya            
										// Kita akan menambahkan form dengan menggunakan append      
										// pada sebuah tag div yg kita beri id insert-form      
										$("#insert-form").append("<b>Data ke " + nextform + " :</b>" +
											"<table>" +
											"<tr>" +
											"<td>ID_PND</td>" +
											"<td><input type='text' name='ID_PND[]' required></td>" +
											"</tr>" +
											"<tr>" +
											"<td>ID_M</td>" +
											"<td><input type='text' name='ID_M[]' required></td>" +
											"</tr>" +
											"</table>" +
											"<br><br>");
										$("#jumlah-form").val(
											nextform
										); // Ubah value textbox jumlah-form dengan variabel nextform    
									}); // Buat fungsi untuk mereset form ke semula    
									$("#btn-reset-form").click(function () {
										$("#insert-form").html(""); // Kita kosongkan isi dari div insert-form      
										$("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1    
									});
								});

						</script>
					</div>
				</div>
			</div>
		</div>
	</section> -->

	<!-- isian individu -->
	<section class="content">
		<div class="row">
			<div class="col-6">
				<div class="card">
					<div class="card-body">
						<label class="col-sm label-on-left" for="ID_PR">Isian individu : </label>
						<?php $nim = $user['identity']; ?>
						<input type="hidden" name="ID_PND" id="ID_PND" value="<?= $ID_PND; ?>">
						<table width="100%">
							<tr>
								<td style="vertical-align:top; width:30%">
									<label for="NIM">NIM Mahasiswa</label>
								</td>
								<td>
									<div class="form-group input-group">
										<input type="hidden" id="id" value="">
										<input type="hidden" id="nim" value="">
										<input type="text" id="nim1" class="form-control" value="" autofocus readonly>
										<span class="input-group-btn">
											<button type="button" class="btn btn-info btn-flat" data-toggle="modal"
												data-target="#modal-item">
												<i class="fa fa-search"></i>
											</button>
										</span>
									</div>
								</td>
							</tr>
							<tr>
								<td style="vertical-align: top">
									<label for="Nama">Nama Mahasiswa</label>
								</td>
								<td>
									<div class="form-group">
										<input type="text" id="nama" value="" class="form-control" readonly>
									</div>
								</td>
							</tr>
							<tr>
								<td></td>
								<td>
									<div>
										<button type="button" name="btn-tambah-anggota" id="add_siswa"
											class="btn btn-primary">
											<i class="fas fa-users"></i> Tambah Anggota
										</button>
									</div>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- tabel -->
	<section class="content">
		<div class="row">
			<div class="col-lg-10">
				<div class="box box-widget">
					<div class="box-body table-responsive">
						<form action="<?= base_url('pkl/pr_tmbh_pnd2'); ?>" method="post" class="form-horizontal">
							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>#</th>
										<th>NIM</th>
										<th>Nama</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody id="tbody">
									<tr>
										<td>1</td>
										<td><?= $NIM; ?></td>
										<td><?= $NAMA_M; ?></td>
										<td><button class="btn btn-danger" id="hapus" disabled>Hapus</button></td>
									</tr>
								</tbody>
							</table>
							<div id="insert-form"></div>
							<button type="button" id="pr_tmbh2d" class="btn btn-success btn-round" data-toggle="modal"
								data-target="#pr_tmbh2">Simpan Isian Individu</button>

							<!-- </form> -->
							<!-- <input type="hidden" id="jumlah-form" value="1"> -->
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- modal simpan data -->
	<div class="modal fade" id="pr_tmbh2" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title" id="myModalLabel">Simpan Data</h3>
				</div>
				<div class="modal-body">
					<p>Simpan data jika isian sudah lengkap</p>
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Batal</button>
					<button class="btn btn-success">Simpan</button>
				</div>
				</form>
				<input type="hidden" id="jumlah-form" value="1">
			</div>
		</div>
	</div>

	<!-- Modal List Mahasiswa -->
	<div class="modal fade" id="modal-item">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-tittle">Pilih Mahasiswa</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body table-responsive">
					<table class="table table-bordered table-striped" id="table1">
						<thead>
							<tr>
								<th>NIM</th>
								<th>Nama Mahasiswa</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($mahasiswa as $data ) { ?>
							<tr>
								<td hidden><?= $data->ID_M?></td>
								<td><?= $data->NIM; ?></td>
								<td><?= $data->NAMA_M; ?></td>
								<td class="text-right">
									<button class="btn btn-xs btn-info" id="select" data-id="<?= $data->ID_M; ?>"
										data-nim="<?= $data->NIM; ?>" data-nama="<?= $data->NAMA_M; ?>">
										<i class="fa fa-check"></i> Pilih
									</button>
								</td>
							</tr>
							<?php } ?>
							<?php foreach($mhsiswa as $data ) { ?>
							<tr>
								<td hidden><?= $data->ID_M?></td>
								<td><?= $data->NIM; ?></td>
								<td><?= $data->NAMA_M; ?></td>
								<td class="text-right">
									<button class="btn btn-xs btn-info" id="select" data-id="<?= $data->ID_M; ?>"
										data-nim="<?= $data->NIM; ?>" data-nama="<?= $data->NAMA_M; ?>">
										<i class="fa fa-check"></i> Pilih
									</button>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
