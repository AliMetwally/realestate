<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_Client extends CI_Model
{

    private $_tableClient = 'client';
    private $_tableDeals = 'deals';
    private $_tableDealSales = 'deal_sales';
    private $_tableFollowUp = 'deals_follow_up';
    private $_tableFollowNotification = 'follow_up_notification';
    private $_v_client_follow_up = 'v_client_follow_up';

    /*
     * This function determine if the client exist or not
     * this function return client status 
     * return false if the client not exist 
     * return the client data if exist
     */
    public function matched_client($client_phone)
    {         
        // check if the employee exist is the database
        $client = $this->model_db->isRecordExist($this->_tableClient, array('client_phone' => $client_phone));
        
        return $client;
        
    } // end of function
    
    /*
     * this function check if the client shared in in deals 
     * this function return false if the client not shared
     * or array of shared deals
     */
    public function check_shared_client($user_id, $client_id) 
    {
        $where = array(
            'client_id' => $client_id,
            'current_sales != ' => $user_id
        );
        
        $columns = 'deal_id, deal_date, deal_price, deal_status, property_id, client_id, current_sales, created_date, created_by';
        $shared_deals = $this->model_db->read($this->_tableDeals, $columns, $where);
        return $shared_deals;
    }
    
    /*
     * update the client status
     */
    
    public function update_client_status($client_id, $client_status,$client_flag)
    {
        $date = array('client_status' => $client_status,'client_flag' => $client_flag);
        $where = array('client_id' => $client_id);
        $this->model_db->update($this->_tableClient, $date, $where);
        
    }
    
    /*
     * get client_id by deal_id
     */
    
    public function get_client_id_by_deal($deal_id)
    {
        $client_id = $this->model_db->getSingleRow($this->_tableDeals, 'client_id', array('deal_id'=> $deal_id))->client_id;
        return $client_id;
    }

    /*
     * this function check if the client has transactions with the sales
     */
    public function client_deals($client_id, $user_id)
    {
        $deals = $this->model_db->read($this->_tableDeals,array('*') ,array('client_id'=>$client_id,'current_sales' => $user_id));
        return $deals;
    } // end of client_sales
    
    /*
     * create a new client and return a client id
     */
    public function addClient()
    {
        // clent id is auto generated
        $insert = array(
            'client_phone' => $this->input->post('client_phone'),
            'first_name' => $this->input->post('first_name'),
            'second_name' => $this->input->post('last_name'),
            'created_by' => $this->session->userId,
            'state_id' => $this->input->post('client_state_id'),
            'area_id' => $this->input->post('client_area_id'),
            'client_flag' => $this->input->post('client_flag')
        );
        
        $this->model_db->create($this->_tableClient, $insert);
        
        return $this->db->insert_id();
        
    } // end of addClient
    
    /*
     * this function create a deal and return the deal id
     * note that the property id and the client id may be passed
     */
    public function addDeal($client_id)
    {
        
        // deal id is auto generated
        $insert = array(
            'deal_date' =>      $this->input->post('deal_date'),
            'deal_price' =>     $this->input->post('deal_price'),
            'deal_status' =>    $this->input->post('deal_status'),
//            'property_id' =>    ,
            'client_id' =>      $client_id,
            'current_sales' =>   $this->session->userId
        );
        $property_id = $this->input->post('property_id');
        if (!empty($property_id)) {
            $insert['property_id'] = $property_id;
        }
        $this->model_db->create($this->_tableDeals, $insert);
        
        $deal_id = $this->db->insert_id();
        
        $deal_sales = array('user_id' => $this->session->userId,
                            'deal_id' => $deal_id
            );
        
        // add the deal to sales
        $this->model_db->create($this->_tableDealSales, $deal_sales );
        
        return $deal_id;
    } // end of addDeal
    
    /*
     * this function update the deal status in case of old deals
     */
     public function update_deal_status($deal_id, $deal_status) {
        $update = array('deal_status' => $deal_status);
        $where = array('deal_id' => $deal_id);
        $this->model_db->update($this->_tableDeals, $update, $where);
    }// end of update_deal_status


    public function updateDealProperty($deal_id) {
        $updaet = array(
            'property_id' => $this->input->post('property_id')
        );
        $this->model_db->update($this->_tableDeals, $updaet, array('deal_id'=>$deal_id));
     }

          public function addFollow($deal_id)
     {
         $insert = array(
            'follow_up' =>          $this->input->post('follow_up'),
            'follow_up_type' =>     $this->input->post('follow_up_type'),
            'follow_up_date'=>      $this->input->post('follow_up_date'), 
            'user_id' =>            $this->session->userId, //session
            'deal_id' =>            $deal_id,
            'who_call' =>           $this->input->post('who_call')
         );
         $this->model_db->create($this->_tableFollowUp, $insert);
         
         return $this->model_helper->get_max_id($this->_tableFollowUp, 'follow_up_id', array('deal_id'=>$deal_id))->follow_up_id;
     } // addFollow
     
     public function addNotification($follow_up_id, $deal_id)
     {
         // may follow up id, deal_is send as a parameter
         $insert = array(
             'notification_type' =>     $this->input->post('notification_type'),
             'notification_date' =>     $this->input->post('notification_date'),
             'follow_up_id' =>          $follow_up_id,
             'user_id' =>               $this->session->userId,
             'deal_id' =>               $deal_id
         );
         
         $this->model_db->create($this->_tableFollowNotification, $insert);
         
         return $this->db->insert_id();
     } // end of addNotification
     
     /*
      * this function return all 
      */
    public function get_client_follow_up($client_id)
    {
        $columns = array('*');
        $where = array(
            'client_id' => $client_id
        );
        $order = ('follow_up_id');
        $follows = $this->model_db->read($this->_v_client_follow_up, $columns, $where,$order);
        return $follows;
    }
    
    public function get_client($client_phone){
        
        $query = $this->db->query("select client_id from client where client_phone = $client_phone");
        
        return $query;
    }
    
    /*
     * this function get the follow up of the client with the currnet sales
     */
    public function get_current_client_follow($client_id, $user_id)
    {
        $where = array(
            'client_id' => $client_id,
            'user_id' => $user_id
        );
        $current_follow = $this->model_db->read($this->_v_client_follow_up, '*', $where);
        return $current_follow;
    }
    
    /*
     * this function get the shared client follow
     */
    public function get_shared_client_follow($client_id, $user_id)
    {
        $where = array(
            'client_id' => $client_id,
            'user_id != ' => $user_id
        );
        $current_follow = $this->model_db->read($this->_v_client_follow_up, '*', $where);
        return $current_follow;
    }
    
    public function close_client($client_id)
    {
        $date = array('close_client' => 2);
        $where = array('client_id' => $client_id);
        $this->model_db->update($this->_tableClient, $date, $where);
        
    }
    public function getClientInfo($client_id) {
        $columns = array('*');
        $where = array(
            'client_id' => $client_id
        );
        $client = $this->model_db->read('client', $columns, $where);
        return $client;
    }
}

// end of class