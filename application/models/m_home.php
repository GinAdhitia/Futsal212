<?php
class M_home extends CI_Model {
  public function __construct() {
    parent::__construct();
    $this->load->database();
  }

  public function cekjadwal($hari) {
   	$query=$this->db->query("SELECT * FROM f_sewa WHERE fs_tanggal='$hari'");
    return $query->result();
  }
}