<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class plans extends CI_Controller {
    
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

	public function getPlans() {
		if ($this->input->server('REQUEST_METHOD') == 'POST'):

			$planID = $this->input->post('id');

			$this->load->model("investmentPlans");
			$plan = $this->investmentPlans->getPlan($planID);

			$plandetail = $this->investmentPlans->getPlanDetail($plan->tableName);
			
			$response = array(
				'success' => true,
				'result' => $plandetail,
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

	public function getPlan($planID) {
		$this->db->where("id", $planID);
		return $this->db->get("investmentPlans")->row();
	}
}

?>