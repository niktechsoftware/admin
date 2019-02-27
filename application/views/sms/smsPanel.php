   <?php
foreach($row as $data):

       $admin=$data->isAdmin;
       $emp=$data->employee;
        $age = $data->agent;
        $cust = $data->customer;
        $comm = $data->committee;
        $branch= $data->branch;
     

endforeach;
   ?>
     <div class="layout-content">
  <div class="layout-content-body">
      <div class="row gutter-xs">
        <div class="col-xs-12">
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
                        <strong>Sms Panel</strong>
                    </div>
                   <div class="panel-body">
    
      <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-calendar">
            <div class="panel-heading panel-blue border-light">
              <h4 class="panel-title">SMS Setting Panel</h4>
            </div>
            
            <div class="panel-body">
               <?php if($admin==1){?>
              <table class="table">
                <thead>
                 
                  <tr>
                    <th>All Employee</th>
                    <th>All Agent</th>
                    <th>All Branch</th>
                    <th>All Committee</th>
                      <th>All Customer</th>
                  </tr>
              
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <button class="btn btn-sm <?php if($emp == 'yes'){echo "btn-light-green"; }else{echo "btn-light-red";}?>" id="employee" value="employee">
                        <i class="<?php if($emp == 'yes'){echo "fa fa-check"; }else{echo "fa fa-times fa fa-white";}?>"></i> 
                        <?php if($emp == 'yes'){echo "YES"; }else{echo "NO";}?>
                      </button>
                    </td>
                    <td>
                      <button class="btn btn-sm <?php if($age == 'yes'){echo "btn-light-green"; }else{echo "btn-light-red";}?>" id="agent" value="agent">
                        <i class="<?php if($age == 'yes'){echo "fa fa-check"; }else{echo "fa fa-times fa fa-white";}?>"></i> 
                        <?php if($age == 'yes'){echo "YES"; }else{echo "fa fa-times fa fa-white";}?>
                      </button>
                    </td>
                    <td>
                      <button class="btn btn-sm <?php if($branch == 'yes'){echo "btn-light-green"; }else{echo "btn-light-red";}?>" id="branch" value="branch">
                        <i class="<?php if($branch == 'yes'){echo "fa fa-check"; }else{echo "fa fa-times fa fa-white";}?>"></i> 
                        <?php if($branch == 'yes'){echo "YES"; }else{echo "NO";}?>
                      </button>
                    </td>
                    <td>
                      <button class="btn btn-sm <?php if($comm == 'yes'){echo "btn-light-green"; }else{echo "btn-light-red";}?>" id="Committee" value="Committee">
                        <i class="<?php if($comm == 'yes'){echo "fa fa-check"; }else{echo "fa fa-times fa fa-white";}?>"></i> 
                        <?php if($comm == 'yes'){echo "YES"; }else{echo "NO";}?>
                      </button>
                    </td>
                    <td>
                      <button class="btn btn-sm <?php if($cust == 'yes'){echo "btn-light-green"; }else{echo "btn-light-red";}?>" id="Customer" value="customer">
                        <i class="<?php if($cust == 'yes'){echo "fa fa-check"; }else{echo "fa fa-times fa fa-white";}?>"></i> 
                        <?php if($cust == 'yes'){echo "YES"; }else{echo "NO";}?>
                      </button>
                    </td>
          
                  </tr>
                </tbody>
              </table>
                
                <?php } elseif ($admin==2) {?>
                 <table class="table">
                <thead>                 
                  <tr>
                    <th>All Agent</th>
                    <th>All Branch</th>
                    <th>All Committee</th>
                      <th>All Customer</th>
                  </tr>
              
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <button class="btn btn-sm <?php if($emp == 'yes'){echo "btn-light-green"; }else{echo "btn-light-red";}?>" id="employee" value="employee">
                        <i class="<?php if($emp == 'yes'){echo "fa fa-check"; }else{echo "fa fa-times fa fa-white";}?>"></i> 
                        <?php if($emp == 'yes'){echo "YES"; }else{echo "NO";}?>
                      </button>
                    </td>
                    <td>
                      <button class="btn btn-sm <?php if($age == 'yes'){echo "btn-light-green"; }else{echo "btn-light-red";}?>" id="agent" value="agent">
                        <i class="<?php if($age == 'yes'){echo "fa fa-check"; }else{echo "fa fa-times fa fa-white";}?>"></i> 
                        <?php if($age == 'yes'){echo "YES"; }else{echo "fa fa-times fa fa-white";}?>
                      </button>
                    </td>
                    <td>
                      <button class="btn btn-sm <?php if($branch == 'yes'){echo "btn-light-green"; }else{echo "btn-light-red";}?>" id="branch" value="branch">
                        <i class="<?php if($branch == 'yes'){echo "fa fa-check"; }else{echo "fa fa-times fa fa-white";}?>"></i> 
                        <?php if($branch == 'yes'){echo "YES"; }else{echo "NO";}?>
                      </button>
                    </td>
                    <td>
                      <button class="btn btn-sm <?php if($comm == 'yes'){echo "btn-light-green"; }else{echo "btn-light-red";}?>" id="Committee" value="Committee">
                        <i class="<?php if($comm == 'yes'){echo "fa fa-check"; }else{echo "fa fa-times fa fa-white";}?>"></i> 
                        <?php if($comm == 'yes'){echo "YES"; }else{echo "NO";}?>
                      </button>
                    </td>
                    <td>
                      <button class="btn btn-sm <?php if($cust == 'yes'){echo "btn-light-green"; }else{echo "btn-light-red";}?>" id="Customer" value="customer">
                        <i class="<?php if($cust == 'yes'){echo "fa fa-check"; }else{echo "fa fa-times fa fa-white";}?>"></i> 
                        <?php if($cust == 'yes'){echo "YES"; }else{echo "NO";}?>
                      </button>
                    </td>
          
                  </tr>
                </tbody>
              </table>
           
               <?php } elseif ($admin==4) {?>
                 <table class="table">
                <thead>
                 
                  <tr>        
                    <th>All Agent</th>
                    <th>All Committee</th>
                      <th>All Customer</th>
                  </tr>
              
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <button class="btn btn-sm <?php if($emp == 'yes'){echo "btn-light-green"; }else{echo "btn-light-red";}?>" id="employee" value="employee">
                        <i class="<?php if($emp == 'yes'){echo "fa fa-check"; }else{echo "fa fa-times fa fa-white";}?>"></i> 
                        <?php if($emp == 'yes'){echo "YES"; }else{echo "NO";}?>
                      </button>
                    </td>
                    <td>
                      <button class="btn btn-sm <?php if($age == 'yes'){echo "btn-light-green"; }else{echo "btn-light-red";}?>" id="agent" value="agent">
                        <i class="<?php if($age == 'yes'){echo "fa fa-check"; }else{echo "fa fa-times fa fa-white";}?>"></i> 
                        <?php if($age == 'yes'){echo "YES"; }else{echo "fa fa-times fa fa-white";}?>
                      </button>
                    </td>
                    <td>
                      <button class="btn btn-sm <?php if($branch == 'yes'){echo "btn-light-green"; }else{echo "btn-light-red";}?>" id="branch" value="branch">
                        <i class="<?php if($branch == 'yes'){echo "fa fa-check"; }else{echo "fa fa-times fa fa-white";}?>"></i> 
                        <?php if($branch == 'yes'){echo "YES"; }else{echo "NO";}?>
                      </button>
                    </td>
                    <td>
                      <button class="btn btn-sm <?php if($comm == 'yes'){echo "btn-light-green"; }else{echo "btn-light-red";}?>" id="Committee" value="Committee">
                        <i class="<?php if($comm == 'yes'){echo "fa fa-check"; }else{echo "fa fa-times fa fa-white";}?>"></i> 
                        <?php if($comm == 'yes'){echo "YES"; }else{echo "NO";}?>
                      </button>
                    </td>
                    <td>
                      <button class="btn btn-sm <?php if($cust == 'yes'){echo "btn-light-green"; }else{echo "btn-light-red";}?>" id="Customer" value="customer">
                        <i class="<?php if($cust == 'yes'){echo "fa fa-check"; }else{echo "fa fa-times fa fa-white";}?>"></i> 
                        <?php if($cust == 'yes'){echo "YES"; }else{echo "NO";}?>
                      </button>
                    </td>
          
                  </tr>
                </tbody>
               </table>
                <?php }?>
              <div id="smsSetting"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
                       
                </div>
            </div>
      </div>
  </div>
</div>