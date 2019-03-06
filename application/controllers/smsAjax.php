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
	 function getsms()
	 {

           $this->load->model('Smsmodel');
			$classData = array(
					"employee" => $this->input->post("selectedData"),
					"isAdmin" => $this->session->userdata("isAdmin");
			  );
			$sectionList = $this->configureClassModel->addClass($classData);




















	 
	/*$mode=$_POST['mode'];
if ($mode=='true') //mode is true when button is enabled 
{
    //Retrive the values from database you want and send using json_encode
    //example
   // $message='you can  send the message!!';
    $success='yes';
   echo json_encode(array('success'=>$success));
	
}

else if ($mode=='false')  //mode is false when button is untracked
{
    //Retrive the values from database you want and send using json_encode
    //example
  // $message='you can not send the message!';
    $success='no';
   echo json_encode(array('success'=>$success));
  
//echo "hlo";
  }
*/
	 }


		
	}
	
?>
