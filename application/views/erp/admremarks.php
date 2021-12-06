
        <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/select2.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
    font-size: 16px;
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
  font: center;
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
   .test {
  
  background-color: yellow;
}

</style>

<main  class="main_content d-inline-block">
  


  <section>
   
   <div class="card">
  <div class="card-body">
    <h5 class="card-title"><b>Basic Info</b>
    <label class="float-right">
    <a href="<?php echo base_url(); ?>AddmissionController/admission_view" class="btn-sm btn-primary">Back</a>
    </label>
    </h5>
    <p class="card-text">
      <div class="row">
      <div class="col-sm-2">
                <div class="form-group">
                  <img src="<?php echo base_url(); ?>dist/admimages/<?php echo $admission->file_name;  ?>" name="aboutme" width="100" height="100" border="1" class="rounded-circle"><br>
      
                <a style="margin-left: 40px;" href="" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-edit" style="font-size:20px;color:#0b527e;"></i></a> 
            </div>
          </div>
              <div class="col-sm-3">
                <div class="form-group">
              <span>
            <b>Name :</b> <?php echo @$admission->surname; ?> <?php echo @$admission->first_name; ?></span>
             <a  href="" data-toggle="modal" data-target="#exampleModalll"><i class="fa fa-edit" style="font-size:18px;color:#0b527e;"></i></a>
            <br><br>

            <span><b>Email :</b> <?php echo @$admission->email; ?></span><br><br>
            <span><b>Contact :</b> <?php echo @$admission->mobile_no; ?></span>
            </div>
          </div>
            <div class="col-sm-3">
              <div class="form-group">
                <span><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo @$admission->admission_date; ?></span> 
                <span><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo @$admission->admission_time; ?></span><br><br>
            <span><b>Brnach :</b> <?php $branch_ids = explode(",",$admission->branch_id);   
                        foreach($list_branch as $row) { if(in_array($row->branch_id,$branch_ids)) {  echo $row->branch_name; }  } ?>
            </span><br><br>
            <span><b>Addby :</b> <?php echo @$admission->addby; ?></span>
          </div>
        </div>
        <div class="col-sm-3">
              <div class="form-group">
                <span><b>GR ID :</b> <?php echo @$admission->gr_id; ?><br><br>
               <span><b>Reg Id :</b> <?php echo" RNW /Year ".''. @$admission->session;?>/<?php echo @$admission->admission_number; ?></span><br><br>
            <span><b>Source Type :</b> <?php echo @$admission->source_id; ?>
            </span><br>   
            
          </div>
        </div>
        </div>      
    </p>
  </div>
</div>
  </section>


  
    <div class="card">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>AddmissionController/basic_info?action=edit&id=<?php echo @$admission->admission_id; ?>"><b>Basic Info</b></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>AddmissionController/admlogins?action=edit&id=<?php echo @$admission->admission_id; ?>"><b>Logins</b></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>AddmissionController/admcourses?action=edit&id=<?php echo @$admission->admission_id; ?>"><b>Courses</b></a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="<?php echo base_url(); ?>AddmissionController/admremarks?action=edit&id=<?php echo @$admission->admission_id; ?>"><b>Remarks</b></a>
      </li>
    </ul>
  </div>
  <div class="card-body">
    <!-- <h5 class="card-title">Special title treatment</h5> -->

    <p class="card-text">
      <button style="margin-left: 85.5%;" type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModall">
 AddRemarks
</button><br><br>
      <table  id="example" class="table table-str iped">
                <thead>
                  <tr class="t1">
                    <th>S_No</th>
                    <th>Date-Time</th>
                    <th>Remarks</th>
                    <th>Addby</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $sno=1; foreach($list_remark as $val) { ?>
                  <tr class="td1">
                    <td>
                   <?php echo $sno; ?>
                  </td>
                    <td>
                      <?php echo $val->remarks_date; ?><br>
                      <?php echo $val->remarks_time; ?>
                    </td>
                    <td>
                    <?php echo $val->admission_remrak; ?>
                    </td>
                    <td>
                    <?php echo $val->addby; ?>
                    </td>                        
                  </tr>
                  <?php $sno++; } ?>
                </tbody>
              </table>
      </p>
  </div>
</div>
  


  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Image Upload</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="submit">
          <div class="form-group">
                    <input type="hidden" name="admission_id" id="admission_id" value="<?php echo @$admission->admission_id; ?>" >
                </div>

                <div class="form-group">
                  <label for="exampleFormControlFile1"><b>Upload Photo:</b></label>
                  <input type="file" class="form-control-file" name="file" id="file" required>
                </div>
               <div class="form-group">
                    <button class="btn btn-success" id="btn_upload" type="submit">Upload</button>
                </div>
              
             </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- modal 2 -->

<div class="modal fade" id="exampleModalll" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="max-width: 600px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Basic Details Update</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
      <div class="modal-body">
          <form method="post">
            <input type="hidden" name="update_id" id="update_id" class="form-control" value="<?php echo @$admission->admission_id; ?>">
           <div class="form-row">
          <div class="form-group col-md-4">
            <label for="surname"><b>Surname</b></label>
            <input type="text" name="surname"  id="surname" class="form-control" value="<?php echo @$admission->surname; ?>">
          </div>
          <div class="form-group col-md-4">
            <label for="firstname"><b>First Name</b></label>
            <input type="text" name="first_name"  id="first_name" class="form-control" value="<?php echo @$admission->first_name; ?>">
          </div>
          <div class="form-group col-md-4">
            <label for="inputEmail4"><b>Email</b></label>
             <input type="text" name="email"  id="email" class="form-control"value="<?php echo @$admission->email; ?>">
          </div>
          <div class="form-group col-md-4">
            <label for="inputEmail4"><b>Contect</b></label>
              <input type="text" name="mobile_no"  id="mobile_no" class="form-control" value="<?php echo @$admission->mobile_no; ?>">
          </div>
          <div class="form-group col-md-4">
            <label for="inputEmail4"><b>Branch</b></label>
             <select class="form-control" name="admission_branch" id="admission_branch">
                     <option value="">Select branch</option>
                            <?php foreach($list_branch as $ld) { ?>
                              <option <?php if($ld->branch_id==@$admission->admission_branch) { echo "selected"; } ?> 
                               value="<?php echo $ld->branch_id; ?>"><?php echo $ld->branch_name; ?></option>
                            <?php } ?>  
                  </select>
          </div>
          </div>
      </form>
      </div>
     
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        <button type="button" id="btn_update" class="btn btn-success">Save</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal3 -->
<div class="modal fade" id="exampleModall" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="max-width: 600px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Remarks</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <?php 
                        date_default_timezone_set("Asia/Calcutta");

                          $remarks_date =  date('d/m/Y');
                          $remarks_time =  date('h:i A');
                         $addby =  $_SESSION['Admin']['username'];

                       ?> 
      <div class="modal-body">
         <form method="post">
            <input type="hidden" name="update_id" id="update_id" class="form-control" value="<?php echo @$admission->admission_id; ?>">
           <div class="form-row">
          <div class="form-group col-md-6">
            <label for="surname"><b>Incident Date: *</b></label>
           <input type="hidden" name="addby" id="addby" value="<?php if(isset($addby)){ echo $addby; } ?>" placeholder="Assigned To" class="form-control" />
                    <input type="text" name="remarks_date" id="remarks_date" class="form-control"  value="<?php if(isset($remarks_date)){ echo $remarks_date; } ?>">
          </div>
          <div class="form-group col-md-6">
            <label for="firstname"><b>Incident Time: *</b></label>
            <input type="text" name="remarks_time" id="remarks_time" class="form-control" value="<?php if(isset($remarks_time)){ echo $remarks_time; } ?>">
          </div>
           <div class="form-group col-md-12 form_validation">
            <label for="firstname"><b>Remarks:</b></label>
            <textarea name="admission_remrak" id="admission_remrak" class="form-control" ></textarea>
          </div>
        
      </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
         <button type="button" id="btn_ins" class="btn btn-success">Save</button>
      </div>
    </div>
  </div>
</div>
 
<script src="<?php echo base_url(); ?>assets/js/jquery-2.2.4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js "></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-timepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>

<script src="<?php echo base_url(); ?>dist/js/select2.full.min.js"></script>
    <script src="<?php echo base_url(); ?>dist/js/select2.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Data table and pagination & searching -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script>
 $(document).ready(function() {
    $('#example').DataTable();
} );
</script>

<script type="text/javascript">

         $('#btn_update').on('click',function(){
            var update_id = $('#update_id').val();
            var first_name = $('#first_name').val();
            var surname = $('#surname').val();
            var email = $('#email').val();
            var mobile_no = $('#mobile_no').val();
            var admission_branch = $('#admission_branch').val();
            
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url()?>AddmissionController/upd_basic_info",
                dataType : "JSON",
                data : {'update_id' : update_id , 'first_name' : first_name ,'surname' : surname ,'email' : email ,'mobile_no' : mobile_no ,'admission_branch' : admission_branch },
                success: function(data){
                  // $('#exampleModal').modal().hide();
                  $("#update_id").val("");
                  $("#first_name").val("");
                  $("#surname").val("");
                  $("#email").val("");
                  $("#mobile_no").val("");
                  $("#admission_branch").val("");
                  $("#source_id").val("");
                }
            });
            return false;
        });

    </script>

    <script type="text/javascript">
         $(document).ready(function(){
 
        $('#submit').submit(function(e){
            e.preventDefault(); 
                 $.ajax({
                     url:'<?php echo base_url();?>AddmissionController/do_upload',
                     type:"post",
                     data:new FormData(this),
                     processData:false,
                     contentType:false,
                     cache:false,
                     async:false,
                      success: function(data){
                          alert("Upload Image Successful.");
                          $("#admission_id").val("");
                          $("#file").val("");
                   }
                 });
            });
         
 
    });
    </script>

     <script type="text/javascript">
      $('#btn_ins').on('click',function(){
            var admission_id = $('#admission_id').val();
            var admission_remrak = $('#admission_remrak').val();
            var remarks_date = $('#remarks_date').val();
            var remarks_time = $('#remarks_time').val();
            var addby = $('#addby').val();
            
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url()?>AddmissionController/ins_remarks",
                dataType : "JSON",
                data : {'admission_id' : admission_id , 'admission_remrak' : admission_remrak , 'remarks_date' : remarks_date , 'remarks_time' : remarks_time , 'addby' : addby },
                success: function(data){
                  // $('#exampleModal').modal().hide();
                  //$("#admission_id").val("");
                  $("#admission_remrak").val("");
                }
            });
            return false;
        });
    </script>

    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
// just for the demos, avoids form submit
$(document).ready(function(){
  $('.form_validation').validate({
    rules: {
      admission_remrak :{
        required :true
      }
      
      
    },
    messages:{
      admission_remrak :{
        required : "<span style='color:red'>Please Enter Remarks</span>"
      }
      
    }
    });
}
  </script>



