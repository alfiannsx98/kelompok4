<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title; ?></h1>
                </div>
                <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">DataTables</li>
            </ol>
            </div> -->
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?= $title ?> Table <button data-toggle="modal" data-target="#newroleModal" class="btn btn-just-icon btn-round btn-success">Add Data <i class="fa fa-plus"></i></button></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Nama Perusahaan</th>
                                    <th>Alamat Perusahaan</th>
                                    <th>No Telefon</th>
                                    <th>Email Perusahaan</th>
                                    <th>Gambar</th>
                                    <th>Rating</th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($pt as $p) :
                                    $id = $p['ID_PR'];
                                    $nama = $p['NAMA_PR'];
                                    $alamat = $p['ALAMAT_PR'];
                                    $hp = $p['HP_PR'];
                                    $email = $p['EMAIL_PR'];
                                    $rating = $p['RATING'];
                                    $image = $p['gambar'];
                                ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $id; ?></td>
                                        <td><?= $nama; ?></td>
                                        <td><?= $alamat; ?></td>
                                        <td><?= $hp; ?></td>
                                        <td><?= $email; ?></td>
                                        <td><img class="profile-user-img img-fluid" src="<?= base_url() . 'assets/dist/img/perusahaan/' . $image; ?>"></td>
                                        <td><?= $rating; ?></td>
                                        <td class="text-right">
                                            <button class="btn btn-info btn-xs btn-round" data-toggle="modal" data-target="#modal_edit<?= $id; ?>">Edit Data</button>
                                            <button class="btn btn-danger btn-xs btn-round" data-toggle="modal" data-target="#modal_hapus<?= $id; ?>">Hapus Data</button>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Nama Perusahaan</th>
                                    <th>Alamat Perusahaan</th>
                                    <th>No Telefon</th>
                                    <th>Email Perusahaan</th>
                                    <th>Gambar</th>
                                    <th>Rating</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

<!--MODAL DIALOG UNTUK CREATE DATA!-->
<div class="modal fade" id="newroleModal" tabindex="-1" role="dialog" aria-labelledby="newroleModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newroleModal">Buat Data Perusahaan</h5>
                </button>
            </div>
            <?= form_open_multipart('Perusahaan'); ?>
                <div class="modal-body">
                    <div class="form-group label-floating">
                        <label for="">Nama Perusahaan
                            <small>(required)</small>
                        </label>
                        <input type="text" class="form-control" name="nama" placeholder="nama perusahaan">
                        <?= form_error('nama', '<small class="text-danger col-md">', '</small>'); ?>
                    </div>
                    <div class="form-group label-floating">
                        <label for="">Alamat Perusahaan
                            <small>(required)</small>
                        </label>
                        <input type="text" name="alamat" placeholder="alamat perusahaan" class="form-control">
                        <?= form_error('alamat', '<small class="text-danger col-md">', '</small>'); ?>
                    </div>
                    <div class="form-group label-floating">
                        <label for="">No Telpon
                            <small>(required)</small>
                        </label>
                        <input type="text" name="nohp" placeholder="masukkan no telefon" class="form-control">
                        <?= form_error('nohp', '<small class="text-danger col-md">', '</small>'); ?>
                    </div>
                    <div class="form-group label-floating">
                        <label for="">Email Perusahaan
                            <small>(required)</small>
                        </label>
                        <input type="email" name="email" placeholder="masukkan email" class="form-control">
                        <?= form_error('email', '<small class="text-danger col-md">', '</small>'); ?>
                    </div>
                    <div class="form-group text-center" style="position: relative;">
                        <span class="img-div">
                            <div class="text-center img-placeholder" onClick="triggerClick()">
                                <h4>Unggah Gambar</h4>
                                <label class="sm-0"><small>(Klik gambar mengisi gambar perusahaan)</label>
                            </div>
                            <div>
                                <img src="<?= base_url(); ?>assets/dist/img/perusahaan/default.jpg ?>" onClick="triggerClick()" id="profileDisplay" width="200px">
                            </div>
                        </span>
                        <input type="file" name="gambar" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;" required>
                        <?= form_error('gambar', '<small class="text-danger pl-3">', '</small>'); ?>
                        <label>Gambar Perusahaan</label>
                        <div>
                            <label class="sm-0">
                            <small>Mohon unggah file image (maximal 2 MB).</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!--MODAL DIALOG UNTUK EDIT DATA!-->
<?php
foreach ($pt as $i) :
    $id = $i['ID_PR'];
    $nama = $i['NAMA_PR'];
    $alamat = $i['ALAMAT_PR'];
    $nohp = $i['HP_PR'];
    $email = $i['EMAIL_PR'];
    $rating = $i['RATING'];
    $gambar = $i['gambar'];
?>
    <div class="modal fade" id="modal_edit<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Edit Data Perusahaan</h3>
                </div>
                <?= form_open_multipart('Perusahaan/edit_perusahaan'); ?>
                    <div class="modal-body">
                        <div class="form-group label-floating">
                            <input type="hidden" name="id_pr" id="id_pr" value="<?= $id; ?>">
                        </div>
                        <div class="form-group label-floating">
                            <label for="">Nama Perusahaan
                                <small>(required)</small>
                            </label>
                            <input type="text" class="form-control" name="nama" value="<?= $nama; ?>" placeholder="nama perusahaan">
                            <?= form_error('nama', '<small class="text-danger col-md">', '</small>'); ?>
                        </div>
                        <div class="form-group label-floating">
                            <label for="">Alamat Perusahaan
                                <small>(required)</small>
                            </label>
                            <input type="text" class="form-control" name="alamat" value="<?= $alamat; ?>" placeholder="alamat perusahaan">
                            <?= form_error('alamat', '<small class="text-danger col-md">', '</small>'); ?>
                        </div>
                        <div class="form-group label-floating">
                            <label for="">No Telefon
                                <small>(required)</small>
                            </label>
                            <input type="text" class="form-control" name="nohp" value="<?= $nohp; ?>" placeholder="no telefon">
                            <?= form_error('nohp', '<small class="text-danger col-md">', '</small>'); ?>
                        </div>
                        <div class="form-group label-floating">
                            <label for="">Email Perusahaan
                                <small>(required)</small>
                            </label>
                            <input type="text" class="form-control" name="email" value="<?= $email; ?>" placeholder="email perusahaan">
                        </div>
                        <div class="form-group text-center" style="position: relative;">
                            <span class="img-div">
                                <div class="text-center img-placeholder" onClick="triggerClick1()">
                                    <h4>Unggah Gambar</h4>
                                    <label class="sm-0"><small>(Klik gambar mengisi gambar perusahaan)</label>
                                </div>
                                <div>
                                    <img src="<?= base_url(); ?>assets/dist/img/perusahaan/<?= $gambar; ?>" onClick="triggerClick1()" id="editDisplay" width="200px">
                                </div>
                            </span>
                                <input type="file" name="gambar" onChange="displayImage1(this)" id="editImage" class="form-control" style="display: none;" required>
                                <?= form_error('gambar', '<small class="text-danger pl-3">', '</small>'); ?>
                                <label>Gambar Perusahaan</label>
                            <div>
                                <label class="sm-0">
                                <small>Mohon unggah file image (maximal 2 MB).</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-success">Simpan Data</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--MODAL HAPUS DATA!-->
    <div class="modal fade" id="modal_hapus<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Hapus Menu</h3>
                </div>
                <form action="<?= base_url() . 'Perusahaan/hapus_perusahaan'; ?>" method="post" class="form-horizontal">
                    <div class="modal-body">
                        <p>Apakah Anda yakin mau menghapus data ini? <b><?= $nama; ?></b></p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id_pr" value="<?= $id; ?>">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php endforeach; ?>

<script src="<?= base_url(); ?>assets/dist/js/display.js"></script>