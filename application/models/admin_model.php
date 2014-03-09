<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

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
	


	public function get_department(){
	$sql = $this->db->get('department');
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


}