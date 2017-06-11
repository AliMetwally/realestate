<?php

class Model_Helper extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function checkSession($role = '')
    {
        if(!$this->session->logged_in)
        {
            redirect('main', 'refresh');
        }
    }
    
    public function getOwnerId()
    {
        return $this->db->query('select sf_generate_owner_id() owner_id')->row()->owner_id;
    }
    
    public function getPropertyId()
    {
        return $this->db->query('select sf_generate_property_id() property_id')->row()->property_id;
    }
    
    public function get_max_id($table_name, $column_id, $where='')
    {
        $this->db->select_max($column_id,$column_id);
        if ($where) $this->db->where($where);
        $query = $this->db->get($table_name);
        return $query->row();
    }
    
    
}// end of class
