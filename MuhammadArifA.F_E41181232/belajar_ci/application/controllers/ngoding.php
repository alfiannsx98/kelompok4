<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ngoding extends CI_Controller
{

    // Berikut adalah method index dengan library malasngoding
    function index()
    {
        $this->load->library('malasngoding');
        $this->malasngoding->nama_saya();
        echo "<br/>";
        $this->malasngoding->nama_kamu("Andi");
    }
}
