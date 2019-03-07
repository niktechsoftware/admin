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


	 	   if($this->session->userdata("isAdmin")==1)
	 	   {
               $emp=$this->input->post("employee");
               $age=$this->input->post("agent");
               $comm=$this->input->post("committee");
               $cust=$this->input->post("customer");
               $bran=$this->input->post("branch");

              $message=$this->input->post("message");
             if($emp=='yes')
              {
                 if($this->input->post('select')=='Empolyee'||$this->input->post('select')=='All')
                 {
                   $employee=$this->db->get('employee')->result(); 

                    foreach ($employee as $value)
                     { 
                         $this->load->helper('sms');
                        $b=$value->name;
                        $a =$value->mobile;
                        $bcc="Dear Employe "." ". $b." ". $message;
                         sms($a,$bcc);

                      } 
                   }

              }
              if($age=='yes')
              { 
                      
               if($this->input->post('select')=='Agent'||$this->input->post('select')=='All')
                 {
                  $agent=$this->db->get('agent')->result(); 
                    foreach ($agent as $value)
                     { 
                         $this->load->helper('sms');
                        $b=$value->name;
                        $a =$value->mobile;
                      $bcc="Dear Agent "."". $b."". $message;    	
                     sms($a,$bcc);

                      }    
                  }
              }
              if($cust=='yes')
              {  
                 if($this->input->post('select')=='Customer'||$this->input->post('select')=='All')
                 {
              
                   $customer=$this->db->get('customer')->result(); 
                    foreach ($customer as $value)
                     { 
                         $this->load->helper('sms');
                        $b=$value->name;
                        $a =$value->mobile;
                      $bcc="Dear Customer "."". $b."". $message;    	
                     sms($a,$bcc);

                       } 
                     }   
              }
            if($bran=='yes')
              {
                 if($this->input->post('select')=='Branch'||$this->input->post('select')=='All')
                 {
                   $branch=$this->db->get('branch')->result(); 
                    foreach ($branch as $value)
                     { 
                         $this->load->helper('sms');
                        $b=$value->title;
                        $a =$value->mobile;
                        $bcc="Your Branch "."". $b."". $message;    	
                       sms($a,$bcc);

                      }  
                    }  
                }

                 redirect('Login/smssetting','refresh');
	        }

	         if($this->session->userdata("isAdmin")==2)
	 	      {
               $emp=$this->input->post("employee");
               $age=$this->input->post("agent");
               $cust=$this->input->post("customer");
              $message=$this->input->post("message");
             if($emp=='yes')
              {
                 if($this->input->post('select')=='Empolyee'||$this->input->post('select')=='All')
                   $this->db->where(' branchID',$this->session->userdata("branchid"));
                   $employee=$this->db->get('employee')->result(); 
                    foreach ($employee as $value)
                     { 
                         $this->load->helper('sms');
                        $b=$value->name;
                        $a =$value->mobile;
                      $bcc="Dear Employe "."". $b."".$message;    	
                     sms($a,$bcc);

                      }    
                }
              else
               {
                    
                   echo " Something is wrong!Please Contact to Admin,For Send the Message ";

                }
              if($age=='yes')
              {
                 if($this->input->post('select')=='Agent'||$this->input->post('select')=='All')
                   $this->db->where('branchID',$this->session->userdata("branchid"));
                   $agent=$this->db->get('agent')->result(); 
                    foreach ($agent as $value)
                     { 
                         $this->load->helper('sms');
                        $b=$value->name;
                        $a =$value->mobile;
                      $bcc="Dear Agent "."". $b."".$message;    	
                     sms($a,$bcc);

                      }    
              }
               else
               {
                     echo " Something is wrong!Please Contact to Admin,For Send the Message "; 
               }
              if($cust=='yes')
              {
                 if($this->input->post('select')=='Customer'||$this->input->post('select')=='All')
                   $this->db->where('branchID',$this->session->userdata("branchid"));
                   $customer=$this->db->get('customer')->result(); 
                    foreach ($customer as $value)
                     { 
                         $this->load->helper('sms');
                        $b=$value->name;
                        $a =$value->mobile;
                      $bcc="Dear Customer "."". $b."".$message;    	
                     sms($a,$bcc);

                      }    
              }
             else
               {
                      echo " Something is wrong!Please Contact to Admin,For Send the Message ";
              }
	        }



		
	}
}
?>
