<?php
class Smsmodel extends CI_Model
{
	function getsmsseting()
	{
		$row = $this->db->get("sms");
		return $row;
	}


public function closingbal()
{

$cbedate = date('Y-m-d');
$this->db->select_sum('amount');
$this->db->from('daybook');
$this->db->where("branchID",$this->session->userdata("branchId"));
$this->db->where('transactionType','debit');
$this->db->where('updated =',$cbedate);
$debit=$cbecb=$this->db->get()->row()->amount;



$cbedatec = date('Y-m-d');
$this->db->select_sum('amount');
$this->db->from('daybook');
$this->db->where("branchID",$this->session->userdata("branchId"));
$this->db->where('transactionType','credit');
$this->db->where('updated =',$cbedatec);
$cbecbc=$this->db->get()->row();

$credit=$cbecbc->amount;

$totalamt=$credit-$debit;
$cr_date1 = date('Y-m-d');
if($totalamt){
$balance = array(
"opening_balance" => $totalamt,
"closing_balance" => $totalamt, 
"opening_date" => $cr_date1,
"closing_date" => $cr_date1,
"branch_id"=>$this->session->userdata("branchId")
);
	$this->db->insert('opening_closing_balance',$balance);
}
else   {
$balance = array(
     "opening_balance" => 0,
"closing_balance" => 0,
"opening_date" => date("Y-m-d"),
"closing_date" => date("Y-m-d"),
"branch_id"=>$this->session->userdata("branchId")
);
$this->db->insert('opening_closing_balance',$balance);

	
}

$bid=$this->session->userdata("branchId");
$currentdt = date('Y-m-d');
$cla = $this->db->query("select closing_balance from  opening_closing_balance where branch_id = '$bid' and closing_date='$currentdt'  ORDER BY id DESC LIMIT 1")->row();
     return $cla;
}







	
	
}