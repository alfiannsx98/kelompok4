<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class belajarview extends CI_Controller {
	
	function __construct(){
        parent::__construct();
        $this->load->model('m_data');
	}

    function user(){
        // Pada controller ini, $data['user'] akan mengambil data dari dalam Model yang bernama "m_data", lalu melakukan fungsi "ambil_data()"
        // dan akhirnya mengeluarkan hasil datanya, lalu diload melalui view (v_user.php), dengan $data.
        $data['user'] = $this->m_data->ambil_data()->result();
        $this->load->view('v_user.php', $data);
    }
}