<?php 

class Crud extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('M_data');
                $this->load->helper('url');
	}

	function index(){
		$data['user'] = $this->M_data->tampil_data()->result();
		$this->load->view('V_tampil',$data);
	}

	function tambah(){
		$this->load->view('V_input');
	}

	function tambah_aksi(){
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$pekerjaan = $this->input->post('pekerjaan');
 
		$data = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'pekerjaan' => $pekerjaan
			);
		$this->M_data->input_data($data,'user');
		redirect('Crud/index');
	}

	function hapus($id){
		$where = array('id' => $id);
		$this->M_data->hapus_data($where,'user');
		redirect('Crud/index');
	}

	function edit($id){
		$where = array('id' => $id);
		$data['user'] = $this->M_data->edit_data($where,'user')->result();
		$this->load->view('V_edit',$data);
	}

	function update(){
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$pekerjaan = $this->input->post('pekerjaan');
	
		$data = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'pekerjaan' => $pekerjaan
		);
	
		$where = array(
			'id' => $id
		);
	
		$this->M_data->update_data($where,$data,'user');
		redirect('Crud/index');
	}
}