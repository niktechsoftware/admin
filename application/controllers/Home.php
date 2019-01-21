<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
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

	public function index() {
		log_message('debug', 'sql query fail in... ', false);
		$data['title'] = 'Dashboard';
		$data['body'] = 'home/dashboard';
		$this->load->view('layout',$data);
	}

	public function forget() {
		log_message('debug', 'sql query fail in... ', false);
		$this->load->view('login/forget');
	}

	public function register() {
		log_message('debug', 'sql query fail in... ', false);
		$this->load->view('login/register');
	}

}