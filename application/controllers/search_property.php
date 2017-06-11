<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Search_Property extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getProperties()
    {
        $data['properties'] = $this->model_search_property->getProperties();  
        //echo $this->db->last_query();
        echo json_encode($data['properties']);        
    }
    
    
    public function getPropertiesTable()
    {
        $data['properties'] = $this->model_search_property->getProperties();  
        //echo $this->db->last_query();
        
        $this->load->view('segment/deals/result_property_segment', $data);
    }
    
    public function getPropertiesTableNonExist()
    {
        $data['properties'] = $this->model_search_property->getNonExistProperties();  
        //echo $this->db->last_query();
        
        $this->load->view('segment/deals/result_property_non_exist', $data);
    }
    
    public function get_properties_actions()
    {
        $data['properties'] = $this->model_search_property->getProperties();
        $this->load->view('segment/deals/v_result_property_actions', $data);
    }
    
    public function nonExistProperty() {
        $insert = array(
            'property_type' => $this->input->get('property_type'),
            'tower_id' =>$this->input->get('tower_id'),
            'state_id' =>$this->input->get('state_id'),
            'area_id' =>$this->input->get('area_id'),
            'area' =>$this->input->get('area'),
            'min_price' =>$this->input->get('min_price'),
            'max_price' =>$this->input->get('max_price'),
            'finishing' =>$this->input->get('finishing'),
            'min_floor' =>$this->input->get('min_floor'),
            'max_floor' =>$this->input->get('max_floor'),
            'client_phone' =>$this->input->get('client_phone_empty'),
            'created_by' => $this->session->userId                        
        );
        $this->model_db->create('non_exist_property', $insert);
        
    }
       
}

