<?php

class M_perusahaan extends CI_Model
{
    /**
     * ================================================
     * model perusahaan
     * ================================================
     */

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

    // function edit_pr($id, $nama, $alamat,  $nohp, $email, $gambar)
    // {
    //     $hasilSubmenu = $this->db->query("UPDATE perusahaan SET NAMA_PR='$nama',  ALAMAT_PR='$alamat', HP_PR='$nohp', EMAIl_PR='$email', gambar='$gambar' WHERE ID_PR='$id' ");
    //     return $hasilSubmenu;
    // }

    // Query Pagination
    function get_perusahaan_list($limit, $start)
    {
        $query = $this->db->get('perusahaan', $limit, $start);
        return $query;
    }

    /**
     * ================================================
     * pendaftaran tempat PKL baru untuk user mahasiswa
     * ================================================
     */
    public function getPklBaru($id_m)
    {
        $this->db->select('*');
        $this->db->from('pkl_baru');
        $this->db->join('mahasiswa', 'mahasiswa.ID_M = pkl_baru.ID_M');
        $this->db->join('perusahaan', 'perusahaan.ID_PR = pkl_baru.ID_PR');
        $this->db->where('pkl_baru.ID_M', $id_m);
        $query = $this->db->get();
        return $query;
    }

    public function batal($id) 
    {
        $this->db->query("DELETE a.*, b.* FROM pkl_baru a JOIN perusahaan b ON a.ID_PR = b.ID_PR WHERE b.ID_PR = '$id'");
    }

    // public function del($id) 
    // {
    //     $this->db->query("DELETE a.*, b.* FROM pkl_baru a JOIN perusahaan b ON a.ID_PR = b.ID_PR WHERE b.ID_PR = '$id'");
    // }

    // public function con($where)
    // {
    //     $this->db->where($where);
    //     $this->db->delete('pkl_baru');
    // }

    /**
     * ================================================
     * list pengajuan tempat pkl baru user admin
     * ================================================
     */
    // public function listPklBaru()
    // {
    //     $this->db->select('*');
    //     $this->db->from('pkl_baru');
    //     $this->db->join('mahasiswa', 'mahasiswa.ID_M = pkl_baru.ID_M');
    //     $this->db->join('perusahaan', 'perusahaan.ID_PR = pkl_baru.ID_PR');
    //     $this->db->where('perusahaan.confirm', '0');
    //     $query = $this->db->get();
    //     return $query;
    // }

    // public function konfir($id)
    // {
    //     $this->db->set('confirm', '1');
    //     $this->db->where('ID_PR', $id);
    //     $this->db->update('perusahaan');
    // }

    // public function to($id)
    // {
    //     $this->db->set('confirm', '2');
    //     $this->db->where('ID_PR', $id);
    //     $this->db->update('perusahaan');
    // }
}
