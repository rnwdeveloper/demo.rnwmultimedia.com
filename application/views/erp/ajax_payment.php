                  <div class="new_lead_info_fill" id="first_forth_right_side">

                  <h6 class="lead_fill_title">Payments.*</h6> 

                  <div class="form-group">

                  <div class="table-responsive">

                  <table class="table table-sm"> 

                  <thead>

                    <tr class="sidetblth">

                    <th>S_No</th>

                    <th>Installment Date</th>

					          <th>Due Amount(₹)</th>

				            <th>Paid Amount(₹)</th>	

                    <th>Action</th>                      

                    </tr>

                  </thead>

                  <tbody>

                  <?php  $sno=1; foreach($adm_instalment as $val) { ?>

                    <tr class="sidetbltd">                  		                  

                <td><?php echo $sno; ?></td>

                <td><?php echo $val->installment_date; ?></td>

                <td><?php echo $val->due_amount; ?></td>

                <td><?php echo $val->paid_amount; ?></td>

                <td>
                  <!-- Small button groups (default and split) -->
              <div class="btn-group">
                <button class="btn-sm btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Action
                </button>
                <div class="dropdown-menu">
                 <button class="dropdown-item" type="button" onclick="return unpaid_ammount(<?php echo $val->admission_installment_id; ?>)"><i class="fas fa-pen-square" ></i>Make Payment</button>
                </div>
              </div>
                </td>

		         	</tr>

				    	<?php $sno++; }?>

                   

                  </tbody>

                </table>

                </div>

                  </div>

                </div>

              </div>


<!-- Modal -->
<div class="modal fade" id="paymeny_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content" id="installment_all_data">
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>


  <script type="text/javascript">
                
  function unpaid_ammount(admission_installment_id='')
   {
   
     $('#paymeny_modal').modal('show');
   
     $.ajax({
   
       url : "<?php echo base_url(); ?>AddmissionController/intsalment_Unpaidpayment",
   
       type : "post",
   
       data:{
   
         'admission_installment_id' : admission_installment_id
   
       },
   
       success:function(Response)
   
       {
   
         $('#paymeny_modal').modal('show');
   
         $('#installment_all_data').html(Response);
   
       }
   
     });
   
   }
</script>

                    

                    

                    