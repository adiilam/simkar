<?php

class M_kontrak extends CI_Model
{

  private $table = "tb_kontrak";

  public function getById($uid)
  {
    return $this->db->where('karyawan_uid', $uid)->get($this->table)->result();
  }

  public function get_latest_kontrak_count()
  {
    $dt = date("Y-m-d");
    $date = date('Y-m-d', strtotime("+30days"));
    return $this->db->query("SELECT COUNT(uid) AS count FROM " . $this->table
      . " WHERE finish BETWEEN '$dt' AND '$date' ")->row()->count;
  }

  public function get_latest_kontrak_warn()
  {
    $dt = date("Y-m-d");
    $date = date('Y-m-d', strtotime("+30days"));
    return $this->db->query("SELECT kon.start as start, kon.finish as finish, kar.nama as nama, kar.npk as npk, kar.uid AS uid, dep.name as department FROM " . $this->table . " kon "
      . "INNER JOIN tb_karyawan kar ON kon.karyawan_uid = kar.uid "
      . "INNER JOIN tb_department dep ON kar.department_uid = dep.uid "
      . "WHERE kon.reminder = '2' AND (kon.status_kontrak = 'PKWT' OR kon.status_kontrak = 'Magang') AND (kon.finish BETWEEN '$dt' AND '$date' "
      . "OR kar.status_kerja = '1' AND kon.finish <= '$dt') ")->result();
  }

  public function get_active_kontrak()
  {
    $dt = date("Y-m-d");
    $query = "SELECT kon.status_kontrak AS status, dep.name AS department FROM " . $this->table . " kon "
      . "INNER JOIN tb_karyawan kar ON kon.karyawan_uid = kar.uid "
      . "INNER JOIN tb_department dep ON kar.department_uid = dep.uid "
      . "WHERE kon.reminder = '2' AND (kon.finish <= '$dt' "
      . "OR kar.status_kerja = '1')";

    return $this->db->query($query)->result();
  }

  public function add($post)
  {
    $uid = $this->utils->uuid();
    $data = array(
      'uid'                         => $uid,
      'karyawan_uid'                => $post['karyawan_uid'],
      'tgl_masuk'                   => $post['tgl_masuk'],
      'tgl_keluar'                  => $post['tgl_keluar'],
      'status_kontrak'              => $post['status_kontrak'],
      'start'                       => $post['start'],
      'finish'                      => $post['finish'],
      'surat_kontrak'               => $post['surat_kontrak'],
      'kontrak_ke'                  => $post['kontrak_ke'],
      'surat_permanen'              => $post['surat_permanen'],
      'tgl_permanen'                => $post['tgl_permanen'],
      'lok_kerja'                   => $post['lok_kerja'],
      'team'                        => $post['team'],
      'grade'                       => $post['grade'],
      'reminder'                    => $post['reminder']
    );

    return $this->db->insert($this->table, $data);
  }

  public function update($post)
  {
    $data = array(
      'tgl_masuk'                   => $post['tgl_masuk'],
      'tgl_keluar'                  => $post['tgl_keluar'],
      'status_kontrak'              => $post['status_kontrak'],
      'start'                       => $post['start'],
      'finish'                      => $post['finish'],
      'surat_kontrak'               => $post['surat_kontrak'],
      'kontrak_ke'                  => $post['kontrak_ke'],
      'surat_permanen'              => $post['surat_permanen'],
      'tgl_permanen'                => $post['tgl_permanen'],
      'lok_kerja'                   => $post['lok_kerja'],
      'team'                        => $post['team'],
      'grade'                       => $post['grade'],
      'reminder'                    => $post['reminder']
    );

    return $this->db->where('uid', $post['uid'])->update($this->table, $data);
  }

  public function delete($uid)
  {
    return $this->db->delete($this->table, array('uid' => $uid));
  }
}
