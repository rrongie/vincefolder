<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

	public function customer_info($user_id){

	$this->db->select('*');
	$this->db->from('personnel');
	$this->db->where('id', $user_id);
	$query = $this->db->get();

	return $query->result_array();

	}

	public function insert_personal_record($personal, $user_id){

	$this->db->where('id', $user_id);
	$this->db->update('personnel', $personal); 

	return TRUE;
		
	}

}