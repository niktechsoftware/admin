<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employe extends CI_Model {
    
    public function __construct() {
    	parent::__construct();
	}

	
	function getAllEmployee() {
	      if($this->session->userdata("isAdmin")==1){
		$result = $this->db->get('employee');
	      }else{
	           $this->db->where("branchID",$this->session->userdata("branchID"));
	           	$result = $this->db->get('employee');
	      }
		
		/**
		 * 	return employee table Data getting from database.
		 */
		return $result->result();
		
	}

	public function empsearch($dt1,$dt2)
	{

		$this->db->where('DATE(updated) >=',$dt1);
		$this->db->where('DATE(updated) <=',$dt2);
		$data=$this->db->get('employee')->result();
		return $data;
			
	}
	public function empsearchsalry($dt1,$dt2)
	{

		$this->db->where('DATE(pay_date) >=',$dt1);
		$this->db->where('DATE(pay_date) <=',$dt2);
		$data=$this->db->get('emp_salary')->result();
		return $data;
			
	}

	function setEmploye($employe) {

		if($this->db->insert('employee', $employe)){
			 $insert=$this->db->insert_id();
			 if($insert)
			 {
               $this->load->helper('sms');
               $this->db->where('id',$insert);
              $ab=$this->db->get('employee')->row();
              $a=$ab->mobile;
              $b=$ab->name;
              $bcc="Dear Employe "."". $b."your form have been successfully submitted and You can login your Account";
            	
             sms($a,$bcc);
             return $insert;
         }
		else
			{
			return false;
			}
	
	}
}
	function employebybranch($branchID) {
		$this->db->where('branchID', $branchID);
		$result = $this->db->get('employee');
		return $result->result();
	}

	function getemployee($customerID) {
		$this->db->where('id', $customerID);
		return $this->db->get('employee')->row();
	}
	
	function updateEmployee($id, $data) {
		$this->db->where('id', $id);
		$update=$this->db->update('employee', $data);
		 if($update)
			 {
               $this->load->helper('sms');
               $this->db->where('id',$id);
               $ab=$this->db->get('employee')->row();
               $a=$ab->mobile;
               $b=$ab->name;
               $bcc="Dear Employe "."". $b.", your Profile has been successfully updated and Please login in your updated detail";    	
             sms($a,$bcc);
		return true;
	}
	  
	    }


       function savaEditemp($employeeID,$employeData)
         {
             $this->db->where('id', $employeeID);
	     	$update=$this->db->update('employee', $employeData);
		    if($update)
			 {
               $this->load->helper('sms');
               $this->db->where('id',$employeeID);
               $ab=$this->db->get('employee')->row();
               $a=$ab->mobile;
               $b=$ab->name;
               $bcc="Dear Employe "."". $b.", your Profile has been successfully updated and Please login in your updated detail";    	
             sms($a,$bcc);
		return $update;
}


}
}