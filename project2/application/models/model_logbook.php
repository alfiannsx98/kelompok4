<?php
class model_logbook extends CI_Model
{
    function edit_logbook($id, $judul, $uraian, $progress)
    {
        $hsl = $this->db->query("UPDATE logbook SET judul ='$judul', uraian='$uraian', progress='$progress' WHERE id_logbook='$id'");
        return $hsl;
    }
    function hapus_logbook($id)
    {
        $hasil = $this->db->query("DELETE FROM logbook WHERE id_logbook='$id'");
        return $hasil;
    }
}