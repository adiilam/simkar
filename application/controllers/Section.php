<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Section extends CI_Controller
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
    $x['title'] = "Section";
    $data['section'] = $this->m_section->getAll();
    $data['department'] = $this->m_department->getOptions();
    $this->load->view('templates/header', $x);
    $this->load->view('templates/sidebar');
    $this->load->view('section', $data);
    $this->load->view('templates/footer');
  }

  public function add()
  {
    if (!$this->utils->isPermAllowed($_SESSION['perm']->masterDataCreate ?? '')) {
        redirect('dashboard');
        return;
    }
    
    $post = $this->input->post();
    $insert = $this->m_section->insert($post);
    if ($insert) {
      $this->session->set_flashdata('message', '<div class="alert alert-success">Data Berhasil Di Simpan</div>');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Gagal Di Simpan</div>');
    }
    redirect('section');
  }

  public function edit()
  {
    if (!$this->utils->isPermAllowed($_SESSION['perm']->masterDataUpdate ?? '')) {
        redirect('dashboard');
        return;
    }
    
    $post = $this->input->post();
    $update = $this->m_section->update($post);
    if ($update) {
      $this->session->set_flashdata('message', '<div class="alert alert-info">Data Berhasil Diubah</div>');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Gagal Diubah</div>');
    }
    redirect('section');
  }

  public function delete($uid)
  {
    if (!$this->utils->isPermAllowed($_SESSION['perm']->masterDataDelete ?? '')) {
        redirect('dashboard');
        return;
    }
    
    $delete = $this->m_section->delete($uid);
    if ($delete) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Berhasil Dihapus</div>');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Gagal Dihapus</div>');
    }
    redirect('section');
  }
}
