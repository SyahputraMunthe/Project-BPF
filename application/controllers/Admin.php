<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->model('Customer_model');
    $this->load->model('Admin_model');
    $query = $this->db->get('customer');

}
public function index()
{
  //$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
  $data['Customer'] = $this->Customer_model->get();
  $this->load->view("layout/admin_header");
  $this->load->view("admin/vw_web_admin", $data);
  $this->load->view("layout/footer");
}

public function index_table()
{
  $data['judul'] = "Halaman Admin";
  //$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
  $data['Customer'] = $this->Customer_model->get();
  $this->load->view("layout/admin_header");
  $this->load->view("admin/vw_admin", $data);
  $this->load->view("layout/footer");
}
public function detail($id)
{
    $data['judul'] = "Detail Pelanggan";
    $data['customer'] = $this->Customer_model->getById($id);

    $this->load->view("layout/admin_header", $data);
    $this->load->view("Admin/vw_detail_admin", $data);
    $this->load->view("layout/footer");
}
public function hapus($id)
{
    $this->Customer_model->delete($id);
    redirect('admin/index_table');
}

public function tampilkan_foto($id)
{
    $customer = $this->Customer_model->getById($id);

    // Pastikan customer dan nama file foto tersedia
    if ($customer && $customer['gambar']) {
        $path = FCPATH . 'assets/img/customer/' . $customer['gambar'];

        // Periksa apakah file ada
        if (file_exists($path)) {
            // Tentukan tipe konten dan tampilkan file
            header('Content-Type: ' . mime_content_type($path));
            header('Content-Length: ' . filesize($path));
            readfile($path);
            exit;
        }
    }

    // Jika tidak ada foto atau terjadi kesalahan, tampilkan foto default atau pesan kesalahan
    $default_image_path = FCPATH . 'path/to/your/default/image.jpg';
    header('Content-Type: ' . mime_content_type($default_image_path));
    header('Content-Length: ' . filesize($default_image_path));
    readfile($default_image_path);
    exit;
}
public function confirm($id)
{
    $data['judul'] = "Konfirmasi Pelanggan";
    $data['customer'] = $this->Customer_model->getById($id);

    // Lakukan logika konfirmasi
    // Pindahkan data ke dalam tabel histori
    $this->Admin_model->confirm($id);

    // Redirect ke halaman tabel pelanggan atau halaman lain yang sesuai
    redirect('admin/index_table');
}
}