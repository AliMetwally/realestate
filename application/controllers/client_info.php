<?php

/*
 * this class contains information about the client statistics
 */
class Client_info extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('model_client_info');
    }
    
    // test
    public function user_clients()
    {
        // get the role 
        $user_role = $this->session->role;
        if ($user_role == 3) {
            $user_id = $this->session->userId;
            $template = 'sales-master';
        }
        elseif($user_role == 1)
        {
            $user_id = 'user_id'; // to get all users
            $template = 'manager_template';
        }
        
        $user_clients = $this->model_client_info->get_user_clients($user_id);
        $data['title'] = 'بيانات العملاء';
        $data['user_clients'] = $user_clients;
        
        $this->template->load($template, 'public/client/v_clients', $data);        
    }
}
