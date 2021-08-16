<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datasurat extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Pengiriman_model');
    $this->load->model('Datasurat_model');
  }
  public function index()
  {
    $data['title'] = 'Data Surat';
    $data['surat'] = $this->Pengiriman_model->getAllSurat();
    $data['user'] = $this->Pengiriman_model->getAllUser();
    $data_user['user'] = $this->db->get_where('user', ['username' =>
    $this->session->userdata('username')])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar', $data_user);
    $this->load->view('datasurat/datasurat_view', $data);
    $this->load->view('templates/footer');
  }

  public function view_SuratMasuk()
  {
    $data['title']    = 'Data Surat Masuk';
    $data['surat']    = $this->Pengiriman_model->getAllSurat();
    $data['user']     = $this->Pengiriman_model->getAllUser();
    $data['keyword']  = false;
    $limit            = 5;

    $data_user['user'] = $this->db->get_where('user', ['username' =>
    $this->session->userdata('username')])->row_array();

    $this->load->model('Datasurat_model', 'datasurat');
    //PAGINATION
    $this->load->library('pagination');

    //ambil data keyword

    if (!empty($this->input->post('keyword'))) {
      $keyword =  $this->input->post('keyword');
      redirect('datasurat/view_SuratMasuk' . '/?keyword=' . $keyword);
    }

    $total_surat = count($this->datasurat->surat_masukPagin());

    if (isset($_GET['keyword']) && !empty($_GET['keyword'])) {
      $data['keyword']  = $_GET['keyword'];
      $total_surat      = count($this->datasurat->surat_masukPagin(false, false, $data['keyword']));
    }

    $data['start'] = empty($this->uri->segment(3)) ? 0 : $this->uri->segment(3);
    $data_surat    = $this->datasurat->surat_masukPagin($limit, $data['start'], $data['keyword']);

    //config


    $config['total_rows']         = $total_surat;
    $config['per_page']           = $limit;
    $config['reuse_query_string'] = true;
    $config['base_url']           = 'http://localhost/ormawa/datasurat/view_SuratMasuk';

    //initialize
    $this->pagination->initialize($config);


    $data['suratmasuk'] = $data_surat;
    $data['total_rows'] = $total_surat;

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar', $data_user);
    $this->load->view('datasurat/datasurat_view', $data);
    $this->load->view('datasurat/suratmasuk_view', $data);
    $this->load->view('templates/footer');
  }
  public function view_SuratKeluar()
  {
    $data['title']      = 'Data Surat Keluar';
    $data['surat']      = $this->Pengiriman_model->getAllSurat();
    $data['user']       = $this->Pengiriman_model->getAllUser();
    $data['keyword']    = false;
    $limit              = 5;

    $data_user['user']  = $this->db->get_where('user', ['username' =>
    $this->session->userdata('username')])->row_array();

    $this->load->model('Datasurat_model', 'datasurat');

    //PAGINATION
    $this->load->library('pagination');

    if (!empty($this->input->post('keyword'))) {
      $keyword =  $this->input->post('keyword');
      redirect('datasurat/view_SuratKeluar' . '/?keyword=' . $keyword);
    }

    $total_surat = count($this->datasurat->surat_keluarPagin());

    if (isset($_GET['keyword']) && !empty($_GET['keyword'])) {
      $data['keyword']  = $_GET['keyword'];
      $total_surat      = count($this->datasurat->surat_keluarPagin(false, false, $data['keyword']));
    }

    $data['start'] = empty($this->uri->segment(3)) ? 0 : $this->uri->segment(3);
    $data_surat    = $this->datasurat->surat_keluarPagin($limit, $data['start'], $data['keyword']);

    //config

    $config['total_rows']         = $total_surat;
    $config['per_page']           = $limit;
    $config['reuse_query_string'] = true;
    $config['base_url']           = 'http://localhost/ormawa/datasurat/view_SuratKeluar';
    //styles

    //initialize
    $this->pagination->initialize($config);

    $data['total_rows']   = $total_surat;
    $data['suratkeluar']  = $data_surat;

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar', $data_user);
    $this->load->view('datasurat/datasurat_view', $data);
    $this->load->view('datasurat/suratkeluar_view', $data);
    $this->load->view('templates/footer');
  }
}
