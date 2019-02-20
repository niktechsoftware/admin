<div class="layout-content">
	<div class="layout-content-body">
	  <div class="row gutter-xs">
	    <div class="col-md-6">
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
	          <strong>Role</strong>
	        </div>
	        <div class="card-body">

	          <div class="demo-form-wrapper">
	            <form  id="demo-inputmask" class="form form-horizontal" onsubmit="return true;">

	              <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-1">Branch</label>
	                <div class="col-sm-6">
	                  	<select id="demo-select2-1" class="form-control" name="branchID" onchange="getRoleList(this.value)" required="required">
		                	<option>- Select Branch -</option>
		                	<?php 
		                		foreach ($branch as $key => $value):
		                			echo '<option value="'.$value->id.'">'.$value->title.'</option>';
		                		endforeach;
		                	?>
		                </select>
	                </div>
	              </div>
	              <div class="form-group">
	                <label class="col-sm-2 control-label" for="form-control-1">Role Title</label>
	                <div class="col-sm-6">
	                  <input id="form-control-1" class="form-control" name="title" type="text" required="required">
	                  <input id="roleID" type="hidden">
	                </div>
	              </div>


	              <div class="form-group gutter-xs">
	                <label class="col-sm-2 control-label" for="form-control-1">&nbsp;</label>
	                <div class="col-sm-4 center">
	                  <input type="submit" id="buttonRole" value="Save Role" class="btn btn-primary" onclick="setRole();">
	                </div>
	              </div>

	            </form>
	          </div>

	        </div>
	      </div>
	    </div>

	    <div class="col-md-6">
	      <div class="card">
	        <div class="card-header">
	          <strong>Role List</strong>
	        </div>
	        <div class="card-body">

	          	<table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Role Title</th>
                      <th>Settings</th>
                    </tr>
                  </thead>
                  <tbody id="roleList"></tbody>
                </table>

	        </div>
	      </div>
	    </div>

	  </div>
	</div>
</div>

<script type="text/javascript">

	function getRoleList(branchID) {
		$.ajax({
			url: '<?= site_url() ?>role.html',
			method: "GET",
			data: {branchID: branchID},
			success: function(data){
				let response = JSON.parse(data).map((val, idx) => {
					return `<tr>
						<td>${idx + 1}</td>
						<td>${val.title}</td>
						<td><button class="btn btn-primary" onclick="edit(${val.id}, ${val.branchID}, '${val.title}')">Edit</button></td>
					</tr>`
				}).join()
				$('#roleList').html(response)
			}
		})
	}

	function setRole() {
		let branchID = $('#demo-select2-1').val()
		let title 	 = $('#form-control-1').val()

		$.ajax({
			url: '<?= site_url() ?>role.html',
			method: 'POST',
			data: {
				"branchID": branchID, 
				"title": title,
				"edit": false
			},
			success: function(data) {
				$('#form-control-1').val('')
				alert(data)
				let response = JSON.parse(data).map((val, idx) => {
					return `<tr>
						<td>${idx + 1}</td>
						<td>${val.title}</td>
						<td><button class="btn btn-primary" onclick="edit(${val.id}, ${val.branchID}, '${val.title}')">Edit</button></td>
					</tr>`
				}).join()
				$('#roleList').html(response)
			}
		})
	}

	function updateRole() {
		let branchID = $('#demo-select2-1').val()
		let title 	 = $('#form-control-1').val()
		let roleID 	 = $('#roleID').val()

		$.ajax({
			url: '<?= site_url() ?>role.html',
			method: 'POST',
			data: {
				"branchID": branchID, 
				"title": title,
				"edit": true,
				"id": roleID
			},
			success: function(data) {

				$('#form-control-1').val('')
				$("#buttonRole").val("Save Role")
				$("#buttonRole").attr("onclick","setRole()")

				let response = JSON.parse(data).map((val, idx) => {
					return `<tr>
						<td>${idx + 1}</td>
						<td>${val.title}</td>
						<td><button class="btn btn-primary" onclick="edit(${val.id}, ${val.branchID}, '${val.title}')">Edit</button></td>
					</tr>`
				}).join()
				$('#roleList').html(response)
			}
		})
	}

	function edit(roleID, branchID, title){
		$('#demo-select2-1').val(branchID)
		$('#form-control-1').val(title)
		$('#roleID').val(roleID)
		$("#buttonRole").val("Edit Role")
		$("#buttonRole").attr("onclick","updateRole()")
	}
	
</script>
