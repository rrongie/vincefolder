<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Staff extends CI_Controller {


		function __construct(){
		parent::__construct();
		$this->load->model('account_model');
		
	}


	public function is_logged_in(){
		$login_session = $this->session->userdata('login');

		return $login_session["logged_in"];

	}

	public function index(){
		$this->staff_dashboard();
	}



	public function staff_dashboard(){
		echo"welcome to staff dashboard";
	}

	public function test(){
		echo"test";
	}

}