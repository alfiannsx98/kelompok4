<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<form method="post" action="<?= base_url(). 'pendaftaran/pr_tmbh_pnd';?>" class="form-horizontal">
						<div class="card-header card-header-text" data-background-color="rose">
							<h4 class="card-title">Form Pendaftaran PKL</h4>
						</div>
						<div class="card-content">
							<input type="text" name="ID_PND" id="ID_PND"
								value="<?php echo "pnd".sprintf("%0s", $ID_PND); ?>">
							<div class="row">
								<label class="col-sm-2 label-on-left" for="ID_PR">Tempat PKL</label>
								<div class="col-lg-5 col-md-6 col-sm-3">
									<select name="ID_PR" class="selectpicker" data-style="btn btn-primary btn-round"
										title="Single Select" data-size="7">
										<option selected disabled>Pilih Tempat PKL</option>
										<?php foreach($comboPR as $pr){?>
										<option type="text" name="ID_PR" value="<?= $pr->ID_PR; ?>"><?=$pr->NAMA_PR;?>
											<?php }?>
									</select>
								</div>
							</div>
							<div class="row">
								<label class="col-sm-2 label-on-left" for="ID_DS">Dosen Pembimbing</label>
								<div class="col-lg-5 col-md-6 col-sm-3">
									<select name="ID_DS" class="selectpicker" data-style="btn btn-primary btn-round"
										title="Single Select" data-size="7">
										<option selected disabled>Pilih Dosen Pembimbing</option>
										<?php foreach($comboDS as $ds){ ?>
										<option type="text" name="ID_DS" value="<?= $ds->ID_DS; ?>"><?= $ds->NAMA_DS; ?>
											<?php } ?>
									</select>
								</div>
							</div>
							<button class="btn btn-fill btn-rose">Tambah Data</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<label>Masukkan NIM</label>
		<input type="text" id="NIM" name="NIM">
		<button id="tambah" name="tambah">Tambah</button>
		<table id="tabel" name="tabel" tableborder="1">
			<?php $i=1; ?>
			<thead>
				<tr>
					<th>NO</th>
					<th>NIM</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td></td>
					<td></td>
				</tr>
		</table>

	</div>
</div>
<script>
	$(document).ready(function () {

		var i = 0;
		$("#tambah").click(function () {
			i++;
			var nilai = $("#NIM").val();
			var baris_baru = "<tr><td><td>" + nilai + "</td></td></tr>";
			$("#tabel").append(baris_baru);
		})

	});

</script>
<script>
	$(document).ready(function () {

		var count = 0;

		$(document).on('click', '.add', function () {
			count++;
			var html = '';

			html += '<tr>';
			html += '<td>' + count + '</td>';
			var nilai = $("#NIM").val();
			html += '<td>' + nilai + '</td>';
			$('tbody').append(html);
		});
	});

</script>
