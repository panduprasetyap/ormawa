<?php
class Laporan_model extends CI_model
{
  public function LaporanAll()
  {
    $id_penerima = getCurrentUser()->id_user;

    $query = "SELECT `surat`.`id_status_surat`, `status_surat`.`nama_status_surat`, `surat`.`no_surat`, `surat`.`tgl_pelaksanaan`, `surat`.`jam` , `surat`.`keterangan`, `surat`.`file_surat`
    FROM `surat` 
    JOIN `akses_surat` 
    ON `surat`.`id_surat` = `akses_surat`.`id_surat` 
    JOIN `status_surat`
    ON `surat`.`id_status_surat` = status_surat.`id_status_surat`
    WHERE `akses_surat`.`id_user_penerima` = '$id_penerima'";

    return $this->db->query($query)->result_array();
  }

  public function laporanMasukbyMonth($bulan, $tahun)
  {
    $id_penerima = getCurrentUser()->id_user;

    $query = "SELECT `surat`.`id_status_surat`, `status_surat`.`nama_status_surat`, `surat`.`no_surat`, `surat`.`tgl_pelaksanaan`, `surat`.`jam` , `surat`.`keterangan`, `surat`.`file_surat`
   FROM `surat` 
    JOIN `akses_surat` 
    ON `surat`.`id_surat` = `akses_surat`.`id_surat` 
    JOIN `status_surat`
    ON `surat`.`id_status_surat` = status_surat.`id_status_surat`
    WHERE `akses_surat`.`id_user_penerima` = '$id_penerima' AND month(`tgl_pelaksanaan`)='$bulan' AND year(`tgl_pelaksanaan`)='$tahun'";

    return $this->db->query($query)->result_array();
  }

  public function laporanMasukbyYear($tahun)
  {

    $id_penerima = getCurrentUser()->id_user;

    $query = "SELECT `surat`.`id_status_surat`, `status_surat`.`nama_status_surat`, `surat`.`no_surat`, `surat`.`tgl_pelaksanaan`, `surat`.`jam` , `surat`.`keterangan`, `surat`.`file_surat`
   FROM `surat` 
    JOIN `akses_surat` 
    ON `surat`.`id_surat` = `akses_surat`.`id_surat` 
    JOIN `status_surat`
    ON `surat`.`id_status_surat` = status_surat.`id_status_surat`
    WHERE `akses_surat`.`id_user_penerima` = '$id_penerima' AND year(`tgl_pelaksanaan`)='$tahun'";

    return $this->db->query($query)->result_array();
  }


  ///SURAT KELUAR
  public function LaporanKeluarAll()
  {
    $id_pengirim = getCurrentUser()->id_user;

    $query = "SELECT *
    FROM `surat` 
    JOIN `status_surat`
    ON `surat`.`id_status_surat` = status_surat.`id_status_surat`
    WHERE `id_pengirim` = '$id_pengirim'";

    return $this->db->query($query)->result_array();
  }

  public function laporanKeluarbyMonth($bulan, $tahun)
  {
    $id_pengirim = getCurrentUser()->id_user;

    $query = "SELECT *
    FROM `surat` 
    JOIN `status_surat`
    ON `surat`.`id_status_surat` = status_surat.`id_status_surat`
    WHERE `id_pengirim` = '$id_pengirim' AND month(`tgl_pelaksanaan`)='$bulan' AND year(`tgl_pelaksanaan`)='$tahun'";

    return $this->db->query($query)->result_array();
  }

  public function laporanKeluarbyYear($tahun)
  {
    $id_pengirim = getCurrentUser()->id_user;

    $query = "SELECT *
    FROM `surat` 
    JOIN `status_surat`
    ON `surat`.`id_status_surat` = status_surat.`id_status_surat`
    WHERE `id_pengirim` = '$id_pengirim' AND year(`tgl_pelaksanaan`)='$tahun'";

    return $this->db->query($query)->result_array();
  }
}
