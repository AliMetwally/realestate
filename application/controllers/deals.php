<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Deals extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function deal($property_id) {
        $data = array(
            'title' => ' بداية تسويق الوحدة رقم:' . $property_id
        );
        $this->session->set_flashdata('property_id',$property_id);
        $this->template->load('sales-master', 'public/property/v_deals', $data);
    }
    
    public function saveDealsData($property_id)
    {
        // call the model function that save all property data
        $this->model_deals->buildDeal($property_id);
        redirect('sales/searchMarket', 'refresh');
        
    }
}