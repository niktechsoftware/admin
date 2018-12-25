<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Branch extends CI_Model {

	/**
	 * @param  [String]   username       [give by username from login form.]
	 * @return [array]                 	 return login table Data getting from database according given username.
	 */
	function getBranch() {
		
		$result = $this->db->get('branch');
		
		/**
		 * 	return login table Data getting from database according that username.
		 */
		return $result->result();
	}

	function getBranchID($id) {
		$this->db->where('id', $id);
		$result = $this->db->get('branch');
		
		/**
		 * 	return login table Data getting from database according that username.
		 */
		return $result->row();
	}

	function setBranch($data) {
		if($this->db->insert('branch', $data)):
			return true;
		else:
			return false;
		endif;
	}


}