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
	            <form id="demo-inputmask" class="form form-horizontal" method="post" enctype="multipart/form-data">

	               <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-1">Employee ID</label>
	                <div class="col-sm-2"><?php echo $employee->id; ?></div>

	                <label class="col-sm-2 control-label" for="form-control-2">Policy No</label>
	                <div class="col-sm-2"> 
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-3">Username</label>
	                <div class="col-sm-2"><?= $loginDetail->username;; ?></div>
	              </div>


	              <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-1">Name</label>
	                <div class="col-sm-2"><?= $employee->name; ?></div>

	                <label class="col-sm-2 control-label" for="form-control-2">Father Name</label>
	                <div class="col-sm-2"><?= $employee->fatherName; ?></div>

	                <label class="col-sm-2 control-label" for="form-control-3">Mother Name</label>
	                <div class="col-sm-2"><?= $employee->motherName; ?></div>
	              </div>

	              <div class="form-group">

	                <label class="col-sm-2 control-label" for="form-control-4">Date of Birth</label>
	                <div class="col-sm-2"><?= date("d M Y", strtotime($employee->dob)); ?></div>

	                <label class="col-sm-2 control-label" for="form-control-5">Gender</label>
	                <div class="col-sm-2"><?= $employee->gender; ?></div>

	                <label class="col-sm-2 control-label" for="form-control-6">Category</label>
	                <div class="col-sm-2"><?= $employee->category; ?></div>
	              </div>

	              <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-7">Qualification</label>
	                <div class="col-sm-2"><?= $employee->qualification; ?></div>

	                <label class="col-sm-2 control-label" for="form-control-8">Address</label>
	                <div class="col-sm-2"><?= $employee->address; ?></div>
	                
	                <label class="col-sm-2 control-label" for="form-control-9">City</label>
	                <div class="col-sm-2"><?= $employee->city; ?></div>
	              </div>

	              <div class="form-group">

	                <label class="col-sm-2 control-label" for="form-control-10">State</label>
	                <div class="col-sm-2"><?= $employee->state; ?></div>

	                <label class="col-sm-2 control-label" for="form-control-11">Pincode</label>
	                <div class="col-sm-2"><?= $employee->pin; ?></div>

	                <label class="col-sm-2 control-label" for="form-control-12">Country</label>
	                <div class="col-sm-2"><?= $employee->country; ?></div>
	              </div>

	              <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-13">Phone</label>
	                <div class="col-sm-2"><?= $employee->phone; ?></div>

	                <label class="col-sm-2 control-label" for="form-control-14">Mobile</label>
	                <div class="col-sm-2"><?= $employee->mobile; ?></div>

	                <label class="col-sm-2 control-label" for="form-control-15">Email</label>
	                <div class="col-sm-2"><?= $employee->email; ?></div>
	              </div>

	              <div class="form-group">

	                <label class="col-sm-2 control-label" for="form-control-16">Aadhar No</label>
	                <div class="col-sm-2"><?= $employee->aadharNo; ?></div>

	                <label class="col-sm-2 control-label" for="form-control-20">Branch</label>
	                <div class="col-sm-2"><?= $branchDetail->title; ?></div>

	                <label class="col-sm-2 control-label" for="form-control-21">Committee</label>
	                <div class="col-sm-2"></div>
	              </div>


	              <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-22">Plan Name</label>
	                <div class="col-sm-2"></div>

	                <label class="col-sm-2 control-label" for="form-control-37">Join Date</label>
	                <div class="col-sm-2"><?= date("d M Y", strtotime($employee->created)); ?></div>
                    <label class="col-sm-2 control-label" for="form-control-37">Employee Post</label>
	                <div class="col-sm-2"><?= $employee->emp_designation; ?></div>
	              </div>

	              <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-17">Image</label>
	                <div class="col-sm-2"><img src="<?= base_url() ?>assets/images/employee/<?= $employee->image; ?>" width="100" /></div>

	                <label class="col-sm-2 control-label" for="form-control-18">Signature</label>
	                <div class="col-sm-2"><img src="<?= base_url() ?>assets/images/employee/<?= $employee->signature; ?>" width="100" /></div>

	                <label class="col-sm-2 control-label" for="form-control-19">ID-Proof</label>
	                <div class="col-sm-2"><img src="<?= base_url() ?>assets/images/employee/<?= $employee->idProof; ?>" width="100" /></div>
	                
	              </div>

	            </form>
	          </div>

	        </div>
	      </div>
	    </div>
	  </div>
	</div>
</div>
