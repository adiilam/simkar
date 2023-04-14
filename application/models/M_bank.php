<?php

class M_bank extends CI_Model
{

  private $table = "tb_bank";

  public function getById($uid)
  {
    return $this->db->where('karyawan_uid', $uid)->get($this->table)->result();
  }

  public function add($post)
  {
    $uid = $this->utils->uuid();
    $data = array(
      'uid'              => $uid,
      'karyawan_uid'     => $post['karyawan_uid'],
      'nama'             => $post['nama'],
      'bank'             => $post['bank'],
      'no_rekening'      => $post['no_rekening'],
      'cabang'           => $post['cabang']
    );

    return $this->db->insert($this->table, $data);
  }

  public function update($post)
  {
    $data = array(
      'nama'          => $post['nama'],
      'bank'          => $post['bank'],
      'no_rekening'   => $post['no_rekening'],
      'cabang'        => $post['cabang']
    );

    return $this->db->where('uid', $post['uid'])->update($this->table, $data);
  }

  public function delete($uid)
  {
    return $this->db->delete($this->table, array('uid' => $uid));
  }
}
