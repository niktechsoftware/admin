<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agent extends CI_Controller {
    
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

	function agentDetail()
	{
		$dt1=$this->input->post("sdt");
		$dt2=$this->input->post("edt");

		// $dt1 = date("d-m-y", strtotime($this->input->post("sdt")));
		// $dt2 =  date("d-m-y", strtotime($this->input->post("edt")));
		//echo $dt1.$dt2;
		// $this->db->where('created >=',$dt1);
		// $this->db->where('created <=',$dt2);

		$this->db->where('DATE(created) BETWEEN "'. date('Y-m-d', strtotime($dt1)). '" and "'. date('Y-m-d', strtotime($dt2)).'"');
		$data['abc']=$this->db->get('agent')->result();
		$data['title'] = 'Searched Agent';
		$data['body'] = 'agent/agDetails';
		$this->load->view('layout',$data);
	
		
	}
    
    public	function aCommission(){
	    	$this->load->model("agents");
		$data['agents'] = $this->agents->getAllAgents();
		$data['title'] = 'All Agents';
		$data['body'] = 'agent/agentDetails';
		$this->load->view('layout',$data);
	}
	
	function personalAmount(){
	    $agentID = $this->uri->segment(3);
	    
	    $data['comission_id']=$agentID;
	    	$data['title'] = 'Agents Personal Comission';
		$data['body'] = 'agent/agentComissionD';
		$this->load->view('layout',$data);
	}
	
	function personalAmountPay(){
	    $agentID = $this->uri->segment(3);
	    $data['comission_id']=$agentID;
	    	$data['title'] = 'Agents Personal Comission';
		$data['body'] = 'agent/agentComissionPay';
		$this->load->view('layout',$data);
	}
	function payComission(){
	   $aid =  $this->input->post("aid");
	   $dipositorName = $this->input->post("dipositorName");
	   $source = $dipositorName." Pay Comission";
	   $amount=$this->input->post("totalAmount");
	   $paydate = $this->input->post("payDate");
	   $id =$this->input->post("id");
	   
	   $redy = 	$this->db->get("daybook");
	   $ins = $redy->num_rows();
	   $invoice_s = $id."PayC".$ins;
	   
	   $data = array(
	       'customer_ID'       =>$aid,
	       'amount'            =>$amount,
	       'transactionType'   =>"debit",
	       'source'            =>$source,
	       'updated'           =>date ("y-m-d H:i:s",strtotime($paydate)),
	       'created'           =>date("y-m-s H:i:s"),
	       'invoice_no'        =>$invoice_s
	       
	   );
	   
	   if($this->db->insert("daybook",$data)){
	       redirect(base_url().'agent/printPaySlip/'.$invoice_s);
	   }else{
	       echo "wrong";
	   }
	   
	}
	
	public function agentDelete(){
	    $agentid = $this->uri->segment(3);
	    //echo $agentid;
	    ?><script>
	    	if (result) {
	    	   <?php $this->db->where("id",$agentid);
	    	   $this->db->delete("agent");?>
	    	}
	    	
	    </script>
	  <?php  redirect(base_url().'agents.html','refresh');
	 }
	
	
	public function printPaySlip(){
	    $invoiceno =$this->uri->segment(3);
	    //echo $invoiceno;
	    
	    $invoiceno =$this->uri->segment(3);
	   // $planID = $this->uri->segment(4);
	    
	    
	    
	    $data = array(
	        'invoiceno' => $invoiceno,
	       // "planID" => $planID,
	        'title' => 'Policy Slip'
	    );
	    $this->load->view('agent/printSlip',$data);
	}

	public function newAgent() {
		if ($this->input->server('REQUEST_METHOD') == 'GET') {
			$this->load->model("branch");
			$branch = $this->branch->getBranch();

			$this->load->model('rank');
			$rank = $this->rank->getRanks();

			$data['category'] = ['GEN','OBC','SC','ST','OTHER'];
			$data['gender'] 	= ['MALE','FEMALE','OTHER'];
				$data['meritalr'] 	= ['Married','Unmarried','OTHER'];
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
                                $this->db->select('id');
                                $this->db->from('agent');
                                $this->db->order_by('id', 'DESC');
                                $this->db->limit('1');
                               $tr =  $this->db->get()->row()->id;
                               $rtyid=5000+$tr+1;
                               $tryuo = "jmd".$rtyid;
				$employeData = array(
					"agent_id"          =>$tryuo,
                    "introducer_code"   =>$this->input->post("agentCode"),
					"loginID" 		    => $loginID,
					"branchID" 		    => $this->input->post('branchID'),
					"name" 			    => $this->input->post('name'),
					"fatherName" 	    => $this->input->post('fatherName'),
					"dob" 			    => $this->input->post('dob'),
					"gender" 		    => $this->input->post('gender'),
					"marital_status"    => $this->input->post('marital_status'),
				
					"qualification"     => $this->input->post('qualification'),
					"occupation"        => $this->input->post('occupation'),
					"activeStatus" 	    => 1,
					"present_address"   => $this->input->post('present_address'),
				"permanent_address"     =>$this->input->post('permanent_address'),
					"city" 			    => $this->input->post('city'),
					"state" 		    => $this->input->post('state'),
					"nationality"       => $this->input->post('nationality'),
					
					"experience"        => $this->input->post('experience'),
					"pin" 			    => $this->input->post('pin'),
							
					"mobile" 		    => $this->input->post('mobile'),
					"email" 		    => $this->input->post('email'),
					"aadharNo" 		    => $this->input->post('aadharNo'),
					"rank" 			    => 1,
					"nominee" 	        => $this->input->post('nominee'),
					"nominee_age" 	    => $this->input->post('nominee_age'),
					"nominee_mobile"    => $this->input->post('nominee_mobile'),
				    "relation"              =>$this->input->post('relation'),
					"nominee_gender"    => $this->input->post('nominee_gender')
					

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
				$username 	= $this->input->post('username');
				$password 	= $this->input->post('password');
				$mobile = $this->input->post('mobile');
				$msg = "Welcome to JMD Finance Pvt. Ltd. Your Agent Userid=".$username." And Password = ".$password." Please Keep Your LoginID and Password secret.";
			    $this->load->helper("sms");
			    //sms($mobile,$msg);
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
	
		
	
		$this->load->model("investmentPlans");
		//$planDetail = $this->investmentPlans->getPlan($investmentPlanDetail->planID);
	
		$this->load->model("branch");
		$branchDetail = $this->branch->getBranchID($employee->branchID);
	
		$this->load->model("commitee");
		//$commiteeDetail = $this->commitee->getCommittee($employee->committeeID);
	
		$this->load->model("auth/logintable");
		$loginDetail = $this->logintable->getLogin($employee->loginID);
	
	
		$data['meritalr'] 	= ['Married','Unmarried','OTHER'];
		$data['employee'] = $employee;
		//$data['planDetail'] = $planDetail;
		//$data['commiteeDetail'] = $commiteeDetail;
		$data['loginDetail'] = $loginDetail;
		$data['branchDetail'] = $branchDetail;
		
		$data['title'] = 'Employee :: '.$employee->name;
		$data['body'] = 'agent/agent';
		$this->load->view('layout',$data);
	}
	
	public function agentEdit() {
		$customerID = $this->uri->segment(2);
		$this->load->model('agents');
		$employee = $this->agents->getAgent($customerID);
	
		
	
		
	
		$this->load->model("branch");
		$branchDetail = $this->branch->getBranchID($employee->branchID);
	
	
		$data['meritalr'] 	= ['Married','Unmarried','OTHER'];
		$this->load->model("auth/logintable");
		$loginDetail = $this->logintable->getLogin($employee->loginID);
		
		$data['gender'] 	= ['MALE','FEMALE','OTHER'];
		$this->load->model('rank');
		$rank = $this->rank->getRanks();
		$data['rank']	= $rank;
		$data['employee'] = $employee;
		$data['loginDetail'] = $loginDetail;
		$data['branchDetail'] = $branchDetail;
		
		$data['title'] = 'Agent :: '.$employee->name;
		$data['body'] = 'agent/agentEdit';
		$this->load->view('layout',$data);
	}
	
	
	public function saveEditagent(){
		$employeData = array(
				
				
				"branchID" 		=> $this->input->post('branchID'),
				"name" 			=> $this->input->post('name'),
				
					"fatherName" 	    => $this->input->post('fatherName'),
					"dob" 			    => $this->input->post('dob'),
					"gender" 		    => $this->input->post('gender'),
				
				
					"qualification"     => $this->input->post('qualification'),
					"occupation"        => $this->input->post('occupation'),
					"activeStatus" 	    => 1,
					"present_address"   => $this->input->post('present_address'),
				
					"city" 			    => $this->input->post('city'),
					"state" 		    => $this->input->post('state'),
					"nationality"       => $this->input->post('nationality'),
					"permanent_address"     =>$this->input->post('permanent_address'),
					"experience"        => $this->input->post('experience'),
					"pin" 			    => $this->input->post('pin'),
							
					"mobile" 		    => $this->input->post('mobile'),
					"email" 		    => $this->input->post('email'),
					"aadharNo" 		    => $this->input->post('aadharNo'),
					"rank" 			    => 1,
					"nominee" 	        => $this->input->post('nominee'),
					"nominee_age" 	    => $this->input->post('nominee_age'),
					"nominee_mobile"    => $this->input->post('nominee_mobile'),
				    "relation"              =>$this->input->post('relation')
				
				
				
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
			
			$ft = $this->agents->updateAgent($employeeID, $dataImage);
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
		redirect(base_url().'agents.html');
		else :
		redirect(base_url().'agents/false');
		endif;
	}

}
