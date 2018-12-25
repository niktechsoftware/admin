<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employe extends CI_Model {
    
    public function __construct() {
    	parent::__construct();
	}

	
	function getAllEmployee() {

		$result = $this->db->get('employee');
		
		/**
		 * 	return employee table Data getting from database.
		 */
		return $result->result();
	}

	function setEmploye($employe) {

		if($this->db->insert('employee', $employe)):
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


}