<?php
class model_dosen extends CI_Model
{

    function edit_admin_prodi($id, $nip, $nama_adm, $jk_adm, $alamat_admin, $no_hp_admin, $prodi_admin, $email_admin, $password_admin)
    {
        $hsl = $this->db->query("UPDATE admin_prodi SET NIP_ADM='$nip', NAMA_ADM='$nama_adm', JK_ADM='$jk_adm', ALAMAT_ADM='$alamat_admin', HP_ADM='$no_hp_admin', PRODI_ADM='$prodi_admin', EMAIL_ADM='$email_admin', PASSWORD_ADM='$password_admin' WHERE iD_ADM='$id'");
        return $hsl;
    }
    function hapus_admin_prodi($id)
    {
        $hasil = $this->db->query("DELETE FROM admin_prodi WHERE ID_ADM='$id'");
        return $hasil;
    }
}
?>