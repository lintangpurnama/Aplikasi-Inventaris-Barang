<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_departement_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table     = 'm_departement';
    }
    public function getAllData()
    {
        return $this->db->get($this->table);
    }
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->affected_rows();
    }

    public function getDataBy($data)
    {
        return $this->db->get_where($this->table, $data);
    }
    public function delete($data)
    {
        $this->db->delete($this->table, $data);
        return $this->db->affected_rows();
    }
}
