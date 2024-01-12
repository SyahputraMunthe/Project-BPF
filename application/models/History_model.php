<?php
defined('BASEPATH') or exit('No direct script access allowed');
class History_model extends CI_Model
{
    public function getHistory()
    {
        // Ambil data histori pelanggan dari database dengan urutan yang paling terbaru di atas
        $this->db->order_by('created_at', $order);
        return $this->db->get('customer_history')->result_array();
    }
}
