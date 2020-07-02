<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>REKAP DATA MAHASISWA</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap4.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
</head>
<body>
	<table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Judul</th>
                <th>Uraian</th>
                <th>Progress</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $email = $this->session->userdata('email');
        $cek_id_mhs = $this->db->get_where('user', ['email'=>$email])->row_array();
        $id_mahasiswa = $cek_id_mhs['identity'];
        $tgl = $this->db->query("SELECT min(tanggal) as terlama FROM logbook WHERE id_mahasiswa='$id_mahasiswa'")->row_array();
        $tgl_selesai = date("Y-m-d", strtotime('+ 5 month', strtotime($tgl['terlama'])));
        // $id_pendaftaran = $tgl_pnd['ID_PND'];   
        $id_pendaftaran = "2020-06-29";   
        $q_daftar = $this->db->get_where('pendaftaran', ['ID_PND' => $id_pendaftaran])->row_array();
        // $tgl = $q_daftar['TGL_PND'];
        $tgl = "2020-06-29";
        $data['tgl'] = $tgl;
        $rekap = $this->db->query("SELECT * FROM logbook WHERE id_mahasiswa='$id_mahasiswa' OR tanggal >= $tgl AND tanggal <= $tgl_selesai")->result_array()
        ?>
        <?php $i = 1; ?>
        <?php foreach ($rekap as $m) :
                $id = $m['id_logbook'];
                ?>
            <tr class="row100 body">
                <td class="cell100 column1"><?= $i; ?></td>
                <td class="cell100 column2"><?= $m['judul']; ?></td>
                <td class="cell100 column3"><?= $m['uraian']; ?></td>
                <td class="cell100 column4"><?= $m['progress']; ?></td>
                <td class="cell100 column5"><?= $m['tanggal']; ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
    <script>
	$(document).ready(function() {
	    var table = $('#example').DataTable( {
	        lengthChange: false,
	        buttons: [ 'copy', 'excel', 'csv', 'pdf', 'colvis' ]
	    } );
	 
	    table.buttons().container()
	        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
	} );
     </script>
</body>
</html>