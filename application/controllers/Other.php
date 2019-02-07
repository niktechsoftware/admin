<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Other extends CI_Controller {
    
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

	public function sms() {
		log_message('debug', 'sql query fail in... ', false);
		$data['body'] = 'home/dashboard';
		$this->load->view('layout',$data);
	}

	public function expences() {
		log_message('debug', 'sql query fail in... ', false);
		$this->load->view('login/forget');
	}

	public function daybook() {
		log_message('debug', 'sql query fail in... ', false);
		$this->load->view('login/register');
	}

}

