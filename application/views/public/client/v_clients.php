
<!-- clients of user -->
<?php
$data['user_clients'] = $user_clients;
$this->load->view('segment/client/v_user_clients_segment', $data);
?>


<!-- the client follow up -->
<?php
//$role = $this->session->role;
//if ($role == 3) {
//    $this->load->view('segment/client/v_client_follow_segment');
//}
//elseif($role == 1)
//{
//    $this->load->view('segment/client/v_manager_follow_segment');
//}
?>