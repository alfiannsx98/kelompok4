<?php

class M_dosbing extends CI_Model
{
    public function getDosbing()
    {
        $query = "SELECT * FROM user LEFT JOIN dosbing ON user.identity=dosbing.ID_DS 
        LEFT JOIN prodi ON prodi.ID_PRODI=dosbing.ID_PRODI LEFT JOIN user_role ON 
        user.role_id=user_role.id_role WHERE user.role_id=3 OR user.role_id=4";
        return $this->db->query($query)->result_array();
    }

    public function getProdi()
    {
        return $this->db->get('prodi')->result_array();
    }
  
    public function getRole()
    {
        return $this->db->query("SELECT * FROM user_role WHERE id_role=3 OR id_role=4")->result_array();
    }

    function hapus_dosbing($nip)
    {
        $this->db->query("DELETE a.*, b.* FROM dosbing a JOIN user b ON a.NIP_DS = b.identity WHERE a.NIP_DS = $nip");
    }
}
