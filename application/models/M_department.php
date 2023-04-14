<?php

class M_department extends CI_Model
{
  private $table = "tb_department";

  public function getOptions()
  {
    $data = $this->db->get($this->table)->result();
    $res = array();

    if ($data) {
      foreach ($data as $d) {
        $res[] = array(
          "value" => $d->uid,
          "label" => $d->name,
        );
      }
    } else {
      $res = [];
    }

    return $res;
  }

  public function getAll()
  {
    return $this->db->get($this->table)->result();
  }

  public function insert($post)
  {
    $data = array(
      'uid' => $this->utils->uuid(),
      'name' => $post['department'],
    );

    return $this->db->insert($this->table, $data);
  }

  function update($post)
  {
    $data = array(
      'name' => $post['department'],
    );

    return $this->db->where('uid', $post['uid'])->update($this->table, $data);
  }

  public function delete($uid)
  {
    return $this->db->delete($this->table, array('uid' => $uid));
  }
}
