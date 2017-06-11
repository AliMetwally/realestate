<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 *
 * @author http://www.roytuts.com
 */
class Upload_files extends CI_Controller {

    private $error;
    private $success;

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('model_upload', 'file');
    }

    private function handle_error($err) {
        $this->error .= $err . "\r\n";
    }

    private function handle_success($succ) {
        $this->success .= $succ . "\r\n";
    }

    function upload_data_files($property_id) {
        $data['property_id'] = $property_id;
        if ($this->input->post('file_upload')) {
            //file upload destination
            $year_path = date("Y");
            $dir_path = 'assets/images/property/' . $year_path;
            if (!is_dir($dir_path)) {
                mkdir($dir_path, 0777, TRUE);
            }
            $config['upload_path'] = $dir_path;
            $config['allowed_types'] = '*';
            $config['max_size'] = '0';
            $config['max_filename'] = '255';
            $config['encrypt_name'] = FALSE;

            //upload file
            $i = 0;
            $files = array();
            $is_file_error = FALSE;

            if ($_FILES['upload_file1']['size'] <= 0) {
                $this->handle_error('برجاء اختيار ملف واحد على الأقل.');
            } else {
                foreach ($_FILES as $key => $value) {
                    if (!empty($value['name'])) {
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload($key)) {
                            $this->handle_error($this->upload->display_errors());
                            $is_file_error = TRUE;
                        } else {
                            $files[$i] = $this->upload->data();
                            ++$i;
                        }
                    }
                }
            }

            // There were errors, we have to delete the uploaded files
            if ($is_file_error && $files) {
                for ($i = 0; $i < count($files); $i++) {
                    $file = $dir_path . $files[$i]['file_name'];
                    if (file_exists($file)) {
                        unlink($file);
                    }
                }
            }

            if (!$is_file_error && $files) {
                $resp = $this->file->save_files_info($files, $property_id);
                if ($resp === TRUE) {
                    $this->handle_success('تم رفع الملفات بنجاح');
                } else {
                    for ($i = 0; $i < count($files); $i++) {
                        $file = $dir_path . $files[$i]['file_name'];
                        if (file_exists($file)) {
                            unlink($file);
                        }
                    }
                    $this->handle_error('حدث خطأأثناء تسجيل البيانات فى قاعدة البيانات');
                }
            }
        }
        $data['errors'] = $this->error;
        $data['success'] = $this->success;
        $data['title'] = 'رفع ملفات الوحدة ';
        $this->template->load('sales-master', 'public/property/upload_property_image', $data);
    }

    // controller to upload files
    function upload_images($property_id) {
        $data = array();
        $data['title'] = 'رفع ملفات الوحدات ';

        if ($this->input->post()) {
            // retrieve the number of images uploaded;
            $number_of_files = sizeof($_FILES['uploadedimages']['tmp_name']);
            // considering that do_upload() accepts single files, we will have to do a small hack so that we can upload multiple files. For this we will have to keep the data of uploaded files in a variable, and redo the $_FILE.
            $files = $_FILES['uploadedimages'];
            $errors = array();
            $upload_error = 0;

            // first make sure that there is no error in uploading the files
            for ($i = 0; $i < $number_of_files; $i++) {
                if ($_FILES['uploadedimages']['error'][$i] != 0)
                    $errors[$i][] = 'Couldn\'t upload file ' . $_FILES['uploadedimages']['name'][$i];
            }
            if (sizeof($errors) == 0) {
                // now, taking into account that there can be more than one file, for each file we will have to do the upload
                // we first load the upload library
                $this->load->library('upload');
                // next we pass the upload path for the images
                $year_path = date("Y");
                $dir = FCPATH . 'assets/images/property/' . $year_path . "/$property_id";
                if (!is_dir($dir)) {
                    mkdir($dir, 0777, TRUE);
                }
                $config['upload_path'] = $dir;

                // also, we make sure we allow only certain type of images
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                for ($i = 0; $i < $number_of_files; $i++) {
                    $_FILES['uploadedimage']['name'] = $files['name'][$i];
                    $_FILES['uploadedimage']['type'] = $files['type'][$i];
                    $_FILES['uploadedimage']['tmp_name'] = $files['tmp_name'][$i];
                    $_FILES['uploadedimage']['error'] = $files['error'][$i];
                    $_FILES['uploadedimage']['size'] = $files['size'][$i];
                    //now we initialize the upload library
                    $this->upload->initialize($config);
                    // we retrieve the number of files that were uploaded
                    if ($this->upload->do_upload('uploadedimage')) {
                        $data['uploads'][$i] = $this->upload->data();
                        $this->file->save_files_info($files, $property_id, $i);
                        
                    } else {
                        
                            // set flag of uploading error 
                            $upload_error = 1;
                            //$this->handle_error('حدث خطأأثناء رفع الملفات');
                    }
                } // end of for loop
                if (sizeof($errors == 0) && $upload_error == 0) {
                    $this->handle_success('تم رفع الملفات بنجاح');
                } else {

                    $this->handle_error('حدث خطأأثناء تسجيل البيانات فى قاعدة البيانات');
                }
                
            }
        } 
            $data['errors'] = $this->error;
            $data['success'] = $this->success;
            $this->template->load('sales-master', 'public/property/v_upload_images', $data);
       
    }

}

/* End of file uploadfiles.php */
/* Location: ./application/controllers/uploadfiles.php */