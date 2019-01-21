<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agents extends CI_Model {
    
    public function __construct() {
    	parent::__construct();
	}
	


function getpromotion($agentObject,$dur,$totalAmount,$invoice_s,$curanka){
    if($curanka <= $agentObject->rank){
    	$this->db->where("rank",$agentObject->rank);
		$this->db->where("duration",$dur);
		$getcomi = $this->db->get("agent_comission_charts")->row();
		$currentAgentC = ($totalAmount*$getcomi->comission1)/100;
		$cucdata = array(
		    "a_id"          =>$agentObject->id,
		    "amount"        =>$currentAgentC,
		    "invoice_num"   =>$invoice_s
		    );
		    $this->db->insert("agent_comission",$cucdata);
		     $this->db->select_sum('amount');   
        $this->db->where("a_id",$agentObject->id)  ;
        $query=$this->db->get("agent_comission")->row();
        	echo "<br>".$query->amount;
		
		$uptorank = $this->db->get("rank")->result();
		$ty=0;
		$upranj=0;
		foreach($uptorank as $res):
		    if($ty!=1){
		    if($query->amount < $res->promotionAmt){
		       
		        $ty=1;
		        $tuprank = array(
		            "rank" => $res->id
		            );
		            $this->db->where("id",$agentObject->id);
		            $this->db->update("agent",$tuprank);
		    }
		    }
		    endforeach;
    }
		     //echo "succeSS";
		    $this->db->where("id",$agentObject->introducer_code);
		   $rdft =  $this->db->get("agent");
		    if($rdft->num_rows()>0){
		        $ui =$rdft->row();
		        $this->Agents->getpromotion($ui,$dur,$totalAmount,$invoice_s,$curanka);
		       
		    }
    
}
	
	function getAllAgents() {

		$result = $this->db->get('agent');
		
		/**
		 * 	return employee table Data getting from database.
		 */
		return $result;
}
		function agentUsredata($login_id)
		{

		$this->db->where('id',$login_id);
		$result=$this->db->get('login');
		return $result->row();
		}
	

	function setAgent($employe) {

		if($this->db->insert('agent', $employe)):
			return $this->db->insert_id();
		else:
			return false;
		endif;
	}

	function employebybranch($branchID) {
		$this->db->where('branchID', $branchID);
		$result = $this->db->get('employee');
		return $result->result();
	}

	function getagent($customerID) {
		$this->db->where('id', $customerID);
		return $this->db->get('agent')->row();
	}
	
	function updateAgent($id, $data) {
		$this->db->where('id', $id);
		$this->db->update('agent', $data);
		return true;
	}

	public function getRank($acode){
	$this->db->where("id",$acode);
	$result = $this->db->get("agent");
	return $result->row()->rank;
}
	
}