<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
	}

	public function index()
	{
        // load view dashboard.php
        // $this->load->view("auth/_header.php");
        // $this->load->view("auth/_sidebar.php");
        // $this->load->view("auth/_navbar.php");
        $this->load->view("dashboard");
        // $this->load->view("auth/_footer.php");
        // $this->load->view("auth/_setting.php");
        // $this->load->view("auth/_js.php");
	}
}