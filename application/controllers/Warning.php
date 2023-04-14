<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Warning extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->login_m->isNotLogin()) redirect('login');

        if (!$this->utils->isPermAllowed($_SESSION['perm']->warningRead ?? '')) {
            redirect('dashboard');
            return;
        }
    }

    public function index()
    {
        $x['title'] = "Warning";
        $data['karyawan_warning'] = $this->m_kontrak->get_latest_kontrak_warn(date('m'));
        $this->load->view('templates/header', $x);
        $this->load->view('templates/sidebar');
        $this->load->view('warning', $data);
        $this->load->view('templates/footer');
    }
}
