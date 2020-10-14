<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/** set header **/
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true"); 
header('Access-Control-Allow-Headers: origin, content-type, accept');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT');

require(APPPATH.'libraries/RestController.php');
require(APPPATH.'libraries/Format.php');

use chriskacerguis\RestServer\RestController;

class Tech extends RestController {

	public function __construct()
    {
        parent::__construct();
        //$this->load->model('membermodel');
        $this->load->model('techmodel');
    }   

    public function school_get()
    {
    	$memberID = $this->get('memberID');

    	$result = $this->techmodel->getSchoolOfMember($memberID);

    	$this->response($result,200);
    }
}