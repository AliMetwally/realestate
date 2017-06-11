<?php


class Follow_up extends CI_Controller{
    public function __construct() {
        parent::__construct();
    }
    
    public function show_follow_up()
    {
        $user_id = $this->session->userId;
        $follow = $this->model_follow_up->get_follow_up($user_id, '23/02/2016');
        echo $this->db->last_query();
        echo '<pre>';
        echo print_r($follow);
        echo '</pre>';
    }
    
    public function showDetailsStatistics($user_id) {
        
        $from_date = new DateTime($this->uri->segment(4));
        $to_date = new DateTime($this->uri->segment(5));
        $user_id = $this->uri->segment(3);
        $data['follow_details'] = $this->model_follow_up->getDetailsStatistics($user_id,$from_date,$to_date);
        $this->template->load('notification_template','public/manager/v_sales_follow', $data);
    }


    public function get_daily_follow()
    {
        $user_id = $this->session->userId;
        $current_date = date('y-m-d'); 
        $follow = $this->model_follow_up->get_follow_up();
    }
}
