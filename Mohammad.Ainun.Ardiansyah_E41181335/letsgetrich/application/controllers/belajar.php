<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Belajar extends CI_Controller {
	
	function __construct(){
        parent::__construct();
        $this->load->model('Wisata');
		
	}
 
	public function index(){
		echo "ini method index pada controller belajar controller";
	}
 
	public function halo(){
        $data = array(
			'pertanyaan' => "apa yang dikirimkan?",
			'jawab' => "tahu"
			);
		$this->load->view('view_belajar', $data);
    }
    
 
	function wisata(){
		$data['wisata'] = $this->Wisata->ambil_data()->result();
		$this->load->view('view_wisata.php',$data);
	}
 
}
?>