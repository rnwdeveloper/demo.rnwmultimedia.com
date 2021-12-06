
        <div class="row">

        <div class="col-xl-12">

          <form  class="form-inline" enctype="multipart/form-data" method="post">

            <input type="hidden" name="adm_update_id" id="adm_update_id" value="<?php echo $adm_instalment->admission_installment_id; ?>">

            <div class="simple_border_box_design">

              <span class="addmision_process_top_title">Make Payment</span>

              <div class="form-row" style="margin-top: -18px;">

                  <div class="col-md-12">
                    <div class="row">

                      <div class="col-md-6">
                        <label class="p-1"><b>Branch:</b><span style="color: red;">*</span><span class="p-2"><?php $branch_ids = explode(",",$admission_data->branch_id);
                                    foreach($list_branch as $row) { if(in_array($row->branch_id,$branch_ids)) {  echo $row->branch_name; }  } ?></span></label>

                      </div>

                      <div class="col-md-6">
                        <label class="p-2"><b>Name:</b><span style="color: red;">*</span><span class="p-2"><?php echo $admission_data->surname; ?> <?php echo $admission_data->first_name; ?></span></label>

                      </div>

                      <div class="col-md-6">
                        <label class="p-1"><b>Due Amount(₹):</b><span style="color: red;">*</span><span class="p-2"><?php echo $adm_instalment->due_amount; ?></span><span style="color: red;">(Including Unpaid Cheque Or Do Amount)</span></label>

                      </div>

                      <div class="col-md-6">
                        <label class="p-1"><b>Total Amount(₹):</b><span style="color: red;">*</span><span class="p-2"><?php echo $adm_instalment->due_amount; ?></span></label>

                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                        <label class="p-1"><b>Payment Type</b><span style="color: red;">*</span></label>
                       <div class="form-check form-check-inline">

                                  <input class="form-check-input" type="radio" id="course_package" name="payment_type" value="Regular Payment" <?php { echo "checked"; } ?>/>Regular Payment

                              </div>
                      </div>
                      </div>
                     
                      
                   <div class="col-md-6">
                      <div class="form-group">
                      <label class="p-2"><b>Paying Amount:</b><span style="color: red;">*</span></label>
                      <input type="text" id="installment_date" name="installment_date" value="<?php echo $adm_instalment->due_amount; ?>"  class="form-control" aria-describedby="passwordHelpInline">
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
                      <label class="p-2"><b>Payment Mode:</b><span style="color: red;">*</span></label>
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
                      <textarea class="form-control" name="remraks" id="remarks" rows="3"></textarea>
                    </div> 
                  </div>

                    </div>
                  </div>
              

              </div>

            </div>

          </form>

        </div>

      </div>