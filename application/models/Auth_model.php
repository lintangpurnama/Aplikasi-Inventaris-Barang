<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table     = 'm_user';
        $this->tableUserRole = 'm_user_role';
        $this->tableToken    = 'tr_user_token';
    }

    public function getDataBy($data)
    {
        $this->db->select('a.*,b.role_name');
        $this->db->join($this->tableUserRole . ' b', 'a.user_role_id=b.id');
        return $this->db->get_where($this->table . ' a', $data);
    }
    public function insertToken($data)
    {
        $this->db->set('id', 'UUID()', FALSE);
        $this->db->insert($this->tableToken, $data);
        return $this->db->affected_rows();
    }
    public function getDataTokenBy($data)
    {
        $this->db->order_by('created_at', 'DESC'); //menampilkan data terbaru
        $this->db->limit(1); //menampilkan data hanya 1 
        return $this->db->get_where($this->tableToken, $data);
    }

    public function update($data, $where)
    {
        $this->db->update($this->table, $data, $where); //update table user
        return $this->db->affected_rows();
    }

    public function deleteToken($where)
    {
        $this->db->delete($this->tableToken, $where);
        return $this->db->affected_rows();
    }
}
