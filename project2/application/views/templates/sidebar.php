
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
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
        <img src="<?= base_url(); ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            <img src="<?= base_url(); ?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
            <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
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
            <li class="nav-item has-treeview menu-open">    
            <?php else: ?>
            <li class="nav-item has-treeview">
            <?php endif; ?>
                <a href="#" class="nav-link">
                    <i class="nav-icon fas <?= $m['icon']; ?>"></i>
                    <p>
                        <?= $m['menu']; ?><i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <?php foreach ($submenu as $sm) :  ?>
                <ul class="nav nav-treeview">
                    <?php if($sm['title'] == $title): ?>
                    <li class="nav-item">
                        <a href="<?= base_url() . $sm['url']; ?>" class="nav-link active">
                        <i class="far fa-circle nav-icon"></i>
                        <p><?= $sm['title']; ?></p>
                        </a>
                    </li>
                    <?php else : ?>
                    <li class="nav-item">
                        <a href="<?= base_url() . $sm['url']; ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p><?= $sm['title']; ?></p>
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
                <?php endforeach; ?>
            </li>   
            <?php endforeach; ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>