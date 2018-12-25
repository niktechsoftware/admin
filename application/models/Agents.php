<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agents extends CI_Model {
    
    public function __construct() {
    	parent::__construct();
	}

	
	function getAllAgents() {

		$result = $this->db->get('agent');
		
		/**
		 * 	return employee table Data getting from database.
		 */
		return $result;
	}

	function setAgent($employe) {

		if($this->db->insert('agent', $employe)):
			return $this->db->insert_id();
		else:
			return false;
		endif;
	}

	function employebybranch($branchID) {
		$this->db->where('branchID', $branchID);
		$result = $this->db->get('employee');
		return $result->result();
	}

	function getagent($customerID) {
		$this->db->where('id', $customerID);
		return $this->db->get('agent')->row();
	}
	
	function updateAgent($id, $data) {
		$this->db->where('id', $id);
		$this->db->update('agent', $data);
		return true;  
		
	}
	
}