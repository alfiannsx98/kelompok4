<div class="content">
    <div class="container-fluid">
        <div class="row">
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
                                            <a href="<?= base_url('admin/role') ?>" class="text-secondary">More Info</a>
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
                                            <a href="#" class="text-secondary">More Info</a>
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
                                            <a href="#" class="text-secondary">More Info</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header card-header-icon" data-background-color="blue">
                                            <i class="material-icons">bar_chart</i>
                                        </div>
                                        <div class="card-content">
                                            <h4 class="card-title">Grafik Pendaftar
                                                <small><?= date('Y'); ?></small>
                                            </h4>
                                        </div>
                                        <div id="colouredBarsChart" class="ct-chart">
                                            <canvas id="dataMhs" style="height:250px"></canvas>
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

    <script src="<?= base_url(); ?>assets/js/chart.js"></script>

    <script>
        $(function() {
            //get the bar chart canvas
            var cData = JSON.parse(`<?php echo $chart_data; ?>`);
            var ctx = $("#dataMhs");

            //bar chart data
            var data = {
                labels: cData.label,
                datasets: [{
                    label: cData.label,
                    data: cData.data,
                    backgroundColor: [
                        "#DEB887",
                        "#A9A9A9",
                        "#DC143C",
                        "#F4A460",
                        "#2E8B57",
                        "#1D7A46",
                        "#CDA776",
                        "#CDA776",
                        "#989898",
                        "#CB252B",
                        "#E39371",
                    ],
                    borderColor: [
                        "#CDA776",
                        "#989898",
                        "#CB252B",
                        "#E39371",
                        "#1D7A46",
                        "#F4A460",
                        "#CDA776",
                        "#DEB887",
                        "#A9A9A9",
                        "#DC143C",
                        "#F4A460",
                        "#2E8B57",
                    ],
                    borderWidth: [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1]
                }]
            };

            //options
            var options = {
                responsive: true,
                title: {
                    display: true,
                    position: "top",
                    text: "Monthly Registered Users Count",
                    fontSize: 18,
                    fontColor: "#111"
                },
                legend: {
                    display: true,
                    position: "bottom",
                    labels: {
                        fontColor: "#333",
                        fontSize: 16
                    }
                }
            };

            //create bar Chart class object
            var chart1 = new Chart(ctx, {
                type: "bar",
                data: data,
                options: options
            });

        });
    </script>