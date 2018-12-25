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
	          <strong>New Employee</strong>
	        </div>
	        <div class="card-body">
	          
	          <div class="demo-form-wrapper">
	            <form  id="demo-inputmask" class="form form-horizontal" method="post" enctype="multipart/form-data">


                  <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-1">Introducer(Agent) Code</label>
	                <div class="col-sm-4">
	                      <?php $agentl = $this->db->get("agent");
	                    if($agentl->num_rows()>0){?>
	                           <select class="form-control" name="gender" required="required">
	                  	<option>-Select Gender-</option>
	                  	<?php foreach ($agentl->result() as $key ) {
	                  	$this->db->where("id",$key->id);
	                  $row = 	$this->db->get("login")->row();
	                  		echo '<option value="'.$key->id.'" >'.$row->username.'</option>';
	                  	}
	                  	?>
	                  </select>
	                  <?php  }else{?>
	                      <input id="form-control-1" class="form-control" name="agentCode" type="text" required="required" >  
	                  <?php  }
	                    
	                    ?>
	                 
	                  
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-1">Rank</label>
	                <div class="col-sm-4">
	                  <input id="form-control-1" class="form-control" name="fatherName" type="text" required="required" value="<?= set_value('fatherName'); ?>">
	                  
	                </div>
	              </div>
	              
	              
	              <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-1">Name(BLOCK LETTER)</label>
	                <div class="col-sm-4">
	                  
	                  <input id="form-control-1" class="form-control" name="name" type="text" required="required" value="<?= set_value('name'); ?>">
	                  <?= form_error('name'); ?>
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-1">Father Name</label>
	                <div class="col-sm-4">
	                  <input id="form-control-1" class="form-control" name="fatherName" type="text" required="required" value="<?= set_value('fatherName'); ?>">
	                  <?= form_error('fatherName'); ?>
	                </div>
	              </div>

	              <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-1">Mother Name</label>
	                <div class="col-sm-4">
	                  <input id="form-control-1" class="form-control" name="motherName" type="text" required="required" value="<?= set_value('motherName'); ?>">
	                  <?= form_error('motherName'); ?>
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-1">Date of Birth</label>
	                <div class="col-sm-4">
	                  <input id="form-control-1" class="form-control" name="dob" type="text" required="required" value="<?= set_value('dob'); ?>" data-inputmask="'alias': 'dd-mm-yyyy'">
	                  <?= form_error('dob'); ?>
	                </div>
	              </div>

	              <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-1">Gender</label>
	                <div class="col-sm-4">
	                  <select class="form-control" name="gender" required="required">
	                  	<option>-Select Gender-</option>
	                  	<?php foreach ($gender as $key => $value) {
	                  		$sel = set_value('gender') == $value ? " selected" : "";
	                  		echo '<option value="'.$value.'" '.$sel.'>'.$value.'</option>';
	                  	}
	                  	?>
	                  </select>
	                  <?= form_error('gender'); ?>
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-1">Category</label>
	                <div class="col-sm-4">
	                  <select class="form-control" name="category" required="required">
	                  	<option>-Select Category-</option>
	                  	<?php foreach ($category as $key => $value) {
	                  		$sel = set_value('category') == $value ? " selected" : "";
	                  		echo '<option value="'.$value.'" '.$sel.'>'.$value.'</option>';
	                  	}
	                  	?>
	                  </select>
	                  <?= form_error('category'); ?>
	                </div>
	              </div>

	              <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-1">Qualification</label>
	                <div class="col-sm-4">
	                  <input id="form-control-1" class="form-control" name="qualification" type="text" required="required" value="<?= set_value('qualification'); ?>">
	                  <?= form_error('qualification'); ?>
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-1">Address</label>
	                <div class="col-sm-4">
	                  <input id="form-control-1" class="form-control" name="address" type="text" required="required" value="<?= set_value('address'); ?>">
	                  <?= form_error('address'); ?>
	                </div>
	              </div>

	              <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-1">City</label>
	                <div class="col-sm-4">
	                  <input id="form-control-1" class="form-control" name="city" type="text" required="required" value="<?= set_value('city'); ?>">
	                  <?= form_error('city'); ?>
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-1">State</label>
	                <div class="col-sm-4">
	                  <input id="form-control-1" class="form-control" name="state" type="text" required="required" value="<?= set_value('state'); ?>">
	                  <?= form_error('state'); ?>
	                </div>
	              </div>

	              <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-1">Pincode</label>
	                <div class="col-sm-4">
	                  <input id="form-control-1" class="form-control" type="text" name="pin" minlength="6" maxlength="6" required="required" title="Pincode only accepts Numbers." pattern="[0-9]{6}" value="<?= set_value('pin'); ?>">
	                  <?= form_error('pin'); ?>
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-1">Country</label>
	                <div class="col-sm-4">
	                  <input id="form-control-1" class="form-control" name="country" type="text" required="required" value="<?= set_value('country'); ?>">
	                  <?= form_error('country'); ?>
	                </div>
	              </div>

	              <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-1">Phone</label>
	                <div class="col-sm-4">
	                  <input id="form-control-1" class="form-control" type="text"minlength="6" name="phone" maxlength="10" title="Phone Number accepts 6-10 Numbers." value="<?= set_value('phone'); ?>" >
	                  <?= form_error('phone'); ?>
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-1">Mobile</label>
	                <div class="col-sm-4">
	                  <input id="form-control-1" class="form-control" type="text" name="mobile" minlength="10" maxlength="10" required="required" title="Phone Number accepts 10 Numbers." pattern="[0-9]{10}" value="<?= set_value('mobile'); ?>">
	                  <?= form_error('mobile'); ?>
	                </div>
	              </div>

	              <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-1">Email</label>
	                <div class="col-sm-4">
	                  <input id="form-control-9" class="form-control" type="text" name="email" data-inputmask="'alias': 'email'" value="<?= set_value('email'); ?>">
	                  <?= form_error('email'); ?>
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-1">Aadhar No</label>
	                <div class="col-sm-4">
	                  <input id="form-control-1" class="form-control" name="aadharNo" type="text" required="required" value="<?= set_value('aadharNo'); ?>">
	                  <?= form_error('aadharNo'); ?>
	                </div>
	              </div>

	              <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-1">Image</label>
	                <div class="col-sm-4">
	                  <input id="form-control-1" class="form-control" name="image" type="file" required="required"  >
	                
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-1">Signature</label>
	                <div class="col-sm-4">
	                  <input id="form-control-1" class="form-control" name="signature" type="file" required="required" >
	                 
	                </div>
	              </div>

	              <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-1">ID-Proof</label>
	                <div class="col-sm-4">
	                  <input id="form-control-1" class="form-control" name="idProof" type="file" required="required" >
	                 
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-1">Rank</label>
	                <div class="col-sm-4">
	                  <select class="form-control" name="rank" required="required">
	                  	<option>-Select Rank-</option>
	                  	<?php foreach ($rank as $key => $value) {
	                  		$sel = set_value('rank') == $value->id ? " selected" : "";
	                  		echo '<option value="'.$value->id.'" '.$sel.'>'.$value->id.'</option>';
	                  	}
	                  	?>
	                  </select>
	                  <?= form_error('rank'); ?>
	                </div>

	                
	              </div>

	              <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-1">Branch</label>
	                <div class="col-sm-4">
	                  <select class="form-control" name="branchID" required="required">
	                  	<option>-Select Branch-</option>
	                  	<?php foreach ($branch as $key => $value) {
	                  		$sel = set_value('branchID') == $value->id ? " selected" : "";
	                  		echo '<option value="'.$value->id.'" '.$sel.'>'.$value->title.'</option>';
	                  	}
	                  	?>
	                  </select>
	                  <?= form_error('branchID'); ?>
	                </div>
	                
	                <label class="col-sm-2 control-label" for="form-control-1">Is Admin ?</label>
	                <div class="col-sm-4">
	                  <select class="form-control" name="isAdmin" required="required">
	                  	<option>-Select Authority-</option>
	                  	<?php foreach ($isAdmin as $key => $value) {
	                  		$sel = set_value('isAdmin') == $value ? "selected" : "";
	                  		echo '<option value="'.$value.'" '.$sel.'>'.$key.'</option>';
	                  	}
	                  	?>
	                  </select>
	                  <?= form_error('isAdmin'); ?>
	                </div>
	              </div>

	              <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-1">Username</label>
	                <div class="col-sm-4">
	                  <input id="form-control-1" class="form-control" name="username" type="text" required="required" value="<?= set_value('username'); ?>">
	                  <?= form_error('username'); ?>
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-1">Password</label>
	                <div class="col-sm-4">
	                  <input id="form-control-1" class="form-control" name="password" type="password" required="required" value="<?= set_value('password'); ?>">
	                  <?= form_error('password'); ?>
	                </div>
	              </div>

	              <div class="form-group gutter-xs">
	                <label class="col-sm-2 control-label" for="form-control-1">&nbsp;</label>
	                <div class="col-sm-4 center">
	                  <input type="submit" value="Save Branch" class="btn btn-primary">
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
