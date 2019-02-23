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
	          <strong>Edit Committee Detail </strong>
	        </div>
	        <div class="card-body">

<?php 
foreach ($commit as  $value){
	 $id=$value->id;
     $branchid=$value->branchID;
     $branchid1=$value->employeeID;
         $this->db->where('id',$branchid);
           $data=$this->db->get('branch')->row();

            $this->db->where('id',$branchid1);
           $data1=$this->db->get('employee')->row();

?>

            <div class="card-body">
	          
	          <div class="demo-form-wrapper">
	      <form class="form form-horizontal" action="<?php echo base_url();?>Settings/updatecommitee" method="post" >
   <label class="col-sm-2 control-label" for="form-control-1">Committee Title</label>
     <div class="col-sm-4">
   <input type="text" class="form-control" name="ctitle" value="<?php echo $value->title?>">
    </div><br><br>
     <label class="col-sm-2 control-label" for="form-control-1">Branch Name</label>
	                <div class="col-sm-4">
<input type="text"  class="form-control" readonly  name="branchname" value="<?php echo $data->title?>">
</div><br><br>
<label class="col-sm-2 control-label" for="form-control-1">Empolyee Name</label>
	                <div class="col-sm-4">
<input type="text"  class="form-control" readonly name="Employeename" value="<?php echo $data1->name?>">
</div><br><br>
 <label class="col-sm-2 control-label" for="form-control-1">Date</label>
	                <div class="col-sm-4">
<input type="date" class="form-control"  name="date" value="<?php echo $value->created?>">
</div><br><br>

   
	                  <div class="col-sm-2"></div>
	                  <div class="col-sm-2">
	             <center><input class="btn btn btn-info form-control"  type="submit"></center>
	                
	                </div><br><br>
      <input type="hidden" name="id" value="<?php echo  $id ?>">
   


</form>
<?php } ?>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
