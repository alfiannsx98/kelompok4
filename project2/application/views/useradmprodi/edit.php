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
                                        <label class="control-label"><i class="fas fa-user mr-1"></i> Name</label>
                                        <input type="text" class="form-control" value="<?= $user['NAMA_ADM']; ?>" name="nama" id="nama" <?= set_value('nama')?>>
                                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <input type="email" class="" value="<?= $user['email']; ?>" name="email" id="email" hidden>
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        <label class="control-label"><i class="far fa-envelope mr-1"></i> Email</label>
                                        <label type="email" class="form-control" value=""><?= $user['email']; ?></label>
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <input type="text" class="" value="<?= $user['identity']; ?>" name="identity" id="identity" hidden>
                                <div class="col-md-8">
                                    <div class="form-group label-floating">
                                        <label class="control-label"><i class="far fa-id-badge mr-1"></i> NIP</label>
                                        <label type="text" class="form-control"><?= $user['identity']; ?></label>
                                        <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        <label class="control-label"><i class="fas fa-male mr-1"></i><i class="fas fa-female mr-1"></i> Jenis Kelamin</label>
                                        <div class="form-group">
                                            <div class="form-check form-check-inline">
                                                <label>
                                                    <input type="radio" name="jk" id="jk" value="Laki-laki" <?php if($user['JK_ADM']=='Laki-laki') echo 'checked'?> <?= set_radio('jk')?>>
                                                Laki-laki</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label>
                                                    <input type="radio" name="jk" id="jk" value="Perempuan" <?php if($user['JK_ADM']=='Perempuan') echo 'checked'?> <?= set_radio('jk')?>>
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
                                        <label for="prodi"><i class="fas fa-user-graduate mr-1"></i>Admin Program Studi</label>
                                        <select name="prodi" id="prodi" class="form-control">
                                            <option value="" selected disabled>Admin Program Studi</option>
                                            <option value="<?= $user['ID_PRODI']; ?>" selected><?= $user['NM_PRODI']; ?></option>
                                            <?php foreach($prodi as $pr): ?>
                                            <option value="<?= $pr['ID_PRODI'] ?>"><?= $pr['NM_PRODI'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?= form_error('prodi', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        <label class="control-label"><i class="fas fa-phone mr-1"></i> No HP</label>
                                        <input type="text" class="form-control" value="<?= $user['HP_ADM']; ?>" name="hp" id="hp" <?= set_value('hp')?>>
                                        <?= form_error('hp', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label"><i class="fas fa-map-marker-alt mr-1"></i>  Alamat</label>
                                        <input type="text" class="form-control" value="<?= $user['ALAMAT_ADM']; ?>" name="alamat" id="alamat" <?= set_value('alamat')?>>
                                        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
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
                    <div class="form-group">
                        <div class="form-group text-center" style="position: relative;">
                            <span class="img-div">
                                <div class="text-center img-placeholder" onClick="triggerClick()">
                                    <h4>Upload Image</h4>
                                    <label class="sm-0"><small>(Klik gambar untuk mengganti)</label>
                                </div>
                                <div>
                                    <img src="<?= base_url(); ?>assets/dist/img/user/<?= $user['image']; ?>" onClick="triggerClick()" id="profileDisplay" width="200px">
                                </div>
                            </span>
                            <input type="file" name="image" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;">
                            <?= form_error('image', '<small class="text-danger pl-3">', '</small>'); ?>
                            <label>Profile Image</label>
                            <div>
                                <label class="sm-0"><small>Mohon unggah file image (maximal 2 MB).</label>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url(); ?>assets/dist/js/display.js"></script>