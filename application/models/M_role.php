<?php

class M_role extends CI_Model {
    
    private $table = "tb_role";
    
    public function all()
    {
        return $this->db->select('*')->get($this->table)->result();
    }
    
    public function getById($uid) 
    {
        return $this->db->select('*')->where('uid', $uid)->get($this->table)->row();
    }
    
    public function add($post)
    {
        $post = $this->input->post();
        $perms = array_diff_key($post, array_flip(["name", "uid"]));
        $data['permission'] = json_encode($perms);
        $data['uid'] = $this->utils->uuid();
        $data['name'] = $post['name'];
        
        return $this->db->insert($this->table, $data);
    }
    
    public function update($post)
    {
        $post = $this->input->post();
        $perms = array_diff_key($post, array_flip(["name", "uid"]));
        $data['permission'] = json_encode($perms);
        $data['uid'] = $post['uid'];
        $data['name'] = $post['name'];
        
        return $this->db->where('uid', $data['uid'])->update($this->table, $data);
    }
    
    public function delete($uid)
    {
        return $this->db->delete($this->table, ['uid' => $uid]);
    }
}