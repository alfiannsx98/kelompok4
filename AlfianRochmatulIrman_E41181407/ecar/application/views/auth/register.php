        </div>
    </nav>
    <div class="wrapper wrapper-full-page">
        <div class="full-page register-page" filter-color="black" data-image="<?= base_url(); ?>assets/img/register.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="card card-signup">
                            <h2 class="card-title text-center">Register</h2>
                            <div class="row">
                                <div class="col-md">
                                    <div class="card-content">
                                        <div class="info info-horizontal">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md social text-center">
                                    <form class="form" method="POST" action="<?= base_url('auth/register') ?>">
                                        <div class="card-content">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">face</i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Nama Lengkap..." name="nama" id="nama" value="<?= set_value('nama'); ?>">
                                                <?= form_error('nama', '<small class="text-danger col-md">', '</small>'); ?>
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">email</i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Email..." id="email" name="email" value="<?= set_value('email'); ?>"> 
                                                <?= form_error('email', '<small class="text-danger col-md">', '</small>'); ?>
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">lock_outline</i>
                                                </span>
                                                <input type="password" placeholder="Password..." class="form-control" id="password1" name="password1"/>
                                                <?= form_error('password1', '<small class="text-danger col-md">', '</small>'); ?>
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">lock_outline</i>
                                                </span>
                                                <input type="password" placeholder="Ulangi Password Anda..." class="form-control" id="password2" name="password2"/>
                                            </div>
                                            <!-- If you want to add a checkbox to this form, uncomment this code -->
                                            <!-- <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="optionsCheckboxes" checked> I agree to the
                                                    <a href="#something">terms and conditions</a>.
                                                </label>
                                            </div> -->
                                        </div>
                                        <div class="footer text-center">
                                            <button type="submit" class="btn btn-success btn-round">Daftar</button>
                                        </div>
                                    </form>
                                    <div class="text-center">
                                        <p>Sudah punya akun?<a href="<?= base_url(); ?>" class="small"> Login Sini!</a></p>
                                        <p>Lupa Password ?<a href="<?= base_url('auth/lupapassword'); ?>" class="small"> Forget Password!</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>