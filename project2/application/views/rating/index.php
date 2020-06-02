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
                            <th>Rating</th>
                            <th>Nama Rating</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($rating as $r) :
                        $id = $r['ID_RT'];
                    ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $r['RT']; ?></td>
                            <td><?= $r['nama_rating']; ?></td>
                            <td class="text-right">
                                <button class="btn btn-info btn-xs btn-round" data-toggle="modal" data-target="#modal_edit<?= $id; ?>">Edit <?= $title; ?></button>
                                <button class="btn btn-danger btn-xs btn-round" data-toggle="modal" data-target="#modal_hapus<?= $id; ?>">Hapus <?= $title; ?></button>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Menu</th>
                            <th>Actions</th>
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
                <h5 class="modal-title" id="newroleModal">Create New Data</h5>
                </button>   
            </div>
            <form action="<?= base_url('rating'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Rating</label>
                        <input type="text" class="form-control" id="rating" name="rating" placeholder="Masukkan Rating">
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama Rating</label>
                        <input type="text" class="form-control" id="nm_rating" name="nm_rating" placeholder="Masukkan Rating">
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

<!--MODAL EDIT role!-->
<?php
foreach ($rating as $r) :
    $id = $r['ID_RT'];
    $nm_rating = $r['RT'];
    $nama_rating = $r['nama_rating'];
    ?>

<div class="modal fade" id="modal_edit<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Edit <?= $title; ?></h3>
            </div>
            <form action="<?= base_url() . 'rating/edit_rating'; ?>" method="post" class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group" hidden>
                        <label class="control-label col-xs-3">ID <?= $title; ?></label>
                        <div class="col-xs-8">
                            <input name="id_rating" value="<?php echo $id; ?>" class="form-control" type="text" placeholder="ID Rating" hidden>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">Nama Rating</label>
                        <div class="col-xs-8">
                            <input name="rating" value="<?php echo $nm_rating; ?>" class="form-control" type="text" placeholder="Nama Rating" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">Nama Rating</label>
                        <div class="col-xs-8">
                            <input name="nm_rating" value="<?php echo $nama_rating; ?>" class="form-control" type="text" placeholder="Nama Rating" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button class="btn btn-info">Update</button>
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
                <h3 class="modal-title" id="myModalLabel">Hapus <?= $title; ?></h3>
            </div>
            <form action="<?= base_url() . 'rating/hapus_rating'; ?>" method="post" class="form-horizontal">
                <div class="modal-body">
                    <p>Apakah Anda yakin mau menghapus data ini? <b><?= $nama_rating; ?></b></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_rating" value="<?= $id; ?>">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php endforeach; ?>