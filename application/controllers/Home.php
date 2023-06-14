<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $cekSession = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        if ($cekSession == '') {
            redirect('Login');
        }
        $data['title'] = 'Home';

        $data['now'] = $this->hari_ini();
        $data['guru'] = $this->User_model->guruInfo(); 
        $data['no_absen'] = $data['guru']['no_absen']; 
        $data['mapel'] = $this->Mapel_model->getMapel(); 
        $data['cekH'] = $this->Mapel_model->cekHadir();

        $this->load->view('templates/header', $data);
        $this->load->view('/templates/topbar');
        $this->load->view('home', $data);
        $this->load->view('/templates/footer');
    }

    public function staff()
    {
        $cekSession = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        if ($cekSession == '') {
            redirect('Login');
        }
        $data['title'] = 'Home';

        $data['now'] = $this->hari_ini();
        $data['guru'] = $this->User_model->guruInfo(); 
        $data['no_absen'] = $data['guru']['no_absen']; 
        $data['mapel'] = $this->Mapel_model->getMapel(); 
        $data['cekH'] = $this->Mapel_model->cekHadir();

        $this->load->view('templates/header', $data);
        $this->load->view('/templates/topbar');
        $this->load->view('home', $data);
        $this->load->view('/templates/footer');
    }

    function hari_ini(){
        date_default_timezone_set('Asia/Jakarta');
        $hari = date ("D");
     
        switch($hari){
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
