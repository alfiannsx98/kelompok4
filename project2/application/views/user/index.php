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
                                                                            } else {
                                                                                echo "Member";
                                                                            }  ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Joined Date</b> <a class="float-right"><i class="label label-success"><?= date('d F Y', $user['date_created']); ?></i></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Change Date</b> <a class="float-right"><?= date('d F Y', $user['change_pass']); ?></i></a>
                                </li>
                            </ul>

                            <div class="text-center"><?php if ($user['is_active'] == 1) {
                                                            echo "<i class='badge badge-success'>Activation</i>";
                                                        }  ?></a>

                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>

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
                            <br>
                            <strong><i class="fas fa-book mr-1"></i> Your Name</strong>
                            <?= $this->session->flashdata('message'); ?>
                            <p class="text-muted">
                                <?= $user['nama']; ?>
                            </p>

                            <hr>

                            <strong><i class="far fa-envelope mr-1"></i> Your Email</strong>

                            <p class="text-muted"><?= $user['email']; ?></p>

                            <hr>

                            <strong><i class="fas fa-pencil-alt mr-1"></i> Description</strong>

                            <p class="text-muted">
                                <?= $user['about']; ?>
                            </p>

                            <hr>

                            <strong><i class="far fa-calendar-alt mr-1"></i> Joined Date</strong>

                            <p class="text-muted"><?= date('d F Y', $user['change_pass']); ?></p>
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
        </div>
</div>
</div>
</section>
</div>