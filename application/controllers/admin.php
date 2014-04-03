<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {


  function __construct(){
    parent::__construct();
    define('FPDF_FONTPATH',APPPATH .'plugins/font/');
    $this->load->library('fpdf');
    $this->load->library('bryan');
    $this->load->model('admin_model');
    $this->load->library('datatables');
    $this->load->library('cart');
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
    $this->fixed();
  }

  public function admin_dashboard(){
    $this->load->view('template/header');
    $this->load->view('admin/admin_nav');
  }

  public function fixed(){

    $items_info['department'] = $this->admin_model->get_department();
    $this->load->view('template/header');
    $this->load->view('admin/admin_nav');
    //main content
    $this->parser->parse('admin/admin_fixed_view',$items_info);

  }
  public function edit_fixed_item($id){

    $items_info['items'] = $this->admin_model->get_item($id);
    $items_info['department'] = $this->admin_model->get_department();
    $items_info['supplier'] = $this->admin_model->get_supplier();

    $this->load->view('template/header');
    $this->load->view('admin/admin_nav');
    //main content
    $this->parser->parse('admin/edit_fixed_view',$items_info);

  }

  public function edit_fixed_validate($id){
    $form_data = array(//'supplier_id' => $this->input->post('supplier_id'),
      //'department_id' => $this->input->post('department_id'),
      'item_brand' => $this->input->post('item_brand'),
      'item_name' => $this->input->post('item_name'),
      'item_asset' => $this->input->post('item_asset'),
      'item_unit' => $this->input->post('item_unit'),
      'item_qty' => $this->input->post('item_qty'),
      'item_price' => $this->input->post('item_price'),
      'item_serial' => $this->input->post('item_serial'),
    );


    $this->form_validation->set_error_delimiters('<span class="label label-danger">', '</span>');
    //$this->form_validation->set_rules('supplier_id','Supplier Id','required');
    //$this->form_validation->set_rules('department_id','Deparment Id','required');
    $this->form_validation->set_rules('item_brand','Item Brand','required');
    $this->form_validation->set_rules('item_name','Item Name','required');
    $this->form_validation->set_rules('item_asset','Asset Code','required');
    //$this->form_validation->set_rules('item_unit','Item Unit','required');
    $this->form_validation->set_rules('item_price','Item price','required');
    $this->form_validation->set_rules('item_serial','Item serial','required');

    if ($this->form_validation->run() == FALSE){

      $this->session->set_flashdata('edit_item_failed', validation_errors());
      redirect('admin/view_item/'.$this->uri->segment(3));

    }
    else{
      //echo"<pre>";
      //var_dump($_REQUEST);
      //echo"</pre>";
      $this->session->set_flashdata('edit_item_success', 'Item Successfully Changed!');
      $this->db->where('item_id',$id);
      $this->db->update('items',$form_data);
      redirect('admin/edit_fixed_item/'.$this->uri->segment(3));
    }
  }

  public function consumable(){
    $consumable['department'] = $this->admin_model->get_department();
    if (count($this->cart->contents()) > 0) {
      $consumable['cart'] = TRUE;
      $consumable['cartdata'] = $this->cart->contents();
    }else{
      $consumable['cart'] = FALSE;
    }

    $this->load->view('template/header');
    $this->load->view('admin/admin_nav');
    //main content
    $this->parser->parse('admin/admin_consumable_view', $consumable);
  }

  public function edit_consumable_item($id){

    $items_info['items'] = $this->admin_model->get_item($id);
    $items_info['department'] = $this->admin_model->get_department();
    $items_info['supplier'] = $this->admin_model->get_supplier();

    $this->load->view('template/header');
    $this->load->view('admin/admin_nav');
    //main content
    $this->parser->parse('admin/edit_consumable_view',$items_info);

  }

  public function edit_consumable_validate($id){
    $form_data = array(//'supplier_id' => $this->input->post('supplier_id'),
      //'department_id' => $this->input->post('department_id'),
      'item_brand' => $this->input->post('item_brand'),
      'item_name' => $this->input->post('item_name'),
      //'item_type' => $this->input->post('item_type'),
      'item_unit' => $this->input->post('item_unit'),
      'item_qty' => $this->input->post('item_qty'),
      'item_price' => $this->input->post('item_price'),
      //'item_serial' => $this->input->post('item_serial'),
    );


    $this->form_validation->set_error_delimiters('<span class="label label-danger">', '</span>');
    //$this->form_validation->set_rules('supplier_id','Supplier Id','required');
    //$this->form_validation->set_rules('department_id','Deparment Id','required');
    $this->form_validation->set_rules('item_brand','Item Brand','required');
    $this->form_validation->set_rules('item_name','Item Name','required');
    //$this->form_validation->set_rules('item_type','Item Type','required');
    //$this->form_validation->set_rules('item_unit','Item Unit','required');
    $this->form_validation->set_rules('item_qty','Item Quantity','required');
    $this->form_validation->set_rules('item_price','Item price','required');
    //$this->form_validation->set_rules('item_serial','Item serial','required');

    if ($this->form_validation->run() == FALSE){

      $this->session->set_flashdata('edit_item_failed', validation_errors());
      redirect('admin/view_item/'.$this->uri->segment(3));

    }
    else{
      //echo"<pre>";
      //var_dump($_REQUEST);
      //echo"</pre>";
      $this->session->set_flashdata('edit_item_success', 'Item Successfully Changed!');
      $this->db->where('item_id',$id);
      $this->db->update('items',$form_data);
      redirect('admin/edit_consumable_item/'.$this->uri->segment(3));
    }
  }

  public function add_consumable_item(){
    $items_info['department'] = $this->admin_model->get_department();
    $items_info['supplier'] = $this->admin_model->get_supplier();


    $this->load->view('template/header');
    $this->load->view('admin/admin_nav');
    //main content
    $this->parser->parse('admin/admin_add_consumable_item_view',$items_info);

  }


  public function add_consumable_item_validate(){
    $form_data = array('supplier_id' => $this->input->post('supplier_id'),
      //'department_id' => $this->input->post('department_id'),
      'item_brand' => $this->input->post('item_brand'),
      'item_name' => $this->input->post('item_name'),
      'item_type' => 'Consumable',
      'item_unit' => $this->input->post('item_unit'),
      'item_qty' => $this->input->post('item_qty'),
      'item_price' => $this->input->post('item_price'),
      //'item_serial' => $this->input->post('item_serial'),
    );


    $this->form_validation->set_error_delimiters('<span class="label label-danger">', '</span>');
    $this->form_validation->set_rules('supplier_id','Supplier Id','required');
   // $this->form_validation->set_rules('department_id','Deparment Id','required');
    $this->form_validation->set_rules('item_brand','Item Brand','required');
    $this->form_validation->set_rules('item_name','Item Name','required');
    $this->form_validation->set_rules('item_unit','Item Unit','required');
    $this->form_validation->set_rules('item_qty','Item Quantity','required');
    $this->form_validation->set_rules('item_price','Item price','required');
    //$this->form_validation->set_rules('item_serial','Item serial','required');

    if ($this->form_validation->run() == FALSE){

      echo validation_errors();

    }
    else{
      $this->session->set_flashdata('add_item_success', 'Item Successfully Added!');
      $this->admin_model->save_item($form_data);
      $lastid = $this->db->insert_id();
      $this->iLogger('Consumable', $this->input->post('item_qty'), $lastid); 
      redirect('admin/add_consumable_item');

    }
  }


  public function add_fixed_item(){
    $items_info['department'] = $this->admin_model->get_department();
    $items_info['supplier'] = $this->admin_model->get_supplier();


    $this->load->view('template/header');
    $this->load->view('admin/admin_nav');
    //main content
    $this->parser->parse('admin/admin_add_fixed_item_view',$items_info);
    //Page Footer
    //$this->load->view('admin/admin_add_item_view',$items_info);
  }

  public function add_fixed_item_validate(){

    $form_data = array('supplier_id' => $this->input->post('supplier_id'),
      'department_id' => $this->input->post('department_id'),
      'item_brand' => $this->input->post('item_brand'),
      'item_name' => $this->input->post('item_name'),
      'item_type' => 'fixed',
      //'item_unit' => $this->input->post('item_unit'),
      'item_qty' => $this->input->post('item_qty'),
      'item_price' => $this->input->post('item_price'),
      'item_asset' => $this->input->post('item_asset'),
      'item_serial' => $this->input->post('item_serial'),
    );


    $this->form_validation->set_error_delimiters('<span class="label label-danger">', '</span>');
    $this->form_validation->set_rules('supplier_id','Supplier Id','required');
    $this->form_validation->set_rules('department_id','Deparment Id','required');
    $this->form_validation->set_rules('item_brand','Item Brand','required');
    $this->form_validation->set_rules('item_name','Item Name','required');
    $this->form_validation->set_rules('item_price','Item price','required');
    $this->form_validation->set_rules('item_serial','Item serial','required');

    if ($this->form_validation->run() == FALSE){

      echo validation_errors();

    }
    else{
      $this->session->set_flashdata('add_item_success', 'Item Successfully Added!');
      $lastid = $this->admin_model->save_item($form_data);
      $this->iLogger('Fixed', 1, $lastid);
      redirect('admin/add_fixed_item');

    }
  }




  public function view_item($id){

    $items_info['items'] = $this->admin_model->get_item($id);
    $items_info['department'] = $this->admin_model->get_department();
    $items_info['supplier'] = $this->admin_model->get_supplier();

    $this->load->view('template/header');
    $this->load->view('admin/admin_nav');
    $this->parser->parse('admin/admin_view_item',$items_info);
  }


  public function view_item_validate($id){
    $form_data = array(//'supplier_id' => $this->input->post('supplier_id'),
      //'department_id' => $this->input->post('department_id'),
      'item_brand' => $this->input->post('item_brand'),
      'item_name' => $this->input->post('item_name'),
      //'item_type' => $this->input->post('item_type'),
      'item_unit' => $this->input->post('item_unit'),
      'item_qty' => $this->input->post('item_qty'),
      'item_price' => $this->input->post('item_price'),
      'item_serial' => $this->input->post('item_serial'),
    );


    $this->form_validation->set_error_delimiters('<span class="label label-danger">', '</span>');
    //$this->form_validation->set_rules('supplier_id','Supplier Id','required');
    //$this->form_validation->set_rules('department_id','Deparment Id','required');
    $this->form_validation->set_rules('item_brand','Item Brand','required');
    $this->form_validation->set_rules('item_name','Item Name','required');
    //$this->form_validation->set_rules('item_type','Item Type','required');
    $this->form_validation->set_rules('item_unit','Item Unit','required');
    $this->form_validation->set_rules('item_qty','Item Quantity','required');
    $this->form_validation->set_rules('item_price','Item price','required');
    $this->form_validation->set_rules('item_serial','Item serial','required');

    if ($this->form_validation->run() == FALSE){

      $this->session->set_flashdata('edit_item_failed', validation_errors());
      redirect('admin/view_item/'.$this->uri->segment(3));

    }
    else{
      //echo"<pre>";
      //var_dump($_REQUEST);
      //echo"</pre>";
      $this->session->set_flashdata('edit_item_success', 'Item Successfully Changed!');
      $this->db->where('item_id',$id);
      $this->db->update('items',$form_data);
      redirect('admin/view_item/'.$this->uri->segment(3));
    }
  }


  public function clear_form(){
    $this->cart->destroy();
    redirect('admin/accountability');
  }

  public function clear_form_po(){
    $this->cart->destroy();
    redirect('admin/purchase');
  }

  public function clear_form_con(){
    $this->cart->destroy();
    redirect('admin/consumable');
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
    $this->form_validation->set_error_delimiters('<span class="label label-danger">', '</span>');
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

  #goto datatables	
  //CONCAT(fname," ",lname) AS lname', FALSE)
  public function datatables_consumable(){
    $this
      ->datatables->select('item_id,supplier.company,item_name,item_brand,item_unit,item_qty,date_add',FALSE)
      ->from('items')
      ->join('supplier', 'supplier_id = supplier.id','left')
      //->join('department', 'department_id = department.id')
      ->where('item_type','Consumable');

    $datatables = $this->datatables->generate('JSON');
    echo $datatables;
  }

  public function datatables_rr_consumable(){
    $this
      ->datatables->select('item_id,item_brand,item_name,department.name,item_unit,item_qty,date_add',FALSE)
      ->from('items')
      ->join('supplier', 'supplier_id = supplier.id','left')
      ->join('department', 'department_id = department.id')
      ->where('item_type','Consumable');

    $datatables = $this->datatables->generate('JSON');
    echo $datatables;
  }

  public function datatables_reconcile_consumable(){
    $this
      ->datatables->select('item_id,item_brand,item_name,department.name,item_unit,item_qty',FALSE)
      ->from('items')
      ->join('supplier', 'supplier_id = supplier.id','left')
      ->join('department', 'department_id = department.id')
      ->where('item_type','Consumable');

    $datatables = $this->datatables->generate('JSON');
    echo $datatables;
  }



  public function datatables_fixed(){
    $this
      ->datatables->select('item_id,supplier.company,item_name,item_brand,item_serial, item_asset,item_status,date_add',FALSE)
      ->from('items')
      ->join('supplier', 'items.supplier_id = supplier.id','left')
      ->join('department', 'department_id = department.id')
      ->where('item_type', 'Fixed');

    $datatables = $this->datatables->generate('JSON');
    echo $datatables;
  }


  public function datatables_rr_fixed(){
    $this
      ->datatables->select('item_id,item_brand,item_name,department.name,item_serial, item_asset,item_status,date_add',FALSE)
      ->from('items')
      ->join('supplier', 'supplier_id = supplier.id','left')
      ->join('department', 'department_id = department.id')
      ->where('item_type', 'Fixed');

    $datatables = $this->datatables->generate('JSON');
    echo $datatables;
  }

  public function datatables_reconcile_fixed(){
    $this
      ->datatables->select('item_id,item_brand,item_name,department.name, COUNT(item_name)',FALSE)
      ->from('items')
      ->join('supplier', 'supplier_id = supplier.id','left')
      ->join('department', 'department_id = department.id')
      ->where('item_type', 'Fixed')
      ->group_by('item_name');

    $datatables = $this->datatables->generate('JSON');
    echo $datatables;
  }



  public function datatables_rr(){
    $this
      ->datatables->select('*')
      ->from('receivables');

    $datatables = $this->datatables->generate('JSON');
    echo $datatables;
  }

  public function datatables_accountability(){
    $this
      ->datatables->select('item_id,item_name,item_brand,item_serial,item_asset,date_add',FALSE)
      ->from('items')
      ->join('supplier', 'supplier_id = supplier.id','left')
      ->join('department', 'department_id = department.id')
      ->where('item_type', 'Fixed')
      ->where('item_status', 'Available');

    $datatables = $this->datatables->generate('JSON');
    echo $datatables;
  }

  public function datatables_supplier(){
    $this
      //->datatables->select('id,CONCAT(supplier_fname," ",supplier_lname) AS supplier_fname, supplier_lname, address, mobile',FALSE)
      ->datatables->select('id,company ,CONCAT(supplier_fname," ",supplier_lname) AS supplier_fname, address,email, mobile',FALSE)
      ->from('supplier');

    $datatables = $this->datatables->generate('JSON');
    echo $datatables;
  }


  public function datatables_po($supplier_id){
    $this
      ->datatables->select('item_id,company,item_name,item_brand,item_unit,item_type,item_price',FALSE)
      ->from('items')
      ->join('supplier', 'supplier_id = supplier.id','left')
      ->join('department', 'department_id = department.id')
      ->where('supplier_id', $supplier_id);

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


  public function datatables_borrowers(){
    $this
      ->datatables->select('id,borrower_name, borrower_idnum, borrower_dept, borrower_status, borrowed_date,return_date')
      ->from('borrowers');

    $datatables = $this->datatables->generate('JSON');
    echo $datatables;

  }


  public function datatables_purchase_list(){
    $this
      ->datatables->select('purchases.id,department.name,supplier.company, purchase_total,purchase_status, date_order')
      ->from('purchases')
      ->join('department', 'department.id = purchases.dept_id')
      ->join('supplier', 'supplier.id = purchases.supplier_id');

    $datatables = $this->datatables->generate('JSON');
    echo $datatables;

  }


  public function suppliers(){
    $this->load->view('template/header');
    $this->load->view('admin/admin_nav');
    $this->load->view('admin/supplier_view');

  }

  public function supplier_edit_contact_validate($id){
    $personal = array('company' => $this->input->post('company'),
      'email' => $this->input->post('email'),
      'supplier_fname' => $this->input->post('fname'),
      'supplier_lname' => $this->input->post('lname'),
      'address' => $this->input->post('address'),
      'mobile' => $this->input->post('mobile'),
    );

    $this->form_validation->set_error_delimiters('<span class="label label-danger">', '</span>');
    //$this->form_validation->set_rules('fname','First Name','is_unique[supplier.supplier_fname]|required');
    $this->form_validation->set_message('is_unique',"First Name already exist");
    $this->form_validation->set_rules('email','Email','required|valid_email');
    $this->form_validation->set_rules('lname','Last name','required');
    $this->form_validation->set_rules('address','Address','required');
    $this->form_validation->set_rules('mobile','mobile','required');


    if ($this->form_validation->run() == FALSE){
      echo validation_errors();
    }
    else{


      $this->db->where('id',$id);
      $this->db->update('supplier',$personal);
      echo"Supplier Successfully Change!";

    }

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
      'company' => $this->input->post('company'),
      'email' => $this->input->post('email'),
      'company' => $this->input->post('company'),
      'address' => $this->input->post('address'),
      'mobile' => $this->input->post('mobile'),

    );

    $this->form_validation->set_error_delimiters('<span class="label label-danger">', '</span>');
    $this->form_validation->set_rules('fname','First Name','is_unique[supplier.supplier_fname]|required');
    $this->form_validation->set_message('is_unique',"First Name already exist");
    $this->form_validation->set_rules('email','Email','required|valid_email');
    $this->form_validation->set_rules('company','company','required');
    $this->form_validation->set_rules('lname','Last name','required');
    $this->form_validation->set_rules('address','Address','required');
    $this->form_validation->set_rules('mobile','mobile','required');


    if ($this->form_validation->run() == FALSE){
      echo validation_errors();
    }
    else{

      $this->session->set_flashdata('add_success', 'Supplier Successfully Added!');
      $this->admin_model->insert_supplier_record($personal);
      echo"Supplier Added Successfully!";

    }
  }

  public function add_supplier_validate1(){

    $personal = array('supplier_fname' => $this->input->post('fname'),
      'supplier_lname' => $this->input->post('lname'),
      'company' => $this->input->post('company'),
      'email' => $this->input->post('email'),
      'company' => $this->input->post('company'),
      'address' => $this->input->post('address'),
      'mobile' => $this->input->post('mobile'),

    );

    $this->form_validation->set_error_delimiters('<span class="label label-danger">', '</span>');
    $this->form_validation->set_rules('fname','First Name','is_unique[supplier.supplier_fname]|required');
    $this->form_validation->set_message('is_unique',"First Name already exist");
    $this->form_validation->set_rules('email','Email','required|valid_email');
    $this->form_validation->set_rules('company','company','required');
    $this->form_validation->set_rules('lname','Last name','required');
    $this->form_validation->set_rules('address','Address','required');
    $this->form_validation->set_rules('mobile','mobile','required');


    if ($this->form_validation->run() == FALSE){
      echo validation_errors();
    }
    else{

      $this->session->set_flashdata('add_success', 'Supplier Successfully Added!');
      $this->admin_model->insert_supplier_record($personal);
      redirect('admin/add_supplier');

    }
  }

  public function log_history($item = 'all'){

    $result['item_type'] = $this->admin_model->get_item_type($item);

    var_dump($result);
    $this->load->view('template/header');
    $this->load->view('admin/admin_nav');	
    $this->parser->parse('admin/admin_log_history',$result);
  }

  public function accountability(){

    $data['department'] = $this->admin_model->get_department();
    $data['product'] = $product =$this->admin_model->retrieve_item_consumables();

    if (count($this->cart->contents()) > 0) {
      $data['cart'] = TRUE;
      $data['cartdata'] = $this->cart->contents();
    }else{
      $data['cart'] = FALSE;
    }


    $this->load->view('template/header');
    $this->load->view('admin/admin_nav');	
    $this->parser->parse('admin/admin_accountablity_view',$data);
  }

  public function borrowers(){

    $this->load->view('template/header');
    $this->load->view('admin/admin_nav');	
    $this->load->view('admin/admin_borrowers_view');
  }

  public function borrowers_cartdata(){
    $this->db->select('cart_data')->from('borrowers')->where('id', $this->input->post('id'));
    $query = $this->db->get();
    $data = $query->result_array();
    $cart = unserialize($data[0]['cart_data']);
    $bid = $this->input->post('id');

    echo "<table class='table table-bordered'>";
    echo "<tr>
      <th>Item Name</th>
      <th>Brand</th>
      <th>Asset</th>
      <th>Serial</th>
      </tr>";

    foreach ($cart as $key => $value) {

      echo "<tr>";
      echo "<td>$value[name]</td>";
      echo "<td>$value[brand]</td>";
      echo "<td>$value[asset]</td>";
      echo "<td>$value[serial]</td>";
      echo "</tr>";
    }

    echo "</table>";
    echo "<form action=".site_url('admin/return_item')." method='POST' >";
    echo "<input type='hidden' name='b-id' value='$bid'>";
    foreach ($cart as $key => $value) {
      echo "<input type='hidden' name='item-id[]' value='$value[id]'>";
    }
    echo "<input type=submit value='Return Items' class='btn btn-info'>";
    echo "</form>";
  }

  public function view_form_content(){

    $name = $this->input->post('name');
    $dept = $this->input->post('dept');
    $idnum = $id = $this->input->post('idnum');
    $date = $this->input->post('date');
    $date = date('m/d/Y', strtotime($date));

    $logo = base_url() . 'assets/images/jcentre_mall_cebu.jpg';
    $header = array('ITEM NAME', 'ASSET CODE','SERIAL NO.', 'BRAND');
    $cart = $this->cart->contents();


    foreach ($cart as $key => $value) {
      unset($value['subtotal']);
      unset($value['qty']);
      unset($value['price']);
      $keyid[] = $value['id'];
      $value['brand'] = trim($value['brand']);
      $value['name'] = trim($value['name']);
      unset($value['id']);
      unset($value['rowid']);
      $data[] = $value;
    }	

    $this->bryan->FPDF('P', 'mm', 'a4');
    $this->bryan->AddPage();

    $this->bryan->Image($logo,10,6,50);
    $this->bryan->SetFont('Arial','',15);
    $this->bryan->Cell(190,10,$dept,'',0,'R');
    $this->bryan->Ln(7);
    $this->bryan->SetFont('Arial','',12);
    $this->bryan->Cell(190,10,$name,'',0,'R');
    $this->bryan->Ln(5);
    $this->bryan->SetFont('Arial','B',15);
    $this->bryan->Cell(124,10,'Accountability Form','',0,'R');
    $this->bryan->SetFont('Arial','',12);
    $this->bryan->Cell(66,10,$id,'',0,'R');
    $this->bryan->Ln(5);
    $this->bryan->Cell(190,10,$date,'',0,'R');
    $this->bryan->Ln(5);
    $this->bryan->SetFont('Arial','',10);
    $this->bryan->Cell(190,10,'Signature','',0,'R');
    $this->bryan->Line(170, 45, 200, 45);
    $this->bryan->Ln(5);
    $this->bryan->Ln(9);



    $this->bryan->Ln(15);

    foreach($header as $col)
      $this->bryan->Cell(52,7,$col,0);
    $this->bryan->Ln();


    foreach ($data as $key => $value) {

      foreach ($value as $key2 => $value2) {
        $this->bryan->Cell(52,6,$value2,0);
      }
      $this->bryan->Ln();
    }


                        /*foreach($data as $col)
                                $this->bryan->Cell(40,6,$col,0);
                        $this->bryan->Ln();
                         */
    $this->bryan->Ln(20);


    $dbdata = array('borrower_name' => $name, 'borrower_dept' => $dept, 'borrower_idnum' => $idnum, 'cart_data' => serialize($this->cart->contents()), 'borrower_status' => 'Not Returned', 'borrowed_date' => date('Y-m-d H:i:s'));
    #update db make status not available
    $this->admin_model->update_item_borrowed($keyid);
    #insert borrower table
    $this->admin_model->insert_borrower_list($dbdata);
    $this->cart->destroy();
    $this->bryan->Output('AF'.uniqid().'.pdf','D'); 
  }




  private function check_cart($id, $qty = 1){
    $data = array();
    foreach ($this->cart->contents() as $key => $inner) {
      foreach ($inner as $key => $value) {
        if ($inner[$key] == $id) {
          $data[] = array('rowid' => $inner['rowid'],
            'qty' => (int)$inner['qty'] + $qty);
        }
      }
    }

    if (count($data) > 0) {

      if ($this->cart->update($data)) {
        $this->session->set_flashdata('item_add', 'Item has been added to the form.');
        redirect('admin/accountability');
      }else{
        echo 'Error';
      }
    }else{
      return FALSE;
    }
  }



  private function po_check_cart($id, $qty = 1){
    $data = array();
    foreach ($this->cart->contents() as $key => $inner) {
      foreach ($inner as $key => $value) {
        if ($inner[$key] == $id) {
          $data[] = array('rowid' => $inner['rowid'],
            'qty' => $inner['qty'] + $qty);
        }
      }
    }

    if (count($data) > 0) {

      if ($this->cart->update($data)) {
        $this->session->set_flashdata('item_add', 'Item has been added to the form.');
        redirect('admin/purchase');
      }else{
        echo 'Error';
      }
    }else{
      return FALSE;
    }
  }

  public function add_item($id, $qty = 1){
    $this->check_cart($id, $qty);
    $item_content = $this->admin_model->get_item($id);
    $item_array = array(

      'id' => $item_content[0]['item_id'],
      'qty' => $qty,
      'price' => $item_content[0]['item_price'],
      'name' => $item_content[0]['item_name'],
      'serial' => $item_content[0]['item_serial'],
      'asset' => $item_content[0]['item_asset'],
      'brand' => $item_content[0]['item_brand'],
      'type' => $item_content[0]['item_brand']
    );

    $this->cart->insert($item_array);
    $this->session->set_flashdata('item_add', 'Item has been added to the form.');
    redirect('admin/accountability');
  }

  function remove_item($id, $qty = 1){

    $data = array();
    foreach ($this->cart->contents() as $key => $inner) {
      foreach ($inner as $key => $value) {
        if ($inner[$key] == $id) {
          $data[] = array('rowid' => $inner['rowid'],
            'qty' => $inner['qty'] - $qty);
        }
      }
    }

    if (count($data) > 0) {

      if ($this->cart->update($data)) {
        $this->session->set_flashdata('item_add', 'Item has been removed to the form.');
        redirect('admin/accountability');
      }else{
        echo 'Error';
      }
    }else{
      redirect('admin/accountability');
    }
  }

  function remove_item_po($id, $qty = 1){

    $data = array();
    foreach ($this->cart->contents() as $key => $inner) {
      foreach ($inner as $key => $value) {
        if ($inner[$key] == $id) {
          $data[] = array('rowid' => $inner['rowid'],
            'qty' => $inner['qty'] - $qty);
        }
      }
    }

    if (count($data) > 0) {

      if ($this->cart->update($data)) {
        $this->session->set_flashdata('item_add', 'Item has been removed to the form.');
        redirect('admin/purchase');
      }else{
        echo 'Error';
      }
    }else{
      redirect('admin/purchase');
    }
  }


  function return_item(){
    $items = $this->input->post('item-id');
    $borrowers_id = $this->input->post('b-id');
    foreach ($items as $item) {
      $this->db->where('item_id', $item);
      $this->db->update('items', array('item_status' => 'Available'));
    }
    $this->db->where('id', $borrowers_id);
    $this->db->update('borrowers', array('borrower_status' => 'Returned', 'return_date' => date('Y-m-d H:i:s')));
    redirect('admin/borrowers');
  }



  public function po_add_item($id, $qty = 1){
    $this->po_check_cart($id);

    $item_content = $this->admin_model->get_item($id);
    $item_array = array(
      'id' => $item_content[0]['item_id'],
      'qty' => $qty,
      'price' => $item_content[0]['item_price'],
      'name' => $item_content[0]['item_name'],
      'type' => $item_content[0]['item_type']
    );

    $this->cart->insert($item_array);

    $this->session->set_flashdata('item_add', 'Item has been added to the form.');
    redirect('admin/purchase');
  }

  function po_remove_item($id, $qty = 1){

    $data = array();
    foreach ($this->cart->contents() as $key => $inner) {
      foreach ($inner as $key => $value) {
        if ($inner[$key] == $id) {
          $data[] = array('rowid' => $inner['rowid'],
            'qty' => $inner['qty'] - $qty);
        }
      }
    }

    if (count($data) > 0) {

      if ($this->cart->update($data)) {
        $this->session->set_flashdata('item_add', 'Item has been removed to the form/.');
        redirect('admin/purchase');
      }else{
        echo 'Error';
      }
    }else{
      redirect('admin/purchase');
    }
  }




  function finalize_form(){
    $this->load->view('template/header');
    $this->load->view('admin/admin_nav');	
    $this->load->view('admin/admin_finalize_accountablity_view');
  }


  function create_pdf(){
    $logo = base_url() . 'assets/images/jcentre_mall_cebu.jpg';
    $header = array('Asset Code', 'Item Id', 'Quantity', 'Price', 'Name');
    $cart = $this->cart->contents();


    foreach ($cart as $key => $value) {
      unset($value['subtotal']);
      $value['rowid'] = substr($value['rowid'], 0, 8);
      $data[] = $value;
    }	

    $this->bryan->FPDF('P', 'mm', 'legal');
    $this->bryan->AddPage();

    foreach($header as $col)
      $this->bryan->Cell(40,7,$col,0);
    $this->bryan->Ln();


    foreach ($data as $key => $value) {

      foreach ($value as $key2 => $value2) {
        $this->bryan->Cell(40,6,$value2,0);
      }
      $this->bryan->Ln();
    }


                        /*foreach($data as $col)
                                $this->bryan->Cell(40,6,$col,0);
                        $this->bryan->Ln();
                         */
    $this->bryan->Ln(20);
    $this->bryan->Output('PO'.uniqid().'.pdf','D');     
  }

  public function purchase(){


    $items_info['supplier'] = $this->admin_model->get_supplier();
    $items_info['supplier_id'] = $this->input->get('supplier_id');

    $items_info['cart_data'] = $this->cart->contents();

    $items_info['department'] = $this->admin_model->get_department();


    if (count($this->cart->contents()) > 0) {
      $items_info['cart'] = True;
    }else{
      $items_info['cart'] = False;
    }

    if (!$items_info['supplier_id']) {
      $items_info['supplier_id'] = 1;
    }

    $this->load->view('template/header');
    $this->load->view('admin/admin_nav');	
    $this->parser->parse('admin/admin_purchase_view',$items_info);

  }

  public function finalized_form_po(){
    $this->load->view('template/header');
    $this->load->view('admin/admin_nav');	
    $this->load->view('admin/admin_purchase_view_finalized.php');

  }

  public function add_po_qty(){
    $id = $this->input->post('itemid-item');
    $qty = $this->input->post('qty');

    $item_data = $this->admin_model->get_item($id);
    $items_array = array(
      'id'      => $id,
      'qty'     => $qty,
      'unit'    => $item_data[0]['item_unit'],
      'price'   => $item_data[0]['item_price'],
      'name'    => $item_data[0]['item_name'],
      'brand'	=>  $item_data[0]['item_brand'],
      'type' => $item_data[0]['item_type']
    );

    $this->cart->insert($items_array);
    redirect('admin/purchase');
  }

  public function view_po_form(){

    $sup_info = $this->admin_model->get_supplier_and_id($this->input->post('supplierid'));
    $deptid = $this->input->post('departmentid');
    $dept = $this->admin_model->get_dept_info($deptid);
    $deptname = $dept[0]->name;	


    $supplier = $sup_info[0]['company'];
    $name = $sup_info[0]['name'];
    $date= $this->input->post('date');

    $logo = base_url() . 'assets/images/jcentre_mall_cebu.jpg';
    $header = array('QUANTITY', 'ITEM PRICE','ITEM NAME', 'ITEM BRAND');
    $cart = $this->cart->contents();


    foreach ($cart as $key => $value) {
      unset($value['subtotal']);
      unset($value['asset']);
      unset($value['id']);
      unset($value['rowid']);
      $value['brand'] = trim($value['brand']);
      $value['name'] = trim($value['name']);
      $data[] = $value;
    }


    $this->bryan->FPDF('P', 'mm', 'a4');
    $this->bryan->AddPage();

    $this->bryan->Image($logo,10,6,50);
    $this->bryan->SetFont('Arial','',15);
    $this->bryan->Cell(190,10,$deptname,'',0,'R');
    $this->bryan->Ln(7);
    $this->bryan->SetFont('Arial','',12);
    $this->bryan->Cell(190,10,$supplier,'',0,'R');
    $this->bryan->Ln(5);
    $this->bryan->SetFont('Arial','B',15);
    $this->bryan->Cell(124,10,'Purchase Order Form','',0,'R');
    $this->bryan->SetFont('Arial','',12);
    $this->bryan->Cell(66,10,$name,'',0,'R');
    $this->bryan->Ln(5);
    $this->bryan->Cell(190,10,$date,'',0,'R');
    $this->bryan->Ln(5);
    $this->bryan->Ln(5);
    $this->bryan->Ln(9);



    $this->bryan->Ln(15);

    foreach($header as $col)
      $this->bryan->Cell(52,7,$col,0);
    $this->bryan->Ln();


    foreach ($data as $key => $value) {

      foreach ($value as $key2 => $value2) {
        $this->bryan->Cell(52,6,$value2,0);
      }
      $this->bryan->Ln();
    }
    $this->bryan->Cell(170,90,'Total','',0,'R');
    $this->bryan->Cell(15,90,$this->cart->total(),'',0,'R');
                        /*foreach($data as $col)
                                $this->bryan->Cell(40,6,$col,0);
                        $this->bryan->Ln();
                         */


    $this->bryan->Ln(20);

    #logs to purchase order

    $purchase_info = array('dept_id' => $this->input->post('departmentid'),
      'supplier_id' => $this->input->post('supplierid'),
      'purchase_total' => $this->cart->total(),
      'purchase_status' => 'Pending',
      'date_order' => date('Y-m-d H:i:s'),
      'cart_data' => serialize($this->cart->contents()));
    $this->admin_model->insert_purchases($purchase_info);
    $this->cart->destroy();
    $this->bryan->Output('PO'.uniqid().'.pdf','I'); 
  }


  public function receiving(){
    $this->load->view('template/header');
    $this->load->view('admin/admin_nav');	
    $this->load->view('admin/admin_receiving');

  }


  public function reconcile(){
    $this->load->view('template/header');
    $this->load->view('admin/admin_nav');	
    $this->load->view('admin/admin_reconcile');
  }

  public function purchase_list(){
    $this->load->view('template/header');
    $this->load->view('admin/admin_nav');	
    $this->load->view('admin/admin_purchases_list_view.php');
  }


  public function purchases_cartdata(){
    $this->db->select('company,department.name,cart_data, date_order')->from('purchases')->join('supplier', 'supplier_id = supplier.id')->join('department', 'dept_id = department.id')->where('purchases.id', $this->input->post('id'));
    $query = $this->db->get();
    $data = $query->result_array();

    $cart = unserialize($data[0]['cart_data']);
    $date = $data[0]['date_order'];
    $dept = $data[0]['name'];
    $supp = $data[0]['company'];
    $poid = $this->input->post('id');
    echo "<table class='table table-bordered'>";
    echo "<tr>
      <th>Name</th>
      <th>Brand</th>
      <th>Quantity</th>
      <th>Subtotal</th>
      </tr>";
    $total = 0;
    $id = 0;        
    foreach ($cart as $key => $value) {
      $total += $value['subtotal'];
      $rrData[$id] = array('date' => $date,
        'supplier' => $supp,
        'item_name' => $value['name'],
        'quantity' => $value['qty'],
        'units' => ($value['subtotal'] / $value['qty']),
        'requestor' => $dept,
        'net_cost' => $value['subtotal']);


      echo "<tr>";
      echo "<td>$value[name]</td>";
      echo "<td>$value[brand]</td>";
      echo "<td>$value[qty]</td>";
      echo "<td>$value[subtotal]</td>";
      echo "</tr>";
      $id++;
    }
    echo "<tr>
      <td colspan=2></td>
      <td><b>Total</b></td>
      <td>$total</td>
      </tr>";


    $serializedData = serialize($rrData);

    echo "</table>";
    echo "<form action=".site_url('admin/recieve_item')." method='POST' >";
    echo "<input type='hidden' name='po-id' value='$poid'>";
    echo "<input type='hidden' name='rr-data' value='$serializedData'>";
    echo "<input type=submit value='Receive Items' class='btn btn-info'>";
    echo "</form>";
  }

  function recieve_item(){
    $po_id = $this->input->post('po-id');
    $rr_data = unserialize($this->input->post('rr-data'));


    foreach($rr_data as $data){
      $this->db->insert('receivables', $data); 
    }

    $this->db->where('id', $po_id);
    $this->db->update('purchases', array('purchase_status' => 'Purchased'));
    redirect('admin/purchase_list');
  }

  function remove_con(){
    $id = $this->input->post('item-id'); 
    $qty = $this->input->post('qty');


    $this->check_cart($id, $qty);
    $item_content = $this->admin_model->get_item($id);
    $item_array = array(

      'id' => $item_content[0]['item_id'],
      'qty' => $qty,
      'price' => $item_content[0]['item_price'],
      'name' => $item_content[0]['item_name'],
      'serial' => $item_content[0]['item_serial'],
      'asset' => $item_content[0]['item_asset'],
      'brand' => $item_content[0]['item_brand']
    );

    $this->cart->insert($item_array);
    $this->session->set_flashdata('item_add', 'Item has been added to the form.');
    redirect('admin/consumable');

  }

  function finalize_con(){
    $r_name = $this->input->post('r_name');
    $r_id = $this->input->post('r_id');
    $dept = $this->input->post('dept');
    $cart_data = $this->input->post('cart_data');

    $cartUnser = unserialize($cart_data);



    #deduct qty
    foreach($cartUnser as $cartData){
    
          $this->db->query("UPDATE items SET item_qty = item_qty - {$cartData['qty']} WHERE item_id = {$cartData['id']}");
    
    }
    

    $data = array('requestor_dept' => $dept,
      'requestor_name' => $r_name,
      'requestor_id' => $r_id,
      'request_date' => date('Y-m-d H:i:s'),
      'cart_data' => $cart_data);


      $this->db->insert('consumables', $data);
      $this->cart->destroy();
      redirect('admin/consumables_list');

  
  }

  function consumables_list(){
    $this->load->view('template/header');
    $this->load->view('admin/admin_nav');	
    $this->load->view('admin/admin_consumable_list_view');

  }

  function datatables_consumable_list(){
    $this
      ->datatables->select('id, requestor_dept, requestor_name, requestor_id, request_date')
      ->from('consumables');

    $datatables = $this->datatables->generate('JSON');
    echo $datatables;
  }

   function consumable_cartdata(){
    $this->db->select('cart_data, request_date')->from('consumables')->where('consumables.id', $this->input->post('id'));
    $query = $this->db->get();
    $data = $query->result_array();


    $cart = unserialize($data[0]['cart_data']);
    echo "<table class='table table-bordered'>";
    echo "<tr>
      <th>Name</th>
      <th>Brand</th>
      <th>Price</th>
      <th>Quantity</th>
      <th>Subtotal</th>
      </tr>";
    $total = 0;
    $id = 0;        
    foreach ($cart as $key => $value) {
      $total += $value['subtotal'];

      echo "<tr>";
      echo "<td>$value[name]</td>";
      echo "<td>$value[brand]</td>";
      echo "<td>$value[price]</td>";
      echo "<td>$value[qty]</td>";
      echo "<td>$value[subtotal]</td>";
      echo "</tr>";
      $id++;
    }
    echo "<tr>
      <td colspan=3></td>
      <td><b>Total</b></td>
      <td>$total</td>
      </tr>";



    echo "</table>";
  }

function iLogger($type, $qty, $lastid){

	$data = array(
			'log_type' => $type,
			'qty' => $qty,
			'itemid' => $lastid
		);


	$this->db->insert('logger',$data);


}


function datatables_logger(){
    $this
      ->datatables->select('id,item_name,item_brand,log_type,logger.qty, logger.date_add')
      ->from('logger')
      ->join('items', 'items.item_id = logger.itemid');

    $datatables = $this->datatables->generate('JSON');
    echo $datatables;
  }

  function logger(){

	$this->load->view('template/header');
    $this->load->view('admin/admin_nav');	
    $this->load->view('admin/admin_logger_view');


  }

  public function delete_fixed_item($id){
    $this->admin_model->delete_fixed($id);
    redirect('admin/fixed');
  }

   public function delete_consumable_item($id){
    $this->admin_model->delete_consumable($id);
    redirect('admin/consumable');
  }

  public function delete_purchases_list($id){
    $this->admin_model->delete_po_list($id);
    redirect('admin/purchase_list');
 }
 public function remove_borrowers($id){
  $this->admin_model->delete_borrowers($id);
    redirect('admin/borrowers');
 }
}
