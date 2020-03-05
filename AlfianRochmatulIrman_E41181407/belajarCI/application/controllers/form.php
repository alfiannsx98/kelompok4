<?php 

class Form extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		// pada tahap ini, fungsi construct akan mempersiapkan dan memproses form_validation yang terdapat didalam library
	}

	function index(){
		$this->load->view('v_form');
	}

	function aksi(){
		//lalu selanjutnya, pada form_validation , dia akan menerapkan rules/aturan yang akan digunakan dalam mengisikan form dibawahnya. Seperti nama, required dll.
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('konfir_email','Konfirmasi Email','required');

		// lalu pada kode dibawah inni,akan membuat kondisi. jika form validation dirun/diproses maka hasilnya tidak salah (benar) maka 
		// cetak "Form Validation Oke", namun jika salah maka dia akan menampilkan view (v_form)
		if($this->form_validation->run() != false){
			echo "Form validation oke";
		}else{
			$this->load->view('v_form');
		}
	}
}