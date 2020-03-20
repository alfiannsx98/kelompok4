<?php
class model_menu extends CI_Model
{

    function edit_menu($id, $menu, $icon_menu)
    {
        $hsl = $this->db->query("UPDATE user_menu SET menu ='$menu', icon_menu = '$icon_menu' WHERE id_menu='$id'");
        return $hsl;
    }
    function hapus_menu($id)
    {
        $hasil = $this->db->query("DELETE FROM user_menu WHERE id_menu='$id'");
        return $hasil;
    }
    function edit_submenu($id, $menu_id, $title,  $url, $icon, $is_active)
    {
        $hasilSubmenu = $this->db->query("UPDATE user_sub_menu SET menu_id='$menu_id', title='$title',  url='$url', icon='$icon', is_active='$is_active' WHERE id_user_sub_menu='$id' ");
        return $hasilSubmenu;
    }
    function hapus_submenu($id)
    {
        $hasilSubMenu1 = $this->db->query("DELETE FROM user_sub_menu WHERE id_user_sub_menu='$id'");
        return $hasilSubMenu1;
    }
    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*,`user_menu`.`menu`
            FROM `user_sub_menu` JOIN `user_menu`
            ON `user_sub_menu`.`id_menu` = `user_menu`.`id_menu`
        ";
        return    $this->db->query($query)->result_array();
    }
}
