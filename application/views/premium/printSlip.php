<!DOCTYPE html>
<html>
	<head>
		<title>Invoice</title>
		<style type="text/css">
        @font-face {
          font-family: 'AlgerianRegular';
          src: url('<?= base_url();?>assets/fonts/ALGER.ttf');
        }

        .title {
          padding: 5px;
          margin: 5px;
          color: #1960b0;
          font-family: AlgerianRegular !important;
          font-size: 35px;
        }
			body {
  				font-family: arial;
  				font-size: 11px;
        }
      table { border-collapse: collapse; }
      table td, table th { 
          border: 1px solid #DFDFDF; 
          padding: 1px; 
      }
    	@media print {
  			body * { visibility: hidden; }
  			#printcontent * { 
			    visibility: visible;
			    width: 500px;
  			}
  			#printcontent img {
			    width:50px;
  			}
  			#printcontent { 
			    position: absolute; 
			    top: 0px; 
			    left: 50px;
			    right: 50px;
  			}
  			#innerTable {
			    width: 150px;
  			}
  			#innerTable1 {
			    width: 150px;
  			}
	    }
    </style>
	</head>
	
	<body>
	    	<?php     
	    		
	    	
	    	 if($planID == 1){
              	$this->db->where('invoice_slip', $invoiceno);
              	$result = $this->db->get('fdDetail');
              	$detail = $result->row();
              	
              	
              }
              
              if($planID == 2){
              	$this->db->where('invoice_slip', $invoiceno);
              	$result = $this->db->get('rdDetail');
              	$detail = $result->row();
              	
              	
              }
              
              if($planID == 3){
              		$this->db->where('invoice_slip', $invoiceno);
              	$result = $this->db->get('npsDetail');
              	$detail = $result->row();
              	
              	
              } 
              
              if($planID == 4){
              	$this->db->where('invoice_slip', $invoiceno);
              	$result = $this->db->get('misDetail');
              	$detail = $result->row();
              	
              	
              }
	    	
	    	
	    	$this->db->where("Customer_ID",$detail->customerID);
		    $getdata = $this->db->get("customer")->row();
	    	
	    	
	    	
	    	
	    	$this->db->where("customerID", $getdata->Customer_ID);
            $planid = $this->db->get("investmentDetail")->row();
            $planDetail=$planid;
                $this->db->where("id",$planID);
               $title =  $this->db->get("investmentPlans")->row()->title;
               
               $this->db->where("id",$planid->branchID);
               $titlebranch =  $this->db->get("branch")->row()->title;
               
               $this->db->where("id",$planid->committeeID);
               $comititle =  $this->db->get("committee")->row()->title;
              ?>
		<div style="width: 560px; margin-left: auto; margin-right: auto;">
			<table class="table table-bordered" id="printcontent">
                  <tr>
                    <td colspan="6" style="font-family: algerian; font-size: 25px; text-align: center;">
                      <span class="title">
                        <img src="<?= base_url() ?>assets/img/safari-pinned-tab.svg" width="50" style="padding: 0px 0px 0px 0px;">
                          JAI MATA DI FINANCE LTD.
                      </span>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="6"><strong>Branch:</strong> <?= $title; ?></td>
                  </tr>
                  <tr>
                    <td colspan="6"><strong>Print Date:</strong> <?=  date("d-M-Y"); ?></td>
                  </tr>
                  <tr>
 <td colspan="6"><strong>Customer Name.:</strong> <?=  $getdata->name; ?></td>
                  </tr>
                  <tr>
                                         
                    <td colspan="6" style="text-align: right; font-size: 13px;"><strong>Receipt</strong>  <?php echo $invoiceno;?></td>
                  </tr>
                  <tr>
                    <td colspan="4"><strong>Print Branch:</strong> <?php echo $titlebranch;?></td>
                    <td colspan="2"><strong>Document No:</strong><?= $getdata->Customer_ID ?></td>
                  </tr>
                  <tr>
                    <td colspan="4"><strong>Receipt with thanks from:</strong><?= $detail->depositorName ?> </td>
                    <td colspan="2"><strong>DOC:</strong> <?= date("d-M-Y", strtotime($planDetail->created)) ?></td>
                  </tr>
                  <tr>
                    <td colspan="4"><strong>Address:</strong> <?= $getdata->address . " " . $getdata->city . "-" .$getdata->pin; ?></td>
                    <td colspan="2"><strong>Document Date:</strong> <?= date("d-M-Y"); ?></td>
                  </tr>
                  <tr>
                    <td colspan="2"><strong>Application No.:</strong> <?= 200 ?></td>
                    <td colspan="2"><strong>Customer No:</strong> <?= $getdata->Customer_ID ?></td>
                    <td colspan="2" rowspan="4">
                      <table id="innerTable" width="150">
                        <tr>
                          <td><strong>Particulars</strong></td>
                          <td><strong>Amount</strong><?php echo $detail->premiumAmount;?></td>
                        </tr>
                        <tr>
                          <td>Investment</td>
                          <td><?= $planDetail->oneTimeInvestment ?></td>
                        </tr>
                        <tr>
                          <td>Late Charge</td>
                          <td>00.00</td>
                        </tr>
                        <tr>
                          <td>Revival Fees</td>
                          <td><?= "00" ?></td>
                        </tr>
                        <tr>
                          <td><strong>Total Paid Amount</strong></td>
                          <td><?= $detail->premiumAmount;?></td>
                        </tr>
                      </table>
                    </td>
                  </tr>

                  <tr>
                    <td colspan="2"><strong>Scheme Code:</strong> 108</td>
                    <td colspan="2"><strong>Term:</strong> <?= $planDetail->durationMonth ?> Months</td>
                  </tr>

                  <tr>
                    <td colspan="2">
                      <strong>Plan Code:</strong> 
                      <?php 
                        if($planDetail->planID == 1)
                          {echo "Fixed Deposit (FD)";} 
                        if($planDetail->planID == 2)
                          {echo "RD - Investment";} 
                        if($planDetail->planID == 3)
                          {echo "Adhaarshila National Pension Severs (NPS)";} 
                        if($planDetail->planID == 4)
                          {echo "Monthly Investment Plan (MIP)";} 
                        if($planDetail->planID == 5)
                          {echo "Loan Plan";} 
                      ?>
                    </td>
                    <td colspan="2"><strong>Maturity Amount:</strong> <?= $planDetail->meturity ?></td>
                  </tr>
                  <tr>
                    <td colspan="4">
                        <strong>Total Amount:</strong> 
                        <?= $planDetail->meturity ?> (<script> document.write(convert_number(<?= $planDetail->meturity ?>));</script> rupee only/-)
                    </td>
                  </tr>

                  <tr>
                    <td colspan="2"><strong>Agent Code:</strong><?= $getdata->joinerID ?></td>
                    <?php $this->db->where("id",$getdata->joinerID);
                    $agname = $this->db->get("agent")->row();
                    ?>
                    <td colspan="2"><strong>Agent Name:</strong><?= $agname->name; ?></td>
                    <td colspan="2" rowspan="4" valign="top">
                      <table id="innerTable1" width="150" style="border: 0px solid #FFF;">
                        <tr>
                          <td style="border: 0px solid #FFF; text-align:right;"><strong>Pay Type:</strong> Cash</td>
                        </tr>
                        <tr>
                          <td style="border: 0px solid #FFF; text-align:right;"><strong>Cheque No.:</strong> N/A</td>
                        </tr>
                        <tr>
                          <td style="border: 0px solid #FFF; text-align:right;"><strong>Cheque Date:</strong> N/A</td>
                        </tr>
                        <tr>
                          <td style="border: 0px solid #FFF; text-align:right;"><strong>Bank Name:</strong> N/A</td>
                        </tr>
                      </table>
                      </td>
                  </tr>

                  <tr>
                      <?php 
                       if($planID == 1){
              
              	
              		$this->db->where('customerID', $getdata->Customer_ID);
              		$this->db->where("status","Paid");
              	$nor = $this->db->get('fdDetail');
              	$noro = $nor->num_rows();
              	
              	$this->db->select_sum('paid');
    $this->db->from('fdDetail');
    $this->db->where('customerID', $getdata->Customer_ID);
    	$this->db->where("status","Paid");
    $query = $this->db->get();
    $totpaidt =  $query->row()->paid;
              }
              
              if($planID == 2){
              
              	
              		$this->db->where('customerID', $getdata->Customer_ID);
              		$this->db->where("status","Paid");
              	$nor = $this->db->get('rdDetail');
              	$noro = $nor->num_rows();
              	
              	 $this->db->select_sum('paid');
    $this->db->from('rdDetail');
    $this->db->where('customerID', $getdata->Customer_ID);
    	$this->db->where("status","Paid");
    $query = $this->db->get();
    $totpaidt =  $query->row()->paid;
              }
              
              if($planID == 3){
              	
              	
              		$this->db->where('customerID', $getdata->Customer_ID);
              		$this->db->where("status","Paid");
              	$nor = $this->db->get('npsDetail');
              	$noro = $nor->num_rows();
              	
              		 $this->db->select_sum('paid');
    $this->db->from('npsDetail');
    $this->db->where('customerID', $getdata->Customer_ID);
    	$this->db->where("status","Paid");
    $query = $this->db->get();
    $totpaidt =  $query->row()->paid;
              } 
              
              if($planID == 4){
              
              	
              		$this->db->where('customerID', $getdata->Customer_ID);
              		$this->db->where("status","Paid");
              	$nor = $this->db->get('misDetail');
              	$noro = $nor->num_rows();
              	
              	 $this->db->select_sum('paid');
    $this->db->from('misDetail');
    $this->db->where('customerID', $getdata->Customer_ID);
    	$this->db->where("status","Paid");
    $query = $this->db->get();
    $totpaidt =  $query->row()->paid;
              }
                      
                      
                      
                      ?>
                    <td colspan="2"><strong>Installment Paid:</strong> <?= $planDetail->durationMonth; ?> to <?= $noro; ?></td>
                    <td colspan="2"><strong>Installment Date:</strong> <?= date('d-M-Y') ?> to <?= date('d-M-Y') ?></td>
                  </tr>

                  <tr>
                    <td colspan="4">
                        <strong>Total Deposit Till Date:</strong> <?= $totpaidt; ?>
                    </td>
                  </tr>

                  <tr>
                    <td colspan="2"><strong>Next Due Installment No.:</strong> <?= $noro+1; ?></td>
                    <td colspan="2"><strong>Next Due Installment Date:</strong> <?= date('d-M-Y') ?></td>
                  </tr>

                  <tr>
                    <td colspan="6" style="text-align: center;">
                      **This is Computer generated Money receipt, Signature not required.**s
                    </td>
                  </tr>
                </table>
                <div class="invoice-buttons">
                  <button class="btn btn-default margin-right" type="button" onclick="window.print();" >
                      <i class="fa fa-print padding-right-sm"></i> Print Reciept
                    </button>
                </div>
		</div>
	</body>
</html>