<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reg_user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        // $this->load->model('');
    }

    public function index()
    {
        // $data['title'] = 'Dashboard';
        // $data['user'] = $this->db->get_where('user', [
        //     'email' =>
        //     $this->session->userdata('email')
        // ])->row_array();
        $this->load->view('templates/header_reguser.php');
        $this->load->view('templates/sidebar_reguser.php');
        $this->load->view('templates/navbar_reguser.php');
        $this->load->view('auth/v_regUser.php');
        $this->load->view('templates/footer_reguser.php');
        $this->load->view('templates/setting_reguser.php');
        $this->load->view('templates/js_reguser.php');
    }
}
