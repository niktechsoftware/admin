<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Model {

	function getRoles($branchID) {
	    if(($this->session->userdata("isAdmin")==1)){
	        
		$this->db->where('branchID', $branchID);
	$result =  $this->db->get('role')->result();
	    }else{
	        $this->db->where('branchID', $this->session->userdata("branchid"));
	        $result =  $this->db->get('role')->result();
	    }
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