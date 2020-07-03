<?php

class M_pendaftaran extends CI_Model{
        // UNTUK ADMIN
        function tampil_ditolak(){
                $data=$this->db->query("SELECT pendaftaran.ID_PND, pendaftaran.ID_PR, pendaftaran.ID_DS,  pendaftaran.ID_ST, perusahaan.NAMA_PR, perusahaan.ALAMAT_PR, dosbing.NAMA_DS, mahasiswa.NAMA_M, status_pendaftaran.NAMA_ST 
                                        FROM pendaftaran, perusahaan, dosbing, mahasiswa, pendaftaran_klp, status_pendaftaran
                                        WHERE pendaftaran.ID_PR = perusahaan.ID_PR AND pendaftaran.ID_DS = dosbing.ID_DS AND pendaftaran.ID_ST = status_pendaftaran.ID_ST
                                        AND pendaftaran.ID_PND = pendaftaran_klp.ID_PND AND pendaftaran_klp.ID_M = mahasiswa.ID_M
                                        AND mahasiswa.ST_DITOLAK = 1
                                        AND status_pendaftaran.NAMA_ST = 'DITOLAK'
                                        ORDER BY pendaftaran.ID_PND ASC");
                        return $data;
                }

	function tampil_pnd(){
        $data=$this->db->query("SELECT pendaftaran.ID_PND, pendaftaran.ID_PR, pendaftaran.ID_DS,  pendaftaran.ID_ST, perusahaan.NAMA_PR, perusahaan.ALAMAT_PR, dosbing.NAMA_DS, mahasiswa.NAMA_M, status_pendaftaran.NAMA_ST 
                                FROM pendaftaran, perusahaan, dosbing, mahasiswa, pendaftaran_klp, status_pendaftaran
                                WHERE pendaftaran.ID_PR = perusahaan.ID_PR AND pendaftaran.ID_DS = dosbing.ID_DS AND pendaftaran.ID_ST = status_pendaftaran.ID_ST
                                AND pendaftaran.ID_PND = pendaftaran_klp.ID_PND AND pendaftaran_klp.ID_M = mahasiswa.ID_M
                                AND mahasiswa.ST_KETUA = 1
                                AND status_pendaftaran.NAMA_ST != 'DITOLAK' 
                                ORDER BY pendaftaran.ID_PND ASC");
		return $data;
        }

        function status_pnd()
        {
                $data = $this->db->query("SELECT ID_ST, NAMA_ST FROM status_pendaftaran");
                return $data;
        }

        function ubah_status($ID_ST, $ID_PND)
        {
                $this->db->query("UPDATE pendaftaran SET ID_ST = '$ID_ST' 
                                        WHERE ID_PND = '$ID_PND'");
                        // return $data;
        }

        // hapus data pendaftaran
        function hapus_data_pnd($ID_PND)
        {
                $this->db->query("DELETE FROM pendaftaran WHERE ID_PND = '$ID_PND'");
        }

        // tampil data pendaftaran di detail
        function tampil_dt_pnd($ID_PND)
        {
                $data=$this->db->query("SELECT pendaftaran.ID_PND, pendaftaran.ID_PR, pendaftaran.ID_DS, pendaftaran.WAKTU, pendaftaran.PROPOSAL, pendaftaran.BUKTI, pendaftaran.ST_PENDAFTARAN, perusahaan.NAMA_PR, perusahaan.ALAMAT_PR, dosbing.NAMA_DS, pendaftaran.ID_ST, status_pendaftaran.NAMA_ST  
                                        FROM pendaftaran, perusahaan, dosbing, status_pendaftaran
                                        WHERE pendaftaran.ID_PR = perusahaan.ID_PR 
                                        AND pendaftaran.ID_DS = dosbing.ID_DS
                                        AND pendaftaran.ID_ST = status_pendaftaran.ID_ST
                                        AND pendaftaran.ID_PND =  '$ID_PND'");
                        return $data;
        }

        // tampil data anggota kelompok di detail
        function tampil_dt_klp($ID_PND)
        {
                $data = $this->db->query("SELECT pendaftaran_klp.ID_PND, pendaftaran_klp.ID_M, mahasiswa.NIM, mahasiswa.NAMA_M
                                        FROM pendaftaran_klp, mahasiswa
                                        WHERE pendaftaran_klp.ID_M = mahasiswa.ID_M
                                        AND pendaftaran_klp.ID_PND = '$ID_PND'");
                        return $data;
        }

        // ubah data pendaftaran
        function ubah_data_pnd($where, $data, $table)
        {
		$this->db->where($where);
		$this->db->update($table, $data);
        }

        // tambah data anggota di detail pendaftaran
        function dt_tmbh_anggota($ID_PND, $NIM)
        {
                $this->db->query("INSERT INTO pendaftaran_klp ( ID_PND, ID_M ) 
                VALUES('$ID_PND', (SELECT ID_M FROM mahasiswa WHERE mahasiswa.NIM = '$NIM'))");
        }

        // hapus status ketua
        function hapus_st_ketua($ID_M)
        {
                $this->db->query("UPDATE mahasiswa SET ST_KETUA = 0, ST_DITOLAK = 1 WHERE ID_M = '$ID_M'");
        }
        
        // hapus data kelompok
        function hapus_data_klp($ID_PND)
        {
                $this->db->query("DELETE FROM pendaftaran_klp WHERE ID_PND = '$ID_PND'");
        }

        // hapus data anggota 
        function hapus_anggota($ID_M)
        {
                $this->db->query("DELETE FROM pendaftaran_klp WHERE ID_M = '$ID_M'");
        }

        // UNTUK MAHASISWA
        // cek sudah daftar atau belum
        function cek_daftar($ID_PND)
        {
                $data = $this->db->query("SELECT ST_PENDAFTARAN FROM pendaftaran WHERE ID_PND = '$ID_PND'");
                return $data;
        }

        // select max id untuk auto increment. gak kepake
        function selectMaxID(){
                $query = $this->db->query("SELECT MAX(ID_PND) AS ID_PND FROM pendaftaran");
                $hasil = $query->row();
                return $hasil->ID_PND;       
        }

        // dropdown dosen pembimbing
        function comboDS()
        {
                $data = $this->db->query("SELECT ID_DS, NAMA_DS FROM dosbing");
                return $data;
        }
        
        // dropdown bulan
        function bulan(){
                $data = $this->db->query("SELECT BL FROM bulan");
                return $data;
        }

        // dropdown perusahaan
        function jmlh_pr(){
                $data = $this->db->query("SELECT perusahaan.ID_PR, perusahaan.NAMA_PR, perusahaan.ALAMAT_PR, COUNT(pendaftaran.ID_PR) AS JMLH_PR 
                                        FROM perusahaan LEFT JOIN pendaftaran ON perusahaan.ID_PR = pendaftaran.ID_PR 
                                        GROUP BY perusahaan.ID_PR");
                return $data;
        }

        // tambah data pendaftaran isian kelompok
        function tmbh_pnd($data, $table){
                $this->db->insert($table, $data);
        }

        // tambah user sebagai anggota kelompok
        function tmbh_ketua($tim, $table)
        {
                $this->db->insert($table, $tim);
        }

        // ubah status ketua saat pendaftaran isian kelompok
        function ubah_st_ketua($NIM)
        {
                $this->db->query("UPDATE mahasiswa SET ST_KETUA = 1 WHERE NIM = '$NIM'");
        }

        // tambah data pendaftaran nim anggota
        function tmbh_nim($data1){
                return $this->db->insert_batch('pendaftaran_klp', $data1);
        }

        // modal untuk nambah anggota kelompok
        function dropnim()
        {        
                $data = $this->db->query("SELECT mahasiswa.ID_M, mahasiswa.NIM, mahasiswa.NAMA_M FROM mahasiswa LEFT JOIN pendaftaran_klp ON mahasiswa.ID_M = pendaftaran_klp.ID_M
                WHERE pendaftaran_klp.ID_M IS NULL");

                return $data;
        }

        // modal untuk nambah anggota kelompok yang pernah ditolak
        function dropnim2()
        {
                $data = $this->db->query("SELECT mahasiswa.ID_M, mahasiswa.NIM, mahasiswa.NAMA_M, status_pendaftaran.NAMA_ST 
                                        FROM mahasiswa, pendaftaran, pendaftaran_klp, status_pendaftaran 
                                        WHERE mahasiswa.ID_M = pendaftaran_klp.ID_M
                                        AND pendaftaran_klp.ID_PND = pendaftaran.ID_PND 
                                        AND pendaftaran.ID_ST = status_pendaftaran.ID_ST 
                                        AND status_pendaftaran.NAMA_ST = 'DITOLAK' 
                                        AND mahasiswa.ST_KETUA = 0");
                return $data;
        }

        // setelah daftar
        function tampil_pnd_mhs($ID_PND)
        {
                $data=$this->db->query("SELECT pendaftaran.ID_PND, pendaftaran.ID_PR, pendaftaran.ID_DS, pendaftaran.WAKTU, pendaftaran.ID_ST, status_pendaftaran.NAMA_ST, status_pendaftaran.KET_MHS, perusahaan.NAMA_PR, perusahaan.ALAMAT_PR, dosbing.NAMA_DS  
                                        FROM pendaftaran, perusahaan, dosbing, status_pendaftaran
                                        WHERE pendaftaran.ID_PR = perusahaan.ID_PR AND pendaftaran.ID_ST = status_pendaftaran.ID_ST
                                        AND pendaftaran.ID_DS = dosbing.ID_DS
                                        AND pendaftaran.ID_PND =  '$ID_PND'");
                return $data;
        }

        function diterima($ID_PND, $BUKTI)
        {
                $this->db->query("UPDATE pendaftaran SET BUKTI = '$BUKTI', ID_ST = 'ST0004' WHERE ID_PND = '$ID_PND'");
        }

        // bukti ditolak
        function ditolak($ID_PND, $BUKTI)
        {
                $this->db->query("UPDATE pendaftaran SET BUKTI = '$BUKTI', ID_ST = 'ST0006' WHERE ID_PND = '$ID_PND'");
        }

}
