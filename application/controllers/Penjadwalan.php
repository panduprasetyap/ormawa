<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjadwalan extends CI_Controller
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

    $data = $this->filterSurat();
    $data['title']     = 'Penjadwalan Surat';
    $data['surat']     = $this->Pengiriman_model->getAllSurat();
    $data['user']      = $this->Pengiriman_model->getAllUser();
    $data_user['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $this->load->model('Penjadwalan_model', 'penjadwalan');
    // $data['jadwal_surat'] = $this->penjadwalan->jadwal_surat();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar', $data_user);
    $this->load->view('penjadwalan/penjadwalan_view', $data);
    $this->load->view('templates/footer', $data);
  }

  public function filterSurat()
  {
    $bulan = isset($_POST['bulan']) ? $_POST['bulan'] : false;
    if ($bulan) {
      $data['jadwal_surat'] = $this->Penjadwalan_model->viewjadwalSurat($bulan);
    } else {
      //semua data
      $data['jadwal_surat'] = $this->Penjadwalan_model->jadwal_surat();
    }
    return $data;
  }
  public function viewKalender($year = NULL, $month = NULL)
  {
    $data['title'] = 'Kalender Penjadwalan Surat';
    $data['user'] = $this->db->get_where('user', ['username' =>
    $this->session->userdata('username')])->row_array();

    $data['surat'] = $this->Penjadwalan_model->getcalender($year, $month);
    $this->load->view('penjadwalan/calender_view', $data);
  }

  public function detailakses($id_akses_surat)
  {
    $data['title'] = 'Detail Data ';
    $data_user['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $data['akses_surat'] = $this->Pengiriman_model->getAksesSuratById($id_akses_surat);
    $id_surat = $data['akses_surat']['id_surat'];
    $data['surat'] = $this->db->get_where('surat', ['id_surat' => $id_surat])->row_array();
    // $where = array('id_user_pengirim' => $id);
    // $data['akses_surat'] = $this->db->query("SELECT * FROM akses_surat WHERE id_user_pengirim='$id'")->result();
    // $this->form_validation->set_rules('nama', 'Full Name', 'required|trim');

    // if ($this->form_validation->run() == false) {
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar', $data_user);
    $this->load->view('penjadwalan/konfirmasisurat_view', $data);
    $this->load->view('templates/footer', $data);
    // } else {

    // }
  }

  public function konfirmasi($id_akses_surat)
  {
    $tgl_konfirmasi = getCurrentDate();
    $id_pengirim = $this->input->post('id_pengirim');
    $data['akses_surat'] = $this->Pengiriman_model->getAksesSuratById($id_akses_surat);
    $id_surat = $data['akses_surat']['id_surat'];
    $tgl_pelaksanaan = $this->db->get_where('surat', ['id_surat' => $id_surat])->row_array();
    $file_surat = $this->input->post('file_surat');
    // $id_pengirim = $_POST;
    // print_r($id_pengirim);
    // exit();
    // $id_pengirim = getCurrentUser()->id_user;
    // $id_akses_surat = $this->input->post('id_akses_surat');
    $this->input->post('tgl_konfirmasi');

    $this->db->set('tgl_konfirmasi', $tgl_konfirmasi);
    $this->db->where('id_akses_surat', $id_akses_surat);
    $this->db->update('akses_surat');

    $this->konfirmasi_email($id_pengirim, $tgl_pelaksanaan, $file_surat);
    $this->session->set_flashdata('flashkirim', 'Dikirim');
    redirect('penjadwalan');
  }

  public function konfirmasi_email($id_pengirim, $tgl_pelaksanaan, $file_surat)
  {
    $user = $this->db->get_where('akses_surat', ['id_user_pengirim' => $id_pengirim])->row_array();
    // $data = $this->db->get_where('surat', ['id_pengirim' => $id_pengirim])->row_array();
    $data_user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $data = $this->db->get_where('user', ['id_user' => $id_pengirim])->row_array();
    $user_email = $data['email'];

    // $data['user'] = $this->Pengiriman_model->getAllUser();
    // $data['surat'] = $this->Pengiriman_model->getAllSurat();
    // Konfigurasi email

    ini_set("SMTP", "smtp.gmail.com");
    ini_set("smtp_port", "465");
    ini_set('sendmail_from', 'ormawaunimma@gmail.com');

    $config = [
      'mailtype'  => 'html',
      'charset'   => 'utf-8',
      'protocol'  => 'smtp',
      'smtp_host' => 'smtp.gmail.com',
      'smtp_user' => 'ormawaunimma@gmail.com',  // Email gmail
      'smtp_pass'   => 'ormawa12345',  // Password gmail
      'smtp_crypto' => 'ssl',
      'smtp_port'   => 465,
      'crlf'    => "\r\n",
      'newline' => "\r\n"
    ];
    // Load library email dan konfigurasinya
    $this->load->library('email', $config);
    // Email dan nama pengirim
    $this->email->from('ormawaunimma@gmail.com', 'Ormawa');
    // Email penerima
    $this->email->to($user_email);
    // Subject email
    $this->email->subject('Surat Masuk Sudah Diterima');
    //isi email
    $data_view = array(
      'user' => $data_user,
      'tgl_pelaksanaan' => $tgl_pelaksanaan,
      'file_surat' => $file_surat
    );
    $body = $this->load->view('penjadwalan/emailkonfirmasi', $data_view, true);
    // Isi email
    $this->email->set_mailtype("html");
    $this->email->message($body);

    if ($this->email->send()) {
      return true;
    } else {
      echo $this->email->print_debugger();
      die;
    }
  }
}
