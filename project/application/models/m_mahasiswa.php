<?php

class M_mahasiswa extends CI_Model
{
  public function getMahasiswa()
  {
      $query = "SELECT * FROM mahasiswa LEFT JOIN user ON mahasiswa.EMAIL_M=user.email";
      return $this->db->query($query)->result_array();
  }

  public function getNim($nim)
  {
    $query = "SELECT NIM FROM mahasiswa WHERE NIM='$nim'";
    return $this->db->query($query)->result_array();
  }
  
  function hapus_mhs($email)
    {
        $hasil = $this->db->query("DELETE a.*, b.* FROM mahasiswa a JOIN user b ON a.EMAIL_M=b.email WHERE a.EMAIL_M = '$email'");
        return $hasil;
    }

    function lihat_mhs($id, $nim, $nama, $jk, $prodi, $semester, $alamat,  $nohp, $email)
    {
        $hasilMhs = $this->db->query("UPDATE mahasiswa SET ID_M='$id', NIM='$nim', NAMA_M='$nama', JK_M='$jk', PRODI_M='$prodi', SMT='$semester', ALAMAT_M='$alamat', HP_M='$nohp', EMAIl_M='$email' WHERE ID_M='$id' ");
        return $hasilMhs;
    }
}
