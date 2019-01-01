<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index() {
		log_message('debug', 'sql query fail in... ', false);
		$this->load->view('login/login');
	}

	public function forget() {
		log_message('debug', 'sql query fail in... ', false);
		$this->load->view('login/forget');
	}


public function logout(){
   $this->session->unset_userdata();
		$this->session->sess_destroy();
		redirect('index.php/login');
}
	/**
	 * 
	 */
	public function authentication() {

		/**
		 *  form validation method for validate input from login form. This validate username required
		 */
		$this->form_validation->set_rules('username', 'Username', 'required');
		/**
		 *  This validate Password required
		 */
        $this->form_validation->set_rules('password', 'Password', 'required',
            array('required' => 'You must provide a %s.')
        );

        /**
         * this checks submitted form is correct with no errors or unexpectd value.
         * if it return false then system will return error reason.
         * else system will go for check username and password.
         */
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login/login');
        }
        else {
        	/**
        	 * [$username recieved from login form send by post method.]
        	 * @var [String]
        	 */
            $username = $this->input->post('username');
            /**
             * [$password recieved from login form send by post method.]
             * @var [String]
             */
            $password = $this->input->post('password');

            /**
             * loading the logintable model for authenticate user.
             */
            $this->load->model('auth/logintable');

            /**
             * [	$loginData 
             * 		contains all login information which store in databse 
             * 		alongwith given username. or it may be empty array.]
             * @var [Array]
             */
            $loginData = $this->logintable->getLoginData($username);

            print_r($loginData);
            /**
             * This condtion varifyes, is given username exist in database or not
             * if its exist in database then it has some value otherwise it dosen't.
             */
            if(count($loginData) > 0) {
            	/**
            	 * [$sessionData contian BranchID, username and boolean variable (isAdmin to identify schools superuser.)]
            	 * @var array
            	 */
            	$sessionData = array(
            		"branchID" 	=> $loginData[0]->branchID,
            		"role" 	    => $loginData[0]->roleID,
            		"username" 	=> $loginData[0]->username
            	);

                // print_r($this->router->routes);

            	/**
            	 * Setting data into session.
            	 */
            	$this->session->set_userdata($sessionData);

   				/**
   				 * redirect to the dashboard page.
   				 */
            	redirect('/home/index', 'refresh');
            }
            else {
            	
            }
        }
	}

}