<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class plans extends CI_Controller {

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