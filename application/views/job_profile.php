<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">

<!-- Font Awesome -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

<!-- Ionicons -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

<!-- DataTables -->

<link rel="stylesheet" href="<?php echo base_url(); ?>plugins/datatables/dataTables.bootstrap.css">

<!-- Theme style -->

<link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/AdminLTE.min.css">

<!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->

<link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/skins/_all-skins.min.css">

<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

<style>

body {

  font-family: 'Poppins', sans-serif;

  font-size: 12.5px;

}

.bg {

  background-image: url(..//images/interview_2.jpg);

  background-size: cover;

  background-position: center;

}

.btn, .form-control {font-size: 12.5px;}

label {font-weight: bold; margin-bottom: 10px; margin-top: 20px;}

.text-red {color: #ed1d25!important;}

.shadow {box-shadow: 0 0 10px #ed1d25!important;}

.bg-white {background-color: #fff !important;}

.bg-grey {background-color: #eaeaea !important;}

.footer-bg {background: rgb(27, 29, 38) !important;}

.text-footer {color: #777;}

.btn-100{width: 100% !important;}

.w-90 {width: 90%;}

.d-flex {

  display: flex;

  flex-wrap: wrap;

}

.justify-center {justify-content: center;}

.justify-space-between {justify-content: space-between;}

.mt-5 {margin-top: 30px;}

.nav-tabs>li.active>a,

.nav-tabs>li.active>a:focus,

.nav-tabs>li.active>a:hover {

  background: #009efb;

  color: white;

  padding: 5px 15px;

}

.nav-tabs>li>a {padding: 5px 15px;}

.nav-tabs>li>a:hover {border-radius: 0;}

.table>thead>tr>th,

.table>tbody>tr>th,

.table>tfoot>tr>th,

.table>thead>tr>td,

.table>tbody>tr>td,

.table>tfoot>tr>td {

  border-top: 1px solid #e9ecef;

  padding: 10px;

}

.table>thead>tr>th {vertical-align: middle;}

.table>tbody>tr>td>span {opacity: 0.65;}

.all-btn a {margin: 0 5px;}

.box-header {padding: 8px 0;}

.btn {border-radius: 0; transition: all 0.5s;}

.text-white {color: white;}

.all-btn span {padding: 0 10px; background: white; margin-left: 10px; border-radius: 5px;}

.inactive-a {background: rgb(66,133,244);}

.inactive-a>span {color: rgb(66,133,244);}

.active-a {background: rgb(244,180,0);}

.active-a>span {color: rgb(244,180,0);}

.postpone-a {background: rgb(171,71,188);}

.postpone-a>span {color: rgb(171,71,188);}

.confirm-a {background: rgb(15,157,88);}

.confirm-a>span {color: rgb(15,157,88);}

.discart-a {background: rgb(219,68,55);}

.discart-a>span {color: rgb(219,68,55);}

.profile-a {background: rgb(0, 172, 193);}

.profile-a>span {color: rgb(0, 172, 193);}

.inactive-a:hover, .inactive-a:focus,

.active-a:hover, .active-a:focus,

.postpone-a:hover, .postpone-a:focus,

.confirm-a:hover, .confirm-a:focus,

.discart-a:hover, .discart-a:focus,

.profile-a:hover, .profile-a:focus {

   color: white;

}

.nav-tabs>li>a {margin-right: 15px;}

.nav-tabs>li.active>a,

.nav-tabs>li.active>a:focus,

.nav-tabs>li.active>a:hover {border-radius: 0;}

.form-control {

   height: auto;

   padding: 4px 7px;

   line-height: 24px;

}

</style>

  

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

<!-- Content Header (Page header) -->

<section class="content-header">

   <h1 class="text-center">Job Application</h1>

   <ol class="breadcrumb">

      <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>

      <li class="active">Job Application</li>

   </ol>

   <div class="row text-uppercase d-flex all-btn justify-center" style="margin-top:20px;">

  

      <a class="btn text-white inactive-a"  href="<?php echo base_url(); ?>FormController/jobApplication?status=inactive">New<span><?php echo $newRecord; ?></span></a>

   

      <a class="btn text-white active-a"  href="<?php echo base_url(); ?>FormController/jobApplication?status=active">Active<span><?php echo $activeRecord; ?></span></a>  

       

      <a class="btn text-white confirm-a" href="<?php echo base_url(); ?>FormController/jobApplication?status=confirm">Confirm<span><?php echo $confirmRecord; ?></span></a> 

       



      

        <a class="btn text-white postpone-a" href="<?php echo base_url(); ?>FormController/jobApplication?status=postpone">Postponed<span><?php echo $postponeRecord; ?></span></a>  

     

      <a class="btn text-white discart-a" href="<?php echo base_url(); ?>FormController/jobApplication?status=discard">Discart<span><?php echo $discardRecord; ?></span></a>

      <!-- <a class="btn text-white discart-a" data-toggle="modal" data-target="#myModal_discart">Discart<span><?php echo $discardRecord; ?></span></a> -->

      <a class="btn text-white profile-a" href="<?php echo base_url(); ?>FormController/profile">Profile<span></span></a>

      

   </div>

</section>



<style>

	.thead-danger {

		background:#232323;

		color: #fff;

	}

	.table .thead-danger th {

		font-weight: 500;

	}

  table th{

    font-weight: 400 !important;

    text-align: center;

    font-size: 16px;

    color: #fff;

  }

</style>



<!-- Main content -->

<section class="content">

   <div class="col-md-12" id="filter_section">

          <div class="box box-primary" style="padding:20px;">

            <div class="box-header with-border" style="margin-bottom:10px;">

              <h3 class="box-title">Filter</h3>

            </div>

            <div class="row">

            <form method="post" action="<?php echo base_url(); ?>FormController/profile">

              <div class="col-md-3 my-2">

               <label><b>Branch</b></label>

             <select  class="form-control custom-select my-1 mr-sm-2" name="filter_branch"  >

                          <option value="">Select Branch</option>

                            <?php foreach($branch_all as $row) {

                            if(in_array($row->branch_id,$branch_ids) || $_SESSION['logtype']=="Super Admin") { ?>

                                

              <option <?php if(@$filter_branch==$row->branch_id) { echo "selected"; } ?>  value="<?php echo $row->branch_id; ?>"><?php echo $row->branch_name; ?></option>                      

                      <?php   } } ?>

             </select>

            

              </div>

                  

                

              <div class="col-md-3 my-2">

                <label><b>Faculty</b></label>

             <select  class="form-control custom-select my-1 mr-sm-2" name="filter_faculty"  >

                          <option value=""> Faculty</option>

                            <?php foreach($faculty_all as $val) {

                                

                                

                            @$bids = explode(",",@$val->branch_ids);

                            

                            

                            $bname="";

                            for($i=0;$i<sizeof(@$bids);$i++)

                            {

                                foreach($branch_all as $row) {   

                                    if($row->branch_id==@$bids[$i]) { if($bname=="") { $bname = $bname." ".$row->branch_name;}else { $bname = $bname." & ".$row->branch_name; } }

                                }

                            }

                            ?>

                            

                              <option  <?php if(@$filter_faculty==$val->faculty_id) { echo "selected"; } ?>    value="<?php echo $val->faculty_id; ?>"><?php echo $val->name; ?>-  <?php echo $val->department_name; ?>  - <?php echo $bname; ?></option>

                            <?php } ?>

                        </select>

              </div>

                   

                

              <div class="col-md-2 my-2">

                <label><b>Student Name</b></label>

             <input type="text"  class="form-control" value="<?php if(!empty($filter_fname)) { echo $filter_fname; } ?>"  id="" name="filter_fname" placeholder="Student Name">            

             </div>



             

                                  

             <div class="col-md-2 my-2">

                <label><b>Email</b></label>

             <input type="text"  class="form-control" value="<?php if(!empty($filter_email)) { echo $filter_email; } ?>"  id="" name="filter_email" placeholder="Example@gmail.com">            

             </div>



             <div class="col-md-2 my-2">

                <label><b>Mobile No</b></label>

             <input type="text"  class="form-control" value="<?php if(!empty($filter_mobile)) { echo $filter_mobile; } ?>"  id="" name="filter_mobile" placeholder="+91-00000-00000">            

             </div>

                                            

            <div class="col-md-3 my-2">

            <label><b>Position For Applied</b></label>

             <select class="form-control custom-select my-1 mr-sm-2"  name="filter_position_for_apply"  >

              <option value="">Position For Applied</option>

                <?php foreach($jobtype_all as $val) { ?>                                        

               <option  <?php if(@$filter_position_for_apply==$val->job_id) { echo "selected"; } ?> value="<?php echo $val->position; ?>"><?php echo $val->position; ?></option>

                <?php } ?>                                        

            </select>

            </div>

                 

                 

             <div class="col-md-3 my-2"> 

              <label><b>Application No</b></label>             

             <input type="text"  class="form-control" value="<?php if(!empty($filter_applicationId)) { echo $filter_applicationId; } ?>"  id="" name="filter_applicationId" placeholder="Filter Application No " >

              </div> 



              <div class="col-md-2 my-2" >

              <label><b>GR No</b></label>  

             <input type="text"  class="form-control" value="<?php if(!empty($filter_gr_id)) { echo $filter_gr_id; } ?>"  id="" name="filter_gr_id" placeholder="Filter GR No " >

              </div>



              <div class="col-sm-2 my-2" style="margin-top: 48px;">

             <input type="submit" class="btn btn-success" value="Filter" name="filter_profile"/>

              <a class="btn btn-danger" href="<?php echo base_url(); ?>FormController/profile">Reset</a>

              </div>    

             </form>      

             </div> 

          </div>

        </div>

                   <!-- Modal -->

  <div class="modal fade" id="myModal_discart" role="dialog">

    <div class="modal-dialog modal-lg w-90">

      <div class="modal-content">

        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Discart Application</h4>

        </div>

        <div class="modal-body">

          <table id="example1" class="table table-bordered table-striped example10">

                <thead class="thead-danger">

                <tr>

                   <th>Applicant Photo</th>

                   <th>Applicant Details</th>

                   <th>Position For Applied</th>

                   <th>Skill</th>

                   <th>Prefer Location For Job</th>

                    

                  <th>action</th>

                </tr>

                </thead>

                <tbody>

                <?php 



                if(count($application_job_all)>0){

                foreach($application_job_all as $val) {    ?>

                <tr>

                    

                    <td>

                      <?php echo $path =  FCPATH."/placement/img/".$val->photo; ?>

                      <img src="<?php echo $path; ?>" alt="face11" height="180px" width="180px"></td>

                  <td>Name : <?php echo $val->name; ?> <br>

                  Gr Id : <?php echo $val->gr_id; ?><br>

                  Number : <?php echo $val->number; ?><br>

                  Parent's Mobile: <?php echo $val->pphone; ?>

                  Faculty Name : 

                  <?php foreach($faculty_all as $row) { if($val->faculty_id==$row->faculty_id) { echo $row->name; } } ?>

                  </td>

                  

                  <td><?php echo $val->position_for_apply; ?></td>

                  <td><?php echo $val->skill; ?></td>

                  <td><?php echo $val->prefer_job_location; ?></td>

                 

                  

                 <td>

                 	     <div class="dropdown">

                            <button class="btn btn-sm btn-default dropdown-toggle" type="button" data-toggle="dropdown">Action

                            <span class="caret"></span></button>

                            <ul class="dropdown-menu">

                              <li><a href="<?php echo base_url(); ?>FormController/jobApplication?action=view&id=<?php echo @$val->application_id; ?>"> View</a></li>

                               <li><a href="<?php echo base_url(); ?>FormController/jobApplication?action=discard&id=<?php echo @$val->application_id; ?>&discard=1"> Restore</a></li>

                             </ul>

                          </div>

                  	</td>

                </tr>

                

             <?php } }  ?>

                

                </tfoot>

              </table>

        </div>

        <div class="modal-footer">

          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        </div>

      </div>

    </div>

  </div>

        

        

       

        

      

              <?php if(isset($all_application_data)){ ?>



		 

		 <div class="row">

        <div class="col-md-12" >

          <!-- general form elements -->

          <div class="box box-success" style="padding:20px;">

            <div class="box-header with-border">

              <h3 class="box-title">

                   <?php $to=0; foreach($all_application_data as $val)  { $to++;  } ?>

                  <b>Show Student Profile (Count: <?php echo $to; ?>) </b>

                  </h3>

            </div>

            <!-- /.box-header -->

           

            

            

           

<table id="example1" class="table table-bordered table-striped example10">

   <thead>

      <tr style="background-color: #3c8dbc;">

         <th width="10%">Applicant Photo</th>

         <th width="25%">Applicant Details</th>

         <th width="10%">Position For Applied</th>

         <th width="10%">Skill</th>

         <th width="10%">Prefer Location For Job</th>

         <th width="25%">Previous Employment?</th>

          <th width="5%">Action</th>

         <!-- <th width="5%">Status</th> -->

      </tr>

   </thead>

   <tbody>

      <?php 



     

      foreach($all_application_data as $val) { ?>

      <tr style="background-color: :green;">

         <td>

            <img src="http://demo.rnwmultimedia.com/placement/img/<?php echo $val->photo; ?>" alt="face" height="80px" width="80px">

         </td>

         <td>

            <span>Application_No</span> : <?php echo $val->application_number; ?>

            <br>

            <span>Name</span> : <?php echo $val->name; ?>

            <br>

            <span>Gr Id</span> : <?php echo $val->gr_id; ?>

            <br>

            <span>Number</span> : <?php echo $val->number; ?>

            <br>

            <span>Parent's Number</span> : <?php echo $val->parents_phone; ?>

            <br>

            <span>Faculty Name</span> : <?php foreach($faculty_all as $row) { if($val->faculty_id==$row->faculty_id) { echo $row->name; } } ?>

            <br>

            <span>Branch</span> : <?php foreach($branch_all as $row) { if($val->branch_id==$row->branch_id) { echo $row->branch_name; } } ?>

         </td>

         <td><?php echo $val->position_for_apply; ?></td>

         <td><?php echo $val->skill; ?></td>

         <td><?php echo $val->prefer_job_location; ?></td>

         <td><?php echo $val->company_name; ?> <br>  <?php echo $val->company_number; ?> <br> <?php echo $val->company_address; ?> <br>  <?php echo $val->starting_salary; ?><br>  <?php echo $val->ending_salary; ?> </td>

         <td class="text-center">

              <a href="#" class="btn btn-xs btn-default text-center" data-toggle="modal" data-target="#myModal_view" style="margin-bottom: 10px; padding: 5px; border-radius: 3px;" onclick="return get_student_record(<?php echo @$val->application_id; ?>)">

               <i class="fa fa-eye"></i>

             </a>

               <a class="btn btn-xs text-white active-a"  onclick="return get_add_remakrs('<?php echo $val->application_number; ?>')" >Add Remarks</a>

          </td>

         

         <?php if(@$_SESSION['user_name'] == 'URVIL PATEL' || @$_SESSION['user_name'] == 'Pradip Malaviya' ) { ?>

         <td>

             <div style="margin: 5px 0; width: 150px;">

               <select class="form-control btn-100" style="margin-bottom: 10px;" name="p_status" id="p_status<?php echo $i; ?>" onchange="return onchange_active_de(<?php echo $i; ?>)">

                <option value="">--select--</option>

                  <option value="New">New</option>

                  <option value="Active">Active</option>

                  <option value="Postpone">Postpone</option>

                  <option value="Confirm">Confirm</option>

                  <option value="Discart">Discart</option>  

               </select>



               <input type="hidden" name="change_status" id="change_status<?php echo $i; ?>">

               <div class="text-right">

                 <button style="background-color: #c52410;" type="button" onclick="return insert_record_status('<?php echo $val->application_number; ?>','')" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Submit</button>

               </div>

            </div>    

         </td>

         

         

      

      </tr>

    

      <?php } }?>

   </tfoot>

</table>

<input type="hidden" name="change_status_popup" id="change_status_popup">

<!-- Modal_ADD Status Remarks -->

<form method="post" id="add_status">

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <input class="form-control"type="hidden" name="user_name_re" id="user_name_re" value="<?php echo $_SESSION['user_name']; ?>" >

         <input type="hidden" name="application_id"  id="rem_application_status" value="<?php echo @$select_application->application_id; ?>">



       <?php   date_default_timezone_set("Asia/Calcutta");

          $dat_c = date('Y-m-d h:i:sA');  ?>



       <input type="hidden" name="cure_date"  id="cure_date" value="<?php echo @$dat_c; ?>"> 

        <h3 class="modal-title" id="exampleModalLabel">Remarks</h3>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

        <form>

          <div class="form-group">

            <label for="recipient-name" class="col-form-label">Remarks:</label>

            <input type="text" class="form-control" id="u_status">

          </div>

         

        </form>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        <button type="button" class="btn btn-primary" onclick="return insert_status_remarks()">Submit</button>

      </div>

    </div>

  </div>

</div>

</form>



<!-- Modal_ADD REMARKS -->

<form method="post" id="add_remarks">

<div class="modal fade" id="myModal_remarks" role="dialog">

<div class="modal-dialog modal-lg">

<div class="modal-content">

   <div class="modal-header">

      <button type="button" class="close" data-dismiss="modal">&times;</button>

      <h4 class="modal-title">Applicant Remarks</h4>

   </div>

   <div class="modal-body">

      <div class="col-md-4">

        <input class="form-control"type="hidden" name="user_name_re" id="user_name_re" value="<?php echo $_SESSION['user_name']; ?>"  >

         <input type="hidden" name="application_id"  id="rem_application" value="<?php echo @$select_application->application_id; ?>">



       <?php   date_default_timezone_set("Asia/Calcutta");

          $dat_c = date('Y-m-d h:i:sA');  ?>



       <input type="hidden" name="cure_date"  id="cure_date" value="<?php echo @$dat_c; ?>">

         <h5>Select Label</h5>

         <select class="btn-100 form-control" name="label_rem" id="label_rem" 

         onchange="return get_label_work()">

            <option value="">--select Label--</option>

            <option value="Assign Work Checking">Assign Work Checking</option>

            <option value="Work Pending">Work Pending</option>

            <option value="Work Complete">Work Complete</option>

            <option name="company_assign">Assign Company & Location</option>

            <option name="student_absent">Student Absent</option>

            <option value="Location Issue">Location Issue</option>

            <option value="Salary Issue">Salary Issue</option>  

            <option value="Bond Issue">Bond Issue</option>

            <option value="Personal Issue">Personal Issue</option>

            <option value="Talk With Student">Talk With Student</option>

            <option value="Talk With Parents">Talk With Parents</option>

            <option value="Discipline">Discipline</option>

            <option value="Study">Study</option>

            <option value="Fees">Fees</option>

            <option value="Others">Others</option>

         </select>



         <br><br>



         <select class="btn-100 form-control" name="assign_faculty" id="assign_faculty">

            <option value="">-- select-- </option>

            <?php foreach($upd_faculty as $f) { ?>

                <option value="<?php echo $f->name; ?>"><?php echo $f->name; ?></option>

            <?php } ?>

         </select>



      </div>

      <div class="col-md-8">

         <h5>Add Remark</h5>

         <textarea rows="5" class="btn-100 form-control" id="remarks_job" name="remarks_job">

           



         </textarea>

      </div>

      <div class="clearfix"></div> 

   </div>

   <div class="modal-footer">

      <button type="button" onclick="return insert_record_remarks()" value="submit" name="submit" class="btn btn-success">Submit</button>

      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

   </div>

</div>

</div>

</div>

</form>

<!--Modal_Close-->



<!-- Modal_VIEW APPLICANT DETAILS -->

<div class="modal fade" id="myModal_view" role="dialog">

<div class="modal-dialog modal-lg w-90">

<div class="modal-content">

   <div class="modal-header">

      <button type="button" class="close" data-dismiss="modal">&times;</button>

      <h4 class="modal-title">Applicant Details</h4>

   </div>

   <div class="modal-body" id="result">

    

   </div>

   <div class="modal-footer">

      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

   </div>

</div>

</div>

</div>

<!--Modal_Close-->



</div>

</div>

</div>

   <?php } ?>

   <?php if(!empty($select_application)) { ?>

        



<div class="row">

<div class="col-md-12" >

<!-- general form elements -->

<div class="box box-success" style="padding:20px;">

  <div class="box-header with-border text-center" style="padding: 10px 0; margin-bottom: 15px;">

    <h3 class="box-title"><strong>Employee Information Form</strong></h3>

  </div>

  <div class="d-flex justify-space-between">

    <p>Application Date : <strong><?php echo @$select_application->application_date; ?></strong></p>

    <p>Application No : <strong><?php echo @$select_application->application_number; ?></strong></p>

  </div>

            <ul class="nav nav-tabs text-uppercase d-flex justify-center">

            <li class="active"><a data-toggle="tab" href="#home" onclick="return show_menu4_submit()"> Applicant Information</a></li>

            <li><a data-toggle="tab" href="#menu1" onclick="return show_menu4_submit()">Previous Employment</a></li>

            <li><a data-toggle="tab" href="#menu2" onclick="return show_menu4_submit()">Faculty Use Only</a></li>

            <li><a data-toggle="tab" href="#menu3" onclick="return show_menu4_submit()">Status</a></li>

            <li><a data-toggle="tab" href="#menu4" onclick="return hide_menu4_submit()">Remarks</a></li>

          </ul>

        <form method="post" action="<?php echo base_url(); ?>/FormController/jobApplication" enctype= multipart/form-data>

                 <input type="hidden" name="application_id" value="<?php echo @$select_application->application_id; ?>">

          <div class="tab-content">

            <div id="home" class="tab-pane fade in active">

           <?php if(@$_SESSION['user_name'] == 'URVIL PATEL' || @$_SESSION['user_name'] == 'Pradip Malaviya' ) { ?>

             <div class="row" style="padding-top:20px; padding-bottom:20px">

                                <div class="col-md-3 my-2">

                                    <img src="https://www.rnwmultimedia.com/applications/images/application_images/<?php echo $val->photo; ?>" alt="face" height="150px" width="150px">

                                </div>

                            

                                <?php @$name = explode(" ",@$select_application->name); ?>

                                <div class="col-md-3 my-2">

                                    <label>First Name <span class="text-danger">*</span></label>   

                                    <input type="text" class="form-control" value="<?php echo @$name[0]; ?>" placeholder="First name" name="fname" required>

                                </div>

                                <div class="col-md-3 my-2">

                                    <label>Middle Name<span class=" text-danger">*</span></label>   

                                    <input type="text" class="form-control" value="<?php echo @$name[1]; ?>" placeholder="Middle Name" name="mname" required>

                                </div>

                                <div class="col-md-3 my-2">

                                    <label>Last Name <span class=" text-danger">*</span></label>   

                                    <input type="text" class="form-control" value="<?php echo @$name[2]; ?>" placeholder="Last name" name="lname" required>

                                </div>



                                <div class="col-md-12 my-2">

                                    <label>Adress<span class=" text-danger">*</span></label>

                                    

                                     <input type="text" class="form-control" value="<?php echo @$select_application->address; ?>" placeholder="Your Full Adress" name="address" required>

                                </div>



                                <div class="col-md-4 my-2">

                                     <label>Number<span class=" text-danger">*</span></label>   

                                    

                                         <input type="text" class="form-control" id="inlineFormInputGroup" value="<?php echo @$select_application->number; ?>" name="number" placeholder="Mobile No">

                                    

                                    

                                </div>



                                <div class="col-md-4 my-2">

                                     <label for="Grid">Gr id<span class=" text-danger">*</span></label>   

                                    <input type="text" class="form-control" placeholder="####" value="<?php echo @$select_application->gr_id; ?>"  id="Grid" name="gr_id" required>

                                </div>



                               



                                 <div class="col-md-6 my-2">

                                     <label for="Faculty">Faculty Name<span class=" text-danger">*</span></label>   

                                    <select class="form-control custom-select my-1 mr-sm-2" id="Faculty"  name="faculty_id">

                                        <option selected disabled>Click Here</option>

                                        <?php foreach($faculty_all as $val) { ?>

                                        <option <?php if(@$select_application->faculty_id==$val->faculty_id) { echo "selected"; } ?> value="<?php echo $val->faculty_id; ?>"><?php echo $val->name; ?></option>

                                        <?php } ?>

                                        

                                    </select>

                                </div>



                                <div class="col-md-6 my-2">

                                     <label>Running Topic<span class=" text-danger">*</span></label>   

                                    <input type="text" class="form-control" value="<?php echo @$select_application->running_topic; ?>" placeholder="Course Topics" name="running_topic" required>

                                </div>



                                 <div class="col-md-6 my-2">

                                     <label>Position For Applied<span class=" text-danger">*</span></label>   

                                   <?php  $posi = explode(",",$select_application->position_for_apply); ?>

                                     <select class="form-control custom-select my-1 mr-sm-2"  name="position_for_apply[]" multiple required>

                                       

                                        <?php foreach($jobtype_all as $val) { ?>

                                        <option <?php if(in_array($val->position,$posi)) { echo "selected"; } ?> value="<?php echo $val->position; ?>"><?php echo $val->position; ?></option>

                                        <?php } ?>

                                        

                                    </select>

                                </div>

                                <div class="col-md-6 my-2">

                                     <label>Enter Skills<span class=" text-danger">*</span></label>   

                                    <input type="text" class="form-control" value="<?php echo @$select_application->skill; ?>" placeholder="Skill" name="skill" required>

                                </div>



                                 <div class="col-md-6 my-2">

                                     <label>Salary expectation<span class=" text-danger">*</span></label>   

                                    <input type="text" class="form-control" placeholder="10k-15k" value="<?php echo @$select_application->salary_expectation; ?>" name="salary_expectation" required>

                                </div>



                                <div class="col-md-6 my-2">

                                     <label>Prefer Location For Job:<span class=" text-danger">*</span></label>   

                                    <?php  $loca = explode(",",$select_application->prefer_job_location); ?>

                                    <select class="form-control custom-select my-1 mr-sm-2"  multiple name="prefer_job_location[]" required>

                                        <?php foreach($area_all as $val) { ?>

                                        <option  <?php if(in_array($val->area_name,$loca)) { echo "selected"; } ?> value="<?php echo $val->area_name; ?>"><?php echo $val->area_name; ?></option>

                                        <?php } ?>

                                       

                                    </select>

                                </div>



                                <div class="col-md-4 my-2">

                                     <label>Batch Time<span class=" text-danger">*</span></label>   

                                    <input type="text" class="form-control" value="<?php echo @$select_application->batch_time; ?>"  placeholder="Your Prefered Location" name="batch_time" required>

                                </div>



                                <div class="col-md-8 my-2">

                                    <label>Remarks<span class=" text-danger">*</span></label>   

                                   <input type="text" class="form-control"  placeholder="Your Need" value="<?php echo @$select_application->remarks; ?>" name="remarks" required>

                               </div>

                                </div>

            </div>

        <?php } else { ?>

        		<div class="row" style="padding-top:20px; padding-bottom:20px">

                                <div class="col-md-3 my-2">

                                    <img src="https://www.rnwmultimedia.com/applications/images/application_images/<?php echo $val->photo; ?>" alt="face" height="150px" width="150px">

                                </div>

                            

                                <?php @$name = explode(" ",@$select_application->name); ?>

                                <div class="col-md-3 my-2">

                                    <label>First Name <span class="text-danger">*</span></label>   

                                    <input type="text" class="form-control" value="<?php echo @$name[0]; ?>" placeholder="First name" name="fname" required readonly>

                                </div>

                                <div class="col-md-3 my-2">

                                    <label>Middle Name<span class=" text-danger">*</span></label>   

                                    <input type="text" class="form-control" value="<?php echo @$name[1]; ?>" placeholder="Middle Name" name="mname" required readonly>

                                </div>

                                <div class="col-md-3 my-2">

                                    <label>Last Name <span class=" text-danger">*</span></label>   

                                    <input type="text" class="form-control" value="<?php echo @$name[2]; ?>" placeholder="Last name" name="lname" required readonly>

                                </div>



                                <div class="col-md-12 my-2">

                                    <label>Adress<span class=" text-danger">*</span></label>

                                    

                                     <input type="text" class="form-control" value="<?php echo @$select_application->address; ?>" placeholder="Your Full Adress" name="address" required readonly>

                                </div>



                                <div class="col-md-4 my-2">

                                     <label>Number<span class=" text-danger">*</span></label>   

                                    

                                         <input type="text" class="form-control" id="inlineFormInputGroup" value="<?php echo @$select_application->number; ?>" name="number" placeholder="Mobile No" readonly>

                                    

                                    

                                </div>



                                <div class="col-md-4 my-2">

                                     <label for="Grid">Gr id<span class=" text-danger">*</span></label>   

                                    <input type="text" class="form-control" placeholder="####" value="<?php echo @$select_application->gr_id; ?>"  id="Grid" name="gr_id" required readonly>

                                </div>



                               



                                 <div class="col-md-6 my-2">

                                     <label for="Faculty">Faculty Name<span class=" text-danger">*</span></label>   

                                    <select class="form-control custom-select my-1 mr-sm-2" id="Faculty"  name="faculty_id" disabled>

                                        <option selected disabled>Click Here</option>

                                        <?php foreach($faculty_all as $val) { ?>

                                        <option <?php if(@$select_application->faculty_id==$val->faculty_id) { echo "selected"; } ?> value="<?php echo $val->faculty_id; ?>"><?php echo $val->name; ?></option>

                                        <?php } ?>

                                        

                                    </select>

                                </div>



                                <div class="col-md-6 my-2">

                                     <label>Running Topic<span class=" text-danger">*</span></label>   

                                    <input type="text" class="form-control" value="<?php echo @$select_application->running_topic; ?>" placeholder="Course Topics" name="running_topic" required readonly>

                                </div>



                                 <div class="col-md-6 my-2">

                                     <label>Position For Applied<span class=" text-danger">*</span></label>   

                                   <?php  $posi = explode(",",$select_application->position_for_apply); ?>

                                     <select class="form-control custom-select my-1 mr-sm-2"  name="position_for_apply[]" multiple required disabled>

                                       

                                        <?php foreach($jobtype_all as $val) { ?>

                                        <option <?php if(in_array($val->position,$posi)) { echo "selected"; } ?> value="<?php echo $val->position; ?>"><?php echo $val->position; ?></option>

                                        <?php } ?>

                                        

                                    </select>

                                </div>

                                <div class="col-md-6 my-2">

                                     <label>Enter Skills<span class=" text-danger">*</span></label>   

                                    <input type="text" class="form-control" value="<?php echo @$select_application->skill; ?>" placeholder="Skill" name="skill" required readonly>

                                </div>



                                 <div class="col-md-6 my-2">

                                     <label>Salary expectation<span class=" text-danger">*</span></label>   

                                    <input type="text" class="form-control" placeholder="10k-15k" value="<?php echo @$select_application->salary_expectation; ?>" name="salary_expectation" required readonly>

                                </div>



                                <div class="col-md-6 my-2">

                                     <label>Prefer Location For Job:<span class=" text-danger">*</span></label>   

                                    <?php  $loca = explode(",",$select_application->prefer_job_location); ?>

                                    <select class="form-control custom-select my-1 mr-sm-2"  multiple name="prefer_job_location[]" required disabled>

                                        <?php foreach($area_all as $val) { ?>

                                        <option  <?php if(in_array($val->area_name,$loca)) { echo "selected"; } ?> value="<?php echo $val->area_name; ?>"><?php echo $val->area_name; ?></option>

                                        <?php } ?>

                                       

                                    </select>

                                </div>



                                <div class="col-md-4 my-2">

                                     <label>Batch Time<span class=" text-danger">*</span></label>   

                                    <input type="text" class="form-control" value="<?php echo @$select_application->batch_time; ?>"  placeholder="Your Prefered Location" name="batch_time" required readonly>

                                </div>



                                <div class="col-md-8 my-2">

                                    <label>Remarks<span class=" text-danger">*</span></label>   

                                   <input type="text" class="form-control"  placeholder="Your Need" value="<?php echo @$select_application->remarks; ?>" name="remarks" readonly required>

                               </div>

                                </div>

            </div>



        <?php } ?>

            <div id="menu1" class="tab-pane fade">

             <?php if(@$_SESSION['user_name'] == 'URVIL PATEL' || @$_SESSION['user_name']=='Pradip Malaviya' ) { ?>

             <div class="row" style="padding-top:20px; padding-bottom:20px" >

                              



                                <div class="col-md-8 my-2">

                                    <label>Company Name<span class=" text-danger">*</span></label>   

                                <input type="text" class="form-control" value="<?php echo @$select_application->company_name; ?>" placeholder="Previous Company Nname" name="company_name" >

                                </div> 

                               

                                <div class="col-md-4 my-2">

                                        <label>Number<span class=" text-danger">*</span></label>   

                                   

                                            <input type="text" class="form-control" id="inlineFormInputGroup" value="<?php echo @$select_application->company_number; ?>" name="company_number" placeholder="Company No">

                                    

                                </div>



                                <div class="col-md-8 my-2">

                                    <label>Address<span class=" text-danger">*</span></label>

                                    

                                    <input type="text" class="form-control" id="inlineFormInputGroup" value="<?php echo @$select_application->company_address; ?>"  name="company_address" placeholder="Comany Address">

                                </div>



                                <div class="col-md-4 my-2">

                                    <label for="Supervisor">Company Supervisor<span class=" text-danger">*</span></label>   

                                       <input type="text" class="form-control"  name="company_sup_name" value="<?php echo @$select_application->company_sup_name; ?>" id="Supervisor" placeholder="Supervisor Name" >

                                </div>



                                <div class="col-md-4 my-2">

                                        <label>Job Title<span class=" text-danger">*</span></label>   

                                           <input type="text" class="form-control" name="job_title" value="<?php echo @$select_application->job_title; ?>" placeholder="Your Profession" >

                                </div>



                                <div class="col-md-4 my-2">

                                        <label>Starting Salary<span class=" text-danger">*</span></label>   

                                           <input type="text" class="form-control" value="<?php echo @$select_application->starting_salary; ?>" name="starting_salary" placeholder="8k" >

                                </div>



                                <div class="col-md-4 my-2">

                                        <label>Ending Salary<span class=" text-danger">*</span></label>   

                                           <input type="text" class="form-control" name="ending_salary" value="<?php echo @$select_application->ending_salary; ?>" placeholder="15k" >

                                </div>



                                <div class="col-md-12 my-2">

                                        <label>Responsibilities<span class=" text-danger">*</span></label>   

                                           <input type="text" class="form-control" name="responsibilities" value="<?php echo @$select_application->responsibilities; ?>" placeholder="" >

                                </div>

                                   

                                <div class="col-md-4 my-2">

                                        <label>Form<span class=" text-danger">*</span></label>   

                                           <input type="" class="form-control datepicker" value="<?php echo @$select_application->leave_from; ?>"  name="leave_from" >

                                </div>



                                <div class="col-md-4 my-2">

                                        <label>To<span class=" text-danger">*</span></label>   

                                           <input type="" class="form-control datepicker" name="leave_to" value="<?php echo @$select_application->leave_to; ?>" >

                                </div>



                                <div class="col-md-4 my-2">

                                        <label>Reason For Leaving<span class=" text-danger">*</span></label>   

                                           <input type="text" class="form-control" name="leave_reason" value="<?php echo @$select_application->leave_reason; ?>" >

                                </div>



                                <div class="col-md-8 my-2">

                                        <label>May we contact your previous supervisor for a reference?                                          <span class="text-danger">*</span></label>  

                                         <div class="form-check form-check-inline">

                                                <input class="form-check-input" type="radio" id="inlineCheckbox1" <?php if(@$select_application->contact_sup=="yes") { echo "checked"; } ?> value="yes" name="contact_sup">

                                                <label class="form-check-label" for="inlineCheckbox1">Yes</label>

                                        </div>

                                        

                                        <div class="form-check form-check-inline">

                                                <input class="form-check-input" type="radio" id="inlineCheckbox2" <?php if(@$select_application->contact_sup=="no") { echo "checked"; } ?> value="no" name="contact_sup">

                                                <label class="form-check-label" for="inlineCheckbox2">No</label>

                                        </div>

                                </div>

			</div>

		<?php } else { ?>

				 <div class="row" style="padding-top:20px; padding-bottom:20px" >

                              



                                <div class="col-md-8 my-2">

                                    <label>Company Name<span class=" text-danger">*</span></label>   

                                <input type="text" class="form-control" value="<?php echo @$select_application->company_name; ?>" placeholder="Previous Company Nname" name="company_name" readonly>

                                </div> 

                               

                                <div class="col-md-4 my-2">

                                        <label>Number<span class=" text-danger">*</span></label>   

                                   

                                            <input type="text" class="form-control" id="inlineFormInputGroup" value="<?php echo @$select_application->company_number; ?>" name="company_number" placeholder="Company No" readonly>

                                    

                                </div>



                                <div class="col-md-8 my-2">

                                    <label>Adress<span class=" text-danger">*</span></label>

                                    

                                    <input type="text" class="form-control" id="inlineFormInputGroup" value="<?php echo @$select_application->company_address; ?>"  name="company_address" placeholder="Comany Address" readonly>

                                </div>



                                <div class="col-md-4 my-2">

                                    <label for="Supervisor">Company Supervisor<span class=" text-danger">*</span></label>   

                                       <input type="text" class="form-control"  name="company_sup_name" value="<?php echo @$select_application->company_sup_name; ?>" id="Supervisor" placeholder="Supervisor Name" readonly>

                                </div>



                                <div class="col-md-4 my-2">

                                        <label>Job Title<span class=" text-danger">*</span></label>   

                                           <input type="text" class="form-control" name="job_title" value="<?php echo @$select_application->job_title; ?>" placeholder="Your Profession" readonly>

                                </div>



                                <div class="col-md-4 my-2">

                                        <label>Starting Salary<span class=" text-danger">*</span></label>   

                                           <input type="text" class="form-control" value="<?php echo @$select_application->starting_salary; ?>" name="starting_salary" placeholder="8k" readonly>

                                </div>



                                <div class="col-md-4 my-2">

                                        <label>Ending Salary<span class=" text-danger">*</span></label>   

                                           <input type="text" class="form-control" name="ending_salary" value="<?php echo @$select_application->ending_salary; ?>" placeholder="15k" readonly>

                                </div>



                                <div class="col-md-12 my-2">

                                        <label>Responsibilities<span class=" text-danger">*</span></label>   

                                           <input type="text" class="form-control" name="responsibilities" value="<?php echo @$select_application->responsibilities; ?>" placeholder="" readonly>

                                </div>

                                   

                                <div class="col-md-4 my-2">

                                        <label>Form<span class=" text-danger">*</span></label>   

                                           <input type="" class="form-control datepicker" value="<?php echo @$select_application->leave_from; ?>"  name="leave_from" readonly>

                                </div>



                                <div class="col-md-4 my-2">

                                        <label>To<span class=" text-danger">*</span></label>   

                                           <input type="" class="form-control datepicker" name="leave_to" value="<?php echo @$select_application->leave_to; ?>" readonly>

                                </div>



                                <div class="col-md-4 my-2">

                                        <label>Reason For Leaving<span class=" text-danger">*</span></label>   

                                           <input type="text" class="form-control" name="leave_reason" value="<?php echo @$select_application->leave_reason; ?>" readonly>

                                </div>



                                <div class="col-md-8 my-2">

                                        <label>May we contact your previous supervisor for a reference?                                          <span class="text-danger">*</span></label>  

                                         <div class="form-check form-check-inline">

                                                <input class="form-check-input" type="radio" id="inlineCheckbox1" <?php if(@$select_application->contact_sup=="yes") { echo "checked"; } ?> value="yes" name="contact_sup" readonly>

                                                <label class="form-check-label" for="inlineCheckbox1">Yes</label>

                                        </div>

                                        

                                        <div class="form-check form-check-inline">

                                                <input class="form-check-input" type="radio" id="inlineCheckbox2" <?php if(@$select_application->contact_sup=="no") { echo "checked"; } ?> value="no" name="contact_sup" readonly>

                                                <label class="form-check-label" for="inlineCheckbox2">No</label>

                                        </div>

                                </div>

			</div>



		<?php } ?>

            </div>

            <div id="menu2" class="tab-pane fade">

            	<?php if(@$_SESSION['user_name'] == 'URVIL PATEL' || @$_SESSION['user_name']=='Pradip Malaviya' ) { ?>

              <div class="row" style="padding-top:20px; padding-bottom:20px">

                               



                                <div class="col-md-8 my-2">

                                    <label>Company Name<span class=" text-danger">*</span></label>   

                                <input type="text" class="form-control" placeholder="Previous Company Nname" value="<?php echo @$select_application->user_company_name; ?>" name="user_company_name" >

                                </div> 

                               

                                <div class="col-md-4 my-2">

                                        <label>Number<span class=" text-danger">*</span></label>   

                                   

                                            <input type="text" class="form-control" id="inlineFormInputGroup" name="user_company_number" value="<?php echo @$select_application->user_company_number; ?>" placeholder="7202947622">

                                    

                                </div>



                                <div class="col-md-8 my-2">

                                    <label>Address<span class=" text-danger">*</span></label>

                                    

                                    <input type="text" class="form-control" id="inlineFormInputGroup" value="<?php echo @$select_application->user_company_address; ?>"  name="user_company_address" placeholder="Comany Address">

                                </div>



                                <div class="col-md-4 my-2">

                                    <label for="Supervisor">Company Supervisor<span class=" text-danger">*</span></label>   

                                       <input type="text" class="form-control" value="<?php echo @$select_application->user_company_sup_name; ?>"  name="user_company_sup_name" id="Supervisor" placeholder="Supervisor Name" >

                                </div>



                                <div class="col-md-4 my-2">

                                        <label>Job Title<span class=" text-danger">*</span></label>   

                                           <input type="text" class="form-control" value="<?php echo @$select_application->user_job_title; ?>" name="user_job_title" placeholder="Your Profession" >

                                </div>



                                <div class="col-md-4 my-2">

                                        <label>Starting Salary<span class=" text-danger">*</span></label>   

                                           <input type="text" class="form-control" value="<?php echo @$select_application->user_starting_salary; ?>" name="user_starting_salary" placeholder="8k" >

                                </div>



                               

                                <div class="col-md-12 my-2">

                                        <label>Responsibilities<span class=" text-danger">*</span></label>   

                                           <input type="text" class="form-control" value="<?php echo @$select_application->user_responsibilities; ?>" name="user_responsibilities" placeholder="" >

                                </div>

                                   

                                <div class="col-md-4 my-2">

                                        <label>Form<span class=" text-danger">*</span></label>   

                                           <input type="" class="form-control datepicker" value="<?php echo @$select_application->user_from; ?>"  name="user_from" >

                                </div>



                               

                                <div class="col-md-4 my-2">

                                        <label>Ref By<span class=" text-danger">*</span></label>   

                                           <input type="text" class="form-control" name="user_refby" value="<?php echo @$select_application->user_refby; ?>" >

                                </div>

              </div>

          <?php } else { ?>

          		<div class="row" style="padding-top:20px; padding-bottom:20px">

                               



                                <div class="col-md-8 my-2">

                                    <label>Company Name<span class=" text-danger">*</span></label>   

                                <input type="text" class="form-control" placeholder="Previous Company Nname" value="<?php echo @$select_application->user_company_name; ?>" name="user_company_name" readonly >

                                </div> 

                               

                                <div class="col-md-4 my-2">

                                        <label>Number<span class=" text-danger">*</span></label>   

                                   

                                            <input type="text" class="form-control" id="inlineFormInputGroup" name="user_company_number" value="<?php echo @$select_application->user_company_number; ?>" placeholder="7202947622" readonly>

                                    

                                </div>



                                <div class="col-md-8 my-2">

                                    <label>Address<span class=" text-danger">*</span></label>

                                    

                                    <input type="text" class="form-control" id="inlineFormInputGroup" value="<?php echo @$select_application->user_company_address; ?>"  name="user_company_address" placeholder="Comany Address" readonly>

                                </div>



                                <div class="col-md-4 my-2">

                                    <label for="Supervisor">Company Supervisor<span class=" text-danger">*</span></label>   

                                       <input type="text" class="form-control" value="<?php echo @$select_application->user_company_sup_name; ?>"  name="user_company_sup_name" id="Supervisor" placeholder="Supervisor Name" readonly>

                                </div>



                                <div class="col-md-4 my-2">

                                        <label>Job Title<span class=" text-danger">*</span></label>   

                                           <input type="text" class="form-control" value="<?php echo @$select_application->user_job_title; ?>" name="user_job_title" placeholder="Your Profession" readonly>

                                </div>



                                <div class="col-md-4 my-2">

                                        <label>Starting Salary<span class=" text-danger">*</span></label>   

                                           <input type="text" class="form-control" value="<?php echo @$select_application->user_starting_salary; ?>" name="user_starting_salary" placeholder="8k" readonly>

                                </div>



                               

                                <div class="col-md-12 my-2">

                                        <label>Responsibilities<span class=" text-danger">*</span></label>   

                                           <input type="text" class="form-control" value="<?php echo @$select_application->user_responsibilities; ?>" name="user_responsibilities" placeholder="" readonly>

                                </div>

                                   

                                <div class="col-md-4 my-2">

                                        <label>Form<span class=" text-danger">*</span></label>   

                                           <input type="" class="form-control datepicker" value="<?php echo @$select_application->user_from; ?>" readonly name="user_from" >

                                </div>



                               

                                <div class="col-md-4 my-2">

                                        <label>Ref By<span class=" text-danger">*</span></label>   

                                           <input type="text" class="form-control" name="user_refby" value="<?php echo @$select_application->user_refby; ?>" readonly >

                                </div>

              </div>





          <?php } ?>

            </div>

            <div id="menu3" class="tab-pane fade">

                <div class="row" style="padding:15px 0;">

                	<?php if(@$_SESSION['user_name'] == 'URVIL PATEL' || @$_SESSION['user_name']=='Pradip Malaviya' ) { ?>

                        <div class="col-md-8 my-2">

                                        <label>Application Status   <span class="text-danger">*</span></label>  

                                        <div class="checkbox">

                                          <label> <input class="form-check-input" type="radio"  <?php if(@$select_application->application_status=="0") { echo "checked"; } ?> value="0" name="application_status">Inctive</label>

                                        </div>

                                        <div class="checkbox">

                                          <label> <input class="form-check-input" type="radio"  <?php if(@$select_application->application_status=="1") { echo "checked"; } ?> value="1" name="application_status">Active</label>

                                        </div>

                                        <div class="checkbox">

                                          <label> <input class="form-check-input" type="radio"  <?php if(@$select_application->application_status=="2") { echo "checked"; } ?> value="2" name="application_status">Confirm</label>

                                        </div>

                                        <div class="checkbox">

                                          <label><input class="form-check-input" type="radio"  <?php if(@$select_application->application_status=="3") { echo "checked"; } ?> value="3" name="application_status">Postpone</label>

                                        </div>

                        </div>

                    <?php } else { ?>





                    <?php } ?>

                                <div class="col-md-12">

                                    <label>Faculty Remarks<span class=" text-danger">*</span></label>   

                                   <input type="text" class="form-control"  placeholder="Your Need" value="<?php echo @$select_application->faculty_remarks; ?>" name="faculty_remarks" >

                               </div>

                </div>

            </div>

            <div class="row" >

           <div class="col-md-12">

                <input type="submit" id="submit_job" name="submit_job" class="btn btn-danger w-100 font-weight-bold" value="SUBMIT">

           </div> 



          </form>  



           </div>





<div id="menu4" class="tab-pane fade">

<div class="row" style="padding:15px;">

<form method="post" >

<div class="col-md-12">

  <div class="row d-flex align-item-center">

  	 <div class="col-md-3">

  	 	<label>Labels<span class=" text-danger">*</span></label>   

    <input class="form-control"type="hidden" name="user_name_re" id="user_name_re" value="<?php echo $_SESSION['user_name']; ?>" >

    <select name="remarks_label" class="form-control" id="remarks_label">

      <option name=''>Select</option>

      <option name="Work">Assign Work Checking</option>

      <option name="Work1">Work Complete</option>

      <option name="Work2">Work Pending</option>

      <option name="company_assign">Assign Company & Location</option>

      <option name="student_absent">Student Absent</option>

      <option name="Location">Location Issue</option>

      <option name="Salary">Salary Issue</option>

	    <option name="Bond">Bond Issue</option>

      <option name="Personal">Personal Issue</option>

      <option name="Talkstudent">Talk With Student</option>

      <option name="Talkparents">Talk With Parents</option>

      <option name="Discipline">Discipline</option>

      <option name="Study">Study</option>

      <option name="Fees">Fees</option>

      <option name="Other">Others</option>

    </select>

    <span id="remarks_label_error" style="color:red"></span>

  </div>

  <div class="col-md-7">

    <label>Add New Remarks<span class=" text-danger">*</span></label>   

    

    <textarea class="form-control" name="remarks_job" id="remarks_job" placeholder="Add New Remarks"></textarea>

    <span id="remarks_job_error" style="color:red"></span>

  </div>

  <div class="col-md-2">

    <input type="button" name="submit_job_remarks" value="SUBMIT"  onclick="return remarks_add_re()" class="btn btn-success btn-100">

  </div>

</div>



<div class="w-100 mt-5" id="remarks_data_record">

<div class="table-responsive">

<table class="table">

  <tr style="background:#7460ee; color:white;">

    <th>No</th>

    <th>Date</th>

    <th>Labels</th>

    <th width="70%">Remarks</th>

    <th>Remarks By</th>                      

  </tr>

  <?php $i=0;

    if(isset($remarks_record)) {  foreach($remarks_record as $r)  { ?>

  <tr>

    <td><?php echo ++$i; ?></td>

    <td><?php echo $r->re_date; ?></td>

    <td><?php echo $r->labels; ?></td>

    <td align="justify"><?php echo $r->remarks; ?></td>

    <td><?php echo $r->remarks_by; ?></td>

  </tr>

  <?php  }  } ?>

</table>

</div>

</div>

                  

</form>

</div>

</div>







</div>

</div>

</div>

</div>



<?php    } ?>



</section>

<!-- /.content -->

</div>

<!-- /.content-wrapper -->

  

 

	

    

    

    

    

    

    

  <!-- /.content-wrapper -->

  <footer class="main-footer">

    

    <strong>Copyright©2018 Red & White Multimedia.</strong> All rights

    reserved.

  </footer>



 

</div>

<script src="<?php echo base_url(); ?>assetslogin/vendor/jquery/jquery-3.2.1.min.js"></script>

	<script src="<?php echo base_url(); ?>assetslogin/js/main.js"></script>







<!-- ./wrapper -->



<!-- jQuery 3 -->

<script src="<?php echo base_url(); ?>bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap 3.3.7 -->

<script src="<?php echo base_url(); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- bootstrap datepicker -->

<script src="<?php echo base_url(); ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<!-- DataTables -->

<script src="<?php echo base_url(); ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>

<script src="<?php echo base_url(); ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- SlimScroll -->

<script src="<?php echo base_url(); ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<!-- FastClick -->

<script src="<?php echo base_url(); ?>bower_components/fastclick/lib/fastclick.js"></script>

<!-- AdminLTE App -->

<script src="<?php echo base_url(); ?>dist/js/adminlte.min.js"></script>

<!-- AdminLTE for demo purposes -->

<script src="<?php echo base_url(); ?>dist/js/demo.js"></script>

<!-- page script -->









<script>

 $('.datepicker').datepicker({

      autoclose: true,

	   format:"yyyy-mm-dd"

	   

	  

    })

    

  $(function () {

    $('#example1').DataTable()

    $('.example10').DataTable()

    $('#example2').DataTable({

      'paging'      : true,

      'lengthChange': false,

      'searching'   : false,

      'ordering'    : true,

      'info'        : true,

      'autoWidth'   : false

    })

  });







function remarks_add_re()

{

  var app_id =  $('#application_no_job').val();

  var remarks_d =  $('#remarks_job').val();

  var user_name_re =  $('#user_name_re').val();

  var remarks_label =  $('#remarks_label').val();

  

var currentdate = new Date(); 

    var datetime =  currentdate.getDate() + "/"

                + (currentdate.getMonth()+1)  + "/" 

                + currentdate.getFullYear() + "  "  

                + currentdate.getHours() + ":"  

                + currentdate.getMinutes() + ":" 

                + currentdate.getSeconds();



  

  



  if(remarks_d=='')

  {

    $('#remarks_job_error').html("Please Enter Remarks");

     $('#remarks_label_error').html("");

    return false;

  }

  else if(remarks_label == 'select')

  {

    $('#remarks_job_error').html("");

    $('#remarks_label_error').html("Please Select Labels");

    return false;

  }





  $.ajax({

      url : "<?php echo base_url(); ?>FormController/records_remarks",

      type:"post",

      data:{

        'application_id' : app_id,

        'remarks_id' : remarks_d,

        'user_name_re' : user_name_re,

        'remarks_label' : remarks_label,

        'date1' : datetime

      },

      success:function(res)

      {

        $('#remarks_data_record').html(res);

        $('#remarks_job').val('');

        $('#remarks_job_error').html("");

        

      }

  });

}





function hide_menu4_submit()

{

		$('#submit_job').hide();

}

function show_menu4_submit()

{

		$('#submit_job').show();

}







function get_student_record(id)

{

  // alert(id);

	$.ajax({

		url : "<?php echo base_url(); ?>index.php/FormController/get_pop_student_record",

		type : "post",

		data:{

			'id' : id

		},

		success:function(response)

		{

			$('#result').html(response);

		}

	});



}





function get_add_remakrs(appli_id)

{

  // alert(appli_id); 

    $("#myModal_remarks").modal();

    $('#rem_application').val(appli_id);

}





function insert_record_remarks()

{

  var re_by = $('#user_name_re').val();

  var appli_id = $('#rem_application').val();

  var remarks = $('#remarks_job').val();

  var label_rema = $('#label_rem').val();

  var date_remakr = $('#cure_date').val();

  var faculty_assign =  $('#assign_faculty').val();





  // alert(re_by);

  // alert(appli_id);

  // alert(remarks);

  // alert(label_rema);

  // alert(date_remakr);

  $.ajax({

      url : "<?php echo base_url(); ?>/FormController/records_remarks",

      type:"post",

      data:{

        'application_id':appli_id,

        'remarks_id':remarks,

        'user_name_re':re_by,

        'remarks_label' : label_rema,

        'date1': date_remakr,

        'faculty_assign' : faculty_assign

      },

      success:function(res)

      {

        console.log(res);

        $('#myModal_remarks').modal('hide');

        $('#add_remarks')[0].reset();

      }

  });



}



function insert_status_remarks()

{

  var re_by = $('#user_name_re').val();

  // var appli_id = $('#rem_application').val();

  var remarks = $('#u_status').val();

  // var label_rema = $('#label_rem').val();

  var date_remakr = $('#cure_date').val();

  var status = $('#change_status_popup').val();

  var appli_id =  $('#rem_application_status').val();

  var assign_faculty = $('#assign_faculty').val();

  // alert(re_by);

  // alert(remarks);

  // // alert(label_rema);

  // alert(date_remakr);

  // alert(appli_id);

  // alert(status);

  



  $.ajax({

      url : "<?php echo base_url(); ?>/FormController/records_remarks",

      type:"post",

      data:{

        'application_id':appli_id,

        'remarks_id':remarks,

        'user_name_re':re_by,

        'remarks_label' : status,

        'date1': date_remakr,

        'assign_faculty' : assign_faculty

      },

      success:function(res)

      {

        $('#exampleModal').modal('hide');

        $('#add_status')[0].reset();

         $('#assign_faculty').hide();

        // $('#user_name_re').val('');

        $('#status').val('');

        $('#rem_application_status').val('');



                    setTimeout(function () {

                      window.location = "<?php echo base_url(); ?>FormController/jobApplication";

                    }, 1000);



      }

  });

}

function onchange_active_de(id)

{



  // alert(id);

  var p_sta =  "p_status"+id;

    var sta = $("#"+p_sta).val();



    // alert(sta);

    var ch_status =  "change_status"+id;

    // alert(ch_status);

    $("#"+ch_status).val(sta);

    $('#change_status_popup').val(sta);



}

function insert_record_status(appli_id)

{

  

    // alert(appli_id);



    $('#rem_application_status').val(appli_id);

}





$('#assign_faculty').hide();



function get_label_work()

{

   var label_rem = $('#label_rem').val();

   if(label_rem == 'Assign Work Checking')

   {

      $('#assign_faculty').show();

   }

   else

   {



      $('#assign_faculty').hide();

   }

}





function filter_faculty123()

{

  alert("test");

}

</script>

</body>

</html>

