
<table class="table  table-str iped create_responsive_table">
<tr class="t1">
<th>S_No</th>
<th>Course</th>
</tr>          
<tr>
<td>
1
</td>
<td>
<?php echo $package->package_name; ?>   
</td>
</tr>
</table>

<script>
function myFunction() {
  document.getElementById("tbl").deleteRow();
}


function addRow()
{
            var course_orpackage = $('#course_orpackage').val();
            var course_package = $('#course_package').val();
            

    $.ajax({
      url: "<?php echo base_url(); ?>AddmissionController/pass_data_course",
      type : "post",
      data :{
        'course_orpackage' : course_orpackage , 'course_package' : course_package
      },
      success:function(res)
      {
        $('#tbl').html(res);
        //var data = $.parseJSON(res);
        
      }
    });
}
</script>


 
    
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
    .col-md-3 {
    margin-bottom: 20px;
}
</style>

<!-- <div class="modal-header">
					<h5 class="modal-title"><b>Upgrade Courses</b></h5>
					<div class="btn-group">
						<button type="button" class="btn btn-primary btn-sm" data-toggle="collapse" data-target="#edit_demo_show">Edit admission </button>
						<button type="button" class="btn btn-danger btn-sm" >Discard</button>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div> -->
				<div class="modal-body">
		           <div class="row">
        <div class="col-xl-12">
          <div class="simple_border_box_design">
            <span class="addmision_process_top_title">Upgrade Courses</span>
            
             
              <div class="col-md-12">
              <div class="row">
               <!-- <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                <div class="form-group" id="branch_data">
                  <label>Branch Name:</label>
                  <select class="form-control custom-form-control" name="branch_id" id="branch_id">
                     <option value="">Select branch</option>
                            <?php foreach($list_branch as $ld) { ?>
                              <option <?php if($ld->branch_id==@$adm_record->branch_id) { echo "selected"; } ?>
                               value="<?php echo $ld->branch_id; ?>"><?php echo $ld->branch_name; ?></option>
                            <?php } ?>  
                  </select>
                </div>
              </div> -->
              <!-- <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                <div class="form-group">
                                  <label>Session</label>                                    
                                      <select class="form-control custom-form-control" name="no_year" id="session" >
                                          <option value="0">Select Session</option>
                                          <?php for($i=2019;$i<=2030;$i++){ ?>
                                        <option <?php if($i==@$adm_record->year) { echo "selected"; } ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php } ?>
                                  </select>
                                  </div>
                              </div>  -->
              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 select_course_package1">
                <div class="form-group" id="department_data">
                      <label>Department:</label>
                        <select class="form-control" name="department_id" id="department_id">
                          <option value="">Select Department</option>
                              <?php foreach($list_department as $ld) { ?>
                              <option <?php if($ld->department_id==@$adm_record->department_id) { echo "selected"; } ?>
                              value="<?php echo $ld->department_id; ?>"><?php echo $ld->department_name; ?></option>
                            <?php } ?>
                      </select>
                  </div>
              </div>
              
              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                  <div class="form-group">
                      <label>Course Category</label>
                      <ul>
                          <li class="d-inline-block mr-3 mr-mr-0">
                              <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" id="course_package" name="type" value="package"  onclick="return show_hide_package_course()" />Package
                              </div>
                              <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" id="course_single" name="type"  value="single"  onclick="return show_hide_package_course()"/>Single
                              </div>
                          </li>
                      </ul>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 select_course_package">
                <div class="form-group">
                  <label>Select Package*</label>
                    <select class="form-control" name="course_or_package" id="course_orpackage">
                            <option value="">Select Package</option>
                   <?php foreach($list_package as $lp) { ?>
                        <option 
                        value="<?php echo $lp->package_id; ?>"><?php echo $lp->package_name; ?></option>
                      <?php } ?> 
                  </select>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 select_course_single" >
                <div class="form-group">
                  <label>Select Course*</label>
                 <select class="form-control" name="course_or_single" id="course_orsingle">
                            <option value="">Select Course</option>
                        <?php foreach($list_course as $lp) { ?>
                        <option 
                         value="<?php echo $lp->course_id; ?>"><?php echo $lp->course_name; ?></option>
                      <?php } ?> 
                      </select>
                  </div>
              </div>
              </div>
                 <div class="col-md-12">
                 <input type="button" id="add" value="+" class="btn btn-sm btn-success" onclick="Javascript:addRow()">
                  <button onclick="myFunction()" class="btn btn-sm btn-danger">-</button>
                 </div>
                 <div class="col-md-12" id="tbl">

                 </div>
              </div>
            </div>
          </div>
        
      </div>
    </div>
 
    <script>
function myFunction() {
  document.getElementById("tbl").deleteRow();
}


function addRow()
{
            var course_orpackage = $('#course_orpackage').val();
            var course_package = $('#course_package').val();
            

    $.ajax({
      url: "<?php echo base_url(); ?>AddmissionController/pass_data_course",
      type : "post",
      data :{
        'course_orpackage' : course_orpackage , 'course_package' : course_package
      },
      success:function(res)
      {
        $('#tbl').html(res);
        //var data = $.parseJSON(res);
        
      }
    });
}
</script>
<!-- <div class="col-md-3">
                      <label><b>Department:*</b></label>
                        <select class="select2 form-control" name="department_id[]" id="department_id" multiple="multiple">
                          <option value="">Select Department</option>
                              <?php foreach($list_department as $ld) { ?>
                              <option <?php if($ld->department_id==@$adm_record->department_id) { echo "selected"; } ?>
                              value="<?php echo $ld->department_id; ?>"><?php echo $ld->department_name; ?></option>
                            <?php } ?>
                      </select>
              </div> -->
						
<script src="<?php echo base_url(); ?>dist/js/select2.full.min.js"></script>
    <script src="<?php echo base_url(); ?>dist/js/select2.min.js"></script>

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
    	$('.select_course_single').hide();
  function show_hide_package_course()
{
  var type = $("input[name='type']:checked").val();
 // alert(course_package);
  if(type == 'single'){
    $('.select_course_single').show();
    $('.select_course_package').hide(); 
  }else{

    $('.select_course_single').hide();
    $('.select_course_package').show();
  }
  
}
</script>


<script type="text/javascript">
      $('#update').on('click',function(){
            var update_id = $('#update_id').val();
            var admission_branch = $('#admission_branch').val();
            var session = $('#session').val();	
            var department_id = $('#department_id').val();
            var type = $('#type').val();
            var course_orpackage = $('#course_orpackage').val();
            var course_orsingle = $('#course_orsingle').val();
            var faculty_id = $('#faculty_id').val();
            var batch_id = $('#batch_id').val();
            
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url()?>AddmissionController/upd_admission_course",
                dataType : "JSON",
                data : {'update_id' : update_id ,  'admission_branch' : admission_branch , 'session' : session , 'department_id' : department_id , 'type' : type ,  'course_orpackage' : course_orpackage , 'course_orsingle' : course_orsingle , 'faculty_id' : faculty_id , 'batch_id' : batch_id },
                success: function(data){
                  // $('#exampleModal').modal().hide();
                  //$("#admission_id").val("");
                  //$("#update_id").val("");

                  alert('Are You Sure This Course Updated');
                }
            });
            return false;
        });
    </script>
