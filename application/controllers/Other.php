<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Other extends CI_Controller {

	public function message() {
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

