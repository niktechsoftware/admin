<!-- <div class="layout-content">
	<div class="layout-content-body">
	    <div class="row gutter-xs">
		    <div class="col-xs-12">

                            <div class="panel panel-white">
                                <div class="panel-body">
                                    <form class="form-horizontal" action="<?php echo base_url()?>Accounts/dbkdetail" method="post" enctype="multipart/form-data">
                                        <div class="form-group col-sm-10">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Start Date</label>
                                            <div class="col-sm-4">
                                                <input type="date" name="sdt" class="form-control date-picker" placeholder="Start Date" required="required">
                                            </div>
                                            <label for="inputEmail3" class="col-sm-2 control-label">End Date</label>
                                            <div class="col-sm-4">
                                                <input type="date" name="edt" class="form-control date-picker" placeholder="End Date" required="required">
                                            </div>
                                        </div>
                                         <div class="form-group col-sm-2">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" id="btn1" class="btn btn-success">Get Detail</button>
                                            </div>
                                        </div>
                                      </form>
                                    </div>
                                  </div>

                                  
                            
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
                        <strong>Daybook Transactions</strong>
                    </div>
                    <div class="card-body">
                      <div class="panel">
            <div class="panel-heading alert alert-info">
                <h4 class="panel-title">Day Book Record </h4>
            </div>
            <div class="panel-body">
                <form action="#" method="post" role="form" id="form">
            
                <div class="row"> 
                     <div class="col-md-12 space20">
                         <div class="col-md-6">
                            <div class="col-md-3">
                                 Start Date</div>
                                 <div class="col-md-3">
                                 <input type="date" data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control form-group date-picker" name="st_date" style="width:180px; height:30px;">
                                </div>
                        </div>
                        <div class="col-md-6">
                             <div class="col-md-3 ">
                                 End Date
                            </div>
                            <div class="col-md-3 ">
                                <input type="date" data-date-format="yyyy-mm-dd" data-date-viewmode="years" class="form-control form-group date-picker" name="end_date" style="width:180px; height:30px;">
                            </div>
                        </div>               
                    </div>   
                </div>
                <div class="row">
                     <div class="col-md-12 space20">
                        <div class="col-md-4">
                                <input type="checkbox" name="check_list" class="form-group"  value="all" id="all">
                                 All
                        </div>
                        <div class="col-md-4">
                                <input type="checkbox" name="check_list" class="form-group" value="Fee Deposit" id="fd">
                                 Fixed Deposit(FD)
                        </div>
                        <div class="col-md-4">
                                <input type="checkbox" name="check_list" class="form-group" value="From sale Stock" id="rd">
                               Recurring Deposit(RD) 
                        </div>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-md-12 space20">
                        <div class="col-md-4">
                                <input type="checkbox" name="check_list" class="form-group" value="Recieve From Bank" id="mis">
                              Management Information System(MIS)
                        </div>
                         <div class="col-md-4">
                                <input type="checkbox" name="check_list" class="form-group" value="Recieve From Bank" id="nps">
                              National Pension System(NPS)
                        </div>
                         <div class="col-md-4">
                                <input type="checkbox" name="check_list" class="form-group" value="Recieve From Bank" id="loan">
                             Loan
                        </div>
                        </div>
                    </div>
                        <div class="col-md-3">
                                <input type="radio" name="check_list" class="form-group" value="Admission Fee + 1 Month Fee">
                                Admission + 1 Month Fee
                        </div>
                    </div>
                 </div>     
                <div class="row">
                     <div class="col-md-12 space20">
                        <div class="col-md-2">
                                <input type="radio" name="check_list" class="form-group" value="Recieve From Director">
                                Receive From Director
                        </div>
                        <div class="col-md-2">
                                <input type="radio" name="check_list" class="form-group" value="Cash Payment">
                                 Cash Payment
                        </div>
                        <div class="col-md-2">
                                <input type="radio" name="check_list" class="form-group" value="By Salary">
                                Salary
                        </div>
                        <div class="col-md-2">
                                <input type="radio" name="check_list" class="form-group" value="Diposit in Bank">
                                 Bank Deposite
                        </div>
                        <div class="col-md-3">
                                <input type="radio" name="check_list" class="form-group" value="Diposit to Director">
                                Handover To Director
                        </div>
                    </div>
                     <div class="row">
                     <div class="col-md-12 space20">
                     <div style="color: red;">                   </div> 
                     </div>
                </div>
                </div>      
                  <div class="row">
                     <div class="col-md-12 space20">
                        <div class="col-md-2">
                            <label class="radio-inline">
                            
                                <div class="iradio_minimal-grey" style="position: relative;"><input type="radio" class="grey" value="Debit" name="value1" required="required" style="position: absolute; top: -10%; left: -10%; display: block; width: 120%; height: 120%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -10%; left: -10%; display: block; width: 120%; height: 120%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                            Debit</label>
                        </div>
                        <div class="col-md-2">
                            <label class="radio-inline">
                            
                                <div class="iradio_minimal-grey" style="position: relative;"><input type="radio" class="grey" value="Credit" name="value1" required="required" style="position: absolute; top: -10%; left: -10%; display: block; width: 120%; height: 120%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -10%; left: -10%; display: block; width: 120%; height: 120%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                            Credit</label>
                        </div>  
                        <div class="col-md-2">
                            <label class="radio-inline">
                            
                                <div class="iradio_minimal-grey" style="position: relative;"><input type="radio" class="grey" value="Both" name="value1" required="required" style="position: absolute; top: -10%; left: -10%; display: block; width: 120%; height: 120%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -10%; left: -10%; display: block; width: 120%; height: 120%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                            Both</label>
                        </div>  
                
                </div>
                </div>  
                <div class="row">
                     <div class="col-md-6">
                        <div class="col-md-4">
                                <input type="submit" name="dbd" value="Get Day Book Detail" class=" btn btn-success">
                        </div>
                    </div>
                 </div>     
                 </form>
            </div>
        </div>

        <div class="card-body" id="pop">
                  <div class="card-body" data-toggle="match-height">
                     <div class=" panel-scroll table-responsive">
                    <table class="table table-striped table-hover center" id="daybookdetail">
                      <thead>
                        <tr>
                          <th>Customer ID</th>
                          <th></th>
                          <th>Father</th>
                          <th>Status</th>
                          <th>Address</th>
                          <th>Mobile</th>
                          <th>Email</th>
                          <th>Aadhar No</th>
                          <th>Created</th>
                          <th>Detail</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                         <?php foreach ($employes as $value){ ?>
                          <tr>
                              <td><?php echo $value->id?></td>
                              <td><?php echo $value->customer_ID?></td>
                          </tr>
                          <?php 
                         } ?>
                      </tbody>




                  </table>
              </div>
          </div>
      </div>
                        <!-- <table id="demo-datatables-5" class="table table-striped table-bordered table-nowrap dataTable" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Customer_ID</th>
                                    <th>Amount</th>
                                    <th>Debit/Credit</th>
                                    <td>Source</td>
                                    <th>Transaction Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    foreach ($daybook as $key => $value):
                                        echo "<tr>";

                                        echo "<td>".$value->id."</td>";
                                        echo "<td>".$value->customer_ID."</td>";
                                        echo "<td>".$value->amount."</td>";
                                        echo "<td>".$value->transactionType."</td>";
                                        echo "<td>".$value->source."</td>";
                                        echo "<td>".$value->created."</td>";
                                        echo "</tr>";
                                    endforeach;
                                ?>
                            </tbody>
                        </table> -->
                    <!-- </div>
                </div>
            </div>
	    </div>
	</div>
</div> --> 


<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 10px 10px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}

/* Style the close button */
.topright {
  float: right;
  cursor: pointer;
  font-size: 28px;
}

.topright:hover {color: red;}
</style>

<div class="layout-content"><div class="layout-content-body">
<h2 class="text-primary"><center>Daybook</center></h2>


<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'all')" id="defaultOpen">ALL</button>
  <button class="tablinks" onclick="openCity(event, 'fd')"> Fixed Deposit(FD)</button>
  <button class="tablinks" onclick="openCity(event, 'rd')">Recurring Deposit(RD)</button>
  <button class="tablinks" onclick="openCity(event, 'mis')"> Monthly Investment Plan (MIS)</button>
  <button class="tablinks" onclick="openCity(event, 'nps')">Adhaarshila National Pension Severs(NPS)</button>
  <button class="tablinks" onclick="openCity(event, 'loan')">Loan</button>
</div>
<?php if(($this->session->userdata("isAdmin")==1)):?>
<div id="all" class="tabcontent">
  <span onclick="this.parentElement.style.display='none'" class="topright">&times </span>
  <h3 class="text-primary"><center>All Daybook Transection </center></h3>
  
  <?php 
 $da=$this->db->get("daybook")->result();
   
  ?>
                   <div class="panel-scroll table-responsive">
                    <table class="table table-striped table-hover center" id="alle">
                      <thead>
                        <tr>
                            <td>CustomerID</td>
                            <td>Amount</td>
                            <td>Transaction Type</td>
							              <td>Source</td>
                            <td>Updated</td>
                            <td>Created</td>
                            <td>Invoice No.</td>
                        </tr>
                    </thead>
                    <tbody>
                     <?php foreach($da as $data){ ?>
                       <tr>
					        <td><?php echo $data->customer_ID; ?></td>
                            <td><?php echo $data->amount; ?></td>
                            <td><?php echo $data->transactionType; ?></td>
                            <td><?php echo $data->source; ?></td>
                            <td><?php echo $data->updated; ?></td>
                            <td><?php echo $data->created; ?></td>
                            <td><?php echo $data->invoice_no; ?></td>
                        </tr>
                        <?php
                               }?>
                    </tbody>
                </table>
            </div>
</div>

<div id="fd" class="tabcontent">
  <span onclick="this.parentElement.style.display='none'" class="topright">&times </span>
  <h3 class="text-primary"><center>All FD Transactions</center></h3>
  
      <div class="panel-scroll table-responsive">
                    <table class="table table-striped table-hover center" id="fdv">
                     <thead>
                        <tr>
                            <td>CustomerID</td>
                            <td>Depositer Name</td>
                            <td>Premium Amount</td>
                            <td>Paid</td>
                            <td>Pay Mode</td>
                            <td>Paid Date</td>
                            <td>Invoice Slip</td>
                            <td>Status</td>
                             </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($detail as $fd){ ?>
                        <tr>
                            <td><?php echo $fd->customerID; ?></td>
                            <td><?php echo $fd->depositorName; ?></td>
                            <td><?php echo $fd->premiumAmount; ?></td>
                            <td><?php echo $fd->paid; ?></td>
                            <td><?php echo $fd->payMode; ?></td>
                            <td><?php echo $fd->paid_date; ?></td>
                            <td><?php echo $fd->invoice_slip; ?></td>
                            <td><?php echo $fd->status; ?></td>
                        </tr>
                        <?php
                         }?>
                    </tbody>
                </table>
				
            </div>
</div>

<div id="rd" class="tabcontent">
  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
  <h3 class="text-primary"><center>All RD Transactions</center></h3>
 
  <?php 
   $rd=$this->db->get("rdDetail")->result();

  ?>
   <div class=" panel-scroll table-responsive">
                    <table class="table table-striped table-hover center" id="rdev">
                      <thead>
                        <tr>
                            <td>customerID</td>
                            <td>Depositer Name</td>
                            <td>Paid</td>
                            <td>Pay Mode</td>
                            <td>Paid Date</td>
                            <td>Invoice Slip</td>
                            <td>Status</td>
                             <td>Duration</td>

                        </tr>
                    </thead>
                    <tbody>
                       <?php foreach ($rd as $rde){ ?>
                          <tr>
                              <td><?php echo $rde->customerID?></td>
                              <td><?php echo $rde->depositorName?></td>
                              <td><?php echo $rde->paid?></td>
                              <td><?php echo $rde->payMode?></td>
                              <td><?php echo $rde->paid_date?></td>
                              <td><?php echo $rde->invoice_slip?></td>
                              <td><?php echo $rde->status?></td>
                              <td><?php echo $rde->status?></td>
                          </tr>
                          <?php 
                         } ?>
                    </tbody>
                </table>
            </div>


</div>
<div id="mis" class="tabcontent">
  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
  <h3 class="text-primary"><center>All MIS Transactions</center></h3>
 <?php 
$mis=$this->db->get("misDetail")->result();
 ?>
 <div class=" panel-scroll table-responsive">
                    <table class="table table-striped table-hover center" id="misd">
                      <thead>
                        <tr>
                            <td>customerID</td>
                            <td>Depositer Name</td>
                            <td>Premium Amount</td>
                            <td>Paid</td>
                            <td>Pay Mode</td>
                            <td>Paid Date</td>
                            <td>Invoice Slip</td>
                            <td>Status</td>
                            <td>Remaining Months</td>
                             

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($mis as $data1){ ?>
                        <tr>
                           <td><?php echo $data1->customerID?></td>
                           <td><?php echo $data1->depositorName?></td>
                           <td><?php echo $data1->premiumAmount?></td>
                           <td><?php echo $data1->paid?></td>
                           <td><?php echo $data1->payMode?></td>
                           <td><?php echo $data1->paid_date?></td>
                           <td><?php echo $data1->invoice_slip?></td>
                           <td><?php echo $data1->status?></td>
                           <td><?php echo $data1->remaining_months?></td> 
                        </tr>
                        <?php
                    }?>
                    </tbody>
                </table>
            </div>
</div>
<div id="nps" class="tabcontent">
  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
  <h3 class="text-primary"><center> All NPS Transactions</center></h3>
  
  <?php
$np=$this->db->get("npsDetail")->result();
  ?>
  <div class=" panel-scroll table-responsive">
                    <table class="table table-striped table-hover center" id="npsv">
                      <thead>
                        <tr>
                            <td>customerID</td>
                            <td>Depositer Name</td>
                            <td>Premium Amount</td>
                            <td>Paid</td>
                            <td>Pay Mode</td>
                            <td>Paid Date</td>
                            <td>Invoice Slip</td>
                            <td>Status</td>
                            <td>Remaining Months</td>
                             

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($np as $nps){ ?>
                        <tr>
                            <td><?php echo $nps->customerID ?></td>
                            <td><?php echo $nps->depositorName ?></td>
                            <td><?php echo $nps->premiumAmount ?></td>
                            <td><?php echo $nps->paid ?></td>
                            <td><?php echo $nps->payMode ?></td>
                            <td><?php echo $nps->paid_date ?></td>
                            <td><?php echo $nps->invoice_slip ?></td>
                            <td><?php echo $nps->status ?></td>
                            <td><?php echo $nps->remaining_months?></td>
                        </tr>
                        <?php 
                    }?>
                    </tbody>
                </table>
            </div>

</div>
<div id="loan" class="tabcontent">
  <span onclick="this.parentElement.style.display='none'" class="topright">&times </span>
  <h3 class="text-primary"><center>All Loan Transactions</center></h3>
  <?php
$ln=$this->db->get("loanDetail")->result();

  ?>
   <div class=" panel-scroll table-responsive">
                   
				 <table class="table table-striped table-hover center" id="ln">
                      <thead>
                        <tr>
                            <td>customerID</td>
                            <td>Depositer Name</td>
                            <td>Premium Amount</td>
                            <td>Paid</td>
                            <td>Pay Mode</td>
                            <td>Paid Date</td>
                            <td>Invoice Slip</td>
                            <td>Status</td>
                            <td>Remaining Months</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($ln as $lnd ){ ?>
                        <tr>
                            <td><?php echo $lnd->customerID; ?></td>
                            <td><?php echo $lnd->depositorName; ?></td>
                            <td><?php echo $lnd->premiumAmount; ?></td>
                            <td><?php echo $lnd->paid; ?></td>
                            <td><?php echo $lnd->payMode; ?></td>
                            <td><?php echo $lnd->paid_date; ?></td>
                            <td><?php echo $lnd->invoice_slip; ?></td>
                            <td><?php echo $lnd->status; ?></td>
                            <td><?php echo $lnd->remaining_months; ?></td>
                        </tr>
                        <?php
                           }?>
                    </tbody>
                </table>
            </div>
</div>
<?php endif;?>
<?php if(($this->session->userdata("isAdmin")==2)):?>
  <div id="all" class="tabcontent">
  <span onclick="this.parentElement.style.display='none'" class="topright">&times </span>
  <h3 class="text-primary"> <center > All Daybook Transection </center> </h3>
  
  <?php 
  $this->db->where("branchID",$this->session->userdata("branchId"));
 $dab=$this->db->get("daybook")->result();
 
  ?>
                   <div class="panel-scroll table-responsive">
                    <table class="table table-striped table-hover center" id="allb">
                      <thead>
                        <tr>
                          <td>#</td>
                            <td>CustomerID</td>
                            <td>Amount</td>
                            <td>Transaction Type</td>
                            <td>Source</td>
                            <td>Updated</td>
                            <td>Created</td>
                            <td>Invoice No.</td>
                        </tr>
                    </thead>
                    <tbody>
                     <?php $i=1;
                      foreach($dab as $dat): ?>
                       <tr>
                        <td><?php echo $i; ?></td>
                             <td><?php echo $dat->customer_ID; ?></td>
                             <td><?php echo $dat->amount; ?></td>
                            <td><?php echo $dat->transactionType; ?></td>
                            <td><?php echo $dat->source; ?></td>
                            <td><?php echo $dat->updated; ?></td>
                            <td><?php echo $dat->created; ?></td>
                            <td><?php echo $dat->invoice_no; ?></td>
                        </tr>
                        <?php $i++;
                               endforeach;?>
                    </tbody>
                </table>
            </div>
</div>

<div id="fd" class="tabcontent">
  <span onclick="this.parentElement.style.display='none'" class="topright">&times </span>
  <h3 class="text-primary"><center> All FD Transactions</center></h3>
 
      <div class="panel-scroll table-responsive">
                    <table class="table table-striped table-hover center" id="fdvb">
                       <?php 


 $this->db->select('Customer_ID');
$this->db->where("branchID",$this->session->userdata("branchId"));
$dfr = $this->db->get('customer')->result();

foreach ($dfr as $valr):
 
    $valr->Customer_ID;
    $this->db->where("customerID",$valr->Customer_ID);
  
    
                  
               $resul= $this->db->get('fddetail')->result();
                ?>
                
                
                         <tbody>
                        <?php foreach ($resul as $fbf){ ?>
                        <tr>
                            <td><?php echo $fbf->customerID; ?></td>
                            <td><?php echo $fbf->depositorName; ?></td>
                            <td><?php echo $fbf->premiumAmount; ?></td>
                            <td><?php echo $fbf->paid; ?></td>
                            <td><?php echo $fbf->payMode; ?></td>
                            <td><?php echo $fbf->paid_date; ?></td>
                            <td><?php echo $fbf->invoice_slip; ?></td>
                            <td><?php echo $fbf->status; ?></td>
                        </tr>
                        <?php
                         }?>
                       </tbody>
                    <?php endforeach;  ?>
                     <thead>
                        <tr>
                            <td>CustomerID</td>
                            <td>Depositer Name</td>
                            <td>Premium Amount</td>
                            <td>Paid</td>
                            <td>Pay Mode</td>
                            <td>Paid Date</td>
                            <td>Invoice Slip</td>
                            <td>Status</td>
                             </tr>
                    </thead>
                    
                </table>
        
            </div>
</div>

<div id="rd" class="tabcontent">
  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
  <h3 class="text-primary"><center>All RD Transactions</center></h3>
 
  
   <div class="panel-scroll table-responsive">
                    <table class="table table-striped table-hover center" id="fdvr">
                       <?php 


 $this->db->select('Customer_ID');
$this->db->where("branchID",$this->session->userdata("branchId"));
$df = $this->db->get('customer')->result();

foreach ($df as $val):
 
    $val->Customer_ID;
    $this->db->where("customerID",$val->Customer_ID);
  
    
                  
               $resulr= $this->db->get('rddetail')->result();
                ?>
                
                
                         <tbody>
                        <?php foreach ($resulr as $fbfr){ ?>
                        <tr>
                            <td><?php echo $fbfr->customerID; ?></td>
                            <td><?php echo $fbfr->depositorName; ?></td>
                            <td><?php echo $fbfr->premiumAmount; ?></td>
                            <td><?php echo $fbfr->paid; ?></td>
                            <td><?php echo $fbfr->payMode; ?></td>
                            <td><?php echo $fbfr->paid_date; ?></td>
                            <td><?php echo $fbfr->invoice_slip; ?></td>
                            <td><?php echo $fbfr->status; ?></td>
                        </tr>
                        <?php
                         }?>
                       </tbody>
   <?php

  endforeach;

  ?>
                     <thead>
                        <tr>
                            <td>CustomerID</td>
                            <td>Depositer Name</td>
                            <td>Premium Amount</td>
                            <td>Paid</td>
                            <td>Pay Mode</td>
                            <td>Paid Date</td>
                            <td>Invoice Slip</td>
                            <td>Status</td>
                             </tr>
                    </thead>
                    
                </table>
        
            </div>


</div>
<div id="mis" class="tabcontent">
  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
  <h3 class="text-primary"><center> All MIS Transactions</center></h3>
 <div class="panel-scroll table-responsive">
 <table class="table table-striped table-hover center" id="fdvm">
  <?php 


 $this->db->select('Customer_ID');
$this->db->where("branchID",$this->session->userdata("branchId"));
$dfm = $this->db->get('customer')->result();

foreach ($dfm as $valm):
 
    $valm->Customer_ID;
    $this->db->where("customerID",$valm->Customer_ID);
  
    
                  
               $resulm= $this->db->get('misdetail')->result();
                ?>
                
                
                         <tbody>
                        <?php foreach ($resulm as $fbfm){ ?>
                        <tr>
                            <td><?php echo $fbfm->customerID; ?></td>
                            <td><?php echo $fbfm->depositorName; ?></td>
                            <td><?php echo $fbfm->premiumAmount; ?></td>
                            <td><?php echo $fbfm->paid; ?></td>
                            <td><?php echo $fbfm->payMode; ?></td>
                            <td><?php echo $fbfm->paid_date; ?></td>
                            <td><?php echo $fbfm->invoice_slip; ?></td>
                            <td><?php echo $fbfm->status; ?></td>
                        </tr>
                        <?php
                         }?>
                       </tbody>
   <?php

  endforeach;

  ?>
                     <thead>
                        <tr>
                            <td>CustomerID</td>
                            <td>Depositer Name</td>
                            <td>Premium Amount</td>
                            <td>Paid</td>
                            <td>Pay Mode</td>
                            <td>Paid Date</td>
                            <td>Invoice Slip</td>
                            <td>Status</td>
                             </tr>
                    </thead>
                    
                </table>
        
            </div>

</div>
<div id="nps" class="tabcontent">
  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
  <h3 class="text-primary"><center> All NPS Transactions</center></h3>
  
   <div class="panel-scroll table-responsive">
 <table class="table table-striped table-hover center" id="fdvn">
  <?php 


 $this->db->select('Customer_ID');
$this->db->where("branchID",$this->session->userdata("branchId"));
$dfn = $this->db->get('customer')->result();

foreach ($dfn as $valn):
 
    $valn->Customer_ID;
    $this->db->where("customerID",$valn->Customer_ID);
  
    
                  
               $resuln= $this->db->get('npsdetail')->result();
                ?>
                
                
                         <tbody>
                        <?php foreach ($resuln as $fbfn){ ?>
                        <tr>
                            <td><?php echo $fbfn->customerID; ?></td>
                            <td><?php echo $fbfn->depositorName; ?></td>
                            <td><?php echo $fbfn->premiumAmount; ?></td>
                            <td><?php echo $fbfn->paid; ?></td>
                            <td><?php echo $fbfn->payMode; ?></td>
                            <td><?php echo $fbfn->paid_date; ?></td>
                            <td><?php echo $fbfn->invoice_slip; ?></td>
                            <td><?php echo $fbfn->status; ?></td>
                        </tr>
                        <?php
                         }?>
                       </tbody>
   <?php

  endforeach;

  ?>
                     <thead>
                        <tr>
                            <td>CustomerID</td>
                            <td>Depositer Name</td>
                            <td>Premium Amount</td>
                            <td>Paid</td>
                            <td>Pay Mode</td>
                            <td>Paid Date</td>
                            <td>Invoice Slip</td>
                            <td>Status</td>
                             </tr>
                    </thead>
                    
                </table>
        
            </div>
</div>
<div id="loan" class="tabcontent">
  <span onclick="this.parentElement.style.display='none'" class="topright">&times </span>
  <h3 class="text-primary"><center> All Loan Transactions</center></h3>
   <div class="panel-scroll table-responsive">
 <table class="table table-striped table-hover center" id="fdvl">
  <?php 


 $this->db->select('Customer_ID');
$this->db->where("branchID",$this->session->userdata("branchId"));
$dfl = $this->db->get('customer')->result();

foreach ($dfl as $vall):
 
    $vall->Customer_ID;
    $this->db->where("customerID",$vall->Customer_ID);
  
    
                  
               $resull= $this->db->get('loandetail')->result();
                ?>
                
                
                         <tbody>
                        <?php foreach ($resull as $fbfl){ ?>
                        <tr>
                            <td><?php echo $fbfl->customerID; ?></td>
                            <td><?php echo $fbfl->depositorName; ?></td>
                            <td><?php echo $fbfl->premiumAmount; ?></td>
                            <td><?php echo $fbfl->paid; ?></td>
                            <td><?php echo $fbfl->payMode; ?></td>
                            <td><?php echo $fbfl->paid_date; ?></td>
                            <td><?php echo $fbfl->invoice_slip; ?></td>
                            <td><?php echo $fbfl->status; ?></td>
                        </tr>
                        <?php
                         }?>
                       </tbody>
   <?php

  endforeach;

  ?>
                     <thead>
                        <tr>
                            <td>CustomerID</td>
                            <td>Depositer Name</td>
                            <td>Premium Amount</td>
                            <td>Paid</td>
                            <td>Pay Mode</td>
                            <td>Paid Date</td>
                            <td>Invoice Slip</td>
                            <td>Status</td>
                             </tr>
                    </thead>
                    
                </table>
        
            </div>
</div>
  <?php endif;?>
  <?php if(($this->session->userdata("isAdmin")==3)):?>
    <h2 class="text-primary"><center>Under Construction</center></h2>
<?php endif;?>

<?php if(($this->session->userdata("isAdmin")==4)):?>
  <h2 class="text-primary"><center>Under Construction</center></h2>
<?php endif;?>

<?php if(($this->session->userdata("isAdmin")==5)):?>
  <h2 class="text-primary"><center>Under Construction</center></h2>
<?php endif;?>
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
   
</div></div>