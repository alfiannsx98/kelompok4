<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_dashboard extends CI_Model
{	
	/**
	 * dashboard admin
	 */
	public function select_by_user()
	{
		$sql = "SELECT * FROM user WHERE role_id=2 AND is_active=1";

		$data = $this->db->query($sql);

		return $data->num_rows();
	}

	public function select_by_role()
	{
		$sql = "SELECT * FROM user WHERE role_id=2 AND is_active=1";

		$data = $this->db->query($sql);

		return $data->result_array();
	}

	public function total_dosen()
	{
		$data = $this->db->get('dosbing');

		return $data->num_rows();
	}

	public function total_perusahaan()
	{
		$data = $this->db->get('perusahaan');

		return $data->num_rows();
	}

	public function total_admin()
	{
		$data = $this->db->get('admin_prodi');

		return $data->num_rows();
	}

	/**
	 * dashboard mahasiswa
	 */
	public function dosbingmhs($mail)
	{
		$data = $this->db->query("SELECT dosbing.NAMA_DS FROM pendaftaran LEFT JOIN dosbing ON 
		dosbing.ID_DS=pendaftaran.ID_DS LEFT JOIN pendaftaran_klp ON pendaftaran_klp.ID_PND=pendaftaran.ID_PND 
		LEFT JOIN mahasiswa ON mahasiswa.ID_M=pendaftaran_klp.ID_M LEFT JOIN user ON user.identity=mahasiswa.ID_M
		WHERE user.email='$mail'");

		return $data->row_array();
	}

	public function perusahaanmhs($mail)
	{
		$data = $this->db->query("SELECT perusahaan.NAMA_PR FROM pendaftaran LEFT JOIN perusahaan ON 
		perusahaan.ID_PR=pendaftaran.ID_PR LEFT JOIN pendaftaran_klp ON pendaftaran_klp.ID_PND=pendaftaran.ID_PND 
		LEFT JOIN mahasiswa ON mahasiswa.ID_M=pendaftaran_klp.ID_M LEFT JOIN user ON user.identity=mahasiswa.ID_M
		WHERE user.email='$mail'");

		return $data->row_array();	
	}

	public function get_status($mail)
	{
		$data = $this->db->query("SELECT mahasiswa.ST_KETUA FROM mahasiswa LEFT JOIN user ON user.identity=mahasiswa.ID_M 
		WHERE user.email='$mail'");

		return $data->row_array();
	}

	public function anggota($mail)
	{
		$data = $this->db->query("SELECT * FROM pendaftaran LEFT JOIN pendaftaran_klp ON 
		pendaftaran_klp.ID_PND=pendaftaran.ID_PND LEFT JOIN mahasiswa ON mahasiswa.ID_M=pendaftaran_klp.ID_M
		LEFT JOIN user ON user.identity=mahasiswa.ID_M WHERE user.email!='$mail'
		GROUP BY pendaftaran.ID_PND");

		return $data->result_array();	
	}

	public function proposal($mail)
	{
		$data = $this->db->query("SELECT pendaftaran.PROPOSAL FROM pendaftaran LEFT JOIN pendaftaran_klp ON 
		pendaftaran_klp.ID_PND=pendaftaran.ID_PND LEFT JOIN mahasiswa ON mahasiswa.ID_M=pendaftaran_klp.ID_M
		LEFT JOIN user ON user.identity=mahasiswa.ID_M WHERE user.email='$mail' GROUP BY pendaftaran.ID_PND");

		return $data->row_array();
	}

	public function waktupkl($mail)
	{
		$data = $this->db->query("SELECT pendaftaran.WAKTU FROM pendaftaran LEFT JOIN pendaftaran_klp ON 
		pendaftaran_klp.ID_PND=pendaftaran.ID_PND LEFT JOIN mahasiswa ON mahasiswa.ID_M=pendaftaran_klp.ID_M
		LEFT JOIN user ON user.identity=mahasiswa.ID_M WHERE user.email='$mail' GROUP BY pendaftaran.ID_PND");

		return $data->row_array();
	}

}

/* End of file M_posisi.php */
/* Location: ./application/models/M_posisi.php */
