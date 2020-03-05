<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','Download'));				
	}

	public function index(){		
		$this->load->view('V_download');
	}

	public function lakukan_download(){				
		force_download('gambar/joker.jpg',NULL);
	}	

}