    <?php if(($this->session->userdata("isAdmin")==1)):?>

      <div class="layout-content">
        <div class="layout-content-body">
          <div class="row gutter-xs">
            <div class="col-md-12">
                                          <!-- <div class="panel panel-white">
                                <div class="panel-body">
                                    <form class="form-horizontal" action="<?php echo base_url()?>Customer/csDetail" method="post" enctype="multipart/form-data">
                                        <div class="form-group col-sm-10">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Start Date</label>
                                            <div class="col-sm-4">
                                                <input type="date" name="sdt" class="form-control date-picker" placeholder="Start Date" required="required">
                                            </div>
                                            <label for="inputEmail3" class="col-sm-2 control-label">End Date</label>
                                            <div class="col-sm-4">
                                                <input type="date" name="edt" class="form-control date-picker" placeholder="End Date" required="required">
                                            </div>
                                        </div>
                                         <div class="form-group col-sm-2">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" id="btn1" class="btn btn-success">Get Detail</button>
                                            </div>
                                        </div>
                                      </form>
                                    </div>
                                  </div> -->

                            
              <div class="card">
                <div class="card-header">
                  <div class="card-actions" style="top: 35%;">
                    <a class="btn btn-sm btn-labeled arrow-primary" href="<?= base_url() ?>newcustomer.html">
                      <span class="btn-label" style="height:30px">
                        <span class="icon icon-plus-square icon-lg icon-fw text-center"></span>
                      </span> 
                      New Customer
                    </a>
                    <a class="btn btn-sm btn-labeled arrow-info" onclick="window.history.back();" href="#">
                      <span class="btn-label" style="height:30px;">
                        <span class="icon icon-arrow-circle-left icon-lg icon-fw"></span>
                      </span>
                      Back
                    </a>
                  </div>
                  <strong>All Customers</strong>
                </div>
                <div class="card-body">
                  <div class="card-body" data-toggle="match-height">
                     <center> <h4 class="text-primary">FD Premium Due </h4></center>
                     <div class=" panel-scroll table-responsive">
                     
                    <table class="table table-striped table-hover center" id="rdmy">
                      <?php 
                        $this->db->where('status','pending');
                        $data=$this->db->get('fddetail')->result();
                        ?>
                      <thead>
                        
                        <tr>
                          <th>#</th>
                          <th>Customer ID</th>
                          <th>Policy ID</th>
                          <th>Premium Amount</th>
                          <th>Balance Premium</th>
                          <th>Depositer Name</th>
                          <th>Paid</th>
                          <th>Should Paid</th>
                          <th>Pay Mode</th>
                          <th>Paid Date</th>
                          <th>Remaining Months</th>
                          <th>Invoice Slip</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i=1;?>
                        <?php foreach ($data as $dt ): 
                          ?>
                          <tr class='clickable-row'>
                           <td><?php echo $i; ?></td>
                            <td><?php echo $dt->customerID; ?></td>
                            <td><?php  echo $dt->policyID; ?></td>
                            <td><?php echo $dt->premiumAmount; ?></td>
                            <td><?php echo $dt->balancePremium ?></td>
                            <td><?php echo $dt->depositorName; ?></td>
                            <td><?php echo $dt->paid; ?></td>
                            <td><?php echo $dt->should_paid; ?></td>
                            <td><?php echo $dt->payMode; ?></td>
                            <td><?php echo  $dt->paid_date ?></td>
                             <td><?php echo $dt->remaining_months ?></td>
                              <td><?php echo $dt->invoice_slip ?></td>
                               <td><?php echo $dt->status ?></td>
                            
                          </tr>
                        <?php $i++;
                        endforeach; ?>
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
      <?php endif;?>


    <?php if(($this->session->userdata("isAdmin")==2)):?>

      <div class="layout-content">
        <div class="layout-content-body">
          <div class="row gutter-xs">
            <div class="col-md-12">   
                                          <!-- <div class="panel panel-white">
                                <div class="panel-body">
                                    <form class="form-horizontal" action="<?php echo base_url()?>Customer/csDetail" method="post" enctype="multipart/form-data">
                                        <div class="form-group col-sm-10">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Start Date</label>
                                            <div class="col-sm-4">
                                                <input type="date" name="sdt" class="form-control date-picker" placeholder="Start Date" required="required">
                                            </div>
                                            <label for="inputEmail3" class="col-sm-2 control-label">End Date</label>
                                            <div class="col-sm-4">
                                                <input type="date" name="edt" class="form-control date-picker" placeholder="End Date" required="required">
                                            </div>
                                        </div>
                                         <div class="form-group col-sm-2">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" id="btn1" class="btn btn-success">Get Detail</button>
                                            </div>
                                        </div>
                                      </form>
                                    </div>
                                  </div> -->

                            
              <div class="card">
                <div class="card-header">
                  <div class="card-actions" style="top: 35%;">
                    <a class="btn btn-sm btn-labeled arrow-primary" href="<?= base_url() ?>newcustomer.html">
                      <span class="btn-label" style="height:30px">
                        <span class="icon icon-plus-square icon-lg icon-fw text-center"></span>
                      </span> 
                      New Customer
                    </a>
                    <a class="btn btn-sm btn-labeled arrow-info" onclick="window.history.back();" href="#">
                      <span class="btn-label" style="height:30px;">
                        <span class="icon icon-arrow-circle-left icon-lg icon-fw"></span>
                      </span>
                      Back
                    </a>
                  </div>
                  <strong>All Customers</strong>
                </div>
                <div class="card-body">
                  <div class="card-body" data-toggle="match-height">
                     <center> <h4 class="text-primary">FD Premium Due </h4></center>
                     <div class=" panel-scroll table-responsive">
                     
                    <table class="table table-striped table-hover center" id="rdmy">
                      <?php     
                       $cdate = date('Y-m-d');
                          $this->db->select('Customer_ID');
                                    $this->db->where("branchID",$this->session->userdata("branchid"));
                                    $dfl = $this->db->get('customer')->result();
                                    foreach ($dfl as $valx):
                                    $valx->Customer_ID;
                                    $this->db->where("customerID",$valx->Customer_ID);
                                    $plan4= $this->db->get("investmentdetail")->row();
                                    if($plan4->planID==1)
                                    {         
                                      $this->db->from('fddetail');
                                      $this->db->where('should_paid <',$cdate);
                                      $this->db->where('status','pending');

                                      $dfl=$this->db->get()->result();

                                    }
                                      endforeach;
                                         ?>
                      <thead>
                        
                        <tr>
                          <th>#</th>
                          <th>Customer ID</th>
                          <th>Policy ID</th>
                          <th>Premium Amount</th>
                          <th>Balance Premium</th>
                          <th>Depositer Name</th>
                          <th>Paid</th>
                          <th>Should Paid</th>
                          <th>Pay Mode</th>
                          <th>Paid Date</th>
                          <th>Remaining Months</th>
                          <th>Invoice Slip</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i=1;?>
                        <?php foreach ($dfl as $dt ): 
                          ?>
                          <tr class='clickable-row'>
                           <td><?php echo $i; ?></td>
                            <td><?php echo $dt->customerID; ?></td>
                            <td><?php  echo $dt->policyID; ?></td>
                            <td><?php echo $dt->premiumAmount; ?></td>
                            <td><?php echo $dt->balancePremium ?></td>
                            <td><?php echo $dt->depositorName; ?></td>
                            <td><?php echo $dt->paid; ?></td>
                            <td><?php echo $dt->should_paid; ?></td>
                            <td><?php echo $dt->payMode; ?></td>
                            <td><?php echo  $dt->paid_date ?></td>
                             <td><?php echo $dt->remaining_months ?></td>
                              <td><?php echo $dt->invoice_slip ?></td>
                               <td><?php echo $dt->status ?></td>
                            
                          </tr>
                        <?php $i++;
                        endforeach; ?>
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
      <?php endif;?>
