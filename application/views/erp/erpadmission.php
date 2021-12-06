<?php $b_ids = $_SESSION['branch_ids'];  $b_idb = explode(",",$b_ids); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/selectric.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
  
<style type="text/css">
	li.select2-selection__choice {
    background-color: #5864BC !important;
}
</style>
<div class="main-content">
	<div class="section-body">
            <div class="row">
			<div class="col-12 d-flex justify-content-between">
				<h6 class="page-title text-dark mb-3">Admission</h6>
				<nav aria-label="breadcrumb">
                      <ol class="breadcrumb p-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Library</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data</li>
                      </ol>
                    </nav>
			</div>
              <div class="col-12">
               
                <form enctype="multipart/form-data" method="post" id="form" action="<?php echo base_url(); ?>Admission/erpadmission">
                	<div class="card-item mb-3">
	                <div class="card card-primary">
	                  <div class="card-header form-title">
	                    <h4>Communication</h4>
	                  </div>
	                  <div class="card-body pl-3 pr-3 row pb-1 pt-2">
	                  	<div class="col-lg-3">
	                  		<div class="form-group">
		                      <label>Mobile No:</label>
		                      	<input type="hidden" name="lead_list_id" id="lead_list_id" class="form-control">
                              <input type="hidden" name="demo_id" id="demo_id" class="form-control">
							  			<label id="mobile_no_two-error" class="error" for="mobile_no_two" style="float:right;"></label>
		                      <input type="text"  class="form-control" name="mobile_no_two" id="mobile_no_two" placeholder="+91-00000-00000">
		                    </div>
	                  	</div>
	                  	<div class="col-lg-3"> 
		                    <div class="form-group">
		                      <label>Alternate  No:</label>
		                      <input type="text" class="form-control" name="alternate_no_two" id="alternate_no_two" placeholder="+91-00000-00000" >
		                    </div>
	                    </div>
	                    <div class="col-lg-3"> 
		                    <div class="form-group">
		                      <label>Email</label>
							  <label id="email_two-error" class="error" for="email_two" style="float:right;"></label>
		                      <input type="email" class="form-control" name="email_two" id="email_two" placeholder="jone@gmail.com">
		                    </div>
	                	</div>
	                	<div class="col-lg-3"> 
		                    <div class="form-group">
		                      <label>Source:</label>
							  <label id="source_id_two-error" class="error" for="source_id_two" style="float:right;color:red"></label>
		                     <select class="form-control" name="source_id_two" id="source_id_two">
		                       <option value="">Select Source</option>
                               <?php foreach($list_source as $ld) { ?>
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
		                      <label>First Name:</label>
							  <label id="first_name_two-error" class="error" for="first_name_two" style="float:right;color:red"></label>
		                      <input type="text" class="form-control" name="first_name_two" id="first_name_two" placeholder="Fisrt Name">
		                    </div>
	                  	</div>
	                  	<div class="col-lg-3"> 
		                    <div class="form-group">
		                      <label>Surname:</label>
							  <label id="last_name-error" class="error" for="last_name" style="float:right;color:red"></label>
		                      <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Surname">
		                    </div>
	                    </div>
						<div class="col-lg-3">
                           <div class="form-group">
                              <label>Student D-O-B</label>
                              <label id="stu_dob-error" class="error" for="stu_dob" style="float:right; color:red;"></label>
                              <input type="date" class="form-control" name="stu_dob" id="stu_dob" placeholder="Enter Your Birthdate" required="">
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
							  <label id="branch_id_two-error" class="error" for="branch_id_two" style="float:right;color:red"></label>
		                     	<select class="form-control branch_two barch_wise_faculty_two clg_cat" name="branch_id_two" id="branch_id_two" onchange="branch_data(this)">
		                        <option value="">Select Branch</option>
								<?php  $branch_id = explode(',',$_SESSION['branch_ids']);
                                 foreach($list_branch as $k=>$va){
                                    $br_id = explode(',',$va->branch_id);
                                    if($br_id[0] != ''){
                                       for($i=0; $i<sizeof($branch_id); $i++){
                                          if(in_array($branch_id[$i],$br_id)){
                                             ?><option value="<?php echo $va->branch_id; ?>"><?php echo $va->branch_name; ?></option><?php
                                          }
                                       }
                                    }
                                 }
                                 ?>
		                     	</select>
		                    </div>
	                	</div>
	                  	<div class="col-lg-3 clg-section"> 
		                    <div class="form-group">
		                      <label>Category:</label>
		                     	<select class="form-control" name="course_category_id" id="course_category_id">
		                        <option value="">Select Category</option>
		                     	</select>
		                    </div>
	                	</div>
						<div class="col-lg-3 clg-section"> 
		                    <div class="form-group">
		                      <label>College Course:</label>
		                     	<select class="form-control clg_co_ids" name="college_courses_id" id="college_courses_id">
		                        <option value="">Select Course</option>
		                     	</select>
		                    </div>
	                	</div>
						<div class="col-lg-3 clg-section"> 
		                    <div class="form-group">
		                      <label>College Tuition Fees:</label>
		                     	<input type="text" class="form-control" name="college_tuition_fees" id="college_tuition_fees" readonly>
		                    </div>
	                	</div>
						<div class="col-lg-3 clg-section"> 
		                    <div class="form-group">
		                      <label>College Registration Fees:</label>
		                     	<input type="text" class="form-control" name="college_registration_fees" id="college_registration_fees" readonly>
		                     	<input type="hidden" class="form-control" name="no_of_semester" id="no_of_semester">
		                    </div>
	                	</div>
	                	<div class="col-lg-3 section-hidden">
	                		<div class="form-group">
		                      <label class="d-block">Course Category</label>
							  <div class="pretty p-icon p-jelly p-round p-bigger mt-2">
							  <input class="form-check-input" type="radio" name="courses_type" id="exampleRadios3" value="package" onclick="return show_hide_package_course_two()">
									<div class="state p-info">
										<i class="icon material-icons">done</i>
										<label>Package</label>
									</div>
								</div>
								<div class="pretty p-icon p-jelly p-round p-bigger mt-2">
								<input class="form-check-input" type="radio" name="courses_type" id="exampleRadios4" value="single" onclick="return show_hide_package_course_two()">
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
                              <input type="text" class="form-control bg-transparent" name="discount_percentage" id="discount_percentage" placeholder="%" readonly onkeyup="activitys(this)">
                              <input type="hidden" name="discount_ammount" id="discount_ammount" class="form-control">
                           </div>
                        </div>
                        <?php } } ?>
	                	<!-- <div class="col-lg-6 select_course_package_two">
	                		<div class="form-group">
			                      <label>Select Package*</label>
			                      <select class="form-control select2 course_orpackage_two" name="course_or_package_two[]" id="course_or_package_two" multiple="">
			                        <option value="">Select Package</option>
			                      </select>
			                    </div>
	                	</div> -->
						<div class="col-lg-3 select_course_package_two section-hidden">
	                		<div class="form-group">
			                      <label>Select package*</label>
			                      <select class="form-control subpa pafees" name="course_or_package_two" id="course_or_package_two">
			                        <option value="">Select package</option>
			                      </select>
			                    </div>
	                	</div>
						<div class="col-lg-3 select_course_single_two section-hidden"> 
		                    <div class="form-group">
		                      <label>Select Course*</label>
		                     <select class="form-control course_or_single_two subco cofees" name="course_orsingle_two" id="course_orsingle_two">
		                      </select>
		                    </div>
	                	</div>
	                	<div class="col-lg-3 select_course_single_two section-hidden"> 
		                    <div class="form-group">
		                      <label>Starting Course*</label>
		                     <select class="form-control" name="stating_course_id_two" id="stating_course_id_two">
		                       <option value="">Select Course</option>
		                      </select>
		                    </div>
	                	</div>
						<div class="col-lg-3 select_course_package_two section-hidden"> 
		                    <div class="form-group">
		                      <label>Starting Course*</label>
		                     <select class="form-control" name="stating_course_id_pco" id="stating_course_id_pco">
		                       <option value="">Select Course</option>
		                      </select>
		                    </div>
	                	</div>
	                	<div class="col-lg-3 section-hidden"> 
		                    <div class="form-group">
			                    <label>Batch:</label>
			                    <select class="form-control" name="batch_id_two" id="batch_id_two">
			                        <option value="">Select Batch</option>
			                    </select>
		                    </div>
	                	</div>
	                  	<div class="col-lg-3 section-hidden"> 
		                    <div class="form-group">
		                      	<label>Tution Fees:</label>
								<label id="tuation_fees_two-error" class="error" for="tuation_fees_two" style="float:right;color:red"></label>
		                      	<input type="text" class="form-control" name="tuation_fees_two" id="tuation_fees_two" placeholder="Tution Fees">
		                      	<input type="hidden" class="form-control" name="tuation_fees_without_discount" id="tuation_fees_without_discount" placeholder="Tution Fees">
		                    </div>
	                    </div>
	                    <div class="col-lg-3 section-hidden"> 
		                    <div class="form-group">
		                    	<label>Registration Fees:</label>
								<label id="registration_fees_two-error" class="error" for="registration_fees_two" style="float:right;color:red"></label>
		                    	<input type="text" class="form-control" name="registration_fees_two" id="registration_fees_two" placeholder="Registration Fees">
		                    </div>
	                    </div>
						<div class="col-lg-3">
                           <div class="form-group">
                              <label class="d-block">Payment Type</label>
                              <label id="gender-error" class="error" for="gender" style="float:right; color:red;"></label>
                              <div class="pretty p-icon p-jelly p-round p-bigger mt-2">
                                 <input class="form-check-input" type="radio" id="payment_type" name="payment_type" value="Regular Payment" <?php {
																															echo "checked";
																														} ?> >
                                 <div class="state p-info">
                                    <i class="icon material-icons">done</i>
                                    <label>Regular Payment</label>
                                 </div>
                              </div>
                              <div class="pretty p-icon p-jelly p-round p-bigger mt-2">
                                 <input class="form-check-input" type="radio" name="payment_type" id="" value="Adjustment Payment">
                                 <div class="state p-info">
                                    <i class="icon material-icons">done</i>
                                    <label>Adjustment Payment</label>
                                 </div>
                              </div>
                           </div>
                        </div>
	                  <div class="col-lg-3"> 
	                    <div class="form-group">
	                      <label>Payment Mode</label>
						  <label id="payment_mode-error" class="error" for="payment_mode" style="float: right; color:red"></label>
	                     <select class="form-control" name="payment_mode" id="payment_mode" onchange="paymenttype(this)">
	                          <option value="">Select Mode</option>
	                          <option value="Cash" selected="selected">Cash</option>
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
	                 <div class="col-lg-3 Dd-Hidden"> 
	                    <div class="form-group">
	                      <label>Cheque/DD No</label>
	                      <input type="text" class="form-control" name="dd_cheque_dd_no" id="dd_cheque_dd_no" placeholder="Cheque/DD No">
	                    </div>
	                </div>	
	                <div class="col-lg-3 Dd-Hidden"> 
	                    <div class="form-group">
	                      <label>Cheque/DD Date</label>
	                      <input type="date" class="form-control" name="dd_cheque_dd_date" id="dd_cheque_dd_date" placeholder="Cheque/DD Date">
	                    </div>
	                </div>	
	                 <div class="col-lg-3 Dd-Hidden"> 
	                    <div class="form-group">
	                      <label>Bank Name</label>
	                      <input type="text" class="form-control" name="dd_bank_name" id="dd_bank_name" placeholder="Bnck Name">
	                    </div>
	                </div>	
	                <div class="col-lg-3 Dd-Hidden"> 
	                    <div class="form-group">
	                      <label>Bank Branch Name</label>
	                      <input type="text" class="form-control" name="dd_bank_branch_name" id="dd_bank_branch_name" placeholder="Bank Branch Name">
	                    </div>
	                </div>
	                 <div class="col-lg-3 Dd-Hidden"> 
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
	                <div class="col-lg-3 Cradit-Card"> 
	                    <div class="form-group">
	                      <label>Transaction No</label>
	                      <input type="text" class="form-control" name="cradit_card_transaction_no" id="cradit_card_transaction_no" placeholder="Transaction ID">
	                    </div>
	                </div>	
	                <div class="col-lg-3 Cradit-Card"> 
	                    <div class="form-group">
	                      <label>Transaction Date</label>
	                      <input type="date" class="form-control" name="cradit_card_transaction_date" id="cradit_card_transaction_date" placeholder="Transaction Date">
	                    </div>
	                </div>	
                    <div class="col-lg-3 Debit-Card"> 
	                <div class="form-group">
	                  <label>Transaction No</label>
	                  <input type="text" class="form-control" name="debit_card_transaction_no" id="debit_card_transaction_no" placeholder="Transaction ID">
	                </div>
	                </div>	
	                <div class="col-lg-3 Debit-Card"> 
	                    <div class="form-group">
	                      <label>Transaction Date</label>
	                      <input type="date" class="form-control" name="debit_card_transaction_date" id="debit_card_transaction_date" placeholder="Transaction Date">
	                    </div>
	                </div>	
                     <div class="col-lg-3 Online-Payment"> 
	                <div class="form-group">
	                  <label>Transaction No</label>
	                  <input type="text" class="form-control" name="online_payment_transaction_no" id="online_payment_transaction_no" placeholder="Transaction ID">
	                </div>
	                </div>	
	                <div class="col-lg-3 Online-Payment"> 
	                    <div class="form-group">
	                      <label>Transaction Date</label>
	                      <input type="date" class="form-control" name="online_payment_transaction_date" id="online_payment_transaction_date" placeholder="Transaction Date">
	                    </div>
	                </div>
	                <div class="col-lg-3 NEFT-IMPS"> 
	                <div class="form-group">
	                  <label>Transaction No</label>
	                  <input type="text" class="form-control" name="neft_imps_transaction_no" id="neft_imps_transaction_no" placeholder="Transaction ID">
	                </div>
	                </div>	
	                <div class="col-lg-3 NEFT-IMPS"> 
	                    <div class="form-group">
	                      <label>Transaction Date</label>
	                      <input type="date" class="form-control" name="neft_imps_transaction_date" id="neft_imps_transaction_date" placeholder="Transaction Date">
	                    </div>
	                </div>
	                <div class="col-lg-3 NEFT-IMPS"> 
	                    <div class="form-group">
	                      <label>Bank Name</label>
	                      <input type="text" class="form-control" name="neft_imps_bank_name" id="neft_imps_bank_name" placeholder="Bnck Name">
	                    </div>
	                </div>	
	                <div class="col-lg-3 NEFT-IMPS"> 
	                    <div class="form-group">
	                      <label>Bank Branch Name</label>
	                      <input type="text" class="form-control" name="neft_imps_bank_branch_name" id="neft_imps_bank_branch_name" placeholder="Bank Branch Name">
	                    </div>
	                </div>
                    <div class="col-lg-3 Paytm"> 
	                <div class="form-group">
	                  <label>Transaction No</label>
	                  <input type="text" class="form-control" name="paytm_transaction_no" id="paytm_transaction_no" placeholder="Transaction ID">
	                </div>
	                </div>	
	                <div class="col-lg-3 Paytm"> 
	                    <div class="form-group">
	                      <label>Transaction Date</label>
	                      <input type="date" class="form-control" name="paytm_transaction_date" id="paytm_transaction_date" placeholder="Transaction Date">
	                    </div>
	                </div>
	                   <div class="col-lg-3 Bank-Deposit"> 
	                <div class="form-group">
	                  <label>Transaction No</label>
	                  <input type="text" class="form-control" name="bank_deposit_transaction_no" id="bank_deposit_transaction_no" placeholder="Transaction ID">
	                </div>
	                </div>	
	                <div class="col-lg-3 Bank-Deposit"> 
	                    <div class="form-group">
	                      <label>Transaction Date</label>
	                      <input type="date" class="form-control" name="bank_deposit_transaction_date" id="bank_deposit_transaction_date" placeholder="Transaction Date">
	                    </div>
	                </div>
	                <div class="col-lg-3  Capital-Float"> 
	                <div class="form-group">
	                  <label>Transaction No</label>
	                  <input type="text" class="form-control" name="capital_float_transaction_no" id="capital_float_transaction_no" placeholder="Transaction ID">
	                </div>
	                </div>	
	                <div class="col-lg-3 Capital-Float"> 
	                    <div class="form-group">
	                      <label>Transaction Date</label>
	                      <input type="date" class="form-control" name="capital_float_transaction_date" id="capital_float_transaction_date" placeholder="Transaction Date">
	                    </div>
	                </div>
	                  <div class="col-lg-3  Google-Pay"> 
	                <div class="form-group">
	                  <label>Transaction No</label>
	                  <input type="text" class="form-control" name="google_pay_transaction_no" id="google_pay_transaction_no" placeholder="Transaction ID">
	                </div>
	                </div>	
	                <div class="col-lg-3 Google-Pay"> 
	                    <div class="form-group">
	                      <label>Transaction Date</label>
	                      <input type="date" class="form-control" name="google_pay_transaction_date" id="google_pay_transaction_date" placeholder="Transaction Date">
	                    </div>
	                </div>
                      <div class="col-lg-3  Phone-Pay"> 
	                <div class="form-group">
	                  <label>Transaction No</label>
	                  <input type="text" class="form-control" name="phone_pay_transaction_no" id="phone_pay_transaction_no" placeholder="Transaction ID">
	                </div>
	                </div>	
	                <div class="col-lg-3 Phone-Pay"> 
	                    <div class="form-group">
	                      <label>Transaction Date</label>
	                      <input type="date" class="form-control" name="phone_pay_transaction_date" id="phone_pay_transaction_date" placeholder="Transaction Date">
	                    </div>
	                </div>	
                      <div class="col-lg-3  Bajaj-Finserv"> 
	                <div class="form-group">
	                  <label>Transaction No</label>
	                  <input type="text" class="form-control" name="bajaj_finserv_transaction_no" id="bajaj_finserv_transaction_no" placeholder="Transaction ID">
	                </div>
	                </div>	
	                <div class="col-lg-3 Bajaj-Finserv"> 
	                    <div class="form-group">
	                      <label>Transaction Date</label>
	                      <input type="date" class="form-control" name="bajaj_finserv_transaction_date" id="bajaj_finserv_transaction_date" placeholder="Transaction Date">
	                    </div>
	                </div>	     
	                 <div class="col-lg-3  Bhim-UPI"> 
	                <div class="form-group">
	                  <label>Transaction No</label>
	                  <input type="text" class="form-control" name="bhim_upi_transaction_no" id="bhim_upi_transaction_no" placeholder="Transaction ID">
	                </div>
	                </div>	
	                <div class="col-lg-3 Bhim-UPI"> 
	                    <div class="form-group">
	                      <label>Transaction Date</label>
	                      <input type="date" class="form-control" name="bhim_upi_transaction_date" id="bhim_upi_transaction_date" placeholder="Transaction Date">
	                    </div>
	                </div>	 
	                <div class="col-lg-3  Insta-mojo"> 
	                <div class="form-group">
	                  <label>Transaction No</label>
	                  <input type="text" class="form-control" name="instamoj_transaction_no" id="instamoj_transaction_no" placeholder="Transaction ID">
	                </div>
	                </div>	
	                <div class="col-lg-3 Insta-mojo"> 
	                    <div class="form-group">
	                      <label>Transaction Date</label>
	                      <input type="date" class="form-control" name="instamoj_transaction_date" id="instamoj_transaction_date" placeholder="Transaction Date">
	                    </div>
	                </div>	
	                <div class="col-lg-3  Pay-pal"> 
	                <div class="form-group">
	                  <label>Transaction No</label>
	                  <input type="text" class="form-control" name="pay_pal_transaction_no" id="pay_pal_transaction_no" placeholder="Transaction ID">
	                </div>
	                </div>	
	                <div class="col-lg-3 Pay-pal"> 
	                    <div class="form-group">
	                      <label>Transaction Date</label>
	                      <input type="date" class="form-control" name="pay_pal_transaction_date" id="pay_pal_transaction_date" placeholder="Transaction Date">
	                    </div>
	                </div>  
	                    <div class="col-lg-3  Razor-pay"> 
	                <div class="form-group">
	                  <label>Transaction No</label>
	                  <input type="text" class="form-control" name="razorpay_transaction_no" id="razorpay_transaction_no" placeholder="Transaction ID">
	                </div>
	                </div>	
	                <div class="col-lg-3 Razor-pay"> 
	                    <div class="form-group">
	                      <label>Transaction Date</label>
	                      <input type="date" class="form-control" name="razorpay_transaction_date" id="razorpay_transaction_date" placeholder="Transaction Date">
	                    </div>
	                </div> 
	                  </div>
	                </div>
	               <!--  <div class="pb-3 px-3">
	                    <button class="btn btn-primary mr-1" type="submit">Submit</button> 
	                    <button class="btn btn-light mr-1" type="submit">Receipt</button> 
	                </div> -->
		            </div>

		           

		            <div class="card-item">
		                <div class="card card-primary">
		                  <div class="card-header form-title">
		                    <h4>Fees Installment</h4>
		                  </div>
		                  <div class="col-md-4 ml-auto section-hidden"><input type="text" class="form-control w-25 ml-auto d-inline-block mr-3" name="no_of_installments" id="no_of_installments"><input type="button" value="Make Installment" class="btn btn-primary" onclick="return make_installment_process()"><label id="no_of_installments-error" class="error" for="no_of_installments" style="color:red;"></label></div>
		                  <div class="card-body pl-3 pr-3 row pb-1 pt-2 section-hidden" id="installment_all_data">
		                  	<div class="col-lg-12">
		                  		
		                  	</div>
		                  	<div class="col-lg-1">
		                  		<div class="form-group text-center">
			                      <label><strong>#NO</strong></label> 
			                      <?php $no = "1"; ?>
			                      <p><?php if(isset($no)){ echo $no; } ?></p>
			                    </div>
		                  	</div>
		                  	<div class="col-lg-4"> 
			                    <div class="form-group">
			                      <label>Installment Date</label>
			                      <input type="text" class="form-control">
			                    </div>
		                    </div>
		                    <div class="col-lg-4"> 
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
		                	<div class="col-lg-1">
		                  		 
		                  	</div>
		                  	<div class="col-lg-2"> 
		                  		<div class="custom-control custom-checkbox">
			                      <input type="checkbox" class="custom-control-input" id="customCheck1">
			                      <label class="custom-control-label" for="customCheck1">Send SMS To:</label>
			                    </div>
		                    </div>
		                    <div class="col-lg-2"> 
		                    	<div class="custom-control custom-checkbox">
			                      <input type="checkbox" class="custom-control-input" id="customCheck2">
			                      <label class="custom-control-label" for="customCheck2">Send Email To:</label>
			                    </div>
		                	</div>
		                	<div class="col-lg-2"> 
			                    <div class="custom-control custom-checkbox">
			                      <input type="checkbox" class="custom-control-input" id="customCheck3">
			                      <label class="custom-control-label" for="customCheck3">Send SMS Father:</label>
			                    </div>
		                	</div>
		                	<div class="col-lg-2"> 
			                    <div class="custom-control custom-checkbox">
			                      <input type="checkbox" class="custom-control-input" id="customCheck4">
			                      <label class="custom-control-label" for="customCheck4">Send Email Father:</label>
			                    </div>
		                	</div>
		                  </div>
						  <div class="card-body pl-3 pr-3 row pb-1 pt-2 clg-section make_sem">
						  </div>
		                </div>
		                <div class="card">
		                  <div class="card-header form-title">
		                    <h4>Postal Communication</h4>
		                  </div>
		                  <div class="card-body pl-3 pr-3 row pb-1 pt-2">
								
								<div class="col-lg-5">
									<div class="row">
										<div class="col-lg-12">
											<div class="form-group">
											<label>Present Address:</label>
											<label id="payment_mode-error" class="error" for="payment_mode" style="float: right; color:red"></label>
											<input type="text" class="form-control" name="present_house_building_no" id="present_house_building_no" placeholder="Flate, House, Building, Apartment, Company">
											</div>
										</div>
										<div class="col-lg-12">
											<div class="form-group">
											<input type="text" class="form-control" name="present_street_area" id="present_street_area" placeholder="Area, colony, street, Village">
											</div>
										</div>
										<div class="col-lg-12">
											<div class="form-group">
											<input type="text" class="form-control" name="present_landmark_colony" id="present_landmark_colony" placeholder="Landmark near location eg.Apolo Hospital">
											</div>
										</div>
									</div>	
									<div class="border rounded p-3" style="border-color: #e3e6fc !important;position:relative;    margin-top: 5px;">
										<div class="row">
											<div class="col-lg-6">
												<div class="form-group">
												<label>Pin Code:</label>
												<input type="text" class="form-control" name="present_pin_code" id="present_pin_code" placeholder="Pin Code" onblur="return getCountryCityDetails()"  onkeypress="return isNumberKey(event)">
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
												<label>State:</label>
													<select class="form-control present_state_id" name="present_state_id" id="present_state_id">
													<option value="">Select State</option>
													<?php foreach($list_state as $val) { ?>
													<option <?php  if($val->state_name=="Gujarat") { echo "selected"; } ?> value="<?php echo $val->state_name; ?>"><?php echo $val->state_name; ?></option>
													<?php } ?>	
													</select>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
												<label>City:</label>
													<select class="form-control" name="present_city_id" id="present_city_id">
													<option value="">Select City</option>
													<?php foreach($list_city as $val) { ?>
													<option <?php  if($val->city_name=="Surat") { echo "selected"; } ?> value="<?php echo $val->city_name; ?>"><?php echo $val->city_name; ?></option>
													<?php } ?>	
													</select>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label>Area:</label>
													<select class="form-control" name="present_area_id" id="present_area_id">
													<option value="">Select Area</option>
													<?php foreach($list_area as $ld) { ?>
													<option value="<?php echo $ld->area_id; ?>"><?php echo $ld->area_name; ?></option>
													<?php } ?>	
													</select>
												</div>
											</div>
											 
											<a href="javascript:" class="btn btn-primary text-white rounded-circle btn-sm post-card-btn" data-toggle="modal"
                      					data-target="#postal-area" style="border-radius: 100px !important;line-height: 17px;">+</a>
											 
										</div>
									</div>
								</div>
						  
								<div class="col-lg-2 my-3 my-md-0 text-center d-flex justify-content-center align-items-center">
									<div class=""><input type="button" class="btn btn-primary btn-sm rounded-circle" value=">>" style="border-radius: 100px !important;" onclick="return copyPresentAddressData()"></div>
								</div>

								<div class="col-lg-5">
									<div class="row">				
										<div class="col-lg-12">
											<div class="form-group">
											<label>Permanent Address:</label>
											<input type="text" class="form-control" name="permanent_house_building_no" id="permanent_house_building_no" placeholder="Flate, House, Building, Apartment, Company" >
											</div>
										</div>
										<div class="col-lg-12">
											<div class="form-group">
											<input type="text" class="form-control" name="permanent_street_area" id="permanent_street_area" placeholder="Area, colony, street, Village">
											</div>
										</div>
										<div class="col-lg-12">
											<div class="form-group">
											<input type="text" class="form-control" name="permanent_landmark_colony" id="permanent_landmark_colony" placeholder="Landmark near location eg.Apolo Hospital">
											</div>
										</div>
									</div>			
									<div class="border rounded p-3" style="border-color: #e3e6fc !important;position:relative;    margin-top: 5px;">			
										<div class="row">
											<div class="col-lg-6">
												<div class="form-group">
												<label>Pin Code:</label>
												<input type="text" class="form-control" name="permanent_pin_code" id="permanent_pin_code" placeholder="Pin Code">
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
												<label>State:</label>
													<select class="form-control" name="permanent_state_id" id="permanent_state_id">
													<option value="">Select State</option>
													<?php foreach($list_state as $val) { ?>
													<option <?php  if($val->state_name=="Gujarat") { echo "selected"; } ?> value="<?php echo $val->state_name; ?>"><?php echo $val->state_name; ?></option>
													<?php } ?>	
													</select>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
												<label>City:</label>
													<select class="form-control" name="permanent_city_id" id="permanent_city_id">
													<option value="">Select City</option>
													<?php foreach($list_city as $val) { ?>
													<option <?php  if($val->city_name=="Surat") { echo "selected"; } ?> value="<?php echo $val->city_name; ?>"><?php echo $val->city_name; ?></option>
													<?php } ?>	
													</select>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
												<label>Area:</label>
													<select class="form-control" name="permanent_area_id" id="permanent_area_id">
													<option value="">Select Area</option>
													<?php foreach($list_area as $ld) { ?>
													<option value="<?php echo $ld->area_id; ?>"><?php echo $ld->area_name; ?></option>
													<?php } ?>	
													</select>
												</div>
											</div>
											<a href="javascript:" class="btn btn-primary text-white rounded-circle btn-sm post-card-btn" data-toggle="modal"
                      					data-target="#postal-area1" style="border-radius: 100px !important;line-height: 17px;">+</a>
										</div>	
									</div>
								</div>
		                  	


		                  	<!-- <div class="col-lg-6">
		                  		<div class="form-group">
			                      <label>Present Address:</label>
			                      <textarea class="form-control" autocomplete="off" id="pre_address" name="present_address" placeholder="Present Address..." required=""></textarea>
			                    </div>
		                  	</div>
		                  	<div class="col-lg-6"> 
			                    <div class="form-group">
			                      <label>Permanent Address:</label>
			                      <textarea class="form-control" autocomplete="off" id="permanent_address" name="permanent_address" placeholder="Permanent Address..." required=""></textarea>
			                    </div>
		                    </div> -->
		                  </div> 
		                </div>
		                <div class="card">
		                  <div class="card-header form-title">
		                    <h4>Parents Details</h4>
		                  </div>
		                  <div class="card-body pl-3 pr-3 row pb-1 pt-2">
		                  <div class="parents-detail m-3 p-3">
		                  	<div class="row">
		                  		<div class="col-lg-12">
		                  		<h5>Guardian 1 Details</h5>
		                  		</div>
			                  	<div class="col-lg-3"> 
				                    <div class="form-group">
				                      <label>Name:</label>
									  <label id="father_name-error" class="error" for="father_name" style="float: right; color:red"></label>
				                      <input type="text" class="form-control" name="father_name" id="father_name" placeholder="Father Name">
				                    </div>
			                    </div>
			                    <div class="col-lg-3"> 
				                    <div class="form-group">
				                      <label>Surname:</label>
									  <label id="atak_father-error" class="error" for="atak_father" style="float: right; color:red"></label>
				                      <input type="text" class="form-control" name="atak_father" id="atak_father" placeholder="Your Surname">
				                    </div>
			                    </div>
			                    <div class="col-lg-3"> 
				                    <div class="form-group">
				                      <label>Father Email:</label>
									  <label id="father_email-error" class="error" for="father_email" style="float: right; color:red"></label>
				                      <input type="email" class="form-control" name="father_email" id="father_email" placeholder="jone@gmail.com">
				                    </div>
			                    </div>
			                    <div class="col-lg-3"> 
				                    <div class="form-group">
				                      <label>Father Mobile No:</label>
									  <label id="father_mobile_no-error" class="error" for="father_mobile_no" style="float: right; color:red"></label>
				                      <input type="text" class="form-control" name="father_mobile_no" id="father_mobile_no" placeholder="+91-00000-00000">
				                    </div>
			                    </div>
			                    <div class="col-lg-3"> 
				                    <div class="form-group">
				                      <label>Occupation:</label>
				                      <input type="text" class="form-control" name="father_occupation" id="father_occupation" placeholder="Occupation" >
				                    </div>
			                    </div>
			                    <div class="col-lg-3"> 
				                    <div class="form-group">
				                      <label>Income:</label>
				                      <input type="text" class="form-control" name="father_income" id="father_income" placeholder="Father Income" >
				                    </div>
			                    </div>
		                  	</div>
		              		</div>
		              		<div class="parents-detail m-3 p-3">
		                  	<div class="row">
		                  		<div class="col-lg-12">
		                  		<h5>Guardian 2 Details</h5>
		                  		</div>
			                  	<div class="col-lg-3"> 
				                    <div class="form-group">
				                      <label>Name:</label>
									  <label id="mother_name-error" class="error" for="mother_name" style="float: right; color:red"></label>
				                      <input type="text" class="form-control" name="mother_name" id="mother_name" placeholder="Mother Name">
				                    </div>
			                    </div>
			                    <div class="col-lg-3"> 
				                    <div class="form-group">
				                      <label>Surname:</label>
									  <label id="atak_mother-error" class="error" for="atak_mother" style="float: right; color:red"></label>
				                      <input type="text" class="form-control" name="atak_mother" id="atak_mother" placeholder="Mother Name">
				                    </div>
			                    </div>
			                    <div class="col-lg-3"> 
				                    <div class="form-group">
				                      <label>Mother Email:</label>
									  <label id="mother_email-error" class="error" for="mother_email" style="float: right; color:red"></label>
				                      <input type="email" class="form-control" name="mother_email" id="mother_email" placeholder="jone@gmail.com">
				                    </div>
			                    </div>
			                    <div class="col-lg-3"> 
				                    <div class="form-group">
				                      <label>Mother Mobile No:</label>
									  <label id="mother_mobile_no-error" class="error" for="mother_mobile_no" style="float: right; color:red"></label>
				                      <input type="text" class="form-control" name="mother_mobile_no" id="mother_mobile_no" placeholder="+91-00000-00000" >
				                    </div>
			                    </div>
			                    <div class="col-lg-3"> 
				                    <div class="form-group">
				                      <label>Occupation:</label>
				                      <input type="text" class="form-control" name="mother_occupation" id="mother_occupation" placeholder="Mother Occupation">
				                    </div>
			                    </div>
			                    <div class="col-lg-3"> 
				                    <div class="form-group">
				                      <label>Income:</label>
				                      <input type="text" class="form-control" name="mother_income" id="mother_income" placeholder="Mother Income">
				                    </div>
			                    </div>
		                  	</div>
		              		</div>
		                  	</div>
		                </div>
		              	<div class="card">
		                  <div class="card-header form-title">
		                    <h4>Education & Proffesion</h4>
		                  </div>
		                  <div class="card-body pl-3 pr-3 pb-1 pt-2 border m-3 rounded" style="border-color: #e3e6fc !important;">
		                  	<div class="row">
								<div class="col-lg-3">
									<div class="form-group">
									<label>College / School Name:</label>
										<input type="text" name="school_collage_name" id="school_collage_name" class="form-control" placeholder="CLG-SCL Name">
									</div>
								</div>
								<div class="col-lg-3">
									<div class="form-group">
									<label>Country::</label>
										<select class="form-control" name="country_id" id="country_id">
										<option value="">Select Country</option>
										<?php foreach($list_country as $val) { ?>
										<option <?php  if($val->country_name=="India") { echo "selected"; } ?> value="<?php echo $val->country_name; ?>"><?php echo $val->country_name; ?></option>
										<?php } ?>			
										</select>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="form-group">
									<label>State:</label>
										<select class="form-control" name="school_clg_state" id="school_clg_state">
										<option value="">Select State</option>
										<?php foreach($list_state as $val) { ?>
										<option <?php  if($val->state_name=="Gujarat") { echo "selected"; } ?> value="<?php echo $val->state_name; ?>"><?php echo $val->state_name; ?></option>
										<?php } ?>	
										</select>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="form-group">
									<label>City:</label>
										<select class="form-control" name="school_clg_city" id="school_clg_city">
										<option value="">Select City</option>
										<?php foreach($list_city as $val) { ?>
										<option <?php  if($val->city_name=="Surat") { echo "selected"; } ?> value="<?php echo $val->city_name; ?>"><?php echo $val->city_name; ?></option>
										<?php }  ?>
										</select>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="form-group">
									<label>Area:</label>
										<select class="form-control" name="school_clg_area" id="school_clg_area">
										<option value="">Select Area</option>
										<?php foreach($list_area as $ld) { ?>
										<option value="<?php echo $ld->area_id; ?>"><?php echo $ld->area_name; ?></option>
										<?php } ?>	
										</select>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
									<label class="d-block">Course Category</label>
										<div class="pretty p-icon p-jelly p-round p-bigger mt-2">
											<input class="form-check-input" type="radio" name="school_collage_type" value="school" id="coursecategory1" checked>
												<div class="state p-info">
													<i class="icon material-icons">done</i>
													<label>School</label>
												</div>
										</div>
										<div class="pretty p-icon p-jelly p-round p-bigger mt-2">
											<input class="form-check-input" type="radio" name="school_collage_type" value="college" id="coursecategory2" >
											<div class="state p-info">
												<i class="icon material-icons">done</i>
												<label>College</label>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-3 text-right" >
									<a href="javascript:" class="btn btn-primary text-white rounded-circle" data-toggle="modal"
                      					data-target="#education-proffesion" style="border-radius: 100px !important;">+</a>
								</div>
							</div>
		                  </div>
						  
		                </div>
		                <div class="card ">
		                  <div class="card-header form-title">
		                    <h4>Document</h4>
		                  </div>
		                  <div class="card-body pl-3 pr-3 row pb-1 pt-2">
		                  	<div class="col-lg-3 col-md-6" id="photo_document">
		                  		<div class="form-group">
			                      <label>Photos</label> 
				                      <input type="file" class="mt-2"  name="photos" id="photoLabel" onchange="myFunction()">
				                       
			                    </div>
		                  	</div>
		                  	<div class="col-lg-3 col-md-6" id="tenth_document">
		                  		<div class="form-group">
			                      <label>10th Marksheet</label> 
				                      <input type="file" class="mt-2" name="tenth_marksheet"> 
			                    </div>
		                  	</div>
		                  	<div class="col-lg-3 col-md-6" id="twelth_document">
		                  		<div class="form-group">
			                        <label>12th Marksheet</label>   
									<input type="file" class="mt-2" name="twelfth_marksheet">  
			                    </div>
		                  	</div>
		                  	<div class="col-lg-3 col-md-6" id="leaving_document">
		                  		<div class="form-group">
								   <label>Leaving Certy</label>
									<input type="file" class="mt-2" name="leaving_certy"> 
			                    </div>
		                  	</div>
		                  	<div class="col-lg-3 col-md-6" id="treal_document">
		                  		<div class="form-group">
			                      <label>Trial Certy</label> 
				                      <input type="file"   name="treal_certy">  
			                    </div>
		                  	</div>
		                  	<div class="col-lg-3 col-md-6" id="light_document">
		                		<div class="form-group">
			                      <label>Light Bill</label> 
				                      <input type="file" name="light_bill"> 
		                	</div>
		                  </div>
		                  <div class="col-lg-3 col-md-6" id="adharcard_document">
		                		<div class="form-group">
			                    	<label>Aadhar Card</label> 
				                	<input type="file"  name="aadhar_card"> 
		                		</div>
		                  </div>
		                </div>
		                <input type="hidden" class="form-control w-25 mb-2" id="receipt_admission_id" value="<?php echo @$receipt_id; ?>" >
		                <div class="pb-3 px-3">
		                    <input class="btn btn-primary mr-1" type="submit" name="full_submit" value="Submit">
		                    <a href="<?php echo base_url(); ?>Admission/erpadmission" class="btn btn-light text-dark mr-1">Reset</a> 
		                    <?php if(!empty($this->session->userdata('lastoneTimeId'))) { ?>
		                    <button class="btn btn-light mr-1 final-receipt" type="submit" id="Receipt" onclick="return disable_button()">Receipt</button>
		                    
		                    	<button class="btn btn-light mr-1 processingcheck-receipt" type="submit" id="CehckReceipt" onclick="return disable_cheque_button()">Receipt_cheque</button> 
		                	<?php 
		                		$this->session->unset_userdata('lastoneTimeId');
		                	} ?>
		                </div>
		              </div>
				   </form>
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
                <h5 class="modal-title" id="exampleModalCenterTitle">Verify The Numbers</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
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
                    <input type="button" name="" id="verifyotp" class="btn btn-sm btn-success" value="Verify">
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

<!-- Education & Proffesion  -->
<div class="modal fade" id="education-proffesion" tabindex="-1" role="dialog"
	aria-labelledby="education-proffesionTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	<div class="modal-content"> 
		<div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add Education Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
        </div>
		<div class="modal-body pb-0">
			<div class="card">
			<div class="card-body pl-3 pr-3 pb-1 pt-2 border rounded" style="border-color: #e3e6fc !important;">
		                  	<div class="row">
								<div class="col-lg-3">
									<div class="form-group">
									<label>College / School Name:</label>
										<input type="text" name="school_collage_name" id="school_collage_name" class="form-control" placeholder="CLG-SCL Name" required="">
									</div>
								</div>
								<div class="col-lg-3">
									<div class="form-group">
									<label>Country::</label>
										<select class="form-control" name="country_id" id="country_id" required>
										<option value="">Select Country</option>
										<?php foreach($list_country as $val) { ?>
										<option <?php  if($val->country_name=="India") { echo "selected"; } ?> value="<?php echo $val->country_name; ?>"><?php echo $val->country_name; ?></option>
										<?php } ?>			
										</select>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="form-group">
									<label>State:</label>
										<select class="form-control" name="school_clg_state" id="school_clg_state" required>
										<option value="">Select State</option>
										<?php foreach($list_state as $val) { ?>
										<option <?php  if($val->state_name=="Gujarat") { echo "selected"; } ?> value="<?php echo $val->state_name; ?>"><?php echo $val->state_name; ?></option>
										<?php } ?>	
										</select>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="form-group">
									<label>City:</label>
										<select class="form-control" name="school_clg_city" id="school_clg_city" required>
										<option value="">Select City</option>
										<?php foreach($list_city as $val) { ?>
										<option <?php  if($val->city_name=="Surat") { echo "selected"; } ?> value="<?php echo $val->city_name; ?>"><?php echo $val->city_name; ?></option>
										<?php }  ?>
										</select>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="form-group">
									<label>Area:</label>
										<select class="form-control" name="school_clg_area" id="school_clg_area" required>
										<option value="">Select Area</option>
										<?php foreach($list_area as $ld) { ?>
										<option value="<?php echo $ld->area_id; ?>"><?php echo $ld->area_name; ?></option>
										<?php } ?>	
										</select>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
									<label class="d-block">Course Category</label>
										<div class="pretty p-icon p-jelly p-round p-bigger mt-2">
											<input class="form-check-input" type="radio" name="school_collage_type" value="school" id="coursecategory1" checked>
												<div class="state p-info">
													<i class="icon material-icons">done</i>
													<label>School</label>
												</div>
										</div>
										<div class="pretty p-icon p-jelly p-round p-bigger mt-2">
											<input class="form-check-input" type="radio" name="school_collage_type" value="college" id="coursecategory2" >
											<div class="state p-info">
												<i class="icon material-icons">done</i>
												<label>College</label>
											</div>
										</div>
									</div>
								</div>
								 
							</div>
		                  </div>
			</div>
		</div>
		<div class="modal-footer bg-whitesmoke br">
		<button type="button" class="btn btn-primary">Save</button>
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		</div>
	</div>
	</div>
</div>

<!-- Education & Proffesion  -->
<div class="modal fade" id="postal-area" tabindex="-1" role="dialog"
	aria-labelledby="education-proffesionTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	<div class="modal-content"> 
		<div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Present Area Add</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
        </div>
		<div class="modal-body pb-0">
			<div class="card">
			<div class="card-body pl-3 pr-3 pb-1 pt-2 border rounded" style="border-color: #e3e6fc !important;">
				<div class="row">
					<div class="col-lg-6">
					<div class="form-group">
					<label>Pin Code:</label>
					<input type="text" class="form-control" name="extra_present_pincode" id="extra_present_pincode" placeholder="Pin Code" required="" onblur="return getExtraCountryCityDetails()"  onkeypress="return isNumberKey(event)">
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
					<label>State:</label>
						<select class="form-control" name="extra_present_stateid" id="extra_present_stateid" required>
						<option value="">Select State</option>
						<?php foreach($list_state as $val) { ?>
						<option <?php  if($val->state_name=="Gujarat") { echo "selected"; } ?> value="<?php echo $val->state_name; ?>"><?php echo $val->state_name; ?></option>
						<?php } ?>	
						</select>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
					<label>City:</label>
						<select class="form-control" name="extra_present_cityid" id="extra_present_cityid" required>
						<option value="">Select City</option>
						<?php foreach($list_city as $val) { ?>
						<option <?php  if($val->city_name=="Surat") { echo "selected"; } ?> value="<?php echo $val->city_name; ?>"><?php echo $val->city_name; ?></option>
						<?php } ?>	
						</select>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label>Area:</label>
						<input type="text" class="form-control" name="extra_present_areadata" id="extra_present_areadata" required>
					</div>
				</div>
			</div>
		</div>
			</div>
		</div>
		<div class="modal-footer bg-whitesmoke br">
		<button type="button" class="btn btn-primary">Save</button>
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		</div>
	</div>
	</div>
</div>

<!-- Education & Proffesion  -->
<div class="modal fade" id="postal-area1" tabindex="-1" role="dialog"
	aria-labelledby="education-proffesionTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	<div class="modal-content"> 
		<div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
        </div>
		<div class="modal-body pb-0">
			<div class="card">
			<div class="card-body pl-3 pr-3 pb-1 pt-2 border rounded" style="border-color: #e3e6fc !important;">
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<label>Pin Code:</label>
							<input type="text" class="form-control" name="permanent_pin_code" id="permanent_pin_code" placeholder="Pin Code" required="">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label>State:</label>
							<select class="form-control" name="permanent_state_id" id="permanent_state_id" required>
								<option value="">Select State</option>
								<?php foreach($list_state as $val) { ?>
								<option <?php  if($val->state_name=="Gujarat") { echo "selected"; } ?> value="<?php echo $val->state_name; ?>"><?php echo $val->state_name; ?></option>
								<?php } ?>	
							</select>
						</div>
					</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label>City:</label>
						<select class="form-control" name="permanent_city_id" id="permanent_city_id" required>
							<option value="">Select City</option>
							<?php foreach($list_city as $val) { ?>
								<option <?php  if($val->city_name=="Surat") { echo "selected"; } ?> value="<?php echo $val->city_name; ?>"><?php echo $val->city_name; ?></option>
							<?php } ?>	
						</select>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label>Area:</label>
							<!-- <select class="form-control" name="permanent_area_id" id="permanent_area_id" required>
								<option value="">Select Area</option>
								<?php foreach($list_area as $ld) { ?>
								<option value="<?php echo $ld->area_id; ?>"><?php echo $ld->area_name; ?></option>
								<?php } ?>	
							</select> -->
								<input type="text" class="form-control" name="permanent_id_data" id="permanent_id_data" required>
					</div>
				</div>
							</div>
		                  </div>
			</div>
		</div>
		<div class="modal-footer bg-whitesmoke br">
		<button type="button" class="btn btn-primary">Save</button>
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		</div>
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

<script>

function disable_dis()
   {
      var give_discount = $("input[type='radio'][name='discont']:checked").val();
      if(give_discount == "Yes") {
         $('#discount_percentage').attr('readonly', false); // Disable it.
      }else{
         $('#discount_percentage').attr('readonly', true); // Disable it.
         $('#discount_percentage').addClass('text-muted');
         document.getElementById('discount_percentage').value = '';
      }
   }


   function activitys(sel) {
   if (sel.value != sel.value.replace(/[^0-9.]/g, '')) {
   sel.value = sel.value.replace(/[^0-9.]/g, '');
      }else{
      var discount = sel.value;
      var total = $('#tuation_fees_without_discount').val();
      var final_discount = (total/100)*discount;
      var final_fees = total - final_discount;
      $('#tuation_fees_two').val(final_fees);
   }
   }



function copyPresentAddressData(){
	var phb = $('#present_house_building_no').val();
	var psa = $('#present_street_area').val();
	var lmd = $('#present_landmark_colony').val();
	var pce = $('#present_pin_code').val();
	var pst = $('#present_state_id').val();
	var pct = $('#present_city_id').val();
	var par = $('#present_area_id').val();
	$('#permanent_house_building_no').val(phb);
	$('#permanent_street_area').val(psa);
	$('#permanent_landmark_colony').val(lmd);
	$('#permanent_pin_code').val(pce);
	$('#permanent_state_id').val(pst);
	$('#permanent_city_id').val(pct);
	$('#permanent_area_id').val(par);

}


function getCountryCityDetails(){
	var pinCode = $('#present_pin_code').val();
	var urlApi = "https://api.postalpincode.in/pincode/"+pinCode;
	$.ajax({
		url : urlApi,
		type : "get",
		success:function(res){
			// console.log(res);
			if(res != ''){
				$('#present_state_id').val(res[0].PostOffice[0].State);
				$('#present_city_id').val(res[0].PostOffice[0].District);
			}
			else{
				$('#present_state_id').val('');
			}
		}
	});
}


function getExtraCountryCityDetails(){
	var pinCode = $('#extra_present_pincode').val();
	var urlApi = "https://api.postalpincode.in/pincode/"+pinCode;
	$.ajax({
		url : urlApi,
		type : "get",
		success:function(res){
			// console.log(res);
			if(res != ''){
				$('#extra_present_stateid').val(res[0].PostOffice[0].State);
				$('#extra_present_cityid').val(res[0].PostOffice[0].District);
			}
			else{
				$('#extra_present_stateid').val('');
			}
		}
	});
}

function branch_data(b) {

var x = b.options[b.selectedIndex].text;

if(x=="COLLEGE")
{
	$(".section-hidden").hide();
	$(".clg-section").show();
} 
else
{
	$(".section-hidden").show();
	$('.select_course_package_two').hide();
	$(".clg-section").hide();
}

}

function paymenttype(p) {

	var x = p.options[p.selectedIndex].text;

	if(x=="Cheque")
	{
		$(".Cheque-Hidden").show();
		$(".processingcheck-receipt").show();
		$(".final-receipt").hide();
	}
	else
	{
		$(".Cheque-Hidden").hide();
		$(".processingcheck-receipt").hide();
		$(".final-receipt").show();
	}

	if(x=="DD")
	{
		$(".Dd-Hidden").show();
		$(".processingcheck-receipt").show();
		$(".final-receipt").hide();
	}
	else
	{
		$(".Dd-Hidden").hide();
		$(".processingcheck-receipt").hide();
		$(".final-receipt").show();
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
	$(".clg-section").hide();
   $('#sendotp').on('click',function(){
       var mobile_replace_no = $('#mobile_replace_no').val();
       
       
       $.ajax({
           type : "POST",
           url  : "<?php echo base_url()?>AddmissionController/Send_Otp",
           data : {'mobile_no' : mobile_replace_no },
           success: function(resp)
           {
         	   var data = $.parseJSON(resp);
               var ddd = data['all_record'].status;
               if(ddd == '1')
               {
                   $('#mag_otp').fadeIn();
                   $('#mag_otp').html("<div class='alert alert-success' role='alert'><b>Successfully Send OTP</b></div>");
                   $('#mag_otp').fadeOut(4000);
               }
               else
               {
               	$('#mag_otp').fadeIn();
                   $('#mag_otp').html("<div class='alert alert-danger' role='alert'><b>Someting Wrong!!</b></div>");
                   $('#mag_otp').fadeOut(4000);
               }
           }
       });
       return false;
   });
   
   
   $('#verifyotp').on('click',function(){
       var mobileOtp = $('#mobileOtp').val();
       
       
       $.ajax({
           type : "POST",
           url  : "<?php echo base_url()?>AddmissionController/verify_otp",
           data : {'mobileOtp' : mobileOtp },
           success: function(resp)
           {
         	   var data = $.parseJSON(resp);
               var ddd = data['all_record'].status;
               if(ddd == '1')
               {
                   $('#mag_otp').fadeIn();
                   $('#mag_otp').html("<div class='alert alert-success' role='alert'><b>Successfully Verify OTP</b></div>");
                   $('#mag_otp').fadeOut(4000);
               }
               else
               {
               	$('#mag_otp').fadeIn();
                   $('#mag_otp').html("<div class='alert alert-danger' role='alert'><b>Someting Wrong!!</b></div>");
                   $('#mag_otp').fadeOut(4000);
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
   
   //console.log(mobile_no);
   $.ajax({
   type : "POST",
   url  : "<?php echo base_url()?>AddmissionController/Getrecode_multiple",
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
<!-- <script>
   $(document).ready(function(){
   
    // mobileno_wise_data();
   
    function mobileno_wise_data(query)
    {
     $.ajax({
      url:"<?php echo base_url(); ?>AddmissionController/GetRecord",
      method:"POST",
      data:{mobile_no:query},
      success:function(res)
      {
       var data = $.parseJSON(res);

   
   	    if(data.record['lead_list_id']!=''){
   	         $('#lead_list_id').val(data.record['lead_list_id']);
   	    }else{
   	         $('#lead_list_id').val('');
   	    }
   	     $('#mobile_no_two').val(data.record['mobile_no']);
   	     $('#source_id_two').val(data.record['source_id']);
   	     $('#alternate_no_two').val(data.record['alternate_mobile_no']);
   	     // $('#email_two').val(data.record['email']);
   	     $('#email_two').val(data.record['email']);
   	     $('#first_name_two').val(data.record['name']);
   	  
   	     $('#last_name').val(data.record['surname']);
   	     $('#branch_id_two').val(data.record['branch_id']);
   	     get_branch_wise_record(data.record['branch_id']);
   	     $('#atak_father').val(data.record['surname']);
   	     $('#atak_mother').val(data.record['surname']);
   	     $('#state_id').val(data.record['state']);
   	     // alert(data.record['state']);
   	     $('#city_id').val(data.record['city']);
   	     $('#area_id').val(data.record['area_id']);
   	     $('#pin_code').val(data.record['pin_code']);
   	     $('#pre_address').val(data.record['address']);
   	     $('#permanent_address').val(data.record['address']);
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
   	     $('#school_collage_name').val(data.record['school_college_id']);
   	     // $('#country_id').val(data.record['country_id']);
   	     // $('#school_clg_state').val(data.record['school_clg_state']);
   	     // $('#school_clg_city').val(data.record['school_clg_city']);
   	     // $('#school_clg_area').val(data.record['school_clg_area']);
   	    
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
   
    $('#mobile_no_two').keyup(function(){
     var search = $(this).val();
     // alert(search);
     if(search != '')
     {
      mobileno_wise_data(search);
     }
     else
     {
      mobileno_wise_data();
     }
    });
   });
</script> -->
<script>
   $(document).ready(function(){
   
    // email_data();
   
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
        $('#alternate_no_two').val(data.record['alternate_mobile_no']);
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
   
    $('#email1').keyup(function(){
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
   $( "#form_validation_inner" ).validate({
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
                   			url : "<?php echo base_url(); ?>AddmissionController/firstProcess",
                   			type:"post",
                   			data: dataform,
                   			success:function(resp){
                                   $(".form_two").show();
   						        $(".form_one").hide();
               				  var data = $.parseJSON(resp);
   						      var admis_id = data['allrecord'].admission_id;
   						      var regtra_fees = data['allrecord'].registration_fees;
   						      var adm_id = data['allrecord'].admission_id;
   						      var g_ids = data['allrecord'].gr_id;
   						      var enrollnumber = data['allrecord'].enrollment_number;
   						      var msg_id = data['allrecord'].admission_id;
   						      var receipt_admi = data['allrecord'].admission_id;
   					      
   						      $('#update_id').val(admis_id);
   						      $('#registra_fees').val(regtra_fees);
   						      $('#amis_ids').val(adm_id);
   						      $('#g_ids').val(g_ids);
   						      $('#enrollnumber').val(enrollnumber);
   						      $('.receipt_admission').val(receipt_admi);

   						      if($('#form_one_msg').val(msg_id))
					            {
					                $('#quick_admission_msg').fadeIn();
					                $('#quick_admission_msg').html("<div class='alert alert-success' role='alert'><b>Quick Admission Done</b></div>");
					                $('#quick_admission_msg').fadeOut(3000);
					            }
                   	    }
                   		});
   		        	}
      }
   });
</script>
<script>
$(document).ready(function(){
  $("#open_check_modal").click(function(){
    
    $('#exampleModalCenter').modal('show');
   
   			     var mobile_no = $('#mobile_no').val();
               	 var alternate_mobile_no = $('#alternate_number').val();
               	 var email = $('#email').val();
               
               //console.log(mobile_no);
   		             $.ajax({
   		                type : "POST",
   		                url  : "<?php echo base_url()?>AddmissionController/Getrecode_multiple",
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

  });
});
</script>
<!-- <script type="text/javascript">
function myFunction() {
  var x = document.getElementById("photoLabel");
   var re_sh = "photoLabel";
    var validExtensions = ["pdf","doc","docx","jpeg","jpg","png"]
    var file = $('#'+re_sh).val().split('.').pop();
    var numb = $('#'+re_sh)[0].files[0].size/1024/1024;
    numb = numb.toFixed(2);
    if (validExtensions.indexOf(file) == -1) {
        alert("Only formats are allowed : "+validExtensions.join(', '));
        $('#'+re_sh).val('');
    }
    else if(numb > 0.2){
      alert('plz maximum is 200KB. You file size is Allowed: ' + numb +' KB');
       $('#'+re_sh).val('');
    }
}
</script> -->
<script>

	// function get_branch_wise_record(branch_id)
	// {
	// 	$.ajax({
	// 	     url:"<?php echo base_url(); ?>AddmissionController/fetch_single_course",
	// 	     method:"POST",
	// 	     data:{branch_id:branch_id},
	// 	     success:function(data)
	// 	     {
	// 			$('#course_orsingle_two').append('<option value="0">Select Course</option>');
	// 	      $('#course_orsingle_two').html(data);
	// 	     }
	//     });
	// }


   $(document).ready(function(){
   $('#branch_id_two').change(function(){
   
   var branch_id = $('#branch_id_two').val();
   
    $.ajax({
     url:"<?php echo base_url(); ?>AddmissionController/fetch_single_course",
     method:"POST",
     data:{branch_id:branch_id},
     success:function(data)
     {
      $('#course_orsingle_two').html(data);
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
       $('#course_orpackage').html(data);
     }
    });
   });
   
   $('.barch_wise_faculty').change(function(){

   var branch_id = $('.barch_wise_faculty').val();
   
    $.ajax({
     url:"<?php echo base_url(); ?>AddmissionController/filter_branch_wise_faculty",
     method:"POST",
     data:{'branch_id' : branch_id },
     success:function(data)
     {
      $('#faculty_id').html(data);
   
     }
    });
   });
   
   
   $('#course_orsingle').change(function(){
   var ssearch = $(this).val();
   
   $.ajax({
    url:"<?php echo base_url(); ?>AddmissionController/GetRecord_shining_sheet",
    type:"POST",
    data:{ 'course_id' : ssearch },
    success:function(record){
    	console.log(record);
   var data = $.parseJSON(record);
    	
    	console.log(data.record);
      $('#shining_sheet_id').val(data.record);
    }
   });
   });    
   
   
   
   $('#father_email').change(function(){
   
   var email_subject = $('#email_subject').val();
   // tinyMCE.activeEditor.getContent();
   // tinyMCE.activeEditor.getContent({format : 'html'});
   // var email_compose_textarea = tinyMCE.get('email_compose_Textarea').getContent()
   var email = $('#father_email').val();
   
   // alert(package_id);
   $.ajax({
     url:"<?php echo base_url(); ?>AddmissionController/send_email",
     method:"POST",
     data:{ 'email' : email,
     		'subject' : email_subject
   	 },
     success:function(Res)
     {
      
     // alert(Res);
   
     }
    });
   });
   

  $('#stating_course_id').change(function(){
   var stating_course_id = $('#stating_course_id').val();
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

  //  $('.cofees').change(function(){
  //  var subcourse_id = $('.cofees').val();
   
  //   $.ajax({
  //    url:"<?php echo base_url(); ?>AddmissionController/get_cofees",
  //    method:"POST",
  //    data:{ 'subcourse_id' : subcourse_id }, 
  //    success:function(resp)
  //    {
  //       var data = $.parseJSON(resp);
  //       var fees = data['single_record'].fees;
  //       var installment = data['single_record'].installment;
		// $('#tuation_fees_two').val(fees);
		// $('#no_of_installments').val(installment);
  //    }

  //   });
  //  });


$('.cofees').change(function(){
     var subcourse_id = $('.cofees').val();
     var branch_id = $('.branch').val();
     var give_discount = $("input[name='discont']:checked").val();
     if(give_discount == "Yes"){
      $.ajax({
       url:"<?php echo base_url(); ?>Admission/get_cofees",
       method:"POST",
       data:{ 'subcourse_id' : subcourse_id ,
       			'branch_id' : branch_id
        }, 
       success:function(resp)
       {
         var data = $.parseJSON(resp);
        var fees = data['single_record'].fees;
        var installment = data['single_record'].installment;
        var final = $('#discount_percentage').val();
         var final_discount = (fees/100)*final ;
         var final_fees = fees - final_discount;
         var f_fees = final_fees.toFixed(0);
         $('#discount_ammount').val(final_discount);
         $('#tuation_fees_without_discount').val(fees);
         $('#no_of_installments').val(installment);
         $('#tuation_fees_two').val(f_fees);
       }
   
      });
     } else {
      $.ajax({
       url:"<?php echo base_url(); ?>Admission/get_cofees",
       method:"POST",
       data:{ 'subcourse_id' : subcourse_id ,'branch_id' : branch_id }, 
       success:function(resp)
       {
          var data = $.parseJSON(resp);
          var fees = data['single_record'].fees;
          var installment = data['single_record'].installment;
          document.getElementById('discount_percentage').value = '';
            $('#tuation_fees_two').val(fees);
            $('#no_of_installments').val(installment);
       }
   
      });
     }
     });

  //  $('.pafees').change(function(){
  //  var package_id = $('.pafees').val();
   
  //   $.ajax({
  //    url:"<?php echo base_url(); ?>AddmissionController/get_pafees",
  //    method:"POST",
  //    data:{ 'package_id' : package_id }, 
  //    success:function(resp)
  //    {
  //       var data = $.parseJSON(resp);
  //       var fees = data['single_record'].fees;
		// var installment = data['single_record'].installment;
		// $('#tuation_fees_two').val(fees);
		// $('#no_of_installments').val(installment);
  //    }

  //   });
  //  });

       $('.pafees').change(function(){
     var package_id = $('.pafees').val();
     var branch_id = $('.branch').val();
     var give_discount = $("input[name='discont']:checked").val();
     if(give_discount == "Yes"){
      $.ajax({
       url:"<?php echo base_url(); ?>Admission/get_pafees",
       method:"POST",
       data:{ 'package_id' : package_id ,'branch_id' : branch_id }, 
       success:function(resp)
       {
         var data = $.parseJSON(resp);
        var fees = data['single_record'].fees;
        var installment = data['single_record'].installment;
        var final = $('#discount_percentage').val();
         var final_discount = (fees/100)*final ;
         var final_fees = fees - final_discount;
         var f_fees = final_fees.toFixed(0);
         $('#discount_ammount').val(final_discount);
         $('#tuation_fees_without_discount').val(fees);
         $('#no_of_installments').val(installment);
         $('#tuation_fees_two').val(f_fees);
       }
      });
     }else{
      $.ajax({
       url:"<?php echo base_url(); ?>Admission/get_pafees",
       method:"POST",
       data:{ 'package_id' : package_id ,'branch_id' : branch_id }, 
       success:function(resp)
       {
          var data = $.parseJSON(resp);
          var fees = data['single_record'].fees;
   	var installment = data['single_record'].installment;
      document.getElementById('discount_percentage').value = '';
   	$('#tuation_fees_two').val(fees);
   	$('#no_of_installments').val(installment);
       }
      });
     }
     });

   $('.course_start_id').change(function(){
   var course_start_id = $('.course_start_id').val();
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

   $('.course_orpackage').change(function(){
   var package_id = $('.course_orpackage').val();
   
    $.ajax({
     url:"<?php echo base_url(); ?>AddmissionController/fetch_stating_course",
     method:"POST",
     data:{ 'package_id' : package_id }, 
     success:function(data)
     {
       $('#stating_course_id').html(data);
     }
    });
   });

   $('.subco').change(function(){
   var course_id = $('.subco').val();
   
    $.ajax({
     url:"<?php echo base_url(); ?>AddmissionController/get_subcourse",
     method:"POST",
     data:{ 'course_id' : course_id }, 
     success:function(data)
     {
       $('#stating_course_id_two').html(data);
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

   $('.branch_two').change(function(){
   var branch_id = $('.branch_two').val();
   
    $.ajax({
     url:"<?php echo base_url(); ?>AddmissionController/fetch_package_course",
     method:"POST",
     data:{branch_id:branch_id},
     success:function(data)
     {
      $('#course_or_package_two').html(data);
     }
    });
   });
   
   
   $('#course_category_id').change(function(){
   var course_category_id = $('#course_category_id').val();
   
    $.ajax({
     url:"<?php echo base_url(); ?>AddmissionController/fetch_clgco",
     method:"POST",
     data:{course_category_id:course_category_id},
     success:function(data)
     {
      $('#college_courses_id').html(data);
     }
    });
   });

   $('#college_courses_id').change(function(){
   var college_courses_id = $('#college_courses_id').val();
   
    $.ajax({
     url:"<?php echo base_url(); ?>AddmissionController/fetch_make_sem",
     method:"POST",
     data:{college_courses_id:college_courses_id},
     success:function(data)
     {
      $('.make_sem').html(data);
     }
    });
   });
   
   $('.clg_co_ids').change(function(){
   var college_courses_id = $('.clg_co_ids').val();
   
    $.ajax({
     url:"<?php echo base_url(); ?>AddmissionController/fetch_clg_tufees",
     method:"POST",
     data:{college_courses_id:college_courses_id},
     success:function(resp)
     {
        var data = $.parseJSON(resp);
		var college_tuition_fees = data['single_record'].college_tuition_fees;
		var college_registration_fees = data['single_record'].college_registration_fees;
		var no_of_semester = data['single_record'].no_of_semester;
		$('#college_tuition_fees').val(college_tuition_fees);
		$('#college_registration_fees').val(college_registration_fees);
		$('#no_of_semester').val(no_of_semester);
     }
    });
   });

    $('#course_orsingle_two').change(function(){
   		var ssearch = $(this).val();
   		$.ajax({
		    url:"<?php echo base_url(); ?>AddmissionController/GetRecord_shining_sheet",
		    type:"POST",
		    data:{ 'course_id' : ssearch },
		    success:function(record){
		    	// console.log(record);
		   		var data = $.parseJSON(record);
		    	console.log(data.record);
		      	$('#shining_sheet_id').val(data.record);
		    }
	   });
   	});    
   
   

 $('#stating_course_id_two').change(function(){
   
   var stating_course_id = $('#stating_course_id_two').val();
   var branch_id = $('.barch_wise_faculty_two').val();
   
    $.ajax({
     url:"<?php echo base_url(); ?>AddmissionController/fetch_batch_data",
     method:"POST",
     data:{ 'stating_course_id' : stating_course_id , 'branch_id' : branch_id}, 
     success:function(data){
      $('#batch_id_two').html(data);
   	}

    });
   });

    $('#stating_course_id_pco').change(function(){
   		var course_start_id = $('#stating_course_id_pco').val();
	   	var branch_id = $('.branch_two').val();
	   	$.ajax({
	     	url:"<?php echo base_url(); ?>AddmissionController/fetch_course_wise_batch",
	     	method:"POST",
	     	data:{ 'course_start_id' : course_start_id , 'branch_id' : branch_id}, 
	     	success:function(data){
	      		$('#batch_id_two').html(data);
	   		}
		});
   });

    $('.course_or_single_two').change(function(){
   		var course_id = $('.course_or_single').val();
        // alert(package_id);
    $.ajax({
    url:"<?php echo base_url(); ?>Admission/getrecord_single_course",
    type:"POST",
    data:{ 'course_id' : course_id },	
    success:function(res)
    {
    	//$('#photos').html(res);
    var data = $.parseJSON(res);
    if(data.record==null)
    {
   
   
       }
       else 
       {
   
       $('#documents_id').val(data.record['documents_id']);
       if(data.record['photos']=="yes")
       {
       	$(".photos").show();
       }
       else
       {
       	$(".photos").hide();
       }
   
       if(data.record['tenth_marksheet']=="yes")
       {
       	$(".10th_marksheet").show();
       }
       else
       {
       	$(".10th_marksheet").hide();
       }
   
       if(data.record['twelth_marksheet']=="yes")
       {
       	$(".12th_marksheet").show();
       }
       else
       {
       	$(".12th_marksheet").hide();
       }
   
       if(data.record['leaving_certy']=="yes")
       {
       	$(".leaving_certy").show();
       }
       else
       {
       	$(".leaving_certy").hide();
       }	
   
       if(data.record['treal_certy']=="yes")
       {
       	$(".treal_certy").show();
       }
       else
       {
       	$(".treal_certy").hide();
       }
   
       if(data.record['light_bill']=="yes")
       {
       	$(".light_bill").show();
       }
       else
       {
       	$(".light_bill").hide();
       }
       
        if(data.record['aadhar_card']=="yes")
       {
       	$(".aadhar_card").show();
       }
       else
       {
       	$(".aadhar_card").hide();
       }
   }	
    }
   });
   });
   
   $('.course_orpackage_two').change(function(){
   
   var package_id = $('.course_orpackage').val();
   // alert(package_id);
     $.ajax({
    url:"<?php echo base_url(); ?>AddmissionController/getrecord_package",
    type:"POST",
    data:{ 'package_id' : package_id },	
    success:function(res)
    {
    	//$('#photos').html(res);
    var data = $.parseJSON(res);
    if(data.record==null)
    {
   
   
       }
       else 
       {
   
       $('#documents_id').val(data.record['documents_id']);
       if(data.record['photos']=="yes")
       {
       	$(".photos").show();
       }
       else
       {
       	$(".photos").hide();
       }
   
       if(data.record['tenth_marksheet']=="yes")
       {
       	$(".10th_marksheet").show();
       }
       else
       {
       	$(".10th_marksheet").hide();
       }
   
       if(data.record['twelth_marksheet']=="yes")
       {
       	$(".12th_marksheet").show();
       }
       else
       {
       	$(".12th_marksheet").hide();
       }
   
       if(data.record['leaving_certy']=="yes")
       {
       	$(".leaving_certy").show();
       }
       else
       {
       	$(".leaving_certy").hide();
       }	
   
       if(data.record['treal_certy']=="yes")
       {
       	$(".treal_certy").show();
       }
       else
       {
       	$(".treal_certy").hide();
       }
   
       if(data.record['light_bill']=="yes")
       {
       	$(".light_bill").show();
       }
       else
       {
       	$(".light_bill").hide();
       }
       
        if(data.record['aadhar_card']=="yes")
       {
       	$(".aadhar_card").show();
       }
       else
       {
       	$(".aadhar_card").hide();
       }
   }	
    }
   });
   });
   
   }); 
</script>
<script>
   $('.select_course_package_two').hide();
   function show_hide_package_course_two()
   {
	var courses_type = $("input[name='courses_type']:checked").val();
	//alert(course_package);
	if(courses_type == 'single'){
		$('.select_course_single_two').show();
		$('.select_course_package_two').hide();	
	}else{
	
		$('.select_course_single_two').hide();
		$('.select_course_package_two').show();
	}

   }

    $('#course_or_package_two').change(function(){
    	var package_id = $('#course_or_package_two').val();
    	var branch_id = $('#branch_id_two').val();
    	$.ajax({
    		url : "<?php echo base_url(); ?>AddmissionController/getDocumentListPackage",
    		type : "post",
    		data:{
    			packageCourse : package_id,
    			branch_id : branch_id
    		},
    		success:function(res){
    			var data = $.parseJSON(res);
    			if(data['photos'] == 'yes'){
    				$('#photo_document').show();
    			}else{
					$('#photo_document').hide();
    			}

    			if(data['tenth_marksheet'] == 'yes'){
    				$('#tenth_document').show();
    			}else{
					$('#tenth_document').hide();
    			}

    			if(data['twelth_marksheet']=='yes'){
    				$('#twelth_document').show();
    			}else{
    				$('#twelth_document').hide();
    			}

    			if(data['leaving_certy'] == 'yes'){
    				$('#leaving_document').show();
    			}else{
    				$('#leaving_document').hide();
				}

				if(data['treal_certy'] == 'yes'){
    				$('#treal_document').show();
    			}else{
    				$('#treal_document').hide();
				}

				if(data['light_bill'] == 'yes'){
    				$('#light_document').show();
    			}else{
    				$('#light_document').hide();
				}

				if(data['aadhar_card'] == 'yes'){
    				$('#adharcard_document').show();
    			}else{
    				$('#adharcard_document').hide();
				}
    		}
    	});
    });
   
    $('#course_orsingle_two').change(function(){
    	var course_id = $('#course_orsingle_two').val();
    	var branch_id = $('#branch_id_two').val();
    	// alert(course_package_id);
    	$.ajax({
    		url : "<?php echo base_url(); ?>AddmissionController/getDocumentList",
    		type : "post",
    		data:{
    			singleCourse : course_id,
    			branch_id : branch_id
    		},
    		success:function(res){
    			// console.log(res);
    			var data = $.parseJSON(res);
    			// alert(data['photos']);
    			// alert(data['tenth_marksheet']);
    			if(data['photos'] == 'yes'){
    				$('#photo_document').show();
    			}else{
					$('#photo_document').hide();
    			}

    			if(data['tenth_marksheet'] == 'yes'){
    				$('#tenth_document').show();
    			}else{
					$('#tenth_document').hide();
    			}

    			if(data['twelth_marksheet']=='yes'){
    				$('#twelth_document').show();
    			}else{
    				$('#twelth_document').hide();
    			}

    			if(data['leaving_certy'] == 'yes'){
    				$('#leaving_document').show();
    			}else{
    				$('#leaving_document').hide();
				}

				if(data['treal_certy'] == 'yes'){
    				$('#treal_document').show();
    			}else{
    				$('#treal_document').hide();
				}

				if(data['light_bill'] == 'yes'){
    				$('#light_document').show();
    			}else{
    				$('#light_document').hide();
				}

				if(data['aadhar_card'] == 'yes'){
    				$('#adharcard_document').show();
    			}else{
    				$('#adharcard_document').hide();
				}
    		}
    	});
    });

	
   	$('#course_orsingle_two').change(function(){
   		var courseId = $('#course_orsingle_two').val();
   		var total = $('#tuation_fees_two').val();
   		$.ajax({
   			url : "<?php echo base_url(); ?>AddmissionController/GetInstallmentDetailssinglecourse",
   			type :"post",
   			data:{
   				'courseId' : courseId
   			},
   			success:function(data){
   				var res = $.parseJSON(data);
   				$('#tuation_fees_two').val(res.get_install);
   		
   			}
   		});
   });

   $('.clg_cat').change(function(){
   		var branch_id = $('.clg_cat').val();
   		$.ajax({
   			url : "<?php echo base_url(); ?>Admission/clg_category",
   			type :"post",
   			data:{
   				'branch_id' : branch_id
   			},
   			success:function(data){
				$('#course_category_id').html(data);
   			}
   		});
   });
   
   
   function make_installment_process(){
   var packageId = $('#course_orpackage_two').val();
   var tution_fee =  $('#tuation_fees_two').val();
   var registration_fees =  $('#registration_fees_two').val();
   var noOfInstallment =  $('#no_of_installments').val();
   if(tution_fee == '' || registration_fees == ''){
   	alert('please Enter Tution fees and Registration Fees');
   	return false;
   }
   else{
   	$.ajax({
   	url : "<?php echo base_url(); ?>AddmissionController/erp_getinstallment_withregistration",	
   	type :"post",
   	data:{
   		'packageId' : packageId,
   		'tution_fee' : tution_fee,
   		'reg_fees'	: registration_fees,
   		'no_of_install' : noOfInstallment
   	},
   	success:function(data){
   		// console.log(data);
   		$('#installment_all_data').html(data);
   		// var res = $.parseJSON(data);
   		// $('#tuation_fees').val(res.get_install.package_fees);
   		// $('#no_of_installment').val(res.get_install.installment);
   		// // var newrec =  res.record['get_install'];
   		// // console.log(newrec);
   		// // $('#installment_all_data').html(data);
   	}
   });
   }
   }
</script>
<!-- <script>
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
       var d1 = "<b style='color: black'>Demo ID : </b>";
       var demo = d1.concat(d2);
       $('#demo_idss').html(demo);
   
       var b2 = data.record['branch_name'];
       var b1 = "<b style='color: black'>Branch : </b>";
       var branch = b1.concat(b2);
       $('#branch').html(branch);
   
       var n2 = data.record['name'];
       var n1 = "<b style='color: black'>Name : </b>";
       var name = n1.concat(n2);
       $('#name').html(name);
   
       var mno2 = data.record['mobileNo'];
       var mno1 = "<b style='color: black'>MobileNo : </b>";
       var mobileno = mno1.concat(mno2);
       $('#demomobileno').html(mobileno);
   
       var staco2 = data.record['startingCourse'];
       var staco1 = "<b style='color: black'>Course : </b>";
       var staco = staco1.concat(staco2);
       $('#startingCourse').html(staco);
   
       // var fd2 = data.record['name'];
       // var fd1 = "<b style='color: black'>Assigned To : </b>";
       // var fdemo = fd1.concat(fd2);
       // $('#faculty_demo').html(fdemo);
   
       var demodate2 = data.record['addDate'];
       var demodate1 = "<b style='color: black'>Date : </b>";
       var demodate = demodate1.concat(demodate2);
       $('#demodate').html(demodate);
   
        var adb2 = data.record['addBy'];
       var adb1 = "<b style='color: black'>AddBy : </b>";
       var adby = adb1.concat(adb2);
       $('#addedby').html(adby);
   
      }
     })
    }
   
    $('#mobile_no').keyup(function(){
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
       var le1 = "<b style='color: black'>Lead ID : </b>";
       var lead = le1.concat(le2);
       $('#lead_list_idss').html(lead);
   
       var lb2 = data.record['branch_name'];
       var lb1 = "<b style='color: black'>Branch : </b>";
       var lb = lb1.concat(lb2);
       $('#lead_branch').html(lb);
   
       var ln2 = data.record['name'];
       var ln1 = "<b style='color: black'>Name : </b>";
       var ln = ln1.concat(ln2);
       $('#lead_name').html(ln);
   
       var lm2 = data.record['mobile_no'];
       var lm1 = "<b style='color: black'>MobileNo : </b>";
       var lm = lm1.concat(lm2);
       $('#leadmobile_no').html(lm);
   
       var lc2 = data.record['package_name'];
       var lc1 = "<b style='color: black'>Course : </b>";
       var lc = lc1.concat(lc2);
       $('#lead_course').html(lc);
   
       var lead_creation_date1 = data.record['lead_creation_date'];
       var lead_creation_date2 = "<b style='color: black'>Date : </b>";
       var lead_creation_date = lead_creation_date2.concat(lead_creation_date1);
       $('#lead_creation_date').html(lead_creation_date);
   
       var ref2 = data.record['reference_name'];
       var ref1 = "<b style='color: black'>Reference By : </b>";
       var ref = ref1.concat(ref2);
       $('#reference_name').html(ref);
      }
     })
    }
   
    $('#mobile_no').keyup(function(){
     var search = $(this).val();
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
       var gr1 = "<b style='color: black'>GR ID : </b>";
       var gr = gr1.concat(gr2);
       $('#gr_ids').html(gr);
   
       var enrollmentno2 = data.record['enrollment_number'];
       var enrollmentno1 = "<b style='color: black'>EnrollmentNo : </b>";
       var enrollmentno = enrollmentno1.concat(enrollmentno2);
       $('#enrollmentno').html(enrollmentno);
   
       const fullname2 = data.record['surname'] + " " + data.record['first_name'] + " " + data.record['father_name'];
       var fullname1 = "<b style='color: black'>Name : </b>";
       var fullname = fullname1.concat(fullname2);
       $('#fullname').html(fullname);
   
       var admissionbarnch1 = data.record['branch_name'];
       var admissionbarnch2 = "<b style='color: black'>Branch : </b>";
       var admissionbarnch = admissionbarnch2.concat(admissionbarnch1);
       $('#admissionbarnch').html(admissionbarnch);
   
        var admission_mobileno1 = data.record['mobile_no'];
       var admission_mobileno2 = "<b style='color: black'>MobileNo : </b>";
       var admission_mobileno = admission_mobileno2.concat(admission_mobileno1);
       $('#admission_mobileno').html(admission_mobileno);
   
       var course1 = data.record['course_name'];
       var course2 = "<b style='color: black'>Course : </b>";
       var course = course2.concat(course1);
       $('#admission_course').html(course);
   
       var af1 = data.record['name'];
       var af2 = "<b style='color: black'>Assigned To : </b>";
       var af = af2.concat(af1);
       $('#af').html(af);  
   
       var admission_date1 = data.record['admission_date'];
       var admission_date2 = "<b style='color: black'>Date : </b>";
       var admission_date = admission_date2.concat(admission_date1);
       $('#admission_date').html(admission_date);
   
        var adby1 = data.record['addby'];  
       var adby2 = "<b style='color: black'>AddBy : </b>";
       var adby = adby2.concat(adby1);
       $('#admission_adby').html(adby);
   
      }
     })
    }
   
    $('#mobile_no').keyup(function(){
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
function simple_receipt(admission_id='')
{
  $.ajax({
    url : "<?php echo base_url(); ?>Account/erpreceipt",
    type : "post",
    data:{
       'admission_id' : admission_id
    },
    success:function(Response)
    {
      $('#receipt_data').html(Response);
    }
  });
}
</script>
<script type="text/javascript">
   $('#Receipt').on('click',function(){
   
   var admission_id = $('#receipt_admission_id').val();
   alert(admission_id);
   
   window.open("<?php echo base_url()?>Admission/erpreceipt?action=ere&xyqtu="+admission_id , '_blank');
   return false;
   });
</script>

<script type="text/javascript">
   $('#CehckReceipt').on('click',function(){
   
   var admission_id = $('#receipt_admission_id').val();
   alert(admission_id);
   
   window.open("<?php echo base_url()?>Admission/erpProcessingCheck?action=cuxt&czyxtu="+admission_id , '_blank');
   return false;
   });
</script>

<script>
   if (document.getElementById("yellow") != null) {
    setTimeout(function() {
      document.getElementById('yellow').style.display = 'none';
    }, 5000);
   }
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
 	var charCode = (evt.which) ? evt.which : event.keyCode
 	if (charCode > 31 && (charCode < 48 || charCode > 57))
    	return false;

 	return true;
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script>
  $(document).ready(function () {
    $('#form').validate({
      rules: {
		 mobile_no_two :{
         required : true,
         minlength : 10,
         maxlength : 10
        },
	    email_two : {
			required:true,
			email : true
		},
		source_id_two : {
			required : true
		},
		first_name_two :{
			required : true
		},
		last_name :{
			required : true
		},
		stu_dob :{
			required : true
		},
		gender :{
			required : true
		},
		branch_id_two :{
			required : true
		},
		no_of_installments:{
			required : true
		},
		tuation_fees_two:{
			required : true
		},
		registration_fees_two:{
			required : true
		},
		payment_mode:{
			required : true
		},
      present_house_building_no : {
            required:true
         },
      present_street_area : {
         required:true
      },
      present_landmark_colony : {
         required:true
      },
      present_pin_code : {
         required:true
      },
      present_state_id : {
         required:true
      },
      present_city_id : {
         required:true
      },
      present_area_id : {
         required:true
      },
      permanent_house_building_no : {
         required:true
      },
      permanent_street_area : {
         required:true
      },
      permanent_landmark_colony : {
         required:true
      },
      permanent_pin_code : {
         required:true
      },
      permanent_state_id : {
         required:true
      },
      permanent_city_id : {
         required:true
      },
      permanent_area_id : {
         required:true
      },
      father_name : {
         required:true
      },
      atak_father : {
         required:true
      },
      // father_email : {
      // 	required:true
      // },
    //   father_mobile_no :{
    //      required : true,
    //      minlength : 10,
    //      maxlength : 10
    //   },
      father_occupation : {
         required:true
      },
      father_income : {
         required:true
      },
      mother_name : {
         required:true
      },
      atak_mother : {
         required:true
      },
      // mother_email : {
      // 	required:true
      // },
    //   mother_mobile_no :{
    //      required : true,
    //      minlength : 10,
    //      maxlength : 10
    //   },
      mother_occupation : {
         required:true
      },
      mother_income : {
         required:true
      },
      school_collage_name : {
         required:true
      },
      country_id : {
         required:true
      },
      school_clg_state : {
         required:true
      },
      school_clg_city : {
         required:true
      },
      school_clg_area : {
         required:true
      },
      },
      messages: {
		mobile_no_two :{
      	required : "<span style='color:red; float:left'>Enter Mobile No!!</span>",
      	minlength : "<span style='color:red; float:left'>Enter Minimum 10 digits!!</span>",
      	maxlength : "<span style='color:red; float:left'>Enter Maximum 10 digits!!</span>"
         },
		 email_two :{
			required : "<span style='color:red;'>Enter Email Id!!</span>",
			email : "<span style='color:red;'>Enter valid Email!!</span>",
		 },
		 source_id_two : {
			 required : "Select Source"
		 },
		 first_name_two : {
			 required : "Enter First Name"
		 },
		 last_name:{
			 required : "Enter Surname"
		 },
		 stu_dob:{
			required : "Select D.O.B"
		},
		gender:{
			required : "Select Gender"
		},
		 branch_id_two:{
			 required : "Select Branch Name"
		 },
		 no_of_installments:{
			 required : "Enter No-OF Installment!!"
		 },
		 tuation_fees_two:{
			 required : "Enter Tution Fees"
		 },
		 registration_fees_two:{
			required : "Enter Registrations Fees"
		 },
		 payment_mode :{
			required : "Please Select Payment Mode"
		 },
         present_house_building_no :{
            required : "<span style='color:red; float:left'>Enter House No, Building No!!</span>"
         },
         present_street_area :{
            required : "<span style='color:red; float:left'>Enter Area Street Village!!</span>"
         },
         present_landmark_colony :{
            required : "<span style='color:red; float:left'>Enter Near Landmark Location!!</span>"
         },
         present_pin_code :{
            required : "<span style='color:red; float:left'>Enter Pincode!!</span>"
         },
         present_state_id :{
            required : "<span style='color:red; float:left'>Enter State!!</span>"
         },
         present_city_id :{
            required : "<span style='color:red; float:left'>Enter City!!</span>"
         },
         present_area_id :{
            required : "<span style='color:red; float:left'>Enter Area!!</span>"
         },
         permanent_house_building_no :{
            required : "<span style='color:red; float:left'>Enter House No, Building No!!</span>"
         },
         permanent_street_area :{
            required : "<span style='color:red; float:left'>Enter Area Street Village!!</span>"
         },
         permanent_landmark_colony :{
            required : "<span style='color:red; float:left'>Enter Near Landmark Location!!</span>"
         },
         permanent_pin_code :{
            required : "<span style='color:red; float:left'>Enter Pincode!!</span>"
         },
         permanent_state_id :{
            required : "<span style='color:red; float:left'>Enter State!!</span>"
         },
         permanent_city_id :{
            required : "<span style='color:red; float:left'>Enter City!!</span>"
         },
         permanent_area_id :{
            required : "<span style='color:red; float:left'>Enter Area!!</span>"
         },
         father_name :{
            required : "<span style='color:red; float:left'>Enter Father Name!!</span>"
         },
         atak_father :{
            required : "<span style='color:red; float:left'>Enter Father Name!!</span>"
         },
         // father_email :{
         //    required : "<span style='color:red;'>Enter Father Email !!</span>"
         // },
        //  father_mobile_no :{
      	// required : "<span style='color:red;'>Enter Mobile No!!</span>",
      	// minlength : "<span style='color:red;'>Enter Minimum 10 digits!!</span>",
      	// maxlength : "<span style='color:red;'>Enter Maximum 10 digits!!</span>"
        //  },
         father_occupation :{
            required : "<span style='color:red; float:left'>Enter Father Occupation !!</span>"
         },
         father_income :{
            required : "<span style='color:red; float:left'>Enter Father Income!!</span>"
         },
         mother_name :{
            required : "<span style='color:red; float:left'>Enter Mother Name!!</span>"
         },
         atak_mother :{
            required : "<span style='color:red; float:left'>Enter Mother Name!!</span>"
         },
         // mother_email :{
         //    required : "<span style='color:red;'>Enter Mother Email !!</span>"
         // },
        //  mother_mobile_no :{
      	// required : "<span style='color:red;'>Enter Mobile No!!</span>",
      	// minlength : "<span style='color:red;'>Enter Minimum 10 digits!!</span>",
      	// maxlength : "<span style='color:red;'>Enter Maximum 10 digits!!</span>"
        //  },
         mother_occupation :{
            required : "<span style='color:red; float:left'>Enter Mother Occupation!!</span>"
         },
         mother_income :{
            required : "<span style='color:red; float:left'>Enter Mother Income!!</span>"
         },
         school_collage_name :{
            required : "<span style='color:red; float:left'>Enter School-Collage Name!!</span>"
         },
         country_id :{
            required : "<span style='color:red; float:left'>please Select Country!!</span>"
         },
         school_clg_state :{
            required : "<span style='color:red; float:left'>please Select State!!</span>"
         },
         school_clg_city :{
            required : "<span style='color:red; float:left'>please Select City!!</span>"
         },
         school_clg_area :{
            required : "<span style='color:red; float:left'>please Select Area!!</span>"
         }
      },
      submitHandler: function (form) {
        form.submit();
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
        //$('#alternate_number').val(data.record['alternate_mobile_no']);
        $('#email').val(data.record['email']);
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
        $('#source_id_two').val(data.record['source_id']);
        $('#alternate_no_two').val(data.record['alternate_mobile_no']);
        $('#email_two').val(data.record['email']);
        $('#stu_dob').val(data.record['stu_dob']);
        $('#email_two').val(data.record['email']);
         $('#demo_id').val(data.record['demo_id']);
        $('#lead_list_id]').val(data.record['lead_list_id']);
        $('#first_name_two').val(data.record['first_name']);
        $('#last_name').val(data.record['surname']);
        $('#branch_id_two').val(data.record['branch_id']);
        $('#atak_father').val(data.record['surname']);
        $('#atak_mother').val(data.record['surname']);
        if(data.record['present_state_id'] == "Surat"){
        	var present_stat = "Gujarat";
        }else if(data.record['present_state_id'] == "Gujarat"){
        	var present_stat = "Gujarat";
        }
        else{
        	var present_stat = data.record['present_state_id'];
        }
        $('.present_state_id').val(present_stat);
        $('#present_city_id').val(data.record['present_city_id']);
        $('#present_area_id').val(data.record['present_area_id']);
        $('#present_pin_code').val(data.record['present_pin_code']);
        $('#present_house_building_no').val(data.record['present_flate_house_no']);
        $('#present_street_area').val(data.record['present_area_street']);
        $('#present_landmark_colony').val(data.record['present_landmark']);
        $('.permanent_state_id').val(data.record['permanent_country_id']);
        $('.permanent_city_id').val(data.record['permanent_state_id']);
        $('#permanent_area_id').val(data.record['permanent_area_id']);
        $('#permanent_pin_code').val(data.record['permanent_pin_code']);
        $('#permanent_house_building_no').val(data.record['permanent_flate_house_no']);
        $('#permanent_street_area').val(data.record['permanent_area_street']); 
        $('#permanent_landmark_colony').val(data.record['permanent_landmark']);
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
        $('#country_id').val(data.record['present_country_id']);
        $('#school_clg_state').val(data.record['school_clg_state']);
        $('#school_clg_city').val(data.record['school_clg_city']);
        $('#school_clg_area').val(data.record['school_clg_area']);
   
   	var sch_clg_type = data.record['school_collage_type'];
   	var gender = data.record['gender'];
   if (gender == 'male')
   {
   $(".male"). prop("checked", true);
   }else{
   $(".female"). prop("checked", true);
   }
   
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
   
    $('#mobile_no_two').keyup(function(){
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
<script>

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
   var data = $.parseJSON(res);
   
   $('#source_id_two').val(data.record['source_id']);
        $('#alternate_no_two').val(data.record['alternate_mobile_no']);
        $('#email_two').val(data.record['email']);
        $('#stu_dob').val(data.record['stu_dob']);
         $('#demo_id').val(data.record['demo_id']);
        $('#lead_list_id]').val(data.record['lead_list_id']);
        $('#email_two').val(data.record['email']);
        $('#first_name_two').val(data.record['first_name']);
        $('#last_name').val(data.record['surname']);
        $('#branch_id_two').val(data.record['branch_id']);
        $('#atak_father').val(data.record['surname']);
        $('#atak_mother').val(data.record['surname']);
        $('#present_state_id').val(data.record['present_state_id']);
        $('#present_city_id').val(data.record['present_city_id']);
        $('#present_area_id').val(data.record['present_area_id']);
        $('#present_pin_code').val(data.record['present_pin_code']);
        $('#present_house_building_no').val(data.record['present_flate_house_no']);
        $('#present_street_area').val(data.record['present_area_street']);
        $('#present_landmark_colony').val(data.record['present_landmark']);
  	    $('.permanent_state_id').val(data.record['permanent_country_id']);
        $('.permanent_city_id').val(data.record['permanent_state_id']);
        $('#permanent_area_id').val(data.record['permanent_area_id']);
        $('#permanent_pin_code').val(data.record['permanent_pin_code']);
        $('#permanent_house_building_no').val(data.record['permanent_flate_house_no']);
        $('#permanent_street_area').val(data.record['permanent_area_street']); 
        $('#permanent_landmark_colony').val(data.record['permanent_landmark']);
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
        $('#country_id').val(data.record['present_country_id']);
        $('#school_clg_state').val(data.record['school_clg_state']);
        $('#school_clg_city').val(data.record['school_clg_city']);
        $('#school_clg_area').val(data.record['school_clg_area']);
   
   	var sch_clg_type = data.record['school_collage_type'];
   	var gender = data.record['gender'];
   if (gender == 'male')
   {
   $(".male"). prop("checked", true);
   }else{
   $(".female"). prop("checked", true);
   }
   
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
   
   $('#email_two').keyup(function(){
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
 
</body> 

</html>
