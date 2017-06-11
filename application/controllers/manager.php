<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Manager extends CI_Controller{
    public function __construct() {
        parent::__construct();
        
        $this->load->model('model_tower_info');
        $this->load->model('model_dash_statistics');
        $this->load->model('model_success_deals');
        $this->load->model('model_search_property');
        $this->load->model('model_follow_up');
        $this->load->model('model_client');
        // check the session  
        $this->model_helper->checkSession(1);
        
        $unconfirmed_property_num = $this->model_search_property->unconfirmed_properties_num();
        $this->session->set_userdata(array('unconfirmed_num' => $unconfirmed_property_num));
    }
    
    public function index()
    {
        $this->manager_dashboard();
    }
    
    /************************* manager pages **********************************/
    
    // main dashboard page
    public function manager_dashboard()
    {
        $date_from = $this->input->get('from_date');
        $date_to = $this->input->get('to_date');
        $user_role = $this->session->role;
        $user_id = $this->session->userId;
        $data['title'] = 'الرئيسية';
        //$data['page_header'] = 'الرئيسية';
        // towers data
        $data['towers_data'] = $towers = $this->model_tower_info->getAllTowers();
        // users data
        $data['users_data'] = $users = $this->model_user->getAllUsers();
        // sales statistics data
        $data['from_date'] = $date_from;
        $data['to_date'] = $date_to;        
        $data['sales_statistics'] = $this->model_dash_statistics->user_work($date_from ,$date_to);
        $data['sales_notifications'] = $this->model_dash_statistics->getNotifications($date_from ,$date_to);
        // get the count of unconfirmed properties 
        $unconfirmed_property_count = count($this->model_search_property->unconfirmed_properties());
        $unconfirmed_property_num = $this->model_search_property->unconfirmed_properties_num();
        $this->session->set_userdata(array('unconfirmed_num' => $unconfirmed_property_num));
        $this->template->load('manager_template', 'public/manager/v_manage_dashboard', $data);
    }
    public function getNotification() {
        $data['title'] = 'التنبيهات';    
        $user_role = $this->session->role;
//        $user_id = $this->session->userId;
        $from_date = $this->uri->segment(4);
        $to_date = $this->uri->segment(5);
        $today = date('Y-m-d');
        $user_no = $this->uri->segment(3);
//        $emptoday = "2016-03-12";
        $data['follow_details'] = $this->model_follow_up->getDetailsStatistics($user_no,$from_date,$to_date);
//        ech $this->db->
        $this->template->load('notification_template','public/manager/v_sales_follow', $data);
        
//        $data['daily_notifications'] = $this->model_notifications->all_daily_notifications($user_no,date_format($from_date,'Y-m-d'),date_format($to_date,'Y-m-d'));
////        echo $user_no;
////        echo $this->db->last_query();
//        if ($user_role == 1){ 
//        $data['daily_notification_manager'] = $this->model_notifications->all_daily_notifications_manager2($today);  
//        }else{
//        $data['daily_notification_manager'] = $this->model_notifications->all_daily_notifications_manager($user_id,$today);
//        }
//        $data['new_properties'] = $this->model_search_property->new_properties();
//        $this->template->load('notification_template','public/manager/v_manager_notifications', $data);
//        echo $this->db->last_query();
    }
    public function manager_deals()
    {
        $data['title'] = 'عمليات التسويق';
        $data['users_data'] = $users = $this->model_user->getAllUsers();
        $this->template->load('manager_template', 'public/manager/v_manager_deals', $data);
    }
    
    public function success_deals()
    {
        $data['title'] = 'الصفقات الناجحة';
        $data['success_deals'] = $this->model_success_deals->get_success_deals();
//        $data['confirmed_deals'] = $this->model_success_deals->get_confirmed_deals();
        $role = $this->session->role;
        if($role == 1)
        {
            $this->template->load('manager_template', 'public/manager/v_success_deals', $data);
        }
        else if ($role == 2)
        {
            $this->template->load('supervisor_template', 'public/manager/v_success_deals', $data);
        }
        
    }
    
    public function search_properties()
    {
        $data['title'] = "بحث المعروض";
        $data['display_flg'] = 1; // 1 for manager flag in case of manager flag display result with actions 
        $this->template->load('manager_template', 'public/property/v_display_all_properties', $data);        
    }
    
    // confirm a property 
    public function unconfirmed_property()
    {
        $data = array('title' => 'اعتماد الوحدات الجديدة');
        $data['unconfirmed_property'] = $this->model_search_property->unconfirmed_properties();
        $data['unconfirmed_towers'] = $this->model_search_property->unconfirmed_towers();        
//        echo $this->db->last_query();
        $this->template->load('manager_template', 'public/manager/v_confirm_property', $data);  
        
    }
    /*************************end manager pages *******************************/
    // test
    public function test_success()
    {
        $success_deals = $this->model_success_deals->get_confirmed_deals();
        echo '<pre>';
        echo print_r($success_deals);
        echo '</pre>';
    }
    /******************** segments requests ***********************************/
    public function showUserDeals($user_id)
    {        
        $data['user_deals'] = $this->model_deals->getAllDealsByUser($user_id);
        $this->load->view('segment/deals/v_user_deals', $data);
        
//        echo '<pre>';
//        echo print_r($data['user_deals']);
//        echo '</pre>';
    }
    
    
    public function showDealFollow($deal_id)
    {
        $data['follow_up'] = $this->model_deals->getDealFollowUp($deal_id);
        
        $this->load->view('segment/deals/v_deal_follow_segment',$data );
        
    }
    
    
    public function addSuccessDeal()
    {
        $this->model_success_deals->add_success_deal();
        // redirect to manage/success_deals
        redirect(base_url('manager/success_deals'));
    }
    
    public function confirm_property($property_id)
    {
        $data = array('is_confirmed' => 1);
        $where = array('property_id' => $property_id);
        $this->model_db->update('property',$data, $where );
        redirect('manager/unconfirmed_property');
    }
    
    public function confirm_tower($tower_id) {
        $data = array('is_confirmed' => 1);
        $where = array('tower_id' => $tower_id);
        $this->model_db->update('property',$data, $where );
        redirect('manager/unconfirmed_property');
    }
    
    public function areas() {
        $data = array('title' => 'ادخال المناطق');
         $this->template->load('manager_template', 'public/supervisor/v_areas', $data);
    }
    
    public function addArea() {
        // call the model function that save all property data
        $insert = array(
            'state_id' => $this->input->get('state_id'),
            'area_name' =>$this->input->get('area_name')
        );
        $this->model_db->create('area', $insert);
        redirect('manager/areas', 'refresh');       
    }
    
    public function NewUsers() {
        $data = array('title' => 'ادخال المناطق');
         $this->template->load('manager_template', 'public/supervisor/v_add_users', $data);        
    }
    
    public function AddNewuser() {
        $insert = array(
            'username' => $this->input->get('user_name'),
            'phone' =>$this->input->get('user_phone'),
            'user_id' =>$this->input->get('user_id'),
            'password' =>$this->input->get('user_pass'),
            'role_id' =>$this->input->get('role_id'),
            'created_by' => $this->session->userId                        
        );
        $this->model_db->create('user', $insert);
        redirect('manager_template/NewUsers', 'refresh');         
    }
    
    public function client_all_follow_up($client_id)
    {
        $data = array('title' => 'تفاصيل متابعات العميل');
        $data['client_follow'] = $this->model_client->get_client_follow_up($client_id);
        $data['client_info'] = $this->model_client->getClientInfo($client_id);
        
        $this->template->load('manager_template', 'segment/client/v_client_follow',$data);
    }
    
    
}
