<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css"> 
<?php 
      date_default_timezone_set("Asia/Calcutta");
        $remarks_date =  date('d/m/Y');
        $remarks_time =  date('h:i A');
       $addby =  $_SESSION['Admin']['username'];
?> 
<div class="col-md-12">
  <div class="card">
    <div class="card-body pl-0 pr-0">
      <div id="admission_cancelled_msg"></div>
    	 <input type="hidden" name="adm_id" id="adm_id" value="<?php echo $adm_get_record->admission_id; ?>" class="form-control">
       <input type="hidden" name="addby" id="addby" value="<?php if(isset($addby)){ echo $addby; } ?>" placeholder="Assigned To" class="form-control" />
       <input type="hidden" name="remarks_date" id="remarks_date" class="form-control"  value="<?php if(isset($remarks_date)){ echo $remarks_date; } ?>">
       <input type="hidden" name="remarks_time" id="remarks_time" class="form-control" value="<?php if(isset($remarks_time)){ echo $remarks_time; } ?>" >
      <div class="form-group">
        <label>Labels :<span style="color: red;">*</span></label>
           <select class="form-control" name="labels" id="labels" required>
         <option value="">Select Labels</option>
         <option>General</option>
         <option>Fees</option>
         <option>Studies</option>
         <option>Punctuality</option>
         <option>Discipline</option>
      </select>
      </div>
      <div class="form-group">
      <label for="inputEmail4">Rating<span style="color:red">*</span></label>
      <select class="form-control" name="rating" id="rating" required>
         <option value="">Select Labels</option>
         <?php for($i=1;$i<=5;$i++){ ?>
         <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
         <?php } ?>
      </select>
    </div>
       <div class="form-group">
        <label>Remarks :<span style="color: red;">*</span></label>
       <textarea class="form-control" name="admission_remrak" id="admission_remrak" placeholder="Enter Remarks" required></textarea>
      </div>
    
      <input type="submit" class="btn btn-primary" id="remarks_add" value="Submit">
    </div>
  </div>
</div>

<div class="card p-3"> 
<div class="table-responsive">
  <table class="table table-bordered table-md">
    <tr class="text-center" style="background-color: #5864bd;color: white;">
     <th>S_No</th>
     <th>Remarks</th>
     <th>Details</th>
    </tr>
   <?php  $sno=1; foreach($all_remarks as $val) { ?>
    <tr class="text-center">
       <td><?php echo $sno; ?></td>
         <td><?php echo $val->admission_remrak; ?></td>
         <td><?php echo "<b>Date :</b><br>" .$val->remarks_date; ?> <br> <?php echo  $val->remarks_time; ?> <br><?php echo "<b>addby :</b><br>" .$val->addby; ?></td>
    </tr>
    <?php $sno++; } ?>
  </table>
  <div class="text-center">
    <button class="btn btn-primary" data-toggle="modal" data-target=".all_remarks_view" onclick="return view_all_remraks(<?php echo $adm_get_record->admission_id; ?>);">view All</button>                  
  </div>
</div> 
</div>

 
<script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>

<script type="text/javascript">
  $('#remarks_add').on('click',function(){

   var adm_id = $('#adm_id').val();  
   var labels = $('#labels').val();  
   var rating = $('#rating').val(); 
   var admission_remrak = $('#admission_remrak').val();
   var remarks_date = $('#remarks_date').val();
   var remarks_time = $('#remarks_time').val();
   var addby = $('#addby').val();

$.ajax({
type : "POST",
url  : "<?php echo base_url()?>Admission/posted_admission_remarks",
data : {'admission_id' : adm_id , 'labels' : labels , 'rating' : rating , 'admission_remrak' : admission_remrak , 'remarks_date' : remarks_date , 'remarks_time' : remarks_time , 'addby' : addby },
success: function(resp)
{
  var data = $.parseJSON(resp);
  var ddd = data['all_record'].status;
  if(ddd == '1')
  {
      $('#admission_remarks_msg').html(iziToast.success({
        title: 'Success',
        timeout: 2050,
        message: 'Successfully posted comment.',
        position: 'topRight'
      }));

      $.ajax({
        url: "<?php echo base_url(); ?>Admission/Erpadmission_remarks",
        type: "post",
        data: {
            'admission_id': adm_id
        },
        success: function(Resp) {
            $('.remarks_data').html(Resp);
        }
    });
  }

}

});

return false;

});
</script>
