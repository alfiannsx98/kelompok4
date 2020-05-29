<?php

class M_mahasiswa extends CI_Model
{
    public function getMahasiswa()
    {
        $query = "SELECT * FROM mahasiswa LEFT JOIN user ON user.identity=mahasiswa.NIM 
        LEFT JOIN prodi ON prodi.ID_PRODI=mahasiswa.ID_PRODI";
        return $this->db->query($query)->result_array();
    }

    public function getProdi()
    {
        return $this->db->get('prodi')->result_array();
    }

    function hapus_mahasiswa($nim)
    {
        $this->db->query("DELETE a.*, b.* FROM mahasiswa a JOIN user b ON a.NIM = b.identity WHERE b.identity = '$nim'");
    }
}
