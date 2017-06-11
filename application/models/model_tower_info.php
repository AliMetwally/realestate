<?php


class Model_tower_info extends CI_Model{
    
    private $_tableTower = 'tower';
    private $_viewTowerData = 'v_tower_data';


    public function __construct() {
        parent::__construct();
    }
    
    public function getAllTowers()
    {
        $columns = array('*');
        $towers = $this->model_db->read($this->_viewTowerData, $columns);
        
        return $towers;
    }
}
