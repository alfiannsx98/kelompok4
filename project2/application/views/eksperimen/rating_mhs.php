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


 <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->


<!-- SQL Query untuk validasi Pendaftaran -->
<?php
   $id_user = $user['identity'];
   $moto = $user['about'];

   // get id_pnd dari pendaftaran_klp
   $id_pnd = $this->db->get_where("pendaftaran_klp", ['ID_M' => $id_user])->row_array(); 
   $id_pendaftar = $id_pnd['ID_PND'];

   // get id_pendaftaran dari tb pendaftaran
   $id_pendaftaran = $this->db->get_where("pendaftaran", ['ID_PND' => $id_pendaftar])->row_array();
   $id_pr = $id_pendaftaran['ID_PR'];

   // get perusahaan dari tb perusahaan
   $perusahaan = $this->db->get_where("perusahaan", ["ID_PR" => $id_pr])->row_array();
   $nm_perusahaan = $perusahaan['NAMA_PR'];
   $gmbr_perusahaan = $perusahaan['gambar'];
   $alamat_pr = $perusahaan['ALAMAT_PR'];
   $email_pr = $perusahaan['EMAIL_PR'];
   $hp_pr = $perusahaan['HP_PR'];


   $dt = [
      'id_perusahaan' => $id_pr
   ];

   $masuk_dt = $this->session->set_userdata($dt);
   

   // get data_siswa dari mahasiswa
   $mhs = $this->db->get_where("mahasiswa", ["ID_M" => $id_user])->row_array();
   $id_prodi = $mhs['ID_PRODI'];
   $prodi = $this->db->get_where("prodi", ["ID_PRODI" => $id_prodi])->row_array();
   $nama = $mhs['NAMA_M'];
   $prodi_mhs = $prodi['NM_PRODI'];
   $alamat = $mhs['ALAMAT_M'];
   $no_hp = $mhs['HP_M'];
   
   // Hitung total row sudah mengisi kuisioner/rating

   $q_hitung = $this->db->get_where("rating1", ["id_pr" => $id_pr])->num_rows();
   $row_kuisioner = $q_hitung;
?>
<!-- Akhir SQL Query -->

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid"
                       src="<?= base_url() . "assets/dist/img/perusahaan/" . $gmbr_perusahaan; ?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?= $nm_perusahaan; ?></h3>

                <p class="text-muted text-center"><?= $alamat_pr; ?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right"><?= $email_pr; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>HP PR</b> <a class="float-right"><?= $hp_pr; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Rating</b> <a class="float-right">4,5</a>
                  </li>
                </ul>
                <a href="#" class="btn btn-primary btn-block"><b>Cek Detail Perusahaan</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tentang Saya</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Program Studi</strong>

                <p class="text-muted">
                  <?= $prodi_mhs; ?>
                </p>

                <hr>

                <strong><i class="fas fa-user-alt mr-1"></i> Nama Mahasiswa</strong>

                <p class="text-muted"><?= $nama; ?></p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat Mahasiswa</strong>

                <p class="text-muted">
                   <?= $alamat; ?>
                </p>

                <hr>

                <strong><i class="fas fa-phone-alt mr-1"></i> Nomor HP Mahasiswa</strong>

                <p class="text-muted">
                   <?= $no_hp; ?>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Motto</strong>

                <p class="text-muted"><?= $moto; ?></p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-body">
               <div class="tab-content">
                  <div id="smartwizard">
                     <ul class="nav">
                        <li>
                              <a class="nav-link" href="#step-1">
                                 Home
                              </a>
                        </li>
                        <li>
                              <a class="nav-link" href="#step-2">
                                 Form Kuisioner
                              </a>
                        </li>
                        <li>
                              <a class="nav-link" href="#step-3">
                                 Form Rating Perusahaan
                              </a>
                        </li>
                     </ul>
                     <div class="tab-content">
                        <div id="step-1" class="tab-pane" role="tabpanel">
                           <div class="row">
                              <div class="col-md">
                                 <!-- Box Comment -->
                                 <div class="card card-widget">
                                    <div class="card-header">
                                       <div class="user-block">
                                          <img class="img-circle" src="<?= base_url() . "assets/dist/img/perusahaan/" . $gmbr_perusahaan; ?>" alt="User Image">
                                          <span class="username"><a href="#"><?= $nm_perusahaan ?></a></span>
                                          <span class="description"><?= $alamat_pr; ?></span>
                                       </div>
                                    </div>
                                 <!-- /.card-header -->
                                 <div class="card-body">
                                    <img class="img-fluid pad" src="<?= base_url() . "assets/dist/img/perusahaan/" . $gmbr_perusahaan; ?>" alt="Photo">

                                    <p><small class="badge badge-info"><?= $row_kuisioner; ?> Mahasiswa Telah mengisi kuisioner perusahaan ini</small></p>
                                    
                                 </div>
                                 
                                 <!-- /.card-footer -->
                                 </div>
                                 <!-- /.card -->
                              </div>
                           </div>
                        </div>
                        <div id="step-2" class="tab-pane" role="tabpanel">
                           <div class="card card-primary">
                              <div class="card-header">
                                 <h3 class="card-title">Pertanyaan Kuisioner pada perusahaan "<?= $nm_perusahaan; ?>"</h3>
                              </div>
                              <!-- /.card-header -->
                              <!-- form start -->
                              <form role="form">
                                 <div class="card-body">
                                    <div class="form-group">
                                       <label for="opsi1">Penilaian Anda terhadap Pembelajaran di perusahaan <?= $nm_perusahaan; ?></label>
                                       <select name="opsi1" id="" class="custom-select">
                                          <option value="" disabled selected>Silahkan Pilih Pilihan Anda</option>
                                          <?php 
                                             $get_rating = $this->db->get("rating")->result_array();
                                             foreach($get_rating as $rt ) : 
                                          ?>
                                          <option value="<?= $rt["RT"]; ?>"><?= $rt["nama_rating"]; ?></option>
                                          <?php 
                                             endforeach; 
                                          ?>
                                       </select>
                                    </div>
                                    <div class="form-group">
                                       <label for="opsi1">Penilaian Anda terhadap keloyalan di perusahaan <?= $nm_perusahaan; ?></label>
                                       <select name="opsi1" id="" class="custom-select">
                                          <option value="" disabled selected>Silahkan Pilih Pilihan Anda</option>
                                          <?php 
                                             $get_rating = $this->db->get("rating")->result_array();
                                             foreach($get_rating as $rt ) : 
                                          ?>
                                          <option value="<?= $rt["RT"]; ?>"><?= $rt["nama_rating"]; ?></option>
                                          <?php 
                                             endforeach; 
                                          ?>
                                       </select>
                                    </div>
                                    <div class="form-group">
                                       <label for="opsi1">Penilaian Anda Tugas di perusahaan <?= $nm_perusahaan; ?></label>
                                       <select name="opsi1" id="" class="custom-select">
                                          <option value="" disabled selected>Silahkan Pilih Pilihan Anda</option>
                                          <?php 
                                             $get_rating = $this->db->get("rating")->result_array();
                                             foreach($get_rating as $rt ) : 
                                          ?>
                                          <option value="<?= $rt["RT"]; ?>"><?= $rt["nama_rating"]; ?></option>
                                          <?php 
                                             endforeach; 
                                          ?>
                                       </select>
                                    </div>
                                    <div class="form-group">
                                       <label for="opsi1">Penilaian Anda kesesuaian kerja di perusahaan <?= $nm_perusahaan; ?></label>
                                       <select name="opsi1" id="" class="custom-select">
                                          <option value="" disabled selected>Silahkan Pilih Pilihan Anda</option>
                                          <?php 
                                             $get_rating = $this->db->get("rating")->result_array();
                                             foreach($get_rating as $rt ) : 
                                          ?>
                                          <option value="<?= $rt["RT"]; ?>"><?= $rt["nama_rating"]; ?></option>
                                          <?php 
                                             endforeach; 
                                          ?>
                                       </select>
                                    </div>
                                    <div class="form-group">
                                       <label for="opsi1">Penilaian Anda Penempatan di perusahaan <?= $nm_perusahaan; ?></label>
                                       <select name="opsi1" id="" class="custom-select">
                                          <option value="" disabled selected>Silahkan Pilih Pilihan Anda</option>
                                          <?php 
                                             $get_rating = $this->db->get("rating")->result_array();
                                             foreach($get_rating as $rt ) : 
                                          ?>
                                          <option value="<?= $rt["RT"]; ?>"><?= $rt["nama_rating"]; ?></option>
                                          <?php 
                                             endforeach; 
                                          ?>
                                       </select>
                                    </div>
                                 </div>
                                 <!-- /.card-body -->
                              </form>
                           </div>
                        </div>
                        <div id="step-3" class="tab-pane" role="tabpanel">
                           <div class="container">
                                 <div class="card-body">
                                    
                                    <br />
                                    
                                    <span id="business_list"></span>
                                 </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
</div>
</div>

<!-- Main content -->
<!-- <section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card"> 
                <div class="card-header"> 
                    <h3 class="card-title"><?= $title ?> </h3> 
                </div> -->
            <!-- /.card-header -->
            
            <!-- /.card-body -->
            <!-- </div> -->
            <!-- /.card -->
        <!-- </div> -->
    <!-- /.col -->
    <!-- </div> -->
    <!-- /.row -->
<!-- </section> -->
<!-- /.content -->
<!-- </div> -->
<!-- /.content-wrapper -->

<?php
    $this->load->view('templates/footer');
?>
<script>
$(document).ready(function(){

 load_data();

 function load_data()
 {
  $.ajax({
   url:"<?php echo base_url(); ?>rating_mhs/fetch",
   method:"POST",
   success:function(data)
   {
    $('#business_list').html(data);
   }
  })
 }

 $(document).on('mouseenter', '.rating', function(){
  var index = $(this).data('index');
  var id_pr = $(this).data('id_pr');
  remove_background(id_pr);
  for(var count = 1; count <= index; count++)
  {
   $('#'+id_pr+'-'+count).css('color', '#ffcc00');
  }
 });

 function remove_background(id_pr)
 {
  for(var count = 1; count <= 5; count++)
  {
   $('#'+id_pr+'-'+count).css('color', '#ccc');
  }
 }

 $(document).on('click', '.rating', function(){
  var index = $(this).data('index');
  var id_pr = $(this).data('id_pr');
  $.ajax({
   url:"<?php echo base_url(); ?>rating_mhs/insert",
   method:"POST",
   data:{index:index, id_pr:id_pr},
   success:function(data)
   {
    load_data();
    alert("You have rate "+index +" out of 5");
   }
  })
 });

 $(document).on('mouseleave', '.rating', function(){
  var index = $(this).data('index');
  var id_pr = $(this).data('id_pr');
  var rating = $(this).data('rating');
  remove_background(id_pr);
  for(var count = 1; count <= rating; count++)
  {
   $('#'+id_pr+'-'+count).css('color', '#ffcc00');
  }
 });

});
</script>