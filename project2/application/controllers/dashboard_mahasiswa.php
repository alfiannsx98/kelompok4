<?php
defined('BASEPATH') or exit('No direct script access allowed');

/** Controllers untuk user mahasiswa */

class dashboard_mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('m_perusahaan');
        // is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'List Perusahaan';
        $data['user'] = $this->db->get_where('user', [
            'email' =>
            $this->session->userdata('email')
        ])->row_array();

        $data['show_pr'] = $this->db->get_where('perusahaan')->result_array();

        // Start konfigurasi Pagination
        $config['base_url'] = site_url('dashboard_mahasiswa/index');
        $config['total_rows'] = $this->db->count_all('perusahaan');
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $choice = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = floor($choice);

        // Style pagination
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        // Panggil function get perusahaan
        $data['data'] = $this->m_perusahaan->get_perusahaan_list($config['per_page'], $data['page']);

        $data['pagination'] = $this->pagination->create_links();
        // Akhir Pagination

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('list_perusahaan/index', $data);
        $this->load->view('templates/footer');
    }

    /**
     * ===========================================
     * function pengajuan pkl baru
     * ===========================================
     */
    public function pklbaru() 
    {
        $data['title'] = 'Pengajuan Tempat PKL Baru';
        $data['title2'] = 'Data Pengajuan';
        $data['user'] = $this->db->get_where('user', [
            'email' =>
            $this->session->userdata('email')
        ])->row_array();

        $query = $this->db->query('SELECT * FROM perusahaan');
        $tabel = $query->num_rows();
        if($tabel >= 10){
            $id_p = "PR0" . ($tabel + 1);
        }elseif($tabel >= 100){
            $id_p = "PR" . ($tabel + 1);
        }else{
            $id_p = "PR000" . ($tabel + 1);
        }
        
        $id_m = $data['user']['identity'];
        $data['pt'] = $this->m_perusahaan->getPklBaru($id_m)->result_array();
        

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'kolom ini harus di isi'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'kolom ini harus di isi'
        ]);
        $this->form_validation->set_rules('nohp', 'Nohp', 'required|trim|min_length[12]|max_length[13]', [
            'required' => 'kolom ini harus di isi',
            'min_length' => 'format nomer hp yang dimasukkan salah',
            'max_length' => 'format nomer hp yang dimasukkan salah'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'kolom ini harus di isi',
            'valid_email' => 'kolom ini harus di isi email'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('usermhs/pklbaru', $data);
            $this->load->view('templates/footer');
        } else {
            $nama = htmlspecialchars($this->input->post('nama'));
            $alamat = htmlspecialchars($this->input->post('alamat'));
            $no_hp = htmlspecialchars($this->input->post('nohp'));
            $email = htmlspecialchars($this->input->post('email'));
            
            $upload_image = $_FILES['gambar'];

            /**
             * =========================
             * query agar tidak duplikat
             * =========================
             */
            $duplicate = $this->db->get_where('perusahaan', [
                'NAMA_PR' => $nama,
                'ALAMAT_PR' => $alamat,
                'HP_PR' => $no_hp,
                'EMAIL_PR' => $email
            ])->row_array();

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '4096';
                $config['upload_path'] = './assets/dist/img/perusahaan/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $new_image = $this->upload->data('file_name');
                    $gambar = $new_image; 
                } else {
                    echo $this->upload->display_errors();
                    $gambar = 'default.jpg';
                }
            }else{
                $gambar = 'default.jpg';
            }
            
            $data1 = [
                'ID_PR' => $id_p,
                'NAMA_PR' => $nama,
                'ALAMAT_PR' => $alamat,
                'HP_PR' => $no_hp,
                'EMAIL_PR' => $email,
                'gambar' => $gambar
                // 'confirm' => '0'
            ];

            $data2 = [
                'ID_M' => $id_m,
                'ID_PR' => $id_p
            ];


            /**
             * =====================================
             * pencegahan duplikasi data
             * =====================================
             */
            if($duplicate) 
            {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Sudah Ada Yang Mengajukan Perusahaan Ini</div>');
                redirect('dashboard_mahasiswa/pklbaru');
            }
            else
            {   
                $a = $this->db->insert('perusahaan', $data1);
                $b = $this->db->insert('pkl_baru', $data2);
                var_dump($a);
                var_dump($b);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
                redirect('dashboard_mahasiswa/pklbaru');
            }
        }
    }

    // public function konfirm($id)
    // {   
    //     $where = array('ID_PR' => $id);
    //     $this->m_perusahaan->con($where);
    //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Konfirmasi Sukses</div>');
    //     redirect('dashboard_mahasiswa/pklbaru');
    // }

    // public function hapus($id)
    // {
    //     $this->m_perusahaan->del($id);
    //     $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Berhasil Dihapus</div>');
    //     redirect('dashboard_mahasiswa/pklbaru');
    // }

    public function batal_permohonan()
    {
        $data['pt'] = $this->db->get_where('perusahaan', [
            'ID_PR' => 
            $this->input->post('id_pr')
        ])->row_array();

        $id = $this->input->post('id_pr');
        $this->m_perusahaan->batal($id);
        $error = $this->db->error();
        if($error['code'] != 0)
        {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Gagal Dihapus</div>');
            redirect('dashboard_mahasiswa/pklbaru');
        }else{
            $image = $data['pt']['gambar'];
            unlink(FCPATH . 'assets/dist/img/perusahaan/' . $image);
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Pengajuan Berhasil Dibatalkan</div>');
            redirect('dashboard_mahasiswa/pklbaru');
        }
    }

    public function edit_permohonan()
    {   
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'kolom ini harus di isi'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'kolom ini harus di isi'
        ]);
        $this->form_validation->set_rules('nohp', 'Nohp', 'required|trim|min_length[12]|max_length[13]', [
            'required' => 'kolom ini harus di isi',
            'min_length' => 'format nomer hp yang dimasukkan salah',
            'max_length' => 'format nomer hp yang dimasukkan salah'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'kolom ini harus di isi',
            'valid_email' => 'kolom ini harus di isi email'
        ]);

        $nama = htmlspecialchars($this->input->post('nama'));
        $alamat = htmlspecialchars($this->input->post('alamat'));
        $nohp = htmlspecialchars($this->input->post('nohp'));
        $email = htmlspecialchars($this->input->post('email'));
        $id = htmlspecialchars($this->input->post('id_pr'));
        $gambar_lama = htmlspecialchars($this->input->post('gambar_lama'));

        //cek jika ada gambar

        $upload_image = $_FILES['gambar'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '4096';
                $config['upload_path'] = './assets/dist/img/perusahaan/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $new_image = $this->upload->data('file_name');
                    $gambar = $new_image; 
                } else {
                    echo $this->upload->display_errors();
                    $gambar = $gambar_lama;
                }
            }else{
                $gambar = $gambar_lama;
            }

        $this->db->set('NAMA_PR', $nama);
        $this->db->set('ALAMAT_PR', $alamat);
        $this->db->set('HP_PR', $nohp);
        $this->db->set('EMAIL_PR', $email);
        $this->db->set('gambar', $gambar);
        $this->db->where('ID_PR', $id);
        $this->db->update('perusahaan');
        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Data Berhasil Diperbarui</div>');
        redirect('dashboard_mahasiswa/pklbaru');
    }
}