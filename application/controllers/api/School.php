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

class School extends RestController {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('schoolmodel');
    }

    public function school_get()
    {
        $schoolID = $this->get('schoolID');

        if($schoolID != null){
            $result = $this->schoolmodel->getSchollInformation();
        }else{
            $result = $this->schoolmodel->getSchollAll();
        }
        $this->response($result,200);
    }

    public function schoolmember_get()
    {
        $schoolID = $this->get('schoolID');
        $result = $this->schoolmodel->getMemberOfSchool($schoolID);
        $this->response($result,200);
    }

    public function school_post()
    {
        $memberID = $this->post('memberID');
        $schoolID = $this->post('schoolID');
        $status = $this->post('status');

        $data = array(
            "memberID"          => $memberID,
            "schoolID"          => $schoolID,
            "schoolStatusID"    => $status
        );

        $re = $this->schoolmodel->insertMemberOfSchool($data);

        if($re != ""){
            $result = array(
                "status"    => "success",
                "detail"    => "insert school complated"
            );
        }else{
            $result = array(
                "status"    => "error",
                "detail"    => "can not insert school"
            );
        }

        $this->response($result,200);

    }


/*
    public function test_get()
    {
    	$this->response($result,200);
    }
    */
}