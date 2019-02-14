<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employe extends CI_Model {
    
    public function __construct() {
    	parent::__construct();
	}

	
	function getAllEmployee() {
	      if($this->session->userdata("loginType")==1){
		$result = $this->db->get('employee');
	      }else{
	           $this->db->where("branchID",$this->session->userdata("branchID"));
	           	$result = $this->db->get('employee');
	      }
		
		/**
		 * 	return employee table Data getting from database.
		 */
		return $result->result();
	}

	public function empsearch($dt1,$dt2)
	{

		$this->db->where('DATE(updated) >=',$dt1);
		$this->db->where('DATE(updated) <=',$dt2);
		$data=$this->db->get('employee')->result();
		return $data;
			
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

	function getemployee($customerID) {
		$this->db->where('id', $customerID);
		return $this->db->get('employee')->row();
	}
	
	function updateEmployee($id, $data) {
		$this->db->where('id', $id);
		$this->db->update('employee', $data);
		return true;
	}
	
}