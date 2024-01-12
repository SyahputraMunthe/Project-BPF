<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('User_model', 'user_model');
    }

    public function index()
{
    // Periksa apakah pengguna sudah login
    if (!$this->session->userdata('email')) {
        redirect('auth'); // Redirect ke halaman login jika belum login
    }

    // Ambil informasi pengguna berdasarkan email
    $email = $this->session->userdata('email');
    $user = $this->user_model->getby($email);

    if ($user) {
        $data['title'] = 'Profil Pengguna';
        $data['user'] = $user;

        // Cek peran (role) pengguna
        if ($user['role'] == 'User') {
           // Jika user, tampilkan halaman profil user
           $this->session->set_userdata('role', 'User'); // Set session role
           $this->load->view('layout/header');
           $this->load->view('profil/vw_user_profile', $data);
           $this->load->view('layout/footer');
        } else {
            // Jika admin, tampilkan halaman profil admin
            $this->session->set_userdata('role', 'Admin'); // Set session role
            $this->load->view('layout/admin_header');
            $this->load->view('profil/vw_admin_profile', $data);
            $this->load->view('layout/footer');
        }
    } else {
        // Handle jika data pengguna tidak ditemukan
        $this->session->set_flashdata('message', 'Data pengguna tidak ditemukan.');
        redirect('auth');
    }
}
}