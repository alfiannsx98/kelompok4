<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('model_admin');
        $this->load->model('m_dashboard');
    }

    /**
     * Fungsi menampilkan dashboard per user
     */
    public function index()
    {
        $mail = $this->session->userdata('email');
        $identity = $this->session->userdata('identity');
        $data['title'] = 'Dashboard';
        $data['mhs'] = $this->m_dashboard->dosbingmhs($mail);
        $data['pr'] = $this->m_dashboard->perusahaanmhs($mail);
        $data['stts'] = $this->m_dashboard->get_status($mail);
        $data['jml_anggota'] = $this->m_dashboard->anggota($mail);
        $data['upload'] = $this->m_dashboard->proposal($mail);
        $data['waktu'] = $this->m_dashboard->waktupkl($mail);
        $data['user'] = $this->db->get_where('user', "email='$mail'")->row_array();
        $user = $this->db->query("SELECT * FROM user WHERE email='$mail'")->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        if($user['role_id'] == 2)
        {
            $this->load->view('dashboarduser/index', $data);
        }
        elseif($user['role_id'] == 3)
        {
            // $this->load->view('userdosbing/index', $data);
        }
        elseif($user['role_id'] == 4)
        {
            // $this->load->view('userdospkl/index', $data);
        }
        elseif($user['role_id'] == 12)
        {
            // $this->load->view('useradmprodi/index', $data);
        }
        $this->load->view('templates/footer');
    }

    /**
     * Fungsi menampilkan profil per user
     */
    public function profil()
    {
        $mail = $this->session->userdata('email');
        $identity = $this->session->userdata('identity');
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', "email='$mail'")->row_array();
        $data['user'] = $this->db->query("SELECT * FROM user LEFT JOIN mahasiswa ON mahasiswa.NIM=user.identity 
        LEFT JOIN admin_prodi ON admin_prodi.NIP_ADM=user.identity LEFT JOIN dosbing ON dosbing.NIP_DS=user.identity
        LEFT JOIN prodi ON dosbing.ID_PRODI=prodi.ID_PRODI OR admin_prodi.ID_PRODI=prodi.ID_PRODI 
        OR mahasiswa.ID_PRODI=prodi.ID_PRODI
        WHERE user.email ='$mail'")->row_array();
        $user = $this->db->query("SELECT * FROM user WHERE email='$mail'")->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        if($user['role_id'] == 1)
        {
            $this->load->view('useradm/profil', $data);
        }
        elseif($user['role_id'] == 2)
        {
            $this->load->view('usermhs/profil', $data);
        }
        elseif($user['role_id'] == 3)
        {
            $this->load->view('userdosbing/profil', $data);
        }
        elseif($user['role_id'] == 4)
        {
            $this->load->view('userdospkl/profil', $data);
        }
        elseif($user['role_id'] == 12)
        {
            $this->load->view('useradmprodi/profil', $data);
        }
        $this->load->view('templates/footer');
    }
    function alpha_dash_space($str)
    {
        return (!preg_match("/^([-a-z_ ])+$/i", $str)) ? FALSE : TRUE;
    }

    /**
     * INI FUNGSI UNTUK EDIT ADMIN
     */
    public function edit()
    {
        $mail = $this->session->userdata('email');
        $user = $this->db->query("SELECT * FROM user WHERE email='$mail'")->row_array();
        if($user['role_id'] == 1)
        {
            $data['title'] = 'Edit Profile';
            $data['prodi'] = $this->db->get('prodi')->result_array();
            $data['user'] = $this->db->query("SELECT * FROM user WHERE email='$mail'")->row_array();

            $this->form_validation->set_rules('nama', 'Name', 'required|trim|callback_alpha_dash_space', [
                'required' => 'nama harus diisi'
            ]);
            $this->form_validation->set_rules('about', 'About', 'required|trim', [
                'required' => 'masukkan bio anda'
            ]);

            if ($this->form_validation->run() == false) {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('useradm/edit', $data);
                $this->load->view('templates/footer');
            }
            else
            {
                $nama = $this->input->post('nama');
                $about = $this->input->post('about');
                $email = $this->input->post('email');
                //cek jika ada gambar
                $upload_image = $_FILES['image']['name'];

                if ($upload_image) {
                    $config['allowed_types'] = 'gif|jpg|jpeg|png';
                    $config['max_size'] = '2048';
                    $config['upload_path'] = './assets/dist/img/user/';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('image')) {
                        $old_image = $data['user']['image'];
                        if ($old_image != 'default.jpg') {
                            unlink(FCPATH . 'assets/dist/img/user/' . $old_image);
                        }
                        $new_image = $this->upload->data('file_name');
                        $this->db->set('image', $new_image);
                    } else {
                        echo $this->upload->display_errors();
                    }
                }
                $this->db->set('nama', $nama);
                $this->db->set('about', $about);
                $this->db->where('email', $email);
                $this->db->update('user');
                $this->session->set_flashdata('message', '<div class="text-center alert alert-success" role="alert">Selamat Data telah diperbarui</div>');
                redirect('user/profil');
            }
        }
        elseif($user['role_id'] == 2)
        {
            $mail = $this->session->userdata('email');
            $data['title'] = 'Edit Profile';
            $data['prodi'] = $this->db->get('prodi')->result_array();
            $data['user'] = $this->db->query("SELECT * FROM user LEFT JOIN mahasiswa ON mahasiswa.NIM=user.identity 
            LEFT JOIN prodi ON mahasiswa.ID_PRODI=prodi.ID_PRODI WHERE user.email='$mail'")->row_array();

            $this->form_validation->set_rules('nama', 'Name', 'required|trim|callback_alpha_dash_space', [
                'required' => 'nama harus diisi'
            ]);
            $this->form_validation->set_rules('jk', 'Jk', 'required|trim', [
                'required' => 'pilih jenis kelamin'
            ]);
            $this->form_validation->set_rules('prodi', 'Prodi', 'required|trim', [
                'required' => 'pilih prodi anda'
            ]);
            $this->form_validation->set_rules('smt', 'Smt', 'required|trim', [
                'required' => 'pilih semester anda'
            ]);
            $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
                'required' => 'masukkan alamat anda'
            ]);
            $this->form_validation->set_rules('hp', 'Hp', 'required|trim|min_length[11]|max_length[13]', [
                'required' => 'masukkan no hp anda',
                'min_length' => 'masukkan no hp dengan benar',
                'max_length' => 'masukkan no hp dengan benar'
            ]);
            $this->form_validation->set_rules('about', 'About', 'required|trim', [
                'required' => 'masukkan bio anda'
            ]);

            if ($this->form_validation->run() == false) {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('usermhs/edit', $data);
                $this->load->view('templates/footer');
            }
            else
            {
                $nama = $this->input->post('nama');
                $email = $this->input->post('email');
                $nim = $this->input->post('identity');
                $jk = $this->input->post('jk');
                $prodi = $this->input->post('prodi');
                $semester = $this->input->post('smt');
                $alamat = $this->input->post('alamat');
                $hp = $this->input->post('hp');
                $about = $this->input->post('about');

                //cek jika ada gambar

                $upload_image = $_FILES['image'];

                if ($upload_image) {
                    $config['allowed_types'] = 'gif|jpg|jpeg|png';
                    $config['max_size'] = '2048';
                    $config['upload_path'] = './assets/dist/img/user/';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('image')) {
                        $old_image = $data['user']['image'];
                        if ($old_image != 'default.jpg') {
                            unlink(FCPATH . 'assets/dist/img/user/' . $old_image);
                        }
                        $new_image = $this->upload->data('file_name');
                        $h = $this->db->set('image', $new_image);
                    } else {
                        echo $this->upload->display_errors();
                    }
                }   
                // update tabel user
                $this->db->set('nama', $nama);
                $this->db->set('about', $about);
                $this->db->where('identity', $nim);
                $this->db->update('user');

                // update tabel mahasiswa
                $this->db->set('NAMA_M', $nama);
                $this->db->set('JK_M', $jk);
                $this->db->set('ID_PRODI', $prodi);
                $this->db->set('SMT', $semester);
                $this->db->set('ALAMAT_M', $alamat);
                $this->db->set('HP_M', $hp);
                $this->db->where('NIM', $nim);
                $this->db->update('mahasiswa');
                $this->session->set_flashdata('message', '<div class="text-center alert alert-success" role="alert">Selamat Data telah diperbarui</div>');
                redirect('user/profil');
            }
        }
        elseif($user['role_id'] == 3)
        {
            $mail = $this->session->userdata('email');
            $data['title'] = 'Edit Profile';
            $data['prodi'] = $this->db->get('prodi')->result_array();
            $data['user'] = $this->db->query("SELECT * FROM user LEFT JOIN dosbing ON dosbing.NIP_DS=user.identity 
            LEFT JOIN prodi ON dosbing.ID_PRODI=prodi.ID_PRODI WHERE user.email='$mail'")->row_array();

            $this->form_validation->set_rules('nama', 'Name', 'required|trim', [
                'required' => 'nama harus diisi'
            ]);
            $this->form_validation->set_rules('jk', 'Jk', 'required|trim', [
                'required' => 'pilih jenis kelamin'
            ]);
            $this->form_validation->set_rules('prodi', 'Prodi', 'required|trim', [
                'required' => 'pilih bagian admin prodi'
            ]);
            $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
                'required' => 'masukkan alamat anda'
            ]);
            $this->form_validation->set_rules('hp', 'Hp', 'required|trim|min_length[11]|max_length[13]', [
                'required' => 'masukkan no hp anda',
                'min_length' => 'masukkan no hp dengan benar',
                'max_length' => 'masukkan no hp dengan benar'
            ]);
            $this->form_validation->set_rules('about', 'About', 'required|trim', [
                'required' => 'masukkan bio anda'
            ]);

            if ($this->form_validation->run() == false) {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('userdosbing/edit', $data);
                $this->load->view('templates/footer');
            }
            else
            {
                $nama = $this->input->post('nama');
                $email = $this->input->post('email');
                $jk = $this->input->post('jk');
                $prodi = $this->input->post('prodi');
                $alamat = $this->input->post('alamat');
                $hp = $this->input->post('hp');
                $about = $this->input->post('about');
                $nip = $this->input->post('identity');

                //cek jika ada gambar

                $upload_image = $_FILES['image'];

                if ($upload_image) {
                    $config['allowed_types'] = 'gif|jpg|jpeg|png';
                    $config['max_size'] = '2048';
                    $config['upload_path'] = './assets/dist/img/user/';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('image')) {
                        $old_image = $data['user']['image'];
                        if ($old_image != 'default.jpg') {
                            unlink(FCPATH . 'assets/dist/img/user/' . $old_image);
                        }
                        $new_image = $this->upload->data('file_name');
                        $this->db->set('image', $new_image);
                    } else {
                        echo $this->upload->display_errors();
                    }
                }

                // update tabel user
                $this->db->set('nama', $nama);
                $this->db->set('about', $about);
                $this->db->where('identity', $nip);
                $this->db->update('user');

                // update tabel dosbing
                $this->db->set('NAMA_DS', $nama);
                $this->db->set('JK_DS', $jk);
                $this->db->set('ID_PRODI', $prodi);
                $this->db->set('ALAMAT_DS', $alamat);
                $this->db->set('HP_DS', $hp);
                $this->db->where('NIP_DS', $nip);
                $this->db->update('dosbing');
                $this->session->set_flashdata('message', '<div class="text-center alert alert-success" role="alert">Selamat Data telah diperbarui</div>');
                redirect('user/profil');
            }
        }
        elseif($user['role_id'] == 4)
        {
            $mail = $this->session->userdata('email');
            $data['title'] = 'Edit Profile';
            $data['prodi'] = $this->db->get('prodi')->result_array();
            $data['user'] = $this->db->query("SELECT * FROM user LEFT JOIN dosbing ON dosbing.NIP_DS=user.identity 
            LEFT JOIN prodi ON dosbing.ID_PRODI=prodi.ID_PRODI WHERE user.email='$mail'")->row_array();
            $pictures = $this->db->query("SELECT user.image FROM user WHERE email='$mail'")->row_array();

            $this->form_validation->set_rules('nama', 'Name', 'required|trim', [
                'required' => 'nama harus diisi'
            ]);
            $this->form_validation->set_rules('jk', 'Jk', 'required|trim', [
                'required' => 'pilih jenis kelamin'
            ]);
            $this->form_validation->set_rules('prodi', 'Prodi', 'required|trim', [
                'required' => 'pilih bagian admin prodi'
            ]);
            $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
                'required' => 'masukkan alamat anda'
            ]);
            $this->form_validation->set_rules('hp', 'Hp', 'required|trim|min_length[11]|max_length[13]', [
                'required' => 'masukkan no hp anda',
                'min_length' => 'masukkan no hp dengan benar',
                'max_length' => 'masukkan no hp dengan benar'
            ]);
            $this->form_validation->set_rules('about', 'About', 'required|trim', [
                'required' => 'masukkan bio anda'
            ]);

            if ($this->form_validation->run() == false) {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('userdospkl/edit', $data);
                $this->load->view('templates/footer');
            }
            else
            {
                $nama = $this->input->post('nama');
                $email = $this->input->post('email');
                $jk = $this->input->post('jk');
                $prodi = $this->input->post('prodi');
                $alamat = $this->input->post('alamat');
                $hp = $this->input->post('hp');
                $about = $this->input->post('about');
                $nip = $this->input->post('identity');

                //cek jika ada gambar

                $upload_image = $_FILES['image'];

                if ($upload_image) {
                    $config['allowed_types'] = 'gif|jpg|jpeg|png';
                    $config['max_size'] = '2048';
                    $config['upload_path'] = './assets/dist/img/user/';

                    $this->load->library('upload', $config);
                    $old_image = $data['user']['image'];
                    if ($this->upload->do_upload('image')) {
                        if ($old_image != 'default.jpg') {
                            unlink(FCPATH . 'assets/dist/img/user/' . $old_image);
                        }
                        $new_image = $this->upload->data('file_name');
                        $this->db->set('image', $new_image);
                    } else {
                        echo $this->upload->display_errors();
                    }
                }

                // update tabel user
                $this->db->set('nama', $nama);
                $this->db->set('about', $about);
                $this->db->where('identity', $nip);
                $this->db->update('user');

                // update tabel dosbing
                $this->db->set('NAMA_DS', $nama);
                $this->db->set('JK_DS', $jk);
                $this->db->set('ID_PRODI', $prodi);
                $this->db->set('ALAMAT_DS', $alamat);
                $this->db->set('HP_DS', $hp);
                $this->db->where('NIP_DS', $nip);
                $this->db->update('dosbing');
                $this->session->set_flashdata('message', '<div class="text-center alert alert-success" role="alert">Selamat Data telah diperbarui</div>');
                redirect('user/profil');
            }
        }
        elseif($user['role_id'] == 12)
        {
            $mail = $this->session->userdata('email');
            $data['title'] = 'Edit Profile';
            $data['prodi'] = $this->db->get('prodi')->result_array();
            $data['user'] = $this->db->query("SELECT * FROM user LEFT JOIN admin_prodi ON admin_prodi.NIP_ADM=user.identity 
            LEFT JOIN prodi ON admin_prodi.ID_PRODI=prodi.ID_PRODI WHERE user.email='$mail'")->row_array();

            $this->form_validation->set_rules('nama', 'Name', 'required|trim', [
                'required' => 'nama harus diisi'
            ]);
            $this->form_validation->set_rules('jk', 'Jk', 'required|trim', [
                'required' => 'pilih jenis kelamin'
            ]);
            $this->form_validation->set_rules('prodi', 'Prodi', 'required|trim', [
                'required' => 'pilih bagian admin prodi'
            ]);
            $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
                'required' => 'masukkan alamat anda'
            ]);
            $this->form_validation->set_rules('hp', 'Hp', 'required|trim|min_length[11]|max_length[13]', [
                'required' => 'masukkan no hp anda',
                'min_length' => 'masukkan no hp dengan benar',
                'max_length' => 'masukkan no hp dengan benar'
            ]);
            $this->form_validation->set_rules('about', 'About', 'required|trim', [
                'required' => 'masukkan bio anda'
            ]);

            if ($this->form_validation->run() == false) {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('useradmprodi/edit', $data);
                $this->load->view('templates/footer');
            }
            else
            {
                $nama = $this->input->post('nama');
                $email = $this->input->post('email');
                $jk = $this->input->post('jk');
                $prodi = $this->input->post('prodi');
                $alamat = $this->input->post('alamat');
                $hp = $this->input->post('hp');
                $about = $this->input->post('about');
                $nip = $this->input->post('identity');

                //cek jika ada gambar

                $upload_image = $_FILES['image'];

                if ($upload_image) {
                    $config['allowed_types'] = 'gif|jpg|jpeg|png';
                    $config['max_size'] = '2048';
                    $config['upload_path'] = './assets/dist/img/user/';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('image')) {
                        $old_image = $data['user']['image'];
                        if ($old_image != 'default.jpg') {
                            unlink(FCPATH . 'assets/dist/img/user/' . $old_image);
                        }
                        $new_image = $this->upload->data('file_name');
                        $this->db->set('image', $new_image);
                    } else {
                        echo $this->upload->display_errors();
                    }
                }

                // update tabel user
                $this->db->set('nama', $nama);
                $this->db->set('about', $about);
                $this->db->where('identity', $nip);
                $this->db->update('user');

                // update tabel dosbing
                $this->db->set('NAMA_ADM', $nama);
                $this->db->set('JK_ADM', $jk);
                $this->db->set('ID_PRODI', $prodi);
                $this->db->set('ALAMAT_ADM', $alamat);
                $this->db->set('HP_ADM', $hp);
                $this->db->where('NIP_ADM', $nip);
                $this->db->update('admin_prodi');
                $this->session->set_flashdata('message', '<div class="text-center alert alert-success" role="alert">Selamat Data telah diperbarui</div>');
                redirect('user/profil');
            }
        }
        
    }

    public function edit_password()
    {
        $mail = $this->session->userdata('email');
        $data['title'] = 'Edit Password';
        $data['user'] = $this->db->get_where('user', ['email' => $mail])->row_array();
        $user = $this->db->query("SELECT * FROM user WHERE email = '$mail'")->row_array();
        $this->form_validation->set_rules('passwordSkrg', 'PasswordSkrg', 'required|trim', [
            'required' => 'kolom ini harus di isi'
        ]);

        $this->form_validation->set_rules('passwordBaru1', 'Password Baru', 'required|trim|min_length[8]|matches[passwordBaru2]', [
            'required' => 'kolom ini harus di isi'
        ]);

        $this->form_validation->set_rules('passwordBaru2', 'Pengulangan Password Baru', 'required|trim|min_length[8]|matches[passwordBaru1]', [
            'required' => 'kolom ini harus di isi'
        ]);

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            if($user['role_id'] == 1)
            {
                $this->load->view('editpsw_user/edit_password', $data);
            }
            elseif($user['role_id'] == 2)
            {
                $this->load->view('editpsw_user/edit_password', $data);
            }
            elseif($user['role_id'] == 3)
            {
                $this->load->view('editpsw_user/edit_password', $data);
            }
            elseif($user['role_id'] == 4)
            {
                $this->load->view('editpsw_user/edit_password', $data);
            }
            elseif($user['role_id'] == 12)
            {
                $this->load->view('editpsw_user/edit_password', $data);
            }
            $this->load->view('templates/footer');
        } else {
            $passwordSkrg = $this->input->post('passwordSkrg');
            $passwordBaru = $this->input->post('passwordBaru1');
            if (!password_verify($passwordSkrg, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="text-center alert alert-danger" role="alert"><i class="far fa-window-close"></i> Password Lama Salah</div>');
                redirect('user/edit_password');
            } else {
                if ($passwordSkrg == $passwordBaru) {
                    $this->session->set_flashdata('message', '<div class="text-center alert alert-danger" role="alert"><i class="far fa-window-close"></i> Password Tidak Boleh Sama!</div>');
                    redirect('user/edit_password');
                } else {
                    //Sudah OKE!
                    $passwordHash = password_hash($passwordBaru, PASSWORD_DEFAULT);
                    $date_pass = time();

                    $this->db->set('password', $passwordHash);
                    $this->db->set('change_pass', $date_pass);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');
                    $this->session->set_flashdata('message', '<div class="text-center alert alert-success" role="alert"><i class="far fa-check-square"></i> Password Telah Berhasil Diganti</div>');
                    redirect('user/profil');
                }
            }
        }
    }
}
