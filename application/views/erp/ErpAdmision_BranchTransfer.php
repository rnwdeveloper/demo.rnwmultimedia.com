<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">

<div class="col-md-12">
  <div class="card">
    <div class="card-body pl-0 pr-0">
    	<div id="transfer_msg"></div>
    	<input type="hidden" class="form-control" id="admission_id" value="<?php echo $get_admission_data->admission_id; ?>">
        <div class="form-group">
        <label>Branch :<span style="color: red;">*</span></label>
           <select class="form-control" id="branch_id" onchange="return getCoursesBranchTransfer()">
          <option value="">Select</option>
          <?php foreach($list_branch as $row) { ?>
            <option value="<?php echo $row->branch_id; ?>"><?php echo $row->branch_name; ?></option>
        <?php } ?>
     </select>
      </div>
      <div class="form-group">
        <label>Course :<span style="color: red;">*</span></label>
           <select class="form-control" id="course_id">
          <option value="">Select</option>
          <?php foreach($GetAll_AdmCourses as $row) { ?>
            <option value="<?php echo $row->course_id; ?>"><?php echo $row->course_name; ?></option>
        <?php } ?>
     </select>
      </div>
      <div class="form-group">
        <label>Batch :</span></label>
           <select class="form-control" id="batch_id">
          <option value="">Select</option>
     </select>
      </div>
       <div class="form-group">
        <label>Please Enter Reason For Transfer :<span style="color: red;">*</span></label>
       <textarea class="form-control" name="admission_remrak" id="admission_remrak"></textarea>
      </div>
    
      <input type="submit" class="btn btn-primary" id="transfer_add" value="Submit">
    </div>
  </div>
</div>

<script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>

<script>
 $(document).ready(function(){
$('#course_id').change(function(){
   //var branch_id = $('#branch_id').val();
   var stating_course_id = $('#course_id').val();
   var branch_id = $('#branch_id').val();
   
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
  
<script type="text/javascript">
   $('#transfer_add').on('click',function(){
   
   var admission_id = $('#admission_id').val();
   var branch_id = $('#branch_id').val();
   var course_id = $('#course_id').val();
   var batch_id = $('#batch_id').val();
   var admission_remrak = $('#admission_remrak').val();
   
   $.ajax({
   type : "POST",
   url  : "<?php echo base_url()?>Admission/ErpAdmission_Transfer",
   data : {'admission_id' : admission_id , 'branch_id' : branch_id , 'course_id' : course_id , 'batch_id' : batch_id ,'admission_remrak' : admission_remrak },
   
   success: function(resp)
   {
       var data = $.parseJSON(resp);
       var ddd = data['all_record'].status;
        if(ddd == '1')
        {
            $('#transfer_msg').html(iziToast.success({
                                                    title: 'Success',
                                                    timeout: 2500,
                                                    message: 'Batch Transfer.',
                                                    position: 'topRight'
                                                }));
                                                setTimeout(function() {
                                                    location.reload();
                                                }, 2520);
        }
        else
        {
            $('#transfer_msg').html(iziToast.error({
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
   

   function getCoursesBranchTransfer()
   {
     var branch_id = $("#branch_id").val();
     $.ajax({
      type : "POST",
      url : "<?php echo base_url() ?>Admission/getBranchWiseCourse",
      data:{
        'branch_id' : branch_id
      },
      success:function(data){
        $('#course_id').html(data);
      }
     });
   }
</script> 
</body> 


<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>