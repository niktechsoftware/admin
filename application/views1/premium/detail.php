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
			  <strong>Premium Detail</strong>
			</div>
			<div class="card-body">
			  
			  <div class="demo-form-wrapper">
				  <div class="form-group">
					<label class="col-sm-1 control-label" for="form-control-1">CustomerID</label>
					<div class="col-sm-2">
						<input id="CustomerID" class="form-control" type="text" required="required">
					</div>
					<button class="btn btn-primary col-sm-2" onclick="getPlanList()">Get Plan Detail</button>
				  </div>
			  </div>
			</div>
		  </div>
		</div>
		<div class="col-md-12" id="planDetail" style="display: none;">
          <div class="card">
            <div class="card-header">
               <div class="card-actions" style="top: 35%;">
				<a class="btn btn-sm btn-labeled arrow-success" onclick="addPlan();" href="#">
				  <span class="btn-label">
					<span class="icon icon-plus-square icon-lg icon-fw"></span>
				  </span>
				  Add Plan
				</a>
			  </div>
              <strong>Plan List Associated with given Customer-ID</strong>
            </div>
            <div class="card-body" data-toggle="match-height">

            	<div class="row">
            		<div class="col-sm-10">
            			<div class="demo-form-wrapper">
				            <form id="demo-inputmask" class="form form-horizontal" method="post" enctype="multipart/form-data">
				            	<div class="form-group">
				                <label class="col-sm-2 control-label" for="form-control-1">Name</label>
				                <div class="col-sm-2" id="cname"></div>

				                <label class="col-sm-2 control-label" for="form-control-2">Father Name</label>
				                <div class="col-sm-2" id="fname"></div>

				                <label class="col-sm-2 control-label" for="form-control-3">Mother Name</label>
				                <div class="col-sm-2" id="mname"></div>
				              </div>

				              <div class="form-group">
				                <label class="col-sm-2 control-label" for="form-control-8">Address</label>
				                <div class="col-sm-2" id="caddress"></div>

				                <label class="col-sm-2 control-label" for="form-control-14">Mobile</label>
				                <div class="col-sm-2" id="cmobile"></div>

				                <label class="col-sm-2 control-label" for="form-control-15">Email</label>
				                <div class="col-sm-2" id="cemail"></div>
				              </div>
				            </form>
				          </div>
            		</div>
            		<div class="col-sm-2" id="cimg"></div>
            	</div>
              <table class="table table-hover table-bordered">
                <thead>
                  <tr>
                    <th class="text-left">Policy ID</th>
                    <th class="text-center">Title</th>
                    <th class="text-center">Branch</th>
                    <th class="text-center">Committee</th>
                    <th class="text-center">Year</th>
                    <th class="text-center">Month</th>
                    <th class="text-center">Actions</th>
                  </tr>
                </thead>
                <tbody id="PolicyList"></tbody>
              </table>
            </div>
          </div>
        </div>
	  </div>
	</div>
</div>

<script type="text/javascript">
	function getPlanList() {
		$.ajax({
			url: '<?= site_url() ?>premiumlist.html',
			method: "POST",
			data: {customerID: $('#CustomerID').val()},
			success: function(data){

				data = JSON.parse(data)
				if(data.success) {

					$("#planDetail").removeAttr("style")
					let created = new Date(data.customer.created)
					let join = String(created.getFullYear()).split('0')[1]
					join += String(created.getMonth() + 1).length == 1 ? '0' + String(created.getMonth() + 1) : String(created.getMonth() + 1)
					join += String(created.getDate()).length == 1 ? '0' + created.getDate() : created.getDate()

					$('#cname').html(data.customer.name)
					$('#fname').html(data.customer.fatherName)
					$('#mname').html(data.customer.motherName)
					$('#caddress').html(data.customer.address)
					$('#cmobile').html(data.customer.mobile)
					$('#cemail').html(data.customer.email)
					$('#cimg').html(`<img src="<?= base_url() ?>assets/images/customer/${data.customer.image ? data.customer.image : 'male.jpeg'}" width="100" />`)

					let list = data.investmentDetail.map((val, counter) => { 
						return `<tr>
	                    <td class="text-center">${join}P${val.id}</td>
	                    <td class="text-center">${val.title}</td>
	                    <td class="text-center">${val.branchTitle}</td>
	                    <td class="text-center">${val.committeeTitle}</td>
	                    <td class="text-center">${val.durationYear ? val.durationYear : 'N/A'}</td>
	                    <td class="text-center">${val.durationMonth ? val.durationMonth : 'N/A'}</td>
	                    <td>
	                    	<a href="<?= base_url() ?>printcertificate/${val.id}.html" target="__blank" class="btn btn-primary">
	                    		<span class="icon icon-print icon-lg"></span>
	                    	</a>
	                    	&emsp;
	                    	<a href="<?= base_url() ?>policydetail/${val.id}.html" class="btn btn-primary">
	                    		<span class="icon icon-wpforms icon-lg"></span>
	                    	</a>
	                    </td>
						        </tr>`
					}).join()
					$('#PolicyList').html(list)

				}
				else {
					$("#CustomerID").val("")
					$("#planDetail").css("display", "none")

					toastr.options = {
					  "closeButton": true,
					  "progressBar": true,
					  "positionClass": "toast-top-center"
					}
					Command: toastr["error"]("Sorry ! Please enter valid customerID.", "Incorrect CustomerID")
				}
			},
			error: function(error) {
				$("#CustomerID").val("")
				$("#planDetail").css("display", "none")

				toastr.options = {
				  "closeButton": true,
				  "progressBar": true,
				  "positionClass": "toast-top-center"
				}
				Command: toastr["error"]("Sorry ! Please enter valid customerID.", "Incorrect CustomerID")
			}
		})
	}
</script>
