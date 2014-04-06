<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function insert_purchases($data){
		$this->db->insert('purchases', $data);
	}

public function get_supplier_and_id($id){
	$this->db->select("company, CONCAT(supplier_fname, '', supplier_lname) AS name", FALSE)->from('supplier')->where('id', $id);
	$sql = $this->db->get();
	return $sql->result_array();
}	

public function insert_borrower_list($data){
	$this->db->insert('borrowers', $data);	
}

public function update_item_borrowed($keyid){

	foreach ($keyid as $id ) {
		$this->db->where('item_id', $id);
		$this->db->update('items', array('item_status' => 'Not Available'));
	}

}

public function save_item($formdata){
	$this->db->insert('items',$formdata);	
	return $this->db->insert_id();
}

public function customer_info($user_id){

	$this->db->select('*');
	$this->db->from('personnel');
	//$this->db->join('users', 'address.user_id = users.id');
	//$this->db->where('type', 'primary');
	
	$query = $this->db->get();

	return $query->result_array();

// Produces: 
// SELECT * FROM blogs
// JOIN comments ON comments.id = blogs.id

	}
	
	public function insert_add_department($formdata){
	$this->db->insert('department', $formdata);
	}
	
	public function insert_supplier_record($personal){
	$this->db->insert('supplier', $personal);
	}
	
	public function get_item($id){
	
	$this->db->select('*')->from('items')->join('supplier', 'supplier.id = supplier_id')->where('item_id', $id)->join('department', 'department.id = department_id');
		$sql = $this->db->get();

		return $sql->result_array();



	}

	public function get_department(){
	$sql = $this->db->get('department');
	return $sql->result_array();
	}

	public function get_company(){
		$sql = $this->db->get('supplier');
		return $sql->result_array();
	}

	public function get_supplier(){
	$sql = $this->db->get('supplier');
	return $sql->result_array();
	}

	
	public function insert_user_record($personal){
	$sql1 = $this->db->insert('personnel', $personal);
	
	if ($sql1 == TRUE) {
			return TRUE;
		}else{
			var_dump($sql1);
		}


	}
	public function get_account($id){

	$query = $this->db->where('id', $id)->get('personnel');
	return $query->result();

	}

	public function get_supplier_info($id){

	$query = $this->db->where('id', $id)->get('supplier');
	return $query->result();
	}

	public function get_dept_info($id){

	$query = $this->db->where('id', $id)->get('department');
	return $query->result();
	}

	public function retrieve_item_consumables(){
	$this->db->select('*')->from('items')->join('supplier', 'supplier.id = supplier_id')->join('department', 'department.id = department_id')->where('items.item_type', 'Fixed');
		$sql = $this->db->get();
		return $sql->result_array();
	}

	public function delete_fixed($id){
		$this->db->where('item_id',$id);
		
		$result= $this->db->delete('items');
		return $result;
	}
	public function delete_consumable($id){
		$this->db->where('item_id',$id);
		
		$result= $this->db->delete('items');
		return $result;
	}

	public function delete_po_list($id){
		$this->db->where('id',$id);
		
		$result= $this->db->delete('purchases');
		return $result;
	}

	public function delete_borrowers($id){
		$this->db->where('borrower_id',$id);
		$result= $this->db->delete('borrowers');
		return $result;
	}

}