<!DOCTYPE html>
<html>
<head>
	<title>Menghubungkan codeigniter dengan database mysql</title>
</head>
<body>
	<h1>Mengenal Model Pada Codeigniter | MalasNgoding.com</h1>
	<table border="1">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Alamat</th>
            <th>Telepon</th>
		</tr>
		<?php foreach($wisata as $wst){ ?>
		<tr>
			<td><?php echo $wst->ID_WST ?></td>
			<td><?php echo $wst->NM_WST ?></td>
			<td><?php echo $wst->ALAMAT_WST ?></td>
            <td><?php echo $wst->TLP_WST ?></td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>