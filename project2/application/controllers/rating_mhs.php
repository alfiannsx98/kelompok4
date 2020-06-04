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
  $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
  $rslt_user = $user['id_user'];
  $qr_rating = $this->db->get_where('rating1', ['id_user' => $rslt_user])->num_rows();
  if($qr_rating > 0)
  {
    echo $this->star_rating_model->output_sudah_isi();
  }else{
    echo $this->star_rating_model->html_output();
  }
 }

 function fetch_bintang()
 {
    echo $this->star_rating_model->output_bintang();
 }

 function insert()
 {
  if($this->input->post('id_pr'))
  {
   $data = array(
    'id_pr'  => $this->input->post('id_pr'),
    'rating'   => $this->input->post('index'),
    'id_user' => $this->input->post('id_user')
   );
   $this->star_rating_model->insert_rating($data);
  }
 }

}
?>
