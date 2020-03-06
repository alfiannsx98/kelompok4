<?php


class Upload extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		// pada coding ini, dia akan memanggil helper untuk memasukkan data array kedalam form, beserta url.
	}

	public function index(){
		$this->load->view('v_upload', array('error' => ' ' ));
		// lalu dilanjutkan dengan method ini.
	}

	public function aksi_upload(){
		// Pada fungsi aksi_upload ini, berfungsi dalam mengupload file dengan ketentuan ketntuan format yang diatur.
		$config['upload_path']          = './gambar/';
		// Disini upload_path berguna dalam mengatur tempat yang nantinya ketika sesudah diupload file tsb akan ditaruh di uploadpath
		$config['allowed_types']        = 'gif|jpg|png';
		// di allowed_types ini berfungsi dalam mengatur format file apa saja yang diperbolehkan atau bisa diupload
		$config['max_size']             = 100;
		// pada max_size ini diatur dalam berapa maksimal atau berapa ukuran maksimal file yang dapat diupload
		$config['max_width']            = 1024;
		// untuk max_width ini diatur ukuran lebar dari file yang diupload
		$config['max_height']           = 768;
		// untuk max_height ini diatur untuk ukuran tinggi dari file yang diupload

		// pada method dibawah ini, dia akan memanggil fungsi load dari library lalu menggunakan method upload beserta $config yang terdapat di controller upload.php
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('berkas')){
			// lalu disini dia akan membuat kondisi jika diupload itu hasilnya true, maka akan menampilkan error
			$error = array('error' => $this->upload->display_errors());
			// method $error akan memanggil array yang menyimpan nilai error dari display error.
			$this->load->view('v_upload', $error);
			// tampilan errornya akan ditampilkan di view v_upload
		}else{
			// jika berhasil dalam mengupload alias hasilnya itu false, maka dia akan sukses mengupload 
			$data = array('upload_data' => $this->upload->data());
			// disini dia akan memproses method $data, yang berguna dalam mengupload gambar yang akan diupload
			$this->load->view('v_upload_sukses', $data);
			// lalu disini dia akan meload tampilan v_upload_sukses dengan menyertakan method data yang sehingga dapat memproses upload
		}
	}
	
}