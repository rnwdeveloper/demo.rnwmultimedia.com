<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css">
<div class="main-content shinings-content">
    <div class="row">    
        <div class="col-md-12">
            <div class="card">
            <div id="deleted_msg"></div>
                <div class="card-header">
                    <h4>All Topics</h4>
                    <div class="card-header-action">
                    <a href="#" class="btn btn-danger text-white" data-placement="bottom" title="Delete Multiple Record" id="multi_row_remove"><i class="fas fa-trash mr-1 text-white"></i></span>
                    </a>
                    <a href="#" class="btn btn-info text-white" data-placement="bottom" title="Multiple Record Edit"><i class="fas fa-edit mr-1 text-white" onclick='check_selectedvalue()'></i></span>
                    </a>
                      <a href="<?php echo base_url(); ?>Admission/erpshiningsheet" class="btn btn-dark text-white">
                       Back
                      </a>
                    </div>
                </div>
                <div class="card-body"> 
                    <div class="table-responsive">
                        <table class="table table-bordered" id="table1">
                            <thead style="background-color: #5864bd;color:azure;">
                                <tr>
                                  <th>
                                    <div class="custom-checkbox custom-checkbox-table custom-control">
                                      <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                      <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                    </div>
                                  </th>
                                    <th>No</th>
                                    <th width="200">Course Name</th>
                                    <th>Topic</th>
                                    <th width="200" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $sno=1; foreach ($course_topic_record as $val) {  if($val->deleted_status=="0") {?>
                                <tr>
                                    <td>
                                  <div class="custom-checkbox custom-control">
                                    <input type="checkbox" name="shining_sheet_ids" value="<?php echo $val->shining_sheet_id; ?>" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-<?php echo $sno; ?>">
                                    <label for="checkbox-<?php echo $sno; ?>" class="custom-control-label">&nbsp;</label>
                                  </div>
                                </td>
                                    <td><?php echo $sno; ?></td>
                                    <td><?php  $course_ids = explode(",",$val->subcourse_id);
                              foreach($subcourse_all as $row) { if(in_array($row->subcourse_id,$course_ids)) {  echo  $row->subcourse_name; }  } ?></td>
                                    <td><?php echo $val->name; ?></td>
                                    <td class="doc-action text-center">
                                        <a href="#" class="btn btn-icon btn-primary rounded-circle" data-toggle="modal" data-target="#edits_modal" onclick="return get_sheet_ids(<?php echo $val->shining_sheet_id;?>)"><i class="far fa-edit"></i></a>
                                        <a href="#" class="btn btn-icon btn-danger rounded-circle" onclick="return delete_topic(<?php echo $val->shining_sheet_id;?>)"><i class="far fa-trash-alt text-white"></i></a>
                                    </td> 
                                </tr>
                                <?php $sno++; } }?>
                            </tbody>
                        </table>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>

<!-- basic modal -->
<div class="modal fade" id="edits_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Topic Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <div id="msg_topic"></div>
              <input type="hidden"  class="form-control" id="sheet_id" >
            <div class="form-group">
                <label for="exampleFormControlInput1"><b>Topic Name</b></label>
            <textarea class="form-control" id="topic_name"></textarea>
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-primary" id="topic_edit">Save</button>
            </div>
              </div>
            </div>
          </div>
        </div>

<!-- Multitopic Edit -->
        <div class="modal fade" id="tedita" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Multiple Topic Course Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                    <div id="msg_atopic"></div>
                    <div class="form-group">
                      <label>Course</label>
                      <select class="form-control" name="course_id" id="course_id">
                         <option value="">Select Course</option>
                              <?php foreach($course_all as $val) { ?>
                                <option  value="<?php echo $val->course_id; ?>"><?php echo $val->course_name; ?></option>
                              <?php } ?>
                      </select>
                    </div>
                     <div class="form-group">
                      <label>Sub-Course</label>
                      <select class="form-control" name="subcourse_id" id="subcourse_id">
                        <option value="">Select Sub-Course</option>
                              <?php foreach($subcourse_all as $val) { ?>
                                <option  value="<?php echo $val->subcourse_id; ?>"><?php echo $val->subcourse_name; ?></option>
                              <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <button type="button" class="btn btn-primary" id="atopicedit">Save</button>
                    </div>
              </div>
            </div>
          </div>
        </div>
 
<script src="<?php echo base_url(); ?>dist/assets/js/app.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/datatables/datatables.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>  
  <!-- Page Specific JS File -->
  <script src="<?php echo base_url(); ?>dist/assets/js/page/datatables.js"></script> 
  <script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
   <!-- General JS Scripts -->
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <script src="<?php echo base_url(); ?>dist/assets/js/page/index.js"></script>
  <!-- JS Libraies --> 
  <script src="<?php echo base_url(); ?>dist/assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="<?php echo base_url(); ?>dist/assets/js/custom.js"></script>
  <script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>

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
            $('#msg_topic').html(iziToast.success({
                title: 'Success',
                timeout: 2500,
                message: 'This Topic Edited.',
                position: 'topRight'
                }));
                setTimeout(function() {
                    location.reload();
                }, 2520);
        }
        else if(ddd == '2')
        {
            $('#msg_topic').html(iziToast.error({
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

//  $('#table2').DataTable({
//             'stateSave': true
//         })

  $('#multi_row_remove').on('click', function() {
   alert("Are You Sure This Record Delted");
   var shining_sheet_ids = [];

   $('input[name=shining_sheet_ids]:checked').map(function() {
    shining_sheet_ids.push($(this).val());
   });
  
   $.ajax({
       type: "POST",
       url: "<?php echo base_url() ?>Admission/Multiple_rowremove",
       data: {
           'shining_sheet_ids': shining_sheet_ids
       },
       success: function(resp) {
           var data = $.parseJSON(resp);
           var ddd = data['all_record'].status;
           if(ddd == '1')
           {
              $('#deleted_msg').html(iziToast.success({
                 title: 'Success',
                 timeout: 2500,
                 message: 'Deleted Record!',
                 position: 'topRight'
              }));

              setTimeout(function() {
                    location.reload();
              }, 2520);

           }
           else if(ddd == '2')
           {
  
              $('#deleted_msg').html(iziToast.error({
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
                $('#deleted_msg').html(iziToast.error({
                    title: 'Success',
                    timeout: 2500,
                    message: 'This Topic Deleted.',
                    position: 'topRight'
                    }));
                    setTimeout(function() {
                        location.reload();
                    }, 2520);
            }
            else if(ddd == '2')
            {
                $('#deleted_msg').html(iziToast.error({
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
    }
  }

  $('#atopicedit').on('click', function() {
   var shining_sheet_ids = [];

   $('input[name=shining_sheet_ids]:checked').map(function() {
    shining_sheet_ids.push($(this).val());
   });

   var course_id = $('#course_id').val();
   var subcourse_id = $('#subcourse_id').val();
  
   $.ajax({
       type: "POST",
       url: "<?php echo base_url() ?>Admission/Multiple_TopicEdit",
       data: {
           'shining_sheet_ids': shining_sheet_ids , 'course_id' : course_id , 'subcourse_id' : subcourse_id
       },
       success: function(resp) {
           var data = $.parseJSON(resp);
           var ddd = data['all_record'].status;
           if(ddd == '1')
           {
              $('#msg_atopic').html(iziToast.success({
                 title: 'Success',
                 timeout: 2500,
                 message: 'Updated Record!',
                 position: 'topRight'
              }));

              setTimeout(function() {
                    location.reload();
              }, 2520);

           }
           else if(ddd == '2')
           {
  
              $('#msg_atopic').html(iziToast.error({
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
<script type="text/javascript">
  $('#course_id').change(function(){
   
   var course_id = $('#course_id').val();
   
    $.ajax({
     url:"<?php echo base_url(); ?>AddmissionController/get_subcourse",
     method:"POST",
     data:{ 'course_id' : course_id }, 
     success:function(data)
     {
       $('#subcourse_id').html(data);
     }
    });
   });
</script>
<script>
  function check_selectedvalue() {
    var id = "";
    var items = document.getElementsByName('shining_sheet_ids');
    for (var i = 0; i < items.length; i++) {
      if (items[i].type == 'checkbox') {
        if (items[i].checked) {
          if (id == "") {
            id = items[i].value;
          } else {
            id = id + "," + items[i].value;
          }
        }
      }
    }

    if (id != "") {
      $('#id').val(id);
      $('#tedita').modal("show").on('click', '#updateok', function(e) {
      });
    } else {
      alert("Please Select Row");
    }
  }
</script>	