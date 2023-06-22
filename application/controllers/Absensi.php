<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absensi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

        $cekSession = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        if (!$cekSession) {
            redirect('logoutAdm');
        }
    }

    function setAbsen()
    {
        $data['title'] = 'Setting Absensi';
        $data['active'] = '';

        $data['admin'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['lvluser'] = $data['admin']['level_id'];
        $guru = $data['admin']['nama'];
        $data['kodeAbs'] = $this->db->get('kd_minggu')->result_array();
        $data['absensi'] = $this->Kehadiran_model->getDataAbsenStaff();
        $data['host'] = "http://$_SERVER[SERVER_NAME]/absensi_guru/assets/adminlte/";

        $data['mapel'] = $this->Mapel_model->getJadwalGuru();
        $dMapel = $this->Mapel_model->getJadwalGuru1();

        $hariIni = '';
        $now = $this->hari_ini();
        $qryAbs = $this->db->query("SELECT * FROM `absen`")->row_array();
        $kdmg = $qryAbs['kode_absen'];
        $semester = $qryAbs['semester'];
        // $kls = $qryAbs['kelas']; 
        $jdwlGuru = '';
        for ($i = 0; $i < count($dMapel); $i++) {
            if ($dMapel[$i]->hari == $now) {
                $jdwlGuru = $dMapel[$i]->hari;
            }
        }
        // echo $jdwlGuru; die();
        $data['hariiniAbs'] = '';
        if ($jdwlGuru != '') {
            $qry = "SELECT g.nama AS guru, g.jenis_kel, kls.kelas AS kelas, k.jam, m.pelajaran AS mapel, k.status, k.keterangan
                    FROM kehadiran k
                    LEFT JOIN users AS g ON g.kode = k.guru
                    LEFT JOIN mapel AS m ON m.id = k.mapel_id
                    LEFT JOIN kelas AS kls ON kls.id = m.kelas 
                    WHERE k.hari = '" . $now . "' AND k.kode = '" . $kdmg . "' AND k.semester = '" . $semester . "' 
                    ORDER BY k.jam ASC";
            $query = $this->db->query($qry);
            $return = $query->result();
            $data['hariiniAbs'] = $return;
            // echo '================= ' . $qry; die();
        }

        $this->load->view('templates_sys/header', $data);
        $this->load->view('templates_sys/topbar', $data);
        $this->load->view('templates_sys/sidebar', $data);
        $this->load->view('administrator/setKodeAbs', $data);
        $this->load->view('templates_sys/footer');
    }

    function setkdabs()
    {
        $id = $this->input->post('id');
        $kode = $this->input->post('kode');
        $batas_absen = $this->input->post('batas_absen');
        if ($batas_absen) {
            $batas_absen = ', batas_absen = "' . $batas_absen . '" ';
        } else {
            $batas_absen = '';
        }
        $semester = $this->input->post('semester');
        $qry = "UPDATE absen SET kode_absen = '" . $kode . "', semester = " . $semester . " " . $batas_absen . " WHERE id = " . $id;
        // echo $qry; die();
        $this->db->query($qry);
        // return $update;
        $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        ✔️ Berhasil menyimpan.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        $ket = "Mengganti kode pertemuan";
        $data1['admin'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $nama = $data1['admin']['nama'];
        date_default_timezone_set('Asia/Jakarta'); // Zona Waktu indonesia
        $jam = date('H:i:s');
        $tgl = date('Y-m-d');
        $insertLog = "INSERT INTO `log_aktivitas` (`id`, `nama`, `jam`, `tanggal`, `keterangan`) VALUES (NULL, '" . $nama . "', '" . $jam . "', '" . $tgl . "', '" . $ket . "')";
        $this->db->query($insertLog);

        redirect('setAbsen');
    }

    function updateLapAbs()
    {
        $admin = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $dMapel = $this->Mapel_model->getJadwalGuru1();
        $now = $this->hari_ini();
        for ($i = 0; $i < count($dMapel); $i++) {
            $hari = '';
            $klsG = '';
            $id_m = '';
            if ($now == $dMapel[$i]->hari) {
                $hari = $dMapel[$i]->hari;
                $klsG = $dMapel[$i]->kelas;
                $id_m = $dMapel[$i]->id;
            }

            $getGuru = $this->db->query('SELECT * FROM users WHERE level_id = 3')->result();
            // print_r($getGuru);
            foreach ($getGuru as $gr) {
                $kode = $this->input->post('kode');
                $semester = $this->input->post('semester');
                $idGuru = $gr->kode;
                $nGuru = $gr->nama;
                $kehadiran = "SELECT * FROM kehadiran WHERE guru = '" . $idGuru . "' and kode = '" . $kode . "' and 
                (mapel_id = '" . $id_m . " ')";
                $hadir = $this->db->query($kehadiran)->result();
                if (empty($hadir)) {
                    $this->Kehadiran_model->UpLapAbs($idGuru, $kode, $semester, $id_m, $hari);

                    $status = array('status' => 'success');
                } else {
                    $status = array('status' => 'failed');
                }
            }
        }

        $getStaf = $this->db->query('SELECT * FROM users WHERE level_id = 2')->result();
        foreach ($getStaf as $gr) {
            $kode = $this->input->post('kode');
            $semester = $this->input->post('semester');
            $idGuru = $gr->kode;
            $nGuru = $gr->nama;
            $kehadiran = "SELECT * FROM kehadiran WHERE guru = '" . $idGuru . "' and kode = '" . $kode . "' and 
            mapel_id = 0";
            $hadir = $this->db->query($kehadiran)->result();
            if (empty($hadir)) {
                $this->Kehadiran_model->UpLapAbs($idGuru, $kode, $semester, 0, $hari);

                $status = array('status' => 'success');
            } else {
                $status = array('status' => 'failed');
            }
        }
        echo json_encode($status);
    }

    function absensi()
    {
        $data['title'] = 'Absensi Guru';
        $data['active'] = 'Mguru';

        $data['admin'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['lvluser'] = $data['admin']['level_id'];
        $data['absensi'] = $this->Kehadiran_model->getDataAbsenGuru();
        $data['host'] = "http://$_SERVER[SERVER_NAME]/absensi_guru/assets/adminlte/";

        $data['mapel'] = $this->Mapel_model->getJadwalGuru();

        $this->load->view('templates_sys/header', $data);
        $this->load->view('templates_sys/topbar', $data);
        $this->load->view('templates_sys/sidebar', $data);
        $this->load->view('administrator/absensi', $data);
        $this->load->view('templates_sys/footer');
    }

    function rekap_absensi()
    {
        $data['title'] = 'Laporan Rekap Absen';
        $data['active'] = 'Mguru';

        $data['admin'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['lvluser'] = $data['admin']['level_id'];
        $data['minggu'] = $this->Kehadiran_model->getMinggu();
        // $data['absensi'] = $this->Kehadiran_model->getDataAbsenGuru();
        $data['host'] = "http://$_SERVER[SERVER_NAME]/absensi_guru/assets/adminlte/";

        // $data['mapel'] = $this->Mapel_model->getdataMapel();

        $this->load->view('templates_sys/header', $data);
        $this->load->view('templates_sys/topbar', $data);
        $this->load->view('templates_sys/sidebar', $data);
        $this->load->view('administrator/rekap_absen', $data);
        $this->load->view('templates_sys/footer');
    }

    function getRekapAbsen()
    {
        $kodes = $this->input->post('semester');
        $minggu = $this->input->post('minggu_ke');
        $kelas = $this->input->post('kelas');
        // var_dump($minggu);
        // var_dump($kelas);
        // die();
        $data = [
            'kode' => $minggu,
            'semester' => $kodes,
            'kelas' => $kelas,
        ];
        $this->session->set_userdata($data);
        if ($minggu == '') {
            $data['rekapData'] = $this->Kehadiran_model->getRecapReport($minggu = '', $kodes, $kelas = '');
        } else if ($minggu != '' and $kelas != '') {
            $data['rekapData'] = $this->Kehadiran_model->getRecapReport($minggu, $kodes, $kelas);
        }

        if ($data['rekapData']) {
            $status = array('status' => 'success', 'data' => $data['rekapData']);
        } else {
            $status = array('status' => 'failed');
        }
        echo json_encode($status);
    }

    function rekapAbsenRpt()
    {
        $minggu = $this->session->userdata('kode');
        $kodes = $this->session->userdata('semester');
        $kelas = $this->session->userdata('kelas');
        // var_dump($minggu);
        // $minggu = $this->input->post($minggu);
        // if ($minggu == '' && $kodes = '') {
        //     $data['rekapData'] = $this->Kehadiran_model->getDataAbsen();
        // } else {
        // }
        $data['rekapData'] = $this->Kehadiran_model->getRecapReport($minggu, $kodes, $kelas);
        $data['admin'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('administrator/rekap_absen_rpt', $data);
    }

    function updateDataUser($id)
    {
        $data['sysuser'] = $this->db->get_where('sysuser', ['email' => $this->session->userdata('email')])->row_array();
        $nama = $data['sysuser']['nama'];
        $type = $this->input->post('type');
        $nama = $this->input->post('nama');
        $nip = $this->input->post('nip');
        $tgl = $this->input->post('tgl_lahir');
        $tempat = $this->input->post('tempat_lahir');
        $alamat = $this->input->post('alamat');
        $level = $this->input->post('level_id');
        $status = $this->input->post('status');
        $id = $this->input->post('id');

        $data = array(
            'id' => $id,
            'nama' => $nama,
            'nip' => $nip,
            'tempat_lahir' => $tempat,
            'tgl_lahir' => $tgl,
            'alamat' => $alamat,
            'level_id' => $level,
            'status' => $status
        );

        $this->db->where('id', $id);
        $this->db->update('sysuser', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success text-left py-1" role="alert">✔️ Data ' . $nama . ' berhasi di edit!</div>');
        if ($type == 'adm') {
            redirect('user/dataUser');
        } else {
            redirect('user/dataGuru');
        }
    }

    public function dataGuru()
    {
        $data['title'] = 'Data Guru';
        $data['active'] = 'Mguru';

        $data['sysuser'] = $this->db->get_where('sysuser', ['email' => $this->session->userdata('email')])->row_array();
        $data['lvluser'] = $data['sysuser']['level_id'];
        // $data['siswa'] = $this->User_model->getSiswa();
        $data['guru'] = $this->User_model->getGuru();
        $data['host'] = "http://$_SERVER[SERVER_NAME]/absensi_guru/assets/adminlte/";

        $this->load->view('templates_sys/header', $data);
        $this->load->view('templates_sys/topbar', $data);
        $this->load->view('templates_sys/sideba2r', $data);
        $this->load->view('guru/data_guru', $data);
        $this->load->view('templates_sys/footer');
    }

    function editdataGuru($id)
    {
        $data['title'] = 'Edit Data Guru';
        $data['active'] = 'Mguru';

        $data['sysuser'] = $this->db->get_where('sysuser', ['email' => $this->session->userdata('email')])->row_array();
        $data['lvluser'] = $data['sysuser']['level_id'];
        // $data['siswa'] = $this->User_model->getSiswa();
        $data['guru'] = $this->User_model->getGuruId($id);
        // var_dump($data['guru']);
        $data['level'] = $this->db->get_where('level')->result_array();
        // var_dump($data['level']);
        $data['host'] = "http://$_SERVER[SERVER_NAME]/absensi_guru/assets/adminlte/";

        $this->load->view('templates_sys/header', $data);
        $this->load->view('templates_sys/topbar', $data);
        $this->load->view('templates_sys/sidebar2', $data);
        $this->load->view('guru/editdata_guru', $data);
        $this->load->view('templates_sys/footer');
    }
    public function dataSiswa()
    {
        $data['title'] = 'Data Siswa';
        $data['active'] = '';

        $data['sysuser'] = $this->db->get_where('sysuser', ['email' => $this->session->userdata('email')])->row_array();
        $data['lvluser'] = $data['sysuser']['level_id'];
        $guru = $data['sysuser']['kode'];
        // echo "================ " . $this->hari_ini();
        // $data['siswa'] = $this->User_model->getSiswa();
        $data['mapel'] = $this->Mapel_model->getJadwalGuru();
        $data['siswa'] = $this->User_model->getSiswa1();
        $data['host'] = "http://$_SERVER[SERVER_NAME]/absensi_guru/assets/adminlte/";

        $this->load->view('templates_sys/header', $data);
        $this->load->view('templates_sys/topbar', $data);
        $this->load->view('templates_sys/sidebar2', $data);
        $this->load->view('guru/data_siswa', $data);
        $this->load->view('templates_sys/footer');
    }

    function deleteS($id)
    {
        $ket = 'Menghapus data siswa';
        $data['sysuser'] = $this->db->get_where('sysuser', ['email' => $this->session->userdata('email')])->row_array();
        $nama = $data['sysuser']['nama'];
        date_default_timezone_set('Asia/Jakarta'); // Zona Waktu indonesia
        $jam = date('H:i:s');
        $tgl = date('Y-m-d');
        $insertLog = "INSERT INTO `log_aktivitas` (`id`, `nama`, `jam`, `tanggal`, `keterangan`) VALUES (NULL, '" . $nama . "', '" . $jam . "', '" . $tgl . "', '" . $ket . "')";
        $this->db->query($insertLog);

        $hapus_data = "DELETE FROM siswa WHERE id ='$id'";
        $this->db->query($hapus_data);
        redirect('daftarsiswa');
    }
    function editdataSiswa($id)
    {
        $data['title'] = 'Edit Data Siswa';
        $data['active'] = '';

        $data['sysuser'] = $this->db->get_where('sysuser', ['email' => $this->session->userdata('email')])->row_array();
        $data['lvluser'] = $data['sysuser']['level_id'];
        // $data['siswa'] = $this->User_model->getSiswa();
        $data['siswa'] = $this->User_model->getSiswaId($id);
        $data['level'] = $this->db->get_where('level')->result_array();
        // var_dump($data['level']);
        $data['host'] = "http://$_SERVER[SERVER_NAME]/absensi_guru/assets/adminlte/";

        $this->load->view('templates_sys/header', $data);
        $this->load->view('templates_sys/topbar', $data);
        $this->load->view('templates_sys/sidebar2', $data);
        $this->load->view('guru/editdata_siswa', $data);
        $this->load->view('templates_sys/footer');
    }

    function updateDataSiswa($id)
    {
        $data['sysuser'] = $this->db->get_where('sysuser', ['email' => $this->session->userdata('email')])->row_array();
        // $nama = $data['sysuser']['nama'];
        $type = $this->input->post('type');
        $nama = $this->input->post('nama');
        $nis = $this->input->post('nis');
        $tgl = $this->input->post('tgl_lahir');
        $tempat = $this->input->post('tempat_lahir');
        $alamat = $this->input->post('alamat');
        $status = $this->input->post('status');
        $jurusan = $this->input->post('jurusan');
        $absen = $this->input->post('absen');
        $id = $this->input->post('id');

        $data = array(
            'id' => $id,
            'no_absen' => $absen,
            'nama' => $nama,
            'nis' => $nis,
            'tempat_lahir' => $tempat,
            'tgl_lahir' => $tgl,
            'alamat' => $alamat,
            'status' => $status,
            'jurusan' => $jurusan
        );

        $this->db->where('id', $id);
        $this->db->update('siswa', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success text-left py-1" role="alert">✔️ Data ' . $nama . ' berhasi di edit!</div>');
        $ket = "Mengubah data siswa ";
        $data1['sysuser'] = $this->db->get_where('sysuser', ['email' => $this->session->userdata('email')])->row_array();
        $nama = $data1['sysuser']['nama'];
        date_default_timezone_set('Asia/Jakarta'); // Zona Waktu indonesia
        $jam = date('H:i:s');
        $tgl = date('Y-m-d');
        $insertLog = "INSERT INTO `log_aktivitas` (`id`, `nama`, `jam`, `tanggal`, `keterangan`) VALUES (NULL, '" . $nama . "', '" . $jam . "', '" . $tgl . "', '" . $ket . "')";
        $this->db->query($insertLog);
        redirect('guru/dataSiswa');
    }

    function hari_ini()
    {
        date_default_timezone_set('Asia/Jakarta');
        $hari = date("D");

        switch ($hari) {
            case 'Sun':
                $hari_ini = "Minggu";
                break;

            case 'Mon':
                $hari_ini = "Senin";
                break;

            case 'Tue':
                $hari_ini = "Selasa";
                break;

            case 'Wed':
                $hari_ini = "Rabu";
                break;

            case 'Thu':
                $hari_ini = "Kamis";
                break;

            case 'Fri':
                $hari_ini = "Jumat";
                break;

            case 'Sat':
                $hari_ini = "Sabtu";
                break;

            default:
                $hari_ini = "Tidak di ketahui";
                break;
        }

        return $hari_ini;

        // return "<b>" . $hari_ini . "</b>";

    }
}
