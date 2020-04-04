<?php

class M_perusahaan extends CI_Model
{
  public function getPerusahaan()
  {
      $query = "SELECT * FROM perusahaan";
      return $this->db->query($query)->result_array();
  }  
}
