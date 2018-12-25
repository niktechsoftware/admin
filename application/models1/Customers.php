<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Model {

	public function __construct() {
    	parent::__construct();
	}

	function getAllCustomers() {

		$result = $this->db->get('customer');
		
		/**
		 * 	return employee table Data getting from database.
		 */
		return $result->result();
	}

	function getCustomer($customerID) {
		$this->db->where('id', $customerID);
		return $this->db->get('customer')->row();
	}

	function updateCustomer($id, $data) {
		$this->db->where('id', $id);
		$this->db->update('customer', $data);
		return true;
	}

	function setCustomer($customer) {

		if($this->db->insert('customer', $customer)):
			return $this->db->insert_id();
		else:
			return false;
		endif;
	}
	
}