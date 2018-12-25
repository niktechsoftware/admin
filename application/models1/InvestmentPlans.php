<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InvestmentPlans extends CI_Model {

	/**
	 * @param  [String]   username       [give by username from login form.]
	 * @return [array]                 	 return login table Data getting from database according given username.
	 */
	function getPlans() {
		
		$result = $this->db->get('investmentPlans');
		
		/**
		 * 	return login table Data getting from database according that username.
		 */
		return $result->result();
	}

	function getPlan($id) {
		
		$this->db->where("id", $id);
		$result = $this->db->get('investmentPlans');
		
		/**
		 * 	return login table Data getting from database according that username.
		 */
		return $result->row();
	}


	function getPlanDetail($tableName) {
		
		$result = $this->db->get($tableName);
		
		/**
		 * 	return login table Data getting from database according that username.
		 */
		return $result->result();
	}

	function updatePlan($data) {
		if($this->db->insert('branch', $data)):
			return true;
		else:
			return false;
		endif;
	}

}