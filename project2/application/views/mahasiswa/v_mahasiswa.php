<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
           
            <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">DataTables</li>
            </ol>
            </div> -->
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="content">


<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Kedatangan <a class="btn btn-primary" href="<?= base_url() . 'mahasiswa/tambah'; ?>">
<i class=""></i>TAMBAH +</a></h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Tabel Data MAHASISWA</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>

            
            <th>NIM</th>
            <th>NAMA MAHASISWA</th>
            <th>JENIS KELAMIN MAHASISWA</th>
            <th>PRODI</th>
            <th>SEMESTER</th>
            <th>ALAMAT MAHASISWA</th>
            <th>HP_MAHASISWA</th>
            <th>EMAIL MAHASISWA</th>
            <th>PASSWORD MAHASISWA</th>
          </tr>
        </thead>
        <tbody>
        <?php 
        foreach ($mahasiswa as $tb ) { ?>
          <tr>
            
            <td><?=$tb->NIM?></td>
            <td><?=$tb->NAMA_M?></td>
            <td><?=$tb->JK_M?></td>
            <td><?=$tb->PRODI_M?></td>
            <td><?=$tb->SMT?></td>
            <td><?=$tb->ALAMAT_M?></td>
            <td><?=$tb->HP_M?></td>
            <td><?=$tb->EMAIL_M?></td>
            <td><?=$tb->PASSWORD_M?></td>
            
            <td>
              <a class="btn btn-primary" href="<?php echo base_url().'mahasiswa/edit/'. $tb->ID_M; ?>"><i class="">EDIT</i></a>
              <a class="btn btn-danger" href="<?php echo base_url().'mahasiswa/hapus/'. $tb->ID_M; ?>"><i class="">HAPUS</i></a>
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