<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {


	function __construct(){
		parent::__construct();
		
		$this->load->model('admin_model');
		$this->load->library('datatables');

		
		//Everytime this class is called it automatically checks the the function is_logged_in
		//If not then redirect to homepage
		if (!$this->is_logged_in()) {
			redirect("account");
		}

	}

	
	public function is_logged_in(){
		$login_session = $this->session->userdata('login');

		return $login_session["logged_in"];

	}

	public function index(){
		$this->admin_dashboard();
	}

	public function admin_dashboard(){
		
		$this->load->view('template/header');
		
		$this->load->view('admin/admin_nav');
	}

	public function item(){
		$this->load->view('template/header');
		$this->load->view('admin/admin_nav');
		//main content
		$this->load->view('admin/admin_item_view');
	}
	public function add_items(){
		
	
		
		$items_info['department'] = $this->admin_model->get_department();
		$items_info['supplier'] = $this->admin_model->get_supplier();
		

		$this->load->view('template/header');
		$this->load->view('admin/admin_nav');
		//main content
		$this->parser->parse('admin/admin_add_item_view',$items_info);
		//Page Footer
		//$this->load->view('admin/admin_add_item_view',$items_info);
	}

	public function adduser(){
		
		$items_info['department'] = $this->admin_model->get_department();

		$this->load->view('template/header');
		$this->load->view('admin/admin_nav');
		//main content
		$this->parser->parse('admin/admin_add_user',$items_info);
		//$this->load->view('admin/admin_add_user');

		}
	public function add_user_validate(){
		$personal = array('fname' => $this->input->post('fname'),
						  'lname' => $this->input->post('lname'),
						  'username' => $this->input->post('username'),
						  'type' => $this->input->post('type'),
						  'password' => md5($this->input->post('password'))
						  );
	
		$this->form_validation->set_error_delimiters('<span class="label label-danger">', '</span>');
		$this->form_validation->set_rules('fname','First Name','required');
		$this->form_validation->set_rules('lname','Last Name','required');
		$this->form_validation->set_rules('username','Username','is_unique[personnel.username]|required|min_length[6]|max_length[16]');
		$this->form_validation->set_message('is_unique',"Username already exist");
		$this->form_validation->set_rules('password','Password','trim|required|min_length[6]|max_length[16]');
		$this->form_validation->set_rules('cpassword','Confirm Password','required|matches[password]');

		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('add_user_error',validation_errors());
			redirect('admin/adduser');
		}
		else{

				if ($this->admin_model->insert_user_record($personal)) {
				$this->session->set_flashdata('add_user_success', 'User Successfully Created!');
				redirect('admin/adduser');
			}

			
		}

	}

	public function account($id){
		$this->load->view('template/header');
		$this->load->view('admin/admin_nav');
		
		$account['personal'] = $this->admin_model->get_account($id);
		//var_dump($account);
		$this->parser->parse('admin/admin_edit_user_view',$account);
		//$this->load->view('admin/admin_edit_user_view');
		
	}

	public function user_account_validate($id){
		$personal = array('fname' => $this->input->post('fname'),
						 'lname' => $this->input->post('lname'),
						  //'username' => $this->input->post('username'),
						  'type' => $this->input->post('type'),
						  
						  );
	
		$this->form_validation->set_error_delimiters('<span class="label label-danger">', '</span>');
		//$this->form_validation->set_rules('fname','First Name','required');
		//$this->form_validation->set_rules('lname','Last Name','required');
		//$this->form_validation->set_rules('username','Username','is_unique[personnel.username]|required|min_length[6]|max_length[16]');
		//$this->form_validation->set_message('is_unique',"Username already exist");
		$this->form_validation->set_rules('type','type','required');

		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('edit_user_error','');
			redirect('admin/account/'.$this->uri->segment(3));
		}
		else{

			$this->session->set_flashdata('edit_user_success', 'Successfully Change!');
			$this->db->where('id',$id);
			$this->db->update('personnel',$personal);
			redirect('admin/account/'.$this->uri->segment(3));
				

			
		}
	}

	
	public function manage_user(){
		

		$this->load->view('template/header');
		$this->load->view('admin/admin_nav');
	
		//main content
		$this->load->view('admin/manage_user_view');
		
	}
	
	public function datatables_accounts(){
		$this
			->datatables->select('id, username, fname, lname, type')
			->from('personnel');

		$datatables = $this->datatables->generate('JSON');
		echo $datatables;

	}

	public function add_department(){
		$this->load->view('template/header');
		$this->load->view('admin/admin_nav');
		//main content
		$this->load->view('admin/admin_add_department');	
		}
	public function add_department_validate(){
		$this->form_validation->set_rules('adddepartment', 'Deparment Name', 'trim|required|is_unique[department.name]');
		$this->form_validation->set_message('is_unique',"The Department Name already exist");
		$form_data = array('name' => $this->input->post('adddepartment'));

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('department_error',validation_errors());
			redirect('admin/add_department');
		}else{
			$this->session->set_flashdata('dept_success', 'Deparment Successfully Added!');
			$this->admin_model->insert_add_department($form_data);
			redirect('admin/add_department');
		}
	}

	public function user_changepassword($id){
	
		$personal = array('password' => md5($this->input->post('password')),
						 //'lname' => $this->input->post('lname'),
						  //'username' => $this->input->post('username'),
						  //'type' => $this->input->post('type'),
						 
						  );

 	$this->form_validation->set_rules('password','Password','trim|required|min_length[6]|max_length[16]');
	$this->form_validation->set_rules('cpassword','Confirm Password','trim|required|matches[password]');
   if ($this->form_validation->run() == FALSE) {
    
    echo validation_errors();
  

   } else {
  	
   	$this->db->where('id',$id);
	$this->db->update('personnel',$personal);
	echo"Successfully Changed!";

	}


		}

	public function datatables_fixed_items(){
		$this
			->datatables->select('id, item_qty, item_name, amount, serial')
			->from('fixed_items');

		$datatables = $this->datatables->generate('JSON');
		echo $datatables;
	}

	public function add_fixed_item(){
		
		$fix_item = array('item_band' => $this->input->post('fname'),
						  'item_name' => $this->input->post('lname'),
						  'qty' => $this->input->post('username'),
						  'price' => $this->input->post('type'),
						  );
		$supplier = array('supplier_name' => $this->input->post('fname'),
						  );

	
		$this->form_validation->set_error_delimiters('<span class="label label-danger">', '</span>');
		$this->form_validation->set_rules('item_name','Item Name','required');
		$this->form_validation->set_rules('item_number','item Number','required');
		$this->form_validation->set_rules('item_type','item type','required');
		$this->form_validation->set_rules('status','status','required');
		$this->form_validation->set_rules('item_type','item type','required');
		$this->form_validation->set_rules('item_price','item price','required');
		$this->form_validation->set_rules('quantity','item price','required');
		//$this->form_validation->set_message('is_unique',"Username already exist");
		$this->form_validation->set_rules('type','type','required');

		if ($this->form_validation->run() == FALSE){
			echo validation_errors();
		}
		else{

			echo"save to database";
			
		}
	}
	public function suppliers(){
		$this->load->view('template/header');
		$this->load->view('admin/admin_nav');
		$this->load->view('admin/supplier_view');

	}
	public function datatables_supplier(){
		$this
			->datatables->select('id, supplier_fname, supplier_lname, address, mobile')
			->from('supplier');

		$datatables = $this->datatables->generate('JSON');
		echo $datatables;
	}

	public function add_supplier(){
		$this->load->view('template/header');
		$this->load->view('admin/admin_nav');
		$this->load->view('admin/add_supplier_view');
	}

	public function supplier_details($id){
		
		$supplier_info['sup'] = $this->admin_model->get_supplier_info($id);
		//var_dump($supplier_info);
		$this->load->view('template/header');
		$this->load->view('admin/admin_nav');
		$this->parser->parse('admin/supplier_details_view',$supplier_info);
	
	}
	
	public function add_supplier_validate(){

		$personal = array('supplier_fname' => $this->input->post('fname'),
						 'supplier_lname' => $this->input->post('lname'),
						  'address' => $this->input->post('address'),
						  'mobile' => $this->input->post('mobile'),
						  
						  );
	
		$this->form_validation->set_error_delimiters('<span class="label label-danger">', '</span>');
		$this->form_validation->set_rules('fname','Item Name','required');
		$this->form_validation->set_rules('lname','item Number','required');
		$this->form_validation->set_rules('address','item type','required');
		$this->form_validation->set_rules('mobile','status','required');
		

		if ($this->form_validation->run() == FALSE){
			echo "feel free to change this";
		}
		else{

			$this->session->set_flashdata('add_success', 'Supplier Successfully Added!');
			$this->admin_model->insert_supplier_record($personal);
			redirect('admin/add_supplier');	

		}

	}


}