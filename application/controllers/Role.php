<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Role extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->login_m->isNotLogin()) redirect('login');
    }
  
    public function index() 
    {
        $x['title'] = "Role";
        $data['role_data'] = $this->m_role->all();
        $this->load->view('templates/header', $x);
        $this->load->view('templates/sidebar');
        $this->load->view('role', $data);
        $this->load->view('templates/footer');
    }
    
    public function request($uid)
    {
        $data = $this->m_role->getById($uid);
        if (!$data)
            $data = [];
        
        echo json_encode($data);
    }
    
    public function requestAll()
    {
        $data = $this->m_role->all();
        if (!$data)
            $data = [];
       
        echo json_encode($data);
    }
    
    public function add()
    {
        $add = $this->m_role->add($this->input->post());
        if ($add) {
          $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               Data Berhasil Ditambahkan!
              </div>');
        } else {
          $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               Data Gagal Ditambahkan!
              </div>');
        }
        redirect('role');
    }
    
    public function update()
    {
        $update = $this->m_role->update($this->input->post());
        if ($update) {
          $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               Data Berhasil Diupdate!
              </div>');
        } else {
          $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               Data Gagal Diupdate!
              </div>');
        }
        redirect('role');
    }
    
    public function delete($uid)
    {
        $delete = $this->m_role->delete($uid);
        if ($delete) {
          $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               Data Berhasil Dihapus!
              </div>');
        } else {
          $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               Data Gagal Dihapus!
              </div>');
        }
        redirect('role');
    }
}