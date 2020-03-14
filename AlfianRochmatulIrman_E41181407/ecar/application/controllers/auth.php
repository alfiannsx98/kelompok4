<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        if($this->session->userdata('email')){
            redirect('user');
        }
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run()== false){
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        }else{
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            //jika user aktif
            if ($user['is_active'] == 1) {
                //cek Password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'id_role' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else {
                        redirect('user');
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

        $query_koleksi = $this->db->query("SELECT * FROM user"); 
        $field = $query_koleksi->num_rows();
        $d = date('dm', time());
        $id_user = "ID-U" . $field . $d;

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email Ini telah Terdaftar!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'matches' => 'Password Tidak Sama!',
            'min_length' => 'Password Terlalu Pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Register Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/register');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'id_user' => $id_user,
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($email),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 0,
                'date_created' => time()
            ];

            //siapkan token
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->db->insert('user_token', $user_token);

            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat Data Berhasil Ter Registrasi!, Aktifkan Akun Anda Terlebih Dahulu!!</div>');
            redirect('auth');
        }
    }
    private function _sendEmail($token, $type)
    {
        //"Click Alamat ini untuk verify akun anda  : <a href='" . base_url() . "auth/verify?email=" . $this->input->post('email') . "&token=" . $token . "'>Aktifkan!</a>"
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'alfianrochmatul77@gmail.com',
            'smtp_pass' => 'IndowebsteR9',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];
        $emailAkun = $this->input->post('email');
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
        $this->email->from('alfianrochmatul77@gmail.com', 'irman makk!!');
        $this->email->to($this->input->post('email'));
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
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Telah Keluar!</div>');
        redirect('auth');
    }
}