<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {
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

	public function financial() {
		$data['title'] = 'Financial Year';
		$data['body'] = 'settings/financial';
		$this->load->view('layout',$data);
	}

	public function setFinancial() {
		$data['title'] = 'All Branch';
		$data['body'] = 'settings/setFinancial';
		$this->load->view('layout',$data);
	}

	public function rank() {
		$this->load->model("rank");
		$data['rank'] = $this->rank->getRanks();
		$data['title'] = 'Rank Chart';
		$data['body'] = 'settings/rank';
		$this->load->view('layout',$data);
	}

	public function role() {
		if ($this->input->server('REQUEST_METHOD') == 'GET') {

			if(isset($_GET['branchID'])):

				$branchID = $this->input->get('branchID');
				$this->load->model('role');
				$result = $this->role->getRoles($branchID);
				echo json_encode($result);

			else:

				$this->load->model("branch");
				$branch = $this->branch->getBranch();
				$data['branch']		= $branch;

				$data['title'] = 'Role';
				$data['body'] = 'settings/role';
				$this->load->view('layout',$data);

			endif;
		}
		else if($this->input->server('REQUEST_METHOD') == 'POST') {
			$branchID = $this->input->post('branchID');
			$title = $this->input->post('title');
			
			$roleData = array(
				"branchID" => $branchID,
				"title" => $title
			);
			$this->load->model('role');

			if($this->input->post("edit") != 'false')
				$this->role->updateRole($roleData, $this->input->post("id"));
			else 
				$this->role->setRole($roleData);

			$result = $this->role->getRoles($branchID);
			echo json_encode($result);

		}
	}

	public function committees() {
		$this->load->model("commitee");
		$commitee = $this->commitee->getAllCommittees();

		$data['commitees']	= $commitee;
		$data['title'] 	= 'Committees';
		$data['body'] 	= 'settings/committees';

		$this->load->view('layout',$data);
	}

	public function newcommittee() {
		if ($this->input->server('REQUEST_METHOD') == 'GET') {
			$this->load->model("branch");
			$branch = $this->branch->getBranch();
			$data['branch']		= $branch;
			
			$data['title'] = 'New Committee';
			$data['body'] = 'settings/newcommittee';
			$this->load->view('layout',$data);
		}
		else if ($this->input->server('REQUEST_METHOD') == 'POST') {

			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('branchID', 'Full Address', 'required');
			$this->form_validation->set_rules('employeeID', 'City', 'required');

			if ($this->form_validation->run() == FALSE):

				$this->load->model("branch");
				$branch = $this->branch->getBranch();
				$data['branch']		= $branch;
				
				$data['title'] = 'New Committee';
				$data['body'] = 'settings/newcommittee';
				$this->load->view('layout',$data);

		    else:

		    	$this->load->model("commitee");
		    	if($this->commitee->setCommittee($this->input->post())):
		    		redirect(base_url().'committees.html');
		    	else:
		    		redirect(base_url().'committees/false');
		    	endif;

		    endif;
		}
	}
	public function deleteCommitee()

	{

		$this->db->where("id",$this->uri->segment(3));
		$a=$this->db->delete('committee');
		if($a)
		{
			redirect(base_url().'committees.html');
		}
		else
		{
			echo "not deleted";
		}
	}

		public function EditCommitee()
		{
           $this->db->where('id',$this->uri->segment(3));
           $data['commit']=$this->db->get('committee')->result();
           $data['title'] = 'Edit Committee';
		    $data['body'] = 'settings/editcomittie';
		 
		    $this->load->view('layout', $data);
			
        }

public function updatecommitee()
		{
        $id=$this->input->post('id');
	  $cotitle=$this->input->post('ctitle');
	  $dt=$this->input->post('date');
		  $data=array(
		  	'title' => $cotitle , 
             'created' =>$dt , 
		    );
		  $this->db->where('id',$id);
        $update=$this->db->update('committee',$data);
        if($update)
        {

         redirect(base_url().'committees.html');

        }
		    
			
        }


	public function comitteebybranch() {
		if ($this->input->server('REQUEST_METHOD') == 'POST'):

			$branchID = $this->input->post('branchID');
			$this->load->model('commitee');
			$committee = $this->commitee->committeebybranch($branchID);
			
			$response = array(
				'success' => true,
				'result' => $committee,
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

	public function branches() {

		$this->load->model('branch');
		$branchs = $this->branch->getBranch();

		$data['title'] = 'All Branch';
		$data['body'] = 'settings/branches';
		$data['branchs'] = $branchs;
		$this->load->view('layout', $data);
	}

	public function newbranch() {

		if ($this->input->server('REQUEST_METHOD') == 'GET') {

			$this->load->model('financialyear');
			$fad = $this->financialyear->getFsd();
			$data['title'] = 'New Branch';
			$data['fsd'] = $fad;
			$data['body'] = 'settings/newbranch';
			$this->load->view('layout', $data);
		}
		else if ($this->input->server('REQUEST_METHOD') == 'POST') {

			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('address', 'Full Address', 'required');
			$this->form_validation->set_rules('city', 'City', 'required');
			$this->form_validation->set_rules('state', 'State', 'required');
			$this->form_validation->set_rules('pin', 'Pincode', 'required|min_length[6]|max_length[6]');
			$this->form_validation->set_rules('mobile', 'Mobile', 'required|min_length[10]|max_length[10]');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('fsdID', 'Financial Start Date', 'required');

			if ($this->form_validation->run() == FALSE):

				$data['title'] = 'New Branch';
				$data['body'] = 'settings/newbranch';
				$this->load->view('layout', $data);

		    else:
		        
		        

		    	$this->load->model("branch");
		    	if($this->branch->setBranch($this->input->post())):
		    	    	$this->load->model("auth/logintable");
				       $this->db->where("title",$this->input->post("title"));
				       $st = $this->db->get("branch")->row();

				$loginData = array(
					"branchID" 	=> $st->id,
					"roleID" 	=> 1,
					"isAdmin" 	=> 2,
					"username" 	=> "branch".$st->id,
					"password" 	=> sha1(123456)
				);

				$loginID = $this->logintable->setLogin($loginData);
		    		redirect(base_url().'branches.html');
		    	else:
		    		redirect(base_url().'branches/false');
		    	endif;

		    endif;
		}
		else {
			$this->load->view("error/error_404");
		}
		
	}

	public function plans() {
		log_message('debug', 'sql query fail in... ', false);
		$this->load->view('login/forget');
	}

}