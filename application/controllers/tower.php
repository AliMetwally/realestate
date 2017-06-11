<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Tower extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    // test the build tower 
    public function addTower()
    {
        echo $this->model_tower->buildTower();        
    }
    
    // check the tower owner tab data in v_tower view
    public function checkTowerOwner()
    {
        $response = array();
        if($this->form_validation->run('tower_owner') !== FALSE)
        {
            // if true
            $response['status'] = 'success';
        }
        else
        {
            $response['status'] = 'danger';
            $response['message'] = validation_errors();
        }       
            
        echo json_encode($response);
    }
    
    // validate the towe location
    public function checkTowrLocation()
    {        
        $response = array();
        if($this->form_validation->run('tower_location') !== FALSE)
        {
            $response['status'] = 'success';
        }
        else
        {
            $response['status'] = 'danger';
            $response['message'] = validation_errors();
        }
        
        echo json_encode($response);
    }
    // validate the tower garage and mezzanine
    public function checkTowerDetails1()
    {
        $response = array();
        $garage_no = $this->input->post('garage_no');
        $mezzanine_no = $this->input->post('mezzanine_no');        
        if (!empty($garage_no)) {
            // run the validation of garage data
            if($this->form_validation->run('tower_garage_data') !== FALSE)
            {
                $response['status'] = 'success';
            }
            else 
            {
                $response['status'] = 'danger';
                $response['message'] = validation_errors();
            }
        }
        else // in case of there is no garage in the tower
        {
            $response['status'] = 'success';
        }
        
        if (!empty($mezzanine_no)) {
            // run the validation of mezzanine data
            if($this->form_validation->run('tower_mezzanine_data') !== FALSE)
            {
                $response['status'] = 'success';
            }
            else
            {
                $response['status'] = 'danger';
                $response['message'] = validation_errors();
            }
        }
        
        
        echo json_encode($response);
    }
    
    // check the details 2 managerial units
    public function checkTowerUnits()
    {
        $response = array();
        $managerial_units = $this->input->post('managerial_units');
        if (!empty($managerial_units)) {
            if ($this->form_validation->run('tower_units') !== FALSE) {
                $response['status'] = 'success';
            }
            else
            {
                $response['status'] = 'danger';
                $response['message'] = validation_errors();
            }
        }
        else // in case of there is no managerial units in tower
        {
            $response['status'] = 'success';
        }
        
        echo json_encode($response);
    }
    
    // check the shops details 3
    public function checkTowerShops()
    {
        $response = array();
        $shop_no = $this->input->post('shop_no');
        
        if (!empty($shop_no)) {
           if ($this->form_validation->run('tower_shops') !== FALSE) {
               $response['status'] = 'success';
           }
           else
           {
               $response['status'] = 'danger';
               $response['message'] = validation_errors();
           }
        } 
        else {
            $response['status'] = 'success';
        }
        
        echo json_encode($response);
    }
    
    // check the flat data and save the all tower 
    public function checkTowerFlat()
    {
        $response = array();
        if ($this->form_validation->run('tower_flat') !== FALSE) 
        {
            // save the tower data
            $result = $this->model_tower->buildTower(); // this function return the affected rows of flase if transaction fails
            if ($result) {
                $response['status'] = 'success';
                $response['message'] = 'تم ادخال بيانات البرج بنجاح';
            }
            else
            {
                $response['status'] = 'danger';
                $response['message'] = 'خطأ فى الادخال بسبب قاعدة البيانات';
            }
        }
        else
        {
            $response['status'] = 'danger';
            $response['message'] = validation_errors();
        }
        echo json_encode($response);
    }
    
    //--------------------------------------------------------------------------
    
}