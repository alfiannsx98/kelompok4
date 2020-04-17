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
                      <?php 
                      foreach ($dosbing as $tb ) { ?>
                        <tr>
                          <td><?=$tb->NIP_DS?></td>
                          <td><?=$tb->NAMA_DS?></td>
                          <td><?=$tb->JK_DS?></td>
                          <td><?=$tb->ALAMAT_DS?></td>
                          <td><?=$tb->HP_DS?></td>
                          <td><?=$tb->EMAIL_DS?></td>
                          <td><?=$tb->PASSWORD_DS?></td>
                          
                          <td>
                            <a class="btn btn-primary btn-xs btn-round" href="<?php echo base_url().'dosen/edit/'. $tb->ID_DS; ?>"><i class="">EDIT</i></a>
                            <a class="btn btn-danger btn-xs btn-round" href="<?php echo base_url().'dosen/hapus/'. $tb->ID_DS; ?>"><i class="">HAPUS</i></a>
                          </td>
                        </tr>
                        <?php $i++; ?>
                      <?php } ?>
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







<div class="content">


<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Kedatangan <a class="btn btn-primary" href="<?= base_url() . 'dosen/tambah'; ?>">
<i class=""></i>TAMBAH +</a></h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Tabel Data DOSEN</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
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
        <?php 
        foreach ($dosbing as $tb ) { ?>
          <tr>
            
            <td><?=$tb->NIP_DS?></td>
            <td><?=$tb->NAMA_DS?></td>
            <td><?=$tb->JK_DS?></td>
            <td><?=$tb->ALAMAT_DS?></td>
            <td><?=$tb->HP_DS?></td>
            <td><?=$tb->EMAIL_DS?></td>
            <td><?=$tb->PASSWORD_DS?></td>
            
            <td>
              <a class="btn btn-primary" href="<?php echo base_url().'dosen/edit/'. $tb->ID_DS; ?>"><i class="">EDIT</i></a>
              <a class="btn btn-danger" href="<?php echo base_url().'dosen/hapus/'. $tb->ID_DS; ?>"><i class="">HAPUS</i></a>
            </td>
          </tr>
        <?php } ?>
          </tbody>
        </table>
        </div>
    </div>
    </div>

</div>
<!-- /.container-fluid -->


            