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
                <form action="<?php echo base_url() . 'mahasiswa/tambah_mahasiswa' ?>" method="post">
                    <div class="form-group">
                        <label for="ID_M"> ID NIM: </label>
                        <input type="text" class="form-control form-control-user" id="ID_M" name="ID_M" placeholder="Masukan ID MAHASISWA" title="Isikan data dengan benar" required>
                    </div>
                    <div class="form-group">
                        <label for="NIM"> NIM: </label>
                        <input type="text" class="form-control form-control-user" id="NIM" name="NIM" placeholder="Masukan NIM" title="Isikan data dengan benar" required>
                    </div>
                    <div class="form-group">
                        <label for="NAMA_M"> Nama Mahasiswa: </label>
                        <input type="text" class="form-control form-control-user" id="NAMA_M" name="NAMA_M" placeholder="Masukan Nama MAHASISWA" title="Isikan data dengan benar" required pattern="[a-zA-Z\s]+">
                    </div>
                    <div class="form-group">
                        <label for="JK_M"> Jenis Kelamin: </label>
                        <input type="text" class="form-control form-control-user" id="JK_M" name="JK_M" placeholder="Masukan Jenis Kelamin" title="Isikan data dengan benar" required >
                    </div>
                    <div class="form-group">
                        <label for="PRODI_M"> PRODI: </label>
                        <input type="text" class="form-control form-control-user" id="PRODI_M" name="PRODI_M" placeholder="Masukan PRODI" title="Isikan data dengan benar" required >
                    </div>
                    <div class="form-group">
                        <label for="SMT"> Semester: </label>
                        <input type="text" class="form-control form-control-user" id="SMT" name="SMT" placeholder="Masukan Semester" title="Isikan data dengan benar" required >
                    </div>
                    <div class="form-group">
                        <label for="ALAMAT_M"> Alamat Mahasiswa: </label>
                        <textarea name="ALAMAT_M" class="form-control" id="ALAMAT_M" cols="30" rows="6" placeholder="Masukkan Alamat Dosen" required></textarea>
                    </div>  
                    <div class="form-group">
                        <label for="HP_M"> HP Mahasiswa: </label>
                        <input type="text" class="form-control form-control-user" id="HP_M" name="HP_M" placeholder="Masukan HP MAHASISWA" title="Isikan data dengan benar" required >
                    </div>
                    <div class="form-group">
                        <label for="EMAIL_M"> EMAIL Mahasiswa: </label>
                        <input type="text" class="form-control form-control-user" id="EMAIL_M" name="EMAIL_M" placeholder="Masukan EMAIL Mahasiswa" title="Isikan data dengan benar" required >
                    </div>
                    <div class="form-group">
                        <label for="PASSWORD_M"> PASSWORD Mahasiswa: </label>
                        <input type="text" class="form-control form-control-user" id="PASSWORD_M" name="PASSWORD_M" placeholder="Masukan PASSWORD Mahasiswa" title="Isikan data dengan benar" required >
                    </div>
                    
                   
                    <hr>
                    <button type="submit" name="submit" class="btn btn-success btn-user btn-block">Tambah</button>
                </form>
                <br>
                <div class="text-center">
                    <div class="row">

                    </div>
                    <!-- Batas edit profil -->
     
