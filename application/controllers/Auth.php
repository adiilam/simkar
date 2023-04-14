<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

  public function index()
  {

    // if (!($this->login_m->isNotLogin())) redirect('dashboard');

    // if ($this->input->post()) {
    //   if ($this->login_m->login()) {
    //     $this->session->set_flashdata('message', '<div class="alert alert-success">Berhasil Login</div>');
    //     redirect('dashboard');
    //   } else {
    //     $this->session->set_flashdata('message', '<div class="alert alert-danger">Gagal Login</div>');
    //   }
    // }
    $this->load->view('login');
  }

  public function proses_login()
  {
    $this->form_validation->set_rules('username', 'username', 'required', [
      'required'  => 'Username wajib diisi!'
    ]);
    $this->form_validation->set_rules('password', 'password', 'required', [
      'required'  => 'Password wajib diisi!'
    ]);

    if ($this->form_validation->run() == FALSE) {
    } else {
      $username = $this->input->post('username');
      $password = $this->input->post('password');

      $user  = $username;
      $pass  = MD5($password);

      $cek    = $this->login_m->cek_login($user, $pass);

      if ($cek->num_rows() > 0) {

        foreach ($cek->result() as $ck) {
          $sess_data['username']  = $ck->username;

          $this->session->set_userdata($sess_data);
        }
        if ($sess_data['username'] == 'admin') {
          redirect('dashboard');
        } else {
          $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Username atau Password Salah!
                    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
          redirect('auth');
        }
      } else {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Username atau Password Salah!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>');
        redirect('auth');
      }
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('login');
  }
}
