<?php
class M_member extends CI_Model {
  public function __construct() {
    parent::__construct();
    $this->load->database();
  }

  public function lihatmember() {
    $query = $this->db->get('f_member');
    return $query->result();
  }
}