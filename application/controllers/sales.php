<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sales extends CI_Controller {

    private $_rule = 3; // define the users work with this pages
    private $_rule_manager = 1; // define the users work with this pages

    public function __construct() {
        parent::__construct();
        // the user must be login and have the same rule privilge
        $this->model_helper->checkSession();
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('grocery_CRUD');
    }

    public function index() {
        $this->sales_home();
    }

    public function get_daily_notifications() {
        $data['daily_notification'] = $this->model_notifications->get_daily_notifications(3001, '2016-10-29');
        echo $this->db->last_query();
    }

    public function sales_home() {
        $user_id = $this->session->userId;
        $today = date('Y-m-d');
//        $today = "2016-03-12";
        $data['title'] = 'الصفحة الرئيسية';
        $data['daily_notifications'] = $this->model_notifications->daily_notifications($user_id, $today);
        $data['new_properties'] = $this->model_search_property->new_properties();
        $data['daily_notification_manager'] = $this->model_notifications->all_daily_notifications_manager($user_id, $today);
//        echo $this->db->last_query();
//$data['stopped_properties'] = $this->model_search_property->stopped_properties();

        $this->template->load('sales-master', 'public/sales/v_sales_dashboard', $data);
    }

    // the follow up work for sales 
    public function follow_up_work() {
        $data = array(
            'title' => 'ادخال متابعات العملاء',
            'datatable' => $this->model_property->getAllProperty(),
        );
        // get the daily employee work 
        $user_id = $this->session->userId;
        // get the date if exist 
//        Date("d/m/Y");                                    empty          : have a vlue 
        $data['follow_up_from_date'] = empty($this->input->post('follow_up_from_date')) ? Date("d/m/Y") : $this->input->post('follow_up_from_date');
        $data['follow_up_to_date'] = empty($this->input->post('follow_up_to_date')) ? Date("d/m/Y") : $this->input->post('follow_up_to_date');
        $data['daily_work'] = $this->model_follow_up->get_follow_up_rang($user_id, $data['follow_up_from_date'], $data['follow_up_to_date']);
        $data['daily_notifications'] = $this->model_notifications->daily_notifications($user_id, date('Y-m-d'));
        $data['display_flg'] = 2; // 2 for follow up flag in case of sales search property and add to follow  
        // data table view 
        //$this->template->load('sales-master', 'public/sales/v_property_datatable', $data);
        $this->template->load('sales-master', 'public/sales/v_follow_up_work', $data);
        // add the search
    }

    public function addProperty() {
        $data = array(
            'title' => 'اضافة وحدة',
            'next_key_number' => $this->model_property->get_next_key_number()
        );
        if ($this->session->role == 3) {
            $this->template->load('sales-master', 'public/property/v_add_property', $data);
        } else if ($this->session->role == 2) {
            $this->template->load('supervisor_template', 'public/property/v_add_property', $data);
        }
    }

    public function addPropertyImage($property_id) {
        echo $property_id;
    }

    public function addTower() {
        $data = array(
            'title' => 'اضافة برج'
        );
        if ($this->session->role == 3) {
            $this->template->load('sales-master', 'public/tower/v_add_tower', $data);
        } else if ($this->session->role == 2) {
            $this->template->load('supervisor_template', 'public/tower/v_add_tower', $data);
        }
    }

    // display the tower units
    public function displayTower($tower_id) {
        $flat_type = 1;
        $shop_type = 2;
        $garate_type = 3;
        $unit_type = 5;
        $mezzanine_type = 4;

        $data = array(
            'title' => 'عرض بيانات برج',
            'tower' => $this->model_tower_data->getTowerData($tower_id),
            'garage_data' => $this->model_tower_data->getTowerProperty($tower_id, $garate_type),
            'flat_data' => $this->model_tower_data->getTowerProperty($tower_id, $flat_type),
            'shop_data' => $this->model_tower_data->getTowerProperty($tower_id, $shop_type),
            'mezzanine_data' => $this->model_tower_data->getTowerProperty($tower_id, $mezzanine_type),
            'unit_data' => $this->model_tower_data->getTowerProperty($tower_id, $unit_type),
        );

        $this->template->load('sales-master', 'public/tower/v_display_tower', $data);
    }

    public function updateFollowUp($notification_id, $follow_up_id, $user_id, $deal_id, $is_confirmed) {
//        echo $notification_id .' '.$follow_up_id.' '.$deal_id.' '.$user_id .' '.$is_confirmed;
        $this->model_notifications->updateFollowUp($notification_id, $follow_up_id, $user_id, $deal_id, $is_confirmed);
        redirect('sales/sales_home');
    }

    //----------------------------------------------
    // search for property and start markerting
    public function searchMarket() {

        $data = array(
            'title' => 'العماد للتسويق العقاري',
        );

        $this->template->load('sales-master', 'public/property/v_search_property', $data);
    }

    //----------------------------------------------
    public function search_properties() {
        $data['title'] = "بحث المعروض";
        $data['display_flg'] = 1; // 1 for sales flag in case of sales flag display result no actions
        // read the role
        // sales case
        if ($this->session->role == 3) {
            $this->template->load('sales-master', 'public/property/v_display_all_properties', $data);
        }
        // supervisor case
        else if ($this->session->role == 2) {
            $this->template->load('supervisor_template', 'public/property/v_display_all_properties', $data);
        }
    }
    
    
    public function search_nonExist_properties()
    {
        $data['title'] = "بحث الوحدات غير المتوفرة";
        $data['display_flg'] = 2; // 1 for manager flag in case of manager flag display result with actions 
        $this->template->load('sales-master', 'public/property/v_display_non_exist', $data);        
    }

    public function editClients() {
        $crud = new grocery_CRUD();

			$crud->set_theme('bootstrap');
			$crud->set_table('client');
                        $crud->columns('client_phone','first_name','second_name');
                        $crud->fields('client_phone','first_name','second_name');
//			$crud->set_relation('role_id','user_role','role_name');
			$crud->display_as('client_phone','التليفون');
			$crud->display_as('first_name','الأسم الأول');
			$crud->display_as('second_name','الأسم الثانى');
			$crud->set_subject('بيانات العملاء');
                        $crud->unset_print();
                        $crud->unset_export();
                        $crud->unset_delete();
                        $crud->unset_add();
//			$crud->set_field_upload('file_url','assets/uploads/files');
                        $output = $crud->render();

			$this->template->load('admin_template','content',$output);
    }

}
