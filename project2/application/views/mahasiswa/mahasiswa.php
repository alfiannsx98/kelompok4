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
                        <th>NIM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Jenis Kelamin</th>
                        <th>Email Mahasiswa</th>
                        <th>Program Studi</th>
                        <th>Ketua</th>
                        <th>Status</th>
                        <th class="disabled-sorting text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($mhs as $m) :
                        $id = $m['ID_M'];
                        $nim = $m['NIM'];
                        $nama = $m['NAMA_M'];
                        $jk = $m['JK_M'];
                        $alamat = $m['ALAMAT_M'];
                        $hp = $m['HP_M'];
                        $email =  $m['email'];
                        $prodi = $m['NM_PRODI'];
                        $semester = $m['SMT'];
                        $ketua = $m['ST_KETUA'];
                        $status = $m['is_active'];
                        $img = $m['image'];
                    ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <!-- <td><?= $id; ?></td> -->
                            <td><?= $nim; ?></td>
                            <td><?= $nama; ?></td>
                            <td><?= $jk; ?></td>
                            <td><?= $email; ?></td>
                            <td><?= $prodi; ?></td>
                            <?php if($ketua == 1){ ?>
                                <td><span class="badge badge-info">Ketua PKL</span></td>
                            <?php } else { ?>
                                <td><span class="badge badge-secondary">--</span></td>
                            <?php } ?>
                            <?php if($status == 1): ?>
                                <td><span class="badge badge-success">Activated</span></td>
                            <?php else : ?>
                                <td><span class="badge badge-danger">Disabled</span></td>
                            <?php endif; ?>
                            <td class="text-right">
                                <button type="button" id="detail-btn" class="btn btn-info btn-xs btn-round" data-toggle="modal" data-target="#modal_edit<?= $id; ?>">Detail</button>
                                <button class="btn btn-danger btn-xs btn-round" data-toggle="modal" data-target="#modal_hapus<?= $id; ?>">Hapus Data</button>
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
                        <th>Jenis Kelamin</th>
                        <th>Email Mahasiswa</th>
                        <th>Program Studi</th>
                        <th>Ketua</th>
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
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newroleModal">Tambah Data</h5>
                </button>   
            </div>
            <form action="Mahasiswa" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">NIM</label>
                                <input type="text" class="form-control" name="nim" placeholder="masukkan NIM" <?= set_value('nim');?>>
                                <?= form_error('nim', '<small class="text-danger col-md">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Nama Mahasiswa</label>
                                <input type="text" class="form-control" name="nama" placeholder="nama mahasiswa" <?= set_value('nama');?>>
                                <?= form_error('nama', '<small class="text-danger col-md">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">          
                            <div class="form-group">
                                <label for="prodi">Program Studi</label>
                                    <select name="prodi" id="prodi" class="form-control">
                                        <option value="" selected disabled>Pilih Program Studi</option>
                                        <?php foreach($pr as $p) : ?>
                                        <option value="<?= $p['ID_PRODI']; ?>"><?= $p['NM_PRODI']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('prodi', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--MODAL EDIT role!-->
<?php foreach ($mhs as $m) :
    $id_u = $m['id_user'];
    $id = $m['ID_M'];
    $nim = $m['NIM'];
    $nama = $m['NAMA_M'];
    $jk = $m['JK_M'];
    $alamat = $m['ALAMAT_M'];
    $hp = $m['HP_M'];
    $email =  $m['email'];
    $id_pr = $m['ID_PRODI'];
    $prodi = $m['NM_PRODI'];
    $semester = $m['SMT'];
    $ketua = $m['ST_KETUA'];
    $status = $m['is_active'];
    $img = $m['image'];
?>
<div class="modal fade" id="modal_edit<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
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
                    <div class="text-center">
                        <?php if($ketua == 1): ?>
                            <span class="badge badge-info">Ketua PKL</span>
                        <?php else : ?>
                           
                        <?php endif; ?>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">NIM</label>
                                <input type="text" class="form-control" id="nim" name="nim" value="<?=$nim;?>" placeholder="masukkan NIM" <?= set_value('nip');?> disabled>
                                <?= form_error('nim', '<small class="text-danger col-md">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Mahasiswa</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?=$nama;?>" placeholder="nama mahasiswa" <?= set_value('nama');?> disabled>
                                <?= form_error('nama', '<small class="text-danger col-md">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"> Jenis Kelamin</label>
                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <label>
                                            <input type="radio" name="jk" id="jk" value="Laki-laki" <?php if($jk=='Laki-laki') echo 'checked'?> disabled>
                                        Laki-laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label>
                                            <input type="radio" name="jk" id="jk" value="Perempuan" <?php if($jk=='Perempuan') echo 'checked'?> disabled>
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
                                <label for="">Alamat Mahasiswa</label>
                                <input type="text" id="alamat" name="alamat" value="<?=$alamat;?>" placeholder="alamat mahasiswa" class="form-control" <?= set_value('alamat');?> disabled>
                                <?= form_error('alamat', '<small class="text-danger col-md">', '</small>'); ?>
                            </div>  
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Nomor Telfon</label>
                                <input type="text" id="hp" name="hp" value="<?=$hp;?>" placeholder="masukkan no telefon" class="form-control" <?= set_value('hp');?> disabled>
                                <?= form_error('hp', '<small class="text-danger col-md">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Email Mahasiswa</label>
                                <input type="email" id="email" name="email" value="<?=$email;?>" placeholder="masukkan email" class="form-control" <?= set_value('email');?> disabled>
                                <?= form_error('email', '<small class="text-danger col-md">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">          
                            <div class="form-group">
                                <label for="prodi">Program Studi</label>
                                    <select name="prodi" id="prodi" class="form-control" disabled>
                                        <option value="" selected disabled>Pilih Program Studi</option>
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
                                <label for="prodi">Semester</label>
                                    <select name="semester" id="semester" class="form-control" disabled>
                                        <option value="" selected disabled>Pilih Semester</option>
                                        <option value="<?= $semester; ?>" selected><?= $semester; ?></option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                    </select>
                                    <?= form_error('semester', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="close-btn" class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Batal</button>
                        <button type="button" id="edit-btn" class="btn btn-info">Edit</button>
                        <button type="submit" id="save-btn" class="btn btn-info" hidden>Simpan</button>
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
                <h3 class="modal-title" id="myModalLabel">Hapus Data</h3>
            </div>
            <form action="<?= base_url() . 'Mahasiswa/hapus_mahasiswa'; ?>" method="post" class="form-horizontal">
                <div class="modal-body">
                    <p>Apakah Anda yakin mau menghapus data ini? <b><?= $nama; ?></b></p>
                </div>
                <div class="modal-footer">
                    <input  name="nim" value="<?= $nim; ?>" hidden>
                    <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Batal</button>
                    <button class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php endforeach; ?>
