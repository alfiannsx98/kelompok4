<?php

class Pendaftaran extends CI_Controller
{
    function __construct()
    {
		parent::__construct();		
		$this->load->model('m_pendaftaran');
        $this->load->helper('url');
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload');
        is_logged_in();
        $this->load->model('model_admin');
        $this->load->model('search_model_pend');
	}

    // tampil data pendaftar pada admin
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

    // tampil data 1 tim pendaftar pada admin
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

    // proses ubah status pendaftaran
    public function pr_ubah_st_pendaftaran()
    {
        $ID_PND = $this->input->post('ID_PND');
        $ST_PENDAFTARAN = $this->input->post('ST_PENDAFTARAN');
        $this->m_pendaftaran->ubah_status($ST_PENDAFTARAN, $ID_PND);
        redirect('pendaftaran/index');
    }

    // masuk form pendaftaran pada mahasiswa (Isian kelompok)
    public function tambah_data() 
    {
        // method yang dibuat didin
        // $dariDB = $this->m_pendaftaran->selectMaxID();
        // $nourut = substr($dariDB, 3);
        // $kodeBarangSekarang = $nourut + 1;
        // $data = array('ID_PND' => $kodeBarangSekarang);

        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', [
            'email' =>
            $this->session->userdata('email')    
        ])->row_array();
    
        // $data['comboPR'] = $this->m_pendaftaran->comboPR()->result();
        $data['comboDS'] = $this->m_pendaftaran->comboDS()->result();
        $data['bulan'] = $this->m_pendaftaran->bulan()->result();
        $data['jumlah_pr'] = $this->m_pendaftaran->jmlh_pr()->result();
        $data['mahasiswa'] = $this->m_pendaftaran->dropnim()->result();
        // $mhs = $this->m_pendaftaran->get_mhs();
        // $data['mhs'] = $mhs;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pendaftaran/vi_tmbh_pend', $data);
        $this->load->view('templates/footer');

    }

    // public function data_mhs()
    // {
    //     $data['title'] = 'Dashboard';
    //     $data['user'] = $this->db->get_where('user', [
    //         'email' =>
    //         $this->session->userdata('email')    
    //     ])->row_array();
    //     $data['mhs'] = $this->m_pendaftaran->get_mhs();
    //     $this->load->view('pendaftaran/daftar_siswa', $data);
    // }
    
    // proses tambah data pada mahasiswa (Isian kelompok)
    public function pr_tmbh_pnd()
    {
        $ID_PND = $this->input->post('ID_PND');
        $ID_PR = $this->input->post('ID_PR');
        $ID_DS = $this->input->post('ID_DS');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $waktu = "$bulan, "."$tahun";

        // untuk upload proposal
        $config['upload_path'] = './assets/proposal/';
        $config['allowed_types'] = 'pdf|doc|docx';
        // ambil nama berkas dari input file
        $config['file_name'] = url_title($this->input->post('PROPOSAL'));
        $config['overwrite'] = true;
        $config['max_size'] = 2048; // 2 MB

        $this->upload->initialize($config); //meng set config yang sudah di atur
        // if( $this->upload->do_upload('PROPOSAL')) {
            $data = array(
            'ID_PND' => $ID_PND,
            'ID_PR' => $ID_PR,
            'ID_DS' => $ID_DS,
            'WAKTU' => $waktu,
            'PROPOSAL'=> $this->upload->file_name
        );
            $this->m_pendaftaran->tmbh_pnd($data,'pendaftaran');
            redirect('pendaftaran/tambah_data2');   
        // }
        // else{
        //     echo $this->upload->display_errors();
        
        // }

    }

    // masuk form pendaftaran pada mahasiswa (Isian individu)
    public function tambah_data2()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', [
            'email' =>
            $this->session->userdata('email')    
        ])->row_array();
    
        $data['mahasiswa'] = $this->m_pendaftaran->dropnim()->result();
        // $mhs = $this->m_pendaftaran->get_mhs();
        // $data['mhs'] = $mhs;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pendaftaran/vi_tmbh_pend2', $data);
        $this->load->view('templates/footer');

    }

    // proses tambah data pada mahasiswa (Isian individu)
    public function pr_tmbh_pnd2()
    {
        $ID_PND = $_POST['ID_PND'];
        $ID_M = $_POST['ID_M'];
        $data = array();

        $index = 0;
        foreach ($ID_PND as $PND){
            array_push($data, array(
                'ID_PND' => $PND,
                'ID_M' => $ID_M[$index],
            ));

            $index++;
        }
        $sql = $this->m_pendaftaran->tmbh_nim($data);
        redirect ('pendaftaran/pnd_mhs');
    }

    public function pnd_mhs()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', [
            'email' =>
            $this->session->userdata('email')    
        ])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pendaftaran/vi_pnd_mhs', $data);
        $this->load->view('templates/footer');
    }

    public function tampil_detail_pend()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', [
            'email' =>
            $this->session->userdata('email')    
        ])->row_array();
        
        // $nim = $user['identity'];

        $data['data_kelompok'] = $this->m_pendaftaran->data_kel()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pendaftaran/vi_tmpl_pend', $data);
        $this->load->view('templates/footer');
    }

// public function baru()
    // {
    //     // buat id pendaftaran
    //     $dariDB = $this->m_pendaftaran->selectMaxID();
    //     $nourut = substr($dariDB, 3);
    //     $kodeBarangSekarang = $nourut + 1;
    //     $data = array('ID_PND' => $kodeBarangSekarang);

    //     // untuk data templates
    //     $data['title'] = 'Baru';
    //     $data['user'] = $this->db->get_where('user', [
    //         'email' =>
    //         $this->session->userdata('email')    
    //     ])->row_array();

    //     // load untuk select option nama perusahaan n dosbing
    //     $data['comboPR'] = $this->m_pendaftaran->comboPR()->result();
    //     $data['comboDS'] = $this->m_pendaftaran->comboDS()->result();
        
    //     // view
    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('pendaftaran/new', $data);
    //     $this->load->view('templates/footer', $data);
    // }

}
