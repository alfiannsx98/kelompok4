<?php

class M_prodi extends CI_Model
{
  function hapus_prd($id)
    {
        $hasil = $this->db->query("DELETE FROM prodi WHERE id_prd='$id'");
        return $hasil;
    }

    function edit_prd($id, $nama)
    {
        $hasilSubmenu = $this->db->query("UPDATE prodi SET id_prd='$id', nama_prd='$nama' WHERE id_prd='$id' ");
        return $hasilSubmenu;
    }
}
