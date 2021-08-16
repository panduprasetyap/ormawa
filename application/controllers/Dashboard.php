<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url', 'form');
    $this->load->model('Pengiriman_model');
    $this->load->model('Penjadwalan_model');
  }
  public function index()
  {
    $data['title']      = 'Dashboard';
    $data_user['user']  = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $data['user_nama']  = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    //  $data['user'] = $this->Pengiriman_model->getAllUser();

    $this->load->model('Penjadwalan_model', 'penjadwalan');
    $jadwalsurat     = $this->get_notif_surat();

    $this->load->library('pagination');

    $config['total_rows'] = $this->Pengiriman_model->countAllUser();
    $data['total_rows']   = $config['total_rows'];
    $config['per_page']   = 5;
    $config['base_url']   = 'http://localhost/ormawa/dashboard/index';
    //style

    //initialize
    $this->pagination->initialize($config);


    $data['start'] = $this->uri->segment(3);

    $data['user']  = $this->Pengiriman_model->alluser($config['per_page'], $data['start']);
    // echo '<pre>';
    // print_r($jadwalsurat);
    // exit();
    //data dashboard
    $data['jumlah_user']         = $this->Pengiriman_model->jumlah_user();
    $data['total_surat_masuk']   = $this->Pengiriman_model->jumlah_masuk();
    $data['total_surat_keluar']  = $this->Pengiriman_model->jumlah_keluar();
    $data['jumlah_jadwal']       = $this->Pengiriman_model->jumlah_jadwal();

    $data['nextjadwal'] = !empty($jadwalsurat) ? $jadwalsurat : false;

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data_user);
    $this->load->view('dashboard/index', $data);
    $this->load->view('templates/footer', $data);
  }
  public function edit($id_user)
  {
    $data['title'] = 'Edit Profile';
    $data_user['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
    $data['user_nama'] = $this->Pengiriman_model->getUserById($id_user);
    // $data['user_nama'] = $this->db->get_where('user', ['username' =>
    // $this->session->userdata('username')])->row_array();


    $this->form_validation->set_rules('nama', 'Full Name', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data_user);
      $this->load->view('dashboard/edit', $data);
      $this->load->view('templates/footer', $data);
    } else {
      // $id_user = $this->input->post('id_user');
      $nama = $this->input->post('nama');
      $email = $this->input->post('email');

      //cek jika ada gambar yang mau diupload

      $upload_image = $_FILES['foto'];

      if ($upload_image) {
        $config['upload_path']   = './assets/img/profile/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 2000;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
          $new_image = $this->upload->data('file_name');
          $this->db->set('foto', $new_image);
        } else {
          echo $this->upload->display_errors();
        }
      }
      $this->db->set('nama', $nama);
      $this->db->set('email', $email);
      $this->db->where('id_user', $id_user);
      $this->db->update('user');

      $this->session->set_flashdata('flashUser', 'Diubah');
      redirect('dashboard/index');
    }
  }

  protected function get_notif_surat()
  {
    $jadwal = $this->penjadwalan->jadwal_surat();
    $result = false;

    foreach ($jadwal as $key => $surat) {
      $date = $surat['tgl_pelaksanaan'];
      $time = $surat['jam'];
      $date_time = $date . ' ' . $time;

      if ($date_time > getCurrentDate()) {
        $result = $jadwal[$key];
        break;
      }
    }

    return $result;
  }
}
