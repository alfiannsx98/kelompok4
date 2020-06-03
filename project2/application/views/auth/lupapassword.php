<div class="login-logo">
  <a href="<?= base_url('auth'); ?>"><b>JTI - </b>PKL</a>
</div>
<!-- /.login-logo -->
<div class="card">
  <div class="card-body login-card-body">
    <?= $this->session->flashdata('message'); ?>
    <p class="login-box-msg">Forgot your password?</p>
    <small class="text-center text-success">
      <p>Masukkan Email Anda, Kami akan mengirimkan link untuk mengganti password</p>
    </small>
    <form class="user" method="post" action="<?= base_url('auth/lupapassword'); ?>">
      <div class="form-group">
        <div class="input-group mb-3">
          <input type="email" class="form-control" id="email" name="email" value="<?= set_value('email'); ?>" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
      </div>
      <div class="row">
        <div class="col-12">
          <button type="submit" class="btn btn-primary btn-block">Request new password</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <p class="mt-3 mb-1 text-center">
      <a href="<?= base_url('auth'); ?>">Login</a>
    </p>
    <p class="mb-0 text-center">
      <a href="<?= base_url('auth/register'); ?>" class="text-center">Register a new membership</a>
    </p>
  </div>
  <!-- /.login-card-body -->
</div>
</div>