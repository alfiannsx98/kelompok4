<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Download extends CI_Controller
{

    //Berikut merupakan fungsi atau method konstruktor dari kelas download
    //Yang pertama di load adalah helper yang memanggil url dan download 
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'download'));
    }

    //Fungsi atau method dibawah memanggil index yang mengarah ke view v_download 
    public function index()
    {
        $this->load->view('v_download');
    }

    //Fungsi atau method dibawah melakukan aksi mendownload gambar dari direktori gambar dengan nama globe.png
    public function lakukan_download()
    {
        force_download('gambar/globe.png', NULL);
    }
}
