<?php 

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('m_login');

	}

	function index(){
		$this->load->view('v_login');
	}

	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		// pada tahap fungsi aksi_login ini dia akan memproses username dan password, 
		// dimana array username dan password akan diproses, password diproses dengan md5.
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
			// lalu akan melakukan pengecekan username dan password di method $cek
			// lalu akan dicocokan melalui model m_login, lalu memanggil fungsi cek_login yang mencocokan dari database admin yang diurutkan berdasarkan nomor baris
		$cek = $this->m_login->cek_login("admin",$where)->num_rows();
		if($cek > 0){
			// lalu selanjutnya dia akan mengecek, jika method $cek itu true maka,
			// dia akan memasukkan data array kedalam $data_session yang datanya diambil dari array
			$data_session = array(
				// disini array 'nama' akan diisikan dari variabel $username
				'nama' => $username,
				'status' => "login"
				);
				// lalu untuk set_userdatanya akan diisikan data dari variabel $data_session
			$this->session->set_userdata($data_session);
				// lalu akan diarahkan kearah tampilan admin
			redirect(base_url("admin"));

		}else{
			echo "Username dan password salah !";
		}
	}

	function logout(){
		// lalu pada fungsi logout ini dia akan menghancurkan atau menghapus data yang telah diset di session
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}