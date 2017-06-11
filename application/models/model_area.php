<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_area extends CI_Model {

    public function add_area($state_id,$area_name) {
        $insert = array(
            'state_id' => $state_id,
            'area_name' => $area_name
        );
        $this->model_db->create('area', $insert);
    }

}
