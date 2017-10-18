<?php
class M_log extends CI_Model {
  public function __construct() {
    parent::__construct();
    $this->load->database();
  }

  public function cek_user($data) {
    $query = $this->db->get_where('f_admin', $data);
    return $query;
  }
}