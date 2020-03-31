<?php

class M_data extends CI_Model
{
    // m_data mempunyai fungsi untuk mengambil data dari database dan bisa dipanggil di ocntroller
    function ambil_data()
    {
        return $this->db->get('user');
    }
}
