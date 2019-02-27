<?php
class SmsAjax extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->is_login();
		$this->load->model('smsmodel');
		
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
		
	}
	
?>