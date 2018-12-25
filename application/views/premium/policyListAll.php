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
              <strong>Policy Detail List</strong>
            </div>
            <div class="card-body" data-toggle="match-height">
              <div id="demo-datatables-1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                
              <div class="table-responsive">
                <table id="demo-datatables-1" class="table table-striped table-nowrap dataTable" cellspacing="0" width="100%" aria-describedby="demo-datatables-1_info" role="grid" style="width: 100%;">
                    <thead>
                      <tr role="row">
                        <th class="sorting" tabindex="0" aria-controls="demo-datatables-1" rowspan="1" colspan="1" aria-label="Policy No: activate to sort column ascending" style="width: 265px;">Policy No</th>
                        <th class="sorting" tabindex="0" aria-controls="demo-datatables-1" rowspan="1" colspan="1" aria-label="Customer No: activate to sort column ascending" style="width: 265px;">Customer No</th>
                        <th class="sorting" tabindex="0" aria-controls="demo-datatables-1" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 387px;">Name</th>
                        <th class="sorting" tabindex="0" aria-controls="demo-datatables-1" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending" style="width: 203px;">Address</th>
                        <th class="sorting" tabindex="0" aria-controls="demo-datatables-1" rowspan="1" colspan="1" aria-label="Contact: activate to sort column ascending" style="width: 203px;">Contact</th>
                        <th class="sorting" tabindex="0" aria-controls="demo-datatables-1" rowspan="1" colspan="1" aria-label="Policy: activate to sort column ascending" style="width: 129px;">Policy</th>
                        <th class="sorting_desc" tabindex="0" aria-controls="demo-datatables-1" rowspan="1" colspan="1" aria-label="Loan/Amount: activate to sort column ascending" style="width: 206px;">Loan/Amount</th>
                        <th class="sorting" tabindex="0" aria-controls="demo-datatables-1" rowspan="1" colspan="1" aria-sort="descending" aria-label="Duration: activate to sort column ascending" style="width: 164px;">Duration</th>
                        <th class="sorting" tabindex="0" aria-controls="demo-datatables-1" rowspan="1" colspan="1" aria-sort="descending" aria-label="Settings: activate to sort column ascending" style="width: 164px;">Settings</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th rowspan="1" colspan="1">Policy No</th>
                        <th rowspan="1" colspan="1">Customer No</th>
                        <th rowspan="1" colspan="1">Name</th>
                        <th rowspan="1" colspan="1">Address</th>
                        <th rowspan="1" colspan="1">Contact</th>
                        <th rowspan="1" colspan="1">Policy</th>
                        <th rowspan="1" colspan="1">Loan/Amount</th>
                        <th rowspan="1" colspan="1">Duration</th>
                        <th rowspan="1" colspan="1">Settings</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php $planDetails =$this->db->get("customer")->result();
                      foreach ($planDetails as $key => $planDetail): 
                      $plantitla ="Contact to admin";?>
                        <tr role="row" class="<?= $key % 2 == 0 ? 'even' : 'odd' ?>">
                          <td><?= $planDetail->policy_No; ?></td>
                          <td><?= $planDetail->Customer_ID?></td>
                          <td><?= $planDetail->name; ?></td>
                          <td><?= $planDetail->address ?></td>
                          <td><?= $planDetail->mobile ?></td>
                          <?php $this->db->where("customerID",$planDetail->Customer_ID);
                         $idplan =  $this->db->get("investmentDetail")->row();
                      if($idplan){
                          $this->db->where("id",$idplan->planID);
                        $plantitla  = $this->db->get("investmentPlans")->row()->title;
                      }
                        ?>
                          <td><?= $plantitla ?></td>
                          <td class="sorting_1">
                            &#8377;
                            <?php if($idplan){ (  $idplan->planID == 1 ||   $idplan->planID == 4) ?   $idplan->oneTimeInvestment :   $idplan->monthlyInvestment; }?></td>
                          <td><?php   if($idplan){$idplan->durationMonth; }?> Months</td>
                          <td>
                            <a href="<?= base_url() ?>premium/detail/<?php echo $planDetail->Customer_ID;?>.html" class="btn btn-primary">
	                    		<span class="icon icon-wpforms icon-lg"></span>
	                    	</a>
                            
                           
                          
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
	  </div>
	</div>
</div>