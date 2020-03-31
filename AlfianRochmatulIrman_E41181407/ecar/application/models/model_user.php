<?php
class model_user extends CI_Model
{
    public function edit_user($id, $nama, $email, $image, $password, $role_id, $is_active, $date_created)
    {
        $hasilUser = $this->db->query("UPDATE user SET nama='$nama', email='$email', image='$image', password='$password', role_id='$role_id',is_active='$is_active',date_created='$date_created' WHERE id_user='$id'");
        return $hasilUser;
    }
    public function getUser()
    {
        $query = "SELECT * FROM user";
        return $this->db->query($query)->result_array();
    }
}
