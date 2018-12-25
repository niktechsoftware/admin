<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agent extends CI_Controller {

	public function newAgent() {
		if ($this->input->server('REQUEST_METHOD') == 'GET') {
			$this->load->model("branch");
			$branch = $this->branch->getBranch();

			$this->load->model('rank');
			$rank = $this->rank->getRanks();

			$data['category'] = ['GEN','OBC','SC','ST','OTHER'];
			$data['gender'] 	= ['MALE','FEMALE','OTHER'];
			$data['isAdmin'] 	= array("NO" => 0, "YES" => 1);
			$data['branch']		= $branch;
			$data['rank']	= $rank;
			$data['title'] = 'New Employee';
			$data['body'] = 'agent/newAgent';
			$this->load->view('layout',$data);
		}
		else if ($this->input->server('REQUEST_METHOD') == 'POST') {

			

				$this->load->model("auth/logintable");
		    	$this->load->model("agents");

				$loginData = array(
					"branchID" 	=> $this->input->post('branchID'),
					"roleID" 	=> 1,
					"isAdmin" 	=> 0,
					"username" 	=> $this->input->post('username'),
					"password" 	=> sha1($this->input->post('password'))
				);

				$loginID = $this->logintable->setLogin($loginData);

				$employeData = array(
					"isAdmin" 		=> $this->input->post('isAdmin'),
					"loginID" 		=> $loginID,
					"branchID" 		=> $this->input->post('branchID'),
					"name" 			=> $this->input->post('name'),
					"fatherName" 	=> $this->input->post('fatherName'),
					"motherName" 	=> $this->input->post('motherName'),
					"dob" 			=> $this->input->post('dob'),
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
					"aadharNo" 		=> $this->input->post('aadharNo'),
					"rank" 			=> $this->input->post('rank')
				);
				$employeeID = $this->agents->setAgent($employeData);
				$this->load->library('upload');
				$config['upload_path'] = realpath(APPPATH . '../assets/images/agents');
				// $config['allowed_types'] = 'gif|jpg|jpeg|png';
				$config['max_size'] = '1024';
				$config['allowed_types']  = 'gif|jpg|png';
				$config['file_name'] = "IMG".$employeeID.'.'.substr(strrchr($_FILES['image']['name'],'.'),1);
				$image = $config['file_name'];
				$this->upload->initialize($config);
				if ( !$this->upload->do_upload('image',FALSE)) {
					$this->form_validation->set_message('image', $data['error'] = $this->upload->display_errors());
					if($data['error']):
					echo $data['error'];
					die();
					endif;
				}
				
				$config['file_name'] = "SIG".$employeeID.'.'.substr(strrchr($_FILES['signature']['name'],'.'),1);
				$siganture = $config['file_name'];
				$this->upload->initialize($config);
				if ( !$this->upload->do_upload('signature',FALSE)) {
					$this->form_validation->set_message('signature', $data['error'] = $this->upload->display_errors());
					if($data['error']):
					echo $data['error'];
					die();
					endif;
				}
				
				$config['file_name'] = "PROOF".$employeeID.'.'.substr(strrchr($_FILES['idProof']['name'],'.'),1);
				$idProof = $config['file_name'];
				$this->upload->initialize($config);
				if ( !$this->upload->do_upload('idProof',FALSE)) {
					$this->form_validation->set_message('idProof', $data['error'] = $this->upload->display_errors());
					if($data['error']):
					echo $data['error'];
					die();
					endif;
				}
				$dataImage = array(
						"image"		=> $image,
						"signature"	=> $siganture,
						"idProof"	=> $idProof
				);
				$this->agents->updateAgent($employeeID, $dataImage);
				if ($employeeID):
			        redirect(base_url().'agents.html');
				else :
			        redirect(base_url().'agents/false');
				endif;

		}
	
		
	}

	public function agents() {
	$this->load->model("agents");
		$data['employes'] = $this->agents->getAllAgents();
		$data['title'] = 'All Agents';
		$data['body'] = 'agent/agents';
		$this->load->view('layout',$data);
	}

	public function employebybranch() {
		if ($this->input->server('REQUEST_METHOD') == 'POST'):

			$branchID = $this->input->post('branchID');
			$this->load->model('employe');
			$branches = $this->employe->employebybranch($branchID);
			
			$response = array(
				'success' => true,
				'result' => $branches,
				'message' => 'Success'
			);

		else:
			$response = array(
				"success" => false,
				"result" => null,
				"message" => "trying to access with wrong method."
			);
		endif; 

		echo json_encode($response);
	}
	
	public function agentdetails() {
		$employeeID = $this->uri->segment(2);
		$this->load->model('agents');
		$employee = $this->agents->getagent($employeeID);
	
		$this->load->model("investmentDetail");
		$investmentPlanDetail = $this->investmentDetail->getPlanCustomerID($employeeID);
	
		$this->load->model("investmentPlans");
		//$planDetail = $this->investmentPlans->getPlan($investmentPlanDetail->planID);
	
		$this->load->model("branch");
		$branchDetail = $this->branch->getBranchID($employee->branchID);
	
		$this->load->model("commitee");
		//$commiteeDetail = $this->commitee->getCommittee($employee->committeeID);
	
		$this->load->model("auth/logintable");
		$loginDetail = $this->logintable->getLogin($employee->loginID);
	
	
	
		$data['employee'] = $employee;
		//$data['planDetail'] = $planDetail;
		//$data['commiteeDetail'] = $commiteeDetail;
		$data['loginDetail'] = $loginDetail;
		$data['branchDetail'] = $branchDetail;
		$data['investDetail'] = $investmentPlanDetail;
		$data['title'] = 'Employee :: '.$employee->name;
		$data['body'] = 'agent/agent';
		$this->load->view('layout',$data);
	}
	
	public function agentEdit() {
		$customerID = $this->uri->segment(2);
		$this->load->model('employe');
		$employee = $this->employe->getEmployee($customerID);
	
		$this->load->model("investmentDetail");
		$investmentPlanDetail = $this->investmentDetail->getPlanCustomerID($customerID);
	
		
	
		$this->load->model("branch");
		$branchDetail = $this->branch->getBranchID($employee->branchID);
	
	
	
		$this->load->model("auth/logintable");
		$loginDetail = $this->logintable->getLogin($employee->loginID);
		$data['category'] = ['GEN','OBC','SC','ST','OTHER'];
		$data['gender'] 	= ['MALE','FEMALE','OTHER'];
		$this->load->model('rank');
		$rank = $this->rank->getRanks();
		$data['rank']	= $rank;
		$data['employee'] = $employee;
		$data['loginDetail'] = $loginDetail;
		$data['branchDetail'] = $branchDetail;
		$data['investDetail'] = $investmentPlanDetail;
		$data['title'] = 'Employee :: '.$employee->name;
		$data['body'] = 'employee/employeeEdit';
		$this->load->view('layout',$data);
	}
	
	
	public function saveEditagent(){
		$employeData = array(
				
				
				"branchID" 		=> $this->input->post('branchID'),
				"name" 			=> $this->input->post('name'),
				"fatherName" 	=> $this->input->post('fatherName'),
				"motherName" 	=> $this->input->post('motherName'),
				"dob" 			=> $this->input->post('dob'),
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
				"aadharNo" 		=> $this->input->post('aadharNo'),
				"rank" 			=> $this->input->post('rank')
		);
		
		$employeeID=$this->input->post("employeeID");
		$this->db->where("id",$this->input->post("employeeID"));
		$ft = $this->db->update("agent",$employeData);
		$this->load->model('agents');
		$this->load->library('upload');
		$config['upload_path'] = realpath(APPPATH . '../assets/images/agents');
		// $config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = '1024';
		$config['allowed_types']  = 'gif|jpg|png';
		$filename = $_FILES['image']['name'];
		if($filename !=""){
			
		$config['file_name'] = "IMG".$employeeID.'.'.substr(strrchr($_FILES['image']['name'],'.'),1);
		$image = $config['file_name'];
		$this->upload->initialize($config);
		$this->upload->do_upload('image',FALSE);
		//echo $image;
		$dataImage = array(
				"image"		=> $image
		);
		
		$ft = $this->agents->updateAgent($employeeID, $dataImage);
		}
		if($_FILES['signature']['name'] !=""){
		$config['file_name'] = "SIG".$employeeID.'.'.substr(strrchr($_FILES['signature']['name'],'.'),1);
		$siganture = $config['file_name'];
		$this->upload->initialize($config);
			$this->upload->do_upload('signature',FALSE);
			$dataImage = array(
					"signature"	=> $siganture
			);
			
			$ft = $this->employe->updateEmployee($employeeID, $dataImage);
		}
		if($_FILES['idProof']['name'] !=""){
		$config['file_name'] = "PROOF".$employeeID.'.'.substr(strrchr($_FILES['idProof']['name'],'.'),1);
		$idProof = $config['file_name'];
		$this->upload->initialize($config);
		$this->upload->do_upload('idProof',FALSE);
		$dataImage = array(
				"idProof"	=> $idProof
		);
		
		$this->agents->updateAgent($employeeID, $dataImage);
		}
		
		if($ft):
		redirect(base_url().'employes.html');
		else :
		redirect(base_url().'employes/false');
		endif;
	}

}
