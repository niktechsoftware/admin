<!DOCTYPE html>
<html>
	<head>
		<title>Invoice</title>
		<style type="text/css">
        @font-face {
          font-family: 'AlgerianRegular';
          src: url('<?= base_url();?>assets/fonts/ALGER.ttf');
        }

        .title {
          padding: 5px;
          margin: 5px;
          color: #1960b0;
          font-family: AlgerianRegular !important;
          font-size: 35px;
        }
			body {
  				font-family: arial;
  				font-size: 11px;
        }
      table { border-collapse: collapse; }
      table td, table th { 
          border: 1px solid #DFDFDF; 
          padding: 1px; 
      }
    	@media print {
  			body * { visibility: hidden; }
  			#printcontent * { 
			    visibility: visible;
			    width: 500px;
  			}
  			#printcontent img {
			    width:50px;
  			}
  			#printcontent { 
			    position: absolute; 
			    top: 0px; 
			    left: 50px;
			    right: 50px;
  			}
  			#innerTable {
			    width: 150px;
  			}
  			#innerTable1 {
			    width: 150px;
  			}
	    }
    </style>
	</head>
	
	<body>
	    	<?php     
	    		
	    	
	    	 
	    	
	    	$this->db->where("invoice_no",$invoiceno);
		    $getdata = $this->db->get("daybook")->row();
	    	
	    	
	    	
	    	
		    $this->db->where("agent_id", $getdata->customer_ID);
            $agentD = $this->db->get("agent")->row();
            
              ?>
		<div style="width: 560px; margin-left: auto; margin-right: auto;">
			<table class="table table-bordered" id="printcontent">
                  <tr>
                    <td colspan="6" style="font-family: algerian; font-size: 25px; text-align: center;">
                      <span class="title">
                        <img src="<?= base_url() ?>assets/img/safari-pinned-tab.svg" width="50" style="padding: 0px 0px 0px 0px;">
                          JAI MATA DI FINANCE LTD.
                      </span>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="6"><strong>Branch:</strong> <?= $this->session->userdata("title"); ?></td>
                  </tr>
                  <tr>
                    <td colspan="6"><strong>Print Date:</strong> <?=  date("d-M-Y"); ?></td>
                  </tr>
                  <tr>
 <td colspan="6"><strong>Print User.:<?php echo $this->session->userdata("empName"); ?></strong></td>
                  </tr>
                  <tr>
                                         
                    <td colspan="6" style="text-align: center; font-size: 13px;"><strong>&nbsp;&nbsp;&nbsp;&nbsp;Comission Pay Receipt&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> </td>
                  </tr>
                  <tr>
                    <td colspan="4"><strong>Print Branch:</strong> <?php echo $this->session->userdata("branchID");;?></td>
                    <td colspan="2"><strong>Document No:</strong><?php echo $invoiceno;?></td>
                  </tr>
                  <tr>
                    <td colspan="4"><strong>Receipt with thanks from:</strong><?= $this->session->userdata("username"); ?></td>
                    <td colspan="2"><strong>DOC:</strong> <?= date("d-M-Y", strtotime($getdata->created)) ?></td>
                  </tr>
                  <tr>
                    <td colspan="4"><strong>Address:</strong> <?= $agentD->present_address ?></td>
                    <td colspan="2"><strong>Document Date:</strong> <?= date("d-M-Y"); ?></td>
                  </tr>
                  <tr>
                    <td colspan="2"><strong>Ajent Name.:</strong> <?= $agentD->name ?></td>
                    <td colspan="2"><strong>Agent ID:</strong> <?= $agentD->agent_id ?></td>
                    <td colspan="2" rowspan="4">
                      <table id="innerTable" width="150">
                        <tr>
                          <td><strong>Particulars</strong></td>
                          <td><strong>Amount</strong></td>
                        </tr>
                      
                       
                       
                        <tr>
                          <td><strong>Total Paid Amount</strong></td>
                          <td><?= $getdata->amount;?></td>
                        </tr>
                      </table>
                    </td>
                  </tr>

                 

                

               
                 

              
                

                  <tr>
                    <td colspan="6" style="text-align: center;">
                    <br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

                      **This is Computer generated Money receipt, Signature not required.**s
                    </td>
                  </tr>
                </table>
                <div class="invoice-buttons">
                  <button class="btn btn-default margin-right" type="button" onclick="window.print();" >
                      <i class="fa fa-print padding-right-sm"></i> Print Reciept
                    </button>
                </div>
		</div>
	</body>
</html>