<?php

class model_admin extends CI_Model
{
    function hapus_role($id)
    {
        $hasil = $this->db->query("DELETE FROM user_role WHERE id_role='$id'");
        return $hasil;
    }
}

?>