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
        $data['pendaftaran'] = $this->m_pendaftaran->tampil_data()->result();
		$this->load->view('admin/pendaftaran/vi_pendaftaran',$data);
    }

    public function tampil_detail()
    // ($ID_PND)
    {
        // $data["pendaftaran_pkl"] = $this->m_pendaftaran->detail_pnd($ID_PND, 'pendaftaran_pkl')->result();
        $this->load->view("admin/pendaftaran/vi_dt_pendaftaran"); 
    }

}