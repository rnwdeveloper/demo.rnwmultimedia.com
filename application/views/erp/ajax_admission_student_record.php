<link rel="stylesheet" href="<?php echo base_url(); ?>admission/dropdownmutliple/dist/css/bootstrap-select.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>admission/dropdownmutliple/dist/css/bootstrap-select.min.css">
<style type="text/css">
.t1{
    background-color: #0b527e;
    color: white;
    font-size: 14px;
    font: center;
   }
   .td1{
  font-size: 12px;
  font: center;
  color: black;
}

</style>

<div class="modal-header">
					<h5 class="modal-title"><b>Admission Details</b></h5>
					<div class="btn-group">
						<!-- <button type="button" class="btn btn-primary btn-sm" data-toggle="collapse" data-target="#edit_demo_show">Edit admission </button>
						<button type="button" class="btn btn-danger btn-sm" >Discard</button>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button> -->
					</div>
				</div>
				<div class="modal-body">
					<!-- <div class="demo_student_datails_block d-inline-block position-relative w-100">
						<div class="demo_details_block collapse" id="edit_demo_show">
							<div class="edit_demo_block d-inline-block w-100 position-relative border">
								<div class="row">
									<div class="col-lg-12">
										 
										<div class="demo_edit_title">
											<span>Edit Demo</span>
										</div>
									</div>
									
													
												</div>
											</div>
										</div>
									</div>
								</div> -->
							
							<div class="card" style="width: 67rem;">
							  <div class="card-body">
							    <!-- <h5 class="card-title"></h5> -->
							    <!-- <h6 class="card-subtitle mb-2 text-muted"></h6> -->
							    <p class="card-text">
								<div class="row">
		      			<div class="col-sm-2">
		                <div class="form-group">
		                  <img src="<?php echo base_url(); ?>dist/admimages/<?php echo $adm_record->file_name;  ?>" name="aboutme" width="100" height="100" border="1" class="rounded-circle"><br>
		      
		                <a style="margin-left: 40px;" href="" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-edit" style="font-size:20px;color:#0b527e;"></i></a> 
		            </div>
		          </div>
		              <div class="col-sm-3">
		                <div class="form-group">

		                 <data><b>Gr Id </b><span class="student_demo_id badge"><?php if(isset($adm_record->gr_id)) { echo $adm_record->gr_id; } ?></span></data>
		              <!-- <span>
		            <b>Name :</b> <?php echo @$adm_record->surname; ?> <?php echo @$adm_record->first_name; ?></span> -->
		             <!-- <a  href="" data-toggle="modal" data-target="#exampleModalll"><i class="fa fa-edit" style="font-size:18px;color:#0b527e;"></i></a> -->
		            <br><br>

		            <span><b>Email :</b> <?php echo @$adm_record->email; ?></span><br><br>
		            <span><b>Contact :</b> <?php echo @$adm_record->mobile_no; ?></span>
		            </div>
		          </div>
		            <div class="col-sm-3">
		              <div class="form-group">
		                
		                <span>
		            <b>Name :</b> <?php echo @$adm_record->surname; ?> <?php echo @$adm_record->first_name; ?></span>
		                <br><br>
		            <span><b>Brnach :</b> <?php $branch_ids = explode(",",$adm_record->branch_id);   
		                        foreach($list_branch as $row) { if(in_array($row->branch_id,$branch_ids)) {  echo $row->branch_name; }  } ?>
		            </span><br><br>
		            <span><b>Addby :</b> <?php echo @$adm_record->addby; ?></span>
		          </div>
		        </div>
		        <div class="col-sm-3">
		              <div class="form-group">
		                <span><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo @$adm_record->admission_date; ?></span> 
		                <span><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo @$adm_record->admission_time; ?></span><br><br>
		               <span><b>Reg Id :</b> <?php echo" RNW /Year ".''. @$adm_record->year;?>/<?php echo @$adm_record->admission_number; ?></span><br><br>
		            <span><b>Source Type :</b> <?php echo @$adm_record->source_id; ?>
		            </span><br>   
		            
			          </div>
			        </div>
			        
			        </div>
							    </p>
							   <!--  <a href="#" class="card-link">Card link</a>
							    <a href="#" class="card-link">Another link</a> -->
							  </div>
							</div>
						<div class="demo_details_block mt-3">
							<div class="row">
								<div class="col-xl-11 mx-auto">
									<ul class="nav nav-tabs">
									  <li class="nav-item">
									    <a class="nav-link active" data-toggle="tab" href="#demo_ramark">Courses</a>
									  </li>
									  <li class="nav-item">
									    <a class="nav-link" data-toggle="tab" href="#demo_attendance">Payments</a>
									  </li>
									  <li class="nav-item">
									    <a class="nav-link" data-toggle="tab" href="#demo_follow_up">Remark</a>
									  </li>
									</ul>
									<div class="tab-content" id="myTabContent">

									  <div class="tab-pane fade show active" id="demo_ramark">
									  	
									  	<div>
									  		<h3 class="demo_student_details_heading mb-3">
									  		<?php if(empty($adm_record->course_id)) {?>
										    <label>Course Package : <?php $branch_ids = explode(",",$adm_record->package_id);   
										                        foreach($list_package as $row) { if(in_array($row->package_id,$branch_ids)) {  echo $row->package_name; }  } ?></label>
										                      <?php } ?>
										    <?php if(empty($adm_record->package_id)) {?>
										    <label>Single Course : <?php $branch_ids = explode(",",$adm_record->course_id);   
										                        foreach($list_course as $row) { if(in_array($row->course_id,$branch_ids)) {  echo $row->course_name; }  } ?></label>
										                      <?php } ?>
									  		</h3>
									  	</div>
									  <div class="table-responsive">
					                  <table class="table  table-str iped create_responsive_table">
									  	    <tr class="t1">
									  	    	<th>S_No</th>
							                    <th>Course</th>
							                    <th>Student / Shining Sheet</th>
							                    <th>Download</th>
									  	    </tr>
									  	    <tr>
									  	   <?php  $sno=1; foreach($admission_courses as $val) { ?>                  
							                  <tr class="td1">
							                    <td>
							                   <?php echo $sno; ?>
							                  </td>
							                    <td>
							                      <?php $branch_ids = explode(",",$val->courses_id);   
							                        foreach($list_course as $row) { if(in_array($row->course_id,$branch_ids)) {  echo $row->course_name; }  } ?>
							                          
							                    </td>
									  	    	<td><a type="button"  data-toggle="modal" data-target="#exampleModals" onclick="return get_shiningsheet_record(<?php echo $val->courses_id;?>,<?php echo $val->admission_courses_id; ?>)">
						                            <i class="fa fa-eye" style="font-size:25px;color:#0b527e;"></i>
						                          </a></td>
									  	    	<td></td>
										  	</tr>
										  	<?php $sno++; }?>
							  	         </table>
									  	</div>
									  </div>
									  <div class="tab-pane fade" id="demo_attendance">
									  	  <div class="table-responsive">
                                          <table class="table table-str iped create_responsive_table">
									  	    <tr class="t1">
									  	    	<th>S_No</th>
							                    <th>Installment Date</th>
							                    <th>Due Amount(₹)</th>
							                    <th>Paid Amount(₹)</th>
									  	    </tr>
									  	    <tr>
									  	   <?php  $sno=1; foreach($adm_instalment as $val) { ?>                  
							                  <tr class="td1">
							                    <td><?php echo $sno; ?></td>
							                    <td><?php echo $val->installment_date; ?></td>
									  	    	<td><?php echo $val->due_amount; ?></td>
									  	    	<td><?php echo $val->paid_amount; ?></td>
										  	</tr>
										  	<?php $sno++; }?>
							  	         </table>
									  	</div>
									  </div>
									  <div class="tab-pane fade" id="demo_follow_up">
									  	<div class="mb-3 d-inline-block w-100">
									  		<h3 class="demo_student_details_heading d-inline-block mb-0 align-sub">Admission Remark</h3>
									  		<button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#remks">Add Remark</button>
									  		<div style="padding-top: 10px;"></div>
									  		<div class="table-responsive">
									        <table class="table table-str iped create_responsive_table">
									  	    <tr class="t1">
									  	    	<th>S_No</th>
							                    <th>Date-Time</th>
							                    <th>Label</th>
							                    <th>Remarks</th>
							                    <th>Rating</th>
							                    <th>Addby</th>
									  	    </tr>
									  	    <tr>
									  	   <?php $sno=1; foreach($list_remark as $val) { ?>                  
							                  <tr class="td1">
							                    <td><?php echo $sno; ?></td>
							                    <td>
							                      <?php echo $val->remarks_date; ?><br>
							                      <?php echo $val->remarks_time; ?>
							                    </td>
							                    <td><?php echo  $val->labels; ?></td>
							                    <td>
							                    <?php echo $val->admission_remrak; ?>
							                    </td>
							                    <td><?php echo $val->rating; ?></td>
							                    <td>
							                    <?php echo $val->addby; ?>
							                    </td>
										  	</tr>
										  	<?php $sno++; }?>
							  	         </table>
									  	</div>
									  	</div>
									  </div>
									</div>
								</div>
							</div>
						</div>

<style type="text/css">
	.img-responsive{
  display: block;
  max-width: 100%;
  height: auto;
}
.form{
    border: 0;
}
</style>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><b>Image Upload</b></h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body">
       <form id="submit">
          <div class="form-group">
                    <input type="hidden" name="admission_id" id="admission_id" value="<?php echo @$adm_record->admission_id; ?>" >
                </div>

                <div class="form-group">
                  <label for="exampleFormControlFile1"><b>Upload Photo:</b></label>
                  <input type="file" class="form-control-file" name="file" id="file" required>
                </div>
               <div class="form-group">
                    <button class="btn btn-success" id="btn_upload" type="submit">Upload</button>
                </div>
              
             </form>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div> -->
    </div>
  </div>
</div>

<!-- shiningSheet model -->

<div class="modal fade" id="exampleModals" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="max-width: 800px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Shining Sheet</b></h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body" id="get_shiningsheet">
    
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div> -->
    </div>
  </div>
</div>

<!-- Remarks -->

<!-- Modal -->
<div class="modal fade" id="remks" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><b>Admission Remark</b></h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <?php 
                        date_default_timezone_set("Asia/Calcutta");

                          $remarks_date =  date('d/m/Y');
                          $remarks_time =  date('h:i A');
                         $addby =  $_SESSION['Admin']['username'];

                       ?> 
      <div class="modal-body">
       <form method="post">
            <input type="hidden" name="adm_ids" id="adm_ids" class="form-control" value="<?php echo @$adm_record->admission_id; ?>">
            <input type="hidden" name="addby" id="addby" value="<?php if(isset($addby)){ echo $addby; } ?>" placeholder="Assigned To" class="form-control" />
           <input type="hidden" name="remarks_date" id="remarks_date" class="form-control"  value="<?php if(isset($remarks_date)){ echo $remarks_date; } ?>">
           <input type="hidden" name="remarks_time" id="remarks_time" class="form-control" value="<?php if(isset($remarks_time)){ echo $remarks_time; } ?>" >
            
           <div class="form-row">
          <div class="form-group col-sm-6">
                  <label for="inputEmail4"><b>Labels :*</b></label>
                   <select class="form-control" name="labels" id="labels">
                           <option value="">Select Labels</option>
                              <option>General</option>
							  <option>Fees</option>
							  <option>Studies</option>     
							  <option>Punctuality</option>     
							  <option>Discipline</option>     
                        </select>
                </div>
                <div class="form-group col-sm-6">
                  <label for="inputEmail4"><b>Rating :*</b></label>
                   <select class="form-control" name="rating" id="rating">
                           <option value="">Select Labels</option>
                             <?php for($i=1;$i<=5;$i++){ ?>
                              <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php } ?>
                        </select>
                </div>
           <div class="form-group col-md-12 form_validation">
            <label for="firstname"><b>Remarks:</b></label>
            <textarea name="admission_remrak" id="admission_remrak" class="form-control" ></textarea>
          </div>
          <div class="form-group col-md-2">
            <button type="button" id="btn_ins" class="btn btn-success">Save</button>
          </div>
        </div>
      </form>
      </div>
      
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        <button type="button" id="btn_ins" class="btn btn-success">Save</button>
      </div> -->
    </div>
  </div>
</div>

	<script src="<?php echo base_url(); ?>admission/dropdownmutliple/dist/js/bootstrap-select.js"></script> 
<script src="<?php echo base_url(); ?>admission/dropdownmutliple/dist/js/bootstrap-select.min.js"></script>

	<script type="text/javascript">
         $(document).ready(function(){
 
        $('#submit').submit(function(e){
            e.preventDefault(); 
                 $.ajax({
                     url:'<?php echo base_url();?>AddmissionController/do_upload',
                     type:"post",
                     data:new FormData(this),
                     processData:false,
                     contentType:false,
                     cache:false,
                     async:false,
                      success: function(data){
                          alert("Are You Sure This Image Upload");
                          $("#admission_id").val("");
                          $("#file").val("");
                   }
                 });
            });
         
 
    });
    </script>

     <script type="text/javascript">

 function get_shiningsheet_record(course_id='',admission_courses_id=''){
    $.ajax({
      url : "<?php echo base_url(); ?>AddmissionController/ajax_shiningsheet_data",
      type:"post",
      data:{
        'course_id':course_id , 'admission_courses_id':admission_courses_id
      },
      success:function(Resp){
        $('#get_shiningsheet').html(Resp);
      }
    });
  }
</script>

<script type="text/javascript">
      $('#btn_ins').on('click',function(){
            var adm_ids = $('#adm_ids').val();
            var labels = $('#labels').val();
            var rating = $('#rating').val();
            var admission_remrak = $('#admission_remrak').val();
            var remarks_date = $('#remarks_date').val();
            var remarks_time = $('#remarks_time').val();
            var addby = $('#addby').val();
            
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url()?>AddmissionController/ins_remarks",
                dataType : "JSON",
                data : {'adm_ids' : adm_ids , 'labels' : labels , 'rating' : rating , 'admission_remrak' : admission_remrak , 'remarks_date' : remarks_date , 'remarks_time' : remarks_time , 'addby' : addby },
                success: function(data){
                  // $('#exampleModal').modal().hide();
                  //$("#admission_id").val("");
                  $("#admission_remrak").val("");

                  alert('Are You Sure This Remarks Inserted');
                }
            });
            return false;
        });
    </script>				
<script>

	function submit_demo_edit()
	{
		var name = $('#name').val();
		var mobileNo = $('#mobileNo').val();
		var demoDate = $('#date_selected').val();
		var branch_id = $('#branch_id').val();
		 var course_type = $("input[name='course_type']:checked").val();
		var department = $('#department').val();
		var courseName = $('#courseName').val();
		var packageName = $('#packageName').val();
		var faculty = $('#faculty').val();
		var fromTime = $('#fromTime').val();
		var toTime = $('#toTime').val();
		var demoId = $('#demo_id').val();
	 	if(fromTime == '')
	 	{
	 		alert("enter FromTime for student");
	 		return false;
	 	}
	 	else if(toTime == '')
	 	{
	 		alert("enter toTime for students");
	 		return false;
	 	}
	 	else
	 	{
	 		$.ajax({
	 			url : "<?php echo base_url(); ?>welcome/edit_demo_students",
	 			type : "POST",
	 			data :{
	 				'demoDate'			: demoDate,
	 				'name'				: name,
	 				'mobileNo'			: mobileNo,
	 				'branch_id'			: branch_id,
	 				'demo_course_type'	: course_type,
	 				'courseName'		: courseName,
	 				'department'		: department,
	 				'packageName'		: packageName,
	 				'faculty_id'		: faculty,
	 				'fromTIme'			: fromTime,
	 				'toTime'			: toTime,
	 				'demo_id'			: demoId 
	 			},
	 			success:function(Response)
	 			{
	 				$('#msgAlert').html("Successfully Updated Demo");
	 				$('#demo_update_record').html(Response);
	 			}
	 		});
	 	}
	}




 </script>

