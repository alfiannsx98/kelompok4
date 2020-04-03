<?php

class M_pendaftaran extends CI_Model{
	function tampil_data(){
        $data=$this->db->query("SELECT pendaftaran.ID_PND, perusahaan.NAMA_PR, dosbing.NAMA_DS 
                                FROM pendaftaran, perusahaan, dosbing
                                WHERE pendaftaran.ID_PR = perusahaan.ID_PR AND pendaftaran.ID_DS = dosbing.ID_DS");
		return $data;
         
	}
}