<?php

class M_promosi extends CI_Model
{

  private $table = "tb_promosi";

  public function getById($uid)
  {
    return $this->db->where('karyawan_uid', $uid)->get($this->table)->result();
  }

  public function add($post)
  {
    $uid = $this->utils->uuid();
    $data = array(
      'uid'                => $uid,
      'karyawan_uid'       => $post['karyawan_uid'],
      'keterangan'         => $post['keterangan'],
      'tgl'                => $post['tgl'],
      'no_surat'           => $post['no_surat']
    );

    return $this->db->insert($this->table, $data);
  }

  public function update($post)
  {
    $data = array(
        'keterangan'         => $post['keterangan'],
        'tgl'                => $post['tgl'],
        'no_surat'           => $post['no_surat']
    );

    return $this->db->where('uid', $post['uid'])->update($this->table, $data);
  }

  public function delete($uid)
  {
    return $this->db->delete($this->table, array('uid' => $uid));
  }
}
