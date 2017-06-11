<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Client extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_client');
    }
    
    
    public function client_status()
    {
        $client_status = array();
        
        
        $client_phone = $this->input->get('client_phone');
        
        $first = $this->input->post('first_name');
        $second = $this->input->post('last_name');
        
        $client = $this->model_client->matched_client($client_phone);
        
        if ($client) // exist client
        {            
            $current_sales = $this->session->userId;
            // get the client deals
            $client_id = $client->client_id;            
            $property_name;
            
            // check if the client is shared in more than deal
            $shared_client = $this->model_client->check_shared_client($current_sales, $client_id);
            
            // get the proprety_id
            $deals = $this->model_client->client_deals($client_id, $current_sales);                        
            // check if there is deals with the current sales
            $current_deal = null;
            if ($deals) {
                $deal_property_id = $deals[0]->property_id;
                $current_deal = $deals[0]->deal_id;
            }            
            
            // if there is property 
            if (isset($deal_property_id)) {
                $property_name = $this->model_property->property_name($deal_property_id);
            }
            else
            {
                $property_name = 'لم يتم اختيار الوحدة';
            }
            
            if ($shared_client)
            {
                $client_status['type_text'] = 'عميل مشترك';
                $client_status['client_type'] = 3; // means shared client
                $client_status['client_info'] = $client;
                $client_status['proprety_name'] = $property_name;
                $client_status['current_deal'] = $current_deal;
            }
            else
            {
                $client_status['client_type'] = 2; // means new client
                $client_status['type_text'] = 'عميل حالي';
                $client_status['client_info'] = $client;
                $client_status['proprety_name'] = $property_name;
                $client_status['current_deal'] = $current_deal;
            }
        }
        else // new client
        {
            $client_status['client_type'] = 1; // means new client
            $client_status['type_text'] = 'عميل جديد';
        }
        
        echo json_encode($client_status);
        
    }
    
    // test
    public function createClient()
    {        
        $result = $this->model_client->addClient();
        echo $result;
    }
    
    //test
    public function createDeal()
    {        
        $result = $this->model_client->addDeal();
        echo $result;
    }
    
    //test
    public function createFollow($deal_id)
    {
        $result = $this->model_client->addFollow($deal_id);
        echo $result;
    }
    
    
    /*
     * this function work based on the client status
     */
    public function saveCall()
    {        
        $client_flag = $this->input->post('client_flag');
        $client_id;
        $deal_id;
        $follow_up_id;
        $client_status = $this->input->post('client_status');
        if ($client_status == 1) // in case of new client
        {
            // is a transaction
            $this->db->trans_start();
            // add a new client
            $client_id = $this->model_client->addClient();
            
            // add a deal transaction 
            $deal_id = $this->model_client->addDeal($client_id);
            
            // add the follow up
            $follow_up_id = $this->model_client->addFollow($deal_id);
            
            // add the notification
            $notification_type = $this->input->post('notification_type');
            if ($notification_type != 0) {
                $this->model_client->addNotification($follow_up_id, $deal_id); // +1 because insert_db don't work because of trigger
            }
            // end the transaction
            $this->db->trans_complete();
            
            redirect('sales', 'refresh');
        }
        elseif($client_status == 2) // in case of current employee 
        {
            $property_id = $this->input->post('property_id');
            // start the transaction
            $this->db->trans_start();
            $current_deal_id = $this->input->post('current_deal'); // get the current_deal from hidden input
            $client_id = $this->model_client->get_client_id_by_deal($current_deal_id);
            // set the client status
            $this->model_client->update_client_status($client_id, $client_status,$client_flag);
            
            // update the deal_status
            $deal_status = $this->input->post('deal_status');
            $this->model_client->update_deal_status($current_deal_id, $deal_status);
            
            // add the follow up
            $follow_up_id = $this->model_client->addFollow($current_deal_id);
            // add the proeprty if set
            if (!empty($property_id)) {
                $this->model_client->updateDealProperty($current_deal_id);
            }
            // add the notification
            $notification_type = $this->input->post('notification_type');
            if ($notification_type != 0) {
                $this->model_client->addNotification($follow_up_id, $current_deal_id); // +1 because insert_db don't work because of trigger
            }            
            $this->db->trans_complete();
            redirect('sales', 'refresh');
        } 
        elseif ($client_status == 3) { // in case of shared client
            $user_id = $this->session->userId;
            // get the client id 
            $current_deal_id = $this->input->post('current_deal'); // get the current_deal from hidden input
            // get the client id by deal id
            if (!empty($current_deal_id)) {
                $client_id = $this->model_client->get_client_id_by_deal($current_deal_id);
                echo $this->db->last_query();
            }
            // get the client_id by client phone if the client is new 
            else {
                $client_phone = $this->input->post('client_phone');
                $client_id = $this->model_client->matched_client($client_phone)->client_id;
                
            }
            /* check if the client is shared and new or shared and current
             * he will shared and current if he has deals with the current sales
             */
            // this get the deals records of current user or return false
            $current_shared_client = $this->model_client->client_deals($client_id, $user_id);

            if ($current_shared_client) { // the client is shared and old
                $property_id = $this->input->post('property_id');
                // start the transaction
                $this->db->trans_start();

                // add the follow up            
                $current_deal_id = $this->input->post('current_deal'); // get the current_deal from hidden input
                $follow_up_id = $this->model_client->addFollow($current_deal_id);
                // add the proeprty if set
                if (!empty($property_id)) {
                    $this->model_client->updateDealProperty($current_deal_id);
                }
                // add the notification
                $notification_type = $this->input->post('notification_type');
                if ($notification_type != 0) {
                    $this->model_client->addNotification($follow_up_id, $current_deal_id); // +1 because insert_db don't work because of trigger
                }
                $this->db->trans_complete();
                redirect('sales', 'refresh');
            } 
            else 
                { // the client is shared is new to me 
                // is a transaction
                $this->db->trans_start();
                // set the client status
                $this->model_client->update_client_status($client_id, $client_status,$client_flag);
                // add a deal transaction 
                $deal_id = $this->model_client->addDeal($client_id);

                // add the follow up
                $follow_up_id = $this->model_client->addFollow($deal_id);

                // add the notification
                $notification_type = $this->input->post('notification_type');
                if ($notification_type != 0) {
                    $this->model_client->addNotification($follow_up_id, $deal_id); // +1 because insert_db don't work because of trigger
                }
                // end the transaction
                $this->db->trans_complete();

                redirect('sales/follow_up_work', 'refresh');
            }
        }
        // end of if .. else
    }
    
    /*
     * get the client follow up data
     */
    public function client_follow_up($client_id)
    {
        $data['follow'] = $this->model_client->get_client_follow_up($client_id);
        
        echo json_encode($data['follow']);
        //$this->load->view('segment/client/client_follow_up',$data);
    }
    
    public function client_all_follow_up($client_id)
    {
        $data['client_follow'] = $this->model_client->get_client_follow_up($client_id);
        
        $this->load->view('public/sales/v_client_follow_up',$data);
    }
    
    /*
     * this function display the current client follow
     */
    public function current_client_follow($client_id)
    {
        $current_user = $this->session->userId;
        $data['client_follow'] = $this->model_client->get_current_client_follow($client_id, $current_user);
        
        $this->load->view('public/sales/v_client_follow_up', $data);        
    }
    
    /*
     * this function display the shared client follow
     */
    public function shared_client_follow($client_id)
    {
        $current_user = $this->session->userId;
        $data['client_follow'] = $this->model_client->get_shared_client_follow($client_id, $current_user);
        
        $this->load->view('public/sales/v_client_follow_up', $data); 
    }
    
    public function close_client($client_id){
        $this->model_client->close_client($client_id);
        redirect('client_info/user_clients', 'refresh');
    }
}
