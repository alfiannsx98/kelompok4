<?php

class M_dosbing extends CI_Model
{
  public function getDosbing()
  {
      $query = "SELECT * FROM dosbing LEFT JOIN user ON user.identity=dosbing.NIP_DS 
      LEFT JOIN prodi ON prodi.ID_PRODI=dosbing.ID_PRODI WHERE user.role_id=3";
      return $this->db->query($query)->result_array();
  }

  public function getProdi()
  {
      return $this->db->get('prodi')->result_array();
  }
  
  function hapus_dosbing($nip)
    {
        $this->db->query("DELETE a.*, b.* FROM dosbing a JOIN user b ON a.NIP_DS = b.identity WHERE a.NIP_DS = $nip");
    }
}
