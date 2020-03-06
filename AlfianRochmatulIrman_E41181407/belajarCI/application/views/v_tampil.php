<!DOCTYPE html>
<html>
<head>
	<title>Membuat CRUD dengan CodeIgniter | MalasNgoding.com</title>
</head>
<body>
	<center><h1>Membuat CRUD dengan CodeIgniter | MalasNgoding.com</h1></center>
	<center><?php echo anchor('crud/tambah','Tambah Data'); ?></center>
	<!-- fungsi php echo anchor ini mirip dengan html <a></a>, jadi untuk href gitu -->
	<table style="margin:20px auto;" border="1">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Pekerjaan</th>
			<th>Action</th>
		</tr>
		<?php 
		$no = 1;
		// pendefinisian variabel $no adalah angka 1.
		foreach($user as $u){ 
			// memulai dalam perulangan foreach dari variabel user sebagai variabel $u.
		?>
		<tr>

			<td><?php echo $no++ ?></td>
			<!-- disini dia akan mencetak variabel no yang akan terjumlah secara otomatis -->
			<td><?php echo $u->nama ?></td>
			<!-- disini akan mencetak data variabel $u yang bernama nama, lalu akan dilooping sebanyak data yang tersedia -->
			<td><?php echo $u->alamat ?></td>
			<td><?php echo $u->pekerjaan ?></td>
			<td>
				<?php echo anchor('crud/edit/'.$u->id,'Edit'); ?>
                <?php echo anchor('crud/hapus/'.$u->id,'Hapus'); ?>
			</td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>