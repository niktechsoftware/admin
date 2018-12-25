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
	            <form id="demo-inputmask" class="form form-horizontal" method="post" enctype="multipart/form-data">

	               <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-1">Customer ID</label>
	                <div class="col-sm-2"><?=  date("ymd", strtotime($customer->created)).'C'.$customer->id; ?></div>

	                <label class="col-sm-2 control-label" for="form-control-2">Policy No</label>
	                <div class="col-sm-2"><?= date("ymd", strtotime($investDetail->created)).'P'.$investDetail->id; ?></div>

	                <label class="col-sm-2 control-label" for="form-control-3">Username</label>
	                <div class="col-sm-2"><?= $loginDetail->username;; ?></div>
	              </div>


	              <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-1">Name</label>
	                <div class="col-sm-2"><?= $customer->name; ?></div>

	                <label class="col-sm-2 control-label" for="form-control-2">Father Name</label>
	                <div class="col-sm-2"><?= $customer->fatherName; ?></div>

	                <label class="col-sm-2 control-label" for="form-control-3">Mother Name</label>
	                <div class="col-sm-2"><?= $customer->motherName; ?></div>
	              </div>

	              <div class="form-group">

	                <label class="col-sm-2 control-label" for="form-control-4">Date of Birth</label>
	                <div class="col-sm-2"><?= $customer->dob; ?></div>

	                <label class="col-sm-2 control-label" for="form-control-5">Gender</label>
	                <div class="col-sm-2"><?= $customer->gender; ?></div>

	                <label class="col-sm-2 control-label" for="form-control-6">Category</label>
	                <div class="col-sm-2"><?= $customer->category; ?></div>
	              </div>

	              <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-7">Qualification</label>
	                <div class="col-sm-2"><?= $customer->qualification; ?></div>

	                <label class="col-sm-2 control-label" for="form-control-8">Address</label>
	                <div class="col-sm-2"><?= $customer->address; ?></div>
	                
	                <label class="col-sm-2 control-label" for="form-control-9">City</label>
	                <div class="col-sm-2"><?= $customer->city; ?></div>
	              </div>

	              <div class="form-group">

	                <label class="col-sm-2 control-label" for="form-control-10">State</label>
	                <div class="col-sm-2"><?= $customer->state; ?></div>

	                <label class="col-sm-2 control-label" for="form-control-11">Pincode</label>
	                <div class="col-sm-2"><?= $customer->pin; ?></div>

	                <label class="col-sm-2 control-label" for="form-control-12">Country</label>
	                <div class="col-sm-2"><?= $customer->country; ?></div>
	              </div>

	              <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-13">Phone</label>
	                <div class="col-sm-2"><?= $customer->phone; ?></div>

	                <label class="col-sm-2 control-label" for="form-control-14">Mobile</label>
	                <div class="col-sm-2"><?= $customer->mobile; ?></div>

	                <label class="col-sm-2 control-label" for="form-control-15">Email</label>
	                <div class="col-sm-2"><?= $customer->email; ?></div>
	              </div>

	              <div class="form-group">

	                <label class="col-sm-2 control-label" for="form-control-16">Aadhar No</label>
	                <div class="col-sm-2"><?= $customer->adhaarNo; ?></div>

	                <label class="col-sm-2 control-label" for="form-control-20">Branch</label>
	                <div class="col-sm-2"><?= $branchDetail->title; ?></div>

	                <label class="col-sm-2 control-label" for="form-control-21">Commitee</label>
	                <div class="col-sm-2"><?= $commiteeDetail->title ?></div>
	              </div>


	              <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-22">Plan Name</label>
	                <div class="col-sm-2"><?= $planDetail->title; ?></div>

	                <label class="col-sm-2 control-label" for="form-control-37">Join Date</label>
	                <div class="col-sm-2"><?= date("d M Y", strtotime($investDetail->created)); ?></div>

	              </div>

	              <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-17">Image</label>
	                <div class="col-sm-2"><img src="<?= base_url() ?>assets/images/customer/<?= $customer->image; ?>" width="100" /></div>

	                <label class="col-sm-2 control-label" for="form-control-18">Signature</label>
	                <div class="col-sm-2"><img src="<?= base_url() ?>assets/images/customer/<?= $customer->signature; ?>" width="100" /></div>

	                <label class="col-sm-2 control-label" for="form-control-19">ID-Proof</label>
	                <div class="col-sm-2"><img src="<?= base_url() ?>assets/images/customer/<?= $customer->idProof; ?>" width="100" /></div>
	                
	              </div>

	            </form>
	          </div>

	        </div>
	      </div>
	    </div>
	  </div>
	</div>
</div>
