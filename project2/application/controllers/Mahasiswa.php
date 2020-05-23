<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_mahasiswa');
        // is_logged_in();
    }

    public function index()
    {
        $query = $this->db->query("SELECT * FROM mahasiswa");
        $tabel = $query->num_rows();
        $date = date('dm', time());
        $id_m = "ID-M" . $tabel . $date;

        $data['title'] = 'Mahasiswa';
        $data['user'] = $this->db->get_where('user', [
            'email' => 
            $this->session->userdata('email')
        ])->row_array();

        $data['mhs'] = $this->m_mahasiswa->getMahasiswa();
        $data['pr'] = $this->m_mahasiswa->getProdi(); 

        $this->form_validation->set_rules('nim', 'Nim', 'required|trim|min_length[9]|max_length[9]', [
            'required' => 'masukkan nim mahasiswa',
            'min_length' => 'nim yang anda masukkan salah',
            'max_length' => 'nim yang anda masukkan salah'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'masukkan nama mahasiswa'
        ]);
        $this->form_validation->set_rules('prodi', 'Prodi', 'required|trim', [
            'required' => 'pilih program studi mahasiswa'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('mahasiswa/mahasiswa', $data);
            $this->load->view('templates/footer');
        } else {
            $nim = $this->input->post('nim');
            $nama = $this->input->post('nama');
            $prodi = $this->input->post('prodi');

            $sql = $this->db->query("SELECT mahasiswa.NIM, user.email  FROM mahasiswa LEFT JOIN user ON 
            user.identity=mahasiswa.NIM WHERE NIM='$nim'");
            $result = $sql->result_array();

            // $data1 = [
            //     'id_user' => $id_u,
            //     'identity' => $nip,
            //     'nama' => $nama,
            //     'email' => $email,
            //     'image' => 'default.jpg',
            //     'password' => $password,
            //     'about' => '',
            //     'role_id' => $role,
            //     'is_active' => 2,
            //     'date_created' => $date,
            //     'change_pass' => 0
            // ];

            $data1 = [
                'ID_M' => $id_m,
                'ID_PRODI' => $prodi,
                'NIM' => $nim,
                'NAMA_M' => $nama,
                'JK_M' => "",
                'SMT' => "",
                'ALAMAT_M' => "",
                'HP_M' => "",
                'ST_KETUA' => ""
            ];

            if($result==true)
            {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">nim/email sudah terdaftar</div>');
                redirect('Mahasiswa'); 
            }
        
            $this->db->insert('mahasiswa', $data1);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
            redirect('Mahasiswa');
        }
    }

    public function hapus_mahasiswa(){
        $nim = $this->input->post('nim');
        $this->m_mahasiswa->hapus_mahasiswa($nim);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Berhasil Dihapus</div>');
        redirect('Mahasiswa');
    }

    public function edit_mahasiswa()
    {   
        $data['title'] = 'Edit Data';
        $data['user'] = $this->db->get_where('user', [
            'email' =>
            $this->session->userdata('email')
        ])->row_array();

        $this->form_validation->set_rules('nim', 'Nim', 'required|trim|min_length[9]|max_length[9]', [
            'required' => 'masukkan nim mahasiswa',
            'min_length' => 'nim yang anda masukkan salah',
            'max_length' => 'nim yang anda masukkan salah'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'masukkan nama mahasiswa'
        ]);
        $this->form_validation->set_rules('jk', 'Jk', 'required|trim', [
            'required' => 'pilih jenis kelamin'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'masukkan alamat mahasiswa'
        ]);
        $this->form_validation->set_rules('hp', 'Hp', 'required|trim|min_length[11]|max_length[13]', [
            'required' => 'masukkan nohp mahasiswa',
            'min_length' => 'no hp yang dimasukkan salah',
            'max_length' => 'no hp yang dimasukkan salah'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'masukkan email mahasiswa'
        ]);
        $this->form_validation->set_rules('prodi', 'Prodi', 'required|trim', [
            'required' => 'pilih program studi mahasiswa'
        ]);
        $this->form_validation->set_rules('semester', 'Semester', 'required|trim', [
            'required' => 'pilih semester mahasiswa'
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('mahasiswa/mahasiswa', $data);
            $this->load->view('templates/footer');
        } else {
            $nim = htmlspecialchars($this->input->post('nim'));
            $nama = htmlspecialchars($this->input->post('nama'));
            $jk = $this->input->post('jk');
            $alamat = htmlspecialchars($this->input->post('alamat'));
            $hp = htmlspecialchars($this->input->post('hp'));
            $email = htmlspecialchars($this->input->post('email'));
            $prodi = $this->input->post('prodi');
            $semester = $this->input->post('semester');
            $id_u = htmlspecialchars($this->input->post('id_u'));
            $id = htmlspecialchars($this->input->post('id'));

            $this->db->query("UPDATE user SET identity='$nim', nama='$nama', email='$email' WHERE id_user='$id_u'");
            $this->db->query("UPDATE mahasiswa SET ID_PRODI='$prodi' ,NIM='$nim', NAMA_M='$nama', JK_M='$jk', SMT='$semester',
            ALAMAT_M='$alamat', HP_M='$hp' WHERE ID_M='$id'");
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Diperbarui</div>');
            redirect('Mahasiswa');
        }
    }
}