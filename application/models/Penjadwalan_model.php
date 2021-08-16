<?php

class Penjadwalan_model extends CI_model
{
  public function jadwal_surat()
  {
    $id_penerima = getCurrentUser()->id_user;
    $bulan = date('m');

    $query = "SELECT `akses_surat`.`id_akses_surat`, `user`.`nama`, `status_surat`.`nama_status_surat` ,`surat`.`id_surat`, `surat`.`id_status_surat`, `surat`.`no_surat`, `surat`.`tgl_pelaksanaan`, `surat`.`jam` , `surat`.`keterangan`, `surat`.`file_surat`, `akses_surat`.`id_user_pengirim` , `akses_surat`.`id_user_penerima`, `akses_surat`.`tgl_konfirmasi` ,`akses_surat`.`total_bobot_prioritas` 
    FROM `surat` 
    JOIN `akses_surat` 
    ON `surat`.`id_surat` = `akses_surat`.`id_surat` 
    JOIN `status_surat`
    ON `surat`.`id_status_surat` = status_surat.`id_status_surat`
    JOIN `user`
    ON `surat`.`id_pengirim` = user.`id_user`
    WHERE `akses_surat`.`id_user_penerima` = '$id_penerima' AND month(`tgl_pelaksanaan`)='$bulan' ORDER BY concat (`tgl_pelaksanaan`, `jam`) asc, `total_bobot_prioritas` desc";

    return $this->db->query($query)->result_array();
  }

  public function viewjadwalSurat($bulan)
  {
    $id_penerima = getCurrentUser()->id_user;

    $query = "SELECT `akses_surat`.`id_akses_surat`, `user`.`nama`, `status_surat`.`nama_status_surat` ,`surat`.`id_surat`, `surat`.`id_status_surat`, `surat`.`no_surat`, `surat`.`tgl_pelaksanaan`, `surat`.`jam` , `surat`.`keterangan`, `surat`.`file_surat`, `akses_surat`.`id_user_pengirim` , `akses_surat`.`id_user_penerima`, `akses_surat`.`tgl_konfirmasi` ,`akses_surat`.`total_bobot_prioritas` 
    FROM `surat` 
    JOIN `akses_surat` 
    ON `surat`.`id_surat` = `akses_surat`.`id_surat` 
    JOIN `status_surat`
    ON `surat`.`id_status_surat` = status_surat.`id_status_surat`
    JOIN `user`
    ON `surat`.`id_pengirim` = user.`id_user`
    WHERE `akses_surat`.`id_user_penerima` = '$id_penerima' AND month(`tgl_pelaksanaan`)='$bulan' ORDER BY concat (`tgl_pelaksanaan`, `jam`) asc, `total_bobot_prioritas` desc";

    return $this->db->query($query)->result_array();
  }
  public $prefs;
  public function __construct()
  {
    //parent::Model();
    $this->prefs = array(
      'start_day'    => 'sunday',
      'month_type'   => 'long',
      'day_type'     => 'short',
      'show_next_prev' => TRUE,
      'next_prev_url'   => base_url() . '/penjadwalan/viewKalender/'
    );
    $this->prefs['template'] = '

    {table_open}<table border="0" cellpadding="0" cellspacing="0">{/table_open}

    {heading_row_start}<tr>{/heading_row_start}

    {heading_previous_cell}<th><a class="panahleft" href="{previous_url}"><i class="fa fa-chevron-left fa-fw"></a></th>{/heading_previous_cell}
    {heading_title_cell}<th class="judul" colspan="{colspan}">{heading}</th>{/heading_title_cell}
    {heading_next_cell}<th><a class="panahright" href="{next_url}"><i class="fa fa-chevron-right fa-fw"></i></a></th>{/heading_next_cell}

    {heading_row_end}</tr>{/heading_row_end}

        {week_row_start}<tr>{/week_row_start}
        {week_day_cell}<td>{week_day}</td>{/week_day_cell}
        {week_row_end}</tr>{/week_row_end}

        {cal_row_start}<tr class="days">{/cal_row_start}
        {cal_cell_start}<td>{/cal_cell_start}
        {cal_cell_start_today}<td>{/cal_cell_start_today}
        {cal_cell_start_other}<td class="other-month">{/cal_cell_start_other}

        {cal_cell_content}
        	<div class="day_num">{day}</div>
        	<div class="content">{content}</div>
        {/cal_cell_content}
        {cal_cell_content_today}
        <div class="">
        	<div class="day_num highlight">{day}</div>
        	<div class="content">{content}</div>
    	</div>
    	{/cal_cell_content_today}

        {cal_cell_no_content}{day}{/cal_cell_no_content}
        {cal_cell_no_content_today}<div class="day_num highlight">{day}</div>{/cal_cell_no_content_today}

        {cal_cell_blank}&nbsp;{/cal_cell_blank}

        {cal_cell_other}{day}{/cal_cel_other}

        {cal_cell_end}</td>{/cal_cell_end}
        {cal_cell_end_today}</td>{/cal_cell_end_today}
        {cal_cell_end_other}</td>{/cal_cell_end_other}
        {cal_row_end}</tr>{/cal_row_end}

        {table_close}</table>{/table_close}
';
  }
  public function getcalender($year, $month)
  {
    $this->load->library('calendar', $this->prefs); // Load calender library
    // $data = array(
    //   3  => 'check',
    //   7  => 'check1',
    //   13 => 'bar',
    //   26 => 'ytr'
    // );
    $data = $this->get_calender_data($year, $month);
    return $this->calendar->generate($year, $month, $data);
  }
  public function get_calender_data($year, $month)
  {

    // $query =  $this->db->select('tgl_pelaksanaan,keterangan')->from('surat')->like('tgl_pelaksanaan', "$year-$month", 'after')->get();

    $id_penerima = getCurrentUser()->id_user;

    $this->db->select('surat.tgl_pelaksanaan, surat.keterangan');
    $this->db->from('surat');
    $this->db->join('akses_surat', 'surat.id_surat = akses_surat.id_surat');
    $this->db->where('akses_surat.id_user_penerima', $id_penerima);
    $this->db->like('tgl_pelaksanaan', "$year-$month", 'after');

    $query = $this->db->get();

    $cal_data = array();
    foreach ($query->result() as $row) {
      $calendar_date = date("Y-m-j", strtotime($row->tgl_pelaksanaan)); // to remove leading zero from day format
      $cal_data[substr($calendar_date, 8, 2)] = $row->keterangan;
    }

    return $cal_data;
  }
  public function add_calendar_data($data, $date)
  {
    $this->db->insert('surat', array(
      'tgl_pelaksanaan'  => $date,
      'keterangan'  => $data,
    ));
  }
}
