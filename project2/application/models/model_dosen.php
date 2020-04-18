<?php
class model_dosen extends CI_Model
{
    function getprodi()
    {
        $query = $this->db->query("SELECT * FROM prodi");
        return $query;
    }

    function edit_admin_prodi($id, $nip, $nama_adm, $jk_adm, $alamat_admin, $no_hp_admin, $prodi_admin)
    {
        $hsl = $this->db->query("UPDATE admin_prodi SET NIP_ADM='$nip', NAMA_ADM='$nama_adm', JK_ADM='$jk_adm', ALAMAT_ADM='$alamat_admin', HP_ADM='$no_hp_admin', PRODI_ADM='$prodi_admin' WHERE ID_ADM='$id'");
        return $hsl;
    }
    function edit_user_admin_prodi($id_user, $nip, $nama_adm, $is_active, $email_admin)
    {
        $hsl1 = $this->db->query("UPDATE user SET identity='$nip', nama='$nama_adm', email='$email_admin', is_active='$is_active' WHERE id_user='$id_user'");
        return $hsl1;
    }
    function hapus_admin_prodi($id)
    {
        $hasil = $this->db->query("DELETE FROM admin_prodi WHERE ID_ADM='$id'");
        return $hasil;
    }

    // Dosen Pembimbing
    public function tampil_data(){
        return $this->db->get('dosbing');
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
?>