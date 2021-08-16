<?php
function getCurrentUser()
{
  try {
    $CI = new CI_Model();
    $user = $CI->session->all_userdata();

    if (!empty($user)) {
      $user_data = (object) $user;
    } else {
      throw new Exception('User data not valid');
    }
  } catch (\Exception $e) {
    echo $e->getMessage();
    exit();
  }

  return $user_data;
}
function getCurrentDate()
{
  $CM = new CI_Model();
  date_default_timezone_set('Asia/Jakarta');
  $now = date('Y-m-d H:i:s');

  return $now;
}
function getCurrentMonth()
{
  $CM = new CI_Model();
  date_default_timezone_set('Asia/Jakarta');
  $now = date('m');

  return $now;
}

function getPrioritasUser($id_status_user)
{
  $CM = new CI_Model();
  $status_user = $CM->db->get_where('status_user', ['id_status' => $id_status_user])->row_array();

  return $status_user['prioritas'];
}

function getPrioritasSurat($id_status_surat)
{
  $CM = new CI_Model();
  $status_surat = $CM->db->get_where('status_surat', ['id_status_surat' => $id_status_surat])->row_array();

  return $status_surat['prioritas_surat'];
}

function getKegiatan($id_surat)
{
  $CM = new CI_Model();
  $kegiatan = $CM->db->get_where('surat', ['id_surat' => $id_surat])->row_array();

  return $kegiatan['kegiatan'];
}
