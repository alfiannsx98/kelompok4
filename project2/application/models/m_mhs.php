<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_mhs extends CI_Model
{	
    public function mhs($mail)
    {
        $data = $this->db->query("SELECT * FROM pendaftaran LEFT JOIN pendaftaran_klp ON pendaftaran_klp.ID_PND=pendaftaran.ID_PND 
        LEFT JOIN dosbing ON dosbing.ID_DS=pendaftaran.ID_DS LEFT JOIN mahasiswa ON mahasiswa.ID_M = pendaftaran_klp.ID_M LEFT JOIN 
        perusahaan ON perusahaan.ID_PR = pendaftaran.ID_PR LEFT JOIN prodi ON prodi.ID_PRODI=mahasiswa.ID_PRODI LEFT JOIN 
        user ON user.identity=dosbing.ID_DS WHERE user.email='$mail'");

        return $data->result_array();
    }
}