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
	public function dbkdetail()
	{

		$dt1 = date("Y-m-d", strtotime($this->input->post("sdt")));
		$dt2 =  date("Y-m-d", strtotime($this->input->post("edt")));
		
		
		 $this->db->where('DATE(created) >=',$dt1);
		 $this->db->where('DATE(created) <=',$dt2);
		 $data['abc']=$this->db->get('daybook')->result();
		$data['title'] = 'Searched From Daybook list';
		$data['body'] = 'accounts/dbkdetail';
		$this->load->view('layout',$data);
	

	}
    
    public function expences()
    {
        
      
         $dt = date("Y-m-d");
	
	 $this->db->where('DATE(created)',$dt);
    $this->db->where('transactionType','debit');
    $data['amountdabit']=$this->db->get('daybook')->result();
     $this->db->where('DATE(created)',$dt);
	$this->db->where('transactionType','credit');
    $data['amountcredit']=$this->db->get('daybook')->result();
				
	$this->db->where('DATE(created)',$dt);
	//$this->db->where('transactionType','credit');
	// $this->db->where('transactionType','debit');
    $data['amountboth']=$this->db->get('daybook')->result();
	
        
		$data['title'] = 'Searched From Daybook list';
		$data['body'] = 'accounts/expences';
		$this->load->view('layout',$data);
	
    }
    
    public function expencescredit()
    {
        

         echo "string";
         exit();

             $dt = date("Y-m-d");
	
	 $this->db->where('DATE(created)',$dt);
    $this->db->where('transactionType','credit');
    $data['amountdabit']=$this->db->get('daybook')->result();
				
			            
        
		$data['title'] = 'Searched From Daybook list';
		$data['body'] = 'accounts/expences';
		$this->load->view('layout',$data);

    }

     public function bothexpences()
    {
        echo "string";
   //           $dt = date("Y-m-d");
		 // $this->db->where('DATE(created)',$dt);
	  //   $data=$this->db->get('daybook')->result(); 
	  //   print_r('$data');
	  //   exit();
		
    }
	
	

	public function getdaybook() 
        {

	    if($this->session->userdata("isAdmin")==1){ 
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