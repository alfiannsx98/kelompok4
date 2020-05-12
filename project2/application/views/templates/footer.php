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


    <!-- page script -->
    <script>
    	$(function () {
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
    	});

    </script>
    <script>
    	$('.custom-file-input').on('change', function () {
    		let fileName = $(this).val().split('\\').pop();
    		$(this).next('.custom-file-label').addClass("selected").html(fileName);
    	});


    	$('.form-check-input').on('click', function () {
    		const menuId = $(this).data('menu');
    		const roleId = $(this).data('role');

    		$.ajax({
    			url: "<?= base_url('admin/changeaccess'); ?>",
    			type: 'post',
    			data: {
    				menuId: menuId,
    				roleId: roleId
    			},
    			success: function () {
    				document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
    			}
    		});
    	});

    </script>

    <!-- punya didin -->
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
				// html +='isinya nama mhs';
				//yg dibawah gak kpake
    			html +=
    				'<td><select name="nim_mahasiswa[]" class="form-control select2 nim_mahasiswa" data-sub_category_id="' +
    				count +
    				'"><option value="">Select Mahasiswa</option><?php foreach($mahasiswa as $mhs) : ?><option value="<?= $mhs['
    			ID_M ']; ?>"><?= $mhs['
    			NAMA_M ']; ?></option><?php endforeach; ?></select></td>';
    			$('tbody').append(html);
    		});
    	});

    </script>

    <!-- punya irman -->
    <!-- <script>
    	$(document).ready(function () {

    		var count = 0;

    		$(document).on('click', '.add', function () {
    			count++;
    			var html = '';

    			html += '<tr>';
    			html += '<td>' + count + '</td>';
          var nilai = $("#NIM").val();
    			html += '<td>' + nilai + '</td>';
          html +=
    				'<td><select name="nim_mahasiswa[]" class="form-control select2 nim_mahasiswa" data-sub_category_id="' +
    				count +
    				'"><option value="">Select Mahasiswa</option><?php foreach($mahasiswa as $mhs) : ?><option value="<?= $mhs['
    			ID_M ']; ?>"><?= $mhs['
    			NAMA_M ']; ?></option><?php endforeach; ?></select></td>';
    			// html += '<td><input type="text" name="item_name[]" class="form-control item_name" /></td>';
    			// html += '<td><select name="item_sub_category[]" class="form-control item_sub_category" id="item_sub_category'+count+'"><option value="">Select Sub Category</option></select></td>';
    			// html += '<td><button type="button" name="remove" class="btn btn-danger btn-xs remove"><span class="fas fa-minus"></span></button></td>';
    			$('tbody').append(html);
    		});

    		$(document).on('click', '.remove', function () {
    			$(this).closest('tr').remove();
    		});

    		$(document).on('change', '.nim_mahasiswa', function () {
    			var category_id = $(this).val();
    			var sub_category_id = $(this).data('sub_category_id');
    			$.ajax({
    				url: "fill_sub_category.php",
    				method: "POST",
    				data: {
    					category_id: category_id
    				},
    				success: function (data) {
    					var html = '<option value="">Select Sub Category</option>';
    					html += data;
    					$('#item_sub_category' + sub_category_id).html(html);
    				}
    			})
    		});

    		$('#insert_form').on('submit', function (event) {
    			event.preventDefault();
    			var error = '';
    			$('.item_name').each(function () {
    				var count = 1;
    				if ($(this).val() == '') {
    					error += '<p>Enter Item name at ' + count + ' Row</p>';
    					return false;
    				}
    				count = count + 1;
    			});

    			$('.nim_mahasiswa').each(function () {
    				var count = 1;

    				if ($(this).val() == '') {
    					error += '<p>Select Item Category at ' + count + ' row</p>';
    					return false;
    				}

    				count = count + 1;

    			});

    			$('.item_sub_category').each(function () {

    				var count = 1;

    				if ($(this).val() == '') {
    					error += '<p>Select Item Sub category ' + count + ' Row</p> ';
    					return false;
    				}

    				count = count + 1;

    			});

    			var form_data = $(this).serialize();

    			if (error == '') {
    				$.ajax({
    					url: "insert.php",
    					method: "POST",
    					data: form_data,
    					success: function (data) {
    						if (data == 'ok') {
    							$('#item_table').find('tr:gt(0)').remove();
    							$('#error').html('<div class="alert alert-success">Item Details Saved</div>');
    						}
    					}
    				});
    			} else {
    				$('#error').html('<div class="alert alert-danger">' + error + '</div>');
    			}

    		});

    	});

    </script> -->
    <script>
    	$(function () {
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
    					'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf(
    						'month')]
    				},
    				startDate: moment().subtract(29, 'days'),
    				endDate: moment()
    			},
    			function (start, end) {
    				$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
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

    		$('.my-colorpicker2').on('colorpickerChange', function (event) {
    			$('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    		});

    		$("input[data-bootstrap-switch]").each(function () {
    			$(this).bootstrapSwitch('state', $(this).prop('checked'));
    		});

    	})

    </script>
    </body>

    </html>
