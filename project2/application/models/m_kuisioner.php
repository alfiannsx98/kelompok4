<?php
class m_kuisioner extends CI_Model
{
    function edit_kuisioner($id, $kuisioner)
    {
        $hsl = $this->db->query("UPDATE kuisioner SET kuisioner ='$kuisioner' WHERE id_kuisioner='$id'");
        return $hsl;
    }
    function hapus_kuisioner($id)
    {
        $hasil = $this->db->query("DELETE FROM kuisioner WHERE id_kuisioner='$id'");
        return $hasil;
    }
}