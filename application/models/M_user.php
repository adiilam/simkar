<?php

class M_user extends CI_Model {
    
    private $table = "tb_auth";
    
    public function get_user_by_username($username) 
    {
        $query = "SELECT u.*, k.uid AS kar_uid, k.nama, k.foto, j.name AS jabatan, r.name AS role, r.permission FROM " . $this->table . " u "
        . "INNER JOIN tb_karyawan k ON u.karyawan_uid = k.uid "
        . "INNER JOIN tb_role r ON u.role_uid = r.uid "
        . "INNER JOIN tb_jabatan j ON k.jabatan_uid = j.uid "
        . "WHERE u.username = '${username}'";
        
        return $this->db->query($query)->row();
    }
    
    public function change_password($post)
    {
        $password = md5($post['password']);
        
        return $this->db->where('uid', $post['uid'])->update($this->table, ['password' => $password]);
    }
    
    public function getAdmin()
    {
        return $this->db->select('*')->where('username', 'admin')->get($this->table)->row();
    }
    
    public function all()
    {
        $query = "SELECT u.*, k.uid AS kar_uid, k.nama, k.foto, j.name AS jabatan, r.name AS role, r.permission FROM " . $this->table . " u "
        . "INNER JOIN tb_karyawan k ON u.karyawan_uid = k.uid "
        . "INNER JOIN tb_jabatan j ON k.jabatan_uid = j.uid "
        . "INNER JOIN tb_role r ON u.role_uid = r.uid";
        
        return $this->db->query($query)->result();
    }
    
    public function getById($uid)
    {
        $query = "SELECT u.*, k.uid AS kar_uid, k.nama, k.foto, j.name AS jabatan, r.name AS role, r.permission FROM " . $this->table . " u "
        . "INNER JOIN tb_karyawan k ON u.karyawan_uid = k.uid "
        . "INNER JOIN tb_jabatan j ON k.jabatan_uid = j.uid "
        . "INNER JOIN tb_role r ON u.role_uid = r.uid "
        . "WHERE u.uid = '${uid}'";
        
        return $this->db->query($query)->row();
    }
    
    public function add($post) 
    {
        $post['uid'] = $this->utils->uuid();
        $post['password'] = md5($post['password']);
        return $this->db->insert($this->table, $post);
    }
    
    public function update($post)
    {
        if (!empty($post['password']))
            $post['password'] = md5($post['password']);
            
        return $this->db->where('uid', $post['uid'])->update($this->table, $post);
    }
    
    public function delete($uid)
    {
        return $this->db->delete($this->table, ['uid' => $uid]);
    }
}