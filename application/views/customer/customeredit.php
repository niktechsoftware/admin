<?php $branch = $this->branch->getBranch();

			$this->load->model("investmentPlans");
			$plans = $this->investmentPlans->getPlans();

			$category 	= ['GEN','OBC','SC','ST','OTHER'];
			$gender 	= ['MALE','FEMALE','OTHER'];?>

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
	          <strong>Customer Detail</strong>
	        </div>
	        <div class="card-body">
	          
	          <div class="demo-form-wrapper">
	            <form id="demo-inputmask"  action="<?php echo base_url();?>Customer/editcustomer" class="form form-horizontal" method="post" enctype="multipart/form-data">

	               <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-1">Customer ID</label>
	                <div class="col-sm-2"><?=  date("ymd", strtotime($customer->created)).'C'.$customer->id; ?></div>
					<input id="form-control-1" class="form-control" name="customerid" value ="<?= $customer->id; ?>" type="hidden"  >
	                 <input id="form-control-1" class="form-control" name="polocyno" value ="<?= $investDetail->id; ?>" type="hidden"  >
	                 
	                 
	                <label class="col-sm-2 control-label" for="form-control-2">Policy No</label>
	                <div class="col-sm-2"><?= date("ymd", strtotime($investDetail->created)).'P'.$investDetail->id; ?></div>

	                <label class="col-sm-2 control-label" for="form-control-3">Username</label>
	                <div class="col-sm-2"><?= $loginDetail->username;; ?></div>
	              </div>


	              <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-1">Name</label>
	                <div class="col-sm-2">
	                 <input id="form-control-1" class="form-control" name="name" value ="<?= $customer->name; ?>" type="text" required="required" >
	                 
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-2">Father Name</label>
	                <div class="col-sm-2">
	                <input id="form-control-2" value ="<?= $customer->fatherName; ?>" class="form-control" name="fatherName" type="text" required="required" >
	                 
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-3">Mother Name</label>
	                <div class="col-sm-2">
	                <input id="form-control-3" value = " <?= $customer->motherName; ?>" class="form-control" name="motherName" type="text" required="required" >
	                  
	               </div>
	              </div>

	              <div class="form-group">

	                <label class="col-sm-2 control-label" for="form-control-4">Date of Birth</label>
	                <div class="col-sm-2">
	                <input id="form-control-4" value =" <?= $customer->dob; ?>" class="form-control" name="dob" type="text" required="required"  data-inputmask="'alias': 'dd-mm-yyyy'">
	                 
	               </div>

	                <label class="col-sm-2 control-label" for="form-control-5">Gender</label>
	                <div class="col-sm-2">
	                 <select class="form-control" name="gender" required="required">
	                  	<option>-Select Gender-</option>
	                  	<?php foreach ($gender as $key => $value) {
	                  		$sel = set_value('gender') == $customer->gender ? " selected" : "";
	                  		echo '<option value="'.$value.'" '.$sel.'>'.$value.'</option>';
	                  	}
	                  	?>
	                  </select>
	               </div>

	                <label class="col-sm-2 control-label" for="form-control-6">Category</label>
	                <div class="col-sm-2">
	                 <select class="form-control" name="category" required="required">
	                  	<option>-Select Category-</option>
	                  	<?php foreach ($category as $key => $value) {
	                  		$sel = set_value('category') ==$customer->category ? " selected: selected" : "";
	                  		echo '<option value="'.$value.'" '.$sel.'>'.$value.'</option>';
	                  	}
	                  	?>
	                  </select>
	               </div>
	              </div>

	              <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-7">Qualification</label>
	                <div class="col-sm-2">
	                 <input id="form-control-7" value="<?= $customer->qualification; ?>" class="form-control" name="qualification" type="text" required="required" >
	                 
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-8">Address</label>
	                <div class="col-sm-2">
	                 <input id="form-control-8" value = "<?= $customer->address; ?>" class="form-control" name="address" type="text" required="required" >
	                 
	                </div>
	                
	                <label class="col-sm-2 control-label" for="form-control-9">City</label>
	                <div class="col-sm-2">
	                <input id="form-control-9" value =" <?= $customer->city; ?>" class="form-control" name="city" type="text" required="required" >
	                  
	               </div>
	              </div>

	              <div class="form-group">

	                <label class="col-sm-2 control-label" for="form-control-10">State</label>
	                <div class="col-sm-2">
	                <input id="form-control-10" value ="<?= $customer->state; ?>" class="form-control" name="state" type="text" required="required" >
	                  
	               </div>

	                <label class="col-sm-2 control-label" for="form-control-11">Pincode</label>
	                <div class="col-sm-2">
	               <input id="form-control-11" value = "<?= $customer->pin; ?>" class="form-control" type="text" name="pin" minlength="6" maxlength="6" required="required" title="Pincode only accepts Numbers." pattern="[0-9]{6}" >
	                   
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-12">Country</label>
	                <div class="col-sm-2">
	                <input id="form-control-12" value ="<?= $customer->country; ?>" class="form-control" name="country" type="text" required="required" value="India">
	                  
	                </div>
	              </div>

	              <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-13">Phone</label>
	                <div class="col-sm-2">
	                <input id="form-control-13" value="<?= $customer->phone; ?>" class="form-control" type="text"minlength="6" name="phone" maxlength="10" title="Phone Number accepts 6-10 Numbers."  >
	                  
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-14">Mobile</label>
	                <div class="col-sm-2">
	                 <input id="form-control-14" value = "<?= $customer->mobile; ?>" class="form-control" type="text" name="mobile" minlength="10" maxlength="10" required="required" title="Phone Number accepts 10 Numbers." pattern="[0-9]{10}" >
	                 
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-15">Email</label>
	                <div class="col-sm-2">
	                <input id="form-control-15" value = "<?= $customer->email; ?>" class="form-control" type="text" name="email" data-inputmask="'alias': 'email'" >
	                  
	                </div>
	              </div>

	              <div class="form-group">

	                <label class="col-sm-2 control-label" for="form-control-16">Aadhar No</label>
	                <div class="col-sm-2">
	                <input id="form-control-16" value="<?= $customer->adhaarNo; ?>"  class="form-control" name="aadharNo" type="text" required="required" >
	                  
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-20">Branch</label>
	                <div class="col-sm-2">
	                 <input id="form-control-16" value="<?= $branchDetail->title; ?>"  class="form-control" name="branchID" type="text" required="required" >
	               
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-21">Commitee</label>
	                <div class="col-sm-2">
	                <input id="form-control-16" value="<?= $commiteeDetail->title ?>"  class="form-control" name="committee" type="text" required="required" >
	               
	                <?= $commiteeDetail->title ?></div>
	              </div>


	              <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-22">Plan Name</label>
	                <div class="col-sm-2"><?= $planDetail->title; ?></div>

	                <label class="col-sm-2 control-label" for="form-control-37">Join Date</label>
	                <div class="col-sm-2"><?= date("d M Y", strtotime($investDetail->created)); ?></div>

	              </div>

	              <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-17">Image</label>
	                <div class="col-sm-2"><img src="<?= base_url() ?>assets/images/customer/<?= $customer->image; ?>" width="100" />
	                 <input id="form-control-17" class="form-control"  name="image" type="file" ></div>

	                <label class="col-sm-2 control-label" for="form-control-18">Signature</label>
	                <div class="col-sm-2"><img src="<?= base_url() ?>assets/images/customer/<?= $customer->signature; ?>" width="100" />
	                <input id="form-control-18" class="form-control"  name="signature" type="file" >
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-19">ID-Proof</label>
	                <div class="col-sm-2"><img src="<?= base_url() ?>assets/images/customer/<?= $customer->idProof; ?>" width="100" />
	                 <input id="form-control-19" class="form-control"  name="idProof" type="file" >
	                </div>
	                
	              </div>
							<div class="form-group gutter-xs">
	                <label class="col-sm-2 control-label" for="form-control-1">&nbsp;</label>
	                <div class="col-sm-4 center">
	                  <input type="submit" value="Update Customer Detail" class="btn btn-primary">
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
