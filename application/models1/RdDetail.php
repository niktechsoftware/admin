<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RdDetail extends CI_Model {
    
    public function __construct() {
    	parent::__construct();
	}

	function getDetail($policyID) {
		$this->db->where('policyID', $policyID);
		$result = $this->db->get('rdDetail');
		return $result->result();
	}
}