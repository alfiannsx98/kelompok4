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
                                    <th>Program Studi</th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($prodi as $pr) :
                                    $id = $pr['id_pr'];
                                    $nama = $pr['nama_pr'];
                                ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $id; ?></td>
                                        <td><?= $nama; ?></td>
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
                                    <th>Program Studi</th>
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
                <h5 class="modal-title" id="newroleModal">Create New Data</h5>
                </button>
            </div>
            <form action="<?= base_url('dataprodi'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group label-floating">
                        <label for="">Program Studi
                            <small>(required)</small>
                        </label>
                        <input type="text" class="form-control" name="prodi" placeholder="nama program studi">
                        <?= form_error('prodi', '<small class="text-danger col-md">', '</small>'); ?>
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
<?php foreach ($prodi as $pr) :
    $id = $pr['id_pr'];
    $nama = $pr['nama_pr'];
?>

    <div class="modal fade" id="modal_edit<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Edit role</h3>
                </div>
                <form action="<?= base_url('dataprodi/edit_prodi'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group label-floating">
                            <input type="hidden" name="id_prd" id="id_prd" value="<?= $id; ?>">
                        </div>
                        <div class="form-group label-floating">
                            <label for="">Nama Perusahaan
                                <small>(required)</small>
                            </label>
                            <input type="text" class="form-control" name="nama" value="<?= $nama; ?>" placeholder="nama perusahaan">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-success">Simpan Data</button>
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
                <form action="<?= base_url() . 'dataprodi/hapus_prodi'; ?>" method="post" class="form-horizontal">
                    <div class="modal-body">
                        <p>Apakah Anda yakin mau menghapus data ini? <b><?= $title; ?></b></p>
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
