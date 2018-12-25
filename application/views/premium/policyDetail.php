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
    font-size: 45px;
  }
  @media print {
    body * { visibility: hidden; }
    #printcontent * { 
        visibility: visible;
        width: 500px;
        line-height: 20px;
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
<div class="layout-content">
	<div class="layout-content-body">
	  <div class="row gutter-xs">
		<div class="col-md-12" id="planDetail">
          <div class="card">
            <div class="card-header">
               <div class="card-actions" style="top: 35%;">
				<a class="btn btn-sm btn-labeled arrow-info" onclick="window.history.back();" href="#">
				  <span class="btn-label">
					<span class="icon icon-arrow-circle-left icon-lg icon-fw"></span>
				  </span>
				  Back
				</a>
			  </div>
			  <?php 
			  $this->db->where("customerID", $getdata->Customer_ID);
			  $planid = $this->db->get("investmentDetail")->row();
			  $this->db->where("id",$planid->planID);
			  $title =  $this->db->get("investmentPlans")->row()->title;
			   
			  $this->db->where("id",$planid->branchID);
			  $titlebranch =  $this->db->get("branch")->row()->title;
			   
			  $this->db->where("id",$planid->committeeID);
			  $comititle =  $this->db->get("committee")->row()->title;
			  ?>
              <strong>Policy Detail (<?=  $title; ?>)</strong>
            </div>
            <div class="card-body" data-toggle="match-height">
            	<table class="table table-bordered">
                  <tr>
                    <th class="text-left">Policy No</th>
                    <td class="text-left"><?=  $getdata->policy_No; ?></td>
                    <th class="text-left">Customer ID</th>
                    <td class="text-left"><?=  $getdata->Customer_ID; ?></td>
                    <th class="text-left">Date</th>
                    <td class="text-left"><?=  date("d-M-Y", strtotime($planid->created)); ?></td>
                  </tr>
                  <tr>
                    <th class="text-left">Policy Title</th>
                    <td class="text-left"><?= $title; ?></td>
                    <th class="text-left">Duration</th>
                    <td class="text-left"><?= $planid->durationMonth; ?> Months</td>
                    <th class="text-left">Principle Amount</th>
                    <td class="text-left"><?= $planid->oneTimeInvestment; ?></td>
                  </tr>
              </table>
            </div>
            <div class="card-body" data-toggle="match-height">
              <table class="table table-bordered">
                  <tr>
                    <th>#</th>
                    <th>Depositor Name</th>
                    <th>Premium No.</th>
                    <th>Premium Amount</th>
                    <th>Balance Premium</th>
                    <th>Late Fee</th>
                    <th>Pay Mode</th>
                    <th>Remark</th>
                    <th>Diposit Date</th>
                    <th>Settings</th>
                  </tr>
                  
                  <?php
                    $amt = $planid->planID == 4 ? $planid->monthlyReturn : $planid->monthlyInvestment;
                    // echo "<tr>";
                    // echo "<td>".$planid->id."</td>";
                    // echo "<td>". $title."</td>";
                    // echo "<td>1</td>";
                    // echo "<td>".$amt."</td>";
                    // echo "<td>0.00</td>";
                    // echo "<td>0.00</td>";
                    // echo "<td>CASH</td>";
                    // echo "<td>Joining Installment</td>";
                    // echo "<td>".$planid->created."</td>";
                    // echo "<td>
                    //         <a href='".base_url()."printslip/1_".$getdata->Customer_ID.".html' target='__blank' class='btn btn-primary'>
                    //             <span class='icon icon-print icon-lg'></span>
                    //         </a>
                    //       </td>";
                    // echo "</tr>";
                      
                    foreach ($detail as $key => $value) {
                      echo "<tr>";
                      echo "<td>".$value->id."</td>";
                      echo "<td>".$value->depositorName."</td>";
                      echo "<td>".$value->id."</td>";
                      echo "<td>".$value->premiumAmount."</td>";
                      echo "<td>".$value->balancePremium."</td>";
                      echo "<td>".$value->lateFee."</td>";
                      echo "<td>".$value->payMode."</td>";
                      echo "<td>".$value->remark."</td>";
                     if($value->status=="paid"){
                      echo "<td>
                            <a href='".base_url()."premium/detail/".$getdata->Customer_ID.".html' target='__blank' class='btn btn-primary'>
                                <span class='icon icon-print icon-lg'></span>
                            </a>
                      </td>";
                     }else{
                         echo "<td></td>";
                     }
                      echo "</tr>";
                    }
                  ?>
                  
              </table>

            </div>
          </div>
        </div>
	  </div>
	</div>
</div>