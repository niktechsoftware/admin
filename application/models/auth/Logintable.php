<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logintable extends CI_Model {
    
    public function __construct() {
    	parent::__construct();
	}

	/**
	 * @param  [String]   username       [give by username from login form.]
	 * @return [array]                 	 return login table Data getting from database according given username.
	 */
	function getLoginData($username,$password) 
	{
		
		// $this->db->select('password');
		$this->db->where('username', $username);

		//$this->db->where('password',md5($password));

		$this->db->where('password', md5($password));

		$login = $this->db->get('login');
		/**
		 * 	return login table Data getting from database according that username.
		 */
		
		if ($login->num_rows() > 0) 
		{
		    $res = $login->row();
		    $loginData = array(
		        "id" => $res->id,
		        "isAdmin" => $res->isAdmin,
		        "username" => $res->username,
		        "password" => $res->password,
		        "branchId" => $res->branchID,
		        "email" => $res->email_id,
		        "roleid" => $res->roleID,
		        "modifieddate" => $res->modified,
		        "createdate" => $res->created
		    );
		    return $loginData;
	     }
	     else 
	     {
	         return false;
	     }
	     
	}

	function getLogin($id) {
		
		// $this->db->select('password');
		$this->db->where('id', $id);
		$result = $this->db->get('login');
		
		/**
		 * 	return login table Data getting from database according that username.
		 */
		return $result->row();
	}

	function setLogin($loginData) {
		
		if($this->db->insert('login', $loginData)):
			return $this->db->insert_id();
		else:
			return false;
		endif;
	}


}