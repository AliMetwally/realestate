<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_Property extends CI_Model{
    
    // tables
    private $_tableProperty = 'property';
    private $_tablePropertyDetails = 'property_details';
    private $_tableOwner = 'owner';
    private $_tableLayout = 'layout';
    private $_viewProperty = 'v_property_data';
    private $_tablePropertyImages = 'property_images';
    private $_tableclient = 'client';
    private $_tabledeals = 'deals';
    private $_tabledeal_sales = 'deal_sales';

    public function property_name($property_id) {
        $property_name = '';
        $property = $this->model_db->getSingleRow($this->_viewProperty, '*', array('property_id' => $property_id));
        
        if ($property) {
            $property_name .= !empty($property->key_number) ? 'كود الوحدة '.$property->key_number . ' , ': '';
            $property_name .= 'المنطقة  '.$property->area_name. ' , ';
            $property_name .= !empty($property->owner_name) ? ' المالك '.$property->owner_name. ' , '  : ' ';
            $property_name .= !empty($property->floor) ? ' الدور '.$property->floor. ' , '  : ' ';
        }
        return $property_name;
    }

//    private $property_id = $this->db->query('select sf_generate_property_id() property_id')->row()->property_id;
    
    public function addProperty($property_id, $owner_id)
    {
        // get the next property id 
        $installments_years = (int)$this->input->post('payment_year');
        $installments_months = (int)$this->input->post('payment_month');
        $installments = $installments_months + ($installments_years * 12);
        $commision = (float)$this->input->post('commission') / 100;
        
        
        $date = $this->input->post('date_on_market');
        $insert = array(
            'property_id' => $property_id,
            'requested_price' => $this->input->post('requested_price'),
            'property_type' => $this->input->post('property_type'),
            'date_on_market' => $this->db->query("select str_to_date('$date', '%d/%m/%Y') date_on_market")->row()->date_on_market,
            'commission' => $commision,
            //'payment_method' => $this->input->post('payment_method'),
            'installment_price' => $this->input->post('installment_price') ,
            'deposit' => $this->input->post('deposit'),
            'installments' => $installments,
            'area_id' => $this->input->post('area_id'),
            'state_id' => $this->input->post('state_id'),
            'street' => $this->input->post('street'),
            'owner_id' => $owner_id,
            'key_number' => $this->input->post('key_number'),
            'create_by' => $this->session->userId
        );
        
        // return the affected rows
        return $this->model_db->create($this->_tableProperty, $insert);
    }
    
    
    public function addPropertyDetails($property_id)
    {
        $tower_side = $this->input->post('tower_side');
        $insert = array(
            'property_id' => $property_id,
            'floor' => $this->input->post('floor'),
            'building_type' => $this->input->post('building_type'),
            'tower_side' => $tower_side != 0 ? $tower_side : null,
            'floors_num' => $this->input->post('floors_num'),
            'finishing' => $this->input->post('finishing'),
            'license_to' => $this->input->post('license_to'),
            'have_license' => $this->input->post('have_license') == 1 ? 1:0,
            'water_gauge' => $this->input->post('gauge_water'),
            'electricity_gauge' => $this->input->post('gauge_electricity'),
            'gase_gauge' => $this->input->post('gauge_gase'),
            'elevator' => $this->input->post('elevator')
        );
        
        $this->model_db->create($this->_tablePropertyDetails, $insert);
    }
    
    public function addOwner()
    {        
        $owner = $this->db->query('select sf_generate_owner_id() owner_id')->row()->owner_id;
        $insert = array(
            'owner_id' => $owner,
            'owner_name' => $this->input->post('owner_name'),
            'owner_phone' => $this->input->post('owner_phone'),
            'area_id' => $this->input->post('owner_area_id'),
            'state_id' => $this->input->post('owner_state_id'),
            'street' => $this->input->post('owner_street'),
            'create_by' => $this->session->userId
        );
        
        $this->model_db->create($this->_tableOwner, $insert);
        return $owner;
        
    }
    
      
        public function addLayout($property_id)
    {
        $insert = array(
            'property_id' => $property_id,
            'area' => $this->input->post('area'),
            'bedroom' => $this->input->post('bedroom'),
            'bathroom' => $this->input->post('bathroom'),
            'reception'=> $this->input->post('reception')
            );
        
            $this->model_db->create($this->_tableLayout, $insert);
    }
    
    public function buildProperty()
    {
        // get the property_id 
        $property_id = $this->db->query('select sf_generate_property_id() property_id')->row()->property_id;
        
        // start the transaction
        $this->db->trans_start();        
        // create the owner 
        $owner_id = $this->addOwner();
        
        // add the property 
        $result = $this->addProperty($property_id, $owner_id);
        
        // add the property details 
        $this->addPropertyDetails($property_id);
        
        // add the layout
        $layout_area = $this->input->post('area');
        $layout_bedroom = $this->input->post('bedroom');
        $layout_bathroom = $this->input->post('bathroom');
        
        if (isset($layout_area) || isset($layout_bedroom) || isset($layout_bathroom)) {
            $this->addLayout($property_id);
        }
        
        // end the transaction
        $this->db->trans_complete();
        // check the transaction error
        
        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        }
        else
        {
//            return $result; 
            return $property_id;
        }
               
    }
    
    public function getAllProperty()
    {
        return $this->db->get($this->_viewProperty)->result();
    }
    
    // property details view
    public function getAllPropertyDtails($property_id)
    {        
        //return $this->db->get_where($this->_viewProperty,array('property_id' => $property_id))->result();
        $property_details = $this->model_db->getSingleRow($this->_viewProperty, '*', array('property_id'=>$property_id));
        return $property_details;
    }
    
    public function getAllPropertyImages($property_id)
    {        
        return $this->db->get_where($this->_tablePropertyImages,array('property_id' => $property_id))->result();
    }
    
    public function getMinPropertyImage($property_id)
    {       
        $query = $this->db->query('select min(image_id) image_id from property_images where property_id ='.$property_id);
        return $query;
    }
    //--------------------------------------------------------------------------
    public function update_property_status($property_id, $status)
    {
        $data = array('status' => $status);
        $where = array('property_id' => $property_id);
        $this->model_db->update($this->_tableProperty, $data, $where);
    }
    //--------------------------------------------------------------------------
    public function get_next_key_number()
    {
        $this->db->select_max('key_number');
        $query = $this->db->get('property');        
        return $query->row()->key_number + 1;
    }
    
}