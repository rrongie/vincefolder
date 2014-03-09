<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {


		function __construct(){
		parent::__construct();
		$this->load->model('user_model');
		
	}


	public function is_logged_in(){
		$login_session = $this->session->userdata('login');

		return $login_session["logged_in"];

	}

	


	public function user_account(){
		
		$login_session = $this->session->userdata('login');
		$user_id = $login_session["id"];


		$dashboard['user_info'] = $this->user_model->customer_info($user_id);
		var_dump($dashboard);
		$this->load->view('template/header');
		$this->load->view('admin/admin_nav');
		$this->load->view('dashboard/account_dashboard');


	}

	
}