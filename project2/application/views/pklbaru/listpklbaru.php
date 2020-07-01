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
                        <h3 class="card-title"><?= $title2 ?> Table</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Mahasiswa Pengaju (NIM)</th>
                                    <th>Nama Perusahaan</th>
                                    <th>Alamat Perusahaan</th>
                                    <th>Gambar</th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($pt as $p) :
                                    $id = $p['ID_PR'];
                                    $nim = $p['NIM'];
                                    $nama = $p['NAMA_PR'];
                                    $alamat = $p['ALAMAT_PR'];
                                    $hp = $p['HP_PR'];
                                    $email = $p['EMAIL_PR'];
                                    $image = $p['gambar'];
                                    $confirm = $p['confirm'];
                                    $nama_m = $p['NAMA_M'];
                                ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td class="text-bold"><?= $nama_m; ?> (<?= $nim; ?>)</td>
                                        <td><?= $nama; ?></td>
                                        <td><?= $alamat; ?></td>
                                        <td><img class="profile-user-img img-fluid" src="<?= base_url() . 'assets/dist/img/perusahaan/' . $image; ?>"></td>
                                        <td class="text-center">
                                            <button class="btn btn-info btn-xs btn-round" data-toggle="modal" data-target="#modal_edit<?= $id; ?>">Detail</button>
                                            <a href="<?= base_url("listpt/konfirmasi/".$id) ?>" class="btn btn-success btn-xs btn-round">Konfirmasi</a>
                                            <a href="<?= base_url("listpt/tolak/".$id) ?>" class="btn btn-danger btn-xs btn-round">Tolak</a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Mahasiswa Pengaju (NIM)</th>
                                    <th>Nama Perusahaan</th>
                                    <th>Alamat Perusahaan</th>
                                    <th>Gambar</th>
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
<!-- /.content-wrapper -->


<!-- Akhir Pembatas -->

<!--MODAL DIALOG UNTUK CREATE DATA!-->
<div class="modal fade" id="newroleModal" tabindex="-1" role="dialog" aria-labelledby="newroleModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newroleModal">Buat Pengajuan</h5>
                </button>
            </div>
            <?= form_open_multipart('dashboard_mahasiswa/pklbaru'); ?>
            <input type="text" name="nim" value="<?= $user['identity'] ?>" hidden>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Nama Perusahaan</label>
                    <input type="text" class="form-control" name="nama" placeholder="nama perusahaan">
                    <?= form_error('nama', '<small class="text-danger col-md">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="">Alamat Perusahaan</label>
                    <input type="text" name="alamat" placeholder="alamat perusahaan" class="form-control">
                    <?= form_error('alamat', '<small class="text-danger col-md">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="">Nomor Telpon Perusahaan</label>
                    <input type="text" name="nohp" placeholder="masukkan no telefon" class="form-control">
                    <?= form_error('nohp', '<small class="text-danger col-md">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="">Email Perusahaan</label>
                    <input type="email" name="email" placeholder="masukkan email" class="form-control">
                    <?= form_error('email', '<small class="text-danger col-md">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3">Upload Gambar Perusahaan</label>
                    <input type="file" name="gambar" class="form-control">
                </div>
                <div class="form-group">
                    <img class="profile-user-img img-fluid" src="<?= base_url() . 'assets/dist/img/perusahaan/default.jpg'; ?>">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!--MODAL EDIT role!-->
<?php
foreach ($pt as $i) :
    $id = $i['ID_PR'];
    $id_m = $i['ID_M'];
    $nama = $i['NAMA_PR'];
    $alamat = $i['ALAMAT_PR'];
    $nohp = $i['HP_PR'];
    $email = $i['EMAIL_PR'];
    $gambar = $i['gambar'];
?>

    <div class="modal fade" id="modal_edit<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header modal-lg">
                    <h3 class="modal-title" id="myModalLabel">Detail Data Pengajuan</h3>
                </div>
                <?= form_open_multipart('dashboard_mahasiswa/edit_permohonan'); ?>
                <div class="modal-body">
                    <div class="form-group text-center">
                        <img width="200px" src="<?= base_url() . 'assets/dist/img/perusahaan/' . $gambar; ?>">
                    </div>
                    <div class="form-group" hidden>
                        <label class="control-label col-xs-3">ID menu</label>
                        <div class="col-xs-8">
                            <input name="id_pr" value="<?php echo $id; ?>" class="form-control" type="text" placeholder="ID menu">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">Mahasiswa Pengaju</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="mhs" value="<?= $nama_m; ?>" disabled>
                            <?= form_error('nama', '<small class="text-danger col-md">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">Nama Perusahaan</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="nama" value="<?= $nama; ?>" placeholder="nama perusahaan" disabled>
                            <?= form_error('nama', '<small class="text-danger col-md">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">Alamat Perusahaan</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="alamat" value="<?= $alamat; ?>" placeholder="alamat perusahaan" disabled>
                            <?= form_error('alamat', '<small class="text-danger col-md">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">Nomor Telpon Perusahaan</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="nohp" value="<?= $nohp; ?>" placeholder="no telefon" disabled>
                            <?= form_error('nohp', '<small class="text-danger col-md">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">Email Perusahaan</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="email" value="<?= $email; ?>" placeholder="email perusahaan" disabled>
                            <?= form_error('email', '<small class="text-danger col-md">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Tutup</button>
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
                    <h3 class="modal-title" id="myModalLabel">Batalkan Pengajuan</h3>
                </div>
                <form action="<?= base_url() . 'dashboard_mahasiswa/batal_permohonan'; ?>" method="post" class="form-horizontal">
                    <div class="modal-body">
                        <p>Apakah anda yakin membatalkan pengajuan tempat PKL baru ini?</p>
                        <p>Nama Perusahaan: <b><?= $nama; ?></b></p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id_pr" value="<?= $id; ?>">
                        <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Tidak</button>
                        <button class="btn btn-danger">Ya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--MODAL HAPUS DATA!-->
    <div class="modal fade" id="modal_hapus2<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Hapus Data Pengajuan</h3>
                </div>
                <form action="<?= base_url() . 'dashboard_mahasiswa/batal_permohonan'; ?>" method="post" class="form-horizontal">
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus data ini? <b><?= $nama; ?></b></p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id_pr" value="<?= $id; ?>">
                        <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Tidak</button>
                        <button class="btn btn-danger">Ya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php endforeach; ?>