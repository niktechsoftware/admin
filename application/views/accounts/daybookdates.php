<form action="<?php echo base_url();?>index.php/Accounts/getdabook.html"  method ="post" >
<div class="layout-content">
  <div class="layout-content-body">
    <div class="row gutter-xs">
      <div class="col-md-12" >
        <div class="card">
          <div class="card-header">
            <div class="card-actions" style="top: 35%;">
              <a class="btn btn-sm btn-labeled arrow-info" onclick="window.history.back();" href="#">
                     <span class="btn-label">
                     <span class="icon icon-arrow-circle-left icon-lg icon-fw">
                     </span>
                     </span>
                               Back
              </a>
             </div>
                  <strong>Daybook Transactions</strong>
                  <h6> Select Your Transactions Dates</h6>





                  \
                  
             
           
             
         
          
         

                <div class="form-group">
	                
                  <div class="col-sm-4">
                  <input type="date" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" name= "date1">  
                  </div>
                  <div class="col-sm-4">
                   <input type="date" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" name= "date2">
                   </div>
                    <div class="col-sm-4">
                    <input type="submit"  class="form-control btn btn-danger" value="Submit">
                    </div>
                 </div>
              </form>
                </div>
              </div>
             </div>
              </div>
               </div>
               </div>
	          
         	
</div>
</form>