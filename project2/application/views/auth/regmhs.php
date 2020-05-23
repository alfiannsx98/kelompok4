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
          <div class="input-group">
            <input type="text" class="form-control" name="nim" placeholder="masukkan nim" value="<?= set_value('nim'); ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <?= form_error('nim', '<small class="text-danger col-md">', '</small>'); ?>
          <br>
        <label for="">Email</label>
        <div class="input-group">
          <input type="email" class="form-control" name="email" placeholder="masukkan email" value="<?= set_value('email'); ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <?= form_error('email', '<small class="text-danger col-md">', '</small>'); ?>
        <br>
        <label for="">Password</label>
        <div class="input-group">
          <input type="password" class="form-control" id="password" name="password1" placeholder="masukkan password" value="<?= set_value('password1'); ?>">
          <div class="input-group-append">
            <div class="input-group-text">
                <a href="#" class="text-secondary" id="icon-click">
                  <i class="fas fa-eye" id="icon"></i>
                </a>
              <!-- <span class="fas fa-lock"></span> -->
            </div>
          </div>
        </div>
        <?= form_error('password1', '<small class="text-danger col-md">', '</small>'); ?>
        <br>
        <label for="">Ulangi Password</label>
        <div class="input-group">
          <input type="password" class="form-control" id="password1" name="password2" placeholder="ketik ulang password" value="<?= set_value('password2'); ?>">
          <div class="input-group-append">
            <div class="input-group-text">
                <a href="#" class="text-secondary" id="icon-click1">
                  <i class="fas fa-eye" id="icon1"></i>
                </a>
              <!-- <span class="fas fa-lock"></span> -->
            </div>
          </div>
        </div>
        <?= form_error('password2', '<small class="text-danger col-md">', '</small>'); ?>
        <br>
        <div class="form-group mb-3">
          <div class="input-group">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <p class="mb-1">
            <a href="<?php echo base_url('auth/index')?>" class="text-center">Sudah punya akun?</a>
          </p>
        </div>
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
