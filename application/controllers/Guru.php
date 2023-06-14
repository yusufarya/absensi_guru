<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
    public function jadwal()
    {
        $data['title'] = 'Jadwal';
        $data['guru'] = $this->User_model->guruInfo();
        // $kelas = $data['siswa']['kelas'];
        // var_dump($data['siswa']);
        $data['mapel'] = $this->Mapel_model->getMapel();

        $this->load->view('templates/header', $data);
        $this->load->view('/templates/topbar');
        $this->load->view('jadwal', $data);
        $this->load->view('/templates/footer');
    }

    function getJadwal()
    {
        $id = $this->input->post('id_mapel');
        $dataMapel = $this->Mapel_model->getMapelId($id);

        if ($dataMapel) {
            $status = array('status' => 'success', 'data' => $dataMapel);
        } else {
            $status = array('status' => 'failed');
        }

        echo json_encode($status);
    }

    function kehadiran()
    {
        $data['title'] = 'Riwayat Absensi';
        
        $data['guru'] = $this->User_model->guruInfo();
        // print_r($data['siswa']);
        $data['kehadiran'] = $this->Kehadiran_model->getDataAbsen();

        // $kelas = $data['siswa']['kelas'];
        // var_dump($data['siswa']);
        $data['mapel'] = $this->Mapel_model->getMapel('');

        $this->load->view('templates/header', $data);
        $this->load->view('/templates/topbar');
        $this->load->view('kehadiran', $data);
        $this->load->view('/templates/footer');
    }
}
