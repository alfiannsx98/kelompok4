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
        $data['title'] = 'Data Perusahaan';
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

        $data['pt'] = $this->db->get_where('perusahaan', ['confirm' => '1'])->result_array();
        
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('nohp', 'Nohp', 'required|trim|min_length[12]|max_length[13]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('perusahaan/v_perusahaan', $data);
            $this->load->view('templates/footer');
        } else {
            $nama = htmlspecialchars($this->input->post('nama'));
            $alamat = htmlspecialchars($this->input->post('alamat'));
            $no_hp = htmlspecialchars($this->input->post('nohp'));
            $email = htmlspecialchars($this->input->post('email'));

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
                        $gambar = 'default.jpg';
                    }
                }else{
                    $gambar = 'default.jpg';
                }
                $data = [
                    'ID_PR' => $id_p,
                    'NAMA_PR' => $nama,
                    'ALAMAT_PR' => $alamat,
                    'HP_PR' => $no_hp,
                    'EMAIL_PR' => $email,
                    'gambar' => $gambar
                ];
                $this->db->insert('perusahaan', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
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
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Berhasil Dihapus</div>');
            redirect('Perusahaan');
        }
    }

    public function edit_perusahaan()
    {   
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('nohp', 'Nohp', 'required|trim|min_length[12]|max_length[13]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

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
        redirect('perusahaan');
    }
}
