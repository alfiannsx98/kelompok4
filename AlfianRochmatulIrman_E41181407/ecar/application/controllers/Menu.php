<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_menu');
        is_logged_in();
    }
    public function index()
    {

        $query_menu = $this->db->query("SELECT * FROM user_menu");
        $field = $query_menu->num_rows();
        $d = date('dm', time());
        $k = "MN";
        $id_menu = $k . $d . ($field + 1);

        $query_user_sub_menu = $this->db->query("SELECT * FROM user_sub_menu");
        $field = $query_user_sub_menu->num_rows();
        $d = date('dm', time());
        $k = "USM";
        $id_user_sub_menu = $k . $d . ($field + 1);

        $data['title'] = 'Management Menu';
        $data['user'] = $this->db->get_where('user', [
            'email' =>
            $this->session->userdata('email')
        ])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_menu' => $id_menu,
                'menu' => ($this->input->post('menu'))
            ];
            // $data1 = [
            //     'id_user_sub_menu' => $id_user_sub_menu,
            //     'id_menu' => $id_menu,
            //     'title' = >
            // ];
            $this->db->insert('user_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
            redirect('menu');
        }
    }
    public function edit_menu()
    {
        $id = $this->input->post('id_menu');
        $menu = $this->input->post('menu');
        $icon_menu = $this->input->post('icon_menu');
        $this->model_menu->edit_menu($id, $menu, $icon_menu);
        redirect('menu');
    }
    function hapus_menu()
    {
        $id = $this->input->post('id');
        $this->model_menu->hapus_menu($id);
        redirect('menu');
    }

    public function edit_submenu()
    {
        $id = $this->input->post('id');
        $menu_id = $this->input->post('menu_id');
        $title = $this->input->post('title');
        $url = $this->input->post('url');
        $icon = $this->input->post('icon');
        $is_active = $this->input->post('is_active');
        $this->model_menu->edit_submenu($id,  $menu_id, $title, $url, $icon, $is_active);
        redirect('menu/submenu');
    }
    public function hapus_submenu()
    {
        $id = $this->input->post('id');
        $this->model_menu->hapus_submenu($id);
        redirect('menu/submenu');
    }

    public function submenu()
    {
        $data['title'] = 'Sub Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' =>

        $this->session->userdata('email')])->row_array();

        $data['subMenu'] = $this->model_menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
            redirect('menu/submenu');
        };
    }
}
