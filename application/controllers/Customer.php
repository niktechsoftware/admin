<?php
defined('BASEPATH') OR exit('No direct script access allowed');

		
 
class Customer extends CI_Controller {
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

	function csDetail()
	{


		$dt1 = date("Y-m-d", strtotime($this->input->post("sdt")));
		$dt2 =  date("Y-m-d", strtotime($this->input->post("edt")));
		
		$this->load->model('Customers');
		$data['abc']=$this->Customers->searchcus($dt1,$dt2);
		$data['title'] = 'Searched Customers';
		$data['body'] = 'customer/csdetail';
		$this->load->view('layout',$data);
	
		
	}
    
    

	public function getRank(){
	$agentCode= 	$this->input->post("date1");
		$this->load->model('Agents');
		$rank = $this->Agents->getRank($agentCode);
		echo $rank;
	}

	public function newcustomer() {
		if ($this->input->server('REQUEST_METHOD') == 'GET') {

			$this->load->model("branch");
			$branch = $this->branch->getBranch();

			$this->load->model("investmentPlans");
			$plans = $this->investmentPlans->getPlans();

			$this->load->model('Agents');
            $data['agents']=$this->Agents->getAllAgents()->result();
            
			$data['category'] 	= ['GEN','OBC','SC','ST','OTHER'];
			$data['gender'] 	= ['MALE','FEMALE','OTHER'];
			$data['isAdmin'] 	= array("NO" => 0, "YES" => 1);
			$data['branch']		= $branch;
			$data['plans']		= $plans;
			$data['title'] 		= 'New Customer';
			$data['body'] 		= 'customer/newCustomer';
			$this->load->view('layout',$data);
         


		}
		else if ($this->input->server('REQUEST_METHOD') == 'POST') {

			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('fatherName', 'Father Name', 'required');
			$this->form_validation->set_rules('motherName', 'Mother Name', 'required');
			$this->form_validation->set_rules('dob', 'Date of birth', 'required');
			$this->form_validation->set_rules('gender', 'Gender', 'required');
			$this->form_validation->set_rules('category', 'Category', 'required');
			$this->form_validation->set_rules('qualification', 'Qualification', 'required');
			$this->form_validation->set_rules('address', 'Address', 'required');
			$this->form_validation->set_rules('city', 'City', 'required');
			$this->form_validation->set_rules('state', 'State', 'required');
			$this->form_validation->set_rules('pin', 'Pin Code', 'required|min_length[6]|max_length[6]');
			$this->form_validation->set_rules('country', 'Country', 'required');
			$this->form_validation->set_rules('mobile', 'Mobile', 'required|min_length[10]|max_length[10]');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('aadharNo', 'Aadhar Number', 'required');
			$this->form_validation->set_rules('image', 'File', 'trim|xss_clean');
			$this->form_validation->set_rules('signature', 'File', 'trim|xss_clean');
			$this->form_validation->set_rules('idProof', 'File', 'trim|xss_clean');
			$this->form_validation->set_rules('branchID', 'branchID', 'required');
			$this->form_validation->set_rules('committee', 'committee', 'required');
			$this->form_validation->set_rules('username', 'username', 'required');
			$this->form_validation->set_rules('password', 'password', 'required');

			if ($this->form_validation->run() == FALSE):

				$this->load->model("branch");
				$branch = $this->branch->getBranch();

				$this->load->model("investmentPlans");
				$plans = $this->investmentPlans->getPlans();

				$data['category'] = ['GEN','OBC','SC','ST','OTHER'];
				$data['gender'] 	= ['MALE','FEMALE','OTHER'];
				$data['isAdmin'] 	= array("NO" => 0, "YES" => 1);
				$data['branch']		= $branch;
				$data['plans']		= $plans;
				$data['title'] 		= 'New Customer';
				$data['body'] 		= 'customer/newCustomer';
				$this->load->view('layout',$data);

			else:

				$this->load->model("auth/logintable");
				$this->load->model("customers");

				$loginData = array(
					"branchID" 	=> $this->input->post('branchID'),
					"roleID" 	=> 1,
					"isAdmin" 	=> 0,
					"username" 	=> $this->input->post('username'),
					"password" 	=> sha1($this->input->post('password'))
				);

				$loginID = $this->logintable->setLogin($loginData);
				

				$customerData = array(
					"loginID" 		=> $loginID,
					"branchID" 		=> $this->input->post('branchID'),
					"committeeID" 	=> $this->input->post("committee"),
					"name" 			=> $this->input->post('name'),
					"joinerID"      => $this->input->post('agentCode'),
					"fatherName" 	=> $this->input->post('fatherName'),
					"motherName" 	=> $this->input->post('motherName'),
					"dob" 			=> date('Y-m-d', strtotime($this->input->post('dob'))),
					"gender" 		=> $this->input->post('gender'),
					"category" 		=> $this->input->post('category'),
					"qualification" => $this->input->post('qualification'),
					"activeStatus" 	=> 1,
					"address" 		=> $this->input->post('address'),
					"city" 			=> $this->input->post('city'),
					"state" 		=> $this->input->post('state'),
					"pin" 			=> $this->input->post('pin'),
					"country" 		=> $this->input->post('country'),
					"phone" 		=> $this->input->post('phone'),
					"mobile" 		=> $this->input->post('mobile'),
					"email" 		=> $this->input->post('email'),
					"idProof" 		=> $this->input->post('idProof'),
					"adhaarNo" 		=> $this->input->post('aadharNo')
				);
				$customerno = $this->customers->setCustomer($customerData);
				$customerID = date("ymd", strtotime($this->input->post("joindate"))).'C'.$customerno;
				$policy_No = date("ymd", strtotime($this->input->post("joindate"))).'P'.$customerno;
				$cusdata = array(
						'policy_No' =>	$policy_No,
						'Customer_ID' => $customerID
						
				);
				
				$this->db->where("id",$customerno);
				$this->db->update("customer",$cusdata);
				
				$this->load->library('upload');
				$config['upload_path'] = realpath(APPPATH . '../assets/images/customer');
				// $config['allowed_types'] = 'gif|jpg|jpeg|png';
				$config['max_size'] = '1024';
				$config['allowed_types']  = 'gif|jpg|png|bmp';
				$config['file_name'] = "IMG".$customerID.'.'.substr(strrchr($_FILES['image']['name'],'.'),1);
				$image = $config['file_name'];
				$this->upload->initialize($config);
				if ( !$this->upload->do_upload('image',FALSE)) {
					$this->form_validation->set_message('image', $data['error'] = $this->upload->display_errors());
					if($data['error']):
						echo $data['error'];
						die();
					endif;
				}

				$config['file_name'] = "SIG".$customerID.'.'.substr(strrchr($_FILES['signature']['name'],'.'),1);
				$siganture = $config['file_name'];
				$this->upload->initialize($config);
				if ( !$this->upload->do_upload('signature',FALSE)) {
					$this->form_validation->set_message('signature', $data['error'] = $this->upload->display_errors());
					if($data['error']):
						echo $data['error'];
						die();
					endif;
				}

				$config['file_name'] = "PROOF".$customerID.'.'.substr(strrchr($_FILES['idProof']['name'],'.'),1);
				$idProof = $config['file_name'];
				$this->upload->initialize($config);
				if ( !$this->upload->do_upload('idProof',FALSE)) {
					$this->form_validation->set_message('idProof', $data['error'] = $this->upload->display_errors());
					if($data['error']):
						echo $data['error'];
						die();
					endif;
				}

				/**
				 * This form validation is for check image successful upload or not.
				 */
				if ($this->form_validation->run() == FALSE):

					$this->load->model("branch");
					$branch = $this->branch->getBranch();

					$this->load->model("investmentPlans");
					$plans = $this->investmentPlans->getPlans();

					$data['category'] 	= ['GEN','OBC','SC','ST','OTHER'];
					$data['gender'] 	= ['MALE','FEMALE','OTHER'];
					$data['isAdmin'] 	= array("NO" => 0, "YES" => 1);
					$data['branch']		= $branch;
					$data['plans']		= $plans;
					$data['title'] 		= 'New Customer';
					$data['body'] 		= 'customer/newCustomer';
					$this->load->view('layout',$data);

				else:
					$dataImage = array(
						"image"		=> $image,
						"signature"	=> $siganture,
						"idProof"	=> $idProof
					);
					$this->customers->updateCustomer($customerID, $dataImage);

					$investmentData = array(
						"customerID"	=> $customerID,
						"branchID"		=> $this->input->post("branchID"),
						"committeeID"	=> $this->input->post("committee"),
						"planID"		=> $this->input->post("planID"),
						"durationYear"	=> $this->input->post("duration"),
						"durationMonth"	=> ($this->input->post("duration") * 12),
						"updated"       =>$this->input->post("joindate"),
						"created"       =>$this->input->post("joindate")
					);

					$daybookData = array(
						"transactionType" 	=> $this->input->post("planID") == 5 ? "debit" : "credit",
						"source" 			=> "First Premium Amount"
					);

					$planID = $this->input->post('planID');

					if($planID == 1):
					     $smsAmount=$this->input->post("investAmount-fd");
						$daybookData["amount"] = $this->input->post("investAmount-fd");
						$investmentData["oneTimeInvestment"]= $this->input->post("investAmount-fd");
						$investmentData["meturity"] 		= $this->input->post("meturtyAmount-fd");
						$investmentData["appliedIntrest"] 	= $this->input->post("appliedInterest-fd");
						$joindate	=	$this->input->post("joindate");
						$datea = date("Y-m-d",strtotime($joindate));
						
						$fdinsertData = array(
								'customerID'=>$customerID,
								'policyID'=>"",
								'premiumAmount'=>$this->input->post("investAmount-fd"),
								'balancePremium'=>0,
								'paid'=>0,
								'should_paid'=>$datea,
								'depositorName'=>"",
								'payMode'=>"",
								'lateFee'=>"",
								'remark'=>"",
								'paid_date'=>"",
								'status'=>"Pending",
								'remaining_months'=>1,
								'invoice_slip'=>""
					
						);
						$this->db->insert("fdDetail",$fdinsertData);

					elseif($planID == 2):
					    $smsAmount=$this->input->post("monthInvestAmount-rd");
						$daybookData["amount"] = $this->input->post("monthInvestAmount-rd");
						$investmentData["monthlyInvestment"] = $this->input->post("monthInvestAmount-rd");
					    $investmentData["totalInvestment"] = $this->input->post("investAmount-rd");
					    $investmentData["meturity"] = $this->input->post("meturtyAmount-rd"); 
					    $investmentData["appliedIntrest"] = $this->input->post("appliedInterest-rd"); 
					    $npstotmonths = ($this->input->post("duration") * 12);
					    $joindate	=	$this->input->post("joindate");
					    $datea = date("Y-m-d",strtotime($joindate));
					    for($i=1; $i<13; $i++){
					    	if($npstotmonths>0){
					    		$rdinsertData = array(
					    				'customerID'=>$customerID,
					    				'policyID'=>"",
					    				'premiumAmount'=>$this->input->post("monthInvestAmount-rd"),
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
					    

					elseif($planID == 3):
					    $smsAmount=$this->input->post("monthAmount");
						$daybookData["amount"] = $this->input->post("monthAmount");
						$investmentData["pensionAmount"] = $this->input->post("planAMount-nps");
						$investmentData["totalInvestment"] = $this->input->post("totalAmount-nps");
						$investmentData["meturity"] = $this->input->post("meturtyAmount-nps");
						$investmentData["investerAge"] = $this->input->post("investorAge-nps");
						$investmentData["appliedIntrest"] = $this->input->post("appliedInterest-nps");
						$investmentData["monthlyInvestment"] = $this->input->post("monthAmount");
						$joindate	=	$this->input->post("joindate");
						$datea = date("Y-m-d",strtotime($joindate));
						$npstotmonths = ($this->input->post("duration") * 12);
						for($i=1; $i<13; $i++){
							if($npstotmonths>0){
						$npsinsertData = array(
								'customerID'=>$customerID,
								'policyID'=>"",
								'premiumAmount'=>$this->input->post("monthAmount"),
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
						$this->db->insert("npsDetail",$npsinsertData);
						$datea = date('Y-m-d', strtotime("+30 days", strtotime($datea)));
						}}

					elseif($planID == 4):
					    $smsAmount=$this->input->post("investAmount-mip");
						$daybookData["amount"] = $this->input->post("investAmount-mip");
						$investmentData["oneTimeInvestment"] = $this->input->post("investAmount-mip");
						$investmentData["monthlyReturn"] = $this->input->post("monthlyReturn-mip");
						$investmentData["meturity"] = $this->input->post("meturityAmount-mip");
						$investmentData["appliedIntrest"] = $this->input->post("appliedInterest-mip");
						
						$joindate	=	$this->input->post("joindate");
						$datea = date("Y-m-d",strtotime($joindate));
						$mistotMonth = ($this->input->post("duration") * 12);
						for($i=1; $i<$mistotMonth+1; $i++){
							if($mistotMonth>0){
							$datea = date('Y-m-d', strtotime("+30 days", strtotime($datea)));
						$misinsertdata = array(
								'customerID'=>$customerID,
								'policyID'=>"",
								'premiumAmount'=>$this->input->post("monthlyReturn-mip"),
								'balancePremium'=>0,
								'paid'=>0,
								'should_paid'=>$datea,
								'depositorName'=>"",
								'payMode'=>"",
								'lateFee'=>"",
								'remark'=>"",
								'paid_date'=>"",
								'status'=>"Pending",
								'remaining_months'=>$mistotMonth,
								'invoice_slip'=>""
						);
						$mistotMonth=$mistotMonth-1;
					$this->db->insert("misDetail",$misinsertdata);	
				}}
					$redy = 	$this->db->get("daybook");
		                $ins = $redy->num_rows();
		                $invoice_s = "JMDF".$ins;
		                $daybookData['customer_ID'] =$customerID;
		                  $daybookData['invoice_no'] = $invoice_s;
					$this->db->insert("daybook", $daybookData);
				
				elseif($planID == 5):
				    $dayinc=0;
				    $totmont = 0;
						   $totyear = 0;
						$daybookData["amount"] = $this->input->post("totalAmount-loan");
						$smsAmount=$this->input->post("totalAmount-loan");;
						$amt = $this->input->post("totalAmount-loan");
						$irate =  $this->input->post("appliedInterest-loan");
						$mistotMonth = $this->input->post("totalInstalment-loan");
						$dyu =$this->input->post("duration");
					
						if($dyu==1){
						    $dayinc=1;
						   $totmont =  ($mistotMonth*1)/30;
						   $totyear =  $totmont/12;
						}
						if($dyu==2){
						        $dayinc=7;
						    $totmont =  ($mistotMonth*7)/30;
						   $totyear =  $totmont/12;
						}
						if($dyu==3){
						      $dayinc=15;
						    $totmont =  ($mistotMonth*15)/30;
						   $totyear =  $totmont/12;
						}
						if($dyu==4){
						        $dayinc=30;
						    $totmont =  ($mistotMonth*30)/30;
						   $totyear =  $totmont/12;
						}
							echo $amt;
						echo "<br>".$irate;
						echo "<br>".$this->input->post("duration");
						echo "<br>".$this->input->post("totalInstalment-loan");
						echo "<br>".$totmont;
						$irateofv = (($amt*$irate)/100)*$mistotMonth; 
							echo "<br>".(($amt*$irate*$totmont)/(100*12));;
						echo "<br>".$irateofv;
						 $monthlyReturn = $irateofv/$mistotMonth;
						$investmentData["oneTimeInvestment"] = $amt;
						$investmentData["durationYear"]=$totyear;
						$investmentData["durationMonth"]=$totmont;
						$investmentData["monthlyReturn"] = $monthlyReturn;
						$investmentData["meturity"] = $irateofv;
						$investmentData["appliedIntrest"] = $this->input->post("appliedInterest-loan");
						
						$joindate	=	$this->input->post("joindate");
						$datea = date("Y-m-d",strtotime($joindate));
						
						for($i=1; $i<13; $i++){
							if($mistotMonth>0){
							$datea = date('Y-m-d', strtotime("+$dayinc days", strtotime($datea)));
						$misinsertdata = array(
								'customerID'=>$customerID,
								'policyID'=>$customerID,
								'premiumAmount'=>$monthlyReturn,
								'balancePremium'=>0,
								'paid'=>0,
								'should_paid'=>$datea,
								'depositorName'=>"",
								'payMode'=>"",
								'lateFee'=>"",
								'remark'=>"",
								'paid_date'=>"",
								'status'=>"Pending",
								'remaining_months'=>$mistotMonth,
								'invoice_slip'=>""
						);
						$mistotMonth=$mistotMonth-1;
					$this->db->insert("loanDetail",$misinsertdata);
					//echo $datea;
					
				}}
					$redy = 	$this->db->get("daybook");
		                $ins = $redy->num_rows();
		                $invoice_s = "JMDF".$ins;
		                $daybookData['customer_ID'] =$customerID;
		                  $daybookData['invoice_no'] = $invoice_s;
					$this->db->insert("daybook", $daybookData);
					endif;
					
					$this->load->model("investmentDetail");
					if ($this->investmentDetail->setDetail($investmentData)):
					$username 	= $this->input->post('username');
					$password 	= $this->input->post('password');
					$mobile = $this->input->post('mobile');
						$name			= $this->input->post('name');
						$date5 = date("Y-m-d");
					$msg="Congratulations Dear ".$name." Your A/C No. ".$customerID." is created for Rs. ".$smsAmount." on ".$date5." JMD Finance Pvt.Ltd.";
					//$msg = "Welcome to JMD Finance Pvt. Ltd. Your Customer Userid=".$username." And Password = ".$password." Please Keep Your LoginID and Password secret.";
					$this->load->helper("sms");
					sms($mobile,$msg);
				        redirect(base_url().'customers.html');
					else :
				        redirect(base_url().'customers/false');
					endif;
				endif;
		    endif;
		}
	}




	public function customers() {
		$this->load->model("customers");
		$data['employes'] = $this->customers->getAllCustomers();
		$data['title'] = 'All Customers';
		$data['body'] = 'customer/customers';
		$this->load->view('layout',$data);
	}

	public function customerdetail() {
		$customerID = $this->uri->segment(3);
		$this->load->model('customers');
		$customer = $this->customers->getCustomer($customerID);

		$this->load->model("investmentDetail");
		$investmentPlanDetail = $this->investmentDetail->getPlanCustomerID($customerID);

		$this->load->model("investmentPlans");
		$planDetail = $this->investmentPlans->getPlan($investmentPlanDetail->planID);

		$this->load->model("branch");
		$branchDetail = $this->branch->getBranchID($customer->branchID);

		$this->load->model("commitee");
		$commiteeDetail = $this->commitee->getCommittee($customer->committeeID);

		$this->load->model("auth/logintable");
		$loginDetail = $this->logintable->getLogin($customer->loginID);



		$data['customer'] = $customer;
		$data['planDetail'] = $planDetail;
		$data['commiteeDetail'] = $commiteeDetail;
		$data['loginDetail'] = $loginDetail;
		$data['branchDetail'] = $branchDetail;
		$data['investDetail'] = $investmentPlanDetail;
		$data['title'] = 'Customer :: '.$customer->name;
		$data['body'] = 'customer/customer';
		$this->load->view('layout',$data);
	}
	
	public function customerEdit() {
		$customerID = $this->uri->segment(3);
		$this->load->model('customers');
		$customer = $this->customers->getCustomer($customerID);
	
		$this->load->model("investmentDetail");
		$investmentPlanDetail = $this->investmentDetail->getPlanCustomerID($customerID);
	
		$this->load->model("investmentPlans");
		$planDetail = $this->investmentPlans->getPlan($investmentPlanDetail->planID);
	
		$this->load->model("branch");
		$branchDetail = $this->branch->getBranchID($customer->branchID);
	
		$this->load->model("commitee");
		$commiteeDetail = $this->commitee->getCommittee($customer->committeeID);
	
		$this->load->model("auth/logintable");
		$loginDetail = $this->logintable->getLogin($customer->loginID);
	
	
	
		$data['customer'] = $customer;
		$data['planDetail'] = $planDetail;
		$data['commiteeDetail'] = $commiteeDetail;
		$data['loginDetail'] = $loginDetail;
		$data['branchDetail'] = $branchDetail;
		$data['investDetail'] = $investmentPlanDetail;
		$data['title'] = 'Customer :: '.$customer->name;
		$data['body'] = 'customer/customeredit';
		$this->load->view('layout',$data);
	}
	
	public function editcustomer(){
		$customerID=$this->input->post('customerid');
		$this->load->model('customers');
		$customerData = array(
	
	
				"name" 			=> $this->input->post('name'),
				"fatherName" 	=> $this->input->post('fatherName'),
				"motherName" 	=> $this->input->post('motherName'),
				"dob" 			=> date('Y-m-d', strtotime($this->input->post('dob'))),
				"gender" 		=> $this->input->post('gender'),
				"category" 		=> $this->input->post('category'),
				"qualification" => $this->input->post('qualification'),
				"activeStatus" 	=> 1,
				"address" 		=> $this->input->post('address'),
				"city" 			=> $this->input->post('city'),
				"state" 		=> $this->input->post('state'),
				"pin" 			=> $this->input->post('pin'),
				"country" 		=> $this->input->post('country'),
				"phone" 		=> $this->input->post('phone'),
				"mobile" 		=> $this->input->post('mobile'),
				"email" 		=> $this->input->post('email'),
				
				"adhaarNo" 		=> $this->input->post('aadharNo')
		);
		//$customerID = $this->customers->setCustomer($customerData);
		$this->db->where("id",$customerID);
		$ft=$this->db->update("customer",$customerData);
		$this->load->library('upload');
		$config['upload_path'] = realpath(APPPATH . '../assets/images/customer');
		// $config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = '1024';
		$config['allowed_types']  = 'gif|jpg|png';
		
		if(strlen($_FILES['image']['name'])!=""){
		$config['file_name'] = "IMG".$customerID.'.'.substr(strrchr($_FILES['image']['name'],'.'),1);
		$image = $config['file_name'];
		$this->upload->initialize($config);
		$this->upload->do_upload('image',FALSE);
		$dataImage = array(
				"image"		=> $image
		);
		
		$this->customers->updateCustomer($customerID, $dataImage);
		}
		if(strlen($_FILES['signature']['name'])!=""){
		$config['file_name'] = "SIG".$customerID.'.'.substr(strrchr($_FILES['signature']['name'],'.'),1);
		$siganture = $config['file_name'];
		$this->upload->initialize($config);
		$this->upload->do_upload('signature',FALSE);
		$dataImage = array(
				"signature"	=> $siganture
		);
			
		$this->customers->updateCustomer($customerID, $dataImage);
		}
		if(strlen($_FILES['idProof']['name'])!=""){
		$config['file_name'] = "PROOF".$customerID.'.'.substr(strrchr($_FILES['idProof']['name'],'.'),1);
		$idProof = $config['file_name'];
		$this->upload->initialize($config);
		$this->upload->do_upload('idProof',FALSE);
		$dataImage = array(
				"idProof"	=> $idProof
		);
		
		$this->customers->updateCustomer($customerID, $dataImage);
		}
		
		
		
		if($ft):
		redirect(base_url().'customers.html');
		else :
		redirect(base_url().'customers/false');
		endif;
	}

	public function customerDelete(){
	    $empid = $this->uri->segment(3);
	   // echo $empid;
	    ?><script>   	
	    	if (result) {
	    	   
	    	}else{
	    		<?php $this->db->where("Customer_ID",$empid);
		    	      $this->db->delete("customer");?>
                <?php $this->db->where("Customer_ID",$empid);
        $this->db->delete("daybook");?>
		    	
	    	}
	    </script>
	  <?php redirect(base_url().'customers.html','refresh');
	 }
	
	function getmonthAmount(){
		$duration	=	$this->input->post("durationTitle");
		
		$planrate 	= 	$this->input->post("plan");
		//echo $duration;
		$this->db->select("deposite");
		$this->db->where("duration",$duration);
		$rty = $this->db->get("npsmaster")->row();
		echo $planrate*$rty->deposite;
	}

}
