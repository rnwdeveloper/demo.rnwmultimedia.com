
        <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/select2.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

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
    padding: 0 5px;
}
/*.select2-container--default .select2-selection--multiple {
    line-height: 27px;
}*/
.select2-container--default .select2-selection--multiple .select2-selection__rendered li {
    list-style: none;
    }
</style>
<style type="text/css">
  .modal-header{
    background-color: #0b527e;
  }
  .modal-title{
    
      color: white;
  }
  .t1{
    background-color: #0b527e;
    color: white;
    font-size: 15px;
    font: center;
   }
   .card-header{
    background-color: #0b527e;
    color: white;
    font-size: 18px;
   }
   .page-item.active .page-link {
    z-index: 3;
    color: #fff;
    background-color: #0b527e;
    border-color: #0b527e;
}
.td1{
  font-size: 14px;
  color: black;
  font: center;
}
</style>

<main  class="main_content d-inline-block">
  <!-- <section class="page_title_block d-inline-block w-100 position-relative pb-0">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="page_heading">
            <h1>Batch Created</h1>
          </div>
        </div>
      </div>
    </div>
  </section> -->
        <section class="all_demo_student_block Add_New_Addmision_page_2 d-inline-block w-100 position-relative pb-0">
          <div class="container-fluid">
   <div class="row">
              <div class="col-lg-12">
                <div class="accordion" id="student_list_aoc">
                        <div id="data_insert_msg">
                      <div class="card">
                    <div class="card-header mb-0" style="background-color: #0b527e;">
                      <h2 class="mb-0">
                        <button class="btn btn-link w-100 text-left collapsed" type="button" data-toggle="collapse" data-target="#student_filter_panel_4" aria-expanded="false">
                         Permission<span class="d-inline-block float-right pluse_icon">✕</span>
                        </button>
                      </h2>
                    </div>
                    <div id="student_filter_panel_4" class="collapse show">
                      <div class="card-body">
                        <form  enctype="multipart/form-data" method="post" action="<?php echo base_url(); ?>AddmissionController/admprocess_permition"> 
                          <input type="hidden" name="update_id" value="<?php if(!empty($select_adm_permission->adm_permission_id)) { echo $select_adm_permission->adm_permission_id; } ?>"/>

                    <div class="row">
                      <div class="col-sm-4">
                          <div class="form-group">
                            <label>Branch:</label>
                            <select class="form-control" name="branch_id"  id="branch_id">
                                <option value="">Select branch</option>
                              <?php foreach($list_branch as $lp) { ?>
                        <option <?php if($lp->branch_id==@$select_adm_permission->branch_id) { echo "selected"; } ?> value="<?php echo $lp->branch_id; ?>"><?php echo $lp->branch_name; ?></option>
                      <?php } ?>
                            </select>
                          </div>
                        </div>
                     <div class="col-sm-4">
                          <div class="form-group">
                            <label>Department:</label>
                            <select class="form-control" name="department_id"  id="department_id">
                                <option value="">Select Department</option>
                              <?php foreach($list_department as $lp) { ?>
                        <option <?php if($lp->department_id==@$select_adm_permission->department_id) { echo "selected"; } ?> value="<?php echo $lp->department_id; ?>"><?php echo $lp->department_name; ?></option>
                      <?php } ?>
                            </select>
                          </div>
                        </div>
                       <div class="col-sm-4">
                          <div class="form-group">
                            <label>Logtype:</label>
                            <select class="form-control" name="logtype_name"  id="logtype_name">
                                <option value="">Select Logtype</option>
                              <?php foreach($all_logtype as $lp) { ?>
                        <option <?php if($lp->logtype_id==@$select_adm_permission->logtype_id) { echo "selected"; } ?> value="<?php echo $lp->logtype_name; ?>"><?php echo $lp->logtype_name; ?></option>
                      <?php } ?>
                            </select>
                          </div>
                        </div>
                   
  
                   <!--  <div class="col-xl-12">
                      <div class="form-group">
                        <input type="submit" name="submit" value="Save" class="btn t1">
                      </div>
                    </div> -->
                        
                    </div>
                </div>
              </div>  
            </div>
          </div>
           
          </div>
        </div>
      </div>
 <div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"><b>Communication</b></h5>
        <p class="card-text">   
        <div class="row">
        <div class="col-sm-3">
         <div class="form-group">
          <label for="exampleInputEmail1">Mobile No:</label><br>
          <input type="radio"  name="mobile_no" id="exampleInputEmail1" value="yes" <?php if(@$select_adm_permission->mobile_no=="yes") { echo "checked"; } ?> placeholder="content">Yes
       
          <input type="radio"  name="mobile_no" id="exampleInputEmail1" value="no" <?php if(@$select_adm_permission->mobile_no=="no") { echo "checked"; } ?> placeholder="content">No
        </div>
        </div>
         <div class="col-sm-3">
         <div class="form-group">
          <label for="exampleInputEmail1">Alternet No:</label><br>
          <input type="radio"  name="alternet_no" id="exampleInputEmail1" value="yes" <?php if(@$select_adm_permission->alternet_no=="yes") { echo "checked"; } ?> placeholder="content">Yes
       
          <input type="radio"  name="alternet_no" id="exampleInputEmail1" value="no" <?php if(@$select_adm_permission->alternet_no=="no") { echo "checked"; } ?> placeholder="content">No
        </div>
        </div>
         <div class="col-sm-3">
         <div class="form-group">
          <label for="exampleInputEmail1">Email:</label><br>
          <input type="radio"  name="email" id="exampleInputEmail1" value="yes" <?php if(@$select_adm_permission->email=="yes") { echo "checked"; } ?> placeholder="content">Yes
       
          <input type="radio"  name="email" id="exampleInputEmail1" value="no" <?php if(@$select_adm_permission->email=="no") { echo "checked"; } ?> placeholder="content">No
        </div>
        </div>
         <div class="col-sm-3">
         <div class="form-group">
          <label for="exampleInputEmail1">Source:</label><br>
          <input type="radio"  name="source" id="exampleInputEmail1" value="yes" <?php if(@$select_adm_permission->source=="yes") { echo "checked"; } ?> placeholder="content">Yes
       
          <input type="radio"  name="source" id="exampleInputEmail1" value="no" <?php if(@$select_adm_permission->source=="no") { echo "checked"; } ?> placeholder="content">No
        </div>
        </div>
      </div>
        </p>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"><b>Personal Details</b></h5>
        <p class="card-text">
           <div class="row">
        <div class="col-sm-3">
         <div class="form-group">
          <label for="exampleInputEmail1">First Name:</label><br>
          <input type="radio"  name="first_name" id="exampleInputEmail1" value="yes" <?php if(@$select_adm_permission->first_name=="yes") { echo "checked"; } ?> placeholder="content">Yes
       
          <input type="radio"  name="first_name" id="exampleInputEmail1" value="no" <?php if(@$select_adm_permission->first_name=="no") { echo "checked"; } ?> placeholder="content">No
        </div>
        </div>
         <div class="col-sm-3">
         <div class="form-group">
          <label for="exampleInputEmail1">Surname:</label><br>
          <input type="radio"  name="surname" id="exampleInputEmail1" value="yes" <?php if(@$select_adm_permission->surname=="yes") { echo "checked"; } ?> placeholder="content">Yes
       
          <input type="radio"  name="surname" id="exampleInputEmail1" value="no" <?php if(@$select_adm_permission->surname=="no") { echo "checked"; } ?> placeholder="content">No
        </div>
        </div>
         <div class="col-sm-3">
         <div class="form-group">
          <label for="exampleInputEmail1">Branch Name:</label><br>
          <input type="radio"  name="branch_name" id="exampleInputEmail1" value="yes" <?php if(@$select_adm_permission->branch_name=="yes") { echo "checked"; } ?> placeholder="content">Yes
       
          <input type="radio"  name="branch_name" id="exampleInputEmail1" value="no" <?php if(@$select_adm_permission->branch_name=="no") { echo "checked"; } ?> placeholder="content">No
        </div>
        </div>
         <div class="col-sm-3">
         <div class="form-group">
          <label for="exampleInputEmail1">Assigned To:</label><br>
          <input type="radio"  name="assigned_to" id="exampleInputEmail1" value="yes" <?php if(@$select_adm_permission->assigned_to=="yes") { echo "checked"; } ?> placeholder="content">Yes
       
          <input type="radio"  name="assigned_to" id="exampleInputEmail1" value="no" <?php if(@$select_adm_permission->assigned_to=="no") { echo "checked"; } ?> placeholder="content">No
        </div>
        </div>
      </div>
        </p>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"><b>Course & Fees</b></h5>
        <p class="card-text">
        <div class="row">
        <div class="col-sm-2">
         <div class="form-group">
          <label for="exampleInputEmail1">Branch Name:</label><br>
          <input type="radio"  name="admission_branch" id="exampleInputEmail1" value="yes" <?php if(@$select_adm_permission->first_name=="yes") { echo "checked"; } ?> placeholder="content">Yes
       
          <input type="radio"  name="admission_branch" id="exampleInputEmail1" value="no" <?php if(@$select_adm_permission->first_name=="no") { echo "checked"; } ?> placeholder="content">No
        </div>
        </div>
         <div class="col-sm-2">
         <div class="form-group">
          <label for="exampleInputEmail1">Session:</label><br>
          <input type="radio"  name="session" id="exampleInputEmail1" value="yes" <?php if(@$select_adm_permission->surname=="yes") { echo "checked"; } ?> placeholder="content">Yes
       
          <input type="radio"  name="session" id="exampleInputEmail1" value="no" <?php if(@$select_adm_permission->surname=="no") { echo "checked"; } ?> placeholder="content">No
        </div>
        </div>
         <div class="col-sm-2">
         <div class="form-group">
          <label for="exampleInputEmail1">Department:</label><br>
          <input type="radio"  name="department" id="exampleInputEmail1" value="yes" <?php if(@$select_adm_permission->branch_name=="yes") { echo "checked"; } ?> placeholder="content">Yes
       
          <input type="radio"  name="department" id="exampleInputEmail1" value="no" <?php if(@$select_adm_permission->branch_name=="no") { echo "checked"; } ?> placeholder="content">No
        </div>
        </div>
         <div class="col-sm-2">
         <div class="form-group">
          <label for="exampleInputEmail1">Course Category:</label><br>
          <input type="radio"  name="course_category" id="exampleInputEmail1" value="yes" <?php if(@$select_adm_permission->assigned_to=="yes") { echo "checked"; } ?> placeholder="content">Yes
       
          <input type="radio"  name="course_category" id="exampleInputEmail1" value="no" <?php if(@$select_adm_permission->assigned_to=="no") { echo "checked"; } ?> placeholder="content">No
        </div>
        </div>
        <div class="col-sm-2">
         <div class="form-group">
          <label for="exampleInputEmail1">Course:</label><br>
          <input type="radio"  name="course" id="exampleInputEmail1" value="yes" <?php if(@$select_adm_permission->course=="yes") { echo "checked"; } ?> placeholder="content">Yes
       
          <input type="radio"  name="course" id="exampleInputEmail1" value="no" <?php if(@$select_adm_permission->course=="no") { echo "checked"; } ?> placeholder="content">No
        </div>
        </div>
        <div class="col-sm-2">
         <div class="form-group">
          <label for="exampleInputEmail1">Package:</label><br>
          <input type="radio"  name="package" id="exampleInputEmail1" value="yes" <?php if(@$select_adm_permission->package=="yes") { echo "checked"; } ?> placeholder="content">Yes
       
          <input type="radio"  name="package" id="exampleInputEmail1" value="no" <?php if(@$select_adm_permission->package=="no") { echo "checked"; } ?> placeholder="content">No
        </div>
        </div>
        <div class="col-sm-2">
         <div class="form-group">
          <label for="exampleInputEmail1">Faculty:</label><br>
          <input type="radio"  name="faculty" id="exampleInputEmail1" value="yes" <?php if(@$select_adm_permission->faculty=="yes") { echo "checked"; } ?> placeholder="content">Yes
       
          <input type="radio"  name="faculty" id="exampleInputEmail1" value="no" <?php if(@$select_adm_permission->faculty=="no") { echo "checked"; } ?> placeholder="content">No
        </div>
        </div>
         <div class="col-sm-2">
         <div class="form-group">
          <label for="exampleInputEmail1">Batch:</label><br>
          <input type="radio"  name="batch" id="exampleInputEmail1" value="yes" <?php if(@$select_adm_permission->batch=="yes") { echo "checked"; } ?> placeholder="content">Yes
       
          <input type="radio"  name="batch" id="exampleInputEmail1" value="no" <?php if(@$select_adm_permission->batch=="no") { echo "checked"; } ?> placeholder="content">No
        </div>
        </div>
         <div class="col-sm-2">
         <div class="form-group">
          <label for="exampleInputEmail1">Tuition Fees:</label><br>
          <input type="radio"  name="tuition_fees" id="exampleInputEmail1" value="yes" <?php if(@$select_adm_permission->tuition_fees=="yes") { echo "checked"; } ?> placeholder="content">Yes
       
          <input type="radio"  name="tuition_fees" id="exampleInputEmail1" value="no" <?php if(@$select_adm_permission->tuition_fees=="no") { echo "checked"; } ?> placeholder="content">No
        </div>
        </div>
         <div class="col-sm-2">
         <div class="form-group">
          <label for="exampleInputEmail1">Registration Fees:</label><br>
          <input type="radio"  name="registration_fees" id="exampleInputEmail1" value="yes" <?php if(@$select_adm_permission->registration_fees=="yes") { echo "checked"; } ?> placeholder="content">Yes
       
          <input type="radio"  name="registration_fees" id="exampleInputEmail1" value="no" <?php if(@$select_adm_permission->registration_fees=="no") { echo "checked"; } ?> placeholder="content">No
        </div>
        </div>
         <div class="col-sm-2">
          <div class="form-group">
            <input type="submit" name="submit" value="Save" class="btn t1">
          </div>
        </div>
      </div>
    </form>
        </p>
      </div>
    </div>
  </div>
</div>
         
    </div>


  </section>


  <section>
    <div class="container-fluid">
      <div class="card">
  <div class="card-header">
    Display Permission Record
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
       <table  id="example" class="table table-str iped">
                <thead>
                  <tr class="t1">
                    <th>S_No</th>
                    <th>Branch</th>
                    <th>Department</th>
                    <th>Logtype</th>
                    <th>Communication</th>  
                    <th>PersonalDetails</th>  
                    <th>Course&Fees</th>  
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $sno=1; foreach ($all_adm_permission as $val) {?>
                  <tr class="td1">
                    <td>
                    <?php echo $sno; ?>
                  </td>
                     <td><?php $branch_ids = explode(",",$val->branch_id);
                     foreach($list_branch as $row) { if(in_array($row->branch_id,$branch_ids)) {  echo $row->branch_name; }  } ?></td>
      
                     <td><?php $branch_ids = explode(",",$val->department_id);
                     foreach($list_department as $row) { if(in_array($row->department_id,$branch_ids)) {  echo $row->department_name; }  } ?></td>
                     <td><?php echo $val->logtype_name; ?></td>
                     <td>
                      <?php echo "<b>Mobile No :</b>".''. $val->mobile_no; ?><br>
                      <?php echo "<b>Alternate  No :</b>".''. $val->alternet_no; ?><br>
                      <?php echo "<b>Email :</b>".''. $val->email; ?><br>
                      <?php echo "<b>Source :</b>".''. $val->source; ?>
                     </td>                        
                       <td>
                      <?php echo "<b>First Name :</b>".''. $val->first_name; ?><br>
                      <?php echo "<b>Surname :</b>".''. $val->surname; ?><br>
                      <?php echo "<b>Branch Name :</b>".''. $val->branch_name; ?><br>
                      <?php echo "<b>Assigned To :</b>".''. $val->assigned_to ; ?>
                     </td>
                     <td>
                      <?php echo "<b>Branch Name :</b>".''. $val->admission_branch; ?> | <?php echo "<b>Session :</b>".''. $val->session; ?><br>
                      <?php echo "<b>Department :</b>".''. $val->department; ?> | <?php echo "<b>Course Category :</b>".''. $val->course_category; ?><br>
                      <?php echo "<b>Course :</b>".''. $val->course; ?> | <?php echo "<b>Package :</b>".''. $val->package; ?><br>
                      <?php echo "<b>Faculty :</b>".''. $val->faculty; ?> | <?php echo "<b>Batch :</b>".''. $val->batch; ?><br>
                      <?php echo "<b>Tuition Fees :</b>".''. $val->tuition_fees; ?> | <?php echo "<b>Registration Fees :</b>".''. $val->registration_fees; ?>
                     </td>                                            
                  <td>
                  <?php if($_SESSION['logtype']=="Super Admin" || $_SESSION['logtype'] == "Admin") {  ?>
                  <a href="<?php echo base_url(); ?>AddmissionController/admprocess_permition?action=delete&id=<?php echo @$val->adm_permission_id; ?>" onclick="return confirm('Are you sure you want to delete this Details?');" class="btn btn-xs btn-danger"><i class="fa fa-remove"></i></a>
                  
                  <a href="<?php echo base_url(); ?>AddmissionController/admprocess_permition?action=edit&id=<?php echo @$val->adm_permission_id; ?>"  class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
                   <?php } ?>
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

<script src="<?php echo base_url(); ?>assets/js/jquery-2.2.4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js "></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-timepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>

<script src="<?php echo base_url(); ?>dist/js/select2.full.min.js"></script>
    <script src="<?php echo base_url(); ?>dist/js/select2.min.js"></script>
<!-- Data table and pagination & searching -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script>
 $(document).ready(function() {
    $('#example').DataTable();
} );
</script>

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



