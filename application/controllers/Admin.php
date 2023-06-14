<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $data['active'] = 'MUser';
        $cekSession = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        if (!$cekSession) {
            redirect('logoutAdm');
        }
    }

    function mapelGuru()
    {
        $data['title'] = 'Mata Pelajaran Guru';
        $data['active'] = '';

        $data['admin'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['lvluser'] = $data['admin']['level_id'];
        $data['guru'] = $this->db->select('g.*, mp.pelajaran')->distinct()
            ->from('users g')
            ->join('mapel as mp', 'mp.guru = g.kode', 'left')
            ->where('g.level_id', 3)
            ->order_by('g.nama')
            ->get()->result();
        $data['host'] = "http://$_SERVER[SERVER_NAME]/absensi_guru/assets/adminlte/";
        $nama = $data['admin']['nama'];
        date_default_timezone_set('Asia/Jakarta'); // Zona Waktu indonesia
        $jam = date('H:i:s');
        $tgl = date('Y-m-d');
        $ket = "Melihat " . $data['title'];
        // echo '===================' . $nama;
        $insertLog = "INSERT INTO `log_aktivitas` (`id`, `nama`, `jam`, `tanggal`, `keterangan`) VALUES (NULL, '" . $nama . "', '" . $jam . "', '" . $tgl . "', '" . $ket . "')";
        $this->db->query($insertLog);

        $this->load->view('templates_sys/header', $data);
        $this->load->view('/templates_sys/topbar', $data);
        $this->load->view('/templates_sys/sidebar', $data);
        $this->load->view('administrator/mapel_guru', $data);
        $this->load->view('/templates_sys/footer');
    }

    function UpdateMapelGuru($kode)
    {
        $data['title'] = 'Mata Pelajaran Guru';
        $data['active'] = '';

        $data['admin'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['lvluser'] = $data['admin']['level_id'];
        $data['guru'] = $this->db->select('g.*, mp.pelajaran, mp.kode_mapel')->distinct()
            ->from('users g')
            ->join('mapel as mp', 'mp.guru = g.kode', 'left')
            ->where('g.level_id', 3)
            ->where('g.kode', $kode)
            ->get()->row();

        $data['mapel'] = $this->Mapel_model->getMasterMapel();
        $data['host'] = "http://$_SERVER[SERVER_NAME]/absensi_guru/assets/adminlte/";

        $this->form_validation->set_rules('kode_mapel', 'Kode Mapel', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates_sys/header', $data);
            $this->load->view('/templates_sys/topbar', $data);
            $this->load->view('/templates_sys/sidebar', $data);
            $this->load->view('administrator/editMapel_guru', $data);
            $this->load->view('/templates_sys/footer');
        } else {
            $namaG = $this->input->post('nama');
            $mapel_old = $this->input->post('mapel_old');
            $kode_guru = $this->input->post('kode');
            $kode_mapel = $this->input->post('kode_mapel');

            $data = array(
                'guru' => $kode_guru,
            );

            $this->db->where('kode_mapel', $kode_mapel);
            $this->db->update('mapel', $data);

            if ($mapel_old != $kode_mapel) {
                $this->db->where('kode_mapel', $mapel_old);
                $this->db->update('mapel', ['guru' => 0]);
            }
            // print_r($this->db->last_query()); die();
            $this->session->set_flashdata('message', '<div class="alert alert-success text-left py-1" role="alert">✔️ Data ' . $namaG . ' berhasi di edit!</div>');
            $ket = "Mengubah Mata Pelajaran Guru ";
            $nama1 = $data['admin']['nama'];
            date_default_timezone_set('Asia/Jakarta'); // Zona Waktu indonesia
            $jam = date('H:i:s');
            $tgl = date('Y-m-d');

            $insertLog = "INSERT INTO `log_aktivitas` (`id`, `nama`, `jam`, `tanggal`, `keterangan`) VALUES (NULL, '" . $nama1 . "', '" . $jam . "', '" . $tgl . "', '" . $ket . "')";
            $this->db->query($insertLog);
            redirect('mapelGuru');
        }
    }

    function jadwalGuru()
    {
        $data['title'] = 'Jadwal Guru';
        $data['active'] = '';

        $data['admin'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['lvluser'] = $data['admin']['level_id'];
        $data['siswa'] = $this->User_model->getAdmin();
        $data['guru'] = $this->User_model->getGuru();
        $data['mapel'] = $this->Mapel_model->getJadwalGuru();
        $data['mapelg'] = $this->db->get_where('users', ['level_id' => '3'])->result();
        $data['host'] = "http://$_SERVER[SERVER_NAME]/absensi_guru/assets/adminlte/";
        $nama = $data['admin']['nama'];
        date_default_timezone_set('Asia/Jakarta'); // Zona Waktu indonesia
        $jam = date('H:i:s');
        $tgl = date('Y-m-d');
        $ket = "Melihat " . $data['title'];
        // echo '===================' . $nama;
        $insertLog = "INSERT INTO `log_aktivitas` (`id`, `nama`, `jam`, `tanggal`, `keterangan`) VALUES (NULL, '" . $nama . "', '" . $jam . "', '" . $tgl . "', '" . $ket . "')";
        $this->db->query($insertLog);

        $this->load->view('templates_sys/header', $data);
        $this->load->view('/templates_sys/topbar', $data);
        $this->load->view('/templates_sys/sidebar', $data);
        $this->load->view('administrator/jadwal_guru', $data);
        $this->load->view('/templates_sys/footer');
    }

    function UpdateJadwalGuru($id)
    {
        $data['title'] = 'Jadwal Guru';
        $data['active'] = '';

        $data['admin'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['lvluser'] = $data['admin']['level_id'];
        $data['guru'] = $this->Mapel_model->getIdGuru($id);
        $data['hari'] = $this->db->get('hari')->result_array();
        // print_r($data['guru']); die();
        $data['level'] = $this->db->get_where('level')->result_array();
        $data['host'] = "http://$_SERVER[SERVER_NAME]/absensi_guru/assets/adminlte/";

        // $this->form_validation->set_rules('nama', 'Nama Guru', 'required|trim');
        $this->form_validation->set_rules('jam_masuk', 'Jam Masuk', 'required|trim');
        $this->form_validation->set_rules('batas_absen', 'Batas Absen', 'required|trim');
        $this->form_validation->set_rules('jam_selesai', 'Jam Selesai', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates_sys/header', $data);
            $this->load->view('/templates_sys/topbar', $data);
            $this->load->view('/templates_sys/sidebar', $data);
            $this->load->view('administrator/editjadwal_guru', $data);
            $this->load->view('/templates_sys/footer');
        } else {
            $id = $this->input->post('id');
            $hari = $this->input->post('hari');
            $namaG = $this->input->post('nama');
            $jam_masuk = $this->input->post('jam_masuk');
            $batas_absen = $this->input->post('batas_absen');
            $jam_selesai = $this->input->post('jam_selesai');

            $data = array(
                'id' => $id,
                // 'nama_guru' => $namaG,
                'hari_id' => $hari,
                'jam_mulai' => $jam_masuk,
                'batas_absen' => $batas_absen,
                'jam_selesai' => $jam_selesai
            );

            $this->db->where('id', $id);
            $this->db->update('mapel', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success text-left py-1" role="alert">✔️ Data ' . $namaG . ' berhasi di edit!</div>');
            $ket = "Mengubah jadwal guru ";
            $nama1 = $data['admin']['nama'];
            date_default_timezone_set('Asia/Jakarta'); // Zona Waktu indonesia
            $jam = date('H:i:s');
            $tgl = date('Y-m-d');
            $insertLog = "INSERT INTO `log_aktivitas` (`id`, `nama`, `jam`, `tanggal`, `keterangan`) VALUES (NULL, '" . $nama1 . "', '" . $jam . "', '" . $tgl . "', '" . $ket . "')";
            $this->db->query($insertLog);
            redirect('jadwalGuru');
        }
    }

    public function dataUser()
    {
        $data['title'] = 'Data User';
        $data['active'] = 'MUser';

        $data['admin'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['lvluser'] = $data['admin']['level_id'];
        // $data['siswa'] = $this->User_model->getSiswa();
        $data['adm'] = $this->User_model->getAdmin();
        $data['host'] = "http://$_SERVER[SERVER_NAME]/absensi_guru/assets/adminlte/";
        $data['mapel'] = $this->Mapel_model->getJadwalGuru();
        $nama = $data['admin']['nama'];
        date_default_timezone_set('Asia/Jakarta'); // Zona Waktu indonesia
        $jam = date('H:i:s');
        $tgl = date('Y-m-d');
        $ket = "Melihat " . $data['title'];
        // echo '===================' . $nama;
        $insertLog = "INSERT INTO `log_aktivitas` (`id`, `nama`, `jam`, `tanggal`, `keterangan`) VALUES (NULL, '" . $nama . "', '" . $jam . "', '" . $tgl . "', '" . $ket . "')";
        $this->db->query($insertLog);

        $this->load->view('templates_sys/header', $data);
        $this->load->view('/templates_sys/topbar', $data);
        $this->load->view('/templates_sys/sidebar', $data);
        $this->load->view('administrator/data_user', $data);
        $this->load->view('/templates_sys/footer');
    }

    function editdataUser($id)
    {
        $data['title'] = 'Edit Data User';
        $data['active'] = 'MUser';

        $data['admin'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['lvluser'] = $data['admin']['level_id'];
        $data['user'] = $this->User_model->getUserId($id);
        $data['level'] = $this->db->get_where('level')->result_array();

        $data['host'] = "http://$_SERVER[SERVER_NAME]/absensi_guru/assets/adminlte/";

        $this->load->view('templates_sys/header', $data);
        $this->load->view('/templates_sys/topbar', $data);
        $this->load->view('/templates_sys/sidebar', $data);
        $this->load->view('administrator/editdata_user', $data);
        $this->load->view('/templates_sys/footer');
    }

    public function dataStaf()
    {
        $data['title'] = 'Data Staf';
        $data['active'] = 'MUser';

        $data['admin'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['lvluser'] = $data['admin']['level_id'];
        // $data['siswa'] = $this->User_model->getSiswa();
        $data['staf'] = $this->User_model->getStaf();
        $data['host'] = "http://$_SERVER[SERVER_NAME]/absensi_guru/assets/adminlte/";

        $nama = $data['admin']['nama'];
        date_default_timezone_set('Asia/Jakarta'); // Zona Waktu indonesia
        $jam = date('H:i:s');
        $tgl = date('Y-m-d');
        $ket = "Melihat " . $data['title'];
        // echo '===================' . $nama;
        $insertLog = "INSERT INTO `log_aktivitas` (`id`, `nama`, `jam`, `tanggal`, `keterangan`) VALUES (NULL, '" . $nama . "', '" . $jam . "', '" . $tgl . "', '" . $ket . "')";
        $this->db->query($insertLog);

        $this->load->view('templates_sys/header', $data);
        $this->load->view('/templates_sys/topbar', $data);
        $this->load->view('/templates_sys/sidebar', $data);
        $this->load->view('administrator/data_staf', $data);
        $this->load->view('/templates_sys/footer');
    }

    function editdataStaf($id)
    {
        $data['title'] = 'Edit Data User';
        $data['active'] = 'MUser';

        $data['admin'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['lvluser'] = $data['admin']['level_id'];
        $data['user'] = $this->User_model->getUserId($id);
        $data['level'] = $this->db->get_where('level')->result_array();

        $data['host'] = "http://$_SERVER[SERVER_NAME]/absensi_guru/assets/adminlte/";

        $this->load->view('templates_sys/header', $data);
        $this->load->view('/templates_sys/topbar', $data);
        $this->load->view('/templates_sys/sidebar', $data);
        $this->load->view('administrator/editdata_staf', $data);
        $this->load->view('/templates_sys/footer');
    }

    function updateDataUser($id)
    {
        $data['admin'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $nama1 = $data['admin']['nama'];
        $type = $this->input->post('type');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $nip = $this->input->post('nip');
        $tgl = $this->input->post('tgl_lahir');
        $tempat = $this->input->post('tempat_lahir');
        $alamat = $this->input->post('alamat');
        $level = $this->input->post('level_id');
        $status = $this->input->post('status');
        $kode = $this->input->post('kode');

        $data = array(
            'kode' => $kode,
            'email' => $email,
            'nama' => $nama,
            'nip' => $nip,
            'tempat_lahir' => $tempat,
            'tgl_lahir' => $tgl,
            'alamat' => $alamat,
            'level_id' => $level,
            'status' => $status
        );

        $this->db->where('kode', $kode);
        $this->db->update('users', $data);
        // print_r($this->db->last_query()); die();
        $this->session->set_flashdata('message', '<div class="alert alert-success text-left py-1" role="alert">✔️ Data ' . $nama . ' berhasi di edit!</div>');
        $ket = "Mengubah data user ";
        // $nama1 = $data['admin']['nama'];
        date_default_timezone_set('Asia/Jakarta'); // Zona Waktu indonesia
        $jam = date('H:i:s');
        $tgl = date('Y-m-d');
        // echo '===================' . $nama;
        // die();
        $insertLog = "INSERT INTO `log_aktivitas` (`id`, `nama`, `jam`, `tanggal`, `keterangan`) VALUES (NULL, '" . $nama1 . "', '" . $jam . "', '" . $tgl . "', '" . $ket . "')";
        $this->db->query($insertLog);
        if ($type == 'adm') {
            redirect('admin/dataUser');
        } else if ($type == 'staf') {
            redirect('admin/datastaf');
        } else {
            redirect('admin/dataGuru');
        }
    }

    public function dataGuru()
    {
        $data['title'] = 'Data Guru';
        $data['active'] = 'MUser';

        $data['admin'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['lvluser'] = $data['admin']['level_id'];
        // $data['siswa'] = $this->User_model->getSiswa();
        $data['guru'] = $this->User_model->getGuru();
        $data['host'] = "http://$_SERVER[SERVER_NAME]/absensi_guru/assets/adminlte/";
        $data['mapel'] = $this->Mapel_model->getJadwalGuru();
        $nama = $data['admin']['nama'];
        date_default_timezone_set('Asia/Jakarta'); // Zona Waktu indonesia
        $jam = date('H:i:s');
        $tgl = date('Y-m-d');
        $ket = "Melihat Data Guru ";
        // echo '===================' . $nama;
        $insertLog = "INSERT INTO `log_aktivitas` (`id`, `nama`, `jam`, `tanggal`, `keterangan`) VALUES (NULL, '" . $nama . "', '" . $jam . "', '" . $tgl . "', '" . $ket . "')";
        $this->db->query($insertLog);

        $this->load->view('templates_sys/header', $data);
        $this->load->view('/templates_sys/topbar', $data);
        $this->load->view('/templates_sys/sidebar', $data);
        $this->load->view('administrator/data_guru', $data);
        $this->load->view('/templates_sys/footer');
    }

    function editdataGuru($id)
    {
        $data['title'] = 'Edit Data Guru';
        $data['active'] = 'MUser';

        $data['admin'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['lvluser'] = $data['admin']['level_id'];
        $data['guru'] = $this->User_model->getGuruId($id);
        // var_dump($data['guru']);
        $data['level'] = $this->db->get_where('level')->result_array();
        $data['host'] = "http://$_SERVER[SERVER_NAME]/absensi_guru/assets/adminlte/";

        $this->load->view('templates_sys/header', $data);
        $this->load->view('/templates_sys/topbar', $data);
        $this->load->view('/templates_sys/sidebar', $data);
        $this->load->view('administrator/editdata_guru', $data);
        $this->load->view('/templates_sys/footer');
    }
    public function dataSiswa()
    {
        $data['title'] = 'Data Siswa';
        $data['active'] = 'MUser';

        $data['sysuser'] = $this->db->get_where('sysuser', ['email' => $this->session->userdata('email')])->row_array();
        $data['lvluser'] = $data['sysuser']['level_id'];
        // $data['siswa'] = $this->User_model->getSiswa();
        $data['siswa'] = $this->User_model->getSiswa();
        $data['host'] = "http://$_SERVER[SERVER_NAME]/absensi_guru/assets/adminlte/";

        $nama = $data['sysuser']['nama'];
        date_default_timezone_set('Asia/Jakarta'); // Zona Waktu indonesia
        $jam = date('H:i:s');
        $tgl = date('Y-m-d');
        $ket = "Melihat Data Siswa ";
        // echo '===================' . $nama;
        $insertLog = "INSERT INTO `log_aktivitas` (`id`, `nama`, `jam`, `tanggal`, `keterangan`) VALUES (NULL, '" . $nama . "', '" . $jam . "', '" . $tgl . "', '" . $ket . "')";
        $this->db->query($insertLog);

        $this->load->view('templates_sys/header', $data);
        $this->load->view('/templates_sys/topbar', $data);
        $this->load->view('/templates_sys/sidebar', $data);
        $this->load->view('administrator/data_siswa', $data);
        $this->load->view('/templates_sys/footer');
    }

    function editdataSiswa($id)
    {
        $data['title'] = 'Edit Data Siswa';
        $data['active'] = 'MUser';

        $data['sysuser'] = $this->db->get_where('sysuser', ['email' => $this->session->userdata('email')])->row_array();
        $data['lvluser'] = $data['sysuser']['level_id'];
        // $data['siswa'] = $this->User_model->getSiswa();
        $data['siswa'] = $this->User_model->getSiswaId($id);
        $data['level'] = $this->db->get_where('level')->result_array();
        // var_dump($data['level']);
        $data['host'] = "http://$_SERVER[SERVER_NAME]/absensi_guru/assets/adminlte/";

        $this->load->view('templates_sys/header', $data);
        $this->load->view('/templates_sys/topbar', $data);
        $this->load->view('/templates_sys/sidebar', $data);
        $this->load->view('administrator/editdata_siswa', $data);
        $this->load->view('/templates_sys/footer');
    }

    function updateDataSiswa($kode)
    {
        $data['sysuser'] = $this->db->get_where('sysuser', ['email' => $this->session->userdata('email')])->row_array();
        $nama1 = $data['sysuser']['nama'];
        $type = $this->input->post('type');
        $nama = $this->input->post('nama');
        $nis = $this->input->post('nis');
        $tgl = $this->input->post('tgl_lahir');
        $tempat = $this->input->post('tempat_lahir');
        $alamat = $this->input->post('alamat');
        $status = $this->input->post('status');
        $kode = $this->input->post('kode');

        $data = array(
            'kode' => $kode,
            'nama' => $nama,
            'nis' => $nis,
            'tempat_lahir' => $tempat,
            'tgl_lahir' => $tgl,
            'alamat' => $alamat,
            'status' => $status
        );

        $this->db->where('kode', $kode);
        $this->db->update('siswa', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success text-left py-1" role="alert">✔️ Data ' . $nama . ' berhasi di edit!</div>');
        $ket = "Mengubah data siswa ";
        // $nama1 = $data['sysuser']['nama'];
        date_default_timezone_set('Asia/Jakarta'); // Zona Waktu indonesia
        $jam = date('H:i:s');
        $tgl = date('Y-m-d');
        // echo '===================' . $nama;
        // die();
        $insertLog = "INSERT INTO `log_aktivitas` (`id`, `nama`, `jam`, `tanggal`, `keterangan`) VALUES (NULL, '" . $nama1 . "', '" . $jam . "', '" . $tgl . "', '" . $ket . "')";
        $this->db->query($insertLog);
        redirect('user/dataSiswa');
    }
}
