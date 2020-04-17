<?php 
//  berfungsi untuk melayani segala query CRUD database
class M_data1 extends CI_Model{
    function hapus_role($id)
    {
        $hasil = $this->db->query("DELETE FROM role_user WHERE id_role='$id'");
        return $hasil;
    }
  // function untuk mengambil keseluruhan baris data dari tabel user
	public function tampil_data(){
		return $this->db->get('mahasiswa');
    }
     public function tampil_data2(){
      return $this->db->get('admin');
    }

    function input_data($data,$table){
      $this->db->insert($table,$data);
      }

      function hapus_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    function edit_data($where,$table){		
      return $this->db->get_where($table,$where);
  }
  // method untuk mengupdate data ke dalam database 
  function update_data($where,$data,$table){
  $this->db->where($where);
  $this->db->update($table,$data);
}	
}