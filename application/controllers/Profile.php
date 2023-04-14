<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function index()
    {
        $x['title'] = "Profil User";
        $this->load->view('templates/header', $x);
        $this->load->view('templates/sidebar');
        $this->load->view('user_profile');
        $this->load->view('templates/footer');
    }
    
    public function gantifoto()
    {
        $post = $this->input->post();
        $post['uid'] = $_SESSION['user']->kar_uid;
        
        $add = $this->m_karyawan->changePhoto($post);
        if ($add['success']) {
          $_SESSION['user']->foto = $add['foto'];
          $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               Foto Berhasil Diubah!
              </div>');
        } else {
          $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               Foto Gagal Diubah!
              </div>');
        }
        redirect('profile');
    }
    
    public function change_password()
    {
        $post = $this->input->post();
        if ($post['password'] != $post['password_confirmation']) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               Password baru dan konfirmasi password tidak cocok!
              </div>');
        }
        else if (md5($post['password_lama']) != $_SESSION['user']->password) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               Password lama salah!
              </div>');
        }
        else {
            $post['uid'] = $_SESSION['user']->uid;
            $_SESSION['user']->password = md5($post['password']);
            $add = $this->m_user->change_password($post);
            if ($add) {
              $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   Password Berhasil Diubah!
                  </div>');
            } else {
              $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   Password Gagal Diubah!
                  </div>');
            }
        }
        redirect('profile');
    }
}