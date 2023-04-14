<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if (!($this->login_m->isNotLogin())) redirect('dashboard');
  }

  public function index()
  {

    if (!($this->login_m->isNotLogin())) redirect('dashboard');

    if ($this->input->post()) {
      if ($this->login_m->login()) {
        $this->session->set_flashdata('message', '<div class="alert alert-success">Berhasil Login</div>');
        redirect('Admin/dashboard');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger">Username atau Password salah!</div>');
      }
    }
    $this->load->view('login');
  }
}
