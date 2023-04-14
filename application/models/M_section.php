<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_section extends CI_Model
{

  private $table = "tb_department_section";

  public function getOptions()
  {
    $data = $this->db->get($this->table)->result();
    $res = array();

    if ($data) {
      foreach ($data as $d) {
        $res[] = array(
          "value" => $d->uid,
          "label" => $d->name,
          "department_uid" => $d->department_uid
        );
      }
    } else {
      $res = [];
    }

    return $res;
  }

  public function getAll()
  {
    return $this->db
      ->select('tb_department_section.*, tb_department.name as department')
      ->join('tb_department', 'tb_department_section.department_uid=tb_department.uid')
      ->get($this->table)
      ->result();
  }

  public function insert($post)
  {
    $data = array(
      'uid' => $this->utils->uuid(),
      'name' => $post['name'],
      'department_uid' => $post['department'],
    );

    return $this->db->insert($this->table, $data);
  }

  function update($post)
  {
    $data = array(
      'name' => $post['name'],
      'department_uid' => $post['department'],
    );

    return $this->db->where('uid', $post['uid'])->update($this->table, $data);
  }

  public function delete($uid)
  {
    return $this->db->delete($this->table, array('uid' => $uid));
  }
}
