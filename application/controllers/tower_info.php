<?php


class tower_info extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        // load the models 
        $this->load->model('model_tower_info');
    }
    
    public function showAllTowers()
    {
        $towers = $this->model_tower_info->getAllTowers();
        
        echo '<pre>';
        echo print_r($towers);
        echo '</pre>';
    }
    
    public function getTower($tower_id)
    {
        $tower_data = $this->model_db->getSingleRow('tower', '*', array('tower_id'=>$tower_id));
        echo '<pre>';
        echo $tower_data->tower_name.' '; 
        echo $tower_data->created_by;
        echo '</pre>';        
    }
    
}
