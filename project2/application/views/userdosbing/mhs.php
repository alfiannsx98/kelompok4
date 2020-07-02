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
                        <h3 class="card-title">Tabel <?= $title ?></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NIM</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Program Studi</th>
                                    <th>Status</th>
                                    <th>Proposal</th>
                                    <th id="acc" class="disabled-sorting text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($bimbingan as $m) :
                                    $id = $m['ID_M'];
                                    $nim = $m['NIM'];
                                    $nama = $m['NAMA_M'];
                                    $jk = $m['JK_M'];
                                    $alamat = $m['ALAMAT_M'];
                                    $hp = $m['HP_M'];
                                    $prodi = $m['NM_PRODI'];
                                    $semester = $m['SMT'];
                                    $ketua = $m['ST_KETUA'];
                                    $proposal = $m['PROPOSAL'];
                                    $img = $m['image'];
                                ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $nim; ?></td>
                                        <td><?= $nama; ?></td>
                                        <td><?= $prodi; ?></td>
                                        <td>
                                            <?php if ($ketua == 1) { ?>
                                                <span class="badge badge-info">Ketua PKL</span>
                                            <?php } else { ?>
                                                <span class="badge badge-secondary">--</span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php if ($proposal == "") { ?>
                                                <span class="badge badge-danger">Belum Upload</span>
                                            <?php } else { ?>
                                                <span class="badge badge-success"><?= $proposal; ?></span>
                                            <?php } ?>
                                        </td>
                                        <td id="bt" class="text-center">
                                            <button type="button" id="detail-btn" class="btn btn-info btn-xs btn-round" data-toggle="modal" data-target="#modal_edit<?= $id; ?>">Detail</button>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>NIM</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Program Studi</th>
                                    <th>Status</th>
                                    <th>Proposal</th>
                                    <th id="acc" class="disabled-sorting text-left">Actions</th>
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

<!--MODAL EDIT role!-->
<?php foreach ($bimbingan as $m) :
    $id_u = $m['id_user'];
    $id = $m['ID_M'];
    $identity = $m['identity'];
    $nim = $m['NIM'];
    $nama = $m['NAMA_M'];
    $jk = $m['JK_M'];
    $alamat = $m['ALAMAT_M'];
    $hp = $m['HP_M'];
    $id_pr = $m['ID_PRODI'];
    $prodi = $m['NM_PRODI'];
    $semester = $m['SMT'];
    $ketua = $m['ST_KETUA'];
    $pkl = $m['NAMA_PR'];
    $proposal = $m['PROPOSAL'];
?>

    <div class="modal fade" id="modal_edit<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title title-1" id="myModalLabel">Detail Data</h3>
                </div>
                <?= form_open_multipart('Mahasiswa/edit_mahasiswa'); ?>
                <div class="modal-body">
                    <div class="form-group" hidden>
                        <label class="control-label col-xs-3">ID menu</label>
                        <div class="col-xs-8">
                            <input name="id_u" value="<?= $id_u; ?>" class="form-control" type="text" placeholder="ID menu">
                            <input name="id" value="<?= $id; ?>" class="form-control" type="text" placeholder="ID menu">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">NIM</label>
                                <input type="text" class="form-control" value="<?= $nim; ?>" placeholder="NIM" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Mahasiswa</label>
                                <input type="text" class="form-control" value="<?= $nama; ?>" placeholder="nama mahasiswa" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"> Jenis Kelamin</label>
                                <input type="text" class="form-control" value="<?= $jk; ?>" placeholder="jenis kelamin" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Alamat Mahasiswa</label>
                                <input type="text" value="<?= $alamat; ?>" placeholder="alamat mahasiswa" class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Nomor Telfon</label>
                                <input type="text"  value="<?= $hp; ?>" placeholder="no telefon mahasiswa" class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Status: </label>
                                <?php if ($ketua == 1) { ?>
                                    <span class="badge badge-info">Ketua PKL</span>
                                <?php } else { ?>
                                    <span class="badge badge-secondary">--</span>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Proposal: </label>
                                <?php if ($proposal == "") { ?>
                                    <span class="badge badge-danger">Belum Upload</span>
                                <?php } else { ?>
                                    <span class="badge badge-success"><?= $proposal; ?></span>
                                <?php } ?>   
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Tempat PKL</label>
                                <input type="text" value="<?= $pkl; ?>" placeholder="tempat pkl" class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="prodi">Program Studi</label>
                                <input type="text" value="<?= $prodi; ?>" placeholder="program studi" class="form-control" disabled>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="prodi">Semester</label>
                                <input type="text" value="<?= $semester; ?>" placeholder="Semester" class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="close-btn" class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Close</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
<?php endforeach; ?>