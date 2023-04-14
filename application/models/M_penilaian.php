<?php

class M_penilaian extends CI_Model
{

  private $table = "tb_penilaian";

  public function getById($uid)
  {
    return $this->db->where('karyawan_uid', $uid)->get($this->table)->result();
  }

  public function add($post)
  {
    $uid = $this->utils->uuid();
    $data = array(
      'uid'                  => $uid,
      'karyawan_uid'         => $post['karyawan_uid'],
      'tahun'                => $post['tahun'],
      'nilai'                => $post['nilai'],
      'catatan'              => $post['catatan'],
      'talent_full'          => $post['talent_full']
    );

    return $this->db->insert($this->table, $data);
  }

  public function update($post)
  {
    $data = array(
      'tahun'             => $post['tahun'],
      'nilai'             => $post['nilai'],
      'catatan'           => $post['catatan'],
      'talent_full'       => $post['talent_full']
    );

    return $this->db->where('uid', $post['uid'])->update($this->table, $data);
  }

  public function delete($uid)
  {
    return $this->db->delete($this->table, array('uid' => $uid));
  }
}
