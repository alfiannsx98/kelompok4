<?php

class M_perusahaan extends CI_Model
{
  public function getPerusahaan()
  {
      $query = "SELECT * FROM perusahaan";
      return $this->db->query($query)->result_array();
  }
  
  function hapus_pr($id)
    {
        $this->db->where('ID_PR', $id);
        $this->db->delete('perusahaan');
    }

    function edit_pr($id, $nama, $alamat,  $nohp, $email, $rating, $gambar)
    {
        $hasilSubmenu = $this->db->query("UPDATE perusahaan SET ID_PR='$id', NAMA_PR='$nama',  ALAMAT_PR='$alamat', HP_PR='$nohp', EMAIl_PR='$email', RATING='$rating', gambar='$gambar' WHERE ID_PR='$id' ");
        return $hasilSubmenu;
    }
}
