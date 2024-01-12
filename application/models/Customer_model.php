<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer_model extends CI_Model
{
    private $table;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->table = 'customer'; // Inisialisasi nama tabel di sini
    }

    public function get()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function getById($id)
    {
        $this->db->from($this->table);
        $this->db->where('id', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null;
        }
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
    public function getHistory($order = 'DESC')
    {
        // Fetch customer history data from the database ordered by time
        $this->db->order_by('id', $order);
        return $this->db->get('history')->result_array();
    }

}
