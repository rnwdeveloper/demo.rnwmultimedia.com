
<style>
  .thcs{
    background-color: #0b527e;
  color: white;
  font-size: 14px;
  }
  .tdcs{
    font-size: 12px;
  color: black;
  }
</style>

<div class="modal-header">
<h5 class="modal-title"><b>Not Assigned Batches List</b></h5>
 <div class="float-left" id="assigned_batch_msg"></div>
<div class="btn-group">
	
</div>
</div>
<div class="modal-body">
  <button class="btn btn-sm btn-success" id="all_batches">AssignedAll</button>
<table id="example" class="table table-str iped">
<thead>
  <tr class="thcs">
    <th scope="col"><input type="checkbox" id="batch_allcheck"> SNo</th>
    <th scope="col">GR ID</th>
    <th scope="col">Name</th>
    <th scope="col">Email</th>
    <th scope="col">Course</th>
    <th scope="col">Action</th>
  </tr>
</thead>
<tbody>
<tr class="tdcs">
  <?php $nb = 1; 
  foreach ($not_assigned_batch_list as $val) { if($val->batch_id=='') { if(@$match_data->branch_id==$val->branch_id) { ?>
  <td>
  <input type="checkbox"  class="batch_check"><?php echo $nb; ?>
  <input type="hidden" id="batches_ids" class="form-control" value="<?php echo  @$match_data->batches_id; ?>"> 
  <input type="hidden" class="form-control" id="batch_all" value="<?php echo @$match_data->course_id; ?>"> 
  </td>
  <td><?php echo $val->gr_id; ?></td>
  <td><?php echo $val->first_name; ?> <?php echo $val->surname; ?></td>
  <td><?php echo $val->email; ?></td>
  <td>
      <?php $branch_ids = explode(",",$val->courses_id);   
      foreach($list_course as $row) { if(in_array($row->course_id,$branch_ids)) {  echo $row->course_name; }  } ?>
  </td>
  <td>
    <a  onclick="return not_assigned_batches(<?php echo $val->admission_courses_id;?>,<?php echo  @$match_data->batches_id; ?>,<?php echo  @$val->admission_id; ?>)" title="Assign Batch"><i class="fas fa-plus" style="font-size:15px;color:red;"></i></a>
  </td>
</tr>
<?php  $nb++; } } } ?>
</tbody>
</table> 
</div>
<div class="modal-footer">
<button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Close</button>
</div>

 <script type="text/javascript">

 function not_assigned_batches(admission_courses_id='',batch_id='',admission_id=''){
    $.ajax({
      url : "<?php echo base_url(); ?>AddmissionController/not_assigned_batch_assign",
      type:"post",
      data:{
        'admission_courses_id':admission_courses_id , 'batch_id':batch_id , 'admission_id':admission_id 
      },
      success:function(resp)
      {
            var data = $.parseJSON(resp);
            var ddd = data['all_record'].status;
            if(ddd == '1')
            {
                $('#assigned_batch_msg').fadeIn();
                $('#assigned_batch_msg').html("<div class='btn btn-success'><b style='color: white;'>Successfully Assigned Batch</b></div>");
                $('#assigned_batch_msg').fadeOut(2300);

                setTimeout(function() {
                    location.reload();
                }, 2500);

            }
            else if(ddd == '2')
            {
               $('#assigned_batch_msg').fadeIn();
                $('#assigned_batch_msg').html("<div class='btn btn-danger'><b style='color: white;'>Someting Wrong!!</b></div>");
                $('#assigned_batch_msg').fadeOut(2300);

                setTimeout(function() {
                    location.reload();
                }, 2500);
            }
      }
    });
    return false;
  }


$('#all_batches').on('click', function() {
     var course_id = $('#batch_all').val();
     var batches_id = $('#batches_ids').val();

     $.ajax({
       type: "POST",
       url: "<?php echo base_url() ?>AddmissionController/multiple_batch",
       data: {
         'course_id' : course_id , 'batches_id': batches_id
         
       },
       success: function(resp) 
       {
            var data = $.parseJSON(resp);
            var ddd = data['all_record'].status;
            if(ddd == '1')
            {
                $('#assigned_batch_msg').fadeIn();
                $('#assigned_batch_msg').html("<div class='btn btn-success'><b style='color: white;'>Successfully Assigned All Batch</b></div>");
                $('#assigned_batch_msg').fadeOut(2300);

                setTimeout(function() {
                    location.reload();
                }, 2500);
            }
            else if(ddd == '2')
            {
                $('#assigned_batch_msg').fadeIn();
                $('#assigned_batch_msg').html("<div class='btn btn-danger'><b style='color: white;'>Someting Wrong!!</b></div>");
                $('#assigned_batch_msg').fadeOut(2300);

                setTimeout(function() {
                    location.reload();
                }, 2500);
            }
       }
     });
     return false;
   });
</script>

<script type="text/javascript">
  
  $(document).ready(function(){
    $('#batch_allcheck').click(function(){
        if($(this).is(":checked"))
        {
            $('.batch_check').each(function(){
                $(this).prop('checked',true);
            });
        }
        else
        {
            $('.batch_check').each(function(){
                $(this).prop('checked',false);
            });
        }
    });
  });
</script>