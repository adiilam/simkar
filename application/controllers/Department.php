<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Department extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if ($this->login_m->isNotLogin()) redirect('login');
    
    if (!$this->utils->isPermAllowed($_SESSION['perm']->masterDataRead ?? '')) {
        redirect('dashboard');
        return;
    }  
  }

  public function index()
  {
    $x['title'] = "Departemen";
    $data['department'] = $this->m_department->getAll();
    $this->load->view('templates/header', $x);
    $this->load->view('templates/sidebar');
    $this->load->view('department', $data);
    $this->load->view('templates/footer');
  }

  public function add()
  {
    if (!$this->utils->isPermAllowed($_SESSION['perm']->masterDataCreate ?? '')) {
        redirect('dashboard');
        return;
    }
    
    $post = $this->input->post();
    $insert = $this->m_department->insert($post);
    if ($insert) {
      $this->session->set_flashdata('message', '<div class="alert alert-success">Data Berhasil Di Simpan</div>');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Gagal Di Simpan</div>');
    }
    redirect('department');
  }

  public function edit()
  {
    if (!$this->utils->isPermAllowed($_SESSION['perm']->masterDataUpdate ?? '')) {
        redirect('dashboard');
        return;
    }
    
    $post = $this->input->post();
    $update = $this->m_department->update($post);
    if ($update) {
      $this->session->set_flashdata('message', '<div class="alert alert-info">Data Berhasil Diubah</div>');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Gagal Diubah</div>');
    }
    redirect('department');
  }

  public function delete($uid)
  {
    if (!$this->utils->isPermAllowed($_SESSION['perm']->masterDataDelete ?? '')) {
        redirect('dashboard');
        return;
    }
      
    
    $delete = $this->m_department->delete($uid);
    if ($delete) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Berhasil Dihapus</div>');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Gagal Dihapus</div>');
    }
    redirect('department');
  }
}
