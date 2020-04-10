<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('model_dosen');
        is_logged_in();
    }
    public function admin_prodi()
    {
        $query1 = $this->db->query("SELECT * FROM user");
        $tabel = $query1->num_rows();
        $date = date('dm', time());
        $id_usr = "ID-U" . $tabel . $date;

        $data['title'] = 'Admin Program Studi';
        $data['user'] = $this->db->get_where('user', [
            'email' => 
            $this->session->userdata('email')
        ])->row_array();

        $data['admin_prodi'] = $this->db->get('admin_prodi')->result_array();
        $data['prodi'] = $this->db->get('prodi')->result_array();

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
                'id_user' => $id_usr,
                'identity' => $this->input->post('NIP_ADM'),
                'nama' => $this->input->post('NAMA_ADM'),
                'email' => $this->input->post('EMAIL_ADM'),
                'image' => "default.jpg",
                'password' => password_hash($this->input->post('PASSWORD_ADM'), PASSWORD_DEFAULT),
                'about' => "#",
                'role_id' => 12,
                'is_active' => 0,
                'date_created' => time(),
                'change_pass' => 0
            ];
            $email = $this->input->post('EMAIL_ADM', true);

            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

            $this->db->insert('token_user', $user_token);

            $this->_sendEmail($token, 'verify');

            $this->db->insert('user', $dataUser);
            $this->db->insert('admin_prodi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
            redirect('dosen/admin_prodi');
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
        $emailAkun = $this->input->post('EMAIL_ADM');
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
                                    <h4><a href='" . base_url() . "auth/verify_akun_admin?email=" . $emailAkun . "&token=" . urlencode($token) . "'>Aktivasi!</a></h4>
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
        $this->email->from('emailpass49@gmail.com', 'Verifikasi Email');
        $this->email->to($this->input->post('EMAIL_ADM'));
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
    public function edit_admin_prodi()
    {
        $this->form_validation->set_rules('NIP_ADM', 'NIP Admin', 'required');
        $this->form_validation->set_rules('NAMA_ADM', 'Nama Admin', 'required');
        $this->form_validation->set_rules('ALAMAT_ADM', 'Alamat Admin', 'required');
        $this->form_validation->set_rules('HP_ADM', 'No HP', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');

        if($this->form_validation->run() == false){
            redirect('dosen/admin_prodi');
        }else{
            $id = $this->input->post('ID_ADM');
            $nip = $this->input->post('NIP_ADM');
            $nama_adm = $this->input->post('NAMA_ADM');
            $jk_adm = $this->input->post('JK_ADM');
            $alamat_admin = $this->input->post('ALAMAT_ADM');
            $no_hp_admin = $this->input->post('HP_ADM');
            $prodi_admin = $this->input->post('PRODI_ADM');
            $id_user = $this->input->post('id_user');
            $is_active = $this->input->post('is_active');
            $email_admin = $this->input->post('email');
            $this->model_dosen->edit_admin_prodi($id, $nip, $nama_adm, $jk_adm, $alamat_admin, $no_hp_admin, $prodi_admin);
            $this->model_dosen->edit_user_admin_prodi($id_user, $nip, $nama_adm, $is_active, $email_admin);
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