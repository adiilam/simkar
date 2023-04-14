<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Bank extends CI_Controller
{
    public function add()
    {
        if (!$this->utils->isPermAllowed($_SESSION['perm']->karyawanCreate ?? '')) {
            redirect('dashboard');
            return;
        }

        $post = $this->input->post();

        $add = $this->m_bank->add($post);

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
        redirect('karyawan/detail/' . $post['karyawan_uid']);
    }

    public function edit()
    {
        if (!$this->utils->isPermAllowed($_SESSION['perm']->karyawanUpdate ?? '')) {
            redirect('dashboard');
            return;
        }

        $post = $this->input->post();

        $update = $this->m_bank->update($post);

        if ($update) {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           Data Berhasil Diubah!
          </div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           Data Gagal Diubah!
          </div>');
        }
        redirect('karyawan/detail/' . $post['karyawan_uid']);
    }

    public function delete($uid, $karyawan_uid)
    {
        if (!$this->utils->isPermAllowed($_SESSION['perm']->karyawanDelete ?? '')) {
            redirect('dashboard');
            return;
        }

        $delete = $this->m_bank->delete($uid);
        if ($delete) {
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data Berhasil Dihapus</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data Gagal Dihapus</div>');
        }
        redirect('karyawan/detail/' . $karyawan_uid);
    }
}
