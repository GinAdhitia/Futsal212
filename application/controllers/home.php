<?php
class Home extends CI_Controller{
  public function __Construct() {
    parent::__construct();
    if ($this->session->userdata('user')=="") {
      redirect('log');
    }
    $data['user'] = $this->session->userdata('user');
    $data['nama'] = $this->session->userdata('nama');
    $data['pin'] = $this->session->userdata('pin');
    $data['lvl'] = $this->session->userdata('lvl');
    $this->load->view('head');
    $this->load->view('nav', $data);
  }

  public function index() {
    date_default_timezone_set('Asia/Jakarta');
    $hari = date('Y-m-d');
    $this->load->model('m_home');
    $data2['q_jadwal']=$this->m_home->cekjadwal($hari);
    $this->load->view('home', $data2);
    $this->load->view('foot');
    $this->load->view('script');
  }
}