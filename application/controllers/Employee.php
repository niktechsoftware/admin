<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {
    
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
	
function empDetail()
	{


		$dt1 = date("Y-m-d", strtotime($this->input->post("sdt")));
		$dt2 =  date("Y-m-d", strtotime($this->input->post("edt")));
		$this->load->model('Employe');
		$data['abc']=$this->Employe->empsearch($dt1,$dt2);
		$data['title'] = 'Searched Employee';
		$data['body'] = 'employee/empdetail';
		$this->load->view('layout',$data);
	
		
	}
    

	public function employeeDelete(){
	    $empid = $this->uri->segment(3);
	   // echo $empid;
	    ?><script>   	
	    	if (result) {

	    	   
	    	}
	    	else
	    	{
	    		<?php 
		    	    $this->load->helper('sms');
                   $this->db->where('id',$empid);
                   $ab=$this->db->get('employee')->row();
                   $a=$ab->mobile;
                  $b=$ab->name;
                   $bcc="Dear Employe "."". $b." your Employe Profile from JMDF has been successfully deleted";    	
                sms($a,$bcc);
                $this->db->where("id",$empid);
		    	$this->db->delete("employee");
                         ?>
		    	
	    	}
	    	
	    </script>
	  <?php redirect(base_url().'employes.html','refresh');
	 }
	

	public function newemploye() {
		if ($this->input->server('REQUEST_METHOD') == 'GET') {
			$this->load->model("branch");
			$branch = $this->branch->getBranch();

			$this->load->model('rank');
			$rank = $this->rank->getRanks();
			$data['category'] = ['GEN','OBC','SC','ST','OTHER'];
			$data['gender'] 	= ['MALE','FEMALE','OTHER'];
			$data['post'] 	= ['Computer Operator','Area Manager','Branch Manager','Field Manager','Regional Officer', 'District Manager' ];
			$data['isAdmin'] 	= array("NO" => 0, "YES" => 1);
			$data['branch']		= $branch;
			$data['rank']	= $rank;
			$data['title'] = 'New Employee';
			$data['body'] = 'employee/newEmploye';
			$this->load->view('layout',$data);
		}
		else if ($this->input->server('REQUEST_METHOD') == 'POST') {

			

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
					"emp_designation" 	=> $this->input->post('emp_designation'),
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
					"aadharNo" 		=> $this->input->post('aadharNo')
					
				);
				$employeeID = $this->employe->setEmploye($employeData);
				$this->load->library('upload');
				$config['upload_path'] = realpath(APPPATH . '../assets/images/employee');
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
				$this->employe->updateEmployee($employeeID, $dataImage);
				if ($employeeID):
				$username 	= $this->input->post('username');
				$password 	= $this->input->post('password');
				$mobile = $this->input->post('mobile');
				$msg = "Welcome to JMD Finance Pvt. Ltd. Your Employee Userid=".$username." And Password = ".$password." Please Keep Your LoginID and Password secret.";
				$this->load->helper("sms");
			//	sms($mobile,$msg);
			        redirect(base_url().'employes.html');
				else :
			        redirect(base_url().'employes/false');
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
	
	public function employeedetail() {
		$employeeID = $this->uri->segment(2);
		$this->load->model('employe');
		$employee = $this->employe->getemployee($employeeID);
	
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
		$data['body'] = 'employee/employee';
		$this->load->view('layout',$data);
	}
	
	public function employeeEdit() {
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
	
	
	public function saveEditEmp(){
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
				"aadharNo" 		=> $this->input->post('aadharNo')
			
		);
		$employeeID=$this->input->post("employeeID");
		$this->load->model('employe');
		$ft['ft']=$this->employe->savaEditemp($employeeID,$employeData);
		$this->load->model('employe');
		$this->load->library('upload');
		$config['upload_path'] = realpath(APPPATH . '../assets/images/employee');
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
		
		$ft = $this->employe->updateEmployee($employeeID, $dataImage);
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
		
		$this->employe->updateEmployee($employeeID, $dataImage);
		}
		
		if($ft):
		redirect(base_url().'employes.html');
		else :
		redirect(base_url().'employes/false');
		endif;
	}

}
