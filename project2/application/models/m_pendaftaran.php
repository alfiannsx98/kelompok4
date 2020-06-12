<?php

class M_pendaftaran extends CI_Model{
	function tampil_pnd(){
        $data=$this->db->query("SELECT pendaftaran.ID_PND, pendaftaran.ST_PENDAFTARAN, pendaftaran.ID_PR, pendaftaran.ID_DS, perusahaan.NAMA_PR, perusahaan.ALAMAT_PR, dosbing.NAMA_DS, mahasiswa.NAMA_M 
                                FROM pendaftaran, perusahaan, dosbing, mahasiswa, pendaftaran_klp
                                WHERE pendaftaran.ID_PR = perusahaan.ID_PR AND pendaftaran.ID_DS = dosbing.ID_DS
                                AND pendaftaran.ID_PND = pendaftaran_klp.ID_PND AND pendaftaran_klp.ID_M = mahasiswa.ID_M
                                AND mahasiswa.ST_KETUA = 1
                                ORDER BY pendaftaran.ID_PND ASC");
		return $data;
        }

        function tampil_dt_pnd($ID_PND)
        {
                $data=$this->db->query("SELECT pendaftaran.ID_PND, pendaftaran.ID_PR, pendaftaran.ID_DS, pendaftaran.WAKTU, pendaftaran.PROPOSAL, pendaftaran.ST_PENDAFTARAN, perusahaan.NAMA_PR, perusahaan.ALAMAT_PR, dosbing.NAMA_DS  
                                        FROM pendaftaran, perusahaan, dosbing
                                        WHERE pendaftaran.ID_PR = perusahaan.ID_PR 
                                        AND pendaftaran.ID_DS = dosbing.ID_DS
                                        AND pendaftaran.ID_PND =  '$ID_PND'");
                        return $data;
                }

        function tampil_dt_klp($ID_PND)
        {
                $data = $this->db->query("SELECT pendaftaran_klp.ID_PND, pendaftaran_klp.ID_M, mahasiswa.NIM, mahasiswa.NAMA_M
                                        FROM pendaftaran_klp, mahasiswa
                                        WHERE pendaftaran_klp.ID_M = mahasiswa.ID_M
                                        AND pendaftaran_klp.ID_PND = '$ID_PND'");
                        return $data;
        }

        function ubah_status($ST_PENDAFTARAN, $ID_PND)
        {
                $this->db->query("UPDATE pendaftaran SET ST_PENDAFTARAN = '$ST_PENDAFTARAN' 
                                        WHERE ID_PND = '$ID_PND'");
                        // return $data;
        }

        // ubah data pendaftaran
        function ubah_data_pnd($where, $data, $table)
        {
		$this->db->where($where);
		$this->db->update($table, $data);
        }
        
        // hapus data pendaftaran
        function hapus_data_pnd($ID_PND)
        {
                $this->db->query("DELETE FROM pendaftaran WHERE ID_PND = '$ID_PND'");
        }

        // hapus data kelompok
        function hapus_data_klp($ID_PND)
        {
                $this->db->query("DELETE FROM pendaftaran_klp WHERE ID_PND = '$ID_PND'");
        }

        function selectMaxID(){
                $query = $this->db->query("SELECT MAX(ID_PND) as ID_PND from pendaftaran");
                $hasil = $query->row();
                return $hasil->ID_PND;       
        }

        function comboDS(){
                $data = $this->db->query("SELECT ID_DS, NAMA_DS FROM dosbing");
                return $data;
        }

        // function comboPR(){
        //         $data = $this->db->query("SELECT ID_PR, NAMA_PR FROM perusahaan");
        //         return $data;
        // }

        function bulan(){
                $data = $this->db->query("SELECT BL FROM bulan");
                return $data;
        }

        // dropdown perusahaan
        function jmlh_pr(){
                $data = $this->db->query("SELECT perusahaan.ID_PR, perusahaan.NAMA_PR, perusahaan.ALAMAT_PR, COUNT(perusahaan.ID_PR) AS JMLH_PR 
                                        FROM perusahaan LEFT JOIN pendaftaran ON perusahaan.ID_PR = pendaftaran.ID_PR 
                                        GROUP BY pendaftaran.ID_PR");
                return $data;
        }

        // tambah data pendaftaran isian kelompok
        function tmbh_pnd($data, $table){
                $this->db->insert($table, $data);
        }

        // tambah data pendaftaran nim anggota
        function tmbh_nim($data){
                return $this->db->insert_batch('pendaftaran_klp', $data);
        }
        
        // tampil data Pendaftaran
        function data_kel(){
                $data = $this->db->query("SELECT perusahaan.NAMA_PR, perusahaan.ALAMAT_PR, dosbing.NAMA_DS, pendaftaran.WAKTU, pendaftaran.PROPOSAL
                FROM pendaftaran, perusahaan, dosbing, pendaftaran_klp, mahasiswa
                WHERE pendaftaran.ID_PR = perusahaan.ID_PR AND pendaftaran.ID_DS = dosbing.ID_DS
                AND pendaftaran.ID_PND = pendaftaran_klp.ID_PND AND pendaftaran_klp.ID_M = mahasiswa.ID_M
                AND mahasiswa.NIM = '".$user['identity']."'");
        return $data;
        }

        function dropnim(){
                
                $data = $this->db->query("SELECT mahasiswa.NIM, mahasiswa.NAMA_M FROM mahasiswa LEFT JOIN pendaftaran_klp ON mahasiswa.ID_M = pendaftaran_klp.ID_M
                WHERE pendaftaran_klp.ID_M IS NULL");

                return $data;
        }

        function mhsiswa(){
                $data = $this->db->query("SELECT mahasiswa.ID_M FROM mahasiswa");
                return $data;
        }
}
