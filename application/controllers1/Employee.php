<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

	public function newemploye() {
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
			$data['body'] = 'employee/newEmploye';
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
			$this->form_validation->set_rules('phone', 'Phone', 'required|min_length[6]|max_length[10]');
			$this->form_validation->set_rules('mobile', 'Mobile', 'required|min_length[10]|max_length[10]');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('aadharNo', 'Aadhar Number', 'required');
			$this->form_validation->set_rules('image', 'Image', 'required');
			$this->form_validation->set_rules('signature', 'Siganture', '');
			$this->form_validation->set_rules('idProof', 'ID Proof', 'required');


			$this->form_validation->set_rules('branchID', 'branchID', 'required');
			$this->form_validation->set_rules('username', 'username', 'required');
			$this->form_validation->set_rules('password', 'password', 'required');

			if ($this->form_validation->run() == FALSE):

				$this->load->model("branch");
				$branch = $this->branch->getBranch();

				$data['category'] = ['GEN','OBC','SC','ST','OTHER'];
				$data['gender'] 	= ['MALE','FEMALE','OTHER'];
				$data['isAdmin'] 	= array("NO" => 0, "YES" => 1);
				$data['branch']		= $branch;
				$data['title'] = 'New Employee';
				$data['body'] = 'employee/newEmploye';
				$this->load->view('layout',$data);

			else:

				$this->load->model("auth/logintable");
		    	$this->load->model("employe");

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
					"image" 		=> $this->input->post('image'),
					"signature" 	=> $this->input->post('signature'),
					"idProof" 		=> $this->input->post('idProof'),
					"rank" 			=> $this->input->post('rank')
				);

				if ($this->employe->setEmploye($employeData)):
			        redirect(base_url().'employes.html');
				else :
			        redirect(base_url().'employes/false');
				endif;


		    endif;
		}
	}

	public function employes() {
		$this->load->model("employe");
		$data['employes'] = $this->employe->getAllEmployee();
		$data['title'] = 'All Employee';
		$data['body'] = 'employee/employes';
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

}
