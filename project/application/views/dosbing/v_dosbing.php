<div class="content">


<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Kedatangan <a class="btn btn-primary" href="<?= base_url() . 'dosbing/tambah'; ?>">
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
              <a class="btn btn-primary" href="<?php echo base_url().'dosbing/edit/'. $tb->ID_DS; ?>"><i class="">EDIT</i></a>
              <a class="btn btn-danger" href="<?php echo base_url().'dosbing/hapus/'. $tb->ID_DS; ?>"><i class="">HAPUS</i></a>
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


            