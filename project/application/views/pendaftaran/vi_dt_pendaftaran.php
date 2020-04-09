<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<form method="get" action="#" class="form-horizontal">
						<div class="card-header card-header-text" data-background-color="rose">
							<h4 class="card-title">Form Elements</h4>
						</div>
						<div class="card-content">
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

							<!-- <div class="row">
                                            <label class="col-sm-2 label-on-left">Disabled</label>
                                            <div class="col-sm-10">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" placeholder="Disabled input here..." disabled="" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 label-on-left">Static control</label>
                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <p class="form-control-static">hello@creative-tim.com</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 label-on-left">Checkboxes and radios</label>
                                            <div class="col-sm-10 checkbox-radios">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="optionsCheckboxes"> First Checkbox
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="optionsCheckboxes"> Second Checkbox
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="optionsRadios" checked="true"> First Radio
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="optionsRadios"> Second Radio
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 label-on-left">Inline checkboxes</label>
                                            <div class="col-sm-10">
                                                <div class="checkbox checkbox-inline">
                                                    <label>
                                                        <input type="checkbox" name="optionsCheckboxes">a
                                                    </label>
                                                </div>
                                                <div class="checkbox checkbox-inline">
                                                    <label>
                                                        <input type="checkbox" name="optionsCheckboxes">b
                                                    </label>
                                                </div>
                                                <div class="checkbox checkbox-inline">
                                                    <label>
                                                        <input type="checkbox" name="optionsCheckboxes">c
                                                    </label>
                                                </div>
                                            </div>
                                        </div> -->
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
										<th> Nama Mahasiswa </th>
										<th class="text-right">Actions</th>
									</tr>
								</thead>
								<?php $nomor = 1; ?>
								<?php foreach($pendaftaran_klp as $klp) { ?>
								<tbody>
									<tr>

										<td class="text-center"><?= $nomor++; ?></td>
										<td><?php echo $klp->NAMA_M; ?></td>
										<td class="td-actions text-right">
											<?php echo anchor('pendaftaran/tampil_detail/',
                                                '<button type="button" rel="tooltip" class="btn btn-info btn-simple">
                                                    <i class="material-icons">person</i>
                                                </button>'); ?>

											<button type="button" rel="tooltip" class="btn btn-success btn-simple">
												<i class="material-icons">edit</i>
											</button>
											<button type="button" rel="tooltip" class="btn btn-danger btn-simple">
												<i class="material-icons">close</i>
											</button>
										</td>
									</tr>
								</tbody>
								<?php } ?>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>