<?php
class Member extends CI_Controller{
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
    $this->load->model('m_member');
    $data['q_member']=$this->m_member->lihatmember();
    $this->load->view('member/main', $data);
  }

}