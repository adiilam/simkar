<?php

class M_peringatan extends CI_Model
{

  private $table = "tb_peringatan";

  public function getOptions()
  {
    $data = $this->db->get($this->table)->result();
    $res = array();

    if ($data) {
      foreach ($data as $d) {
        $res[] = array(
          "value" => $d->uid,
          "value" => $d->karyawan_uid,
          "label" => $d->status,
        );
      }
    } else {
      $res = [];
    }

    return $res;
  }

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
      'status'             => $post['status'],
      'komentar'           => $post['komentar'],
      'tanggal'            => $post['tanggal'],
      'berlaku'            => $post['berlaku']
    );

    return $this->db->insert($this->table, $data);
  }

  public function update($post)
  {
    $data = array(
      'status'      => $post['status'],
      'komentar'    => $post['komentar'],
      'tanggal'     => $post['tanggal'],
      'berlaku'     => $post['berlaku']
    );

    return $this->db->where('uid', $post['uid'])->update($this->table, $data);
  }

  public function delete($uid)
  {
    return $this->db->delete($this->table, array('uid' => $uid));
  }
}
