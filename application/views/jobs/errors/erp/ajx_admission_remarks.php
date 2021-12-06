<div class="new_lead_info_fill" id="first_third_right_side">
   <h6 class="lead_fill_title" id="lead_third_fill_title">Remarks*</h6>
   <?php 
      date_default_timezone_set("Asia/Calcutta");
      
      
      
        $remarks_date =  date('d/m/Y');
      
        $remarks_time =  date('h:i A');
      
       $addby =  $_SESSION['Admin']['username'];
      
      
      
      ?> 
   <input type="hidden" name="adm_id" id="adm_id" value="<?php echo $adm_get_record->admission_id; ?>" class="form-control">
   <input type="hidden" name="addby" id="addby" value="<?php if(isset($addby)){ echo $addby; } ?>" placeholder="Assigned To" class="form-control" />
   <input type="hidden" name="remarks_date" id="remarks_date" class="form-control"  value="<?php if(isset($remarks_date)){ echo $remarks_date; } ?>">
   <input type="hidden" name="remarks_time" id="remarks_time" class="form-control" value="<?php if(isset($remarks_time)){ echo $remarks_time; } ?>" >
   <div class="form-group">
      <label for="inputEmail4">Labels<span style="color:red">*</span></label>
      <select class="form-control" name="labels" id="labels">
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
      <select class="form-control" name="rating" id="rating">
         <option value="">Select Labels</option>
         <?php for($i=1;$i<=5;$i++){ ?>
         <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
         <?php } ?>
      </select>
   </div>
   <!-- <div class="form-group" id="next_follow_up_date12">
      <label>Next Followup Date</label>
      
      <input type="text" class="form-control" 
      
      id="next_followup_date"  name="next_followup_date">
      
      </div>
      
      
      
      <div class="form-group" id="next_follow_up_time12">
      
      <label>Next Followup Time</label>
      
      <input type="time" class="form-control" id="next_followup_time"  name="next_followup_time" datetime="hour">
      
      </div> -->
   <div class="form-group">
      <label> Remarks</label>
      <textarea   class="form-control" rows="8" id="admission_remrak" placeholder="Enter Remarks"  name="admission_remrak"></textarea>
   </div>
</div>
<div class="form-group">
   <button type="button" class="btn btn-success remark_btn" id="remarks_add">Save</button>
</div>
</form>
</div>
<div id="div-to-refresh">
   <div class="card" style="width: 17.5rem;" id="remarks_box">
      <div class="card-body">
         <p class="card-text">
         <table class="table table-sm">
            <thead>
               <tr class="sidetblth">
                  <th>S_No</th>
                  <th>Details</th>
                  <th>Remarks</th>
               </tr>
            </thead>
            <tbody>
               <?php  $sno=1; foreach($all_remarks as $val) { ?>
               <tr class="sidetbltd">
                  <td><?php echo $sno; ?></td>
                  <td><?php echo "<b>Date :</b><br>" .$val->remarks_date; ?> <br> <?php echo  $val->remarks_time; ?> <br><?php echo "<b>addby :</b><br>" .$val->addby; ?></td>
                  <td><?php echo $val->admission_remrak; ?></td>
               </tr>
               <?php $sno++; } ?>
            </tbody>
         </table>
         <div class="text-center">
         <button type="button" class="btn-sm btn-info " data-toggle="modal" data-target="#remarks_all">View All</button>
       </div>
         </p>
      </div>
   </div>
</div>

     <!-- Modal  -->
<div class="modal fade" id="remarks_all" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><b>All Remarks</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <style type="text/css">
          .checked 
          {
            color: orange;
          }
          .page-item.active .page-link 
          {
            z-index: 3;

            color: #fff;

            background-color: #0b527e;

            border-color: #0b527e;
         }
         .dataTables_filter
         {
           float:right;
         }
        </style>

       <table id="example" class="table table-bordered">
      <thead>
        <tr style="background-color:#0b527e;color: white;">
          <th scope="col">SRNO</th>
          <th scope="col">Remarks</th>
          <th scope="col">Labels</th>
          <th scope="col">Rating</th>
          <th scope="col">Date</th>
          <th scope="col">Time</th>
          <th scope="col">Addby</th>
        </tr>
      </thead>
      <tbody>
         <?php  $sno=1; foreach($all_admission_remarsk as $val) { ?>
        <tr>
          <td><?php echo $sno; ?></td>
          <td><?php echo $val->admission_remrak; ?></td>
          <td><?php echo $val->labels; ?></td>
          <td>
            <?php for($k=1;$k<=5;$k++) { ?>

                 <span class="fa fa-star <?php if($val->rating>=$k) { echo "checked"; } ?>"></span>

                 <?php } ?>
          </td>
          <td><?php echo $val->remarks_date; ?></td>
          <td><?php echo $val->remarks_time; ?></td>
          <td><?php echo $val->addby; ?></td>
        </tr>
        <?php $sno++; } ?>
      </tbody>
    </table>
      </div>
     <!--  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>




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
   
             url  : "<?php echo base_url()?>AddmissionController/ins_remarks",
   
             dataType : "JSON",
   
             data : {'adm_id' : adm_id , 'labels' : labels , 'rating' : rating , 'admission_remrak' : admission_remrak , 'remarks_date' : remarks_date , 'remarks_time' : remarks_time , 'addby' : addby },
   
             success: function(data){
              
               $("#admission_remrak").val("");
   
               //$('#div-to-refresh').html(data);
                //$('#div-to-refresh').load('erp/ajx_admission_remarks');
   
                 //$('#div-to-refresh').table.ajax.reload();
   
              // 
             }
   
         });
   
         return false;
   
     });
   
</script>