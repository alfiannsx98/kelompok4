!-- Content Wrapper. Contains page content -->
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
<div class="content">
<div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Edit Data</h1>
            </div>

            <!-- Content Row -->
            <div class="row">
                <!-- Content Row -->
                <!-- Disini tempat membuat Edit Profil nya! -->
            </div>
            <div class="col-lg-10">
            <?php 
            foreach ($mahasiswa as $tb ) { ?>
                <form action="<?php echo base_url() . 'mahasiswa/update'; ?>" method="post">
                    
                    <div class="form-group">
                        <label for="NIM"> NIM: </label>
                        <input type="hidden" class="form-control-user" id="ID_M" name="ID_M" value="<?php echo $tb->ID_M ?>">
                        <input type="text" class="form-control form-control-user" id="NIM" name="NIM" placeholder="Masukan NIP Dosen" title="Isikan data dengan benar"value="<?php echo $tb->NIM ?>" required >
                    </div>
                    <div class="form-group">
                        <label for="NAMA_M"> Nama Mahasiswa: </label>
                        <input type="text" class="form-control form-control-user" id="NAMA_M" name="NAMA_M" placeholder="Masukan Nama DOSEN" title="Isikan data dengan benar" value="<?php echo $tb->NAMA_M ?>" required pattern="[a-zA-Z\s]+">
                    </div>
                    <div class="form-group">
                        <label for="JK_M"> Jenis Kelamin: </label>
                        <input type="text" class="form-control form-control-user" id="JK_M" name="JK_M" placeholder="Masukan Nama Jenis Kelamin" title="Isikan data dengan benar"value="<?php echo $tb->JK_M ?>" required >
                    </div>
                    <div class="form-group">
                        <label for="PRODI_M"> PRODI: </label>
                        <textarea name="PRODI_M" class="form-control" id="PRODI_M" cols="30" rows="6" placeholder="Masukkan PRODI"  required> <?php echo $tb->PRODI_M ?> </textarea>
                    </div>  
                    <div class="form-group">
                        <label for="SMT"> SEMESTER: </label>
                        <textarea name="SMT" class="form-control" id="SMT" cols="30" rows="6" placeholder="Masukkan SEMESTER"  required> <?php echo $tb->SMT ?> </textarea>
                    </div>  
                    <div class="form-group">
                        <label for="ALAMAT_M"> Alamat Mahasiswa: </label>
                        <textarea name="ALAMAT_M" class="form-control" id="ALAMAT_M" cols="30" rows="6" placeholder="Masukkan Alamat MAHASISWA"  required> <?php echo $tb->ALAMAT_M ?> </textarea>
                    </div>  
                    <div class="form-group">
                        <label for="HP_M"> HP Mahasiswa: </label>
                        <input type="text" class="form-control form-control-user" id="HP_M" name="HP_M" placeholder="Masukan HP Mahasiswa" title="Isikan data dengan benar" value="<?php echo $tb->HP_M ?>" required >
                    </div>
                    <div class="form-group">
                        <label for="EMAIL_M"> EMAIL Mahasiswa: </label>
                        <input type="text" class="form-control form-control-user" id="EMAIL_M" name="EMAIL_M" placeholder="Masukan EMAIL Mahasisiswa" title="Isikan data dengan benar"  required value="<?php echo $tb->EMAIL_M ?>" >
                    </div>
                    <div class="form-group">
                        <label for="PASSWORD_M"> PASSWORD Mahasiswa: </label>
                        <input type="text" class="form-control form-control-user" id="PASSWORD_M" name="PASSWORD_M" placeholder="Masukan PASSWORD Mahasiswa" title="Isikan data dengan benar" value="<?php echo $tb->PASSWORD_M ?>" required >
                    </div>
                    <hr>
                    <button type="submit" name="submit" class="btn btn-success btn-user btn-block">Simpan</button>
                </form>
                <?php } ?>
                <br>
                <div class="text-center">
                    <div class="row">

                    </div>
                    <!-- Batas edit profil -->
            </div>
        </div>
    </div>
</div>
</div>
