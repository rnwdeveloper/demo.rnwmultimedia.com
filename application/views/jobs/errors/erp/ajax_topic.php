<style type="text/css">
  h5{
    font-size: 16px;
  }
  .form-control{
    font-size: 12px;
  }
</style>
        <div class="modal-header">
        	<?php  foreach ($course_topic_record as $topic) { ?>
        	<?php } ?>
        <h5 class="modal-title"><b>Course Name :</b> <?php  $course_ids = explode(",",$topic->course_id);
              foreach($list_course as $row) { if(in_array($row->course_id,$course_ids)) {  echo  $row->course_name; }  } ?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-0">
        <section>
          <div style="margin-left: 23px;" id="delete_topic"></div>
    <div class="container-fluid">
        <div class="card">
  <div class="card-header">
    Course Topics
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <div class="table-responsive">
        <table id="example" class="table table-str iped">
  <thead>
    <tr>
      <th scope="col">SNo</th>
      <th scope="col">Course Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
     <?php $sno=1; foreach ($course_topic_record as $val) { ?>
   <tr>
     <td><?php echo $sno; ?></td>
     <td>
     	<?php echo $val->name; ?>
     </td>
     <td>
      <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#edits_modal" onclick="return get_sheet_ids(<?php echo $val->shining_sheet_id;?>)"><i class="fas fa-edit"></i></button>
      <button class="btn btn-sm btn-danger"  onclick="return delete_topic(<?php echo $val->shining_sheet_id;?>)"><i class="fas fa-trash"></i></button>
    </td>
   </tr>
   <?php $sno++; } ?>
  </tbody>
</table>                             
                                
    </blockquote>
  </div>
</div>
</div>    
  </section>
      </div>


      <!--------tipic edit model--------->

     <div class="modal fade" id="edits_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Topic Edit</b></h5>
        <div class="float-left" id="msg_topic"></div>
      </div>
      <div class="modal-body">
       <form>
    <input type="hidden"  class="form-control" id="sheet_id" >
  <div class="form-group">
  	<label for="exampleFormControlInput1"><b>Topic Name</b></label>
   <textarea class="form-control" cols="8" rows="8" id="topic_name"></textarea>
  </div>
  <div class="form-group">
  	<button type="button" class="btn btn-sm btn-success" id="topic_edit">Save</button>
  </div>
</form>
     </div>
    </div>
  </div>
</div>
      

<script>
function get_sheet_ids(shining_sheet_id='')
{
  $.ajax({
    url : "<?php echo base_url(); ?>AddmissionController/get_sheet_ids_wise_data",
    type : "post",
    data:{
       'shining_sheet_id' : shining_sheet_id
    },
    success:function(res)
    {
      var data = $.parseJSON(res);

     $('#sheet_id').val(data.record['shining_sheet_id']);
     $('#topic_name').val(data.record['name']);
    }
  });
}
</script>

<script type="text/javascript">
$('#topic_edit').on('click',function(){
var shining_sheet_id = $('#sheet_id').val();
var name = $('#topic_name').val();


$.ajax({
    type : "POST",
    url  : "<?php echo base_url()?>AddmissionController/edit_topic_course",
    data : {  
      'shining_sheet_id' : shining_sheet_id,
      'name' : name
    },
    success: function(resp)
    {
   		   var data = $.parseJSON(resp);
            var ddd = data['all_record'].status;
            if(ddd == '1')
            {
                $('#msg_topic').fadeIn();
                $('#msg_topic').html("<div class='btn btn-sm btn-success'><b style='color: white;'>This Topic Edited  Successfully</b></div>");
                $('#msg_topic').fadeOut(2000);
            }
            else if(ddd == '2')
            {
               $('#msg_topic').fadeIn();
                $('#msg_topic').html("<div class='btn btn-sm btn-danger'><b style='color: white;'>Someting Wrong!!</b></div>");
                $('#msg_topic').fadeOut(2000);
            }
    }
});
return false;
});

function delete_topic(shining_sheet_id='')
  {
    var conf =  confirm("Are You Sour This Topic Deleted");
    if(conf){
        $.ajax({
          url : "<?php echo base_url(); ?>AddmissionController/remove_topic_course",
          type :"post",
          data:{
            'shining_sheet_id' : shining_sheet_id
          },
          success:function(resp)
          {
            var data = $.parseJSON(resp);
            var ddd = data['all_record'].status;
            if(ddd == '1')
            {
                $('#delete_topic').fadeIn();
                $('#delete_topic').html("<div class='btn btn-sm btn-danger'><b style='color: white;'>This Topic Deleted  Successfully</b></div>");
                $('#delete_topic').fadeOut(2000);

                setTimeout(function() {
                location.reload();
                },2500);
            }
            else if(ddd == '2')
            {
               $('#delete_topic').fadeIn();
                $('#delete_topic').html("<div class='btn btn-sm btn-danger'><b style='color: white;'>Someting Wrong!!</b></div>");
                $('#delete_topic').fadeOut(2000);

                setTimeout(function() {
                location.reload();
                },2500);
            }
          }
        });
    }
  }
</script>	

