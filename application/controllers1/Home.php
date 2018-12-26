<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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