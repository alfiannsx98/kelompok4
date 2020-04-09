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
                                    <h4 class="card-title">Table <?= $title; ?></h4> 
                                    <!-- <button data-toggle="modal" data-target="#newroleModal" class="btn btn-just-icon btn-round btn-success">Add Data<i class="fa fa-plus"></i></button> -->
                                    <?= $this->session->flashdata('message'); ?>
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                    </div>
                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>ID</th>
                                                    <th>NIM</th>
                                                    <th>Nama Mahasiswa</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Programstudi</th>
                                                    <th>Semester</th>
                                                    <th>Alamat</th>
                                                    <th>No HP</th>
                                                    <th>Email</th>
                                                    <th>Status Akun</th>
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                <th>#</th>
                                                    <th>ID</th>
                                                    <th>NIM</th>
                                                    <th>Nama Mahasiswa</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Programstudi</th>
                                                    <th>Semester</th>
                                                    <th>Alamat</th>
                                                    <th>No HP</th>
                                                    <th>Email</th>
                                                    <th>Status Akun</th>
                                                    <th class="text-right">Actions</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($mhs as $m) :
                                                $id = $m['ID_M'];
                                                $nim = $m['NIM'];
                                                $nama = $m['NAMA_M'];
                                                $jk = $m['JK_M'];
                                                $prodi = $m['PRODI_M'];
                                                $semester = $m['SMT'];
                                                $alamat = $m['ALAMAT_M'];
                                                $nohp = $m['HP_M'];
                                                $email = $m['EMAIL_M'];
                                                $aktif = $m['is_active'];
                                            ?>
                                                <tr>
                                                    <td><?= $i; ?></td>
                                                    <td><?= $id; ?></td>
                                                    <td><?= $nim; ?></td>
                                                    <td><?= $nama; ?></td>
                                                    <td><?= $jk; ?></td>
                                                    <td><?= $prodi; ?></td>
                                                    <td><?= $semester; ?></td>
                                                    <td><?= $alamat; ?></td>
                                                    <td><?= $nohp; ?></td>
                                                    <td><?= $email; ?></td>
                                                    <td>
                                                        <?php if($aktif == 0) : ?>
                                                            <span class="btn btn-danger btn-xs btn-round">Belum Aktif</span>
                                                        <?php else : ?>
                                                            <span class="btn btn-success btn-xs btn-round">Aktif</span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <a class="btn btn-simple btn-info btn-icon" data-toggle="modal" data-target="#modal_edit<?= $id; ?>"><i class="material-icons">info</i></a>
                                                        <a class="btn btn-simple btn-danger btn-icon" data-toggle="modal" data-target="#modal_hapus<?= $id; ?>"><i class="material-icons">remove_circle</i></a>
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

<!-- Modal Untuk Menampilkan Info -->
<?php
foreach ($mhs as $m) :
    $id = $m['ID_M'];
    $nim = $m['NIM'];
    $nama = $m['NAMA_M'];
    $jk = $m['JK_M'];
    $prodi = $m['PRODI_M'];
    $semester = $m['SMT'];
    $alamat = $m['ALAMAT_M'];
    $nohp = $m['HP_M'];
    $email = $m['EMAIL_M'];
    $aktif = $m['is_active'];
    $foto = $m['image'];
?>

<div class="modal fade" id="modal_edit<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Detail data</h3>
            </div>
            <form action="<?= base_url('Mahasiswa/lihat_mahasiswa'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group label-floating">
                        <input type="hidden" name="id_mhs" id="id_mhs" value="<?= $id; ?>">
                    </div>
                    <div class="picture text-center">
                        <?php if($foto == 'default.jpg'):?>
                            <img src="<?php echo base_url(); ?>image/mahasiswa/default.jpg" class="" id="wizardPicturePreview" title="" />
                        <?php else:?>
                            <img src="<?php echo base_url(); ?>image/mahasiswa/<?php echo $foto; ?>" class="picture-src" id="wizardPicturePreview" title="" />
                        <?php endif;?>        
                    </div>
                    <div class="form-group text-center">
                        <label for=""><h3>Status Akun</h3></label>
                        <div>
                            <?php if($aktif == 0) : ?>
                                <span class="btn btn-danger btn-s btn-round">Belum Aktif</span>
                            <?php else : ?>
                                <span class="btn btn-success btn-s btn-round">Aktif</span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group label-floating">
                            <label for="">Nama Mahasiswa</label>
                            <input type="text" class="form-control" name="nama" value="<?= $nama; ?>" placeholder="" readonly>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group label-floating">
                            <label for="">NIM</label>
                            <input type="text" class="form-control" name="nim" value="<?= $nim; ?>" placeholder="" readonly>
                        </div>
                    </div>
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group label-floating">
                            <label for="">Jenis Kelamin</label>
                            <input type="text" class="form-control" name="jk" value="<?= $jk; ?>" placeholder="" readonly>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group label-floating">
                            <label for="">Programstudi</label>
                            <input type="text" class="form-control" name="prodi" value="<?= $prodi; ?>" placeholder="" readonly>
                        </div>
                    </div>
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group label-floating">
                            <label for="">Semester</label>
                            <input type="text" class="form-control" name="semester" value="<?= $semester; ?>" placeholder="" readonly>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group label-floating">
                            <label for="">Alamat</label>
                            <input type="text" class="form-control" name="alamat" value="<?= $alamat; ?>" placeholder="" readonly>
                        </div>
                    </div>
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group label-floating">
                            <label for="">No HP</label>
                            <input type="text" class="form-control" name="nohp" value="<?= $nohp; ?>" placeholder="" readonly>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group label-floating">
                            <label for="">Email</label>
                            <input type="text" class="form-control" name="email" value="<?= $email; ?>" placeholder="" readonly>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
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
            <form action="<?= base_url() . 'Mahasiswa/hapus_mahasiswa'; ?>" method="post" class="form-horizontal">
                <div class="modal-body">
                    <p>Apakah Anda yakin mau menghapus data ini? <b><?= $title; ?></b></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="email_mhs" value="<?= $email; ?>">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php endforeach; ?>