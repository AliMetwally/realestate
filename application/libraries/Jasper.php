<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once 'Jasper-lib/vendor/autoload.php';
use Jaspersoft\Client\Client;

class Jasper {
    public function __construct() {
        
    }
    
    public function getJasperClient()
    {
        $jc = new Client("http://192.168.1.14:8080/jasperserver", "jasperadmin", "jasperadmin");
        return $jc;
    }    
    
}
