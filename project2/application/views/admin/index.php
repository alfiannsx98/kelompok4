<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <!-- <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div>/.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="alert alert-success m-3 text-center text-bold" role="alert">
        Selamat Datang <?= $user['email']; ?>, Anda login sebagai
        <?php if ($user['role_id'] == 1) {
            echo '<b>Admin</b>';
        }

        ?>
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= $jml_dosen; ?></h3>

                            <p>Lecturer</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= $jml_perusahaan; ?></h3>

                            <p>Company</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?= $jml_aktif; ?></h3>

                            <p>Active User</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?= $jml_admin; ?></h3>

                            <p>Admin</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <!-- Main content -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-6 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Grafik User Pendaftar
                            </h3>
                            <!-- <div class="card-tools">
                                    <ul class="nav nav-pills ml-auto">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                                        </li>
                                    </ul>
                                </div> -->
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <!-- Morris chart - Sales -->
                                <div class="chart tab-pane active" id="dataMhs" style="position: relative; height: 300px;">
                                    <canvas id="dataMhs" height="300" style="height: 300px;"></canvas>
                                </div>
                                <!-- <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                                        <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                                    </div> -->
                            </div>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>
                <section class="col-lg-6 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Grafik Prodi
                            </h3>
                            <!-- <div class="card-tools">
                                    <ul class="nav nav-pills ml-auto">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                                        </li>
                                    </ul>
                                </div> -->
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <!-- Morris chart - Sales -->
                                <!-- <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                                        <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                                    </div> -->
                                <div class="chart tab-pane" id="dataPrd" style="position: relative; height: 300px;">
                                    <canvas id="dataPrd" height="300" style="height: 300px;"></canvas>
                                </div>
                            </div>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!-- Modal Info User -->
<div class="modal fade jumbotron-fluid" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title text-center">View Data</h5>
                <button type="button" class="text-right close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
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
                                                            <td style="width: 200px"><?= $id; ?></td>
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