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
        $data['title'] = 'Data Pendaftaran';
        $data['user'] = $this->db->get_where('user', [
            'email' =>
            $this->session->userdata('email')    
        ])->row_array();

        $email = $this->session->userdata('email');
        $sql = $this->db->query("SELECT role FROM user_role WHERE id_role IN 
                                (SELECT role_id FROM user WHERE email = '$email');");
        foreach ($sql->result() as $rl)
        {
            $role = $rl->role;
        }
        $data['role'] = $role;
        $data['pendaftaran_ditolak'] = $this->m_pendaftaran->tampil_ditolak()->result();
        $data['pendaftaran'] = $this->m_pendaftaran->tampil_pnd()->result();
        $data['status'] = $this->m_pendaftaran->status_pnd()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pendaftaran/vi_pendaftaran', $data);
        $this->load->view('templates/footer', $data);
    }

    // proses ubah status pendaftaran
    public function pr_ubah_st_pendaftaran()
    {
        $ID_PND = $this->input->post('ID_PND');
        $ID_ST = $this->input->post('ID_ST');
        $this->m_pendaftaran->ubah_status($ID_ST, $ID_PND);
        redirect('pendaftaran/index');
    }

    // tampil data 1 tim pendaftar pada admin
    public function tampil_detail($ID_PND)
    {
        $data['title'] = 'Detail Pendaftaran | SI JTI-PKL';
        $data['user'] = $this->db->get_where('user', [
            'email' =>
            $this->session->userdata('email')    
        ])->row_array();

        $data['pendaftaran'] = $this->m_pendaftaran->tampil_dt_pnd($ID_PND, 'pendaftaran')->result();
        $data['pendaftaran_klp'] = $this->m_pendaftaran->tampil_dt_klp($ID_PND, 'pendaftaran_klp')->result();
        $data['jumlah_pr'] = $this->m_pendaftaran->jmlh_pr()->result();
        $data['comboDS'] = $this->m_pendaftaran->comboDS()->result();
        $data['bulan'] = $this->m_pendaftaran->bulan()->result();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pendaftaran/vi_dt_pendaftaran', $data);
        $this->load->view('templates/footer', $data);
    }

    public function download_proposal($PROPOSAL)
    {
        force_download('assets/proposal/'.$PROPOSAL,NULL);
    }

    public function download_bukti($BUKTI)
    {
        force_download('assets/bukti/'.$BUKTI,NULL);
    }

    // proses ubah data pendaftaran
    public function  pr_ubah_pnd()
    {
        $ID_PND = htmlspecialchars($this->input->post('ID_PND'));
        $ID_PR = htmlspecialchars($this->input->post('ID_PR'));
        $ID_DS = htmlspecialchars($this->input->post('ID_DS'));
        $bulan = htmlspecialchars($this->input->post('bulan'));
        $tahun = htmlspecialchars($this->input->post('tahun'));
        $WAKTU = "$bulan, "."$tahun";

        $data = array(
            'ID_PR' => $ID_PR,
            'ID_DS' => $ID_DS,
            'WAKTU' => $WAKTU
        );
     
        $where = array(
            'ID_PND' => $ID_PND
        );
     
        $this->m_pendaftaran->ubah_data_pnd($where, $data,'pendaftaran');
        redirect('pendaftaran/tampil_detail/'.$ID_PND);
    }

    // hapus data pendaftaran
    public function hapus_data()
    {
        $ID_PND = htmlspecialchars($this->input->post('ID_PND'));
        $sql = $this->db->query("SELECT mahasiswa.ID_M FROM mahasiswa INNER JOIN pendaftaran_klp ON mahasiswa.ID_M = pendaftaran_klp.ID_M 
                                WHERE mahasiswa.ST_KETUA =	1 AND pendaftaran_klp.ID_PND = '$ID_PND';");
        foreach ($sql->result() as $id)
        {
                $ID_M = $id->ID_M;
        }
        $this->m_pendaftaran->hapus_st_ketua($ID_M);
        $this->m_pendaftaran->hapus_data_klp($ID_PND);
        $this->m_pendaftaran->hapus_data_pnd($ID_PND);
        redirect('pendaftaran');
    }

    // hapus data anggota
    public function hapus_data_anggota()
    {
        $ID_M = $this->input->post('ID_M');
        $this->m_pendaftaran->hapus_anggota($ID_M);
        redirect('pendaftaran');
    }

    // proses tambah data anggita di detail
    public function pr_dt_tmbh_anggota()
    {
        $ID_PND = $this->input->post('ID_PND');
        $NIM = htmlspecialchars($this->input->post('NIM'));
        $this->m_pendaftaran->dt_tmbh_anggota($ID_PND, $NIM);
        redirect('pendaftaran/tampil_detail/'.$ID_PND);
    }
}