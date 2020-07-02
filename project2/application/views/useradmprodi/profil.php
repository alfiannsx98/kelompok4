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
    <section class="content justify-content-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <!-- About Me Box -->
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-user float-left bg-warning p-4"></i>
                            <h4 class="card-title pt-4 float-right">Your Profile -
                                <small class="category">Here is your bio</small>
                            </h4>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body card-primary card-outline">
                            <?= $this->session->flashdata('message'); ?>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group label-floating">
                                        <label class="control-label"><i class="fas fa-user mr-1"></i> Nama</label>
                                        <label class="form-control" name="nama" id="nama"><?= $user['NAMA_ADM']; ?></label>
                                    </div>
                                </div>
                                <input type="email" class="" value="<?= $user['email']; ?>" name="email" id="email" hidden>
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        <label class="control-label"><i class="far fa-envelope mr-1"></i> Email</label>
                                        <label type="email" class="form-control" value=""><?= $user['email']; ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <input type="text" class="" value="<?= $user['identity']; ?>" name="identity" id="identity" hidden>
                                <div class="col-md-8">
                                    <div class="form-group label-floating">
                                        <label class="control-label"><i class="fas fa-id-badge mr-1"></i> NIP</label>
                                        <label class="form-control" name="about" id="about"><?= $user['NIP_ADM']; ?></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        <label class="control-label"><i class="fas fa-male mr-1"></i><i class="fas fa-female mr-1"></i> Jenis Kelamin</label>
                                        <label class="form-control" value=""><?= $user['JK_ADM']; ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group label-floating">
                                        <label class="control-label"><i class="fas fa-user-graduate mr-1"></i>Admin Program Studi</label>
                                        <label class="form-control" name="prodi" id="prodi"><?= $user['NM_PRODI']; ?></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        <label class="control-label"><i class="fas fa-phone mr-1"></i> No HP</label>
                                        <label class="form-control" value=""><?= $user['HP_ADM']; ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label"><i class="fas fa-map-marker-alt mr-1"></i> Alamat</label>
                                        <label class="form-control" name="about" id="about"><?= $user['ALAMAT_ADM']; ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label"><i class="fas fa-pencil-alt mr-1"></i> About</label>
                                        <label class="form-control" name="about" id="about"><?= $user['about']; ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><i class="far fa-calendar-alt mr-1"></i> Joined Date </label> <i class="badge badge-success"><?= date('d F Y', $user['date_created']); ?></i>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="clearfix p-4 text-right">
                                <a href="<?= base_url() . 'user/edit_password' ?>" class="btn btn-danger">Update Password</a>
                                <a href="<?= base_url() . 'user/edit' ?>" class="btn btn-info">Update Profile</a>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="col-md-3">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid" src="<?= base_url() . 'assets/dist/img/user/' . $user['image']; ?>" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center"><?= $user['nama']; ?></h3>

                            <p class="text-muted text-center"><?= $user['about']; ?></p>

                            <ul class="list-group mb-3">
                                <li class="list-group-item">
                                    <b>Status</b> <a class="float-right"> <?php if ($user['role_id'] == 1) {
                                                                                echo "Administrator";
                                                                            } elseif($user['role_id'] == 2) {
                                                                                echo "Mahasiswa";
                                                                            } elseif($user['role_id'] == 3) {
                                                                                echo "Dosen Pembimbing";
                                                                            } elseif($user['role_id'] == 4) {
                                                                                echo "Koordinator PKL";
                                                                            } else {
                                                                                echo "Admin Prodi";
                                                                            }?>    
                                                                        </a>
                                </li>
                                <li class="list-group-item">
                                    <b>Joined Date</b> <a class="float-right"><i class="label label-success"><?= date('d F Y', $user['date_created']); ?></i></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Last Update Password</b> <a class="float-right">
                                        <?php if($user['change_pass']==0){ ?>
                                            <i class="badge badge-secondary">--</i>
                                        <?php } else { ?>
                                            <?= date('d F Y', $user['change_pass']); ?>
                                        <?php } ?>
                                    </i></a>
                                </li>
                            </ul>

                            <div class="text-center"><?php if ($user['is_active'] == 1) {
                                                            echo "<i class='badge badge-success'>Activated</i>";
                                                        }  ?></a>

                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>
</section>
</div>