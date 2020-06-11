<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('model_auth');
    }
    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {

            // Jika validasi berhasil dilakukan
            $this->_login();
        }
    }
    private function _login()
    {
        $email = htmlspecialchars($this->input->post('email'));
        $password = htmlspecialchars($this->input->post('password'));

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            //jika user aktif
            if ($user['is_active'] == 1) {
                //cek Password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else if ($user['role_id'] == 2) {
                        redirect('user/index');
                    } else if ($user['role_id'] == 3) {
                        redirect('user/profil');
                    } else if ($user['role_id'] == 4) {
                        redirect('user/profil');
                    } else {
                        redirect('user/profil');
                    }
                    redirect('user');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Ini Belum Di Aktivasi!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Maaf Email belum terdaftar!</div>');
            redirect('auth');
        }
    }


    public function register()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }

        $query1 = $this->db->query("SELECT * FROM user");
        $query = $this->db->query("SELECT * FROM mahasiswa");
        // Membuat id_user : gabungan dari date dan field 
        $tabel1 = $query1->num_rows();
        $tabel = $query->num_rows();
        $date = date('dm', time());
        $id_u = "ID-U" . $tabel1 . $date;
        $id_m = "ID-M" . $tabel . $date;
        // $prodi = $this->input->post('prodi');
        // $jk = $this->input->post('jk');

        /**
         * codingan untuk mengecek apakah nim sudah terdaftar di tabel mahasiswa
         */
        $nim =  htmlspecialchars($this->input->post('nim', true));
        $sql = $this->db->query("SELECT NIM FROM mahasiswa WHERE NIM='$nim'");
        $result = $sql->result_array();

        $this->form_validation->set_rules('nim', 'NIM', 'required|trim|min_length[9]|max_length[9]|alpha_numeric', [
            'required' => 'NIM harus diisi',
            'min_length' => 'NIM terlalu pendek',
            'max_length' => 'NIM terlalu panjang',
            'alpha_numeric' => 'Kolom ini hanya bisa diisi huruf dan angka'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'required' => 'Email harus diisi',
            'is_unique' => 'Email telah terdaftar di database!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'required' => 'Password harus diisi',
            'matches' => '',
            'min_length' => 'Password Terlalu Pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [
            'required' => 'Password harus diisi',
            'matches' => 'Password Tidak Sama!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Register Mahasiswa';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/regmhs');
            $this->load->view('templates/auth_footer');
        } else {
            // Jika berhasil insert array...
            $email = $this->input->post('email', true);

            /**
             * codingan untuk upload foto
             */
            // $foto = $_FILES['foto'];
            // if ($foto) {
            //     $config['allowed_types'] = 'gif|jpg|jpeg|png';
            //     $config['max_size'] = '2048';
            //     $config['upload_path'] = './assets/image/profile/';

            //     $this->load->library('upload', $config);
            //     if ($foto == '') {
            //         $foto = 'default.jpg';
            //     } else {
            //         if (!$this->upload->do_upload('foto')) {
            //             $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Upload Foto!!</div>');
            //             redirect('auth/register');
            //         } else {
            //             $foto = $this->upload->data('file_name');
            //         }
            //     }
            // }


            // $data = [
            //     'id_user' => $id_u,
            //     'identity' => htmlspecialchars($this->input->post('nim', true)),
            //     'email' => htmlspecialchars($email),
            //     'image' => 'default.jpg',
            //     'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            //     'role_id' => 2,
            //     'is_active' => 0,
            //     'date_created' => time()
            // ];

            $nim = htmlspecialchars($this->input->post('nim', true));
            $mail = htmlspecialchars($email);
            $pass = htmlspecialchars(password_hash($this->input->post('password1'), PASSWORD_DEFAULT));
            $role = htmlspecialchars(2);

            // Membuat token dengan angka random
            // Disertai dengan batas waktu kadaluarsa
            $token = base64_encode(random_bytes(32));
            $token_user = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

            if ($result == true) {
                // insert token ke database
                /**
                 * kodingan untuk menginsert data user berdasarkan nim
                 */
                $this->db->set('email', $mail);
                $this->db->set('password', $pass);
                $this->db->set('role_id', $role);
                $this->db->where('identity', $nim);
                $this->db->set('date_created', time());
                $this->db->update('user');
                $this->db->insert('token_user', $token_user);

                $this->_sendEmail($token, 'verify');

                // Pesan berhasil insert
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat anda berhasil registrasi, Cek email anda untuk aktivasi!!</div>');
                redirect('auth/index');
            } else {
                // Pesan nim tidak terdaftar
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">NIM belum terdaftar, silahkan hubungi admin prodi</div>');
                redirect('auth/register');
            }
        }
    }

    private function _sendEmail($token, $type)
    {
        // Config Setting 
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'emailpass49@gmail.com',
            'smtp_pass' => 'IndowebsteR9',
            'smtp_port' => 587,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];
        // Jika pesan nya = verifikasi
        $emailAkun = htmlspecialchars($this->input->post('email'));
        $pesanEmail = "
                                <html>
                                <head>
                                    <title>Kode Verifikasi</title>
                                </head>
                                <body>
                                    <h2>Terimakasih telah Mendaftarkan akun anda</h2>
                                    <p>Akun Anda</p>
                                    <p>Email : " . $emailAkun . "</p>
                                    <p>Tolong Klik Link Dibawah ini untuk aktivasi akun!</p>
                                    <h4><a href='" . base_url() . "auth/verify?email=" . $emailAkun . "&token=" . urlencode($token) . "'>Aktivasi!</a></h4>
                                </body>
                                </html>
        ";
        // Jika pesan nya = Lupa
        $ResetPassword = "
                                <html>
                                <head>
                                    <title>Kode Reset Password</title>
                                </head>
                                <body>
                                    <h2>Silahkan Klik Link Dibawah Ini!!</h2>
                                    <p>Akun Anda</p>
                                    <p>Email : " . $emailAkun . "</p>
                                    <p>Tolong Klik Link Dibawah ini untuk Reset Password!</p>
                                    <h4><a href='" . base_url() . "auth/resetpassword?email=" . $emailAkun . "&token=" . urlencode($token) . "'>Reset Password!!</a></h4>
                                </body>
                                </html>
        ";
        $this->load->library('email', $config);
        $this->email->from('arlopaz.uye121299@gmail.com', 'Verifikasi Email');
        $this->email->to(htmlspecialchars($this->input->post('email')));
        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message($pesanEmail);
            $this->email->set_mailtype('html');
        } else if ($type == 'Lupa') {
            $this->email->subject('Reset Password');
            $this->email->message($ResetPassword);
            $this->email->set_mailtype('html');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('token_user', ['token' => $token])->row_array();
            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 72)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('token_user', ['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' User Telah di Aktivasi!!Silahkan Login</div>');
                    redirect('auth');
                } else {
                    $this->db->delete('user', ['email' => $email]);

                    $this->db->delete('token_user', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Token Kadaluarsa!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Token Salah</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi Gagal</div>');
            redirect('auth');
        }
    }

    public function lupaPassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == false) {

            $data['title'] = 'Lupa Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/lupapassword');
            $this->load->view('templates/auth_footer');
        } else {
            $email = htmlspecialchars($this->input->post('email'));
            $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('token_user', $user_token);
                $this->_sendEmail($token, 'Lupa');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="success">Silahkan Cek Email Anda Untuk Reset Password!!</div>');
                redirect('auth');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Anda Belum Terdaftar! Atau Akun Belum Aktif</div>');
                redirect('auth/lupapassword');
            }
        }
    }

    public function resetpassword()
    {
        $email = htmlspecialchars($this->input->get('email'));
        $token = htmlspecialchars($this->input->get('token'));

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('token_user', ['token' => $token])->row_array();
            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->gantiPassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset Password Gagal! Email/Token Salah!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset Password Gagal!Email Salah!</div>');
            redirect('auth');
        }
    }

    public function gantiPassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[8]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Ulangi Password', 'trim|required|min_length[8]|matches[password1]');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Ganti Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/ganti-password');
            $this->load->view('templates/auth_footer');
        } else {
            $password = password_hash(htmlspecialchars($this->input->post('password1')), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->model_auth->hapus_token($email);
            $this->session->unset_userdata('reset_email');


            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Berhasil Diubah! Silahkan Login</div>');
            redirect('auth');
        }
    }
    public function verify_akun_admin()
    {
        $email = htmlspecialchars($this->input->get('email'));
        $token = htmlspecialchars($this->input->get('token'));

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('token_user', ['token' => $token])->row_array();
            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 72)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');
                    // $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' User Telah di Aktivasi!!Silahkan Masukkan data Password Anda</div>');
                    redirect("auth/resetpassword?email=" . $email . "&token=" . urlencode($token));
                } else {
                    $this->db->delete('user', ['email' => $email]);

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Token Kadaluarsa!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Token Salah</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi Gagal</div>');
            redirect('auth');
        }
    }



    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('id_perusahaan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Telah Keluar!</div>');
        redirect('auth');
    }
    public function blocked()
    {
        $data['title'] = 'Blocked Page';
        $this->load->view('templates/header', $data);
        // $this->load->view('templates/404_header');
        $this->load->view('auth/blocked');
    }
}
