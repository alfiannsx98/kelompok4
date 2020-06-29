<?php
defined('BASEPATH') or exit('No direct script access allowed');
    /** Controllers untuk user dosbing */

    class Mhs extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('m_mhs');
            // is_logged_in();
        }

        /**
         * Fungsi menampilkan dashboard per user
         */
        public function index() 
        {
            $mail = $this->session->userdata('email');
            $data['title'] = "Mahasiswa Bimbingan";
            $data['bimbingan'] = $this->m_mhs->mhs($mail);        
            $data['user'] = $this->db->get_where('user', "email='$mail'")->row_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('userdosbing/mhs', $data);
            $this->load->view('templates/footer');  
        }
    }

?>