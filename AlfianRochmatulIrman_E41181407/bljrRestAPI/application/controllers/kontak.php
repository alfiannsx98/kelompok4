<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// Require ini akan memanggil library REST_Controller (Library REST-API yang akan digunakan) sehingga siap

require APPPATH . '/libraries/REST_Controller.php';
// menggunakan RestServer yang sudah ada didalam Rest_Controller
use Restserver\Libraries\REST_Controller;

class Kontak extends REST_Controller{

    // membuat construct default dengan konfigurasi kearah 'rest', dia akan memanggil konfigurasi default dari REST-API lalu dibuat konstruksi
    // didalam parent:__construct($config) sehingga configurasi REST-API bisa digunakan.
    function __construct($config = 'rest'){
        parent::__construct($config);
        // lalu akan meload/memuat konfigurasi database().
        $this->load->database();
    }

    // menampilkan data kontak
    function index_get(){
        // index_get ini akan digunakan ketika menggunakan postman lalu memanggil fungsi getnya dengan url yang telah tersedia
        $id = $this->get('id');
        // variabel $id akan mengambil data berdasarkan ('id'), lalu dipanggil melalui database ($this->db->get('telepon)->result());
        // result disini dia akan berfungsi dalam pengembalian data yang telah diambil, lalu ditampilkan outputnya
        if ($id == '') {
            $kontak = $this->db->get('telepon')->result();
        } else {
            $this->db->where('id', $id);
            $kontak = $this->db->get('telepon')->result();
        }
        // lalu dia akan merespon di variabel $kontak dan mengembalikan/mengeluarkan nilai yang telah dipanggil
        $this->response($kontak, 200);
    }
    // mengirim atau menambah data kontak
    function index_post() {
        // Index_post ini berfungsi dalam mengirimkan data atau menginput data, di Index Post ini dia akan mengirimkan data berdasarkan variabel $data
        // variabel $data akan mengirimkan data yang terdapat didalam fungsi array termasuk (id, nama, dan nomor).
        // lalu ketika sudah disiapkan, maka dia akan menggunakan variabel $insert, lalu dari variabel tsb memanggil database, dan menggunakan method
        // insert kedalam form telepon, dengan data yang telah tersedia didalam variabel $data
        $data = array(
                    'id'    => $this->post('id'),
                    'nama'  => $this->post('nama'),
                    'nomor' => $this->post('nomor'));
        $insert = $this->db->insert('telepon', $data);
        if ($insert) {
            $this->response($data, 200);
            // kode 200 disini menandakan alert (telah berhasil melakukan metode)
        } else {
            // sedangkan kode 502 ini alert yang menandakan (telah gagal dalam melakukan metode)
            $this->response(array('status' => 'fail', 502));
        }
    }
    // Memperbarui data kontak yang telah ada
    function index_put(){
        // pada index_put ini berfungsi dalam memodifikasi/mengubah data yang telah ada. dengan paramteter ('id')
        // disini dia akan mengedit data dengan menggunakan variabel $id lalu melanjutkan dengan memanggil fungsi put('id');
        // lalu diubah data tsb berdasarkan id, dan data yang berubah adalah naam,nomor .
        $id = $this->put('id');
        $data = array(
                'id'    => $this->put('id'),
                'nama'  => $this->put('nama'),
                'nomor' => $this->put('nomor')
        );
        $this->db->where('id', $id);
        $update = $this->db->update('telepon', $data);

        if($update){
            $this->response($data, 200);
        }else{
            $this->response(array('status' => 'fail', 502));
        }
    }
    // Menghapus salah satu data kontak
    function index_delete(){
        // untuk fungsi index_delete ini dia akan berfungsi dalam menghapus data, dia akan menghapus data berdasarkan ('id'), dimana dia akan mencari
        // di dalam database berdasarkan 'id' yang mau dihapus, nanti jika cocok maka dia akan menghapus data tsb.
        $id = $this->delete('id');
        $this->db->where('id', $id);
        $delete = $this->db->delete('telepon');

        if($delete){
            // lalu dihapus jika berhasil memenuhi syarat 
            $this->response(array('status' => 'success'), 201);
        }else{
            $this->response(array('status' => 'fail', 502));
        }
    }
    //Masukan function selanjutnya disini
}