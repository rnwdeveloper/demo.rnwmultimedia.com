        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><b>Intallment Payment</b><span id="msg_installm"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
      
        <div class="row">

        <div class="col-xl-12">

            <input type="hidden" name="upd_intalment_id" id="upd_intalment_id" value="<?php echo $adm_instalment->admission_installment_id; ?>">

            <div class="simple_border_box_design">

              <span class="addmision_process_top_title">Make Payment</span>

              <div class="form-row" style="margin-top: -18px;">

                  <div class="col-md-12">
                    <div class="row">

                      <div class="col-md-6">
                        <div class="form-group">
                        <label class="p-1"><b>Branch:</b><span style="color: red;">*</span></label>
                        <span class="p-2"><?php $branch_ids = explode(",",$admission_data->branch_id);
                                    foreach($list_branch as $row) { if(in_array($row->branch_id,$branch_ids)) {  echo $row->branch_name; }  } ?></span>
                          </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                        <label class="p-1"><b>Name:</b><span style="color: red;">*</span></label>
                        <span class="p-2"><?php echo $admission_data->surname; ?> <?php echo $admission_data->first_name; ?></span>
                      </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                        <label class="p-1"><b>Due Amount(₹):</b><span style="color: red;">*</span><span class="p-2"><?php echo $adm_instalment->due_amount; ?></span><span style="color: red;">(Including Unpaid Cheque Or Do <br> Amount)</span></label>
                      </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                        <label class="p-1"><b>Total Amount(₹):</b><span style="color: red;">*</span></label>
                        <span class="p-2"><?php echo $adm_instalment->due_amount; ?></span>
                      </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                        <label class="p-1"><b>Payment Type</b><span style="color: red;">*</span></label>
                       <div class="form-check form-check-inline">

                                  <input class="form-check-input" type="radio" id="payment_type" name="payment_type" value="Regular Payment" <?php { echo "checked"; } ?>/>Regular Payment

                              </div>
                      </div>
                      </div>
                     
                      
                   <div class="col-md-6">
                      <div class="form-group">
                      <label class="1"><b>Paying Amount:</b><span style="color: red;">*</span></label>
                      <input type="text" id="paying_amount" name="paying_amount" value="<?php echo $adm_instalment->due_amount; ?>"  class="form-control" aria-describedby="passwordHelpInline">
                    </div> 
                  </div>

                  <?php date_default_timezone_set("Asia/Calcutta"); $today = date('Y-m-d'); ?>
                  <div class="col-md-6">
                      <div class="form-group">
                      <label class="p-1"><b>Payment Date:</b><span style="color: red;">*</span></label>
                      <input type="text" id="installment_date" name="installment_date" value="<?php echo $today; ?>"  class="form-control" aria-describedby="passwordHelpInline">
                    </div> 
                  </div>

                  <div class="col-md-6">
                      <div class="form-group">
                      <label class="p-1"><b>Payment Mode:</b><span style="color: red;">*</span></label>
                      <select class="form-control"  name="payment_mode" id="payment_mode">
                      <option value="Cash">Cash</option>
                      <option value="Cheque">Cheque</option>
                      <option value="DD">DD</option>
                      <option value="Credit Card">Credit Card</option>
                      <option value="Debit Card">Debit Card</option>
                      <option value="Online Payment">Online Payment</option>
                      <option value="NEFT / IMPS">NEFT / IMPS</option>
                      <option value="Payment">Payment</option>
                      <option value="Banck Deposit (Cash)">Banck Deposit (Cash)</option>
                      <option value="Capital Float (EMI)">Capital Float (EMI)</option>
                      <option value="Google Pay">Google Pay</option>
                      <option value="Phone Pay">Phone Pay</option>
                      <option value="Bajaj Finserv (EMI)">Bajaj Finserv (EMI)</option>
                      <option value="Bhim UPI(India)">Bhim UPI(India)</option>
                      <option value="Instamojo">Instamojo</option>
                      <option value="Paypal">Paypal</option>
                      </select>
                    </div> 
                  </div>

                  <div class="col-md-12">
                      <div class="form-group">
                      <label class="p-1"><b>Comments:</b><span style="color: red;">*</span></label>
                      <textarea class="form-control" name="comments" id="comments" placeholder="Remarks" rows="3"></textarea>
                    </div> 
                  </div>

                  <div class="col-md-6">
                      <div class="form-group">
                      <label class="p-1"><b>Send Email To Student :</b><span style="color: red;">*</span></label>
                      <div class="form-check form-check-inline">
                       <input class="form-check-input" type="radio" id="" name="send_email_student" value="yes"/>Yes
                       <input class="form-check-input" type="radio" id="" name="send_email_student" value="no" <?php { echo "checked"; } ?>/>No
                    </div>
                    </div> 
                  </div>

                  <div class="col-md-6">
                      <div class="form-group">
                      <label class="p-1"><b>Send Sms To Student :</b><span style="color: red;">*</span></label>
                      <div class="form-check form-check-inline">
                       <input class="form-check-input" type="radio" id="" name="send_sms_student" value="yes"/>Yes
                       <input class="form-check-input" type="radio" id="" name="send_sms_student" value="no" <?php { echo "checked"; } ?>/>No
                    </div>
                    </div> 
                  </div>

                  <div class="col-md-6">
                      <div class="form-group">
                      <label class="p-1"><b>Send Email To Parents :</b><span style="color: red;">*</span></label>
                      <div class="form-check form-check-inline">
                       <input class="form-check-input" type="radio" id="" name="send_email_parents" value="yes"/>Yes
                       <input class="form-check-input" type="radio" id="" name="send_email_parents" value="no" <?php { echo "checked"; } ?>/>No
                    </div>
                    </div> 
                  </div>

                  <div class="col-md-6">
                      <div class="form-group">
                      <label class="p-1"><b>Send Sms To Parents :</b><span style="color: red;">*</span></label>
                      <div class="form-check form-check-inline">
                       <input class="form-check-input" type="radio" id="" name="send_sms_parents" value="yes"/>Yes
                       <input class="form-check-input" type="radio" id="" name="send_sms_parents" value="no" <?php { echo "checked"; } ?>/>No
                    </div>
                    </div> 
                  </div>

                    </div>
                  </div>
              
              </div>

            </div>

            <input type="submit" name="upd_intallment" class="btn-sm btn-success" id="upd_intallment" value="Save">

        </div>

      </div>

       </div>


      <script type="text/javascript">
   $('#upd_intallment').on('click',function(){
   
         var upd_intalment_id = $('#upd_intalment_id').val();

         var comments = $('#comments').val();
   
         var paying_amount = $('#paying_amount').val();
   
         var payment_type = $('#payment_type').val(); 

         var payment_mode = $('#payment_mode').val(); 
  
        var send_email_student = $('input[name="send_email_student"]:checked').val();

        var send_sms_student = $('input[name="send_sms_student"]:checked').val();

        var send_email_parents = $('input[name="send_email_parents"]:checked').val();

        var send_sms_parents = $('input[name="send_sms_parents"]:checked').val();
  
         $.ajax({
   
             type : "POST",
   
             url  : "<?php echo base_url()?>AddmissionController/upd_intsallment",
  
             data : {'upd_intalment_id' : upd_intalment_id ,  'paying_amount' : paying_amount , 'payment_type' : payment_type , 'payment_mode' : payment_mode , 'comments' : comments ,'send_email_student' : send_email_student , 'send_sms_student' : send_sms_student , 'send_email_parents' : send_email_parents , 'send_sms_parents' : send_sms_parents },
   
             success: function(resp){
   
                  var data = $.parseJSON(resp);
                  var ddd = data['all_record'].status;
                  if(ddd == '1')
                  {
                      $('#msg_installm').fadeIn();
                      $('#msg_installm').html("<div class='btn btn-sm bg-light ml-4'><b style='color: green;'>HI! You Have Completed The Installation Of Your Fees</b></div>");
                      $('#msg_installm').fadeOut(5000);
                  }
                  else if(ddd == '3')
                  {
                      $('#msg_installm').fadeIn();
                      $('#msg_installm').html("<div class='btn btn-sm bg-light ml-4'><b style='color: green;'>HI! You Have Completed The Split Installation Of Your Fees</b></div>");
                      $('#msg_installm').fadeOut(5000);
                  }
                  else
                  {
                    $('#msg_installm').fadeIn();
                      $('#msg_installm').html("<div class='btn btn-sm bg-light ml-4'><b style='color: red;'>Someting Wrong!!</b></div>");
                      $('#msg_installm').fadeOut(5000);
                  }
             }
   
         });
   
         return false;
   
     });
   
</script>