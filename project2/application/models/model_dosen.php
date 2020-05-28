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
        $hsl = $this->db->query("UPDATE admin_prodi SET NIP_ADM='$nip', NAMA_ADM='$nama_adm', JK_ADM='$jk_adm', ALAMAT_ADM='$alamat_admin', HP_ADM='$no_hp_admin', ID_PRODI='$prodi_admin' WHERE ID_ADM='$id'");
        return $hsl;
    }
    function edit_user_admin_prodi($id_user, $id, $nama_adm, $is_active, $email_admin)
    {
        $hsl1 = $this->db->query("UPDATE user SET identity='$id', nama='$nama_adm', email='$email_admin', is_active='$is_active' WHERE id_user='$id_user'");
        return $hsl1;
    }
    function hapus_admin_prodi($id)
    {
        $hasil = $this->db->query("DELETE FROM admin_prodi WHERE ID_ADM='$id'");
        return $hasil;
    }

    function hapus_user_adm_prodi($nip)
    {
        $hps_adm_prodi = $this->db->query("DELETE FROM user WHERE identity='$nip'");
        return $hps_adm_prodi;
    }
}
?>