<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">
 <section class="section">
          <div class="section-body">
             <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Pending Batch</h4>
                    <div class="card-header-action">
                     <button class="btn btn-info" id="all_batches_pending"><i class="fas fa-check-circle"> </i> All</button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div id="pending_batch_msg"></div>
                    <div class="table-responsive">
                      <table class="table table-striped pendingstudent normal-table w-100" id="example_pending">
                        <thead>
                        <tr class="text-center">
                          <th class="p-2">
                            <div class="custom-checkbox custom-checkbox-table custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad"
                                class="custom-control-input" id="allcheck">
                              <label for="allcheck" class="custom-control-label">&nbsp;</label>
                            </div>
                          </th>
                          <th>SN</th>
                          <th>GR ID</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Course</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <?php $nb = 1; 
                        foreach ($pending_batch_student as $val) { if($val->batch_id=='') {
                          if($val->without_fees_modifive=="0") { if(@$match_data->branch_id==$val->branch_id) { if(@$val->admission_courses_status=="Pending") { ?>
                        <tr class="text-center">
                          <input type="hidden" id="batches_ids" class="form-control" value="<?php echo  @$match_data->batches_id; ?>"> 
                            <input type="hidden" class="form-control" id="batch_all" value="<?php echo @$match_data->course_id; ?>"> 
                           <td>
                              <div class="custom-checkbox custom-control">
                                <input type="checkbox" name="admission_courses" value="<?php echo $val->admission_courses_id; ?>" data-checkboxes="mygroup" class="custom-control-input"
                                  id="checkboxx-<?php echo $nb; ?>">
                                <label for="checkboxx-<?php echo $nb; ?>" class="custom-control-label">&nbsp;</label>
                              </div>
                            </td>
                            <td><?php echo $nb; ?></td>
                           <td><?php echo $val->gr_id; ?></td>
                            <td><?php echo $val->first_name; ?> <?php echo $val->surname; ?></td>
                            <td><?php echo $val->email; ?></td>
                            <td>
                                <?php $branch_ids = explode(",",$val->courses_id);   
                                foreach($list_course as $row) { if(in_array($row->subcourse_id,$branch_ids)) {  echo $row->subcourse_name; }  } ?>
                            </td>
                            <td><?php echo $val->admission_courses_status; ?></td>
                            <td>
                              <a  onclick="return pending_batch_student(<?php echo $val->admission_courses_id;?>,<?php echo  @$match_data->batches_id; ?>,<?php echo  @$val->admission_id; ?>)" title="Assign Batch"><i class="fas fa-plus text-success" style="cursor: pointer;"></i></a>
                            </td>
                        </tr>
                        <?php  $nb++; } } } } }?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
 </div>
</section>
<script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
   table = $('#example_pending').DataTable( {
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal( {
                    header: function ( row ) {
                        var data = row.data();
                        return 'Details for '+data[0]+' '+data[1];
                    }
                } ),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                    tableClass: 'table'
                } )
            }
        }
    } );});
</script>
<script type="text/javascript">

  jQuery(".pendingstudent thead input[type=checkbox]").click(function() {
    jQuery(".pendingstudent tbody input[type=checkbox]").prop("checked", $(this).prop("checked"));
    // alert("Hi Prince");
  });

 function pending_batch_student(admission_courses_id='',batch_id='',admission_id=''){
    $.ajax({
      url : "<?php echo base_url(); ?>Admission/pending_batch_student",
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
                $('#pending_batch_msg').html(iziToast.success({
                    title: 'Success',
                    timeout: 2500,
                    message: 'Assigned Batch.',
                    position: 'topRight'
                  }));
                  setTimeout(function() {
                      location.reload();
                  }, 2520);
            }
            else if(ddd == '2')
            {
                $('#pending_batch_msg').html(iziToast.error({
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
  }


$('#all_batches_pending').on('click', function() {
   var admission_courses = [];
   $('input[name=admission_courses]:checked').map(function() {
    admission_courses.push($(this).val());
   });
     var batches_id = $('#batches_ids').val();

     $.ajax({
       type: "POST",
       url: "<?php echo base_url() ?>Admission/multiple_pending_batch_assigned",
       data: {
         'admission_courses_id' : admission_courses , 'batches_id': batches_id
       },
       success: function(resp) 
       {
            var data = $.parseJSON(resp);
            var ddd = data['all_record'].status;
            if(ddd == '1')
            {
                $('#pending_batch_msg').html(iziToast.success({
                    title: 'Success',
                    timeout: 2500,
                    message: 'Assigned All Batch.',
                    position: 'topRight'
                  }));
                  setTimeout(function() {
                      location.reload();
                  }, 2520);
            }
            else if(ddd == '2')
            {
                $('#pending_batch_msg').html(iziToast.error({
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