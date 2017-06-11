<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
 * this model to get all tower data by its id 
 */

class Model_Tower_Data  extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    private $_tableTower = 'tower';
    private $_viewProperty = 'v_property_data';


    // get the tower data from table tower
    public function getTowerData($tower_id)
    {
        $columns = array('tower_name', 'garage_no', 'mezzanine_no', 'managerial_units',
            'shop_no', 'floors_no', 'license_limit', 'flat_no');
        
        return $this->model_db->getSingleRow($this->_tableTower, $columns, array ('tower_id' => $tower_id), 'property_id');
    }
    
    // get property by type
    public function getTowerProperty($tower_id, $property_type)
    {
        $columns= array('property_id', 'requested_price', 'status_name', 'status'
            , 'property_type_name', 'area');
        $where = array(
            'tower_id' => $tower_id,
            'property_type' => $property_type
        );
        return $this->model_db->read($this->_viewProperty, $columns, $where, 'property_id');
    }
    
    
    //--------------------------------------------------------------------------
    public function boxStatus($status) {
        switch ($status) {
            case 0:
                $css_class = "offer-primary";
                break;
            case 9:
                $css_class = "offer-danger";
                break;
            case 1:
                $css_class = "offer-success";
                break;
//        case 0:
//            $css_class = "offer-primary";
//            break;
        }

        return $css_class;
    }
}
