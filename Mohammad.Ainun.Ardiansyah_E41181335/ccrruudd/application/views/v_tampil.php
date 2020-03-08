<!DOCTYPE html>
<html>
<head>
	<title>AKSATA</title>
</head>
<body>
	<center><h1>Daftar Wisata</h1></center>
	<center><?php echo anchor('crud/tambah','Tambah Data'); ?></center>
	<table style="margin:20px auto;" border="1">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>no tlp</th>
			<!-- <th>Action</th> -->
		</tr>
		<?php 
		// $no = 1;
		foreach($wisata as $wst){ 
		?>
		<tr>
			<td><?php echo $wst->ID_WST ?></td>
			<td><?php echo $wst->NM_WST ?></td>
			<td><?php echo $wst->ALAMAT_WST ?></td>
			<td><?php echo $wst->TLP_WST ?></td>
			<td>
			      <?php echo anchor('crud/edit/'.$wst->NM_WST,'Edit'); ?>
                              <?php echo anchor('crud/hapus/'.$wst->NM_WST,'Hapus'); ?>
			</td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>