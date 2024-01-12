<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('User_model', 'usermodel');
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('Customer');
        }
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'valid_email' => 'Email Harus Valid',
            'required' => 'Email Wajib di isi'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Password Wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/auth_header");
            $this->load->view("auth/login");
            $this->load->view("layout/auth_footer");
        } else {
            $this->cek_login();
        }
    }

    public function registrasi()
    {
        if ($this->session->userdata('email')) {
            redirect('Customer');
        }
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email ini sudah terdaftar!',
            'valid_email' => 'Email Harus Valid',
            'required' => 'Email Wajib di isi',
        ]);
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim|min_length[3]|matches[password_conf]',
            [
                'matches' => 'Password Tidak Sama',
                'min_length' => 'Password Terlalu Pendek',
                'required' => 'Password harus diisi',
            ]
        );
        $this->form_validation->set_rules('password_conf', 'Konfirmasi Password', 'required|trim|matches[password]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registration';
            $this->load->view('layout/auth_header', $data);
            $this->load->view('auth/registrasi');
            $this->load->view('layout/auth_footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role' => 'User',
                'date_created' => time()
            ];
            $this->usermodel->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat ! Akunmu telah berhasil terdaftar, Silahkan Login!. </div>');

            // Call cek_regis() method after registration
            $this->cek_regis();
        }
    }
    public function cek_regis()
    {
        $email = $this->input->post('email');
        $user = $this->usermodel->getby($email);

        if ($user) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akunmu telah berhasil terdaftar, Silahkan Login!</div>');
            redirect('auth');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Registrasi gagal! Terjadi kesalahan.</div>');
            redirect('auth');
        }
    }
    public function cek_login()
{
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    $user = $this->usermodel->getby($email);

    if ($user) {
        if (password_verify($password, $user['password'])) {
            $data = [
                'email' => $user['email'],
                'role' => $user['role'],
                'id' => $user['id']
            ];
            $this->session->set_userdata($data);

            if ($user['role'] == 'User') {
                redirect('Customer');
            } else {
                redirect('Admin');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah!</div>');
            redirect('Auth');
        }
    } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Belum Terdaftar!</div>');
        redirect('Auth');
    }
}
  public function logout()
  {
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('role');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil LogOut</div>');
    redirect('Auth');
  }
}