<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mapel_model extends CI_Model
{
    function getMapel($kelas = '')
    {
        if ($kelas) {
            $where = "WHERE k.kelas = '" . $kelas ."'";
        } else {
            $where = '';
        }
        $qry = "SELECT g.kode AS users, m.id, m.hari_id, m.kode_mapel, m.pelajaran, m.jam_mulai, m.batas_absen, m.jam_selesai, m.jurusan, 
               g.nama AS nama_guru, h.hari, k.kelas as kelas 
                FROM mapel m
                JOIN users g on g.kode=m.guru
                JOIN kelas k on k.id = m.kelas
                JOIN hari h on h.id=m.hari_id
                ".$where."
                ORDER BY m.jam_mulai";

        $query = $this->db->query($qry);
        $return = $query->result();
        // var_dump($qry);
        return $return;
    }

    function getdataMapel()
    {
        $qry = "SELECT m.id, m.hari_id, m.kode_mapel, m.pelajaran, m.jam_mulai, m.batas_absen, m.jam_selesai, s.nama AS nama_guru, h.hari 
                FROM mapel m
                JOIN users s on s.kode=m.guru
                JOIN kelas k on k.id = m.kelas
                JOIN hari h on h.id=m.hari_id
                WHERE k.kelas = ''
                ORDER BY m.jam_mulai";

        $query = $this->db->query($qry);
        $return = $query->result();
        // var_dump($qry);
        return $return;
    }

    function getMapelId($id)
    {
        $qry = "SELECT m.id, m.hari_id, m.kode_mapel, m.pelajaran, m.jam_mulai, m.batas_absen, m.jam_selesai, s.nama AS nama_guru, h.hari, k.kelas
                FROM mapel m
                JOIN users s on s.kode=m.guru
                JOIN kelas k on k.id = m.kelas
                JOIN hari h on h.id=m.hari_id
                WHERE m.id = '" . $id . "'
                ORDER BY m.jam_mulai";

        $query = $this->db->query($qry);
        $return = $query->result();
        // var_dump($qry);
        return $return;
    }

    function getJadwalGuru()
    {
        $qry = "SELECT m.id, m.hari_id, m.kode_mapel, m.pelajaran, m.jam_mulai, m.jam_selesai, s.nama AS nama_guru, h.hari, m.kelas
                FROM mapel m
                JOIN users s on s.kode=m.guru
                JOIN kelas k on k.id = m.kelas
                JOIN hari h on h.id=m.hari_id
                ORDER BY m.kelas, m.hari_id";

        $query = $this->db->query($qry);
        $return = $query->result();
        // var_dump($qry);
        return $return;
    }

    function getIdGuru($id)
    { 
        $qry = "SELECT m.id, m.hari_id, m.kode_mapel, m.pelajaran, m.jam_mulai, m.batas_absen, m.jam_selesai, s.nama AS nama_guru, h.hari, kls.kelas
        FROM mapel m
        JOIN users s on s.kode=m.guru
        JOIN kelas kls on kls.id = m.kelas
        JOIN hari h on h.id=m.hari_id
        WHERE m.id = '" . $id . "'
        ORDER BY m.kelas, m.hari_id";
        $query = $this->db->query($qry);
        $res = $query->result();
        // print_r($res); die();
        return $res;
    }

    function getJadwalGuru1($nama = '')
    {
        $where = '';
        if ($nama) {
            $where = "WHERE s.nama = '".$nama."'";
        }
        $qry = "SELECT m.id, m.hari_id, m.kode_mapel, m.pelajaran, m.jam_mulai, m.jam_selesai, s.nama AS nama_guru, h.hari, m.kelas
                FROM mapel m
                JOIN users s on s.kode=m.guru
                JOIN kelas k on k.id = m.kelas
                JOIN hari h on h.id=m.hari_id 
                $where
                ORDER BY m.kelas, m.hari_id";

        $query = $this->db->query($qry);
        $return = $query->result();
        // var_dump($qry);
        return $return;
    }

    function cekHadir()
    {
        $qry = "SELECT k.mapel_id as id_absen, m.id, m.hari_id, m.kode_mapel, m.pelajaran, m.jam_mulai, m.batas_absen, m.jam_selesai, g.nama AS nama_guru, h.hari 
                FROM mapel m
                JOIN kelas kls on kls.id = m.kelas
                JOIN users g on g.kode=m.guru
                JOIN hari h on h.id=m.hari_id
                JOIN kehadiran k on k.mapel_id = m.id
                ORDER BY m.jam_mulai";
        $query = $this->db->query($qry);
        $return = $query->result();
        // var_dump($return);
        return $return;
    }

    function getMasterMapel() {
        $qry = "SELECT * FROM mapel GROUP BY kode_mapel"; 
        $query = $this->db->query($qry);
        $return = $query->result(); 
        return $return;
    }
}
