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
                            <th>NIP Admin</th>
                            <th>Nama Admin</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Prodi Admin</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    <?php
                    $qry = "SELECT `admin_prodi`.*, `prodi`.`NM_PRODI`
                    FROM `admin_prodi` JOIN `prodi`
                    ON `admin_prodi`.`ID_PRODI` = `prodi`.`ID_PRODI`";
                    $dtqry = $this->db->query($qry)->result_array();

                        foreach ($dtqry as $mi) :
                        $id_mi = $mi['ID_ADM'];
                        $nip_mi = $mi['NIP_ADM'];

                        $qwery = "SELECT * FROM user WHERE identity = '$id_mi'"; 
                        $dtu = $this->db->query($qwery)->result_array();
                        
                    ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $mi['NIP_ADM']; ?></td>
                            <td><?= $mi['NAMA_ADM']; ?></td>
                            <td><?= $mi['JK_ADM']; ?></td>
                            <td><?= $mi['ALAMAT_ADM']; ?></td>
                            <td><?= $mi['HP_ADM']; ?></td>
                            <td><?= $mi['NM_PRODI']; ?></td>
                            <?php foreach($dtu as $dtusr): ?>
                                <?php if($dtusr['is_active'] == 1): ?>
                                    <td><span class="badge badge-success">Activated</span></td>
                                <?php else : ?>
                                    <td><span class="badge badge-danger">Disabled</span></td>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <td class="text-right">
                                <button class="btn btn-info btn-xs btn-round" data-toggle="modal" data-target="#modal_edit<?= $id_mi; ?>">Edit Akun</button>
                                <button class="btn btn-danger btn-xs btn-round" data-toggle="modal" data-target="#modal_hapus<?= $id_mi; ?>">Hapus Akun</button>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>NIP Admin</th>
                            <th>Nama Admin</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Prodi Admin</th>
                            <th>Status</th>
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
<?php
$prd = "SELECT * FROM prodi";
$prodi1 = $this->db->query($prd)->result_array();
?>
<div class="modal fade" id="newroleModal" tabindex="-1" role="dialog" aria-labelledby="newroleModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newroleModal">Create New Data</h5>
                </button>   
            </div>
            <form action="<?= base_url('prodi/admin_prodi'); ?>" method="post">
                <div class="modal-body">
                        <div class="form-group">
                            <label for="">NIP Admin</label>
                            <input type="text" class="form-control" id="NIP_ADM" name="NIP_ADM" placeholder="Masukkan NIP Admin">
                            <?= form_error('NIP_ADM', '<small class="text-danger col-md">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Admin</label>
                            <input type="text" class="form-control" id="NAMA_ADM" name="NAMA_ADM" placeholder="Masukkan Nama Admin">
                            <?= form_error('NAMA_ADM', '<small class="text-danger col-md">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="">Pilih Jenis Kelamin</label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="JK_ADM" value="Laki-Laki"> Laki-Laki
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="JK_ADM" value="Perempuan"> Perempuan
                                </label>                                    
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat Admin</label>
                            <input type="text" name="ALAMAT_ADM" class="form-control" placeholder="Alamat Admin">
                            <?= form_error('ALAMAT_ADM', '<small class="text-danger col-md">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="">Nomor HP Admin</label>
                            <input type="number" class="form-control" id="HP_ADM" name="HP_ADM" placeholder="Masukkan Nomor HP">
                            <?= form_error('HP_ADM', '<small class="text-danger col-md">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="PRODI_ADM">Nama Admin Prodi</label>
                            <select name="ID_PRODI" id="ID_PRODI" class="form-control" required>
                                    <option value="" selected disabled>Silahkan pilih Program Studi</option>
                                    <?php foreach($prodi1 as $pr): ?>
                                    <option value="<?= $pr['ID_PRODI'] ?>"><?= $pr['NM_PRODI'] ?></option>
                                    <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="EMAIL_ADM">Email Admin</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email">
                            <?= form_error('email', '<small class="text-danger col-md">', '</small>'); ?>
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

<?php
foreach ($admin_prodi as $i) :
    $id = $i['ID_ADM'];
    $nip = $i['NIP_ADM'];
    $nama_adm = $i['NAMA_ADM'];
    $jk_adm = $i['JK_ADM'];
    $alamat_adm = $i['ALAMAT_ADM'];
    $hp_adm = $i['HP_ADM'];
    $prodi_adm = $i['ID_PRODI'];
    
    $query_user = "SELECT * FROM user WHERE identity = '$id'"; 
    $data_user = $this->db->query($query_user)->result_array();

    $query_prodi = "SELECT * FROM prodi";
    $prodi = $this->db->query($query_prodi)->result_array();
    ?>
<!-- Form Edit Admin Prodi -->
<div class="modal fade" id="modal_edit<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Edit Admin Prodi</h3>
            </div>
            <form action="<?= base_url() . 'prodi/edit_admin_prodi'; ?>" method="post" class="form-horizontal">
                <div class="modal-body">
                    <input name="ID_ADM" id="ID_ADM" value="<?= $id; ?>" class="form-control" type="text" placeholder="ID Admin" hidden>
                    <div class="form-group">
                        <label for="NIP_ADM" class="control-label col-xs-3">NIP Admin Prodi</label>
                        <div class="col-xs-8">
                            <input type="text"value="<?= $nip; ?>" placeholder="NIP Admin Prodi" class="form-control" readonly disabled>
                            <input type="hidden" name="NIP_ADM" id="NIP_ADM" value="<?= $nip; ?>">
                            <?= form_error('NIP_ADM', '<small class="text-danger col-md">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="NAMA_ADM" class="control-label col-xs-3">Nama Admin Prodi</label>
                        <div class="col-xs-8">
                            <input type="text" name="NAMA_ADM" id="NAMA_ADM" value="<?= $nama_adm; ?>" placeholder="Nama Admin Prodi" class="form-control">
                            <?= form_error('NAMA_ADM', '<small class="text-danger col-md">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="JK_ADM" class="control-label col-xs-3">Jenis Kelamin</label>
                        <div class="col-xs-8">
                            <select name="JK_ADM" id="JK_ADM" class="form-control">
                                <option value="<?= $jk_adm; ?>" selected hidden><?= $jk_adm; ?></option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ALAMAT_ADM" class="control-label col-xs-3">Alamat Admin Prodi</label>
                        <div class="col-xs-8">
                            <input type="text" name="ALAMAT_ADM" id="ALAMAT_ADM" value="<?= $alamat_adm ?>" placeholder="Alamat Admin Prodi" class="form-control">
                            <?= form_error('ALAMAT_ADM', '<small class="text-danger col-md">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="HP_ADM" class="control-label col-xs-3">Nomor HP Admin Prodi</label>
                        <div class="col-xs-8">
                            <input type="number" name="HP_ADM" id="HP_ADM" value="<?= $hp_adm ?>" placeholder="No HP Admin Prodi" class="form-control">
                            <?= form_error('HP_ADM', '<small class="text-danger col-md">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="PRODI_ADM" class="control-label col-xs-3">Program Studi</label>
                        <div class="col-xs-8">
                            <select name="ID_PRODI" id="ID_PRODI" class="form-control">
                                <option value="<?= $prodi_adm; ?>" selected hidden><?= $prodi_adm; ?></option>
                                <option value="" selected disabled><?= $mi['NM_PRODI']; ?></option>
                                <?php foreach($prodi as $pr): ?>
                                    <option value="<?= $pr['ID_PRODI'] ?>"><?= $pr['NM_PRODI'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <?php foreach($data_user as $dt): ?>
                    <input type="text" name="id_user" id="id_user" value="<?= $dt['id_user']; ?>" hidden>
                    <div class="form-group">
                        <label for="is_active" class="control-label col-xs-3">Status User</label>
                        <div class="col-xs-8">
                            <select name="is_active" id="is_active" class="form-control">
                                <option value="<?= $jk_adm; ?>" selected hidden>
                                    <?php if($dt['is_active'] == 1){
                                        echo "Aktif";
                                    } else{
                                        echo "Nonaktif";
                                    }
                                    ?>
                                </option>
                                <option value="1">Aktif</option>
                                <option value="0">Nonaktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="control-label col-xs-3">Email Admin Prodi</label>
                        <div class="col-xs-8">
                            <input type="email" name="email" id="email" value="<?= $dt['email']; ?>" placeholder="Email Admin Prodi" class="form-control">
                            <?= form_error('email', '<small class="text-danger col-md">', '</small>'); ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
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
                <h3 class="modal-title" id="myModalLabel">Hapus Menu</h3>
            </div>
            <form action="<?= base_url() . 'prodi/hapus_admin_prodi'; ?>" method="post" class="form-horizontal">
                <div class="modal-body">
                    <p>Apakah Anda yakin mau menghapus data ini? <b><?= $nama_adm; ?></b></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="ID_ADM" value="<?= $id; ?>">
                    <input type="hidden" name="NIP_ADM" value="<?= $nip; ?>">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php endforeach; ?>