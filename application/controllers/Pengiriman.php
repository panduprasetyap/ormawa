<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengiriman extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url', 'form');
    $this->load->model('Pengiriman_model');
    $this->load->library('form_validation');
  }

  public function index()
  {

    $data = $this->cariSurat();
    $data['title']        = 'Pengiriman';
    $data['user']         = $this->Pengiriman_model->getAllUser();
    $data['useruniv']     = $this->Pengiriman_model->getUserUniv();
    $data['userfakultas'] = $this->Pengiriman_model->getUserFakultas();
    $data['userprodi']    = $this->Pengiriman_model->getUserProdi();
    $data_user['user']    = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $data['status_surat'] = $this->Pengiriman_model->getAllStatusSurat();


    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data_user);
    $this->load->view('pengiriman/pengiriman_view', $data);
    $this->load->view('templates/footer', $data);
  }

  public function cariSurat()
  {
    // if (isset($_POST['submit'])) {
    $bulan = isset($_POST['bulan']) ? $_POST['bulan'] : false;
    if ($bulan) {
      // print_r($bulan);
      // exit();
      // periode bulan
      $data['surat_user'] = $this->Pengiriman_model->carisuratUser($bulan);
    } else {
      // semua data
      $data['surat_user'] = $this->Pengiriman_model->surat_user();
    }
    // }
    return $data;
  }
  // $date = date('F', strtotime($bulan));

  public function tambah()
  {
    $time = date("Y-m-d H:i:s");
    $id_status_surat  = $this->input->post('id_status_surat');
    $no_surat         = $this->input->post('no_surat');
    $tgl_pelaksanaan  = $this->input->post('tgl_pelaksanaan');
    $jam              = $this->input->post('jam');
    $keterangan       = $this->input->post('keterangan');
    $file_surat       = $_FILES['file_surat'];
    $id_pengirim      = getCurrentUser()->id_user;

    if ($file_surat = '') {
    } else {
      $config['upload_path']          = './assets/file';
      $config['allowed_types']        = 'jpg|pdf';
      $config['max_size']             = 2000;

      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('file_surat')) {
        // echo "Upload Gagal";
        // die();
      } else {
        $file_surat = $this->upload->data('file_name');
      }
    }
    $data = array(
      'id_status_surat' => $id_status_surat,
      'no_surat' => $no_surat,
      'tgl_pelaksanaan' => $tgl_pelaksanaan,
      'jam' => $jam,
      'keterangan' => $keterangan,
      'file_surat' => $file_surat,
      'id_pengirim' => $id_pengirim,
      'created_add' => $time
    );
    $this->Pengiriman_model->input_data($data, 'surat');
    $this->session->set_flashdata('flash', 'Ditambahkan');
    redirect('pengiriman/index');
  }

  public function hapus($id_surat)
  {
    $this->Pengiriman_model->hapus_data($id_surat);
    $this->session->set_flashdata('flash', 'Dihapus');
    redirect('pengiriman/index');
  }

  public function ubah($id_surat)
  {
    $data['title']        = 'Form Edit Surat';
    $data['surat']        = $this->Pengiriman_model->getSuratById($id_surat);
    $data_user['user']    = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $data['status_surat'] = $this->Pengiriman_model->getAllStatusSurat();
    $time                 = date("Y-m-d H:i:s");

    // $this->form_validation->set_rules('id_status_surat', 'ID Status Surat', 'required');
    $this->form_validation->set_rules('no_surat', 'No Surat', 'required');
    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data_user);
      $this->load->view('pengiriman/pengirimanUbah_view', $data);
      $this->load->view('templates/footer', $data);
    } else {
      $id_surat = $this->input->post('id_surat');
      $id_status_surat = $this->input->post('id_status_surat');
      $no_surat = $this->input->post('no_surat');
      $tgl_pelaksanaan = $this->input->post('tgl_pelaksanaan');
      $jam = $this->input->post('jam');
      $keterangan = $this->input->post('keterangan');

      //cek jika ada gambar yang mau diupload

      $upload_file = $_FILES['file_surat'];

      if ($upload_file) {
        $config['upload_path']          = './assets/file';
        $config['allowed_types']        = 'jpg|pdf';
        $config['max_size']             = 2000;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_surat')) {
          $new_file = $this->upload->data('file_name');
          $this->db->set('file_surat', $new_file);
        } else {
          echo $this->upload->display_errors();
        }
      }

      $this->db->set('id_status_surat', $id_status_surat);
      $this->db->set('no_surat', $no_surat);
      $this->db->set('tgl_pelaksanaan', $tgl_pelaksanaan);
      $this->db->set('jam', $jam);
      $this->db->set('keterangan', $keterangan);
      $this->db->set('modified_add', $time);
      $this->db->where('id_surat', $id_surat);
      $this->db->update('surat');

      $this->session->set_flashdata('flash', 'Diubah');
      redirect('pengiriman/index');
    }
  }

  public function detail($id_surat)
  {
    $data['title']      = 'Detail Data ';
    $data_user['user']  = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $data['surat']      = $this->Pengiriman_model->getSuratById($id_surat);

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar', $data_user);
    $this->load->view('pengiriman/pengirimanDetail_view', $data);
    $this->load->view('templates/footer', $data);
  }

  public function kirim()
  {
    $id_surat   = $this->input->post('id_surat');
    $id_tujuan  = $this->input->post('id_tujuan');

    $this->Pengiriman_model->kirim_surat($id_surat, $id_tujuan);
    $this->kirim_email($id_surat, $id_tujuan);
    $this->session->set_flashdata('flash', 'Dikirim');
    redirect('pengiriman');
  }

  public function kirim_email($id_surat, $id_tujuan)
  {
    $user               = $this->db->get_where('user', ['id_user' => $id_tujuan])->row_array();
    $data['surat']      = $this->db->get_where('surat', ['id_surat' => $id_surat])->row_array();
    $data['user_nama']  = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $user_email         = $user['email'];
    $data['user']       = $this->Pengiriman_model->getAllUser();
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
    $this->email->subject('Surat Masuk');
    //isi email
    $body = $this->load->view('pengiriman/email', $data, true);
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
  public function viewFile()
  {
    if (isset($_GET['id_surat'])) {
      $id_surat = $_GET['id_surat'];
      $file_surat = $this->pengiriman_model->getSuratById($id_surat);

      $fp = fopen($file_surat->path, "r");
      header("Cache-Control: maxage=1");
      header("Pragma: public");
      header("Content-type: application/pdf");
      header("Content-Disposition: inline; filename=" . $file_surat->filename . "");
      header("Content-Description: PHP Generated Data");
      header("Content-Transfer-Encoding: binary");
      header('Content-Length:' . filesize($file_surat->path));
      ob_clean();
      flush();
      while (!feof($fp)) {
        $buff = fread($fp, 1024);
        print $buff;
      }
      exit;
    }
  }
}
