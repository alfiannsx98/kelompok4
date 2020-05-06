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

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email Ini telah Terdaftar!'
        ]);
        $this->form_validation->set_rules('NAMA_ADM', 'Nama_Admin', 'required|trim|is_unique[admin_prodi.NAMA_ADM]', [
            'is_unique' => 'Nama Akun Ini telah Terdaftar!'
        ]);

        $this->form_validation->set_rules('ID_PRODI', 'Prodi', 'required');
        $this->form_validation->set_rules('NIP_ADM', 'NIP Admin', 'required');
        $this->form_validation->set_rules('JK_ADM', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('ALAMAT_ADM', 'Alamat Admin', 'required');
        $this->form_validation->set_rules('HP_ADM', 'No HP', 'required');

        if($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('dosen/admin_prodi', $data);
            $this->load->view('templates/footer');
        }else{
            $email = $this->input->post('email', true);
            $nama_adm = $this->input->post('NAMA_ADM', true);
            $data = [
                'ID_ADM' => $id_u,
                'ID_PRODI' => htmlspecialchars($this->input->post('ID_PRODI')),
                'NIP_ADM' => htmlspecialchars($this->input->post('NIP_ADM')),
                'NAMA_ADM' => htmlspecialchars($nama_adm),
                'JK_ADM' => $this->input->post('JK_ADM'),
                'ALAMAT_ADM' => htmlspecialchars($this->input->post('ALAMAT_ADM')),
                'HP_ADM' => htmlspecialchars($this->input->post('HP_ADM'))
            ];
            $dataUser = [
                'id_user' => $id_usr,
                'identity' => $this->input->post('NIP_ADM'),
                'nama' => $this->input->post('NAMA_ADM'),
                'email' => htmlspecialchars($email),
                'image' => "default.jpg",
                'password' => password_hash("polijesip", PASSWORD_DEFAULT),
                'about' => "#",
                'role_id' => 12,
                'is_active' => 0,
                'date_created' => time(),
                'change_pass' => 0
            ];
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
    public function edit_admin_prodi()
    {
        $this->form_validation->set_rules('NIP_ADM', 'NIP Admin', 'required');
        $this->form_validation->set_rules('NAMA_ADM', 'Nama Admin', 'required');
        $this->form_validation->set_rules('JK_ADM', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('ALAMAT_ADM', 'Alamat Admin', 'required');
        $this->form_validation->set_rules('HP_ADM', 'No HP', 'required');
        $this->form_validation->set_rules('ID_PRODI', 'Program Studi', 'required');
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
            $prodi_admin = $this->input->post('ID_PRODI');
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
        $nip = $this->input->post('NIP_ADM');
        $this->model_dosen->hapus_user_adm_prodi($nip);
        $this->model_dosen->hapus_admin_prodi($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Berhasil Dihapus</div>');
        redirect('dosen/admin_prodi');
    }

    // Dosen Pembimbing
    function dosbing(){
        $data['title'] = 'Dosen Pembimbing';
        $data['user'] = $this->db->get_where('user', [
            'email' =>
            $this->session->userdata('email')    
        ])->row_array();
        // ini adalah variabel array $data yang memiliki index user, berguna untuk menyimpan data 
        $data['dosbing'] = $this->model_dosen->tampil_data()->result();
        // ini adalah baris kode yang berfungsi menampilkan v_tampil dan membawa data dari tabel user
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dosen/v_dosbing', $data);
        $this->load->view('templates/footer');
    }

    function tambah(){

    $data['title'] = 'Dashboard';
    $data['user'] = $this->db->get_where('user', [
        'email' =>
        $this->session->userdata('email')    
    ])->row_array();

    $data['dosbing'] = $this->model_dosen->tampil_data()->result();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('dosen/v_inputdosbing',$data);
        $this->load->view('templates/footer');
    }

    function tambah_dosbing(){
    // ini adalah baris kode yang berfungsi merekam data yang diinput oleh pengguna
        $ID_DS = $this->input->post('ID_DS');
        $NIP_DS = $this->input->post('NIP_DS');
        $NAMA_DS = $this->input->post('NAMA_DS');
        $JK_DS = $this->input->post('JK_DS');
        $ALAMAT_DS = $this->input->post('ALAMAT_DS');
        $HP_DS= $this->input->post('HP_DS');
        $EMAIL_DS = $this->input->post('EMAIL_DS');
        $PASSWORD_DS = $this->input->post('PASSWORD_DS');
        
    // array yang berguna untuk mennjadikanva variabel diatas menjadi 1 variabel yang nantinya akan di sertakan dalam query insert
        $data = array(
            
            'ID_DS' => $ID_DS,
            'NIP_DS' => $NIP_DS,
            'NAMA_DS' => $NAMA_DS,
            'JK_DS' => $JK_DS,
            'ALAMAT_DS' => $ALAMAT_DS,
            'HP_DS' => $HP_DS,
            'EMAIL_DS' => $EMAIL_DS,
            'PASSWORD_DS' => $PASSWORD_DS,
    );
    // method yang berfungsi melakukan insert ke dalam database yang mengirim 2 parameter yaitu sebuah array data dan nama tabel yang dimaksud
        $this->model_dosen->input_data($data,'dosbing');
    // kode yang berfungsi mengarahkan pengguna ke link base_url()crud/index/ 
    redirect('dosen/dosbing');
    }

    function hapus($id){
        // baaris kode ini berisi fungsi untuk menyimpan id user kedalam array $where pada index array bernama 'id'
        $where = array('ID_DS' => $id);
        // kode di bawah ini untuk menjalankan query hapus yang berasal dari method hapus_data() pada model model_dosen
            $this->model_dosen->hapus_data($where,'dosbing');
        // kode yang berfungsi mengarakan pengguna ke link base_url()crud/
        redirect('dosen/dosbing');
        }

    function edit($id){

        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', [
            'email' =>
            $this->session->userdata('email')    
        ])->row_array();
        // kode yang berfungsi untuk menyimpan id user ke dalam array $where pada index array benama id
        $where = array('ID_DS' => $id);
        // kode di bawah ini adalah kode yang mengambil data user berdasarkan id dan disimpan kedalam array $data dengan index bernama user
        $data['dosbing'] = $this->model_dosen->edit_data($where,'dosbing')->result();
        // kode ini memuat vie edit dan membawa data hasil query diatas
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('dosen/v_editdosbing',$data);
        $this->load->view('templates/footer');
        
    }
    
    // baris kode function update adalah method yang diajalankan ketika tombol submit pada form v_edit ditekan, method ini berfungsi untuk merekam data, memperbarui baris database yang dimaksud, lalu mengarahkan pengguna ke controller crud method index
    function update(){
        // keempat baris kode ini berfungsi untuk merekam data yang dikirim melalui method post
        
        $ID_DS = $this->input->post('ID_DS');
        $NIP_DS = $this->input->post('NIP_DS');
        $NAMA_DS = $this->input->post('NAMA_DS');
        $JK_DS = $this->input->post('JK_DS');
        $ALAMAT_DS = $this->input->post('ALAMAT_DS');
        $HP_DS= $this->input->post('HP_DS');
        $EMAIL_DS = $this->input->post('EMAIL_DS');
        $PASSWORD_DS = $this->input->post('PASSWORD_DS');
        
            // brikut ini adalah array yang berguna untuk menjadikan variabel diatas menjadi 1 variabel yang nantinya akan disertakan ke dalam query update pada model
                $data = array(
                'NIP_DS' => $NIP_DS,
                'NAMA_DS' => $NAMA_DS,
                'JK_DS' => $JK_DS,
                'ALAMAT_DS' => $ALAMAT_DS,
                'HP_DS' => $HP_DS,
                'EMAIL_DS' => $EMAIL_DS,
                'PASSWORD_DS' => $PASSWORD_DS,
            );
        
            // kode yang berfungsi menyimpan id user ke dalam array $where pada index array bernama id
            $where = array(
                'ID_DS' => $ID_DS
            );
        
            // kode untuk melakukan query update dengan menjalankan method update_data() 
            $this->model_dosen->update_data($where,$data,'dosbing');
            // baris kode yang mengerahkan pengguna ke link base_url()crud/
            redirect('dosen/dosbing');
        }
}
?>