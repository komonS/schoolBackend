<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");
require(APPPATH.'libraries/RestController.php');
require(APPPATH.'libraries/Format.php');

use chriskacerguis\RestServer\RestController;

class Data extends RestController {

	public function __construct()
    {
        parent::__construct();
        
    }
/*
    public function catagory_get()
    {
        $result = $this->catagorymodel->getcatagoryAll();
        $this->response($result,200);
    }

*/

}