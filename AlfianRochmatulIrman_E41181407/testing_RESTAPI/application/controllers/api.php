<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class api extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('api_model');
        $this->load->library('form_validation');
    }

	public function index()
	{
        $data = $this->api_model->fetch_all();
        echo json_encode($data->result_array());
    }
}