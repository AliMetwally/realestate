<?php
 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
/**
 *
 * @author http://www.roytuts.com
 */
class Model_Upload extends CI_Model {
 
    //table name
    private $file = 'property_images';   // files    
    
    function save_files_info($files,$property_id,$i) {
        //start db traction
        $this->db->trans_start();
        //file data
        $file_data = array();
        $dat_y = date("Y");
            $file_data[] = array(
                'property_id' => $property_id,
                'image_path' => 'assets/images/property/'.$dat_y.'/'.$property_id.'/'.$files['name'][$i]
            );
        //insert file data
        $this->db->insert_batch($this->file, $file_data);
        //complete the transaction
        $this->db->trans_complete();
        //check transaction status
        if ($this->db->trans_status() === FALSE) {
            foreach ($files as $file) {
                $file_path = $file['full_path'];
                //delete the file from destination
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }
            //rollback transaction
            $this->db->trans_rollback();
            return FALSE;
        } else {
            //commit the transaction
            $this->db->trans_commit();
            return TRUE;
        }
    }
 
}