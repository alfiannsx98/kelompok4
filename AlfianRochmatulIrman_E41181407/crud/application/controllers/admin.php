<?php 

class Admin extends CI_Controller{

	function __construct(){
		parent::__construct();
	// controller dibawah ini akan menggunakan session yang ada di browser yang nantinya dia akan menyimpan data dalams esi tertentu
	// jika session lalu userdatanya tidak login atau belum login, maka dia akan menuju ke tampilan login.
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}

	function index(){
		// user sudah login maka akan terredirect kearah v_admin
		$this->load->view('v_admin');
	}
}