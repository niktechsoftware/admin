<?php //echo $comission_id;
 $this->db->where("a_id",$comission_id)  ;
  $query=$this->db->get("agent_comission");
  
  $this->db->where("id",$comission_id);
		   $rdft =  $this->db->get("agent")->row();
		   
 $this->db->select_sum('amount');   
                            $this->db->where("a_id",$comission_id)  ;
                            $totquery=$this->db->get("agent_comission")->row();
                            
                            $this->db->select_sum('amount');
                            $this->db->where("customer_ID",$rdft->agent_id);
                            $query1d=$this->db->get("daybook")->row();
                            
                            $remain = $totquery->amount-$query1d->amount;
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
              <strong>Pay Comission  (<?=  $rdft->name; ?>)</strong>
            </div>
            <div class="card-body" data-toggle="match-height">
              <div class="row">
                <div class="col-md-12">
                  <form id="demo-inputmask" method="post" action="<?= base_url() ?>agent/payComission.html">
                    <table class="table">
                      <tr>
                        <th>Agent-ID</th>
                        <td>
                          <?=  $rdft->agent_id; ?>  
                          <input type="hidden" name="aid" value="<?= $rdft->agent_id ?>">
                            <input type="hidden" name="id" value="<?= $rdft->id ?>">
                          <!--<input type="hidden" name="customerID" value="<?= $getdata->Customer_ID ?>">
                         
                            <input type="hidden" name="tableid" value="<?= $tableid ?>">
                          <input type="hidden" name="planID" value="<?php echo $planid->planID; ?>">-->
                        
                        </td>
                        
                        <?php 
                        
                        
                        
                        
                        ?>
                        <th>Comission Amount</th>
                        <td><?= $remain; ?></td>
                        <th>Date Of Birth</th>
                        <td>
                          
                          <?= date("jS-M-Y", strtotime($rdft->dob)); ?>
                        </td>
                        <th>Today</th>
                        <td><?= date("j-M-Y h:i A") ?></td>
                      </tr>
                      <tr>
                        <th>Agent Name</th>
                        <td><?= $rdft->name; ?></td>
                        <th>Father Name</th>
                        <td><?= $rdft->fatherName; ?></td>
                       <th>Address</th>
                        <td><?= $rdft->present_address; ?></td>
                       <th>Contact</th>
                        <td><?= $rdft->mobile; ?></td>
                      </tr>
                      <tr>
                        
                        
                       <th>Depositor Name</th>
                        <td>
                          <div class="form-group form-group-sm">
                              <input id="form-control-12" class="form-control" type="text" name="dipositorName" value ='<?php echo $this->session->userdata("username");?>' >
                          </div>
                        </td>
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
                           <th>Pay Date</th>
                        <td>
                          <div class="form-group form-group-sm">
                            <input id="form-control-6" name="payDate" class="form-control" type="date" data-inputmask="'alias': 'yyyy-mm-dd'">
                          </div>
                        </td>
                      </tr>
                      <tr>
                          <th>Total Amount</th>
                        <td>
                          <div class="form-group form-group-sm">
                            <input id="form-control-6" name="totalAmount" value="<?php echo $remain;?>"  class="form-control" type="text"  readonly="readonly" style="text-align: right; width:100px;">
                          </div>
                        </td> 
                          <td>
                          <input type="submit" class="btn btn-primary" value="Save & Print">
                        </td>
                       
                      </tr>
                     

                      <tr>
                        
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