<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Resign extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->login_m->isNotLogin()) redirect('login');

        if (!$this->utils->isPermAllowed($_SESSION['perm']->monitoringRead ?? '')) {
            redirect('dashboard');
            return;
        }
    }

    public function index()
    {
        error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
        
        $data['karyawan_resign'] = $this->m_karyawan->get_all_resign_karyawan();
        $inactive_col = $this->m_karyawan->get_all_inactive_karyawan();
        $data['inactive'] = [0, 0, 0, 0, 0];

        foreach ($inactive_col as $inactive)
            $data['inactive'][((int)$inactive->status) - 2] += 1;

        $x['title'] = "Resign";
        $this->load->view('templates/header', $x);
        $this->load->view('templates/sidebar');
        $this->load->view('resign', $data);
        $this->load->view('templates/footer');
    }
}
