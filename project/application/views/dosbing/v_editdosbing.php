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
            foreach ($dosbing as $tb ) { ?>
                <form action="<?php echo base_url() . 'dosbing/update'; ?>" method="post">
                    
                <div class="form-group">
                    <label for="NIP_DS"> NIP Dosen: </label>
                    <input type="hidden" class="form-control-user" id="ID_DS" name="ID_DS" value="<?php echo $tb->ID_DS ?>">
                    <input type="text" class="form-control form-control-user" id="NIP_DS" name="NIP_DS" placeholder="Masukan NIP Dosen" title="Isikan data dengan benar"value="<?php echo $tb->NIP_DS ?>" required >
                </div>
                <div class="form-group">
                        <label for="NAMA_DS"> Nama Dosen: </label>
                        <input type="text" class="form-control form-control-user" id="NAMA_DS" name="NAMA_DS" placeholder="Masukan Nama DOSEN" title="Isikan data dengan benar" value="<?php echo $tb->NAMA_DS ?>" required pattern="[a-zA-Z\s]+">
                    </div>
                    <div class="form-group">
                        <label for="JK_DS"> Jenis Kelamin: </label>
                        <input type="text" class="form-control form-control-user" id="JK_DS" name="JK_DS" placeholder="Masukan Nama Jenis Kelamin" title="Isikan data dengan benar"value="<?php echo $tb->JK_DS ?>" required >
                    </div>
                    <div class="form-group">
                        <label for="ALAMAT_DS"> Alamat Dosen: </label>
                        <textarea name="ALAMAT_DS" class="form-control" id="ALAMAT_DS" cols="30" rows="6" placeholder="Masukkan Alamat Dosen"  required> <?php echo $tb->ALAMAT_DS ?> </textarea>
                    </div>  
                    <div class="form-group">
                        <label for="HP_DS"> HP Dosen: </label>
                        <input type="text" class="form-control form-control-user" id="HP_DS" name="HP_DS" placeholder="Masukan HP Dosen" title="Isikan data dengan benar" value="<?php echo $tb->HP_DS ?>" required >
                    </div>
                    <div class="form-group">
                        <label for="EMAIL_DS"> EMAIL Dosen: </label>
                        <input type="text" class="form-control form-control-user" id="EMAIL_DS" name="EMAIL_DS" placeholder="Masukan EMAIL Dosen" title="Isikan data dengan benar"  required value="<?php echo $tb->EMAIL_DS ?>" >
                    </div>
                    <div class="form-group">
                        <label for="PASSWORD_DS"> PASSWORD Dosen: </label>
                        <input type="text" class="form-control form-control-user" id="PASSWORD_DS" name="PASSWORD_DS" placeholder="Masukan PASSWORD Dosen" title="Isikan data dengan benar" value="<?php echo $tb->PASSWORD_DS ?>" required >
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
