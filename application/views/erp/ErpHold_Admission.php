<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
<div class="col-md-12">
  <div class="card">
    <div class="card-body pl-0 pr-0">
    	<div id="admission_hold_msg"></div>
    	<input type="hidden" class="form-control" id="admission_id" value="<?php echo $adm_get_record->admission_id; ?>">
  	 <div class="form-group">
        <label>Stating Date :<span style="color: red;">*</span></label>
        <input type="date" class="form-control" id="hold_stating_date">
      </div>
      <div class="form-group">
        <label>Ending Date :<span style="color: red;">*</span></label>
        <input type="date" class="form-control" id="hold_ending_date">
      </div>
      <!-- <div class="form-group" >
                  <label>Date From To </label> 
            <input type="hidden" id="fromdate" name="filter_from_date" value="<?php if(!empty($filter_from_date)) { echo @$filter_from_date; } ?>">
            <input type="hidden" id="todate" name="filter_to_date" value="<?php if(!empty($filter_to_date)) { echo @$filter_to_date; } ?>">
            <div id="reportrange">
            <i class="far fa-calendar-alt"></i>&nbsp;
                <span><?php if(!empty($filter_from_date) && !empty($filter_to_date)) { echo @$filter_from_date." - ".$filter_to_date; } ?></span> <i class="fa fa-caret-down"></i>
            </div>
         </div>  -->
      <div class="form-group">
        <label>Status :<span style="color: red;">*</span></label>
           <select class="form-control" id="dropdown_adm_id">
          <option value="">Select</option>
          <?php foreach($list_dropdown_adm as $ad) { ?>
            <option <?php  if($ad->d_adm_id=="4") { echo "selected"; } ?> value="<?php echo $ad->d_adm_id; ?>"><?php echo $ad->name; ?></option>
        <?php } ?>
     </select>
      </div>
       <div class="form-group">
        <label>Please Enter Reason For Hold :<span style="color: red;">*</span></label>
       <textarea class="form-control" name="admission_remrak" id="admission_remrak"></textarea>
      </div>
    
      <input type="submit" class="btn btn-primary" id="hold_admbtn" value="Submit">
    </div>
  </div>
</div>
 <!-- General JS Scripts -->
 <script src="<?php echo base_url(); ?>dist/assets/js/app.min.js"></script>   
  <!-- JS Libraies --> 
<script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/jquery.selectric.min.js"></script> 
<!-- Page Specific JS File -->

  <!-- Page Specific JS File -->
  <script src="<?php echo base_url(); ?>dist/assets/js/page/index.js"></script>
  <script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <!-- JS Libraies --> 
  <script src="<?php echo base_url(); ?>dist/assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="<?php echo base_url(); ?>dist/assets/js/custom.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>

<script type="text/javascript">
$(function() {


   var start1=moment().subtract(1, 'days');
    var end1=moment();

    
    var start=""
     var end=""
    
    

    function cb(start, end) {
        $('#fromdate').val(start.format('YYYY-MM-DD'));
        $('#todate').val(end.format('YYYY-MM-DD'));
        $('#reportrange span').html(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
    }

    $('#reportrange').daterangepicker({
        startDate: start1,
        endDate: end1,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);

});
</script>
<script type="text/javascript">
   $('#hold_admbtn').on('click',function(){
   
   var admission_id = $('#admission_id').val();
   var hold_stating_date = $('#hold_stating_date').val();
   var hold_ending_date = $('#hold_ending_date').val();
   var dropdown_adm_id = $('#dropdown_adm_id').val();
   var admission_remrak = $('#admission_remrak').val();
   
   $.ajax({
   type : "POST",
   url  : "<?php echo base_url()?>Admission/admission_Hold",
   data : {'admission_id' : admission_id , 'hold_stating_date' : hold_stating_date , 'hold_ending_date' : hold_ending_date , 'dropdown_adm_id' : dropdown_adm_id ,'admission_remrak' : admission_remrak },
   
   success: function(resp)
   {
       var data = $.parseJSON(resp);
       var ddd = data['all_record'].status;
        if(ddd == '1')
        {
            $('#admission_hold_msg').html(iziToast.success({
                                                          title: 'Success',
                                                          timeout: 2500,
                                                          message: 'HI Student! Your Admission Has Been Withhold For A Short Period Of Time.',
                                                          position: 'topRight'
                                                        }));
                                                        setTimeout(function() {
                                                            location.reload();
                                                        }, 2520);
        }
        else
        {
            $('#admission_hold_msg').html(iziToast.error({
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
   
</script> 
</body> 


<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>