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
							<input type="hidden" name="ID_PND" id="ID_PND" value="<?php echo "pnd".sprintf("%0s", $ID_PND); ?>">
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
							<button type="submit" class="btn btn-fill btn-rose">Submit</button>
						</div>
					</form>
					<div class="col-md-12">
						<div class="card">
							<div class="card-content">
								<div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th class="text-center">No.</th>
												<th> Tempat PKL </th>
												<th> Dosen </th>
												<th class="text-right">Actions</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<th>sv</th>
												<th>skdjvb</th>
												<th>skvj</th>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>