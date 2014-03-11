<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {


	function __construct(){
		parent::__construct();
		
		$this->load->model('admin_model');
		$this->load->library('datatables');

		
		//Everytime this class is called it automatically checks the the function is_logged_in
		//If not then redirect to homepage
		if (!$this->is_logged_in()) {
			redirect("account/login");
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

	public function view_item($id){
		
		$items_info['items'] = $this->admin_model->get_item($id);
		$items_info['department'] = $this->admin_model->get_department();
		$items_info['supplier'] = $this->admin_model->get_supplier();
		//var_dump($items_info);
		$this->load->view('template/header');
		$this->load->view('admin/admin_nav');
		$this->parser->parse('admin/admin_view_item',$items_info);


	}

	public function add_item_Validate(){

		
		$form_data = array('supplier_id' => $this->input->post('supplier_id'),
						  'department_id' => $this->input->post('department_id'),
						  'item_brand' => $this->input->post('item_brand'),
						  'item_name' => $this->input->post('item_name'),
						  'item_type' => $this->input->post('item_type'),
						  'item_unit' => $this->input->post('item_unit'),
						  'item_qty' => $this->input->post('item_qty'),
						  'item_price' => $this->input->post('item_price'),
						  'item_serial' => $this->input->post('item_serial'),
						  );

	
		$this->form_validation->set_error_delimiters('<span class="label label-danger">', '</span>');
		$this->form_validation->set_rules('supplier_id','Supplier Id','required');
		$this->form_validation->set_rules('department_id','Deparment Id','required');
		$this->form_validation->set_rules('item_brand','Item Brand','required');
		$this->form_validation->set_rules('item_name','Item Name','required');
		$this->form_validation->set_rules('item_type','Item Type','required');
		$this->form_validation->set_rules('item_unit','Item Unit','required');
		$this->form_validation->set_rules('item_qty','Item Quantity','required');
		$this->form_validation->set_rules('item_price','Item price','required');
		$this->form_validation->set_rules('item_serial','Item serial','required');

		if ($this->form_validation->run() == FALSE){
			
			echo validation_errors();
			
		}
		else{
			$this->session->set_flashdata('add_item_success', 'Item Successfully Added!');
			$this->admin_model->save_item($form_data);
			redirect('admin/add_items');
			
		}
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
			echo validation_errors();
		}else{
			$this->admin_model->insert_add_department($form_data);
			echo"Department Successfully Added!";
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

	
		//CONCAT(fname," ",lname) AS lname', FALSE)
	public function datatables_items(){
		$this
			->datatables->select('item_id,CONCAT(supplier_fname," ",supplier_lname) AS lname,department.name,item_brand,item_name, item_type,item_unit,item_qty,item_price,date_add',FALSE)
			//->datatables->select('CONCAT(supplier_fname," ",supplier_lname) AS lname,department.name,item_brand,item_name, item_type,item_unit,item_qty,item_price,date_add',FALSE)
			->from('items')
			->join('supplier', 'supplier_id = supplier.id','left')
			->join('department', 'department_id = department.id');

		$datatables = $this->datatables->generate('JSON');
		echo $datatables;
	}

		public function datatables_supplier(){
		$this
			//->datatables->select('id,CONCAT(supplier_fname," ",supplier_lname) AS supplier_fname, supplier_lname, address, mobile',FALSE)
			->datatables->select('id, ,CONCAT(supplier_fname," ",supplier_lname) AS supplier_fname, address, mobile',FALSE)
			->from('supplier');

		$datatables = $this->datatables->generate('JSON');
		echo $datatables;
	}

		public function datatables_accounts(){
		$this
			->datatables->select('id, username, fname, lname, type')
			->from('personnel');

		$datatables = $this->datatables->generate('JSON');
		echo $datatables;

	}
	

	public function suppliers(){
		$this->load->view('template/header');
		$this->load->view('admin/admin_nav');
		$this->load->view('admin/supplier_view');

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
		$this->form_validation->set_rules('fname','First Name','is_unique[supplier.supplier_fname]|required');
		$this->form_validation->set_message('is_unique',"First Name already exist");
		
		$this->form_validation->set_rules('lname','Last name','required');
		$this->form_validation->set_rules('address','Address','required');
		$this->form_validation->set_rules('mobile','mobile','required');
		

		if ($this->form_validation->run() == FALSE){
			echo validation_errors();
		}
		else{

			
			$this->admin_model->insert_supplier_record($personal);
			echo"Supplier Successfully Added!";

		}

	}


}