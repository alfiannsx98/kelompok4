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

    public function tampil_detail($ID_PND)
    {
        $data['pendaftaran'] = $this->m_pendaftaran->tampil_dt_pnd($ID_PND, 'pendaftaran')->result();
         
        
        $data["pendaftaran_klp"] = $this->m_pendaftaran->tampil_dt_klp($ID_PND, 'pendaftaran_klp')->result();
        $this->load->view('admin/pendaftaran/vi_dt_pendaftaran', $data);
        // $this->load->view('admin/pendaftaran/vi_dt_pendaftaran', $data1);
    }

}