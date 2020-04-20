<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <!-- <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol> -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-icon" data-background-color="blue">
                            <i class="fas fa-user float-left bg-warning p-4"></i>
                            <h4 class="card-title pt-4 float-right">Edit Your Profile -
                                <small class="category">Here is your bio</small>
                            </h4>
                        </div>
                        <div class="card-content p-4 card-primary card-outline">
                            <?= $this->session->flashdata('message'); ?>
                            <?= form_open_multipart('user/edit'); ?>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Name</label>
                                        <input type="text" class="form-control" value="<?= $user['nama']; ?>" name="nama" id="nama" <?= set_value('nama')?>>
                                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <input type="email" class="" value="<?= $user['email']; ?>" name="email" id="email" hidden>
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Email</label>
                                        <label type="email" class="form-control" value=""><?= $user['email']; ?></label>
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group label-floating">
                                        <label class="control-label">NIM</label>
                                        <label type="text" class="form-control"><?= $user['NIM']; ?></label>
                                        <?= form_error('nim', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Jenis Kelamin</label>
                                        <div class="form-group">
                                            <div class="form-check form-check-inline">
                                                <label>
                                                    <input type="radio" name="jk" id="jk" value="Laki-laki" <?= set_radio('jk')?>>
                                                Laki-laki</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label>
                                                    <input type="radio" name="jk" id="jk" value="Perempuan" <?= set_radio('jk')?>>
                                                Perempuan</label>
                                            </div>
                                        </div>
                                        <?= form_error('jk', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="prodi"> Program Studi</label>
                                        <select name="prodi" id="prodi" class="form-control" required>
                                            <option value="" selected disabled>Silahkan pilih Program Studi</option>
                                            <option value="<?= $user['PRODI_M']; ?>" selected><?= $user['PRODI_M']; ?></option>
                                            <?php foreach($prodi as $pr): ?>
                                            <option value="<?= $pr['nama_pr'] ?>"><?= $pr['nama_pr'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?= form_error('prodi', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="semester"> Semester</label>
                                        <select name="semester" id="semester" class="form-control" required>
                                            <option value="" selected disabled>Silahkan pilih Semester anda</option>
                                            <option value="<?= $user['SMT']; ?>" selected><?= $user['SMT']; ?></option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                        </select>
                                        <?= form_error('semester', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Alamat</label>
                                        <input type="text" class="form-control" value="<?= $user['ALAMAT_M']; ?>" name="alamat" id="alamat" <?= set_value('alamat')?>>
                                        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        <label class="control-label">No HP</label>
                                        <input type="text" class="form-control" value="<?= $user['HP_M']; ?>" name="hp" id="hp" <?= set_value('hp')?>>
                                        <?= form_error('hp', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">About</label>
                                        <input type="text" class="form-control" value="<?= $user['about']; ?>" name="about" id="about" <?= set_value('about')?>>
                                        <?= form_error('about', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Joined Date </label> <i class="badge badge-success"><?= date('d F Y', $user['date_created']); ?></i>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix p-4 text-right">
                                <button type="submit" class="btn btn-success">Update Profile</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <legend class="pl-4">Avatar</legend>
                    <div class="fileinput fileinput-new text-center mr-5" data-provides="fileinput">
                        <div class="fileinput-new thumbnail">
                            <img src="<?= base_url(); ?>assets/dist/img/user/<?= $user['image']; ?>" alt="image" width="200px">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                        <div>
                            <span class="btn btn-warning btn-round btn-file mt-4">
                                <span class="fileinput-new">Add Photo</span>
                                <span class="fileinput-exists">Change</span>
                                <input type="file" name="image" id="image" /></span>
                            <br />
                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists mt-4" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>