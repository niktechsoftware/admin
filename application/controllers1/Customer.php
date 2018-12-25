<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function newcustomer() {
		if ($this->input->server('REQUEST_METHOD') == 'GET') {

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
				$customerID = $this->customers->setCustomer($customerData);

				$this->load->library('upload');
				$config['upload_path'] = realpath(APPPATH . '../assets/images/customer');
				// $config['allowed_types'] = 'gif|jpg|jpeg|png';
				$config['max_size'] = '1024';
				$config['allowed_types']  = 'gif|jpg|png';
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
						"durationMonth"	=> ($this->input->post("duration") * 12)
					);

					$daybookData = array(
						"transactionType" 	=> "credit",
						"source" 			=> "First Premium Amount"
					);

					$planID = $this->input->post('planID');

					if($planID == 1):
						$daybookData["amount"] = $this->input->post("investAmount-fd");
						$investmentData["oneTimeInvestment"]= $this->input->post("investAmount-fd");
						$investmentData["meturity"] 		= $this->input->post("meturtyAmount-fd");
						$investmentData["appliedIntrest"] 	= $this->input->post("appliedInterest-fd");

					elseif($planID == 2):
						$daybookData["amount"] = $this->input->post("monthInvestAmount-rd");
						$investmentData["monthlyInvestment"] = $this->input->post("monthInvestAmount-rd");
					    $investmentData["totalInvestment"] = $this->input->post("investAmount-rd");
					    $investmentData["meturity"] = $this->input->post("meturtyAmount-rd"); 
					    $investmentData["appliedIntrest"] = $this->input->post("appliedInterest-rd"); 

					elseif($planID == 3):
						$daybookData["amount"] = $this->input->post("monthAmount-nps");
						$investmentData["pensionAmount"] = $this->input->post("planAMount-nps");
						$investmentData["totalInvestment"] = $this->input->post("totalAmount-nps");
						$investmentData["meturity"] = $this->input->post("meturtyAmount-nps");
						$investmentData["investerAge"] = $this->input->post("investorAge-nps");
						$investmentData["appliedIntrest"] = $this->input->post("appliedInterest-nps");
						$investmentData["monthlyInvestment"] = $this->input->post("monthAmount-nps");

					elseif($planID == 4):
						$daybookData["amount"] = $this->input->post("investAmount-mip");
						$investmentData["oneTimeInvestment"] = $this->input->post("investAmount-mip");
						$investmentData["monthlyReturn"] = $this->input->post("monthlyReturn-mip");
						$investmentData["meturity"] = $this->input->post("meturityAmount-mip");
						$investmentData["appliedIntrest"] = $this->input->post("appliedInterest-mip");

					endif;
					$this->db->insert("daybook", $daybookData);
					$this->load->model("investmentDetail");
					if ($this->investmentDetail->setDetail($investmentData)):
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
		$customerID = $this->uri->segment(2);
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

}
