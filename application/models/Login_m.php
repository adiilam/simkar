<?php
class Login_m extends CI_model
{

  public function cek_login($username, $password)
  {
    $this->db->where("username", $username);
    $this->db->where("password", $password);
    return $this->db->get('tblogin');
  }

  private $table = "tb_auth";

  public function login()
  {
    $post = $this->input->post();

    $cek = $this->db
      ->where('username', $post["username"])
      ->where('password', md5($post["password"]))
      ->get($this->table)
      ->row();

    if ($cek) {
      $data = array(
        'user' => ($cek->username == 'admin' ? $this->m_user->getAdmin() : $this->m_user->get_user_by_username($cek->username)),
      );
      $data['perm'] = json_decode($data['user']->permission);
      
      $this->session->set_userdata($data);
      return true;
    }

    return false;
  }
  public function isNotLogin()
  {
    return $this->session->userdata('user') == null;
  }
}
