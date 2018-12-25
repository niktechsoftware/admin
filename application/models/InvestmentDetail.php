<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InvestmentDetail extends CI_Model {
    
    public function __construct() {
    	parent::__construct();
	}

	
	function getAllDetail() {

		$result = $this->db->get('employee');
		
		/**
		 * 	return employee table Data getting from database.
		 */
		return $result->result();
	}

	function setDetail($detail) {

		if($this->db->insert('investmentDetail', $detail)):
			return $this->db->insert_id();
		else:
			return false;
		endif;
	}


	function getPlanCustomerID($customerID) {
		$this->db->where("customerID", $customerID);
		$result = $this->db->get('investmentDetail');
		
		/**
		 * 	return login table Data getting from database according that username.
		 */
		return $result->row();
	}

	function getPlansCustomerID($customerID) {
		$queryString = "SELECT ID.*, IP.title, branch.title AS branchTitle, committee.title AS committeeTitle  FROM investmentDetail ID LEFT JOIN investmentPlans IP ON ID.planID = IP.id LEFT JOIN branch ON ID.branchID = branch.id LEFT JOIN committee ON ID.committeeID = committee.id WHERE ID.customerID = $customerID";
		$result = $this->db->query($queryString);
		
		return $result->result();
	}

	function getPlanDetailByID($policyID) {
		$queryString = "SELECT ID.*, customer.*, IP.title, branch.title AS branchTitle, committee.title AS committeeTitle  FROM investmentDetail ID LEFT JOIN investmentPlans IP ON ID.planID = IP.id LEFT JOIN branch ON ID.branchID = branch.id LEFT JOIN committee ON ID.committeeID = committee.id LEFT JOIN customer ON ID.customerID = customer.id WHERE ID.id = $policyID";
		$result = $this->db->query($queryString);
		
		return $result->row();
	}

	function getPlanAll() {
		$queryString = "SELECT ID.id AS policyID, ID.*, customer.*, IP.title, branch.title AS branchTitle, committee.title AS committeeTitle  FROM investmentDetail ID LEFT JOIN investmentPlans IP ON ID.planID = IP.id LEFT JOIN branch ON ID.branchID = branch.id LEFT JOIN committee ON ID.committeeID = committee.id LEFT JOIN customer ON ID.customerID = customer.id";
		$result = $this->db->query($queryString);
		
		return $result->result();
	}

	function employebybranch($branchID) {
		$this->db->where('branchID', $branchID);
		$result = $this->db->get('employee');
		return $result->result();
	}


}