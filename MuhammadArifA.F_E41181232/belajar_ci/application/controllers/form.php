<?php

class Form extends CI_Controller
{
    // Method konstruktor memanggil library validasi untuk form
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    // Method index dari kelas Form memanggil sebuah view yang bernama v_form
    function index()
    {
        $this->load->view('v_form');
    }

    // method aksi untuk memeberikan sebuah validasi pada setiap field
    // disitu terdapat sebuah aturan jika field pada form wajib diisi
    function aksi()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('konfir_email', 'Konfirmasi Email', 'required');

        if ($this->form_validation->run() != false) {
            echo "Form validation oke";
        } else {
            $this->load->view('v_form');
        }
    }
}
