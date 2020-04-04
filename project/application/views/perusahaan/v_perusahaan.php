<!-- Begin Page Content -->
<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="purple">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Table <?= $title; ?></h4> <button data-toggle="modal" data-target="#newroleModal" class="btn btn-just-icon btn-round btn-success">Add Data<i class="fa fa-plus"></i></button>
                                    <!-- $this->session->flashdata('message'); -->
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                    </div>
                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nama Perusahaan</th>
                                                    <th>Alamat Perusahaan</th>
                                                    <th>No Telefon</th>
                                                    <th>Email Perusahaan</th>
                                                    <th>Rating</th>
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nama Perusahaan</th>
                                                    <th>Alamat Perusahaan</th>
                                                    <th>No Telefon</th>
                                                    <th>Email Perusahaan</th>
                                                    <th>Rating</th>
                                                    <th class="text-right">Actions</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($pt as $p) :
                                                $id = $p['ID_PR'];
                                                $nama = $p['NAMA_PR'];
                                                $alamat = $p['ALAMAT_PR'];
                                                $hp = $p['HP_PR'];
                                                $email = $p['EMAIL_PR'];
                                                $rating = $p['RATING'];
                                            ?>
                                                <tr>
                                                    <td><?= $i; ?></td>
                                                    <td><?= $nama; ?></td>
                                                    <td><?= $alamat; ?></td>
                                                    <td><?= $hp; ?></td>
                                                    <td><?= $email; ?></td>
                                                    <td><?= $rating; ?></td>
                                                    <td class="text-right">
                                                        <a class="btn btn-simple btn-info btn-icon" data-toggle="modal" data-target="#modal_edit<?= $id; ?>"><i class="material-icons">create</i></a>
                                                        <a class="btn btn-simple btn-danger btn-icon" data-toggle="modal" data-target="#modal_hapus<?= $id; ?>"><i class="material-icons">remove_circle</i></a>
                                                    </td>
                                                </tr>
                                                <?php $i++; ?>
                                            <?php endforeach; ?>
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
                </div>
            </div>
        
<!-- Pembataas -->


<!-- Akhir Pembatas -->

<!--MODAL DIALOG UNTUK CREATE DATA!-->
<div class="modal fade" id="newroleModal" tabindex="-1" role="dialog" aria-labelledby="newroleModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newroleModal">Create New Data</h5>
                </button>   
            </div>
            <form action="<?= base_url('menu/submenu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama Perusahaan</label>
                        <input type="text" class="form-control" name="nama" placeholder="nama perusahaan">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat Perusahaan</label>
                        <input type="text" name="alamat" placeholder="alamat perusahaan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">No Telefon</label>
                        <input type="text" name="nohp" placeholder="masukkan no telefon" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Email Perusahaan</label>
                        <input type="text" name="email" placeholder="masukkan email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Rating</label>
                        <select class="form-control" name="rating" id="rating">
                            <option value="Bintang 1">Bintang 1</option>
                            <option value="Bintang 2">Bintang 2</option>
                            <option value="Bintang 3">Bintang 3</option>
                            <option value="Bintang 4">Bintang 4</option>
                            <option value="Bintang 5">Bintang 5</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
foreach ($subMenu as $i) :
    $id = $i['id_submenu'];
    $title = $i['title'];
    $url = $i['url'];
    ?>

<div class="modal fade" id="modal_edit<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Edit role</h3>
            </div>
            <form action="<?= base_url('menu/edit_submenu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="id_submenu" id="id_submenu" value="<?= $id; ?>">
                        <label for="">Pilih Menu</label>
                        <select class="form-control" name="menu_id" id="menu_id">
                            <?php foreach($menu as $m) : ?>
                            <option value="<?= $m['id_menu']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Isikan Title Submenunya</label>
                        <input type="text" class="form-control" name="title" value="<?= $title; ?>" placeholder="masukkan title">
                    </div>
                    <div class="form-group">
                        <label for="">Isikan URL Submenunya</label>
                        <input type="text" name="url" placeholder="masukkan url" value="<?= $url; ?>" class="form-control">
                        <input type="hidden" value="1" name="is_active">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--MODAL HAPUS DATA!-->
<div class="modal fade" id="modal_hapus<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Hapus Menu</h3>
            </div>
            <form action="<?= base_url() . 'menu/hapus_submenu'; ?>" method="post" class="form-horizontal">
                <div class="modal-body">
                    <p>Apakah Anda yakin mau menghapus data ini? <b><?= $title; ?></b></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_menu" value="<?= $id; ?>">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php endforeach; ?>