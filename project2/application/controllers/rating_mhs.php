<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class rating_mhs extends CI_Controller {

 function __construct()
 {
  parent::__construct();
  $this->load->model('star_rating_model');
  is_logged_in();
 }

 function index()
 {
    $data['title'] = 'rating_mhs';
    $data['user'] = $this->db->get_where('user', [
        'email' => 
        $this->session->userdata('email')
    ])->row_array();
    

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('eksperimen/rating_mhs', $data);
 }

 function fetch()
 {
  echo $this->star_rating_model->html_output();
 }

 function insert()
 {
  if($this->input->post('id_pr'))
  {
   $data = array(
    'id_pr'  => $this->input->post('id_pr'),
    'rating'   => $this->input->post('index')
   );
   $this->star_rating_model->insert_rating($data);
  }
 }

}
?>
