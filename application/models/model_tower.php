<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_Tower extends CI_Model{
    
    private $_tableTower = 'tower';
    private $_tableOwner = 'owner';
    private $_tableProperty = 'property';
    private $_tablePropertyDetails = 'property_details';
    private $_tableLayout = 'layout';
    
    // basic data from database lkp_property_type
    private $_flat_type = 1;
    private $_shop_type = 2;
    private $_garage_type = 3;
    private $_mezzanine = 4;
    private $_managerial_units = 5;

    public function __construct() {
        parent::__construct();
    }
    
    
    public function addTowerOwner($tower_id) // $tower_id
    {
//        $tower_id = 2;
        $tower_owner_id = $this->model_helper->getOwnerId();
        $insert = array(
            'owner_id' => $tower_owner_id,
            'owner_name' => $this->input->post('owner_name'),
            'owner_phone' => $this->input->post('owner_phone'),
            'has_tower' => $tower_id,
            'state_id' => $this->input->post('owner_state_id'),
            'area_id' => $this->input->post('owner_area_id'),
            'street' => $this->input->post('owner_street'),
            'create_by' => $this->session->userId
        );
        
        return $this->model_db->create($this->_tableOwner, $insert);
    }    
    //------------ end of addTowerOwner ----------------------------------------
    
    public function addTower()
    {
        // tower id is auto incremeanted
        
        // commissions 
        $garage_commission = (float) $this->input->post('garage_commission') / 100;
        $garage_installment_year = (int) $this->input->post('garage_payment_year');
        $garage_installment_month = (int) $this->input->post('garage_payment_month');
        $garage_installments = $garage_installment_month + ($garage_installment_year * 12);
        $shop_commission = (float) $this->input->post('shop_commission') / 100;
        $mezzanine_commission = (float) $this->input->post('mezzanine_commission') / 100;
        $managerial_units_commission = (float) $this->input->post('managerial_units_commission') / 100;
        $flat_commission = (float)$this->input->post('flat_commission')/100;
        
        $insert = array(
            'tower_name' => $this->input->post('tower_name'),
            'state_id' => $this->input->post('state_id'),
            'area_id' => $this->input->post('area_id'),
            'street' => $this->input->post('street'),
            
            'garage_no' => (int)$this->input->post('garage_no'),
            'garage_price' => (float) $this->input->post('garage_price'),
            'garage_commission' => $garage_commission,
            'garage_type' => $this->input->post('garage_type'),
            'garage_installment_price' => $this->input->post('garage_installment_price'),
            'garage_installments' => $garage_installments,
            
            'managerial_units' => (int) $this->input->post('managerial_units'),
            'managerial_units_commission' => $managerial_units_commission,
            
            'shop_no' => (int) $this->input->post('shop_no'),
            'shop_commission' => $shop_commission,
            'mezzanine_no' => (int) $this->input->post('mezzanine_no'),
            'mezzanine_commission' => $mezzanine_commission,
            
            'floors_no' => (int) $this->input->post('floors_no'),
            'flat_no' => (int) $this->input->post('flat_no'),
            'flat_commission' => $flat_commission,
            'license_limit' => $this->input->post('license_limit'),
            'elevator' => $this->input->post('elevator'),
            'created_by' => $this->session->userId
        );
        
        return $this->model_db->create($this->_tableTower, $insert);
        
    }    
    //---------------- end of addTower -----------------------------------------
    public function buildTower()
    {
        // address data
        $address_data = array(
            'state_id' => $this->input->post('state_id'),
            'area_id' => $this->input->post('area_id'),
            'street' => $this->input->post('street'), 
        );
        
        // start the transaction 
        $this->db->trans_start();
        // add the tower data
        $this->addTower();
        // get the tower id 
        $tower_id = $this->db->insert_id();
        // add the owner of the tower
        $this->addTowerOwner($tower_id);
        // number of created properties
        $properties_num = 0;
         
        // BUILD A GARAGE ------------------------------------------------------
        $garage_no = (int) $this->input->post('garage_no');        
        $garage_data = array(
            'commission' => $this->input->post('garage_commission') / 100,
            'requested_price' => $this->input->post('garage_price'),
            'installment_price' => $this->input->post('garage_installment_price') // single value
        ) + $address_data;
        
        $garage_details = array(
            'garage_type' =>$this->input->post('garage_type'),
            'payment_year' => $this->input->post('garage_payment_year'),
            'payment_month' => $this->input->post('garage_payment_month'),
            
        );
        
        $properties_num += $this->addPropertyTower($tower_id, $garage_no, $this->_garage_type, $garage_data, $garage_details);
        
        // BUILD SHOPS ---------------------------------------------------------
        $shop_no = (int) $this->input->post('shop_no');
        $shop_data = array(
            'commission' => $this->input->post('shop_commission') / 100
        ) + $address_data;
        
        // the area array of shops
        $shops_details = array(
            'area' => $this->input->post('shop_area'),
            'price' => $this->input->post('shop_price'),
            'entrance_width' => $this->input->post('entrance_width'),
            'water_gauge' => $this->input->post('shop_gauge_water'),
            'electricity_gauge' => $this->input->post('shop_gauge_electricity'),
            'gase_gauge' => $this->input->post('shop_gauge_gase'),
            //'payment_method' => $this->input->post('shop_payment_method'),
            'payment_year' => $this->input->post('shop_payment_year'),
            'payment_month' => $this->input->post('shop_payment_month'),
            'tower_side' => $this->input->post('shop_tower_side'),
            'installment_price' => $this->input->post('shop_installment_price')
            
        );
       
                
        $properties_num += $this->addPropertyTower($tower_id, $shop_no, $this->_shop_type, $shop_data, $shops_details);
        
        // BUILD mezzanine -----------------------------------------------------
        $mezzanine_no = (int) $this->input->post('mezzanine_no');
        $mezzanine_data = array(
            'commission' => $this->input->post('mezzanine_commission') / 100
        ) + $address_data ;
        
        $mezzanine_details = array (
            'area' => $this->input->post('mezzanine_area'),
            'price' => $this->input->post('mezzanine_price'),
            'payment_year' => $this->input->post('unit_payment_year'),
            'payment_month' => $this->input->post('unit_payment_month'),
            'installment_price' => $this->input->post('mezz_installment_price')
        );
        
        $properties_num += $this->addPropertyTower($tower_id, $mezzanine_no, $this->_mezzanine, $mezzanine_data, $mezzanine_details);
        
        // BUILD MANEGIRIAL UNITS ----------------------------------------------
        $managerial_units_no = (int) $this->input->post('managerial_units');
        $managerial_units_data = array(
            'commission' => $this->input->post('managerial_units_commission') / 100
        ) + $address_data;
        
        $managerial_units_details = array(
            'area' => $this->input->post('units_area'),
            'price' => $this->input->post('units_price'),
            'payment_year' => $this->input->post('unit_payment_year'),
            'payment_month' => $this->input->post('unit_payment_month'),
            'installment_price' => $this->input->post('unit_installment_price')
        );
        
        $properties_num += $this->addPropertyTower($tower_id, $managerial_units_no, $this->_managerial_units, $managerial_units_data, $managerial_units_details);
        
        // BUILD FLAT nestes for loops -----------------------------------------
        $floors_no = $this->input->post('floors_no');
        $flat_no = $this->input->post('flat_no');
        $license_limit = $this->input->post('license_limit'); // the license_limit 
        $flat_details = array (
            'area' => $this->input->post('flat_area'),
            'price' => $this->input->post('flat_price'),
            'finishing' => $this->input->post('flat_finishing'),
            'bedroom' => $this->input->post('bedroom'),
            'bathroom' => $this->input->post('bathroom'),
            'reception' => $this->input->post('reception'),
            'water_gauge' => $this->input->post('flat_gauge_water'),
            'electricity_gauge' => $this->input->post('flat_gauge_electricity'),
            'gase_gauge' => $this->input->post('flat_gauge_gase'),
            //'payment_method' => $this->input->post('flat_payment_method'),
            'tower_side' => $this->input->post('flat_tower_side'),
            'installment_price' => $this->input->post('flat_installment_price'),
            'payment_year' => $this->input->post('flat_payment_year'),
            'payment_month' => $this->input->post('flat_payment_month'),
            'elevator' => $this->input->post('elevator'), // single value
            'floors_num' => $this->input->post('floors_no'), // single value            
            'license_limit' => $license_limit
        );
        
        for($i = 0; $i < $floors_no ; $i++)
        {            
            $flat_data = array(
                'commission' => $this->input->post('flat_commission') / 100 ,                
            ) + $address_data;
            // here add the details of the flat 
            $properties_num += $this->addPropertyTower($tower_id, $flat_no, $this->_flat_type, $flat_data,$flat_details+array('floor' => $i));            
        }
        
        // end of the transaction
        $this->db->trans_complete();
        
        // check the transaction error 
        if ($this->db->trans_status() === FALSE) {
            // there is an error
            return FALSE;
        }
        else
        {
            return $properties_num;
        }
    }
    // -------------------- end of buildTower ----------------------------------
    
    // units for loop 
    private function addPropertyTower($tower_id,$units,$property_type, $insert_additional_data, $details = NULL)
    {
        $inserted_properties = 0;
        for($x = 0; $x < $units; $x++)
        {
            $property_id = $this->model_helper->getPropertyId();
            
            $property_data = array();
            // properties details 
            if (isset($details)) {
                
                $installments_year = isset($details['payment_year'][$x])? (int) $details['payment_year'][$x] : $details['payment_year'];
                $installment_months = isset($details['payment_month'][$x])? (int) $details['payment_month'][$x] : $details['payment_month'];
                $installments = $installment_months + ($installments_year * 12);
                $installment_price = isset($details['installment_price'][$x]) ? $details['installment_price'][$x] : $insert_additional_data['installment_price'];
                $property_data = array(
                    'requested_price' => isset($details['price'][$x]) ? $details['price'][$x] : $insert_additional_data['requested_price'] ,
                    'payment_method' => isset($details['payment_method'][$x]) ? $details['payment_method'][$x] : 1,
                    'installments' => $installments,
                    'installment_price' =>  $installment_price
                );
            }
            // common data
            $insert = array(
                'property_id' => $property_id,
                'tower_id' => $tower_id,
                'property_type' => $property_type,
                'create_by' => $this->session->userId
            )
             + $insert_additional_data + $property_data  // the addidtional data 
             ;
            
            // insert to the property table 
            $inserted_properties += $this->model_db->create($this->_tableProperty, $insert);
            
            // generate the property_details array
            $elevator = $property_type == 1 ? $details['elevator'] : 0;
            $floors_no = $property_type == 1 ? $details['floors_num'] : null;
            
            $floor = $property_type == 1 ? $details['floor'] + 1 : 0; // the $i starts from 0 add 1 to be accurate
            
            $have_license = $property_type == 1 && (int) $details['license_limit'] >= (int)$floor ? 1 : 0;
              
            $property_details_data = array(
               'property_id' => $property_id,
               'water_gauge' => isset($details['water_gauge'][$x]) ? $details['water_gauge'][$x] : null,
               'electricity_gauge' => isset($details['electricity_gauge'][$x]) ? $details['electricity_gauge'][$x] : null,
               'gase_gauge' => isset($details['gase_gauge'][$x]) ? $details['gase_gauge'][$x] : null,
               'finishing' => isset($details['finishing'][$x]) ? $details['finishing'][$x] : null,
               'elevator' => $elevator,
               'floors_num' => $floors_no,
               'floor' => $floor,
               'have_license' => $have_license,
               'building_type' => 1, // this means the building_type is a tower
               'tower_side' => isset($details['tower_side'][$x]) ? $details['tower_side'][$x] : null
            );
            // it will be empty in mezzanine and managerial units
            if ($property_type != 4 && $property_type != 5) { // in case of mezzanine don't add the property details 
                $this->model_db->create($this->_tablePropertyDetails, $property_details_data);
            }
            
            // generate the layout table
            $property_layout = array(
                'property_id' => $property_id,
                'area' => isset($details['area'][$x]) ? $details['area'][$x] : 0,
                'shop_width' => isset($details['entrance_width'][$x]) ? $details['entrance_width'][$x] : null,
                'bathroom' => isset($details['bathroom'][$x]) ? $details['bathroom'][$x] : null,
                'bedroom' => isset($details['bedroom'][$x]) ? $details['bedroom'][$x] : null,
                'reception' => isset($details['reception'][$x]) ? $details['reception'][$x] : null,
                'garage_type' => isset($details['garage_type']) ? $details['garage_type'] : null
            );
            $this->model_db->create($this->_tableLayout, $property_layout);
        }
        return $inserted_properties;
    }    
    // ------------------ end of addPropertyTower ------------------------------
    
   
    
}// end of class