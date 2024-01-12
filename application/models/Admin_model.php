<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin_model extends CI_Model
{
    //use HasFactory;
    protected $fillable = ['nama', 'foto', 'email','alamat'];
    public $table = 'customer';
    public $id  = 'customer.id';
    public function __construct()
    {
        parent::__construct();
    }
    public function get()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getById($id)
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->insert_id();
    }
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    public function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
    public function confirm($id)
    {
        // Dapatkan data pelanggan
        $customer = $this->getById($id);

        // Perbarui status menjadi 'Sukses'
        $this->db->where('id', $id);
        $this->db->update('customer', array('status' => 'Sukses'));

        // Masukkan ke dalam tabel histori
        $this->db->insert('customer_history', $customer);

        // Hapus data dari tabel pelanggan utama
        $this->delete($id);
    }
}
