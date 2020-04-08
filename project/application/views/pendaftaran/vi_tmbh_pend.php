<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<form method="post" action="<?= base_url(). 'pendaftaran/pr_tmbh_pnd';?>" class="form-horizontal">
						<div class="card-header card-header-text" data-background-color="rose">
							<h4 class="card-title">Form Pendaftaran PKL</h4>
						</div>
						<div class="card-content">
							<input type="hidden" name="ID_PND" id="ID_PND"
								value="<?php echo "pnd".sprintf("%0s", $ID_PND); ?>">
							<div class="row">
								<label class="col-sm-2 label-on-left">Tempat PKL</label>
								<div class="col-md-5">
									<div class="form-group label-floating is-empty">
										<select name="ID_PR" id="ID_PR">
											<option value="">Pilih Tempat PKL</option>
											<?php foreach($dosbing as $ds){
                                            echo '<option type="text" value="'.$ds->ID_PR.'">'.$ds->NAMA_PR.'</option>';
                                            }?>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-2 label-on-left">Dosen Pembimbing</label>
								<div class="col-md-5">
									<div class="form-group label-floating is-empty">
										<select name="ID_DS" id="ID_DS">
											<option value="">Pilih Dosen Pembimbing</option>
											<?php foreach($dosbing as $ds){
                                            echo '<option type="text" value="'.$ds->ID_DS.'">'.$ds->NAMA_DS.'</option>';
                                        }?>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-2 label-on-left">Tambah Anggota</label>
							</div>
							<div class="row">
								<label class="col-sm-2 label-on-left">Masukkan NIM</label>
								<div class="col-md-5">
									<div class="form-group label-floating is-empty">
										<input type="text" class="form-control">
									</div>
								</div>
								<button class="btn btn-fill btn-rose">Tambah</button>
							</div>


						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-content">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th class="text-center">No.</th>
										<th> NIM </th>
										<th> Nama </th>
										<th class="text-right">Actions</th>
									</tr>
								</thead>
								<!-- php $nomor=1;?> -->
								<!-- php foreach($pendaftaran as $pnd){ ?> -->
								<tbody>
									<tr>
										<td class="text-center">E41181335</td>
										<td>Mohammad Ainun Ardiansyah</td>
										<!-- <td class="text-center">= $nomor++; ?></td> -->
										<!-- <td>php echo $pnd->NAMA_PR; ?></td> -->
										<!-- <td>php echo $pnd->NAMA_DS; ?></td> -->
									</tr>
								</tbody>
								<!-- php } ?> -->
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
							<button type="submit" class="btn btn-fill btn-rose">Submit</button>
	</div>
</div>
