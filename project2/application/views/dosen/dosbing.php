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
                    <h3 class="card-title">Tabel <?= $title ?> 
                    <button data-toggle="modal" data-target="#newroleModal" class="btn btn-just-icon btn-round btn-success">Add Data <i class="fa fa-plus"></i></button></h3> 
                </div>
            <!-- /.card-header -->
            <div class="card-body">
            <?= $this->session->flashdata('message'); ?>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NIP</th>
                        <th>Nama Dosen</th>
                        <th>Jenis Kelamin</th>
                        <th>Email Dosen</th>
                        <th>Dosen Program Studi</th>
                        <th>Jabatan</th>
                        <th>Status</th>
                        <th class="disabled-sorting text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($ds as $d) :
                        $id = $d['ID_DS'];
                        $nip = $d['NIP_DS'];
                        $nama = $d['NAMA_DS'];
                        $jk = $d['JK_DS'];
                        $alamat = $d['ALAMAT_DS'];
                        $hp = $d['HP_DS'];
                        $email =  $d['email'];
                        $prodi = $d['NM_PRODI'];
                        $jabatan = $d['role'];
                        $status = $d['is_active'];
                        $img = $d['image'];
                    ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $nip; ?></td>
                            <td><?= $nama; ?></td>
                            <td><?= $jk; ?></td>
                            <td><?= $email; ?></td>
                            <td><?= $prodi; ?></td>
                            <td><?= $jabatan; ?></td>
                            <?php if($status == 1): ?>
                                <td><span class="badge badge-success">Active</span></td>
                            <?php else : ?>
                                <td><span class="badge badge-danger">Disabled</span></td>
                            <?php endif; ?>
                            <!-- <td><img class="profile-user-img img-fluid" src="<?= base_url() . 'assets/dist/img/user/' . $img; ?>"></td> -->
                            <td class="text-right">
                                <button class="btn btn-info btn-xs btn-round" id="detail-btn" data-toggle="modal" data-target="#modal_edit<?= $id; ?>">Detail</button>
                                <button class="btn btn-danger btn-xs btn-round" data-toggle="modal" data-target="#modal_hapus<?= $id; ?>">Hapus</button>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>NIP</th>
                        <th>Nama Dosen</th>
                        <th>Jenis Kelamin</th>
                        <th>Email Dosen</th>
                        <th>Dosen Program Studi</th>
                        <th>Jabatan</th>
                        <th>Status</th>
                        <th class="disabled-sorting text-right">Actions</th>
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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newroleModal">Tambah Data</h5>
                </button>   
            </div>
            <form action="Dosbing" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">NIP</label>
                                <input type="text" class="form-control" name="nip" placeholder="masukkan NIP" <?= set_value('nip');?>>
                                <?= form_error('nip', '<small class="text-danger col-md">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Dosen</label>
                                <input type="text" class="form-control" name="nama" placeholder="nama dosen" <?= set_value('nama');?>>
                                <?= form_error('nama', '<small class="text-danger col-md">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"> Jenis Kelamin</label>
                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <label>
                                            <input type="radio" name="jk" value="Laki-laki" <?= set_radio('jk');?>>
                                        Laki-laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label>
                                            <input type="radio" name="jk" value="Perempuan" <?= set_radio('jk');?>>
                                        Perempuan</label>
                                    </div>
                                </div>
                                <?= form_error('jk', '<small class="text-danger col-md">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Alamat Dosen</label>
                                <input type="text" name="alamat" placeholder="alamat dosen" class="form-control" <?= set_value('alamat');?>>
                                <?= form_error('alamat', '<small class="text-danger col-md">', '</small>'); ?>
                            </div>  
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Nomor Telefon</label>
                                <input type="text" name="hp" placeholder="masukkan no telefon" class="form-control" <?= set_value('hp');?>>
                                <?= form_error('hp', '<small class="text-danger col-md">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Email Dosen</label>
                                <input type="email" name="email" placeholder="masukkan email" class="form-control" <?= set_value('email');?>>
                                <?= form_error('email', '<small class="text-danger col-md">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">  
                            <div class="form-group">
                                <label for="">Password</label>
                                <div class="input-group">
                                    <input type="password" id="password" name="password" placeholder="masukkan password" class="form-control">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <a href="#" class="text-secondary" id="icon-click">
                                                <i class="fas fa-eye" id="icon"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?= form_error('password', '<small class="text-danger col-md">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-md-6">             
                            <div class="form-group">
                                <label for="">Ketik Ulang Password</label>
                                <div class="input-group">
                                    <input type="password" id="password1" name="password1" placeholder="ketik ulang password" class="form-control">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <a href="#" class="text-secondary" id="icon-click1">
                                                <i class="fas fa-eye" id="icon1"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?= form_error('password1', '<small class="text-danger col-md">', '</small>'); ?>
                            </div>  
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">          
                            <div class="form-group">
                                <label for="prodi">Dosen Program Studi</label>
                                    <select name="prodi" class="form-control">
                                        <option value="" selected disabled>Dosen Program Studi</option>
                                        <?php foreach($pr as $p) : ?>
                                        <option value="<?= $p['ID_PRODI']; ?>"><?= $p['NM_PRODI']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('prodi', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-md-6">          
                            <div class="form-group">
                                <label for="prodi">Jabatan</label>
                                    <select name="role" class="form-control">
                                        <option value="" selected disabled>Jabatan</option>
                                        <?php foreach($jb as $j) : ?>
                                        <option value="<?= $j['id_role']; ?>"><?= $j['role']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('role', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--MODAL EDIT role!-->
<?php foreach ($ds as $d) :
    $id_u = $d['id_user'];
    $id_ds = $d['ID_DS'];
    $nip = $d['NIP_DS'];
    $nama = $d['NAMA_DS'];
    $jk = $d['JK_DS'];
    $alamat = $d['ALAMAT_DS'];
    $hp = $d['HP_DS'];
    $email =  $d['email'];
    $id_pr=$d['ID_PRODI'];
    $prodi = $d['NM_PRODI'];
    $id_r = $d['id_role'];
    $role = $d['role'];
    $img = $d['image'];
    $status = $d['is_active'];
?>

<div class="modal fade" id="modal_edit<?= $id_ds; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title title-1" id="myModalLabel">Detail Data</h3>
            </div>
            <?= form_open_multipart('Dosbing/edit_dosbing'); ?>
                <div class="modal-body">
                    <div class="form-group" hidden>
                        <label class="control-label col-xs-3">ID menu</label>
                        <div class="col-xs-8">
                            <input name="id_u" value="<?= $id_u; ?>" class="form-control" type="text" placeholder="ID menu">
                            <input name="id_ds" value="<?= $id_ds; ?>" class="form-control" type="text" placeholder="ID menu">
                        </div>
                    </div>
                    <div class="text-center">
                        <img class="img-fluid" width="200px" src="<?= base_url() . 'assets/dist/img/user/' . $img; ?>">
                    </div>
                    <br>
                    <div class="text-center">
                        This Account was :
                        <?php if($status == 1): ?>
                            <span class="badge badge-success">Activated</span>
                        <?php else : ?>
                            <span class="badge badge-danger">Disabled</span>
                        <?php endif; ?>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">NIP</label>
                                <input type="text" class="form-control" id="nip" name="nip" value="<?=$nip;?>" placeholder="masukkan NIP" <?= set_value('nip');?> disabled>
                                <?= form_error('nip', '<small class="text-danger col-md">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Dosen</label>
                                <input type="text" class="form-control" id="nm-ds" name="nama" value="<?=$nama;?>" placeholder="nama dosen" <?= set_value('nama');?> disabled>
                                <?= form_error('nama', '<small class="text-danger col-md">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"> Jenis Kelamin</label>
                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <label>
                                            <input type="radio" name="jk" id="jk-ds" value="Laki-laki" <?php if($jk=='Laki-laki') echo 'checked'?> disabled>
                                        Laki-laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label>
                                            <input type="radio" name="jk" id="jk-ds" value="Perempuan" <?php if($jk=='Perempuan') echo 'checked'?> disabled>
                                        Perempuan</label>
                                    </div>
                                </div>
                                <?= form_error('jk', '<small class="text-danger col-md">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Alamat Dosen</label>
                                <input type="text" id="almt-ds" name="alamat" value="<?=$alamat;?>" placeholder="alamat dosen" class="form-control" <?= set_value('alamat');?> disabled>
                                <?= form_error('alamat', '<small class="text-danger col-md">', '</small>'); ?>
                            </div>  
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Nomor Telefon</label>
                                <input type="text" id="hp-ds" name="hp" value="<?=$hp;?>" placeholder="masukkan no telefon" class="form-control" <?= set_value('hp');?> disabled>
                                <?= form_error('hp', '<small class="text-danger col-md">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Email Dosen</label>
                                <input type="email" id="email-ds" name="email" value="<?=$email;?>" placeholder="masukkan email" class="form-control" <?= set_value('email');?> disabled>
                                <?= form_error('email', '<small class="text-danger col-md">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">          
                            <div class="form-group">
                                <label for="prodi">Dosen Program Studi</label>
                                    <select name="prodi" id="prodi-ds" class="form-control" disabled>
                                        <option value="" selected disabled>Dosen Program Studi</option>
                                        <option value="<?= $id_pr; ?>" selected><?= $prodi; ?></option>
                                        <?php foreach($pr as $p) : ?>
                                        <option value="<?= $p['ID_PRODI']; ?>"><?= $p['NM_PRODI']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('prodi', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-md-6">          
                            <div class="form-group">
                                <label for="prodi">Jabatan</label>
                                    <select name="role" id="role" class="form-control" disabled>
                                        <option value="" selected disabled>Jabatan</option>
                                        <option value="<?= $id_r; ?>" selected><?= $role; ?></option>
                                        <?php foreach($jb as $j) : ?>
                                        <option value="<?= $j['id_role']; ?>"><?= $j['role']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('role', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="close-btn" class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Batal</button>
                        <button type="button" id="edit-btn" class="btn btn-info">Edit</button>
                        <button type="submit" id="save-btn" class="btn btn-success" hidden>Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!--MODAL HAPUS DATA!-->
<div class="modal fade" id="modal_hapus<?= $id_ds; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Hapus Menu</h3>
            </div>
            <form action="<?= base_url() . 'dosbing/hapus_dosbing'; ?>" method="post" class="form-horizontal">
                <div class="modal-body">
                    <p>Apakah Anda yakin mau menghapus data ini? <b><?= $nama; ?></b></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="nip" value="<?= $nip; ?>">
                    <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Batal</button>
                    <button class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php endforeach; ?>