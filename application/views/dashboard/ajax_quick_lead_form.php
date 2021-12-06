
<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Quick Add</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			
			<form  method="post" id="quick_lead_list_form" name="quick_lead_list_form">
				<?php if(isset($status)) { 
					if($status == '1') { ?>
						<div id="quick_lead_response" class="alert alert-success"><?php echo $msg; ?></div>
					<?php } else if($status == '2'){ ?>

						<div id="quick_lead_response" class="alert alert-warning"><?php echo $msg; ?></div>

					<?php } else if($status == '0'){ ?>

						<div id="quick_lead_response" class="alert alert-danger"><?php echo $msg; ?></div>
					<?php } } ?>

					
			<div class="modal-body">

				<div class="row">
					<div class="col-xl-6 col-lg-6">
						<div class="form-group">
						    <div><span><label for="FirstName">Full Name<i class="required">*</i></label><input type="text" maxlength="50" class="form-control" id="quick_name" placeholder="Full Name" name="quick_name" value="<?php if(isset($status)) { if($status=='2' ) { echo $record['name']; }}?>"></span></div>
						</div>
					</div>
					<div class="col-xl-6 col-lg-6">
						<div class="form-group">
							<label>Email</label>
							<input type="text" maxlength="100" class="form-control" id="quick_email" placeholder="Email" data-api-attached="true" name="quick_email" value="<?php if(isset($status)) { if($status=='2' ) { echo $record['email']; }}?>">
						</div>
					</div>
					<div class="col-xl-6 col-lg-6">
						<div class="form-group">
							<label>Mobile*</label>
							<input type="tel" maxlength="13" min="0" class="form-control" id="quick_mobile_no" placeholder="Mobile" data-api-attached="true" name="quick_mobile_no" value="<?php if(isset($status)) { if($status=='2' ) { echo $record['mobile_no']; }}?>">
						</div>
					</div>
					<div class="col-xl-6 col-lg-6">
						<div class="form-group">
							<label>Source*</label>
							<select class="form-control" id="quick_source_id" name="quick_source_id">
								<option value="">Select Source</option>
								<?php foreach($source_list as $sl) { ?>
									<option value="<?php echo $sl->source_id;  ?>" <?php if(isset($status)) { if($status=='2' ) { if($record['source_id']==$sl->source_id) { echo "selected"; }} } ?>><?php echo $sl->source_name; ?></option>
								<?php } ?>
								
							</select>
						</div>
					</div>
					<div class="col-xl-6 col-lg-6">
						<div class="form-group">
							<label>Branch*</label>
							<select class="form-control" id="quick_branch_id" name="quick_branch_id" onchange="return get_department_record()">
								<option value=''>Select Branch</option>
								<?php foreach($list_branch as $lb) {  ?>
									<option value="<?php echo $lb->branch_id; ?>"><?php echo $lb->branch_code; ?></option>
								<?php } ?>
								
							</select>
						</div>
					</div>
					<div class="col-xl-6 col-lg-6">
						<div class="form-group" id="department_data_quick">
							<label>Department*</label>
							<select class="form-control" id="quick_department_id" name="quick_department_id">
								<option value="">Select Department</option>
								<?php foreach($list_department as $ld) { ?>
									<option value="<?php echo $ld->department_id; ?>"><?php echo $ld->department_name; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>

					<div class="col-xl-6 col-lg-6">
						<div class="form-group">
							<label>Select Course Package</label><br>
							<input type="radio" maxlength="50"  id="quick_course_package"  name="quick_course_package"  value="package" checked 
											onclick="return get_course_package_quick('package')">Package
							<input type="radio" maxlength="50" id="quick_course_package"  name="quick_course_package"  value="single"  onclick="return get_course_package_quick('single')">Single
						</div>
					</div>
					<div class="col-xl-6 col-lg-6">
						<div class="form-group" id="select_course_package_quick">
							<label>Course*</label>
							<select class="form-control" id="quick_package" name="quick_package">
								<option value="">Select Package</option>
								<?php foreach($list_package as $lp) { ?>
									<option value="<?php echo $lp->package_id; ?>"><?php echo $lp->package_name; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="col-xl-12">
						<div class="form-group">
							<label>Remarks</label>
							<textarea class="form-control" rows="3" placeholder="Remarks" id="quick_remark" name="quick_remark"></textarea>
						</div>
					</div>
					<div class="col-xl-6">
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="checkbox" id="quick_send_email" name="quick_send_email" value="send email" checked="checked" >
						  <label class="form-check-label" for="inlineCheckbox1">Send Welcome Email</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="checkbox"id="quick_send_sms" name="quick_send_sms" value="send sms" checked="checked">
						  <label class="form-check-label" for="inlineCheckbox2">Send Welcome Sms</label>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
                <input type="submit" name="submit" value="submit" class="btn btn-primary">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
		</div>



<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
// just for the demos, avoids form submit
$(document).ready(function(){
$( "#quick_lead_list_form" ).validate({
  rules: {
    quick_name: {
      required: true,
      minlength : 2
    },
    quick_email :{
    	required : true,
    	email : true
    },
    quick_mobile_no : {
    	required :true,
    	number : true,
    	minlength :10,
    	maxlength :10
    },
    quick_source_id :{
    	required : true,
    },
    quick_branch_id :{
    	required : true,
    },
    quick_department_id : {
    	required :true,
    },
    quick_package :{
    	required :true
    },
    quick_remark :{
    	required : true,
    }
  },
  messages:{
  	quick_name:{
  		required : "<span style='color:red'>Please Enter Name</span>",
  		minlength : "<span style='color:red'>Minimum 2 characters required</span>"
  	},
  	quick_email : {
  		required : "<span style='color:red'>Please enter Email id</span>",
  		email : "<span style='color:red'>Please enter Valid Email Id</span>"
  	},
  	quick_mobile_no : {
  		required : "<span style='color:red'>Please Enter Mobile Number</span>",
  		number : "<span style='color:red'>Number is Required</span>",
  		minlength : "<span style='color:red'>Please Enter minimum 10 Digits</span>",
  		maxlength : "<span style='color:red'>Please Enter Maximum 10 digits</span>"
  	},
  	quick_source_id :{
  		required : "<span style='color:red'>Please select Source</span>",
  	},
  	quick_branch_id :{
  		required : "<span style='color:red'>Please select Branch</span>",	
  	},
  	quick_department_id : {
  		required : "<span style='color:red'>Please select Department</span>",
  	},
  	quick_package :{
  		required : "<span style='color:red'>Please select Course Package</span>", 
  	},
  	quick_remark :{
  		required : "<span style='color:red'>Please Enter Remarks</span>",
  	}
  },
   submitHandler: function() { 
   			event.preventDefault();
   			var form_data = $('#quick_lead_list_form').serialize(); //Encode form elements for submission
			// var form_data = $(this).serialize(); //Encode form elements for submission
			$.ajax({

				url : "<?php echo base_url() ?>LeadlistController/quick_lead_form",
				type: "post",
				data : form_data,
				success:function(res)
				{
					
					$('#lead_form_record_result').html(res);
					
					
				}
			});
   }
});

});

$('#quick_lead_response').fadeOut(2000);

</script>