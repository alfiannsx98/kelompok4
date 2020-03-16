<!-- Query Siapkan menu based on Role_ID -->
<?php
    $role_id = $this->session->userdata('role_id');
    $queryMenu = "SELECT `user_menu`.`id_menu`,`menu`
        FROM `user_menu` JOIN `user_access_menu`
        ON `user_menu`.`id_menu` = `user_access_menu`.`menu_id`
        WHERE `user_access_menu`.`role_id` = $role_id
        ORDER BY `user_access_menu`.`menu_id` ASC
    ";
    $queryUser = "SELECT * FROM user WHERE id_user";
    $menu = $this->db->query($queryMenu)->result_array();
    $data = $this->db->query($queryUser)->result_array();
?>
<!-- Akhir Query -->

<div class="sidebar" data-active-color="rose" data-background-color="black" data-image="<?= base_url(); ?>assets/img/sidebar-1.jpg">
            <!--
        Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
        Tip 2: you can also add an image using data-image tag
        Tip 3: you can change the color of the sidebar with data-background-color="white | black"
    -->
            <div class="logo">
                <a href="http://www.creative-tim.com/" class="simple-text">
                    E-Car POLIJE
                </a>
            </div>
            <div class="logo logo-mini">
                <a href="http://www.creative-tim.com/" class="simple-text">
                    EP
                </a>
            </div>
            <div class="sidebar-wrapper">
                <div class="user">
                    <div class="photo">
                        <img src="<?= base_url('assets/img/profile/') . $user['image'];?>" />
                    </div>
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                            <?= $user['nama']; ?>
                            <b class=""></b>
                        </a>
                        <!-- <div class="collapse" id="collapseExample">
                            <ul class="nav">
                                <li>
                                    <a href="#">My Profile</a>
                                </li>
                                <li>
                                    <a href="#">Edit Profile</a>
                                </li>
                                <li>
                                    <a href="#">Settings</a>
                                </li>
                            </ul>
                        </div> -->
                    </div>
                </div>

<!-- Looping Menu -->
<?php foreach ($menu as $m) : ?>

<!-- Query SubMenu -->
<?php
        $menuId = $m['id_menu'];
        $querySubMenu = "SELECT * 
        FROM `user_sub_menu` JOIN `user_menu`
        ON `user_sub_menu`.`id_menu` = `user_menu`.`id_menu`
        WHERE `user_sub_menu`.`id_menu` = $menuId
        AND `user_sub_menu`.`is_active` = 1
        ";
        $subMenu = $this->db->query($querySubMenu)->result_array();
        // $icon_menu1 = "SELECT `icon_menu` FROM `user_menu` WHERE `menu_id` = $menuId";
        // $icon_menu = $this->db->query($icon_menu1)->result_array();
?>
<?php foreach ($subMenu as $m) : ?>
<!-- Akhir Query SubMenu -->

<?php endforeach; ?>
            <ul class="nav">
                <li>
                        <a data-toggle="collapse" href="<?='#'. $m['menu'] . 'Examples'; ?>">
                            <i class="material-icons"><?= $m['icon_menu']; ?></i>
                            <p><?= $m['menu']; ?>
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="<?= $m['menu']; ?>Examples" aria-expanded="false">
                            <ul class="nav">
                                <?php foreach ($subMenu as $sbmm) : ?>
                                <li>
                                    <a href="<?= base_url($sbmm['url']); ?>"><?= $sbmm['title']; ?></a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </li>
                </ul>
                <?php endforeach; ?>
                <ul class="nav">
                    <li>
                        <a href="<?= base_url('auth/logout'); ?>" class="btn-danger"><i class="material-icons">power_settings_new</i><p>logout</p></a>
                    </li>
                </ul>
            </div>
        </div>