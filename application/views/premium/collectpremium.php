<?php  if($planid == 1){
              	$this->db->where('id', $tableid);
              	$result = $this->db->get('fdDetail');
              	$detail = $result->row();
              }
              
              if($planid == 2){
              	$this->db->where('id', $tableid);
              	$result = $this->db->get('rdDetail');
              	$detail = $result->row();
              }
              
              if($planid == 3){
              			$this->db->where('id', $tableid);
              	$result = $this->db->get('npsDetail');
              	$detail = $result->row();
              } 
              
              if($planid == 4){
              	$this->db->where('id', $tableid);
              	$result = $this->db->get('misDetail');
              	$detail = $result->row();
              }
			
		
		
			$this->db->where("Customer_ID",$detail->customerID);
			$getdata = $this->db->get("customer")->row();
			
		 $this->db->where("customerID", $detail->customerID);
            $planid = $this->db->get("investmentDetail")->row();
            
                $this->db->where("id",$planid->planID);
               $title =  $this->db->get("investmentPlans")->row()->title;
               
               $this->db->where("id",$planid->branchID);
               $titlebranch =  $this->db->get("branch")->row()->title;
               
               $this->db->where("id",$planid->committeeID);
               $comititle =  $this->db->get("committee")->row()->title;


?>


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
              <strong>Collect Premium (<?=  $getdata->name; ?>)</strong>
            </div>
            <div class="card-body" data-toggle="match-height">
              <div class="row">
                <div class="col-md-12">
                  <form id="demo-inputmask" method="post" action="<?= base_url() ?>setpremium.html">
                    <table class="table">
                      <tr>
                        <th>Customer-ID</th>
                        <td>
                          <?=  $getdata->Customer_ID; ?>  
                          <input type="hidden" name="policyID" value="<?= $getdata->Customer_ID ?>">
                          <input type="hidden" name="customerID" value="<?= $planid->id ?>">
                         
                            <input type="hidden" name="tableid" value="<?= $tableid ?>">
                          <input type="hidden" name="planID" value="<?php echo $planid->planID; ?>">
                        
                        </td>
                        <th>Premium Amount</th>
                        <td><?= $detail->premiumAmount; ?></td>
                        <th>Last Date</th>
                        <td><?= $detail->should_paid; ?></td>
                        <th>Today</th>
                        <td><?= date("j-M-Y h:i A") ?></td>
                      </tr>
                      <tr>
                        <th>Customer Name</th>
                        <td><?= $getdata->name; ?></td>
                        <th>Father Name</th>
                        <td><?= $getdata->fatherName; ?></td>
                        <th>Mother Name</th>
                        <td><?= $getdata->motherName; ?></td>
                        <th>Date Of Birth</th>
                        <td>
                          
                          <?= date("jS-M-Y", strtotime($getdata->dob)); ?>
                        </td>
                      </tr>
                      <tr>
                        <th>Address</th>
                        <td><?= $getdata->address; ?></td>
                        <th>Contact</th>
                        <td><?= $getdata->mobile; ?></td>
                        <th>Alternet Contact</th>
                        <td><?= $getdata->phone; ?></td>
                        <th>Aadhar Number</th>
                        <td><?= $getdata->adhaarNo; ?></td>
                      </tr>
                      <tr>
                        <th>Depositor Name</th>
                        <td>
                          <div class="form-group form-group-sm">
                              <input id="form-control-12" class="form-control" type="text" name="dipositorName" placeholder="Depositor Name">
                          </div>
                        <th>Pay-Mode</th>
                        <td>
                          <select class="form-control custom-select-sm" name="payMode">
                            <option value="">-Select Mode-</option>
                            <option value="cash">CASH</option>
                            <option value="online">ONLINE</option>
                          </select>
                        </td>
                        <th>Remark</th>
                        <td>
                          <div class="form-group form-group-sm">
                              <input id="form-control-12" class="form-control" type="text" name="remark" placeholder="Remark">
                          </div>
                        </td>
                        <th>Select Installment Month</th>
                        <td>
                         
                            <?php 
                           
                          
                            $month = date("M-Y", strtotime($detail->should_paid));
                          echo $month;
                           
                            ?>
                          
                        </td>
                      </tr>
                      <tr>
                        <th>Pay Date</th>
                        <td>
                          <div class="form-group form-group-sm">
                            <input id="form-control-6" name="payDate" class="form-control" type="text" data-inputmask="'alias': 'yyyy-mm-dd'">
                          </div>
                        </td>
                        <th>Late Fee</th>
                        <td>
                          <div class="form-group form-group-sm">
                            <input id="form-control-6" name="lateFee" class="form-control" type="text" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '₹ ', 'placeholder': '0'" style="text-align: right; width:100px;">
                          </div>
                        </td>
                        <th>Total Amount</th>
                        <td>
                          <div class="form-group form-group-sm">
                            <input id="form-control-6" name="totalAmount" value=<?php echo $detail->premiumAmount;?>  class="form-control" type="text"  style="text-align: right; width:100px;">
                          </div>
                        </td>
                        <th>Committee</th>
                        <td>
                          <div class="form-group form-group-sm">
                            <input class="form-control" type="text" name="committee" value="<?=  $comititle; ?>" />
                          </div>
                        </td>
                      </tr>

<tr>
  <td colspan="4">   <div class="form-group">
                   <label class="col-sm-4 control-label" for="form-control-20">Agent Code</label>
                  <div class="col-sm-4">
                    <select  class="form-control" id="agentCode" name="agentCode" >
                    <option>- Select Code-</option>
                    <?php $this->load->model('Agents');
                      foreach ($agents as  $value):
                        $userrow = $this->Agents->agentUsredata($value->loginID);?>
                        <option value="<?php echo $value->id;?>"><?php echo $value->name."[".$userrow->username."]";?></option>
              <?php 
                      endforeach;
                    ?>
                    </select>
                    <?= form_error('branchID'); ?>
                  </div></td>
 
</tr>



                      <tr>
                        <td>
                          <input type="submit" class="btn btn-primary" value="Save & Print">
                        </td>
                      </tr>
                    </table>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
	  </div>
	</div>
</div>