<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . '/libraries/REST_Controller.php';
require_once APPPATH . '/libraries/Format.php';
require_once dirname(__FILE__).'/../../util.php'; 

class Config extends REST_Controller {
	
	public function __construct(){
        parent::__construct();
		$this->load->model('MdlConfig');
	}
	
	public function index(){
	}
}