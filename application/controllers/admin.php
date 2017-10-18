<?php
class Admin extends CI_Controller{
  public function __Construct() {
    parent::__construct();
    if ($this->session->userdata('user')=="") {
      redirect('log');
    }
    else if ($this->session->userdata('lvl')=="1") {
      redirect('home');
    }    
    $data['user'] = $this->session->userdata('user');
    $data['nama'] = $this->session->userdata('nama');
    $data['pin'] = $this->session->userdata('pin');
    $data['lvl'] = $this->session->userdata('lvl');
    $this->load->view('head');
    $this->load->view('nav', $data);
  }
      
  public function index() {
    $this->load->view('admin/main');
    $this->load->view('foot');    
    $this->load->view('script');
  }

}