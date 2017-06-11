<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Supervisor extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->model_helper->checkSession();
    }
    
    public function index()
    {
        $this->supervisor_home();
    }
    
    public function supervisor_home()
    {
        $user_id = $this->session->userId;        
        $today = date('Y-m-d');
        $data = array('title' => 'الرئيسية');
        $data['daily_notification_manager'] = $this->model_notifications->all_daily_notifications_manager($user_id,$today);
        $this->template->load('supervisor_template', 'public/supervisor/v_supervisor', $data);
    }
    
    public function areas() {
        $data = array('title' => 'ادخال المناطق');
         $this->template->load('supervisor_template', 'public/supervisor/v_areas', $data);
    }
    
    public function addArea() {
        // call the model function that save all property data
        $insert = array(
            'state_id' => $this->input->get('state_id'),
            'area_name' =>$this->input->get('area_name')
        );
        $this->model_db->create('area', $insert);
        redirect('supervisor/areas', 'refresh');       
    }
    
    public function NewUsers() {
        $data = array('title' => 'ادخال المناطق');
         $this->template->load('supervisor_template', 'public/supervisor/v_add_users', $data);        
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
        redirect('supervisor/NewUsers', 'refresh');         
    }
}
