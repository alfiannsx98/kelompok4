<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_mahasiswa extends CI_Controller {

    function __construct(){
        parent::__construct();	
            // ini adalah function untuk memuat model bernama m_data
        $this->load->model('m_data1');
            
        }
    //  method yang akan diakses saat controller ini diakses
        function index(){
            $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', [
            'email' =>
            $this->session->userdata('email')    
        ])->row_array();
        // ini adalah variabel array $data yang memiliki index user, berguna untuk menyimpan data 
        $data['mahasiswa'] = $this->m_data1->tampil_data()->result();
        // ini adalah baris kode yang berfungsi menampilkan v_tampil dan membawa data dari tabel user
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/v_mahasiswa', $data);
        $this->load->view('templates/footer');
        }

        function tambah(){

            $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', [
            'email' =>
            $this->session->userdata('email')    
        ])->row_array();

        $data['mahasiswa'] = $this->m_data1->tampil_data()->result();

            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('templates/topbar',$data);
            $this->load->view('admin/v_inputmahasiswa',$data);
            $this->load->view('templates/footer');
        }

        function tambah_mahasiswa(){
            // ini adalah baris kode yang berfungsi merekam data yang diinput oleh pengguna
              $ID_M = $this->input->post('ID_M');
              $NIM = $this->input->post('NIM');
              $NAMA_M = $this->input->post('NAMA_M');
              $JK_M = $this->input->post('JK_M');
              $PRODI_M= $this->input->post('PRODI_M');
              $SMT = $this->input->post('SMT');
              $ALAMAT_M = $this->input->post('ALAMAT_M');
              $HP_M= $this->input->post('HP_M');
              $EMAIL_M = $this->input->post('EMAIL_M');
              $PASSWORD_M = $this->input->post('PASSWORD_M');
             
            // array yang berguna untuk mennjadikanva variabel diatas menjadi 1 variabel yang nantinya akan di sertakan dalam query insert
              $data = array(
                  
                  'ID_M' => $ID_M,
                  'NIM' => $NIM,
                  'NAMA_M' => $NAMA_M,
                  'JK_M' => $JK_M,
                  'PRODI_M' => $PRODI_M,
                  'SMT' => $SMT,
                  'ALAMAT_M' => $ALAMAT_M,
                  'HP_M' => $HP_M,
                  'EMAIL_M' => $EMAIL_M,
                  'PASSWORD_M' => $PASSWORD_M,
            );
            // method yang berfungsi melakukan insert ke dalam database yang mengirim 2 parameter yaitu sebuah array data dan nama tabel yang dimaksud
              $this->m_data1->input_data($data,'mahasiswa');
          // kode yang berfungsi mengarahkan pengguna ke link base_url()crud/index/ 
          redirect('C_mahasiswa/index');
          }

          function hapus($id){
            // baaris kode ini berisi fungsi untuk menyimpan id user kedalam array $where pada index array bernama 'id'
          $where = array('ID_M' => $id);
          // kode di bawah ini untuk menjalankan query hapus yang berasal dari method hapus_data() pada model m_data
              $this->m_data1->hapus_data($where,'mahasiswa');
          // kode yang berfungsi mengarakan pengguna ke link base_url()crud/index/
          redirect('C_mahasiswa/index');
          }

          function edit($id){

            $data['title'] = 'Dashboard';
            $data['user'] = $this->db->get_where('user', [
                'email' =>
                $this->session->userdata('email')    
            ])->row_array();
            // kode yang berfungsi untuk menyimpan id user ke dalam array $where pada index array benama id
            $where = array('ID_M' => $id);
            // kode di bawah ini adalah kode yang mengambil data user berdasarkan id dan disimpan kedalam array $data dengan index bernama user
            $data['mahasiswa'] = $this->m_data1->edit_data($where,'mahasiswa')->result();
            // kode ini memuat vie edit dan membawa data hasil query diatas
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('templates/topbar',$data);
            $this->load->view('admin/v_editmahasiswa',$data);
            $this->load->view('templates/footer');
           
        }
    
        // baris kode function update adalah method yang diajalankan ketika tombol submit pada form v_edit ditekan, method ini berfungsi untuk merekam data, memperbarui baris database yang dimaksud, lalu mengarahkan pengguna ke controller crud method index
        function update(){
            // keempat baris kode ini berfungsi untuk merekam data yang dikirim melalui method post
            
            $ID_M = $this->input->post('ID_M');
            $NIM = $this->input->post('NIM');
            $NAMA_M = $this->input->post('NAMA_M');
            $JK_M = $this->input->post('JK_M');
            $PRODI_M= $this->input->post('PRODI_M');
            $SMT = $this->input->post('SMT');
            $ALAMAT_M = $this->input->post('ALAMAT_M');
            $HP_M= $this->input->post('HP_M');
            $EMAIL_M = $this->input->post('EMAIL_M');
            $PASSWORD_M = $this->input->post('PASSWORD_M');
           
          // array yang berguna untuk mennjadikanva variabel diatas menjadi 1 variabel yang nantinya akan di sertakan dalam query insert
            $data = array(
                
                'ID_M' => $ID_M,
                'NIM' => $NIM,
                'NAMA_M' => $NAMA_M,
                'JK_M' => $JK_M,
                'PRODI_M' => $PRODI_M,
                'SMT' => $SMT,
                'ALAMAT_M' => $ALAMAT_M,
                'HP_M' => $HP_M,
                'EMAIL_M' => $EMAIL_M,
                'PASSWORD_M' => $PASSWORD_M,
                );
            
                // kode yang berfungsi menyimpan id user ke dalam array $where pada index array bernama id
                $where = array(
                    'ID_M' => $ID_M
                );
            
                // kode untuk melakukan query update dengan menjalankan method update_data() 
                $this->m_data1->update_data($where,$data,'mahasiswa');
                // baris kode yang mengerahkan pengguna ke link base_url()crud/index/
                redirect('C_mahasiswa/index');
            }
}
