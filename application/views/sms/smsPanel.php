
  <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript">
  window.jQuery || document.write('<script src="classes/commons/jquery/jquery-1.7.1.min.js"><\/script>')
  </script>
    <!--<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script> -->
  <!-- <link href="<?php echo base_url();?>assets/button/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="<?php echo base_url();?>assets/button/js/bootstrap-toggle.min.js"></script>
  <script src="<?php echo base_url();?>assets/button/js/malsup.github.io/jquery.form.js"></script> 


 <?php
  foreach($row as $data):
       $admin=$data->isAdmin;
       $emp=$data->employee;
        $age = $data->agent;
        $cust = $data->customer;
        $comm = $data->committee;
        $bran= $data->branch;
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
                    <th>All Committee</th>
                      <th>All Customer</th> 
                      <th>All Branch</th>
                  </tr>        
                </thead>
                 <form id="myForm" name="myForm" action="audio_alarm.php" method="post"> 
                <tbody>
                  <tr>
                    <td>
                       <input type="checkbox" name="toggle" id="toggle" data-toggle="toggle" data-off="No" data-on="yes" checked>
                    </td>
                    <td>
                       <input type="checkbox" name="toggle1" id="toggle1" data-toggle="toggle" data-off="untracked" data-on="tracked" checked>
                    </td>
                    <td>
                   <input type="checkbox" name="toggle2" id="toggle2" data-toggle="toggle" data-off="untracked" data-on="tracked" checked>
                    </td>
                    <td>
                   <input type="checkbox" name="toggle3" id="toggle3" data-toggle="toggle" data-off="untracked" data-on="tracked" checked>
                    </td>
                    <td>
                    <input type="checkbox" name="toggle4" id="toggle4" data-toggle="toggle" data-off="untracked" data-on="tracked" checked>
                    </td>
                  </tr>
                </tbody> 
                </form> 
                </table>          
          <?php }?>
             <br><br>
    <div class="panel panel-default">
    <div class="panel-heading" id="heading"></div>
    <div class="panel-body" id="body"></div>
  </div>
    <div></div>
  </div>
</div></div></div></div></div></div>



    <script>
      $('#toggle').change(function(){

        var mode= $(this).prop('checked');
        // // submit the form 
        // $(#myForm).ajaxSubmit(); 
        // // return false to prevent normal browser submit and page navigation 
        // return false; 
         //console.log("hii");
        $.ajax({
          type:'POST',
          dataType:'JSON',
          url:'index.php/SmsAjax/getsms',
          data:'mode='+mode,
          success:function(data)
          {
            var data=eval(data);
            message=data.message;
            success=data.success;
            $("#heading").html(success);
            $("#body").html(message);
          }
        });
      });
    </script>
   -->


 <style>
 .switch {
  position: relative;
  display: block;
  vertical-align: top;
  width: 100px;
  height: 30px;
  padding: 3px;
  margin: 0 10px 10px 0;
  background: linear-gradient(to bottom, #eeeeee, #FFFFFF 25px);
  background-image: -webkit-linear-gradient(top, #eeeeee, #FFFFFF 25px);
  border-radius: 18px;
  box-shadow: inset 0 -1px white, inset 0 1px 1px rgba(0, 0, 0, 0.05);
  cursor: pointer;
}
.switch-input {
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
}
.switch-label {
  position: relative;
  display: block;
  height: inherit;
  font-size: 10px;
  text-transform: uppercase;
  background: #eceeef;
  border-radius: inherit;
  box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.12), inset 0 0 2px rgba(0, 0, 0, 0.15);
}
.switch-label:before, .switch-label:after {
  position: absolute;
  top: 50%;
  margin-top: -.5em;
  line-height: 1;
  -webkit-transition: inherit;
  -moz-transition: inherit;
  -o-transition: inherit;
  transition: inherit;
}
.switch-label:before {
  content: attr(data-off);
  right: 11px;
  color: #aaaaaa;
  text-shadow: 0 1px rgba(255, 255, 255, 0.5);
}
.switch-label:after {
  content: attr(data-on);
  left: 11px;
  color: #FFFFFF;
  text-shadow: 0 1px rgba(0, 0, 0, 0.2);
  opacity: 0;
}
.switch-input:checked ~ .switch-label {
  background: #0088cc;
  border-color: #0088cc;
  box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.15), inset 0 0 3px rgba(0, 0, 0, 0.2);
}
.switch-input:checked ~ .switch-label:before {
  opacity: 0;
}
.switch-input:checked ~ .switch-label:after {
  opacity: 1;
}
.switch-handle {
  position: absolute;
  top: 4px;
  left: 4px;
  width: 28px;
  height: 28px;
  background: linear-gradient(to bottom, #FFFFFF 40%, #f0f0f0);
  background-image: -webkit-linear-gradient(top, #FFFFFF 40%, #f0f0f0);
  border-radius: 100%;
  box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
}
.switch-handle:before {
  content: "";
  position: absolute;
  top: 50%;
  left: 50%;
  margin: -6px 0 0 -6px;
  width: 12px;
  height: 12px;
  background: linear-gradient(to bottom, #eeeeee, #FFFFFF);
  background-image: -webkit-linear-gradient(top, #eeeeee, #FFFFFF);
  border-radius: 6px;
  box-shadow: inset 0 1px rgba(0, 0, 0, 0.02);
}
.switch-input:checked ~ .switch-handle {
  left: 74px;
  box-shadow: -1px 1px 5px rgba(0, 0, 0, 0.2);
}

/* Transition
========================== */
.switch-label, .switch-handle {
  transition: All 0.3s ease;
  -webkit-transition: All 0.3s ease;
  -moz-transition: All 0.3s ease;
  -o-transition: All 0.3s ease;
}
</style>
 <?php
  foreach($row as $data):
       $admin=$data->isAdmin;
       $emp=$data->employee;
        $age = $data->agent;
        $cust = $data->customer;
        $comm = $data->committee;
        $bran= $data->branch;
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
          <form id="myForm" name="myForm" action="<?php echo base_url()?>index.php/SmsAjax/getsms" method="post"> 
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
                    <th>All Committee</th>
                      <th>All Customer</th> 
                      <th>All Branch</th>
                  </tr>        
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <label class="switch" id="employee">
                      <input class="switch-input" name="employee" id="emplo" value="<?php echo $emp; ?>" type="checkbox" />
                   <span class="switch-label" id="employeelb" data-on="Yes" data-off="No"></span> 
                    <span class="switch-handle"></span> 
                           </label>
                    </td>
                    <td>
                      <label class="switch" id="agent">
                      <input class="switch-input"   name="employee" value="<?php echo $emp; ?>" type="checkbox" />
                   <span class="switch-label" id="agentlb" data-on="Yes" data-off="No"></span> 
                    <span class="switch-handle"></span> 
                           </label>
                    </td>
                    <td>
                   <label class="switch" id="committee">
                      <input class="switch-input" name="committee" value="<?php echo $comm; ?>"  type="checkbox" />
                   <span class="switch-label" id="committeelb" data-on="Yes" data-off="No"></span> 
                    <span class="switch-handle"></span> 
                           </label>
                    </td>
                    <td>
                  <label class="switch" id="customer">
                      <input class="switch-input" name="customer" value="<?php echo $cust; ?>" type="checkbox" />
                   <span class="switch-label" id="customerlb" data-on="Yes" data-off="No"></span> 
                    <span class="switch-handle"></span> 
                           </label>
                    </td>
                    <td>
                   <label class="switch" id="branch">
                   <input class="switch-input" name="branch" value="<?php echo $bran; ?>"  type="checkbox" />
                 <span class="switch-label" id="branchlb" data-on="Yes" data-off="No"></span> 
                 <span class="switch-handle"></span> 
                   </label>
                    </td>
                  </tr>
                </tbody>  
                </table>          
                <?php }
                else
                  {?>
                    <div class="panel-body">
                <table class="table">
                <thead>
                 
                  <tr>
                    <th>All Employee</th>
                    <th>All Agent</th>
                    <th>All Committee</th>
                      <th>All Customer</th>
                  </tr>        
                </thead>
                <tbody>
                  <tr>
                    <td>
                   <label class="switch" id="employee">
                      <input class="switch-input" name="employee" value="<?php echo $emp; ?>" type="checkbox" />
                   <span class="switch-label" id="employeelb" data-on="Yes" data-off="No"></span> 
                    <span class="switch-handle"></span> 
                           </label>
                    </td>
                    <td>
                     <label class="switch" id="agent">
                      <input class="switch-input"   name="employee" value="<?php echo $emp; ?>" type="checkbox" />
                   <span class="switch-label" id="agentlb" data-on="Yes" data-off="No"></span> 
                    <span class="switch-handle"></span> 
                           </label>
                    </td>
                    <td>
                   <label class="switch" id="committee">
                      <input class="switch-input" name="committee" value="<?php echo $comm; ?>"  type="checkbox" />
                   <span class="switch-label" id="committeelb" data-on="Yes" data-off="No"></span> 
                    <span class="switch-handle"></span> 
                           </label>
                    </td>
                    <td>
                  <label class="switch" id="customer">
                      <input class="switch-input" name="customer" value="<?php echo $cust; ?>" type="checkbox" />
                   <span class="switch-label" id="customerlb" data-on="Yes" data-off="No"></span> 
                    <span class="switch-handle"></span> 
                           </label>
                    </td>
                  </tr>
                </tbody>  
                </table>          
                <?php } ?>
          <div style="margin-top:30px;" class="row">
            <div class="col-md-3">
          <label for="id_select" class="border-style:none;" class="form-control"><span style="font-size:15px;color:orange"  class="text-center">  Select Group Sms </span>
           </label>
          </div>
          <?php if($admin==1)
            {?>
           <div class="col-md-6">
            
        <select id="id_select" autofocus="true" class="form-control" style="color:orange" >
      <option value="all" class="form-control"> <span  class="text-center">All</span></option>
       <option value="branch" class="form-control"> <span  class="text-center">Branch </span></option>
      <option value="employee" class="form-control"> <span  class="text-center">Empolyee </span> </option>
       <option value="customer" class="form-control"> <span class="text-center">Customer </span></option>
        <option value="agent" class="form-control"> <span  class="text-center">Agent</span></option>
         <option value="committee" class="form-control"> <span  class="text-center">Committee</span></option>
      </select>
           </div>
          <?php }
            else
            {
            ?> 
            <div class="col-md-6">       
        <select id="id_select" autofocus="true" class="form-control" style="color:orange" >
      <option value="all" class="form-control"> <span  class="text-center">All</span></option>
      <option value="employee" class="form-control"> <span  class="text-center">Empolyee </span> </option>
       <option value="customer" class="form-control"> <span class="text-center">Customer </span></option>
        <option value="agent" class="form-control"> <span  class="text-center">Agent</span></option>
         <option value="committee" class="form-control"> <span  class="text-center">Committee</span></option>
      </select>
           </div>
           <?php }?>
            <div class="col-md-2"></div>
            </div>
            <div style="margin-top:30px;"  class="row">
            <div class="col-md-3">
          <label for="message" class="border-style:none;" class="form-control"><span style="font-size:15px;color:orange"  class="text-center"> Write Your Message </span>
           </label>
          </div>
           <div class="col-md-6">
            <textarea name="Text1" cols="40" rows="5" class="form-control" placeholder="Write Your Message here "></textarea>
            </div> 
            <div class="col-md-2"></div>
            </div>
             <div style="margin-top:30px;"  class="row">
            <div class="col-md-5"></div>
            <div class="col-md-5"><input type="submit" name="submit" class="btn btn-warning" value="Send Message"></div>
              <div class="col-md-2"></div>
            </div>
            </form> 
          </div>
        </div>
      </div>
       </div>
      </div>
       </div>
      <script>
(function() {
  $(document).ready(function() {
    $('#emplo').on('change', function() {
      var isChecked = $(this).is(':checked');
      var selectedData;
      var $switchLabel = $('#employeelb');
      if(isChecked) {
        selectedData = $switchLabel.attr('data-on');
      } else {
        selectedData = $switchLabel.attr('data-off');
      }
    if(!(selectedData == "" || isChecked  == "")){
          $.post("<?php echo site_url('index.php/SmsAjax/getsms') ?>", 
              {
            selectedData : selectedData,
            isChecked :  isChecked,
            }, 
              function(data){
                  
                    //alert(data);
            });
        }

    });
  });

})();


    
     
    </script>
    