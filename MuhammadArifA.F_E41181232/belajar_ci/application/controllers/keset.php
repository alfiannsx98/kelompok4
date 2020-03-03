<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('html');
    }

    public function index()
    {
        $this->load->view('keset');
    }
}
