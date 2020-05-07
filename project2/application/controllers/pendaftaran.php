<?php

class Pendaftaran extends CI_Controller
{
    function __construct(){
		parent::__construct();		
		$this->load->model('m_pendaftaran');
        $this->load->helper('url');
        is_logged_in();
        $this->load->model('model_admin');
	}

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', [
            'email' =>
            $this->session->userdata('email')    
        ])->row_array();

        $data['pendaftaran'] = $this->m_pendaftaran->tampil_pnd()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pendaftaran/vi_pendaftaran', $data);
        $this->load->view('templates/footer');

        
		// $this->load->view('pendaftaran/vi_pendaftaran', $data);
    }

    public function tampil_detail($ID_PND)
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', [
            'email' =>
            $this->session->userdata('email')    
        ])->row_array();

        $data['pendaftaran'] = $this->m_pendaftaran->tampil_dt_pnd($ID_PND, 'pendaftaran')->result();
        $data["pendaftaran_klp"] = $this->m_pendaftaran->tampil_dt_klp($ID_PND, 'pendaftaran_klp')->result();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pendaftaran/vi_dt_pendaftaran', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_data() {
        $dariDB = $this->m_pendaftaran->selectMaxID();
        $nourut = substr($dariDB, 3);
        $kodeBarangSekarang = $nourut + 1;
        $data = array('ID_PND' => $kodeBarangSekarang);

        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', [
            'email' =>
            $this->session->userdata('email')    
        ])->row_array();
    
        $data['comboPR'] = $this->m_pendaftaran->comboPR()->result();
        $data['comboDS'] = $this->m_pendaftaran->comboDS()->result();
        $data['mahasiswa'] = $this->db->get('mahasiswa')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pendaftaran/vi_tmbh_pend', $data);
        $this->load->view('templates/footer');
    }

    public function pr_tmbh_pnd(){
        $ID_PND = $this->input->post('ID_PND');
        $ID_PR = $this->input->post('ID_PR');
        $ID_DS = $this->input->post('ID_DS');

        $data = array(
            'ID_PND' => $ID_PND,
            'ID_PR' => $ID_PR,
            'ID_DS' => $ID_DS
        );

        $this->m_pendaftaran->tmbh_pnd($data,'pendaftaran');
        redirect('pendaftaran/tambah_data');
    }

    public function c_cari(){
        $this->load->view('pendaftaran/cari.php');
    }

    public function coba()
    {
        $data['title'] = 'Coba';
        $data['mahasiswa'] = $this->db->get('mahasiswa')->result_array();
        $data['user'] = $this->db->get_where('user', [
            'email' =>
            $this->session->userdata('email')    
        ])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pendaftaran/coba', $data);
        $this->load->view('templates/footer', $data);
    }
}
