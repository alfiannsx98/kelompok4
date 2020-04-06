<!doctype html>
<html lang="en">


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/tables/extended.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:33:58 GMT -->
<head>
    <?php $this->load->view("templates/header.php"); ?>
</head>

<body>
        <?php $this->load->view("templates/sidebar.php"); ?>
        <div class="main-panel">
            <?php $this->load->view("templates/navbar.php");?>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <h4 class="card-title">Simple Table</h4>
                                <div class="card-content">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No.</th>
                                                    <th> Tempat PKL </th>
                                                    <th> Dosen </th>
                                                    <th class="text-right">Actions</th>
                                                </tr>
                                            </thead>
                                            <?php $nomor=1;?>
                                            <?php foreach($pendaftaran as $pnd){ ?>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center"><?= $nomor++; ?></td>
                                                    <td><?php echo $pnd->NAMA_PR; ?></td>
                                                    <td><?php echo $pnd->NAMA_DS; ?></td>
                                                    <td class="td-actions text-right">
                                                    <?php echo anchor('pendaftaran/tampil_detail/'.$pnd->ID_PND,'<button type="button" rel="tooltip" class="btn btn-info btn-simple">
                                                            <i class="material-icons">person</i>
                                                        </button>'); ?>
                                                        
                                                        <button type="button" rel="tooltip" class="btn btn-success btn-simple">
                                                            <i class="material-icons">edit</i>
                                                        </button>
                                                        <button type="button" rel="tooltip" class="btn btn-danger btn-simple">
                                                            <i class="material-icons">close</i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <?php } ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
            <?php $this->load->view("templates/footer.php"); ?>