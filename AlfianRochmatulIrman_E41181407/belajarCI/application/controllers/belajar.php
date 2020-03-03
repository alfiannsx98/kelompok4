<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Belajar extends CI_Controller{

    function __construct(){
        parent::__construct();
    }

    public function index(){
        echo "ini adalah belajar";
    }
    public function halo(){
        echo "testing ehehhe";
    }

}