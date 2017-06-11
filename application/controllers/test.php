<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of test
 *
 * @author Ali
 */
class Test  extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        date_default_timezone_get('Africa/Cairo’');
    }
    
    public function index()
    {
        echo $this->model_property->property_id();
    }
    
    public function getDate()
    {
        $datestring = 'Year: %Y Month: %m Day: %d - %h:%i %a';
        $time = time();
        echo mdate($datestring, $time);
        echo timezone_menu('UP2');
    }
    
    //test
    public function addPro()
    {
        echo $this->model_property->addProperty();
    }
    
    //test
    public function addDet()
    {
        echo $this->model_property->addPropertyDetails(20160001);
    }
    
    //test 
    public function addOwner()
    {
        echo $this->model_property->addOwner();
    }
    
    public function addAddress()
    {
        echo $this->model_property->addAddress('5','2','any any');
    }
    
    public function addLayout()
    {
        echo $this->model_property->addLayout();
    }
    
    
    public function ddl()
    {
        $data['title'] = 'test';
        $this->template->load('sales-master', 'public/property/v_add_property',$data);
//        $this->template->load('sales-master', 'public/pages/ddl',$data);
    }
    
   
    public function owner()
    {
        $result = $this->model_db->create('lkp_finishing', array('finishing_id'=>'5', 'finishing_name'=>'any any'));
        if ($result) {
            echo 'the insert is success';
        }
        else
        {
            echo 'the insert faild';
        }
    }
    
    public function testProperty()
    {
        $data = array(
            'title' => 'test property'
        );
        $this->template->load('sales-master', 'public/pages/test_property', $data);
    }
    
    public function saveProperty()
    {
        echo $this->model_property->buildProperty();
//        echo $this->input->post('date_on_market');
//        $date = $this->input->post('date_on_market');
//        echo $this->db->call_function("STR_TO_DATE($date, ('%d/%m/%Y'))");
          
//        $this->model_property->savePropertyDetails();
//        $this->model_property->savePropertyLayout();
        
//        echo $this->model_property->saveOwner();
        
    }
    
    public function testCal()
    {
        $data = array(
            'title' => 'test calender'
        );
        $this->load->view('public/pages/v_testcal', $data);
    }
    
    public function multi()
    {
        $data = array(
            'title' => 'test multi'
        );
        $this->load->view('public/test/v_name_array', $data);
    }
    
    public function process()
    {
        $names = $this->input->post('names');
        
        foreach ($names as $key => $value) {
            echo $key .' ==> ' . $value.'<br/>';
        }
    }
    
    public function upload()
    {
        $this->load->view('public/test/v_upload_files');
    }
    
    public function do_upload()
        {
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('public/test/v_upload_files', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                        $this->load->view('public/pages/v_upload_success', $data);
                }
        }
        
        public function testImage() {
        $data = array(
            'title' => 'test image upload angular'
        );
        $this->template->load('sales-master', 'public/pages/image_upload', $data);
    }
    
    public function angular()
    {
        $data = array(
            'title' => 'test image upload angular'
        );
        $this->template->load('sales-master', 'public/test/v_angular', $data);
    }

}
