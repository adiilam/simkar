<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_karyawan extends CI_Model
{
  private $table = "tb_karyawan";

  // public function tampil_data()
  // {
  //     return $this->db
  //         ->select('tbkaryawan.*, tb_department.department as department, tb_jabatan.jabatan as jabatan')
  //         ->join('tbkontrak_karyawan', 'tbkaryawan.npk=tbkontrak_karyawan.npk', 'left')
  //         ->join('tb_department', 'tb_department.kode_department=tbkontrak_karyawan.kddepartement', 'left')
  //         ->join('tb_jabatan', 'tb_jabatan.kode_jabatan=tbkontrak_karyawan.kdjabatan', 'left')
  //         ->get('tbkaryawan');
  // }

  public function getAll()
  {
    return $this->db
      ->select('tb_karyawan.*, tb_department.name as department, tb_department_section.name as section, tb_jabatan.name as jabatan')
      ->join('tb_department', 'tb_karyawan.department_uid=tb_department.uid', 'left')
      ->join('tb_department_section', 'tb_karyawan.section_uid=tb_department_section.uid', 'left')
      ->join('tb_jabatan', 'tb_karyawan.jabatan_uid=tb_jabatan.uid', 'left')
      ->get($this->table)
      ->result();
  }

  public function getById($uid = null)
  {
    return $this->db
      ->select('tb_karyawan.*, tb_department.name as department, tb_department_section.name as section, tb_jabatan.name as jabatan')
      ->join('tb_department', 'tb_karyawan.department_uid=tb_department.uid', 'left')
      ->join('tb_department_section', 'tb_karyawan.section_uid=tb_department_section.uid', 'left')
      ->join('tb_jabatan', 'tb_karyawan.jabatan_uid=tb_jabatan.uid', 'left')
      ->where('tb_karyawan.uid', $uid)
      ->get($this->table)
      ->row();
  }

  public function get_all_inactive_karyawan()
  {
    $query = "SELECT status_kerja AS status FROM " . $this->table . " WHERE status_kerja != 1";

    return $this->db->query($query)->result();
  }

  public function get_all_phk_karyawan()
  {
    return $this->db->query("SELECT kar.status_kerja AS status, kar.npk AS npk, kar.uid AS uid, kar.nama AS nama, kar.tgl_nonaktif AS tanggal, dep.name AS department FROM " . $this->table . " kar "
      . "INNER JOIN tb_department dep ON kar.department_uid = dep.uid "
      . " WHERE kar.status_kerja = '2' ")->result();
  }

  public function get_all_resign_karyawan()
  {
    return $this->db->query("SELECT kar.status_kerja AS status, kar.npk AS npk, kar.uid AS uid, kar.nama AS nama, kar.tgl_nonaktif AS tanggal, dep.name AS department FROM " . $this->table . " kar "
      . "INNER JOIN tb_department dep ON kar.department_uid = dep.uid "
      . " WHERE kar.status_kerja = '3' ")->result();
  }

  public function get_all_habis_kontrak_karyawan()
  {
    return $this->db->query("SELECT kar.status_kerja AS status, kar.npk AS npk, kar.uid AS uid, kar.nama AS nama, kar.tgl_nonaktif AS tanggal, dep.name AS department FROM " . $this->table . " kar "
      . "INNER JOIN tb_department dep ON kar.department_uid = dep.uid "
      . " WHERE kar.status_kerja = '4' ")->result();
  }

  public function get_all_meninggal_karyawan()
  {
    return $this->db->query("SELECT kar.status_kerja AS status, kar.npk AS npk, kar.uid AS uid, kar.nama AS nama, kar.tgl_nonaktif AS tanggal, dep.name AS department FROM " . $this->table . " kar "
      . "INNER JOIN tb_department dep ON kar.department_uid = dep.uid "
      . " WHERE kar.status_kerja = '5' ")->result();
  }

  public function get_all_lainnya_karyawan()
  {
    return $this->db->query("SELECT kar.status_kerja AS status, kar.npk AS npk, kar.uid AS uid, kar.nama AS nama, kar.tgl_nonaktif AS tanggal, dep.name AS department FROM " . $this->table . " kar "
      . "INNER JOIN tb_department dep ON kar.department_uid = dep.uid "
      . " WHERE kar.status_kerja = '6' ")->result();
  }

  public function getOptions()
  {
    $data = $this->db->get($this->table)->result();
    $res = array();

    if ($data) {
      foreach ($data as $d) {
        $res[] = array(
          "value" => $d->uid,
          "label" => $d->nama,
        );
      }
    } else {
      $res = [];
    }

    return $res;
  }

  public function add($post)
  {
    $uid = $this->utils->uuid();
    $foto = '';

    $config['upload_path']      = './assets/foto';
    $config['allowed_types']    = 'jpg|png|gif';
    $config['file_name'] = $uid;

    $this->load->library('upload', $config);
    if (!empty($_FILES['foto']['name'])) {
      if (!$this->upload->do_upload('foto')) {
        echo "Upload Gagal";
        die();
      } else if ($this->upload->do_upload('foto')) {
        $uploadedFoto = array('upload_data' => $this->upload->data());
        $foto = $uploadedFoto['upload_data']['file_name'];
      }
    }

    $data = array(
      'uid'                  => $uid,
      'npk'                  => $post['npk'],
      'nik'                  => $post['nik'],
      'nama'                 => $post['nama'],
      'department_uid'       => $post['department'],
      'section_uid'          => $post['section'],
      'jabatan_uid'          => $post['jabatan'],
      'alamat'               => $post['alamat'],
      'alamat_domisili'      => $post['alamat_domisili'],
      'status_kerja'         => $post['status_kerja'],
      'status_nikah'         => $post['status_nikah'],
      'tgl_nonaktif'         => $post['tgl_nonaktif'],
      'jkel'                 => $post['jkel'],
      'tlp'                  => $post['tlp'],
      'tempat_lahir'         => $post['tempat_lahir'],
      'tanggal_lahir'        => $post['tanggal_lahir'],
      'email'                => $post['email'],
      'npwp'                 => $post['npwp'],
      'kebangsaan'           => $post['kebangsaan'],
      'agama'                => $post['agama'],
      'jumlah_anak'          => $post['jumlah_anak'],
      'golongan_darah'       => $post['golongan_darah'],
      'bpjs_kes'             => $post['bpjs_kes'],
      'bpjs_tk'              => $post['bpjs_tk'],
    );

    if (!empty($foto))
      $data['foto'] = $foto;

    return $this->db->insert($this->table, $data);
  }

  public function update($post)
  {
    $uid = $this->utils->uuid();
    $foto = '';

    $config['upload_path']      = './assets/foto';
    $config['allowed_types']    = 'jpg|png|gif';
    $config['file_name'] = $uid;

    $this->load->library('upload', $config);
    if (!empty($_FILES['foto']['name'])) {
      if (!$this->upload->do_upload('foto')) {
        echo "Upload Gagal";
        die();
      } else if ($this->upload->do_upload('foto')) {
        $uploadedFoto = array('upload_data' => $this->upload->data());
        $foto = $uploadedFoto['upload_data']['file_name'];
      }
    }

    $data = array(
      'npk'                  => $post['npk'],
      'nik'                  => $post['nik'],
      'nama'                 => $post['nama'],
      'department_uid'       => $post['department'],
      'section_uid'          => $post['section'],
      'jabatan_uid'          => $post['jabatan'],
      'alamat'               => $post['alamat'],
      'alamat_domisili'      => $post['alamat_domisili'],
      'status_kerja'         => $post['status_kerja'],
      'tgl_nonaktif'         => $post['tgl_nonaktif'],
      'status_nikah'         => $post['status_nikah'],
      'jkel'                 => $post['jkel'],
      'tlp'                  => $post['tlp'],
      'tempat_lahir'         => $post['tempat_lahir'],
      'tanggal_lahir'        => $post['tanggal_lahir'],
      'email'                => $post['email'],
      'npwp'                 => $post['npwp'],
      'kebangsaan'           => $post['kebangsaan'],
      'agama'                => $post['agama'],
      'jumlah_anak'          => $post['jumlah_anak'],
      'golongan_darah'       => $post['golongan_darah'],
      'bpjs_kes'             => $post['bpjs_kes'],
      'bpjs_tk'              => $post['bpjs_tk'],
    );

    if (!empty($foto))
      $data['foto'] = $foto;

    return $this->db->where('uid', $post['uid'])->update($this->table, $data);
  }

  public function changePhoto($post)
  {
    $config['upload_path']      = './assets/foto';
    $config['allowed_types']    = 'jpg|png|gif';
    $config['file_name'] = $post['uid'];

    $this->load->library('upload', $config);
    if (!$this->upload->do_upload('foto')) {
      echo "Upload Gagal";
      die();
    } else if ($this->upload->do_upload('foto')) {
      $uploadedFoto = array('upload_data' => $this->upload->data());
      $foto = $uploadedFoto['upload_data']['file_name'];
    }

    $data['success'] = $this->db->where('uid', $post['uid'])->update($this->table, ['foto' => $foto]);
    $data['foto'] = $foto;

    return $data;
  }

  public function delete($uid)
  {
    return $this->db->delete($this->table, array('uid' => $uid));
  }

  public function count()
  {
    return $this->db->select('COUNT(uid) as count')->get($this->table)->row()->count;
  }

  // public function input_data($data, $table)
  // {
  //     $this->db->insert($table, $data);
  // }

  // public function hapus_data($where, $table)
  // {
  //     $this->db->where($where);
  //     $this->db->delete($table);
  // }

  // public function edit_data($where, $table)
  // {
  //     return $this->db->get_where($table, $where);
  // }

  // public function update_data($where, $data, $table)
  // {
  //     $this->db->where($where);
  //     $this->db->update($table, $data);
  // }

  // public function detail_data($npk = NULL)
  // {
  //     $query = $this->db->get_where('tbkaryawan', array('npk' => $npk))->row();
  //     return $query;
  // }

  // public function get_keyword($keyword)
  // {
  //     $this->db->select('*');
  //     $this->db->from('tbkaryawan');
  //     $this->db->like('nama', $keyword);
  //     $this->db->or_like('nik', $keyword);
  //     $this->db->or_like('npk', $keyword);
  //     $this->db->or_like('alamat', $keyword);
  //     $this->db->or_like('alamat_domisili', $keyword);
  //     $this->db->or_like('status_nikah', $keyword);
  //     $this->db->or_like('umur', $keyword);
  //     $this->db->or_like('gender', $keyword);
  //     $this->db->or_like('no_tlp', $keyword);
  //     $this->db->or_like('tempat_lahir', $keyword);
  //     $this->db->or_like('tanggal_lahir', $keyword);
  //     $this->db->or_like('email', $keyword);
  //     $this->db->or_like('no_npwp', $keyword);
  //     $this->db->or_like('kebangsaan', $keyword);
  //     $this->db->or_like('agama', $keyword);
  //     $this->db->or_like('golongan_darah', $keyword);
  //     $this->db->or_like('status_tanggungan', $keyword);
  //     $this->db->or_like('jumlah_anak', $keyword);
  //     $this->db->or_like('bpjs_kes', $keyword);
  //     $this->db->or_like('bpjs_tk', $keyword);
  //     return $this->db->get()->result();
  // }
}
