
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
    font-size: 12px;
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
  font-size: 12px;
  font: center;
  color:  #000000;
}
.pos{
    background-color: white;
   }
   .text-black{
    color: #0b527e;
   }
   .p{
    background-color: #0b527e;
   }
   .text{
    color: white;
   }
</style>

<main  class="main_content d-inline-block">
  


  <section>
    <div class="container-fluid">
      <div class="card">
  
  <div class="card">
  <div class="card-body">
    <h5 class="card-title btn text p">Master Search</h5>
    <p class="card-text">
      <form method="post" action="<?php  echo base_url(); ?>AddmissionController/default_search">
    <div class="row">
      <div class="col-sm-3">
        <div class="form-group">
          <label><b>Name</b></label>   
          <input type="text" class="form-control" value="<?php if(!empty($filter_fname)) { echo @$filter_fname; } ?>" placeholder="Name"  name="filter_fname">
      </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
          <label><b>Surname</b></label>   
          <input type="text" class="form-control" value="<?php if(!empty($filter_lname)) { echo @$filter_lname; } ?>" placeholder="SurName"  name="filter_lname">
      </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
          <label><b>Email</b></label>   
        <input type="text" class="form-control" value="<?php if(!empty($filter_email)) { echo @$filter_email; } ?>" placeholder="Example@gmail.com" name="filter_email">
      </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
          <label><b>Mobile</b></label>   
        <input type="text" class="form-control" value="<?php if(!empty($filter_mobile)) { echo @$filter_mobile; } ?>" placeholder="+91-00000-00000" name="filter_mobile">
      </div>
    </div>
      <div class="col-sm-3">
      <div class="form-group">  
          <label><b>GR ID</b></label>   
      <input type="text" class="form-control" value="<?php if(!empty($filter_gr_id)) { echo @$filter_gr_id; } ?>" placeholder="GR ID"  name="filter_gr_id">
    </div>
    </div>
    <div class="col-sm-3">
      <div class="form-group">
     <label for="Faculty"><b>Branch</b></label>   
     <select class="form-control custom-select my-1 mr-sm-2"   name="filter_branch">
     <option selected disabled>Filter Branch</option>
      <?php foreach($list_branch as $val) { ?>
      <option  <?php if(@$filter_branch==$val->branch_id) { echo "selected"; } ?> value="<?php echo $val->branch_name; ?>"> <?php echo $val->branch_name; ?></option>
     <?php } ?>
    </select>
    </div>
  </div>
    <div class="col-sm-3">
      <div class="form-group">
         <label for="Faculty"><b>Course</b></label>   
    <select class="form-control"   name="filter_course">
      <option selected disabled>Course</option>
    <?php foreach($list_course as $val) { if($val->status=="0") { ?>
    <option   <?php if(@$filter_course==$val->course_name) { echo "selected"  ; } ?> value="<?php echo $val->course_id; ?>"> <?php echo $val->course_name; ?></option>
      <?php } } ?>
      </select>
   </div>
 </div>
 <div class="col-sm-3">
      <div class="form-group">
         <label for="Faculty"><b>Package</b></label>   
    <select class="form-control"   name="filter_package">
      <option selected disabled>Package</option>
    <?php foreach($list_package as $val) { if($val->status=="0") { ?>
    <option   <?php if(@$filter_package==$val->package_name) { echo "selected"  ; } ?> value="<?php echo $val->package_id; ?>"> <?php echo $val->package_name; ?></option>
      <?php } } ?>
      </select>
   </div>
 </div>
 <div class="col-sm-3">
      <div class="form-group">
         <label for="Faculty"><b>Batch</b></label>   
    <select class="form-control"   name="filter_batch">
      <option selected disabled>Batch</option>
    <?php foreach($list_batch as $val) {  ?>
    <option   <?php if(@$filter_batch==$val->batch_name) { echo "selected"  ; } ?> value="<?php echo $val->batch_id; ?>"> <?php echo $val->batch_name; ?></option>
    <?php  } ?>
      </select>
   </div>
 </div>
</div>
<div class="float-right">
<input type="submit" id="btn" class="btn btn-success f" value="Search" name="filter_admission">
    <a class="btn btn-danger f" href="<?php echo base_url(); ?>AddmissionController/default_search">Reset</a>
  </div>
</form>
    </p>
  </div>
</div>

  
  <?php if(isset($all_admission)){ ?>
                 <?php $to=0; foreach($all_admission as $val)  { $to++;  } ?>
   <div class="card-header">
    <b> Admission Count : <label class="btn-sm text-black pos"><?php echo $to; ?></label></b>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
       <table  id="example" class="table table-str iped">
                <thead>
                  <tr class="t1">
                  <th  ><b>S_NO</b></th>
                  <th  scope="col"><b>Admission <br> Details</b></th>
                  <th  scope="col"><b>Student / Parents / Details</b></th>
                  <th  scope="col"><b>Category & Course / Batch Details</b></th>
                  <th  scope="col"><b>Adm Branch / Assigned To</b></th>                
                  <th  scope="col"><b>Fees Pmt & Gateway</b></th>
                  <th scope="col"><b>Combined / Amount</b></th>
                  <th scope="col"><b>Action</b></th>
                  </tr>
                </thead>
                <tbody>
                  <?php $sno=1; foreach($all_admission as $val) { ?>
                  <tr class="td1">
                   <td>
                   <?php echo $sno; ?>
                    </td>
                    <td>
                        <?php echo "<b>RNW</b>/".''. $val->branch_code; ?>/<br>
                        <?php echo "<b>Year :</b>".''. $val->year; ?>/<br>
                        <?php echo "<b>GR ID :</b>".''. $val->gr_id; ?>/
                        <?php echo $val->admission_number; ?><br> 
                        <?php echo  $val->admission_date; ?>
                        </td>
                        <td>
                          <?php echo $val->surname; ?> 
                          <?php echo $val->first_name; ?> 
                          <?php if(!empty($val->father_name)) { echo $val->father_name."<br>"; }  ?>
                          <?php if(!empty($val->email)) { echo $val->email."<br>"; }  ?>
                         <?php if(!empty($val->mobile_no)) { echo $val->mobile_no."<br>"; } ?>
                         <?php if(!empty($val->father_mobile_no)) { echo $val->father_mobile_no."<br>"; } ?>
                      </td>
                      <td>
                        <?php if(!empty($val->type)) { echo $val->type."<br>"; } ?>
                       <?php $branch_ids = explode(",",$val->package_id);
                        foreach($list_package as $row) { if(in_array($row->package_id,$branch_ids)) {  echo $row->package_name."<br>"; }  } ?>
                        <?php $branch_ids = explode(",",$val->course_id);
                        foreach($list_course as $row) { if(in_array($row->course_id,$branch_ids)) {  echo $row->course_name."<br>"; }  } ?>
                        <?php $branch_ids = explode(",",$val->faculty_id);
                        foreach($faculty_all as $row) { if(in_array($row->faculty_id,$branch_ids)) {  echo $row->name."<br>"; }  } ?>
                        <?php $branch_ids = explode(",",$val->batch_id);
                        foreach($list_batch as $row) { if(in_array($row->batch_id,$branch_ids)) {  echo $row->batch_name; }  } ?>
                      </td>
                      <td >
                        <?php $branch_ids = explode(",",$val->admission_branch);
                        foreach($list_branch as $row) { if(in_array($row->branch_id,$branch_ids)) {  echo $row->branch_name; }  } ?><br>
                        <?php echo $val->addby; ?>
                      </td>
                      <td >
                        <?php echo "<b>T :</b>".''. $val->tuation_fees; ?><br>
                        <?php echo "<b>P :</b>".''. $val->registration_fees; ?>
                      </td>
                      <td></td>
                      <td>
                      <div class="dropdown">
                              <button type="button" class="btn-sm btn-warning dropdown-toggle" data-toggle="dropdown">
                                Action
                              </button>
                              <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php echo base_url(); ?>AddmissionController/basic_info?action=edit&id=<?php echo @$val->admission_id; ?>">view</a>
                            <a class="dropdown-item" href="<?php echo base_url(); ?>AddmissionController/admission_update?action=edit&id=<?php echo @$val->admission_id; ?>">Edit</a>                                
                              </div>
                            </div>
                      </td>                                        
                  </tr>
                <?php $sno++; } }?>
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




