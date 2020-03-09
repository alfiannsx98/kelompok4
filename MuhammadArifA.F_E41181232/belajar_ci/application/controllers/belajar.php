<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Belajar extends CI_Controller
{

    //ini merupakan konstruktor untuk meload data, jadi konstruktor belajar akan ditampilkan disini.
    //contoh konstruktor dibawah ini memanggil model m_data yang terhubung dengan database.
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_data');
    }

    //ini adalah fungsi atau method user untuk mengambil data dari untuk menampilkan data dari view
    //fungsi disini menampilkan data dari m_data ke database dari view v_user.
    function user()
    {
        $data['user'] = $this->m_data->ambil_data()->result();
        $this->load->view('v_user.php', $data);
    }
}
