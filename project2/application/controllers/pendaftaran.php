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
        $data['title'] = 'Data Pendaftaran | SI JTI-PKL';
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

        // $ID_PND = $_POST['ID_PND'];
        // $ID_M = $_POST['ID_M'];
        // $data = array();

        // $index = 0;
        // foreach ($ID_PND as $PND){
        //     array_push($data, array(
        //         'ID_PND' => $PND,
        //         'ID_M' => $ID_M[$index],
        //     ));

        //     $index++;
        // }
        // $sql = $this->m_pendaftaran->tmbh_nim($data);
        // redirect ('pendaftaran/index');
    }

    public function download_proposal($PROPOSAL)
    {
        // $PROPOSAL = $this->input->post('PROPOSAL');
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

    
    // UNTUK MAHASISWA
    // proses cek pendaftaran
    // public function cek_pendaftaran()
    // {
    //     $data['title'] = 'Dashboard';
    //     $data['user'] = $this->db->get_where('user', ['email' =>
    //         $this->session->userdata('email')    
    //     ])->row_array();

    //     $email = $this->session->userdata('email');
    //     $query = $this->db->query("SELECT pendaftaran_klp.ID_M, pendaftaran.ID_PND, status_pendaftaran.NAMA_ST 
    //                         FROM pendaftaran_klp, pendaftaran, status_pendaftaran, mahasiswa 
    //                         WHERE pendaftaran_klp.ID_M = mahasiswa.ID_M 
    //                         AND pendaftaran_klp.ID_PND = pendaftaran.ID_PND 
    //                         AND pendaftaran.ID_ST = status_pendaftaran.ID_ST 
    //                         AND status_pendaftaran.NAMA_ST != 'DITOLAK'
    //                         AND mahasiswa.NIM IN (SELECT user.identity FROM user WHERE user.email = '$email');");
    //     foreach ($query->result() as $que)
    //     {
    //             $ID_M = $que->ID_M;
    //             $NAMA_ST = $que->NAMA_ST;
    //             $ID_PND = $que->ID_PND;
    //     }
    //     if ($ID_M == ''){
    //         redirect('pendaftaran/tambah_data');
    //     }
    //     elseif ($ID_M != '') {
    //         redirect('pendaftaran/pnd_mhs/'.$ID_PND);
    //     } else {
    //         redirect('pendaftaran/pnd_mhs/'.$ID_PND);
    //     }
    // }

    // masuk form pendaftaran pada mahasiswa (Isian kelompok)
    // public function tambah_data() 
    // {
    //     $data['title'] = 'Dashboard';
    //     $data['user'] = $this->db->get_where('user', [
    //         'email' =>
    //         $this->session->userdata('email')    
    //     ])->row_array();

    //     // select NIM n ID M
    //     $email = $this->session->userdata('email');
    //     $query = $this->db->query("SELECT identity FROM user WHERE email = '$email';");
    //     foreach ($query->result() as $que){
    //         $NIM = $que->identity;
    //     }
    //     $data['NIM'] = $NIM;
    //     $query = $this->db->query("SELECT ID_M FROM mahasiswa WHERE NIM = '$NIM';");
    //     foreach ($query->result() as $que){
    //         $ID_M = $que->ID_M;
    //     }
    //     $data['ID_M'] = $ID_M;
    //     // buat id pendaftaran
    //     $ID = $this->m_pendaftaran->selectMaxID();
    //     if ($ID == NULL) {
    //         $data['ID_PND'] = 'PND00001';
    //     } else {
    //         $nourut = substr($ID, 3, 5);
    //         $ID_NOW = $nourut + 1;
    //         $data['ID_PND'] = 'PND'.sprintf("%05s", $ID_NOW);
    //     }
    //     $data['comboDS'] = $this->m_pendaftaran->comboDS()->result();
    //     $data['bulan'] = $this->m_pendaftaran->bulan()->result();
    //     $data['jumlah_pr'] = $this->m_pendaftaran->jmlh_pr()->result();

    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('pendaftaran/vi_tmbh_pend', $data);
    //     $this->load->view('templates/footer', $data);
    // }
        

    // proses tambah data pada mahasiswa (Isian kelompok)
    // public function pr_tmbh_pnd()
    // {
    //     $ID_PND = htmlspecialchars($this->input->post('ID_PND'));
    //     $ID_PR = htmlspecialchars($this->input->post('ID_PR'));
    //     $ID_DS = htmlspecialchars($this->input->post('ID_DS'));
    //     $bulan = htmlspecialchars($this->input->post('bulan'));
    //     $tahun = htmlspecialchars($this->input->post('tahun'));
    //     $WAKTU = "$bulan, "."$tahun";
    //     $ID_ST = htmlspecialchars($this->input->post('ID_ST'));
    //     $NIM = htmlspecialchars($this->input->post('NIM'));
    //     $ID_M = htmlspecialchars($this->input->post('ID_M'));
    //     $ST_PENDAFTARAN = htmlspecialchars($this->input->post('ST_PENDAFTARAN'));

    //     // untuk upload proposal
    //     $config['upload_path']          = './assets/proposal/';
    //     $config['allowed_types']        = 'doc|docx';
    //     $config['max_size']             = 0;
    //     // $config['encrypt_name']         = true;

    //     $this->load->library('upload');
    //     $this->upload->initialize($config);

    //     if ( ! $this->upload->do_upload('PROPOSAL'))
    //     {
    //             $error = array('error' => $this->upload->display_errors());

    //             $this->load->view('pendaftaran/tambah_data', $error);
    //     }
    //     else
    //     {
    //             $upload_data = $this->upload->data();
    //             $data = array(
    //                 'ID_PND' => $ID_PND,
    //                 'ID_PR' => $ID_PR,
    //                 'ID_DS' => $ID_DS,
    //                 'WAKTU' => $WAKTU,
    //                 'PROPOSAL' => $upload_data['file_name'],
    //                 'ID_ST' => $ID_ST,
    //                 'ST_PENDAFTARAN' => $ST_PENDAFTARAN
    //             );

    //             $tim = array(
    //                 'ID_PND' => $ID_PND,
    //                 'ID_M' => $ID_M
    //             );

    //         $this->m_pendaftaran->tmbh_pnd($data,'pendaftaran');
    //         $this->m_pendaftaran->tmbh_ketua($tim, 'pendaftaran_klp');
    //         $this->m_pendaftaran->ubah_st_ketua($NIM);
    //         redirect('pendaftaran/tambah_data2/'.$ID_PND);
    //     }   
    // }

    // masuk form pendaftaran pada mahasiswa (Isian individu)
    // public function tambah_data2($ID_PND)
    // {
    //     $data['title'] = 'Dashboard';
    //     $data['user'] = $this->db->get_where('user', [
    //         'email' =>
    //         $this->session->userdata('email')    
    //     ])->row_array();
    
    //     $data['mahasiswa'] = $this->m_pendaftaran->dropnim()->result();
    //     $data['mhsiswa'] = $this->m_pendaftaran->dropnim2()->result();
    //     $data['ID_PND'] = $ID_PND;

    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('pendaftaran/vi_tmbh_pend2', $data);
    //     $this->load->view('templates/footer', $data);

    // }

    // proses tambah data pada mahasiswa (Isian individu)
    // public function pr_tmbh_pnd2()
    // {
    //     $ID_PND = htmlspecialchars($this->input->post('ID_PND'));
    //     $ID_PNDD = $_POST['ID_PND'];
    //     $ID_M = $_POST['ID_M'];
    //     $data = array();

    //     $index = 0;
    //     foreach ($ID_PNDD as $PND){
    //         array_push($data, array(
    //             'ID_PND' => $PND,
    //             'ID_M' => $ID_M[$index],
    //         ));

    //         $index++;
    //     }
    //     $sql = $this->m_pendaftaran->tmbh_nim($data);
    //     redirect ('pendaftaran/cek_pendaftaran');
    // }

    // public function pnd_mhs($ID_PND)
    // {
    //     $data['title'] = 'Dashboard';
    //     $data['user'] = $this->db->get_where('user', [
    //         'email' =>
    //         $this->session->userdata('email')    
    //     ])->row_array();
    //     $email = $this->session->userdata('email');
    //     $query = $this->db->query("SELECT * FROM user WHERE email = '$email';");
    //     foreach ($query->result() as $user)
    //     {
    //             $ID = $user->identity;
    //     }
    //     $sql= $this->db->query("SELECT ST_KETUA FROM mahasiswa WHERE NIM = '$ID';");
    //     foreach ($sql->result() as $mhs)
    //     {
    //             $ST_KETUA = $mhs->ST_KETUA;
    //     }
    //     $data['ST_KETUA'] = $ST_KETUA;

    //     $data['pendaftaran'] = $this->m_pendaftaran->tampil_pnd_mhs($ID_PND, 'pendaftaran')->result();
    //     $data['pendaftaran_klp'] = $this->m_pendaftaran->tampil_dt_klp($ID_PND, 'pendaftaran_klp')->result();

    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('pendaftaran/vi_pnd_mhs', $data);
    //     $this->load->view('templates/footer', $data);
    // }

    // public function bukti_diterima()
    // {
    //     $ID_PND = $this->input->post('ID_PND');

    //     $config['upload_path']          = './assets/bukti/';
    //     $config['allowed_types']        = 'jpg|jpeg|png';
    //     $config['max_size']             = 0;
    //     // $config['encrypt_name']         = true;

    //     $this->load->library('upload');
    //     $this->upload->initialize($config);

    //     if ( ! $this->upload->do_upload('BUKTI'))
    //     {
    //             $error = array('error' => $this->upload->display_errors());

    //             $this->load->view('pendaftaran/pnd_mhs/'.$ID_PND, $error);
    //     }
    //     else
    //     {
    //         $upload_data = $this->upload->data();
    //         $BUKTI = $upload_data['file_name'];
    //         $this->m_pendaftaran->diterima($ID_PND, $BUKTI);
    //         redirect('pendaftaran/cek_pendaftaran');
    //     }
    // }

    // public function bukti_ditolak()
    // {
    //     $ID_PND = $this->input->post('ID_PND');

    //     $config['upload_path']          = './assets/bukti/';
    //     $config['allowed_types']        = 'jpg|jpeg|png';
    //     $config['max_size']             = 0;
    //     // $config['encrypt_name']         = true;

    //     $this->load->library('upload');
    //     $this->upload->initialize($config);

    //     if ( ! $this->upload->do_upload('BUKTI'))
    //     {
    //             $error = array('error' => $this->upload->display_errors());

    //             $this->load->view('pendaftaran/pnd_mhs', $error);
    //     }
    //     else
    //     {
    //         $upload_data = $this->upload->data();
    //         $BUKTI = $upload_data['file_name'];
    //         // hapus status ketua
    //         $sql = $this->db->query("SELECT mahasiswa.ID_M FROM mahasiswa INNER JOIN pendaftaran_klp ON mahasiswa.ID_M = pendaftaran_klp.ID_M 
    //                             WHERE mahasiswa.ST_KETUA =	1 AND pendaftaran_klp.ID_PND = '$ID_PND';");
    //         foreach ($sql->result() as $id)
    //         {
    //                 $ID_M = $id->ID_M;
    //         }
    //         $this->m_pendaftaran->hapus_st_ketua($ID_M);
    //         $this->m_pendaftaran->ditolak($ID_PND, $BUKTI);
    //         redirect('pendaftaran/cek_pendaftaran');
    //     }
        
    // }

    // public function pr_upload()
    // {
    //     $config['upload_path']          = './assets/proposal/';
    //     $config['allowed_types']        = 'doc|docx';
    //     $config['max_size']             = 0;
    //     // $config['max_width']            = 1024;
    //     // $config['max_height']           = 768;

    //     $this->load->library('upload');
    //     $this->upload->initialize($config);

    //     if ( ! $this->upload->do_upload('PROPOSAL'))
    //     {
    //             $error = array('error' => $this->upload->display_errors());

    //             $this->load->view('pendaftaran/vi_upload', $error);
    //     }
    //     else
    //     {
    //             $upload_data = $this->upload->data();
    //             $data = array(
    //                 'PROPOSAL' => $upload_data['file_name']
    //             );
    //             $this->m_pendaftaran->upload($data);
    //             redirect('pendaftaran/vi');
    //     }
    // }

    // public function tampil_detail_pend()
    // {
    //     $data['title'] = 'Dashboard';
    //     $data['user'] = $this->db->get_where('user', [
    //         'email' =>
    //         $this->session->userdata('email')    
    //     ])->row_array();
        
    //     // $nim = $user['identity'];

    //     $data['data_kelompok'] = $this->m_pendaftaran->data_kel()->result();

    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('pendaftaran/vi_tmpl_pend', $data);
    //     $this->load->view('templates/footer');
    // }

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
