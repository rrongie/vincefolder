<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {


		function __construct(){
		parent::__construct();
		$this->load->model('account_model');
		
	}

	public function is_logged_in(){
		$login_session = $this->session->userdata('login');

		return $login_session["logged_in"];

	}

	public function logout(){
		$this->session->unset_userdata('login');
		redirect('account/login');
	}

	public function index(){
		$this->login();
	}


	public function login(){
		
			//Check the session
		if ($this->is_logged_in()) {
			redirect('personnel/dashboard');
		}
			

		if ($this->input->post('username') && $this->input->post('password')) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
		
			$this->form_validation->set_error_delimiters('<span class="label label-danger">', '</span>');
			$this->form_validation->set_rules('password','password','required');
			$this->form_validation->set_rules('username','username','required|callback_checklogin['.$password.']');
			

			if ($this->form_validation->run() == FALSE){
				//Prepare Header Data
				$header['page_title'] = 'Login';
				
				//Navigation
				$navigation['page_cur_nav'] = 'account';

				//Main Content

				//Page Header
				//$this->parser->parse('template/header', $header);
				//Page Nav
				$this->load->view('login/login_view');
				//$this->load->view('template/navigation', $navigation);
				//Page Main Content
				//$this->load->view('account/login');
				//Page Footer
				//$this->load->view('template/footer');
			}
			else{

				$userinfo = $this->account_model->get_login_by_username($username);

				$login_session = array(
	                   'username'     => $userinfo[0]["username"],
	                   'id'			=>$userinfo[0]["id"],
	                   'type'		=>$userinfo[0]['type'],
	                   'name'		=>$userinfo[0]["fname"] .' '.$userinfo[0]["lname"],
	                   'logged_in' => TRUE
	               );

				$this->session->set_userdata('login',$login_session);


				//Check the account type and redirect to appropriate page
				if ($userinfo[0]['type'] == 'regular') {
					redirect('customer/dashboard');
				}elseif($userinfo[0]['type'] == 'admin'){
					redirect('admin');
				}elseif($userinfo[0]['type'] == 'staff'){
					redirect('staff');
				}

						
				
			}
		}else{
			//Prepare Header Data
			$header['page_title'] = 'Login';
			
			//Navigation
			$navigation['page_cur_nav'] = 'account';

			//Main Content

			//Page Header
			//$this->parser->parse('template/header', $header);
			//Page Nav
			//$this->load->view('template/navigation', $navigation);
			//Page Main Content
			$this->load->view('login/login_view');
			//Page Footer
			$this->load->view('template/footer');
		}

	}




public function login_validate(){

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->form_validation->set_error_delimiters('<span class="label label-danger">', '</span>');

		
		$this->form_validation->set_rules('password','password','required');
		$this->form_validation->set_rules('username','username','required|callback_checklogin['.$password.']');
		

		if ($this->form_validation->run() == FALSE){
			$this->login_validate_error();

		}
		else{

			$userinfo = $this->account_model->get_login_by_username($username);

				$login_session = array(
	                   'username'     => $userinfo[0]["username"],
	                   'id'			=>$userinfo[0]["id"],
	                   'type'		=>$userinfo[0]['type'],
	                   'name'		=>$userinfo[0]["fname"] .' '.$userinfo[0]["lname"],
	                   'logged_in' => TRUE
	               );


			$this->session->set_userdata('login',$login_session);


			//Check the account type and redirect to appropriate page
			if ($userinfo[0]['type'] == 'user') {
				redirect('user');
			}elseif($userinfo[0]['type'] == 'admin'){
				redirect('admin');
			}elseif($userinfo[0]['type'] == 'staff'){
				redirect('staff');
			}


			
		}


	}

public function checklogin($username, $password){

		if ($this->account_model->login_validate($username, $password)) {
			return TRUE;
		}else{
			$this->form_validation->set_message('checklogin', 'Incorrect Username or Password');
			return FALSE;
		}

	}

public function login_validate_error(){
		
		//Prepare Header Data
		//$header['page_title'] = 'Login';		
		//Navigation
		//$navigation['page_cur_nav'] = 'account';

		//Page Header
		//$this->load->view('template/header');
		//Page Nav
		//$this->load->view('template/navigation', $navigation);
		//Page Main Content
		$this->load->view('login/login_validate_error');
		//Page Footer
		//$this->load->view('template/footer');
	}

}