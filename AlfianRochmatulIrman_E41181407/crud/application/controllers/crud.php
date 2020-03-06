<?php 

class Crud extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('m_data');
		$this->load->helper('url');
		// construct disini dia mirip seperti import jika di java, dia akan memanggil model, dan helper.

	}

	function index(){
		$data['user'] = $this->m_data->tampil_data()->result();
		// untuk data['user'] ini dia akan memproses m_data lalu memproses tampil data, dan akhirnya keluar hasil atau result
		// lalu data yang telah diproses akan ditampilkan di v_tampil
		$this->load->view('v_tampil',$data);
	}

	function tambah(){
		// padah fungsi tambah ini , dia akan menampilkan view v_input ketika memanggil fungsi tambah
		$this->load->view('v_input');
	}

	function tambah_aksi(){
		// lalu ketika fungsi ini dijalankan, maka dia akan menginputkan data dari variabel $nama, $alamat, $pekerjaan. lalu menginputkan dalam bentuk post
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$pekerjaan = $this->input->post('pekerjaan');

		// data akan disimpan dalam array, dengan penamaan seperti berikut. 
		$data = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'pekerjaan' => $pekerjaan
			);
			// lalu data ini akan diproses oleh model, lalu akan menginputkan data, lalu akan dimasukkan kedalam database user
		$this->m_data->input_data($data,'user');
		// dan jika berhasil maka dia akan kembalike tampilan awal 
		redirect('crud/index');
	}

	function hapus($id){
		// pada hapus ini dia akan menghapus data berdasarkan $id 
		// dimana dia akan mencari array('id') dari variabel $id, dengan get data.
		$where = array('id' => $id);
		// lalu akan diproses oleh model (m_data) dan menjalankan fungsi hapus_data yang terdapat di model.
		$this->m_data->hapus_data($where,'user');
		redirect('crud/index');
	}
	function edit($id){
		$where = array('id' => $id);
		// sama seperti hapus, tetapi bedanya disini, fungsi edit dia akan mengubah atau memodifikasi data yang telah tersimpan
		// diproses dengan model, lalu diedit.
		$data['user'] = $this->m_data->edit_data($where,'user')->result();
		$this->load->view('v_edit',$data);
	}
	function update(){
		// pada fungsi update ini dia akan memproses dalam mengirimkan data seperti id,nama,alamat,pekerjaan
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$pekerjaan = $this->input->post('pekerjaan');
	
		$data = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'pekerjaan' => $pekerjaan
		);
		// data yang diproses berdasarkan id database yang mau diedit
		$where = array(
			'id' => $id
		);
	
		$this->m_data->update_data($where,$data,'user');
		redirect('crud/index');
	}
}