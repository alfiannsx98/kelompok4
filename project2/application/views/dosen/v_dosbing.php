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
                    <h3 class="card-title"><?= $title ?> Table <a class="btn btn-success" href="<?= base_url() . 'dosen/tambah'; ?>">Add Data <i class="fa fa-plus"></i></a></h3> 
                </div>
            <!-- /.card-header -->
            <div class="card-body">
            <?= $this->session->flashdata('message'); ?>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NIP DOSEN</th>
                            <th>NAMA DOSEN</th>
                            <th>JENIS KELAMIN DOSEN</th>
                            <th>ALAMAT DOSEN</th>
                            <th>HP DOSEN</th>
                            <th>EMAIL DOSEN</th>
                            <th>PASSWORD DOSEN</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($dosbing as $mi) :
                        $id_mi = $mi['ID_DS'];
                        $nip_mi = $mi['NIP_DS'];

                        $qwery = "SELECT * FROM user WHERE identity = $nip_mi"; 
                        $dtu = $this->db->query($qwery)->result_array();
                    ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $mi['NIP_DS']; ?></td>
                            <td><?= $mi['NAMA_DS']; ?></td>
                            <td><?= $mi['JK_DS']; ?></td>
                            <td><?= $mi['ALAMAT_DS']; ?></td>
                            <td><?= $mi['HP_DS']; ?></td>
                            <td><?= $mi['EMAIL_DS']; ?></td>
                            <td><?= $mi['PASSWORD_DS']; ?></td>
                            <?php foreach($dtu as $dtusr): ?>
                                <?php if($dtusr['is_active'] == 1): ?>
                                    <td><span class="badge badge-success">Active</span></td>
                                <?php else : ?>
                                    <td><span class="badge badge-danger">Disabled</span></td>
                                <?php endif; ?>
                            <?php endforeach; ?>
                          <td>
                            <a class="btn btn-primary btn-xs btn-round" href="<?php echo base_url().'dosen/edit/'. $tb->ID_DS; ?>"><i class="">EDIT</i></a>
                            <button class="btn btn-danger btn-xs btn-round" data-toggle="modal" data-target="#modal_hapus<?= $id_mi; ?>">Hapus Akun</button>
                          </td>
                        </tr>
                        <?php $i++; ?>
                      <?php  ?>
                    </tbody>
                    <tfoot>
                        <tr>
                          <th>#</th>
                          <th>NIP DOSEN</th>
                          <th>NAMA DOSEN</th>
                          <th>JENIS KELAMIN DOSEN</th>
                          <th>ALAMAT DOSEN</th>
                          <th>HP DOSEN</th>
                          <th>EMAIL DOSEN</th>
                          <th>PASSWORD DOSEN</th>
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

<<!--MODAL HAPUS DATA!-->
<div class="modal fade" id="modal_hapus<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Hapus Menu</h3>
            </div>
            <form action="<?= base_url() . 'dosen/hapus'; ?>" method="post" class="form-horizontal">
                <div class="modal-body">
                    <p>Apakah Anda yakin mau menghapus data ini? <b><?= $NAMA_DS; ?></b></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="ID_DS" value="<?= $id; ?>">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php endforeach; ?>



            