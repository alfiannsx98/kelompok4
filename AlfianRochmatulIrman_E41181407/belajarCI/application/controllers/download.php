<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		// Pada $this->load, disini dia akan memanggil fungsi (load) dari helper, dengan cara $this->load-> lalu menuju keaerah (helper)
		// dipanggil dalam bentuk array lalu tertulis URL, dan fungsi download. 
		// pada fungsi construct disini berguna dalam menyiapkan data yang nanti siap diproses oleh index.
		$this->load->helper(array('url','download'));				
	}

	public function index(){		
		$this->load->view('v_download');
	}

	public function lakukan_download(){	
		// Disini method (force_download) akan mendownload secara langsung dari url yang tersedia yaitu, force_download('url', NULL)
		// lalu akan didownload secara otomatis.
		force_download('gambar/97895.png',NULL);
	}	

}