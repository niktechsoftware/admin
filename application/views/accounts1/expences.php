
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
 padding: 14px 16px;
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
<h2>DayBook</h2>

<div class="tab ">
 <button class="tablinks btn-danger" onclick="openCity(event, 'debit')" id="defaultOpen"><span style="color:black;">Debit</span></button>
 <button class="tablinks btn-danger" onclick="openCity(event, 'credit')"><span style="color:black;">Credit</span></button>
 <button class="tablinks btn-danger" onclick="openCity(event, 'both')"><span style="color:black;">Both</span></button>
</div>

<div class="layout-content">
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
                        <strong>Daybook Daily Expension</strong>
                    </div>
                    <div id="debit" class="tabcontent">
 <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
 <h3>All Debit Expences</h3>
                    <div class="card-body">
                        <table id="demo-datatables-5" class="table table-striped table-bordered table-nowrap dataTable" cellspacing="0" width="100%">
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
  
                                    foreach ($amountdabit as $value) :
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
                        </table>
                        <div>  <a class="btn btn-warning"><strong style="font-size: 17px;">Today's Total-
                                 <?php
                   
                    $dt = date("Y-m-d");
			         $this->db->select_sum('amount');
			       	 $this->db->where('DATE(created)',$dt);
			        $this->db->where('transactionType','debit');
			         $amountdabit =$this->db->get('daybook')->row()->amount;
                    echo $amountdabit;
                    
                    ?>
                          </strong></a></div>
                        
                        
                     
                    </div>
                </div>
                </div>
                

 <div id="credit" class="tabcontent">
 <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
 <h3>All Credit Expences</h3>
                    <div class="card-body">
                        <table id="demo" class="table table-striped table-bordered table-nowrap dataTable" cellspacing="0" width="100%">
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
   // print_r($amountdabit);
                                    foreach ($amountcredit as $value) :
                                        echo "<tr>";
                                          //print_r($value);
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
                        </table>
                    <div>  <a class="btn btn-warning"><strong style="font-size: 17px;">Today's Total-
                                 <?php
                   
                    $dt = date("Y-m-d");
			         $this->db->select_sum('amount');
			       	 $this->db->where('DATE(created)',$dt);
			        $this->db->where('transactionType','credit');
			         $amountdabit =$this->db->get('daybook')->row()->amount;
                    echo $amountdabit;
                    
                    ?>
                          </strong></a></div>
                        
                        
                     
                    </div>
                    </div>

                     <div id="both" class="tabcontent">
           <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
           <h3>All Credit/debitExpences</h3>
                    <div class="card-body">
                        <table id="demo1" class="table table-striped table-bordered table-nowrap dataTable" cellspacing="0" width="100%">
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
   // print_r($amountdabit);
                                    foreach ($amountboth as $value) :


                                       
                                        echo "<tr>";
                                          //print_r($value);
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
                        </table>
                    <div>  <a class="btn btn-warning"><strong style="font-size: 17px;">Today's Total-Credit 
                                 <?php
                   
                    $dt = date("Y-m-d");
                     $this->db->select_sum('amount');
                     $this->db->where('DATE(created)',$dt);
                    $this->db->where('transactionType','credit');


                     $amountdabit =$this->db->get('daybook')->row()->amount;
                    echo $amountdabit;
                    
                    ?>
                          </strong></a>
                          <a class="btn btn-warning"><strong style="font-size: 17px;">Today's Total-Debit 
                                 <?php
                   
                    $dt = date("Y-m-d");
                     $this->db->select_sum('amount');
                     $this->db->where('DATE(created)',$dt);
                    $this->db->where('transactionType','debit');


                     $amountdabit =$this->db->get('daybook')->row()->amount;
                    echo $amountdabit;
                    
                    ?>
                          </strong></a></div>
                     
                    </div>
                    </div> 
                </div>

 </div>


            
</div>
	</div>
    </div></div>
 
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