<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_mahasiswa');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Data Mahasiswa';
        $data['user'] = $this->db->get_where('user', [
            'email' => 
            $this->session->userdata('email')
        ])->row_array();

        $data['mhs'] = $this->m_mahasiswa->getMahasiswa();
        $data['menu'] = $this->db->get('user_menu')->result_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('Mahasiswa/v_mahasiswa', $data);
            $this->load->view('templates/footer');
    }

    public function hapus_mahasiswa(){
        $email = $this->input->post('email_mhs');
        $this->m_mahasiswa->hapus_mhs($email);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Berhasil Dihapus</div>');
        redirect('Mahasiswa');
    }

    public function lihat_mahasiswa()
    {
        $id = $this->input->post('id_mhs');
        $nim = $this->input->post('nim');
        $nama = $this->input->post('nama');
        $jk = $this->input->post('jk');
        $prodi = $this->input->post('prodi');
        $semester = $this->input->post('semester');
        $alamat = $this->input->post('alamat');
        $nohp = $this->input->post('nohp');
        $email = $this->input->post('email');
        $this->m_mahasiswa->lihat_mhs($id, $nim, $nama, $jk, $prodi, $semester, $alamat, $nohp, $email);
    }
}