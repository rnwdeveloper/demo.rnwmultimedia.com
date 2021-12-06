      <div class="table-responsive">
      <table class="table table-bordered table-hover bg-table" id="tableExport" style="width:100%;">
        <thead>
          <tr>
            <th>No</th>
            <th>Installment Date</th>
            <th>Due Amount(₹)</th>
            <th>Paid Amount(₹)</th>
            <th>Paid Date</th>
            <th>Paid Status</th>
            <th>Receipt No</th>
          </tr>
        </thead>
        <tbody>
          <?php  $sno=1; foreach($adm_instalment as $val) { ?>
            <?php if($val->payment_type == "Adjustment Payment") { $classpayment = 'deposit'; $paymode = "Adjustment"; } else { $classpayment = '';  $paymode = $val->payment_mode; } ?>
          <tr>
             <td><?php echo $sno; ?></td>
             <td onclick="return ins_date_change(<?php echo $val->admission_installment_id; ?>)"><?php echo $val->installment_date; ?></td>
             <td>
              <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $val->due_amount; ?>
              </button>
              <div class="dropdown-menu">
            <?php if($val->cheque_status=="Cheque Collected" ||  $val->cheque_status=="Deposit IN Bank") { ?>
                <a class="dropdown-item has-icon" href="#"><i class="spinner-border text-warning spinner-border-sm"></i>Cheque Proccessing</a>
                <?php } else { ?>
                  <?php if(empty($val->paid_amount)) { ?> 
                  <a class="dropdown-item has-icon" href="#" onclick="return unpaid_ammount(<?php echo $val->admission_installment_id; ?>)"><i class="fas fa-pen"></i> Make Payment</a>
                <?php } ?>
                
                  <?php if(!empty($val->paid_amount && $val->payment_type != "Adjustment Payment")) { ?>
                  <a target="_blank" class="dropdown-item has-icon" href="<?php echo base_url(); ?>Admission/receipt_view?action=hjkl&qwxy=<?php echo $val->admission_installment_id; ?>"><i class="fas fa-pen"></i> Receipt</a>
                <?php }  ?>
              </div>
              <?php } ?>
              </td>
             <td class="<?php echo $classpayment; ?>"><?php echo $val->paid_amount; ?></td>
             <td><?php if($val->paid_amount=="") { echo ""; } else { echo $val->pay_date; } ?></td>
             <td class="<?php echo $classpayment; ?>"><?php if($val->paid_amount=="") { echo ""; } else { echo $paymode; } ?></td>
             <td><?php if($val->paid_amount=="") { echo ""; } else { $insids = explode(",", $val->admission_installment_id);
              foreach ($list_receipt as $row) {
                if (in_array($row->intallment_id, $insids)) {
                  echo $row->receipt_no;
                }
              } }?></td>
            <!-- <td>
              <div class="dropdown d-inline">
              <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Action
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item has-icon" href="#" onclick="return unpaid_ammount(<?php echo $val->admission_installment_id; ?>)"><i class="fas fa-pen"></i> Make Payment</a>
              </div>
            </div>
            </td>  -->
          </tr>
          <?php $sno++; } ?>
        </tbody>
      </table>
    </div>

  <script type="text/javascript">          
  function unpaid_ammount(admission_installment_id=''){
     $('.payment-lg').modal('show');
     $.ajax({
       url : "<?php echo base_url(); ?>Admission/ErpUpdPayment",
       type : "post",
       data:{'admission_installment_id' : admission_installment_id },
       success:function(Response){
         $('.payment-lg').modal('show');
   
         $('.paymeny_installment_data').html(Response);
       }
     });
   }

   function ins_date_change(admission_installment_id=''){
     $('.insupddate').modal('show');
     $.ajax({
       url : "<?php echo base_url(); ?>Admission/Erpchange_insdate",
       type : "post",
       data:{'admission_installment_id' : admission_installment_id },
       success:function(Response){
         $('.insupddate').modal('show');
   
         $('.insdate_reco').html(Response);
       }
     });
   }
</script>