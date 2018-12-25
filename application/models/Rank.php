<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rank extends CI_Model {

	function getRanks() {
		return $this->db->get('rank')->result();
	}

	function getRank($id) {
		$this->db->where('id', $id);
		return $this->db->get('rank')->result();
	}
	
}