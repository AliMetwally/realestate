<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_notifications extends CI_Model {

    private $_tableNotification = 'follow_up_notification';
    private $_viewNotification = 'v_notifications';
    private $_viewNotificationManager = 'v_manager_notifications';

    public function __construct() {
        parent::__construct();
    }

    /*
     * function to get all notifications
     */

    public function get_notifications($user_id, $deal_id = 'deal_id', $date = 'notification_date', $confirmed = 'confirmed') {
        $where = array(
            'user_id' => $user_id,
        );

        $order = 'deal_id, follow_up_id ,notification_id';

        // in case to get all notification without date
        $this->db->where('notification_date', $date, FALSE);
        $this->db->where('deal_id', $deal_id, FALSE);
        $this->db->where('confirmed', $confirmed, FALSE);

        $notifications = $this->model_db->read($this->_tableNotification, '*', $where, $order);
        echo $this->db->last_query();
        return $notifications;
    }

    public function daily_notifications($user_id, $notification_date) {
        $query = $this->db->query("select b.*,a.follow_up
from v_notifications b left outer join v_client_follow_up a

on   a.user_id = b.user_id
and  a.client_phone = b.client_phone
and  a.follow_up_id in (select max(follow_up_id) from v_client_follow_up where client_phone = a.client_phone)
where b.user_id = $user_id
and  b.notification_date = '$notification_date' and confirmed = 0");
        return $query->result();
    }


    public function get_daily_notifications($user_id, $notification_date) {
        $query = $this->db->query("select b.*,a.follow_up
from v_notifications b left outer join v_client_follow_up a

on   a.user_id = b.user_id
and  a.client_phone = b.client_phone
and  a.follow_up_id in (select max(follow_up_id) from v_client_follow_up where client_phone = a.client_phone)
where b.user_id = $user_id
and  b.notification_date = '$notification_date'");
        return $query->result();
    }

    public function all_daily_notifications($user_no = NULL, $notification_date = NULL, $notification_date_to = NULL) {
        IF (empty($notification_date)) {
            $notification_date = date('Y-m-d');
        }
        IF (empty($notification_date_to)) {
            $notification_date_to = date('Y-m-d');
        }
        if ($user_no == NULL) {
            $notifications = $this->db->query("select * from v_notifications "
                    . "where notification_date between '$notification_date' and '$notification_date_to' "
                    . "order by user_id,notification_date,deal_id, follow_up_id ,notification_id");
        } elseif (empty($user_no)) {
            $notifications = $this->db->query("select * from v_notifications "
                    . "where notification_date between '$notification_date' and '$notification_date_to' "
                    . "order by user_id,notification_date,deal_id, follow_up_id ,notification_id");
        } else {
            $notifications = $this->db->query("select * from v_notifications "
                    . "where user_id = $user_no "
                    . "and   notification_date between '$notification_date' and '$notification_date_to' "
                    . "order by user_id,notification_date,notification_type,deal_id, follow_up_id ,notification_id");
        }

//        $where = array('notification_date'. 'between'. $notification_date .'and ' . $notification_date_to); //$notification_date
//        $order = 'user_id,deal_id, follow_up_id ,notification_id';
//        
//        $notifications = $this->model_db->read($this->_viewNotification, '*', $where, $order);
        return $notifications->result();
    }

    public function all_daily_notifications_manager($user_id) {
//       $notification_date = date('Y-m-d');
//        $where = array('notification_date' =>$notification_date,'notification_to' => ($user_id)); //$notification_date
//        $order = 'notification_id,notification_to';
        $query = $this->db->query('Select * from v_manager_notifications'
                . ' where notification_to in (' . $user_id
                . ',1)'
                . ' and notification_date = "' . date('Y-m-d')
                . ' "');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return FALSE;
//        $notifications = $this->model_db->read($this->_viewNotificationManager, '*', $where, $order);
//        return $notifications;
    }

    public function all_daily_notifications_manager2($notification_date) {
        $where = array('notification_date' => $notification_date); //$notification_date
        $order = 'notification_id,notification_to';

        $notifications = $this->model_db->read($this->_viewNotificationManager, '*', $where, $order);
        return $notifications;
    }
    
    public function updateFollowUp($notification_id,$follow_up_id,$user_id,$deal_id,$is_confirmed) {
        $table = 'follow_up_notification';
        $data = array('confirmed' => $is_confirmed);
        $where = array('notification_id' => $notification_id,'follow_up_id' => $follow_up_id,'user_id' => $user_id,'deal_id' => $deal_id);
        $this->model_db->update($table,$data,$where);        
    }

}
