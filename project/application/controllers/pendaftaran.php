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
		$this->load->view('admin/vi_pendaftaran',$data);
    }

    public function detail($ID_PND)
    {
        $data["pendaftaran_pkl"] = $this->m_pendaftaran->detail($ID_PND, 'pendaftaran_pkl')->result();
        $this->load->view("admin/vi_dt_pendaftaran"); 
    }

}