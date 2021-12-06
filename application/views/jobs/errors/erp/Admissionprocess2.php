<?php 
// $yy = "SELECT * FROM branch ORDER BY branch_id";
// 								$aa = $this->db->query($yy);
// 								$ad = $aa->result();

// 								echo "<pre>";
// 								print_r($ad);
// 								die;
  //$aa = $_SESSION['branch'];
 // print_r($aa);
  //exit; 

?>


   <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
      <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
      <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
       <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/select2.min.css">
<style type="text/css">

  .select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #2255a4;
    color: white;
    border: 1px solid #aaa;
    border-radius: 4px;
    cursor: default;
    float: left;
    margin-right: 5px;
    margin-top: 1px;
	padding:5px !important;
	font-size: 12px !important;
	line-height: 1 !important;
}
.select2-container--default .select2-results__option--highlighted[aria-selected]{
	font-size: 12px !important;
}
.select2-container--default .select2-selection--multiple{
	line-height: 1 !important;
}
/* .select2-container .select2-selection--multiple{
	min-height:24px !important;
} */
/*.select2-container--default .select2-selection--multiple {
    line-height: 27px;
}*/
.select2-container--default .select2-selection--multiple .select2-selection__rendered li {
    list-style: none;
    }
</style>
<style type="text/css">
	.modal-header{
		background-color: #0b527e;
	}
	.modal-title{
		
	    color: white;
	}
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
		.simple_border_box_design .form-group{
			display:block;
		}
		.number{
			border: 0;
		}
</style>

<main class="main_content d-inline-block">
	<section class="new_letest_addmision_process_block d-inline-block w-100 position-relative pb-0">
		<div class="container-fluid">
			<?php 
				date_default_timezone_set("Asia/Calcutta");
				$admission_date =  date('d/m/Y h:i A');
				//$admission_time =  date('h:i A');			
				$q = "SELECT * FROM admission_process ORDER BY admission_id DESC";
				$q1 = $this->db->query($q);
				$q2 = $q1->result();
				// echo "<pre>";
				// print_r();
				// die;
				$admission_number = 0;
				if(count($q2)>0)
				{
						if(!empty($q2[0]->admission_number))
						{

						$admission_number =  1+$q2[0]->admission_number;
						}
						else
						{
							$admission_number = 01;	
						}
				}
				else
				{
					$admission_number = 01;
				}
			?>	
		
			<?php if(@$this->session->flashdata('msg_alert')) { ?>
            	<div class="col-md-4" >     	     
            		<div id="yellow" class="alert alert-success" role="alert">
						<?php echo $this->session->flashdata('msg_alert'); ?>
					</div>
				</div>   
     	    <?php } ?>
			<div class="card part-1 p-3 mb-3 col-xl-8 col-lg-8 col-md-12 col-sm-12  d-flex">
				<form  id="form_validation" method="post" name="form_validation">
					<div class="row">	
						<div class="col-xl-12">					
							<div class="simple_border_box_design">
								<span class="addmision_process_top_title">Communication</span>
								<div class="form-row" style="margin-top: -18px;">
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
										<div class="form-group">
											<label>Mobile No:</label>
											<!-- <input type="hidden" name="gr_id" value="<?php if(isset($g_id)){ echo $g_id; } ?>" id="gr_id"> -->
											<input type="hidden" name="admission_number" value="<?php if(isset($admission_number)){ echo $admission_number; } ?>" id="admission_number">
											<input type="hidden" name="admission_date" value="<?php if(isset($admission_date)){ echo $admission_date; } ?>" id="admission_date">
											<!-- <input type="hidden" name="admission_time" value="<?php if(isset($admission_time)){ echo $admission_time; } ?>" id="admission_time"> -->									
											<input type="hidden" name="lead_list_id" id="lead_list_id">
											<input type="hidden" name="demo_id" id="demo_id">
											<input type="hidden" name="shining_sheet_id" id="shining_sheet_id">
											<input type="text" name="mobile_no" id="mobile_no" placeholder="Mobile No" class="form-control custom-form-control" onblur="check_mobile_no()" autofocus>
											<div class="errorName"></div>
										</div>
									</div>
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
										<div class="form-group">
											<label>Alternet No:</label>
											<input type="text" name="alternate_mobile_no" id="alternate_number" placeholder="Alternet No" class="form-control custom-form-control" onblur="check_alternate_number()">
										</div>
									</div>
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
										<div class="form-group">
											<label>Email:</label>
											<input type="email" name="email" id="email" placeholder="Email" class="form-control custom-form-control" onblur="check_email()">
										</div>
									</div>
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
										<div class="form-group" id="source_data">
											<label>Source:</label>
											<select class="form-control custom-form-control" name="source_id" id="source_id">
											   <option value="">Select Source</option>
												<?php foreach($list_source as $ld) { ?>
													<option value="<?php echo $ld->source_name; ?>"><?php echo $ld->source_name; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>							
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-12">				
							<div class="simple_border_box_design">
								<span class="addmision_process_top_title">Personal Details</span>
								<div class="form-row" style="margin-top: -18px;">
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
									    <div class="form-group">
									        <label for="email">First Name:</label>
									        <input type="text" name="first_name" id="first_name" placeholder="First Name" class="form-control custom-form-control" />
									    </div>
									</div>
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
									    <div class="form-group">
									        <label for="email">Surname:</label>
									        <input type="text" name="surname" id="surname" placeholder="Surname" class="form-control custom-form-control" autofocus="" />
									    </div>
									</div>
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
									    <div class="form-group" id="branch_data">
									        <label>Branch Name:</label>
									        <select class="form-control custom-form-control" name="admission_branch" id="admission_branch">
									           <option value="">Select branch</option>
												<?php foreach($list_branch as $ld) { ?>
													<option value="<?php echo $ld->branch_id; ?>"><?php echo $ld->branch_name; ?></option>
												<?php } ?>	
									        </select>
									    </div>
									</div>
									<?php $addby =  $_SESSION['Admin']['username']; ?>
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
									    <div class="form-group">
									        <label for="email">Assigned To:</label>
									        <input type="text" name="addby" id="addby" value="<?php if(isset($addby)){ echo $addby; } ?>" placeholder="Assigned To" class="form-control custom-form-control" />
									    </div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-12">
							<div class="simple_border_box_design">
								<span class="addmision_process_top_title">Course & Fees</span>
								<div class="form-row" style="margin-top: -18px;">
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
										<div class="form-group" id="branch_data">
											<label>Branch Name:</label>
											<select class="form-control custom-form-control branch" name="branch_id" id="branch_id">
											   <option value="">Select branch</option>
													<?php foreach($list_branch as $ld) { ?>
															<option value="<?php echo $ld->branch_id; ?>"><?php echo $ld->branch_name; ?></option>
													<?php } ?>	
											</select>
										</div>
									</div>
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
					  					<div class="form-group">
					  					    <label>Course Category</label>
					  					    <ul>
					  					        <li class="d-inline-block mr-3 mr-mr-0" style="font-size: 12px;">
					  					            <div class="form-check form-check-inline">
					  					                <input class="form-check-input" type="radio" id="course_package" name="quick_course_package" value="package" onclick="return show_hide_package_course()" />Package
					  					            </div>
					  					            <div class="form-check form-check-inline">
					  					                <input class="form-check-input" type="radio" id="course_single" name="quick_course_package"  value="single" onclick="return show_hide_package_course()"/>Single
					  					            </div>
					  					        </li>
					  					    </ul>
					  					</div>
					  				</div>				  			
					  				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 select_course_package">
										<div class="form-group">
											<label>Select Package*</label>
												<select class="select2 form-control custom-form-control" name="course_or_package[]" id="course_orpackage" multiple="multiple">
			                      		<option value="">Select Package</option>
											<!--  <?php foreach($list_package as $lp) { ?>
														<option value="<?php echo $lp->package_id; ?>"><?php echo $lp->package_name; ?></option>
													<?php } ?>  -->
											</select>
										</div>
									</div>
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 select_course_single" >
										<div class="form-group">
											<label>Select Course*</label>
										 <select class="select2 form-control custom-form-control" name="course_or_single[]" id="course_orsingle" multiple="multiple">
			                      		<option value="">Select Course</option>
									          <!-- <?php foreach($list_course as $lp) { ?>
														<option value="<?php echo $lp->course_id; ?>"><?php echo $lp->course_name; ?></option>
													<?php } ?>  -->
									        </select>
									    </div>
									</div>						
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
										<div class="form-group">
			                                <label>Assign To:</label>                                  
			                                  <select class="form-control custom-form-control" name="faculty_id" id="faculty_id">
			                                        <option value="0">Select faculty</option>
			                                        <!-- <?php foreach($faculty_all as $lp) { ?>
														<option value="<?php echo $lp->faculty_id; ?>"><?php echo $lp->name; ?></option>
													<?php } ?> -->
			                                </select>
			                            </div>
			                        </div>
			                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
										<div class="form-group">
			                                <label>Batch:</label>                                  
			                                  <select class="form-control custom-form-control" name="batch_id" id="batch_id">
			                                  	<option value="">Select Batch</option>
			                                </select>
			                            </div>
			                        </div>
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
									    <div class="form-group">
									        <label for="text">Tution Fees:</label>
									        <input type="text" name="tuation_fees" id="tuation_fees" placeholder="Tution Fees" class="form-control custom-form-control" />
									    </div>
									</div>								
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
									    <div class="form-group">
									        <label for="text">Registration Fees:</label>
									        <input type="text" name="registration_fees" id="registration_fees" placeholder="Registration Fees" class="form-control custom-form-control" autofocus="" />
									    </div>
									</div>
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
										<div class="form-group">
											<input type="text" name="no_of_installment" id="no_of_installment" style="margin-top: 28px; width: 50px; border-radius: .25rem;  border: 1px solid #ced4da;">
											<input type="button" name="make_instllment" value="Make Installment" class="btn btn-primary" onclick="return make_installment_process()" style="border-radius: .25rem;  border: 1px solid #ced4da; margin-top:-6px;">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>							
				</form>
			</div>
			<div class="card part p-3 ">				
				<form  enctype="multipart/form-data" method="post" action="<?php echo base_url(); ?>AddmissionController/Admissionprocess" id="admission_form_validation">
					<input type="text" name="update_id" id="update_id">
					<div class="row">
						<div class="col-xl-12">				
							<div class="simple_border_box_design">
								<span class="addmision_process_top_title">Fees Installment</span>
								<div class="form-row" style="margin-top: -18px;" id="installment_all_data">
									<div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
									    <div class="form-group">
											<label for="email"><b>#NO</b></label>
											<?php $no = "1"; ?>
											<input type="text" name="" value="<?php if(isset($no)){ echo $no; } ?>"  class="form-control custom-form-control number" />			
									    </div>
									</div>
									<div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
									    <div class="form-group">
									        <label for="email">Installment Date</label>
											<input type="text" name=""  class="form-control custom-form-control" />
									    </div>
									</div>
									<div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
									    <div class="form-group">
									        <label>	Due Amount</label>
											<input type="text" name=""  class="form-control custom-form-control" />
									    </div>
									</div>
									<div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
									    <div class="form-group">
									        <label for="email"> Paid Amount</label>
									        <input type="text" name=""  class="form-control custom-form-control" />
									    </div>
									</div>
									<div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
									    <div class="form-group">
										<label>Send SMS To:</label>
										<input type="checkbox" ><br>
										<label>Send Email To:</label>
										<input type="checkbox" >
									    </div>
									</div>
									<div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
									    <div class="form-group">
										<label>Send SMS Father:</label>
										<input type="checkbox" ><br>
										<label>Send Email Father:</label>
										<input type="checkbox" >
									    </div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6" id="process_button">
							<div class="form-group">								
								<input type="submit" name="submit" value="Next" class="btn btn-primary" id="hide">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-12">
							<div class="simple_border_box_design">
								<span class="addmision_process_top_title">Postal Communication</span>
								<div class="form-row" style="margin-top: -18px;">
									<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
									    <div class="form-group" id="state_data">
									        <label>State:</label>
									        <select class="form-control custom-form-control" name="state_id" id="state_id">
											   <option value="">Select State</option>
												<?php foreach($list_state as $val) { ?>
													<option <?php  if($val->state_name=="Gujarat") { echo "selected"; } ?> value="<?php echo $val->state_name; ?>"><?php echo $val->state_name; ?></option>
												<?php } ?>	
											</select>
									    </div>
									</div>
									<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
									    <div class="form-group">
									        <label>City:</label>
									        <select class="form-control custom-form-control" name="city_id" id="city_id">
											   	<option value="">Select City</option>
												<?php foreach($list_city as $val) { ?>
													<option <?php  if($val->city_name=="Surat") { echo "selected"; } ?> value="<?php echo $val->city_name; ?>"><?php echo $val->city_name; ?></option>
												<?php } ?>	
											</select>
									    </div>
									</div>
									<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
									    <div class="form-group">
									        <label>Area:</label>
									        <select class="form-control custom-form-control" name="area_id" id="area_id">
											   <option value="">Select Area</option>
																<?php foreach($list_area as $ld) { ?>
																	<option value="<?php echo $ld->area_id; ?>"><?php echo $ld->area_name; ?></option>
																<?php } ?>	
											</select>
									    </div>
									</div>
									<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
									    <div class="form-group">
									        <label>Pin Code:</label>
									        <input type="text" name="pin_code" id="pin_code" placeholder="Pin Code" class="form-control custom-form-control" />
									    </div>
									</div>
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
										<div class="form-group">
											<label>Present Address:</label>
											<textarea class="form-control" id="pre_address" name="present_address" placeholder="Present Address..."></textarea>
										</div>
									</div>
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
									    <div class="form-group">
									        <label>Permanent Address:</label>
									        <textarea class="form-control" id="permanent_address" name="permanent_address" placeholder="Permanent Address..."></textarea>
									    </div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-12">
							<div class="simple_border_box_design">
								<span class="addmision_process_top_title">Parents Details</span>
								<div class="form-row" style="margin-top: -18px;">
									<div class="col-xl-12 mb-2">
										<h5>Guardian 1 Details</h5>
									</div>
									<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
									    <div class="form-group">
									        <label>Name:</label>
									        <input type="text" name="father_name" id="father_name" class="form-control custom-form-control" placeholder="Father Name" />
									    </div>
									</div> -->
									<!-- <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
									    <div class="form-group">
									        <label>Surname:</label>
									        <input type="text" name="Surname" id="atak" placeholder="Your Surname" class="form-control custom-form-control" />
									    </div>
									</div> -->
									<!-- <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
									    <div class="form-group">
									        <label>Email:</label>
									        <input type="email" name="father_email" id="father_email" placeholder="Email Id" class="form-control custom-form-control" />
									    </div>
									</div>
									<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
									    <div class="form-group">
									        <label>Father Mobile No:</label>
									        <input type="text" name="father_mobile_no" id="father_mobile_no" placeholder="Phone Number" class="form-control custom-form-control" />
									    </div>
									</div>
									<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
									    <div class="form-group">
									        <label>Occupation:</label>
									        <input type="text" name="father_occupation" id="father_occupation" placeholder="Occupation" class="form-control custom-form-control" />
									    </div>
									</div>
									<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
									    <div class="form-group">
									        <label>Income:</label>
									        <input type="text" name="father_income" id="father_income" placeholder="Father Income" class="form-control custom-form-control" />
									    </div>
									</div>
									<div class="col-xl-12 mb-2">
										<h5>Guardian 2 Details</h5>
									</div>
									<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
									    <div class="form-group">
									        <label>Name:</label>
									        <input type="text" name="mother_name" id="mother_name" class="form-control custom-form-control" placeholder="First Name" />
									    </div>
									</div> -->
									<!-- <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
									    <div class="form-group">
									        <label>Surname:</label>
									        <input type="text" name="Surname" placeholder="Last Name" class="form-control custom-form-control" />
									    </div>
									</div> 
									<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
									    <div class="form-group">
									        <label>Email:</label>
									        <input type="email" name="mother_email" id="mother_email" placeholder="Email Id" class="form-control custom-form-control" />
									    </div>
									</div>
									<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
									    <div class="form-group">
									        <label>Mother Mobile No:</label>
									        <input type="text" name="mother_mobile_no" id="mother_mobile_no" placeholder="Phone Number" class="form-control custom-form-control" />
									    </div>
									</div>
									<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
										<div class="form-group">
											<label>Occupation:</label>
											<input type="text" name="mother_occupation" id="mother_occupation" placeholder="Mather Occupation" class="form-control custom-form-control">
										</div>
									</div>
									<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
									    <div class="form-group">
									        <label>Income:</label>
									        <input type="text" name="mother_income" id="mother_income" placeholder="Mather Income" class="form-control custom-form-control" />
									    </div>
									</div>
									<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
									    <div class="form-group">
									    	<label>Send Email</label>
									        <ul>
									            <li class="d-inline-block mr-3 mr-mr-0">
									                <div class="form-check form-check-inline">
									                   <input type="radio"  name="admission_msg_email" value="Yes" placeholder="content">Yes
									   
									                </div>
									                <div class="form-check form-check-inline">
									                   <input type="radio"  name="admission_msg_email" value="No" placeholder="content">No
									                </div>
									            </li>
									        </ul>
									    </div>
									</div>
									<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
									    <div class="form-group">
									    	<label>Send SMS</label>
									        <ul>
									            <li class="d-inline-block mr-3 mr-mr-0">
									                <div class="form-check form-check-inline">
									                   <input type="radio"  name="admission_msg_mobile" value="Yes" placeholder="content">Yes
									   
									                </div>
									                <div class="form-check form-check-inline">
									                   <input type="radio"  name="admission_msg_mobile" value="No" placeholder="content">No
									                </div>
									            </li>
									        </ul>
									    </div>
									</div>									
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-12">
							<div class="simple_border_box_design">
								<span class="addmision_process_top_title">Education & Proffasion</span>
								<div class="form-row" style="margin-top: -18px;">
									<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
									    <div class="form-group">
									    	<label>College / school Name</label>
									    	<input type="text" name="school_collage_name" id="school_collage_name" placeholder="College / Scholl Name" class="form-control custom-form-control" />
									    </div>
									</div>
									<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
									    <div class="form-group">
									        <label>Country:</label>
									        <select class="form-control custom-form-control" name="country_id" id="country_id">
											   <option value="">Select Country</option>
												<?php foreach($list_country as $val) { ?>
												  <option <?php  if($val->country_name=="India") { echo "selected"; } ?> value="<?php echo $val->country_name; ?>"><?php echo $val->country_name; ?></option>
												<?php } ?>			
											</select>
									    </div>
									</div>
									<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
									    <div class="form-group">
									         <label>State:</label>
									        <select class="form-control custom-form-control" name="school_clg_state" id="school_clg_state">
											   <option value="">Select State</option>
											<?php foreach($list_state as $val) { ?>
												      <option <?php  if($val->state_name=="Gujarat") { echo "selected"; } ?> value="<?php echo $val->state_name; ?>"><?php echo $val->state_name; ?></option>
											<?php } ?>	
											</select>
									    </div>
									</div>
									<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
									    <div class="form-group">
									        <label>City:</label>
									         <select class="form-control custom-form-control" name="school_clg_city" id="school_clg_city">
											   <option value="">Select City</option>
											<?php foreach($list_city as $val) { ?>
								            <option <?php  if($val->city_name=="Surat") { echo "selected"; } ?> value="<?php echo $val->city_name; ?>"><?php echo $val->city_name; ?></option>
								            <?php }  ?>
											</select>
									    </div>
									</div>
									<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
									    <div class="form-group">
									        <label>Area:</label>
									        <select class="form-control custom-form-control" name="school_clg_area" id="school_clg_area">
											   <option value="">Select Area</option>
																<?php foreach($list_area as $ld) { ?>
																	<option value="<?php echo $ld->area_id; ?>"><?php echo $ld->area_name; ?></option>
																<?php } ?>	
											</select>
									    </div>
									</div>
									<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
									    <div class="form-group">
									        <label>Type</label>
									        <ul>
									            <li class="d-inline-block mr-3 mr-mr-0">
									                <div class="form-check form-check-inline">
									                    <input type="radio"  name="school_collage_type" id="sch_typ" value="school"  placeholder="content">School
									                </div>
									                <div class="form-check form-check-inline">
									                    
									                    <input type="radio"  name="school_collage_type" id="clg_typ" value="college"  placeholder="content">College
									                </div>
									            </li>	
									        </ul>
									    </div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-12">
							<div class="simple_border_box_design">
								<span class="addmision_process_top_title">Document</span>
								<div class="form-row" style="margin-top: -18px;">
									<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
										<div class="form-group">
											<input type="file" name="" class="form-control custom-form-control"> 
										</div>
									</div>
									<div id="photos"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-12 d-flex px-0">
						<div class="form-group mr-3">
							<button type="submit" value="back" name="back" id="show" class="btn btn-primary">Back</button>
						</div>
						<div class="form-group">
							<button type="submit" value="submit" name="submit" class="btn btn-primary">Submit</button>
						</div>
					</div>
			  	</form>
			</div>
		</div>
		</div>
	</section>
</main>






	
	<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    	<div class="data_insert_msg">

				</div>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><b>Verify The Numbers</b></h5>
        <div id="mag_otp"></div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> 
      </div>
      <div class="modal-body">
      	<form method="post" id="form_validation_inner" name="form_validation_inner" >
      		<input type="hidden" name="alternate_mobile_no" id="alternate_mobile_replace_no" class="form-control">
      		<input type="hidden" name="father_mobile_no" id="father_mobile_replace_no" class="form-control">
      		<input type="hidden" name="mother_mobile_no" id="mother_mobile_replace_no" class="form-control">
      	<div class="row">
      		<div class="col-xl-6">
      			<div class="form-group">
      				<label><b>Mobile NO</b><span style="color: red;">*</span></label>
      				<input type="text" name="mobile_no" id="mobile_replace_no" class="form-control">
      			</div>
      		</div>
      		<div class="col-xl-6">
      			<div class="form-group">
      				<label><b>OTP</b><span style="color: red;">*</span></label>
      				<input type="text" name="mobileOtp" id="mobileOtp" class="form-control">
      			</div>
      		</div>
      		<div class="col-xl-6">
      			<div class="form-group">
      				<input type="button" name="" id="sendotp" class="btn btn-sm btn-primary" value="Send OTP">
      			</div>
      		</div>
      		
      		<div class="col-xl-6">
      			<div class="form-group">
      				<input type="button" name="" id="verifyotp" class="btn btn-sm btn-success" value="Verify">
      			</div>
      		</div>
      	</div>
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" value="Save" class="btn btn-primary">Save</button>
      </div>
    </div>
     </form>
  </div>

	
</main>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->

<script src="<?php echo base_url(); ?>assets/js/jquery-2.2.4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js "></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-timepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
<script type="text/javascript">
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
                $('#mag_otp').html("<div class='btn btn-sm bg-light ml-4'><b style='color: green;'>Successfully Send OTP</b></div>");
                $('#mag_otp').fadeOut(4000);
            }
            else
            {
            	$('#mag_otp').fadeIn();
                $('#mag_otp').html("<div class='btn btn-sm bg-light ml-4'><b style='color: red;'>Someting Wrong!!</b></div>");
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
                $('#mag_otp').html("<div class='btn btn-sm bg-light ml-4'><b style='color: green;'>Successfully Verify OTP</b></div>");
                $('#mag_otp').fadeOut(4000);
            }
            else
            {
            	$('#mag_otp').fadeIn();
                $('#mag_otp').html("<div class='btn btn-sm bg-light ml-4'><b style='color: red;'>Someting Wrong!!</b></div>");
                $('#mag_otp').fadeOut(4000);
            }
        }
    });
    return false;
});
</script>		
<script>
 $('#process_button').hide();

function check_mobile_no(){
  var search = $('#mobile_no').val();
 
  $.ajax({
   url:"<?php echo base_url(); ?>AddmissionController/GetRecord",
   type:"POST",
   data:{ 'mobile_no' : search },
   success:function(res)
   {
   	
      var data = $.parseJSON(res);

    //  if(data.record==null)
    // {
     
    //  $('#mobile_no').val('');
    //  $('#alternate_number').val('');
    //  $('#email').val('');
    //  $('#source_id').val('');
    //  $('#first_name').val('');
    //  $('#surname').val('');
    //  $('#admission_branch').val('');
    //  $('#atak').val('');
    //  $('#state_id').val('');
    //  $('#city_id').val('');
    //  $('#area_id').val('');
    //  $('#pin_code').val('');
    //  $('#pre_address').val('');
    //  $('#permanent_address').val('');
    //  $('#father_name').val('');
    //  $('#father_email').val('');
    //  $('#father_mobile_no').val('');
    //  $('#father_occupation').val('');
    //  $('#father_income').val('');
    //  $('#mother_name').val('');
    //  $('#mother_email').val('');
    //  $('#mother_mobile_no').val('');
    //  $('#mother_occupation').val('');
    //  $('#mother_income').val('');
    //  $('#school_collage_name').val('');
    //  $('#country_id').val('');
    //  $('#school_clg_state').val('');
    //  $('#school_clg_city').val('');
    //  $('#school_clg_area').val('');
    //  $('#school_collage_type').val('');
     
    // }
    // else 
    // {
    

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
     $('#atak').val(data.record['surname']);
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

		// }
   }
  });
 }



 // function check_alternate_number(){
 //  var alternatesearch = $('#alternate_number').val();
 

 //  $.ajax({
 //   url:"<?php echo base_url(); ?>AddmissionController/GetRecord_alternate_number_wise",
 //   type:"POST",
 //   data:{ 'alternate_mobile_no' : alternatesearch },
 //   success:function(res){
   	
 //  var data = $.parseJSON(res);	
 //    if(data.record==null){
 //     	//$('.email_class').show();

 //     // $('#email').val('');
 //     // $('#email_id').val('');
 //     $('#first_name').val('');
 //     $('#surname').val('');
 //     $('#admission_branch').val('');
 //     $('#father_name').val('');
 //     $('#father_mobile_no').val('');
 //     $('#atak').val('');
 //     $('#state_id').val('');
 //     $('#city_id').val('');
 //     $('#area_id').val('');
 //     $('#department_id').val('');
 //     $('#source_id').val('');
 //     // $('#alternate_number').val('');
 //    }
 //    else{
 //    //alert("mobile");
   	
 //   	console.log(data.record['lead_list_id']);
 //   	if(data.record['lead_list_id']!=''){
 //     $('#lead_list_id').val(data.record['lead_list_id']);
 // 	}else
 // 	{
 // 		 $('#lead_list_id').val('');
 // 	}
 //     $('#mobile_no').val(data.record['mobile_no']);
 //     $('#alternate_number').val(data.record['alternate_mobile_no']);
 //     $('#email').val(data.record['email']);
 //     $('#first_name').val(data.record['name']);
 //     $('#surname').val(data.record['surname']);
 //     $('#source_id').val(data.record['source_id']);
 //     $('#branch_id').val(data.record['branch_id']);
 //     $('#admission_branch').val(data.record['branch_id']);
 //     $('#father_name').val(data.record['father_name']);
 //     $('#father_mobile_no').val(data.record['father_mobile_no']);
 //     $('#atak').val(data.record['surname']);
 //     $('#state_id').val(data.record['state']);
 //     $('#city_id').val(data.record['city']);
 //     $('#area_id').val(data.record['area']);
     
    
 //     var pack_sin =  data.record['course_package'];
				
	// 			if(pack_sin == 'package')
	// 			{
	// 				$("#course_package"). prop("checked", true);
	// 				// get_course_package('package');
	// 				 $('.select_course_package').show();
	// 				 $('.select_course_single').hide();
	// 				 $('#course_orpackage').val(data.record['course_or_package']);
					
	// 			}
	// 			else
	// 			{
	// 				$("#course_single"). prop("checked", true);	
	// 				// get_course_package('single');
	// 				$('.select_course_package').hide();
	// 			    $('.select_course_single').show();
	// 			   $('#course_orsingle').val(data.record['course_or_package']);
				
	// 			}

	// 	}
 //   }
 //  });
 // }
 


function check_email(){
  var emailsearch = $('#email').val();

// $('#email_id').keyup(function(){
//   var emailsearch = $(this).val();
 

  $.ajax({
   url:"<?php echo base_url(); ?>AddmissionController/Getrecord_email_wise",
   type:"POST",
   data:{ 'email' : emailsearch },	
   success:function(res){
   	
  var data = $.parseJSON(res);
  if(data.record==null){
     	//$('.source_class').show();

     // $('#email').val('');
     // $('#email_id').val('');
     $('#first_name').val('');
     $('#surname').val('');
     $('#branch_id').val('');
     $('#admission_branch').val('');
     $('#father_name').val('');
     $('#father_mobile_no').val('');
     $('#atak').val('');
     $('#state_id').val('');
     $('#city_id').val('');
     $('#area').val('');
     $('#department_id').val('');
     $('#source_id').val('');
     // $('#alternate_number').val('');
    }else {
   	
   	console.log(data.record['lead_list_id']);
     $('#lead_list_id_demo_id').val(data.record['lead_list_id']);
     $('#mobile_no').val(data.record['mobile_no']);
     $('#email').val(data.record['email']);
     $('#email_id').val(data.record['email']);
     $('#first_name').val(data.record['name']);
     $('#surname').val(data.record['surname']);
     $('#branch_id').val(data.record['branch_id']);
     $('#admission_branch').val(data.record['branch_id']);
     $('#father_name').val(data.record['father_name']);
     $('#father_mobile_no').val(data.record['father_mobile_no']);
     $('#atak').val(data.record['surname']);
     $('#state_id').val(data.record['state']);
     $('#city_id').val(data.record['city']);
     $('#area').val(data.record['area']);
     $('#source_id').val(data.record['source_id']);
     $('#alternate_number').val(data.record['alternate_mobile_no']);
     // var lead_list_id = data.record['email']; 
    
     // if(lead_list_id !='')
     // {
     // 	 $('.email').show();
     // 	 $('#all_card_id').show();
     // }

     
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
   }
  });
 }



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
<!-- <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script> -->
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
            				  var data = $.parseJSON(resp);
						      var admis_id = data['allrecord'].admission_id;
						      
						      $('#update_id').val(admis_id);
                	    }
                		});
		        	}
   }
});
</script>
<script>
// just for the demos, avoids form submit
$(document).ready(function(){
	$('#form_validation').validate({
		rules: {
			mobile_no :{
				required :true,
				number : true,
				minlength : 10,
				maxlength :10
			},
			alternate_mobile_no :{
				required :true,
				number : true,
				minlength : 10,
				maxlength :10
			},
			email :{
				required :true,
				email : true
			},
			source_id :{
				required :true
			},
			first_name:{
				required: true
			},
			surname: {
				required : true
			},
			admission_branch:{
				required: true
			},
			branch_id:{
				required : true
			}
			
		},
		messages:{
			mobile_no :{
				required : "<div style='color:red'>Please Enter Mobile Number</div>",
				number : "<div style='color:red'>Please Enter Number</div>",
				minlength : "<div style='color:red'>Minimum 10 digits</div>",
				maxlength : "<div style='color:red'>Maximum 10 digits</div>"
			},
			alternate_mobile_no :{
				required : "<div style='color:red'>Please Enter Mobile Number</div>",
				number : "<div style='color:red'>Please Enter Number</div>",
				minlength : "<div style='color:red'>Minimum 10 digits</div>",
				maxlength : "<div style='color:red'>Maximum 10 digits</div>"
			},
			email:{
				required : "<div style='color:red'>Please Enter Email</div>",
				email : "<div style='color:red'>Please Enter Valid Email</div>"
			},
			source_id :{
				required : "<div style='color:red'>Please Select Source</div>"
			},
			first_name:{
				required : "<div style='color:red'>Please enter first name</div>"
			},
			surname :{
				required: "<div style='color:red'>Please enter surname</div>"
			},
			admission_branch:{
				required : "<div style='color:red'>Select Branch</div>"
			},
			branch_id:{
				required : "<div style='color:red'>Select Branch Id</div>"
			}
		},
		 submitHandler: function(form) {
                // form.submit();
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
		}	
	});

	});

	</script>
	<script src="<?php echo base_url(); ?>dist/js/select2.full.min.js"></script>
    <script src="<?php echo base_url(); ?>dist/js/select2.min.js"></script>

   <script>
        //***********************************//
        // For select 2
        //***********************************//
        $(".select2").select2();

        /*colorpicker*/
        $('.demo').each(function() {
        //
        // Dear reader, it's actually very easy to initialize MiniColors. For example:
        //
        //  $(selector).minicolors();
        //
        // The way I've done it below is just for the demo, so don't get confused
        // by it. Also, data- attributes aren't supported at this time...they're
        // only used for this demo.
        //
        $(this).minicolors({
                control: $(this).attr('data-control') || 'hue',
                position: $(this).attr('data-position') || 'bottom left',

                change: function(value, opacity) {
                    if (!value) return;
                    if (opacity) value += ', ' + opacity;
                    if (typeof console === 'object') {
                        console.log(value);
                    }
                },
                theme: 'bootstrap'
            });

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
     $('#course_orpackage').html(data);
 
    }
   });
 });

 $('#course_orsingle').change(function(){
 
  var course_id = $('#course_orsingle').val();
  var branch_id = $('#branch_id').val();
 
   $.ajax({
    url:"<?php echo base_url(); ?>AddmissionController/fetch_course_wise_faculty",
    method:"POST",
    data:{'course_id' : course_id , 'branch_id' : branch_id },
    success:function(data)
    {
     $('#faculty_id').html(data);
 
    }
   });
 });

 $('#course_orpackage').change(function(){
 
  var package_id = $('#course_orpackage').val();
  var branch_id = $('#branch_id').val();
 
   $.ajax({
    url:"<?php echo base_url(); ?>AddmissionController/fetch_package_wise_faculty",
    method:"POST",
    data:{'package_id' : package_id , 'branch_id' : branch_id },
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

$('#faculty_id').change(function(){
 
  //var branch_id = $('#branch_id').val();

  var faculty_id = $('#faculty_id').val();
 
   $.ajax({
    url:"<?php echo base_url(); ?>AddmissionController/fetch_batch_data",
    method:"POST",
    data:{ 'faculty_id' : faculty_id }, 
    success:function(data)
    {
     $('#batch_id').html(data);
 
    }
   });
 });

$('#course_orpackage').change(function(){
 
  var package_id = $('#course_orpackage').val();
 // alert(package_id);
    $.ajax({
   url:"<?php echo base_url(); ?>AddmissionController/getrecord_package",
   type:"POST",
   data:{ 'package_id' : package_id },	
   success:function(res){
   	$('#photos').html(res);
  var data = $.parseJSON(res);
  if(data.record==null){
     	//$('.source_class').show();

     // $('#email').val('');
     // $('#email_id').val('');
     $('#photos').val('');
    ;
    }else {
   	
   	console.log(data['record'].documents_id);
      $('#documents_id').val(data.record['documents_id']);
      $('#photos').val(data.record['photos']);

		}	
   }
  });
 });



}); 
</script>
<script>

$('.select_course_package').hide();
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



$('#course_orpackage').change(function(){
	var packageId = $('#course_orpackage').val();
	$.ajax({
		url : "<?php echo base_url(); ?>AddmissionController/GetInstallmentDetails",
		type :"post",
		data:{
			'packageId' : packageId
		},
		success:function(data){
			// console.log(data);
			var res = $.parseJSON(data);
			$('#tuation_fees').val(res.get_install.package_fees);
			$('#no_of_installment').val(res.get_install.installment);
			// var newrec =  res.record['get_install'];
			// console.log(newrec);
		}
	});
});

$('#course_orsingle').change(function(){
	var courseId = $('#course_orsingle').val();
	$.ajax({
		url : "<?php echo base_url(); ?>AddmissionController/GetInstallmentDetailssinglecourse",
		type :"post",
		data:{
			'courseId' : courseId
		},
		success:function(data){
			// console.log(data);
			var res = $.parseJSON(data);
			$('#tuation_fees').val(res.get_install.course_fees);
			$('#no_of_installment').val(res.get_install.installment);
			// var newrec =  res.record['get_install'];
			// console.log(newrec);
		}
	});
});


function make_installment_process(){
	$('#process_button').show();
	var packageId = $('#course_orpackage').val();
	var tution_fee =  $('#tuation_fees').val();
	var registration_fees =  $('#registration_fees').val();
	var noOfInstallment =  $('#no_of_installment').val();
	if(tution_fee == '' || registration_fees == ''){
		alert('please Enter Tution fees and Registration Fees');
		return false;
	}
	else{
		$.ajax({
		url : "<?php echo base_url(); ?>AddmissionController/GetInstall_with_registration",	
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


  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
	<!-- <script>
		$(".part").hide();
		$(document).ready(function(){
  			$("#hide").click(function(){
    			$(".part-1").hide();
    			$(".part").show();
  			});
  			$("#show").click(function(){
    			$(".part-1").show();
  			});
		});
	</script> -->

</body>
</html>