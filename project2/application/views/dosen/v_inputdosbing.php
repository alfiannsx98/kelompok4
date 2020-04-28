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
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Tambah Data</h1>
            </div>

            <!-- Content Row -->
            <div class="row">
                <!-- Content Row -->
                <!-- Disini tempat membuat Edit Profil nya! -->
            </div>
            <div class="col-lg-10">
                <form action="<?php echo base_url() . 'dosen/tambah_dosbing' ?>" method="post">
                    <div class="form-group">
                        <label for="ID_DS"> ID Dosen: </label>
                        <input type="text" class="form-control form-control-user" id="ID_DS" name="ID_DS" placeholder="Masukan ID DOSEN" title="Isikan data dengan benar" required">
                    </div>
                    <div class="form-group">
                        <label for="NIP_DS"> NIP Dosen: </label>
                        <input type="text" class="form-control form-control-user" id="NIP_DS" name="NIP_DS" placeholder="Masukan NIP DOSEN" title="Isikan data dengan benar" required">
                    </div>
                    <div class="form-group">
                        <label for="NAMA_DS"> Nama Dosen: </label>
                        <input type="text" class="form-control form-control-user" id="NAMA_DS" name="NAMA_DS" placeholder="Masukan Nama DOSEN" title="Isikan data dengan benar" required pattern="[a-zA-Z\s]+">
                    </div>
                    <div class="form-group">
                        <label for="JK_DS"> Jenis Kelamin: </label>
                        <input type="text" class="form-control form-control-user" id="JK_DS" name="JK_DS" placeholder="Masukan Nama Jenis Kelamin" title="Isikan data dengan benar" required >
                    </div>
                    <div class="form-group">
                        <label for="ALAMAT_DS"> Alamat Dosen: </label>
                        <textarea name="ALAMAT_DS" class="form-control" id="ALAMAT_DS" cols="30" rows="6" placeholder="Masukkan Alamat Dosen" required></textarea>
                    </div>  
                    <div class="form-group">
                        <label for="HP_DS"> HP Dosen: </label>
                        <input type="text" class="form-control form-control-user" id="HP_DS" name="HP_DS" placeholder="Masukan HP Dosen" title="Isikan data dengan benar" required >
                    </div>
                    <div class="form-group">
                        <label for="EMAIL_DS"> EMAIL Dosen: </label>
                        <input type="text" class="form-control form-control-user" id="EMAIL_DS" name="EMAIL_DS" placeholder="Masukan EMAIL Dosen" title="Isikan data dengan benar" required >
                    </div>
                    <div class="form-group">
                        <label for="PASSWORD_DS"> PASSWORD Dosen: </label>
                        <input type="text" class="form-control form-control-user" id="PASSWORD_DS" name="PASSWORD_DS" placeholder="Masukan PASSWORD Dosen" title="Isikan data dengan benar" required >
                    </div>
                    
                   
                    <hr>
                    <button type="submit" name="submit" class="btn btn-success btn-user btn-block">Tambah</button>
                </form>
                <br>
                <div class="text-center">
                    <div class="row">

                    </div>
                    <!-- Batas edit profil -->
     
