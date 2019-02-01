      <div class="layout-content">
        <div class="layout-content-body">
          <div class="row gutter-xs">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-actions" style="top: 35%;">
                    <a class="btn btn-sm btn-labeled arrow-primary" href="<?= base_url() ?>newemploye.html">
                      <span class="btn-label">
                        <span class="icon icon-plus-square icon-lg icon-fw"></span>
                      </span>
                      New Agents
                    </a>
                    <a class="btn btn-sm btn-labeled arrow-info" onclick="window.history.back();" href="#">
                      <span class="btn-label">
                        <span class="icon icon-arrow-circle-left icon-lg icon-fw"></span>
                      </span>
                      Back
                    </a>
                  </div>
                  <strong>All Agents</strong>
                </div>
                <div class="card-body">
                  <div class="card-body" data-toggle="match-height">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Rank</th>
                          <th>Name</th>
                          <th>Father</th>
                          <th>Total Comission</th>
                           <th>Total Paid Comission</th>
                            <th>Remain Amount</th>
                          <th>Introducer Name(code)</th>
                            <th>Detail Paid</th>
                            <th>Remaining</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        
                        if( $agents->num_rows()>0)
                          {foreach ($agents->result() as $key => $value): ?>
                          <tr>
                            <td><?= $value->id; ?></td>
                            <td><?= $value->rank; ?></td>
                            <td><?= $value->name; ?></td>
                            <td><?= $value->fatherName; ?>
                          </td>
                           <?php  
                           $this->db->select_sum('amount');   
                            $this->db->where("a_id",$value->id)  ;
                            $query=$this->db->get("agent_comission")->row();
        	                 ?>
                            <td><?= $query->amount; ?></td>
                            <?php  $this->db->select_sum('amount');   
                            $this->db->where("customer_ID",$value->agent_id);
                            $query1d=$this->db->get("daybook")->row();?>
                             <td><?= $query1d->amount; ?></td>
                              <td><?php echo $query->amount - $query1d->amount; ?></td>
                            <?php  $this->db->where("id",$value->introducer_code);
		                         $rdft =  $this->db->get("agent");?>
                            <td><?php if($rdft->num_rows()>0){$rty =$rdft->row();  echo $rty->name."[".$rty->id."]";} ?></td>
                            <td><?= date("d-M-Y (H:i:s A)", strtotime($value->created)); ?></td>
                           <td><a class="btn btn-primary" href="<?= base_url() ?>agent/personalAmount/<?= $value->id ?>">Detail</a></td>
                            <td><a class="btn btn-primary" href="<?= base_url() ?>agent/personalAmountPay/<?= $value->id ?>">Pay</a></td>
                          </tr>
                        <?php endforeach; }?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
