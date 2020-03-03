<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ngoding extends CI_Controller
{

    function index()
    {
        $this->load->library('malasngoding');
        $this->malasngoding->nama_saya();
        echo "<br/>";
        $this->malasngoding->nama_kamu("Andi");
    }
}
