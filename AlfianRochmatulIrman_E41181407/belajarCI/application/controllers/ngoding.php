<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ngoding extends CI_Controller {
	
	function index(){
		// Dibawah ini dia akan memproses untuk meload yang di library, ('malasngoding')
		// lalu dibawahnya pada method nya malsangoding akan dimasukkan dengan $nama_saya()
		// lalu dibawahnya dilanjut dengan mengeluarkan data nama_kamu ("andi")
		$this->load->library('malasngoding');
		$this->malasngoding->nama_saya();
                echo "<br/>";
                $this->malasngoding->nama_kamu("Andi");
	}

}