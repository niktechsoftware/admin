<div class="layout-content">
	<div class="layout-content-body">
	  <div class="row gutter-xs">
	    <div class="col-md-12">
	      <div class="card">
	        <div class="card-header">
	          <div class="card-actions" style="top: 35%;">
	            <a class="btn btn-primary btn-labeled arrow-info" onclick="window.history.back();" href="#">
	              <span class="btn-label text-center" style="height:30px;">
	                <span class="icon icon-arrow-circle-left icon-lg icon-fw"></span>
	              </span>
	              Back
	            </a>
	          </div>
	          <strong>New Customer</strong>
	        </div>
	        <div class="card-body">
	          
	          <div class="demo-form-wrapper">
	            <form id="demo-inputmask" class="form form-horizontal" method="post" enctype="multipart/form-data">

	              <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-1">Name</label>
	                
	                <div class="col-sm-4">
	                  <input id="form-control-1" class="form-control" name="name" type="text" required="required" value="<?= set_value('name'); ?>">
	                  <?= form_error('name'); ?>
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-2">Father/Husband Name</label>
	                <div class="col-sm-1">
	                  <select class="form-control" name="fatherHusband_title" required="required">
	                  	<option>-Title-</option>
	                  	<option value="Mr.">Mr.</option>
	                  	<option value="Dr.">Dr.</option>
	                  	<option value="Late">Late</option>
	                  </select>
	                  <?= form_error('fatherHusband_title'); ?>
	                </div>
	                <div class="col-sm-3">
	                  <input id="form-control-2" class="form-control" name="fatherName" type="text" required="required" value="<?= set_value('fatherName'); ?>">
	                  <?= form_error('fatherName'); ?>
	                </div>
	              </div>

	              <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-3">Mother Name</label>
	               	<div class="col-sm-1">
	                  <select class="form-control" name="mother_title" required="required">
	                  	<option>-Title-</option>
	                  	<option value="Mrs.">Mrs.</option>
	                  	<option value="Dr.">Dr.</option>
	                  	<option value="Late">Late</option>
	                  </select>
	                  <?= form_error('mother_title'); ?>
	                </div>
	                <div class="col-sm-3">
	                  <input id="form-control-3" class="form-control" name="motherName" type="text" required="required" value="<?= set_value('motherName'); ?>">
	                  <?= form_error('motherName'); ?>
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-4">Date of Birth</label>
	                <div class="col-sm-4">
	                  <input id="form-control-4" class="form-control" name="dob" type="date" required="required" value="<?= set_value('dob'); ?>" data-inputmask="'alias': 'yyyy-mm-dd'">
	                  <?= form_error('dob'); ?>
	                </div>
	              </div>

	              <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-5" >Gender</label>
	                <div class="col-sm-4">
	                  <select class="form-control" name="gender" required="required" >
	                  	<option>-Select Gender-</option>
	                  	<?php foreach ($gender as $key => $value) {
	                  		$sel = set_value('gender') == $value ? " selected" : "";
	                  		echo '<option value="'.$value.'" '.$sel.'>'.$value.'</option>';
	                  	}
	                  	?>
	                  </select>
	                  <?= form_error('gender'); ?>
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-6">Category</label>
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
	                <label class="col-sm-2 control-label" for="form-control-7">Qualification</label>
	                <div class="col-sm-4">
	                  <input id="form-control-7" class="form-control" name="qualification" type="text" required="required" value="<?= set_value('qualification'); ?>">
	                  <?= form_error('qualification'); ?>
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-8">Address</label>
	                <div class="col-sm-4">
	                  <input id="form-control-8" class="form-control" name="address" type="text" required="required" value="<?= set_value('address'); ?>">
	                  <?= form_error('address'); ?>
	                </div>
	              </div>

	              <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-9">City</label>
	                <div class="col-sm-4">
	                  <input id="form-control-9" class="form-control" name="city" type="text" required="required" value="<?= set_value('city'); ?>">
	                  <?= form_error('city'); ?>
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-10">State</label>
	                <div class="col-sm-4">
	                  <input id="form-control-10" class="form-control" name="state" type="text" required="required" value="<?= set_value('state'); ?>">
	                  <?= form_error('state'); ?>
	                </div>
	              </div>

	              <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-11">Pincode</label>
	                <div class="col-sm-4">
	                  <input id="form-control-11" class="form-control" type="text" name="pin" minlength="6" maxlength="6" required="required" title="Pincode only accepts Numbers." pattern="[0-9]{6}" value="<?= set_value('pin'); ?>">
	                  <?= form_error('pin'); ?>
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-12">Country</label>
	                <div class="col-sm-4">
	                  <input id="form-control-12" class="form-control" name="country" type="text" readonly='true' required="required" value="India">
	                  <?= form_error('country'); ?>
	                </div>
	              </div>

	              <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-13">Phone</label>
	                <div class="col-sm-4">
	                  <input id="form-control-13" class="form-control" type="text" minlength="6" name="phone" maxlength="10" title="Phone Number accepts 6-10 Numbers." value="<?= set_value('phone'); ?>" >
	                  <?= form_error('phone'); ?>
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-14">Mobile</label>
	                <div class="col-sm-4">
	                  <input id="form-control-14" class="form-control" type="text" name="mobile" minlength="10" maxlength="10" required="required" title="Phone Number accepts 10 Numbers." pattern="[0-9]{10}" value="<?= set_value('mobile'); ?>">
	                  <?= form_error('mobile'); ?>
	                </div>
	              </div>

	              <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-15">Email</label>
	                <div class="col-sm-4">
	                  <input id="form-control-15" class="form-control" type="text" name="email" data-inputmask="'alias': 'email'" value="<?= set_value('email'); ?>">
	                  <?= form_error('email'); ?>
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-16">Aadhar No</label>
	                <div class="col-sm-4">
	                  <input id="form-control-16" class="form-control" name="aadharNo" type="text" required="required" value="<?= set_value('aadharNo'); ?>">
	                  <?= form_error('aadharNo'); ?>
	                </div>
	              </div>

	              <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-17">Image</label>
	                <div class="col-sm-4">
	                  <input id="form-control-17" class="form-control" name="image" type="file" required="required">
	                  <?= form_error('image'); ?>
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-18">Signature</label>
	                <div class="col-sm-4">
	                  <input id="form-control-18" class="form-control" name="signature" type="file" required="required">
	                  <?= form_error('signature'); ?>
	                </div>
	              </div>

	              <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-19">ID-Proof</label>
	                <div class="col-sm-4">
	                  <input id="form-control-19" class="form-control" name="idProof" type="file" required="required">
	                  <?= form_error('idProof'); ?>
	                </div>
	                
	              </div>

	              <div class="divider divider-horizontal">
                  	<div class="divider-content text-primary"><h4>NOMINEE DETAIL</h4></div>
                  </div>

                  <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-1">Nominee Name</label>
	                <div class="col-sm-1">
	                  <select class="form-control" name="mother_title" required="required">
	                  	<option>-Title-</option>
	                  	<option value="Mrs.">Mr.</option>
	                  	<option value="Mrs.">Mrs.</option>
	                  	<option value="Dr.">Dr.</option>
	                  	<option value="Late">Late</option>
	                  </select>
	                  <?= form_error('mother_title'); ?>
	                </div>
	                <div class="col-sm-3">
	                  <input id="form-control-40" class="form-control" name="nominee_name" type="text" required="required" value="<?= set_value('nominee_name'); ?>">
	                  <?= form_error('nominee_name'); ?>
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-2132">Realtion</label>
	                <div class="col-sm-4">
	                  <input id="form-control-2132" class="form-control" name="nominee_relation" type="text" required="required" ">
	                  <?= form_error('nominee_relation'); ?>
	                </div>
	              </div>

	              <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-1">Gender</label>
	                
	                <div class="col-sm-4">
	                  	<select class="form-control" name="nominee_gender" required="required">
		                  	<option>-Select Gender-</option>
		                  	<?php foreach ($gender as $key => $value) {
		                  		$sel = set_value('nominee_gender') == $value ? " selected" : "";
		                  		echo '<option value="'.$value.'" '.$sel.'>'.$value.'</option>';
		                  	}
		                  	?>
	                  	</select>
	                  	<?= form_error('nominee_gender'); ?>
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-42">Full Address</label>
	                <div class="col-sm-4">
	                  <input id="form-control-42" class="form-control" name="nominee_full_address" type="text" required="required" value="<?= set_value('nominee_full_address'); ?>">
	                  <?= form_error('nominee_full_address'); ?>
	                </div>
	              </div>

	              <div class="form-group">

	              	<label class="col-sm-2 control-label" for="form-control-212">Contact</label>
	                <div class="col-sm-4">
	                  <input id="form-control-212" class="form-control" name="nominee_contact" type="text" required="required" value="<?= set_value('nominee_contact'); ?>">
	                  <?= form_error('nominee_contact'); ?>
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-18">Signature</label>
	                <div class="col-sm-4">
	                  <input id="form-control-41" class="form-control" name="nominee_signature" type="file" required="required">
	                  <?= form_error('nominee_signature'); ?>
	                </div>

	              </div>
	             <!--  <div id="guarantor" style="display: none;">
		              <div class="divider divider-horizontal">
	                  	<div class="divider-content text-primary"><h4>GUARANTOR DETAIL</h4></div>
	                  </div>

	                  <div class="form-group">
		                <label class="col-sm-2 control-label" for="form-control-1">Guarantor Name</label>
		                <div class="col-sm-1">
		                  <select class="form-control" name="guarantor_title" required="required">
		                  	<option>-Title-</option>
		                  	<option value="Mrs.">Mr.</option>
		                  	<option value="Mrs.">Mrs.</option>
		                  	<option value="Dr.">Dr.</option>
		                  	<option value="Late">Late</option>
		                  </select>
		                  <?= form_error('guarantor_title'); ?>
		                </div>
		                <div class="col-sm-3">
		                  <input id="form-control-1" class="form-control" name="guarantor_name" type="text" required="required" value="<?= set_value('guarantor_name'); ?>">
		                  <?= form_error('guarantor_name'); ?>
		                </div>

		                <label class="col-sm-2 control-label" for="form-control-1">Guarantor Father Name</label>
		                <div class="col-sm-1">
		                  <select class="form-control" name="guarantor_father_title" required="required">
		                  	<option>-Title-</option>
		                  	<option value="Mrs.">Mr.</option>
		                  	<option value="Dr.">Dr.</option>
		                  	<option value="Late">Late</option>
		                  </select>
		                  <?= form_error('guarantor_father_title'); ?>
		                </div>
		                <div class="col-sm-3">
		                  <input id="form-control-1" class="form-control" name="guarantor_father_name" type="text" required="required" value="<?= set_value('guarantor_father_name'); ?>">
		                  <?= form_error('guarantor_father_name'); ?>
		                </div>
		              </div>

	                  <div class="form-group">

		              	<label class="col-sm-2 control-label" for="form-control-43">Address</label>
		                <div class="col-sm-4">
		                  <input id="form-control-43" class="form-control" name="guarantor_address" type="text" required="required" value="<?= set_value('guarantor_address'); ?>">
		                  <?= form_error('guarantor_address'); ?>
		                </div>

		                <label class="col-sm-2 control-label" for="form-control-18">Aadhar Number</label>
		                <div class="col-sm-4">
		                  <input id="form-control-44" class="form-control" name="guarantor_aadhar_no" type="text" required="required" value="<?= set_value('guarantor_aadhar_no'); ?>">
		                  <?= form_error('guarantor_aadhar_no'); ?>
		                </div>

		              </div>
		            </div>-->



                    <div class="divider divider-horizontal">
                      <div class="divider-content text-primary"><h4>AGENT DETAIL</h4></div>
                    </div>

	              <div class="form-group">
	                 <label class="col-sm-2 control-label" for="form-control-20">Agent Code</label>
	                <div class="col-sm-4">
	                  <select  class="form-control" id="agentCode" name="agentCode" >
	                	<option>- Select Code-</option>
	                	<?php $this->load->model('Agents');
	                		foreach ($agents as  $value):
	                			$userrow = $this->Agents->agentUsredata($value->loginID);?>
	                			<option value="<?php echo $value->id;?>"><?php echo $value->name."[".$value->agent_id."]";?></option>
							<?php	
	                		endforeach;
	                	?>
	                  </select>
	                  <?= form_error('branchID'); ?>
	                </div>

               
                



	                <label class="col-sm-2 control-label" for="form-control-38">Rank</label>
	                <div class="col-sm-4">
	                  <input  class="form-control" name="arank" id = "arank" type="text" required="required">
	                  <?= form_error('password'); ?>
	                </div>
	              </div>
	              
  <script> 
  	
				 $("#agentCode").change(function(){
               
		var date1 = $('#agentCode').val();
		
		$.post("<?php echo site_url('index.php/Customer/getRank') ?>", {date1 : date1}, function(data){
            $("#arank").val(data);
		});
		
   		 });</script>




 

	              <div class="divider divider-horizontal">
                  	<div class="divider-content text-primary"><h4>INVESTMENT PLAN DETAIL</h4></div>
                  </div>

                  <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-20">Branch</label>
	                <div class="col-sm-4">
	                  <select id="demo-select2-1" class="form-control" name="branchID" onchange="getComittee(this.value)" required="required">
	                	<option>- Select Branch -</option>
	                	<?php 
	                		foreach ($branch as $key => $value):
	                			echo '<option value="'.$value->id.'">'.$value->title.'</option>';
	                		endforeach;
	                	?>
	                  </select>
	                  <?= form_error('branchID'); ?>
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-21">Committee</label>
	                <div class="col-sm-4">
		                <select id="demo-select2-2" class="form-control" name="committee" required="required"></select>
	                  	<?= form_error('committee'); ?>
	                </div>
	              </div>

	              <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-22">Plan Name</label>
	                <div class="col-sm-4">
	                  <select id="demo-select2-3" class="form-control" name="planID" onchange="getPlan(this.value)" required="required">
	                	<option>- Select Plan -</option>
	                	<?php 
	                		foreach ($plans as $key => $value):
	                			echo '<option value="'.$value->id.'">'.$value->title.'</option>';
	                		endforeach;
	                		
	                	?>
	                  </select>
	                  <?= form_error('planID'); ?>
	                  <input type="hidden" id="planDetail" />
	                </div>

	                <label class="col-sm-2 control-label" id="durationTitle" for="form-control-1">Duration</label>
	                <div class="col-sm-4" id="durationSelect"></div>
	              </div>

	              <span id="fd" style="display: none;">
		              <div class="form-group">
		                <label class="col-sm-2 control-label" for="form-control-23">Investment Amount</label>
		                <div class="col-sm-4">
		                	<input id="form-control-23" class="form-control" name="investAmount-fd" type="number" onkeyup="calculateMeturity(this.value)" />
		                  <?= form_error('investAmount'); ?>
		                </div>

		                <label class="col-sm-2 control-label" for="form-control-24">Meturity Amount</label>
		                <div class="col-sm-4">
			                <input id="form-control-25" class="form-control" name="meturtyAmount-fd" type="number"/>
		                  <?= form_error('meturtyAmount'); ?>
		                </div>
		              </div>

		              <div class="form-group">
		                <label class="col-sm-2 control-label" for="form-control-26">Applied Interest Rate</label>
		                <div class="col-sm-4">
		                	<input id="form-control-26" readonly="true" name="appliedInterest-fd" class="form-control" type="text">
		                  <?= form_error('appliedInterest'); ?>
		                </div>
		              </div>

	              </span>

	              <span id="rd" style="display: none;">
		              <div class="form-group">
		                <label class="col-sm-2 control-label" for="form-control-27">Investment Monthly Amount</label>
		                <div class="col-sm-4">
		                	<input id="form-control-27" class="form-control" name="monthInvestAmount-rd" type="number" onkeyup="calculateMeturity(this.value)" />
		                  <?= form_error('monthInvestAmount'); ?>
		                </div>

		                <label class="col-sm-2 control-label" for="form-control-28">Total Amount</label>
		                <div class="col-sm-4">
			                <input id="form-control-28" class="form-control" name="investAmount-rd" type="number" />
		                  <?= form_error('meturtyAmount'); ?>
		                </div>
		              </div>

		              <div class="form-group">
		                <label class="col-sm-2 control-label" for="form-control-29">Meturity Amount</label>
		                <div class="col-sm-4">
		                	<input id="form-control-29" class="form-control" name="meturtyAmount-rd" type="text"/>
		                  <?= form_error('investAmount'); ?>
		                </div>
		                
		                <label class="col-sm-2 control-label" for="form-control-30">Applied Interest Rate</label>
		                <div class="col-sm-4">
		                	<input id="form-control-30" readonly="true" name="appliedInterest-rd" class="form-control" type="text">
		                  <?= form_error('appliedInterest'); ?>
		                </div>
		              </div>

		              
	              </span>

	              <span id="mip" style="display: none;">
		              <div class="form-group">
		                <label class="col-sm-2 control-label" for="form-control-31">Investment Amount</label>
		                <div class="col-sm-4">
		                	<input id="form-control-31" class="form-control" name="investAmount-mip" onkeyup="misCalculation(this.value)" type="number"/>
		                  <?= form_error('investAmount'); ?>
		                </div>

		                <label class="col-sm-2 control-label" for="form-control-32">Monthly Return Amount</label>
		                <div class="col-sm-4">
			                <input id="form-control-32" class="form-control" readonly="true" name="monthlyReturn-mip" type="text" />
		                  <?= form_error('monthlyReturn'); ?>
		                </div>
		              </div>

		              <div class="form-group">
		                <label class="col-sm-2 control-label" for="form-control-33">Meturity Amount</label>
		                <div class="col-sm-4">
		                	<input id="form-control-33" class="form-control" readonly="true" name="meturityAmount-mip" type="text"/>
		                  <?= form_error('meturityAmount'); ?>
		                </div>

		                <label class="col-sm-2 control-label" for="form-control-34">Applied Interest Rate</label>
		                <div class="col-sm-4">
		                	<input id="form-control-34" readonly="true" name="appliedInterest-mip" class="form-control" type="text">
		                  <?= form_error('appliedInterest'); ?>
		                </div>
		              </div>
		              
	              </span>

	              <span id="nps" style="display: none;">
		              <div class="form-group">
		                <label class="col-sm-2 control-label" for="form-control-1">Plan Amount</label>
		                <div class="col-sm-4">
		                	<select id="demo-select2-5"  class="form-control" name="planAMount-nps" onchange="getperMonthAmount(this.value)">
		                		<option>-Select Amount-</option>
		                		<option value="1">1000/Month</option>
		                		<option value="2">2000/Month</option>
		                		<option value="3">3000/Month</option>
		                		<option value="4">4000/Month</option>
		                		<option value="5">5000/Month</option>
		                  </select>
		                </div>

		                <label class="col-sm-2 control-label" for="form-control-1">Monthely Amount</label>
		                <div class="col-sm-4">
		                 <input id="monthAmount" readonly="true" class="form-control" name="monthAmount" type="text" />
		                  <?= form_error('monthAmount'); ?>
		                </div>
		              </div>		            

		              <div class="form-group">
		                <label class="col-sm-2 control-label" for="planDuration">Total Amount</label>
		                <div class="col-sm-4">
			                <input id="totalAmount" readonly="true" class="form-control" name="totalAmount-nps" type="text" />
		                  <?= form_error('totalAmount'); ?>
		                </div>

		                <label class="col-sm-2 control-label" for="form-control-36">5 Years Meturity Amount</label>
		                <div class="col-sm-4">
			                <input id="form-control-36" readonly="true" class="form-control" name="meturtyAmount-nps" type="text"/>
		                  <?= form_error('meturtyAmount'); ?>
		                </div>
		              </div>

		              <div class="form-group">
		                <label class="col-sm-2 control-label" for="investerAge">Invester Age</label>
		                <div class="col-sm-4">
		                	<input id="investerAge" class="form-control" readonly="true" name="investorAge-nps" type="text">
		                  <?= form_error('investorAge'); ?>
		                </div>

		                <label class="col-sm-2 control-label" for="form-control-34">Applied Interest Rate</label>
		                <div class="col-sm-4">
		                	<input id="form-control-341" readonly="true" name="appliedInterest-nps" class="form-control" type="text">
		                  <?= form_error('appliedInterest'); ?>
		                </div>
		              </div>
		              
	              </span>
	              
	              <span id="loan" style="display: none;">

		              <div class="form-group">
		                <label class="col-sm-2 control-label" for="planDuration">Total Amount Taken</label>
		                <div class="col-sm-4">
			                <input id="totalAmountLoan" class="form-control" name="totalAmount-loan" type="text" />
		                </div>

		                <label class="col-sm-2 control-label" for="form-control-36">Total Instalment</label>
		                <div class="col-sm-4">
			                <!-- <input id="totalInstalmentLoan" readonly="true" class="form-control" name="totlaInstalment" type="text"/> -->
			                <select id="totalInstalmentLoan" class="form-control" name="totalInstalment-loan" onchange="getInterestValue(this.value)"></select>
		                </div>
		              </div>

		              <div class="form-group">

		                <label class="col-sm-2 control-label" for="form-control-34">Applied Interest Rate</label>
		                <div class="col-sm-4">
		                	<input id="interestLoan" readonly="true" name="appliedInterest-loan" class="form-control" type="text">
		                </div>
		                
		                <label class="col-sm-2 control-label" for="form-control-34">Late Fee</label>
		                <div class="col-sm-4">
		                	<input id="lateFeeLoan" readonly="true" name="lateFee" class="form-control" type="text">
		                </div>
		                
		              </div>
		              
	              </span>

	              
	              <div class="divider divider-horizontal">
                  <div class="divider-content text-primary"><h4>LOGIN DETAIL</h4></div>
                </div>

	              <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-37">Username</label>
	                <div class="col-sm-4">
	                  <input id="form-control-37" class="form-control" name="username" type="text" required="required">
	                  <?= form_error('username'); ?>
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-38">Password</label>
	                <div class="col-sm-4">
	                  <input id="form-control-38" class="form-control" name="password" type="password" required="required">
	                  <?= form_error('password'); ?>
	                </div>
	              </div>
	               <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-37">Join Date</label>
	                <div class="col-sm-4">
	                  <input id="form-control-67" class="form-control" name="joindate" type="date" required="required" data-inputmask="'alias': 'yyyy-mm-dd'">
	                 
	                </div>

	                
	              </div>

	              <div class="form-group gutter-xs">
	                <label class="col-sm-2 control-label" for="form-control-1">&nbsp;</label>
	                <div class="col-sm-4 center">
	                  <input type="submit" value="Save Customer Detail" class="btn btn-primary">
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

<script type="text/javascript">

	function getComittee(branchID) {
		$.ajax({
			url: '<?= site_url() ?>comitteebybranch.html',
			method: "POST",
			data: {branchID: branchID},
			success: function(data){
				$(`#demo-select2-2`).html(JSON.parse(data).result.map(val => { return `<option value="${val.id}">${val.title}</option>` }).join(""))
			}
		})
	}

	function getPlan(planID) {
		$.ajax({
			url: '<?= site_url() ?>plans.html',
			method: "POST",
			data: {id: planID},
			success: function(data){

				let durationFlag = false

				$(`#planDetail`).val(data)

				if(planID == '1')
					$("#fd").removeAttr("style")
				else
					$("#fd").css("display", "none")

				if(planID == '2')
					$("#rd").removeAttr("style")
				else
					$("#rd").css("display", "none")

				if(planID == '3'){
					$("#nps").removeAttr("style")
					$("#durationTitle").html("Policy Age")

					let dob = $("#form-control-4").val()
					if(dob == ''){
						alert("Please provide (Date of Birth)-DOB first.")
						$("#form-control-4").focus()

						$("#nps").css("display", "none")
						$("#durationTitle").html("Duration")
						$("#demo-select2-3").val($("#demo-select2-3 option:first").val())

						durationFlag = true
					}
					else {
						dob = dob.split("-")
						const getAge = birthDate => Math.floor((new Date() - new Date(birthDate).getTime()) / 31556925994)
						let age = getAge(`${dob[2]}-${dob[1]}-${dob[0]}`)
						$("#investerAge").val(age) // 23

						if(parseInt(age) < 18) {
							alert("Candidate must be adult, age grater then 18.")
							$("#nps").css("display", "none")
							$("#durationTitle").html("Duration")
							$("#demo-select2-3").val($("#demo-select2-3 option:first").val())
							durationFlag = true
						}
					}

				}
				else{
					$("#nps").css("display", "none")
					$("#durationTitle").html("Duration")
				}
				
				
				if(planID == '5')
					$("#loan").removeAttr("style")
				else
					$("#loan").css("display", "none")

				if(planID == '3'){
					let options = `<option value="">-select Duration-</option>`
					let age = $("#investerAge").val()
					age = parseInt(age)

					if(parseInt(age) < 18){
						options += ``
					}
					else if(age >= 18 && age <= 25) {
						if(age == 25){
							options += `<option value="35">35</option><option value="42">42</option>`
						}
						else {
							options += `<option value="42">42</option>`
						}
					}
					else if(age >= 25 && age <= 30) {
						if(age == 30){
							options += `<option value="30">30</option><option value="35">35</option>`
						}
						else {
							options += `<option value="35">35</option>`
						}
					}
					else if(age >= 30 && age <= 35) {
						if(age == 35){
							options += `<option value="25">25</option><option value="30">30</option>`
						}
						else {
							options += `<option value="30">30</option>`
						}
					}
					else if(age >= 35 && age <= 40) {
						if(age == 40){
							options += `<option value="20">20</option><option value="25">25</option>`
						}
						else {
							options += `<option value="25">25</option>`
						}
					}
					else if(age >= 40 && age <= 45) {
						if(age == 45){
							options += `<option value="10">10</option><option value="20">20</option>`
						}
						else {
							options += `<option value="20">20</option>`
						}
					}
					else if(age >= 45 && age <= 50) {
							options += `<option value="10">10</option>`
					}
					else {
						options += `<option value="">Not eligble for plan, you are over-age.</option>`
					}

					let select = `<select id="demo-select2-4" class="form-control" name="duration" onchange='getAppliedInterestRate(this.value);'>${options}</select>`
					$(`#durationSelect`).html(select)

					if(durationFlag)
						$(`#durationSelect`).html('')
				}
				else if(planID == '5'){
				    let options = `<option value="">-Select Plan-</option>`;
				    options += JSON.parse(data).result.map(val => { return `<option value='${val.id}'>${val.name}</option>` }).join("");
				    let select = `<select id="demo-select2-4" class="form-control" name="duration" onchange='getAppliedInterestRate(this.value);'>${options}</select>`;
					$(`#durationSelect`).html(select);
				}
				else {
					let options = `<option value="">-select Duration-</option>`
					options += JSON.parse(data).result.map(val => { return `<option value='${val.duration}'>${val.duration} Years</option>` }).join("")
					let select = `<select id="demo-select2-4" class="form-control" name="duration" onchange='getAppliedInterestRate(this.value);'>${options}</select>`
					$(`#durationSelect`).html(select)
				}

			}
		})
	}

	function getperMonthAmount(plan) {
		
				var durationTitle = $("#demo-select2-4").val();
				//alert(durationTitle);
		$.post("<?php echo site_url('customer/getmonthAmount') ?>",{durationTitle : durationTitle,plan : plan},function(data){
			//getElementById("section").value()=data;
			$("#monthAmount").val(data);
			getNpsDetail(data)
		
		});
	}

	function getNpsDetail(amountPerMonth) {
		let planData = JSON.parse(document.getElementById(`planDetail`).value)
		let duration = $("#demo-select2-4").val()
		let totalDurationMonth = parseInt(duration) * 12
		let totalAmt = totalDurationMonth * parseInt(amountPerMonth)
		$("#totalAmount").val(totalAmt)
		$("#form-control-36").val(((totalAmt * 38) / 100) + totalAmt)
		$("#form-control-341").val("38%")
	}

	function getAppliedInterestRate(duration) {
		let plan = document.getElementById('demo-select2-3').value
		let planData = JSON.parse(document.getElementById(`planDetail`).value)

		if(plan == '1') {
			let intrestRate = planData.result.filter(val => { return val.duration == duration })
			$("#form-control-26").val(`${intrestRate[0].percentage}%`)
			if($("#form-control-23").val() != "") {
				let investAmount = $("#form-control-23").val()
				let appliedInterest = document.getElementById(`form-control-26`).value.split("%")[0]
				$("#form-control-25").val(((parseFloat(investAmount) * parseFloat(appliedInterest))/100) + parseFloat(investAmount))
			}
		}

		if(plan == '2') {
			let intrestRate = planData.result.filter(val => { return val.duration == duration })
			$("#form-control-30").val(`${intrestRate[0].intrastRate}%`)
			if($("#form-control-27").val() != '') {
				let investAmount = $("#form-control-27").val()
				let appliedInterest = document.getElementById(`form-control-30`).value.split("%")[0]
				let totalAMount = (parseFloat(duration) * 12) * parseFloat(investAmount)
				$("#form-control-28").val(totalAMount)
				$("#form-control-29").val( ((totalAMount * parseFloat(appliedInterest)) / 100) + totalAMount )
			}
		}

		if(plan == '4') {
		    	
			let intrestRate = planData.result.filter(val => { return val.duration == duration })
			$("#form-control-34").val(`${intrestRate[0].meturityInterest}%`)
			if($("#form-control-31").val() != '') {
				let investAmount = $("#form-control-31").val()
				let appliedInterest = document.getElementById(`form-control-34`).value.split("%")[0]
				if(duration==7.5){
				  $("#form-control-32").val(((investAmount * 2) / 100))  
				}
					if(duration==11.5){
				  $("#form-control-32").val(((investAmount * 3) / 100))  
				}
					if(duration==16.0){
				  $("#form-control-32").val(((investAmount * 4) / 100))  
				}
				
				$("#form-control-33").val( ((investAmount * parseFloat(appliedInterest)) / 100) + investAmount )
			}
		}
		
		if(plan == '5') {
		    let intrestRate = planData.result.filter(val => { return val.id == duration });
		    console.log(intrestRate);
		    $('#lateFeeLoan').val(intrestRate[0].lateFee);
		    let options = JSON.parse(intrestRate[0].instalments);
		    
		    options = options.map(val => { return `<option value='${val.instalment}'>${val.instalment}</option>` });
		    
		    $('#totalInstalmentLoan').html(`<option value=''>-select instalment-</option>\n` + options.join('\n'));
            
		}

	}
	
	function getInterestValue(valu) {
	    let planData = JSON.parse(document.getElementById(`planDetail`).value);
	    let duration = $('#demo-select2-4').val();
	    let intrestRate = planData.result.filter(val => { return val.id == duration });
	    let options = JSON.parse(intrestRate[0].instalments);
	    valu = $('#totalInstalmentLoan').val();
	    let intres = options.filter(val => { 
	        return val.instalment == valu
	    });
	    $('#interestLoan').val(intres[0].interest);
	}

	function misCalculation(investAmount) {
		investAmount = parseInt(investAmount)
		let appliedInterest = document.getElementById(`form-control-34`).value.split("%")[0]
		$("#form-control-32").val(((investAmount * 2) / 100))
		$("#form-control-33").val( ((investAmount * parseFloat(appliedInterest)) / 100) + investAmount )
	}

	function calculateMeturity(investAmount) {
		let plan = document.getElementById('demo-select2-3').value
		let appliedInterest = document.getElementById(`form-control-26`).value.split("%")[0]

		if(plan == '1') {
			$("#form-control-25").val(((parseFloat(investAmount) * parseFloat(appliedInterest))/100) + parseFloat(investAmount))
		}

		if(plan == '2') {
			let duration = $("#demo-select2-4").val()
			let appliedInterest = document.getElementById(`form-control-30`).value.split("%")[0]
			let totalAMount = (parseFloat(duration) * 12) * parseFloat(investAmount)
			$("#form-control-28").val(totalAMount)
			$("#form-control-29").val( ((totalAMount * parseFloat(appliedInterest)) / 100) + totalAMount )
		}
	}
</script>
