<?php

class M_mahasiswa extends CI_Model
{
    public function getMahasiswa()
    {
        $query = "SELECT * FROM mahasiswa LEFT JOIN user ON user.identity=mahasiswa.ID_M 
        LEFT JOIN prodi ON prodi.ID_PRODI=mahasiswa.ID_PRODI";
        return $this->db->query($query)->result_array();
    }

    public function getProdi()
    {
        return $this->db->get('prodi')->result_array();
    }

    public function cekEmail()
    {
        $query = "SELECT user.email FROM user LEFT JOIN mahasiswa ON user.identity=mahasiswa.ID_M WHERE user.email!=''";
        return $this->db->query($query)->result_array();
    }

    public function hapus_mahasiswa($id)
    {
        $this->db->query("DELETE a.*, b.* FROM mahasiswa a JOIN user b ON a.ID_M = b.identity WHERE b.identity = '$id'");
    }
}
