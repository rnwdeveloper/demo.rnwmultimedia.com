<div class="table-responsive">
      <table class="table table-bordered table-hover bg-table" id="tableExport" style="width:100%;">
        <thead>
          <tr>
            <th>Sem</th>
            <th>Installment Date</th>
            <th>Due Amount(₹)</th>
            <th>Paid Amount(₹)</th>
            <!-- <th>Action</th> -->
          </tr>
        </thead>
        <tbody>
          <?php foreach($list_clg_installment as $ins) { ?>
          <?php for($i=0; $i<sizeof($ins); $i++) { ?>
          <tr>
             <td><?php echo $ins[$i]->installment_no; ?></td>
             <td><?php echo $ins[$i]->installment_date; ?></td>
             <td>
              <button class="btn btn-<?php echo $ins[$i]->pay_done_status; ?> dropdown-toggle" type="button" id="dropdownMenuButton2"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $ins[$i]->due_amount; ?>
              </button>
              <div class="dropdown-menu">
                <?php if(empty($ins[$i]->paid_amount)) { ?>
                  <a class="dropdown-item has-icon" href="#" onclick="return unpaid_ammount(<?php echo $ins[$i]->admission_installment_id; ?>)"><i class="fas fa-pen"></i> Make Payment</a>
                <?php } ?>

                 <?php if(!empty($ins[$i]->paid_amount)) { ?>
                <a target="_blank" class="dropdown-item has-icon" href="<?php echo base_url(); ?>Admission/Insreceipt?action=Ins&Rec=<?php echo @$ins[$i]->admission_installment_id; ?>"><i class="fas fa-pen"></i> Receipt</a>
              <?php } ?>
              </div>
              </td>
             <td><?php echo $ins[$i]->paid_amount; ?></td>
          </tr>
          <?php } } ?>
        </tbody>
      </table>
    </div>

  <script type="text/javascript">          
  function unpaid_ammount(admission_installment_id='')
   {
     $('.payment-lg').modal('show');
     $.ajax({
       url : "<?php echo base_url(); ?>Admission/ErpUpdPayment",
       type : "post",
       data:{'admission_installment_id' : admission_installment_id },
       success:function(Response)
       {
         $('.payment-lg').modal('show');
   
         $('.paymeny_installment_data').html(Response);
       }
   
     });
   
   }
</script>