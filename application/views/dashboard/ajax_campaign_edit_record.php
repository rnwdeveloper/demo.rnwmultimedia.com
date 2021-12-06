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
    margin-top: 5px;
    padding: 0 1px;
}
/*.select2-container--default .select2-selection--multiple {
    line-height: 27px;
}*/
.select2-container {
    box-sizing: border-box;
    display: block; 
    width:100% !important;
    margin: 0;
    position: relative;
    vertical-align: middle;
    z-index: 9999999999;
}
.select2-container--default .select2-selection--multiple .select2-selection__rendered li {
    list-style: none;
    }
   
}
</style>

<div class="new_lead_info_fill" id="first_second_right_side">
	<h6 class="lead_fill_title"></h6>
  <input type="hidden"  class="form-control" id="upd_campaign_id"  value="<?php echo $list_campaign->campaign_id; ?>">
	<div class="form-group">
		<label>Campaign Name:<span style="color:red">*</span></label>
		<input type="text"  class="form-control" id="cam_name" placeholder="Campaign Name" value="<?php echo $list_campaign->campaign_name; ?>">
	</div>
	<div class="form-group">
		<label>Course:<span style="color:red">*</span></label>
		<select class="form-control" name="c_id" id="c_id">
       <option value="">Select course</option>
              <?php foreach($course_all as $ld) { ?>
              <option  <?php if($ld->course_id==@$list_campaign->course_id) { echo "selected"; } ?>
               value="<?php echo $ld->course_id; ?>"><?php echo $ld->course_name; ?></option>
            <?php } ?>  
    </select>
	</div>
	<div class="form-group">
		<label>Branch:<span style="color:red">*</span></label>
		<select class="form-control" name="b_id" id="b_id">
       <option value="">Select branch</option>
              <?php foreach($branch_all as $ld) { ?>
              <option  <?php if($ld->branch_id==@$list_campaign->branch_id) { echo "selected"; } ?>
               value="<?php echo $ld->branch_id; ?>"><?php echo $ld->branch_name; ?></option>
            <?php } ?>  
    </select>
	</div>	
	<div class="form-group">
		<label>Faculty:<span style="color:red">*</span></label>
		<select class="form-control" name="f_id" id="f_id">
       <option value="">Select faculty</option>
              <?php foreach($faculty_all as $ld) { ?>
              <option  <?php if($ld->faculty_id==@$list_campaign->faculty_id) { echo "selected"; } ?>
               value="<?php echo $ld->faculty_id; ?>"><?php echo $ld->name; ?></option>
            <?php } ?>  
    </select>
	</div>
	 
    <div class="form-group">
          <label>Campaign:<span style="color:red">*</span></label>
            <select class="select2 form-control custom-form-control" name="campaign_branch_id" id="campaign_branch_id" multiple="multiple">
              <option value="">Select campaign</option>
              <?php if('Centeral'==@$list_campaign->campaign || 'Marketing'==@$list_campaign->campaign) { ?>
             <option <?php  { echo "selected"; } ?> value="<?php echo @$list_campaign->campaign; ?>"><?php echo @$list_campaign->campaign; ?></option>
              <?php foreach($branch_all as $ld) { ?>
              <option  <?php if($ld->branch_id==@$list_campaign->campaign) { echo "selected"; } ?>
               value="<?php echo $ld->branch_id; ?>"><?php echo $ld->branch_name; ?></option>
            <?php } ?>
           <?php } else { ?>
               <option value="Marketing">Marketing </option>
              <option value="Centeral">Centeral</option>
                 <?php foreach($branch_all as $ld) { ?>
              <option  <?php if($ld->branch_id==@$list_campaign->campaign) { echo "selected"; } ?>
               value="<?php echo $ld->branch_id; ?>"><?php echo $ld->branch_name; ?></option>
            <?php } }?>
          </select>
      </div>
      <div class="form-group">
		<label>Counselor:<span style="color:red">*</span></label>
		<select class="form-control" name="couns_id" id="couns_id">
      <option value="">Select Counselor</option>
              <?php foreach($counselor_all as $ld) { ?>
              <option  <?php if($ld->user_id==@$list_campaign->counselor_id) { echo "selected"; } ?>
               value="<?php echo $ld->user_id; ?>"><?php echo $ld->name; ?></option>
            <?php } ?>
    </select>
	</div>
      <div class="form-group">
		<label>No Of Seet Limit:<span style="color:red">*</span></label>
		<input type="number"  class="form-control" id="no_of_seet_limits" min="0" value="<?php echo $list_campaign->no_of_seet_limit; ?>">
	</div>
	<div class="form-group">
    <label for="datepicker">Stating Date:<span style="color:red">*</span></label>
    <input  class="form-control datepickerone" id="start_dates" value="<?php echo $list_campaign->start_date; ?>">
  </div>
  <div class="form-group">
    <label for="datepicker">Ending Date:<span style="color:red">*</span></label>
    <input  class="form-control datepickertwo" id="end_dates" value="<?php echo $list_campaign->end_date; ?>">
  </div>
  <div class="form-group">
    <label> Remarks:<span style="color:red">*</span></label>
    <textarea   class="form-control" rows="5" id="remarkss" placeholder="Enter Remarks"  name="remarks"><?php echo $list_campaign->remarks; ?></textarea>
  </div>
  <div class="lead_save_btn">
	<div class="btn-group w-100">
		<button type="button" class="btn btn-danger">CANCEL</button>
		<button type="button" class="btn btn-success" id="upd_campaign">Update Campaign</button>
	</div>
</div>
</div>

 <script src="<?php echo base_url(); ?>dist/js/select2.full.min.js"></script>
    <script src="<?php echo base_url(); ?>dist/js/select2.min.js"></script>
<script type="text/javascript">
  $('.datepickerone').datepicker({
     weekStart: 1,
      daysOfWeekHighlighted: "6,0",
      autoclose: true,
      todayHighlight: true,
});

  $('.datepickertwo').datepicker({
     weekStart: 1,
      daysOfWeekHighlighted: "6,0",
      autoclose: true,
      todayHighlight: true,
});
</script>
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

    <script type="text/javascript">
   $('#upd_campaign').on('click', function() {
     var campaign_id = $('#upd_campaign_id').val();
     var campaign_name = $('#cam_name').val();
     var course_id = $('#c_id').val();
     var branch_id = $('#b_id').val();
     var faculty_id = $('#f_id').val();
     var campaign = $('#campaign_branch_id').val();
     var counselor_id = $('#couns_id').val();
     var no_of_seet_limit = $('#no_of_seet_limits').val();
     var start_date = $('#start_dates').val();
     var end_date = $('#end_dates').val();
     var remarks = $('#remarkss').val();
    

     $.ajax({
       type: "POST",
       url: "<?php echo base_url() ?>LeadlistController/campaign_record_upd",
       dataType: "JSON",
       data: {
         'campaign_id': campaign_id,
         'campaign_name': campaign_name,
         'course_id': course_id,
         'branch_id': branch_id,
         'faculty_id': faculty_id,
         'campaign': campaign,
         'counselor_id': counselor_id,
         'no_of_seet_limit': no_of_seet_limit,
         'start_date': start_date,
         'end_date': end_date,
         'remarks': remarks
         
       },
       success: function(data) {
         alert('Are You Sure This Data Updated Success');
       }
     });
     return false;
   });
 </script>