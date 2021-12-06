

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



<!-- Milan Bhut [S] -->

<style>

  select#course_orsingle,select#department,select#branch {

    font-size: 12px;

  }

  input.btn.t1 {

    font-size: 12px;

    padding: 4px 8px;

  }

</style>

<!-- Milan Bhut [E] -->

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

        <div class="col-lg-6">

          <div class="accordion" id="student_list_aoc">

            <?php if(@$this->session->flashdata('msg_upd')) { ?>           

                <div id="yellow" class='btn btn-sm bg-light ml-4'>

            <?php echo $this->session->flashdata('msg_upd'); ?>

          </div>

          <?php } ?>



          <?php if(@$this->session->flashdata('msg_ins')) { ?>       

                <div id="yellow" class='btn btn-sm bg-light ml-4'>

            <?php echo $this->session->flashdata('msg_ins'); ?>

          </div> 

          <?php } ?>

                  <div id="data_insert_msg">

                <div class="card">

              <div class="card-header mb-0" style="background-color: #0b527e;">

                <h2 class="mb-0">

                  <button class="btn btn-link w-100 text-left collapsed" style="font-size: 12px;" type="button" data-toggle="collapse" data-target="#student_filter_panel_4" aria-expanded="false">

                   Documents<span class="d-inline-block float-right pluse_icon">✕</span>

                  </button>

                </h2>

              </div>

              <div id="student_filter_panel_4" class="collapse show">

                <div class="card-body" style="font-size: 12px;">

                  <form  enctype="multipart/form-data" method="post" action="<?php echo base_url(); ?>AddmissionController/documents"> 

                    <input type="hidden" name="update_id" value="<?php if(!empty($select_documents->documents_id)) { echo $select_documents->documents_id; } ?>"/>

                    <div class="row">

                    	<div class="col-sm-6">

                          <div class="form-group">

                            <label>Branch:</label>

                            <select class="form-control" name="branch_id"  id="branch">

                              <option value="">Select Branch</option>

                              <?php foreach($list_branch as $lp) { ?>

                        <option <?php if($lp->branch_id==@$select_documents->branch_id) { echo "selected"; } ?> 

                         value="<?php echo $lp->branch_id; ?>"><?php echo $lp->branch_name; ?></option>

                      <?php } ?>

                            </select>

                          </div>

                        </div>

                        <div class="col-sm-6">

                          <div class="form-group">

                            <label>Department:</label>

                            <select class="form-control" name="department_id"  id="department">

                                <option value="">Select Department</option>

                              <?php foreach($list_department as $lp) { ?>

                        <option <?php if($lp->department_id==@$select_documents->department_id) { echo "selected"; } ?> value="<?php echo $lp->department_id; ?>"><?php echo $lp->department_name; ?></option>

                      <?php } ?>

                            </select>

                          </div>

                        </div>

                        <div class="col-sm-6">

                  <div class="form-group">

                      <label>Course Category:</label>

                      <ul>

                          <li class="d-inline-block mr-3 mr-mr-0">

                              <div class="form-check form-check-inline">

                                  <input class="form-check-input" type="radio" id="course_package" name="type" value="package" <?php if(@$select_documents->type=="package") { echo "checked"; } ?> onclick="return show_hide_package_course()" />Package

                              </div>

                              <div class="form-check form-check-inline">

                                  <input class="form-check-input" type="radio" id="course_single" name="type"  value="single" <?php if(@$select_documents->type=="single") { echo "checked"; } ?> onclick="return show_hide_package_course()"/>Single

                              </div>

                          </li>

                      </ul>

                  </div>

                </div>

                        

                <div class="col-sm-6 select_course_package">

                <div class="form-group">

                  <label>Select Package:</label>

                    <select class="form-control" name="course_or_package" id="course_orpackage">

                              <option value="">Select Package</option>

                   <?php foreach($list_package as $lp) { ?>

                      <option <?php if($lp->package_id==@$select_documents->package_id) { echo "selected"; } ?>

                         value="<?php echo $lp->package_id; ?>"><?php echo $lp->package_name; ?></option>

                      <?php } ?>

                  </select>

                </div>

              </div>

              <div class="col-sm-6 select_course_single">

                <div class="form-group">

                  <label>Select Course:</label>

                   <select class="form-control" name="course_or_single" id="course_orsingle">

                              <option value="">Select Course</option>

                          <?php foreach($list_course as $lp) { ?>

                        <option <?php if($lp->course_id==@$select_documents->course_id) { echo "selected"; } ?> value="<?php echo $lp->course_id; ?>"><?php echo $lp->course_name; ?></option>

                      <?php } ?> 

                      </select>

                  </div>

              </div>

    					<div class="col-sm-6">

                       <div class="form-group">

                <label for="exampleInputEmail1">Course OR Package:</label><br>

                <input type="radio"  name="condition_course_package" id="course" value="yes" <?php if(@$select_documents->condition_course_package=="yes") { echo "checked"; } ?> placeholder="content" >Yes

             

                <input type="radio"  name="condition_course_package" id="package" value="no" <?php if(@$select_documents->condition_course_package=="no") { echo "checked"; } ?> placeholder="content" >No

              </div>

              </div>

               <div class="col-sm-6">

                       <div class="form-group">

                <label for="exampleInputEmail1">Photos:</label><br>

                <input type="radio"  name="photos" id="exampleInputEmail1" value="yes" <?php if(@$select_documents->photos=="yes") { echo "checked"; } ?> placeholder="content">Yes

             

                <input type="radio"  name="photos" id="exampleInputEmail1" value="no" <?php if(@$select_documents->photos=="no") { echo "checked"; } ?> placeholder="content">No

              </div>

              </div>

    					<div class="col-sm-6">

                       <div class="form-group">

				      	<label for="exampleInputEmail1">10th Marksheet:</label><br>

				      	<input type="radio"  name="tenth_marksheet" id="exampleInputEmail1" value="yes" <?php if(@$select_documents->tenth_marksheet=="yes") { echo "checked"; } ?> placeholder="content">Yes

				     

				        <input type="radio"  name="tenth_marksheet" id="exampleInputEmail1" value="no" <?php if(@$select_documents->tenth_marksheet=="no") { echo "checked"; } ?> placeholder="content">No

    					</div>

    					</div>

    					<div class="col-sm-6">

                       <div class="form-group">

				      	<label for="exampleInputEmail1">12th Marksheet:</label><br>

				      	<input type="radio"  name="twelth_marksheet" id="exampleInputEmail1" value="yes" <?php if(@$select_documents->twelth_marksheet=="yes") { echo "checked"; } ?> placeholder="content">Yes

				     

				        <input type="radio"  name="twelth_marksheet" id="exampleInputEmail1" value="no" <?php if(@$select_documents->twelth_marksheet=="no") { echo "checked"; } ?> placeholder="content">No

    					</div>

    					</div>

                      	<div class="col-sm-6">

                       <div class="form-group">

				      	<label for="exampleInputEmail1">Leaving Certy:</label><br>

				      	<input type="radio"  name="leaving_certy" id="exampleInputEmail1" value="yes" <?php if(@$select_documents->leaving_certy=="yes") { echo "checked"; } ?> placeholder="content">Yes

				     

				        <input type="radio"  name="leaving_certy" id="exampleInputEmail1" value="no" <?php if(@$select_documents->leaving_certy=="no") { echo "checked"; } ?> placeholder="content">No

    					</div>

    					</div>

                       	<div class="col-sm-6">

                       <div class="form-group">

				      	<label for="exampleInputEmail1">Treal Certy:</label><br>

				      	<input type="radio"  name="treal_certy" id="exampleInputEmail1" value="yes" <?php if(@$select_documents->treal_certy=="yes") { echo "checked"; } ?> placeholder="content">Yes

				     

				        <input type="radio"  name="treal_certy" id="exampleInputEmail1" value="no"  <?php if(@$select_documents->treal_certy=="no") { echo "checked"; } ?>placeholder="content">No

    					</div>

    					</div>

                        <div class="col-sm-6">

                       <div class="form-group">

				      	<label for="exampleInputEmail1">Light Bill:</label><br>

				      	<input type="radio"  name="light_bill" id="exampleInputEmail1" value="yes" <?php if(@$select_documents->light_bill=="yes") { echo "checked"; } ?> placeholder="content">Yes

				     

				        <input type="radio"  name="light_bill" id="exampleInputEmail1" value="no" <?php if(@$select_documents->light_bill=="no") { echo "checked"; } ?> placeholder="content">No

    					</div>

    					</div>

                        <div class="col-sm-6">

                       <div class="form-group">

				      	<label for="exampleInputEmail1">Aadhar Card:</label><br>

				      	<input type="radio"  name="aadhar_card" id="exampleInputEmail1" value="yes" <?php if(@$select_documents->aadhar_card=="yes") { echo "checked"; } ?> placeholder="content">Yes

				     

				        <input type="radio"  name="aadhar_card" id="exampleInputEmail1" value="no" <?php if(@$select_documents->aadhar_card=="no") { echo "checked"; } ?> placeholder="content">No

    					</div>

    					</div> 

                       	



                        <div class="col-xl-12">

                          <div class="form-group">

                            <input type="submit" name="submit" value="Save" class="btn t1">

                          </div>

                        </div>

                        

                    </div>

                  </form>

                </div>

              </div>  

            </div>

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

    Display Document Record

  </div>

  <div class="card-body">

    <blockquote class="blockquote mb-0">

       <table  id="example" class="table table-str iped">

                <thead>

                  <tr class="t1">

                    <th>S_No</th>

                    <th>Branch</th>

                    <th>Department</th>

                    <th>Course</th>

                    <th>Documents Details</th>  

                    <th>Action</th>

                  </tr>

                </thead>

                <tbody>

                  <?php $sno=1; foreach ($list_documents as $val) {?>

                  <tr class="td1">

                    <td>

                    <?php echo $sno; ?>

                  </td>

                     <td><?php $branch_ids = explode(",",$val->branch_id);

                                      foreach($list_branch as $row) { if(in_array($row->branch_id,$branch_ids)) {  echo $row->branch_name; }  } ?></td>

                      <td><?php $branch_ids = explode(",",$val->department_id);

                                      foreach($list_department as $row) { if(in_array($row->department_id,$branch_ids)) {  echo $row->department_name; }  } ?></td>                                   

                        <td>

                          <?php  echo "<b>Type :</b>".''. $val->type; ?> <br>

                          <?php  $branch_ids = explode(",",$val->course_id);

                                      foreach($list_course as $row) { if(in_array($row->course_id,$branch_ids)) {  echo "<b>Course :</b>".''. $row->course_name; }  } ?>

                          <?php  $branch_ids = explode(",",$val->package_id);

                                      foreach($list_package as $row) { if(in_array($row->package_id,$branch_ids)) {  echo "<b>package :</b>".''. $row->package_name; }  } ?>             

                          <?php  echo "<b>Condition :</b>".''. $val->condition_course_package; ?></td>

                          <td>

                          <?php  echo "<b>Photos :</b>".''. $val->photos; ?>

                          <?php  echo "<b>10th Marksheet :</b>".''. $val->tenth_marksheet; ?>

                          <?php  echo "<b>12th Marksheet :</b>".''. $val->twelth_marksheet; ?><br>

                          <?php  echo "<b>Leaving Certy :</b>".''. $val->leaving_certy; ?>

                          <?php  echo "<b>Treal Certy :</b>".''. $val->treal_certy; ?>

                          <?php  echo "<b>Light Bill :</b>".''.$val->light_bill; ?><br>

                          <?php  echo "<b>Aadhar Card :</b>".''.$val->aadhar_card; ?>

                         

                      </td>                                                

                                  <td>



                                  <?php if($_SESSION['logtype']=="Super Admin" || $_SESSION['logtype'] == "Admin") {  ?>

                                  <a href="<?php echo base_url(); ?>AddmissionController/documents?action=delete&id=<?php echo @$val->documents_id; ?>" onclick="return confirm('Are you sure you want to delete this Documents?');" class="btn btn-xs btn-danger"><i class="fa fa-remove"></i></a>

                                  

                                  <a href="<?php echo base_url(); ?>AddmissionController/documents?action=edit&id=<?php echo @$val->documents_id; ?>"  class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>

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

    url:"<?php echo base_url(); ?>settings/fetch_documnet_barnch_wise_departmet", 

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



<script>

    

   if (document.getElementById("yellow") != null) {

    setTimeout(function() {

      document.getElementById('yellow').style.display = 'none';

    }, 5000);

  }

</script>







