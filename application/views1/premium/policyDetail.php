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
              <strong>Policy Detail (<?= $planDetail->name; ?>)</strong>
            </div>
            <div class="card-body" data-toggle="match-height">
            	<table class="table table-bordered">
                  <tr>
                    <th class="text-left">Policy No</th>
                    <td class="text-left"><?=  date("ymd", strtotime($planDetail->created)).'P'.$policyID; ?></td>
                    <th class="text-left">Customer ID</th>
                    <td class="text-left"><?=  date("ymd", strtotime($planDetail->created)).'C'.$planDetail->id; ?></td>
                    <th class="text-left">Date</th>
                    <td class="text-left"><?=  date("d-M-Y", strtotime($planDetail->created)); ?></td>
                  </tr>
                  <tr>
                    <th class="text-left">Policy Title</th>
                    <td class="text-left"><?= $planDetail->title ?></td>
                    <th class="text-left">Duration</th>
                    <td class="text-left"><?= $planDetail->durationMonth; ?> Months</td>
                    <th class="text-left">Principle Amount</th>
                    <td class="text-left"><?= $planDetail->oneTimeInvestment; ?></td>
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
                    $amt = $planDetail->planID == 4 ? $planDetail->monthlyReturn : $planDetail->monthlyInvestment;
                    echo "<tr>";
                    echo "<td>".$planDetail->id."</td>";
                    echo "<td>".$planDetail->name."</td>";
                    echo "<td>1</td>";
                    echo "<td>".$amt."</td>";
                    echo "<td>0.00</td>";
                    echo "<td>0.00</td>";
                    echo "<td>CASH</td>";
                    echo "<td>Joining Installment</td>";
                    echo "<td>".$planDetail->created."</td>";
                    echo "<td>
                            <a href='".base_url()."printslip/1_".$policyID.".html' target='__blank' class='btn btn-primary'>
                                <span class='icon icon-print icon-lg'></span>
                            </a>
                          </td>";
                    echo "</tr>";
                      
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
                      echo "<td>".$value->created."</td>";
                      echo "<td>
                            <a href='".base_url()."printslip/2_".$policyID."_".$value->id.".html' target='__blank' class='btn btn-primary'>
                                <span class='icon icon-print icon-lg'></span>
                            </a>
                      </td>";
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