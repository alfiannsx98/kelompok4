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

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'masukkan nama perusahaan'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'masukkan alamat perusahaan'
        ]);
        $this->form_validation->set_rules('nohp', 'Nohp', 'required|trim|min_length[12]|max_length[13]', [
            'required' => 'masukkan nohp perusahaan'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'masukkan email perusahaan'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('perusahaan/v_perusahaan', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_image = $_FILES['gambar'];

                if ($upload_image) {
                    $config['allowed_types'] = 'gif|jpg|jpeg|png';
                    $config['max_size'] = '2048';
                    $config['upload_path'] = './assets/dist/img/perusahaan/';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('gambar')) {
                        $new_image = $this->upload->data('file_name');
                        $data = [
                            'ID_PR' => $id_p,
                            'NAMA_PR' => $this->input->post('nama'),
                            'ALAMAT_PR' => $this->input->post('alamat'),
                            'HP_PR' => $this->input->post('nohp'),
                            'EMAIL_PR' => $this->input->post('email'),
                            'RATING' => 0,
                            'gambar' => $new_image
                        ];
                        $this->db->insert('perusahaan', $data);
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
                    } else {
                        echo $this->upload->display_errors();
                    }
                }
            redirect('Perusahaan');
        }
    }

    public function hapus_perusahaan(){
        $data['title'] = 'Edit Perusahaan';
        $data['pt'] = $this->db->get_where('perusahaan', [
            'ID_PR' => 
            $this->input->post('id_pr')
        ])->row_array();

        $id = $this->input->post('id_pr');
        $this->m_perusahaan->hapus_pr($id);
        $error = $this->db->error();
        if($error['code'] != 0)
        {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Gagal Dihapus</div>');
            redirect('Perusahaan');
        }else{
            $image = $data['pt']['gambar'];
            unlink(FCPATH . 'assets/dist/img/perusahaan/' . $image);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus</div>');
            redirect('Perusahaan');
        }
    }

    public function edit_perusahaan()
    {   
        $data['title'] = 'Edit Perusahaan';
        $data['user'] = $this->db->get_where('user', [
            'email' =>
            $this->session->userdata('email')
        ])->row_array();
        $data['pt'] = $this->db->get_where('perusahaan', [
            'ID_PR' => 
            $this->input->post('id_pr')
        ])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'masukkan nama perusahaan'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'masukkan alamat perusahaan'
        ]);
        $this->form_validation->set_rules('nohp', 'Nohp', 'required|trim|min_length[12]|max_length[13]', [
            'required' => 'masukkan nohp perusahaan'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'masukkan email perusahaan'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $nama = $this->input->post('nama');
            $alamat = $this->input->post('alamat');
            $nohp = $this->input->post('nohp');
            $email = $this->input->post('email');
            $id = $this->input->post('id_pr');

            //cek jika ada gambar

            $upload_image = $_FILES['gambar'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/dist/img/perusahaan/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $old_image = $data['pt']['gambar'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/dist/img/perusahaan/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('NAMA_PR', $nama);
            $this->db->set('ALAMAT_PR', $alamat);
            $this->db->set('HP_PR', $nohp);
            $this->db->set('EMAIL_PR', $email);
            $this->db->where('ID_PR', $id);
            $this->db->update('perusahaan');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Diperbarui</div>');
            redirect('perusahaan');
        }
    }
}