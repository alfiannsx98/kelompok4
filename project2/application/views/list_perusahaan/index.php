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

<section class="content">



<!-- Default box -->
<div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row d-flex align-items-stretch">
          <?php 
            foreach($data->result() as $list_pr) :
        $id_perusahaan = $list_pr->ID_PR;
        $nm_perusahaan = $list_pr->NAMA_PR;
        $gmbr_perusahaan = $list_pr->gambar;
        $alamat_pr = $list_pr->ALAMAT_PR;
        $email_pr = $list_pr->EMAIL_PR;
        $hp_pr = $list_pr->HP_PR;
        ?>
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  <?= $nm_perusahaan;  ?>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b><?= $email_pr; ?></b></h2>
                      <p class="text-muted text-sm"><b>Alamat: </b> <?= $alamat_pr; ?> </p>
                        <ul class="ml-4 mb-0 fa-ul text-muted">
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: <?= $hp_pr; ?></li>
                          <?php
                            $q_count = $this->db->query("SELECT ID_PR FROM pendaftaran WHERE ID_PR='$id_perusahaan'")->num_rows();
                            $status = '';
                            $color = '';
                            $alert = '';

                            if($q_count >= 2)
                            {
                              $status = 'Slot Kelompok Sudah Penuh';
                              $color = 'alert-warning small';
                            }else{
                              $status = 'Slot Kelompok Tersedia';
                              $color = 'alert-success small';
                            }
                            $alert .='<div class="'.$color.'">&nbsp;'.$status.'</div>';
                          ?>
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-check"></i></span><?= $alert; ?></li>
                          <!-- looping untuk keluarin jumlah bintang -->
                          <?php
                            $count_bintang = $this->db->query("SELECT AVG(rating) as rating FROM rating1 WHERE id_pr='$id_perusahaan'")->result_array();
                            $output = '';
                            foreach($count_bintang as $btg) :
                            $color = '';
                            $btg_rating = $btg['rating'];
                            for($count = 1; $count <= 5; $count++){
                                if($count <= $btg_rating)
                                {
                                    $color = 'color:#ffcc00;';
                                }else{
                                    $color = 'color:#ccc;';
                                }
                                $output .='<span title="'.$count.'" data-rating="'.$btg_rating.'" class="float-left" style="'.$color.'">&#9733;</span>';
                            }
                          ?>
                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-star"></i></span><?= $output; ?></li>
                          <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="<?= base_url() . 'assets/dist/img/perusahaan/' . $gmbr_perusahaan; ?>" alt="" class="profile-user-img img-fluid">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <div class="row">
                <div class="col">
                    <?= $pagination; ?>
                </div>
            </div>
          <!-- <nav aria-label="Contacts Page Navigation">
            <ul class="pagination justify-content-center m-0">
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item"><a class="page-link" href="#">5</a></li>
              <li class="page-item"><a class="page-link" href="#">6</a></li>
              <li class="page-item"><a class="page-link" href="#">7</a></li>
              <li class="page-item"><a class="page-link" href="#">8</a></li>
            </ul>
          </nav> -->
        </div>
        <!-- /.card-footer -->
      </div>
<!-- /.card -->

</section>
<!-- /.content -->
</div>