<?php
defined('BASEPATH') or exit('No direct script access allowed');

class rating extends CI_Controller
{
    public function __construct()
    {
            parent::__construct();
            $this->load->model('star_rating_model');
            is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Manajemen Rating';
        $data['user'] = $this->db->get_where('user', ['email'=> $this->session->userdata('email')])->row_array();

        $data['rating'] = $this->db->get('rating')->result_array();
    }

    public function add()
    {

    }
}