<?php
class SmsAjax extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->is_login();
		$this->load->model("smsmodel");
	}
	
	function is_login()
	{
		$is_login = $this->session->userdata('is_login');
		$is_lock = $this->session->userdata('is_lock');
		$logtype = $this->session->userdata('login_type');
		if($is_login != "admin")
		{
			//echo $is_login;
			redirect("index.php/homeController/index");
		}
		elseif(!$is_login)
		{
			//echo $is_login;
			redirect("index.php/homeController/index");
		}
		elseif(!$is_lock)
		{
			redirect("index.php/homeController/lockPage");
		}
	}
	function smsPanel()
	{
		$sender = $this->smsmodel->getsmssender($this->session->userdata("school_code"));
		
		$data['sender_Detail'] =$sender;
		$data['cbs']=checkBalSms($sender->uname,$sender->password);
		$data['pageTitle'] = 'SMS Panel';
		$data['smallTitle'] = 'Mobile SMS';
		$data['mainPage'] = 'SMS Panel Area';
		$data['subPage'] = 'SMS Panel';
		$data['title'] = 'SMS Panel Area ';
		$data['headerCss'] = 'headerCss/noticeCss';
		$data['footerJs'] = 'footerJs/noticeJs';
		$data['mainContent'] = 'smsPanel';
		$this->load->view("includes/mainContent", $data);
	}	
}