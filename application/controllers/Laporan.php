<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Pengiriman_model');
    $this->load->model('Laporan_model');
    $this->load->library('mypdf');
  }
  public function index()
  {
    $data = $this->filter();
    $data['title'] = 'Laporan';
    $data['user']  = $this->Pengiriman_model->getAllUser();
    $data['user']  = $this->db->get_where('user', ['username' =>
    $this->session->userdata('username')])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('laporan/laporan_view', $data);
    $this->load->view('templates/footer', $data);
  }

  public function filter()
  {
    if (isset($_GET['filter']) && !empty($_GET['filter'])) {
      $filter = $_GET['filter'];
      if ($filter == '1') {
        $tahun = $_GET['tahun'];
        $bulan = $_GET['bulan'];
        $date  = date('Y F', strtotime($tahun . '-' . $bulan));

        $ket = 'Laporan Surat Masuk Bulan ' . $date;
        $url_cetak = 'laporan/cetak?filter=1&bulan=' . $bulan . '&tahun=' . $tahun;
        $url_excel = 'laporan/excel?filter=1&bulan=' . $bulan . '&tahun=' . $tahun;
        $data['surat'] = $this->Laporan_model->laporanMasukbyMonth($bulan, $tahun);
      } else if ($filter == '2') {
        $tahun = $_GET['tahun'];
        $date = date('Y', strtotime($tahun));

        $ket = 'Laporan Surat Masuk Tahun ' . $tahun;
        $url_cetak = 'laporan/cetak?filter=2&tahun=' . $tahun;
        $url_excel = 'laporan/excel?filter=2&tahun=' . $tahun;
        $data['surat'] = $this->Laporan_model->laporanMasukbyYear($tahun);
      }
    } else {
      $ket = 'Semua Laporan Surat Masuk';
      $url_cetak = 'laporan/cetak';
      $url_excel = 'laporan/excel';
      $data['surat'] = $this->Laporan_model->LaporanAll();
    }

    $data['ket'] = $ket;
    $data['url_cetak'] = base_url($url_cetak);
    $data['url_excel'] = base_url($url_excel);

    return $data;
  }

  public function cetak()
  {
    if (isset($_GET['filter']) && !empty($_GET['filter'])) {
      $filter = $_GET['filter'];
      if ($filter == '1') {
        $tahun = $_GET['tahun'];
        $bulan = $_GET['bulan'];
        $date = date('Y F', strtotime($tahun . '-' . $bulan));

        $ket = 'Laporan Surat Masuk Bulan ' . $date;
        $data['surat'] = $this->Laporan_model->laporanMasukbyMonth($bulan, $tahun);
      } else if ($filter == '2') {
        $tahun = $_GET['tahun'];
        $date = date('Y', strtotime($tahun));

        $ket = 'Laporan Surat Masuk Tahun ' . $tahun;
        $data['surat'] = $this->Laporan_model->laporanMasukbyYear($tahun);
      }
    } else {
      $ket = 'Semua Laporan Surat Masuk';
      $data['surat'] = $this->Laporan_model->LaporanAll();
    }
    $data['ket'] = $ket;
    $data['user'] = $this->db->get_where('user', ['username' =>
    $this->session->userdata('username')])->row_array();

    $this->mypdf->generate('Laporan/printData', $data, 'laporan-surat', 'A4', 'portrait');
  }

  public function excel()
  {
    if (isset($_GET['filter']) && !empty($_GET['filter'])) {
      $filter = $_GET['filter'];
      if ($filter == '1') {
        $tahun = $_GET['tahun'];
        $bulan = $_GET['bulan'];
        $date = date('Y F', strtotime($tahun . '-' . $bulan));

        $ket = 'Laporan Surat Masuk Bulan ' . $date;
        $data['surat'] = $this->Laporan_model->laporanMasukbyMonth($bulan, $tahun);
      } else if ($filter == '2') {
        $tahun = $_GET['tahun'];
        $date = date('Y', strtotime($tahun));

        $ket = 'Laporan Surat Masuk Tahun ' . $tahun;
        $data['surat'] = $this->Laporan_model->laporanMasukbyYear($tahun);
      }
    } else {
      $ket = 'Semua Laporan Surat Masuk';
      $data['surat'] = $this->Laporan_model->LaporanAll();
    }
    $data['ket'] = $ket;

    require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
    require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

    $object = new PHPExcel();

    $object->getProperties()->setCreator("Ormawa Mail");
    $object->getProperties()->setLastModifiedBy("Ormawa Mail");
    $object->getProperties()->setTitle("Laporan Surat Masuk");

    $object->setActiveSheetIndex(0);

    $object->getActiveSheet()->setCellValue('A1', 'Data Surat Masuk');
    $object->getActiveSheet()->setCellValue('B2', 'Nomer');
    $object->getActiveSheet()->setCellValue('C2', 'Jenis Surat');
    $object->getActiveSheet()->setCellValue('D2', 'No Surat');
    $object->getActiveSheet()->setCellValue('E2', 'Tanggal Pelaksanaan');
    $object->getActiveSheet()->setCellValue('F2', 'Jam');
    $object->getActiveSheet()->setCellValue('G2', 'Keterangan');

    $baris = 3;
    $no = 1;

    foreach ($data['surat'] as $srt) {
      $object->getActiveSheet()->setCellValue('B' . $baris, $no++);
      $object->getActiveSheet()->setCellValue('C' . $baris, $srt['nama_status_surat']);
      $object->getActiveSheet()->setCellValue('D' . $baris, $srt['no_surat']);
      $object->getActiveSheet()->setCellValue('E' . $baris, $srt['tgl_pelaksanaan']);
      $object->getActiveSheet()->setCellValue('F' . $baris, $srt['jam']);
      $object->getActiveSheet()->setCellValue('G' . $baris, $srt['keterangan']);

      $baris++;
    }

    $object->getActiveSheet()->getColumnDimension('B')->setWidth(5);
    $object->getActiveSheet()->getColumnDimension('C')->setWidth(15);
    $object->getActiveSheet()->getColumnDimension('D')->setWidth(25);
    $object->getActiveSheet()->getColumnDimension('E')->setWidth(15);
    $object->getActiveSheet()->getColumnDimension('F')->setWidth(10);
    $object->getActiveSheet()->getColumnDimension('G')->setWidth(25);

    //merging Title
    $object->getActiveSheet()->mergeCells('A1:G1');
    //aligning
    $object->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal('center');
    //styling
    $object->getActiveSheet()->getStyle('A1')->applyFromArray(
      array(
        'font' => array(
          'size' => 24,
        )
      )
    );
    $object->getActiveSheet()->getStyle('B2:G2')->applyFromArray(
      array(
        'font' => array(
          'bold' => true
        ),
        'borders' => array(
          'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN
          )
        )
      )
    );
    //give border to data
    $object->getActiveSheet()->getStyle('B3:G' . ($baris - 1))->applyFromArray(
      array(
        'borders' => array(
          'outline' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN
          ),
          'vertical' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN
          )
        )
      )
    );

    $filename = "Data_Surat_Masuk" . '.xlsx';

    $object->getActiveSheet()->setTitle("Data Surat Masuk");

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    header('Cache-Control: max-age=0');

    $writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
    $writer->save('php://output');

    exit;
  }
  /// SURAT KELUAR

  public function indexkeluar()
  {
    $data = $this->filterkeluar();
    $data['title'] = 'Laporan Surat Keluar';
    $data['user']  = $this->Pengiriman_model->getAllUser();
    $data['user']  = $this->db->get_where('user', ['username' =>
    $this->session->userdata('username')])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('laporan/laporanKeluar_view', $data);
    $this->load->view('templates/footer', $data);
  }

  public function filterkeluar()
  {
    if (isset($_GET['filterkeluar']) && !empty($_GET['filterkeluar'])) {
      $filter = $_GET['filterkeluar'];
      if ($filter == '1') {
        $tahun = $_GET['tahun'];
        $bulan = $_GET['bulan'];
        $date = date('Y F', strtotime($tahun . '-' . $bulan));

        $ket = 'Laporan Surat Keluar Bulan ' . $date;
        $url_cetak = 'laporan/cetakkeluar?filter=1&bulan=' . $bulan . '&tahun=' . $tahun;
        $url_excel = 'laporan/excelkeluar?filter=1&bulan=' . $bulan . '&tahun=' . $tahun;
        $data['surat'] = $this->Laporan_model->laporanKeluarbyMonth($bulan, $tahun);
      } else if ($filter == '2') {
        $tahun = $_GET['tahun'];
        $date = date('Y', strtotime($tahun));

        $ket = 'Laporan Surat Keluar Tahun ' . $tahun;
        $url_cetak = 'laporan/cetakkeluar?filter=2&tahun=' . $tahun;
        $url_excel = 'laporan/excelkeluar?filter=2&tahun=' . $tahun;
        $data['surat'] = $this->Laporan_model->laporanKeluarbyYear($tahun);
      }
    } else {
      $ket = 'Semua Laporan Surat Keluar';
      $url_cetak = 'laporan/cetakkeluar';
      $url_excel = 'laporan/excelkeluar';
      $data['surat'] = $this->Laporan_model->LaporanKeluarAll();
    }

    $data['ket'] = $ket;
    $data['url_cetak'] = base_url($url_cetak);
    $data['url_excel'] = base_url($url_excel);

    return $data;
  }
  public function cetakkeluar()
  {
    if (isset($_GET['filterkeluar']) && !empty($_GET['filterkeluar'])) {
      $filter = $_GET['filterkeluar'];
      if ($filter == '1') {
        $tahun = $_GET['tahun'];
        $bulan = $_GET['bulan'];
        $date = date('Y F', strtotime($tahun . '-' . $bulan));

        $ket = 'Laporan Surat Keluar Bulan ' . $date;
        $data['surat'] = $this->Laporan_model->laporanKeluarbyMonth($bulan, $tahun);
      } else if ($filter == '2') {
        $tahun = $_GET['tahun'];
        $date = date('Y', strtotime($tahun));

        $ket = 'Laporan Surat Keluar Tahun ' . $tahun;
        $data['surat'] = $this->Laporan_model->laporanKeluarbyYear($tahun);
      }
    } else {
      $ket = 'Semua Laporan Surat Keluar';
      $data['surat'] = $this->Laporan_model->LaporanKeluarAll();
    }
    $data['user'] = $this->db->get_where('user', ['username' =>
    $this->session->userdata('username')])->row_array();
    $data['ket'] = $ket;

    $this->mypdf->generate('Laporan/printDataKeluar', $data, 'laporan-surat', 'A4', 'portrait');
  }
  public function excelkeluar()
  {
    if (isset($_GET['filter']) && !empty($_GET['filter'])) {
      $filter = $_GET['filter'];
      if ($filter == '1') {
        $tahun = $_GET['tahun'];
        $bulan = $_GET['bulan'];
        $date = date('Y F', strtotime($tahun . '-' . $bulan));

        $ket = 'Laporan Surat Keluar Bulan ' . $date;
        $data['surat'] = $this->Laporan_model->laporanKeluarbyMonth($bulan, $tahun);
      } else if ($filter == '2') {
        $tahun = $_GET['tahun'];
        $date = date('Y', strtotime($tahun));

        $ket = 'Laporan Surat Keluar Tahun ' . $tahun;
        $data['surat'] = $this->Laporan_model->laporanKeluarbyYear($tahun);
      }
    } else {
      $ket = 'Semua Laporan Keluar Masuk';
      $data['surat'] = $this->Laporan_model->LaporanKeluarAll();
    }
    $data['ket'] = $ket;

    require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
    require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

    $object = new PHPExcel();

    $object->getProperties()->setCreator("Ormawa Mail");
    $object->getProperties()->setLastModifiedBy("Ormawa Mail");
    $object->getProperties()->setTitle("Laporan Surat Keluar");

    $object->setActiveSheetIndex(0);

    $object->getActiveSheet()->setCellValue('A1', 'Data Surat Masuk');
    $object->getActiveSheet()->setCellValue('B2', 'Nomer');
    $object->getActiveSheet()->setCellValue('C2', 'Jenis Surat');
    $object->getActiveSheet()->setCellValue('D2', 'No Surat');
    $object->getActiveSheet()->setCellValue('E2', 'Tanggal Pelaksanaan');
    $object->getActiveSheet()->setCellValue('F2', 'Jam');
    $object->getActiveSheet()->setCellValue('G2', 'Keterangan');

    $baris = 3;
    $no = 1;

    foreach ($data['surat'] as $srt) {
      $object->getActiveSheet()->setCellValue('B' . $baris, $no++);
      $object->getActiveSheet()->setCellValue('C' . $baris, $srt['nama_status_surat']);
      $object->getActiveSheet()->setCellValue('D' . $baris, $srt['no_surat']);
      $object->getActiveSheet()->setCellValue('E' . $baris, $srt['tgl_pelaksanaan']);
      $object->getActiveSheet()->setCellValue('F' . $baris, $srt['jam']);
      $object->getActiveSheet()->setCellValue('G' . $baris, $srt['keterangan']);

      $baris++;
    }

    $object->getActiveSheet()->getColumnDimension('B')->setWidth(5);
    $object->getActiveSheet()->getColumnDimension('C')->setWidth(15);
    $object->getActiveSheet()->getColumnDimension('D')->setWidth(25);
    $object->getActiveSheet()->getColumnDimension('E')->setWidth(15);
    $object->getActiveSheet()->getColumnDimension('F')->setWidth(10);
    $object->getActiveSheet()->getColumnDimension('G')->setWidth(25);

    //merging Title
    $object->getActiveSheet()->mergeCells('A1:G1');
    //aligning
    $object->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal('center');
    //styling
    $object->getActiveSheet()->getStyle('A1')->applyFromArray(
      array(
        'font' => array(
          'size' => 24,
        )
      )
    );
    $object->getActiveSheet()->getStyle('B2:G2')->applyFromArray(
      array(
        'font' => array(
          'bold' => true
        ),
        'borders' => array(
          'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN
          )
        )
      )
    );
    //give border to data
    $object->getActiveSheet()->getStyle('B3:G' . ($baris - 1))->applyFromArray(
      array(
        'borders' => array(
          'outline' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN
          ),
          'vertical' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN
          )
        )
      )
    );

    $filename = "Data_Surat_Keluar" . '.xlsx';

    $object->getActiveSheet()->setTitle("Data Surat Keluar");

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    header('Cache-Control: max-age=0');

    $writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
    $writer->save('php://output');

    exit;
  }
}
