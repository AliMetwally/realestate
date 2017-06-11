<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_dash_statistics  extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function user_work($from_date = NULL , $to_date  = NULL )
    {   if(empty($from_date)){
        $from_date = date('Y-m-d');
        }
        if(empty($to_date)){
        $to_date = date('Y-m-d');
        }
        $query = $this->db->query("select distinct s.user_id , s.username, "
                // client calls 
                . " (select count(*) from deals_follow_up u where u.who_call = 2 "
                . " and u.follow_up_type = 1 and f.user_id = u.user_id "
                . " and STR_TO_DATE(date_format(u.follow_up_date, '%Y-%m-%d'),'%Y-%m-%d') between  '$from_date' and '$to_date') client_calls "
                // sales_calls
                . " ,(select count(*) from deals_follow_up u where u.who_call = 1 "
                . " and u.follow_up_type = 1 and f.user_id = u.user_id  "
                . " and STR_TO_DATE(date_format(u.follow_up_date, '%Y-%m-%d'),'%Y-%m-%d') between  '$from_date' and '$to_date') sales_calls "
                // visits
                . " ,(select count(*) from deals_follow_up u  "
                . " where u.follow_up_type = 2 and f.user_id = u.user_id "
                . " and STR_TO_DATE(date_format(u.follow_up_date, '%Y-%m-%d'),'%Y-%m-%d') between  '$from_date' and '$to_date' ) visits "
                // view
                . " ,(select count(*) from deals_follow_up u "
                . " where u.follow_up_type = 3 and f.user_id = u.user_id "
                . " and STR_TO_DATE(date_format(u.follow_up_date, '%Y-%m-%d'),'%Y-%m-%d') between  '$from_date' and '$to_date' ) property_view"

                . " from deals_follow_up f "
                . " right join user s on s.user_id = f.user_id"
                . " where s.role_id = 3 and s.is_active = 1 
");
        return $query->result();
    }
    
    public function getNotifications($from_date = NULL , $to_date  = NULL) {
        if(empty($from_date)){
        $from_date = date('Y-m-d');
        }
        if(empty($to_date)){
        $to_date = date('Y-m-d');
        }
        
        $query = $this->db->query("select distinct s.user_id, s.username,(select count(*)
from   v_notifications a
where  STR_TO_DATE(date_format(a.notification_date, '%Y-%m-%d'),'%Y-%m-%d')  between '$from_date' and '$to_date'
and    a.notification_type = 1 
and    a.confirmed = 1
and    a.user_id = s.user_id) call_done
,(select count(*)
from   v_notifications a
where  STR_TO_DATE(date_format(a.notification_date, '%Y-%m-%d'),'%Y-%m-%d')  between '$from_date' and '$to_date'
and    a.notification_type = 1 
and    a.confirmed = 2
and    a.user_id = s.user_id) call_not_done
,(select count(*)
from   v_notifications a
where  STR_TO_DATE(date_format(a.notification_date, '%Y-%m-%d'),'%Y-%m-%d')  between '$from_date' and '$to_date'
and    a.notification_type = 1 
and    a.confirmed = 0
and    a.user_id = s.user_id) call_wait
,(select count(*)
from   v_notifications a
where  STR_TO_DATE(date_format(a.notification_date, '%Y-%m-%d'),'%Y-%m-%d')  between '$from_date' and '$to_date'
and    a.notification_type = 2 
and    a.confirmed = 1
and    a.user_id = s.user_id) visit_done
,(select count(*)
from   v_notifications a
where  STR_TO_DATE(date_format(a.notification_date, '%Y-%m-%d'),'%Y-%m-%d')  between '$from_date' and '$to_date'
and    a.notification_type = 2 
and    a.confirmed = 2
and    a.user_id = s.user_id) visit_not_done
,(select count(*)
from   v_notifications a
where  STR_TO_DATE(date_format(a.notification_date, '%Y-%m-%d'),'%Y-%m-%d')  between '$from_date' and '$to_date'
and    a.notification_type = 2 
and    a.confirmed = 0
and    a.user_id = s.user_id) visit_wait
,(select count(*)
from   v_notifications a
where  STR_TO_DATE(date_format(a.notification_date, '%Y-%m-%d'),'%Y-%m-%d')  between '$from_date' and '$to_date'
and    a.notification_type = 3 
and    a.confirmed = 1
and    a.user_id = s.user_id) view_done
,(select count(*)
from   v_notifications a
where  STR_TO_DATE(date_format(a.notification_date, '%Y-%m-%d'),'%Y-%m-%d')  between '$from_date' and '$to_date'
and    a.notification_type = 3 
and    a.confirmed = 2
and    a.user_id = s.user_id) view_not_done
,(select count(*)
from   v_notifications a
where  STR_TO_DATE(date_format(a.notification_date, '%Y-%m-%d'),'%Y-%m-%d')  between '$from_date' and '$to_date'
and    a.notification_type = 3 
and    a.confirmed = 0
and    a.user_id = s.user_id) view_wait from v_notifications b
right join user s on s.user_id = b.user_id
                 where s.role_id = 3 and s.is_active = 1 ");
        
        return $query->result();
    }
}
