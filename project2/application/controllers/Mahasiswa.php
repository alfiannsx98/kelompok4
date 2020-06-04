<?php

use PhpParser\Node\Expr\Empty_;

defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_mahasiswa');
        is_logged_in();
    }

    public function index()
    {
        $query1 = $this->db->query("SELECT * FROM user");
        $query = $this->db->query("SELECT * FROM mahasiswa");
        $tabel1 = $query1->num_rows();
        $tabel = $query->num_rows();
        $date = date('dm', time());
        $id_u = "ID-U" . $tabel1 . $date;
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
            $nim = htmlspecialchars($this->input->post('nim'));
            $nama = htmlspecialchars($this->input->post('nama'));
            $prodi = htmlspecialchars($this->input->post('prodi'));

            $sql = $this->db->query("SELECT mahasiswa.NIM, user.email  FROM mahasiswa LEFT JOIN user ON 
            user.identity=mahasiswa.NIM WHERE NIM='$nim'");
            $result = $sql->result_array();

            $data1 = [
                'id_user' => $id_u,
                'identity' => $nim,
                'nama' => $nama,
                'email' => '',
                'image' => 'default.jpg',
                'password' => '',
                'about' => '',
                'role_id' => '',
                'is_active' => '',
                'date_created' => time(),
                'change_pass' => ''
            ];

            $data2 = [
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
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">nim sudah terdaftar</div>');
                redirect('Mahasiswa'); 
            }
            $this->db->insert('user', $data1);
            $this->db->insert('mahasiswa', $data2);
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
        $nim = $this->input->post('nim');
        $data['title'] = 'Edit Data';
        $data['user'] = $this->db->get_where('user', [
            'email' =>
            $this->session->userdata('email')
        ])->row_array();

        $data['mhs'] = $this->m_mahasiswa->getMahasiswa();
        $data['pr'] = $this->m_mahasiswa->getProdi(); 
        // $a = $this->m_mahasiswa->cekEmail();
        // var_dump($a);
        
        $this->form_validation->set_rules('nim', 'Nim', 'required|trim|min_length[9]|max_length[9]', [
            'required' => 'masukkan nim mahasiswa',
            'min_length' => 'nim yang anda masukkan salah',
            'max_length' => 'nim yang anda masukkan salah'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'masukkan nama mahasiswa'
        ]);
        $this->form_validation->set_rules('jk', 'Jk', 'trim', [
            'required' => 'pilih jenis kelamin'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim', [
            'required' => 'masukkan alamat mahasiswa'
        ]);
        $this->form_validation->set_rules('hp', 'Hp', 'trim|min_length[11]|max_length[13]', [
            'required' => 'masukkan nohp mahasiswa',
            'min_length' => 'no hp yang dimasukkan salah',
            'max_length' => 'no hp yang dimasukkan salah'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email', [
            'required' => 'masukkan email mahasiswa'
        ]);
        $this->form_validation->set_rules('prodi', 'Prodi', 'required|trim', [
            'required' => 'pilih program studi mahasiswa'
        ]);
        $this->form_validation->set_rules('semester', 'Semester', 'trim', [
            'required' => 'pilih semester mahasiswa'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('mahasiswa/mahasiswa', $data);
            $this->load->view('templates/footer');
        } else {
            if($data['mhs']['email']!=="")
            {
                $nim = htmlspecialchars($this->input->post('nim'));
                $nama = htmlspecialchars($this->input->post('nama'));
                $jk = $this->input->post('jk');
                $alamat = htmlspecialchars($this->input->post('alamat'));
                $hp = htmlspecialchars($this->input->post('hp'));
                $email = htmlspecialchars($this->input->post('email'));
                $prodi = htmlspecialchars($this->input->post('prodi'));
                $semester = htmlspecialchars($this->input->post('semester'));
                $id_u = htmlspecialchars($this->input->post('id_u'));
                $id = htmlspecialchars($this->input->post('id'));

                $this->db->query("UPDATE user SET identity='$nim', nama='$nama', email='$email' WHERE id_user='$id_u'");
                $this->db->query("UPDATE mahasiswa SET ID_PRODI='$prodi' ,NIM='$nim', NAMA_M='$nama', JK_M='$jk', SMT='$semester',
                ALAMAT_M='$alamat', HP_M='$hp' WHERE ID_M='$id'");
            }
            else
            {
                $nim = htmlspecialchars($this->input->post('nim'));
                $nama = htmlspecialchars($this->input->post('nama'));
                $prodi = $this->input->post('prodi');
                $id_u = htmlspecialchars($this->input->post('id_u'));
                $id = htmlspecialchars($this->input->post('id'));
    
                $this->db->query("UPDATE user SET identity='$nim', nama='$nama' WHERE id_user='$id_u'");
                $this->db->query("UPDATE mahasiswa SET ID_PRODI='$prodi' ,NIM='$nim', NAMA_M='$nama' WHERE ID_M='$id'");

            }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Diperbarui</div>');
            redirect('Mahasiswa');  
        }
    }
}