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

	
	public function index(){
		$this->user_account();
	}

	public function user_account(){
		
		$login_session = $this->session->userdata('login');
		$user_id = $login_session["id"];
		

		$dashboard['user_info'] = $this->user_model->customer_info($user_id);
		//var_dump($dashboard);
		$this->load->view('template/header');
		$this->load->view('user/user_nav');
		$this->parser->parse('user/account_dashboard', $dashboard);

	}

	public function account_validate(){
		$login_session = $this->session->userdata('login');
		$user_id = $login_session["id"];

		$personal = array('fname' => $this->input->post('fname'),
						 'lname' => $this->input->post('lname'),
						  //'username' => $this->input->post('username'),
						  //'type' => $this->input->post('type'),
						  );		
		//$this->form_validation->set_error_delimiters('<span class="label label-danger">', '</span>');
		$this->form_validation->set_rules('fname','First Name','required');
		$this->form_validation->set_rules('lname','Last Name','required');
		
		if ($this->form_validation->run() == FALSE){
			echo validation_erros();
		}
		else{
			$this->user_model->insert_personal_record($personal, $user_id);
			$this->session->set_flashdata('edit_success', 'Successfully Changed!');
			redirect('user/user_account');
		}
	}
}