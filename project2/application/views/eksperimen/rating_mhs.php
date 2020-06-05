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

   $id_perusahaan = $perusahaan['ID_PR'];


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
                    <b>Rating</b>
                    <span id="bintang_"></span> 
                    
                  </li>
                </ul>
                <button data-toggle="modal" data-target="#detailPerusahaan<?= $id_perusahaan; ?>" class="btn btn-primary btn-block"><b>Cek Detail Perusahaan </b><i class="fas fa-search-plus"></i></button>
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
               <div class="tab-content">
                  <di id="smartwizard">
                     <ul class="nav">
                        <li>
                              <a class="nav-link" href="#step-1">
                                 Home
                              </a>
                        </li>
                        <li>
                              <a class="nav-link" href="#step-2">
                                 Form Rating Perusahaan
                              </a>
                        </li>
                        <li>
                              <a class="nav-link" href="#step-3">
                                 Form Kuisioner
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
                                    <?= $this->session->flashdata('message'); ?>
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
                           <span id="business_list">asd</span>
                              <div class="card">
                                 
                                 <br />
                                 
                              </div>
                        </div>
                        <div id="step-3" class="tab-pane" role="tabpanel">
                              <?php
                                 $q_kuis_m = $this->db->get_where('m_kuisioner', ['id_m' => $id_user])->num_rows();
                                 if($q_kuis_m > 0):
                              ?>
                                 <div class="card">
                                    <div class="alert-success small">&nbsp;Data Kuisioner Berhasil Disimpan</div>
                                 </div>
                              <?php
                                 else :
                              ?>
                           <div class="card card-primary">
                              <div class="card-header">
                                 <h3 class="card-title">Pertanyaan Kuisioner pada perusahaan "<?= $nm_perusahaan; ?>"</h3>
                              </div>
                              <!-- /.card-header -->
                              <!-- form start -->
                              <form action="<?= base_url() . 'rating_mhs'; ?>" method="post">
                                 <div class="card-body">
                                       <?php 
                                          $kuisioner = $this->db->query("SELECT * FROM kuisioner");
                                          $i = 1;
                                          foreach($kuisioner->result_array() as $ks) :
                                       ?>
                                       
                                    <div class="form-group">
                                       <input type="text" name="kuisioner<?= $i ?>" value="<?= $ks['id_kuisioner']; ?>" hidden>
                                       <input type="text" name="id_pr" value="<?= $id_perusahaan; ?>" hidden>
                                       <input type="text" name="id_mahasiswa" value="<?= $id_user; ?>" hidden>
                                       <label for="opsi<?= $i ?>"><?= $ks['kuisioner']; ?> <?= $nm_perusahaan; ?></label>
                                       <select name="opsi<?= $i ?>" id="" class="custom-select">
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
                                       <?php
                                          $i++; 
                                          endforeach; 
                                       ?>
                                    <button class="btn btn-success" type="submit">Simpan Data Kuisioner</button>
                                 </div>
                                 <!-- /.card-body -->
                              </form>
                           <?php endif; ?>
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

<div class="modal fade" id="detailPerusahaan<?= $id_perusahaan; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h3 class="modal-title" id="myModalLabel">Detail Perusahaan</h3>
         </div>
         <div class="col-lg">
                <div class="card-header text-muted border-bottom-0">
                  <?= $nm_perusahaan; ?>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b><?= $email_pr; ?></b></h2>
                      <p class="text-muted text-sm"><b>Email: </b> <?= $email_pr; ?> </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span><?= $alamat_pr; ?></li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span><?= $hp_pr; ?></li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="<?= base_url() . "assets/dist/img/perusahaan/" . $gmbr_perusahaan; ?>" alt="" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                  <b>Rating&nbsp;</b>
                    <span id="bintang1_"></span> 
                  </div>
                </div>
              </div>
      </div>
   </div>
</div>