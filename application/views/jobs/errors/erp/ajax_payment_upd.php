<style type="text/css">
   label{
   font-size: 12px;
   margin-bottom: 5px !important;
   }
   .form-control{
   height: 24px !important;
   font-size: 12px !important;
   padding: 0 0 0 10px;
   }
   select.form-control:not([size]):not([multiple]) {
   height: calc(1.7rem + 2px);
   }
   .form-group{
   margin-bottom: 5px;
   }
</style>
<?php
   date_default_timezone_set("Asia/Calcutta");
   
       $Payment_date = date('Y-d-m');
    ?>
<div class="modal-header">
   <h5 class="modal-title"><b>Payment</b></h5>
   <div class="btn-group">
      <span id="data_msg"></span>
   </div>
</div>
<div class="modal-body">
<div class="row">
   <div class="col-xl-12">
      <div id="msg_instll"></div>
      <form  enctype="multipart/form-data" method="post">
         <input type="hidden" name="upd_intalment_id" id="upd_intalment_id" value="<?php echo  $adm_instalment->admission_installment_id; ?>">
         <div class="simple_border_box_design">
            <span class="addmision_process_top_title">Mark Payment</span>
            <div class="form-row" style="margin-top: -18px;">
               <div class="col-md-6">
                  <div class="form-group">
                     <label><b>Branch:<span style="color: red;">*</span></b> <span class="p-3"><?php $branchids = explode(",",$admission_data->branch_id); foreach($list_branch as $row) { if(in_array($row->branch_id,$branchids)) {  echo $row->branch_code; }  } ?></span></label>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label><b class="p-3">Name:<span style="color: red;">*</span></b> <?php echo $admission_data->surname; ?> <?php echo $admission_data->first_name; ?></label>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label><b>Due Amount(₹):<span style="color: red;">*</span></b> <span class="p-3"><?php echo $adm_instalment->due_amount; ?> <span style="color: red;">(Including Unpaid Cheque Or Do<br><span style="margin-left: 152px;"> Amout)</span></span></label>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label><b class="p-3">Total Amount(₹):<span style="color: red;">*</span></b> <?php echo $adm_instalment->due_amount; ?></label>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label><b class="p-0">Payment Date(₹):<span style="color: red;">*</span></b> </label>  
                     <span class="p-2"><input type="text" name="payment_date" id="payment_date" value="<?php echo $Payment_date; ?>"  class="form-control custom-form-control" placeholder="Payment Date" /></span>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label><b class="p-3">Paying Amount(₹):<span style="color: red;">*</span></b> </label>  
                     <input type="text" class="form-control custom-form-control" name="paying_amount" id="paying_amount" value="<?php echo $adm_instalment->due_amount; ?>" />
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label><b class="p-0">Payment Type(₹):<span style="color: red;">*</span></b> </label>  
                     <div class="form-check-inline">
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="payment_type" id="payment_type" value="Regular Payment" <?php echo "checked"; ?>>Payment
                        </label>
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label><b class="p-3">Payment Mode(₹):<span style="color: red;">*</span></b> </label>  
                     <select class="form-control custom-form-control" name="payment_mode" id="payment_mode" required="">
                        <option value="">Select Mode</option>
                        <option <?php { echo "selected"; } ?> value="Cash">Cash</option>
                        <option value="Cheque">Cheque</option>
                        <option value="DD">DD</option>
                        <option value="Credit Card">Credit Card</option>
                        <option value="NEFT / IMPS">NEFT / IMPS</option>
                        <option value="Payment">Payment</option>
                        <option value="Bank Deposit (Cash)">Bank Deposit (Cash)</option>
                        <option value="Capital Float (EMI)">Capital Float (EMI)</option>
                        <option value="Google Pay">Google Pay</option>
                        <option value="Phone Pay">Phone Pay</option>
                        <option value="Bajaj Finserv (EMI)">Bajaj Finserv (EMI)</option>
                        <option value="BHIM/UPI(India)">BHIM/UPI(India)</option>
                        <option value="Intamojo">Intamojo</option>
                        <option value="Paypal">Paypal</option>
                     </select>
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="form-group">
                     <label><b class="p-0">Comments:<span style="color: red;">*</span></b> </label>  
                     <textarea class="form-control" name="comments" id="comments" placeholder="Remarks..." style="height: 65px !important;"></textarea>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label><b class="p-0">SEND SMS TO STUDENT:<span style="color: red;">*</span></b> </label>  
                     <div class="form-check-inline">
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="send_sms_student" id="sms_student_yes" value="yes">YES
                        </label>
                     </div>
                     <div class="form-check-inline">
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="send_sms_student"  id="sms_student_no" value="no" >NO
                        </label>
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label><b class="p-3">SEND EMAIL TO STUDENT:<span style="color: red;">*</span></b> </label>  
                     <div class="form-check-inline">
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="send_email_student" id="email_student_yes" value="yes">YES
                        </label>
                     </div>
                     <div class="form-check-inline">
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="send_email_student" id="email_student_no" value="no" >NO
                        </label>
                     </div>
                  </div>
               </div>
                    <div class="col-md-6">
                  <div class="form-group">
                     <label><b class="p-0">SEND SMS TO Parents:<span style="color: red;">*</span></b> </label>  
                     <div class="form-check-inline">
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="send_sms_parents" id="sms_parents_yes" value="yes" >YES
                        </label>
                     </div>
                     <div class="form-check-inline">
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="send_sms_parents"  id="sms_parents_no" value="no" >NO
                        </label>
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label><b class="p-3">SEND EMAIL TO Parents:<span style="color: red;">*</span></b> </label>  
                     <div class="form-check-inline">
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="send_email_parents" id="sms_psrents_yes" value="yes" >YES
                        </label>
                     </div>
                     <div class="form-check-inline">
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="send_email_parents" id="sms_parentd_no" value="no" >NO
                        </label>
                     </div>
                  </div>
               </div>
            </div>
         </div>
   </div>
</div>
<button type="submit" id="paid_payment" class="btn btn-primary">Save</button>
</form>   
<!-- <div class="custom-control custom-checkbox">
   <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
   
   </div> -->


   <script type="text/javascript">

         $('#paid_payment').on('click',function(){

            var upd_intalment_id = $('#upd_intalment_id').val();

            var payment_date = $('#payment_date').val();

            var payment_type = $('#payment_type').val();  

            var payment_mode = $('#payment_mode').val();

            var paying_amount = $('#paying_amount').val();

            var comments = $('#comments').val();

            var send_sms_student = $('#sms_student_yes').val();

            var send_sms_student = $('#sms_student_no').val();

            var send_email_student = $('#email_student_yes').val();

            var send_email_student = $('#email_student_no').val();

            var send_sms_parents = $('#sms_parents_yes').val();

            var send_sms_parents = $('#sms_parents_no').val();

            var send_email_parents = $('#email_student_yes').val();

            var send_email_parents = $('#email_student_no').val();
 
          $.ajax({
           type : "POST",
           url  : "<?php echo base_url()?>AddmissionController/upd_intsallment",
           data : {'upd_intalment_id' : upd_intalment_id ,'payment_date' : payment_date ,'payment_type' : payment_type ,'payment_mode' : payment_mode ,'paying_amount' : paying_amount ,'comments' : comments ,'send_sms_student' : send_sms_student ,'send_email_student' : send_email_student ,'send_sms_parents' : send_sms_parents ,'send_email_parents' : send_email_parents},
           success: function(resp)
           {
               var data = $.parseJSON(resp);

               var ddd = data['all_record'].status;

               //alert(ddd);
               if(ddd == '1')
               {
                   $('#data_msg').fadeIn();

                   $('#data_msg').html("<div class='btn btn-sm bg-light ml-4'><b style='color: green;'>You Have Completed The Installation Of Your Fees</b></div>");

                   $('#data_msg').fadeOut(4000);
                   
               }
               else
               {
                  $('#data_msg').fadeIn();

                   $('#data_msg').html("<div class='btn btn-sm bg-light ml-4'><b style='color: red;'>Someting Wrong!!</b></div>");

                   $('#data_msg').fadeOut(4000);
               }

               //location.reload('erp/ajax_payment.php');
           }
       });
      return false;

        });
    </script>


