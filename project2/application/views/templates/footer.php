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
			$(document).ready(function(){
    			$('#table1').DataTable()
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
		// Sek din tak cobae
    	// $(document).ready(function () {

    	// 	var count = 0;

    	// 	$(document).on('click', '.add1', function () {
    	// 		count++;
    	// 		var html = '';

    	// 		html += '<tr>';
    	// 		html += '<td>' + count + '</td>';
    	// 		var nim = $("#val_nim").val();
    	// 		var nama = $("#val_nama").val();
    	// 		html += '<td>' + nim + '</td>';
    	// 		html += '<td>' + nama + '</td>';
    	// 		html += '<td><button class="btn btn-danger" id="hapus">Hapus</button></td>';
		// 		$('tbody').append(html);
    	// 	});
		// 	$(document).on('click', '#hapus', function () {
    	// 		$(this).closest('tr').remove();
    	// 	});
    	// });
		// batas aman

		
    </script>

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
	<script>
		$(document).on('click', '#select', function(){
			$('#nim').val($(this).data('nim'))
			$('#nim1').val($(this).data('nim'))
			$('#nama').val($(this).data('nama'))

			$('#modal-item').modal('hide')
		});

		var count = 0;

		$(document).on('click', '#add_siswa', function(){
			var nim = $('#nim').val()
			var nama = $('#nama').val()

			
			count++;
			var html = '';

			html += '<tr>';
			html += '<td>' + count + '</td>';
			html += '<td>' + nim + '</td>';
			html += '<td>' + nama + '</td>';
			html += '<td><button class="btn btn-danger" id="hapus">Hapus</button></td>';
			$('tbody').append(html);
		});
	</script>
    </body>

    </html>
