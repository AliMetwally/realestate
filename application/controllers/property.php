<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Property extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
        $data = array(
            'title' => 'العماد للتسويق العقاري'
        );
        $this->template->load('sales-master','public/property/v_add_property',$data);
    }
    
    // get property name
    public function getPropertyName($property_id)
    {
        $property_name = $this->model_property->property_name($property_id);
        echo $property_name;
    }
    // 
    public function checkPropertyOwner()
    {
        $response = array();
        if($this->form_validation->run('property_owner') !== FALSE){
            $response['status'] = 'success';
        }
        else
        {
            $response['status'] = 'danger';
            $response['message'] = validation_errors();
        }
        
        echo json_encode($response);
    }
    
    // check property
    public function checkProperty()
    {
        $response = array();
        if($this->form_validation->run('property') !== FALSE){
            // check if the number key is exist before 
            $is_key_number_exist = $this->model_db->isRecordExist('property', array('key_number' => $this->input->post('key_number')));
            if ($is_key_number_exist === FALSE) {
                $response['status'] = 'success';
            }
            else
            {
                $response['status'] = 'danger';
                $response['message'] = 'كود الوحده مسجل من قبل';
            }
            
        }
        else
        {
            $response['status'] = 'danger';
            $response['message'] = validation_errors();
        }
        
        echo json_encode($response);
    }
    
    
    // check property layout
    public function checkPropertyLayout()
    {
        $response = array();
        if($this->form_validation->run('property_layout') !== FALSE){
            $response['status'] = 'success';
        }
        else
        {
            $response['status'] = 'danger';
            $response['message'] = validation_errors();
        }
        
        echo json_encode($response);
    }
    
    public function checkPropertyDetails()
    {
        $response = array();
        if($this->form_validation->run('property_details') !== FALSE){
            $response['status'] = 'success';
        }
        else
        {
            $response['status'] = 'danger';
            $response['message'] = validation_errors();
        }
        
        echo json_encode($response);
    }
    
    // check the payment and save
    public function checkPropertyPayment()
    {
        $response = array();
        if($this->form_validation->run('property_save') !== FALSE){
            
            // call the save 
            $result = $this->saveProertyData();
            
            if ($result) {
                $response['status'] = 'success';
                $response['message'] ='تم ادخال بيانات الوحدة بنجاح';
                $response['property_id'] = $result;
            }
            else
            {
                $response['status'] = 'danger';
                $response['message'] = 'خطأ فى الادخال ';
            }
        }
        else
        {
            $response['status'] = 'danger';
            $response['message'] = validation_errors();
        }
        
        echo json_encode($response);
    }
    
    
    public function saveProertyData()
    {
        // call the model function that save all property data
        return $this->model_property->buildProperty();
    }
    
    // property details 
    public function getPropertyDetails($property_id) {
        $data = array(
            'title' => ' الوحدة رقم:' . $property_id,
            'property_details' => $this->model_property->getAllPropertyDtails($property_id),
            'property_images' => $this->model_property->getAllPropertyImages($property_id),
            'min_image' => $this->model_property->getMinPropertyImage($property_id)
        );
        // display the template based on the role to keep the side menu
        $role = $this->session->role;                
        if ($role == 1) {
            $this->template->load('manager_template', 'public/property/v_display_property', $data);
        }
        else if ($role == 3)
        {
            $this->template->load('sales-master', 'public/property/v_display_property', $data);
        }
        else if($role == 2)
        {
            $this->template->load('supervisor_template', 'public/property/v_display_property', $data);
        }
        
        //$this->template->load('sales-master', 'public/property/v_property_details', $data);
    }
    
    // property details 
    public function startDeal($property_id) {
        $data = array(
            'title' => ' بداية تسويق الوحدة رقم:' . $property_id
        ); 
        $this->template->load('sales-master', 'public/property/v_deals', $data);
    }
    
    public function save_deal(){
        
    }
    
    /*
     * delete the property by update status
     */
    public function delete_property($property_id)
    {
        $delete_status = 8;
        $this->model_property->update_property_status($property_id, $delete_status);
        
        redirect('manager/search_properties');       
    }
    
    public function edit_property($property_id) {
        $data = array(
            'title' => ' بداية تسويق الوحدة رقم:' ,
            'property_details' => $this->model_property->getAllPropertyDtails($property_id)
        ); 
        $this->template->load('supervisor_template', 'public/property/v_edit_property', $data);
    }
}