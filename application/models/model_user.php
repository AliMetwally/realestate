<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_User extends CI_Model
{
    private $_tableUser = 'user';
            
    function __construct() {
        parent::__construct();
        $this->load->model('model_db');
    }
    
    public function checkLoginCredintials()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        return $this->model_db->isRecordExist($this->_tableUser , array('user_id' => $username, 'password' => $password));
    }
    
    public function createUserSession($user)
    {
        $userInfo = array(
            'userId' => $user->user_id,
            'username' => $user->username,
            'role' => $user->role_id,
            'isActive' => $user->is_active,
            'logged_in' => TRUE
        );
        $this->session->set_userdata($userInfo);
    }
	
	public function getAllUsers(){
        $columns = array('*');
        $where   = array(
            'role_id' => 3
        );
        $users = $this->model_db->read($this->_tableUser, $columns,$where);
        
        return $users;
    }
	
}
