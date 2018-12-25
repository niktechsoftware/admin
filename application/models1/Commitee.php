<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Commitee extends CI_Model {

	function getAllCommittees() {

		$result = $this->db->query("SELECT `committee`.*, `branch`.`title` AS `branchTitle`, `employee`.`name` FROM `committee` LEFT JOIN `branch` ON `committee`.`branchID` = `branch`.`id` LEFT JOIN `employee` ON `committee`.`employeeID` = `employee`.`id` WHERE 1;");
		
		/**
		 * 	return employee table Data getting from database.
		 */
		return $result->result();
	}

	function getCommittee($committeeID) {
		$this->db->where('id', $committeeID);
		return $this->db->get('committee')->row();
	}

	function committeebybranch($branchID) {
		$this->db->where('branchID', $branchID);
		return $this->db->get('committee')->result();
	}

	function setCommittee($committee) {

		if($this->db->insert('committee', $committee)):
			return $this->db->insert_id();
		else:
			return false;
		endif;
	}
}