<?php

class M_pendaftaran extends CI_Model{
	function tampil_pnd(){
        $data=$this->db->query("SELECT pendaftaran.ID_PND, perusahaan.NAMA_PR, dosbing.NAMA_DS 
                                FROM pendaftaran, perusahaan, dosbing
                                WHERE pendaftaran.ID_PR = perusahaan.ID_PR AND pendaftaran.ID_DS = dosbing.ID_DS");
		return $data;
        }
        
        function tampil_dt_pnd(){
                $data=$this->db->query("SELECT pendaftaran_klp.ID_PND, pendaftaran_klp.ID_M, mahasiswa.NAMA_M
                                        FROM pendaftaran_klp, mahasiswa
                                        WHERE pendaftaran_klp.ID_M = mahasiswa.ID_M");
                return $data;
        }
}