<?php echo $comission_id;
 $this->db->where("a_id",$comission_id)  ;
  $query=$this->db->get("agent_comission");
  
  $this->db->where("id",$comission_id);
		   $rdft =  $this->db->get("agent")->row();
		   

?>

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
			  <strong>Comission Detail</strong>
			</div>
	
		  </div>
		</div>
		<div class="col-md-12"  >
          <div class="card">
           
        
  
    	<div class="card-body" data-toggle="match-height">

            	<div class="row">
            		<div class="col-sm-10">
            			<div class="demo-form-wrapper">
				            <form id="demo-inputmask" class="form form-horizontal" method="post" enctype="multipart/form-data">
				            	<div class="form-group">
				                <label class="col-sm-2 control-label" for="form-control-1">Name</label>
				                <div class="col-sm-2" id="cname"><?php echo $rdft->name;?></div>

				                <label class="col-sm-2 control-label" for="form-control-2">Father Name</label>
				                <div class="col-sm-2" id="fname"><?php echo $rdft->fatherName;?></div>

				                <label class="col-sm-2 control-label" for="form-control-3">Date Of Birth</label>
				                <div class="col-sm-2" id="mname"><?php echo $rdft->dob;?></div>
				              </div>

				              <div class="form-group">
				                <label class="col-sm-2 control-label" for="form-control-8">Address</label>
				                <div class="col-sm-2" id="caddress"><?php echo $rdft->present_address;?></div>

				                <label class="col-sm-2 control-label" for="form-control-14">Mobile</label>
				                <div class="col-sm-2" id="cmobile"><?php echo $rdft->mobile;?></div>

				                <label class="col-sm-2 control-label" for="form-control-15">Email</label>
				                <div class="col-sm-2" id="cemail"><?php echo $rdft->email;?></div>
				              </div>
				               <div class="form-group">
				                <label class="col-sm-2 control-label" for="form-control-8">Rank</label>
				                <div class="col-sm-2" id="caddress"><?php echo $rdft->rank;?></div>

				                
				              </div>
				            </form>
				          </div>
            		</div>
            		<div class="col-sm-2" ></div>
            	</div>
              <table class="table table-hover table-bordered">
                <thead>
                  <tr>
                      <th class="text-left">#</th>
                    <th class="text-left">Comission From</th>
                    <th class="text-center">Amount</th>
                    <th class="text-center">Invoice ID</th>
                    <th class="text-center">Date</th>
                   
                  </tr>
                </thead>
                <tbody >
               <?php $i=1; $amount = 0;foreach($query->result() as $q):?>
                	<tr>
                	    <?php $this->db->where("invoice_no",$q->invoice_num);
                		$date  = $this->db->get("daybook")->row();?>
                			<td><?php echo $i;?></td>
                		<td><?php echo $date->customer_ID;?></td>
                		<td><?php $amount += $q->amount;echo $q->amount;?></td>
                		<td><?php echo $q->invoice_num;?></td>
                		
                		<td><?php echo $date->created;?></td>
                	
                	</tr>
                	<?php $i++; endforeach;?>
                		<tr>
                	    
                			<td>#</td>
                		<td>Total</td>
                		<td><?php echo $amount;?></td>
                		<td></td>
                		
                		<td></td>
                	
                	</tr>
                </tbody>
              </table>
             
             
              
            </div>
       
            
            
          </div>
        </div>
	  </div>
	</div>
</div>

