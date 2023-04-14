<?php

class M_training extends CI_Model
{

  private $table = "tb_training";

  public function getById($uid)
  {
    return $this->db->where('karyawan_uid', $uid)->get($this->table)->result();
  }

  public function add($post)
  {
    $uid = $this->utils->uuid();
    $data = array(
      'uid'               => $uid,
      'karyawan_uid'      => $post['karyawan_uid'],
      'nama_training'     => $post['nama_training'],
      'penyelenggara'     => $post['penyelenggara'],
      'tahun'             => $post['tahun'],
      'keterangan'        => $post['keterangan']
    );

    return $this->db->insert($this->table, $data);
  }

  public function update($post)
  {
    $data = array(
      'nama_training'   => $post['nama_training'],
      'penyelenggara'   => $post['penyelenggara'],
      'tahun'           => $post['tahun'],
      'keterangan'      => $post['keterangan']
    );

    return $this->db->where('uid', $post['uid'])->update($this->table, $data);
  }

  public function delete($uid)
  {
    return $this->db->delete($this->table, array('uid' => $uid));
  }
}
