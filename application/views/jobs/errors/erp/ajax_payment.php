                  <div class="new_lead_info_fill" id="first_forth_right_side">

                  <h6 class="lead_fill_title">Payments.*</h6> 

                  <div class="form-group">

                  <div class="table-responsive">

                  <table class="table table-sm"> 

                  <thead>

                    <tr class="sidetblth">

                    <th>SNo</th>

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
              <div class="dropdown">
              <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Action
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <button class="dropdown-item" type="button" onclick="return baki_payment(<?php echo $val->admission_installment_id; ?>);" >Make Payment</button>
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


<div class="modal fade" id="instalmet_unpaid" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
     <!--  <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> -->
     
       <div id="payment_instalment">
         
       </div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div> -->
  </div>
</div>
                    

                    
<script type="text/javascript">
  
  function baki_payment(admission_installment_id=''){

     $('#instalmet_unpaid').modal('show');
   $.ajax({

     url : "<?php echo base_url(); ?>AddmissionController/intsalment_Unpaidpayment",

     type:"post",

     data:{

       'admission_installment_id':admission_installment_id 

     },

     success:function(Resp){

       $('#instalmet_unpaid').modal('show');

       $('#payment_instalment').html(Resp);

     }

   });

 }
</script>
                    