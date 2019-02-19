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
	          <strong>New Agent</strong>
	        </div>
	        <div class="card-body">
	          
	          <div class="demo-form-wrapper">
	            <form  id="demo-inputmask" class="form form-horizontal" method="post" enctype="multipart/form-data">


                  <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-1">Introducer(Agent) Code</label>
	                <div class="col-sm-4">
	                      <?php $agentl = $this->db->get("agent");
	                    if($agentl->num_rows()>0){?>
	                           <select class="form-control" name="agentCode" required="required">
	                  	<option>-Select Agent Code-</option>
	                  	<?php foreach ($agentl->result() as $key ) :
	                  	$this->db->where("id",$key->id);
	                  $row = 	$this->db->get("login")->row();?>
	                  	<option value="<?php echo $key->id;?>" ><?php echo $key->name."[".$key->agent_id."]"; ?></option>
	                  <?php endforeach;
	                  	?>
	                  </select>
	                  <?php  }else{?>
	                      <input id="form-control-1" class="form-control" name="agentCode" type="text" required="required" >  
	                  <?php  }
	                    
	                    ?>
	                 
	                  
	                </div>

	               <!-- <label class="col-sm-2 control-label" for="form-control-1">Rank</label>
	                <div class="col-sm-4">
	                  <input id="form-control-1" class="form-control" name="fatherName" type="hidden" required="required" value="<?= set_value('fatherName'); ?>">
	                  
	                </div>
	                -->
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
	                <label class="col-sm-2 control-label" for="form-control-1">Date of Birth</label>
	                <div class="col-sm-4">
	                  <input id="form-control-1" class="form-control" name="dob" type="date" required="required" value="<?= set_value('dob'); ?>" data-inputmask="'alias': 'dd-mm-yyyy'">
	                  <?= form_error('dob'); ?>
	                </div>
	              

	             
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
	                </div>
	               <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-1">Marital Status</label>
                    <div class="col-sm-4">
	                  <select class="form-control" name="marital_status" required="required">
	                  	<option>-Select Marital Status-</option>
	                  	<?php foreach ($meritalr as $key => $value) {
	                  		$sel = set_value('marital_status') == $value ? " selected" : "";
	                  		echo '<option value="'.$value.'" '.$sel.'>'.$value.'</option>';
	                  	}
	                  	?>
	                  </select>
	                  <?= form_error('marital_status'); ?>
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-1">Educational Qualification</label>
	                <div class="col-sm-4">
	                  <input id="form-control-1" class="form-control" name="qualification" type="text" required="required" value="<?= set_value('qualification'); ?>">
	                  <?= form_error('qualification'); ?>
	                </div>
	               </div> 
                   <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-1">Occupation</label>
	                <div class="col-sm-4">
	                  <input id="form-control-1" class="form-control" name="occupation" type="text" required="required" value="<?= set_value('Occupation'); ?>">
	                  <?= form_error('occupation'); ?>
	                </div>
	                 
	                <label class="col-sm-2 control-label" for="form-control-1">Nationality</label>
	                <div class="col-sm-4">
	                  <input id="form-control-1" class="form-control" name="nationality" type="text" required="required" value="<?= set_value('nationality'); ?>">
	                  <?= form_error('nationality'); ?>
	                </div>
	               </div>
	               <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-1">Religion</label>
	                <div class="col-sm-4">
	                  <input id="form-control-1" class="form-control" name="religion" type="text" required="required" value="<?= set_value('religion'); ?>">
	                  <?= form_error('religion'); ?>
	                </div>
	                <label class="col-sm-2 control-label" for="form-control-1">Experience</label>
	                <div class="col-sm-4">
	                  <input id="form-control-1" class="form-control" name="experience" type="text" required="required" value="<?= set_value('experience'); ?>">
	                  <?= form_error('address'); ?>
	                </div>
	               </div>
	                <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-1">Present Address</label>
	                <div class="col-sm-4">
	                  <input id="form-control-1" class="form-control" name="present_address" type="text" required="required" value="<?= set_value('address'); ?>">
	                  <?= form_error('present_address'); ?>
	                </div>
	             
                  <label class="col-sm-2 control-label" for="form-control-1">Permanent Address</label>
	                <div class="col-sm-4">
	                  <input id="form-control-1" class="form-control" name="permanent_address" type="text" required="required" value="<?= set_value('address'); ?>">
	                  <?= form_error('permanent_address'); ?>
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
                    <label class="col-sm-2 control-label" for="form-control-1">Mobile</label>
	                <div class="col-sm-4">
	                  <input id="form-control-1" class="form-control" type="text" name="mobile" minlength="10" maxlength="10" required="required" title="Phone Number accepts 10 Numbers." pattern="[0-9]{10}" value="<?= set_value('mobile'); ?>">
	                  <?= form_error('mobile'); ?>
	                </div>
	               </div>
	                <div class="form-group">
	               <label class="col-sm-2 control-label" for="form-control-1">Nominee</label>
	                <div class="col-sm-4">
	                  <input id="form-control-1" class="form-control" name="nominee" type="text" required="required" value="<?= set_value('nominee'); ?>">
	                  <?= form_error('nominee'); ?>
	                </div>
	               
	                <label class="col-sm-2 control-label" for="form-control-1">Nominee Gender</label>
	                <div class="col-sm-4">
	                  <select class="form-control" name="nominee_gender" required="required">
	                  	<option>-Select Gender-</option>
	                  	<?php foreach ($gender as $key => $value) {
	                  		$sel = set_value('gender') == $value ? " selected" : "";
	                  		echo '<option value="'.$value.'" '.$sel.'>'.$value.'</option>';
	                  	}
	                  	?>
	                  </select>
	                  <?= form_error('nominee_gender'); ?>
	                </div>
	               </div>
	               <div class="form-group">
                      <label class="col-sm-2 control-label" for="form-control-1">Nominee Age</label>
	                <div class="col-sm-4">
	                  <input id="form-control-1" class="form-control" name="nominee_age" type="number" required="required" value="<?= set_value('nominee_age'); ?>">
	                  <?= form_error('nominee_age'); ?>
	                </div>
	                 <label class="col-sm-2 control-label" for="form-control-1">Nominee Contact no.</label>
	                <div class="col-sm-4">
	                  <input id="form-control-1" class="form-control" type="text" name="nominee_mobile" >
	                  
	                </div>
	               </div>
	                <div class="form-group">
	                 <label class="col-sm-2 control-label" for="form-control-1">Relation</label>
	                <div class="col-sm-4">
	                  <input id="form-control-1" class="form-control" type="text" name="relation" required="required"  >
	                  <?= form_error('relation'); ?>
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
	                 <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-1">Email</label>
	                <div class="col-sm-4">
	                  <input id="form-control-1" class="form-control" name="email" type="email" required="required" >
	                </div>
	              </div>
	              
                  <div>
                    <p>
                     <i>Terms And Conditions:</i>
                    </p>
                   <div style="overflow-y:auto; height:120px;" >
                   
                    <p>1. Every Members is bound to obey the Terms and Condition of the company as may be framed time to time . </p>
                    <p>2. Submit the self attested photocopy of I.D.Proof Residence proof, Qualification proof along with two no's of stamp size photograph.  </p>
                    <p>3. No representative is authorized to advetise, declare, Voucher, Praclaim any things for and on behalf of the company in writing. </p>
                    <p>4. In case of any branch of all /any of these clauses to Terms and conditions for the company shall terminate its business relation with the concerned representative.   </p>
                    <p>5. Submission of this application form for membership to engage as a Representative with does not necessarily guarantee any employment in the said company. A representative will work on incentive and reward basis only.</p>
                    <p>6. In case of death to the member, the concerned nominee or the nearest kin of the deceased person may continue marketing activities of the company in the same rank held by deceased representative. However, a fresh application will have to submitted by the desirous candidate in such case to company indicated the details of the applicant shall enjoy all the benefits applicable to deceased Representative. </p>
                    <p>7. While acting as a marketing member of the company no person shall be allowed to carry out the same or similar type of activities in any other company and organization or identical or similar nature.  </p>
                    <p>8. Once engage as a representative under a particular unit in companies marketing structure no person shall be entitled to change such original unit save and except in case where the management can consider such changes justified on the grounds of misbehavior criminal and immoral activities etc.of his superior member. </p>
                    <p>9. The target for market mobilization per month and annum for a marketing member in each category predetermined by the company and the incentive/special incentive reward therefore are viable to pursue the product option and schemes and the same shall be binding upon the representative. </p>
                    <p>10. The company will not be responsible for any cash transaction unless receive and acknowledge be way an official receipt at the companies corporate office only. </p>
                    <p>11. The company preserves the right to modify, change or abandon the career structure at is sole discretion without assigning any reason or notice therefore. </p>
                    <p>12. All disputes shall be subject to the jurisdiction o f Bhabhua only. </p>
                   </div>
                    <input type="checkbox" name="check" value="check" required>
                   <span><b> I agree to abide by the terms and conditions and cerular issued up to date and also to be issued by the company form time to time . </p>
                    </b></span><br>
                  </div>
	              <div class="form-group gutter-xs">
	                <label class="col-sm-2 control-label" for="form-control-1">&nbsp;</label>
	                <div class="col-sm-4 center">
	                  <input type="submit" value="Save Agent" class="btn btn-primary">
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
