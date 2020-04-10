<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="alert alert-primary text-center text-bold" role="alert">
                Selamat Datang <?= $user['email']; ?>, Anda login sebagai
                <?php if ($user['role_id'] == 1) {
                    echo '<b>Admin</b>';
                }

                ?>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="green">
                        <i class="material-icons">language</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Dashboard</h4>
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="card card-stats">
                                    <div class="card-header" data-background-color="orange">
                                        <i class="material-icons">person</i>
                                    </div>
                                    <div class="card-content">
                                        <p class="category">Lecturer</p>
                                        <h3 class="card-title"><?= $jml_dosen; ?></h3>
                                    </div>
                                    <div class="card-footer">
                                        <div class="stats">
                                            <i class="material-icons">info</i>
                                            <a href="<?= base_url('dosbing') ?>" class="text-secondary">More Info</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="card card-stats">
                                    <div class="card-header" data-background-color="rose">
                                        <i class="material-icons">group</i>
                                    </div>
                                    <div class="card-content">
                                        <p class="category">Active User</p>
                                        <h3 class="card-title"><?php echo $jml_aktif; ?></h3>
                                    </div>
                                    <div class="card-footer">
                                        <div class="stats">
                                            <i class="material-icons">info</i>
                                            <a href="#" class="text-secondary" data-toggle="modal" data-target="#exampleModal">More Info</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="card card-stats">
                                    <div class="card-header" data-background-color="green">
                                        <i class="material-icons">domain</i>
                                    </div>
                                    <div class="card-content">
                                        <p class="category">Company</p>
                                        <h3 class="card-title"><?= $jml_perusahaan; ?></h3>
                                    </div>
                                    <div class="card-footer">
                                        <div class="stats">
                                            <i class="material-icons">info</i>
                                            <a href="#" class="text-secondary">More Info</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="card card-stats">
                                    <div class="card-header" data-background-color="blue">
                                        <i class="material-icons">local_library</i>
                                    </div>
                                    <div class="card-content">
                                        <p class="category">Admin</p>
                                        <h3 class="card-title"><?= $jml_admin; ?></h3>
                                    </div>
                                    <div class="card-footer">
                                        <div class="stats">
                                            <i class="material-icons">info</i>
                                            <a href="<?= base_url('dosen/admin_prodi') ?>" class="text-secondary">More Info</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="card">
                                        <div class="card-header card-header-icon" data-background-color="blue">
                                            <i class="material-icons">bar_chart</i>
                                        </div>
                                        <div class="card-content">
                                            <h4 class="card-title">Grafik User Pendaftar
                                                <small><?= date('Y'); ?></small>
                                            </h4>
                                        </div>
                                        <div id="colouredBarsChart" class="ct-chart">
                                            <canvas id="dataMhs" style="height:250px"></canvas>
                                        </div>
                                        <div class="card-footer">
                                            <h6>KET:</h6>
                                            <i class="fa fa-circle text-info"></i> Data tersebut merupakan data pendaftar dari setiap bulan pada tahun <?= date('Y'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="card">
                                        <div class="card-header card-header-icon" data-background-color="red">
                                            <i class="material-icons">pie_chart</i>
                                        </div>
                                        <div class="card-content">
                                            <h4 class="card-title">Grafik Mahasiswa per Prodi
                                                <small><?= date('Y'); ?></small></h4>
                                        </div>
                                        <div id="chartPreferences" class="ct-chart">
                                            <canvas id="dataPrd" style="height:250px"></canvas>
                                        </div>
                                        <div class="card-footer">
                                            <h6>KET:</h6>
                                            <i class="fa fa-circle text-info"></i> Data tersebut adalah grafik data prodi pada tahun <?= date('Y'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Info User -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <!-- <button type="button" class="text-right close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                    <h5 class="modal-title pb-10 text-center">View Data</h5>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header card-header-icon" data-background-color="purple">
                                        <i class="material-icons">assignment</i>
                                    </div>
                                    <div class="card-content">
                                        <h4 class="card-title">Table <?= $title1; ?></h4>
                                        <div class="toolbar">
                                        </div>
                                        <div class="material-datatables">
                                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>ID USER</th>
                                                        <th>NAMA</th>
                                                        <th>EMAIL</th>
                                                        <th>ROLE</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>ID USER</th>
                                                        <th>NAMA</th>
                                                        <th>EMAIL</th>
                                                        <th>ROLE</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    <?php
                                                    if (is_array($aktif)) {
                                                        foreach ($aktif as $a) :
                                                            $id = $a['id_user'];
                                                    ?>
                                                            <tr>
                                                                <td><?= $i; ?></td>
                                                                <td style="width: 50px"><?= $id; ?></td>
                                                                <td><?= $a['nama']; ?></td>
                                                                <td><?= $a['email']; ?></td>
                                                                <td><?php
                                                                    if ($a['role_id'] == 2) {
                                                                        echo '<span class="badge badge-pill badge-success">Mahasiswa</span>';
                                                                    } elseif ($a['role_id'] == 3) {
                                                                        echo '<span class="badge badge-pill badge-info">Dosen</span>';
                                                                    } elseif ($a['role_id'] == 4) {
                                                                        echo '<span class="badge badge-pill badge-warning">Dosen Pengampu</span>';
                                                                    } elseif ($a['role_id'] == 5) {
                                                                        echo '<span class="badge badge-pill badge-danger">Admin Prodi</span>';
                                                                    } else {
                                                                        echo '<span class="badge badge-pill badge-primary">Admin</span>';
                                                                    } ?></td>
                                                            </tr>
                                                            <?php $i++; ?>
                                                        <?php endforeach; ?>
                                                    <?php } ?>
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
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

<script type="text/javascript">
    var ctx = document.getElementById('dataMhs').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [{
                label: 'Data Pendaftar per Bulan',
                backgroundColor: [
                    'rgba(255, 99, 132,0.6)',
                    'rgba(54, 162, 235,0.6)',
                    'rgba(75, 192, 192,0.6)',
                    'rgba(153, 102, 255,0.6)',
                    'rgba(255, 206, 86,0.6)',
                    'rgba(230, 196, 16,0.6)',
                    'rgba(18, 252, 90,0.6)',
                    'rgba(60, 54, 72,0.6)',
                    'rgba(255, 99, 132,0.6)',
                    'rgba(54, 162, 235,0.6)',
                    'rgba(75, 192, 192,0.6)',
                    'rgba(153, 102, 255,0.6)'
                ],
                borderColor: 'rgb(255, 99, 132)',
                hoverBorderWidth: '3',
                hoverBorderColor: '#000',
                data: [0, 10, 5, 2, 20, 30, 45, 20, 35, 12, 5, 0]
            }]
        },

        // Configuration options go here
        options: {}
    });

    var ctx = document.getElementById('dataPrd').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'doughnut',

        // The data for our dataset
        data: {
            labels: ['TKK', 'MIF', 'TIF'],
            datasets: [{
                label: 'Data MHS Prodi',
                backgroundColor: [
                    'rgba(60, 54, 72,0.6)',
                    'rgba(230, 196, 16,0.6)',
                    'rgba(54, 162, 235,0.6)'
                ],
                borderColor: 'rgb(255, 99, 132)',
                hoverBorderWidth: '3',
                hoverBorderColor: '#000',
                data: [5, 7, 25]
            }]
        },

        // Configuration options go here
        options: {}
    });
</script>