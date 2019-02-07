<div class="layout-content">
	<div class="layout-content-body">
	  <div class="row gutter-xs">
		<div class="col-md-12">
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
			  <strong>Premium Detail</strong>
			</div>
			<form action="<?php echo base_url(); ?>index.php/premiumdetail/" method="post">
			<div class="card-body">
			  
			  <div class="demo-form-wrapper">
				  <div class="form-group">
					<label class="col-sm-1 control-label" for="form-control-1">CustomerID</label>
					<div class="col-sm-2">
						<input id="CustomerID" name = "CustomerID" class="form-control" type="text" required="required">
					</div>
					<button class="btn btn-primary col-sm-2" onclick="getPlanList()">Get Plan Detail</button>
				  </div>
				
			  </div>
			</div>
			</form>
		  </div>
		</div>
		<div class="col-md-12"  >
          <div class="card">
            <div class="card-header">
               <div class="card-actions" style="top: 35%;">
				<a class="btn btn-sm btn-labeled arrow-success" onclick="addPlan();" href="#">
				  <span class="btn-label">
					<span class="icon icon-plus-square icon-lg icon-fw"></span>
				  </span>
				  Add Plan
				</a>
			  </div>
              <strong>Plan List Associated with given Customer-ID</strong>
            </div>
        
    	<?php if(($row =='9')){ 
    	if(($row ==9)){?>
    		 <div class="demo-form-wrapper">
				  <div class="form-group">
					
					<div class="col-sm-2">
					
					</div>
					<button class="btn btn-primary col-sm-2">Please Enter a valid id and password!!!!</button>
				  </div>
			  </div>
    		
    	<?php }
    	if(($row ==8)){?>
    	
    	echo "1";
    	
    	<?php }
    		?>
    	
    		
    		
    		
    	<?php } if(($row != '9')&&($row != '8')){
    		$this->db->where("Customer_ID",$row);
			$getdata = $this->db->get("customer")->row();
    		?>
    	<div class="card-body" data-toggle="match-height">

            	<div class="row">
            		<div class="col-sm-10">
            			<div class="demo-form-wrapper">
				            <form id="demo-inputmask" class="form form-horizontal" method="post" enctype="multipart/form-data">
				            	<div class="form-group">
				                <label class="col-sm-2 control-label" for="form-control-1">Name</label>
				                <div class="col-sm-2" id="cname"><?php echo $getdata->name;?></div>

				                <label class="col-sm-2 control-label" for="form-control-2">Father Name</label>
				                <div class="col-sm-2" id="fname"><?php echo $getdata->fatherName;?></div>

				                <label class="col-sm-2 control-label" for="form-control-3">Mother Name</label>
				                <div class="col-sm-2" id="mname"><?php echo $getdata->motherName;?></div>
				              </div>

				              <div class="form-group">
				                <label class="col-sm-2 control-label" for="form-control-8">Address</label>
				                <div class="col-sm-2" id="caddress"><?php echo $getdata->address;?></div>

				                <label class="col-sm-2 control-label" for="form-control-14">Mobile</label>
				                <div class="col-sm-2" id="cmobile"><?php echo $getdata->mobile;?></div>

				                <label class="col-sm-2 control-label" for="form-control-15">Email</label>
				                <div class="col-sm-2" id="cemail"><?php echo $getdata->email;?></div>
				              </div>
				            </form>
				          </div>
            		</div>
            		<div class="col-sm-2" ></div>
            	</div>
              <table class="table table-hover table-bordered">
                <thead>
                  <tr>
                    <th class="text-left">Policy ID</th>
                    <th class="text-center">Title</th>
                    <th class="text-center">Branch</th>
                    <th class="text-center">Committee</th>
                    <th class="text-center">Year</th>
                    <th class="text-center">Month</th>
                    <th class="text-center">Actions</th>
                  </tr>
                </thead>
                <tbody id="PolicyList">
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
                	<tr>
                		<td><?php echo $getdata->policy_No;?></td>
                		<td><?php echo $title;?></td>
                		<td><?php echo $titlebranch;?></td>
                		<td><?php echo $comititle;?></td>
                		<td><?php echo $planid->durationYear;?></td>
                		<td><?php echo $planid->durationMonth." Months";?></td>
                		<td><a href="<?= base_url() ?>premium/printcertificate/<?php echo $getdata->Customer_ID?>.html" target="__blank" class="btn btn-primary">
	                    		<span class="icon icon-print icon-lg"></span>
	                    	</a>
	                    	&emsp;
	                    	<a href="<?= base_url() ?>premium/policydetail/<?php echo $getdata->Customer_ID?>.html" class="btn btn-primary">
	                    		<span class="icon icon-wpforms icon-lg"></span>
	                    	</a></td>
                	</tr>
                </tbody>
              </table>
              <?php  
              if($planid->planID == 1){
              	$this->db->where('customerID', $getdata->Customer_ID);
              	$result = $this->db->get('fdDetail');
              	$detail = $result->result();
              
              }
              
              if($planid->planID == 2){
              	$this->db->where('customerID', $getdata->Customer_ID);
              	$result = $this->db->get('rdDetail');
              	$detail = $result->result();
              }
              
              if($planid->planID == 3){
              		$this->db->where('customerID', $getdata->Customer_ID);
              	$result = $this->db->get('npsDetail');
              	$detail = $result->result();
              } 
              
              if($planid->planID == 4){
              	$this->db->where('customerID', $getdata->Customer_ID);
              	$result = $this->db->get('misDetail');
              	$detail = $result->result();
              }
               if($planid->planID == 5){
              	$this->db->where('customerID', $getdata->Customer_ID);
              	$result = $this->db->get('loanDetail');
              	$detail = $result->result();
              }
              
              
              ?>
              <table class="table table-hover table-bordered">
              	<tr>
              		<th>sno</th>
              		<th>customerID</th>
              		<th>premiumAmount</th>
              		<th>should_paid</th>
              		<th>invoice_slip</th>
              		<th>Pay Date</th>
              		<th>pay Status</th>
              	</tr>
              	<?php $i=1 ; foreach($detail as $d):?>
              	<tr>
              		<td><?php echo $i;?></td>
              		<td><?php echo $d->customerID;?></td>
              		<td><?php echo $d->premiumAmount;?></td>
              		<td><?php echo $d->should_paid;?></td>
              		<td><?php if($d->status=="Paid"){?><a href="<?= base_url() ?>premium/printslip/<?= $d->invoice_slip ?>/<?php echo $planid->planID;?>.html" title="Collect Premium" class="btn btn-primary <?= $planid->planID == 6 ? 'disabled' : '' ?>">
                              <span class="icon icon-success icon-lg"><?php echo $d->invoice_slip; ?></span>
                            </a><?php }else{ 
                          
                             }?>
                             
                             </td>
              		<td><?php if($d->status=="Pending"){?><a href="<?= base_url() ?>premium/collectpremium/<?= $d->id ?>/<?= $planid->planID ?>.html" title="Collect Premium" class="btn btn-primary <?= $planid->planID == 6 ? 'disabled' : '' ?>">
                              <span class="icon icon-rupee icon-lg"><?php if($planid->planID == 4){
              echo "Pay";
              }else{
              echo "Collect";}?>
              </span>
                            </a><?php }else{ 
                            echo $d->paid_date;
                             }?>
                            </td>
              		<td><?php echo $d->status;?></td>
              	</tr>
              <?php $i++; endforeach;?>
              </table>
              
            </div>
    	<?php }?>    
            
            
          </div>
        </div>
	  </div>
	</div>
</div>

