<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prodi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_prodi');
        // is_logged_in();
    }
    public function index()
    {
        $query = $this->db->query("SELECT * FROM prodi");
        // Membuat id_user : gabungan dari date dan field 
        $tabel = $query->num_rows();
        $date = date('dm', time());
        $id_pr = "ID-P" . $tabel . $date;

        $data['title'] = 'Program Studi';
        $data['user'] = $this->db->get_where('user', [
            'email' => 
            $this->session->userdata('email')
        ])->row_array();

        $data['prodi'] = $this->db->get('prodi')->result_array();

        $this->form_validation->set_rules('prodi', 'Prodi', 'required', [
            'required' => 'masukkan nama program studi'
        ]);

        if($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('prodi/v_prodi', $data);
            $this->load->view('templates/footer');
        }else{
            $data = [
                'id_prd' => $id_pr,
                'nama_prd' => $this->input->post('prodi')
            ];
            $this->db->insert('prodi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
            redirect('Prodi');
        }
    }

    public function edit_prodi()
    {
        $id = $this->input->post('id_prd');
        $nama = $this->input->post('nama');
        $this->m_prodi->edit_prd($id,  $nama);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Diedit</div>');
        redirect('Prodi');
    }

    public function hapus_prodi(){
        $id = $this->input->post('id_prd');
        $this->m_prodi->hapus_prd($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Berhasil Dihapus</div>');
        redirect('Prodi');
    }
}