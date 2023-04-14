<?php

class M_keluarga extends CI_Model
{

  private $table = "tb_keluarga";

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
      'nama'                 => $post['nama'],
      'hubungan'             => $post['hubungan'],
      'no_kk'                => $post['no_kk'],
      'tempat_lahir'         => $post['tempat_lahir'],
      'tanggal_lahir'        => $post['tanggal_lahir']
    );

    return $this->db->insert($this->table, $data);
  }

  public function update($post)
  {
    $data = array(
      'nama'                 => $post['nama'],
      'hubungan'             => $post['hubungan'],
      'no_kk'                => $post['no_kk'],
      'tempat_lahir'         => $post['tempat_lahir'],
      'tanggal_lahir'        => $post['tanggal_lahir']
    );

    return $this->db->where('uid', $post['uid'])->update($this->table, $data);
  }

  public function delete($uid)
  {
    return $this->db->delete($this->table, array('uid' => $uid));
  }
}
