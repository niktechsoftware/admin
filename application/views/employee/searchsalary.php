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
	          <strong>Employee Salary List</strong>
	        </div><br>

                 <div class="card-body">
                  <div class="card-body" data-toggle="match-height">
                  <div class="panel-scroll table-responsive">
                    <table class="table table-striped table-hover center" id="empss">

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
                   
                </table>
</div>
</div>
</div>
</div>
</div>
</div></div></div>

