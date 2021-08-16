<?php

class Pengiriman_model extends CI_model
{
  public function jumlah_user()
  {
    $this->db->select('*');
    $this->db->from('user');
    return $this->db->get()->num_rows();
  }
  public function jumlah_masuk()
  {
    $id_penerima = getCurrentUser()->id_user;

    $query = "SELECT `surat`.`id_status_surat`, `surat`.`no_surat`, `surat`.`tgl_pelaksanaan`, `surat`.`jam` , `surat`.`keterangan`, `surat`.`file_surat`
    FROM `surat` 
    JOIN `akses_surat`
    ON `surat`.`id_surat` = `akses_surat`.`id_surat`
    WHERE `akses_surat`.`id_user_penerima` = '$id_penerima'";

    return $this->db->query($query)->num_rows();
  }
  public function jumlah_keluar()
  {
    $id_pengirim = getCurrentUser()->id_user;

    $query = "SELECT *
    FROM `surat` 
    WHERE `id_pengirim` = '$id_pengirim'";

    return $this->db->query($query)->num_rows();
  }

  public function jumlah_jadwal()
  {
    $id_penerima = getCurrentUser()->id_user;


    $query = "SELECT `surat`.`id_surat`, `surat`.`id_status_surat`, `surat`.`no_surat`, `surat`.`tgl_pelaksanaan`, `surat`.`jam` , `surat`.`keterangan`, `surat`.`file_surat`, `akses_surat`.`id_user_penerima`, `akses_surat`.`total_bobot_prioritas` 
    FROM `surat` 
    JOIN `akses_surat` 
    ON `surat`.`id_surat` = `akses_surat`.`id_surat` 
    WHERE `akses_surat`.`id_user_penerima` = '$id_penerima' ORDER BY concat (`tgl_pelaksanaan`, `jam`) asc, `total_bobot_prioritas` desc";

    return $this->db->query($query)->num_rows();
  }

  public function getAllSurat()
  {
    return $query = $this->db->get('surat')->result_array();
  }
  public function getAllUser()
  {
    return $query = $this->db->get('user')->result_array();
  }
  public function getUserUniv()
  {
    $query = "SELECT *
    FROM `user` 
    WHERE `id_status` = 'T1'";
    return $this->db->query($query)->result_array();
  }
  public function getUserFakultas()
  {
    $query = "SELECT *
    FROM `user` 
    WHERE `id_status` = 'T2'";
    return $this->db->query($query)->result_array();
  }
  public function getUserProdi()
  {
    $query = "SELECT *
    FROM `user` 
    WHERE `id_status` = 'T3'";
    return $this->db->query($query)->result_array();
  }
  public function alluser($limit, $start)
  {
    return $this->db->get('user', $limit, $start)->result_array();
  }
  public function countAllUser()
  {
    return $this->db->get('user')->num_rows();
  }
  public function getAllStatusSurat()
  {
    return $query = $this->db->get('status_surat')->result_array();
  }
  public function input_data($data, $table)
  {
    return $this->db->insert($table, $data);
  }
  public function surat_user()
  {
    $id_pengirim = getCurrentUser()->id_user;
    $bulan = date('m');


    $query = "SELECT `status_surat`.`nama_status_surat` ,`surat`.`id_surat`, `surat`.`id_status_surat`, `surat`.`no_surat`, `surat`.`tgl_pelaksanaan`, `surat`.`jam` , `surat`.`keterangan`, `surat`.`file_surat`
    FROM `surat` 
    JOIN `status_surat`
    ON `surat`.`id_status_surat` = status_surat.`id_status_surat`
    WHERE `id_pengirim` = '$id_pengirim' AND month(`created_add`)='$bulan' ORDER BY `created_add` asc";

   

    return $this->db->query($query)->result_array();
    
  }

  public function carisuratUser($bulan)
  {
    $id_pengirim = getCurrentUser()->id_user;


    $query = "SELECT `status_surat`.`nama_status_surat` ,`surat`.`id_surat`, `surat`.`id_status_surat`, `surat`.`no_surat`, `surat`.`tgl_pelaksanaan`, `surat`.`jam` , `surat`.`keterangan`, `surat`.`file_surat`
    FROM `surat` 
    JOIN `status_surat`
    ON `surat`.`id_status_surat` = status_surat.`id_status_surat`
    WHERE `id_pengirim` = '$id_pengirim' AND month(`created_add`)='$bulan'";
    // print_r($query);
    // exit();

    return $this->db->query($query)->result_array();
  }

  public function hapus_data($id_surat)
  {
    $this->db->delete('surat', ['id_surat' => $id_surat]);
  }
  public function getSuratById($id_surat)
  {
    return $this->db->get_where('surat', ['id_surat' => $id_surat])->row_array();
  }
  public function getUserById($id_user)
  {
    return $this->db->get_where('user', ['id_user' => $id_user])->row_array();
  }
  public function getAksesSuratById($id_akses_surat)
  {
    return $this->db->get_where('akses_surat', ['id_akses_surat' => $id_akses_surat])->row_array();
  }
  public function ubah_surat()
  {
    $data = [
      "id_status_surat" => $this->input->post('id_status_surat', true),
      "no_surat" => $this->input->post('no_surat', true),
      "tgl_pelaksanaan" => $this->input->post('tgl_pelaksanaan', true),
      "jam" => $this->input->post('jam', true),
      "keterangan" => $this->input->post('keterangan', true)
    ];
    $this->db->where('id_surat', $this->input->post('id_surat'));
    $this->db->update('surat', $data);
  }

  public function getBobot($id_status_surat, $id_status_user)
  {

    $prioritas_surat = getPrioritasSurat($id_status_surat);
    $prioritas_user = getPrioritasUser($id_status_user);

    $jumlah_prioritas = $prioritas_surat + $prioritas_user;

    return $jumlah_prioritas;
  }

  public function kirim_surat($id_surat, $id_tujuan)
  {

    $id_pengirim = getCurrentUser()->id_user;
    $tgl_pengiriman = getCurrentDate();

    $data_surat = $this->getSuratById($id_surat);
    $data_user = $this->getUserById($id_pengirim);
    $id_status_surat = $data_surat['id_status_surat'];
    $id_status_user = $data_user['id_status'];
    $bobot_surat = $this->getBobot($id_status_surat, $id_status_user);

    $data = array(
      'id_surat' => $id_surat,
      'id_user_pengirim' => $id_pengirim,
      'id_user_penerima' => $id_tujuan,
      'tgl_pengiriman' => $tgl_pengiriman,
      'keterangan'    => $data_surat['keterangan'],
      'total_bobot_prioritas' => $bobot_surat
    );
    $this->db->insert('akses_surat', $data);
  }
  public function cari()
  {
    $keyword = $this->input->post('keyword', true);
    $this->db->like('id_status_surat', $keyword);
    return $this->db->get('surat')->result_array();
  }
}
