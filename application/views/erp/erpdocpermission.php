<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/datatables/datatables.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.0-beta/css/bootstrap-select.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/selectric.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>dist/assets/bundles/izitoast/css/iziToast.min.css"> 
<div class="main-content">
	<div class="card">
      <div class="card-header">
        <h4>Documents Permission Record</h4>
        <div class="card-header-form"> 
            <button class="btn btn-info" data-toggle="modal" data-target=".createdoc"><i class="fas fa-plus" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Documents Create" onclick="resetval()"></i></button>
        </div>
      </div>
      <div class="card-body">
      <div id="deleted_msg"></div>
        <div class="table-responsive">
          <table class="table table-striped doc-table table-bordered" id="table1">
            <thead>
              <tr>
                <th>S_No</th>
                <th>Branch</th> 
                <th>Department</th> 
                <th  width="300">Document Details</th> 
                <th class="text-center">Action</th> 
              </tr>
            </thead>
            <tbody>
            <?php $sno=1; foreach ($list_documents as $val) {?>
              <tr>
                <td><?php echo $sno; ?></td>
                <td>
                <?php $branch_ids = explode(",",$val->branch_id);
                           foreach($list_branch as $row) { if(in_array($row->branch_id,$branch_ids)) {  echo $row->branch_name; }  } ?>
                </td>
                <td>
                <?php $branch_ids = explode(",",$val->department_id);
                           foreach($list_department as $row) { if(in_array($row->department_id,$branch_ids)) {  echo $row->department_name; }  } ?>
                </td>
                <td class="d-flex flex-wrap justify-content-start doc-detail">
                	<div>
                		<p><strong>Photos : </strong><span><?php  echo $val->photos; ?></span></p>
                		<p><strong>10th Marksheet : </strong><span><?php  echo $val->tenth_marksheet; ?></span></p>
                		<p><strong>12th Marksheet : </strong><span><?php  echo $val->twelth_marksheet; ?></span></p>
                		<p><strong>Leaving Certy : </strong><span><?php  echo $val->leaving_certy; ?></span></p>
                	</div>
                	<div class="pl-4">
                		<p><strong>Treal Certy : </strong><span><?php  echo $val->treal_certy; ?></span></p>
                		<p><strong>Light Bill : </strong><span><?php  echo $val->light_bill; ?></span></p>
                		<p><strong>Aadhar Card : </strong><span><?php  echo $val->aadhar_card; ?></span></p>
                	</div>
                </td>
                <td class="doc-action text-center">
                	<a href="javascript:doc_upd(<?php echo $val->documents_id; ?>)" class="bg-primary action-icon text-white btn-primary btn-sm"><i class="far fa-edit"></i></a>
                	<a href="javascript:remove_doc(<?php echo $val->documents_id; ?>)" class="bg-danger action-icon text-white btn-danger btn-sm"><i class="far fa-trash-alt text-white"></i></a>
                </td> 
              </tr>
              <?php $sno++; } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>
 
<div class="modal fade createdoc" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Documents</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <div id="msg_doc"></div>
                <form class="document-createmodal"  method="post" name="add_doc" id="add_doc">
                 <input type="hidden" name="documents_id" id="documents_id" class="form-control">
                 	<div class="row">
                 		<div class="col-md-6">
                 			<div class="form-group">
		                      <label>Branch:</label>
		                      <select class="form-control" name="branch_id"  id="branch">
                              <option value="">Select Branch</option>
                              <?php foreach($list_branch as $lp) { ?>
                              <option 
                                  value="<?php echo $lp->branch_id; ?>"><?php echo $lp->branch_name; ?></option>
                              <?php } ?>
                            </select>
		                    </div>
                 		</div>
                 		<div class="col-md-6">
                 			<div class="form-group">
		                      <label>Department:</label>
		                      <select class="form-control" name="department_id"  id="department">
                              <option value="">Select Department</option>
                              <?php foreach($list_department as $lp) { ?>
                              <option value="<?php echo $lp->department_id; ?>"><?php echo $lp->department_name; ?></option>
                              <?php } ?>
                            </select>
		                    </div>
                 		</div>
                    <div class="col-md-6">
                      <div class="form-group">
                      <label class="d-block">Photos:</label>
                      <div class="pretty p-icon p-jelly p-round p-bigger">
                      <input class="form-check-input" type="radio" name="photos" id="photos_yes" value="yes">
                        <div class="state p-info">
                          <i class="icon material-icons">done</i>
                          <label>Yes</label>
                        </div>
                      </div>
                      <div class="pretty p-icon p-jelly p-round p-bigger">
                      <input class="form-check-input" type="radio" name="photos" id="photos_no" value="no">
                        <div class="state p-info">
                          <i class="icon material-icons">done</i>
                          <label>No</label>
                        </div>
                      </div> 
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                      <label class="d-block">10th Marksheet:</label>
                      <div class="pretty p-icon p-jelly p-round p-bigger">
                      <input class="form-check-input" type="radio" name="tenth_marksheet" id="tenth_marksheet_yes" value="yes">
                        <div class="state p-info">
                          <i class="icon material-icons">done</i>
                          <label>Yes</label>
                        </div>
                      </div>
                      <div class="pretty p-icon p-jelly p-round p-bigger">
                      <input class="form-check-input" type="radio" name="tenth_marksheet" id="tenth_marksheet_no" value="no">
                        <div class="state p-info">
                          <i class="icon material-icons">done</i>
                          <label>No</label>
                        </div>
                      </div> 
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                      <label class="d-block">12th Marksheet:</label>
                      <div class="pretty p-icon p-jelly p-round p-bigger">
                      <input class="form-check-input" type="radio" name="twelth_marksheet" id="twelth_marksheet_yes" value="yes">
                        <div class="state p-info">
                          <i class="icon material-icons">done</i>
                          <label>Yes</label>
                        </div>
                      </div>
                      <div class="pretty p-icon p-jelly p-round p-bigger">
                      <input class="form-check-input" type="radio" name="twelth_marksheet" id="twelth_marksheet_no" value="no">
                        <div class="state p-info">
                          <i class="icon material-icons">done</i>
                          <label>No</label>
                        </div>
                      </div> 
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                      <label class="d-block">Leaving Certy:</label>
                      <div class="pretty p-icon p-jelly p-round p-bigger">
                      <input class="form-check-input" type="radio" name="leaving_certy" id="leaving_certy_yes" value="yes">
                        <div class="state p-info">
                          <i class="icon material-icons">done</i>
                          <label>Yes</label>
                        </div>
                      </div>
                      <div class="pretty p-icon p-jelly p-round p-bigger">
                      <input class="form-check-input" type="radio" name="leaving_certy" id="leaving_certy_no" value="no">
                        <div class="state p-info">
                          <i class="icon material-icons">done</i>
                          <label>No</label>
                        </div>
                      </div> 
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                      <label class="d-block">Treal Certy:</label>
                      <div class="pretty p-icon p-jelly p-round p-bigger">
                      <input class="form-check-input" type="radio" name="treal_certy" id="treal_certy_yes" value="yes">
                        <div class="state p-info">
                          <i class="icon material-icons">done</i>
                          <label>Yes</label>
                        </div>
                      </div>
                      <div class="pretty p-icon p-jelly p-round p-bigger">
                      <input class="form-check-input" type="radio" name="treal_certy" id="treal_certy_no" value="no">
                        <div class="state p-info">
                          <i class="icon material-icons">done</i>
                          <label>No</label>
                        </div>
                      </div> 
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                      <label class="d-block">Light Bill:</label>
                      <div class="pretty p-icon p-jelly p-round p-bigger">
                      <input class="form-check-input" type="radio" name="light_bill" id="light_bill_yes" value="yes">
                        <div class="state p-info">
                          <i class="icon material-icons">done</i>
                          <label>Yes</label>
                        </div>
                      </div>
                      <div class="pretty p-icon p-jelly p-round p-bigger">
                      <input class="form-check-input" type="radio" name="light_bill" id="light_bill_no" value="no">
                        <div class="state p-info">
                          <i class="icon material-icons">done</i>
                          <label>No</label>
                        </div>
                      </div> 
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                      <label class="d-block">AAdhar Card:</label>
                      <div class="pretty p-icon p-jelly p-round p-bigger">
                      <input class="form-check-input" type="radio" name="aadhar_card" id="aadhar_card_yes" value="yes">
                        <div class="state p-info">
                          <i class="icon material-icons">done</i>
                          <label>Yes</label>
                        </div>
                      </div>
                      <div class="pretty p-icon p-jelly p-round p-bigger">  
                      <input class="form-check-input" type="radio" name="aadhar_card" id="aadhar_card_no" value="no">
                        <div class="state p-info">
                          <i class="icon material-icons">done</i>
                          <label>No</label>
                        </div>
                      </div> 
                      </div>
                    </div>
                <div class="col-12">
                <input type="submit" class="btn btn-primary" id="Submit" name="submit" value="Submit">
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>

<!-- General JS Scripts -->
<script src="<?php echo base_url(); ?>dist/assets/js/app.min.js"></script>
  <script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>
  <!-- JS Libraies -->
  <script src="<?php echo base_url(); ?>dist/assets/bundles/apexcharts/apexcharts.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="<?php echo base_url(); ?>dist/assets/js/page/index.js"></script>
<!-- JS Libraies -->
<script src="<?php echo base_url(); ?>dist/assets/bundles/datatables/datatables.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-ui/jquery-ui.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/datatables.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/cleave-js/dist/cleave.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/cleave-js/dist/addons/cleave-phone.us.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.0-beta/js/bootstrap-select.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url(); ?>dist/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>dist/assets/js/page/forms-advanced-forms.js"></script>
	<script src="<?php echo base_url(); ?>dist/assets/bundles/select2/dist/js/select2.full.min.js"></script>
	<script src="<?php echo base_url(); ?>dist/assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
	<script src="<?php echo base_url(); ?>dist/assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="<?php echo base_url(); ?>dist/assets/js/custom.js"></script> 
  <script src="<?php echo base_url(); ?>dist/assets/bundles/izitoast/js/iziToast.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="<?php echo base_url(); ?>dist/assets/js/page/toastr.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script>
  // just for the demos, avoids form submit
  jQuery.validator.setDefaults({
    debug: true,
    success: "valid"
  });
  $("#add_doc").validate({
    rules: {
      w_template_name: {
        required: true,
      },
      w_template_message: {
        required: true
      }
    },
    messages: {
      w_template_name: {
        required: "<div style='color:red'>Enter Template Name</div>",
      },
      w_template_message: {
        required: "<div style='color:red'>Please enter template Message</div>"
      }
    },
    submitHandler: function() {
      event.preventDefault();
      var formdata = $('#add_doc').serialize();

      $.ajax({
        url: "<?php echo base_url(); ?>Admission/ajax_doc_permission",
        type: "post",
        data: formdata,
        success: function(resp) {
          var data = $.parseJSON(resp);
          var ddd = data['all_record'].status;
          if (ddd == '1') {
          $('#msg_doc').html(iziToast.success({
            title: 'Success',
            timeout: 2000,
            message: 'HI! This Record Inserted.',
            position: 'topRight'
          }));

          setTimeout(function() {
            location.reload();
          }, 2020);
        }else if(ddd == '2'){
          $('#msg_doc').html(iziToast.success({
            title: 'success',
            timeout: 2000,
            message: 'HI! This Record Updated',
            position: 'topRight'
          }));

          setTimeout(function() {
            location.reload();
          }, 2020);
        }
         else if(ddd == '3'){
          $('#msg_doc').html(iziToast.error({
            title: 'Canceled!',
            timeout: 2000,
            message: 'Someting Wrong!!',
            position: 'topRight'
          }));

          setTimeout(function() {
            location.reload();
          }, 2020);
        }
        }
      });
    }
  });

  function doc_upd(documents_id) {
    $.ajax({
      url: "<?php echo base_url(); ?>Admission/get_record_docpermission",
      type: "post",
      data: {
        'documents_id': documents_id
      },
      success: function(resp) {
        $(".createdoc").modal();
        var data = $.parseJSON(resp);
        var documents_id = data['single_record'].documents_id;
        var branch_id = data['single_record'].branch_id;
        var department_id = data['single_record'].department_id;
        var photos = data['single_record'].photos;
        var tenth_marksheet = data['single_record'].tenth_marksheet;
        var twelth_marksheet = data['single_record'].twelth_marksheet;
        var leaving_certy = data['single_record'].leaving_certy;
        var treal_certy = data['single_record'].treal_certy;
        var light_bill = data['single_record'].light_bill;
        var aadhar_card = data['single_record'].aadhar_card;
        
        $('#documents_id').val(documents_id);
        $('#branch').val(branch_id);
        $('#department').val(department_id);
        if(photos=="yes")
        {
          $("#photos_yes").prop("checked", true);
        }
        else
        {
          $("#photos_no").prop("checked", true);
        }
        if(tenth_marksheet=="yes")
        {
          $("#tenth_marksheet_yes").prop("checked", true);
        }
        else
        {
          $("#tenth_marksheet_no").prop("checked", true);
        }
        if(twelth_marksheet=="yes")
        {
          $("#twelth_marksheet_yes").prop("checked", true);
        }
        else
        {
          $("twelth_marksheet_no").prop("checked", true);
        }
        if(leaving_certy=="yes")
        {
          $("#leaving_certy_yes").prop("checked", true);
        }
        else
        {
          $("#leaving_certy_no").prop("checked", true);
        }
        if(treal_certy=="yes")
        {
          $("#treal_certy_yes").prop("checked", true);
        }
        else
        {
          $("#treal_certy_no").prop("checked", true);
        }
        if(light_bill=="yes")
        {
          $("#light_bill_yes").prop("checked", true);
        }
        else
        {
          $("#light_bill_no").prop("checked", true);
        }
        if(aadhar_card=="yes")
        {
          $("#aadhar_card_yes").prop("checked", true);
        }
        else
        {
          $("#aadhar_card_no").prop("checked", true);
        }
        
        $('#submit').val('Update');
      }

    });
  }

  function remove_doc(documents_id)
  {
    var conf =  confirm("Are U Sure to Delete Record");
    if(conf){
        $.ajax({
          url : "<?php echo base_url(); ?>Admission/remove_doc",
          type :"post",
          data:{
            'documents_id' : documents_id
          },
          success:function(resp)
          {
              var data = $.parseJSON(resp);
              var ddd = data['all_record'].status;
              if (ddd == '1') {
              $('#deleted_msg').html(iziToast.success({
                title: 'success',
                timeout: 2000,
                message: 'HI! This Record Deleted.',
                position: 'topRight'
              }));

              setTimeout(function() {
                location.reload();
              }, 2020);
            }else if(ddd == '2'){
              $('#deleted_msg').html(iziToast.error({
                title: 'Canceled!',
                timeout: 2000,
                message: '',
                position: 'topRight'
              }));

              setTimeout(function() {
                location.reload();
              }, 2020);
            }
          }
        });
    }
  }
  </script>

<script type="text/javascript">
   $(document).ready(function(){
   $('#branch').change(function(){
    var branch_id = $('#branch').val();
    //alert(branch_id);
     $.ajax({
      url:"<?php echo base_url(); ?>settings/fetch_department_data",
      method:"POST",
      data:{branch_id:branch_id},
      success:function(data)
      {
       $('#department').html(data);
      }
     });
   });
   
   $('#department').change(function(){
    var department_id = $('#department').val();
    // alert(department_id);
     $.ajax({
      url:"<?php echo base_url(); ?>settings/fetch_department_wise_course",
      method:"POST",
      data:{
        'department_id' : department_id
         },
      success:function(data)
      {
       $('#course_orsingle').html(data);
      }
     });
   });
   
   $('#department').change(function(){
    var department_id = $('#department').val();
    // alert(department_id);
     $.ajax({
      url:"<?php echo base_url(); ?>settings/fetch_depatment_wise_package",
      method:"POST",
      data:{
        'department_id' : department_id
         },
      success:function(data)
      {
       $('#course_orpackage').html(data);
      }
     });
   });
    });
</script>
<script>
$(function() {
    $('#table1').DataTable({
        stateSave: true,
        "bDestroy": true
    })
}) 

  function resetval() {
   $("#add_doc")[0].reset();
 }
</script>
<script type="text/javascript">
   $('.select_course_package').hide(); 
   function show_hide_package_course()
   {
   var course_package = $("input[name='type']:checked").val();
   // alert(course_package);
   if(course_package == 'single'){
     $('.select_course_single').show();
     $('.select_course_package').hide(); 
   }else{
     $('.select_course_single').hide();
     $('.select_course_package').show();
   }
   }
</script>