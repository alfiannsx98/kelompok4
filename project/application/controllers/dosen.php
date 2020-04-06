<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_dosen');
        is_logged_in();
    }
    public function admin_prodi()
    {
        $data['title'] = 'Admin Program Studi';
        $data['user'] = $this->db->get_where('user', [
            'email' => 
            $this->session->userdata('email')
        ])->row_array();

        $data['admin_prodi'] = $this->db->get('admin_prodi')->result_array();

        $query = $this->db->query("SELECT * FROM admin_prodi"); 
        $tabel = $query->num_rows();
        $id_u = "ADM" . $tabel . ($tabel+1) . date('s', time()) ;

        $this->form_validation->set_rules('NIP_ADM', 'NIP Admin', 'required');
        $this->form_validation->set_rules('NAMA_ADM', 'Nama Admin', 'required');
        $this->form_validation->set_rules('JK_ADM', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('ALAMAT_ADM', 'Alamat Admin', 'required');
        $this->form_validation->set_rules('HP_ADM', 'No HP', 'required');
        $this->form_validation->set_rules('PRODI_ADM', 'Program Studi', 'required');
        $this->form_validation->set_rules('EMAIL_ADM', 'Email', 'required');
        $this->form_validation->set_rules('PASSWORD_ADM', 'Password', 'required');

        if($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('dosen/admin_prodi', $data);
            $this->load->view('templates/footer');
        }else{
            $data = [
                'ID_ADM' => $id_u,
                'NIP_ADM' => $this->input->post('NIP_ADM'),
                'NAMA_ADM' => $this->input->post('NAMA_ADM'),
                'JK_ADM' => $this->input->post('JK_ADM'),
                'ALAMAT_ADM' => $this->input->post('ALAMAT_ADM'),
                'HP_ADM' => $this->input->post('HP_ADM'),
                'PRODI_ADM' => $this->input->post('PRODI_ADM')
            ];
            $dataUser = [
                'id_user' => $this->input->post('NIP_ADM'),
                'nama' => $this->input->post('NAMA_ADM'),
                'email' => $this->input->post('EMAIL_ADM'),
                'image' => "default.jpg",
                'password' => $this->input->post('PASSWORD_ADM'),
                'about' => "#",
                'role_id' => 12,
                'is_active' => 0,
                'date_created' => time(),
                'change_pass' => 0
            ];
            $this->db->insert('user', $dataUser);
            $this->db->insert('admin_prodi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
            redirect('dosen/admin_prodi');
        }
    }
    public function edit_admin_prodi()
    {
        $this->form_validation->set_rules('NIP_ADM', 'NIP Admin', 'required');
        $this->form_validation->set_rules('NAMA_ADM', 'Nama Admin', 'required');
        $this->form_validation->set_rules('JK_ADM', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('ALAMAT_ADM', 'Alamat Admin', 'required');
        $this->form_validation->set_rules('HP_ADM', 'No HP', 'required');
        $this->form_validation->set_rules('PRODI_ADM', 'Program Studi', 'required');
        $this->form_validation->set_rules('EMAIL_ADM', 'Email', 'required');
        $this->form_validation->set_rules('PASSWORD_ADM', 'Password', 'required');

        if($this->form_validation->run() == false){
            redirect('menu');
        }else{
            $id = $this->input->post('ID_ADM');
            $nip = $this->input->post('NIP_ADM');
            $nama_adm = $this->input->post('NAMA_ADM');
            $jk_adm = $this->input->post('JK_ADM');
            $alamat_admin = $this->input->post('ALAMAT_ADM');
            $no_hp_admin = $this->input->post('HP_ADM');
            $prodi_admin = $this->input->post('PRODI_ADM');
            $email_admin = $this->input->post('EMAIL_ADM');
            $password_admin = $this->input->post('PASSWORD_ADM');
            $this->model_dosen->edit_admin_prodi($id, $nip, $nama_adm, $jk_adm, $alamat_admin, $no_hp_admin, $prodi_admin, $email_admin, $password_admin);
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Data Berhasil Diubah</div>');
            redirect('dosen/admin_prodi');
        }
    }
    public function hapus_admin_prodi()
    {
        $id = $this->input->post('ID_ADM');
        $this->model_dosen->hapus_admin_prodi($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Berhasil Dihapus</div>');
        redirect('dosen/admin_prodi');
    }
}
?>