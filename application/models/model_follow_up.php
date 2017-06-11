<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_follow_up extends CI_Model {

    private $_tableFollowUps = 'deals_follow_up';
    private $_viewFollowUps = 'v_client_follow_up';

    public function __construct() {
        parent::__construct();
    }

    public function get_follow_up($user_id, $follow_date = 'follow_up_date', $deal_id = 'deal_id', $follow_up_type = 'follow_up_type') {
        $where = array(
            'user_id' => $user_id
        );

        $columns = '*';

        $this->db->where('deal_id', $deal_id, FALSE);
        $this->db->where("follow_up_date = ", "'$follow_date'", FALSE);
        $this->db->where('follow_up_type', $follow_up_type, FALSE);

        $follows = $this->model_db->read($this->_viewFollowUps, $columns, $where);

//        echo $this->db->last_query();

        return $follows;
    }

    /*
     * get follow up period from to date
     */

    public function get_follow_up_rang($user_id, $from_date, $to_date) {
        $where = array(
            'user_id' => $user_id,
            'follow_up_date >= ' => $from_date,
            'follow_up_date <= ' => $to_date,
        );

        $follows = $this->model_db->read($this->_viewFollowUps, '*', $where);

        return $follows;
    }
    
    public function getDetailsStatistics($user_id = NULL,$from_date,$to_date) {
        $query = $this->db->query("SELECT @rownum:=@rownum + 1 as row_number, 
                                    t.*
                                from(
                                   SELECT  username,follow_up_date,CASE follow_up_type when 1 then CONCAT(follow_up_name,' - ',who_call_NAME) else follow_up_name end as follow_up_name,client_id,client_name,client_phone,follow_up 
                                   FROM v_client_follow_up 
                                   WHERE user_id = $user_id 
                                   AND follow_up_date between '$from_date' AND '$to_date' order by follow_up_date,CASE follow_up_type when 1 then CONCAT(follow_up_name,' - ',who_call_NAME) else follow_up_name end) t,"
                . "               (SELECT @rownum := 0) r");

        return $query->result();
    }

    public function get_users_Statistics() {
        $query = $this->db->query("select user_id,sum(follow_call) follow_call,sum(follow_visit) follow_visit,sum(follow_view) follow_view from(
                                    SELECT user_id ,case follow_up_type when 1 then 1 end as follow_call,case follow_up_type when 2 then 1 end as follow_visit,case follow_up_type when 3 then 1 end as follow_view
                                    FROM realstate.v_client_follow_up)aa
                                    group by user_id
                                    order by user_id");
        if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        return FALSE;
    }

}
