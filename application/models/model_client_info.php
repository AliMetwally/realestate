<?php

class model_client_info extends CI_Model{
    
    private $_v_user_clients = 'StockTable';
    public function __construct() {
        parent::__construct();
    }
    /*
    public function get_user_clients2($user_id = 'user_id')
    {
        $this->db->where('user_id', $user_id, FALSE);
        $this->db->where('is_active', 1);
        $this->db->where('close_client', 1);
        
        $user_clients = $this->model_db->read($this->_v_user_clients, '*');
        
        return $user_clients;
    }
    */
    public function get_user_clients($user_id = 'user_id')
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('close_client', 1);
        
        $user_clients = $this->model_db->read('v_user_client_2', '*');
        
        return $user_clients;
        
    }
    
} // end of file
