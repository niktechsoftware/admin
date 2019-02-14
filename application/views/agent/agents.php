      <div class="layout-content">
        <div class="layout-content-body">
          <div class="row gutter-xs">
            <div class="col-md-12">
                              <div class="panel panel-white">
                                <div class="panel-body">
                                    <form class="form-horizontal" action="<?php echo base_url()?>Agent/agentDetail" method="post" enctype="multipart/form-data">
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
                    <a class="btn btn-sm btn-labeled arrow-primary" href="<?= base_url() ?>newagent.html">
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
                    <div class="panel-scroll table-responsive">
                    <table class="table table-striped table-hover center" id="agent">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Rank</th>
                          <th>Agent Code</th>
                          <th>Name</th>
                          <th>Father</th>
                          <th>Status</th>
                          <th>Address</th>
                          <th>Mobile</th>
                         
                         
                          <th>Created</th>
                           <th>Detail</th>
                            <th> Edit </th>
                            <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        
                        if( $employes->num_rows()>0)
                        {foreach ($employes->result() as $key => $value): ?>
                          <tr>
                            <td><?= $value->id; ?></td>
                            <td><?= $value->rank; ?></td>
                             <td><?= $value->agent_id; ?></td>
                            <td><?= $value->name; ?></td>
                            <td><?= $value->fatherName; ?></td>
                            <td><?= $value->activeStatus == 1 ? 'Active' : 'Deactive'; ?></td>
                            <td><?= $value->present_address; ?></td>
                            <td><?= $value->mobile; ?></td>
                
                            <td><?= date("d-M-Y)", strtotime($value->created)); ?></td>
                            <td><a class="btn btn-primary" href="<?= base_url() ?>agent/<?= $value->id ?>">Detail</a></td>
                            <td><a class="btn btn-success" href="<?= base_url() ?>agentEdit/<?= $value->id ?>">Edit</a></td>
                            <td><a class="btn btn-danger"  href="<?= base_url() ?>agent/agentDelete/<?= $value->id ?>" onclick="return confirm('Are you sure')">Delete</a></td>
                            </td>
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
      </div>
