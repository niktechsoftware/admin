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
	          <strong>Employee Salary</strong>
	        </div>
	        <?php $this->db->where('id',$id);
                   $data=$this->db->get('employee')->row();

          

	        ?>
	        <div class="card-body">
	          
	          <div class="demo-form-wrapper">
	      <form  id="demo-inputmask" class="form form-horizontal" action="<?php echo base_url()?>Employee/emp_pay_Salary" method="post" enctype="multipart/form-data">
                
	                <label class="col-sm-2 control-label" for="form-control-1">Empolyee Code</label>
	                <div class="col-sm-4">
	                  <input id="form-control-1" class="form-control" name="emp_code" type="text" value="<?php echo $id;?>" required="required">
	                </div><br><br>
	                <label class="col-sm-2 control-label" for="form-control-1">Pay Month</label>
	                <div class="col-sm-4">
	                  <select class="form-control "   id="sel_aoi" name="paymonth" required="required">
	                  	<option>---Select Month---</option>
	                  	<option>January</option>
	                  	<option>Fabruary</option>
	                  	<option>March</option>
	                  	<option>April</option>
	                  	<option>May</option>
	                  	<option>June</option>
	                  	<option>July</option>
	                  	<option>August</option>
	                  	<option>September</option>
	                  	<option>October</option>
	                  	<option>November</option>
	                  	<option>December</option>
	                  </select>
	                </div>
	               <br><br> 
	                <label class="col-sm-2 control-label" for="form-control-1">Empolyee Name</label>
	                <div class="col-sm-4">
	                  <input id="form-control-1" class="form-control" name="Empolyeename" type="text" value="<?php echo $data->name;?>" required="required">
	                </div> <br><br>
	                 <label class="col-sm-2 control-label" for="form-control-1">Amount</label>
	                <div class="col-sm-4">
	                  <input id="form-control-1" class="form-control" name="amount" type="number"  required="required">
	                </div><br><br>
	                 <label class="col-sm-2 control-label" for="form-control-1">Payment Mode</label>
	                <div class="col-sm-4">
	                  <select class="form-control "  name="paymentmode" required="required">
	                  	<option>---Select Payment Mode---</option>
	                  	<option>Cash</option>
	                  	<option>Online</option>
	                  </select>
	                </div><br><br>
	                 <div class="col-sm-5">
	                  <div class="col-sm-4"></div>
	               <input id="form-control-1" class="btn btn-lg btn-info" name="Pay Salary" type="submit" width="70px">
	                <div class="col-sm-4"></div>
	                </div><br><br>
	                  
	            </form>
	             </div>
	              </div>
	              	 <?php	$this->db->where('emp_code',$id);
	                $row= $this->db->get('emp_salary')->result();

	              ?><table class="table table-bordered table-striped table-hover">
	              	<thead>
	              		<th>Paid Amount</th>
	              		<th>Paid Month</th>
	              		<th>Paid Mode</th>
	              		<th>Paid Date</th>
	              	</thead><?php
	              foreach($row as $data)
	              { ?>
	              
	              	<tbody>
	              		<tr>
	              		<td><?php echo $data->paid_amount; ?></td>
	              		<td><?php echo $data->paid_month; ?></td>
	              		<td><?php echo $data->pay_mode; ?></td>
	              		<td><?php echo $data->pay_date; ?></td>
                	     </tr>

                	 </tbody>
                    <?php }?>
                	       <div>  <a class="btn btn-warning"><strong style="font-size: 17px;"> Total Paid Salary
                                 <?php
                   
                   // $dt = date("Y-m-d");
			         $this->db->select_sum('paid_amount');
			       	 //$this->db->where('DATE(created)',$dt);
			        $this->db->where('emp_code',$id);
			         $amountdabit =$this->db->get('emp_salary')->row()->paid_amount;
                    echo $amountdabit;
                    
                    ?>
                          </strong></a></div>
                        
                        
                     
                    </div>
	              	</table>


	             


	               



	      </div>

	    
	      </div>
	    </div>
	  </div>
	</div>
