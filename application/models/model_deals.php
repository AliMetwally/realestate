<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_deals extends CI_Model {

    private $_tableClient = 'client';
    private $_tableDeals = 'deals';
    private $_tableDealSales = 'deal_sales';
    private $_tableDealsFollowUp = 'deals_follow_up';
    private $_tableFollowUpNotification = 'follow_up_notification';
    private $_viewDealData = 'v_deal_data';
    private $_viewClientFollow = 'v_client_follow_up';
    private $_tableDealSalesCommission = 'deal_sales_commission';

    public function addClient() {
        $insert = array(
            'client_phone' => $this->input->post('client_phone'),
            'first_name' => $this->input->post('first_name'),
            'second_name' => $this->input->post('second_name'),
            'last_name' => $this->input->post('last_name'),
            'state_id' => $this->input->post('client_state_id'),
            'area_id' => $this->input->post('client_area_id'),
            'street' => $this->input->post('street'),
            'created_by' => $this->session->userId
        );
        $this->model_db->create($this->_tableClient, $insert);
    }

    public function addDeal($client_id, $property_id) {
        $insert = array(
            'deal_price' => $this->model_db->getSingleRow('property', 'requested_price', array('property_id'=>$property_id))->requested_price,
            'deal_status' => $this->input->post('deal_status'),
            'property_id' => $property_id,
            'client_id' => $client_id,
            'created_by' => $this->session->userId
        );
        $this->model_db->create($this->_tableDeals, $insert);
    }

    public function addDealSales($deal_id) {
        $insert = array(
            'user_id' => $this->session->userId,
            'deal_id' => $deal_id
        );
        $this->model_db->create($this->_tableDealSales, $insert);
    }

    public function addDealFollowUp($deal_id) {
        $date = $this->input->post('follow_up_date'); //strtr($this->input->post('follow_up_date'), '/', '/-');
        $insert = array(
            'follow_up' => $this->input->post('follow_up'),
            'follow_up_type' => $this->input->post('follow_up_type'),
            'follow_up_date' => $this->db->query("select str_to_date('$date', '%d-%m-%Y') follow_up_date")->row()->follow_up_date,
            'who_call' => $this->input->post('who_called'),
            'user_id' => $this->session->userId,
            'deal_id' => $deal_id
        );
        $this->model_db->create($this->_tableDealsFollowUp, $insert);
    }

    public function addFollowUpNotification($deal_id, $follow_up_id) {
        $date = $this->input->post('notification_date'); //strtr($this->input->post('notification_date'), '/', '/-');
        $insert = array(
            'notification_type' => $this->input->post('notification_type'),
            'notification_date' => $this->db->query("select str_to_date('$date', '%d-%m-%Y') notification_date")->row()->notification_date,
            'follow_up_id' => $follow_up_id,
            'deal_id' => $deal_id,
            'user_id' => $this->session->userId
        );
        $this->model_db->create($this->_tableFollowUpNotification, $insert);
    }

    public function buildDeal($property_id) {
        $this->addClient();

        //get client id
        $client_id = $this->db->insert_id();
        $this->addDeal($client_id, $property_id);

        //get deal id
        $deal_id = $this->db->insert_id();
        $this->addDealSales($deal_id);

        $this->addDealFollowUp($deal_id);
        
        $follow_up_id = $this->db->insert_id();
        $this->addFollowUpNotification($deal_id, $follow_up_id);
    }
    
    public function getAllDealsByUser($user_id = NULL) {
        $columns = array('*');
        $where   = array(
            'user_id' => $user_id
        );
        $deals = $this->model_db->read($this->_viewDealData, $columns,$where);
        //echo $this->db->last_query();
        return $deals;
    }
    
    public function getDealFollowUp($deal_id)
    {
        $where = array('deal_id'=>$deal_id);
        
        $follow_up = $this->model_db->read($this->_viewClientFollow, '*', $where);
        
        return $follow_up;
    }
    
    // add the deal price
    public function confirm_deal($deal_id, $deal_price,$deal_comm , $sales_comm)
    {
        $update = array(
            'deal_price' => $deal_price,
            'sales_comm' => $sales_comm,
            'deal_comm' => $deal_comm,
            'is_confirmed' => 1
        );
        
        $where = array('deal_id' => $deal_id);
        
        $this->model_db->update($this->_tableDeals, $update, $where);
    }
    
    // add the deal sales commissions 
    public function add_deal_sales_comm($deal_id, $sales_id, $comm_precentage, $comm_amount)
    {
        $data = array(
            'deal_id' => $deal_id,
            'sales_id' => $sales_id,
            'comm_percentage' => $comm_precentage,
            'comm_amount' => $comm_amount
        );
        
        $this->model_db->create($this->_tableDealSalesCommission, $data);
    }
}
