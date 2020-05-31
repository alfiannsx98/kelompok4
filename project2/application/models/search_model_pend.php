<?php
class search_model_pend extends CI_Model
{
    function fetch_data($query)
    {
        $this->db->select("*");
        $this->db->from("mahasiswa");
        if($query != '')
        {
            $this->db->like('NIM', $query);
        }
        return $this->db->get();
    }
}