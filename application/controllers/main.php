<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
    
    function __construct() {
        
        parent::__construct();       
    }

    public function index() {
        
        $this->login();
    }
    
    public function login(){
        $data['title'] = 'العماد للتسويق العقاري';
        $this->load->view('public/pages/login', $data);
    }
    
        
    // validate the login
    public function checkLogin()
    {
        // array for the response message
        $response = array();
        if($this->form_validation->run('login') !== FALSE) // form validation success
        {
            // resiult is the user data
            $result = $this->model_user->checkLoginCredintials();
            if($result !== FALSE)
            {
                if($result->is_active != 0)
                {
                    $response['status'] = 'success';
                    $response['role'] = $result->role_id;
                    $this->doLogin($result);
                }
                else
                {
                    $response['status'] = 'danger';
                    $response['message'] = 'هذا المستخدم قد تم إلغاء تفعيله من المدير';
                }
            }
            else
            {
                $response['status'] = 'danger';
                $response['message'] = 'خطأ فى اسم المستخدم او كلمة المرور';
            }
        }
        else
        {
            $response['status'] = 'danger';
            $response['message'] = validation_errors();
        }
        echo json_encode($response);
    }
    
    // create function to add the user data to the session
    public function doLogin($user)
    {
        $this->model_user->createUserSession($user);
    }
    
    public function doLogout()
    {
        $this->session->sess_destroy();
        redirect('main', 'refresh');
    }
    
    // this function to redirect the user to page according to role
    public function loginContiune()
    {
        $role = $this->session->role;
       
        if($role == 1)
        {
            redirect('manager');
        }
        else if ($role == 2) {
            redirect('supervisor');
        }
        else if ($role == 3)
        {
            redirect('sales');
        }
        else if ($role == 4)
        {
            redirect('designer');
        }
    }
    
    public function success()
    {
        echo 'welcome admin';
    }

}
