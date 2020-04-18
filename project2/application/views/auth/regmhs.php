  <div class="login-logo">
    <a href="<?= base_url('auth/register'); ?>"><b>JTI - </b>PKL</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Buat Akun Baru</p>
      <?= $this->session->flashdata('message'); ?>
      <small class="text-center text-success"><p>Pastikan NIM anda telah terdaftar, silahkan tanyakan ke Admin Prodi</p></small>

      <form action="<?php echo base_url('auth/register')?>" method="post">
        <label for="">NIM</label>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="nim" placeholder="masukkan nim">
            <?= form_error('nim', '<small class="text-danger col-md">', '</small>'); ?>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
        <label for="">Nama Lengkap</label>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="nama" placeholder="masukkan nama lengkap">
          <?= form_error('nama', '<small class="text-danger col-md">', '</small>'); ?>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <label for="">Email</label>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="masukkan email">
          <?= form_error('email', '<small class="text-danger col-md">', '</small>'); ?>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <label for="">Password</label>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password1" placeholder="masukkan password">
          <?= form_error('password1', '<small class="text-danger col-md">', '</small>'); ?>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <label for="">Ulangi Password</label>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password2" placeholder="ketik ulang password">
          <?= form_error('password2', '<small class="text-danger col-md">', '</small>'); ?>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div class="form-group">
          <div class="input-group mb-3">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <p class="mb-1">
            <a href="<?php echo base_url('auth/index')?>" class="text-center">Sudah punya akun?</a>
          </p>
          <!-- /.col -->
        </div>
      </form>

      <!-- <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div> -->
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
