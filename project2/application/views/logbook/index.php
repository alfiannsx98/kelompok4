<!-- Content Wrapper. Contains page content -->
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
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
<?php 
    $id_mhs = $mahasiswa;
    $cek_daftar = $this->db->get_where('pendaftaran_klp', ['ID_M' => $id_mhs])->num_rows();
    if($cek_daftar != 0) :
?>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card"> 
                <div class="card-header"> 
                    <h3 class="card-title"><?= $title ?> Table 
                        <button data-toggle="modal" data-target="#newroleModal" class="btn btn-just-icon btn-round btn-success">Add Data <i class="fa fa-plus"></i></button> 
                        <?php if($logbook != null): ?>
                        <button class="btn btn-just-icon btn-round btn-warning" data-toggle="modal" data-target="#cetakModal">Cetak Logbook Mingguan <i class="fas fa-print"></i></button>
                        <?php endif; ?>
                    </h3> 
                </div>
            <!-- /.card-header -->
            <div class="card-body">
            <?= $this->session->flashdata('message'); ?>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Judul</th>
                            <th>Uraian</th>
                            <th>Progress</th>
                            <th>Tanggal</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($logbook as $m) :
                        $id = $m['id_logbook'];
                    ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $m['judul']; ?></td>
                            <td><?= $m['uraian']; ?></td>
                            <td><?= $m['progress']; ?></td>
                            <td><?= $m['tanggal']; ?></td>
                            <td class="text-right">
                                <button class="btn btn-info btn-xs btn-round" data-toggle="modal" data-target="#modal_edit<?= $id; ?>">Edit Logbook</button>
                                <button class="btn btn-danger btn-xs btn-round" data-toggle="modal" data-target="#modal_hapus<?= $id; ?>">Hapus Logbook</button>
                            </td>
                        </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Judul</th>
                            <th>Uraian</th>
                            <th>Progress</th>
                            <th>Tanggal</th>
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
            <form action="<?= base_url('logbook'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul">
                    </div>
                    <div class="form-group">
                        <label for="">Uraian</label>
                        <textarea class="form-control" name="uraian" id="" cols="30" rows="10" placeholder="Masukkan Uraian"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Progress</label>
                        <input type="text" class="form-control" id="progress" name="progress" placeholder="Masukkan progress">
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Logbook</label>
                        <input type="date" class="form-control" id="datepicker" name="tanggal" placeholder="Masukkan tanggal" value="<?= date("Y-m-d") ?>" readonly>
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
foreach ($logbook as $i) :
    $id = $i['id_logbook'];
    $judul = $i['judul'];
    $uraian = $i['uraian'];
    $progress = $i['progress'];
    $tanggal = $i['tanggal'];
    ?>

<div class="modal fade" id="modal_edit<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Edit Logbook</h3>
            </div>
            <form action="<?= base_url() . 'logbook/edit_logbook'; ?>" method="post" class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group" hidden>
                        <label class="control-label col-xs-3">ID menu</label>
                        <div class="col-xs-8">
                            <input name="id_logbook" value="<?php echo $id; ?>" class="form-control" type="text" placeholder="ID menu" hidden>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul" value="<?= $judul ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Uraian</label>
                        <textarea class="form-control" name="uraian" id="" cols="30" rows="10" placeholder="Masukkan Uraian"><?= $uraian ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Progress</label>
                        <input type="text" class="form-control" id="progress" name="progress" placeholder="Masukkan progress" value="<?= $progress ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Logbook</label>
                        <input type="date" class="form-control" id="datepicker" name="tanggal" placeholder="Masukkan tanggal" value="<?= $tanggal ?>" readonly>
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
                <h3 class="modal-title" id="myModalLabel">Hapus Logbook</h3>
            </div>
            <form action="<?= base_url() . 'logbook/hapus_logbook'; ?>" method="post" class="form-horizontal">
                <div class="modal-body">
                    <p>Apakah Anda yakin mau menghapus data ini? <b><?= $judul; ?></b></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_logbook" value="<?= $id; ?>">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php endforeach; ?>

<div class="modal fade" id="cetakModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Cetak Logbook</h3>
            </div>
            <form action="#" method="post" class="form-horizontal">
                <div class="modal-body">
                    <?php
                        $id_mahasiswa = $mahasiswa;
                        
                        $tgl_selesai = date("Y-m-d", strtotime('+ 5 month', strtotime($tgl['terlama'])));
                    ?>
                    <a href="<?= base_url() . 'logbook/rekap_data' ?>" class="btn btn-success"> Cetak Rekap Data <i class="fas fa-print"></i></a> Tanggal : <?= $tgl['terlama']; ?> s/d <?= $tgl_selesai; ?>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php else : ?>
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="alert alert-danger" role="alert">Anda belum tergabung dalam anggota kelompok</div>
            </div>
        </div>
    </section>
<?php endif; ?>
