<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Disini kita membuat subclass belajar, dari peranakan Class CI_Controller
class Belajar extends CI_Controller{

    // Mendefinisikan konstruksi utama 
    function __construct(){ 
        // Mendefinisikan dalam pembentukan subclass dari CI_Controller
        parent::__construct();
    }

    // function index, adalah fungsi yang akan diakses pertama kali ketika controller ini dijalankan
    public function index(){
        // Echo ini akan menampilkan / mencetak data "ini adalah belajar" didalam fungsi index , 
        // public sendiri bersifat (PUBLIK) atau bersifat (UMUM) sehingga bisa diakses dilain tempat...
        echo "ini adalah belajar";
    }
    public function halo(){
        echo "testing ehehhe";
    }

}