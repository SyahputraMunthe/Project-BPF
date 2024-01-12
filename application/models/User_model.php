<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getby($email)
    {
        $query = $this->db->get_where('user', array('email' => $email));
        return $query->row_array();
    }

    public function insert($data)
    {
        $this->db->insert('user', $data);
        return $this->db->insert_id();
    }
}
