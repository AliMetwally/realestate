<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class designer extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->addDataReport();  
    }
    
    public function addDataReport() {
        
        $data['title'] = 'الرئيسية';
        $this->template->load('design_template', 'public/design/v_home', $data);
    }
    
     public function InsertDataReport()
    {
        $insert = array(
            'entry_date' => $this->input->get('entry_date'),
            'note' => $this->input->get('entry_note')
            );
        
            $this->model_db->create('design_data', $insert);
            redirect('designer');
    }
    
    public function dataReport() {
        $data['title'] = 'طباعة التقرير';
        $this->template->load('design_template', 'public/design/v_report', $data);
    }
}
