<?php
class Smsmodel extends CI_Model
{
	function getsmsseting($admin)
	{
	    $this->db->where("isAdmin",$admin);
		$row = $this->db->get("sms");
		return $row;
	}
	
}