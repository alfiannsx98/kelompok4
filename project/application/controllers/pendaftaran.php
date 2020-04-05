<?php

class Pendaftaran extends CI_Controller
{
    function __construct(){
		parent::__construct();		
		$this->load->model('m_pendaftaran');
        $this->load->helper('url');
	}

    public function index()
    {
        $data['pendaftaran'] = $this->m_pendaftaran->tampil_pnd()->result();
		$this->load->view('admin/pendaftaran/vi_pendaftaran', $data);
    }

    public function tampil_detail()
    {
        $data["pendaftaran_klp"] = $this->m_pendaftaran->tampil_dt_pnd()->result();
        $this->load->view('admin/pendaftaran/vi_dt_pendaftaran', $data); 
    }

}