<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosbing extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_dosbing');
        // is_logged_in();
    }

    public function index()
    {

        $query = $this->db->query("SELECT * FROM user");
        $query1 = $this->db->query("SELECT * FROM dosbing");
        $tabel = $query->num_rows();
        $tabel1 = $query1->num_rows();
        $date = date('dm', time());
        $id_u = "ID-U" . $tabel . $date;
        $id_ds = "ID-D" .$tabel1 .$date;

        $data['title'] = 'Dosbing & Koordinator PKL';
        $data['user'] = $this->db->get_where('user', [
            'email' => 
            $this->session->userdata('email')
        ])->row_array();

        $data['ds'] = $this->m_dosbing->getDosbing();
        $data['pr'] = $this->m_dosbing->getProdi();
        $data['jb'] = $this->m_dosbing->getRole();   

        $this->form_validation->set_rules('nip', 'Nip', 'required|trim|min_length[18]|max_length[20]', [
            'required' => 'masukkan nip dosen',
            'min_length' => 'nip yang anda masukkan salah',
            'max_length' => 'nip yang anda masukkan salah'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'masukkan nama dosen'
        ]);
        $this->form_validation->set_rules('jk', 'Jk', 'required|trim', [
            'required' => 'pilih jenis kelamin'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'masukkan alamat dosen'
        ]);
        $this->form_validation->set_rules('hp', 'Hp', 'required|trim|min_length[11]|max_length[13]', [
            'required' => 'masukkan nohp dosen',
            'min_length' => 'no hp yang dimasukkan salah',
            'max_length' => 'no hp yang dimasukkan salah'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'masukkan email dosen'
        ]);
        $this->form_validation->set_rules('prodi', 'Prodi', 'required|trim', [
            'required' => 'pilih program studi yang diampu'
        ]);
        $this->form_validation->set_rules('role', 'role', 'required|trim', [
            'required' => 'pilih jabatan dosen'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[password1]', [
            'required' => 'Password harus diisi',
            'matches' => '',
            'min_length' => 'Password Terlalu Pendek!'
        ]);
        $this->form_validation->set_rules('password1', 'Password1', 'required|trim|matches[password]', [
            'required' => 'Password harus diisi',
            'matches' => 'Password Tidak Sama!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('dosen/dosbing', $data);
            $this->load->view('templates/footer');
        } else {
            $nip = $this->input->post('nip');
            $nama = $this->input->post('nama');
            $jk = $this->input->post('jk');
            $alamat = $this->input->post('alamat');
            $hp = $this->input->post('hp');
            $email = $this->input->post('email');
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $prodi = $this->input->post('prodi');
            $role = $this->input->post('role');

            $sql = $this->db->query("SELECT dosbing.NIP_DS, user.email  FROM dosbing LEFT JOIN user ON 
            user.identity=dosbing.NIP_DS WHERE NIP_DS='$nip'");
            $result = $sql->result_array();

            $data1 = [
                'id_user' => $id_u,
                'identity' => $nip,
                'nama' => $nama,
                'email' => $email,
                'image' => 'default.jpg',
                'password' => $password,
                'about' => '',
                'role_id' => $role,
                'is_active' => 1,
                'date_created' => $date,
                'change_pass' => 0
            ];

            $data2 = [
                'ID_DS' => $id_ds,
                'ID_PRODI' => $prodi,
                'NIP_DS' => $nip,
                'NAMA_DS' => $nama,
                'JK_DS' => $jk,
                'ALAMAT_DS' => $alamat,
                'HP_DS' => $hp
            ];

            if($result==true)
            {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">nip/email sudah terdaftar</div>');
                redirect('Dosbing'); 
            }
            $this->db->insert('user', $data1);
            $this->db->insert('dosbing', $data2);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
            redirect('Dosbing');
        }
    }

    public function hapus_dosbing(){
        $nip = $this->input->post('nip');
        $this->m_dosbing->hapus_dosbing($nip);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Berhasil Dihapus</div>');
        redirect('Dosbing');
        // var_dump($result);
    }

    public function edit_dosbing()
    {   
        $data['title'] = 'Edit Data';
        $data['user'] = $this->db->get_where('user', [
            'email' =>
            $this->session->userdata('email')
        ])->row_array();

        $this->form_validation->set_rules('nip', 'Nip', 'required|trim|min_length[18]|max_length[20]', [
            'required' => 'masukkan nip dosen',
            'min_length' => 'nip yang anda masukkan salah',
            'max_length' => 'nip yang anda masukkan salah'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'masukkan nama dosen'
        ]);
        $this->form_validation->set_rules('jk', 'Jk', 'required|trim', [
            'required' => 'pilih jenis kelamin'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'masukkan alamat dosen'
        ]);
        $this->form_validation->set_rules('hp', 'Hp', 'required|trim|min_length[11]|max_length[13]', [
            'required' => 'masukkan nohp dosen',
            'min_length' => 'no hp yang dimasukkan salah',
            'max_length' => 'no hp yang dimasukkan salah'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'masukkan email dosen'
        ]);
        $this->form_validation->set_rules('prodi', 'Prodi', 'required|trim', [
            'required' => 'pilih program studi yang diampu'
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('dosen/dosbing', $data);
            $this->load->view('templates/footer');
        } else {
            $nip = htmlspecialchars($this->input->post('nip'));
            $nama = htmlspecialchars($this->input->post('nama'));
            $jk = $this->input->post('jk');
            $alamat = htmlspecialchars($this->input->post('alamat'));
            $hp = htmlspecialchars($this->input->post('hp'));
            $email = htmlspecialchars($this->input->post('email'));
            $prodi = $this->input->post('prodi');
            $id_u = htmlspecialchars($this->input->post('id_u'));
            $id_ds = htmlspecialchars($this->input->post('id_ds'));
            $role = htmlspecialchars($this->input->post('role'));

            $this->db->query("UPDATE user SET identity='$nip', nama='$nama', email='$email', role_id='$role' WHERE id_user='$id_u'");
            $this->db->query("UPDATE dosbing SET ID_PRODI='$prodi' ,NIP_DS='$nip', NAMA_DS='$nama', JK_DS='$jk', 
            ALAMAT_DS='$alamat', HP_DS='$hp' WHERE ID_DS='$id_ds'");
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Diperbarui</div>');
            redirect('Dosbing');
        }
    }
}