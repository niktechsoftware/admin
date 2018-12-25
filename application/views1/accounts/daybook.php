<div class="layout-content">
	<div class="layout-content-body">
	  <div class="row gutter-xs">
		  <div class="col-md-12" id="planDetail">
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
            <div class="card-body" data-toggle="match-height">
              <div class="row">
                <div class="col-md-12">
                  <table class="table">
                    <tr>
                      <th>#</th>
                      <th>Amount</th>
                      <th>Debit/Credit</th>
                      <td>Source</td>
                      <th>Transaction Date</th>
                    </tr>
                    <?php 
                      foreach ($daybook as $key => $value) {
                        echo "<tr>";
                        echo "<td>".$value->id."</td>";
                        echo "<td>".$value->amount."</td>";
                        echo "<td>".$value->transactionType."</td>";
                        echo "<td>".$value->source."</td>";
                        echo "<td>".$value->created."</td>";
                        echo "</tr>";
                      }
                    ?>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
	  </div>
	</div>
</div>