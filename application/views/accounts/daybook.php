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
                        <strong>Daybook Transactions</strong>
                    </div>
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
                        </table>
                    </div>
                </div>
            </div>
	    </div>
	</div>
</div>