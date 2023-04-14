<?php

class M_pengalaman extends CI_Model
{

  private $table = "tb_pengalaman";

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
      'perusahaan'        => $post['perusahaan'],
      'jabatan'           => $post['jabatan'],
      'periode'       => $post['periode']
    );

    return $this->db->insert($this->table, $data);
  }

  public function update($post)
  {
    $data = array(
      'perusahaan'        => $post['perusahaan'],
      'jabatan'           => $post['jabatan'],
      'periode'           => $post['periode']
    );

    return $this->db->where('uid', $post['uid'])->update($this->table, $data);
  }

  public function delete($uid)
  {
    return $this->db->delete($this->table, array('uid' => $uid));
  }
}
