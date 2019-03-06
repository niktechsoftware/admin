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
		if(!$this->session->userdata("isAdmin")){
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
	public function Rd_Premium_Due() 
	{
		log_message('debug', 'sql query fail in... ', false);
		$data['title'] = 'Dashboard';
		$data['body'] = 'home/rdpremdue';
		$this->load->view('layout',$data);
	}
	public function Fd_Premium_Due() 
	{
		log_message('debug', 'sql query fail in... ', false);
		$data['title'] = 'Dashboard';
		$data['body'] = 'home/fdpremdue';
		$this->load->view('layout',$data);
	}
	public function Mis_Premium_Due() 
	{
		log_message('debug', 'sql query fail in... ', false);
		$data['title'] = 'Dashboard';
		$data['body'] = 'home/mispremdue';
		$this->load->view('layout',$data);
	}
	public function Nps_Premium_Due() 
	{
		log_message('debug', 'sql query fail in... ', false);
		$data['title'] = 'Dashboard';
		$data['body'] = 'home/npspremdue';
		$this->load->view('layout',$data);
	}
	public function Loan_Premium_Due() 
	{
		log_message('debug', 'sql query fail in... ', false);
		$data['title'] = 'Dashboard';
		$data['body'] = 'home/loanpremdue';
		$this->load->view('layout',$data);
	}

}