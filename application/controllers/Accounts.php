<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accounts extends CI_Controller {
    
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
	

	public function getdabook() {
		$daybook = $this->db->get("daybook")->result();

		$data['daybook'] = $daybook;
		$data['body'] = 'accounts/daybook';
		$data['title'] = 'Daybook Transactions';
		$this->load->view('layout', $data);
	}

}