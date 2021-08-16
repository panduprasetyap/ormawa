<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
  }
  public function index()
  {
    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Ormawa Login';
      $this->load->view('auth/login', $data);
    } else {
      //validasi
      $this->_login();
    }
  }
  private function _login()
  {
    $this->load->library('session');
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $user = $this->db->get_where('user', ['username' => $username])->row_array();
    //jika usernya ada
    if ($user) {
      //cek password
      if (!password_verify($password, $user['password'])) {
        $data = [
          'id_user' => $user['id_user'],
          'username' => $user['username'],
          'id_status' => $user['id_status']
        ];
        $this->session->set_userdata($data);
        redirect('dashboard');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        <strong>Maaf</strong> Password Anda Salah</div');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
      <strong>Maaf</strong> Username Anda Belum Terdaftar</div');
      redirect('auth');
    }
  }
  public function logout()
  {
    $this->session->unset_userdata('username');

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    <strong>Selamat</strong> Anda Sudah Keluar</div');
    redirect('Auth');
  }
}
