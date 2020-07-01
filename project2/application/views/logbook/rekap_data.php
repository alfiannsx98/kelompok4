<!DOCTYPE html>
<html>
<head>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta charset="utf-8">
    <title>REKAP DATA Logbook</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
</head>
<body>
<h1 class="text-center bg-primary">Generate PDF from View using DomPDF</h1>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Judul</th>
            <th>Uraian</th>
            <th>Progress</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        <tr>
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
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $m['judul']; ?></td>
                        <td><?= $m['uraian']; ?></td>
                        <td><?= $m['progress']; ?></td>
                        <td><?= $m['tanggal']; ?></td>
                    </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tr>
    <tbody>
</table>
</body>
</html>