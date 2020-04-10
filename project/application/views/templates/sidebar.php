<!-- Query Siapkan menu based on Role_ID -->
<?php
// $role_id = $this->session->userdata('role_id');
// $queryMenu = "SELECT `user_menu`.`id_menu`,`menu`
//     FROM `user_menu` JOIN `user_access_menu`
//     ON `user_menu`.`id_menu` = `user_access_menu`.`menu_id`
//     WHERE `user_access_menu`.`role_id` = $role_id
//     ORDER BY `user_access_menu`.`menu_id` ASC
// ";
// $queryUser = "SELECT * FROM user WHERE id_user";
// $menu = $this->db->query($queryMenu)->result_array();
// $data = $this->db->query($queryUser)->result_array();
?>
<!-- Akhir Query -->

<div class="sidebar" data-active-color="rose" data-background-color="black" data-image="<?= base_url("assets/img/sidebar-1.jpg"); ?>">
    <!-- Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose" -->
    <div class="logo">
        <a href="http://localhost/kelompok4/project/<?php if ($_SESSION['role_id'] == 1) {
                                                        echo 'admin';
                                                    } else {
                                                        echo 'mahasiswa';
                                                    } ?>" class="simple-text">
            SIM PKL-JTI
        </a>
    </div>

    <!-- Query Menu -->

    <?php
    $role_id = $this->session->userdata('role_id');
    $queryMenu = "SELECT `user_menu`.`id_menu`, `menu`, `icon` 
                            FROM `user_menu` JOIN `access_user`
                            ON `user_menu`.`id_menu` = `access_user`.`menu_id`
                            WHERE `access_user`.`role_id` = $role_id
                            ORDER BY `access_user`.`menu_id` ASC 
            ";

    $menu = $this->db->query($queryMenu)->result_array();
    ?>

    <!-- Akhir Query Menu -->

    <div class="logo logo-mini">
        <a href="#" class="simple-text">
            Ct
        </a>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="<?= base_url(); ?>assets/image/profile/<?= $user['image']; ?>" />
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                    <?= $user['nama']; ?>
                    <b class="caret"></b>
                </a>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a href="<?= base_url('user'); ?>">My Profile</a>
                        </li>
                        <li>
                            <a href="<?= base_url('user/edit'); ?>">Edit Profile</a>
                        </li>
                        <li>
                            <a href="#">Settings</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">

            <!-- Looping Menu -->
            <?php
            foreach ($menu as $m) :
            ?>

                <!-- Looping Sub-Menu -->
                <?php
                $menuId = $m['id_menu'];
                $querySubMenu = "SELECT *
                                        FROM `submenu_user` JOIN `user_menu`
                                        ON `submenu_user`.`menu_id` = `user_menu`.`id_menu`
                                        WHERE `submenu_user`.`menu_id` = $menuId
                                        AND `submenu_user`.`is_active` = 1
                    ";
                $submenu = $this->db->query($querySubMenu)->result_array();
                ?>
                <?php
                $ci = get_instance();
                $url = $this->uri->segment(1);
                if ($m['menu'] == $url) :
                ?>
                    <li class="active">
                    <?php else : ?>
                    <li>
                    <?php endif; ?>
                    <a data-toggle="collapse" href="#<?= $m['menu']; ?>Examples">
                        <i class="material-icons"><?= $m['icon']; ?></i>
                        <p><?= $m['menu']; ?>
                            <b class="caret"></b>
                        </p>

                    </a>
                    <?php if ($m['menu'] == $url) : ?>
                        <div class="collapse in" id="<?= $m['menu']; ?>Examples">
                        <?php else : ?>
                            <div class="collapse" id="<?= $m['menu']; ?>Examples">
                            <?php endif; ?>
                            <ul class="nav">
                                <?php foreach ($submenu as $sm) :  ?>
                                    <li>
                                        <a href="<?= base_url() . $sm['url']; ?>"><?= $sm['title']; ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            </div>
                    </li>
                <?php
            endforeach;
                ?>
        </ul>
    </div>
</div>


<!-- <li>
                        <a data-toggle="collapse" href="#formsExamples">
                            <i class="material-icons">content_paste</i>
                            <p>Forms
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="formsExamples">
                            <ul class="nav">
                                <li>
                                    <a href="forms/regular.html">Regular Forms</a>
                                </li>
                                <li>
                                    <a href="forms/extended.html">Extended Forms</a>
                                </li>
                                <li>
                                    <a href="forms/validation.html">Validation Forms</a>
                                </li>
                                <li>
                                    <a href="forms/wizard.html">Wizard</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#tablesExamples">
                            <i class="material-icons">grid_on</i>
                            <p>Tables
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="tablesExamples">
                            <ul class="nav">
                                <li>
                                    <a href="tables/regular.html">Regular Tables</a>
                                </li>
                                <li>
                                    <a href="tables/extended.html">Extended Tables</a>
                                </li>
                                <li>
                                    <a href="tables/datatables.net.html">DataTables.net</a>
                                </li>
                            </ul>
                        </div>
                    </li> -->