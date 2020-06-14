<footer class="main-footer">
	<strong>
		&copy;
		<script>
			document.write(new Date().getFullYear())
		</script>
		<a class="align-center" href="http://jti.polije.ac.id/">
			Dari JTI POLIJE
		</a>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<!-- jQuery -->
<script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?= base_url(); ?>assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url(); ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- date-range-picker -->
<script src="<?= base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?= base_url(); ?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
</script>
<!-- Bootstrap Switch -->
<script src="<?= base_url(); ?>assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url(); ?>assets/dist/js/demo.js"></script>
<!-- multiple delete -->
<script src="<?= base_url(); ?>assets/dist/js/multipledelete.js"></script>
<!-- Coba Jquery Wizard -->
<script src="https://unpkg.com/smartwizard@5.0.0/dist/js/jquery.smartWizard.min.js" type="text/javascript"></script>

<script>
	$(document).ready(function() {

		// SmartWizard initialize
		$('#smartwizard').smartWizard();

	});
</script>

<!-- page script -->
<script>
	$(function() {
		$("#example1").DataTable({
			"responsive": true,
			"autoWidth": false,
		});
		$('#example2').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
		});
		$(document).ready(function() {
			$('#table1').DataTable()
		});
	});
</script>
<script>
	$('.custom-file-input').on('change', function() {
		let fileName = $(this).val().split('\\').pop();
		$(this).next('.custom-file-label').addClass("selected").html(fileName);
	});


	$('.form-check-input').on('click', function() {
		const menuId = $(this).data('menu');
		const roleId = $(this).data('role');

		$.ajax({
			url: "<?= base_url('admin/changeaccess'); ?>",
			type: 'post',
			data: {
				menuId: menuId,
				roleId: roleId
			},
			success: function() {
				document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
			}
		});
	});
</script>

<!-- punya didin -->
<!-- <script>
    	$(document).ready(function () {

    		var count = 0;

    		$(document).on('click', '.add', function () {
    			count++;
    			var html = '';

    			html += '<tr>';
    			html += '<td>' + count + '</td>';
    			var nim = $("#NIM").val();
    			html += '<td>' + nim + '</td>';
    			html += '<td><button class="btn btn-danger" id="hapus">Hapus</button></td>';
				$('tbody').append(html);
    		});
			$(document).on('click', '#hapus', function () {
    			$(this).closest('tr').remove();
    		});
    	});
    </script> -->
<!-- <script>
		$(document).ready(function () {

			var count = 0;
			var i = 1;

			$("#tambah").click(function () {
				count++;
				i++;
				var nilai = $("#NIM").val();
				var nmr = "<tr><td>" + count + "</td><td>" + i + "</td></tr>";
				// var nama = ;
				$("#tabel").append(nmr);
				// $("#tabel").append(nama);
			})

		});

	</script> -->

<script>
	$(function() {
		//Initialize Select2 Elements
		$('.select2').select2()

		//Initialize Select2 Elements
		$('.select2bs4').select2({
			theme: 'bootstrap4'
		})

		//Datemask dd/mm/yyyy
		$('#datemask').inputmask('dd/mm/yyyy', {
			'placeholder': 'dd/mm/yyyy'
		})
		//Datemask2 mm/dd/yyyy
		$('#datemask2').inputmask('mm/dd/yyyy', {
			'placeholder': 'mm/dd/yyyy'
		})
		//Money Euro
		$('[data-mask]').inputmask()

		//Date range picker
		$('#reservation').daterangepicker()
		//Date range picker with time picker
		$('#reservationtime').daterangepicker({
			timePicker: true,
			timePickerIncrement: 30,
			locale: {
				format: 'MM/DD/YYYY hh:mm A'
			}
		})
		//Date range as a button
		$('#daterange-btn').daterangepicker({
				ranges: {
					'Today': [moment(), moment()],
					'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
					'Last 7 Days': [moment().subtract(6, 'days'), moment()],
					'Last 30 Days': [moment().subtract(29, 'days'), moment()],
					'This Month': [moment().startOf('month'), moment().endOf('month')],
					'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
						'month').endOf(
						'month')]
				},
				startDate: moment().subtract(29, 'days'),
				endDate: moment()
			},
			function(start, end) {
				$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
					'MMMM D, YYYY'))
			}
		)

		//Timepicker
		$('#timepicker').datetimepicker({
			format: 'LT'
		})

		//Bootstrap Duallistbox
		$('.duallistbox').bootstrapDualListbox()

		//Colorpicker
		$('.my-colorpicker1').colorpicker()
		//color picker with addon
		$('.my-colorpicker2').colorpicker()

		$('.my-colorpicker2').on('colorpickerChange', function(event) {
			$('.my-colorpicker2 .fa-square').css('color', event.color.toString());
		});

		$("input[data-bootstrap-switch]").each(function() {
			$(this).bootstrapSwitch('state', $(this).prop('checked'));
		});

	})
</script>

<!-- ambil nim n nama dari modal -->
<script>
	$(document).on('click', '#select', function() {
		$('#id').val($(this).data('id'))
		$('#nim').val($(this).data('nim'))
		$('#nim1').val($(this).data('nim'))
		$('#nama').val($(this).data('nama'))

		$('#modal-item').modal('hide')
	});

	var count = 0;
	<?php $nim = $user['identity']; ?>
	var i = "PND-<?= $nim; ?>";

	$(document).on('click', '#add_siswa', function() {
		var id = $('#id').val()
		var nim = $('#nim').val()
		var nama = $('#nama').val()
		var nim_av = $('#nim_av').val()

		if (nim == '') {
			alert('Siswa Belum Dipilih')
			$('#barcode').focus()
			var id = $('#id').val('')
			var nim = $('#nim').val('')
			var nama = $('#nama').val('')
		} else {
			if (nim_av == nim) {
				alert('Siswa Telah Dipilih')
				$('#barcode').focus()
				var id = $('#id').val('')
				var nim = $('#nim1').val('')
				var nama = $('#nama').val('')
			} else {
				count++;
				var html = '';

				html += '<tr>';
				html += '<td>' + count + '<input type="hidden" name="ID_PND[]" value="' + i + '"></td>';
				// html += '<td><input type="text" name="ID_M[]" value="' + id + '"></td>';
				html += '<td>' + nim + '<input type="hidden" id="nim_av" name="ID_M[]" value="' + id + '"></td>';
				html += '<td>' + nama + '<input type="hidden" value="' + nama + '"></td>';
				// html += '<td>' + i + '</td>';
				html += '<td><button class="btn btn-danger" id="hapus">Hapus</button></td>';
				$('#tbody').append(html);
				var id = $('#id').val('')
				var nim = $('#nim1').val('')
				var nama = $('#nama').val('')
			}
		}
	});
	$(document).on('click', '#hapus', function() {
		count--;
		$(this).closest('tr').remove();
	});
</script>

<!-- untuk nyimpan ID_PND n ID_M ke database -->
<script>
	$(document).ready(function() {
		$("#btn-tambah-anggota").click(function() {
			var jumlah = parseInt($("#jumlah-form").val());
			var nextform = jumlah + 1;

			$("#insert-form").append("<b>Data ke " + nextform + " :</b>" +
				"<table>" +
				"<tr>" +
				"<td>ID_PND</td>" +
				"<td><input type='text' name='ID_PND[]' required></td>" +
				"</tr>" +
				"<tr>" +
				"<td>ID_M</td>" +
				"<td><input type='text' name='ID_M[]' required></td>" +
				"</tr>" +
				"</table>" +
				"<br><br>");
			$("#jumlah-form").val(
				nextform
			);
		});
		$("#btn-reset-form").click(function() {
			$("#insert-form").html("");
			$("#jumlah-form").val("1");
		});
	});
</script>

<!-- show hide password -->
<script type="text/javascript">
	$(document).ready(function() {

		$("#icon-click").click(function() {
			$("#icon").toggleClass('fa-eye-slash');

			var input = $("#password");

			if (input.attr("type") === "password") {
				input.attr("type", "text");
			} else {
				input.attr("type", "password");
			}

		});

	});
</script>

<!-- show hide password -->
<script type="text/javascript">
	$(document).ready(function() {

		$("#icon-click1").click(function() {
			$("#icon1").toggleClass('fa-eye-slash');

			var input = $("#password1");

			if (input.attr("type") === "password") {
				input.attr("type", "text");
			} else {
				input.attr("type", "password");
			}

		});

	});
</script>

<!-- show hide password -->
<script type="text/javascript">
	$(document).ready(function() {

		$("#icon-click3").click(function() {
			$("#icon3").toggleClass('fa-eye-slash');

			var input = $("#passwordSkrg");

			if (input.attr("type") === "password") {
				input.attr("type", "text");
			} else {
				input.attr("type", "password");
			}

		});

	});
</script>

<!-- show hide password -->
<script type="text/javascript">
	$(document).ready(function() {

		$("#icon-click4").click(function() {
			$("#icon4").toggleClass('fa-eye-slash');

			var input = $("#passwordBaru1");

			if (input.attr("type") === "password") {
				input.attr("type", "text");
			} else {
				input.attr("type", "password");
			}

		});

	});
</script>

<!-- show hide password -->
<script type="text/javascript">
	$(document).ready(function() {

		$("#icon-click5").click(function() {
			$("#icon5").toggleClass('fa-eye-slash');

			var input = $("#passwordBaru2");

			if (input.attr("type") === "password") {
				input.attr("type", "text");
			} else {
				input.attr("type", "password");
			}

		});

	});
</script>

<!-- <script type="text/javascript">
		const tombol = document.querySelector('#tbh');
		tombol.addEventListener('click', function(){
			Swal({
				title : 'Ini Sweet Alert',
				text: 'latihan Sweet Alert',
				type : 'success'
			});
		});
	</script> -->

<!-- JS Untuk Rating -->
<script>
	$(document).ready(function() {

		load_data();
		load_bintang();

		function load_data() {
			$.ajax({
				url: "<?php echo base_url(); ?>rating_mhs/fetch",
				method: "POST",
				success: function(data) {
					$('#business_list').html(data);
				}
			})
		}

		function load_bintang() {
			$.ajax({
				url: "<?= base_url(); ?>rating_mhs/fetch_bintang",
				method: "GET",
				success: function(data) {
					$('#bintang_').html(data);
					$('#bintang1_').html(data);
				}
			})
		}

		$(document).on('mouseenter', '.rating_input', function() {
			var index = $(this).data('index');
			var id_pr = $(this).data('id_pr');
			remove_background(id_pr);
			for (var count = 1; count <= index; count++) {
				$('#' + id_pr + '-' + count).css('color', '#ffcc00');
			}
		});

		function remove_background(id_pr) {
			for (var count = 1; count <= 5; count++) {
				$('#' + id_pr + '-' + count).css('color', '#ccc');
			}
		}

		$(document).on('click', '.rating_input', function() {
			var index = $(this).data('index');
			var id_pr = $(this).data('id_pr');
			var id_user = $(this).data('id_user');
			$.ajax({
				url: "<?php echo base_url(); ?>rating_mhs/insert",
				method: "POST",
				data: {
					index: index,
					id_pr: id_pr,
					id_user: id_user
				},
				success: function(data) {
					load_data();
					load_bintang();
					alert("You have rate " + index + " out of 5");
				}
			})
		});

		$(document).on('mouseleave', '.rating_input', function() {
			var index = $(this).data('index');
			var id_pr = $(this).data('id_pr');
			var rating = $(this).data('rating_input');
			remove_background(id_pr);
			for (var count = 1; count <= rating; count++) {
				$('#' + id_pr + '-' + count).css('color', '#ffcc00');
			}
		});

	});
</script>

<!-- enable modal form edit -->
<script>
	$(document).ready(function() {
		$("button#edit-btn").click(function() {
			$("button#edit-btn").prop('hidden', true);
			$("button#save-btn").prop('hidden', false);
			$("h3.title-1").html("Edit Data");
			$("input#nim").prop('disabled', false);
			$("input#nama").prop('disabled', false);
			$("input#jk").prop('disabled', false);
			$("input#alamat").prop('disabled', false);
			$("input#hp").prop('disabled', false);
			$("input#email").prop('disabled', false);
			$("select#prodi").prop('disabled', false);
			$("select#semester").prop('disabled', false);
		});

		$("button#edit-btn").click(function() {
			$("button#edit-btn").prop('hidden', true);
			$("button#save-btn").prop('hidden', false);
			$("h3.title-1").html("Edit Data");
			$("input#nip").prop('disabled', false);
			$("input#nm-ds").prop('disabled', false);
			$("input#jk-ds").prop('disabled', false);
			$("input#almt-ds").prop('disabled', false);
			$("input#hp-ds").prop('disabled', false);
			$("input#email-ds").prop('disabled', false);
			$("select#prodi-ds").prop('disabled', false);
			$("select#role").prop('disabled', false);
		});
	});
</script>

<!-- disable modal form edit -->
<script>
	$(document).ready(function() {
		$("button#close-btn").click(function() {
			$("button#edit-btn").prop('hidden', false);
			$("button#save-btn").prop('hidden', true);
			$("h3.title-1").html("Detail Data");
			$("input#nim").prop('disabled', true);
			$("input#nama").prop('disabled', true);
			$("input#jk").prop('disabled', true);
			$("input#alamat").prop('disabled', true);
			$("input#hp").prop('disabled', true);
			$("input#email").prop('disabled', true);
			$("select#prodi").prop('disabled', true);
			$("select#semester").prop('disabled', true);
		});

		$("button#close-btn").click(function() {
			$("button#edit-btn").prop('hidden', false);
			$("button#save-btn").prop('hidden', true);
			$("h3.title-1").html("Detail Data");
			$("input#nip").prop('disabled', true);
			$("input#nm-ds").prop('disabled', true);
			$("input#jk-ds").prop('disabled', true);
			$("input#almt-ds").prop('disabled', true);
			$("input#hp-ds").prop('disabled', true);
			$("input#email-ds").prop('disabled', true);
			$("select#prodi-ds").prop('disabled', true);
			$("select#role").prop('disabled', true);
		});
	});
</script>

</html>