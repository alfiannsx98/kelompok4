<?php 
 
class Wisata extends CI_Model{
	function ambil_data(){
		return $this->db->get('wisata');
	}
}