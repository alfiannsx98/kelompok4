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
        $this->db->set('NIP_ADM', $nip);
        $this->db->set('NAMA_ADM', $nama_adm);
        $this->db->set('JK_ADM', $jk_adm);
        $this->db->set('ALAMAT_ADM', $alamat_admin);
        $this->db->set('HP_ADM', $no_hp_admin);
        $this->db->set('ID_PRODI', $prodi_admin);
        $this->db->where('ID_ADM', $id);
        $this->db->update('admin_prodi');

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