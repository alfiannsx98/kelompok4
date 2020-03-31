</div>
    </nav>
    <div class="wrapper wrapper-full-page">
        <div class="full-page login-page" filter-color="black" data-image="<?= base_url(); ?>assets/img/login.jpg">
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                                <div class="card card-login card-hidden">
                                    <div class="card-header text-center" data-background-color="purple">
                                        <h4 class="card-title">Forget Password</h4>
                                    </div>
                                    <?= $this->session->flashdata('message'); ?>
                                    <p class="category text-center">
                                        E-CAR Forget Password FORM
                                    </p>
                                    <form class="user" method="post" action="<?= base_url('auth/lupapassword'); ?>">
                                    <div class="card-content">  
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">email</i>
                                            </span>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Email address</label>
                                                <input type="email" class="form-control" id="email" name="email">
                                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer text-center">
                                        <button class="btn btn-primary">Send</button>
                                        <p class="category">Sudah ingat dengan akun anda ? <a class="small" href="<?= base_url('auth') ?>">Kembali Ke Login!</a></p>
                                    </div>
                                    <div class="text-center">
                                        <p class="category">Tidak Punya Akun ? <a href="<?= base_url('auth/register'); ?>">Daftar Disini!</a> </p>
                                    </div>
                                    </form>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
