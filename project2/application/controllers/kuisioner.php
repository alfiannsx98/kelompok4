<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kuisioner extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_kuisioner');
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Management Kuisioner';
        $data['user'] = $this->db->get_where('user', [
            'email' => 
            $this->session->userdata('email')
        ])->row_array();
        $data['kuisioner'] = $this->db->get('kuisioner')->result_array();

        $this->form_validation->set_rules('kuisioner', 'Kuisioner', 'required');

        $query = $this->db->query('SELECT * FROM kuisioner');
        $tabel = $query->num_rows();
        if($tabel >= 10){
            $id_kuisioner = "KU0" . ($tabel + 1);
        }elseif($tabel >= 100){
            $id_kuisioner = "KU" . ($tabel + 1);
        }else{
            $id_kuisioner = "KU000" . ($tabel + 1);
        }

        if($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kuisioner/index', $data);
            $this->load->view('templates/footer');
        }else{
            $data = [
                'id_kuisioner' => $id_kuisioner,
                'kuisioner' => htmlspecialchars($this->input->post('kuisioner')
            )];
            $this->db->insert('kuisioner', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
            redirect('kuisioner');
        }
    }
    public function edit_kuisioner()
    {
        $this->form_validation->set_rules('kuisioner', 'Kuisioner', 'required');

        if($this->form_validation->run() == false){
            redirect('kuisioner');
        }else{
            $id = htmlspecialchars($this->input->post('id_kuisioner'));
            $kuisioner = htmlspecialchars($this->input->post('kuisioner'));
            $this->m_kuisioner->edit_kuisioner($id, $kuisioner);
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Data Berhasil Diubah</div>');
            redirect('kuisioner');
        }
    }
    public function hapus_kuisioner()
    {
        $id = $this->input->post('id_kuisioner');
        $this->m_kuisioner->hapus_kuisioner($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Berhasil Dihapus</div>');
        redirect('kuisioner');
    }
    
}
?>