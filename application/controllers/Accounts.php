<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accounts extends CI_Controller {

	public function getdabook() {
		$daybook = $this->db->get("daybook")->result();

		$data['daybook'] = $daybook;
		$data['body'] = 'accounts/daybook';
		$data['title'] = 'Daybook Transactions';
		$this->load->view('layout', $data);
	}

}