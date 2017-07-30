<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_search_Property extends CI_Model {
    /*
     * Make a Dynamic Datatable
     * That get properties data from view v_property_data
     */
    
    //column to display
    var $select_column = array('property_id', 'property_type_name', 'key_number', 'owner_name',
        'owner_phone', 'area_name', 'requested_price', 'installment_price', 'floor', 'area', 'status_name');
    
    var $data_source = 'v_property_data'; // a view that contains data 
    
    // column to allow order features
    var $order_column = array(null, 'property_type_name', 'key_number', 'owner_name',
        'owner_phone', 'area_name', 'requested_price', 'installment_price', 'floor', 'area', null);
    
    public function make_query()
    {
        $this->db->select($this->select_column);
        $this->db->from($this->data_source);
        
        // define in which column to search 
        if (isset($_POST["search"]["value"]))
        {
            $this->db->like('owner_name', $_POST["search"]["value"]);
        }
        if (isset($_POST["order"]))
        {
            $this->db->order_by($this->order_column[$_POST["order"][0]['column']], $_POST["order"][0]['dir']);
        }
        else
        {
            $this->db->order_by('property_id', 'DESC');
        }
    } 
    // end of make query 
    /**************************************************************************/
    public function make_datatable()
    {
        $this->make_query();
        if ($this->input->post("length") != -1 )
        {
            $this->db->limit($this->input->post("length"), $this->input->post("start"));
        }
        
        $query = $this->db->get();
        return $query->result();
    } 
    // end of make_datatable    
    /**************************************************************************/
    
    function get_filtered_data()
    {
        $this->make_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    // end of get_filtered_data
    /**************************************************************************/
    function get_all_data()
    {
        $this->db->select('*');
        $this->db->from($this->data_source);
        return $this->db->count_all_results();
    }
    //get_all_data
    /**************************************************************************/
    /*
     * ******************************************************
     * ******************************************************
     */
    public function getProperties() {
        $data = $this->input->get();
        $where = array(); // search array
        /*
         * check first is there a value 
         * if there is a value add it to the where condition array
         */
        foreach ($data as $key => $value) {
            // check is empty or = 0 or is not set
            if (isset($value) && $value != '0' && !empty($value)) {
                if ($key === 'min_price') {
                    $this->db->where('requested_price >=', $value);
                } elseif ($key === 'max_price') {
                    $this->db->where('requested_price <=', $value);
                } elseif ($key === 'min_floor') {
                    $this->db->where('floor >=', $value);
                } elseif ($key === 'max_floor') {
                    $this->db->where('floor <=', $value);
                } elseif ($key === 'client_phone_empty') {
                    $this->db->where('1 =', 1);
                } else {
                    $where[$key] = $value;
                }
            }
        } // end of for
        if ($key === 'tower_id') {
            $this->db->where('tower_id', $value);
        }
        $this->db->where_not_in('status', array(8, 9)); // 8 for deleted and 9 for sold
        $this->db->where('is_confirmed', 1);
//        $where = array(
//            'property_type' => 1
//        );
        // the display columns 
        // 'property_id', 'requested_price', 'status', 'status_name', 'street', 'property_type_name', 'area',
        $columns = array('property_id', 'owner_name', 'owner_phone', 'tower_id', 'key_number', 'requested_price',
            'status', 'status_name', 'street', 'property_type_name', 'area',
            'area_name', 'installment_price', 'floor', 'license', 'status_name', 'is_confirmed');

        $order = 'key_number desc';

        $properties = $this->model_db->read('v_property_data', $columns, $where, $order);

        return $properties;
    }

    public function getNonExistProperties() {
        $data = $this->input->get();
        $where = array(); // search array
        foreach ($data as $key => $value) {
            // check is empty or = 0 or is not set
            if (isset($value) && $value != '0' && !empty($value)) {
                if ($key === 'min_price') {
                    $this->db->where('min_price >=', $value);
                } elseif ($key === 'max_price') {
                    $this->db->where('max_price <=', $value);
                } elseif ($key === 'min_floor') {
                    $this->db->where('min_floor >=', $value);
                } elseif ($key === 'max_floor') {
                    $this->db->where('max_floor <=', $value);
                } elseif ($key === 'client_phone') {
                    $this->db->where('client_phone =', $value);   
                } else {
                    $where[$key] = $value;
                }
            }
        }
        if ($key === 'tower_id') {
            $this->db->where('tower_id', $value);
        }
        if ($key === 'state_id') {
            $this->db->where('state_id =', $value);
        }
        $columns = array('client_name', 'client_phone','finishing_name',
            'property_type_name', 'area','area_name', 'min_price', 'max_price', 'min_floor', 'max_floor');
        $properties = $this->model_db->read('v_non_exist_property', $columns, $where);

        return $properties;
    }

    // get the new properties 
    public function new_properties() {
        $where = array(
            'create_date >= ' => date('Y-m-j', strtotime('-7 day', strtotime(date('Y-m-d')))),
            'create_date <= ' => date('Y-m-d'),
            'is_confirmed' => 1 // the property is confirmed
        );
        $columns = array('property_id', 'owner_name', 'owner_phone', 'tower_id', 'key_number', 'requested_price',
            'status', 'status_name', 'street', 'property_type_name', 'area',
            'area_name', 'installment_price', 'floor', 'license', 'status_name');
        $properties = $this->model_db->read('v_property_data', $columns, $where);
        // echo $this->db->last_query();
        return $properties;
    }

    public function stopped_properties() {
        $where = array(
            'create_date >= ' => date('Y-m-d'),
            'create_date <= ' => date('Y-m-j', strtotime('+7 day', strtotime(date('Y-m-d')))),
        );

        $this->db->where_in('status', array(8, 9)); // stopped and sold properties
        $columns = array('property_id', 'owner_name', 'owner_phone', 'tower_id', 'key_number', 'requested_price',
            'status', 'status_name', 'street', 'property_type_name', 'area',
            'area_name', 'installment_price', 'floor', 'license', 'status_name');
        $properties = $this->model_db->read('v_property_data', $columns);
//        echo $this->db->last_query();
        return $properties;
    }

    public function unconfirmed_properties() {
        $where = array(
            'is_confirmed' => 0,
            'tower_id' => 0
        );
        $columns = array('property_id', 'owner_name', 'owner_phone', 'tower_id', 'key_number', 'requested_price',
            'status', 'status_name', 'street', 'property_type_name', 'area',
            'area_name', 'installment_price', 'floor', 'license', 'status_name', 'is_confirmed');

        $properties = $this->model_db->read('v_property_data', $columns, $where);
        //  echo $this->db->last_query();
        return $properties;
    }

    public function unconfirmed_towers() {
        $columns = array('tower_id', 'tower_name', 'area_name', 'street');
        $where = array(
            'is_confirmed' => 0
        );

        $not_where = 'tower_id';
        $not_val = array(
            0
        );
        $tower = $this->model_db->read('v_property_data', $columns, $where, NULL, $not_where, $not_val);
        return $tower;
    }

    public function unconfirmed_properties_num() {
        $query = $this->db->query('Select property_id from v_property_data where is_confirmed = 0');
        return $query->num_rows();
    }

}

//  end of class
