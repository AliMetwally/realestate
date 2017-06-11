<?php


class Dash_statistics extends CI_Controller{
    public function __construct() {
        parent::__construct();
        
        $this->load->model('model_dash_statistics');
    }
    
    public function user_work_statistics()
    {
        $statistics = $this->model_dash_statistics->user_work('2016-02-23', '2016-03-9');
        
        echo '<pre>';
        echo print_r($statistics);
        echo '</pre>';
        
    }
    
}
