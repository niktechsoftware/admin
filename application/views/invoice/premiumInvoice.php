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
                    <td colspan="6"><strong>Branch:</strong> <?= $planDetail->title; ?></td>
                  </tr>
                  <tr>
                    <td colspan="6"><strong>Print Date:</strong> <?=  date("d-M-Y"); ?></td>
                  </tr>
                  <tr>
                    <td colspan="6"><strong>Customer No.:</strong> <?=  date("ymd", strtotime($planDetail->created)).'C'.$planDetail->id; ?></td>
                  </tr>
                  <tr>
                    <td colspan="6" style="text-align: center; font-size: 13px;"><strong>Receipt</strong></td>
                  </tr>
                  <tr>
                    <td colspan="4"><strong>Print Branch:</strong> N/A</td>
                    <td colspan="2"><strong>Document No:</strong><?= "39887488J899" ?></td>
                  </tr>
                  <tr>
                    <td colspan="4"><strong>Receipt with thanks from:</strong><?= $planDetail->name ?> </td>
                    <td colspan="2"><strong>DOC:</strong> <?= date("d-M-Y", strtotime($planDetail->created)) ?></td>
                  </tr>
                  <tr>
                    <td colspan="4"><strong>Address:</strong> <?= $planDetail->address . " " . $planDetail->city . "-" .$planDetail->pin; ?></td>
                    <td colspan="2"><strong>Document Date:</strong> <?= date("d-M-Y"); ?></td>
                  </tr>
                  <tr>
                    <td colspan="2"><strong>Application No.:</strong> <?= 200 ?></td>
                    <td colspan="2"><strong>Customer No:</strong> <?= date("d-M-Y") ?></td>
                    <td colspan="2" rowspan="4">
                      <table id="innerTable" width="150">
                        <tr>
                          <td><strong>Particulars</strong></td>
                          <td><strong>Amount</strong></td>
                        </tr>
                        <tr>
                          <td>Investment</td>
                          <td><?= $planDetail->oneTimeInvestment ?></td>
                        </tr>
                        <tr>
                          <td>Late Charge</td>
                          <td>00.00</td>
                        </tr>
                        <tr>
                          <td>Revival Fees</td>
                          <td><?= "00" ?></td>
                        </tr>
                        <tr>
                          <td><strong>Total Amount</strong></td>
                          <td><?= "00" ?></td>
                        </tr>
                      </table>
                    </td>
                  </tr>

                  <tr>
                    <td colspan="2"><strong>Scheme Code:</strong> 108</td>
                    <td colspan="2"><strong>Term:</strong> <?= $planDetail->durationMonth ?> Months</td>
                  </tr>

                  <tr>
                    <td colspan="2">
                      <strong>Plan Code:</strong> 
                      <?php 
                        if($planDetail->planID == 1)
                          {echo "Loan";} 
                        if($planDetail->planID == 2)
                          {echo "Recurring";} 
                        if($planDetail->planID == 3)
                          {echo "Fixed Deposit";} 
                        if($planDetail->planID == 4)
                          {echo "NPS";} 
                      ?>
                    </td>
                    <td colspan="2"><strong>Maturity Amount:</strong> <?= $planDetail->meturity ?></td>
                  </tr>
                  <tr>
                    <td colspan="4">
                        <strong>Total Amount:</strong> 
                        <?= $planDetail->meturity ?> (<script> document.write(convert_number(<?= $planDetail->meturity ?>));</script> rupee only/-)
                    </td>
                  </tr>

                  <tr>
                    <td colspan="2"><strong>Member Code:</strong><?= "Pushpendra" ?></td>
                    <td colspan="2"><strong>Member Name:</strong><?= "9899K009" ?></td>
                    <td colspan="2" rowspan="4" valign="top">
                      <table id="innerTable1" width="150" style="border: 0px solid #FFF;">
                        <tr>
                          <td style="border: 0px solid #FFF; text-align:right;"><strong>Pay Type:</strong> Cash</td>
                        </tr>
                        <tr>
                          <td style="border: 0px solid #FFF; text-align:right;"><strong>Cheque No.:</strong> N/A</td>
                        </tr>
                        <tr>
                          <td style="border: 0px solid #FFF; text-align:right;"><strong>Cheque Date:</strong> N/A</td>
                        </tr>
                        <tr>
                          <td style="border: 0px solid #FFF; text-align:right;"><strong>Bank Name:</strong> N/A</td>
                        </tr>
                      </table>
                      </td>
                  </tr>

                  <tr>
                    <td colspan="2"><strong>Installment Paid:</strong> <?= 24 ?> to <?= 3 ?></td>
                    <td colspan="2"><strong>Installment Date:</strong> <?= date('d-M-Y') ?> to <?= date('d-M-Y') ?></td>
                  </tr>

                  <tr>
                    <td colspan="4">
                        <strong>Total Deposit Till Date:</strong> <?= 12345 ?>
                    </td>
                  </tr>

                  <tr>
                    <td colspan="2"><strong>Next Due Installment No.:</strong> <?= 4 ?></td>
                    <td colspan="2"><strong>Next Due Installment Date:</strong> <?= date('d-M-Y') ?></td>
                  </tr>

                  <tr>
                    <td colspan="6" style="text-align: center;">
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