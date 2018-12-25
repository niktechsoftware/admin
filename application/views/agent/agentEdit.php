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
	          <strong>Employee Detail</strong>
	        </div>
	        <div class="card-body">
	          
	          <div class="demo-form-wrapper">
	            <form id="demo-inputmask" action="<?php echo base_url();?>employee/saveEditEmp" class="form form-horizontal" method="post" enctype="multipart/form-data">

	               <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-1">Employee ID</label>
	                <div class="col-sm-2"><?=  date("ymd", strtotime($employee->created)).'C'.$employee->id; ?>
	                <input id="form-control-1" class="form-control" name="employeeID" type="hidden"  value="<?= $employee->id; ?>">
	                
	                </div>
	                
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-2">Policy No</label>
	                 
	                
	                <div class="col-sm-2"> 
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-3">Username</label>
	                <div class="col-sm-2"><?= $loginDetail->username;; ?></div>
	              </div>


	              <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-1">Name</label>
	                <div class="col-sm-2">
	                <input id="form-control-1" class="form-control" name="name" type="text" required="required" value="<?= $employee->name; ?>"></div>

	                <label class="col-sm-2 control-label" for="form-control-2">Father Name</label>
	                <div class="col-sm-2">
	                <input id="form-control-1" class="form-control" name="fatherName" type="text" required="required" value="<?= $employee->fatherName; ?>">
	                  </div>

	                <label class="col-sm-2 control-label" for="form-control-3">Mother Name</label>
	                <div class="col-sm-2">
	                <input id="form-control-1" class="form-control" name="motherName" type="text" required="required" value="<?= $employee->motherName; ?>">
	                 </div>
	              </div>

	              <div class="form-group">

	                <label class="col-sm-2 control-label" for="form-control-4">Date of Birth</label>
	                <div class="col-sm-2">
	                 <input id="form-control-1" class="form-control" name="dob" type="text" required="required" value="<?= $employee->dob; ?>" data-inputmask="'alias': 'dd-mm-yyyy'"></div>

	                <label class="col-sm-2 control-label" for="form-control-5">Gender</label>
	                <div class="col-sm-2"> <select class="form-control" name="gender" required="required">
	                  	<option>-Select Gender-</option>
	                  	<?php foreach ($gender as $key => $value) {
	                  		$sel = set_value('gender') == $employee->gender ? " selected" : "";
	                  		echo '<option value="'.$value.'" '.$sel.'>'.$value.'</option>';
	                  	}
	                  	?>
	                  </select></div>

	                <label class="col-sm-2 control-label" for="form-control-6">Category</label>
	                <div class="col-sm-2"> <select class="form-control" name="category" required="required">
	                  	<option>-Select Category-</option>
	                  	<?php foreach ($category as $key => $value) {
	                  		$sel = set_value('category') == $employee->category ? " selected: selected" : "";
	                  		echo '<option value="'.$value.'" '.$sel.'>'.$value.'</option>';
	                  	}
	                  	?>
	                  </select></div>
	              </div>

	              <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-7">Qualification</label>
	                <div class="col-sm-2">
	                <input id="form-control-1" class="form-control" name="qualification" type="text" required="required" value="<?= $employee->qualification; ?>">
	                 
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-8">Address</label>
	                <div class="col-sm-2">
	                 <input id="form-control-1" class="form-control" name="address" type="text" required="required" value="<?= $employee->address; ?>">
	                 </div>
	                
	                <label class="col-sm-2 control-label" for="form-control-9">City</label>
	                <div class="col-sm-2">
	                 <input id="form-control-1" class="form-control" name="city" type="text" required="required" value="<?= $employee->city; ?>">
	                 
	                </div>
	              </div>

	              <div class="form-group">

	                <label class="col-sm-2 control-label" for="form-control-10">State</label>
	                <div class="col-sm-2">
	                 <input id="form-control-1" class="form-control" name="state" type="text" required="required" value="<?= $employee->state; ?>">
	                 
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-11">Pincode</label>
	                <div class="col-sm-2">
	                <input id="form-control-1" class="form-control" type="text" name="pin" minlength="6" maxlength="6" required="required" title="Pincode only accepts Numbers." pattern="[0-9]{6}" value="<?= $employee->pin; ?>">
	                  
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-12">Country</label>
	                <div class="col-sm-2">
	                 <input id="form-control-1" class="form-control" name="country" type="text" required="required" value="<?= $employee->country; ?>">
	                 
	                </div>
	              </div>

	              <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-13">Phone</label>
	                <div class="col-sm-2">
	                <input id="form-control-1" class="form-control" type="text"minlength="6" name="phone" maxlength="10" title="Phone Number accepts 6-10 Numbers." value="<?= $employee->phone; ?>" >
	                 
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-14">Mobile</label>
	                <div class="col-sm-2">
	                <input id="form-control-1" class="form-control" type="text" name="mobile" minlength="10" maxlength="10" required="required" title="Phone Number accepts 10 Numbers." pattern="[0-9]{10}" value="<?= $employee->mobile; ?>">
	                  
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-15">Email</label>
	                <div class="col-sm-2">
	                 <input id="form-control-9" class="form-control" type="text" name="email" data-inputmask="'alias': 'email'" value="<?= $employee->email; ?>">
	                  
	                </div>
	              </div>

	              <div class="form-group">

	                <label class="col-sm-2 control-label" for="form-control-16">Aadhar No</label>
	                <div class="col-sm-2">
	                <input id="form-control-1" class="form-control" name="aadharNo" type="text" required="required" value="<?= $employee->aadharNo; ?>">
	                  
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-20">Branch</label>
	                <div class="col-sm-2">
	                 <input id="form-control-1" class="form-control" name="branchID" type="hidden"  value="<?= $branchDetail->id; ?>">
	                
	                <?= $branchDetail->title; ?></div>

	               <label class="col-sm-2 control-label" for="form-control-22">Rank</label>
	                <div class="col-sm-2">
	                <select class="form-control" name="rank" required="required">
	                  	<option>-Select Rank-</option>
	                  	<?php foreach ($rank as $key => $value) {
	                  		$sel = set_value('rank') == $employee->rank ? " selected" : "";
	                  		echo '<option value="'.$value->id.'" '.$sel.'>'.$value->id.'</option>';
	                  	}
	                  	?>
	                  </select>
	                
	                
	                </div>
	              </div>


	              <div class="form-group">
	                

	                

	              </div>

	              <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-17">Image</label>
	                 <div class="col-sm-2"><img src="<?= base_url() ?>assets/images/employee/<?= $employee->image; ?>" width="100" />
	                 <input id="form-control-17" class="form-control"  name="image" type="file" >
	                 </div>

	                <label class="col-sm-2 control-label" for="form-control-18">Signature</label>
	                <div class="col-sm-2"><img src="<?= base_url() ?>assets/images/employee/<?= $employee->signature; ?>" width="100" />
	                <input id="form-control-18" class="form-control"  name="signature" type="file" >
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-19">ID-Proof</label>
	                <div class="col-sm-2"><img src="<?= base_url() ?>assets/images/employee/<?= $employee->idProof; ?>" width="100" />
	                 <input id="form-control-19" class="form-control"  name="idProof" type="file" ></div>
	                
	              </div>
    <div class="form-group gutter-xs">
	                <label class="col-sm-2 control-label" for="form-control-1">&nbsp;</label>
	                <div class="col-sm-4 center">
	                  <input type="submit" value="Save Employee Details" class="btn btn-primary">
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
