<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Model {

	function getRoles($branchID) {
		$this->db->where('branchID', $branchID);
		return $this->db->get('role')->result();
	}

	function setRole($role) {

		if($this->db->insert('role', $role)):
			return $this->db->insert_id();
		else:
			return false;
		endif;
	}

	function updateRole($role, $id) {
		$this->db->where("id", $id);
		if($this->db->update('role', $role)):
			return true;
		else:
			return false;
		endif;
	}
}