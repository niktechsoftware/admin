<?php
class Smsmodel extends CI_Model
{
	function getsmsseting()
	{
		$row = $this->db->get("sms");
		return $row;
	}
	
}