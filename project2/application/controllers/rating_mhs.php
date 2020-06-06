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
    
    $get_kuis = $this->db->get('kuisioner')->num_rows();

    for($i = 1; $i <= $get_kuis; $i++){
      $this->form_validation->set_rules('opsi'.$i, 'opsi'.$i, 'required');
    }
    
    if($this->form_validation->run() == false){  
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('eksperimen/rating_mhs', $data);
      $this->load->view('templates/footer');
    }else{

    for($j = 1; $j <= $get_kuis; $j++)
    {
      $kuisioner[$j] = $this->input->post('kuisioner'.$j);
      $opsi[$j] = $this->input->post('opsi'.$j);
      $id_mahasiswa = $this->input->post('id_mahasiswa');
      $id_perusahaan = $this->input->post('id_pr');

      $data = [
        'id_kuis' => htmlspecialchars("IDQ0" . $j),
        'id_kuisioner' => htmlspecialchars($kuisioner[$j]),
        'id_pr' => htmlspecialchars($id_perusahaan),
        'id_m' => $id_mahasiswa,
        'nilai' => $opsi[$j]
      ];
      $this->db->insert('m_kuisioner', $data);
    }
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Kuisioner Disimpan</div>');
    redirect('rating_mhs');
    }

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
