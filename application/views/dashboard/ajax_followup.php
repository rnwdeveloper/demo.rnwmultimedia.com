

<div class="new_lead_info_fill" id="addfollowup">
	<h6 class="lead_fill_title"></h6>
  <input type="hidden"  class="form-control" id="upd_campaign_id"  value="<?php echo $list_campaign->campaign_id; ?>">
	
  <div class="form-group">
    
<input type="text" name="mobile_no" id="mobile_no" placeholder="Serch ON Tab" class="form-control custom-form-control" onblur="check_mobile_no()" autofocus>
</div>
<hr>

<input type="hidden" id="lead_list_id">
<p><span style="color:gray">Name:</span>
 <b><span style='color:black' id="name"></span></b>
</p>

<p><span style="color:gray">Surname:</span>
 <b><span style='color:black' id="surname"></span></b>
</p>

<p><span style="color:gray">MobileNO:</span>
 <b><span style='color:black' id="m_no"></span></b>
</p>

<p><span style="color:gray">Email:</span>
 <b><span style='color:black' id="e_id"></span></b>
</p>

<p><span style="color:gray">Gender:</span>
 <b><span style='color:black' id="g_id"></span></b>
</p>

<p><span style="color:gray">Campaign Name:</span>
 <b><span style='color:black' id="c_name"></span></b>
</p>

<p><span style="color:gray">Channel:</span>
 <b><span style='color:black' id="c_id"></span></b>
</p>

<p><span style="color:gray">Source:</span>
 <b><span style='color:black' id="s_id"></span></b>
</p>

<p><span style="color:gray">School|Collage:</span>
 <b><span style='color:black' id="school_college_id"></span></b>
</p>

<p><span style="color:gray">Priority:</span>
 <b><span style='color:black' id="priority"></span></b>
</p>

<p><span style="color:gray">Reference Name:</span>
 <b><span style='color:black' id="reference_name"></span></b>
</p>

<p><span style="color:gray">Reference MobileNo:</span>
 <b><span style='color:black' id="reference_mobile_no"></span></b>
</p>

<p><span style="color:gray">Referred To:</span>
 <b><span style='color:black' id="referred_to"></span></b>
</p>

<p><span style="color:gray">Status:</span>
 <b><span style='color:black' id="status"></span></b>
</p>

<p><span style="color:gray">Followup Mode:</span>
 <b><span style='color:black' id="followup_mode"></span></b>
</p>

<p><span style="color:gray">Followup Status:</span>
 <b><span style='color:black' id="followup_status"></span></b>
</p>

<p><span style="color:gray">ExistingFollowup Mode:</span>
 <b><span style='color:black' id="existing_follow_up_mode"></span></b>
</p>

<p><span style="color:gray">NextFollowup Date:</span>
 <b><span style='color:black' id="next_followup_date"></span></b>
</p>

<p><span style="color:gray">Followup Remark:</span>
 <b><span style='color:black' id="followup_remark"></span></b>
</p>

<p><span style="color:gray">State:</span>
 <b><span style='color:black' id="state"></span></b>
</p>

<p><span style="color:gray">City:</span>
 <b><span style='color:black' id="city"></span></b>
</p>

<p><span style="color:gray">Area:</span>
 <b><span style='color:black' id="area"></span></b>
</p>

<p><span style="color:gray">Address:</span>
 <b><span style='color:black' id="address"></span></b>
</p>

<p><span style="color:gray">Branch:</span>
 <b><span style='color:black' id="bra_id"></span></b>
</p>

<p><span style="color:gray">Department:</span>
 <b><span style='color:black' id="department"></span></b>
</p>

<p><span style="color:gray">Course Package:</span>
 <b><span style='color:black' id="course_package"></span></b>
</p>

<p><span style="color:gray">course_or_package:</span>
 <b><span style='color:black' id="course_or_package"></span></b>
</p>

<p><span style="color:gray">Date Of Birth:</span>
 <b><span style='color:black' id="dob"></span></b>
</p>

<p><span style="color:gray">Alternate MobileNo:</span>
 <b><span style='color:black' id="alternate_mobile_no"></span></b>
</p>

<p><span style="color:gray">Father Name:</span>
 <b><span style='color:black' id="father_name"></span></b>
</p>

<p><span style="color:gray">Father MobileNo:</span>
 <b><span style='color:black' id="father_mobile_no"></span></b>
</p>

<p><span style="color:gray">Tenth Board:</span>
 <b><span style='color:black' id="tenth_board"></span></b>
</p>

<p><span style="color:gray">Tenth Percentage:</span>
 <b><span style='color:black' id="tenth_perc"></span></b>
</p>

<p><span style="color:gray">Father Name:</span>
 <b><span style='color:black' id="father_name"></span></b>
</p>

<p><span style="color:gray">Twelth Board:</span>
 <b><span style='color:black' id="tweth_board"></span></b>
</p>

<p><span style="color:gray">Twelth Percentage:</span>
 <b><span style='color:black' id="tweth_perc"></span></b>
</p>

<p><span style="color:gray">Degree:</span>
 <b><span style='color:black' id="degree"></span></b>
</p>

<p><span style="color:gray">Degree Percentage:</span>
 <b><span style='color:black' id="degree_perc"></span></b>
</p>

<p><span style="color:gray">Remarks:</span>
 <b><span style='color:black' id="any_remarks"></span></b>
</p>

<p><span style="color:gray">Lead Creation Date:</span>
 <b><span style='color:black' id="lead_creation_date"></span></b>
</p>

<p><span style="color:gray">Lead Modification Date:</span>
 <b><span style='color:black' id="lead_modification_date"></span></b>
</p>

<p><span style="color:gray">Next Action Date:</span>
 <b><span style='color:black' id="next_action_date"></span></b>
</p>

<p><span style="color:gray">Followup Status Yellow:</span>
 <b><span style='color:black' id="followup_status_yellow"></span></b>
</p>

<p><span style="color:gray">Followup Status Red:</span>
 <b><span style='color:black' id="followup_status_red"></span></b>
</p>

<p><span style="color:gray">Followup Status Green:</span>
 <b><span style='color:black' id="followup_status_green"></span></b>
</p>

<p><span style="color:gray">Lead List DuplicateId:</span>
 <b><span style='color:black' id="lead_list_dupli_id"></span></b>
</p>

<p><span style="color:gray">Next Action Date Update:</span>
 <b><span style='color:black' id="next_action_date_update"></span></b>
</p>

<p><span style="color:gray">Created By:</span>
 <b><span style='color:black' id="created_by"></span></b>
</p>

<p><span style="color:gray">Next Followup Date Only:</span>
 <b><span style='color:black' id="next_followup_date_only"></span></b>
</p>

<p><span style="color:gray">Next Followup Time Only:</span>
 <b><span style='color:black' id="next_followup_time_only"></span></b>
</p>
</div>

<div class="lead_save_btn">
  <div class="btn-group w-100">
    <button type="button" class="btn btn-danger">CANCEL</button>
    <button type="button" class="btn btn-success" id="add_record">ADD Record</button>
  </div>
</div>

<script>
  function check_mobile_no(){
  var search = $('#mobile_no').val();


  $.ajax({
   url:"<?php echo base_url(); ?>LeadlistController/GetRecord",
   type:"POST",
   data:{ 'mobile_no' : search },
   success:function(res){
    
  var data = $.parseJSON(res);  
    if(data.record==null){
      //$('.alternate_mobile_no').show();
     // $('#mobile_number').val();
     $('#name').html('');
     $('#surname').html('');
     $('#m_no').html('');
     $('#e_id').html('');
     $('#c_name').html('');
     $('#g_id').html('');
     $('#c_id').html('');
     $('#s_id').html('');
     $('#school_college_id').html('');
     $('#priority').html('');
     $('#reference_name').html('');
     $('#reference_mobile_no').html('');
     $('#referred_to').html('');
     $('#status').html('');
     $('#sub_status').html('');
     $('#followup_mode').html('');
     $('#followup_status').html('');
     $('#existing_follow_up_mode').html('');
     $('#next_followup_date').html('');
     $('#followup_remark').html('');
     $('#state').html('');
     $('#city').html('');
     $('#area').html('');
     $('#address').html('');
     $('#branch_id').html('');
     $('#department').html('');
     $('#course_package').html('');
     $('#course_or_package').html('');
     $('#dob').html('');
     $('#alternate_mobile_no').html('');
     $('#father_name').html('');
     $('#father_mobile_no').html('');
     $('#tenth_board').html('');
     $('#tenth_perc').html('');
     $('#tweth_board').html('');
     $('#tweth_perc').html('');
     $('#degree').html('');
     $('#degree_perc').html('');
     $('#any_remarks').html('');
     $('#lead_creation_date').html('');
     $('#lead_modification_date').html('');
     $('#next_action_date').html('');
     $('#followup_status_yellow').html('');
     $('#followup_status_red').html('');
     $('#followup_status_green').html('');
     $('#lead_list_dupli_id').html('');
     $('#next_action_date_update').html('');
     $('#created_by').html('');
     $('#next_followup_date_only').html('');
     $('#next_followup_time_only').html('');
    }
    else 
    {
   // $('#name').html(data.record['name']);
   // $('#course_or_package').html(data.record['course_or_package']);
   // $('#s_id').html(data.record['source_id']);
   // $('#bra_id').html(data.record['branch_id']);
   // $('#department').html(data.record['department']);
    if(data.record['lead_list_id']!='')
    {
       $('#lead_list_id').val(data.record['lead_list_id']);
    }
    else
    {
       $('#lead_list_id').val('');
    }
     
       $('#name').html(data.record['name']);
       $('#surname').html(data.record['surname']);
       $('#m_no').html(data.record['mobile_no']);
       $('#e_id').html(data.record['email']);
       $('#c_name').html(data.record['campaign_name']);
       $('#g_id').html(data.record['gender']);
       $('#c_id').html(data.record['channel_id']);
       $('#s_id').html(data.record['source_id']);
       $('#school_college_id').html(data.record['school_college_id']);
       $('#priority').html(data.record['priority']);
       $('#reference_name').html(data.record['reference_name']);
       $('#reference_mobile_no').html(data.record['reference_mobile_no']);
       $('#referred_to').html(data.record['referred_to']);
       $('#status').html(data.record['status']);
       $('#sub_status').html(data.record['sub_status']);
       $('#followup_mode').html(data.record['followup_mode']);
       $('#followup_status').html(data.record['followup_status']);
       $('#existing_follow_up_mode').html(data.record['existing_follow_up_mode']);
       $('#next_followup_date').html(data.record['next_followup_date']);
       $('#followup_remark').html(data.record['followup_remark']);
       $('#state').html(data.record['state']);
       $('#city').html(data.record['city']);
       $('#area').html(data.record['area']);
       $('#address').html(data.record['address']);
       $('#branch_id').html(data.record['branch_id']);
       $('#department').html(data.record['department']);
       $('#course_package').html(data.record['course_package']);
       $('#course_or_package').html(data.record['course_or_package']);
       $('#dob').html(data.record['dob']);
       $('#alternate_mobile_no').html(data.record['alternate_mobile_no']);
       $('#father_name').html(data.record['father_name']);
       $('#father_mobile_no').html(data.record['father_mobile_no']);
       $('#tenth_board').html(data.record['tenth_board']);
       $('#tenth_perc').html(data.record['tenth_perc']);
       $('#tweth_board').html(data.record['tweth_board']);
       $('#tweth_perc').html(data.record['tweth_perc']);
       $('#degree').html(data.record['degree']);
       $('#degree_perc').html(data.record['degree_perc']);
       $('#any_remarks').html(data.record['any_remarks']);
       $('#lead_creation_date').html(data.record['lead_creation_date']);
       $('#lead_modification_date').html(data.record['lead_modification_date']);
       $('#next_action_date').html(data.record['next_action_date']);
       $('#followup_status_yellow').html(data.record['followup_status_yellow']);
       $('#followup_status_red').html(data.record['followup_status_red']);
       $('#followup_status_green').html(data.record['followup_status_green']);
       $('#lead_list_dupli_id').html(data.record['lead_list_dupli_id']);
       $('#next_action_date_update').html(data.record['next_action_date_update']);
       $('#created_by').html(data.record['created_by']);
       $('#next_followup_date_only').html(data.record['next_followup_date_only']);
       $('#next_followup_time_only').html(data.record['next_followup_time_only']);
   
    }
   }
  });
 }
</script>

<script type="text/javascript">
   $('#add_record').on('click', function() {
     var campaign_id = $('#upd_campaign_id').val();
     var lead_list_id = $('#lead_list_id').val();
     var name = $('#name').html();
     var surname = $('#surname').html();
     var mobile_no = $('#m_no').html();
     var email = $('#e_id').html();
     var gender = $('#g_id').html();
     var channel_id = $('#c_id').html();
     var source_id = $('#s_id').html();
     var source_id = $('#s_id').html();
     var school_college_id = $('#school_college_id').html();
     var priority = $('#priority').html();
     var reference_name = $('#reference_name').html();
     var reference_mobile_no = $('#reference_mobile_no').html();
     var referred_to = $('#referred_to').html();
     var status = $('#status').html();
     var sub_status = $('#sub_status').html();
     var followup_mode = $('#followup_mode').html();
     var followup_status = $('#followup_status').html();
     var existing_follow_up_mode = $('#existing_follow_up_mode').html();
     var next_followup_date = $('#next_followup_date').html();
     var followup_remark = $('#followup_remark').html();
     var state = $('#state').html();
     var city = $('#city').html();
     var area = $('#area').html();
     var address = $('#address').html();
     var branch_id = $('#branch_id').html();
     var department = $('#department').html();
     var course_package = $('#course_package').html();
     var course_or_package = $('#course_or_package').html();
     var dob = $('#dob').html();
     var alternate_mobile_no = $('#alternate_mobile_no').html();
     var father_name = $('#father_name').html();
     var father_mobile_no = $('#father_mobile_no').html();
     var tenth_board = $('#tenth_board').html();
     var tenth_perc = $('#tenth_perc').html();
     var tweth_board = $('#tweth_board').html();
     var tweth_perc = $('#tweth_perc').html();
     var degree = $('#degree').html();
     var degree_perc = $('#degree_perc').html();
     var any_remarks = $('#any_remarks').html();
     var lead_creation_date = $('#lead_creation_date').html();
     var lead_modification_date = $('#lead_modification_date').html();
     var next_action_date = $('#next_action_date').html();
     var followup_status_yellow = $('#followup_status_yellow').html();
     var followup_status_red = $('#followup_status_red').html();
     var followup_status_green = $('#followup_status_green').html();
     var lead_list_dupli_id = $('#lead_list_dupli_id').html();
     var next_action_date_update = $('#next_action_date_update').html();
     var created_by = $('#created_by').html();
     var next_followup_date_only = $('#next_followup_date_only').html();
     var next_followup_time_only = $('#next_followup_time_only').html();
    
     $.ajax({
       type: "POST",
       url: "<?php echo base_url() ?>LeadlistController/campaign_crm_record",
       dataType: "JSON",
       data: {
         'campaign_id': campaign_id,
         'lead_list_id': lead_list_id,
         'name': name,
         'surname': surname,
         'mobile_no': mobile_no,
         'email': email,
         'gender': gender,
         'channel_id': channel_id,
         'source_id': source_id,
         'school_college_id': school_college_id,
         'priority': priority,
         'reference_name': reference_name,
         'reference_mobile_no': reference_mobile_no,
         'referred_to': referred_to,
         'status': status,
         'sub_status': sub_status,
         'followup_mode': followup_mode,
         'followup_status': followup_status,
         'existing_follow_up_mode': existing_follow_up_mode,
         'next_followup_date': next_followup_date,
         'followup_remark': followup_remark,
         'state': state,
         'city': city,
         'area': area,
         'address': address,
         'branch_id': branch_id,
         'department': department,
         'course_package': course_package,
         'course_or_package': course_or_package,
         'dob': dob,
         'alternate_mobile_no': alternate_mobile_no,
         'father_name': father_name,
         'father_mobile_no': father_mobile_no,
         'tenth_board': tenth_board,
         'tenth_perc': tenth_perc,
         'tweth_board': tweth_board,
         'tweth_perc': tweth_perc,
         'degree': degree,
         'degree_perc': degree_perc,
         'any_remarks': any_remarks,
         'lead_creation_date': lead_creation_date,
         'lead_modification_date': lead_modification_date,
         'next_action_date': next_action_date,
         'followup_status_yellow': followup_status_yellow,
         'followup_status_red': followup_status_red,
         'followup_status_green': followup_status_green,
         'lead_list_dupli_id': lead_list_dupli_id,
         'next_action_date_update': next_action_date_update,
         'created_by': created_by,
         'next_followup_date_only': next_followup_date_only,
         'next_followup_time_only': next_followup_time_only
       },
       success: function(data) {
         alert('Data Inserted Success');
       }
     });
     return false;
   });
 </script>