<!-- Begin Page Content -->
<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="purple">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Table <?= $title; ?></h4> <button data-toggle="modal" data-target="#newroleModal" class="btn btn-just-icon btn-round btn-success">Add Data<i class="fa fa-plus"></i></button>
                                    <?= $this->session->flashdata('message'); ?>
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                    </div>
                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>NIP Admin</th>
                                                    <th>Nama Admin</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Alamat</th>
                                                    <th>No HP</th>
                                                    <th>Prodi Admin</th>
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>#</th>
                                                    <th>NIP Admin</th>
                                                    <th>Nama Admin</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Alamat</th>
                                                    <th>No HP</th>
                                                    <th>Prodi Admin</th>
                                                    <th class="text-right">Actions</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($admin_prodi as $m) :
                                                $id = $m['ID_ADM'];
                                            ?>
                                                <tr>
                                                    <td><?= $i; ?></td>
                                                    <td><?= $m['NIP_ADM']; ?></td>
                                                    <td><?= $m['NAMA_ADM']; ?></td>
                                                    <td><?= $m['JK_ADM']; ?></td>
                                                    <td><?= $m['ALAMAT_ADM']; ?></td>
                                                    <td><?= $m['HP_ADM']; ?></td>
                                                    <td><?= $m['PRODI_ADM']; ?></td>
                                                    <td class="text-right">
                                                    <button class="btn btn-info btn-xs btn-round" data-toggle="modal" data-target="#modal_edit<?= $id; ?>">Edit Akun</button>
                                                    <button class="btn btn-danger btn-xs btn-round" data-toggle="modal" data-target="#modal_hapus<?= $id; ?>">Hapus Akun</button>
                                                    </td>
                                                </tr>
                                                <?php $i++; ?>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- end content-->
                            </div>
                            <!--  end card  -->
                        </div>
                        <!-- end col-md-12 -->
                    </div>
                    <!-- end row -->
                </div>
            </div>
        
<!-- Pembataas -->


<!-- Akhir Pembatas -->

<!--MODAL DIALOG UNTUK CREATE DATA!-->
<div class="modal fade" id="newroleModal" tabindex="-1" role="dialog" aria-labelledby="newroleModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newroleModal">Create New Data</h5>
                </button>   
            </div>
            <form action="<?= base_url('dosen/admin_prodi'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">NIP Admin</label>
                        <input type="text" class="form-control" id="NIP_ADM" name="NIP_ADM" placeholder="Masukkan NIP Admin">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Admin</label>
                        <input type="text" class="form-control" id="NAMA_ADM" name="NAMA_ADM" placeholder="Masukkan Nama Admin">
                    </div>
                    <div class="form-group">
                        <label for="">Pilih Jenis Kelamin</label>
                        <div class="form-group">
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
                    </div>
                    <div class="form-group">
                        <label for="">Nomor HP Admin</label>
                        <input type="number" class="form-control" id="HP_ADM" name="HP_ADM" placeholder="Masukkan Nomor HP">
                    </div>
                    <div class="form-group">
                        <label for="">Program Studi Admin</label>
                        <select name="PRODI_ADM" id="PRODI_ADM" class="form-control">
                            <option value="" disabled selected>Silahkan Pilih Program Studi</option>
                            <option value="TKK">Teknik Komputer</option>
                            <option value="TIF">Teknik Informatika</option>
                            <option value="MIF">Manajemen Informatika</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Email Admin</label>
                        <input type="email" class="form-control" id="EMAIL_ADM" name="EMAIL_ADM" placeholder="Masukkan Email">
                    </div>
                    <input type="hidden" name="PASSWORD_ADM" id="PASSWORD_ADM" value="polijesip<?= time(); ?>">
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
foreach ($admin_prodi as $i) :
    $id = $i['ID_ADM'];
    $nip = $i['NIP_ADM'];
    $nama_adm = $i['NAMA_ADM'];
    $jk_adm = $i['JK_ADM'];
    $alamat_adm = $i['ALAMAT_ADM'];
    $hp_adm = $i['HP_ADM'];
    $prodi_adm = $i['PRODI_ADM'];
    ?>

<div class="modal fade" id="modal_edit<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Edit role</h3>
            </div>
            <form action="<?= base_url() . 'dosen/edit_admin_prodi'; ?>" method="post" class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group" hidden>
                        <label class="control-label col-xs-3">ID menu</label>
                        <div class="col-xs-8">
                            <input name="id_menu" value="<?php echo $id; ?>" class="form-control" type="text" placeholder="ID menu" hidden>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">Nama menu</label>
                        <div class="col-xs-8">
                            <input name="menu" value="<?php echo $menu; ?>" class="form-control" type="text" placeholder="Nama Menu" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">Icon Menu</label>
                        <div class="col-xs-8">
                            <input name="icon" value="<?php echo $icon_menu; ?>" class="form-control" type="text" placeholder="Icon Menu" required>
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
                <h3 class="modal-title" id="myModalLabel">Hapus Menu</h3>
            </div>
            <form action="<?= base_url() . 'dosen/hapus_admin_prodi'; ?>" method="post" class="form-horizontal">
                <div class="modal-body">
                    <p>Apakah Anda yakin mau menghapus data ini? <b><?= $nama_adm; ?></b></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="ID_ADM" value="<?= $id; ?>">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php endforeach; ?>