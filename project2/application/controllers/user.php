<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('model_admin');
    }

    public function index()
    {
        // $data['user'] = $this->db->select('user.*, mahasiswa.*');
        // $data['user'] = $this->db->from('user');
        // $data['user'] = $this->db->join('mahasiswa', 'mahasiswa.NIM=user.identity');
        // $data['user'] = $this->db->get();
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->query("SELECT * FROM user JOIN mahasiswa ON mahasiswa.NIM=user.identity", [
            'email' =>
            $this->session->userdata('email')
        ])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }
    function alpha_dash_space($str)
    {
        return ( ! preg_match("/^([-a-z_ ])+$/i", $str)) ? FALSE : TRUE;
    } 
    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['prodi'] = $this->db->get('prodi')->result_array();
        $data['user'] = $this->db->query("SELECT * FROM user JOIN mahasiswa ON mahasiswa.NIM=user.identity", [
            'email' =>
            $this->session->userdata('email')
        ])->row_array();

        $this->form_validation->set_rules('nama', 'Name', 'required|trim|callback_alpha_dash_space',[
            'required' => 'nama harus diisi'
        ]);
        $this->form_validation->set_rules('jk', 'Jk', 'required|trim',[
            'required' => 'pilih jenis kelamin salah satu' 
        ]);
        $this->form_validation->set_rules('prodi', 'Prodi', 'required|trim', [
            'required' => 'silahkan pilih prodi anda'
        ]);
        $this->form_validation->set_rules('semester', 'Semester', 'required|trim',[
            'required' => 'silahkan pilih semester anda'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim',[
            'required' => 'masukkan alamat anda'
        ]);
        $this->form_validation->set_rules('hp', 'Hp', 'required|trim|min_length[11]|max_length[13]',[
            'required' => 'masukkan no hp anda',
            'min_length' => 'nomor telfon terlalu pendek',
            'max_length' => 'nomor telfon terlalu panjang'
        ]);
        $this->form_validation->set_rules('about', 'About', 'required|trim',[
            'required' => 'masukkan bio anda'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $jk = $this->input->post('jk');
            $prodi = $this->input->post('prodi');
            $semester = $this->input->post('semester');
            $alamat = $this->input->post('alamat');
            $hp = $this->input->post('hp');
            $about = $this->input->post('about');

            //cek jika ada gambar

            $upload_image = $_FILES['image'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/image/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/image/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            // $this->db->set('nama', $nama);
            // $this->db->set('nim', $nama);
            // $this->db->set('jk', $nama);
            // $this->db->set('prodi', $nama);
            // $this->db->set('semester', $nama);
            // $this->db->set('alamat', $nama);
            // $this->db->set('hp', $nama);
            // $this->db->set('about', $about);
            // $this->db->where('email', $email);
            // $this->db->update('user');
            $this->db->query("UPDATE user SET nama='$nama', image='$upload_image', about='$about' WHERE email='$email'");
            $this->db->query("UPDATE mahasiswa SET NAMA_M='$nama', JK_M='$jk', PRODI_M='$prodi', SMT='$semester', ALAMAT_M='$alamat', HP_M='$hp' WHERE EMAIL_M='$email'");
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat Data telah diperbarui</div>');
            redirect('user');
        }
    }
    public function edit_password()
    {
        $data['title'] = 'Edit Password';
        $data['user'] = $this->db->get_where('user', ['email' =>

        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('passwordSkrg', 'PasswordSkrg', 'required|trim');
        $this->form_validation->set_rules('passwordBaru1', 'Password Baru', 'required|trim|min_length[8]|matches[passwordBaru2]');
        $this->form_validation->set_rules('passwordBaru2', 'Pengulangan Password Baru', 'required|trim|min_length[8]|matches[passwordBaru1]');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit_password', $data);
            $this->load->view('templates/footer');
        } else {
            $passwordSkrg = $this->input->post('passwordSkrg');
            $passwordBaru = $this->input->post('passwordBaru1');
            if (!password_verify($passwordSkrg, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Lama Salah</div>');
                redirect('user/edit_password');
            } else {
                if ($passwordSkrg == $passwordBaru) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Tidak Boleh Sama!</div>');
                    redirect('user/edit_password');
                } else {
                    //Sudah OKE!

                    $passwordHash = password_hash($passwordBaru, PASSWORD_DEFAULT);
                    $date_pass = time();

                    $this->db->set('password', $passwordHash);
                    $this->db->set('change_pass', $date_pass);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Telah Berhasil Diganti</div>');
                    redirect('user');
                }
            }
        }
    }
}
