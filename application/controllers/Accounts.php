<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accounts extends CI_Controller {
    
     function __construct()
	{
		parent::__construct();
		$this->is_login();
		
	}
	
	function is_login(){
		$is_login = $this->session->userdata('is_login');
		$is_lock = $this->session->userdata('is_lock');
		$logtype = $this->session->userdata('login_type');
		if($is_login){
			//echo $is_login;
			redirect('/login/index', 'refresh');
		}
	
	}
	

	public function getdaybook() 
        {

	    if($this->session->userdata("loginType")==1){ 
		$daybook= $this->db->get("daybook")->result();
		$data['employes'] = $daybook;
		// rd details table
		      // $rddetailw= $this->db->get("rddetail")->result();
		      // $data['rd'] = $rddetailw;
            // fddetail table
		    $fde= $this->db->get("fddetail")->result();
             $data['detail']= $fde;


		$data['body'] = 'accounts/daybook';
		$data['title'] = 'Daybook Transactions';
		$this->load->view('layout', $data);
		

	    }
	    else
	    {
	        
	        echo "iusmjfkjrkjrmkjr";
	        // $this->db->where("branchID",$this->session->userdata("branchID"));
	         	         
	        
	    }

	    function rddetail()
	    {
	    	 if($this->session->userdata("loginType")==1){ 
	    	 	
	    	 }
	    }
	 //     $daybook = $this->db->get("daybook")->result();

		// $data['daybook'] = $daybook;
		// $data['body'] = 'accounts/daybook';
		// $data['title'] = 'Daybook Transactions';
		// $this->load->view('layout', $data);
	}

}