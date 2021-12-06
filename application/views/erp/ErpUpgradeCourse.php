<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css"> 
<div class="row">
   <div class="col-lg-12">
      <div class="card">
         <div class="card-body p-3">
         <form method="post" name="add_form" id="add_form">
         <div id="upgraded_msg"></div>
         <body>
         <table>
            <tr>
            <div class="row">
              <input type="hidden" id="total_calculate_data" value="0">
               <input type="hidden" name="admission_id" id="admission_id" value="<?php echo $adm_record->admission_id; ?>">
               <div class="col-lg-4 col-md-6 col-sm-6 form-group">
                  <label class="d-block">Course Category</label>
                  <div class="pretty p-icon p-jelly p-round p-bigger">
                     <input class="form-check-input" type="radio" id="course_single_package" name="type" value="package" 
                     onclick="return co_pa()">
                     <div class="state p-info">
                        <i class="icon material-icons">done</i>
                        <label>Package</label>
                     </div>
                  </div>
                  <div class="pretty p-icon p-jelly p-round p-bigger">
                     <input class="form-check-input" type="radio" id="course_single_package" name="type" value="single" 
                     onclick="return co_pa()">
                     <div class="state p-info">
                        <i class="icon material-icons">done</i>
                        <label>Single</label>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6 col-sm-6 select_course_package form-group">
                  <label>Select Package</label>
                  <select class="form-control" name="course_or_package" id="course_orpackage">
                     <option value="">Select Package</option>
                     <?php foreach ($list_package as $lp) { ?>
                     <option value="<?php echo $lp->package_id; ?>"><?php echo $lp->package_name; ?></option>
                     <?php } ?>
                  </select>
               </div>
               <div class="col-lg-4 col-md-6 col-sm-6 select_course_single form-group">
                  <label>Select Course*</label>
                  <select class="form-control" name="course_or_single" id="course_orsingle" >
                     <option value="">Select Course</option>
                     <?php foreach ($list_course as $lp) { ?>
                     <option value="<?php echo $lp->course_id; ?>"><?php echo $lp->course_name; ?></option>
                     <?php } ?>
                  </select>


                  <label>Select SubCourse*</label>
                  <select class="form-control" name="course_or_subcourses" id="course_or_subcourses">
                     <option value="">Select Course</option>
                     <?php foreach ($list_subcourse as $lp) { ?>
                     <option value="<?php echo $lp->subcourse_id; ?>"><?php echo $lp->subcourse_name; ?></option>
                     <?php } ?>
                  </select>


               </div>
               <div class="col-lg-4 col-md-6 col-sm-6 add_single_course form-group">
                    <div class="upcourse-list text-center mt-3 mb-3">
                        <input type="button" id="add" value="+" onclick="Javascript:addRow()" class="btn btn-sm btn-success" style="border-radius: 50% !important;width: 30px;height: 30px;padding: 0;">
                    </div>
               </div>
            </div>
            </tr>
         </table>
               <div class="col-md-12">
                  <div id="mydata">
                     <table id="myTableData" class="table create_responsive_table bg-table">
                           <tr style="background-color: #5360b5; color:azure;">
                              <th width="2" style="height: 32px !important;font-size: 12px;">Trash</th>
                              <th style="height: 32px !important;font-size: 12px;">Course Name</th>
                              <th style="height: 32px !important;font-size: 12px;">Course Fees</th>
                           </tr>
                     </table>
                     &nbsp;
                  </div>
               </div>
               </body>
               </div>
         </div>
      </div>
      <div class="card">
      <div class="card-body p-2 row pt-3">
               <div class="col-md-4">
                    <div class="form-group">
                        <label for="">
                        Tution Fee (₹):*
                        </label>
                        <input type="text" class="form-control" name="tuation_fees" id="sub_total_ids" placeholder="Tution Fee"/>
                    </div>
               </div>
               <div class="col-md-4">
                    <div class="form-group">
                        <label for="">
                        Registration Fees (₹):
                        </label>
                        <input type="text" class="form-control" name="registration_fees" id="registration_fees" placeholder="Registration Fees" />
                    </div>
               </div>
               <div class="col-md-4">
                    <div class="form-group">
                        <label for="">
                        Sub Total Fees (₹):*
                        </label>
                        <input type="text" class="form-control" name="sub_total" id="sub_total_id" placeholder="Sub Total Fees"/>
                    </div>
               </div>
               <div class="form-group col-md-4">
              <label for="inputEmail4">Payment Mode</label>
              <select class="form-control payment-mode" name="payment_mode" id="payment_mode" onchange="paymenttype(this)" required="required">
                <option value="">Select Mode</option>
                <option value="Cash">Cash</option>
                <option value="Cheque">Cheque</option>
                <option value="DD">DD</option>
                <option value="Credit Card">Credit Card</option>
                <option value="Debit Card">Debit Card</option>
                <option value="Online Payment">Online Payment</option>
                <option value="NEFT / IMPS">NEFT / IMPS</option>
                <option value="Paytm">Paytm</option>
                <option value="Banck Deposit (Cash)">Bank Deposit (Cash)</option>
                <option value="Capital Float (EMI)">Capital Float (EMI)</option>
                <option value="Google Pay">Google Pay</option>
                <option value="Phone Pay">Phone Pay</option>
                <option value="Bajaj Finserv (EMI)">Bajaj Finserv (EMI)</option>
                <option value="Bhim UPI(India)">Bhim UPI(India)</option>
                <option value="Instamojo">Instamojo</option>
                <option value="Paypal">Paypal</option>
                <option value="Razorpay">Razorpay</option>
              </select>
            </div>
            <div class="col-lg-4 Cheque-Hidden">
              <div class="form-group">
                <label>Cheque Holder Name</label>
                <input type="text" class="form-control cheque-holder-name" name="cheque_holder_name" id="cheque_holder_name" placeholder="Cheque Holder Name">
              </div>
            </div>
            <div class="col-lg-4 Cheque-Hidden">
              <div class="form-group">
                <label>Cheque/DD No</label>
                <input type="text" class="form-control cheque-no" name="cheque_dd_no" id="cheque_dd_no" placeholder="Cheque/DD No">
              </div>
            </div>
            <div class="col-lg-4 Cheque-Hidden">
              <div class="form-group">
                <label>Cheque/DD Date</label>
                <input type="date" class="form-control cheque-date" name="cheque_dd_date" id="cheque_dd_date" placeholder="Cheque/DD Date">
              </div>
            </div>
            <div class="col-lg-4 Cheque-Hidden">
              <div class="form-group">
                <label>Bank Name</label>
                <input type="text" class="form-control bank-name" name="bank_name" id="bank_name" placeholder="Bnck Name">
              </div>
            </div>
            <div class="col-lg-4 Cheque-Hidden">
              <div class="form-group">
                <label>Bank Branch Name</label>
                <input type="text" class="form-control bank-branch-name" name="bank_branch_name" id="bank_branch_name" placeholder="Bank Branch Name">
              </div>
            </div>
            <div class="col-lg-4 Cheque-Hidden">
              <div class="form-group">
                <label>Cheque Status</label>
                <select class="form-control cheque-status" name="cheque_status" id="cheque_status">
                  <option value="">Select</option>
                  <option value="Paid/Cleared">Paid/Cleared</option>
                  <option value="Deposit IN Bank">Deposit IN Bank</option>
                  <option value="Cheque Collected">Cheque Collected</option>
                </select>
              </div>
            </div>
            <div class="col-lg-4 Dd-Hidden">
              <div class="form-group">
                <label>Cheque Holder Name</label>
                <input type="text" class="form-control dd-cheque-holder-name" name="dd_cheque_holder_name" id="dd_cheque_holder_name" placeholder="Cheque Holder Name">
              </div>
            </div>
            <div class="col-lg-4 Dd-Hidden">
              <div class="form-group">
                <label>Cheque/DD No</label>
                <input type="text" class="form-control dd-cheque-no" name="dd_cheque_dd_no" id="dd_cheque_dd_no" placeholder="Cheque/DD No">
              </div>
            </div>
            <div class="col-lg-4 Dd-Hidden">
              <div class="form-group">
                <label>Cheque/DD Date</label>
                <input type="date" class="form-control dd-cheque-date" name="dd_cheque_dd_date" id="dd_cheque_dd_date" placeholder="Cheque/DD Date">
              </div>
            </div>
            <div class="col-lg-4 Dd-Hidden">
              <div class="form-group">
                <label>Bank Name</label>
                <input type="text" class="form-control dd-bank-name" name="dd_bank_name" id="dd_bank_name" placeholder="Bnck Name">
              </div>
            </div>
            <div class="col-lg-4 Dd-Hidden">
              <div class="form-group">
                <label>Bank Branch Name</label>
                <input type="text" class="form-control dd-bank-branch-name" name="dd_bank_branch_name" id="dd_bank_branch_name" placeholder="Bank Branch Name">
              </div>
            </div>
            <div class="col-lg-4 Dd-Hidden">
              <div class="form-group">
                <label>Cheque Status</label>
                <select class="form-control dd-cheque-status" name="dd_cheque_status" id="dd_cheque_status">
                  <option value="">Select</option>
                  <option value="Paid/Cleared">Paid/Cleared</option>
                  <option value="Deposit IN Bank">Deposit IN Bank</option>
                  <option value="Cheque Collected">Cheque Collected</option>
                </select>
              </div>
            </div>
            <div class="col-lg-4 Cradit-Card">
              <div class="form-group">
                <label>Transaction No</label>
                <input type="text" class="form-control credit-transaction-no" name="cradit_card_transaction_no" id="cradit_card_transaction_no" placeholder="Transaction ID">
              </div>
            </div>
            <div class="col-lg-4 Cradit-Card">
              <div class="form-group">
                <label>Transaction Date</label>
                <input type="date" class="form-control cradit-transaction-date" name="cradit_card_transaction_date" id="credit_card_transaction_date" placeholder="Transaction Date">
              </div>
            </div>
            <div class="col-lg-4 Debit-Card">
              <div class="form-group">
                <label>Transaction No</label>
                <input type="text" class="form-control debit-transaction-no" name="debit_card_transaction_no" id="debit_card_transaction_no" placeholder="Transaction ID">
              </div>
            </div>
            <div class="col-lg-4 Debit-Card">
              <div class="form-group">
                <label>Transaction Date</label>
                <input type="date" class="form-control debit-transaction-date" name="debit_card_transaction_date" id="debit_card_transaction_date" placeholder="Transaction Date">
              </div>
            </div>
            <div class="col-lg-4 Online-Payment">
              <div class="form-group">
                <label>Transaction No</label>
                <input type="text" class="form-control online-transaction-no" name="online_payment_transaction_no" id="online_payment_transaction_no" placeholder="Transaction ID">
              </div>
            </div>
            <div class="col-lg-4 Online-Payment">
              <div class="form-group">
                <label>Transaction Date</label>
                <input type="date" class="form-control online-transaction-date" name="online_payment_transaction_date" id="online_payment_transaction_date" placeholder="Transaction Date">
              </div>
            </div>
            <div class="col-lg-4 NEFT-IMPS">
              <div class="form-group">
                <label>Transaction No</label>
                <input type="text" class="form-control neft-transaction-no" name="neft_imps_transaction_no" id="neft_imps_transaction_no" placeholder="Transaction ID">
              </div>
            </div>
            <div class="col-lg-4 NEFT-IMPS">
              <div class="form-group">
                <label>Transaction Date</label>
                <input type="date" class="form-control neft-transaction-date" name="neft_imps_transaction_date" id="neft_imps_transaction_date" placeholder="Transaction Date">
              </div>
            </div>
            <div class="col-lg-4 NEFT-IMPS">
              <div class="form-group">
                <label>Bank Name</label>
                <input type="text" class="form-control neft-bank-name" name="neft_imps_bank_name" id="neft_imps_bank_name" placeholder="Bnck Name">
              </div>
            </div>
            <div class="col-lg-4 NEFT-IMPS">
              <div class="form-group">
                <label>Bank Branch Name</label>
                <input type="text" class="form-control neft-bank-branch-name" name="neft_imps_bank_branch_name" id="neft_imps_bank_branch_name" placeholder="Bank Branch Name">
              </div>
            </div>
            <div class="col-lg-4 Paytm">
              <div class="form-group">
                <label>Transaction No</label>
                <input type="text" class="form-control paytm-transaction-no" name="paytm_transaction_no" id="paytm_transaction_no" placeholder="Transaction ID">
              </div>
            </div>
            <div class="col-lg-4 Paytm">
              <div class="form-group">
                <label>Transaction Date</label>
                <input type="date" class="form-control paytm-transaction-date" name="paytm_transaction_date" id="paytm_transaction_date" placeholder="Transaction Date">
              </div>
            </div>
            <div class="col-lg-4 Bank-Deposit">
              <div class="form-group">
                <label>Transaction No</label>
                <input type="text" class="form-control deposit-transaction-no" name="bank_deposit_transaction_no" id="bank_deposit_transaction_no" placeholder="Transaction ID">
              </div>
            </div>
            <div class="col-lg-4 Bank-Deposit">
              <div class="form-group">
                <label>Transaction Date</label>
                <input type="date" class="form-control deposit-transaction-date" name="bank_deposit_transaction_date" id="bank_deposit_transaction_date" placeholder="Transaction Date">
              </div>
            </div>
            <div class="col-lg-4  Capital-Float">
              <div class="form-group">
                <label>Transaction No</label>
                <input type="text" class="form-control capital-float-transaction-no" name="capital_float_transaction_no" id="capital_float_transaction_no" placeholder="Transaction ID">
              </div>
            </div>
            <div class="col-lg-4 Capital-Float">
              <div class="form-group">
                <label>Transaction Date</label>
                <input type="date" class="form-control capital-float-transaction-date" name="capital_float_transaction_date" id="capital_float_transaction_date" placeholder="Transaction Date">
              </div>
            </div>
            <div class="col-lg-4  Google-Pay">
              <div class="form-group">
                <label>Transaction No</label>
                <input type="text" class="form-control google-pay-transaction-no" name="google_pay_transaction_no" id="google_pay_transaction_no" placeholder="Transaction ID">
              </div>
            </div>
            <div class="col-lg-4 Google-Pay">
              <div class="form-group">
                <label>Transaction Date</label>
                <input type="date" class="form-control google-pay-transaction_date" name="google_pay_transaction_date" id="google_pay_transaction_date" placeholder="Transaction Date">
              </div>
            </div>
            <div class="col-lg-4  Phone-Pay">
              <div class="form-group">
                <label>Transaction No</label>
                <input type="text" class="form-control phone-pay-transaction-no" name="phone_pay_transaction_no" id="phone_pay_transaction_no" placeholder="Transaction ID">
              </div>
            </div>
            <div class="col-lg-4 Phone-Pay">
              <div class="form-group">
                <label>Transaction Date</label>
                <input type="date" class="form-control phone-pay-transaction-date" name="phone_pay_transaction_date" id="phone_pay_transaction_date" placeholder="Transaction Date">
              </div>
            </div>
            <div class="col-lg-4  Bajaj-Finserv">
              <div class="form-group">
                <label>Transaction No</label>
                <input type="text" class="form-control bajaj-finserv-transaction-no" name="bajaj_finserv_transaction_no" id="bajaj_finserv_transaction_no" placeholder="Transaction ID">
              </div>
            </div>
            <div class="col-lg-4 Bajaj-Finserv">
              <div class="form-group">
                <label>Transaction Date</label>
                <input type="date" class="form-control bajaj-finserv-transaction-date" name="bajaj_finserv_transaction_date" id="bajaj_finserv_transaction_date" placeholder="Transaction Date">
              </div>
            </div>
            <div class="col-lg-4  Bhim-UPI">
              <div class="form-group">
                <label>Transaction No</label>
                <input type="text" class="form-control bhim-upi-transaction-no" name="bhim_upi_transaction_no" id="bhim_upi_transaction_no" placeholder="Transaction ID">
              </div>
            </div>
            <div class="col-lg-4 Bhim-UPI">
              <div class="form-group">
                <label>Transaction Date</label>
                <input type="date" class="form-control bhim-upi-transaction-date" name="bhim_upi_transaction_date" id="bhim_upi_transaction_date" placeholder="Transaction Date">
              </div>
            </div>
            <div class="col-lg-4  Insta-mojo">
              <div class="form-group">
                <label>Transaction No</label>
                <input type="text" class="form-control instamoj-transaction-no" name="instamoj_transaction_no" id="instamoj_transaction_no" placeholder="Transaction ID">
              </div>
            </div>
            <div class="col-lg-4 Insta-mojo">
              <div class="form-group">
                <label>Transaction Date</label>
                <input type="date" class="form-control instamoj-transaction-date" name="instamoj_transaction_date" id="instamoj_transaction_date" placeholder="Transaction Date">
              </div>
            </div>
            <div class="col-lg-4  Pay-pal">
              <div class="form-group">
                <label>Transaction No</label>
                <input type="text" class="form-control pay-pal-transaction-no" name="pay_pal_transaction_no" id="pay_pal_transaction_no" placeholder="Transaction ID">
              </div>
            </div>
            <div class="col-lg-4 Pay-pal">
              <div class="form-group">
                <label>Transaction Date</label>
                <input type="date" class="form-control pay-pal-transaction-date" name="pay_pal_transaction_date" id="pay_pal_transaction_date" placeholder="Transaction Date">
              </div>
            </div>
            <div class="col-lg-4  Razor-pay">
              <div class="form-group">
                <label>Transaction No</label>
                <input type="text" class="form-control razorpay-transaction-no" name="razorpay_transaction_no" id="razorpay_transaction_no" placeholder="Transaction ID">
              </div>
            </div>
            <div class="col-lg-4 Razor-pay">
              <div class="form-group">
                <label>Transaction Date</label>
                <input type="date" class="form-control razorpay-transaction-date" name="razorpay_transaction_date" id="razorpay_transaction_date" placeholder="Transaction Date">
              </div>
            </div>
               <div class="col-md-6">
                    <div class="form-group">
                        <label class="d-block">
                          No Of Installment:
                        </label>
                        <input type="text" class="form-control w-50 d-inline-block" name="no_of_installment" id="no_of_installment"/>
                        <button type="btn" class="btn btn-primary text-white" onclick="return make_installment_process_upgrade('<?php echo $adm_record->admission_id; ?>')">Make Installment</button>
                    </div>
               </div>
      </div>
      </div>
           
      <div class="card">
      <div class="card-body p-2 row pt-3" id="installment_all_data">
            <div class="col-lg-3">
              <div class="form-group text-center">
                <label><strong>#NO</strong></label> 
                          <div>1</div>
              </div>
            </div>
            <div class="col-lg-3"> 
              <div class="form-group">
                <label>Installment Date</label>
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="col-lg-3"> 
              <div class="form-group">
                <label>Due Amount</label>
                <input type="text" class="form-control">
              </div>
          </div>
          <div class="col-lg-3"> 
              <div class="form-group">
                <label>Paid Amount</label>
                <input type="text" class="form-control">
              </div>
          </div> 
        </div>
      </div> 
      
   </div>
   <input type="submit" class="btn btn-primary" id="Submit" name="submit" value="Submit">
   </form>
</div>

<script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>
  
<script>
   function myFunction() {
      document.getElementById("myTableData").deleteRow(1);
   }
</script>
<script>
var total_fees = parseInt($('#total_calculate_data').val());
var counter = parseInt($('#total_calculate_data').val());
var final_fees = parseInt($('#total_calculate_data').val());
var removed_fees;
$('#myTableData').hide();
var count_data = 1;
function addRow() {
   $('#myTableData').show();
   var course_orpackage = document.getElementById("course_orpackage");
   var course_orsingle = document.getElementById("course_orsingle");
   var course_or_subcourses = document.getElementById("course_or_subcourses").value;
   // alert(course_or_subcourses);
   // var course_package = document.getElementById("course_package");
   var course_package = $("input[name='type']:checked").val();
   //  alert(course_package);
   var course_single = document.getElementById("course_single");
   var table = document.getElementById("myTableData");
   var rowCount = table.rows.length;
   var row = table.insertRow(rowCount);
   var admission_id = $('#admission_id').val();
   $.ajax({
      url: "<?php echo base_url(); ?>AddmissionController/pass_data_course",
      type: "post",
      data: {
         'course_orpackage': course_orpackage.value,
         'course_single': course_package,
         'course_orsingle': course_orsingle.value,
         'admission_id' : admission_id,
         'subcourse_id' : course_or_subcourses
      },
      success: function(Response) {
        $('#course_orpackage').val('');
         var data = $.parseJSON(Response);
         console.log(data)
         var nofees;
         if(course_package == 'single'){
            nofees = data.subcourse_fees;
         }else{
            nofees =  data.package_fees;
         }
         row.insertCell(0).innerHTML = '<a id="trash_' + counter + '"  data-id="' + counter + '" onClick="deleteRow(this, ' + counter + ','+nofees+')"><i class="fa fa-trash" style="font-size:22px;color:red"></i></a><input type="hidden" id="course_package_idd" name="course_package_idd" value="'+data.course_id+'"><input type="hidden" id="course_package_typedd" name="course_package_typedd" value="'+data.course_package+'"><input type="text" id="table_subcourse_id" name="table_subcourse_id" value="'+data.subcourse_id+'">';
         row.insertCell(1).innerHTML = data.subcourse_name;
         if(course_package == 'single'){
          row.insertCell(2).innerHTML =  data.subcourse_fees;
         }else{
          row.insertCell(2).innerHTML =  data.package_fees;
         }  
         // alert(counter);
         // alert(`ID => ${$(this).data("id")}`);
         var trashID = `#trash_${counter}`;
         //  alert(`ID => ${$(trashID).data().id}`);
         counter++;
         //row.insertCell(2).innerHTML= age.value;
         // row.insertCell(1).innerHTML= data.course_fees;
         $('#package_fees').val(data.package_fees);
         $('#course_fees').val(data.subcourse_fees);

         // (data.package_fees != null) ? total_fees.push(parseInt(data.package_fees)): total_fees.push(0);
         // (data.course_fees != null) ? total_fees.push(parseInt(data.course_fees)): total_fees.push(0);
         // final_fees = total_fees.reduce((a, b) => a + b, 0);
         // console.log("vv:"+data.total_paid_fees);
         if(data.package_fees != null){
            if(data.total_paid_fees){
              total_fees =  parseInt(data.package_fees)-parseInt(data.total_paid_fees);
            
            }
            else{
              total_fees = parseInt(data.package_fees);
            }
            
          }else if(data.subcourse_fees != null){
            if(data.total_paid_fees == 0){
              total_fees =  parseInt(data.subcourse_fees) - parseInt(data.total_paid_fees);
            }
            else{
              total_fees = parseInt(data.subcourse_fees);
            }
         
         }

         final_fees = final_fees + total_fees;

         // alert(`Final fees => ${final_fees}`);
         $('#sub_total_id').val(final_fees);
         $('#sub_total_ids').val(final_fees);
      }
   });
}

function deleteRow(obj, trash_id,fees) {
      // var trashID = `#trash_${counter}`;
      // var deleted_id = $(trashID).data().id - 1;
      // alert(`ID => ${deleted_id}`);
      // TODO: fix this
      //  var theID = $(this).data("id");
      //  $("a[data-id='" + theID + "']").remove();
   
      var index = obj.parentNode.parentNode.rowIndex;
      var table = document.getElementById("myTableData");
   
      table.deleteRow(index);
      //alert(`trash_id => ${trash_id}`);
      // total_fees = total_fees.filter(e => e !== 0);
      //alert(`TOTAL FEES => ${total_fees}`);
      // total_fees = total_fees.filter((item) => {
         // if (item === total_fees[trash_id]) {
            //alert(`REMOVED ITEM => ${total_fees[trash_id]}`);
            // removed_fees = total_fees[trash_id];
         // }
         // return item !== total_fees[trash_id];
      // });
      //alert(removed_fees);
      final_fees = final_fees - fees;
       if(final_fees < 0 ){
          final_fees = 0;
         }
      // alert(`FINAL FEES => ${final_fees}`);
      $('#sub_total_id').val(final_fees);
      $('#sub_total_ids').val(final_fees);
   }
   
   function make_installment_process_upgrade(admission_id='') {

      var packageId = $('#course_orpackage').val();
      var tution_fee = $('#sub_total_id').val();
      var registration_fees = $('#registration_fees').val();
      var noOfInstallment = $('#no_of_installment').val();
      if (tution_fee == '' || registration_fees == '') {
         alert('please Enter Tution fees and Registration Fees');
         return false;
      } else {
         $.ajax({
            url: "<?php echo base_url(); ?>AddmissionController/erp_getinstallment_withregistration_upgrade",
            type: "post",
            data: {
               'packageId': packageId,
               'tution_fee': tution_fee,
               'reg_fees': registration_fees,
               'no_of_install': noOfInstallment,
               'admission_id_data' : admission_id
            },
            success: function(data) {
               $('#installment_all_data').html(data);
            }
         });
      }
   }
</script>
<script>
   //$('.select_course_package').hide();
   function co_pa() {
      var type = $("input[name='type']:checked").val();
      if (type == 'single') {
         $('.select_course_single').show();
         $('.select_course_package').hide();
      } else {
         $('.select_course_single').hide();
         $('.select_course_package').show();
      }
   }
</script>

<script>
  function paymenttype(p) {
    var x = p.options[p.selectedIndex].text;
    if (x == 'Cash') {
      $(".Cheque-Hidden").show();
    } else {
      $(".Cheque-Hidden").hide();
    }

    if (x == "Cheque") {
      $(".Cheque-Hidden").show();
    } else {
      $(".Cheque-Hidden").hide();
    }

    if (x == "DD") {
      $(".Dd-Hidden").show();
    } else {
      $(".Dd-Hidden").hide();
    }

    if (x == "Credit Card") {
      $(".Cradit-Card").show();
    } else {
      $(".Cradit-Card").hide();
    }

    if (x == "Debit Card") {
      $(".Debit-Card").show();
    } else {
      $('.Debit-Card').hide();
    }

    if (x == "Online Payment") {
      $(".Online-Payment").show();
    } else {
      $('.Online-Payment').hide();
    }

    if (x == "NEFT / IMPS") {
      $(".NEFT-IMPS").show();
    } else {
      $('.NEFT-IMPS').hide();
    }

    if (x == "Paytm") {
      $(".Paytm").show();
    } else {
      $('.Paytm').hide();
    }

    if (x == "Bank Deposit (Cash)") {
      $(".Bank-Deposit").show();
    } else {
      $('.Bank-Deposit').hide();
    }

    if (x == "Capital Float (EMI)") {
      $(".Capital-Float").show();
    } else {
      $('.Capital-Float').hide();
    }

    if (x == "Google Pay") {
      $(".Google-Pay").show();
    } else {
      $('.Google-Pay').hide();
    }

    if (x == "Phone Pay") {
      $(".Phone-Pay").show();
    } else {
      $('.Phone-Pay').hide();
    }

    if (x == "Bajaj Finserv (EMI)") {
      $(".Bajaj-Finserv").show();
    } else {
      $('.Bajaj-Finserv').hide();
    }

    if (x == "Bhim UPI(India)") {
      $(".Bhim-UPI").show();
    } else {
      $('.Bhim-UPI').hide();
    }

    if (x == "Instamojo") {
      $(".Insta-mojo").show();
    } else {
      $('.Insta-mojo').hide();
    }

    if (x == "Paypal") {
      $(".Pay-pal").show();
    } else {
      $('.Pay-pal').hide();
    }

    if (x == "Razorpay") {
      $(".Razor-pay").show();
    } else {
      $('.Razor-pay').hide();
    }
  }
</script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<!-- <script>
  // just for the demos, avoids form submit
  jQuery.validator.setDefaults({
    debug: true,
    success: "valid"
  });
  $("#add_form").validate({
    rules: {
      registration_fees: {
        required: true,
      }
    },
    messages: {
      registration_fees: {
        required: "<div style='color:red'>Enter Template Name</div>",
      }
    },
    submitHandler: function() {
      event.preventDefault();
      var formdata = $('#add_form').serialize();

      $.ajax({
        url: "<?php echo base_url(); ?>Admission/AdmisionCourse_Upgrade",
        type: "post",
        data: formdata,
        success: function(resp) {
          var data = $.parseJSON(resp);
          var ddd = data['all_record'].status;
          if (ddd == '1') {
          $('#msg_expenses').html(iziToast.success({
            title: 'Success',
            timeout: 2000,
            message: 'HI! This Record Inserted.',
            position: 'topRight'
          }));

          setTimeout(function() {
            location.reload();
          }, 2020);
        }else if(ddd == '2'){
          $('#msg_expenses').html(iziToast.success({
            title: 'HI! This Record Updated',
            timeout: 2000,
            message: '',
            position: 'topRight'
          }));

          setTimeout(function() {
            location.reload();
          }, 2020);
        }
         else if(ddd == '3'){
          $('#msg_expenses').html(iziToast.error({
            title: 'Canceled!',
            timeout: 2000,
            message: 'Someting Wrong!!',
            position: 'topRight'
          }));

          setTimeout(function() {
            location.reload();
          }, 2020);
        }
        }
      });
    }
  });
  </script> -->
 
<script type="text/javascript">
   $('#Submit').on('click', function() {
      var admission_id = $('#admission_id').val();
      var type = $("input[name='type']:checked").val();
      var course_orpackage = $('#course_orpackage').val();
      var course_orsingle = $('#course_orsingle').val();
      var sub_total_ids = $('#sub_total_ids').val();
      var registration_fees = $('#registration_fees').val();
      var payment_mode = $('#payment_mode').val();
      var no_of_installment = $('#no_of_installment').val();
      var installment_no_first = $('#installment_no_first').val();
      var installment_date_first = $('#installment_date_first').val();
      var due_amount_first = $('#due_amount_first').val();
      var paid_amount_first = $('#paid_amount_first').val();
      var installment_date = [];
      

      var course_package_idd = new Array();
      $("input[name='course_package_idd']").each(function() {
                course_package_idd.push($(this).val());
      });

      var table_subcourse_id = new Array();
      $("input[name='table_subcourse_id']").each(function() {
                table_subcourse_id.push($(this).val());
      });
      
      alert(table_subcourse_id);

      var course_package_typed = new Array();
      $("input[name='course_package_typedd']").each(function() {
                course_package_typed.push($(this).val());
      });


      var installmentNo = new Array();
      $("input[name='installment_no']").map(function() {
                installmentNo.push($(this).val());
      });

      var installment_date = [];
      $('input[name=installment_date]').map(function() {
         installment_date.push($(this).val());
      });
    
      var due_amount = [];
      $('input[name=due_amount]').map(function() {
         due_amount.push($(this).val());
      });
   
      var paid_amount = [];
      $('input[name=paid_amount]').map(function() {
         paid_amount.push($(this).val());
      });

      
   
      // alert(installmentNo);
      $.ajax({
         type: "POST",
         url: "<?php echo base_url() ?>AddmissionController/AdmisionCourse_Upgrade",
         data: {
            'admission_id': admission_id,
            'type': course_package_typed,
            'package_orsingle': course_package_idd,
            'subcourse_id_data' : table_subcourse_id,
            'tuation_fees': sub_total_ids,
            'registration_fees': registration_fees,
            'payment_mode' : payment_mode,
            'no_of_installment': no_of_installment,
            'installment_date_first': installment_date_first,
            'due_amount_first': due_amount_first,
            'paid_amount_first': paid_amount_first,
            'installmentNumber' : installmentNo,
            'installment_date': installment_date,
            'due_amount': due_amount,
            'paid_amount': paid_amount
         },
   
         success: function(resp)
         {

            total_fees = 0;
            counter = 0;
            final_fees = 0;
            var data = $.parseJSON(resp);
            var ddd = data['all_record'].status;
            if(ddd == '1')
            {
                  $('#upgraded_msg').html(iziToast.success({
                                                               title: 'Success',
                                                               timeout: 2500,
                                                               message: 'Upgraded.',
                                                               position: 'topRight'
                                                            }));
                                                            setTimeout(function() {
                                                                  location.reload();
                                                            }, 2520);
            }
            else
            {
                  $('#upgraded_msg').html(iziToast.error({
                                                               title: 'Canceled!',
                                                               timeout: 2500,
                                                               message: 'Someting Wrong!!',
                                                               position: 'topRight'
                                                            }));
                                                            setTimeout(function() {
                                                                  location.reload();
                                                            }, 2520);
            }
         }
      });
      return false;
   });



  $('#course_orsingle').change(function(){
    var courseId = $('#course_orsingle').val();
    $.ajax({
      url : "<?php echo base_url(); ?>Admission/courseWiseSubcourse",
      type : "POST",
      data:{
        'CourseId' : courseId
      },
      success:function(data){
        $('#course_or_subcourses').html(data);
      }
    })
  })


</script>
