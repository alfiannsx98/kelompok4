<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<form method="post" action="" class="form-horizontal">
						<div class="card-header card-header-text" data-background-color="rose">
							<h4 class="card-title">Form Pendaftaran PKL</h4>
						</div>
						<div class="card-content">
							<input type="text" readonly value="<?php echo "PND".sprintf("%0s", $ID_PND); ?>">
							<div class="row">
								<label class="col-sm-2 label-on-left">Tempat PKL</label>
								<div class="col-md-5">
									<div class="form-group label-floating is-empty">
										<select name="ID_PR" id="ID_PR">
											<option value="">Pilih Tempat PKL</option>
											<?php foreach($perusahaan as $pr){
                                            echo '<option type="text" value="'.$pr->ID_PR.'">'.$pr->NAMA_PR.'</option>';
                                            }?>
										</select>
										<input type="text" class="form-control" value="" disabled>
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
										<input type="text" class="form-control" value="" disabled>
									</div>
									<input type="hidden" value="">
								</div>
							</div>
							<div class="row">
								<label class="col-sm-2 label-on-left">Dosen Pembimbing</label>
								<div class="col-md-5">
									<div class="form-group label-floating is-empty">
										<input type="text" class="form-control" value="" disabled>
									</div>
								</div>
							</div>

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
	</div>
</div>