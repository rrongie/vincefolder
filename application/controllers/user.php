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
	public function user_fixed_item(){
		$this->load->view('template/header');
		$this->load->view('user/user_nav');

		$this->load->view('user/user_fixed_item_view');
	}

	
	public function user_consumable_item(){
		$this->load->view('template/header');
		$this->load->view('user/user_nav');

		$this->load->view('user/user_consumable_item_view');
	}



	public function datatables_consumable(){
			$this
		->datatables->select('item_id,item_brand,item_name,department.name,item_serial,item_qty,date_add',FALSE)
		->from('items')
		->join('supplier', 'supplier_id = supplier.id','left')
		->join('department', 'department_id = department.id')
		->where('item_type', 'consumable');

		$datatables = $this->datatables->generate('JSON');
		echo $datatables;
	}

	public function datatables_fixed(){
		$this
		->datatables->select('item_id,item_brand,item_name,department.name,item_serial,item_qty,date_add',FALSE)
		->from('items')
		->join('supplier', 'supplier_id = supplier.id','left')
		->join('department', 'department_id = department.id')
		->where('item_type', 'Fixed');

		$datatables = $this->datatables->generate('JSON');
		echo $datatables;
	}

	public function change_password(){
		$session = $this->session->userdata('login');
		$userid = $session['id'];
		

		
			
			$this->form_validation->set_error_delimiters('<span class="label label-danger">', '</span>');
			$this->form_validation->set_rules('old_password', 'Old Password', 'trim|required|xss_clean|callback_check_oldpw');
			$this->form_validation->set_rules('password', 'New Password', 'trim|required|xss_clean');
			$this->form_validation->set_rules('conf_password', 'Confirm Password', 'trim|required|xss_clean|matches[password]');

			if ($this->form_validation->run() == false) {

				echo validation_errors();
			}else{
				
				
					$new_password = $this->input->post('password');
					$this->user_model->change_password($userid, $new_password);
					echo"successfully Change!";
				
			}
			
	}


	public function check_oldpw($oldpw){


		$this->db->select('*')->from('personnel')->where('password', md5($oldpw));
		$sql = $this->db->get();

		if ($sql->num_rows() > 0) {
			return TRUE;
		}else{
			$this->form_validation->set_message('check_oldpw', 'Old Password does not match with your current password');
			return FALSE;
		}
	}

}