<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Premium extends CI_Controller {

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
              $rt = 	$this->db->get("misDetail")->result();
               if($rt->num_rows()<2){
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
              
	
		$this->load->model('Agents');
            $data['agents']=$this->Agents->getAllAgents()->result();
		$data = array(
		    'tableid' => $tableid,
			'planid' => $planid, 
		
			'body' => 'premium/collectpremium',
			'title' => 'Policy Detail'
		);
		$this->load->view('layout',$data);
	}

	public function setpremium() {
	    	$tableID = $this->input->post('tableid');
		$planID = $this->input->post('planID');
	
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
		
	$redy = 	$this->db->get("daybook");
		$ins = $redy->num_rows();
		$invoice_s = $planID."0".$ins;
		$data = array(
		
			"premiumAmount"	=>	$totalAmount,
			"balancePremium"=>	0,
		
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
		
		if($planID == 1)
			$this->db->where('id', $tableID);
              	$result = $this->db->update('fdDetail',$data);

		if($planID == 2)
			$this->db->where('id', $tableID);
              	$result = $this->db->update('rdDetail',$data);

		if($planID == 3)
			$this->db->where('id', $tableID);
              	$result = $this->db->update('npsDetail',$data);

		if($planID == 4)
		$this->db->where('id', $tableID);
              	$result = $this->db->update('misDetail',$data);

		$this->db->insert("daybook", $daybookData);

		redirect("premium/detail/$policyID", 'refresh');
	}

	public function printInvoice() {
		$installments = $this->uri->segment('3');

	}

}