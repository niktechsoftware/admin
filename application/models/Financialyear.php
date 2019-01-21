<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Financialyear extends CI_Model {

	/**
	 * @param  [String]   username       [give by username from login form.]
	 * @return [array]                 	 return login table Data getting from database according given username.
	 */
	function getFsd() {
		
		$result = $this->db->get('financialyear');
		
		/**
		 * 	return login table Data getting from database according that username.
		 */
		return $result->result();
	}


}