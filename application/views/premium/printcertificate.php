<!DOCTYPE html>
<html>
<head>
	<title>Print Certificate</title>
	<style type="text/css">
		body {
			font-family: arial;
			font-size: 13px;
		}
		@font-face {
		font-family: 'AlgerianRegular';
		src: url('<?= base_url();?>assets/fonts/ALGER.ttf');
		}
		.border-1 {
			margin-right: auto;
			margin-left: auto;
			width: 800px;
			height: 500px;
			border: 2px solid #32a053;
			padding: 3px;
		}
		.border-2 {
			border: 5px solid #32a053;
			padding: 3px;
		}
		.border-3 {
			border: 5px solid #32a053;
			padding: 3px;
		}
		.border-4 {
			border: 5px solid #32a053;
			padding: 3px;
		}
		.border-5 {
			background: url("<?= base_url() ?>assets/img/apple-touch-icon copy.png") no-repeat center;
			height: 442px;
			border: 2px solid #32a053;
			padding: 3px;
			background-color: #f8fcf7;
		}
		.special-font {
			font-family: "Myriad Pro", "Gill Sans", "Gill Sans MT", Calibri, sans-serif;
		}
		.title {
			padding: 5px;
			margin: 5px;
			color: #1960b0;
			font-family: AlgerianRegular !important;
			font-size: 45px;
		}
		.mainTable {
			margin-left: auto;
			margin-right: auto;
		}
		.red-font {
			display: block;
			color: #cb2a48;
		}
		.blue-font {
			display: block;
			font-size: 12px;
			color: #125ebc;
		}
		.pink-font {
			display: block;
			font-size: 18px;
			color: #b81e75;
		}
	</style>
	<script src="<?= base_url(); ?>assets/js/custom.js"></script>
</head>
<body>
	<div class="border-1">
		<div class="border-2">
			<div class="border-3">
				<div class="border-4">
					<div class="border-5">
					<?php     $this->db->where("customerID", $Customer_ID->Customer_ID);
            $planid = $this->db->get("investmentDetail")->row();
                $this->db->where("id",$planid->planID);
               $title =  $this->db->get("investmentPlans")->row()->title;
               
               $this->db->where("id",$planid->branchID);
               $titlebranch =  $this->db->get("branch")->row()->title;
               
               $this->db->where("id",$planid->committeeID);
               $comititle =  $this->db->get("committee")->row()->title;
              ?>
						<table width="100%" class="mainTable">
							<tr>
								<td colspan="2" align="center">
									<span class="title">
										<img src="<?= base_url() ?>assets/img/safari-pinned-tab.svg" width="50" style="padding: 0px 0px 0px 0px;">
										JAI MATA DI FINANCE LTD.
									</span>
									<span class="red-font special-font">Registration with ministry of Form Department of Rec. & RBI jmd Govt. of India</span>
									<span class="blue-font special-font">Reg. No. 2345234523452345P23452345, Website. jmdonline.in Email: info@jmdonline.in</span>
									<span class="blue-font special-font">15 Hazratganj, OPP-HALWASTMAEKET, LUCKNOW MARKET LUCKNOW</span>
									<span class="blue-font special-font">Bhimchangenagar Akhibazpur Bhabhuha Bihar 821101</span>

									<span class="pink-font special-font">CARPORATE SOCITY MULTI TIME PLAN CERTIFICATE</span>
								</td>
							</tr>
							<tr>
								<td>
									Branch Name: <?= $titlebranch; ?>
								</td>
								<td>
									Folio No.: <?=  $comititle; ?>
								</td>
							</tr>
							<tr>
								<td>
									Policy No.: <?=  $Customer_ID->policy_No; ?>
								</td>
								<td>
									SchemeID/Plan Mode: <?= $titlebranch; ?>
								</td>
							</tr>
							<tr>
								<td>
									Name of Depositor: <?= $Customer_ID->name; ?>
								</td>
								<td>
									Member Code: <?=  $Customer_ID->Customer_ID; ?>
								</td>
							</tr>
							<tr>
								<td>
									Second Applicant Name: <?= $Customer_ID->motherName; ?>
								</td>
								<td>
									Associate Code: <?= $titlebranch; ?>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									Address: <?= $Customer_ID->address; ?> <?= $Customer_ID->city; ?> <?= $Customer_ID->state; ?> <?= $Customer_ID->pin; ?>
								</td>
							</tr>
							<tr>
								<td>
									Installment Amount: <?= $planid->oneTimeInvestment; ?>
								</td>
								<td>
									In Words: <script>document.write(convert_number(<?= $planid->oneTimeInvestment; ?>))</script>
								</td>
							</tr>
							<tr>
								<td>
									DOC: <?=  date("d-M-Y", strtotime($planid->created)); ?>
								</td>
								<td>
									Term: <?= $planid->durationMonth; ?> Months
								</td>
							</tr>
							<tr>
								<td>
									<?php $created = $planid->durationMonth ?>
									Expiry Date: <?= date('Y-m-d', strtotime("+$created months", strtotime($planid->created))); ?>
								</td>
								<td>
									Nominee Name: <?= $Customer_ID->motherName; ?>
								</td>
							</tr>
							<tr>
								<td>
									Estimated Realizable Value: <?= $planid->meturity; ?>
								</td>
								<td>
									Relation: <?= "Mother" ?> Age: <?= $planid->investerAge; ?>
								</td>
							</tr>
							
								<tr>
								<td>
									Plan Name: <?php  if($planid->planID == 1)
                          {echo "Fixed Deposit (FD)";} 
                        if($planid->planID == 2)
                          {echo "RD - Investment";} 
                        if($planid->planID == 3)
                          {echo "Adhaarshila National Pension Severs (NPS)";} 
                        if($planid->planID == 4)
                          {echo "Monthly Investment Plan (MIP)";} 
                        if($planid->planID == 5)
                          {echo "Loan Plan";}  ?>
								</td>
								<td>
									Pay Amount Per Month: <?= $planid->monthlyReturn; ?> 
								</td>
							</tr>
							
							<tr>
								<td>
									In Words: <script>document.write(convert_number(<?= $planid->meturity; ?>))</script>
								</td>
								<td>
									Print Date: <?=  date("d-M-Y"); ?>
								</td>
							</tr>
							<tr>
								<td>
									
								</td>
								<td>
									For JAI MATA DI FINANCE LTD.
								</td>
							</tr>
							<tr>
								<td>
									&emsp;
								</td>
								<td>
									&emsp;
								</td>
							</tr>
							<tr>
								<td>
									Authorized Signature
								</td>
								<td>
									Authorized Signatory
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<pre>
		<?php // print_r($result); ?>
	</pre>
	
</body>
</html>