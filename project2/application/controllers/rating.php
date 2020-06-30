<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class rating extends CI_Controller {

 function __construct()
 {
  parent::__construct();
  $this->load->model('star_rating_model');
  $this->load->library('pagination');
  $this->load->model('m_perusahaan');
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
    redirect('rating');
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
 function list_perusahaan() 
 {
  $data['title'] = 'List Perusahaan';
  $data['user'] = $this->db->get_where('user', [
      'email' =>
      $this->session->userdata('email')
  ])->row_array();

  $data['show_pr'] = $this->db->get('perusahaan')->result_array();

  // Start konfigurasi Pagination
  $config['base_url'] = site_url('dashboard_mahasiswa/index');
  $config['total_rows'] = $this->db->count_all('perusahaan');
  $config['per_page'] = 10;
  $config['uri_segment'] = 3;
  $choice = $config['total_rows'] / $config['per_page'];
  $config['num_links'] = floor($choice);

  // Style pagination
  $config['first_link']       = 'First';
  $config['last_link']        = 'Last';
  $config['next_link']        = 'Next';
  $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
  $config['full_tag_close']   = '</ul></nav></div>';
  $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
  $config['num_tag_close']    = '</span></li>';
  $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
  $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
  $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
  $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
  $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
  $config['prev_tagl_close']  = '</span>Next</li>';
  $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
  $config['first_tagl_close'] = '</span></li>';
  $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
  $config['last_tagl_close']  = '</span></li>';

  $this->pagination->initialize($config);
  $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

  // Panggil function get perusahaan
  $data['data'] = $this->m_perusahaan->get_perusahaan_list($config['per_page'], $data['page']);

  $data['pagination'] = $this->pagination->create_links();
  // Akhir Pagination

  $this->load->view('templates/header', $data);
  $this->load->view('templates/sidebar', $data);
  $this->load->view('templates/topbar', $data);
  $this->load->view('list_perusahaan/index', $data);
  $this->load->view('templates/footer');
 }
}
?>
