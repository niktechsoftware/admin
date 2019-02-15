<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Model {

	public function __construct() {
    	parent::__construct();
	}

	function getAllCustomers() {
	    
	       if($this->session->userdata("loginType")==1){
	           	$result = $this->db->get('customer');
	       }else{
	             $this->db->where("branchID",$this->session->userdata("branchID"));
	            $result = $this->db->get('customer');
	       }

	
		
		/**
		 * 	return employee table Data getting from database.
		 */
		return $result->result();
	}

	public function searchcus($dt1,$dt2)
	{

		$this->db->where('DATE(updated) >=',$dt1);
		$this->db->where('DATE(updated) <=',$dt2);
		$data=$this->db->get('customer')->result();
		return $data;
	}

	function getCustomer($customerID) {
		$this->db->where('Customer_ID', $customerID);
		return $this->db->get('customer')->row();
	}

	function updateCustomer($id, $data) {
		$this->db->where('Customer_ID', $id);
	$update=$this->db->update('customer', $data);
		if($update)
			 {
               $this->load->helper('sms');
               $this->db->where('id',$id);
               $ab=$this->db->get('customer')->row();
               $a=$ab->mobile;
               $b=$ab->name;
               $bcc="Dear Customer"."". $b.", your Profile has been successfully updated and Please login in your updated detail";    	
             sms($a,$bcc);
		return true;
	}
}
	function customeredt($customerID,$customerData) {
		 $this->db->where('id', $customerID);
	     	$update=$this->db->update('customer', $customerData);
		    if($update)
			 {
               $this->load->helper('sms');
               $this->db->where('id',$customerID);
               $ab=$this->db->get('customer')->row();
               $a=$ab->mobile;
               $b=$ab->name;
               $bcc="Dear Customer "."". $b.", your Profile has been successfully updated and Please login in your updated detail";    	
             sms($a,$bcc);
		return $update;
	}
}

	function setCustomer($customer) {

		if($this->db->insert('customer', $customer)):
			 $insert=$this->db->insert_id();
			 if($insert)
			 {
               $this->load->helper('sms');
               $this->db->where('id',$insert);
              $ab=$this->db->get('customer')->row();
              $a=$ab->mobile;
              $b=$ab->name;
              $bcc="Dear "."". $b."your form have been successfully submitted and we will contact as soon as possible";
            	
             sms($a,$bcc);
             return $insert;
			 }
		   else{
			return false;
		}
		  endif;
    	}
	}