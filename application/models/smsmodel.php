<?php
class Smsmodel extends CI_Model{
	function getsmsseting($school_code){
		$this->db->where("school_code",$school_code);
		$row = $this->db->get("sms")->row();
		return $row;
	}
	function getsmssender($school_code){
		$this->db->where("school_code",$school_code);
		$val=$this->db->get("sms_setting")->row();
		return $val;
	}
}