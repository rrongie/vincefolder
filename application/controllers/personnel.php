<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Personnel extends CI_Controller {


		function __construct(){
		parent::__construct();
		$this->load->model('account_model');
		
	}

	public function dashboard(){
		echo"welcome to dashboard";
	}

	public function test(){
		echo"test";
	}

}