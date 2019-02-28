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
	          <strong>New Commitee</strong>
	        </div>
	        <div class="card-body">

	          <div class="demo-form-wrapper">
	            <form  id="demo-inputmask" class="form form-horizontal" method="post">

	              <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-1">Committee Title</label>
	                <div class="col-sm-4">
	                  <input id="form-control-1" class="form-control" name="title" type="text" required="required" value="<?= set_value('title'); ?>">
	                  <?= form_error('title'); ?>
	                </div>

	                <label class="col-sm-2 control-label" for="form-control-1">Branch</label>
	                <div class="col-sm-4">
		                <select id="demo-select2-1" class="form-control" name="branchID" onchange="getEmployee(this.value)" required="required">
		                	<option>- Select Branch -</option>
		                	<?php 
		                		foreach ($branch as $key => $value):
		                			echo '<option value="'.$value->id.'">'.$value->title.'</option>';
		                		endforeach;
		                	?>
		                </select>
	                  	<?= form_error('branchID'); ?>
	                </div>
	              </div>

	              <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-1">Committee Admin</label>
	                <div class="col-sm-4">
		                <select id="demo-select2-2" class="form-control" name="employeeID" required="required"></select>
	                  <?= form_error('employeeID'); ?>
	                </div>
	              </div>

	              <div class="form-group gutter-xs">
	                <label class="col-sm-2 control-label" for="form-control-1">&nbsp;</label>
	                <div class="col-sm-4 center">
	                  <input type="submit" value="Save Commitee" class="btn btn-primary">
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
	function getEmployee(branchID) {
		$.ajax({
			url: '<?= site_url() ?>employebybranch.html',
			method: "POST",
			data: {branchID: branchID},
			success: function(data){
				$(`#demo-select2-2`).html(JSON.parse(data).result.map(val => { return `<option value="${val.id}">${val.name} - (${val.fatherName})</option>` }).join(""))
			}
		})
	}
</script>
