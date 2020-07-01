<?php
defined('BASEPATH') or exit('No direct script access allowed');

class logbook extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('model_logbook');
        is_logged_in();
    }
    public function index()
    {
        $query1 = $this->db->query("SELECT * FROM logbook");
        $tabel1 = $query1->num_rows();
        $date = date('dm', time());
        $id_usr = "ID-LB" . ($tabel1 + 2) . $date;

        $data['title'] = 'Logbook Mahasiswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $email = $this->session->userdata('email');
        $cek_id_mhs = $this->db->get_where('user', ['email'=>$email])->row_array();
        $id_mahasiswa = $cek_id_mhs['identity'];
        $data['mahasiswa'] = $id_mahasiswa;
        $data['logbook'] = $this->db->get_where('logbook', ['id_mahasiswa' => $id_mahasiswa])->result_array();

        $tgl = $this->db->query("SELECT min(tanggal) as terlama FROM logbook WHERE id_mahasiswa='$id_mahasiswa'")->row_array();

        $data['tgl'] = $tgl;

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('uraian', 'Uraian', 'required');
        $this->form_validation->set_rules('progress', 'Progress', 'required');
        if($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('logbook/index', $data);
            $this->load->view('templates/footer');
        }else{
            $data = [
                'id_logbook' => $id_usr,
                'id_mahasiswa' =>$id_mahasiswa,
                'judul'  => htmlspecialchars($this->input->post('judul')),
                'uraian' => htmlspecialchars($this->input->post('uraian')),
                'progress' => htmlspecialchars($this->input->post('progress')),
                'tanggal' => $this->input->post('tanggal')
            ];
            $this->db->insert('logbook', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
            redirect('logbook');
        }
    }
    public function edit_logbook()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('uraian', 'Uraian', 'required');
        $this->form_validation->set_rules('progress', 'Progress', 'required');

        if($this->form_validation->run() == false){
            redirect('logbook');
        }else{
            $id = htmlspecialchars($this->input->post('id_logbook'));
            $judul = htmlspecialchars($this->input->post('judul'));
            $uraian = htmlspecialchars($this->input->post('uraian'));
            $progress = htmlspecialchars($this->input->post('progress'));
            $this->model_logbook->edit_logbook($id, $judul, $uraian, $progress);
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Data Berhasil Diubah</div>');
            redirect('logbook');
        }
    }
    public function hapus_logbook()
    {
        $id = $this->input->post('id_logbook');
        $this->model_logbook->hapus_logbook($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Berhasil Dihapus</div>');
        redirect('logbook');
    }
    public function rekap_data()
    {
        $data['title'] = 'Rekap Data Mahasiswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $email = $this->session->userdata('email');

        $cek_id_mhs = $this->db->get_where('user', ['email'=>$email])->row_array();
        $id_mahasiswa = $cek_id_mhs['identity'];

        // $tgl = $this->db->query("SELECT min(tanggal) as terlama, judul, uraian, progress, tanggal FROM logbook WHERE id_mahasiswa='$id_mahasiswa'")->row_array();

        $tgl_pnd = $this->db->get_where('pendaftaran_klp', ['ID_M' => $id_mahasiswa])->row_array();
        if($tgl_pnd >= 0)
        {
            $tgl = $this->db->query("SELECT min(tanggal) as terlama FROM logbook WHERE id_mahasiswa='$id_mahasiswa'")->row_array();
            $tgl_selesai = date("Y-m-d", strtotime('+ 5 month', strtotime($tgl['terlama'])));
            // $id_pendaftaran = $tgl_pnd['ID_PND'];   
            $id_pendaftaran = '2020-06-29';   
            $q_daftar = $this->db->get_where('pendaftaran', ['ID_PND' => $id_pendaftaran])->row_array();
            // $tgl = $q_daftar['TGL_PND'];
            $tgl = '2020-06-29';
            $data['tgl'] = $tgl;
            $data['rekap'] = $this->db->query("SELECT * FROM logbook WHERE id_mahasiswa='$id_mahasiswa' AND tanggal >= $tgl AND tanggal <= $tgl_selesai")->result_array();
        }else{
            $data['rekap'] = "Anda belum terdaftar";
        }
        //query untuk mencari daftar pendaftaran


        // $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        // $this->load->view('templates/topbar', $data);
        // $this->load->view('logbook/rekap_data', $data);
        // $this->load->view('templates/footer');
        
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->load_view('logbook/rekap_data', $data);
        $this->pdf->filename = "logbook-mahasiswa.pdf";
    }
}

?>