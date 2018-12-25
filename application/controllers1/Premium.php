<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Premium extends CI_Controller {

	public function detail() {
		$data['body'] = 'premium/detail';
		$data['title'] = 'Premium Detail';
		$this->load->view('layout',$data);
	}

	public function getPlanDetail() {
		log_message('debug', 'sql query fail in... ', false);
		$this->load->view('login/forget');
	}

	public function premiumlist() {
		
		$customerID = explode('C', $this->input->post('customerID'));

		$customerID = sizeof($customerID) == 1 ? $customerID[0] : $customerID[1];

		try {

			$this->load->model("customers");
			$this->load->model("investmentDetail");

			$customer = $this->customers->getCustomer($customerID);
			$investmentDetail = $this->investmentDetail->getPlansCustomerID($customerID);

			$success = $customer ? true : false;

			$data = array(
				"customer" => $customer,
				"investmentDetail" => $investmentDetail,
				"success" => $success
			);

		} catch (MySQLException $e) {
		    // echo 'Caught exception: ',  $e->getMessage(), "\n";
		    $data = array(
				"customer" => [],
				"investmentDetail" => [],
				"success" => false
			);
		}

		echo json_encode($data);
	}

	public function premiumlistall() {

		$this->load->model("investmentDetail");
		$investmentDetail = $this->investmentDetail->getPlanAll();

		$data = array(
			'body' => 'premium/policyListAll',
			'title' => 'Policy List',
			"planDetails" => $investmentDetail
		);

		$this->load->view('layout',$data);
	}

	public function printcertificate() {
		$policyID = $this->uri->segment(2);
		
		$this->load->model("investmentDetail");
		$investmentDetail = $this->investmentDetail->getPlanDetailByID($policyID);

		$data = array(
			"result" => $investmentDetail,
			"policyID" => $policyID
		);

		$this->load->view('premium/printcertificate', $data);
	}

	public function policydetail() {
		$policyID = $this->uri->segment(2);

		$this->load->model("investmentDetail");
		$planDetail = $this->investmentDetail->getPlanDetailByID($policyID);

		if($planDetail->planID == 2){
			$this->load->model('rdDetail');
			$detail = $this->rdDetail->getDetail($policyID);
		}

		if($planDetail->planID == 3){
			$this->load->model('npsDetail');
			$detail = $this->npsDetail->getDetail($policyID);
		}

		if($planDetail->planID == 4){
			$this->load->model('misDetail');
			$detail = $this->misDetail->getDetail($policyID);
		}

		$data = array(
			'planDetail' => $planDetail, 
			"policyID" => $policyID,
			"detail" => $detail,
			'body' => 'premium/policyDetail',
			'title' => 'Policy Detail'
		);
		$this->load->view('layout',$data);
	}

	public function printslip() {
		$invoiceInfoArray = explode("_", $this->uri->segment(2));

		$this->load->model("investmentDetail");
		$planDetail = $this->investmentDetail->getPlanDetailByID($invoiceInfoArray[1]);

		$data = array(
			'planDetail' => $planDetail, 
			"policyID" => $invoiceInfoArray[1],
			'title' => 'Policy Detail'
		);
		$this->load->view('premium/printSlip',$data);
	}

	public function collectpremium() {
		$policyID = $this->uri->segment(2);

		$this->load->model("investmentDetail");
		$planDetail = $this->investmentDetail->getPlanDetailByID($policyID);
		
		$data = array(
			'planDetail' => $planDetail, 
			"policyID" => $policyID,
			'body' => 'premium/collectpremium',
			'title' => 'Policy Detail'
		);
		$this->load->view('layout',$data);
	}

	public function setpremium() {
		$planID = $this->input->post('planID');
		$policyID = $this->input->post('policyID');
		$customerID = $this->input->post('customerID');
		$dipositorName = $this->input->post('dipositorName');
		$payMode = $this->input->post('payMode');
		$remark = $this->input->post('remark');
		$premiumDate = $this->input->post('premiumDate');
		$joinerID = $this->input->post('joinerID');
		$lateFee = $this->input->post('lateFee');
		$totalAmount = $this->input->post('totalAmount');
		$committee = $this->input->post('committee');
		$data = array(
			"customerID"	=>	$customerID,
			"policyID"		=>	$policyID,
			"premiumAmount"	=>	explode(' ', $totalAmount)[1],
			"balancePremium"=>	0,
			"updated"		=> 	date("y-m-d"),
			"created"		=>	date("y-m-d"),
			"depositorName"	=>	$dipositorName,
			"payMode"		=>	$payMode,
			"lateFee"		=>	explode(' ', $lateFee)[1],
			"remark"		=>	$remark
		);

		$daybookData = array(
			"amount" 			=> explode(' ', $totalAmount)[1],
			"transactionType" 	=> $planID == 4 ? "debit" : "credit",
			"source" 			=> "Premium Amount"
		);
		
		if($planID == 1)
			$this->db->insert("fddetail",$data);

		if($planID == 2)
			$this->db->insert("rdDetail",$data);

		if($planID == 3)
			$this->db->insert("npsdetail",$data);

		if($planID == 4)
			$this->db->insert("misdetail",$data);

		$this->db->insert("daybook", $daybookData);

		redirect("policydetail/$policyID", 'refresh');
	}

	public function printInvoice() {
		$installments = $this->uri->segment('invoiceID');

	}

}