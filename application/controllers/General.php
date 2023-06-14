<?php
defined('BASEPATH') or exit('No direct script access allowed');

class General extends CI_Controller
{
    function getnamaGuru()
    {
        $nama = $this->input->post('nama');

        $qry = "SELECT m.id, m.hari_id, m.kode_mapel, m.pelajaran, m.jam_mulai, m.jam_selesai, s.nama AS nama_guru, h.hari, kls.kelas
                FROM mapel m
                JOIN users s on s.kode=m.guru
                JOIN kelas kls on kls.id = m.kelas
                JOIN hari h on h.id=m.hari_id
                WHERE s.nama = '" . $nama . "'
                ORDER BY m.hari_id";
        $query = $this->db->query($qry);
        $res = $query->result();
        // print_r($res);
        echo json_encode($res);
    }

    function getAbs()
    {
        $kode = $this->input->post('kode_abs');
        $kls = $this->input->post('kls');

        if ($kls != '') {
            $addqry = "AND kls.kelas = '" . $kls . "'";
        } else {
            $addqry = '';
        }

        $qry = "SELECT k.*, mg.nama AS mg_ke, kls.kelas, us.jenis_kel, us.nama AS guru, us.nip,
                m.pelajaran AS mapel 
                FROM kehadiran k 
                LEFT JOIN mapel AS m ON m.id= k.mapel_id
                JOIN kelas AS kls ON kls.id = m.kelas
                JOIN users AS us ON us.kode = m.guru
                JOIN kd_minggu AS mg ON k.kode = mg.kode
                WHERE k.kode = '" . $kode . "' " . $addqry . " AND us.level_id = 3
                ORDER BY k.semester, k.kode, k.hari, kls.kelas";
        // echo $qry;
        $query = $this->db->query($qry);
        $res = $query->result();
        echo json_encode($res);
    }

    function getkelas()
    {
        $kelas = $this->input->post('kelas');
        $qry = "SELECT S.*, kls.kelas AS kelass FROM siswa S
                JOIN kelas as kls ON kls.id = S.kelas
                WHERE kls.kelas = '" . $kelas . "'
                ORDER BY S.NAMA ASC";
        $result = $this->db->query($qry)->result();
        echo json_encode($result);
    }

    function log()
    {
        $session = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        if ($session != '') {
            $data['admin'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
            $lvl_user = $data['admin']['level_id'];
            // echo $lvl_user; die();
            if ($lvl_user == 1) {
                $this->logAdmin();
            } else if ($lvl_user == 2) {
                $this->logStaff();
            } else {
                $this->logGuru();
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger py-1" role="alert">Anda belum login!</div>');
            redirect('loginadm');
        }
    }
    function logAdmin()
    {
        $data['title'] = 'Laporan Log Aktivitas';
        $data['active'] = '';

        $data['admin'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['lvluser'] = $data['admin']['level_id'];
        // $data['siswa'] = $this->User_model->getSiswa();
        $data['guru'] = $this->User_model->getGuru();
        $data['host'] = "http://$_SERVER[SERVER_NAME]/absensi_guru/assets/adminlte/";

        $data['logInfo'] = $this->db->query("SELECT * FROM log_aktivitas ORDER BY id DESC")->result();

        $this->load->view('templates_sys/header', $data);
        $this->load->view('/templates_sys/topbar', $data);
        $this->load->view('/templates_sys/sidebar', $data);
        $this->load->view('administrator/laporan_log', $data);
        $this->load->view('/templates_sys/footer');
    }

    function logStaff()
    {
        $data['title'] = 'Laporan Log Aktivitas';
        $data['active'] = '';

        $data['admin'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['lvluser'] = $data['admin']['level_id'];
        $data['siswa'] = $this->User_model->getSiswa();
        $data['guru'] = $this->User_model->getGuru();
        $data['host'] = "http://$_SERVER[SERVER_NAME]/absensi_guru/assets/adminlte/";

        $data['logInfo'] = $this->db->query("SELECT * FROM log_aktivitas ORDER BY id DESC")->result();

        $this->load->view('templates_sys/header', $data);
        $this->load->view('/templates_sys/topbar', $data);
        $this->load->view('/templates_sys/sidebar1', $data);
        $this->load->view('administrator/laporan_log', $data);
        $this->load->view('/templates_sys/footer');
    }
    function logGuru()
    {
        $data['title'] = 'Laporan Log Aktivitas';
        $data['active'] = '';

        $data['admin'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['lvluser'] = $data['admin']['level_id'];
        $data['siswa'] = $this->User_model->getSiswa();
        $data['guru'] = $this->User_model->getGuru();
        $data['host'] = "http://$_SERVER[SERVER_NAME]/absensi_guru/assets/adminlte/";

        $data['logInfo'] = $this->db->query("SELECT * FROM log_aktivitas ORDER BY id DESC")->result();
        $data['mapel'] = $this->Mapel_model->getJadwalGuru();

        $this->load->view('templates_sys/header', $data);
        $this->load->view('/templates_sys/topbar', $data);
        $this->load->view('/templates_sys/sidebar2', $data);
        $this->load->view('guru/laporan_log', $data);
        $this->load->view('/templates_sys/footer');
    }
}
