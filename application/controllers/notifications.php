<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Notifications extends CI_Controller{
    public function __construct() {
        parent::__construct();
    }
    
    public function show_notifications()
    {
        $user_id = $this->session->userId;
        $result = $this->model_notifications->get_notifications($user_id);
        echo '<pre>';
        echo print_r($result);
        echo '</pre>';
    }
    
    public function index() {
        $data['title'] = 'التنبيهات';    
        $user_role = $this->session->role;
//        $user_id = $this->session->userId;
        $from_date = new DateTime($this->input->get('from_date'));
        $to_date = new DateTime($this->input->get('to_date'));
        $user_no = $this->input->get('user_id');
        $today = date('Y-m-d');
//        $emptoday = "2016-03-12";
        $data['daily_notifications'] = $this->model_notifications->all_daily_notifications($user_no,date_format($from_date,'Y-m-d'),date_format($to_date,'Y-m-d'));
        
        if ($user_role == 1){ 
        $data['daily_notification_manager'] = $this->model_notifications->all_daily_notifications_manager2($today);  
        }else{
        $data['daily_notification_manager'] = $this->model_notifications->all_daily_notifications_manager($user_id,$today);
        }
//        $data['new_properties'] = $this->model_search_property->new_properties();
        $this->template->load('notification_template','public/manager/v_manager_notifications', $data);
//        echo $this->db->last_query();
    }
    
    public function Notification() {
        $data = array('title' => 'ادخال المناطق');
         $this->template->load('notification_template', 'public/manager/v_add_notification', $data);
    }
    
    public function addNotification() {
        // call the model function that save all property data
        $insert = array(
            'notification_to' => $this->input->get('notification_to'),
            'notification_description' =>$this->input->get('notification_description'),
            'notification_date' => $this->input->get('notification_date')
        );
        $this->model_db->create('manager_notifications', $insert);
        redirect('notifications', 'refresh');       
    }
}
