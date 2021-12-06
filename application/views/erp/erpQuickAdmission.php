<?php $b_ids = $_SESSION['branch_ids'];  $b_idb = explode(",",$b_ids); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/selectric.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">
<style type="text/css">
   li.select2-selection__choice {
   background-color: #5864BC !important;
   }
</style>
<div class="main-content container">
   <div class="section-body">
      <div class="row">
         <div class="col-12 d-flex justify-content-between">
            <h6 class="page-title text-dark mb-2">Quick Admission</h6>
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb p-0">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">Library</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Data</li>
               </ol>
            </nav>
         </div>
         <div class="col-12">
            <div id="quick_admission_msg"></div>
            <form  id="form_validation" method="post" name="form_validation">
               <div class="card-item mb-4">
                  <div class="card card-primary">
                     <div class="card-header form-title">
                        <h4>Communication</h4>
                     </div>
                     <div class="card-body pl-3 pr-3 row pb-1 pt-2">
                        <div class="col-lg-3">
                           <div class="form-group">
                              <label>Mobile No</label>
                              <label id="mobile_no-error" class="error" for="mobile_no" style="float:right;"></label>
                              <input type="hidden" name="lead_list_id" id="lead_list_id" class="form-control">
                              <input type="hidden" name="demo_id" id="demo_id" class="form-control">
                              <input type="hidden" name="shining_sheet_id" id="shining_sheet_id" class="form-control">
                              <input type="text" class="form-control m_no mobNo mobile_no" name="mobile_no" id="mobile_no" placeholder="+91-00000-00000" required onkeypress="return isNumberKey(event)">
                           </div>
                        </div>
                        <div class="col-lg-3">
                           <div class="form-group">
                              <label>Alternate No</label>
                              <label id="alternate_number-error" class="error" for="alternate_number" style="float:right;"></label>
                              <input type="text" class="form-control alternate_number" name="alternate_mobile_no" id="alternate_number" placeholder="+91-00000-00000" onkeypress="return isNumberKey(event)">
                           </div>
                        </div>
                        <div class="col-lg-3">
                           <div class="form-group">
                              <label>Email</label>
                              <label id="email-error" class="error" for="email" style="float:right"></label>
                              <input type="email" class="form-control email" name="email" id="email" placeholder="Jone@gmail.com" required="">
                           </div>
                        </div>
                        <div class="col-lg-3">
                           <div class="form-group">
                              <label>Source</label>
                              <label id="source_id-error" class="error" for="source_id" style="float:right;color:red"></label>
                              <select class="form-control source_id" name="source_id" id="source_id" required="">
                                 <option value="">Select Source</option>
                                 <?php foreach ($list_source as $ld) { ?>
                                 <option value="<?php echo $ld->source_name; ?>"><?php echo $ld->source_name; ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="card">
                     <div class="card-header form-title">
                        <h4>Personal Details</h4>
                     </div>
                     <div class="card-body pl-3 pr-3 row pb-1 pt-2">
                        <div class="col-lg-3">
                           <div class="form-group">
                              <label>First Name</label>
                              <label id="first_name-error" class="error" for="first_name" style="float:right; color:red"></label>
                              <input type="text" class="form-control first_name" name="first_name" id="first_name" placeholder="First Name" required="">
                           </div>
                        </div>
                        <div class="col-lg-3">
                           <div class="form-group">
                              <label>Surname</label>
                              <label id="surname-error" class="error" for="surname" style="float:right; color:red;"></label>
                              <input type="text" class="form-control surname" name="surname" id="surname" placeholder="Surname" required="">
                           </div>
                        </div>
                        <div class="col-lg-3">
                           <div class="form-group">
                              <label>Student D-O-B</label>
                              <label id="stu_dob-error" class="error" for="stu_dob" style="float:right; color:red;"></label>
                              <input type="date" class="form-control stu_dob" name="stu_dob" id="stu_dob" placeholder="Enter Your Birthdate" required="">
                           </div>
                        </div>
                        <div class="col-lg-3">
                           <div class="form-group">
                              <label class="d-block">Gender</label>
                              <label id="gender-error" class="error" for="gender" style="float:right; color:red;"></label>
                              <div class="pretty p-icon p-jelly p-round p-bigger mt-2">
                                 <input class="form-check-input" type="radio" name="gender" id="exampleRadios3" value="male">
                                 <div class="state p-info">
                                    <i class="icon material-icons">done</i>
                                    <label>Male</label>
                                 </div>
                              </div>
                              <div class="pretty p-icon p-jelly p-round p-bigger mt-2">
                                 <input class="form-check-input" type="radio" name="gender" id="exampleRadios4" value="female">
                                 <div class="state p-info">
                                    <i class="icon material-icons">done</i>
                                    <label>Female</label>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="card">
                     <div class="card-header form-title">
                        <h4>Course & Fees</h4>
                     </div>
                     <div class="card-body pl-3 pr-3 row pb-1 pt-2">
                        <div class="col-lg-3">
                           <div class="form-group">
                              <label>Branch Name:</label>
                              <label id="branch_id-error" class="error" for="branch_id" style="float:right; color:red; "></label>
                              <select class="form-control branch barch_wise_faculty branch_id" name="branch_id" id="branch_id" required="">
                                 <option value="">Select Branch</option>
                                 <?php
                                 $branch_id = explode(
                                     ",",
                                     $_SESSION["branch_ids"]
                                 );
                                 foreach ($list_branch as $k => $va) {
                                     if ($va->branch_id != "11") {
                                         $br_id = explode(",", $va->branch_id);
                                         if ($br_id[0] != "") {
                                             for (
                                                 $i = 0;
                                                 $i < sizeof($branch_id);
                                                 $i++
                                             ) {
                                                 if (
                                                     in_array(
                                                         $branch_id[$i],
                                                         $br_id
                                                     )
                                                 ) { ?>
                                 <option value="<?php echo $va->branch_id; ?>"><?php echo $va->branch_name; ?></option>
                                 <?php }
                                             }
                                         }
                                     }
                                 }
                                 ?>
                              </select>
                           </div>
                        </div>
                        <div class="col-lg-3">
                           <div class="form-group">
                              <label class="d-block">Course Category</label>
                              <div class="pretty p-icon p-jelly p-round p-bigger mt-2">
                                 <input class="form-check-input" type="radio" name="quick_course_package" id="exampleRadios1" value="package" onclick="return show_hide_package_course()" checked>
                                 <div class="state p-info">
                                    <i class="icon material-icons">done</i>
                                    <label>Package</label>
                                 </div>
                              </div>
                              <div class="pretty p-icon p-jelly p-round p-bigger mt-2">
                                 <input class="form-check-input" type="radio" name="quick_course_package" id="exampleRadios2" value="single" onclick="return show_hide_package_course()" checked>
                                 <div class="state p-info">
                                    <i class="icon material-icons">done</i>
                                    <label>Single</label>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <?php for($i=0;$i<sizeof($b_idb);$i++) { if($b_idb[$i] == 12) {  ?>
                        <div class="col-lg-3">
                           <div class="form-group">
                              <label class="d-block">Discount</label>
                              <label id="gender-error" class="error" for="gender" style="float:right; color:red;"></label>
                              <div class="pretty p-icon p-jelly p-round p-bigger mt-2">
                                 <input class="form-check-input male yes_discount" type="radio" name="discont" id="" value="Yes" onchange="return disable_dis()">
                                 <div class="state p-info">
                                    <i class="icon material-icons">done</i>
                                    <label>Yes</label>
                                 </div>
                              </div>
                              <div class="pretty p-icon p-jelly p-round p-bigger mt-2">
                                 <input class="form-check-input female no_discount" type="radio" name="discont" id="No" value="No" checked onchange="return disable_dis()">
                                 <div class="state p-info">
                                    <i class="icon material-icons">done</i>
                                    <label>No</label>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-3">
                           <div class="form-group">
                              <label>Discout Percentage</label>
                              <input type="text" class="form-control" name="discount_percentage" id="discount_percentage" placeholder="%" readonly onkeyup="activitys(this)">
                              <input type="hidden" name="discount_ammount" id="discount_ammount" class="form-control">
                           </div>
                        </div>
                        <?php }  }?>
                        <div class="col-lg-3 select_course_package">
                           <div class="form-group">
                              <label>Select package*</label>
                              <select class="form-control subpa pafees" name="course_orpackage" id="course_or_package">
                                 <option value="">Select package</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-lg-3 select_course_single">
                           <div class="form-group">
                              <label>Select Course*</label>
                              <select class="form-control course_or_single subco cofees" name="course_or_single" id="course_orsingle">
                                 <option value="0">Select Course</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-lg-3 select_course_single">
                           <div class="form-group">
                              <label>Starting  Course*</label>
                              <select class="form-control" name="stating_course_id" id="stating_course_id">
                                 <option value="0">Select Course</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-lg-3 select_course_package">
                           <div class="form-group">
                              <label>Starting  Course*</label>
                              <select class="form-control" name="stating_course_id_pco" id="stating_course_id_pco">
                                 <option value="0">Select Course</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-lg-3">
                           <div class="form-group">
                              <label>Batch</label>
                              <select class="form-control" name="batch_id" id="batch_id">
                                 <option value="">Select Batch</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-lg-3">
                           <div class="form-group">
                              <label>Tution Fees</label>
                              <label id="tuation_fees-error" class="error" for="tuation_fees" style="float:right; color:red"></label>
                              <input type="text" class="form-control" name="tuation_fees" id="tuation_fees" placeholder="Tution Fees" required="required" onkeypress="return isNumberKey(event)">
                               <input type="hidden" class="form-control" name="tuation_fees_without_discount" id="tuation_fees_without_discount" placeholder="Tution Fees">
                           </div>
                        </div>
                        <div class="col-lg-3">
                           <div class="form-group">
                              <label>Registration Fees</label>
                              <label id="registration_fees-error" class="error" for="registration_fees" style="float:right; color:red"></label>
                              <input type="text" class="form-control" name="registration_fees" id="registration_fees" placeholder="Registration Fees" required="required"  onkeypress="return isNumberKey(event)">
                              <input type="hidden" name="no_of_installment" id="no_of_installment" class="form-control">
                           </div>
                        </div>
                        <?php
                        date_default_timezone_set("Asia/Calcutta");
                        $paydate = date("d-M-Y");
                        ?>
                        <div class="col-lg-3">
                           <div class="form-group">
                              <label>Payment Date</label>
                              <input type="text" class="form-control" name="installment_date_first" id="installment_date_first" value="<?php echo $paydate; ?>">
                           </div>
                        </div>
                        <div class="col-lg-3">
                           <div class="form-group">
                              <label>Payment Mode</label>
                              <label id="payment_mode-error" class="error" for="payment_mode" style="float: right; color:red"></label>
                              <select class="form-control" name="payment_mode" id="payment_mode" onchange="paymenttype(this)" required="required" >
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
                        </div>
                        <div class="col-lg-3 Cheque-Hidden">
                           <div class="form-group">
                              <label>Cheque Holder Name</label>
                              <input type="text" class="form-control" name="cheque_holder_name" id="cheque_holder_name" placeholder="Cheque Holder Name">
                           </div>
                        </div>
                        <div class="col-lg-3 Cheque-Hidden">
                           <div class="form-group">
                              <label>Cheque/DD No</label>
                              <input type="text" class="form-control" name="cheque_dd_no" id="cheque_dd_no" placeholder="Cheque/DD No">
                           </div>
                        </div>
                        <div class="col-lg-3 Cheque-Hidden">
                           <div class="form-group">
                              <label>Cheque/DD Date</label>
                              <input type="date" class="form-control" name="cheque_dd_date" id="cheque_dd_date" placeholder="Cheque/DD Date">
                           </div>
                        </div>
                        <div class="col-lg-3 Cheque-Hidden">
                           <div class="form-group">
                              <label>Bank Name</label>
                              <input type="text" class="form-control" name="bank_name" id="bank_name" placeholder="Bnck Name">
                           </div>
                        </div>
                        <div class="col-lg-3 Cheque-Hidden">
                           <div class="form-group">
                              <label>Bank Branch Name</label>
                              <input type="text" class="form-control" name="bank_branch_name" id="bank_branch_name" placeholder="Bank Branch Name">
                           </div>
                        </div>
                        <div class="col-lg-3 Cheque-Hidden">
                           <div class="form-group">
                              <label>Cheque Status</label>
                              <select class="form-control" name="cheque_status" id="cheque_status">
                                 <option value="">Select</option>
                                 <option value="Paid/Cleared">Paid/Cleared</option>
                                 <option value="Deposit IN Bank">Deposit IN Bank</option>
                                 <option value="Cheque Collected">Cheque Collected</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-lg-3 Dd-Hidden">
                           <div class="form-group">
                              <label>Cheque Holder Name</label>
                              <input type="text" class="form-control" name="dd_cheque_holder_name" id="dd_cheque_holder_name" placeholder="Cheque Holder Name">
                           </div>
                        </div>
                        <div class="col-lg-6 Dd-Hidden">
                           <div class="form-group">
                              <label>Cheque/DD No</label>
                              <input type="text" class="form-control" name="dd_cheque_dd_no" id="dd_cheque_dd_no" placeholder="Cheque/DD No">
                           </div>
                        </div>
                        <div class="col-lg-6 Dd-Hidden">
                           <div class="form-group">
                              <label>Cheque/DD Date</label>
                              <input type="date" class="form-control" name="dd_cheque_dd_date" id="dd_cheque_dd_date" placeholder="Cheque/DD Date">
                           </div>
                        </div>
                        <div class="col-lg-6 Dd-Hidden">
                           <div class="form-group">
                              <label>Bank Name</label>
                              <input type="text" class="form-control" name="dd_bank_name" id="dd_bank_name" placeholder="Bnck Name">
                           </div>
                        </div>
                        <div class="col-lg-6 Dd-Hidden">
                           <div class="form-group">
                              <label>Bank Branch Name</label>
                              <input type="text" class="form-control" name="dd_bank_branch_name" id="dd_bank_branch_name" placeholder="Bank Branch Name">
                           </div>
                        </div>
                        <div class="col-lg-6 Dd-Hidden">
                           <div class="form-group">
                              <label>Cheque Status</label>
                              <select class="form-control" name="dd_cheque_status" id="dd_cheque_status">
                                 <option value="">Select</option>
                                 <option value="Paid/Cleared">Paid/Cleared</option>
                                 <option value="Deposit IN Bank">Deposit IN Bank</option>
                                 <option value="Cheque Collected">Cheque Collected</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-lg-6 Cradit-Card">
                           <div class="form-group">
                              <label>Transaction No</label>
                              <input type="text" class="form-control" name="cradit_card_transaction_no" id="cradit_card_transaction_no" placeholder="Transaction ID">
                           </div>
                        </div>
                        <div class="col-lg-6 Cradit-Card">
                           <div class="form-group">
                              <label>Transaction Date</label>
                              <input type="date" class="form-control" name="cradit_card_transaction_date" id="cradit_card_transaction_date" placeholder="Transaction Date">
                           </div>
                        </div>
                        <div class="col-lg-6 Debit-Card">
                           <div class="form-group">
                              <label>Transaction No</label>
                              <input type="text" class="form-control" name="debit_card_transaction_no" id="debit_card_transaction_no" placeholder="Transaction ID">
                           </div>
                        </div>
                        <div class="col-lg-6 Debit-Card">
                           <div class="form-group">
                              <label>Transaction Date</label>
                              <input type="date" class="form-control" name="debit_card_transaction_date" id="debit_card_transaction_date" placeholder="Transaction Date">
                           </div>
                        </div>
                        <div class="col-lg-6 Online-Payment">
                           <div class="form-group">
                              <label>Transaction No</label>
                              <input type="text" class="form-control" name="online_payment_transaction_no" id="online_payment_transaction_no" placeholder="Transaction ID">
                           </div>
                        </div>
                        <div class="col-lg-6 Online-Payment">
                           <div class="form-group">
                              <label>Transaction Date</label>
                              <input type="date" class="form-control" name="online_payment_transaction_date" id="online_payment_transaction_date" placeholder="Transaction Date">
                           </div>
                        </div>
                        <div class="col-lg-6 NEFT-IMPS">
                           <div class="form-group">
                              <label>Transaction No</label>
                              <input type="text" class="form-control" name="neft_imps_transaction_no" id="neft_imps_transaction_no" placeholder="Transaction ID">
                           </div>
                        </div>
                        <div class="col-lg-6 NEFT-IMPS">
                           <div class="form-group">
                              <label>Transaction Date</label>
                              <input type="date" class="form-control" name="neft_imps_transaction_date" id="neft_imps_transaction_date" placeholder="Transaction Date">
                           </div>
                        </div>
                        <div class="col-lg-6 NEFT-IMPS">
                           <div class="form-group">
                              <label>Bank Name</label>
                              <input type="text" class="form-control" name="neft_imps_bank_name" id="neft_imps_bank_name" placeholder="Bnck Name">
                           </div>
                        </div>
                        <div class="col-lg-6 NEFT-IMPS">
                           <div class="form-group">
                              <label>Bank Branch Name</label>
                              <input type="text" class="form-control" name="neft_imps_bank_branch_name" id="neft_imps_bank_branch_name" placeholder="Bank Branch Name">
                           </div>
                        </div>
                        <div class="col-lg-6 Paytm">
                           <div class="form-group">
                              <label>Transaction No</label>
                              <input type="text" class="form-control" name="paytm_transaction_no" id="paytm_transaction_no" placeholder="Transaction ID">
                           </div>
                        </div>
                        <div class="col-lg-6 Paytm">
                           <div class="form-group">
                              <label>Transaction Date</label>
                              <input type="date" class="form-control" name="paytm_transaction_date" id="paytm_transaction_date" placeholder="Transaction Date">
                           </div>
                        </div>
                        <div class="col-lg-6 Bank-Deposit">
                           <div class="form-group">
                              <label>Transaction No</label>
                              <input type="text" class="form-control" name="bank_deposit_transaction_no" id="bank_deposit_transaction_no" placeholder="Transaction ID">
                           </div>
                        </div>
                        <div class="col-lg-6 Bank-Deposit">
                           <div class="form-group">
                              <label>Transaction Date</label>
                              <input type="date" class="form-control" name="bank_deposit_transaction_date" id="bank_deposit_transaction_date" placeholder="Transaction Date">
                           </div>
                        </div>
                        <div class="col-lg-6  Capital-Float">
                           <div class="form-group">
                              <label>Transaction No</label>
                              <input type="text" class="form-control" name="capital_float_transaction_no" id="capital_float_transaction_no" placeholder="Transaction ID">
                           </div>
                        </div>
                        <div class="col-lg-6 Capital-Float">
                           <div class="form-group">
                              <label>Transaction Date</label>
                              <input type="date" class="form-control" name="capital_float_transaction_date" id="capital_float_transaction_date" placeholder="Transaction Date">
                           </div>
                        </div>
                        <div class="col-lg-6  Google-Pay">
                           <div class="form-group">
                              <label>Transaction No</label>
                              <input type="text" class="form-control" name="google_pay_transaction_no" id="google_pay_transaction_no" placeholder="Transaction ID">
                           </div>
                        </div>
                        <div class="col-lg-6 Google-Pay">
                           <div class="form-group">
                              <label>Transaction Date</label>
                              <input type="date" class="form-control" name="google_pay_transaction_date" id="google_pay_transaction_date" placeholder="Transaction Date">
                           </div>
                        </div>
                        <div class="col-lg-6  Phone-Pay">
                           <div class="form-group">
                              <label>Transaction No</label>
                              <input type="text" class="form-control" name="phone_pay_transaction_no" id="phone_pay_transaction_no" placeholder="Transaction ID">
                           </div>
                        </div>
                        <div class="col-lg-6 Phone-Pay">
                           <div class="form-group">
                              <label>Transaction Date</label>
                              <input type="date" class="form-control" name="phone_pay_transaction_date" id="phone_pay_transaction_date" placeholder="Transaction Date">
                           </div>
                        </div>
                        <div class="col-lg-6  Bajaj-Finserv">
                           <div class="form-group">
                              <label>Transaction No</label>
                              <input type="text" class="form-control" name="bajaj_finserv_transaction_no" id="bajaj_finserv_transaction_no" placeholder="Transaction ID">
                           </div>
                        </div>
                        <div class="col-lg-6 Bajaj-Finserv">
                           <div class="form-group">
                              <label>Transaction Date</label>
                              <input type="date" class="form-control" name="bajaj_finserv_transaction_date" id="bajaj_finserv_transaction_date" placeholder="Transaction Date">
                           </div>
                        </div>
                        <div class="col-lg-6  Bhim-UPI">
                           <div class="form-group">
                              <label>Transaction No</label>
                              <input type="text" class="form-control" name="bhim_upi_transaction_no" id="bhim_upi_transaction_no" placeholder="Transaction ID">
                           </div>
                        </div>
                        <div class="col-lg-6 Bhim-UPI">
                           <div class="form-group">
                              <label>Transaction Date</label>
                              <input type="date" class="form-control" name="bhim_upi_transaction_date" id="bhim_upi_transaction_date" placeholder="Transaction Date">
                           </div>
                        </div>
                        <div class="col-lg-6  Insta-mojo">
                           <div class="form-group">
                              <label>Transaction No</label>
                              <input type="text" class="form-control" name="instamoj_transaction_no" id="instamoj_transaction_no" placeholder="Transaction ID">
                           </div>
                        </div>
                        <div class="col-lg-6 Insta-mojo">
                           <div class="form-group">
                              <label>Transaction Date</label>
                              <input type="date" class="form-control" name="instamoj_transaction_date" id="instamoj_transaction_date" placeholder="Transaction Date">
                           </div>
                        </div>
                        <div class="col-lg-6  Pay-pal">
                           <div class="form-group">
                              <label>Transaction No</label>
                              <input type="text" class="form-control" name="pay_pal_transaction_no" id="pay_pal_transaction_no" placeholder="Transaction ID">
                           </div>
                        </div>
                        <div class="col-lg-6 Pay-pal">
                           <div class="form-group">
                              <label>Transaction Date</label>
                              <input type="date" class="form-control" name="pay_pal_transaction_date" id="pay_pal_transaction_date" placeholder="Transaction Date">
                           </div>
                        </div>
                        <div class="col-lg-6  Razor-pay">
                           <div class="form-group">
                              <label>Transaction No</label>
                              <input type="text" class="form-control" name="razorpay_transaction_no" id="razorpay_transaction_no" placeholder="Transaction ID">
                           </div>
                        </div>
                        <div class="col-lg-6 Razor-pay">
                           <div class="form-group">
                              <label>Transaction Date</label>
                              <input type="date" class="form-control" name="razorpay_transaction_date" id="razorpay_transaction_date" placeholder="Transaction Date">
                           </div>
                        </div>
                     </div>
                  </div>
                  <input type="hidden" class="form-control receipt_admission" id="receipt_admission_id">
                  <div class="pb-3 px-3">
                     <input class="btn btn-primary mr-1" type="submit" id="submit_data" name="submit" id="open_check_modal" value="Submit"> 
                     <!-- <button class="btn btn-primary mr-1" type="button" name="open_check_modal" id="open_check_modal">Submit</button>  -->
                     <button class="btn btn-light mr-1 final-receipt" type="submit" id="Receipt" onclick="return disable_button()">Receipt</button> 
                     <button class="btn btn-light mr-1 processingcheck-receipt" type="submit" id="ChequeReceipt" onclick="return disable_cheque_button()">Receipt-Cheque-dd</button>
                  </div>
               </div>
            </form>
         </div>
         <div class="col-md-3" id="redata">
            <div class="add-side-view">
               <div class="card card-primary p-3">
                  <h6 class="text-dark">Previous Record Demo</h6>
                  <table>
                     <tr>
                        <td width="90px">Demo ID:</td>
                        <td><span id="demo_idss"></span></td>
                     </tr>
                     <tr>
                        <td>Branch:</td>
                        <td><span id="branch"></span></td>
                     </tr>
                     <tr>
                        <td>Name:</td>
                        <td><span id="name"></span></td>
                     </tr>
                     <tr>
                        <td>Mobile No:</td>
                        <td><span id="demomobileno"></span></td>
                     </tr>
                     <tr>
                        <td>Course:</td>
                        <td><span id="startingCourse"></span></td>
                     </tr>
                     <tr>
                        <td>Date:</td>
                        <td><span id="demodate"></span></td>
                     </tr>
                     <tr>
                        <td>AddBy:</td>
                        <td><span id="addedby"></span></td>
                     </tr>
                  </table>
               </div>
               <div class="card card-primary p-3">
                  <h6 class="text-dark">Previous Record Lead</h6>
                  <table>
                     <tr>
                        <td width="90px">Lead ID:</td>
                        <td><span id="lead_list_idss"></span></td>
                     </tr>
                     <tr>
                        <td>Branch:</td>
                        <td><span id="lead_branch"></span></td>
                     </tr>
                     <tr>
                        <td>Name:</td>
                        <td><span id="lead_name"></span></td>
                     </tr>
                     <tr>
                        <td>Mobile No:</td>
                        <td><span id="leadmobile_no"></span></td>
                     </tr>
                     <tr>
                        <td>Course:</td>
                        <td><span id="lead_course"></span></td>
                     </tr>
                     <tr>
                        <td>Date:</td>
                        <td><span id="lead_creation_date"></span></td>
                     </tr>
                     <tr>
                        <td>Reference By:</td>
                        <td><span id="reference_name"></span></td>
                     </tr>
                  </table>
               </div>
               <div class="card card-primary p-3">
                  <h6 class="text-dark">Previous Record Admission</h6>
                  <table>
                     <tr>
                        <td width="120px">GR ID:</td>
                        <td><span id="gr_ids"></span></td>
                     </tr>
                     <tr>
                        <td>EnrollmentNo:</td>
                        <td><span id="enrollmentno"></span></td>
                     </tr>
                     <tr>
                        <td>Name:</td>
                        <td><span id="fullname"></span></td>
                     </tr>
                     <tr>
                        <td>Branch:</td>
                        <td><span id="admissionbarnch"></span></td>
                     </tr>
                     <tr>
                        <td>MobileNo:</td>
                        <td><span id="admission_mobileno"></span></td>
                     </tr>
                     <tr>
                        <td>Course:</td>
                        <td><span id="admission_course"></span></td>
                     </tr>
                     <tr>
                        <td>Assigned To:</td>
                        <td><span id="af"></span></td>
                     </tr>
                     <tr>
                        <td>Date:</td>
                        <td><span id="admission_date"></span></td>
                     </tr>
                     <tr>
                        <td>AddBy:</td>
                        <td><span id="admission_adby"></span></td>
                     </tr>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Vertically Center -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
   aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title text-dark" id="exampleModalCenterTitle">Verify The Numbers</h5>
            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button> -->
            <input type="button" name="SkipOTP" id="SkipOTP" class="btn btn-sm btn-info" value="Skip">
         </div>
         <div class="modal-body" id="SkipOTP_section">
            <form method="post" id="form_validation_inner" name="form_validation_inner" >
               <div id="mag_otp"></div>
               <div class="form-row">
                  <input type="hidden" name="alternate_mobile_no" id="alternate_mobile_replace_no" class="form-control">
                  <input type="hidden" name="father_mobile_no" id="father_mobile_replace_no" class="form-control">
                  <input type="hidden" name="mother_mobile_no" id="mother_mobile_replace_no" class="form-control">
                  <div class="form-group col-md-6">
                     <label for="inputEmail4">Mobile NO</label>
                     <input type="text" class="form-control" name="mobile_no" id="mobile_replace_no" placeholder="+91-00000-00000">
                  </div>
                  <div class="form-group col-md-6">
                     <label for="inputPassword4">OTP</label>
                     <input type="text" class="form-control" name="mobileOtp" id="mobileOtp" placeholder="Enter Your Otp">
                  </div>
                  <div class="form-group col-md-6">
                     <input type="button" name="" id="sendotp" class="btn btn-sm btn-primary" value="Send OTP">
                  </div>
                  <div class="form-group col-md-6">
                     <input type="button" name="" id="verifyotp" class="btn btn-sm btn-primary" value="Verify">
                  </div>
               </div>
         </div>
         <div class="modal-footer bg-whitesmoke br">
         <button type="submit" name="submit" class="btn btn-primary">Save</button>
         <button type="button" class="btn btn-light text-dark" data-dismiss="modal">Close</button>
         </div>
         </form>
      </div>
   </div>
</div>
<!-- JS Libraies -->
<script src="<?php echo base_url(); ?>dist/assets/bundles/cleave-js/dist/cleave.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/cleave-js/dist/addons/cleave-phone.us.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script> 
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/forms-advanced-forms.js"></script>
<!-- General JS Scripts -->
<script src="<?php echo base_url(); ?>dist/assets/js/app.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>
<!-- JS Libraies -->
<script src="<?php echo base_url(); ?>dist/assets/bundles/apexcharts/apexcharts.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/index.js"></script>
<!-- JS Libraies --> 
<script src="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/custom.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>
<script>
   function activitys(sel) {
   if (sel.value != sel.value.replace(/[^0-9.]/g, '')) {
   sel.value = sel.value.replace(/[^0-9.]/g, '');
      }else{
     var discount = sel.value;
     var total = $('#tuation_fees_without_discount').val();
     var final_discount = (total/100)*discount;
     var final_fees = total - final_discount;
     $('#tuation_fees').val(final_fees);
   }
}

   
   function disable_dis()
   {
      var give_discount = $("input[type='radio'][name='discont']:checked").val();
      if(give_discount == "Yes") {
         $('#discount_percentage').attr('readonly', false); // Disable it.
      }else{
         $('#discount_percentage').attr('readonly', true); // Disable it.
         $('.#discount_percentage').addClass('text-muted');
         document.getElementById('discount_percentage').value = '';
      }
   }


   $("#Receipt").hide();
   $('#ChequeReceipt').hide();
   function paymenttype(p) {
   	// $("#Receipt").show();
   	// $("#ChequeReceipt").hide();
   	// alert(p);
   	var x = p.options[p.selectedIndex].text;
   	// alert(x);
   	if(x == 'Cash')
   	{
   		$(".Cheque-Hidden").show();
   		// $(".processingcheck-receipt").hide();
   		// $(".final-receipt").show();
   	}
   	else
   	{
   		$(".Cheque-Hidden").hide();
   	}
   
   	if(x=="Cheque")
   	{
   		$(".Cheque-Hidden").show();
   		// $(".processingcheck-receipt").show();
   		// $(".final-receipt").hide();
   	}
   	else
   	{
   		$(".Cheque-Hidden").hide();
   		// $(".processingcheck-receipt").hide();
   		// $(".final-receipt").show();
   	}
   
   	if(x=="DD")
   	{
   		$(".Dd-Hidden").show();
   		// $(".processingcheck-receipt").show();
   		// $(".final-receipt").hide();
   	}
   	else
   	{
   		$(".Dd-Hidden").hide();
   		// $(".processingcheck-receipt").hide();
   		// $(".final-receipt").show();
   	}
   
   	if(x=="Credit Card")
   	{
   		$(".Cradit-Card").show();
   	}
   	else
   	{
   		$(".Cradit-Card").hide();
   	}
   
   	if(x=="Debit Card")
   	{
   		$(".Debit-Card").show();
   	}
   	else
   	{
   		$('.Debit-Card').hide();
   	}
   
   	if(x=="Online Payment")
   	{
   		$(".Online-Payment").show();
   	}
   	else
   	{
   		$('.Online-Payment').hide();
   	}
   
   	if(x=="NEFT / IMPS")
   	{
   		$(".NEFT-IMPS").show();
   	}
   	else
   	{
   		$('.NEFT-IMPS').hide();
   	}
   
   	if(x=="Paytm")
   	{
   		$(".Paytm").show();
   	}
   	else
   	{
   		$('.Paytm').hide();
   	}
   
   	if(x=="Bank Deposit (Cash)")
   	{
   		$(".Bank-Deposit").show();
   	}
   	else
   	{
   		$('.Bank-Deposit').hide();
   	}
   
   	if(x=="Capital Float (EMI)")
   	{
   		$(".Capital-Float").show();
   	}
   	else
   	{
   		$('.Capital-Float').hide();
   	}
   
   	if(x=="Google Pay")
   	{
   		$(".Google-Pay").show();
   	}
   	else
   	{
   		$('.Google-Pay').hide();
   	}
   
   	if(x=="Phone Pay")
   	{
   		$(".Phone-Pay").show();
   	}
   	else
   	{
   		$('.Phone-Pay').hide();
   	}
   
   	if(x=="Bajaj Finserv (EMI)")
   	{
   		$(".Bajaj-Finserv").show();
   	}
   	else
   	{
   		$('.Bajaj-Finserv').hide();
   	}
   
   	if(x=="Bhim UPI(India)")
   	{
   		$(".Bhim-UPI").show();
   	}
   	else
   	{
   		$('.Bhim-UPI').hide();
   	}
   
   	if(x=="Instamojo")
   	{
   		$(".Insta-mojo").show();
   	}
   	else
   	{
   		$('.Insta-mojo').hide();
   	}
   
   	if(x=="Paypal")
   	{
   		$(".Pay-pal").show();
   	}
   	else
   	{
   		$('.Pay-pal').hide();
   	}
   
   	if(x=="Razorpay")
   	{
   		$(".Razor-pay").show();
   	}
   	else
   	{
   		$('.Razor-pay').hide();
   	}
   	return true;
   }
</script>
<script type="text/javascript">
   $('.processingcheck-receipt').hide();
   $('.Cheque-Hidden').hide();
   $('.Dd-Hidden').hide();
   $('.Cradit-Card').hide();
   $('.Debit-Card').hide();
   $('.Online-Payment').hide();
   $('.NEFT-IMPS').hide();
   $('.Paytm').hide();
   $('.Bank-Deposit').hide();
   $('.Capital-Float').hide();
   $('.Google-Pay').hide();
   $('.Phone-Pay').hide();
   $('.Bajaj-Finserv').hide();
   $('.Bhim-UPI').hide();
   $('.Insta-mojo').hide();
   $('.Pay-pal').hide();
   $('.Razor-pay').hide();
      $('#sendotp').on('click',function(){
         var mobile_replace_no = $('#mobile_replace_no').val();
         
         $.ajax({
             type : "POST",
             url  : "<?php echo base_url(); ?>Admission/Send_Otp",
             data : {'mobile_no' : mobile_replace_no },
             success: function(resp)
             {
           	   var data = $.parseJSON(resp);
                 var ddd = data['all_record'].status;
                 if(ddd == '1')
                 {
                     $('#mag_otp').html(iziToast.success({
                     title: 'Success',
                     timeout: 5000,
                     message: 'Send OTP.',
                     position: 'topRight'
                     }));
                 }
                 else
                 {
                     $('#mag_otp').html(iziToast.error({
                     title: 'Canceled!',
                     timeout: 5000,
                     message: 'Someting Wrong!!',
                     position: 'topRight'
                     }));
                 }
             }
         });
         return false;
     });
     
     $('#verifyotp').on('click',function(){
         var mobileOtp = $('#mobileOtp').val();
         
         $.ajax({
             type : "POST",
             url  : "<?php echo base_url(); ?>Admission/verify_otp",
             data : {'mobileOtp' : mobileOtp },
             success: function(resp)
             {
           	   var data = $.parseJSON(resp);
                 var ddd = data['all_record'].status;
                 if(ddd == '1')
                 {
                     $('#mag_otp').html(iziToast.success({
                        title: 'Success',
                        timeout: 5000,
                        message: 'Verify OTP.',
                        position: 'topRight'
                        }));
                 }
                 else
                 {
                     $('#mag_otp').html(iziToast.error({
                     title: 'Canceled!',
                     timeout: 5000,
                     message: 'Someting Wrong!!',
                     position: 'topRight'
                  }));
                 }
             }
         });
         return false;
     });
</script>		
<script>
   function check_process(){
   
   var mobile_no = $('#mobile_no').val();
   var alternate_mobile_no = $('#alternate_number').val();
   var email = $('#email').val();
   x
   //console.log(mobile_no);
   $.ajax({
   type : "POST",
   url  : "<?php echo base_url(); ?>AddmissionController/Getrecode_multiple",
   data:{ 'mobile_no' : mobile_no , 'alternate_mobile_no' : alternate_mobile_no , 'email' : email },
   success:function(multiple_data){
   
   var data = $.parseJSON(multiple_data);
   
   // console.log(data.multiple_data.mobile_no);
   if(data.multiple_data.mobile_no){
    
   $('#mobile_replace_no').val(data.multiple_data.mobile_no);
   $('#alternate_mobile_replace_no').val(data.multiple_data.alternate_mobile_no);
   $('#father_mobile_replace_no').val(data.multiple_data.father_mobile_no);
   $('#mother_mobile_replace_no').val(data.multiple_data.mother_mobile_no);
   }else{
    // console.log(" nathi malyo");
   	$('#mobile_replace_no').val(mobile_no);
   	$('#alternate_mobile_replace_no').val(alternate_mobile_no);
   }
   }
   });
}
</script>
<script>
   $('.select_course_package').hide();
     $(document).ready(function(){
   
     	$('#SkipOTP').click(function(){
     		$('#SkipOTP_section').hide();
     	});
     
      // mobileno_wise_data();
     
      // function mobileno_wise_data(query)
      // {
      //  $.ajax({
      //   url:"<?php echo base_url(); ?>AddmissionController/GetRecord",
      //   method:"POST",
      //   data:{mobile_no:query},
      //   success:function(res)
      //   {
      //    	var data = $.parseJSON(res);
     	// 	if(data.record['lead_list_id']!=''){
     	//          $('#lead_list_id').val(data.record['lead_list_id']);
     	//     }else{
     	//          $('#lead_list_id').val('');
     	//     }
     	//     $('#mobile_no').val(data.record['mobile_no']);
     	//      // alert($data.record['source_id']);
     	//     $('#source_id').val(data.record['source_id']);
     	//     $('#alternate_number').val(data.record['alternate_mobile_no']);
     	//     $('#email').val(data.record['email']);
     	//     $('#email_id').val(data.record['email']);
     	//     $('#first_name').val(data.record['first_name']);
     	//     $('#surname').val(data.record['surname']);
     	//     $('#branch_id').val(data.record['branch_id']);
     	//      // alert(data.record['branch_id']);
     	//     get_course_details(data.record['branch_id']);
   
     	//     $('#atak_father').val(data.record['surname']);
     	//      $('#atak_mother').val(data.record['surname']);
     	//      $('#state_id').val(data.record['state_id']);
     	//      $('#city_id').val(data.record['city_id']);
     	//      $('#area_id').val(data.record['area_id']);
     	//      $('#pin_code').val(data.record['pin_code']);
     	//      $('#pre_address').val(data.record['present_address']);
     	//      $('#permanent_address').val(data.record['permanent_address']);
     	//      $('#father_name').val(data.record['father_name']);
     	//      $('#father_email').val(data.record['father_email']);
     	//      $('#father_mobile_no').val(data.record['father_mobile_no']);
     	//      $('#father_occupation').val(data.record['father_occupation']);
     	//      $('#father_income').val(data.record['father_income']);
     	//      $('#mother_name').val(data.record['mother_name']);
     	//      $('#mother_email').val(data.record['mother_email']);
     	//      $('#mother_mobile_no').val(data.record['mother_mobile_no']);
     	//      $('#mother_occupation').val(data.record['mother_occupation']);
     	//      $('#mother_income').val(data.record['mother_income']);
     	//      $('#school_collage_name').val(data.record['school_collage_name']);
     	//      $('#country_id').val(data.record['country_id']);
     	//      $('#school_clg_state').val(data.record['school_clg_state']);
     	//      $('#school_clg_city').val(data.record['school_clg_city']);
     	//      $('#school_clg_area').val(data.record['school_clg_area']);
     	    
     	//     var sch_clg_type = data.record['school_collage_type'];
     
     	//     if(sch_clg_type == 'college') 
     	//     {
     	//         $("#clg_typ"). prop("checked", true);
     	//     }
     	//     if(sch_clg_type == 'school') 
     	//     {
     	//         $("#sch_typ"). prop("checked", true);
     	//     }
     	//      var pack_sin =  data.record['course_package'];
     	                 
     	//     if(pack_sin == 'package')
     	//     {
     	//         $("#course_package"). prop("checked", true);
     	//         // get_course_package('package');
     	//          $('.select_course_package').show();
     	//          $('.select_course_single').hide();
     	//          $('#course_orpackage').val(data.record['course_or_package']);
     	        
     	//     }
     	//     else
     	//     {
     	//         $("#course_single"). prop("checked", true); 
     	//         // get_course_package('single');
     	//         $('.select_course_package').hide();
     	//         $('.select_course_single').show();
     	//        $('#course_orsingle').val(data.record['course_or_package']);
     	    
     	//     }
      //   }
      //  })
      // }
     
      // $('#mobile_no').keyup(function(){
      //  var search = $(this).val();
      //  if(search != '')
      //  {
      //   mobileno_wise_data(search);
      //  }
      //  else
      //  {
      //   mobileno_wise_data();
      //  }
      // });
     });
</script>
<script>
   $(document).ready(function(){
   
    email_data();
   
    function email_data(query)
    {
     $.ajax({
      url:"<?php echo base_url(); ?>AddmissionController/Getrecord_email_wise",
      method:"POST",
      data:{email:query},
      success:function(res){
       var data = $.parseJSON(res);
   
       if(data.record['lead_list_id']!=''){
        	 $('#lead_list_id').val(data.record['lead_list_id']);
    	}else{
    		 $('#lead_list_id').val('');
    	}
        $('#mobile_no').val(data.record['mobile_no']);
        $('#source_id').val(data.record['source_id']);
        $('#alternate_number').val(data.record['alternate_mobile_no']);
        $('#email').val(data.record['email']);
        $('#email_id').val(data.record['email']);
        $('#first_name').val(data.record['first_name']);
        $('#surname').val(data.record['surname']);
        $('#admission_branch').val(data.record['branch_id']);
        $('#atak_father').val(data.record['surname']);
        $('#atak_mother').val(data.record['surname']);
        $('#state_id').val(data.record['state_id']);
        $('#city_id').val(data.record['city_id']);
        $('#area_id').val(data.record['area_id']);
        $('#pin_code').val(data.record['pin_code']);
        $('#pre_address').val(data.record['present_address']);
        $('#permanent_address').val(data.record['permanent_address']);
        $('#father_name').val(data.record['father_name']);
        $('#father_email').val(data.record['father_email']);
        $('#father_mobile_no').val(data.record['father_mobile_no']);
        $('#father_occupation').val(data.record['father_occupation']);
        $('#father_income').val(data.record['father_income']);
        $('#mother_name').val(data.record['mother_name']);
        $('#mother_email').val(data.record['mother_email']);
        $('#mother_mobile_no').val(data.record['mother_mobile_no']);
        $('#mother_occupation').val(data.record['mother_occupation']);
        $('#mother_income').val(data.record['mother_income']);
        $('#school_collage_name').val(data.record['school_collage_name']);
        $('#country_id').val(data.record['country_id']);
        $('#school_clg_state').val(data.record['school_clg_state']);
        $('#school_clg_city').val(data.record['school_clg_city']);
        $('#school_clg_area').val(data.record['school_clg_area']);
   	
   	var sch_clg_type = data.record['school_collage_type'];
   
   	if(sch_clg_type == 'college') 
   	{
   		$("#clg_typ"). prop("checked", true);
   	}
   	if(sch_clg_type == 'school') 
   	{
   		$("#sch_typ"). prop("checked", true);
   	}
        var pack_sin =  data.record['course_package'];
   				 
   	if(pack_sin == 'package')
   	{
   		$("#course_package"). prop("checked", true);
   		// get_course_package('package');
   		 $('.select_course_package').show();
   		 $('.select_course_single').hide();
   		 $('#course_orpackage').val(data.record['course_or_package']);
   		
   	}
   	else
   	{
   		$("#course_single"). prop("checked", true);	
   		// get_course_package('single');
   		$('.select_course_package').hide();
   	    $('.select_course_single').show();
   	   $('#course_orsingle').val(data.record['course_or_package']);
   	
   	}
   
      }
     })
    }
   
    $('#email').keyup(function(){
     var search = $(this).val();
     if(search != '')
     {
      email_data(search);
     }
     else
     {
      email_data();
     }
    });
   });
</script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
   // just for the demos, avoids form submit
   	
   
   jQuery.validator.setDefaults({
     debug: true,
     success: "valid"
   });
   
   $('#form_validation').validate({
   		rules :{
   			mobile_no :{
   				required : true,
   				minlength : 10,
   				maxlength : 10
   			},
   			email : {
   				required:true,
   				email : true
   			},
   			source_id : {
   				required : true
   			},
   			first_name :{
   				required : true
   			},
   			surname :{
   				required : true
   			},
            stu_dob :{
   				required : true
   			},
            gender :{
   				required : true
   			},
   			branch_id :{
   				required : true
   			},
   			tuation_fees:{
   				required : true
   			},
   			registration_fees:{
   				required : true
   			},
   			payment_mode:{
   				required : true
   			}
   		},
   		messages:{
   mobile_no :{
      	required : "<span style='color:red; float:left'>Enter Mobile No!!</span>",
      	minlength : "<span style='color:red; float:left'>Enter Minimum 10 digits!!</span>",
      	maxlength : "<span style='color:red; float:left'>Enter Maximum 10 digits!!</span>"
   },
   email :{
   	required : "<span style='color:red;'>Enter Email Id!!</span>",
   	email : "<span style='color:red;'>Enter valid Email!!</span>",
   },
   source_id : {
   	required : "Select Source"
   },
   first_name : {
   	required : "Enter First Name"
   },
   surname:{
   	required : "Enter Surname"
   },
   stu_dob:{
   	required : "Select D.O.B"
   },
   gender:{
   	required : "Select Gender"
   },
   branch_id:{
   	required : "Select Branch Name"
   },
   tuation_fees:{
   	required : "Enter Tution Fees"
   },
   registration_fees:{
   	required : "Enter Registrations Fees"
   },
   payment_mode :{
   	required : "Please Select Payment Mode"
   }
   },
   submitHandler: function(form) {
   getRecordStudent();
   }
   	});
   
   
   
   $("#form_validation_inner" ).validate({
     rules: {
       mobile_no: {
         required: true,
         number: true
       },
       mobileOtp :{
   				required :true,
   				number : true,
   				minlength : 6,
   				maxlength : 6
   			}
     },
     messages:{
     	mobile_no:{
     		required:"<div style='color:red'>Mobile Number is required</div>",
     		number: "<div style='color:red'>Only Numbers required</div>"
     	},
     	mobileOtp :{
   required : "<div style='color:red'>Please Enter OTP Number</div>",
   number : "<div style='color:red'>Please Enter Number</div>",
   minlength : "<div style='color:red'>Minimum 6 digits</div>",
   maxlength : "<div style='color:red'>Maximum 6 digits</div>"
   		}
    },
    submitHandler: function(form) {
                   // form.submit();
   	$('#exampleModalCenter').modal('hide');
    var mobile_no = $('#mobile_replace_no').val();
   $('#mobile_no').val(mobile_no);
    var alternate_mobile_no = $('#alternate_mobile_replace_no').val();
    $('#alternate_number').val(alternate_mobile_no);
    var father_mobile_no = $('#father_mobile_replace_no').val();
    $('#father_mobile_replace_no').val(father_mobile_no);
    var mother_mobile_no = $('#mother_mobile_replace_no').val();
    $('#mother_mobile_replace_no').val(mother_mobile_no);
   
   	var confi = confirm("Are Your Sure To Take Admission");
   	
   if(confi){
   var dataform = $('#form_validation').serializeArray(); 
   $.ajax({
      url : "<?php echo base_url(); ?>Admission/QuichAdmissionProccess",
      type:"post",
      data: dataform,
      success:function(resp)
      {
     	   var data = $.parseJSON(resp);
        	var admis_id = data['allrecord'].admission_id;
        	var regtra_fees = data['allrecord'].registration_fees;
        	var adm_id = data['allrecord'].admission_id;
        	var g_ids = data['allrecord'].gr_id;
        	var enrollnumber = data['allrecord'].enrollment_number;
        	var msg_id = data['allrecord'].admission_id;
        	var receipt_admi = data['allrecord'].admission_id;
        	var paymType = $('#payment_mode').val();
       		// $('#Receipt').show();
       		$('#receipt_admission_id').val(admis_id);
       			
       		if(paymType == 'Cash'){
       			$(".processingcheck-receipt").hide();
   		$(".final-receipt").show();
       		}
       		else if(paymType == 'Cheque'){
       			$(".processingcheck-receipt").show();
   		$(".final-receipt").hide();	
       		}
       		else if(paymType == 'DD'){
       			$(".processingcheck-receipt").show();
   		$(".final-receipt").hide();	
       		}
       		else{
       			$(".processingcheck-receipt").hide();
   		$(".final-receipt").show();		
       		}
       		
        	$('#update_id').val(admis_id);
        	$('#registra_fees').val(regtra_fees);
        	$('#amis_ids').val(adm_id);
        	$('#g_ids').val(g_ids);
        	$('#enrollnumber').val(enrollnumber);
        	// $('.receipt_admission').val(receipt_admi);
   	   if($('#form_one_msg').val(msg_id))
         {
            $('#quick_admission_msg').html(iziToast.success({
                  title: 'Success',
                  timeout: 2500,
                  message: 'Quick Admission Done.',
                  position: 'topRight'
               }));
               paymenttype(paymType);
         }
         }
      });
    }
   }
   });
</script>
<script>
   // $(document).ready(function(){
   //   $("#open_check_modal").click(function(){
   function getRecordStudent()
   {    
       $('#exampleModalCenter').modal('show');
      
      			     var mobile_no = $('#mobile_no').val();
                  	 var alternate_mobile_no = $('#alternate_number').val();
                  	 var email = $('#email').val();
                  
                  //console.log(mobile_no);
      		             $.ajax({
      		                type : "POST",
      		                url  : "<?php echo base_url(); ?>AddmissionController/Getrecode_multiple",
      		                data:{ 'mobile_no' : mobile_no , 'alternate_mobile_no' : alternate_mobile_no , 'email' : email },
      					   success:function(multiple_data){
      					   
      					  var data = $.parseJSON(multiple_data);
      
      					  // console.log(data.multiple_data.mobile_no);
      					   if(data.multiple_data.mobile_no){
      					     
      		                $('#mobile_replace_no').val(data.multiple_data.mobile_no);
      		                $('#alternate_mobile_replace_no').val(data.multiple_data.alternate_mobile_no);
      		                $('#father_mobile_replace_no').val(data.multiple_data.father_mobile_no);
      		                $('#mother_mobile_replace_no').val(data.multiple_data.mother_mobile_no);
      					   	
      					   }else{
      
      			    		 // console.log(" nathi malyo");
      
      			   				$('#mobile_replace_no').val(mobile_no);
      			   				$('#alternate_mobile_replace_no').val(alternate_mobile_no);
                  
                      	}
                  	}
                  });
   }
   //   });
   // });
</script>
<script>
   function get_course_details(branch_id)
   {
   		$.ajax({
   		     url:"<?php echo base_url(); ?>AddmissionController/fetch_single_course",
   		     method:"POST",
   		     data:{branch_id:branch_id},
   		     success:function(data)
   		     {
   		      $('#course_orsingle').html(data);
   		      $('#select_course_package').hide();
   		      $('#select_course_single').show();
   		   
   		     }
   	    });
   }
   
   $(document).ready(function(){
   
   $('#branch_id').change(function(){
   
   var branch_id = $('#branch_id').val();
   
    $.ajax({
     url:"<?php echo base_url(); ?>AddmissionController/fetch_single_course",
     method:"POST",
     data:{branch_id:branch_id},
     success:function(data)
     {
      $('#course_orsingle').html(data);
   	 }
    });
   });
   
   $('.branch').change(function(){
   
   var branch_id = $('.branch').val();
   
    $.ajax({
     url:"<?php echo base_url(); ?>AddmissionController/fetch_package_course",
     method:"POST",
     data:{branch_id:branch_id},
     success:function(data)
     {
      $('#course_or_package').html(data);
   
     }
    });
   });
   
   // $('.cofees').change(function(){
   // var subcourse_id = $('.cofees').val();
   
   //  $.ajax({
   //   url:"<?php echo base_url(); ?>AddmissionController/get_cofees",
   //   method:"POST",
   //   data:{ 'subcourse_id' : subcourse_id }, 
   //   success:function(resp)
   //   {
   //      var data = $.parseJSON(resp);
   //      var fees = data['single_record'].fees;
   //      var installment = data['single_record'].installment;
   // $('#tuation_fees').val(fees);
   // $('#no_of_installment').val(installment);
   //   }
   
   //  });
   // });
   
   // $('.pafees').change(function(){
   // var package_id = $('.pafees').val();
   
   //  $.ajax({
   //   url:"<?php echo base_url(); ?>AddmissionController/get_pafees",
   //   method:"POST",
   //   data:{ 'package_id' : package_id }, 
   //   success:function(resp)
   //   {
   //      var data = $.parseJSON(resp);
   //      var fees = data['single_record'].fees;
   // var installment = data['single_record'].installment;
   // $('#tuation_fees').val(fees);
   // $('#no_of_installment').val(installment);
   //   }
   
   //  });
   // });
   
      $('.cofees').change(function(){
   var subcourse_id = $('.cofees').val();
   var give_discount = $("input[name='discont']:checked").val();
   var branch_id = $('.branch').val();
   if(give_discount == "Yes"){
    $.ajax({
     url:"<?php echo base_url(); ?>Admission/get_cofees",
     method:"POST",
     data:{ 'subcourse_id' : subcourse_id , 'branch_id' : branch_id }, 
     success:function(resp)
     {
        var data = $.parseJSON(resp);
        var fees = data['single_record'].fees;
        var installment = data['single_record'].installment;
        var final = $('#discount_percentage').val();
         var final_discount = (fees/100)*final ;
         var final_fees = fees - final_discount;
         $('#discount_ammount').val(final_discount);
         $('#tuation_fees_without_discount').val(fees);
         $('#no_of_installment').val(installment);
         $('#tuation_fees').val(final_fees);
         $('#no_of_installment').val(installment);
     }

    });
   }
   else{
      $.ajax({
     url:"<?php echo base_url(); ?>Admission/get_cofees",
     method:"POST",
     data:{ 'subcourse_id' : subcourse_id , 'branch_id' : branch_id }, 
     success:function(resp)
     {
        var data = $.parseJSON(resp);
        var fees = data['single_record'].fees;
        var installment = data['single_record'].installment;
         $('#tuation_fees').val(fees);
         $('#no_of_installment').val(installment);
     }

    });
   }
   });

   $('.pafees').change(function(){
   var package_id = $('.pafees').val();
   var give_discount = $("input[name='discont']:checked").val();
   var branch_id = $('.branch').val();
   if(give_discount == "Yes"){
      $.ajax({
      url:"<?php echo base_url(); ?>Admission/get_pafees",
      method:"POST",
      data:{ 'package_id' : package_id , 'branch_id' : branch_id }, 
      success:function(resp)
      {
         var data = $.parseJSON(resp);
         var fees = data['single_record'].fees;
         var installment = data['single_record'].installment;
         var final = $('#discount_percentage').val();
         var final_discount = (fees/100)*final ;
         var final_fees = fees - final_discount;
         $('#tuation_fees').val(final_fees);
         $('#tuation_fees_without_discount').val(fees);
         $('#discount_ammount').val(final_discount);
         $('#no_of_installment').val(installment);
      }
      });
   } else {
      $.ajax({
      url:"<?php echo base_url(); ?>Admission/get_pafees",
      method:"POST",
      data:{ 'package_id' : package_id , 'branch_id' : branch_id }, 
      success:function(resp)
      {
         var data = $.parseJSON(resp);
         var fees = data['single_record'].fees;
         var installment = data['single_record'].installment;
         $('#tuation_fees').val(fees);
         $('#no_of_installment').val(installment);
      }

      });
   }
   });


   $('.subco').change(function(){
   
   var course_id = $('.subco').val();
   
    $.ajax({
     url:"<?php echo base_url(); ?>AddmissionController/get_subcourse",
     method:"POST",
     data:{ 'course_id' : course_id }, 
     success:function(data)
     {
       $('#stating_course_id').html(data);
     }
    });
   });
   
   $('.subpa').change(function(){
   
   var package_id = $('.subpa').val();
   
    $.ajax({
     url:"<?php echo base_url(); ?>AddmissionController/get_subpackage",
     method:"POST",
     data:{ 'package_id' : package_id }, 
     success:function(data)
     {
       $('#stating_course_id_pco').html(data);
     }
    });
   });
   
   $('#stating_course_id').change(function(){
   
   var course_start_id = $('#stating_course_id').val();
   var branch_id = $('.branch').val();
   
    $.ajax({
     url:"<?php echo base_url(); ?>AddmissionController/fetch_course_wise_batch",
     method:"POST",
     data:{ 'course_start_id' : course_start_id , 'branch_id' : branch_id}, 
     success:function(data)
     {
       $('#batch_id').html(data);
     }
    });
   });
   
   $('#stating_course_id_pco').change(function(){
   var stating_course_id = $('#stating_course_id_pco').val();
   var branch_id = $('.barch_wise_faculty').val();
   
    $.ajax({
     url:"<?php echo base_url(); ?>AddmissionController/fetch_batch_data",
     method:"POST",
     data:{ 'stating_course_id' : stating_course_id , 'branch_id' : branch_id}, 
     success:function(data)
     {
       $('#batch_id').html(data);
     }
    });
   });
   });
</script>
<script>
   function show_hide_package_course()
   {
   var course_package = $("input[name='quick_course_package']:checked").val();
   //alert(course_package);
   if(course_package == 'single'){
   	$('.select_course_single').show();
   	$('.select_course_package').hide();	
   }else{
   
   	$('.select_course_single').hide();
   	$('.select_course_package').show();
   }
   
   }

    function disable_button()
   {
      $("#Receipt").attr("disabled", true);
      $('#msg').html(iziToast.success({
                  title: 'Success',
                  timeout: 5000,
                  message: 'HI! Recirpt is already generated....',
                  position: 'topRight'
               }));
   }
   function disable_cheque_button()
   {
      $("#ChequeReceipt").attr("disabled", true);
      $('#msg').html(iziToast.success({
                  title: 'Success',
                  timeout: 5000,
                  message: 'HI! Recirpt is already generated....',
                  position: 'topRight'
               }));
   }
  
</script>
<!-- <script>
   $('#redata').hide();
   $(document).ready(function(){
   
    demo_data();
   
    function demo_data(query)
    {
     $.ajax({
      url:"<?php echo base_url(); ?>welcome/previous_data_demo",
      method:"POST",
      data:{query:query},
      success:function(res){
       var data = $.parseJSON(res);
   
       $('#redata').show(data.record['demo_id']);
   
       var d2 = data.record['demo_id'];
       $('#demo_idss').html(d2);
   
       var b2 = data.record['branch_name'];
       $('#branch').html(b2);
   
       var n2 = data.record['name'];
       $('#name').html(n2);
   
       var mno2 = data.record['mobileNo'];
       $('#demomobileno').html(mno2);
   
       var staco2 = data.record['startingCourse'];
       $('#startingCourse').html(staco2);
   
       var demodate2 = data.record['addDate'];
       $('#demodate').html(demodate2);
   
        var adb2 = data.record['addBy'];
       $('#addedby').html(adb2);
   
      }
     })
    }
   
    $('.m_no').keyup(function(){
     var search = $(this).val();
     if(search != '')
     {
      demo_data(search);
     }
     else
     {
      demo_data();
     }
    });
   });
</script>
<script>
   $(document).ready(function(){
   
    lead_data();
    function lead_data(query)
    {
     $.ajax({
      url:"<?php echo base_url(); ?>welcome/previous_data_lead",
      method:"POST",
      data:{query:query},
      success:function(res){
       var data = $.parseJSON(res);
   
       $('#redata').show(data.record['lead_list_id']);
   
       var le2 = data.record['lead_list_id'];
       $('#lead_list_idss').html(le2);
   
       var lb2 = data.record['branch_name'];
       $('#lead_branch').html(lb2);
   
       var ln2 = data.record['name'];
       $('#lead_name').html(ln2);
   
       var lm2 = data.record['mobile_no'];
       $('#leadmobile_no').html(lm2);
   
       var lc2 = data.record['package_name'];
       $('#lead_course').html(lc2);
   
       var lead_creation_date1 = data.record['lead_creation_date'];
       $('#lead_creation_date').html(lead_creation_date1);
   
       var ref2 = data.record['reference_name'];
       $('#reference_name').html(ref2);
      }
     })
    }
   
    $('.m_no').keyup(function(){
     var search = $(this).val();
     // alert(search);
     if(search != '')
     {
      lead_data(search);
     }
     else
     {
      lead_data();
     }
    });
   });
</script>
<script>
   $(document).ready(function(){
   
    admission_data();
   
    function admission_data(query)
    {
     $.ajax({
      url:"<?php echo base_url(); ?>welcome/previous_data_admission",
      method:"POST",
      data:{query:query},
      success:function(res){
       var data = $.parseJSON(res);
   
       $('#redata').show(data.record['admission_id']);
   
       var gr2 = data.record['gr_id'];
       $('#gr_ids').html(gr2);
   
       var enrollmentno2 = data.record['enrollment_number'];
       $('#enrollmentno').html(enrollmentno2);
   
       var fullname2 = data.record['surname'] + " " + data.record['first_name'] + " " + data.record['father_name'];
       $('#fullname').html(fullname2);
   
       var admissionbarnch1 = data.record['branch_name'];
       $('#admissionbarnch').html(admissionbarnch1);
   
        var admission_mobileno1 = data.record['mobile_no'];
       $('#admission_mobileno').html(admission_mobileno1);
   
       var course1 = data.record['course_name'];
       $('#admission_course').html(course1);
   
       var af1 = data.record['name'];
       $('#af').html(af1);  
   
       var admission_date1 = data.record['admission_date'];
       $('#admission_date').html(admission_date1);
   
       var adby1 = data.record['addby'];  
       $('#admission_adby').html(adby1);
   
      }
     })
    }
   
    $('.m_no').keyup(function(){
     var search = $(this).val();
     if(search != '')
     {
      admission_data(search);
     }
     else
     {
      admission_data();
     }
    });
   });
</script> -->
<script>
   $('#redata').hide();
   $(document).ready(function(){
   
    demo_data();
   
    function demo_data(query)
    {
     $.ajax({
      url:"<?php echo base_url(); ?>Admission/Getrecord_email_wise",
      method:"POST",
      data:{query:query},
      success:function(res){
       var data = $.parseJSON(res);
       $('#mobile_no').val(data.record['mobile_no']);
        //$('#email').val(data.record['email']);
       $('#source_id').val(data.record['source_id']);
        $('#alternate_number').val(data.record['alternate_mobile_no']);
       $('#stu_dob').val(data.record['stu_dob']);
        $('#email_id').val(data.record['email']);
           $('#demo_id').val(data.record['demo_id']);
        $('#lead_list_id]').val(data.record['lead_list_id']);
        $('#first_name').val(data.record['first_name']);
        $('#surname').val(data.record['surname']); 
        $('#admission_branch').val(data.record['branch_id']);
        $('#atak_father').val(data.record['surname']);
        $('#atak_mother').val(data.record['surname']);
        $('#state_id').val(data.record['state_id']);
        $('#city_id').val(data.record['city_id']);
        $('#area_id').val(data.record['area_id']);
        $('#pin_code').val(data.record['pin_code']);
        $('#pre_address').val(data.record['present_address']);
        $('#permanent_address').val(data.record['permanent_address']);
        $('#father_name').val(data.record['father_name']);
        $('#father_email').val(data.record['father_email']);
        $('#father_mobile_no').val(data.record['father_mobile_no']);
        $('#father_occupation').val(data.record['father_occupation']);
        $('#father_income').val(data.record['father_income']);
        $('#mother_name').val(data.record['mother_name']);
        $('#mother_email').val(data.record['mother_email']);
        $('#mother_mobile_no').val(data.record['mother_mobile_no']);
        $('#mother_occupation').val(data.record['mother_occupation']);
        $('#mother_income').val(data.record['mother_income']);
        $('#school_collage_name').val(data.record['school_collage_name']);
        $('#country_id').val(data.record['country_id']);
        $('#school_clg_state').val(data.record['school_clg_state']);
        $('#school_clg_city').val(data.record['school_clg_city']);
        $('#school_clg_area').val(data.record['school_clg_area']);
      
      var sch_clg_type = data.record['school_collage_type'];
   
      if(sch_clg_type == 'college') 
      {
         $("#clg_typ"). prop("checked", true);
      }
      if(sch_clg_type == 'school') 
      {
         $("#sch_typ"). prop("checked", true);
      }
        var pack_sin =  data.record['course_package'];
                
      if(pack_sin == 'package')
      {
         $("#course_package"). prop("checked", true);
         // get_course_package('package');
          $('.select_course_package').show();
          $('.select_course_single').hide();
          $('#course_orpackage').val(data.record['course_or_package']);
         
      }
      else
      {
         $("#course_single"). prop("checked", true);  
         // get_course_package('single');
         $('.select_course_package').hide();
          $('.select_course_single').show();
         $('#course_orsingle').val(data.record['course_or_package']);
      
      }
   
      }
     })
    }
   
    $('.email').keyup(function(){
     var search = $(this).val();
     if(search != '')
     {
      demo_data(search);
     }
     else
     {
      demo_data();
     }
    });
   });
</script>
<script>
   $(document).ready(function(){
   
    lead_data();
    function lead_data(query)
    {
     $.ajax({
      url:"<?php echo base_url(); ?>Admission/GetRecord_alternate_number_wise",
      method:"POST",
      data:{query:query},
      success:function(res){
       var data = $.parseJSON(res);
   
       $('#source_id').val(data.record['source_id']);
       $('#mobile_no').val(data.record['mobile_no']);
          $('#demo_id').val(data.record['demo_id']);
        $('#lead_list_id]').val(data.record['lead_list_id']);
        //$('#alternate_number').val(data.record['alternate_mobile_no']);
        $('#email').val(data.record['email']);
        $('#email_id').val(data.record['email']);
        $('#first_name').val(data.record['first_name']);
        $('#surname').val(data.record['surname']);
        $('#admission_branch').val(data.record['branch_id']);
        $('#atak_father').val(data.record['surname']);
        $('#atak_mother').val(data.record['surname']);
        $('#state_id').val(data.record['state_id']);
        $('#city_id').val(data.record['city_id']);
        $('#area_id').val(data.record['area_id']);
        $('#pin_code').val(data.record['pin_code']);
        $('#pre_address').val(data.record['present_address']);
        $('#permanent_address').val(data.record['permanent_address']);
        $('#father_name').val(data.record['father_name']);
        $('#father_email').val(data.record['father_email']);
        $('#father_mobile_no').val(data.record['father_mobile_no']);
        $('#father_occupation').val(data.record['father_occupation']);
        $('#father_income').val(data.record['father_income']);
        $('#mother_name').val(data.record['mother_name']);
        $('#mother_email').val(data.record['mother_email']);
        $('#mother_mobile_no').val(data.record['mother_mobile_no']);
        $('#mother_occupation').val(data.record['mother_occupation']);
        $('#mother_income').val(data.record['mother_income']);
        $('#school_collage_name').val(data.record['school_collage_name']);
        $('#country_id').val(data.record['country_id']);
        $('#school_clg_state').val(data.record['school_clg_state']);
        $('#school_clg_city').val(data.record['school_clg_city']);
        $('#school_clg_area').val(data.record['school_clg_area']);
      
      var sch_clg_type = data.record['school_collage_type'];
   
      if(sch_clg_type == 'college') 
      {
         $("#clg_typ"). prop("checked", true);
      }
      if(sch_clg_type == 'school') 
      {
         $("#sch_typ"). prop("checked", true);
      }
        var pack_sin =  data.record['course_package'];
                
      if(pack_sin == 'package')
      {
         $("#course_package"). prop("checked", true);
         // get_course_package('package');
          $('.select_course_package').show();
          $('.select_course_single').hide();
          $('#course_orpackage').val(data.record['course_or_package']);
         
      }
      else
      {
         $("#course_single"). prop("checked", true);  
         // get_course_package('single');
         $('.select_course_package').hide();
          $('.select_course_single').show();
         $('#course_orsingle').val(data.record['course_or_package']);
      
      }
      }
     })
    }
   
    $('.alternate_number').keyup(function(){
     var search = $(this).val();
     // alert(search);
     if(search != '')
     {
      lead_data(search);
     }
     else
     {
      lead_data();
     }
    });
   });
</script>
<script>
   $(document).ready(function(){
   
    //admission_data();
   
    function admission_data(query)
    {
       //alert(query);
     $.ajax({
      url:"<?php echo base_url(); ?>Admission/GetRecord",
      method:"POST",
      data:{query:query},
      success:function(res){
       var data = $.parseJSON(res);
        $('#source_id').val(data.record['source_id']);
        $('#alternate_number').val(data.record['alternate_mobile_no']);
        $('#email').val(data.record['email']);
        $('#demo_id').val(data.record['demo_id']);
        $('#lead_list_id]').val(data.record['lead_list_id']);
        $('#email_id').val(data.record['email']);
        $('#first_name').val(data.record['first_name']);
        $('#surname').val(data.record['surname']);
        $('#branch_id').val(data.record['branch_id']);
        $('#atak_father').val(data.record['surname']);
        $('#atak_mother').val(data.record['surname']);
        $('#state_id').val(data.record['state_id']);
        $('#city_id').val(data.record['city_id']);
        $('#area_id').val(data.record['area_id']);
        $('#pin_code').val(data.record['pin_code']);
        $('#pre_address').val(data.record['present_address']);
        $('#permanent_address').val(data.record['permanent_address']);
        $('#father_name').val(data.record['father_name']);
        $('#father_email').val(data.record['father_email']);
        $('#father_mobile_no').val(data.record['father_mobile_no']);
        $('#father_occupation').val(data.record['father_occupation']);
        $('#father_income').val(data.record['father_income']);
        $('#mother_name').val(data.record['mother_name']);
        $('#mother_email').val(data.record['mother_email']);
        $('#mother_mobile_no').val(data.record['mother_mobile_no']);
        $('#mother_occupation').val(data.record['mother_occupation']);
        $('#mother_income').val(data.record['mother_income']);
        $('#school_collage_name').val(data.record['school_collage_name']);
        $('#country_id').val(data.record['country_id']);
        $('#school_clg_state').val(data.record['school_clg_state']);
        $('#school_clg_city').val(data.record['school_clg_city']);
        $('#school_clg_area').val(data.record['school_clg_area']);
   
      var sch_clg_type = data.record['school_collage_type'];
   
      if(sch_clg_type == 'college') 
      {
         $("#clg_typ"). prop("checked", true);
      }
      if(sch_clg_type == 'school') 
      {
         $("#sch_typ"). prop("checked", true);
      }
        var pack_sin =  data.record['course_package'];
                
      if(pack_sin == 'package')
      {
         $("#course_package"). prop("checked", true);
         // get_course_package('package');
          $('.select_course_package').show();
          $('.select_course_single').hide();
          $('#course_orpackage').val(data.record['course_or_package']);
         
      }
      else
      {
         $("#course_single"). prop("checked", true);  
         // get_course_package('single');
         $('.select_course_package').hide();
          $('.select_course_single').show();
         $('#course_orsingle').val(data.record['course_or_package']);
      
      }
      }
     })
    }
   
    $('.mobile_no').keyup(function(){
     var search = $(this).val();
     //alert(search);
     if(search != '')
     {
      admission_data(search);
     }
     else
     {
      admission_data();
     }
    });
   });
</script>
<script type="text/javascript">
   $('#Receipt').on('click',function(){
   
   var admission_id = $('#receipt_admission_id').val();
   alert(admission_id);
   
   window.open("<?php echo base_url(); ?>Admission/erpreceipt?action=ere&xyqtu="+admission_id , '_blank');
   return false;
   });
</script>
<script type="text/javascript">
   $('#ChequeReceipt').on('click',function(){
   
   var admission_id = $('#receipt_admission_id').val();
   alert(admission_id);
   
   window.open("<?php echo base_url(); ?>Admission/erpProcessingCheck?action=cuxt&czyxtu="+admission_id , '_blank');
   return false;
   });
</script>
<script>
   function batch_notification(admission_courses_id=''){
   $.ajax({
    url : "<?php echo base_url(); ?>welcome/batchnotification_status",
    type:"post",
    data:{
      'admission_courses_id':admission_courses_id 
    },
    success:function(Resp){
     
     setTimeout(function() {
               location.reload();
           },500);
    }
   });
   }
   
   
   
   function isNumberKey(evt)
   {
   	// alert("test");
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
       return false;
   
    return true;
   }
   
</script>
</body> 
<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>