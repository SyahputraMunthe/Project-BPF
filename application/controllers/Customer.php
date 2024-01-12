<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Customer_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {
        $data['judul'] = "Halaman Utama";
        $data['customer'] = $this->Customer_model->get();
        $this->load->view("layout/header", $data);
        $this->load->view("customer/vw_customer", $data);
        $this->load->view("layout/footer");
    }
    
    public function tambah()
    {
        $data['judul'] = "Halaman Pengajuan Nota";
        $this->load->view("layout/header", $data);
        $this->load->view("customer/vw_tambah_customer", $data);
        $this->load->view("layout/footer");
    }

    public function proses_tambah()
    {
        $gambar = $this->upload_gambar();
        if ($gambar) {
            $data = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'no_hp' => $this->input->post('no_hp'),
                'gambar' => $gambar, // Simpan nama file ke database
                'alamat' => $this->input->post('alamat'),
                'transfer' => $this->input->post('transfer'),
            ];

            $insert_id = $this->Customer_model->insert($data);

        if ($insert_id) {
            $this->session->set_flashdata('success_message', 'Pengajuan berhasil! Tunggu dalam 5 menit lagi, kemudian cek e-wallet Anda.');
            redirect('customer/index');
        } else {
            $this->session->set_flashdata('error_message', 'Gagal menambahkan data ke database.');
            redirect('customer/tambah');
        }
    } else {
        $this->session->set_flashdata('error_message', $this->upload->display_errors());
        redirect('customer/tambah');
    }
}

    private function upload_gambar()
{
    $config['upload_path'] = 'assets/img/customer';
    $config['allowed_types'] = 'gif|jpg|jpeg|png';
    $config['max_size'] = 10000; // 1 MB
    $config['file_name'] = uniqid() . '_' . time(); // Unique file name

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('gambar')) {
        // Jika upload berhasil, ambil nama file
        return $this->upload->data('file_name');
    } else {
        // Jika upload gagal, set pesan error
        $error = $this->upload->display_errors();
        error_log($error); // Tambahkan baris ini untuk mencetak pesan error ke log server
        $this->form_validation->set_message('upload_gambar', $error);
        return false;
    }
}
    public function hapus($id)
    {
        $this->Customer_model->delete($id);
        redirect('admin');
    }
    public function history()
{
    $data['judul'] = "Histori Pelanggan";
    $data['Customer'] = $this->Customer_model->getHistory(); // Gantilah dengan metode yang sesuai di model Anda

    $this->load->view("layout/header", $data);
    $this->load->view("customer/vw_histrory_customer", $data); // Sesuaikan dengan nama view yang sesuai
    $this->load->view("layout/footer");
}
}