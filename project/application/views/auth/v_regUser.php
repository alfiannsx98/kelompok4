            <div class="content">
                <div class="container-fluid">
                    <div class="col-sm-8 col-sm-offset-2">
                        <!--      Wizard container        -->
                        <div class="wizard-container">
                            <div class="card wizard-card" data-color="rose" id="wizardProfile">
                                <form action="#" method="">
                                    <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                                    <div class="wizard-header">
                                        <h3 class="wizard-title">
                                            Daftar Akun Baru
                                        </h3>
                                        <h5>Lengkapi profil anda setelah mendaftar.</h5>
                                    </div>
                                    <div class="wizard-navigation">
                                        <ul>
                                            <li>
                                                <a href="#about" data-toggle="tab">Daftar</a>
                                            </li>
                                            <li>
                                                <a href="#account" data-toggle="tab">Jurusan</a>
                                            </li>
                                            <li>
                                                <a href="#address" data-toggle="tab">Profil</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane" id="about">
                                            <div class="row">
                                                <h4 class="info-text"> Pendaftaran </h4>
                                                <div class="col-sm-4 col-sm-offset-1">
                                                    <div class="picture-container">
                                                        <div class="picture">
                                                            <img src="<?php echo base_url();?>assets/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title="" />
                                                            <input type="file" id="wizard-picture">
                                                        </div>
                                                        <h6>Pilih Foto</h6>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">face</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">NIM
                                                                <small>(required)</small>
                                                            </label>
                                                            <input name="nim" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">record_voice_over</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Nama Lengkap
                                                                <small>(required)</small>
                                                            </label>
                                                            <input name="nama" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-10 col-lg-offset-1">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">email</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Email
                                                                <small>(required)</small>
                                                            </label>
                                                            <input name="email" type="email" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-10 col-lg-offset-1">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">https</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Password
                                                                <small>(required)</small>
                                                            </label>
                                                            <input name="password1" type="password" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-10 col-lg-offset-1">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">https</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Ketik Ulang Password
                                                                <small>(required)</small>
                                                            </label>
                                                            <input name="password2" type="password" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="account">
                                            <h4 class="info-text"> Pilih Jurusan </h4>
                                            <div class="row">
                                                <div class="col-lg-10 col-lg-offset-1">
                                                    <div class="col-sm-4">
                                                        <div class="choice" data-toggle="wizard-checkbox">
                                                            <input type="checkbox" name="jurusan1" value="D3-Manajemen Informatika">
                                                            <div class="pictures">
                                                                <img src="<?php echo base_url();?>assets/img/mif.png" class="icon" id="wizardPicturePreview" title="" />
                                                            </div>
                                                            <h6>D3-Manajemen Informatika</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="choice" data-toggle="wizard-checkbox">
                                                            <input type="checkbox" name="jurusan2" value="D3-Teknik Komputer">
                                                            <div class="pictures">
                                                                <img src="<?php echo base_url();?>assets/img/tkk.png" class="icon" id="wizardPicturePreview" title="" />
                                                            </div>
                                                            <h6>D3-Teknik Komputer</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="choice" data-toggle="wizard-checkbox">
                                                            <input type="checkbox" name="jurusan3" value="D4-Teknik Informatika">
                                                            <div class="pictures">
                                                                <img src="<?php echo base_url();?>assets/img/tif.png" class="icon" id="wizardPicturePreview" title="" />
                                                            </div>
                                                            <h6>D4-Teknik Informatika</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-5 col-sm-offset-4">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Semester</label>
                                                            <select name="semester" class="form-control">
                                                                <option disabled="" selected=""></option>
                                                                <option value="4"> 4 </option>
                                                                <option value="5"> 5 </option>
                                                                <option value="6"> 6 </option>
                                                                <option value="7"> 7 </option>
                                                                <option value="8"> 8 </option>
                                                                <option value="">...</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="address">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <h4 class="info-text"> Lengkapi Profil ! </h4>
                                                </div>
                                                <div class="col-sm-5 col-sm-offset-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Jenis Kelamin</label>
                                                        <select name="jk" class="form-control">
                                                            <option disabled="" selected=""></option>
                                                            <option value="Laki-laki"> Laki-laki </option>
                                                            <option value="Perempuan"> Perempuan </option>
                                                            <option value="">...</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">No Handphone</label>
                                                        <input type="text" name="nohp" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-10 col-sm-offset-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Alamat lengkap</label>
                                                        <input type="text" name="alamat" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wizard-footer">
                                        <div class="pull-right">
                                            <input type='button' class='btn btn-next btn-fill btn-rose btn-wd' name='lanjut' value='Selanjutnya' />
                                            <input type='button' class='btn btn-finish btn-fill btn-rose btn-wd' name='simpan' value='Selesai' />
                                        </div>
                                        <div class="pull-left">
                                            <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='kembali' value='Sebelumnya' />
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- wizard container -->
                    </div>
                </div>
            </div>