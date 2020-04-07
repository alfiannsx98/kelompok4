<?php

class M_pendaftaran extends CI_Model{
	function tampil_pnd(){
        $data=$this->db->query("SELECT pendaftaran.ID_PND, perusahaan.NAMA_PR, dosbing.NAMA_DS 
                                FROM pendaftaran, perusahaan, dosbing
                                WHERE pendaftaran.ID_PR = perusahaan.ID_PR AND pendaftaran.ID_DS = dosbing.ID_DS");
		return $data;
        }

        function tampil_dt_pnd($ID_PND){
                $data=$this->db->query("SELECT pendaftaran.ID_PND, pendaftaran.ID_PR, perusahaan.NAMA_PR, perusahaan.ALAMAT_PR, dosbing.NAMA_DS  
                                        FROM pendaftaran, perusahaan, dosbing
                                        WHERE pendaftaran.ID_PR = perusahaan.ID_PR 
                                        AND pendaftaran.ID_DS = dosbing.ID_DS
                                        AND pendaftaran.ID_PND =  '$ID_PND'");
                        return $data;
                }

        function tampil_dt_klp($ID_PND){
                $data = $this->db->query("SELECT pendaftaran_klp.ID_PND, pendaftaran_klp.ID_M, mahasiswa.NAMA_M
                                        FROM pendaftaran_klp, mahasiswa
                                        WHERE pendaftaran_klp.ID_M = mahasiswa.ID_M
                                        AND pendaftaran_klp.ID_PND = '$ID_PND'");
                        return $data;
        }

        function selectMaxID(){
                $query = $this->db->query("SELECT MAX(ID_PND) as ID_PND from pendaftaran");
                $hasil = $query->row();
                return $hasil->ID_PND;       
        }

        function namaDS(){
                $data = $this->db->query("SELECT ID_DS, NAMA_DS FROM dosbing");
                return $data;
        }

        function namaPR(){
                $data = $this->db->query("SELECT ID_PR, NAMA_PR FROM perusahaan");
                return $data;
        }
}