<?php

class Datasurat_model extends CI_model
{

  public function getAksesSurat()
  {
    return $query = $this->db->get('akses_surat')->result_array();
  }


  public function surat_masukPagin($limit = false, $start = false, $keyword = false)
  {

    $id_penerima = getCurrentUser()->id_user;

    if ($keyword) {
      $this->db->like('surat.keterangan', $keyword);
      $this->db->or_like('surat.tgl_pelaksanaan', $keyword);
    }

    $this->db->select('status_surat.nama_status_surat, surat.id_status_surat, surat.no_surat, surat.tgl_pelaksanaan, surat.jam , surat.keterangan, surat.file_surat');
    $this->db->from('surat');
    $this->db->join('status_surat', 'surat.id_status_surat = status_surat.id_status_surat');
    $this->db->join('akses_surat', 'surat.id_surat = akses_surat.id_surat');
    $this->db->where('akses_surat.id_user_penerima', $id_penerima);

    if ($limit) {
      $this->db->limit($limit, $start);
    }

    $query = $this->db->get()->result_array();
    return $query;
  }

  public function surat_keluarPagin($limit = false, $start = false, $keyword = false)
  {
    $id_pengirim = getCurrentUser()->id_user;

    if ($keyword) {
      $this->db->like('surat.keterangan', $keyword);
      $this->db->or_like('surat.tgl_pelaksanaan', $keyword);
    }

    $this->db->select('status_surat.id_status_surat, status_surat.nama_status_surat , surat.no_surat, surat.tgl_pelaksanaan, surat.jam , surat.keterangan, surat.file_surat');
    $this->db->from('surat');
    $this->db->join('status_surat', 'surat.id_status_surat = status_surat.id_status_surat');
    $this->db->where('id_pengirim', $id_pengirim);

    if ($limit) {
      $this->db->limit($limit, $start);
    }

    $query = $this->db->get()->result_array();
    return $query;
  }
}
