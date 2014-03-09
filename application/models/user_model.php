<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

	public function customer_info($user_id){

	$this->db->select('*');
	$this->db->from('personnel');
	//$this->db->join('users', 'address.user_id = users.id');
	//$this->db->where('type', 'primary');
	//$this->db->where('user_id', $user_id);
	$query = $this->db->get();

	return $query->result_array();

	}

	

	
}