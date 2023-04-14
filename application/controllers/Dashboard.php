<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if ($this->login_m->isNotLogin()) redirect('login');
  }


  public function index()
  {
    if (!$this->utils->isPermAllowed($_SESSION['perm']->dashboardRead ?? '')) {
        echo 'Tidak dizinkan untuk melihat halaman ini!';
        session_destroy();
        return;
    }
    $x['title'] = "Dashboard";
    $data['karyawan_count'] = $this->m_karyawan->count();
    $data['kontrak_warn_count'] = $this->m_kontrak->get_latest_kontrak_count(date('m'));
    $this->load->view('templates/header', $x);
    $this->load->view('templates/sidebar');
    $this->load->view('dashboard', $data);
    $this->load->view('templates/footer');
  }
}
