<?php

class Reports extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->model_helper->checkSession();
        $this->load->library('jasper');
    }

    public function index() {
        $this->test_report();
    }

    // this function to test is the report run 
    public function test_report() {
        $c = $this->jasper->getJasperClient();
        $controls = array('p_user_id' => '3003');
        $report = $c->reportService()->runReport('/reports/realestate/clinetFollowParam', 'pdf', null, null, $controls);
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename=SalesClientFollowRep.pdf');
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: ' . strlen($report));
        header('Content-Type: application/pdf');
        echo $report;
    }

    public function rep_client_follow_details($client_phone) {
        // get the parameter 
        $role = $this->session->role;
        $c = $this->jasper->getJasperClient();

        if ($role == 1) { // in case of manager 
            $sales_id = $this->input->get('filter_sales');
        } else if ($role == 3) {
            $sales_id = $this->session->userId;
        }
        $controls = array('p_user_id' => $sales_id,
            'p_phone' => $client_phone);
        $report = $c->reportService()->runReport('/reports/realestate/sales_client_follow_period', 'pdf', null, null, $controls);
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename=SalesClientFollowRep.pdf');
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: ' . strlen($report));
        header('Content-Type: application/pdf');
        echo $report;
    }

    public function rep_sales_follow($from_date, $to_date) {
        // get the parameter         
//        $from_date = $this->input->get('from_date');
//        $to_date = $this->input->get('to_date');
        if (empty($from_date)) {
            $from_date = date('Y-m-d');
        }
        if (empty($to_date)) {
            $to_date = date('Y-m-d');
        }
        $role = $this->session->role;
        $c = $this->jasper->getJasperClient();
        if ($role == 1) { // in case of manager 
            $sales_id = $this->input->get('filter_sales');
        } else if ($role == 3) {
            $sales_id = $this->session->userId;
        }
        $controls = array('p_from_date' => $from_date,
            'p_to_date' => $to_date);
        $report = $c->reportService()->runReport('/reports/realestate/rep_staistics_follow', 'pdf', null, null, $controls);
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename=rep_statistics_follow.pdf');
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: ' . strlen($report));
        header('Content-Type: application/pdf');
        echo $report;
    }

    
    public function rep_designer() {
        // get the parameter         
        $from_date = $this->input->get('entry_date');
//        $to_date = $this->input->get('to_date');
        if (empty($from_date)) {
            $from_date = date('Y-m-d');
        }
        
        $c = $this->jasper->getJasperClient();
       
        $controls = array('p_from_date' => $from_date);
        $report = $c->reportService()->runReport('/reports/realestate/rep_designer', 'pdf', null, null, $controls);
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename=rep_designer.pdf');
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: ' . strlen($report));
        header('Content-Type: application/pdf');
        echo $report;
    }
    
    public function rep_daily_notifications($user_id) {
        // get the parameter         
//        $to_date = $this->input->get('to_date');
        
            $notification_date = date('Y-m-d');
        
        
        $c = $this->jasper->getJasperClient();
       
        $controls = array('p_user_id' => $user_id,'p_notification_date' => $notification_date);
        $report = $c->reportService()->runReport('/reports/realestate/rep_daily_notifications', 'pdf', null, null, $controls);
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename=rep_daily_notifications.pdf');
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: ' . strlen($report));
        header('Content-Type: application/pdf');
        echo $report;
    }
    // ---------------- client follow report -----------------------------------
    public function rep_client_follow() {
        // get the parameter 
        $role = $this->session->role;
        $from_date = date_create_from_format('d/m/Y', $this->input->get('min_date_picker'));
        $to_date = date_create_from_format('d/m/Y', $this->input->get('max_date_picker'));
        $client_phone = $this->input->get('filter_client_phone');
        $client_name = $this->input->get('filter_client_name');
        $client_rank = $this->input->get('filter_client_rank');

        $c = $this->jasper->getJasperClient();

        if ($role == 1) { // in case of manager 
            $sales_id = $this->input->get('filter_sales');
        } else if ($role == 3) {
            $sales_id = $this->session->userId;
        }

        // run the report based on the date
        if (empty($from_date) && empty($to_date) && empty($client_phone) && empty($client_name)) {
            // run the simple report 
            $controls = array('p_user_id' => $sales_id);
            $report = $c->reportService()->runReport('/reports/realestate/clinetFollowParam', 'pdf', null, null, $controls);
        } else {
            // run the period  
            if (!empty($from_date)) {
                $from_date_param = $from_date->format('Y-m-d');
            } else {
                $from_date_param = NULL;
            }

            if (!empty($to_date)) {
                $to_date_param = $to_date->format('Y-m-d');
            } else {
                $to_date_param = date('Y-m-d');
            }
            $controls = array('p_user_id' => $sales_id,
                'p_from_date' => $from_date_param,
                'p_to_date' => $to_date_param
            );
            if (!empty($client_phone)) {
                $controls = array('p_user_id' => $sales_id,
                    'p_phone' => $client_phone);
            } else if (!empty($client_name)) {
                $controls = array('p_user_id' => $sales_id,
                    'p_name' => $client_name);
            }
            $report = $c->reportService()->runReport('/reports/realestate/sales_client_follow_period', 'pdf', null, null, $controls);
        }

        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename=SalesClientFollowRep.pdf');
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: ' . strlen($report));
        header('Content-Type: application/pdf');
        echo $report;
    }

    // ---------------- Display separated properties report --------------------
    public function rep_separated_property() {
        // read the parameters 
        $area_id = $this->input->get('area_id');
        $state_id = $this->input->get('state_id');
//        $property_type = $this->input->get('property_type');
        $tower_id = $this->input->get('tower_id');
//        $min_price = $this->input->POST('min_price');
//        $max_price = $this->input->POST('max_price');
//        $min_floor = $this->input->POST('min_floor');
//        $max_floor = $this->input->POST('max_floor');
        $controls = array('p_tower_id' => $tower_id, 'p_area_id' => $area_id);

        // prepare the report run
        $c = $this->jasper->getJasperClient();
        $report = $c->reportService()->runReport('/reports/realestate/separated_properties', 'pdf', null, null, $controls);
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename=SeparatedProperties.pdf');
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: ' . strlen($report));
        header('Content-Type: application/pdf');
        echo $report;
    }

}
