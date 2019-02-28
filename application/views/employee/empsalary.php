<div class="layout-content">
	<div class="layout-content-body">
	  <div class="row gutter-xs">
	    <div class="col-md-12">
	    	  <div class="panel panel-white">
                                <div class="panel-body">
                                    <form class="form-horizontal" action="<?php echo base_url()?>Employee/empSalarylist" method="post" enctype="multipart/form-data">
                                      <div class="row">
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
                                  </div>
                            
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
	          <strong>Employee Salary List</strong>
	        </div><br>


                 <div class="card-body">
                  <div class="card-body" data-toggle="match-height">
                  <div class="panel-scroll table-responsive">
                  <table class="table table-bordered table-striped table-hover">
                  <thead>
                    <th>Paid Amount</th>
                    <th>Paid Month</th>
                    <th>Paid Mode</th>
                    <th>Paid Date</th>
                  </thead><?php

                   $id=$this->uri->segment(3);
                  $this->db->where('emp_code',$id);
                  $row=$this->db->get('emp_salary')->result();
     
             
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
                         <div>  <a class="btn btn-warning"><strong style="font-size:15px;"> Total Paid Salary
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


               



                 <!--    <table class="table table-striped table-hover center" id="empss">

                    <thead>
                            <th>Emplyee Code</th>
                            <th>Emplyee Name</th>
                        <th>Paid Amount</th>
                        <th>Paid Month</th>
                        <th>Paid Mode</th>
                        <th>Paid Date</th>
                    </thead>
                  
                    <tbody><?php
                  foreach($abc as $data)
                  { ?>
                        <tr>
                            <td><?php echo $data->emp_code; ?></td>
                            <td><?php echo $data->emp_name; ?></td>
                        <td><?php echo $data->paid_amount; ?></td>
                        <td><?php echo $data->paid_month; ?></td>
                        <td><?php echo $data->pay_mode; ?></td>
                        <td><?php echo $data->pay_date; ?></td>
                         </tr>
 <?php }?>
                     </tbody>
                   
                </table> --> 
                </div>
</div>
</div>
</div>
</div>
</div></div></div>

