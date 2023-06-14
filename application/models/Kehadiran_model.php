<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');

class Kehadiran_model extends CI_Model
{
    function getDataAbsen()
    { 
        $qry = "SELECT k.*, mg.nama AS mg_ke, gr.nama AS nama_guru, m.pelajaran AS mapel
                FROM kehadiran k 
                JOIN mapel m ON k.mapel_id = m.id
                JOIN users gr ON m.guru = gr.kode
                JOIN kd_minggu mg ON k.kode = mg.kode
                ORDER BY k.kode, k.hari";
        $query = $this->db->query($qry);
        $return = $query->result();
        // var_dump($return);
        return $return;
    }

    function getRecapReport($minggu_ke, $semester, $kelas = '')
    {
        if ($minggu_ke == '') {
            $qrkode = '';
        } else {
            $qrkode = ' AND k.kode = ' . $minggu_ke;
        }
        if ($kelas == '') {
            $qrkls = '';
        } else {
            $qrkls = ' AND kls.kelas = ' . $kelas;
        }
        if ($semester > 0) {
            $qrs = 'WHERE k.semester = ' . $semester;
        } else {
            $qrs = '';
        }
        $qry = "SELECT DISTINCT K.*, g.nip, g.nama as guru, g.jenis_kel, m.pelajaran AS mapel
                FROM kehadiran k
                JOIN users as g on g.kode=k.guru
                LEFT JOIN mapel as m on m.guru=g.kode
                " . $qrkode . " " . $qrs . " " . $qrkls . "
                ORDER BY k.kode, k.hari";

        // $qry = "SELECT k.*, kls.kelas, g.jenis_kel, g.nama AS guru, g.nip, m.pelajaran AS mapel
        //         FROM kehadiran k
        //         LEFT JOIN mapel m ON k.mapel_id = m.id
        //         JOIN kelas kls ON kls.id = m.kelas 
        //         JOIN users g ON k.guru = g.kode
        //         " . $qrkode . " " . $qrs . " " . $qrkls . "
        //         ORDER BY k.kode, k.hari";
        $query = $this->db->query($qry);
        $result = $query->result();
        // echo $qry;
        return $result;
    }

    function getMinggu()
    {
        $qry = "SELECT * FROM kd_minggu";
        $query = $this->db->query($qry);
        $result = $query->result();
        return $result;
    }

    function UpLapAbs($idGuru, $kode, $semester, $id_m, $hari) {
        $insert = "INSERT INTO `kehadiran` (`id`, `guru`, `kode`, `semester`, `jam`, `tanggal`, `status`, `keterangan`, `mapel_id`, `hari`) VALUES (NULL, '".$idGuru."', '".$kode."', '".$semester."', 'NULL', 'NULL', 'N', 'Tidak Hadir', '".$id_m."', '".$hari."')";
        $query = $this->db->query($insert);
        // $result = $query->result();
        return true;
    }
}
