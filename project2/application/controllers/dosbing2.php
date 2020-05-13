<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosbing extends CI_Controller {

    function __construct(){
        parent::__construct();	
            // ini adalah function untuk memuat model bernama m_data
        $this->load->model('m_data');
    }
    //  method yang akan diakses saat controller ini diakses
    function index(){
    $data['title'] = 'Dashboard';
    $data['user'] = $this->db->get_where('user', [
        'email' =>
        $this->session->userdata('email')    
    ])->row_array();
    // ini adalah variabel array $data yang memiliki index user, berguna untuk menyimpan data 
    $data['dosbing'] = $this->m_data->tampil_data()->result();
    // ini adalah baris kode yang berfungsi menampilkan v_tampil dan membawa data dari tabel user
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('dosbing/v_dosbing', $data);
    $this->load->view('templates/footer');
    }

    function tambah(){

    $data['title'] = 'Dashboard';
    $data['user'] = $this->db->get_where('user', [
        'email' =>
        $this->session->userdata('email')    
    ])->row_array();

    $data['dosbing'] = $this->m_data->tampil_data()->result();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('dosbing/v_inputdosbing',$data);
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
        $this->m_data->input_data($data,'dosbing');
    // kode yang berfungsi mengarahkan pengguna ke link base_url()crud/index/ 
    redirect('dosbing');
    }

    function hapus($id){
        // baaris kode ini berisi fungsi untuk menyimpan id user kedalam array $where pada index array bernama 'id'
        $where = array('ID_DS' => $id);
        // kode di bawah ini untuk menjalankan query hapus yang berasal dari method hapus_data() pada model m_data
            $this->m_data->hapus_data($where,'dosbing');
        // kode yang berfungsi mengarakan pengguna ke link base_url()crud/
        redirect('dosbing');
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
        $data['dosbing'] = $this->m_data->edit_data($where,'dosbing')->result();
        // kode ini memuat vie edit dan membawa data hasil query diatas
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('dosbing/v_editdosbing',$data);
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
            $this->m_data->update_data($where,$data,'dosbing');
            // baris kode yang mengerahkan pengguna ke link base_url()crud/
            redirect('dosbing');
        }
}