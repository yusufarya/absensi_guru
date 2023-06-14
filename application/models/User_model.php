<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
	function guruInfo() {
        $qry = "SELECT * FROM users 
                WHERE email = '".$this->session->userdata('email')."' ";
        $result = $this->db->query($qry)->row_array();
        return $result;
    }

    function getAdmin () {
    	$result = $this->db->select('*')
                ->from('users')->where('level_id ', 1)
                ->get()->result();
		return $result;
    }

    function getStaf () {
    	$result = $this->db->select('*')
                ->from('users')->where('level_id ', 2)
                ->get()->result();
		return $result;
    }

    function getUserId($id) {
        $qry = "SELECT us.*, l.level FROM users us
                JOIN `level` AS l ON l.id = us.level_id
                WHERE us.kode = '" . $id . "'";
        $query = $this->db->query($qry);
        $return = $query->row();
        
        return $return;
    }

    function getGuru () {
    	$result = $this->db->select('*')
                ->from('users')->where('level_id', 3)
                ->get()->result();
		return $result;
    }

    function getGuruId($id) {
        $qry = "SELECT gr.*, l.level FROM users gr
                JOIN level AS l ON l.id = gr.level_id
                WHERE gr.kode = '" . $id . "'";
        $query = $this->db->query($qry);
        $return = $query->row();
        // var_dump($qry); die();
        return $return;
    }
}