<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Premium extends CI_Controller {
    
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

	public function detail() {
		$data['row']	=8;
		if($this->uri->segment(3)){
			$Customer_ID = $this->uri->segment(3);
		$data['row']=$Customer_ID;
		}
		if($this->input->post("CustomerID")){
			$this->db->where("Customer_ID",($this->input->post("CustomerID")));
			$getdata = $this->db->get("customer");
			if($getdata->num_rows()>0){
				$getdata = $getdata->row();
				$data['row']	= 	$getdata->Customer_ID;
			}else{
				$data['row']	=	'9';
			}
		}
		$data['body'] = 'premium/detail';
		$data['title'] = 'Premium Detail';
		$this->load->view('layout',$data);
	}

	public function getPlanDetail() {
		log_message('debug', 'sql query fail in... ', false);
		$this->load->view('login/forget');
	}

	
	public function premiumlistall() {

	

		$data = array(
			'body' => 'premium/policyListAll',
			'title' => 'Policy List',
		
		);

		$this->load->view('layout',$data);
	}

	public function printcertificate() {
		$Customer_ID = $this->uri->segment(3);
		
		//$this->load->model("investmentDetail");
		//$investmentDetail = $this->investmentDetail->getPlanDetailByID($policyID);
		$this->db->where("Customer_ID",$Customer_ID);
		$cusdata = $this->db->get("customer")->row();
		$data = array(
			
			"Customer_ID" => $cusdata
		);

		$this->load->view('premium/printcertificate', $data);
	}

	public function policydetail() {
		$policyID = $this->uri->segment(3);
		$this->db->where("Customer_ID",$policyID);
		$getdata = $this->db->get("customer")->row();
		
		
		$this->db->where("customerID", $policyID);
		$planid = $this->db->get("investmentDetail")->row();
		
		//$this->load->model("investmentDetail");
		//$planDetail = $this->investmentDetail->getPlanDetailByID($policyID);
			if($planid->planID == 1){
				$this->db->where('customerID', $getdata->Customer_ID);
              	$result = $this->db->get('fdDetail');
              	$detail = $result->result();
		}

		if($planid->planID == 2){
			$this->load->model('rdDetail');
			$detail = $this->rdDetail->getDetail($policyID);
		}

		if($planid->planID == 3){
			$this->load->model('npsDetail');
			$detail = $this->npsDetail->getDetail($policyID);
		}

		if($planid->planID == 4){
			$this->load->model('misDetail');
			$detail = $this->misDetail->getDetail($policyID);
		}

		$data = array(
				'getdata' =>$getdata,
			'planDetail' => $planid, 
			"policyID" => $getdata->policy_No,
			"detail" => $detail,
			'body' => 'premium/policyDetail',
			'title' => 'Policy Detail'
		);
		$this->load->view('layout',$data);
	}

	public function printslip() {
		$invoiceno =$this->uri->segment(3);
		$planID = $this->uri->segment(4);

           
	   
		$data = array(
			'invoiceno' => $invoiceno, 
			"planID" => $planID,
			'title' => 'Policy Slip'
		);
		$this->load->view('premium/printSlip',$data);
	}

	public function collectpremium() {
		$tableid = $this->uri->segment(3);
			$planid = $this->uri->segment(4);
		
			  if($planid == 1){
              
              }
              
              if($planid == 2){
                  $this->db->where("id",$tableid);
              	$result = $this->db->get('rdDetail');
              	$detail = $result->row();
              	$this->db->where("customerID",$detail->customerID);
              		$this->db->where("status","Pending");
              $rt = 	$this->db->get("rdDetail");
               if($rt->num_rows()<2){
             	$this->db->where('customerID', $detail->customerID);
              	$this->db->order_by('id', 'DESC');
                    $this->db->limit('1');
                   $lastrow = $this->db->get("rdDetail")->row();
                    $npstotmonths = $lastrow->remaining_months;
             	$datea = date('Y-m-d', strtotime("+30 days", strtotime($lastrow->should_paid)));
                  for($i=1; $i<13; $i++){
					    	if($npstotmonths>0){
					    		$rdinsertData = array(
					    				'customerID'=>$lastrow->customerID,
					    				'policyID'=>$lastrow->policyID,
					    				'premiumAmount'=>$lastrow->premiumAmount,
					    				'balancePremium'=>0,
					    				'paid'=>0,
					    				'should_paid'=>$datea,
					    				'depositorName'=>"",
					    				'payMode'=>"",
					    				'lateFee'=>"",
					    				'remark'=>"",
					    				'paid_date'=>"",
					    				'status'=>"Pending",
					    				'remaining_months'=>$npstotmonths,
					    				'invoice_slip'=>""
					    
					    		);
					    		$npstotmonths=$npstotmonths-1;
					    		$this->db->insert("rdDetail",$rdinsertData);
					    		$datea = date('Y-m-d', strtotime("+30 days", strtotime($datea)));
					    	}}
              }
              
              	
              }
              
              if($planid == 3){
              	$this->db->where("id",$tableid);
              	$result = $this->db->get('npsDetail');
              	$detail = $result->row();
              	
              		$this->db->where("customerID",$detail->customerID);
              		$this->db->where("status","Pending");
              $rt = 	$this->db->get("npsDetail");
               if($rt->num_rows()<2){
                   $rt=$rt->result();
             	$this->db->where('customerID',$detail->customerID);
              	$this->db->order_by('id', 'DESC');
                    $this->db->limit('1');
                   $lastrow = $this->db->get("npsDetail")->row();
                    $npstotmonths = $lastrow->remaining_months;
             	$datea = date('Y-m-d', strtotime("+30 days", strtotime($lastrow->should_paid)));
                  for($i=1; $i<13; $i++){
					    	if($npstotmonths>0){
					    		$rdinsertData = array(
					    				'customerID'=>$lastrow->customerID,
					    				'policyID'=>$lastrow->policyID,
					    				'premiumAmount'=>$lastrow->premiumAmount,
					    				'balancePremium'=>0,
					    				'paid'=>0,
					    				'should_paid'=>$datea,
					    				'depositorName'=>"",
					    				'payMode'=>"",
					    				'lateFee'=>"",
					    				'remark'=>"",
					    				'paid_date'=>"",
					    				'status'=>"Pending",
					    				'remaining_months'=>$npstotmonths,
					    				'invoice_slip'=>""
					    
					    		);
					    		$npstotmonths=$npstotmonths-1;
					    		$this->db->insert("npsDetail",$rdinsertData);
					    		$datea = date('Y-m-d', strtotime("+30 days", strtotime($datea)));
					    	}}
              }
              } 
              
              if($planid == 4){
              	$this->db->where("id",$tableid);
              	$result = $this->db->get('misDetail');
              	$detail = $result->row();
              	
              	$this->db->where("customerID",$detail->customerID);
              		$this->db->where("status","Pending");
              $rt = 	$this->db->get("misDetail");
               if($rt->num_rows()<2){
                     $rt=$rt->result();
             	$this->db->where('customerID', $detail->customerID);
              	$this->db->order_by('id', 'DESC');
                    $this->db->limit('1');
                   $lastrow = $this->db->get("misDetail")->row();
                    $npstotmonths = $lastrow->remaining_months;
             	$datea = date('Y-m-d', strtotime("+30 days", strtotime($lastrow->should_paid)));
                  for($i=1; $i<13; $i++){
					    	if($npstotmonths>0){
					    		$rdinsertData = array(
					    				'customerID'=>$lastrow->customerID,
					    				'policyID'=>$lastrow->policyID,
					    				'premiumAmount'=>$lastrow->premiumAmount,
					    				'balancePremium'=>0,
					    				'paid'=>0,
					    				'should_paid'=>$datea,
					    				'depositorName'=>"",
					    				'payMode'=>"",
					    				'lateFee'=>"",
					    				'remark'=>"",
					    				'paid_date'=>"",
					    				'status'=>"Pending",
					    				'remaining_months'=>$npstotmonths,
					    				'invoice_slip'=>""
					    
					    		);
					    		$npstotmonths=$npstotmonths-1;
					    		$this->db->insert("misDetail",$rdinsertData);
					    		$datea = date('Y-m-d', strtotime("+30 days", strtotime($datea)));
					    	}}
              }
              }
                if($planid == 5){
              	$this->db->where("id",$tableid);
              	$result = $this->db->get('loanDetail');
              	$detail = $result->row();
              	
              	
              /*	$start = strtotime('2010-01-25');
$end = strtotime('2010-02-20');

$days_between = ceil(abs($end - $start) / 86400);*/
              	
              	$this->db->where('customerID', $detail->customerID);
              	$this->db->order_by('id', 'DESC');
                    $this->db->limit('2');
                   $last2row = $this->db->get("loanDetail")->result();
                  $y=1; foreach($last2row as $l2r):
                       $firstdate[$y] =  $l2r->should_paid;
                       $y++;
                       endforeach;
                       $start = strtotime($firstdate[1]);
$end = strtotime($firstdate[2]);

$days_between = ceil(abs($end - $start) / 86400);
              	echo $days_between;
              	$this->db->where("customerID",$detail->customerID);
              		$this->db->where("status","Pending");
              $rt = 	$this->db->get("loanDetail");
               if($rt->num_rows()<2){
                     $rt=$rt->result();
             	$this->db->where('customerID', $detail->customerID);
              	$this->db->order_by('id', 'DESC');
                    $this->db->limit('1');
                   $lastrow = $this->db->get("loanDetail")->row();
                    $npstotmonths = $lastrow->remaining_months;
             	$datea = date('Y-m-d', strtotime("+$days_between days", strtotime($lastrow->should_paid)));
                  for($i=1; $i<13; $i++){
					    	if($npstotmonths>0){
					    		$rdinsertData = array(
					    				'customerID'=>$lastrow->customerID,
					    				'policyID'=>$lastrow->policyID,
					    				'premiumAmount'=>$lastrow->premiumAmount,
					    				'balancePremium'=>0,
					    				'paid'=>0,
					    				'should_paid'=>$datea,
					    				'depositorName'=>"",
					    				'payMode'=>"",
					    				'lateFee'=>"",
					    				'remark'=>"",
					    				'paid_date'=>"",
					    				'status'=>"Pending",
					    				'remaining_months'=>$npstotmonths,
					    				'invoice_slip'=>""
					    
					    		);
					    		$npstotmonths=$npstotmonths-1;
					    		$this->db->insert("loanDetail",$rdinsertData);
					    		$datea = date('Y-m-d', strtotime("+$days_between days", strtotime($datea)));
					    	}}
              }
              }
              
	
		$this->load->model('Agents');
           
		$data = array(
		    'tableid' => $tableid,
			'planid' => $planid, 
			'agents'=>$this->Agents->getAllAgents()->result(),
		
			'body' => 'premium/collectpremium',
			'title' => 'Policy Detail'
		);
		$this->load->view('layout',$data);
	}

	public function setpremium() {
	    	$tableID = $this->input->post('tableid');
		$planID = $this->input->post('planID');
	$this->load->model("Agents");
		$policyID = $this->input->post('policyID');
		$customerID = $this->input->post('customerID');
	
		$dipositorName = $this->input->post('dipositorName');
		$payMode = $this->input->post('payMode');
		$remark = $this->input->post('remark');
		$premiumDate = $this->input->post('premiumDate');
		$payDate = $this->input->post('payDate');
		$lateFee = $this->input->post('lateFee');
		$totalAmount = $this->input->post('totalAmount');
		$committee = $this->input->post('committee');
		
		$this->db->where("Customer_ID",$customerID);
		$cudetail = $this->db->get("customer")->row();
		
		$this->db->where("id",$cudetail->joinerID);
    	$agentdetails=	$this->db->get("agent")->row();
		$dur=0;
		$this->db->where("customerID", $customerID);
		$plandet = $this->db->get("investmentDetail")->row();
		
		$redy = 	$this->db->get("daybook");
		$ins = $redy->num_rows();
		$invoice_s = $planID."0".$ins;
		
		
		if($plandet->durationYear < 2.5 ){
		    $dur=1;
		}
		if(($plandet->durationYear > 2.5 )&&($plandet->durationYear < 3.5 )){
		    $dur=2.6;
		}
		
		if(($plandet->durationYear > 3.5 )&&($plandet->durationYear < 5.8 )){
		    $dur=3.6;
		}
			if(($plandet->durationYear > 5.5 )&&($plandet->durationYear < 8.5 )){
		    $dur=5.9;
		}
		if(($plandet->durationYear > 8.5 )&&($plandet->durationYear < 12.5 )){
		    $dur=8.6;
		}
			if(($plandet->durationYear > 12.5 )&&($plandet->durationYear < 15.5 )){
		    $dur=12.6;
		}
		if(($plandet->durationYear > 15.5 )){
		    $dur=15.6;
		}
		$curanka = $agentdetails->rank;
		$this->db->where("rank",$agentdetails->rank);
		$this->db->where("duration",$dur);
		$getcomi = $this->db->get("agent_comission_charts")->row();
	//	echo $getcomi->comission1;
		//echo $getcomi->comission2;
		//echo "<br>".$agentdetails->rank;
	//	echo "<br>".$dur;
	//	echo $totalAmount;
		$currentAgentC = ($totalAmount*$getcomi->comission2)/100;
		$cucdata = array(
		    "a_id"          =>$cudetail->joinerID,
		    "amount"        =>$currentAgentC,
		    "invoice_num"   =>$invoice_s
		    );
		   
		   
		  
		    
		    $this->db->select_sum('amount');   
        $this->db->where("a_id",$cudetail->joinerID)  ;
        $query=$this->db->get("agent_comission")->row();
	//	echo "<br>".$query->amount;
		
		$uptorank = $this->db->get("rank")->result();
		$ty=0;
		$upranj=0;
		foreach($uptorank as $res):
		    if($ty!=1){
		    if($query->amount < $res->promotionAmt){
		       
		        $ty=1;
		        $tuprank = array(
		            "rank" => $res->id
		            );
		            $this->db->where("id",$agentdetails->id);
		            $this->db->update("agent",$tuprank);
		    }
		    }
		    endforeach;
		    
		    $this->db->where("id",$agentdetails->introducer_code);
		   $rdft =  $this->db->get("agent");
		    if($rdft->num_rows()>0){
		        $ui =$rdft->row();
		        
		        $this->Agents->getpromotion($ui,$dur,$totalAmount,$invoice_s,$curanka);
		    }
		//comission endfor one    
	
		$data = array(
		
			"premiumAmount"	=>	$totalAmount,
			"balancePremium"=>	0,
		"paid"      =>$totalAmount,
			"depositorName"	=>	$dipositorName,
			"payMode"		=>	$payMode,
			"lateFee"		=>	$lateFee,
			"remark"		=>	$remark,
			"paid_date"     =>	$payDate,
			"invoice_slip"  =>  $invoice_s,
			"status"        => "Paid"
			
		);

		$daybookData = array(
		    "customer_ID"       =>$customerID,
			"amount" 			=> $totalAmount,
			"transactionType" 	=> $planID == 4 ? "debit" : "credit",
			"source" 			=> "Premium Amount",
			"invoice_no"        =>  $invoice_s
		);
		
		if($planID == 1){
			$this->db->where('id', $tableID);
              	$result = $this->db->update('fdDetail',$data);
              	 $this->db->insert("agent_comission",$cucdata);
}
		if($planID == 2){
			$this->db->where('id', $tableID);
              	$result = $this->db->update('rdDetail',$data);
              	 $this->db->insert("agent_comission",$cucdata);
}
		if($planID == 3){
			$this->db->where('id', $tableID);
              	$result = $this->db->update('npsDetail',$data);
              	 $this->db->insert("agent_comission",$cucdata);
}
		if($planID == 4){
		$this->db->where('id', $tableID);
              	$result = $this->db->update('misDetail',$data);
              	 $this->db->insert("agent_comission",$cucdata);
}
if($planID == 5){
		$this->db->where('id', $tableID);
              	$result = $this->db->update('loanDetail',$data);
              	 
}
		$this->db->insert("daybook", $daybookData);

		redirect("premium/detail/$policyID", 'refresh');
	}

	public function printInvoice() {
		$installments = $this->uri->segment('3');

	}

}