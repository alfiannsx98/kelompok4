<?php

class Crud extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('m_data');
                $this->load->helper('url');
	}
 
	function index(){
		$data['wisata'] = $this->m_data->tampil_data()->result();
		$this->load->view('v_tampil',$data);
    }
    
    function tambah(){
		$this->load->view('v_input');
    }
 
	function tambah_aksi(){
		$NM_WST = $this->input->post('NM_WST');
		$ALAMAT_WST = $this->input->post('ALAMAT_WST');
		$TLP_WST = $this->input->post('TLP_WST');
 
		$data = array(
			'NM_WST' => $NM_WST,
			'ALAMAT_WST' => $ALAMAT_WST,
			'TLP_WST' => $TLP_WST
			);
		$this->m_data->input_data($data,'wisata');
		redirect('crud/index');
    }
    
    function hapus($NM_WST){
		$where = array('NM_WST' => $NM_WST);
		$this->m_data->hapus_data($where,'wisata');
		redirect('crud/index');
    }
    
    function edit($NM_WST){
        $where = array('NM_WST' => $NM_WST);
        $data['wisata'] = $this->m_data->edit_data($where,'wisata')->result();
        $this->load->view('v_edit',$data);
    }

    function update(){
        $ID_WST = $this->input->post('ID_WST');
        $NM_WST = $this->input->post('NM_WST');
        $ALAMAT_WST = $this->input->post('ALAMAT_WST');
        $TLP_WST = $this->input->post('TLP_WST');
     
        $data = array(
            'NM_WST' => $NM_WST,
            'ALAMAT_WST' => $ALAMAT_WST,
            'TLP_WST' => $TLP_WST
        );
     
        $where = array(
            'NM_WST' => $NM_WST
        );
     
        $this->m_data->update_data($where,$data,'wisata');
        redirect('crud/index');
    }
}