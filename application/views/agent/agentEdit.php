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
	          <strong>Agent Detail</strong>
	        </div>
	        <div class="card-body">
	          
	          <div class="demo-form-wrapper">
	            <form id="demo-inputmask" action="<?php echo base_url();?>agent/saveEditagent" class="form form-horizontal" method="post" enctype="multipart/form-data">

	               <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-1">Agent ID</label>
	                <div class="col-sm-2"><?=  $employee->agent_id; ?>
	                <input id="form-control-1" class="form-control" name="employeeID" type="hidden"  value="<?= $employee->id; ?>">
	                
	                </div>
	                 <div class="col-sm-2"> 
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-3">Username</label>
	                <div class="col-sm-2"><?= $loginDetail->username; ?></div>               
	              </div>
	                   <div class="form-group">
	                        <label class="col-sm-2 control-label" for="form-control-1">Name(BLOCK LETTER)</label>
	                        <div class="col-sm-4">
	                  
	                        <input id="form-control-1" class="form-control" name="name" type="text" required="required" value="<?= $employee->name; ?>">
	                 
	                        </div>

    	                <label class="col-sm-2 control-label" for="form-control-1">Father Name</label>
    	                <div class="col-sm-4">
    	                  <input id="form-control-1" class="form-control" name="fatherName" type="text" required="required" value="<?= $employee->fatherName; ?>">
    	                  <?= form_error('fatherName'); ?>
    	                </div>
    	              </div>
	                  
	                  
	                 <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-1">Date of Birth</label>
	                <div class="col-sm-4">
	                  <input id="form-control-1" class="form-control" name="dob" type="date" required="required" value="<?= $employee->dob; ?>" data-inputmask="'alias': 'dd-mm-yyyy'">
	                 
	                </div>
	              
	                <label class="col-sm-2 control-label" for="form-control-1">Gender</label>
	                <div class="col-sm-2"> <select class="form-control" name="gender" required="required">
	                  	<option>-Select Gender-</option>
	                  	<?php foreach ($gender as $key => $value) {
	                  		$sel = $employee->gender == $employee->gender ? " selected" : "";
	                  		echo '<option value="'.$value.'" '.$sel.'>'.$value.'</option>';
	                  	}
	                  	?>
	                  </select></div>
	                  
	                </div>

	              <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-1">Marital Status</label>
                    <div class="col-sm-4">
	                  <select class="form-control" name="marital_status" required="required">
	                  	<option>-Select Marital Status-</option>
	                  	<?php foreach ($meritalr as $key => $value) {
	                  		$sel = $employee->marital_status == $value ? " selected" : "selected";
	                  		echo '<option value="'.$value.'" '.$sel.'>'.$value.'</option>';
	                  	}
	                  	?>
	                  </select>
	                 
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-1">Educational Qualification</label>
	                <div class="col-sm-4">
	                  <input id="form-control-1" class="form-control" name="qualification" type="text" required="required" value="<?= $employee->qualification; ?>">
	                  <?= form_error('qualification'); ?>
	                </div>
	               </div> 

	              <div class="form-group">
	               

	                <label class="col-sm-2 control-label" for="form-control-8">Present Address</label>
	                <div class="col-sm-4">
	                 <input id="form-control-1" class="form-control" name="address" type="text" required="required" value="<?= $employee->present_address; ?>">
	                 </div>
	                
	                <label class="col-sm-2 control-label" for="form-control-8">City</label>
	                <div class="col-sm-4">
	                 <input id="form-control-1" class="form-control" name="city" type="text" required="required" value="<?= $employee->city; ?>">
	                 
	                </div>
	              </div>
	              
	               <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-1">Occupation</label>
	                <div class="col-sm-4">
	                  <input id="form-control-1" class="form-control" name="occupation" type="text" required="required" value="<?= $employee->occupation; ?>">
	                  <?= form_error('occupation'); ?>
	                </div>
	                 <label class="col-sm-2 control-label" for="form-control-1">Experience</label>
	                <div class="col-sm-4">
	                  <input id="form-control-1" class="form-control" name="experience" type="text" required="required" value="<?= $employee->experience; ?>">
	                  <?= form_error('address'); ?>
	                </div>
	               
	               </div>
	                
	               
	                <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-1">Present Address</label>
	                <div class="col-sm-4">
	                  <input id="form-control-1" class="form-control" name="present_address" type="text" required="required" value="<?= $employee->present_address; ?>">
	                  <?= form_error('present_address'); ?>
	                </div>
	             
                  <label class="col-sm-2 control-label" for="form-control-1">Permanent Address</label>
	                <div class="col-sm-4">
	                  <input id="form-control-1" class="form-control" name="permanent_address" type="text" required="required" value="<?= $employee->permanent_address; ?>">
	                  <?= form_error('permanent_address'); ?>
	                </div>
	               </div>

	              <div class="form-group">

	                <label class="col-sm-2 control-label" for="form-control-10">State</label>
	                <div class="col-sm-4">
	                 <input id="form-control-1" class="form-control" name="state" type="text" required="required" value="<?= $employee->state; ?>">
	                 
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-11">Pincode</label>
	                <div class="col-sm-4">
	                <input id="form-control-1" class="form-control" type="text" name="pin" minlength="6" maxlength="6" required="required" title="Pincode only accepts Numbers." pattern="[0-9]{6}" value="<?= $employee->pin; ?>">
	                  
	                </div>

	                
	                </div>
	             

	              <div class="form-group">
	                 
	               

	                <label class="col-sm-2 control-label" for="form-control-12">Mobile</label>
	                <div class="col-sm-4">
	                <input id="form-control-1" class="form-control" type="text" name="mobile" minlength="10" maxlength="10" required="required" title="Phone Number accepts 10 Numbers." pattern="[0-9]{10}" value="<?= $employee->mobile; ?>">
	                  
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-13">Email</label>
	                <div class="col-sm-4">
	                 <input id="form-control-9" class="form-control" type="text" name="email" data-inputmask="'alias': 'email'" value="<?= $employee->email; ?>">
	                  
	                </div>
	              </div>

	              <div class="form-group">

	                <label class="col-sm-2 control-label" for="form-control-16">Aadhar No</label>
	                <div class="col-sm-4">
	                <input id="form-control-1" class="form-control" name="aadharNo" type="text" required="required" value="<?= $employee->aadharNo; ?>">
	                  
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-20">Branch</label>
	                <div class="col-sm-4">
	                 <input id="form-control-1" class="form-control" name="branchID" type="hidden"  value="<?= $branchDetail->id; ?>">
	                
	                <?= $branchDetail->title; ?></div>

	              
	              </div>


	               <div class="form-group">
                      <label class="col-sm-2 control-label" for="form-control-1">Nominee Age</label>
	                <div class="col-sm-4">
	                  <input id="form-control-1" class="form-control" name="nominee_age" type="number" required="required" value="<?= $employee->nominee_age; ?>">
	                  <?= form_error('nominee_age'); ?>
	                </div>
	                 <label class="col-sm-2 control-label" for="form-control-1">Nominee Contact no.</label>
	                <div class="col-sm-4">
	                  <input id="form-control-1" class="form-control" type="text" name="nominee_mobile" value="<?= $employee->nominee_mobile;?>">
	                  
	                </div>
	               </div>
	                <div class="form-group">
	                    <label class="col-sm-2 control-label" for="form-control-1">Nominee Name</label>
	                <div class="col-sm-4">
	                  <input id="form-control-1" class="form-control" type="text" name="nominee" required="required" value="<?= $employee->nominee;?>" >
	                  
	                </div>
	                 <label class="col-sm-2 control-label" for="form-control-1">Relation</label>
	                <div class="col-sm-4">
	                  <input id="form-control-1" class="form-control" type="text" name="relation" required="required" value="<?= $employee->relation;?>" >
	                
	                </div>

	              <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-17">Image</label>
	                 <div class="col-sm-2"><img src="<?= base_url() ?>assets/images/agents/<?= $employee->image; ?>" width="100" />
	                 <input id="form-control-17" class="form-control"  name="image" type="file" >
	                 </div>

	                <label class="col-sm-2 control-label" for="form-control-18">Signature</label>
	                <div class="col-sm-2"><img src="<?= base_url() ?>assets/images/agents/<?= $employee->signature; ?>" width="100" />
	                <input id="form-control-18" class="form-control"  name="signature" type="file" >
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-19">ID-Proof</label>
	                <div class="col-sm-2"><img src="<?= base_url() ?>assets/images/agents/<?= $employee->idProof; ?>" width="100" />
	                 <input id="form-control-19" class="form-control"  name="idProof" type="file" ></div>
	                
	              </div>
    <div class="form-group gutter-xs">
	                <label class="col-sm-2 control-label" for="form-control-1">&nbsp;</label>
	                <div class="col-sm-4 center">
	                  <input type="submit" value="Save Agent Details" class="btn btn-primary">
	                </div>
	              </div>
	            </form>
	          </div>

	        </div>
	      </div>
	    </div>
	  </div>
	</div>
</div>
