<head>
	<title>malasngoding.com<</title>
</head>
<body>
 
	<center><h1>Membuat Upload File Dengan CodeIgniter | MalasNgoding.com</h1></center>
 
	<ul>
		<!-- jika file yang diupload berhasil maka dia akan menampilkan tampilan dibawah ini -->
		<?php foreach ($upload_data as $item => $value):?>
			<li><?php echo $item;?>: <?php echo $value;?></li>
		<?php endforeach; ?>
	</ul>	
 
</body>
</html>