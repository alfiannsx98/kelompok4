<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perusahaan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_perusahaan');
        is_logged_in();
    }

    public function index()
    {

        $query = $this->db->query('SELECT * FROM perusahaan');
        $tabel = $query->num_rows();
        $date = date('dm', time());
        $id_p = "ID-P" . $tabel . $date;

        $data['title'] = 'Data Perusahaan';
        $data['user'] = $this->db->get_where('user', [
            'email' => 
            $this->session->userdata('email')
        ])->row_array();

        $data['pt'] = $this->m_perusahaan->getPerusahaan();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => 'masukkan nama perusahaan'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
            'required' => 'masukkan alamat perusahaan'
        ]);
        $this->form_validation->set_rules('nohp', 'Nohp', 'required', [
            'required' => 'masukkan nohp perusahaan'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim', [
            'required' => 'masukkan email perusahaan'
        ]);
        $this->form_validation->set_rules('rating', 'Rating', 'required', [
            'required' => 'beri rating perusahaan'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('perusahaan/v_perusahaan', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/js_reg');
        } else {
            $data = [
                'ID_PR' => $id_p,
                'NAMA_PR' => $this->input->post('nama'),
                'ALAMAT_PR' => $this->input->post('alamat'),
                'HP_PR' => $this->input->post('nohp'),
                'EMAIL_PR' => $this->input->post('email'),
                'RATING' => $this->input->post('rating')
            ];
            $this->db->insert('perusahaan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
            redirect('Perusahaan');
        }
    }

    public function hapus_perusahaan(){
        $id = $this->input->post('id_pr');
        $this->m_perusahaan->hapus_pr($id);
        $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">Data Berhasil Dihapus</div>');
        redirect('Perusahaan');
    }

    public function edit_perusahaan()
    {
        $id = $this->input->post('id_pr');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $nohp = $this->input->post('nohp');
        $email = $this->input->post('email');
        $rating = $this->input->post('rating');
        $this->m_perusahaan->edit_pr($id,  $nama, $alamat, $nohp, $email, $rating);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Diedit</div>');
        redirect('Perusahaan');
    }
}