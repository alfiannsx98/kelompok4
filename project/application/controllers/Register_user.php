<?php
// defined('BASEPATH') or exit('No direct script access allowed');

class Register_user extends CI_Controller
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
        $this->load->view('auth/register-user.php');
    }
}
