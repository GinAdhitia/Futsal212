<?php
class Log extends CI_Controller{
  public function index() {
    $this->load->view('head');
    $this->load->view('login');
  }

  public function cek_login() {
    $data = array('fa_user' => $this->input->post('username'), 'fa_pass' => md5($this->input->post('password')));
    $this->load->model('m_log');
    $hasil = $this->m_log->cek_user($data);
    if ($hasil->num_rows() == 1) {
      foreach ($hasil->result() as $hasil2) {
        $sess_data['user'] = $hasil2->fa_user;
        $sess_data['nama'] = $hasil2->fa_nama;
        $sess_data['pin'] = $hasil2->fa_pin;
        $sess_data['lvl'] = $hasil2->fa_level;
        $this->session->set_userdata($sess_data);
        redirect('home');
      }
    } else {
      echo "<script>alert('Gagal login: Cek username dan password!');history.go(-1);</script>";
    }
  }

  public function logout() {
    $this->session->unset_userdata('user');
    $this->session->unset_userdata('nama');
    $this->session->unset_userdata('pin');
    $this->session->unset_userdata('lvl');
    session_destroy();
    redirect('log');
  }
}