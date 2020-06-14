<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dashboard_mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('m_perusahaan');
        is_logged_in();
    }

    public function index()
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