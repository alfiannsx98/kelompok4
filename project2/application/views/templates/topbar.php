    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    	<!-- Left navbar links -->
    	<ul class="navbar-nav">
    		<li class="nav-item">
    			<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    		</li>
    	</ul>

    	<ul class="navbar-nav ml-auto">
    		<li class="nav-item dropdown user-menu">
    			<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
    				<img src="<?= base_url(); ?>assets/dist/img/user/<?= $user['image']; ?>"
    					class="user-image img-circle elevation-2" alt="User Image">
    				<span class="d-none d-md-inline"><?= $user['nama']; ?></span>
    			</a>
    			<ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
    				<!-- User image -->
    				<li class="user-header bg-primary">
    					<img src="<?= base_url(); ?>assets/dist/img/user/<?= $user['image']; ?>" class="img-circle elevation-2"
    						alt="User Image">
    					<?php 
            if($user['role_id'] == 1)
            {
                $level = "<span title='Koordinator PKL' class='badge badge-danger'>Koordinator PKL</span>";
			}
			elseif($user['role_id'] == 2)
			{
				$level = "<span title='User' class='badge badge-success'>Mahasiswa</span>";
			}
			elseif($user['role_id'] == 3)
			{
                $level = "<span title='User' class='badge badge-success'>Dosen Pembimbing</span>";
			}
			elseif($user['role_id'] == 4)
			{
                $level = "<span title='User' class='badge badge-success'>Admin Prodi</span>";
			}
			else
			{
				$level = "<span title='User' class='badge badge-success'>Admin Prodi</span>";
			}
            ?>
    					<p>
    						<?= $user['nama']; ?> <?= $level; ?>

    					</p>
    					<small>Member since <?= date('d F Y', $user['date_created']); ?></small>
    				</li>
    				<!-- Menu Body -->
    				<!-- Menu Footer-->
    				<li class="user-footer">
    					<a href="<?= base_url('user/profil'); ?>" class="btn btn-default btn-flat">Profile</a>
    					<a href="<?= base_url('auth/logout'); ?>" class="btn btn-default btn-flat float-right">Sign out</a>
    				</li>
    			</ul>
    		</li>
    	</ul>

    </nav>
    <!-- /.navbar -->
