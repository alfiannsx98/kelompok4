<!DOCTYPE html>
<html>
<head>
	<title>Membuat CRUD dengan CodeIgniter | MalasNgoding.com</title>
</head>
<body>
	<center>
		<h1>Membuat CRUD dengan CodeIgniter | MalasNgoding.com</h1>
		<h3>Edit Data</h3>
	</center>
	<?php foreach($wisata as $wst){ ?>
	<form action="<?php echo base_url(). 'crud/update'; ?>" method="post">
		<table style="margin:20px auto;">
			<tr>
				<td>Nama</td>
				<td>
					<input type="text" name="ID_WST" value="<?php echo $wst->ID_WST ?>">
					<input type="text" name="NM_WST" value="<?php echo $wst->NM_WST ?>">
				</td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><input type="text" name="ALAMAT_WST" value="<?php echo $wst->ALAMAT_WST ?>"></td>
			</tr>
			<tr>
				<td>Telepon</td>
				<td><input type="text" name="TLP_WST" value="<?php echo $wst->TLP_WST ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Simpan"></td>
			</tr>
		</table>
	</form>	
	<?php } ?>
</body>
</html>